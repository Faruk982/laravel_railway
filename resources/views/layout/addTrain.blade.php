<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/290cdb0382.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/login.css') }}">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url("{{ asset('images/login.jpg') }}") no-repeat;
            background-size: cover;
            background-position: center;
        }
        .alert.alert-danger {
    color: red;
    margin-top: 30px;
    padding: 15px;
    border-radius: 5px;
    border: 1px solid red;
    background-color: #f8d7da; /* Light red background color */
}

    </style>
</head>
<body>
    <div class="wrapper">
        <form method="post" id="TrainForm" action="{{ route('addTrain.post') }}">
        @csrf
            <h1>Add Train and Route</h1>
            <div class="input-box">
                <input type="text" name="train_name" placeholder="Train Name" required>
            </div>
            <div class="input-box">
                <input type="time" id="departureTime" name="departureTime" placeholder="Departure time" required>
            </div>
            <div class="input-box">
                <input id="routeInput" name="route" type="text" placeholder="Route (e.g., City1-City2-City3)" required pattern="([A-Z][a-z]+)(-[A-Z][a-z]+)+">
            </div>
            <button type="submit" class="btn">Submit</button>
        </form>
        @if($errors->any())
    <div class="alert alert-danger">
        {{ $errors->first() }}
    </div>
@endif
    </div>

    <script>
        document.getElementById('TrainForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting

            // Get the input value for route
            var routeInput = document.getElementById('routeInput').value;

            // Remove any leading or trailing whitespace
            routeInput = routeInput.trim();

            // Split the input by the hyphen
            var cities = routeInput.split('-');

            // Check if there are at least two cities
            if (cities.length < 2) {
                alert('Please enter at least two cities separated by a hyphen.');
                return; // Stop the submission process
            }

            // Get the input value for departure time
            var departureTimeInput = document.getElementById('departureTime').value;

            // Split the input by the colon
            var timeParts = departureTimeInput.split(':');

            // Convert the hour part to 24-hour format
            var hour = parseInt(timeParts[0], 10);
            if (hour < 10) {
                hour = '0' + hour; // Add leading zero for single-digit hours
            }

            // Construct the 24-hour format time string
            var formattedTime = hour + ':' + timeParts[1];

            // Update the input value with the formatted time
            document.getElementById('departureTime').value = formattedTime;

            // Remove any hyphens from the input value
            routeInput = routeInput.replace(/-/g, '');

            // Update the input value with hyphens removed
            document.getElementById('routeInput').value = routeInput;

            // Proceed with form submission
            this.submit();
        });
    </script>
</body>
</html>
