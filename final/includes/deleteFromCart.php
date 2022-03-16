<?php

// include db connection
include 'db.php';






$id = $_GET['id'];

$query = "DELETE FROM order_information WHERE id=$id";

$results = mysqli_query($conn, $query);

if ($results) {
    header("Location: ../pages/cart.php?update=success");
} else {
    header("Location: ../pages/cart.php?update=failure");
}







?>