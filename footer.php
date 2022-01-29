<!-- Footer.php, separated into its own file as its needed on every page and can be included to clean up html code.
Contains a repeat of all available links. -->
<!DOCTYPE html>
<html>
    <head>
        <style>
            /* Footer Style */

            Footer {
                padding: 30px;
                background-color: #333;
                text-align: center;
                width: 100%;
                float: right;
                height: 50vh;
                color: white;
            }

            .footerdiv {
                width: 20%;
                padding-top: 3vh;
                height: 45vh;
                float: left;
                background-color: inherit;
            }

            .footerdiv a{
                text-decoration: none;
                color: white;
                background-color: inherit;
            }

            .bottombanner {
                height: 10vh;
                width: 100%;
                background-color: #333;
                border-top: 5px solid #262626;
                color: white;
                text-align: right;
            }
        </style>
    </head>

    <body>
        <!-- Footer -->
        <Footer>
            <!-- Empty Div -->
            <div class="footerdiv"></div>

            <!-- Nav Div -->
            <div class="footerdiv">
                <h3>Navigation Links</h3><br>
                <a href="index.php">Home</a><br><br>
                <a href="about.php">About Us</a><br><br>
                <a href="about.php#Contact">Contact Us</a><br><br>
                <a id="acclinkF" href="login.php">Account</a><br><br>
                <a href="cart.php">Cart</a><br><br>
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

            <!-- Shop Parts Div -->
            <div class="footerdiv">
                <h3>Shop Computer Parts</h3><br>
                    <a href="shop.php" onclick="setX(1)">Processors</a><br><br>
                    <a href="shop.php" onclick="setX(2)">Video Cards</a><br><br>
                    <a href="shop.php" onclick="setX(3)">Power Supplies</a><br><br>
                    <a href="shop.php" onclick="setX(4)">Storage</a><br><br>
                    <a href="shop.php" onclick="setX(5)">Memory</a><br><br>
                    <a href="shop.php" onclick="setX(6)">Cases</a><br><br>
                    <a href="shop.php" onclick="setX(7)">Motherboards</a><br><br>
                    <a href="shop.php" onclick="setX(8)">Cooling</a><br><br>
                    <a href="shop.php">View All</a>
            </div>

            <!-- Specials Div -->
            <div class="footerdiv">
                <h3>See Our Specials!</h3><br>
                <a href="shop.php" onclick="setX(9)">Today's Best Deals</a><br><br>
                <a href="shop.php" onclick="setX(10)">Best Sellers</a><br><br>
                <a href="shop.php" onclick="setX(11)">On Sale Now</a><br><br>
                <a href="shop.php" onclick="setX(12)">Special Offers</a><br><br>
                <a href="shop.php" onclick="setX(13)">Highest Rated</a><br><br>
                <a href="shop.php" onclick="setX(14)">Newest</a><br><br>
            </div>
            
            <!-- Empty Div -->
            <div class="footerdiv"></div>

            <div class="bottombanner">
                <p>
                    Developed by Colton Cross for ISYS366 in 1920x1080 resolution and Google Chrome web browser.
                </p>
            </div>

        </Footer>

        <script src="main.js"></script>

        <?php
            //change "Account" links to direct to account.php if a user is logged in
            if(isset($_SESSION["username"])){
                ?>
                <script>
                    accLinkChange();
                </script>
                <?php
            }
        ?>
    </body>
</html>