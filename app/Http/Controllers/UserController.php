<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function getRegisterPage(){
        return view('auth.register');
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
           Alert::info('Error', 'We are currently working on this feature');
            return back();
        }

        if (User::create($user)) {
            Alert::success('Register Successfully', 'Please login to continue');
            return redirect()->route('login');

        }
        return back();
    }
}
