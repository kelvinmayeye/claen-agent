<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function getRegisterPage(){
        return view();
    }
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'last_name' => 'required|string',
            'role' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|string|max:20',
            'sex' => 'required|string|in:male,female',
            'password' => 'required|string|confirmed',
            'password_confirmation' => 'required|string',
        ]);
        $user = $request->except('_token', 'password_confirmation');
        if ($validator->fails()) {
//            Alert::error('Error', 'Password didnt match');
            return back()->with('error','password didnt match');
        }

        if (User::create($user)) {
//            Alert::success('Register Successfully', 'Please login to continue');
            return redirect()->route('login');

        }
        return back();
    }
}
