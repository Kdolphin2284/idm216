<!DOCTYPE html>
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
                    <a href="../index.php">
                        <img src="../media/images/happy-sunshine-logo.svg" alt="Happy Sunshine Logo">
                    </a>
                </div>
                <div class="cart">
                    <a href="cartWithNothing.php">
                        <img src="../media/images/happy-sunshine-cart.svg" alt="Happy Sunshine Logo">
                    </a>
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
                    <a href="cartWithNothing.php">
                        <img src="../media/images/happy-sunshine-cart.svg">
                    </a>
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
            <section id="customization-hero">
                <div class="food-hero" style="background: url('<?php echo $hs_hero ;?>'); background-size: cover;"></div>
                <div class="hero-text">
                <?php
                    // Category
                    echo "<h4>$hs_category</h4>";
                    ?>
                    <p><?php echo $hs_price; ?></p>
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
                                        
                                            for($i = 0; $i<sizeof($hs_base); $i++)
                                            {

                                                $base = $hs_base[$i];
                                                $baseLower = strtolower($base);
                                                $baseNoSpace = str_replace(' ', '', $baseLower);

                                                echo 
                                                "
                                                    <div class='food_input'>
                                                        <input name='base' id='$baseNoSpace' type='radio' value='$base' hidden>
                                                        <label class='food_choice base' onclick='btnToggle(event)' for='$baseNoSpace'><p>$base</p></label>
                                                    </div>
                                                ";

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
                                        
                                            for($i = 0; $i<sizeof($hs_protein); $i++)
                                            {

                                                $protein = $hs_protein[$i];
                                                $proteinLower = strtolower($protein);
                                                $proteinNoSpace = str_replace(' ', '', $proteinLower);

                                                // Check if protein has price value
                                                $proteinWithPrice = explode(":", htmlspecialchars_decode($protein), ENT_QUOTES);

                                                if (sizeof($proteinWithPrice) > 1) 
                                                {
                                                    echo 
                                                    "
                                                    <div class='food_input'>
                                                        <input name='protein' id='$proteinNoSpace' type='checkbox' value='$protein' hidden>
                                                        <label class='food_choice protein' onclick='btnToggle2(event)' for='$proteinNoSpace'><p>$proteinWithPrice[0]</p><p>$proteinWithPrice[1]</p></label>
                                                    </div>
                                                    ";
                                                    continue;
                                                }

                                                echo 
                                                "
                                                    <div class='food_input'>
                                                        <input name='protein' id='$proteinNoSpace' type='checkbox' value='$protein' hidden>
                                                        <label class='food_choice protein' onclick='btnToggle2(event)' for='$proteinNoSpace'><p>$protein</p></label>
                                                    </div>
                                                ";

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
                                        
                                            for($i = 0; $i<sizeof($hs_more); $i++)
                                            {

                                                $more = $hs_more[$i];
                                                $moreLower = strtolower($more);
                                                $moreNoSpace = str_replace(' ', '', $moreLower);

                                                echo 
                                                "
                                                    <div class='food_input'>
                                                        <input name='more[]' id='$moreNoSpace' type='checkbox' value='$more' hidden>
                                                        <label class='food_choice more' onclick='btnMulti2(event)' for='$moreNoSpace'><p>$more</p></label>
                                                    </div>
                                                ";

                                            }

                                            // $totalMore =
                                        
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
                                        
                                            for($i = 0; $i<sizeof($hs_toppings); $i++)
                                            {

                                                $toppings = $hs_toppings[$i];
                                                $toppingsLower = strtolower($toppings);
                                                $toppingsNoSpace = str_replace(' ', '', $toppingsLower);

                                                echo 
                                                "
                                                    <div class='food_input'>
                                                        <input name='toppings[]' id='$toppingsNoSpace' type='checkbox' value='$toppings' checked hidden>
                                                        <label class='food_choice toppings check-btn' onclick='btnMulti(event)' for='$toppingsNoSpace'><img src='../media/images/happy-sunshine-check.svg' alt='Checkmark'><p>$toppings</p></label>
                                                    </div>
                                                ";

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
                                        
                                            for($i = 0; $i<sizeof($hs_drinks); $i++)
                                            {

                                                $drinks = $hs_drinks[$i];
                                                $drinksLower = strtolower($drinks);
                                                $drinksNoSpace = str_replace(' ', '', $drinksLower);

                                                echo 
                                                "
                                                    <div class='food_input'>
                                                        <input name='drinks[]' id='$drinksNoSpace' type='checkbox' value='$drinks' hidden>
                                                        <label class='food_choice drinks' onclick='btnMulti2(event)' for='$drinksNoSpace'><p>$drinks</p></label>
                                                    </div>
                                                ";

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
                                        
                                            for($i = 0; $i<sizeof($hs_sides); $i++)
                                            {

                                                $sides = $hs_sides[$i];
                                                $sidesLower = strtolower($sides);
                                                $sidesNoSpace = str_replace(' ', '', $sidesLower);

                                                echo 
                                                "
                                                    <div class='food_input'>
                                                        <input name='sides[]' id='$sidesNoSpace' type='checkbox' value='$sides' hidden>
                                                        <label class='food_choice sides' onclick='btnMulti2(event)' for='$sidesNoSpace'><p>$sides</p></label>
                                                    </div>
                                                ";

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
                            <p><span class="bold-text"><?php echo $hs_price; ?></span> Cash Only</p>
                        </div>
                        <div class="col-1-1">
                            <button type="submit" name="submit" id="modal-button" class="large-yellow-btn">Add to Cart</button>
                        </div>
                    </section>
                </form>
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
    