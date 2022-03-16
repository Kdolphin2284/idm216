<?php
ob_start();

// include db connection
include 'db.php';

// GET id
$uniqueId = $_GET['uniqueId'];

// $query = "INSERT INTO order_information (category, base, protein, more, toppings, drinks, sides, price, blurb, heroImage, originalId, uniqueId) 
//             VALUES ('$hs_category', '$hs_base', '$hs_protein', '$hs_more', '$hs_toppings', '$hs_drinks', '$hs_sides', '$totalFoodPrice', '$hs_blurb', '$hs_hero', '$id', '$uniqueId')";

//     $query_run = mysqli_query($conn, $query);

    $sql = "INSERT INTO order_information (category, base, protein, more, toppings, drinks, sides, price, blurb, heroImage, originalId, uniqueId) 
    SELECT category, base, protein, more, toppings, drinks, sides, price, blurb, heroImage, originalId, uniqueId 
    FROM order_information 
    WHERE uniqueid=$uniqueId";

    $query_run = mysqli_query($conn, $sql);

    if($query_run) {
        echo 'yee';

        // Create new unique id
        $newUniqueId = rand(0, 2000);

        // Insert into the most recent created row
        $sqlUpdateUniqueId = "UPDATE order_information
                            SET uniqueId='$newUniqueId'
                            WHERE uniqueId='$uniqueId'
                            ORDER BY id DESC
                            limit 1";

        // Run it
        $query_run_unique = mysqli_query($conn, $sqlUpdateUniqueId);

        // If the unique id was updated
        if($query_run_unique) {
            echo 'All unique!';
        }

        // If everything went well, go back to the cart
        header("Location: ../pages/cart.php?id=$id&update=success");
        

    } else {
        echo 'nee';
        header("Location: ../pages/cart.php?id=$id&update=failure");
    }




?>