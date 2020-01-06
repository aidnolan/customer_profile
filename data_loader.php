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
function customer_record()
{
    include("config.php");
    $output = input_cleaner($_GET);
    $sql ='
        SELECT * FROM customers
        WHERE cust_email = "' . $output['cust_email'] . '";
    ';

    $query = $pdo->query($sql);
    $cust_record = $query->fetch();

    return $cust_record;
}
