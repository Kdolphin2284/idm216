<?php

echo 'hi';
// include db connection
include 'db.php';

$uniqueId = $_GET['uniqueId'];
echo $uniqueId;

    $sql = "INSERT INTO favorite_orders (category, base, protein, more, toppings, drinks, sides, price, blurb, heroImage, originalId, uniqueId)
            SELECT category, base, protein, more, toppings, drinks, sides, price, blurb, heroImage, originalId, uniqueId
            FROM recent_orders WHERE uniqueId=$uniqueId;";
    $result = mysqli_query($conn, $sql);
    
    if($result) {
        echo "Working, yay!";
        header("Location: ../pages/recentOrders.php?added=successfully");
    } else {
        echo "Not working, no!";
        header("Location: ../pages/recentOrders.php?added=unsuccessfully");
    }
    








?>