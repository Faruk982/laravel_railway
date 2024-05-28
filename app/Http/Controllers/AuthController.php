<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class AuthController extends Controller
{
    public function showLoginForm()
    {
        $email = null;

        // // Check if the user is currently authenticated and has a remember token
        // if (Auth::check() && Auth::user()->getRememberToken()) {
        //     // If so, get the user's email address
        //     $user = Auth::user();
        //     $email = $user->email;
        // }
        Session::flush();
        return redirect()->route('Home.login');
    }

 

    public function login(Request $request)
    {
       // dd($request->all());
        // Validate input data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        //Session::put('user_email', $request->input('email'));
        // Retrieve user by email
        $user = User::where('email', $request->input('email'))->first();
    
        if ($user && Hash::check($request->input('password'), $user->password)) {
            // Authentication successful
            Session::put('user_id', $user->id);
            Session::put('user_email', $user->email);
            if ($request->has('remember')) {
                setcookie('remember_email', $user->email, time()+43200);
                setcookie('remember_password', $request->input('password'), time()+43200);
                // Set cookies for email and password
               
    
                return view('layout.home');
            }
            return view('layout.home');
        }
        Session::flash('error', 'Invalid credentials');
        // Authentication failedback()->withErrors
        return back()->withErrors(['error' => 'Invalid credentials'])->withInput($request->except('password'));
    }   
     public function index(){
        return view('layout.home');
    }
    public function contact(){
        return view('layout.contact');
    }
}
