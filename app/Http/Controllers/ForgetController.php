<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgetController extends Controller
{
    public function index(){
        return view('layout.Forget');
    }
}
