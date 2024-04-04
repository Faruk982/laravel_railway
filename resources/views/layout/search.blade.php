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
    </style>
</head>
<body>
    <div class="booking-form-box">
        <form action="{{route('search.process')}}" method="post">
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
                    <button type="button" class="btn btn-primary">Cancel</button>     
                </div>
                <div class="input-grip">
                    <button type="submit" class="btn btn-primary">Show trains</button>     
                </div>
            </div>
        </form>
    </div>
</body>
</html>
