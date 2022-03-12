<?php

// Connect to Database
include '../includes/db.php';

$query = "truncate order_information";

$query_run = mysqli_query($conn, $query);







if ($query_run) {
    header("Location: ../home.php?login=success");
} else {
    header("Location: ../home.php?update=failure");
}
