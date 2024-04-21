<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getAgents(){
        $agents = User::where('role','agent')->get();
        return view('pages.admin.all-agents',compact('agents'));
    }

    public function getCustomers(){
        $customers = User::where('role','customer')->get();
        return view('pages.admin.all-customers',compact('customers'));
    }
}
