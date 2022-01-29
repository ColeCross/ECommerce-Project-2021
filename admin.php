<!-- admin.php - the page where admin accounts can utilize the admin tools
to add, delete and update accounts and products. Only accessible if a user
is logged into an admin account. Also has a link to login.php if needed. -->
<!DOCTYPE html>
<html>

    <head>

        <title>One Stop Part Shop - Admin</title>

        <link rel="stylesheet" href="style.css">

        <style>
            .adminTool {
                width: 90%;
                margin: 5%;
                background-color: #333;
                color: white;
                text-align: center;
                padding: 10px;
                border-radius: 15px;
                height: 78%;
            }

            .adminTool label{
                min-width:130px;
                display: inline-block;
                text-align: left;
            }

            .adminTool p {
                display: inline;
                color: red;
                text-align: none;
            }

            #cAcc, #dAcc, #cPro, #dPro {
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

        <!-- Links to open various admin tools using adminTools() -->
        <aside style="height: 55vh;">
            <h2>Admin Tools</h2>
            <div class="menu_grid">
                <a href="#" onclick="adminTools('cAcc')">Create New Admin Account</a><br>
                <a href="#" onclick="adminTools('dAcc')">Delete Account</a><br>
                <a href="#" onclick="adminTools('cPro')">Create New Product</a><br>
                <a href="#" onclick="adminTools('dPro')">Delete Product</a><br>
                <a href="login.php">Access Login Page</a><br>
            </div>
        </aside>

        <!-- Create New Admin Account Form -->
        <article style="height: 55vh;">
            <div class = "adminTool" id="cAcc">
                <h2>Create New Admin Account</h2>
                <form id="acctform" method="POST" action="insertacctdata.php" onclick="pwdAlert()"> <!-- Call insertacctdata.php on submit -->
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
                    <input type="hidden" id="rRole" name="rRole" value="admin">
                    <br>
                    <button type="submit" id="acctBtn" value="POST" disabled>Create Account</button>
                    <br>
                </form>
            </div>

            <!-- Delete an Account Form -->
            <div class = "adminTool" id="dAcc">
                <h2>Delete an Account</h2>
                <form id="delform" method="POST" action="removeacct.php">
                    <h4>Input the Email of the Account to Delete</h4>
                    <label for="delEmail">Email:</label>
                    <input type="email" id="delEmail" name="delEmail">
                    <br>
                    <br>
                    <button type="submit" id="delABtn" value="POST">Delete</button>
                    <br>
                </form>
            </div>

            <!-- Create New Product Form -->
            <div class = "adminTool" id="cPro">
                <h2>Create a New Product</h2>
                <form id="createform" method="POST" action="insproductdata.php">
                    <label for="pName">Product Name:</label>
                    <input type="text" id="pName" name="pName" required>
                    <br>
                    <label for="pType">Product Type:</label>
                    <input list="Types" id="pType" name="pType" required>
                    <datalist id="Types">
                        <option value="Processor">
                        <option value="Video Card">
                        <option value="Power Supply">
                        <option value="Storage">
                        <option value="Memory">
                        <option value="Case">
                        <option value="Motherboard">
                        <option value="Cooling">
                    </datalist>
                    <br>
                    <label for="pPrice">Product Price:</label>
                    <input type="number" id="pPrice" name="pPrice" required>
                    <br>
                    <label for="pRating" style="margin-left: 13.7%">Product Rating:</label>
                    <input type="number" max="100" id="pRating" name="pRating" required>
                    <label>/ 100</label>
                    <br>
                    <br>
                    <label for="pDesc">Product Description:</label><br>
                    <textarea id="pDesc" name="pDesc" rows="5" cols="50" required></textarea>
                    <br>
                    <br>
                    <label for="pSale">Is This Product Currently On Sale?:</label>
                    <input type="checkbox" id="pSale" name="pSale" value="true">
                    <br>
                    <br>
                    <button type="submit" id="createPBtn" value="POST">Create</button>
                    <br>
                </form>
            </div>

            <!-- Delete a Product Form -->
            <div class = "adminTool" id="dPro">
                <h2>Delete a Product</h2>
                <form id="delPform" method="POST" action="removeproduct.php">
                    <h4>Input Name of the Product to Delete</h4>
                    <label for="delName">Product Name:</label>
                    <input type="text" id="delName" name="delName">
                    <br>
                    <br>
                    <button type="submit" id="delPBtn" value="POST">Delete</button>
                    <br>
                </form>
            </div>
        </article>

        <?php
            include "loginstatus.php";
        ?>

        <div class="aside-right" style="height: 35vh;">

        </div>

        <?php
            include "footer.php";
        ?>

        <script src="main.js"></script>

    </body>
</html>