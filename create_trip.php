<?php
require 'config.php';
require 'data_loader.php';

$input = input_cleaner($_POST);

$sql = "INSERT INTO trips (trip_dep_airport, trip_arr_airport, trip_dep_time, trip_arr_time, trip_passengers, trip_cust_id)
        VALUES (?,?,?,?,?,?)";

$query = $pdo->prepare($sql);

foreach($_POST['passengers'] as $id) {
    $passengers[] = $id;
};
$query->execute([
    $input["trip_dep_airport"],
    $input["trip_arr_airport"],
    $input["trip_dep_time"],
    $input["trip_arr_time"],
    implode(",",$_POST['passengers']),
    $input["cust_id"],
]);

echo "Profile updated!";
echo '<form action="customer_page.php" method="POST">';
    echo '<input name="cust_id" type="hidden" value="' . $input['cust_id'] . '" />';
    echo '<input type="submit" value="Return to profile" />';
echo '</form>';
