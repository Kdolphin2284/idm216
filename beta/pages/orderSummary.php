<!DOCTYPE html>

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
                    <a href="../index.php">
                        <img src="../media/images/happy-sunshine-logo.svg" alt="Happy Sunshine Logo">
                    </a>
                </div>
                <div class="cart">
                    <a href="cart.php">
                        <img src="../media/images/happy-sunshine-cart-filled.svg" alt="Happy Sunshine Logo">
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
                <a href="cart.php">
                    <img src="../media/images/happy-sunshine-cart-filled.svg" alt="Happy Sunshine Cart">
                </a>
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
            <div class="cart-items flex-col">
                <div class="cart-food-item flex-row-wrap">
                    <img src="../media/images/happy-sunshine-breakfast-sandwich.png" alt="Small breakfast Sandwich">
                    <div class="cart-food-item-info flex-col">
                        <h5>Breakfast Sandwich</h5>
                        <p>Bagel, Bacon, Egg, Cheese, Ketchup, Salt, Pepper</p>
                        <p>Price: <span>$5.00</span></p>
                    </div>
                </div>
                <div class="edit-link">
                    <a href="#">Edit</a>
                </div>
            </div>
        </section>
        <section id="pick-up-time" class="flex-col">
            <h5>Pick-up time:</h5>
            <div class="scroll-container">
                <div id="pick-up-scroll">
                    <button>ASAP</button>
                    <button>1:15pm</button>
                    <button>1:30pm</button>
                    <button>1:45pm</button>
                    <button>2:00pm</button>
                </div>
            </div>
        </section>
        <section id="cart-footer">
            <div class="flex-col">
                <h5>Pick-up location:</h5>
                <a href="#">33rd Street and Arch Street Phildelphia, PA 19104</a>
                <p>Total: $5.00 <span>Cash Only</span></p>
                <button id="modal-button" class="large-yellow-btn">Add to Cart</button>
                <!-- <a href="receipt.php" class="large-yellow-btn">Confirm Order</a> -->
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
                        <!-- <a href="menu.php" class="large-yellow-btn">Back to Menu</a> -->
                    </div>
                    <div class="col-1-2">
                        <a href="receipt.php" class="large-yellow-btn">Confirm</a>
                    </div>
                </div>
            </div>
        <!-- <script src="../scripts/confirmModal.js" async defer></script> -->
        <script src="../scripts/closeModal.js" async defer></script>
        <script src="../scripts/script.js" async defer></script>
    </body>
</html>