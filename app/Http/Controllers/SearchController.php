<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;
use App\Models\Route;
use App\Models\Train;
use App\Models\Seat;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['message' => 'User not authenticated'], 401);
        }
        // $tickets = Ticket::where('email', $user->email)
        //           ->get();
        // if($tickets){
        //     return view('layout.search',['message' => 'You can not Purchase more than once for a particular date']);
        // }
        // Extract unique departure dates from the purchased tickets
        $purchasedDates = Ticket::where('email', $user->email)
        ->pluck('departure_date') // Assuming 'departure_date' is the date column
        ->toArray();
    // Pass the departure dates to the view
   // dd($purchasedDates); 
    return view('layout.search', ['purchasedDates' => $purchasedDates]);
    }

    public function searchTrains(Request $request)
    {
        // dd($request->all());
        $from = $request->input('from');
        $to = $request->input('to');
        $date=$request->input('departing');
       
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
        'route' =>$route->route_generator,
        'date'=>$date,
    ];
}
                
            }
        }

        // Pass the matching trains to the view and render the HTML table
        return view('layout.table', ['matchingTrains' => $matchingTrains]);
    }
}
