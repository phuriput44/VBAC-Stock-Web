<?php

require_once("../config.php");

$query = "SELECT * FROM return_table  JOIN person_table ON return_person_id = person_id JOIN stock_table ON return_stock_id = stock_id JOIN category_table ON stock_id = category_id;";
$statement = $connect->prepare($query);
$statement->execute();
$data = array();
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row;
}
if ($data != null) {
    echo json_encode($data);
} else {
    echo null;
}
