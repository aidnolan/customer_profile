<?php 
    require 'data_loader.php';
    $passenger_record = passenger_record($_POST['cust_id']);
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
        
        <form action="create_trip.php" method="POST">
            <input name="cust_id" type="hidden" value="<?= $_POST['cust_id'] ?>">
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
                <input name="trip_dep_time" type="datetime-local">
            </div>
            <div style="margin-top: 10px">
                <label for="trip_arr_time">Arrival Date</label>
            </div>
            <div>
                <input name="trip_arr_time" type="datetime-local">
            </div>
            <div class="checkbox">
                <?php foreach ($passenger_record as $passenger): ?>
                    <label for="passenger"><?=
                        $passenger['passenger_title'] . " " .
                        $passenger['passenger_fname'] . " " .
                        $passenger['passenger_sname']
                    ?></label>
                    <input name="passengers[]" type="checkbox" value="<?= $passenger['passenger_id'] ?>">
                <?php endforeach ?>
            </div>

            <input style="margin-top: 10px" type="submit">
        </form>
    </div>
</body>
</html>
