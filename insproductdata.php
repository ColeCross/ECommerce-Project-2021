<!--
    Colton Cross
    This is the insert data function that submits the product form's data to the database. 
-->
<!DOCTYPE html>

<html>

    <head>
        <title>One-Stop Part Shop - Product Addition</title>

        <link rel="stylesheet" href="style.css">

        <?php
            if(!isset($_SESSION)){
                session_start();
            }
        ?>
    </head>

    <body>
        <?php
            include "header.php";
        ?>
        <div class="description" style="background-color: #262626">
            <?php
                include('connectdb.php'); //connection
                    

                $namecheck = mysqli_query($mysqli, "SELECT `name` FROM `projectProducts` WHERE `name` = '".$_POST['pName']."'") or exit(mysqli_error($mysqli)); //query to check if name is already in use
                if(mysqli_num_rows($namecheck)) {

                    echo "A Product with this name is already in the database. <br>"?> <a href="admin.php">Return to Admin Tools</a> <?php
                    
                }
                
                else {
                    //get variables from form data
                    $name = $_POST['pName'];
                    $type = $_POST['pType'];
                    $price = $_POST['pPrice'];
                    $rating = $_POST['pRating'];
                    $desc = $_POST['pDesc'];
                    
                    if (isset($_POST['pSale'])){
                        $sale = TRUE;
                    }

                    else {
                        $sale = 0;
                    }
                    $sql = "INSERT INTO projectProducts (name, type, price, rating, sale, description) VALUES('$name', '$type', '$price', '$rating', '$sale', '$desc')"; //insert data into table
                    $res = mysqli_query($mysqli, $sql);

                    if ($res === TRUE) {
                        
                        echo "Product added to database successfully. <br>"?> <a href="admin.php">Return to Admin Tools</a> <?php 
                         
                    } 
                    else {
                        printf("Could not insert record: %s\n", mysqli_error($mysqli)); //error alert
                    }

                }
                    
                mysqli_free_result($res); //free memory
                mysqli_close($mysqli); //close connection
            ?>
        </div>

        <?php
            include "footer.php";
        ?>

        <script src="main.js"></script>

    </body>

</html>