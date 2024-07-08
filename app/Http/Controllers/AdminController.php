<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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

    public function changeUserStatus($id)
    {
        $user = User::find($id);
        if ($user) {
            if ($user->status === 'active') {
                $user->update(['status'=>'inactive']);
            } else {
                $user->update(['status'=>'active']);
            }
            Alert::success('User status updated successfully','');
            session()->flash('status', 'User status updated successfully.');
        } else {
            Alert::error('User not found','Failed to change status');
            session()->flash('error', 'User not found.');
        }

        return back();
    }
}
