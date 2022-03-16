<?php

// Database Connection
$db = include 'db.php';

// Requesting Information from Selected Category
$sql = "SELECT COUNT(*) FROM order_information";
$cartResult = $conn->query($sql);

$numCartItems = $cartResult->fetch_assoc();
// echo $numCartItems['COUNT(*)'];
$totalCartItems = $numCartItems['COUNT(*)'];


$url = $_SERVER["REQUEST_URI"]; 
$pos = strrpos($url, "home.php"); 


if($pos != false) {
    if($totalCartItems == 0){
        echo 
        "
        <a href='pages/cart.php'>
            <div class='cart-logic'>
                <img src='media/images/happy-sunshine-cart.svg' alt='Happy Sunshine Cart'>
            </div>
        </a>
        ";
    } else {
        echo 
        "
        <a href='pages/cart.php'>
            <div class='cart-logic'>
                <img src='media/images/happy-sunshine-cart.svg' alt='Happy Sunshine Cart'>
                <p class='cart-number'>$totalCartItems</p>
            </div>
        </a>
        ";
    }
} else {
    if($totalCartItems == 0){
        echo 
        "
        <a href='cart.php'>
            <div class='cart-logic'>
                <img src='../media/images/happy-sunshine-cart.svg' alt='Happy Sunshine Cart'>
            </div>
        </a>
        ";
    } else {
        echo 
        "
        <a href='cart.php'>
            <div class='cart-logic'>
                <img src='../media/images/happy-sunshine-cart.svg' alt='Happy Sunshine Cart'>
                <p class='cart-number'>$totalCartItems</p>
            </div>
        </a>
        ";
    }
}

// if(sizeof($numCartItems)<1){
//     echo 
//     "
//     <a href='cartWithNothing.php'>
//         <div class='cart-logic'>
//             <img src='media/images/happy-sunshine-cart.svg' alt='Happy Sunshine Cart'>
//         </div>
//     </a>
//     ";
// } else {
//     echo 
//     "
//     <a href='cart.php'>
//         <div class='cart-logic'>
//             <img src='media/images/happy-sunshine-cart.svg' alt='Happy Sunshine Cart'>
//         </div>
//         <p class='cart-number'>$totalCartItems</p>
//     </a>
//     ";
// }

// if(sizeof($numCartItems)<1){
//     echo 
//     "
//     <a href='cartWithNothing.php'>
//         <div class='cart-logic'>
//             <img src='media/images/happy-sunshine-cart.svg' alt='Happy Sunshine Cart'>
//         </div>
//     </a>
//     ";
// } else {
//     echo 
//     "
//     <a href='cart.php'>
//         <div class='cart-logic'>
//             <img src='media/images/happy-sunshine-cart.svg' alt='Happy Sunshine Cart'>
//         </div>
//         <p class='cart-number'>$totalCartItems</p>
//     </a>
//     ";
// }

?>



<!-- <div class="cart-logic">
    <img src="media/images/happy-sunshine-cart.svg" alt="Happy Sunshine Cart">
    <p>This is a cart icon</p>
</div> -->