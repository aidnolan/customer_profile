<?php
require 'config.php';
require 'data_loader.php';

if(isset($_POST['passenger_id'])) {
    $sql = "DELETE FROM passengers WHERE passenger_id =?";
    $query = $pdo->prepare($sql);
    $query->execute([$_POST['passenger_id']]);
} else {
    $sql = "DELETE FROM trips WHERE trip_id=?";
    $query = $pdo->prepare($sql);
    $query->execute([$_POST['trip_id']]);
};

echo "<h3>Profile updated!</h3>";
echo '<form action="customer_page.php" method="POST">';
    echo '<input name="cust_id" type="hidden" value="' . $_POST['cust_id'] . '" />';
    echo '<input type="submit" value="Return to profile" />';
echo '</form>';