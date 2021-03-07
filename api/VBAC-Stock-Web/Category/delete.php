<?php
require_once("../config.php");
$request_data = json_decode(file_get_contents("php://input"));
$array = (array) $request_data;
$query = "DELETE FROM category_table WHERE category_id = :delID";
$statement = $connect->prepare($query);
$statement->execute($array);
$output = array("message" => "Delelte Complete");
echo json_encode($output);
