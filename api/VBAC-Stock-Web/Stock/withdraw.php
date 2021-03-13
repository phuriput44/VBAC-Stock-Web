<?php
require_once("../config.php");
$request_data = json_decode(file_get_contents("php://input"));
$array = (array) $request_data;
$query = "UPDATE stock_table SET stock_amount = stock_amount - :amount WHERE stock_id = :id;";
$statement = $connect->prepare($query);
$statement->execute($array);
$output = array("message" => "Insert Complete");
var_dump($output);
