<?php

$price = "$" . $_GET['price'];
$time = $_GET['time'];

$firstName = $_GET['firstName'];
$lastName = $_GET['lastName'];

$name = $firstName . " " . $lastName;
// echo $time;

if($name){
    header("Location: ../pages/receipt.php?name=$name&price=$price&time=$time&update=set");
} else {
    header("Location: ../pages/receipt.php?name=$name&price=$price&time=$time&update=notset");
}



?>