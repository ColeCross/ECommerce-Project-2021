<!-- 
    Colton Cross
    This is the php file that checks if the email and password filled in on login.php are valid. and then sets status to logged in
-->
<!DOCTYPE html>

<html>

    <head>
        <title>One-Stop Part Shop - Login</title>

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

                $emailcheck = mysqli_query($mysqli, "SELECT `email` FROM `projectAccounts` WHERE `email` = '".$_POST['sEmail']."'") or exit(mysqli_error($mysqli)); //query to check if email is in the database
                $passcheck = mysqli_query($mysqli, "SELECT `password` FROM `projectAccounts` WHERE `email` = '".$_POST['sEmail']."'") or exit(mysqli_error($mysqli)); //query to get the password associated with the input email

                $row = mysqli_fetch_row($passcheck); //fetch the password as a string

                if(!mysqli_num_rows($emailcheck) || !password_verify($_POST['sPass'], $row[0])) { //if email does not exist or password does not match
                    echo "Invalid email or password. Try again. <br>"?> <a href="login.php">Sign In</a>;<?php //alert and link back to SignIn.php
                }

                else { //if email exists and passwords match
                    $query = mysqli_query($mysqli, "SELECT * FROM `projectAccounts` WHERE `email` = '".$_POST['sEmail']."'") or exit(mysqli_error($mysqli)); //query to get the full account row
                    $array = mysqli_fetch_row($query); //fetch row values as an array

                    $_SESSION["username"] = $array[1]; //get name variable
                    $_SESSION["useremail"] = $array[2]; //get email variable
                    $_SESSION["userrole"] = $array[4]; //get role variable
                    
                    echo "Successfully logged in as " .$_SESSION["username"]. ". <br>";
                    echo "Go to your account: "?> <a href="account.php">Account</a> <?php
                    echo "<br>Return to homepage: "?> <a href="index.php">Home</a> <?php
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