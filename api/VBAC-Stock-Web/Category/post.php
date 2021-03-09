<?php
require_once("../config.php");

$request_data = json_decode(file_get_contents("php://input"));
$array = (array) $request_data;
$query = "INSERT INTO category_table(category_name) VALUES( :catName)";
$statement = $connect->prepare($query);
$statement->execute($array);
$output = array("message" => "Insert Complete");
echo json_encode($output);
