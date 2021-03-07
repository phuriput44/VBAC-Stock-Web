<?php
require_once("../config.php");
$request_data = json_decode(file_get_contents("php://input"));
$array = (array) $request_data;
$query = "SELECT * FROM user_table";
$statement = $connect->prepare($query);
$statement->execute();
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row;
}
if ($data[0]["user_name"] == $array["username"] && $data[0]["user_password"] == $array["password"]) {
    echo "Complete";
} else {
    echo "Error";
}
