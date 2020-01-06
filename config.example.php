<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "customer_profile";
    $options = [
        \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    try
    {
        $pdo = new PDO("mysql:host=$servername;dbname=$db", $username, $password, $options);
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
?>