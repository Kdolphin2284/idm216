<?php

ob_start();

echo 'hi';
// include db connection
include 'db.php';

$id = $_GET['id'];
echo $id;

    $sql = "INSERT INTO order_information (category, base, protein, more, toppings, drinks, sides, price, blurb, heroImage, originalId)
            SELECT category, base, protein, more, toppings, drinks, sides, price, blurb, heroImage, originalId
            FROM recent_orders WHERE id=$id;";
    $result = mysqli_query($conn, $sql);
    
    if($result) {
        echo "Working, yay!";
        header("Location: ../pages/recentOrders.php?added=successfully");
    } else {
        echo "Not working, no!";
        header("Location: ../pages/recentOrders.php?added=unsuccessfully");
    }
    








?>