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
        <h3>Add Passenger</h3>
        <form action="update_profile.php" method="POST">
            <input name="cust_id" type="hidden" placeholder="">
            <div style="margin-top: 10px">
                <label for="passenger_title">Title</label>
            </div>
            <div>
                <select name="passenger_title">
                    <option value="mr">Mr</option>
                    <option value="miss">Miss</option>
                    <option value="mrs">Mrs</option>
                    <option value="rev">Rev</option>
                    <option value="prof">Prof</option>
                </select>
            </div>
            <div style="margin-top: 10px">
                <label for="pas">First Name</label>
            </div>
            <div>
                <input name="cust_name" type="text">
            </div>
            <div style="margin-top: 10px">
                <label for="cust_address">Surname</label>
            </div>
            <div>
                <input name="cust_address" type="text">
            </div>
            <div style="margin-top: 10px">
                <label for="passenger_passport_id">Passport ID</label>
            </div>
            <div>
                <input name="passenger_passport_id" type="text">
            </div>
            <div style="margin-top: 10px">
                <label for="cust_country">Country</label>
            </div>
            <div>
                <input name="cust_country" type="text">
            </div>
            <input style="margin-top: 10px" type="submit">
        </form>
    </div>
</body>
</html>
