<?php include 'db.php'; ?>

<?php

if(isset($_POST['submit'])) {


    $hs_category = htmlspecialchars($_POST['category'], ENT_QUOTES);
    $hs_base = htmlspecialchars($_POST['base'], ENT_QUOTES);
    $hs_protein = htmlspecialchars($_POST['protein'], ENT_QUOTES);
    $hs_more = htmlspecialchars($_POST['more'], ENT_QUOTES);
    $hs_toppings = htmlspecialchars($_POST['toppings'], ENT_QUOTES);
    $hs_drinks = htmlspecialchars($_POST['drinks'], ENT_QUOTES);
    $hs_sides = htmlspecialchars($_POST['sides'], ENT_QUOTES);

    
    $query = "INSERT INTO happy_sunshine_food (category, base, protein, more, toppings, drinks, sides) 
              VALUES ('$hs_category', '$hs_base', '$hs_protein', '$hs_more', '$hs_toppings', '$hs_drinks', '$hs_sides')";

    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        header("Location: ../index.php?upload=success");
    } else {
        header("Location: ../index.php?upload=failure");
    }

}

?>