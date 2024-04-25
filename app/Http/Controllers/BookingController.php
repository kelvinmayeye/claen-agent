<?php

namespace App\Http\Controllers;

use App\Models\BookedService;
use App\Models\Bookings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class BookingController extends Controller
{
    public function addBooking(Request $request){ //Todo: perform validations of data
        //Todo: book multiple services per one booking

        $bookingDetails = $request->except('_token','booked_service');
        $bookingDetails['customer_id'] = Auth::id();
        $bookedServices = $request->get('booked_service');

        try {
            DB::beginTransaction();
            $booking = Bookings::create($bookingDetails);
            //add booked service detail after adding booking
            BookedService::create([
                'booking_id'=>$booking->id,
                'agent_service_id'=>$bookedServices['agent_service_id'],
            ]);
            DB::commit();
            Alert::success('Booking Added Successfully', 'Thank you agent will get in touch soon');
        }catch (\Exception $e){
            DB::rollBack();
            throw $e;
            Alert::error('Booking Failed', 'An error occurred, Please try again');
        }
        return back();
    }

    public function customerBookings(){
        $bookings = Bookings::list()->where('b.customer_id',Auth::id())->get();
        if ($bookings->count() == 0){
            Alert::toast('"You don\'t currently have a booking."');
        }
        return view('pages.customers.customer-bookings',compact('bookings'));
    }
}
