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
                    <img src="../media/images/happy-sunshine-cart-filled.svg" alt="Happy Sunshine Cart">
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
                <img src="../media/images/happy-sunshine-cart-filled.svg" alt="Happy Sunshine Cart">
            </div>
        </header>
        <section id="cart-info">
            <div class="menu-header flex-row">
                <div class="col-1-3">
                    <a href="menu.php" class="flex-row">
                        <img src="../media/images/general-menu-arrow.svg" alt="Happy Sunshine Arrow">
                        <p>Menu</p>
                    </a>
                </div>
                <div class="col-1-3">
                    <h2>My Cart</h2>
                </div>
                <div class="col-1-3"></div>
            </div>
            <div class="cart-items">
                <div class="cart-food-item flex-row-wrap">
                    <img src="../media/images/happy-sunshine-breakfast-sandwich.png" alt="Small Breakfast Sandwich">
                    <div class="cart-food-item-info flex-col">
                        <h5>Breakfast Sandwich</h5>
                        <p>Bagel, Bacon, Egg, Cheese, Ketchup, Salt, Pepper</p>
                        <p>Price: <span>$5.00</span></p>
                    </div>
                </div>
            </div>
            <div class="cart-remove-edit-add flex-row col-1-1">
                <div class="col-1-2">
                    <a href="#">Remove</a>
                    <a href="#">Edit</a>
                </div>
                <div class="col-1-2">
                    <div class="flex-row add-subtract">
                        <div id="subtract-order" class="icon-rectangle"></div>
                        <p>1</p>
                        <div id="add-order" class="add-icon">
                            <div class="icon-rectangle"></div>
                            <div class="icon-rectangle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="cart-footer">
            <div class="flex-col">
                <p>Total: $5.00 <span>Cash Only</span></p>
                <a href="orderSummary.php" class="large-yellow-btn">Go to Order Summary</a>
            </div>
        </section>
        <script src="../scripts/script.js" async defer></script>
    </body>
</html>