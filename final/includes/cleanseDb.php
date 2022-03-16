<?php

// Connect to Database
include '../includes/db.php';

$query = "truncate order_information";
$query_run = mysqli_query($conn, $query);

$query2 = "truncate recent_orders";
$query_run2 = mysqli_query($conn, $query2);

$query3 = "truncate favorite_orders";
$query_run3 = mysqli_query($conn, $query3);






if ($query_run && $query_run2 && $query_run3) {
    header("Location: ../home.php?login=success");
} else {
    header("Location: ../home.php?update=failure");
}
