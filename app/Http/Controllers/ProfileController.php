<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function showProfile()
    {
        // Retrieve data from the database
        $user = Auth::user();

        // Pass the user data to the view
        return view('layout.profile', ['user' => $user]);
    }
}
