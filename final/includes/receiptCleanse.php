<?php



// include db connection
include 'db.php';

    $sql = "truncate receipt";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        header("Location: ../home.php?task=successful");
    } else {
        header("Location: ../home.php?task=unsuccessful");
    }
?>