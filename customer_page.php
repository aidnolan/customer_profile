<?php 
    require 'data_loader.php';
    $custrec = cust_record();
    $profile_html = customer_profile_page();
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
<?php if($profile_html): ?>
    <h1>Customer Portal</h1>

    <div class="section">
        <h3>Basic Info</h3>
        <form action="update_profile.php" method="POST">
            <input name="cust_id" type="hidden" value="<?= $custrec['cust_id'] ?>">
            <div style="margin-top: 10px">
                <label for="cust_email">Email</label>
            </div>
            <div>
                <input name="cust_email" type="email" value="<?= $custrec['cust_email'] ?>">
            </div>
            <div style="margin-top: 10px">
                <label for="cust_name">Name</label>
            </div>
            <div>
                <input name="cust_name" type="text" value="<?= $custrec['cust_name'] ?>">
            </div>
            <div style="margin-top: 10px">
                <label for="cust_address">Address</label>
            </div>
            <div>
                <input name="cust_address" type="text" value="<?= $custrec['cust_address'] ?>">
            </div>
            <div style="margin-top: 10px">
                <label for="cust_city">City</label>
            </div>
            <div>
                <input name="cust_city" type="text" value="<?= $custrec['cust_city'] ?>">
            </div>
            <div style="margin-top: 10px">
                <label for="cust_country">Country</label>
            </div>
            <div>
                <input name="cust_country" type="text" value="<?= $custrec['cust_country'] ?>">
            </div>
            <input style="margin-top: 10px" type="submit">
        </form>
    </div>
    <?php endif ?>
    
    <?php
        echo $profile_html;
    ?>
</body>
</html>
