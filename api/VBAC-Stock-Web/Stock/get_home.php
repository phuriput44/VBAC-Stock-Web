<?php

require_once("../config.php");

$query = "SELECT COUNT(stock_id) FROM stock_table WHERE stock_amount = 0 ";
$statement = $connect->prepare($query);
$statement->execute();
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $disable = array("disable" => $row["COUNT(stock_id)"]);
}
$query = "SELECT COUNT(stock_id) FROM stock_table WHERE stock_amount > 0 ";
$statement = $connect->prepare($query);
$statement->execute();
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $enable = array("enable" => $row["COUNT(stock_id)"]);
}
$query = " SELECT * FROM stock_table JOIN category_table ct ON stock_table.stock_category_id = ct.category_id WHERE stock_amount = 0" ;
$statement = $connect->prepare($query);
$statement->execute();
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row;
}
$array = array($disable, $enable,$data);
echo(json_encode($array));
