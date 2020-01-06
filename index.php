<?php 
    include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer Login</title>
</head>
<body>
    <h1>Customer Portal</h1>
    <form action="customer_page.php" method="GET">
    <div style="margin-top: 10px">
            <label for="cust_email">Email address</label>
        </div>
        <div>
            <input name="cust_email" type="text">
        </div>
        <div style="margin-top: 10px">
            <label for="cust_password">Password</label>
        </div>
        <div>
            <input name="cust_password" type="password">
        </div>
        <input style="margin-top: 10px" type="submit">
    </form>
</body>
</html>
