<?php 
    require 'data_loader.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="app.css"></link>
    <title>Customer Profile</title>
</head>
<body>
    <div class="section">
        <h3>Add Trip</h3>
        
        <form action="update_profile.php" method="POST">
            <input name="cust_id" type="hidden" placeholder="">
            <div style="margin-top: 10px">
                <label for="trip_dep_airport">Departure Airport</label>
            </div>
            <div>
                <input name="trip_dep_airport" type="text">
            </div>
            <div style="margin-top: 10px">
                <label for="trip_arr_airport">Destination Airport</label>
            </div>
            <div>
                <input name="trip_arr_airport" type="text">
            </div>
            <div style="margin-top: 10px">
                <label for="trip_dep_time">Departure Date</label>
            </div>
            <div>
                <input name="trip_dep_time" type="text">
            </div>
            <div style="margin-top: 10px">
                <label for="trip_arr_time">Arrival Date</label>
            </div>
            <div>
                <input name="trip_arr_time" type="text">
            </div>
            <input style="margin-top: 10px" type="submit">
        </form>
    </div>
</body>
</html>
