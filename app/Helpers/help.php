<?php

use App\Models\Bookings;

function getInitials($text) {
    $words = explode(' ', $text);
    $initials = '';

    foreach ($words as $word) {
        $initials .= strtoupper(substr($word, 0, 1));
    }

    return $initials;
}

function allagentbookingCount(){
    return Bookings::where('agent_id',Auth::id())->count();
}

function mycustomercount(){
    return Bookings::distinct('customer_id')->count('customer_id');
}

function pendingBookingCount(){
    return Bookings::where('status','pending')->count();
}

function confirmedBookingCount(){
    return Bookings::where('status','confirmed')->count();
}
