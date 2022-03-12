<?php

// include db connection
include 'db.php';





if(isset($_POST['submit'])) {
    
    $hs_category = htmlspecialchars($_POST['category'], ENT_QUOTES);
    $id = htmlspecialchars($_POST['id'], ENT_QUOTES);
    $hs_base = htmlspecialchars($_POST['base'], ENT_QUOTES);
    $hs_protein = htmlspecialchars($_POST['protein'], ENT_QUOTES);
    

    $hs_more = $_POST['more'];

    if(is_array($hs_more)) {
        $hs_more = implode(", ",$_POST['more']);
    } else if (is_string($hs_more)) {
        $hs_more = htmlspecialchars($_POST['more'], ENT_QUOTES);
    }


    $hs_toppings = $_POST['toppings'];

    if(is_array($hs_toppings)) {
        $hs_toppings = implode(", ",$_POST['toppings']);
    } else if (is_string($hs_toppings)) {
        $hs_toppings = htmlspecialchars($_POST['toppings'], ENT_QUOTES);
    }

    $hs_drinks = $_POST['drinks'];

    if(is_array($hs_drinks)) {
        $hs_drinks = implode(", ",$_POST['drinks']);
    } else if (is_string($hs_drinks)) {
        $hs_drinks = htmlspecialchars($_POST['drinks'], ENT_QUOTES);
    }


    // $hs_drinks = $_POST['drinks'];

    // if(is_array($hs_drinks)) {
    //     $hs_drinks = implode(", ",$_POST['drinks']);
    // } else if (is_string($hs_drinks)) {
    //     $hs_drinks = htmlspecialchars($_POST['drinks'], ENT_QUOTES);
    // }


    $hs_sides = $_POST['sides'];

    if(is_array($hs_sides)) {
        $hs_sides = implode(", ",$_POST['sides']);
    } else if (is_string($hs_sides)) {
        $hs_sides = htmlspecialchars($_POST['sides'], ENT_QUOTES);
    }

    $hs_price = htmlspecialchars($_POST['price'], ENT_QUOTES);
    $hs_blurb = htmlspecialchars($_POST['blurb'], ENT_QUOTES);
    $hs_hero = htmlspecialchars($_POST['heroImage'], ENT_QUOTES);


    echo 'Working';

    $query = "INSERT INTO order_information (category, base, protein, more, toppings, drinks, sides, price, blurb, heroImage) 
            VALUES ('$hs_category', '$hs_base', '$hs_protein', '$hs_more', '$hs_toppings', '$hs_drinks', '$hs_sides', '$hs_price', '$hs_blurb', '$hs_hero')";

    $query_run = mysqli_query($conn, $query);


} else {
    echo 'Not Working';
}




if ($query_run) {
    header("Location: ../pages/individual.php?id=$id&update=success");
} else {
    header("Location: ../pages/individual.php?id=$id&update=failure");
}






?>