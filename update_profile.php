<?php
require 'config.php';
require 'data_loader.php';

$input = input_cleaner($_POST);

$sql = "UPDATE customers SET cust_email=?, cust_name =?, cust_address=?, cust_city=?, cust_country=?
        WHERE cust_id =? ";

$query = $pdo->prepare($sql);
$query->execute([
    $input["cust_email"],
    $input["cust_name"],
    $input["cust_address"],
    $input["cust_city"],
    $input["cust_country"],
    $input['cust_id']
]);

echo "Profile updated!";
echo '<form action="customer_page.php" method="POST">';
    echo '<input name="cust_id" type="hidden" value="' . $input['cust_id'] . '" />';
    echo '<input type="submit" value="Return to profile" />';
echo '</form>';