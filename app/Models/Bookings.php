<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bookings extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeList()
    {
        return DB::table('bookings','b')
            ->join('booked_services as bs','b.id','=','bs.booking_id')
            ->join('agent_services as as','bs.agent_service_id','=','as.id')
//            ->join('services as s','as.service_id','=','s.id')
            ->join('users as agents','as.agent_id','=','agents.id')
            ->join('users as customers','b.customer_id','=','customers.id')
            ->leftJoin('users as cancellors','b.canceled_by','=','cancellors.id')
            ->select(['b.*','customers.sex','customers.phone_number as customer_phone',
                'agents.phone_number as agent_phone','b.status as booking_status'])
            ->selectRaw('CONCAT(agents.first_name, ", ", agents.last_name) as agent_name')
            ->selectRaw('CONCAT(customers.first_name, ", ", customers.last_name) as customer_name')
            ->selectRaw('CONCAT(cancellors.first_name, ", ", cancellors.last_name) as cancellor_name')
            ->selectRaw('(select count(*) from booked_services where booked_services.booking_id = b.id) as booked_services_count');

    }

    public function bookedServices()
    {
        return $this->hasMany(BookedService::class,'booking_id');
    }
}
