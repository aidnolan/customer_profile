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
    <title>Create Your Profile</title>
</head>
<body>
    <div class="section">
        <h3>Create your profile</h3>
        <form action="create_profile.php" method="POST">
            <div style="margin-top: 10px">
                <label for="cust_email">Email</label>
            </div>
            <div>
                <input name="cust_email" type="email">
            </div>
            <div style="margin-top: 10px">
                <label for="cust_password">Choose a password</label>
            </div>
            <div>
                <input name="cust_password" type="password">
            </div>
            <div style="margin-top: 10px">
                <label for="cust_name">Name</label>
            </div>
            <div>
                <input name="cust_name" type="text">
            </div>
            <div style="margin-top: 10px">
                <label for="cust_address">Address</label>
            </div>
            <div>
                <input name="cust_address" type="text">
            </div>
            <div style="margin-top: 10px">
                <label for="cust_city">City</label>
            </div>
            <div>
                <input name="cust_city" type="text">
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
