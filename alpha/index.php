<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/styles.css" type="text/css">
        <link rel="stylesheet" href="css/normalize.css" type="text/css">
    </head>
    <body>

<?php

    // Header + Database Connection
    include 'includes/header.php';

?>

<?php

    // Select Information from MySQL
    $sql = "SELECT * FROM happy_sunshine_food";
    $result = mysqli_query($conn, $sql);

?>


<!-- /////////////////////////////////////////////////////// -->
<!-- //////////////////////FORM///////////////////////////// -->
<!-- /////////////////////////////////////////////////////// -->

        <section id="addForm">
            <h2>Add Database Info</h2>
            <div class="contentContainer">
                <form action="includes/addInfo.php" method="POST" class="dbInfoAddForm">
                    <field>
                        <label for="category">Category</label>
                        <input type="text" name="category" id="category">
                    </field>
                    <field class="directionsField">
                            <label for="base">Base - <span>Separate steps with ", "</span></label>
                            <textarea id="base" name="base" rows="5" cols="50"></textarea>
                    </field>
                    <field class="directionsField">
                        <label for="protein">Protein - <span>Separate steps with ", "</span></label>
                        <textarea id="protein" name="protein" rows="5" cols="50"></textarea>
                    </field>
                    <field class="directionsField">
                        <label for="more">More - <span>Separate steps with ", "</span></label>
                        <textarea id="more" name="more" rows="5" cols="50"></textarea>
                    </field>
                    <field class="directionsField">
                        <label for="toppings">Toppings - <span>Separate steps with ", "</span></label>
                        <textarea id="toppings" name="toppings" rows="5" cols="50"></textarea>
                    </field>
                    <field class="directionsField">
                        <label for="drinks">Drinks - <span>Separate steps with ", "</span></label>
                        <textarea id="drinks" name="drinks" rows="5" cols="50"></textarea>
                    </field>
                    <field class="directionsField">
                        <label for="sides">Sides - <span>Separate steps with ", "</span></label>
                        <textarea id="sides" name="sides" rows="5" cols="50"></textarea>
                    </field>


                    <button type="submit" id="submit" name="submit">Submit Info</button>
                </form>
            </div>
        </section>
        

<!-- /////////////////////////////////////////////////////// -->
<!-- ////////////////////////ECHO/////////////////////////// -->
<!-- /////////////////////////////////////////////////////// -->

<section id="category-links">
<a href="pages/updateChoice.php" class="home_button">Update Database Information Page</a>
<?php
                        while($row = mysqli_fetch_array($result)){
                            $category = htmlspecialchars_decode($row['category'], ENT_QUOTES);
                            $id = $row['id'];

                            // Slugifying each category
                            // $lower_category = strtolower($category);
                            $min_category = str_replace(' ', '-', $category);

                            // Echo out a link for every single category page
                            echo "<a href='pages/individual.php?id=" . $id ."'>$category</a>";
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

<!-- /////////////////////////////////////////////////////// -->


<?php

    // Footer + Close Body + Close HTML
    include 'includes/footer.php';

?>