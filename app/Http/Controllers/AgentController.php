<?php

namespace App\Http\Controllers;

use App\Models\AgentService;
use App\Models\BookedService;
use App\Models\Bookings;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class AgentController extends Controller
{
    public function getAgentServices()
    { //get services page and services according to current login user
        $agentServices = AgentService::where('agent_id', Auth::id())->get();
        $services = Service::where('status', 'active')->get();
        return view('pages.agents.agent-services', compact('agentServices', 'services'));
    }

    public function storeAgentServices(Request $request)
    {

        $service = Service::find($request->serviceId);
        if ($service) {
            $existingAgentService = AgentService::query()->where('agent_id', \Auth::id())->where('service_id', $service->id)->get();
            if ($existingAgentService->count() == 0) {
                $agentService = AgentService::create([
                    'agent_id' => \Auth::id(),
                    'service_id' => $service->id,
                ]);
                Alert::toast('Service added successful');
                $result = ['status' => 'success', 'msg' => 'Service added successful', 'data' => $agentService];
            } else {
                Alert::toast('Service already existing');
                $result = ['status' => 'success', 'msg' => 'Service already existing'];
            }
        } else {
            $result = ['status' => 'error', 'msg' => 'Service was not found'];

        }
        return response()->json($result);
    }

    public function agentServiceDetails($id)
    {
        $agentService = AgentService::find($id);
        if (!$agentService) {
            Alert::toast('Service not found');
            return back();
        }
        return view('pages.agents.agents-service-details', compact('agentService'));
    }

    public function saveAgentServiceUpdate(Request $request)
    {
        $agentService = AgentService::find($request->agent_service_id);
        if (!$agentService) {
            Alert::toast('Service not found');
            return back();
        }
        $agentService->update([
            'description' => $request->description
        ]);
        Alert::toast('Service updated successful');
        return redirect()->route('agent.get.services');
    }

    public function changeStatus($id)
    {
        $agentService = AgentService::find($id);
        if (!$agentService) {
            Alert::toast('Service not found');
            return back();
        }
        if ($agentService->bookings->where('status', 'pending')->isNotEmpty()) {
            Alert::error('Action Denied', 'You cant Change status you have a pending booking');
            return back();
        }
        if ($agentService->status == 'active') {
            $agentService->update([
                'status' => 'inactive'
            ]);
        } else {
            $agentService->update([
                'status' => 'active'
            ]);
        }
        Alert::toast('Service Status Changed');
        return back();
    }

    public function deleteAgentService($id)
    {
        // Find the agent service by ID
        $agentService = AgentService::find($id);

        // Check if agent service exists
        if (!$agentService) {
            Alert::toast('Service not found');
            return back();
        }

        // Check if the service has bookings
        if ($agentService->bookings->count() > 0) {
            Alert::toast('This service has bookings and cannot be deleted');
            return back();
        }

        // Delete the agent service
        if ($agentService->delete()) {
            Alert::toast('Service deleted successfully');
            return back();
        }

        // If deletion fails for any reason
        Alert::toast('Failed to delete service');
        return back();
    }

    public function agentServiceBookings()
    {
        $bookings = Bookings::list()->where('b.agent_id', Auth::id())->get();
        if ($bookings->isNotEmpty()) {
            foreach ($bookings as $booking) {
                if (now()->format('Y-m-d') > $booking->date && in_array($booking->status, ['confirmed', 'pending'])) {
                    Bookings::where('id', $booking->id)->update(['status' => 'missed']);
                    //if booking is expired all booked services remains pending
                }
            }
        }
        $bookings = Bookings::list()->where('b.agent_id', Auth::id())->distinct()->get();
        return view('pages.agents.agents-bookings', compact('bookings'));
    }

    public function viewCustomerBooking($id)
    {
        $customerBooking = Bookings::list()->where('b.id', $id)->first();
        if (!$customerBooking) {
            Alert::toast('Service updated successful', 'error');
            return redirect()->back();
        }
        $bookedServices = BookedService::list()->where('b.id', $id)->get();
        $customerBooking->service = $bookedServices->isNotEmpty() ? $bookedServices : [];
//        return $customerBooking;
        return view('pages.agents.agent-view-customer-booking', compact('customerBooking'));
    }

    public function ajax_get_agent_service(Request $request)
    {
        try {
            $agent_id = $request->get('agent_id');
            $agentServices = AgentService::list()->where('ags.agent_id', $agent_id)->get();
            $result = ['status' => 'success', 'data' => $agentServices];
        } catch (\Exception $e) {
            $result = ['status' => 'error', 'data' => $e];
        }
        return response()->json($result);
    }

    public function ajax_get_agent_service_change(Request $request){
        try {
            $booking = Bookings::find($request->get('book_number'));
            $available_services = BookedService::where('booking_id', $booking->id)->pluck('agent_service_id')->toArray();

            if (!$booking) throw new \Exception('booking not found');
            $agent_service = AgentService::list()->where('ags.agent_id', $booking->agent_id)->whereNotIn('ags.id', $available_services)->get();
            $result = ['status' => 'success', 'data' => $agent_service];
        }catch (\Exception $e){
            $result = ['status' => 'error', 'data' => $e];
        }
        return response()->json($result);
    }

    public function ajax_confirm_booking(Request $request)
    {
        $booking_id = $request->get('booking_id');
        try {
            $booking = Bookings::find($booking_id);
            if ($booking) {
                $booking->update([
                    'status' => 'confirmed'
                ]);
                Alert::success('Booking accepted successfully', '');
                Session::flash('success','Booking accepted successfully');
                $result = ['status' => 'success', 'msg' => 'Booking accepted successfully'];
            } else {
                Session::flash('error','Booking not found');
                $result = ['status' => 'error', 'msg' => 'Booking not found'];
            }
        } catch (\Exception $e) {
            Session::flash('error','Failed to accept booking');
            $result = ['status' => 'error', 'msg' => 'Failed to accept booking'];
        }
        return response()->json($result);
    }

    public function ajax_cancel_booking(Request $request)
    {
        $booking_id = $request->get('booking_id');
        try {
            $booking = Bookings::find($booking_id);
            if ($booking) {
                $booking->update([
                    'status' => 'cancelled'
                ]);
                Alert::success('Booking cancelled successfully', '');
                Session::flash('success','Booking cancelled successfully');
                $result = ['status' => 'success', 'msg' => 'Booking cancelled successfully'];
            } else {
                Session::flash('error','Booking not found');
                $result = ['status' => 'error', 'msg' => 'Booking not found'];
            }
        } catch (\Exception $e) {
            Session::flash('error','Failed to cancelled booking');
            $result = ['status' => 'error', 'msg' => 'Failed to cancelled booking'];
        }
        return response()->json($result);
    }

    public function mark_as_attended(Request $request){
        $booking_service_id = $request->get('booked_service_id');
        try {
            $booked_service = BookedService::find($booking_service_id);
            if ($booked_service) {
                $booked_service->update([
                    'status' => 'attended',
                    'attended_by'=>Auth::id()
                ]);
                Alert::success('Service Marked as attended', '');
                Session::flash('success','Service Marked as attended');
                $result = ['status' => 'success', 'msg' => 'Service Marked as attended'];
            } else {
                Alert::error('Service not found', '');
                Session::flash('error','Service not found');
                $result = ['status' => 'error', 'msg' => 'Service not found'];
            }
        } catch (\Exception $e) {
            Alert::success('Failed to Marked as attended', '');
            Session::flash('error','Failed to Marked as attended');
            $result = ['status' => 'error', 'msg' => 'Failed to Marked as attended'];
        }
        return response()->json($result);
    }

}
