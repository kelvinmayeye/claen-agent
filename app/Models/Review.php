<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Review extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function scopelist()
    {
        return DB::table('reviews', 'r')
            ->join('users as customers','r.customer_id','=','customers.id')
            ->join('users as agents', 'r.agent_id', '=', 'agents.id')
            ->select(['r.*','customers.sex','customers.phone_number'])
            ->selectRaw('CONCAT(customers.first_name, ", ", customers.last_name) as customer_name')
            ->selectRaw("TIMESTAMPDIFF (YEAR, customers.dob, CURDATE()) as age")
            ->selectRaw('CONCAT(agents.first_name, ", ", agents.last_name) as agent_name');

    }
}
