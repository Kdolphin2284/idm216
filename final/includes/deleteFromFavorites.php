<?php

// include db connection
include 'db.php';






$id = $_GET['id'];

$query = "DELETE FROM favorite_orders WHERE id=$id";

$results = mysqli_query($conn, $query);

if ($results) {
    header("Location: ../pages/favoriteOrders.php?update=success");
} else {
    header("Location: ../pages/favoriteOrders.php?update=failure");
}







?>