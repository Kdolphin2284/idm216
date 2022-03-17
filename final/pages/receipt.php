<!DOCTYPE html>


<?php

// Database Connection
include '../includes/db.php';

// Requesting Information from Selected Category
$sql = "SELECT * FROM receipt";
$result = mysqli_query($conn, $sql);

$time = $_GET['time'];
$price = $_GET['price'];

?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Happy Sunshine | Receipt</title>
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
        <div id="entire-receipt">
        <section id="cart-info">
            <div class="menu-header flex-row">
                <div class="col-1-3">
                    <a href="../home.php" class="flex-row">
                        <img src="../media/images/general-menu-arrow.svg" alt="Menu Arrow">
                        <p>Home</p>
                    </a>
                </div>
                <div class="col-1-3">
                    <h2>Receipt</h2>
                </div>
                <div class="col-1-3"></div>
            </div>
            <div id="thanks-for-order">
                <p>Thank you for ordering! Show this screen when picking up your order at <a href="https://goo.gl/maps/831imkCAV1D99KYcA" target="_blank">33rd and Arch St. <img src="../media/images/happy-sunshine-link.svg"></a></p>
            </div>
            <div id="whole-order-receipt">
                        <?php

            while($row = mysqli_fetch_array($result)){
                // Initialize Variables
                    $id = $row['id'];
                    $originalId = $row['originalId'];
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
                        
                echo 
                "
                <div class='cart-items flex-col'>
                    <div class='cart-food-item flex-row-wrap'>
                        <img src='' alt='Small Breakfast Sandwich' style='max-width: 100px; width: 100%; height: 80px; background-image: url($hs_hero); background-size: cover; background-position: top; background-repeat: no-repeat; color: transparent;'>
                        <div class='cart-food-item-info flex-col'>
                            <h5>$category</h5>
                            <p>$base $protein $more $toppings $drinks $sides</p>
                            <p>Price: <span>$hs_price</span></p>
                        </div>
                    </div>
                </div>
                ";
            }

            ?>
            <?php 
            
            $name = $_GET['name'];
            if($name) {
                echo "
                    <style>
                        #name-form-contain {
                            display: none;
                        }
                    </style>
                    <script>
                    var keys = {37: 1, 38: 1, 39: 1, 40: 1};

                    function preventDefault(e) {
                    e.preventDefault();
                    }

                    function preventDefaultForScrollKeys(e) {
                    if (keys[e.keyCode]) {
                        preventDefault(e);
                        return false;
                    }
                    }

                    // modern Chrome requires { passive: false } when adding event
                    var supportsPassive = false;
                    try {
                    window.addEventListener('test', null, Object.defineProperty({}, 'passive', {
                        get: function () { supportsPassive = true; } 
                    }));
                    } catch(e) {}

                    var wheelOpt = supportsPassive ? { passive: false } : false;
                    var wheelEvent = 'onwheel' in document.createElement('div') ? 'wheel' : 'mousewheel';

                    // call this to Enable
                    function enableScroll() {
                    window.removeEventListener('DOMMouseScroll', preventDefault, false);
                    window.removeEventListener(wheelEvent, preventDefault, wheelOpt); 
                    window.removeEventListener('touchmove', preventDefault, wheelOpt);
                    window.removeEventListener('keydown', preventDefaultForScrollKeys, false);
                    }
                    enableScroll();
                    </script>
                    ";
                    $price = $_GET['price'];
            } else {
                echo "
                    <style>
                        #name-form {
                            display: block;
                        }
                        #name-form-contain {
                            z-index: 3000;
                            display: flex;
                        }

                    </style>
                    <script>
                    var keys = {37: 1, 38: 1, 39: 1, 40: 1};

                    function preventDefault(e) {
                    e.preventDefault();
                    }

                    function preventDefaultForScrollKeys(e) {
                    if (keys[e.keyCode]) {
                        preventDefault(e);
                        return false;
                    }
                    }

                    // modern Chrome requires { passive: false } when adding event
                    var supportsPassive = false;
                    try {
                    window.addEventListener('test', null, Object.defineProperty({}, 'passive', {
                        get: function () { supportsPassive = true; } 
                    }));
                    } catch(e) {}

                    var wheelOpt = supportsPassive ? { passive: false } : false;
                    var wheelEvent = 'onwheel' in document.createElement('div') ? 'wheel' : 'mousewheel';
                    function disableScroll() {
                        window.addEventListener('DOMMouseScroll', preventDefault, false); 
                        window.addEventListener(wheelEvent, preventDefault, wheelOpt); 
                        window.addEventListener('touchmove', preventDefault, wheelOpt); 
                        window.addEventListener('keydown', preventDefaultForScrollKeys, false);
                      }
                    disableScroll();
                    </script>
                    ";
                    $price = $_GET['price'];
                    $priceNoDollar = str_replace("$", "", $price);
            }
            
            ?>
            </div>
        </section>
            <div id="name-form-contain">
                <section id="name-form">
                    <form method="GET" action="../includes/getName.php">
                        <h2>Please give a name for your order:</h2>
                        <field>
                            <label for="firstName">First Name</label>
                            <input type="text" name="firstName" id="firstName" placeholder="First Name">
                        </field>
                        <field>
                            <label for="lastName">Last Initial</label>
                            <input type="text" name="lastName" id="lastName" placeholder="Last Initial">
                        </field>
                            <field hidden>
                                <input name="time" id="time" value="<?php echo $time; ?>">
                            </field>
                            <field hidden>
                                <input name="price" id="price" value="<?php echo $priceNoDollar; ?>">
                            </field>
                        <input class="large-yellow-btn" type="submit" value="Set name">
                    </form>
                </section>
            </div>
        <section id="cart-footer" class="receipt-footer">
            <div class="flex-col">
                <?php
                
                if($name) {
                    echo "<p>Name: <span>$name</span></p>";
                } else {
                    echo "<p>Name: <span>John Smith</span></p>";
                }
                
                ?>
                <p>Pick-up time: <span><?php if(strlen($time) == 0) echo "None selected"; else echo $time; ?></span></p>
                <p>Total: <span><?php echo $price; ?> Cash Only</span></p>
                <a href="tracking.php?price=<?php echo $price; ?>&name=<?php echo $name; ?>&time=<?php echo $time; ?>" class="large-yellow-btn">Track Order</a>
            </div>
        </section>
        </div>
        <script src="../scripts/script.js" async defer></script>
    </body>
</html>