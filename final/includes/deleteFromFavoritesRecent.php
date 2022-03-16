<?php

// include db connection
include 'db.php';






$uniqueId = $_GET['uniqueId'];

$query = "DELETE FROM favorite_orders WHERE uniqueId=$uniqueId";

$results = mysqli_query($conn, $query);

if ($results) {
    header("Location: ../pages/recentOrders.php?update=success");
} else {
    header("Location: ../pages/recentOrders.php?update=failure");
}







?>