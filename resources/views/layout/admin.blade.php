<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/admin.css') }}">
</head>
<body>
<header>
   <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
</header>

<h1>Admin Panel</h1>

<div class="frame">
    <h2>Here New train can be added with a new route  and to update the admin password</h2>
    <button id="addTrainBtn" class="custom-btn btn-5">Add Train</button>
    <!-- <button class="custom-btn btn-7">Add Route</button> -->
    <button id="UpdatePassword" class="custom-btn btn-3"><span>Update Password</span></button>
    <button id="Home" class="custom-btn btn-6"><span>Return Home</span></button>
    <!-- <button id="Logout" class="custom-btn btn-5"><span>Log out</span></button> -->
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#addTrainBtn').click(function() {
            window.location.href = "{{ route('admin.train-form') }}";
        });
        $('#UpdatePassword').click(function() {
            window.location.href = "{{ route('admin.update1') }}"; // Replace 'update.password' with your actual route name
        });
        $('#Home').click(function() {
            window.location.href = "{{ route('home.index')  }}"; // Replace 'update.password' with your actual route name
        });
    });

    // // Prevent navigation through browser back button
    // window.addEventListener('popstate', function (event) {
    //     window.location.href = "{{ route('Home.index') }}";
    // });
</script>

</body>
</html>
