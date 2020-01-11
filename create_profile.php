<?php
require 'config.php';
require 'data_loader.php';

$input = input_cleaner($_POST);
$password_entered = password_hash($input["cust_password"], PASSWORD_BCRYPT);

$sql = "INSERT INTO customers (cust_email, cust_password, cust_name, cust_address, cust_city, cust_country)
        VALUES (?,?,?,?,?,?)";

$query = $pdo->prepare($sql);
$query->execute([
    $input["cust_email"],
    $password_entered,
    $input["cust_name"],
    $input["cust_address"],
    $input["cust_city"],
    $input["cust_country"]
]);

echo "Profile created!";
echo '<form action="index.php" method="POST">';
    echo '<input type="submit" value="Return to login" />';
echo '</form>';