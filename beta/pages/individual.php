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
                <a href="#">Profile</a>
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
            <section id="order-customization-section">


                <?php
                // Base
                if (sizeof($hs_base) > 1) {
                ?>
                <div class="customization-category">
                    <div class="category-heading flex-row">
                        <h5>Bread</h5>
                        <p>Choose 1</p>
                    </div>
                    <div class="customization-options">
                    <?php
                    for($i = 0; $i<sizeof($hs_base); $i++){
                        $base = $hs_base[$i];
                        ?>
                            <?php
                                echo "<button class='food_choice'><p>$base</p></button>";
                            ?>
                        <?php
                    }
                    ?>
                </div>
                <?php
                } else {
                    echo '';
                }
                ?>
                </div>

                <?php
                // Protein
                if (sizeof($hs_protein) >  1) {
                    ?>
                        <div class="customization-category">
                            <div class="category-heading flex-row">
                                <h5>Protein</h5>
                                <p>Choose 1</p>
                            </div>
                            <div class="customization-options">
                            <?php

                            // For each ingredient, add a button with their value
                            for($i = 0; $i<sizeof($hs_protein); $i++){
                                $protein = $hs_protein[$i];

                                // Check to see if ingredient has more than one value
                                $protein_with_price = explode(":", htmlspecialchars_decode($protein), ENT_QUOTES);
                                // var_dump($protein_with_price);
                                
                                // If an ingredient has more than 1 value
                                if (sizeof($protein_with_price) > 1) {
                                    echo "<button class='food_choice'><p>" . $protein_with_price[0] . "</p><p>" . $protein_with_price[1] . "</p></button>";
                                    continue;
                            }
                                ?>
                                    <?php
                                        echo "<button class='food_choice'><p>" . $protein . "</p></button>";
                                    ?>
                                <?php
                            }
                            ?>
                        </div>
                    <?php
                } else {
                    echo '';
                }
                ?>
                </div>


                <?php
                // More
                if (sizeof($hs_more) > 1) {
                ?>
                <div class="customization-category">
                    <div class="category-heading flex-row">
                        <h5>More</h5>
                        <p>Optional</p>
                    </div>
                    <div class="customization-options">
                    <?php
                    for($i = 0; $i<sizeof($hs_more); $i++){
                        $more = $hs_more[$i];
                        ?>
                            <?php
                                echo "<button class='food_choice'><p>$more</p></button>";
                            ?>
                        <?php
                    }
                    ?>
                </div>
                <?php
                } else {
                    echo '';
                }
                ?>
                </div>


                <?php
                // Toppings
                if (sizeof($hs_toppings) > 1) {
                ?>
                <div class="customization-category">
                    <div class="category-heading flex-row">
                        <h5>Toppings</h5>
                        <p>Optional</p>
                    </div>
                    <div class="customization-options">
                    <?php
                    for($i = 0; $i<sizeof($hs_toppings); $i++){
                        $toppings = $hs_toppings[$i];
                        ?>
                            <?php
                                echo "<button class='check-btn'>
                                <img src='../media/images/happy-sunshine-check.svg' alt='Checkmark'>
                                <p>$toppings</p>
                                </button>";
                            ?>
                        <?php
                    }
                    ?>
                </div>
                <?php
                } else {
                    echo '';
                }
                ?>
                </div>

                <?php
                // Drinks
                if (sizeof($hs_drinks) > 1) {
                ?>
                <div class="customization-category">
                    <div class="category-heading flex-row">
                        <h5>Drinks</h5>
                    </div>
                    <div class="customization-options">
                    <?php
                    for($i = 0; $i<sizeof($hs_drinks); $i++){
                        $drinks = $hs_drinks[$i];
                        ?>
                            <?php
                                echo "<button class='food_choice'><p>$drinks</p></button>";
                            ?>
                        <?php
                    }
                    ?>
                </div>
                <?php
                } else {
                    echo '';
                }
                ?>
                </div>


                <?php
                // Sides
                if (sizeof($hs_sides) > 1) {
                ?>
                <div class="customization-category">
                    <div class="category-heading flex-row">
                        <h5>Sides</h5>
                    </div>
                    <div class="customization-options">
                    <?php
                    for($i = 0; $i<sizeof($hs_sides); $i++){
                        $sides = $hs_sides[$i];
                        ?>
                            <?php
                                echo "<button class='food_choice'><p>$sides</p></button>";
                            ?>
                        <?php
                    }
                    ?>
                </div>
                <?php
                } else {
                    echo '';
                }
                ?>
                </div>  
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
                <a href="cart.php" class="large-yellow-btn">Add to Cart</a>
            </div>
        </section>
        <script src="../scripts/script.js" async defer></script>
        </div>
    </body>
</html>
    