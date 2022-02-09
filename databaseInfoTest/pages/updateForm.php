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

    // Header + Database Connection + Open Body + Close HTML
    include '../includes/header.php';

    // Get Category
    $category_slug = $_GET['category']; 
    $category_key = str_replace('-', ' ', $category_slug);

    $id = $_GET['id'];

    // Requesting Information from Selected Category
    $sql = "SELECT * FROM happy_sunshine_food WHERE id='$id'";
    $result = mysqli_query($conn, $sql);


    // Set Information Arrays to Variables
    if ($result-> num_rows > 0) {
        while ($row = $result-> fetch_assoc()) {

            $hs_category = htmlspecialchars_decode($row['category'], ENT_QUOTES);
            $hs_base = htmlspecialchars($row['base'], ENT_QUOTES);
            $hs_protein = htmlspecialchars($row['protein'], ENT_QUOTES);
            $hs_more = htmlspecialchars($row['more'], ENT_QUOTES);
            $hs_toppings = htmlspecialchars($row['toppings'], ENT_QUOTES);
            $hs_drinks = htmlspecialchars($row['drinks'], ENT_QUOTES);
            $hs_sides = htmlspecialchars($row['sides'], ENT_QUOTES);

        }
    }

?>


<div id="updateForm">
    <a href="updateChoice.php" class="home_button">Back</a>
    <a href="../index.php" class="home_button">Return to Home</a>
    <section id="updateDbInfo">
        <h2>Update Database Info</h2>
        <div class="contentContainer">
            <form action="../includes/updateInfo.php" method="POST" class="dbInfoAddForm">
                <field>
                    <label for="category">Category</label>
                    <input type="text" name="category" id="category" value="<?php echo $hs_category; ?>">
                </field>
                <field class="directionsField">
                        <label for="base">Base - <span>Separate steps with ", "</span></label>
                        <textarea id="base" name="base" rows="5" cols="50"><?php echo $hs_base; ?></textarea>
                </field>
                <field class="directionsField">
                    <label for="protein">Protein - <span>Separate steps with ", "</span></label>
                    <textarea id="protein" name="protein" rows="5" cols="50"><?php echo $hs_protein; ?></textarea>
                </field>
                <field class="directionsField">
                    <label for="more">More - <span>Separate steps with ", "</span></label>
                    <textarea id="more" name="more" rows="5" cols="50"><?php echo $hs_more; ?></textarea>
                </field>
                <field class="directionsField">
                    <label for="toppings">Toppings - <span>Separate steps with ", "</span></label>
                    <textarea id="toppings" name="toppings" rows="5" cols="50"><?php echo $hs_toppings; ?></textarea>
                </field>
                <field class="directionsField">
                    <label for="drinks">Drinks - <span>Separate steps with ", "</span></label>
                    <textarea id="drinks" name="drinks" rows="5" cols="50"><?php echo $hs_drinks; ?></textarea>
                </field>
                <field class="directionsField">
                    <label for="sides">Sides - <span>Separate steps with ", "</span></label>
                    <textarea id="sides" name="sides" rows="5" cols="50"><?php echo $hs_sides; ?></textarea>
                </field>
                <input type="hidden" name="identification" value="<?php echo $id; ?>">

                <button type="submit" id="submit" name="submit">Submit Info</button>
            </form>
        </div>
    </section>
</div>