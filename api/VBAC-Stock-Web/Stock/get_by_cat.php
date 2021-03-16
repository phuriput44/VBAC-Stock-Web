<?php
require_once("../config.php");

$request_data = json_decode(file_get_contents("php://input"));
$array = (array) $request_data;
$query = "SELECT * FROM stock_table  JOIN category_table ct ON stock_table.stock_category_id = ct.category_id WHERE stock_category_id = :finding ORDER BY stock_amount DESC;";
$statement = $connect->prepare($query);
$statement->execute($array);
$data = array();
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row;
}
if ($data != null) {
    echo json_encode($data);
    }
    else {
        echo null;
    }
