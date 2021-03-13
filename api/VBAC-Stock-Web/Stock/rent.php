<?php
require_once("../config.php");
$request_data = json_decode(file_get_contents("php://input"));
$array = (array) $request_data;
$query = "UPDATE stock_table SET stock_amount = stock_amount - :amount WHERE stock_id = :id ;";
$statement = $connect->prepare($query);
$statement->execute( [ ":amount" => $array["amount"], ":id" => $array["id"]]);
$query = "INSERT INTO person_table(person_name,person_surname,person_date) VALUES (:name , :surname , :returnDate);";
$statement = $connect->prepare($query);
$statement->execute( [ ":name" => $array["name"], ":surname" => $array["surname"], ":returnDate" => $array["returnDate"]]);
$query = "INSERT INTO return_table 
SET return_amount = :amount,
    return_person_id = (
    SELECT person_id FROM person_table WHERE person_id = (SELECT MAX(person_id) AS LastID FROM person_table)  ),
    return_stock_id = (
    SELECT stock_id FROM stock_table WHERE stock_id = :id  ) ;";
$statement = $connect->prepare($query);
$statement->execute([ ":amount" => $array["amount"], ":id" => $array["id"]]);
$output = array("message" => "Insert Complete");
var_dump($output);
