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
    <body>
        <form autocomplete="off" method="" action="includes/cleanseDb.php">
            <field>
                <label for="email-input">Email</label>
                <input id="email-input" name="email-input" type="text">
            </field>
            <field>
                <label for="password-input">Password</label>
                <input id="password-input" name="password-input" type="password">
            </field>
            <input type="submit" value="submit">
        </form>
        <script src="scripts/script.js" async defer></script>
    </body>
</html>