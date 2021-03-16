<?php
require_once("../config.php");

$request_data = json_decode(file_get_contents("php://input"));
$array = (array) $request_data;
$query = "DELETE FROM return_table WHERE return_id = (:return_id);
DELETE FROM person_table WHERE person_id = (:person_id);
UPDATE stock_table SET stock_amount = stock_amount + (:return_amount) WHERE stock_id = (:stock_id);";
$statement = $connect->prepare($query);
$statement->execute($array);
$output = array("message" => "Insert Complete");
echo json_encode($output);
