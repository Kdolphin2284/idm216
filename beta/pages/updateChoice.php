<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/styles.css" type="text/css">
        <link rel="stylesheet" href="../css/normalize.css">
    </head>
    <body>

<?php

    // Header + Database Connection
    include '../includes/db.php';

?>

<?php

    // Select Information from MySQL
    $sql = "SELECT * FROM happy_sunshine_food";
    $result = mysqli_query($conn, $sql);

?>



        <section id="category-links">
            <a href="../index.php" class="home_button">Home</a>
            <h1>What to Update?</h1>
            <?php
                while($row = mysqli_fetch_array($result)){
                    $category = htmlspecialchars_decode($row['category'], ENT_QUOTES);
                    $id = htmlspecialchars_decode($row['id'], ENT_QUOTES);

                    // Slugifying each category
                    // $lower_category = strtolower($category);
                    // $min_category = str_replace(' ', '-', $category);

                    // Echo out a link for every single category page
                    echo "<a href='updateForm.php?id=" . $id ."'>$category</a>";
                }
            ?> 

    <?php

        // if ($result) {
        //     echo '<pre>working';
        // } else {
        //     echo '<pre>not working';
        // }



    ?>
</section>

