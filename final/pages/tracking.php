<!DOCTYPE html>

<?php

$price = $_GET['price'];
$name = $_GET['name'];
$time = $_GET['time'];

?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Happy Sunshine | Tracking</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="stylesheet" href="../css/normalize.css">
    </head>
    <body id="tracking-page">
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
        <div id="tracking-height">
        <div class="menu-header flex-row">
            <div class="col-1-3">
                <a href="menu.php" class="flex-row">
                    <img src="../media/images/general-menu-arrow.svg" alt="Happy Sunshine Logo">
                    <p>Receipt</p>
                </a>
            </div>
            <div class="col-1-3">
                <h2>Tracking</h2>
            </div>
            <div class="col-1-3"></div>
        </div>
        <section id="tracking-animation">
            <img id="tracking-image" src="../media/images/Tracking-egg-1.svg" alt="Tracking Animation">
        </section>
        <section id="tracking-info">
            <div id="tracking-titles">
                <div class="col-30">
                    <p>Order Placed</p>
                </div>
                <div class="col-1-5"></div>
                <div class="col-30">
                    <p id="order-step-2">Preparing Order</p>
                </div>
                <div class="col-1-5"></div>
                <div class="col-30">
                    <p id="order-step-3">Order Ready</p>
                </div>
            </div>
            <div id="tracking-images">
                <div class="col-30">
                    <img src="../media/images/tracking-sun.svg" alt="Tracking Sun Image">
                </div>
                <div class="col-1-5">
                    <img src="../media/images/tracking-yellow-line.svg" alt="Tracking Yellow Line Image">
                </div>
                <div class="col-30">
                    <img id="tracking-sun-2" src="../media/images/tracking-circle.svg" alt="Tracking Sun Image">
                </div>
                <div class="col-1-5">
                    <img src="../media/images/tracking-yellow-line.svg" alt="Tracking Yellow Line Image">
                </div>
                <div class="col-30">
                    <img id="tracking-sun-3" src="../media/images/tracking-circle.svg" alt="Tracking Sun Image">
                </div>
            </div>
            <div id="tracking-times">
                <div class="col-30">
                    <p>1:02pm</p>
                </div>
                <div class="col-1-5"></div>
                <div class="col-30">
                    <p id="order-time-2">1:11pm</p>
                </div>
                <div class="col-1-5"></div>
                <div class="col-30">
                    <p id="order-time-3">1:15pm</p>
                </div>
            </div>
        </section>
        </div>
        <section id="order-ready">
            <div id="tracking-black-bar">
                <div class="black-bar"></div>
            </div>
            <p>Your order is ready!
                Please show the receipt
                when picking up order.</p>
                <a class="large-yellow-btn" href="receiptAfterTracking.php?price=<?php echo $price; ?>&name=<?php echo $name; ?>&time=<?php echo $time; ?>">View Receipt</a>
        </section>
        <script src="../scripts/script.js" async defer></script>
        <script src="../scripts/orderTracking.js" async defer></script>
    </body>
</html>