<!DOCTYPE html>
<html>

    <head>
        <title>One Stop Part Shop - Cart</title>

        <link rel="stylesheet" href="style.css">

        <style>

            .menu_item {
                padding: 5%;
                width: 33%;
                height: 150px;
                float: left;
                margin-left: 11%;
            }

            .checkoutcart {
                margin: 5%;
                width: 90%;
                border-radius: 15px;
                background-color: #333;
                height: 70%;
                overflow-y: auto;
            }

            .menu_grid div {
                background-color: #8c8c8c;
                width: 90%;
                height: 230px;
                border-radius: 15px;
                padding: 20px;
                margin-top: 2%;
                margin-left: 5%;
                margin-right: 5%;
                font-size: 20px;
            }

            .menu_grid div:hover {
                background-color: #6666ff;
                color: white;
            }

            .costs {
                background-color: #333;
                border-radius: 15px;
                text-align: left;
                padding: 20px;
                font-size: 24px;
            }

            .costs span {
                float: right;
                text-align: right;
            }

            img {
                width: 30%;
                height: auto;
                float: left;
                margin-left: 5%;
                margin-top: 1%;
            }
        </style>

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

        <aside>
            <!-- Total Cost -->
            <h1>Your Shopping Cart Total</h1>
            <div class = "costs">
                <label>Subtotal:</label>
                <span>
                    <?php
                        $subtotal = 0;
                        foreach ($_SESSION["cart"] as $i){
                            $subtotal += $i["price"];
                        }
                        echo "$" .$subtotal;
                    ?>
                </span>

                <br><br>

                <label>Tax:</label>
                <span>
                    <?php
                        $tax = $subtotal * 0.06;
                        echo "$" .$tax;
                    ?>
                </span>

                <br><br><hr><br>

                <label>Total:</label>
                <span>
                    <?php
                        $total = $subtotal + $tax;
                        echo "$" .$total;
                    ?>
                </span>
            </div>
            <br>
            <!-- Buttons to Complete Purchase/Clear Cart -->
            <a href="checkout.php">Complete Purchase</a>
            <a href="clearcart.php">Clear Cart</a>
        </aside>

        <article style="text-align: center;">
            <!-- Shopping Cart -->
            <h1>Your Shopping Cart</h1>

            <div class="checkoutcart">
                <div class="menu_grid">
                    <?php 
                        foreach ($_SESSION["cart"] as $i){
                            $id = $i["id"];
                            echo "<div>";
                            switch ($i["type"]) { //get image based on product type
                                case "Processor": //Processors
                                    echo "<img src='images/Cpu1.jpg'></img>";
                                    break;
                                case "Video Card": //Video Cards
                                    echo "<img src='images/VideoCard.jpg'></img>";
                                    break;
                                case "Power Supply": //Power Supplies
                                    echo "<img src='images/PowerSupply.jpg'></img>";
                                    break;
                                case "Storage": //Storage
                                    echo "<img src='images/HDD1.jpg'></img>";
                                    break;
                                case "Memory": //Memory
                                    echo "<img src='images/RAM1.jpg'></img>";
                                    break;
                                case "Case": //Cases
                                    echo "<img src='images/Case.jpg'></img>"; //image found here: https://commons.wikimedia.org/wiki/File:ATX_computer_case_-_right_-_2018-05-12.jpg
                                    break;
                                case "Motherboard": //Motherboards
                                    echo "<img src='images/Motherboard.jpg'></img>";
                                    break;
                                case "Cooling": //Cooling
                                    echo "<img src='images/Fan1.jpg'></img>";
                                    break;
                            }
                            //print product info into div
                            echo "
                            <span> ".$i["name"]." </span> 
                            <br><span> ".$i["type"]. "</span><br>
                            <br><span> Rating: ".$i["rating"]."/100</span>
                            <br><br><span> $".$i["price"]. "</span>";

                            if($i["sale"] == 1){
                            echo "<br><span style='color: red;'> On Sale Now! </span>";
                            }

                            else echo "<br>";

                            echo "<br><button onclick='removeFromCart($id)'>Remove From Cart</button>
                            <br><p name='testp'><p>
                            </div>";
                        }
                    ?>
                </div>
            </div>

            <!-- checkout and clear buttons -->
            <a class="menu_item_link" href="checkout.php">
                <div class="menu_item">Complete Purchase</div>
            </a>

            <a class="menu_item_link" href="clearcart.php">
                <div class="menu_item">Clear Cart</div>
            </a>
            
        </article>

        <?php
            include "loginstatus.php";
        ?>

        <div class="aside-right">
        
        </div>

        <?php
            include "footer.php";
        ?>

        <script src="main.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    </body>

</html>