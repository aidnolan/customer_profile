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
    <div class="section">
        <h3>Add Passenger</h3>
        <form action="create_passenger.php" method="POST">
            <input name="cust_id" type="hidden" value="<?= $_POST['cust_id'] ?>">
            <div style="margin-top: 10px">
                <label for="passenger_title">Title</label>
            </div>
            <div>
                <select name="passenger_title">
                    <option value="mr">Mr</option>
                    <option value="miss">Miss</option>
                    <option value="mrs">Mrs</option>
                    <option value="rev">Rev</option>
                    <option value="prof">Prof</option>
                </select>
            </div>
            <div style="margin-top: 10px">
                <label for="passenger_fname">First Name</label>
            </div>
            <div>
                <input name="passenger_fname" type="text">
            </div>
            <div style="margin-top: 10px">
                <label for="passenger_sname">Surname</label>
            </div>
            <div>
                <input name="passenger_sname" type="text">
            </div>
            <div style="margin-top: 10px">
                <label for="passenger_passport_id">Passport ID</label>
            </div>
            <div>
                <input name="passenger_passport_id" type="text">
            </div>
            <input style="margin-top: 10px" type="submit">
        </form>
    </div>
</body>
</html>
