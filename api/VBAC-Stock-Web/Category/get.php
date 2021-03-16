<?php

require_once("../config.php");

$query= "SELECT * FROM category_table";
$statement=$connect->prepare($query);
$statement->execute();
$data = array();
while($row=$statement->fetch(PDO::FETCH_ASSOC)){
    $data[]=$row;
}
if ($data != null) {
    echo json_encode($data);
    }
    else {
        echo null;
    }
