<?php

namespace App\Http\Controllers;
use DateTime;
use Illuminate\Http\Request;
use App\Models\Route;
use App\Models\Train;
use App\Models\Seat;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class BookingController extends Controller
{
    public function index()
    {
        return view('layout.booking'); // Assuming you have a view named 'index.blade.php' inside the 'booking' folder
    }
    public function process(Request $request)
{
    $matchingTrains = [];

    // Iterate over each bogi from A to I
    for ($bogi = 'A'; $bogi <= 'E'; $bogi++) {
        $seats = Seat::where('train_name', $request->input('train_name'))
        ->where('Departure_time', $request->input('departure_time'))
        ->where('date', $request->input('date'))
        ->where('class', $request->input('class'))
        ->where('bogi', $bogi)
        ->where('route', 'not like', '%' . $request->input('route') . '%')
        ->get();

        foreach ($seats as $route) {
            $matchingTrains[] = [
                'bogi' => $bogi,
                'seat' => $route->seat,
            ];
        }
    }

    // Pass all necessary data to the view
    return view('layout.booking', [
        'seats' => $matchingTrains,
        'train_name' => $request->input('train_name'),
        'date' => $request->input('date'),
        'class' => $request->input('class'),
        'departure_time' => $request->input('departure_time'),
        'route' => $request->input('route')
    ]);
}
public function sec_process(Request $request)
    {
        $requestData = $request->all();

        // Extract data from the request
        $date = $requestData['date'];
        $class = $requestData['class'];
        $bogi = $requestData['bogi'];
        $seats = $requestData['seat']; // Assuming this is an array of seat IDs
        $departureTime = $requestData['departure_time'];
        $trainName = $requestData['train_name'];

        try {
            $matchingSeats = [];

            // Find the train based on train name and departure time
            $train = Train::where('train_name', $trainName)
                ->where('departure_time', $departureTime)
                ->first();

            if (!$train) {
                throw new \Exception('Train not found.');
            }

            $requestedRoute = $requestData['route'];
            $currentRoute = $train->route;
            $newRoute = str_replace($requestedRoute, '', $currentRoute);
            $ff = '';

            // Iterate over each seat ID and perform the query
            foreach ($seats as $seatId) {
                $ff = $ff . '' . $seatId;
                $ff = $ff . ' ';
                $seat = Seat::where('date', $date)
                    ->where('class', $class)
                    ->where('bogi', $bogi)
                    ->where('seat', $seatId)
                    ->where('Departure_time', $departureTime)
                    ->where('train_name', $trainName)
                    ->first();

                if (!$seat) {
                   // dd($request->all());
                    // If seat is not found, create a new record
                    $newSeat = new Seat();
                    $newSeat->date = $date;
                    $newSeat->class = $class;
                    $newSeat->bogi = $bogi;
                    $newSeat->seat = $seatId;
                    $newSeat->route = $newRoute; // Set the route from request
                    $newSeat->train_name = $trainName; // Set the train_name from request
                    $newSeat->Departure_time = $departureTime;
                    $newSeat->save();

                    // Add the newly inserted seat to the result array
                    $matchingSeats[] = $newSeat;
                } else {
                    $requestedRoute = $requestData['route'];
                    $currentRoute = $seat->route;
                    $newRoute = str_replace($requestedRoute, '', $currentRoute);
                    $seat->route = $newRoute;
                    $seat->save();
                    // Add the existing matching seat to the result array
                    $matchingSeats[] = $seat;
                }
            }

            $numOfCapitals = preg_match_all('/[A-Z]/', $requestedRoute);

            // Calculate updated departure time
            $departureDateTime = new DateTime($departureTime);
            $departureDateTime->modify('+' . $numOfCapitals . ' hours');
            $updatedDepartureTime = $departureDateTime->format('H:i:s');

            $user_id = session('user_id');
            $user = User::find($user_id);

            if (!$user) {
                return response()->json(['message' => 'User not authenticated'], 401);
            }

            // Find the corresponding route for the requested route
            $route = Route::where('route_generator', $requestedRoute)->first();

            if (!$route) {
                throw new \Exception('Route not found.');
            }

            $departureStation = $route->departure_station;
            $arrivalStation = $route->arrival_station;

            // Create a new ticket instance and fill in the required fields
            $ticket = new Ticket();
            $ticket->email = $user->email; // Assuming user has an email attribute
            $ticket->name = $user->fullName; // Set ticket name from user's name
            $ticket->nid = $user->NID; // Set ticket NID from user's NID
            $ticket->train_name = $trainName;
            $ticket->price = ($numOfCapitals * 100);
            $ticket->class = $class;
            $ticket->departure_station = $departureStation; // Set departure station from route
            $ticket->arrival_station = $arrivalStation; // Set arrival station from route
            $ticket->departure_time = $updatedDepartureTime;
            $ticket->departure_date = $date;
            $ticket->bogi = $bogi;
            $ticket->seat = $ff; // Set seat from matching seat
            $ticket->booking_timestamp = now(); // Set booking timestamp

            // Save the ticket record
            $ticket->save();

            // Pass ticket data to the view
            return view('layout.ticket', ['ticket' => $ticket]);
        } catch (\Exception $e) {
            // Handle any errors gracefully
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function third_process(Request $request)
    {
        $requestData = $request->all();
      //   dd($requestData);
        // Extract specific request data
        $email = $requestData['email'] ?? null;
        $trainName = $requestData['train_name'] ?? null;
        $departureDate = $requestData['departure_date'] ?? null;
    
        // Ensure required data is present
        if (!$email || !$trainName || !$departureDate) {
            // Handle missing data, return response or redirect as needed
            return response()->json(['error' => 'Required data missing'], 400);
        }
    
        try {
            // Retrieve the first ticket based on the provided criteria
            $ticket = Ticket::where('email', $email)
                ->where('train_name', $trainName)
                ->where('departure_date', $departureDate)
                ->first();
    
            // Check if a ticket was found
            if (!$ticket) {
                // Handle case where no ticket matches the criteria
                return response()->json(['message' => 'No matching ticket found'], 404);
            }
    
            // Return the retrieved ticket
            return view('layout.ticket', ['ticket' => $ticket]);
        } catch (\Exception $e) {
            // Handle any exceptions
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
 }
