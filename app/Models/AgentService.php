<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentService extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function agent()
    {
        return $this->belongsTo(User::class);
    }
    public function bookings()
    {
        return $this->hasMany(BookedService::class);
    }
}
