<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route;
use App\Models\Train;
use App\Models\Seat;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index()
    {
        // Logic to render the search page
        return view('layout.search'); // Assuming you have a view named search/index.blade.php
    }

    public function searchTrains(Request $request)
    {
        $from = $request->input('from');
        $to = $request->input('to');

        // Fetch routes from the database based on the 'from' and 'to' stations
        $routes = Route::where('departure_station', $from)
            ->where('arrival_station', $to)
            ->get();
           
        // Array to store matching trains
        $matchingTrains = [];

        // Iterate over each route
        foreach ($routes as $route) {
            // Fetch all matching trains for the current route
            $trains = DB::table('trains')
                ->where('route', 'like', '%' . $route->route_generator . '%')
                ->get();
           
            $numCapitalLetters = preg_match_all('/[A-Z]/', $route->route_generator);

            // Multiply the number of capital letters by 100
            $pricePerCapitalLetter = 100;
            $price = $numCapitalLetters * $pricePerCapitalLetter;
            // Add matching trains to the array
            foreach ($trains as $train) {
                $seatavailable = DB::table('seats')
    ->where('train_name', $train->train_name)
    ->where('departure_time', $train->departure_time)
    ->where('date', $request->input('date'))
    ->where('route', 'not like', '%' . $route->route_generator . '%')
    ->count();
$seatavailable=300-$seatavailable;
if($seatavailable>0){
    $matchingTrains[] = [
        'train_name' =>  $train->train_name,
        'departure_time' => $train->departure_time,
        'departure_station' =>  $from,
        'arrival_station' => $to,
        'class' => $request->input('travel_class'),
        'seat available' =>$seatavailable,
        'price' =>$price, // Assuming there's a 'class' column in the trains table
    ];
}
                
            }
        }

        // Pass the matching trains to the view and render the HTML table
        return view('layout.table', ['matchingTrains' => $matchingTrains]);
    }
}
