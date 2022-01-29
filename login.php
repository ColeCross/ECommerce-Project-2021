<!-- login.php - the user login/registration landing page, only accessible
if a user is not logged in (or via admin.php). -->
<!DOCTYPE html>

<html>

    <head>
        
        <title>One-Stop Part Shop - Login</title>

        <link rel="stylesheet" href="style.css">

        <style>
            .description label{
                min-width:130px;
                display: inline-block;
                text-align: left;
            }

            .description{
                background-color: #262626; 
                width:50%;
                padding-top: 5%;
                text-align: none;
            }

            .description p {
                display: inline;
                color: red;
                text-align: none;
            }
        </style>

        <!-- Start session if not already started -->
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

        <!--right side, New Account-->

        <div class="description" style="border-left: 2px solid #333;">
            
            <h2>Create New Account</h2>

            <form id="acctform" method="POST" action="insertacctdata.php" onclick="pwdAlert()"> <!-- Call insertacctdata.php on submit -->
                <br>
                <label for="rName">Full Name:</label>
                <input type="text" id="rName" name="rName" onclick="pwdAlert()" required>
                <br>
                <label for="rEmail">Email:</label>
                <input type="email" id="rEmail" name="rEmail" onclick="pwdAlert()" required>
                <br>
                <label for="Pass">Password:</label>
                <input type="password" id="Pass" name="Pass" onclick="pwdAlert()" required>
                <br>
                <label for="ConPass">Confirm Password:</label>
                <input type="password" id="ConPass" name="ConPass" onclick="pwdAlert()" required>
                <br>
                <p id = "alertP"></p>
                <br>
                <input type="hidden" id="rRole" name="rRole" value="user">
                <br>
                <button type="submit" id="acctBtn" value="POST" disabled>Register</button>
                <br>
            </form>
        </div>

        <!--left side, Existing Account-->
        
        <div class="description" style="border-right: 2px solid #333;">

            <h2>Existing User Login</h2>

            <form id="loginform" method="POST" action="checkLogin.php"> <!-- call checkSignIn.php on submit-->
                <br>
                <label for="sEmail">Email:</label>
                <input type="text" id="sEmail" name="sEmail">
                <br>
                <label for="sPass">Password:</label>
                <input type="password" id="sPass" name="sPass">
                <br>
                <br>
                <button type="submit">Log In</button>
                <br>
                <br>
            </form>
            <p style="color: white">*You will need to log in on the right side after registration.</p>
        </div>

        <?php
            include "footer.php";
        ?>

        <script src="main.js"></script>

    </body>
    
</html>