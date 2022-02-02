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
    $id = htmlspecialchars($_POST['identification'], ENT_QUOTES);

    $query = "UPDATE happy_sunshine_food SET category = '$hs_category', base = '$hs_base', 
    protein = '$hs_protein', more = '$hs_more', toppings = '$hs_toppings', drinks = '$hs_drinks', 
    sides = '$hs_sides' 
    WHERE id=$id";

    $query_run = mysqli_query($conn, $query);


}




    if ($query_run) {
        header("Location: ../index.php?update=success");
    } else {
        header("Location: ../index.php?update=failure");
    }






?>