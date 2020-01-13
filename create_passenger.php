<?php
require 'config.php';
require 'data_loader.php';

$input = input_cleaner($_POST);

$sql = "INSERT INTO passengers (passenger_title, passenger_fname, passenger_sname, passenger_passport_id, passenger_cust_id)
        VALUES (?,?,?,?,?)";

$query = $pdo->prepare($sql);
$query->execute([
    ucwords($input["passenger_title"]),
    $input["passenger_fname"],
    $input["passenger_sname"],
    $input["passenger_passport_id"],
    $input["cust_id"],
]);

echo "<h3>Profile updated!</h3>";
echo '<form action="customer_page.php" method="POST">';
    echo '<input name="cust_id" type="hidden" value="' . $input['cust_id'] . '" />';
    echo '<input type="submit" value="Return to profile" />';
echo '</form>';