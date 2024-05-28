<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
class ProfileController extends Controller
{
    public function showProfile()
    {
        // Retrieve data from the database
        
        $user_id = session('user_id');
            $user = User::find($user_id);

        // Pass the user data to the view
        return view('layout.profile', ['user' => $user]);
    }
}
