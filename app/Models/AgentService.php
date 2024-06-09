<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AgentService extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopelist()
    {
        return DB::table('agent_services', 'ags')
            ->join('users as agents', 'ags.agent_id', '=', 'agents.id')
            ->join('services as s', 'ags.service_id', '=', 's.id')
            ->select(['ags.*','s.name as service_name'])
            ->selectRaw('CONCAT(agents.first_name, ", ", agents.last_name) as agent_name');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function agent()
    {
        return $this->belongsTo(User::class,'agent_id');
    }

    public function bookings()
    {
        return $this->hasMany(BookedService::class);
    }
}
