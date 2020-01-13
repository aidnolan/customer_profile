<?php
session_start();

function input_cleaner($input)
{
    $clean_search_input = [];
    foreach ($input as $heading => $data) {
        if(gettype($data) == 'array') {
            $clean_search_input[$heading] = $data;
            continue;
        }
        $cleaned_data =
        htmlspecialchars(
            stripslashes(
                trim(
                    strip_tags(
                        $data
                    )
                )
            )
        );
        $clean_search_input[$heading] = $cleaned_data;
    }
    return $clean_search_input;
}

function customer_profile_page()
{
    require("config.php");
    
    $html = "";
    $output = input_cleaner($_GET);
    
    $sql ='SELECT * FROM customers ';
    
    if (isset($output['cust_email'])) {
        $sql .= 'WHERE cust_email = "' . $output['cust_email'] . '"';
        $query = $pdo->query($sql);
        $cust_record = $query->fetch();

        do_login($output['cust_password'], $cust_record['cust_password']);

    } else if ($_POST['cust_id']) {
        $sql .= 'WHERE cust_id = ' . $_POST['cust_id'];
        $query = $pdo->query($sql);
        $cust_record = $query->fetch();

    } else {
        echo '<h3>Incorrect Password or email</h3>';
        echo '<form action="index.php" method="POST">';
            echo '<input type="submit" value="Return to login" />';
        echo '</form>';
        return "";
    };
    
    $passenger_list = passenger_list($cust_record['cust_id']);
    $trip_list = trip_list($cust_record['cust_id']);

    $html .= $passenger_list . $trip_list;
    return $html;
}

function do_login($cust_login, $password_entered)
{
    if(password_verify($cust_login, $password_entered)) {
        //
    } else {
        $cust_record = "";
        echo '<h3>Incorrect Password or email</h3>';
        echo '<form action="index.php" method="POST">';
            echo '<input type="submit" value="Return to login" />';
        echo '</form>';
        exit;
    }
}

function passenger_list($cust_id)
{
    require("config.php");
    
    $html = "";
    $sql ='
        SELECT * FROM passengers
        WHERE passenger_cust_id = "' . $cust_id . '";
    ';

    $query = $pdo->query($sql);
    $passrec = $query->fetchAll();

    $html .= "<div class='section'>";
        $html .= "<h3>Passengers</h3>";
        $html .= "<table>";
            $html .= "<thead>";
                $html .= "<tr>";
                    $html .= "<th>Title</th>";
                    $html .= "<th>First Name</th>";
                    $html .= "<th>Surname</th>";
                    $html .= "<th>Passport ID</th>";
                    $html .= "<th>Options</th>";
                    $html .= "<th></th>";
                $html .= "</tr>";
            $html .= "<thead>";

            $html .= "<tbody>";
                foreach($passrec as $passenger) {
                    $html .= "<tr>";
                        $html .= "<td>" . $passenger['passenger_title'] . "</td>";
                        $html .= "<td>" . $passenger['passenger_fname'] . "</td>";
                        $html .= "<td>" . $passenger['passenger_sname'] . "</td>";
                        $html .= "<td>" . $passenger['passenger_passport_id'] . "</td>";
                        $html .= "<td>";
                            $html .= "<form action='delete_record.php' method='POST'>";
                                $html .= "<input name='passenger_id' type='hidden' value='" . $passenger['passenger_id'] . "' />";
                                $html .= "<input name='cust_id' type='hidden' value='" . $cust_id . "' />";
                                $html .= "<input type='submit' value='Delete' />";
                            $html .= '</form>';
                        $html .= "</td>";
                        $html .= "<td></td>";
                    $html .= "</tr>";
                }
            $html .= "</tbody>";
        $html .= "</table>";
        $html .= "<form class='add-button' action='new_passenger.php' method='POST'>";
            $html .= "<input name='cust_id' type='hidden' value='" . $cust_id . "' />";
            $html .= "<input type='submit' value='Add Passenger' />";
        $html .= '</form>';
    $html .= "</div>";
        
    return $html;
}

function trip_list($cust_id)
{
    require("config.php");

    $html = "";
    $sql ='
        SELECT * FROM trips
        WHERE trip_cust_id = "' . $cust_id . '";
    ';

    $query = $pdo->query($sql);
    $triprec = $query->fetchAll();

    foreach($triprec as &$trip) {
        if(isset($trip['trip_passengers'])) {
            $passengers = explode(',', $trip['trip_passengers']);
            $sql_pass = 'SELECT passenger_title, passenger_fname, passenger_sname FROM passengers ';
    
            if(count($passengers) == 1) {
                $sql_pass .= 'WHERE passenger_id = "' . $passengers[0] . '"';
            } else {
                foreach($passengers as $index => $passenger_id) {
                    if($index == 0) {
                        $sql_pass .= 'WHERE passenger_id ="' . $passenger_id. '" ';
                    } else {
                        $sql_pass .= 'OR passenger_id ="' . $passenger_id. '" ';
                    }
                }
            }
            $query = $pdo->query($sql_pass);
            $trip_pass_rec = $query->fetchAll();
            foreach($trip_pass_rec as $passenger) {
                $trip['passengers'][] = implode(" ", $passenger);
            }
        } else {
            $trip['passengers'][] = "";
        }
    }

    $html .= "<div class='section'>";
        $html .= "<h3>Trips</h3>";
        $html .= "<table>";
            $html .= "<thead>";
                $html .= "<tr>";
                    $html .= "<th>From</th>";
                    $html .= "<th>To</th>";
                    $html .= "<th>Arrival</th>";
                    $html .= "<th>Departure</th>";
                    $html .= "<th>Passengers</th>";
                    $html .= "<th>Options</th>";
                    $html .= "<th></th>";
                $html .= "</tr>";
            $html .= "</thead>";

            $html .= "<tbody>";

                foreach($triprec as $trip) {
                    $dep_time = new DateTime($trip['trip_arr_time']);
                    $dep_time = $dep_time->format('d-m-Y H:m');
                    $arr_time = new DateTime($trip['trip_arr_time']);
                    $arr_time = $arr_time->format('d/m/Y H:m:s');

                    $html .= "<tr>";
                        $html .= "<td>" . $trip['trip_dep_airport'] . "</td>";
                        $html .= "<td>" . $trip['trip_arr_airport'] . "</td>";
                        $html .= "<td>" . $dep_time . "</td>";
                        $html .= "<td>" . $arr_time . "</td>";
                        $html .= "<td>" . implode(", ", $trip['passengers'])  . "</td>";
                        $html .= "<td>";
                            $html .= "<form action='delete_record.php' method='POST'>";
                                $html .= "<input name='trip_id' type='hidden' value='" . $trip['trip_id'] . "' />";
                                $html .= "<input name='cust_id' type='hidden' value='" . $cust_id . "' />";
                                $html .= "<input type='submit' value='Delete' />";
                            $html .= '</form>';
                        $html .= "</td>";
                        
                        $html .= "<td></td>";
                    $html .= "</tr>";
                }
            $html .= "</tbody>";
        $html .= "</table>";
        $html .= "<form class='add-button' action='new_trip.php' method='POST'>";
            $html .= "<input name='cust_id' type='hidden' value='" . $cust_id . "' />";
            $html .= "<input type='submit' value='Add Trip' />";
        $html .= '</form>';
    $html .= "</div>";

    return $html;
}

function cust_record()
{
    require("config.php");

    $output = input_cleaner($_GET);

    $sql ='SELECT * FROM customers ';
    if ($output) {
        $sql .= 'WHERE cust_email = "' . $output['cust_email'] . '"';
    } else if ($_POST['cust_id']) {
        $sql .= 'WHERE cust_id = ' . $_POST['cust_id'];
    }
    
    $query = $pdo->query($sql);
    $cust_record = $query->fetch();

    return $cust_record;
}

function passenger_record($cust_id) {
    require("config.php");

    $sql ='SELECT * FROM passengers WHERE passenger_cust_id = "' . $cust_id . '"';
    
    $query = $pdo->query($sql);
    $passenger_record = $query->fetchAll();
    
    return $passenger_record;
}
