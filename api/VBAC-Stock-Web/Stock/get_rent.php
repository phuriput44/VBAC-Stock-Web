<?php

require_once("../config.php");

$query = "SELECT return_id,person_id,person_name,person_surname,person_date,stock_name,stock_id,category_name,return_amount FROM return_table JOIN person_table ON return_person_id = person_id JOIN stock_table ON return_stock_id = stock_id JOIN category_table ON stock_category_id = category_id";
$statement = $connect->prepare($query);
$statement->execute();
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row;
}

echo json_encode($data);
 