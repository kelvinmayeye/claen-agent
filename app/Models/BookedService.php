<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BookedService extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopelist()
    {
        return DB::table('booked_services','bs')
            ->join('bookings as b','b.id','=','bs.booking_id')
            ->join('agent_services as as','bs.agent_service_id','=','as.id')
            ->join('users as agents','as.agent_id','=','agents.id')
            ->join('services as s','as.service_id','=','s.id')
            ->select(['bs.*','s.name as service_name',]);
    }


    public function Booking()
    {
        return $this->belongsTo(Bookings::class,'booking_id');
    }

    public function agentService()
    {
        return $this->belongsTo(AgentService::class);
    }
}
