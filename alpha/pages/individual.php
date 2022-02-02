<?php 

// Database Connection
include '../includes/db.php';

// Get ID
$id = $_GET['id'];


// Requesting Information from Selected Category
$sql = "SELECT * FROM happy_sunshine_food WHERE id=$id";
$result = mysqli_query($conn, $sql);


// Set Information to Variables
if ($result-> num_rows > 0) {
    while ($row = $result-> fetch_assoc()) {

        $hs_category = htmlspecialchars_decode($row['category'], ENT_QUOTES);
        $hs_base = explode(", ", htmlspecialchars_decode($row['base'], ENT_QUOTES));
        $hs_protein = explode(", ", htmlspecialchars_decode($row['protein'], ENT_QUOTES));
        $hs_more = explode(", ", htmlspecialchars_decode($row['more'], ENT_QUOTES));
        $hs_toppings = explode(", ", htmlspecialchars_decode($row['toppings'], ENT_QUOTES));
        $hs_drinks = explode(", ", htmlspecialchars_decode($row['drinks'], ENT_QUOTES));
        $hs_sides = explode(", ", htmlspecialchars_decode($row['sides'], ENT_QUOTES));

    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="stylesheet" href="../css/normalize.css">
    </head>
    <body>
        <a href="../index.php" class="home_button">Back</a>
<div id="menu">
    <?php
    // Category
    echo "<h1>$hs_category</h1>";
    ?>

    <?php
    // Base
    if (sizeof($hs_base) > 1) {
    ?>
    <div class="base">
        <?php
        for($i = 0; $i<sizeof($hs_base); $i++){
            $base = $hs_base[$i];
            echo "<button class='food_choice'>$base</button>";
        }
        ?>
    </div>
    <?php
    } else {
        echo '';
    }
    ?>

    <?php
    // Protein
    if (sizeof($hs_protein) > 1) {
    ?>
    <div class="protein">
        <?php
        for($i = 0; $i<sizeof($hs_protein); $i++){
            $protein = $hs_protein[$i];
            echo "<button class='food_choice'>$protein</button>";
        }
        ?>
    </div>
    <?php
    } else {
        echo '';
    }
    ?>

    <?php
    // More
    if (sizeof($hs_more) > 1) {
    ?>
    <div class="more">
        <?php
        for($i = 0; $i<sizeof($hs_more); $i++){
            $more = $hs_more[$i];
            echo "<button class='food_choice'>$more</button>";
        }
        ?>
    </div>
    <?php
    } else {
        echo '';
    }
    ?>

    <?php
    // Toppings
    if (sizeof($hs_toppings) > 1) {
    ?>
    <div class="toppings">
        <?php
        for($i = 0; $i<sizeof($hs_toppings); $i++){
            $toppings = $hs_toppings[$i];
            echo "<button class='food_choice'>$toppings</button>";
        }
        ?>
    </div>
    <?php
    } else {
        echo '';
    }
    ?>

    <?php
    // Drinks
    if (sizeof($hs_drinks) > 1) {
    ?>
    <div class="drinks">
        <?php
        for($i = 0; $i<sizeof($hs_drinks); $i++){
            $drinks = $hs_drinks[$i];
            echo "<button class='food_choice'>$drinks</button>";
        }
        ?>
    </div>
    <?php
    } else {
        echo '';
    }
    ?>

    <?php
    // Sides
    if (sizeof($hs_sides) > 1) {
    ?>
    <div class="sides">
        <?php
        for($i = 0; $i<sizeof($hs_sides); $i++){
            $sides = $hs_sides[$i];
            echo "<button class='food_choice'>$sides</button>";
        }
        ?>
    </div>
    <?php
    } else {
        echo '';
    }
    ?>
</div>