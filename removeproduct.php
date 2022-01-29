<!--
    Colton Cross
    This is the function that removes a product from the database
-->
<!DOCTYPE html>

<html>

    <head>
        <title>One-Stop Part Shop - Product Removal</title>

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
                    

                $namecheck = mysqli_query($mysqli, "SELECT `name` FROM `projectProducts` WHERE `name` = '".$_POST['delName']."'") or exit(mysqli_error($mysqli)); //query to check if name is in use
                if(mysqli_num_rows($namecheck)) {

                    $sql = "DELETE FROM `projectProducts` WHERE `name` = '".$_POST['delName']."'"; //delete account

                    $res = mysqli_query($mysqli, $sql);

                    if ($res === TRUE) {
                        
                        echo "Product deleted from database successfully. <br>"?> <a href="admin.php">Return to Admin Tools</a> <?php 
                         
                    } 

                    else {
                        printf("Could not delete record: %s\n", mysqli_error($mysqli)); //error alert
                    }
                    
                }
                
                else {
                    echo "No such product in the Database.";
                    
                }
                
                mysqli_close($mysqli); //close connection
            ?>
        </div>

        <?php
            include "footer.php";
        ?>

        <script src="main.js"></script>

    </body>

</html>