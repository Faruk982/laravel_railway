<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Information</title>
    <link rel="stylesheet" href="{{ asset('assets/profile.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
</head>
<body>
    <div class="main">
        <h2>Ticket Information</h2>
        <div class="card">
            <div class="card-body" id="invoice"> <!-- Added id="invoice" to the card-body -->
                <table>
                    <tbody>
                        <!-- Ticket information rows -->
                        <tr>
                            <td>Passenger Name</td>
                            <td>:</td>
                            <td>{{ $ticket->name }}</td>
                        </tr>
                        <tr>
                            <td>NID</td>
                            <td>:</td>
                            <td>{{ $ticket->nid }}</td>
                        </tr>
                        <tr>
                            <td>Train Name</td>
                            <td>:</td>
                            <td>{{ $ticket->train_name }}</td>
                        </tr>
                        <tr>
                            <td>Class</td>
                            <td>:</td>
                            <td>{{ $ticket->class }}</td>
                        </tr>
                        <tr>
                            <td>Departure Station</td>
                            <td>:</td>
                            <td>{{ $ticket->departure_station }}</td>
                        </tr>
                        <tr>
                            <td>Arrival Station</td>
                            <td>:</td>
                            <td>{{ $ticket->arrival_station }}</td>
                        </tr>
                        <tr>
                            <td>Departure Date</td>
                            <td>:</td>
                            <td>{{ $ticket->departure_date }}</td>
                        </tr>
                        <tr>
                            <td>Departure Time</td>
                            <td>:</td>
                            <td>{{ $ticket->departure_time }}</td>
                        </tr>
                        <tr>
                            <td>Bogi</td>
                            <td>:</td>
                            <td>{{ $ticket->bogi }}</td>
                        </tr>
                        <tr>
                            <td>Seat</td>
                            <td>:</td>
                            <td>{{ $ticket->seat }}</td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td>:</td>
                            <td>{{ $ticket->price }}</td>
                        </tr>
                        <tr>
                            <td>Booking Timestamp</td>
                            <td>:</td>
                            <td>{{ $ticket->booking_timestamp }}</td>
                        </tr>

                        <!-- Download button row -->
                        <tr>
                            <td colspan="3">
                                <button id="download">Download</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Include html2pdf library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

    <!-- JavaScript to handle download -->
    <script>
        window.onload = function () {
            document.getElementById("download").addEventListener("click", () => {
                const invoice = document.getElementById("invoice"); // Get the invoice element
                var opt = {
                    margin: 1,
                    filename: 'ticket_information.pdf',
                    image: { type: 'jpeg', quality: 0.98 },
                    html2canvas: { scale: 2 },
                    jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
                };
                html2pdf().from(invoice).set(opt).save(); // Generate and save PDF from invoice element
            });
        };
    </script>
</body>
</html>
