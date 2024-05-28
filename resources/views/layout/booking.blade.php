<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/booking.css') }}">
    <style>
        body {
            min-height: 100vh;
            background: url("{{ asset('images/table1.jpg') }}") center / cover;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .selecting-book {
            margin-top: 30px;
            margin-bottom: 30px;
        }
        h2{
            color: white;
        }
    </style>
</head>
<body>

<div class="all_here">

    <form id="myForm" method="post" action="{{ route('booking.second') }}" onsubmit="return handleFormSubmit()">
        @csrf
        <div class="plane">
            <div class="cockpit">
                <h1>Please select a seat (Maximum 3 seats)</h1>
                <label for="" class="sh">Selected</label>
                <label for="" class="ss">Available</label>
            </div>
            <div class="exit exit--front fuselage"></div>
            <ol class="cabin fuselage">
                @for ($row = 1; $row <= 10; $row++)
                    <li class="row row--{{ $row }}">
                        <ol class="seats" type="A">
                            @for ($col = 'A'; $col <= 'F'; $col++)
                                @php
                                    $seatId = $row . $col;
                                @endphp
                                <li class="seat">
                                    <input type="checkbox" id="{{ $seatId }}" name="seat[]" value="{{ $seatId }}" onchange="handleSeatSelection(this)" />
                                    <label for="{{ $seatId }}">{{ $seatId }}</label>
                                </li>
                            @endfor
                        </ol>
                    </li>
                @endfor
            </ol>
            <div class="exit exit--back fuselage"></div>
            <div class="selecting-book">
                <div class="form-data">
                    <ul id="form-data-list"></ul>
                </div>
                <label for="cars">Choose a car:</label>
                <select name="bogi" id="bogi">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                </select>
            </div>
            <div class="clearfix">
                <input type="hidden" name="train_name" value="{{ $train_name }}">
                <input type="hidden" name="date" value="{{ $date }}">
                <input type="hidden" name="class" value="{{ $class }}">
                <input type="hidden" name="route" value="{{ $route }}">
                <input type="hidden" name="departure_time" value="{{$departure_time}}">
                <button type="button" id="cancelbtn" class="cancelbtn">Cancel</button>
                <button type="submit" class="registerbtn" >BOOK</button>
            </div>
        </div>
    </form>
</div>
<script>
    document.getElementById('cancelbtn').addEventListener('click', function() {
        window.location.href = "{{ route('search.index') }}";
    });
</script>
<script>
    function handleSeatSelection(checkbox) {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
        var maxSeats = 3;

        if (checkboxes.length > maxSeats) {
            checkbox.checked = false;
            alert('You can only select up to ' + maxSeats + ' seats.');
        }
    }
</script>
<script>
        function handleFormSubmit() {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');

        if (checkboxes.length === 0) {
            alert('Please select at least one seat.');
            return false; // Prevent form submission
        }

        return true; // Allow form submission
    }
</script>
<script>
    

    document.addEventListener('DOMContentLoaded', function() {
        var seats = {!! json_encode($seats) !!};

        function disableSeatsForSelectedBogi(selectedBogi) {
            seats.forEach(function(seat) {
                if (seat.bogi === selectedBogi) {
                    var checkbox = document.getElementById(seat.seat);
                    if (checkbox) {
                        checkbox.disabled = true;
                    }
                }
            });
        }

        function enableAllSeats() {
            var allCheckboxes = document.querySelectorAll('input[type="checkbox"]');
            allCheckboxes.forEach(function(checkbox) {
              checkbox.checked = false;
                checkbox.disabled = false;
            });
        }

        var initialBogiSelect = document.getElementById('bogi');
        var initialSelectedBogi = initialBogiSelect.value;
        disableSeatsForSelectedBogi(initialSelectedBogi);

        initialBogiSelect.addEventListener('change', function() {
            var selectedBogi = this.value;
            enableAllSeats();
            disableSeatsForSelectedBogi(selectedBogi);
        });
    });
</script>
</body>
</html>
