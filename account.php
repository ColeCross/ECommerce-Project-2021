<!-- account.php - The user account page, only accessible if a user is logged in. 
Contains user account information and the ability to update account datafields
and save payment information. -->
<!DOCTYPE html>

<html>

    <head>
        
        <title>One-Stop Part Shop - Account</title>

        <link rel="stylesheet" href="style.css">

        <style>
            .accinfo {
                margin: 10px;
                width: 98.3%;
                height: 39.5vh;
                background-color: #333;
                color: white;
                padding-top: 10px;
                padding-left: 25px;
                font-size: 18px;
                border-radius: 15px;
                float: left;
            }

            .editacc {
                margin-right: 10px;
                margin-top: 10px;
                margin-bottom: 10px;
                width: 48%;
                height: 39.5vh;
                background-color: #333;
                color: white;
                padding-top: 10px;
                font-size: 18px;
                text-align: center;
                border-radius: 15px;
                float: right;
            }

            .editacc label{
                min-width:180px;
                display: inline-block;
                text-align: left;
            }

            .editacc p {
                display: inline;
                color: red;
                text-align: none;
            }

            #chngpwd, #chngmail {
                display: none;
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

        <!-- Buttons to Update Account or Logout -->
        <aside style="height: 45vh;">
            <h2>Update Account Information</h2>
                <div class="menu_grid">
                    <a href="#" onclick="accTools('chngpwd')">Change Password</a><br>
                    <a href="#" onclick="accTools('chngmail')">Change Email</a><br>
                    <a href="logout.php">Log Out</a><br>
                </div>
        </aside>

        <article style="height: 45vh;">
            <!-- Account Info -->
            <div class = "accinfo" id = "accinfo">
                <h2>Account Information</h2>
                <br>
                <?php
                    echo "<ul>";
                        echo "<li>Username:&emsp;" .$_SESSION["username"]. "</li><br>";
                        echo "<li>Email:&emsp;&emsp;&ensp;&nbsp;" .$_SESSION["useremail"]. "</li><br>";
                        echo "<li>Role: &emsp;&emsp;&emsp;" .$_SESSION["userrole"]. "</li><br>";
                ?>
            </div>

            <!-- Change Password Form -->
            <div class="editacc" id="chngpwd">
                <h2>Change Password</h2>
                <form id="acctform" onclick="pwdAlert()">
                    <br>
                    <br>
                    <label for="cPass">Current Password:</label>
                    <input type="password" id="cPass" name="cPass" onclick="pwdAlert()" required>
                    <br>
                    <label for="Pass">New Password:</label>
                    <input type="password" id="Pass" name="Pass" onclick="pwdAlert()" required>
                    <br>
                    <label for="ConPass">Confirm New Password:</label>
                    <input type="password" id="ConPass" name="ConPass" onclick="pwdAlert()" required>
                    <br>
                    <p id = "alertP"></p>
                    <br>
                    <button type="submit" id="acctBtn" value="POST" disabled>Change Password</button>
                    <br>
                </form>
            </div>

            <!-- Change Email Form -->
            <div class="editacc" id="chngmail">
                <h2>Change Email</h2>
                <form id="chngmailform">
                    <br>
                    <br>
                    <label for="cEmail">Current Email:</label>
                    <input type="email" id="cEmail" name="cEmail" required>
                    <br>
                    <label for="nEmail">New Email:</label>
                    <input type="email" id="nEmail" name="nEmail" required>
                    <br>
                    <label for="Pass">Password:</label>
                    <input type="password" id="Pass" name="Pass" required>
                    <br>
                    <br>
                    <button type="submit" id="chngBtn" value="POST" disabled>Change Email</button>
                    <br>
                </form>
            </div>

        </article>

        <?php
            include "loginstatus.php";
        ?>

        <div class="aside-right" style="height: 25vh;">

        </div>

        <?php
            include "footer.php";
        ?>

    </body>

    <script src="main.js"></script>

</html>