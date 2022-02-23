<!DOCTYPE html>

<?php

    // Db Connection
    include 'includes/db.php';

    // Select Information from MySQL
    $sql = "SELECT * FROM happy_sunshine_food";
    $result = mysqli_query($conn, $sql);

    ?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Happy Sunshine | Home</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/normalize.css">
    </head>
    <body>
        <nav id="mobile-nav">
            <header class="header home-header">
                <div id="x" class="x-menu">
                    <img src="media/images/x.svg">
                </div>
                <div class="hs-logo">
                    <a href="index.php">
                        <img src="media/images/happy-sunshine-logo.svg" alt="Happy Sunshine Logo">
                    </a>
                </div>
                <div class="cart">
                    <a href="pages/cartWithNothing.php">
                        <img src="media/images/happy-sunshine-cart.svg" alt="Happy Sunshine Cart">
                    </a>
                </div>
            </header>
            <div id="nav-links">
                <a href="index.php">Home</a>
                <a href="pages/menu.php">Menu</a>
                <a href="pages/favoriteOrders.php">Favorites</a>
                <a href="pages/recentOrders.php">Recents</a>
                <a href="#">Profile</a>
            </div>
        </nav>
        <section id="home-hero">
            <header class="header home-header">
                <div id="header-menu" class="hamburger-menu">
                    <div class="hamburger-rectangle"></div>
                    <div class="hamburger-rectangle"></div>
                    <div class="hamburger-rectangle"></div>
                </div>
                <div class="hs-logo">
                    <a href="index.php">
                        <img src="media/images/happy-sunshine-logo.svg" alt="Happy Sunshine Logo">
                    </a>
                </div>
                <div class="cart">
                    <a href="pages/cartWithNothing.php">
                        <img src="media/images/happy-sunshine-cart.svg" alt="Happy Sunshine Cart">
                    </a>
                </div>
            </header>
            <div class="food-hero">
                <img src="media/images/hero-arrow.svg" alt="Arrow">
                <div class="hero-circle-btns">
                    <div class="hero-circle"></div>
                    <div class="hero-circle"></div>
                    <div class="hero-circle"></div>
                </div>
            </div>
            <div class="hero-text">
                <div class="flex-row">
                    <h4>Breakfast Sandwich</h4>
                    <img src="media/images/hero-arrow.svg" alt="Arrow">
                </div>
                <p>Our classic breakfast staple with your choice of protein + extras</p>
                <div class="hero-circle-btns">
                        <div class="hero-circle"></div>
                        <div class="hero-circle"></div>
                        <div class="hero-circle"></div>
                    </div>
            </div>
        </section>
        <section id="home-info">
            <h1>Good Morning, John!</h1>
            <div class="flex-row-wrap">
                <div class="col-1-1">
                    <div class="col-1-2">
                        <a href="pages/recentOrders.php" class="large-yellow-btn flex-row">
                            <img src="media/images/happy-sunshine-recent.svg">
                            <p>Recents</p>
                        </a>
                    </div>
                    <div class="col-1-2">
                        <a href="pages/favoriteOrders.php" class="large-yellow-btn flex-row">
                            <img src="media/images/happy-sunshine-heart.svg">
                            <p>Favorites</p>
                        </a>
                    </div>
                </div>
                <div class="col-1-1">
                    <a href="pages/menu.php" class="large-yellow-btn flex-row start-order">
                        <img src="media/images/happy-sunshine-start-order.svg">
                        <p>Start Order</p>
                    </a>
                </div>
            </div>
        </section>
        <div class="col-1-1 single-button">
                <a href="pages/menu.php" class="large-yellow-btn">Start Order</a>
        </div>
        <section id="home-menu">
        
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
                            echo "<a class='home-menu-link' href='pages/individual.php?id=" . $id ."'>
                            <img src='media/images/" . $icon_key . "-logo.svg'>
                            <h3>$category</h3>
                            </a>";
                        }
                    ?>

        </section>
        <section id="home-location">
            <div class="flex-row">
                <div class="col-1-4">
                    <img src="media/images/happy-sunshine-truck.svg">
                </div>
                <div class="col-3-4">
                    <p>Find us at:</p>
                    <div class="flex-row">
                        <a href="#">33rd and Arch Street, Philadelphia, PA 19104</a>
                        <img src="media/images/happy-sunshine-link.svg">
                    </div>
                    <p>6:am to 2:30pm</p>
                    <p>We are a cash only truck!</p>
                </div>
            </div>
        </section>
        <section id="home-bird">
            <img src="../media/images/Tracking-Egg-3.svg" alt="Tracking Animation">
        </section>
        <footer id="orange-footer">
            <div id="footer-container">
            <div class="flex-row">
                <div class="col-1-4">
                    <img src="media/images/happy-sunshine-footer.svg">
                </div>
                <div class="col-3-4">
                    <p>Find us at:</p>
                    <div class="flex-row">
                        <a href="#">33rd and Arch Street, Philadelphia, PA 19104</a>
                        <img src="media/images/happy-sunshine-link.svg">
                    </div>
                    <p>6:am to 2:30pm</p>
                </div>
            </div>
            </div>
        </footer>
        <script src="scripts/script.js" async defer></script>
    </body>
</html>