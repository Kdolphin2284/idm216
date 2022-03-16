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
        <title>Happy Sunshine | Login</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/normalize.css">
    </head>
    <body id="login-body">
    <div id="top-left-login">
        <img src="media/images/login-yellow-left.svg" alt="Yellow blob">
    </div>
    <div id="bottom-right-login">
        <img src="media/images/login-yellow-right.svg" alt="Yellow blob">
    </div>

        <section id="login-container">
            <h1>Sign In To</h1>
            <h2>happy sunshine
            <div id="login-sun">
                <img src="media/images/login-sun.svg" alt="Sun on Title">
            </div>
            </h2>
            <form autocomplete="off" method="" action="includes/cleanseDb.php">
                <field>
                    <label for="email-input">Email</label>
                    <input id="email-input" name="email-input" type="text" placeholder="Email">
                </field>
                <field>
                    <label for="password-input">Password</label>
                    <input id="password-input" name="password-input" type="password" placeholder="Password">
                    <a href="#">Forgot Password?</a>
                </field>
                <button class="large-yellow-btn">Create Account</button>
                <input class="large-yellow-btn" type="submit" value="Sign In">
            </form>
        </section>
        <script src="scripts/script.js" async defer></script>
    </body>
</html>