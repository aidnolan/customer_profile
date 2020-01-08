<?php
require 'config.php';

$sql = "UPDATE customers SET cust_email=?, cust_name =?, cust_address=?, cust_city=?, cust_country=?
        WHERE cust_id =? ";

$query = $pdo->prepare($sql);
$query->execute([$_POST["cust_email"], $_POST["cust_name"], $_POST["cust_address"], $_POST["cust_city"], $_POST["cust_country"], $_POST['cust_id']]);

echo "Profile updated!";
echo '<form action="customer_page.php" method="POST">';
    echo '<input name="cust_id" type="hidden" value="' . $_POST['cust_id'] . '" />';
    echo '<input type="submit" value="Return to profile" />';
echo '</form>';