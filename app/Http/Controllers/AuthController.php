<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class AuthController extends Controller
{
    public function showLoginForm()
    {
        $email = null;

        // Check if the user is currently authenticated and has a remember token
        if (Auth::check() && Auth::user()->getRememberToken()) {
            // If so, get the user's email address
            $user = Auth::user();
            $email = $user->email;
        }
    
        return view('layout.login', compact('email'));
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            // Authentication successful
            if ($remember) {
                Auth::user()->setRememberToken(Str::random(60));
                Auth::user()->save();
            }
            return view('layout.home'); // Change 'home' to your desired home route
        }

        // Authentication failed
        return redirect()->back()->withErrors(['error' => 'Invalid credentials'])->withInput($request->except('password'));
    }
    public function index(){
        return view('layout.home');
    }
}
