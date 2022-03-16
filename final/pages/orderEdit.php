<!DOCTYPE html>
<?php 

// Database Connection
include '../includes/db.php';

// Get ID
$originalId = $_GET['originalId'];
$id = $_GET['id'];

// Get Base
$pastBase = $_GET['base'];
$pastBaseNoCommas = str_replace(", ", "", $pastBase);

//Get Protein
$pastProtein = $_GET['protein'];
$pastProteinNoCommas = str_replace(", ", "", $pastProtein);

//Get More
$pastMore = $_GET['more'];
$pastMoreArray = explode(", ", $pastMore);

//Get Topping
$pastToppings = $_GET['toppings'];
$pastToppingsArray = explode(", ", $pastToppings);

//Get Topping
$pastDrinks = $_GET['drinks'];
$pastDrinksArray = explode(", ", $pastDrinks);

//Get Topping
$pastSides = $_GET['sides'];
$pastSidesArray = explode(", ", $pastSides);

// Get Price
$pastPrice = $_GET['price'];

// Requesting Information from Selected Category
$sql = "SELECT * FROM happy_sunshine_food WHERE id=$originalId";
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
        $hs_price = htmlspecialchars_decode($row['price'], ENT_QUOTES);
        $hs_blurb = htmlspecialchars_decode($row['blurb'], ENT_QUOTES);
        $hs_hero = $row['heroImage'];

    }
}

?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Happy Sunshine | Order Customization</title>
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
            <div class="menu-header flex-row">
                <div class="col-1-3">
                    <a href="menu.php" class="flex-row">
                        <img src="../media/images/general-menu-arrow.svg" alt="Happy Sunshine Logo">
                        <p>Menu</p>
                    </a>
                </div>
                <div class="col-1-3"></div>
                <div class="col-1-3"></div>
            </div>
            <div id="desktop-optimization">
            <section id="customization-hero">
                <div class="food-hero" style="background: url('<?php echo $hs_hero ;?>'); background-size: cover;"></div>
                <div class="hero-text">
                    <h4><?php echo $hs_category; ?><span class="price-desktop"><?php echo $hs_price; ?></span></h4>
                    <p><?php echo $pastPrice; ?></p>
                    <p><?php echo $hs_blurb; ?></p>
                </div>
            </section>
            <div id="individual_options">
                <form method="POST" action="../includes/updateCart.php">
                    <section id="order-customization-section">
                        
                        <field hidden>
                            <input name="category" id="category" value="<?php echo $hs_category ?>">
                        </field>
                        <field hidden>
                            <input name="price" id="price" value="<?php echo $hs_price ?>">
                        </field>
                        <field hidden>
                            <input name="heroImage" id="heroImage" value="<?php echo $hs_hero ?>">
                        </field>
                        <field hidden>
                            <input name="blurb" id="blurb" value="<?php echo $hs_blurb ?>">
                        </field>
                        <field hidden>
                            <input name="id" id="id" value="<?php echo $id ?>">
                        </field>
                        <field hidden>
                            <input name="originalId" id="originalId" value="<?php echo $originalId ?>">
                        </field>

                        <h2 class="desktop-customize-title">Customize Order</h2>

                        <!-- Base Start -->
                        <?php if (sizeof($hs_base) > 1) { ?>

                            <div class="customization-category">
                                <div class="category-heading flex-row">
                                    <h5>Bread</h5>
                                    <p>Choose 1</p>
                                </div>
                                <div class="customization-options">
                                    <field>

                                        <?php 
                                        

                                        foreach ($hs_base as $value) {
                                            $valueLower = strtolower($value);
                                            $valueNoSpace = str_replace(' ', '', $valueLower);
                                            if($pastBaseNoCommas == $value) {
                                                echo "
                                                <div class='food_input'>
                                                    <input name='base' id='$valueNoSpace' type='radio' value='$value' checked hidden>
                                                    <label class='food_choice base' for='$valueNoSpace'><p>$value</p></label>
                                                </div>
                                            ";
                                            } else {
                                                echo "<div class='food_input'>
                                                        <input name='base' id='$valueNoSpace' type='radio' value='$value' hidden>
                                                        <label class='food_choice base' for='$valueNoSpace'><p>$value</p></label>
                                                    </div>
                                                    ";
                                            }
                                        }
                                        
                                        ?>

                                    </field>
                                </div>
                            </div> 
                            
                            <?php } else 
                            { 

                                echo '';

                            } ?>
                        <!-- Base End -->



                        <!-- Protein Start -->
                        <?php if (sizeof($hs_protein) > 1) { ?>

                            <div class="customization-category">
                                <div class="category-heading flex-row">
                                    <h5>Protein</h5>
                                    <p>Choose 1</p>
                                </div>
                                <div class="customization-options">
                                    <field>

                                        <?php 

                                            // New Loop
                                            foreach ($hs_protein as $value) {
                                                $valueLower = strtolower($value);
                                                $valueNoSpace = str_replace(' ', '', $valueLower);
                                                $valueWithPrice = explode(":", htmlspecialchars_decode($value), ENT_QUOTES);
                                                
                                                if($pastProteinNoCommas == $valueWithPrice[0]) {
                                                    echo "
                                                    <div class='food_input'>
                                                        <input name='protein' id='$valueNoSpace' type='radio' value='$value' checked hidden>
                                                        <label class='food_choice protein' for='$valueNoSpace'><p>$valueWithPrice[0]</p><p>$valueWithPrice[1]</p></label>
                                                    </div>
                                                ";
                                                } else {
                                                    echo "<div class='food_input'>
                                                            <input name='protein' id='$valueNoSpace' type='radio' value='$value' hidden>
                                                            <label class='food_choice protein' for='$valueNoSpace'><p>$valueWithPrice[0]</p><p>$valueWithPrice[1]</p></label>
                                                        </div>
                                                        ";
                                                }
                                            }
                                        
                                        ?>

                                    </field>
                                </div>
                            </div> 

                            <?php } else 
                            { 

                                echo '';

                            } ?>
                        <!-- Protein End -->



                        <!-- More Start -->
                        <?php if (sizeof($hs_more) > 1) { ?>

                            <div class="customization-category">
                                <div class="category-heading flex-row">
                                    <h5>More</h5>
                                    <p>Optional</p>
                                </div>
                                <div class="customization-options">
                                    <field>

                                        <?php 

                                            foreach ($hs_more as $value) {
                                                $valueLower = strtolower($value);
                                                $valueNoSpace = str_replace(' ', '', $valueLower);

                                                if(in_array($value, $pastMoreArray)) {
                                                    echo "
                                                    <div class='food_input'>
                                                        <input name='more[]' id='$valueNoSpace' type='checkbox' value='$value' checked hidden>
                                                        <label class='food_choice more' for='$valueNoSpace'><p>$value</p></label>
                                                    </div>
                                                ";
                                                } else {
                                                    echo "<div class='food_input'>
                                                            <input name='more[]' id='$valueNoSpace' type='checkbox' value='$value' hidden>
                                                            <label class='food_choice more' for='$valueNoSpace'><p>$value</p></label>
                                                        </div>
                                                        ";
                                                }
                                            }
                                        
                                        ?>

                                    </field>
                                </div>
                            </div> 

                            <?php } else 
                            { 

                                echo '';

                            } ?>
                        <!-- More End -->



                        <!-- Toppings Start -->
                        <?php if (sizeof($hs_toppings) > 1) { ?>

                            <div class="customization-category">
                                <div class="category-heading flex-row">
                                    <h5>Toppings</h5>
                                    <p>Optional</p>
                                </div>
                                <div class="customization-options">
                                    <field>

                                        <?php                             

                                            foreach ($hs_toppings as $value) {
                                                $valueLower = strtolower($value);
                                                $valueNoSpace = str_replace(' ', '', $valueLower);

                                                if(in_array($value, $pastToppingsArray)) {
                                                    echo "
                                                        <div class='food_input'>
                                                            <input name='toppings[]' id='$valueNoSpace' type='checkbox' value='$value' checked hidden>
                                                            <label class='food_choice toppings check-btn' for='$valueNoSpace'><img src='../media/images/happy-sunshine-check.svg' alt='Checkmark'><p>$value</p></label>
                                                        </div>
                                                        ";
                                                } else {
                                                    echo "
                                                        <div class='food_input'>
                                                            <input name='toppings[]' id='$valueNoSpace' type='checkbox' value='$value' hidden>
                                                            <label class='food_choice toppings check-btn' for='$valueNoSpace'><img src='../media/images/happy-sunshine-check.svg' alt='Checkmark'><p>$value</p></label>
                                                        </div>
                                                        ";
                                                }
                                            }
                                        ?>

                                    </field>
                                </div>
                            </div> 

                            <?php } else 
                            { 

                                echo '';

                            } ?>
                        <!-- Toppings End -->



                        <!-- Drinks Start -->
                        <?php if (sizeof($hs_drinks) > 1) { ?>

                            <div class="customization-category">
                                <div class="category-heading flex-row">
                                    <h5>Drinks</h5>
                                </div>
                                <div class="customization-options">
                                    <field>

                                        <?php

                                            foreach ($hs_drinks as $value) {
                                                $valueLower = strtolower($value);
                                                $valueNoSpace = str_replace(' ', '', $valueLower);

                                                if(in_array($value, $pastDrinksArray)) {
                                                    echo "
                                                    <div class='food_input'>
                                                        <input name='drinks[]' id='$valueNoSpace' type='checkbox' value='$value' checked hidden>
                                                        <label class='food_choice drinks' for='$valueNoSpace'><p>$value</p></label>
                                                    </div>
                                                ";
                                                } else {
                                                    echo "<div class='food_input'>
                                                            <input name='drinks[]' id='$valueNoSpace' type='checkbox' value='$value' hidden>
                                                            <label class='food_choice drinks' for='$valueNoSpace'><p>$value</p></label>
                                                        </div>
                                                        ";
                                                }
                                            }
                                        
                                        ?>

                                    </field>
                                </div>
                            </div> 

                            <?php } else 
                            { 

                                echo '';

                            } ?>
                        <!-- Drinks End -->



                        <!-- Sides Start -->
                        <?php if (sizeof($hs_sides) > 1) { ?>

                            <div class="customization-category">
                                <div class="category-heading flex-row">
                                    <h5>Sides</h5>
                                </div>
                                <div class="customization-options">
                                    <field>

                                        <?php

                                            foreach ($hs_sides as $value) {
                                                $valueLower = strtolower($value);
                                                $valueNoSpace = str_replace(' ', '', $valueLower);

                                                if(in_array($value, $pastSidesArray)) {
                                                    echo "
                                                    <div class='food_input'>
                                                        <input name='sides[]' id='$valueNoSpace' type='checkbox' value='$value' checked hidden>
                                                        <label class='food_choice sides' for='$valueNoSpace'><p>$value</p></label>
                                                    </div>
                                                ";
                                                } else {
                                                    echo "<div class='food_input'>
                                                            <input name='sides[]' id='$valueNoSpace' type='checkbox' value='$value' hidden>
                                                            <label class='food_choice sides' for='$valueNoSpace'><p>$value</p></label>
                                                        </div>
                                                        ";
                                                }
                                            }
                                        
                                        ?>

                                    </field>
                                </div>
                            </div> 

                            <?php } else 
                            { 

                                echo '';

                            } ?>
                        <!-- Sides End -->

                        

                    </section>
                    <section id="order-customization-footer">
                        <div class="add-note col-1-1 flex-col">
                            <label for="order-note">Add Note</label>
                            <input type="text" id="order-note" name="order-note">
                        </div>
                        <div class="col-1-1">
                            <p><span class="bold-text"><?php echo $pastPrice; ?></span> Cash Only</p>
                        </div>
                        <div class="col-1-1">
                            <button type="submit" name="submit" id="modal-button" class="large-yellow-btn">Update</button>
                        </div>
                    </section>
                </form>
            </div>
            </div>
            <div id="confirm-modal">
                <div class="col-1-1">
                    <h3>Added to Cart!</h3>
                </div>
                <div class="col-1-1">
                    <div class="col-1-2">
                        <a href="menu.php" class="large-yellow-btn">Back to Menu</a>
                    </div>
                    <div class="col-1-2">
                        <a href="cart.php" class="large-yellow-btn">View Cart</a>
                    </div>
                </div>
            </div>
        <script src="../scripts/script.js" async defer></script>
        <script src="../scripts/confirmModal.js" async defer></script>
    </body>
</html>
    