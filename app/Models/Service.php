<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Service extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeList()
    {
        return DB::table('services','s')
            ->leftJoin('agent_services as as','as.service_id','=','s.id')
            ->leftJoin('booked_services as bs','bs.agent_service_id','=','as.id')
            ->leftJoin('bookings as b','bs.booking_id','=','b.id')
            ->leftJoin('users as agents','as.agent_id','=','agents.id')
            ->leftJoin('users as customers','b.customer_id','=','customers.id')
            ->leftJoin('users as cancellors','b.canceled_by','=','cancellors.id')
            ->select(['s.*','customers.sex','customers.phone_number as customer_phone',
                'agents.phone_number as agent_phone','b.status as booking_status'])
            ->selectRaw('CONCAT(agents.first_name, ", ", agents.last_name) as agent_name')
            ->selectRaw('CONCAT(customers.first_name, ", ", customers.last_name) as customer_name')
            ->selectRaw('CONCAT(cancellors.first_name, ", ", cancellors.last_name) as cancellor_name')
            ->selectRaw('(select count(*) from booked_services where booked_services.booking_id = b.id) as booked_services_count');

    }


}
