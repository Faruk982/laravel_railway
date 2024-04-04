<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        return view('layout.booking'); // Assuming you have a view named 'index.blade.php' inside the 'booking' folder
    }
}
