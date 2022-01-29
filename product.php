<!-- 
    Colton Cross
    Product page, displays information on the product selected from shop.php
-->
<!DOCTYPE html>

<html>

    <head>
        <title>One-Stop Part Shop - Product Page</title>

        <link rel="stylesheet" href="style.css">

        <?php
            if(!isset($_SESSION)){
                session_start();
            }

            $pID = htmlspecialchars($_GET["id"]); //get product id from url in php
        ?>

        <script>
            const url = window.location.search;
            const urlParams = new URLSearchParams(url)
            var x = urlParams.get('id'); //get product id from url in Javascript
        </script>

        <style>
            img {
                width: 50%;
                height: auto;
                float: left;
                margin-right: 3%;
                margin-top: 1.5%;
            }

            span {
                font-size: 20px;
            }

            article p {
                font-size: 16px;
            }
        </style>

    </head>

    <body>
        <?php
            include "header.php";
        ?>
        <!-- Add to Cart and Go Back buttons -->
        <aside style="height: 55vh;">
            <a href="#" onclick="addtoCart(x)">Add To Cart</a>
            <a href="javascript:history.back()">Go Back</a>
        </aside>

        <article style="height: 55vh; text-align: left;">
            <?php
                include("connectdb.php");
                
                $sql = "SELECT * FROM projectProducts WHERE `id` = $pID"; //select product with the correct id
                $res = mysqli_query($mysqli, $sql);

                if ($res) {
                    
                    $newArray = mysqli_fetch_array($res, MYSQLI_ASSOC); //push product data to array
                    //push data to variables
                    $name = $newArray["name"];
                    $type = $newArray["type"];
                    $price  = $newArray["price"];
                    $rating = $newArray["rating"];
                    $sale = $newArray["sale"];
                    $desc = $newArray["description"];

                    switch ($type) { //apply image based on type of product
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

                    //print info
                    echo "<h1>$name</h1>
                    <br>
                    <span>$type</span>
                    <br><br>
                    <span>$".$price."</span>
                    <br><br>
                    <span>Rating: ".$rating."/100</span>
                    <br><br>
                    <span>Product Description:</span>
                    <hr>
                    <p>$desc</p>";
                    
                }

                else {
                    printf("Could not retrieve records: %s\n", mysqli_error($mysqli));
                }
           
                mysqli_free_result($res);//free memory
           
                mysqli_close($mysqli); //close connection
            ?>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    </body>
</html>