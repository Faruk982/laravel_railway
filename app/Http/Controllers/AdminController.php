<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use App\Models\Route;
use App\Models\Train;
class AdminController extends Controller
{
    public function index()
    {
        return view('layout.loginAdmin'); // Assuming you have a view named 'index.blade.php' inside the 'booking' folder
    }
    public function showAddTrainForm(){
        return view('layout.addTrain');
    }
    public function checker(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'password' => 'required' // Assuming 'password' is the name of your input field
    ]);

    // Retrieve the password from the request
    $password = $request->input('password');

    // Check if the password exists in the admin table
    $admin = Admin::where('password', $password)->first();

    if (!$admin) {
        // If the password does not exist, redirect back with a message
        return redirect()->back()->with('error', 'Authentication failed.');
    }
    Session::put('admin', $request->input('password'));
    // If the password exists, proceed with your logic here
    // For example:
    return view('layout.admin');
}
public function AfterTrainAdd(Request $request){
    // $validatedData = $request->validate([
    //     'train_name' => 'required|string|max:255',
    //     'departure_time' => 'required|date_format:H:i',
    //     'route' => 'required|string|regex:/^[A-Z][a-z]+-[A-Z][a-z]+$/'
    // ]);
    // Retrieve input data
   // dd($request);
    $trainName = $request->input('train_name');
    $departure = $request->input('departureTime');
    //dd($departure);
    $formattedDeparture = date('H:i:s', strtotime($departure));
    $route = $request->input('route');

    // Check if train with the same route exists
    $existingTrain =  Train::
    where('train_name', $trainName)
    ->where('departure_time', $formattedDeparture)
    ->first();;

    // If train with the same route exists, show an alert and return
    if ($existingTrain) {
       // dd($request);
       //echo '<script>alert("Train with the same route already exists.");</script>';
       return back()->withErrors(['route' => 'Train with the same time already exists.']);
    }

    // Create a new train instance
   //dd($formattedDeparture);
    $train = new Train();
    $train->train_name = $trainName;
    $train->departure_time = $formattedDeparture;
    $train->route = $route;
    $train->save();
    $routeSegments = $this->generateRouteSegments($route);

    // Save the route segments in the Route table
    foreach ($routeSegments as $segment) {
        $routeEntry = new Route();
        $routeEntry->departure_station = $segment['departure'];
        $routeEntry->arrival_station = $segment['arrival'];
        $routeEntry->route_generator = $segment['route_generator'];
        $routeEntry->save();
    }
//  //   echo '<script>alert("Ttttt.");</script>';
    // Redirect with success message or any further action
    return view('layout.admin');
}
private function generateRouteSegments($route)
{
    // Extract capitalized words
    preg_match_all('/[A-Z][a-z]*/', $route, $matches);
    $places = $matches[0];

    $segments = [];

    // Generate all possible route segments
    for ($i = 0; $i < count($places); $i++) {
        for ($j = $i + 1; $j < count($places); $j++) {
            $routeGenerator = implode('', array_slice($places, $i, $j - $i + 1));
            $segments[] = [
                'departure' => $places[$i],
                'arrival' => $places[$j],
                'route_generator' => $routeGenerator,
            ];
        }
    }

    return $segments;
}
public function update(Request $request){
    $admin = Admin::first();
    if($admin){
        // Set the password attribute with the value from the request
        $admin->password = $request->password;
        
        // Save the updated admin record
        $admin->save();
        Session::forget('admin');

        // Redirect or return a response as needed
        return redirect()->route('admin.index');
    }
    
    return redirect()->route('admin.index');

}
public function indexx(){
    return view('layout.updateAdminPassword');
}
}
