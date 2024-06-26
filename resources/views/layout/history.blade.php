<!-- 
Responsive HTML Table With Pure CSS - Web Design/UI Design

Code written by:
👨🏻‍⚕️ Coding Design (Jeet Saru)

> You can do whatever you want with the code. However if you love my content, you can **SUBSCRIBED** my YouTube Channel.

🌎link: www.youtube.com/codingdesign 
 -->
 <!DOCTYPE html>
 <html lang="en">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Train list</title>
     <link rel="stylesheet" type="text/css" href="{{asset('assets/table.css')}}">
     <style>
        body {
    min-height: 100vh;
    /* background: url(table1.jpg) center / cover; */
    background: url("{{asset('/images/table1.jpg')}}") center / cover;
    display: flex;
    justify-content: center;
    align-items: center;
}
.book-button {
    background-color: green; /* Blue */
    border: none;
    color: white;
    padding: 8px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
}

.book-button:hover {
    background-color: #0056b3; /* Darker blue on hover */
}

     </style>
 </head>
 
 <body>
     <main class="table" id="customers_table">
         <section class="table__header">
             <h1>Purchase list</h1>
             <!-- <div class="input-group">
                 <input type="search" placeholder="Search Data...">
                 <img src="images/search.png" alt="">
             </div> -->
             <!-- <div class="export__file">
                 <label for="export-file" class="export__file-btn" title="Export File"></label>
                 <input type="checkbox" id="export-file">
                 <div class="export__file-options">
                     <label>Export As &nbsp; &#10140;</label>
                     <label for="export-file" id="toPDF">PDF <img src="images/pdf.png" alt=""></label>
                     <label for="export-file" id="toJSON">JSON <img src="images/json.png" alt=""></label>
                     <label for="export-file" id="toCSV">CSV <img src="images/csv.png" alt=""></label>
                     <label for="export-file" id="toEXCEL">EXCEL <img src="images/excel.png" alt=""></label>
                 </div>
             </div> -->
         </section>
         <section class="table__body">
             <table>
                 <thead>
                     <tr>
                         <th> Id </th>
                         <th> Train Name </th>
                         <th> Departure Date </th>
                         <th> Departure Station </th>
                         <th>Arrival Station</th>
                         <th> Details </th>
                     </tr>
                 </thead>
                 <tbody>
                @foreach ($ticket as $key => $tickets)
                <tr style="cursor:pointer;">
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $tickets['train_name'] }}</td>
                    <td>{{ $tickets['departure_date'] }}</td>
                    <td>{{ $tickets['departure_station'] }}</td>
                    <td>{{ $tickets['arrival_station'] }}</td>
                             <!-- <p class="status cancelled">Book</p> -->
                             <form action="{{ route('booking.third') }}" method="post">
            @csrf
            <input type="hidden" name="email" value="{{ $tickets['email'] }}">
            <input type="hidden" name="train_name" value="{{ $tickets['train_name']}}">
            <input type="hidden" name="departure_date" value="{{ $tickets['departure_date'] }}">
            <td><button type="submit" class="book-button">Show Details</button></td>
        </form>
                         </td>
                </tr>
                @endforeach
            </tbody>
             </table>
         </section>
     </main>
     <script src="table.js"></script>
 
 </body>
 
 </html>