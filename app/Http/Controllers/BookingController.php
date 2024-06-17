<?php

namespace App\Http\Controllers;

use App\Models\AgentService;
use App\Models\BookedService;
use App\Models\Bookings;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class BookingController extends Controller
{
    public function addBooking(Request $request)
    { //Todo: perform validations of data
        //Todo: book multiple services per one booking

        $bookingDetails = $request->except('_token', 'booked_service');
        $bookingDetails['customer_id'] = Auth::id();
        $bookedServices = $request->get('booked_service');

        try {
            DB::beginTransaction();
            $booking = Bookings::create($bookingDetails);
            //add booked service detail after adding booking
            BookedService::create([
                'booking_id' => $booking->id,
                'agent_service_id' => $bookedServices['agent_service_id'],
            ]);
            DB::commit();
            Alert::success('Booking Added Successfully', 'Thank you agent will get in touch soon');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
            Alert::error('Booking Failed', 'An error occurred, Please try again');
        }
        return back();
    }

    public function addMultipleBooking(Request $request)
    {
//        return $request;
        $booked_services_array = $request->input('bookedservice');
        if (!isset($booked_services_array) || count($booked_services_array) == 0) {
            toast("No service selected", 'error');
            return back();
        }

        try {
            DB::beginTransaction();
            //check if user has pending booking for same agent
            $chExBooking = Bookings::where('customer_id', Auth::id())->where('agent_id', $request->agent_id)->where('status', 'pending')->first();
            if ($chExBooking) throw new \Exception('Booking ignored you have a pending booking to same agent');
            $booking = new Bookings();
            $booking->customer_id = Auth::id();
            $booking->agent_id = $request->agent_id;
            $booking->date = $request->date;
            $booking->time = $request->time;
            $booking->place = $request->place;
            $booking->description = $request->description ?? null;
            $booking->save();
            foreach ($booked_services_array as $bsa) {
//                return count($bsa);
                BookedService::create([
                    'booking_id' => $booking->id,
                    'agent_service_id' => $bsa
                ]);
            }

            DB::commit();
            toast('Booking added successful', 'success');
        } catch (\Exception $e) {
            DB::rollBack();
//            throw $e;
            toast($e->getMessage(), 'error');
        }

        return back();
    }

    public function customerBookings()
    {
        $offeredService = AgentService::list()->where('ags.status', 'active')->get();
        $agents = User::whereHas('agentService', function ($query) {
            $query->where('status', 'active');
        })->get();
        $bookings = Bookings::list()->where('b.customer_id', Auth::id())->latest()->distinct()->get();
        if ($bookings->isEmpty()) {
            Alert::toast("You don't currently have a booking.");
        } else {
            foreach ($bookings as $booking) {
                $bookedServices = BookedService::list()->where('booking_id', $booking->id)->get();
                $booking->bookingServices = $bookedServices;
            }
        }

        $title = 'Cancel Booking!';
        $text = "Are you sure you want to cancel?";
        confirmDelete($title, $text);
//        return $bookings;
        return view('pages.customers.customer-bookings', compact('bookings', 'offeredService', 'agents'));
    }

    public function customerCancelBookings($id)
    {
        $booking = Bookings::find($id);
        if (!$booking) {
            toast('Booking not found', 'error');
            return back();
        }
        if ($booking->status !== 'pending') {
            toast('Sorry you cant cancel this booking with this status', 'error');
            return back();
        }
        try {
            DB::beginTransaction();
            $booking->update([
                'status' => 'cancelled',
                'canceled_by' => Auth::user()->id,
                'canceled_at' => now()
            ]);
            BookedService::where('booking_id', $booking->id)->update([
                'status' => 'canceled'
            ]);
            DB::commit();
            toast('Booking cancelled successful', 'success');
        } catch (\Exception $e) {
            DB::rollBack();
            toast($e->getMessage(), 'error');
            return back();
        }
        return back();
    }

    public function customerViewBooking($id)
    {
        $bookings = Bookings::list()->where('b.id', $id)->get();

        if ($bookings->isEmpty()) {
            toast('Booking not found', 'error');
            return back();
        }
        foreach ($bookings as $booking) {
            $booked_services = BookedService::list()->where('bs.booking_id', $booking->id)->get();
            $booking->booked_services = $booked_services;
        }
        $title = 'Delete Service!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
//        return $booking;
        return view('pages.customers.customer-view-booking', compact('booking'));
    }

    public function changeServiceBooking(Request $request)
    {
//        return $request;
        $service_id_update = $request->service_id_update;
        $booked_services_array = $request->input('bookedservice');
        // $booked_services_array is empty do nothing return back();
        if (!isset($booked_services_array) || count($booked_services_array) == 0) {
            toast("No service selected", 'error');
            return back();
        }
        try {
            DB::beginTransaction();
            $booking = Bookings::find($request->booking_id);
            if (!$booking) {
                throw new \Exception('Booking not found');
            }
            // delete existing service
            BookedService::where('agent_service_id', $service_id_update)->delete();
            foreach ($booked_services_array as $bsa) {
                BookedService::create([
                    'booking_id' => $booking->id,
                    'agent_service_id' => $bsa
                ]);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            //  throw $e;
            toast($e->getMessage(), 'error');
            return back();
        }
        toast('Booking changed Successful', 'success');
        return back();
    }

    public function customerDeleteBookingService($id){
        $agent_service_id = $id;
        try {
            BookedService::where('agent_service_id',$agent_service_id)->delete();
            toast('Service deleted successfully','success');
        }catch (\Exception $e){
            toast($e->getMessage(),'error');
            return back();
        }
        return back();
    }


}
