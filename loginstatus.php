<!-- LoginStatus.php, includes the small box on the right-side of most pages that tells the user
whether or not they are logged in and if they are logged into an admin account. Also links to
login.php, account.php and/or admin.php as necessary. -->
<!DOCTYPE html>

<html>
    <head>
        <style>
            /* Login Status Box Style */

            .loginstatus {
                width: 20%;
                border-left: 5px solid #333;
                border-Bottom: 5px solid #333;
                height: 20vh;
                float: right;
                text-align: center;
                background-color: #262626;
                color: white;
                padding-top: 8px;

            }

            .loginstatus a {
                text-decoration: underline;
                color: white;
            }
        </style>
    </head>

    <body>
        <!-- Loginstatus box div -->
        <div class = "loginstatus">
            <br>
            <?php
                if (isset($_SESSION["username"])){ //check if user is logged in
                    echo "Welcome, " .$_SESSION["username"]. ". <br><br>"; //welcome user message
                    ?>
                    <a href="account.php">Click here to go to your Account</a><br><br> <!-- link to account.php -->
                    <?php

                    if ($_SESSION["userrole"] == "admin"){ //check if user is logged into an admin account
                        echo "Currently logged in as an Administrator. <br><br>"; //alert that user is on an admin account
                        ?>
                        <a href="admin.php">Access Admin Tools</a> <!-- link to admin.php -->
                        <?php
                    }
                }

                else {
                    echo "You are not currently logged in. <br><br>";?> <!-- Tell user that they are not logged in -->
                    <a href="login.php">Click here to log in or register a new account</a><br> <!-- Link to login.php -->
                    <?php
                 }
            ?>
        </div>
    </body>
</html>