<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Happy Sunshine | Menu</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="stylesheet" href="../css/normalize.css">
    </head>
    <?php

    // Db Connection
    include '../includes/db.php';

    // Select Information from MySQL
    $sql = "SELECT * FROM happy_sunshine_food";
    $result = mysqli_query($conn, $sql);

    ?>
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
                    <img src="../media/images/happy-sunshine-cart.svg" alt="Happy Sunshine Logo">
                </a>
            </div>
        </header>
        <section id="general-menu">
            <div class="menu-header flex-row">
                <div class="col-1-3">
                    <a href="../index.php" class="flex-row">
                        <img src="../media/images/general-menu-arrow.svg" alt="Happy Sunshine Logo">
                        <p>Home</p>
                    </a>
                </div>
                <div class="col-1-3">
                    <h2>Menu</h2>
                </div>
                <div class="col-1-3"></div>
            </div>
            <?php
                        while($row = mysqli_fetch_array($result)){
                            $category = htmlspecialchars_decode($row['category'], ENT_QUOTES);
                            $id = $row['id'];

                            // Slugifying each category
                            // $lower_category = strtolower($category);
                            $min_category = str_replace(' ', '-', $category);

                            $icon_origin = strtok($category, " ");
                            $icon_key = strtolower($icon_origin);

                            // Echo out a link for every single category page
                            echo "<a class='menu-item col-1-1 flex-row' href='individual.php?id=" . $id ."'>
                            <img src='../media/images/" . $icon_key . "-logo.svg'>
                            <h3>$category</h3>
                            </a>";
                        }
                    ?> 
            <!-- <div id="general-menu-selection">
                <a href="orderCustomization.php" class="menu-item col-1-1 flex-row">
                    <img src="../media/images/breakfast-sandwich-logo.svg">
                    <h3>Breakfast Sandwiches</h3>
                </a>
                <div class="menu-item col-1-1 flex-row">
                    <img src="../media/images/french-toast-logo.svg">
                    <h3>French Toast</h3>
                </div>
                <div class="menu-item col-1-1 flex-row">
                    <img src="../media/images/cheesesteak-logo.svg">
                    <h3>Cheesesteaks</h3>
                </div>
                <div class="menu-item col-1-1 flex-row">
                    <img src="../media/images/lunch-sandwiches-logo.svg">
                    <h3>Lunch Sandwiches</h3>
                </div>
                <div class="menu-item col-1-1 flex-row">
                    <img src="../media/images/hoagies-logo.svg">
                    <h3>Club Sandwiches</h3>
                </div>
                <div class="menu-item col-1-1 flex-row">
                    <img src="../media/images/hot-dog-sausage-logo.svg">
                    <h3>Hot Dog & Sausage</h3>
                </div>
                <div class="menu-item col-1-1 flex-row">
                    <img src="../media/images/hoagies-logo.svg">
                    <h3>Hoagies</h3>
                </div>
                <div class="menu-item col-1-1 flex-row">
                    <img src="../media/images/burgers-logo.svg">
                    <h3>Burgers</h3>
                </div>
                <div class="menu-item col-1-1 flex-row">
                    <img src="../media/images/grilled-cheese-logo.svg">
                    <h3>Grilled Cheese</h3>
                </div>
                <div class="menu-item col-1-1 flex-row">
                    <img src="../media/images/side-orders-logo.svg">
                    <h3>Side Orders</h3>
                </div>
                <div class="menu-item col-1-1 flex-row">
                    <img src="../media/images/drinks-logo.svg">
                    <h3>Drinks</h3>
                </div>
            </div> -->
        </section>
        <script src="../scripts/script.js" async defer></script>
    </body>
</html>