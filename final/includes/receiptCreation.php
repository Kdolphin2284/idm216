<?php

ob_start();

// include db connection
include 'db.php';

$price = $_GET['price'];
$time = $_GET['time'];
// echo $price;

    $sql = "INSERT INTO 
            receipt (category, base, protein, more, toppings, drinks, sides, price, blurb, heroImage, originalId, uniqueId)
            SELECT category, base, protein, more, toppings, drinks, sides, price, blurb, heroImage, originalId, uniqueId
            FROM order_information;";
    $result = mysqli_query($conn, $sql);
    
    if($result) {
        $sqlRecents = "INSERT INTO 
            recent_orders (category, base, protein, more, toppings, drinks, sides, price, blurb, heroImage, originalId, uniqueId)
            SELECT category, base, protein, more, toppings, drinks, sides, price, blurb, heroImage, originalId, uniqueId
            FROM order_information;";
            $resultRecents = mysqli_query($conn, $sqlRecents);
                if($resultRecents) {
                    $sqlDeleteCart = "truncate order_information";
                    $resultDeleteCart = mysqli_query($conn, $sqlDeleteCart);
                    echo 'Added to recent orders, order_information deleted';
                }
        if ($resultDeleteCart) {
                header("Location: ../pages/receipt.php?price=$price&time=$time&receipt=created");
            } else {
                header("Location: ../pages/receipt.php?price=$price&time=$time&receipt=notcreated");
            }

    } else {
        echo "Not working for some reason";
    }





    

    // $query = "INSERT INTO order_information (category, base, protein, more, toppings, drinks, sides, price, blurb, heroImage, originalId) 
    //         VALUES ('$hs_category', '$hs_base', '$hs_protein', '$hs_more', '$hs_toppings', '$hs_drinks', '$hs_sides', '$totalFoodPrice', '$hs_blurb', '$hs_hero', '$id')";

    // $query_run = mysqli_query($conn, $query);




// if ($query_run) {
//     header("Location: ../pages/individual.php?id=$id&update=success");
// } else {
//     header("Location: ../pages/individual.php?id=$id&update=failure");
// }







?>