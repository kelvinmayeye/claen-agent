<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookedService extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function Booking()
    {
        return $this->belongsTo(Bookings::class,'booking_id');
    }

    public function agentService()
    {
        return $this->belongsTo(AgentService::class);
    }
}
