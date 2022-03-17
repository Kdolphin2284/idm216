<!DOCTYPE html>

<?php 

// Database Connection
include '../includes/db.php';

// Requesting Information from Selected Category
$sql = "SELECT * FROM order_information";
$result = mysqli_query($conn, $sql);

// Get total price
$totalPrice = $_GET['total'];

?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Happy Sunshine | Order Summary</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="stylesheet" href="../css/normalize.css">
    </head>
    <body class="relative-modal" id="modal-before">
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
        <div class="min-height">
        <section id="order-info">
            <div class="menu-header flex-row">
                <div class="col-1-3">
                    <a href="cart.php" class="flex-row">
                        <img src="../media/images/general-menu-arrow.svg" alt="Happy Sunshine Logo">
                        <p>Cart</p>
                    </a>
                </div>
                <div class="col-1-3">
                    <h2>Order Summary</h2>
                </div>
                <div class="col-1-3"></div>
            </div>

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
                    <div class='edit-link'>
                        <a href='orderEdit.php?id=$id&originalId=$originalId&base=$base&protein=$protein&more=$more&toppings=$toppings&drinks=$drinks&sides=$sides&price=$hs_price'>Edit</a>
                    </div>
                </div>
                ";
            }

            ?>

        </section>
        <section id="pick-up-time" class="flex-col">
            <h5>Pick-up time:</h5>
            <div class="scroll-container">
                <field id="pick-up-scroll">
                    <div class='time-option'>
                        <input onclick='onRadioSelect(this.value);' name='time' id='asap' type='radio' value='ASAP' hidden>
                        <label class='time_choice time' for='asap'><p>ASAP</p></label>
                    </div>
                    <div class='time-option'>
                        <input onclick='onRadioSelect(this.value);' name='time' id='115' type='radio' value='1:15pm' hidden>
                        <label class='time_choice time' for='115'><p>1:15pm</p></label>
                    </div>
                    <div class='time-option'>
                        <input onclick='onRadioSelect(this.value);' name='time' id='130' type='radio' value='1:30pm' hidden>
                        <label class='time_choice time' for='130'><p>1:30pm</p></label>
                    </div>
                    <div class='time-option'>
                        <input onclick='onRadioSelect(this.value);' name='time' id='145' type='radio' value='1:45pm' hidden>
                        <label class='time_choice time' for='145'><p>1:45pm</p></label>
                    </div>
                    <div class='time-option'>
                        <input onclick='onRadioSelect(this.value);' name='time' id='200' type='radio' value='2:00pm' hidden>
                        <label class='time_choice time' for='200'><p>2:00pm</p></label>
                    </div>
                </field>
                <div id="result"></div>
                <script>

                        var radioValue = "";
                        function onRadioSelect(value){
                            radioValue = value;
                            console.log(radioValue);


                            var a = document.getElementById('order-summary-submit'); //or grab it by tagname etc
                            a.href = "../includes/receiptCreation.php?price=<?php echo $totalPrice; ?>&time="+radioValue;
                        }

                        
                        
                </script>
            </div>
        </section>
        <section id="cart-footer">
            <div class="flex-col">
                <h5>Pick-up location:</h5>
                <a href="https://goo.gl/maps/831imkCAV1D99KYcA" target="_blank">33rd Street and Arch Street Phildelphia, PA 19104</a>
                <p>Total: <?php echo $totalPrice; ?> <span>Cash Only</span></p>
                <button id="modal-button" class="large-yellow-btn">Confirm Order</button>
            </div>
        </section>
        </div>
        <div id="confirm-modal">
            <div class="col-1-1">
                <h3>Confirm your <span>cash only</span> order of pick up?</h3>
            </div>
            <div class="col-1-1">
                <div class="col-1-2">
                    <button id="cancel-button" class="large-yellow-btn">Cancel</button>
                </div>
                <div class="col-1-2">
                    <a id="order-summary-submit" href="../includes/receiptCreation.php?price=<?php echo $totalPrice; ?>" class="large-yellow-btn">Confirm</a>
                </div>
            </div>
        </div>
        <!-- <script src="../scripts/confirmModal.js" async defer></script> -->
        <script src="../scripts/closeModal.js" async defer></script>
        <script src="../scripts/script.js" async defer></script>
    </body>
</html>