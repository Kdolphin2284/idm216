<!DOCTYPE html>

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
                    <img src="../media/images/happy-sunshine-cart.svg" alt="Happy Sunshine Cart">
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
                <img src="../media/images/happy-sunshine-cart.svg" alt="Happy Sunshine Cart">
            </div>
        </header>
        <div class="menu-header flex-row">
            <div class="col-1-3">
                <a href="../index.php" class="flex-row">
                    <img src="../media/images/general-menu-arrow.svg" alt="Happy Sunshine Arrow">
                    <p>Home</p>
                </a>
            </div>
            <div class="col-1-3">
                <h2>My Cart</h2>
            </div>
            <div class="col-1-3"></div>
        </div>
        <section id="nothing-bird">
            <h3>Your cart is empty!</h3>
            <img src="../media/images/crying-bird.svg" alt="Crying Bird">
        </section>
        <section id="cart-footer">
            <div class="flex-col">
                <a href="menu.php" class="large-yellow-btn">View Menu</a>
            </div>
        </section>
        <script src="../scripts/script.js" async defer></script>
    </body>
</html>