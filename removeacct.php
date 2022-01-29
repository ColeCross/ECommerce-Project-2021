<!--
    Colton Cross
    This is the function that deletes an account from the database.
-->
<!DOCTYPE html>

<html>

    <head>
        <title>One-Stop Part Shop - Account Removal</title>

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
                
                $emailcheck = mysqli_query($mysqli, "SELECT `email` FROM `projectAccounts` WHERE `email` = '".$_POST['delEmail']."'") or exit(mysqli_error($mysqli)); //query to check if email is in use
                if(mysqli_num_rows($emailcheck)) {

                    $sql = "DELETE FROM `projectAccounts` WHERE `email` = '".$_POST['delEmail']."'"; //delete account
                    $res = mysqli_query($mysqli, $sql);

                    if ($res === TRUE) {
                        
                        echo "Account deleted from database successfully. <br>"?> <a href="admin.php">Return to Admin Tools</a> <?php 
                         
                    } 

                    else {
                        printf("Could not delete record: %s\n", mysqli_error($mysqli)); //error alert
                    }
                    
                }
                
                else {
                    echo "No such account in the Database.";
                    
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