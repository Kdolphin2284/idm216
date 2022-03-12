<!DOCTYPE html>

<?php 

// Database Connection
include '../includes/db.php';

// Requesting Information from Selected Category
$sql = "SELECT * FROM order_information";
$result = mysqli_query($conn, $sql);

?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Happy Sunshine | Cart</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="stylesheet" href="../css/normalize.css">
    </head>
    <body>
        <nav id="mobile-nav">
            <header class="header home-header">
                <div id="x" class="x-menu">
                    <img src="../media/images/x.svg">
                </div>
                <div class="hs-logo">
                    <a href="../index.php">
                        <img src="../media/images/happy-sunshine-logo.svg" alt="Happy Sunshine Logo">
                    </a>
                </div>
                <div class="cart">
                    <img src="../media/images/happy-sunshine-cart-filled.svg" alt="Happy Sunshine Cart">
                </div>
            </header>
            <div id="nav-links">
                <a href="../index.php">Home</a>
                <a href="menu.php">Menu</a>
                <a href="favoriteOrders.php">Favorites</a>
                <a href="recentOrders.php">Recents</a>
            </div>
        </nav>
        <header class="header">
            <div id="header-menu" class="hamburger-menu">
                <div class="hamburger-rectangle"></div>
                <div class="hamburger-rectangle"></div>
                <div class="hamburger-rectangle"></div>
            </div>
            <div class="hs-logo">
                <a href="../index.php">
                    <img src="../media/images/happy-sunshine-logo.svg" alt="Happy Sunshine Logo">
                </a>
            </div>
            <div class="cart">
                <img src="../media/images/happy-sunshine-cart-filled.svg" alt="Happy Sunshine Cart">
            </div>
        </header>
        <section id="cart-info">
            <div class="menu-header flex-row">
                <div class="col-1-3">
                    <a href="menu.php" class="flex-row">
                        <img src="../media/images/general-menu-arrow.svg" alt="Happy Sunshine Arrow">
                        <p>Menu</p>
                    </a>
                </div>
                <div class="col-1-3">
                    <h2>My Cart</h2>
                </div>
                <div class="col-1-3"></div>
            </div>

            <?php

            while($row = mysqli_fetch_array($result)){
                // Initialize Variables
                    $id = $row['id'];
                    $hs_base = explode(", ", htmlspecialchars_decode($row['base'], ENT_QUOTES));
                    $hs_protein = explode(", ", htmlspecialchars_decode($row['protein'], ENT_QUOTES));
                    $hs_more = explode(", ", htmlspecialchars_decode($row['more'], ENT_QUOTES));
                    $hs_toppings = explode(", ", htmlspecialchars_decode($row['toppings'], ENT_QUOTES));
                    $hs_drinks = explode(", ", htmlspecialchars_decode($row['drinks'], ENT_QUOTES));
                    $hs_sides = explode(", ", htmlspecialchars_decode($row['sides'], ENT_QUOTES));
                    $hs_price = htmlspecialchars_decode($row['price'], ENT_QUOTES);
                    $hs_hero = $row['heroImage'];
                    $hs_category = htmlspecialchars_decode($row['category'], ENT_QUOTES);

                    var_dump($hs_more);
                        // Singular or plural category names for food items
                        if ($hs_category == 'Breakfast Sandwiches') {
                            $hs_category = 'Breakfast Sandwich';
                        } else if ($hs_category == 'French Toast') {
                            $hs_category = 'French Toast';
                        } else if ($hs_category == 'Cheesesteaks') {
                            $hs_category = 'Cheesesteak';
                        } else if ($hs_category == 'Lunch Sandwiches') {
                            $hs_category = 'Lunch Sandwich';
                        } else if ($hs_category == 'Club Sandwiches') {
                            $hs_category = 'Club Sandwich';
                        } else if ($hs_category == 'Hot Dog & Sausage') {
                            $hs_category = 'Hot Dog & Sausage';
                        } else if ($hs_category == 'Hoagies') {
                            $hs_category = 'Hoagie';
                        } else if ($hs_category == 'Burgers') {
                            $hs_category = 'Burger';
                        } else if ($hs_category == 'Grilled Cheese') {
                            $hs_category = 'Grilled Cheese';
                        } else if ($hs_category == 'Side Orders') {
                            $hs_category = 'Side Order';
                        } else if ($hs_category == 'Drinks') {
                            $hs_category = 'Drinks';
                        } 

                        // Array to strings

                        // Base Variable Initialized
                        for($i = 0; $i<count($hs_base); $i++)
                        {

                            $base = $hs_base[$i];
                             if($base === '') {
                                $base = '';
                             } else {
                                $base = $hs_base[$i] . ", ";
                             }

                        }
                    
                        // Protein Variable Initialized
                        for($i = 0; $i<count($hs_protein); $i++)
                        {

                            $totalProtein = $hs_protein[$i];
                            $proteinWithNoPrice = explode(":", htmlspecialchars_decode($totalProtein), ENT_QUOTES);
                            $realProtein = $proteinWithNoPrice[0];

                            if ($realProtein === '') {
                                $protein = '';
                            } else {
                                $protein = $realProtein . ", ";
                            }
                            
                        }

                        // More Variable Initialized
                        for($i = 0; $i<count($hs_more); $i++)
                        {

                            // $more = $hs_more[$i];
                            $more = $hs_more[$i];
                            // if($more === '') {
                            //    $more = '';
                            // } else {
                            //    $more = $hs_more[$i];
                            // }

                           

                            

                        }

                        var_dump(count($hs_more));
                        for($i = 0; $i<count($hs_toppings); $i++)
                        {

                            $toppings = $hs_toppings[$i];
                             if(!$toppings == NULL) {
                                $toppings = $hs_toppings[$i] . ", ";
                             }

                        }
                        
                        for($i = 0; $i<count($hs_drinks); $i++)
                        {

                            $drinks = $hs_drinks[$i];
                            //  if(!$drinks == NULL) {
                            //     $drinks = $hs_drinks[$i] . ", ";
                            //  }

                        }

                        for($i = 0; $i<count($hs_sides); $i++)
                        {

                            $sides = $hs_sides[$i];
                             if(!$sides == NULL) {
                                $sides = $hs_sides[$i] . ", ";
                             }

                        }

                echo 
                "
                <div class='cart-indi-item'>
                    <div class='cart-items'>
                        <div class='cart-food-item flex-row-wrap'>
                            <img src='' alt='Small Breakfast Sandwich' style='max-width: 100px; width: 100%; height: 80px; background-image: url($hs_hero); background-size: cover; background-position: top; background-repeat: no-repeat; color: transparent;'>
                            <div class='cart-food-item-info flex-col'>
                                <h5>$hs_category $id This is an id</h5>
                                <p>$base $protein $more $toppings $drinks $sides</p>
                                <p>Price: <span>$hs_price</span></p>
                            </div>
                        </div>
                    </div>
                    <div class='cart-remove-edit-add flex-row col-1-1'>
                        <div class='col-1-2'>
                            <a href='#'>Remove</a>
                            <a href='#'>Edit</a>
                        </div>
                        <div class='col-1-2'>
                            <div class='flex-row add-subtract'>
                                <div id='subtract-order' class='icon-rectangle'></div>
                                <p>1</p>
                                <div id='add-order' class='add-icon'>
                                    <div class='icon-rectangle'></div>
                                    <div class='icon-rectangle'></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                ";
            }

            ?>
        </section>
        <section id="cart-footer">
            <div class="flex-col">
                <p>Total: $5.00 <span>Cash Only</span></p>
                <a href="orderSummary.php" class="large-yellow-btn">Go to Order Summary</a>
            </div>
        </section>
        <script src="../scripts/script.js" async defer></script>
    </body>
</html>