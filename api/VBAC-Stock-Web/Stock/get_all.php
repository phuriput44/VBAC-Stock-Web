<?php

require_once("../config.php");

$query = "SELECT * FROM stock_table  JOIN category_table ct ON stock_table.stock_category_id = ct.category_id ORDER BY stock_amount DESC;";
$statement = $connect->prepare($query);
$statement->execute();
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