<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        // Get the currently authenticated user
        $user = Auth::user();

        if ($user) {
            // Retrieve tickets related to the current user's email
            $tickets = Ticket::where('email', $user->email)->get();

            // Pass the retrieved tickets to a view for display
            return view('layout.history', ['ticket' => $tickets]);
        } else {
            // Handle the case when user is not authenticated
            return redirect()->route('login')->with('error', 'Please log in to view your history.');
        }
    }
}
