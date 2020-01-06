<?php
session_start();

function input_cleaner($input)
{
    $clean_search_input = [];
    foreach ($input as $heading => $data) {
        $cleaned_data =
        htmlspecialchars(
            stripslashes(
                trim(
                    strip_tags(
                        strtolower(
                            $data
                        )
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

    $sql ='
        SELECT * FROM customers
        WHERE cust_email = "' . $output['cust_email'] . '";
    ';
    
    $query = $pdo->query($sql);
    $cust_record = $query->fetch();

    $passenger_list = passenger_list($cust_record['cust_id']);
    $trip_list = trip_list($cust_record['cust_id']);

    $html .= $passenger_list . $trip_list;
    // var_dump($html);
    return $html;
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

    $html .= "<div>";
        $html .= "<h2>Passengers</h2>";
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
                        $html .= "<td></td>";
                        $html .= "<td></td>";
                    $html .= "</tr>";
                }
            $html .= "</tbody>";
        $html .= "</table>";
    $html .= "</div>";
        
    return $html;
}

function trip_list($cust_id)
{
    require("config.php");

    $sql ='
        SELECT * FROM trips
        WHERE trip_cust_id = "' . $cust_id . '";
    ';
    $query = $pdo->query($sql);
    $triprec = $query->fetchAll();

    $html .= "<div>";
        $html .= "<h2>Trips</h2>";
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
                    $arr_time = $arr_time->format('d-m-Y H:m');

                    $html .= "<tr>";
                        $html .= "<td>" . $trip['trip_dep_airport'] . "</td>";
                        $html .= "<td>" . $trip['trip_arr_airport'] . "</td>";
                        $html .= "<td>" . $dep_time . "</td>";
                        $html .= "<td>" . $arr_time . "</td>";
                        $html .= "<td>passenger list tbd</td>";
                        $html .= "<td></td>";
                        $html .= "<td></td>";
                    $html .= "</tr>";
                }
            $html .= "</tbody>";
        $html .= "</table>";
    $html .= "</div>";

    return $html;

}