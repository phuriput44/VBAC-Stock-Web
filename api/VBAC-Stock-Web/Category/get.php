<?php

require_once("../config.php");

$query= "SELECT * FROM category_table";
$statement=$connect->prepare($query);
$statement->execute();
while($row=$statement->fetch(PDO::FETCH_ASSOC)){
    $data[]=$row;
}
echo json_encode($data);
