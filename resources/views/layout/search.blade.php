<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bangladesh Railway</title>
    <link rel="stylesheet" href="{{asset('assets/search.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            /* background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(train2.jpg); */
            background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url("{{asset('images/train2.jpg')}}");
            background-size: cover;
            background-position: center;
        }
        h3{
            color: white;
            text-align: center;
            margin-bottom: 0;
            margin-top: 30;
            margin-left: 0;
        }
    </style>
</head>
<body>
<div class="navbar">
        <img src="{{ asset('images/logo1.png') }}" alt="logo" class="logo">
        <h3>BANGLADESH RAILWAY</h3>
        <ul>
            <li><a href="{{ route('home.index') }}">HOME</a></li>
            <li><a href="{{ route('search.index') }}">BOOKING</a></li>
            <li><a href="{{ route('profile.index') }}">PROFILE</a></li>
            <li><a href="{{ route('admin.index') }}">Admin</a></li>
            <!-- <li><a href="{{ route('history.index') }}">Purchase History</a></li> -->
            <li><a href="{{ route('login.index') }}">LOGOUT</a></li>
        </ul>
       </div>
      
    <div class="booking-form-box">  
   
        <form id="searchForm"  action="{{route('search.process')}}" method="post">
            @csrf <!-- Laravel CSRF token -->
            <div class="booking-form">
                <label for="from">From:</label>
                <input type="text" class="form-control" id="from" name="from" placeholder="City of Railway station">
                <label for="to">To:</label>
                <input type="text" class="form-control" id="to" name="to" placeholder="City of Railway station">
                <div class="input-grip">
                    <label for="departing">Departing</label>
                    <input type="date" class="form-control select-date" id="departing" name="departing">
                </div>
                <div class="input-grip">
                    <label for="travel_class">Travel Class</label>
                    <select name="travel_class" class="custom-select" id="travel_class">
                        <option value="snigdha">Snigdha</option>
                        <option value="s_chair">S_chair</option>
                        <option value="f_chair">F_chair</option>
                    </select>
                </div>
                <div class="input-grip">
                    <button type="reset" class="btn btn-primary">Cancel</button>     
                </div>
                <div class="input-grip">
                    <button type="submit"  id="submitBtn" class="btn btn-primary">Show trains</button>     
                </div>
            </div>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    var today = new Date();
    var maxDate = new Date();
    maxDate.setDate(today.getDate() + 10); // Set maximum date to 10 days from today

    var inputDeparting = document.getElementById('departing');
    inputDeparting.setAttribute('min', formatDate(today)); // Set minimum date
    inputDeparting.setAttribute('max', formatDate(maxDate)); // Set maximum date
});

function formatDate(date) {
    var yyyy = date.getFullYear();
    var mm = String(date.getMonth() + 1).padStart(2, '0'); // January is 0
    var dd = String(date.getDate()).padStart(2, '0');
    return `${yyyy}-${mm}-${dd}`;
}

    </script>

    <script>
     document.addEventListener('DOMContentLoaded', function() {
    var purchasedDates = @json($purchasedDates);
    var submitBtn = document.getElementById('submitBtn');
    var form = document.getElementById('searchForm');

    submitBtn.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default form submission

        var departingDate = document.getElementById('departing').value;
        if (purchasedDates.includes(departingDate)) {
            alert('You cannot book for this date as you have already purchased a ticket for it.');
        } else {
            // Proceed with form submission
            form.submit();
        }
    });
});

    </script>
</body>
</html>
