<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\registration;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('rr');
    }

    public function create()
    {
        return view('layout.Registration');
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'fullName' => 'required',
            'email' => 'required|email|unique:registrations,email',
            'phoneNumber' => 'required',
            'nid' => 'required',
            'dob' => 'required|date',
            'hTown' => 'required',
            'passWord' => 'required|min:6',
            'cpassWord' => 'required|same:passWord',
            'gender' => 'required',
        ]);
        // dd($request);
        $data = [
            'fullName' => $validatedData['fullName'],
            'email' => $validatedData['email'],
            'phoneNo' => $validatedData['phoneNumber'], // Make sure to match the column name with the key from validated data
            'NID' => $validatedData['nid'], // Make sure to match the column name with the key from validated data
            'birthdate' => $validatedData['dob'], // Make sure to match the column name with the key from validated data
            'Hometown' => $validatedData['hTown'], // Make sure to match the column name with the key from validated data
            'password' => bcrypt($validatedData['passWord']),
            'gender' => $validatedData['gender'],
        ];

        try {
            $registration = new registration();
            $registration->fullName=$validatedData['fullName'];
            $registration->email =$validatedData['email'];
            $registration->phoneNo=$validatedData['phoneNumber'];
            $registration->NID=$validatedData['nid'];
            $registration->birthdate=$validatedData['dob'];
            $registration->Hometown=$validatedData['hTown'];
            $registration->password=$validatedData['passWord'];
            $registration->gender=$validatedData['gender'];
            $registration->save();
            return redirect()->route('Registration.index')->with('success', 'Registration successful!');
        } catch (\Exception $e) {
            // Log the error or handle it appropriately
            return back()->withInput()->with('error', 'Failed to register. Please try again.');
        }
    }
    public function update(){
        return registration::all();
    }
}
