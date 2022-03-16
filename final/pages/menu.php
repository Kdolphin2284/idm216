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
        <section id="general-menu">
            <div class="menu-header flex-row">
                <div class="col-1-3">
                    <a href="../home.php" class="flex-row">
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
        </section>
        <script src="../scripts/script.js" async defer></script>
    </body>
</html>