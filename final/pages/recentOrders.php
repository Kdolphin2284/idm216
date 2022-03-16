<!DOCTYPE html>

<?php

// Database Connection
include '../includes/db.php';

// Requesting Information from Selected Category
$sql = "SELECT * FROM recent_orders";
$result = mysqli_query($conn, $sql);

?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Happy Sunshine | Recent Orders</title>
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
                    <a href="../home.php">
                        <img src="../media/images/happy-sunshine-logo.svg" alt="Happy Sunshine Logo">
                    </a>
                </div>
                <div class="cart">
                    <?php include '../includes/cartIcon.php'; ?>
                </div>
            </header>
            <div id="nav-links">
                <a href="../home.php">Home</a>
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
                <a href="../home.php">
                    <img src="../media/images/happy-sunshine-logo.svg" alt="Happy Sunshine Logo">
                </a>
            </div>
            <div class="cart">
                <div class="rest-nav">
                    <a href="menu.php">Menu</a>
                    <a href="favoriteOrders.php">Favorites</a>
                    <a href="recentOrders.php">Recents</a>
                </div>
                <?php include '../includes/cartIcon.php'; ?>
            </div>
        </header>
        <section id="order-info">
            <div class="menu-header flex-row">
                <div class="col-1-3">
                    <a href="../home.php" class="flex-row">
                        <img src="../media/images/general-menu-arrow.svg" alt="Happy Sunshine Arrow">
                        <p>Home</p>
                    </a>
                </div>
                <div class="col-1-3">
                    <h2>Recent Orders</h2>
                </div>
                <div class="col-1-3"></div>
            </div>

            <div class="cart-items flex-col">
            <?php

            date_default_timezone_set('America/New York');
            $date = date('m/d/y');
            
                echo
                "
                <style>
                .recent-favorite-image::before {
                    content: '$date';
                </style>
                ";

                // YEEP
                $favoriteResponse = mysqli_query($conn, "SELECT uniqueId from favorite_orders;");
                $allFavoriteIds = array();
                while($favoriteRow = mysqli_fetch_array($favoriteResponse))
                {
                array_push($allFavoriteIds, $favoriteRow['uniqueId']);
                }

            while($row = mysqli_fetch_array($result)){
                // Initialize Variables
                    $id = $row['id'];
                    $originalId = $row['originalId'];
                    $uniqueId = $row['uniqueId'];
                    $hs_base = explode(", ", htmlspecialchars_decode($row['base'], ENT_QUOTES));
                    $hs_protein = explode(", ", htmlspecialchars_decode($row['protein'], ENT_QUOTES));
                    $hs_more = explode(", ", htmlspecialchars_decode($row['more'], ENT_QUOTES));
                    $hs_toppings = explode(", ", htmlspecialchars_decode($row['toppings'], ENT_QUOTES));
                    $hs_drinks = explode(", ", htmlspecialchars_decode($row['drinks'], ENT_QUOTES));
                    $hs_sides = explode(", ", htmlspecialchars_decode($row['sides'], ENT_QUOTES));
                    $hs_price = htmlspecialchars_decode($row['price'], ENT_QUOTES);
                    $hs_hero = $row['heroImage'];
                    $hs_category = htmlspecialchars_decode($row['category'], ENT_QUOTES);

                    $hs_blurb = htmlspecialchars_decode($row['blurb'], ENT_QUOTES);
                    $blurbNoSpace = str_replace(" ", "-", $hs_blurb);
                    
                    // Checking if food exists in both tables
                    // echo $uniqueId;
                    // var_dump($allFavoriteIds);
                    


                        // Singular or plural category names for food items
                        if ($hs_category == 'Breakfast Sandwiches') {
                            $category = 'Breakfast Sandwich';
                        } else if ($hs_category == 'French Toast') {
                            $category = 'French Toast';
                        } else if ($hs_category == 'Cheesesteaks') {
                            $category = 'Cheesesteak';
                        } else if ($hs_category == 'Lunch Sandwiches') {
                            $category = 'Lunch Sandwich';
                        } else if ($hs_category == 'Club Sandwiches') {
                            $category = 'Club Sandwich';
                        } else if ($hs_category == 'Hot Dog & Sausage') {
                            $category = 'Hot Dog & Sausage';
                        } else if ($hs_category == 'Hoagies') {
                            $category = 'Hoagie';
                        } else if ($hs_category == 'Burgers') {
                            $category = 'Burger';
                        } else if ($hs_category == 'Grilled Cheese') {
                            $category = 'Grilled Cheese';
                        } else if ($hs_category == 'Side Orders') {
                            $category = 'Side Order';
                        } else if ($hs_category == 'Drinks') {
                            $category = 'Drinks';
                        } 

                        // Array to strings

                        // Sides Variable Initialized
                        $sides = implode(", ", $hs_sides);

                        // Drinks Variable Initialized
                        $drinks = implode(", ", $hs_drinks);

                        // Toppings Variable Initialized
                        $toppings = implode(", ", $hs_toppings);

                        // More Variable Initialized
                        $more = implode(", ", $hs_more);
                        if($more === '') {
                            $more = '';
                        } else if ($toppings === ''){
                            $more = implode(", ", $hs_more);
                        } else {
                            $more = implode(", ", $hs_more) . ", ";
                        }

                        // Protein Variable Initialized
                        for($i = 0; $i<count($hs_protein); $i++)
                        {

                            $totalProtein = $hs_protein[$i];
                            $proteinWithNoPrice = explode(":", htmlspecialchars_decode($totalProtein), ENT_QUOTES);
                            $realProtein = $proteinWithNoPrice[0];
                            
                            if ($realProtein === '') {
                                $protein = '';
                            } else if ($more === '' && $toppings == ''){
                                $protein = $realProtein;
                            } else {
                                $protein = $realProtein . ", ";
                            }

                        }
                        
                        // Base Variable Initialized
                        for($i = 0; $i<count($hs_base); $i++)
                        {

                            $base = $hs_base[$i];

                            if($base === '') {
                                $base = '';
                            } else if ($protein === '' && $more === '' && $toppings === ''){
                                $base = $hs_base[$i];
                            } else {
                                $base = $hs_base[$i] . ", ";
                            } 
                        }

                        if(in_array($uniqueId, $allFavoriteIds)){
                            echo 
                                "
                                <div class='cart-food-item flex-row-wrap favorite-order'>
                                    <div class='image-heart'>
                                        <div class='recent-favorite-image'>
                                            <img src='' alt='Small Breakfast Sandwich' style='max-width: 100px; width: 100%; height: 80px; background-image: url($hs_hero); background-size: cover; background-position: top; background-repeat: no-repeat; color: transparent;'>
                                        </div>
                                        <div class='recent-favorite'>
                                            <h5>$category</h5>
                                            <p>$base $protein $more $toppings $sides $drinks</p>
                                            <p>Price: <span>$hs_price</span></p>
                                        </div>
                                    </div>
                                    <div class='cart-food-item-info flex-col'>
                                        <div class='fb-30'>
                                            <form method='POST' action='../includes/deleteFromFavoritesRecent.php?uniqueId=$uniqueId'>
                                                <button>
                                                    <img src='../media/images/favorite-heart.svg' alt='Heart Image'>
                                                </button>
                                            </form>
                                        </div>
                                        <div class='recent-favorite-a-space'>
                                            <a href='../includes/recentToCart.php?id=$id' class='large-yellow-btn'>Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                                ";
                           }
                           else{
                               echo 
                               "
                               <div class='cart-food-item flex-row-wrap favorite-order'>
                                    <div class='image-heart'>
                                        <div class='recent-favorite-image'>
                                            <img src='' alt='Small Breakfast Sandwich' style='max-width: 100px; width: 100%; height: 80px; background-image: url($hs_hero); background-size: cover; background-position: top; background-repeat: no-repeat; color: transparent;'>
                                        </div>
                                        <div class='recent-favorite'>
                                            <h5>$category</h5>
                                            <p>$base $protein $more $toppings $sides $drinks</p>
                                            <p>Price: <span>$hs_price</span></p>
                                        </div>
                                    </div>
                                    <div class='cart-food-item-info flex-col'>
                                        <div class='fb-30'>
                                            <form method='POST' action='../includes/addToFavorites.php?uniqueId=$uniqueId'>
                                                <button>
                                                    <img src='../media/images/happy-sunshine-heart-hollow.svg' alt='Heart Image'>
                                                </button>
                                            </form>
                                        </div>
                                        <div class='recent-favorite-a-space'>
                                            <a href='../includes/recentToCart.php?id=$id' class='large-yellow-btn'>Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                               ";
                           }
            }

            ?>  
            </div>
        </section>
        <script src="../scripts/script.js" async defer></script>
    </body>
</html>