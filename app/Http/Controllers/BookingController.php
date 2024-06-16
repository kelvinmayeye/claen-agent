<?php

namespace App\Http\Controllers;

use App\Models\AgentService;
use App\Models\BookedService;
use App\Models\Bookings;
use App\Models\User;
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

    public function addMultipleBooking(Request $request){
        return $request;
        return '';
    }

    public function customerBookings()
    {
        $offeredService = AgentService::list()->where('ags.status','active')->get();
        $agents = User::whereHas('agentService', function ($query) {
            $query->where('status', 'active');
        })->get();
        $bookings = Bookings::list()->where('b.customer_id', Auth::id())->latest()->get();
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
        return view('pages.customers.customer-bookings', compact('bookings','offeredService','agents'));
    }

    public function customerCancelBookings($id){
        $booking = Bookings::find($id);
        if(!$booking) {
            toast('Booking not found','error');
            return back();
        }
        if($booking->status !== 'pending'){
            toast('Sorry you cant cancel this booking with this status','error');
            return back();
        }
        try {
            DB::beginTransaction();
            $booking->update([
                'status'=>'cancelled',
                'canceled_by'=>Auth::user()->id,
                'canceled_at'=>now()
            ]);
            BookedService::where('booking_id',$booking->id)->update([
                'status'=>'canceled'
            ]);
            DB::commit();
            toast('Booking cancelled successful','success');
        }catch (\Exception $e){
            DB::rollBack();
            toast($e->getMessage(),'error');
            return back();
        }
        return back();
    }

    public function customerViewBooking($id) {
        $bookings = Bookings::list()->where('b.id', $id)->get();

        if ($bookings->isEmpty()) {
            toast('Booking not found', 'error');
            return back();
        }
        foreach ($bookings as $booking) {
            $booked_services = BookedService::list()->where('bs.booking_id', $booking->id)->get();
            $booking->booked_services = $booked_services;
        }
//        return $booking;
        toast('Booking Details Loaded successful', 'success');
        return view('pages.customers.customer-view-booking',compact('booking'));
    }


}
