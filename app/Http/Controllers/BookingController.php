<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route;
use App\Models\Train;
use App\Models\Seat;
use Illuminate\Support\Facades\DB;
class BookingController extends Controller
{
    public function index()
    {
        return view('layout.booking'); // Assuming you have a view named 'index.blade.php' inside the 'booking' folder
    }
    public function process(Request $request)
    {
        // dd($request->all());
        $seats = DB::table('seats')
            ->where('train_name', $request->input('train_name'))
            ->where('departure_time', $request->input('departure_time'))
            ->where('date', $request->input('date'))
            ->where('class', $request->input('class'))
            ->where('bogi', 'B')
            ->where('route', 'not like', '%' . $request->input('train_name') . '%')
            ->get();
    
        $matchingTrains = [];
        foreach ($seats as $route) {
            $matchingTrains[] = [
                'bogi' => 'B',
                'seat' => $request->input('date'), // Assuming there's a 'class' column in the trains table
            ];
        }
    
        // Pass all necessary data to the view
        return view('layout.booking', [
            'seats' => $matchingTrains,
            'train_name' => $request->input('train_name'),
            'date' => $request->input('date'),
            'class' => $request->input('class'),
            'departure_time' => $request->input('departure_time')
        ]);
    }
    
    public function sec_process(Request $request){
        $bogi = $request->input('selected_option');
        $trainName = $request->input('train_name');
        $departure_time=$request->input('departure_time');
     $date= $request->input('date');$class=$request->input('class');$route=$request->input('route');
        // Dump the data to inspect
        $seats = Seat::where('train_name', $request->input('train_name'))
        ->where('departure_time', $request->input('train_name'))
        ->where('date', $request->input('date'))
        ->where('class', $request->input('class'))
        ->where('bogi', $request->input('bogi'))
        ->where('route', 'not like', '%' . $request->input('train_name') . '%')
        ->get();
        // dd([
        //     'selected_option' => $selectedOption,
        //     'train_name' => $trainName
        // ]);
        return view('layout.booking', ['seats' => $seats]);
    }
}
