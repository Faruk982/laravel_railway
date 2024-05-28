<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('assets/profile.css') }}">

    <!-- FontAwesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
   
</head>
<body>
    <!-- Navbar top -->
    <div class="navbar-top">
        <div class="title">
            <h1>Contact Information</h1>
        </div>

        <!-- Navbar -->
        <!-- <ul>
            <li>
                <a href="#message">
                    <span class="icon-count">29</span>
                    <i class="fa fa-envelope fa-2x"></i>
                </a>
            </li>
            <li>
                <a href="#notification">
                    <span class="icon-count">59</span>
                    <i class="fa fa-bell fa-2x"></i>
                </a>
            </li>
            <li>
                <a href="#sign-out">
                    <i class="fa fa-sign-out-alt fa-2x"></i>
                </a>
            </li>
        </ul> -->
        <!-- End -->
    </div>
    <!-- End -->

    <!-- Sidenav -->
    <!-- <div class="sidenav">
        <div class="profile">
            <img src="https://imdezcode.files.wordpress.com/2020/02/imdezcode-logo.png" alt="" width="100" height="100">

            <div class="name">
                ImDezCode
            </div>
            <div class="job">
                Web Developer
            </div>
        </div>

        <div class="sidenav-url">
            <div class="url">
                <a href="#profile" class="active">Profile</a>
                <hr align="center">
            </div>
            <div class="url">
                <a href="#settings">Settings</a>
                <hr align="center">
            </div>
        </div>
    </div> -->
    <!-- End -->

    <!-- Main -->
    <div class="main">
        <h2>Contact US</h2>
        <div class="card">
            <div class="card-body">
              
                <p>
        If you encounter any issues or have questions, please feel free to contact us:
    </p>
    <p>
        <strong>Email:</strong> <a href="uf61021@gmail.com">uf61021@gmail.com</a><br>
        <strong>Phone:</strong> +8801740976043 (9:00 AM - 5:00 PM, Mon - Fri)
    </p>

                <button type="button" id="HomeButton">Return Home</button>
               
            </div>
        </div>

        <!-- <h2>SOCIAL MEDIA</h2> -->
        <!-- <div class="card">
            <div class="card-body">
                <i class="fa fa-pen fa-xs edit"></i>
                <div class="social-media">
                    <span class="fa-stack fa-sm">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-facebook fa-stack-1x fa-inverse"></i>
                    </span>
                    <span class="fa-stack fa-sm">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                    </span>
                    <span class="fa-stack fa-sm">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                    </span>
                    <span class="fa-stack fa-sm">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-invision fa-stack-1x fa-inverse"></i>
                    </span>
                    <span class="fa-stack fa-sm">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                    </span>
                    <span class="fa-stack fa-sm">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-whatsapp fa-stack-1x fa-inverse"></i>
                    </span>
                    <span class="fa-stack fa-sm">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-snapchat fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
            </div>
        </div> -->
    </div>
    <!-- End -->
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the button element
        var contactButton = document.getElementById('HomeButton');

        // Add click event listener to the button
        contactButton.addEventListener('click', function() {
            // Redirect to the history page
            window.location.href = "{{ route('Home.index') }}";
        });
    });
</script>
</body>
</html>