<?php

// include db connection
include 'db.php';





if(isset($_POST['submit'])) {


    
    $hs_category = htmlspecialchars($_POST['category'], ENT_QUOTES);
    $hs_base = htmlspecialchars($_POST['base'], ENT_QUOTES);
    $hs_protein = htmlspecialchars($_POST['protein'], ENT_QUOTES);
    $hs_more = htmlspecialchars($_POST['more'], ENT_QUOTES);
    $hs_toppings = htmlspecialchars($_POST['toppings'], ENT_QUOTES);
    $hs_drinks = htmlspecialchars($_POST['drinks'], ENT_QUOTES);
    $hs_sides = htmlspecialchars($_POST['sides'], ENT_QUOTES);
    $hs_price = htmlspecialchars($_POST['price'], ENT_QUOTES);
    $hs_blurb = htmlspecialchars($_POST['blurb'], ENT_QUOTES);
    $hs_hero = $_POST['base64Image'];
    $id = htmlspecialchars($_POST['identification'], ENT_QUOTES);

    $query = "UPDATE happy_sunshine_food SET category = '$hs_category', base = '$hs_base', 
    protein = '$hs_protein', more = '$hs_more', toppings = '$hs_toppings', drinks = '$hs_drinks', 
    sides = '$hs_sides', price = '$hs_price', blurb = '$hs_blurb', heroImage = '$hs_hero'
    WHERE id=$id";

    $query_run = mysqli_query($conn, $query);


}




    if ($query_run) {
        header("Location: ../index.php?update=success");
    } else {
        header("Location: ../index.php?update=failure");
    }






?>