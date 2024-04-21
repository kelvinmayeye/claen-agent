<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }


        $newUser = DB::table('users')->insert([
            'first_name' => $request->input('first_name'),
            'middle_name' => $request->input('middle_name'),
            'last_name' => $request->input('last_name'),
            'role' => $request->input('role'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'sex' => $request->input('sex'),
            'password' => Hash::make($request->input('password')),
            'created_at'=>now()
        ]);
        if($newUser){
            Alert::success('Register Successfully', 'Please login to continue');
            return redirect()->route('login');
        } else {
            Alert::error('Registration Failed', 'An error occurred while registering. Please try again.');
            return back();
        }
    }

    public function getProfilePage(){
        $user = User::find(Auth::id());
        return view('pages.users.user-profile',compact('user'));
    }
}
