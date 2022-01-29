<!-- Header.php, separated into its own file as its needed on every page and can be included to clean up html code.
Includes the Header, Searchbar and Navbar. -->
<!DOCTYPE html>

<html>

    <head>

        <style>
            /* Header Stylings */
            * {
                box-sizing: border-box;
            }

            /* Body */

            body {
                margin: 0;
                position: relative;
                height: 100%;
            }

            /* Header */

            Header {
                padding: 65px;
                background-color: #333;
                text-align: center;
                width: 100%;
                height: 20vh;
                color: white;
            }

            /* Searchbar container */
            .search {
                background-color: #333;
                padding: 15px;
                width: 100%;
                height: 7vh;
                text-align: center;
                color: white;
            }

            .search input {
                width: 30%;
                height: 30px;
                border-radius: 10px;
                outline: none;
            }

            /* Navigation Bar */

            .navbar {
                background-color: #333;
                width: 100%;
                display: flex;
            }

            .navbar a{
                color: white;
                background-color: inherit;
                padding: 14px 20px;
                text-decoration: none;
                text-align: center;
                min-width: 100px;
            }

            .navbar a:hover{
                color: white;
                background-color: #6666ff;
                padding: 14px 20px;
                text-decoration: none;
                text-align: center;
            }

            /* Dropdown Menu for Shop */

            .shop_dropdown{
                overflow: hidden;
            }

            .shop_dropdown .dropbtn{
                color: white;
                background-color: inherit;
                padding: 14px 20px;
                text-decoration: none;
                text-align: center;
                border: none;
                outline: none;
                margin: 0;
                font-family: inherit;
                font-size: 16px;
                min-width: 100px
            }

            .shop_dropdown:hover{
                color: white;
                background-color: #6666ff;
                text-decoration: none;
                text-align: center;
            }

            .shop_dropdown_content{
                display: none;
                position: absolute;
                background-color: gray;
                min-width: 160px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1;
            }

            .shop_dropdown_content a{
                float: none;
                color: white;
                padding: 14px 20px;
                text-decoration: none;
                display: block;
                text-align: left;
            }

            .shop_dropdown_content a:hover{
                color: white;
                background-color: #6666ff;
                text-align: left;
            }

            .shop_dropdown:hover .shop_dropdown_content{
                display: block;
            }

        </style>

        <?php
            if(!isset($_SESSION)){
                session_start();

            }
        ?>

    </head>

    <body>

        <!-- Header -->
        <header>
            <h1>One Stop Part Shop</h1>
        </header>

        <!-- Searchbar -->
        <div class="search">
            <label><strong>Search:</strong></label>
            <input type="text">

        </div>

        <!-- Navbar -->
        <div class="navbar">
            <a href="index.php">Home</a>
            <a href="about.php">About Us</a>

            <!-- Shop Dropdown Menu-->
            <div class="shop_dropdown">
                <button class="dropbtn"><a href="shop.php">Shop</a></button>

                <div class="shop_dropdown_content">
                    <a href="shop.php" onclick="setX(1)">Processors</a><br>
                    <a href="shop.php" onclick="setX(2)">Video Cards</a><br>
                    <a href="shop.php" onclick="setX(3)">Power Supplies</a><br>
                    <a href="shop.php" onclick="setX(4)">Storage</a><br>
                    <a href="shop.php" onclick="setX(5)">Memory</a><br>
                    <a href="shop.php" onclick="setX(6)">Cases</a><br>
                    <a href="shop.php" onclick="setX(7)">Motherboards</a><br>
                    <a href="shop.php" onclick="setX(8)">Cooling</a><br>
                    <a href="shop.php">View All</a>
                </div>
            </div>

            <a href="about.php#Contact">Contact Us</a>
            <a id="acclink" href="login.php">Account</a>

            <a href="cart.php">Cart ( 
                <?php
                echo sizeof($_SESSION["cart"]); 
                ?> 
                )</a>
            
            <!-- Show Admin Tools link if user is logged in as admin -->
            <?php
                if (isset($_SESSION["userrole"])){
                    if ($_SESSION['userrole'] == "admin"){
                        ?>
                        <a href="admin.php">Admin Tools</a>
                        <?php
                    }
                }
            ?>
        </div>
    </body>
</html>