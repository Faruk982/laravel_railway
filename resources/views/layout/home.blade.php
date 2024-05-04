<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="hstyl.css"> -->
    <title>Bangladesh Railway</title>
    <script src="https://kit.fontawesome.com/290cdb0382.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('assets/home.css')}}">
    <style>
        .container {
    width: 100%;
    height: 100vh;
    background-image: linear-gradient(rgb(0, 0, 0, 0.75), rgb(0, 0, 0, 0.75)), url("{{ asset('images/train1.jpg') }}");
    background-size: cover;
    background-position: center;
}
    </style>

</head>
<body>
    <div class="container">
       <div class="navbar">
        <img src="{{ asset('images/logo1.png') }}" alt="logo" class="logo">
        <ul>
            <li><a href="{{ route('home.index') }}">HOME</a></li>
            <li><a href="{{ route('search.index') }}">BOOKING</a></li>
            <li><a href="{{ route('profile.index') }}">PROFILE</a></li>
            <!-- <li><a href="{{ route('history.index') }}">Purchase History</a></li> -->
            <li><a href="{{ route('login.index') }}">LOGOUT</a></li>
        </ul>
       </div>   
    </div>
    <div class="content">
        <h1>Bangladesh Railway</h1>
        <p>Welcome to the Bangladesh Railway, your gateway to convenient and<br>reliable train travel across the country.</p>
        <div>
            <button type="button"><span></span>Contact Us</button>
        </div>
        
    </div>
    <div class="copyright">
        <p ><a href="#">Terms and conditions </a>| <a href="#">Privacy </a></p>
        <p><br><i class="fa-solid fa-train"></i> Bangladesh Railway</p>
       
    </div>
    <!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the button element
        var contactButton = document.getElementById('HistoryButton');

        // Add click event listener to the button
        contactButton.addEventListener('click', function() {
            // Redirect to the history page
            window.location.href = "{{ route('history.index') }}";
        });
    });
</script> -->

</body>
</html>