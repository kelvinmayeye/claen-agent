<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\BookedService;
use App\Models\Bookings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function home() {
        $agentBookings = collect();
        $customerBookings = collect();
        if (auth()->user()->role == 'agent') {
            $agentBookings = Bookings::list()->where('agents.id', auth()->id())->distinct()->get();

            if ($agentBookings->isNotEmpty()) {
                foreach ($agentBookings as $booking) {
                    $booking->booked_services = BookedService::list()->where('booking_id', $booking->id)->get();
                }
            }
        }

        if (auth()->user()->role == 'customer') {
            $customerBookings = Bookings::list()->where('customers.id', Auth::id())->distinct()->get();

            if ($customerBookings->isNotEmpty()) {
                foreach ($customerBookings as $c_booking) {
                    $c_booking->booked_services = BookedService::list()->where('booking_id', $c_booking->id)->get();
                }
            }
        }
//        return $customerBookings;
        return view('pages.shared.home', compact('agentBookings','customerBookings'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function login(Request $request)
    {
        $agentBookings = new \stdClass();
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

                    return redirect()->intended('home');
        }
        Alert::error('Login Failed', 'Wrong Email or Password');
        return back();
    }
}
