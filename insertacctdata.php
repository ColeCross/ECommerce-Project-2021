<!--
    Colton Cross
    This is the insert data function that submits the register form's data to the database. 
-->
<!DOCTYPE html>

<html>

    <head>
        <title>One-Stop Part Shop - Registration</title>

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
                    

                $emailcheck = mysqli_query($mysqli, "SELECT `email` FROM `projectAccounts` WHERE `email` = '".$_POST['rEmail']."'") or exit(mysqli_error($mysqli)); //query to check if email is already in use
                if(mysqli_num_rows($emailcheck)) {
                    if (isset($_SESSION["userrole"]) && $_SESSION["userrole"] == "admin"){ //if admin is already logged in, links back to admin.php
                        echo "Email already in use by another account."?> <a href="admin.php">Return to Admin Tools</a><?php
                    }
                    else {
                        echo "This email is already being used. Please try again or log into your account with this email. <br>"?> <a href="login.php">Return</a>;<?php //alert if email is already in use and link back to login.php
                    }
                    
                }
                
                else {
                    //get variables from form data
                    $name = $_POST['rName'];
                    $email = $_POST['rEmail'];
                    $pass = password_hash($_POST['Pass'], PASSWORD_DEFAULT); //encrypt password
                    $role = $_POST['rRole'];

                    $sql = "INSERT INTO projectAccounts (name, email, password, role) VALUES('$name', '$email', '$pass', '$role')"; //insert data into table
                    $res = mysqli_query($mysqli, $sql);

                    if ($res === TRUE) {
                        if (isset($_SESSION["userrole"]) && $_SESSION["userrole"] == "admin"){
                            echo "New Admin Account Successfully Created. <br>"?> <a href="admin.php">Return to Admin Tools</a><?php
                        }

                        else{
                            echo "Account Created Successfully. Please log into your new account. <br>"?> <a href="login.php">Log In.</a><?php //if successful, alert and link to login.php for sign in
                        }
                        
                    } 
                    else {
                        printf("Could not insert record: %s\n", mysqli_error($mysqli)); //error alert
                    }

                    mysqli_free_result($res); //free memory

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