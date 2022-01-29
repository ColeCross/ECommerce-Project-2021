<!-- shop.php - the main shopping page. Contains all products as well 
as a way to filter them by type and other attributes. -->
<!DOCTYPE html>

<html>

    <head>

        <title>One-Stop Part Shop - Shop</title>

        <link rel="stylesheet" href="style.css">

        <style>
            .filter_grid li{ 
                display: block;
                float: left;
                width: 50%;
            }

            .filterdiv {
                background-color: #8c8c8c;
                width: 31%;
                height: 450px;
                border-radius: 15px;
                padding: 20px;
                margin: 1%;
                font-size: 18px;
                text-align: center;
                display: none;
            }

            .filterdiv:hover {
                background-color: #6666ff;
                color: white;
            }

            .show {
                display: block;
            }

            h1 {
                text-align: center;
            }

        </style>

    </head>

    <!-- Start session if not already started -->
    <?php
        if(!isset($_SESSION)){
            session_start();
        }
    ?>

    <body>
    
        <?php
            include "header.php";
        ?>

        <aside style="border-right: 5px solid #333;">

            <form>
                <!-- Filter checkboxes. Only one can be selected at a time. -->
                <h2>Part Type</h2>

                <div class="filter_grid">

                    <li><input type="checkbox" class="filterbox" name="Processors" id="Processors" onclick="filterSelection('Processor')"> <label for="Processors">Processors</label></li>

                    <li><input type="checkbox" class="filterbox" name="VideoCards" id="VideoCards" onclick="filterSelection('Video')"> <label for="VideoCards">Video Cards</label></li>
                    <br><br>
                    <li><input type="checkbox" class="filterbox" name="PowerSupplies" id="PowerSupplies" onclick="filterSelection('Power')"> <label for="PowerSupplies">Power Supplies</label></li>

                    <li><input type="checkbox" class="filterbox" name="Storage" id="Storage" onclick="filterSelection('Storage')"> <label for="Storage">Storage</label></li>
                    <br><br>
                    <li><input type="checkbox" class="filterbox" name="Memory" id="Memory" onclick="filterSelection('Memory')"> <label for="Memory">Memory</label></li>

                    <li><input type="checkbox" class="filterbox" name="Cases" id="Cases" onclick="filterSelection('Case')"> <label for="Cases">Cases</label></li>
                    <br><br>
                    <li><input type="checkbox" class="filterbox" name="Motherboards" id="Motherboards" onclick="filterSelection('Motherboard')"> <label for="Motherboards">Motherboards</label></li>

                    <li><input type="checkbox" class="filterbox" name="Cooling" id="Cooling" onclick="filterSelection('Cooling')"> <label for="Cooling">Cooling</label></li>
                    <br><br>

                </div>

                <h2>Special Filters</h2>

                <div class="filter_grid">

                    <li><input type="checkbox" class="filterbox" name="TodaysBest" id="TodaysBest" onclick="filterSelection('1')"> <label for="TodaysBest">Today's Best Deals</label></li>

                    <li><input type="checkbox" class="filterbox" name="BestSellers" id="BestSellers" onclick="filterSelection('1')"> <label for="BestSellers">Best Sellers</label></li>
                    <br><br>
                    <li><input type="checkbox" class="filterbox" name="OnSale" id="OnSale" onclick="filterSelection('1')"> <label for="OnSale">On Sale</label></li>

                    <li><input type="checkbox" class="filterbox" name="SpecialOffers" id="SpecialOffers" onclick="filterSelection('1')"> <label for="SpecialOffers">Special Offers</label></li>
                    <br><br>
                    <li><input type="checkbox" class="filterbox" name="HighestRated" id="HighestRated"> <label for="HighestRated">Highest Rated</label></li>

                    <li><input type="checkbox" class="filterbox" name="Newest" id="Newest"> <label for="Newest">Newest Products</label></li>
                    <br><br>

                </div>

            
                <h2>On a Budget?</h2>
                <h4>Type in your budget below to find affordable parts!</h4>

                <label>$</label>
                <input type="number" name="budget" id="budget">
                <br><br>
                <button type="button">Find Parts!</button>
                <!-- Clear Filters Button -->
                <button type="reset" onclick="filterSelection('all')">Clear Filters</button>
            </form>

        </aside>

        <article>
            <h1>Browse Our Catalog!</h1>
            <div class="menu_grid">
                <?php
                    //print database products
                    include("connectdb.php");
               
                    $sql = "SELECT * FROM projectProducts";
                    $res = mysqli_query($mysqli, $sql);
               
                    if ($res) {
                        while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) { //push all products to an array
                            $id = $newArray["id"];
                            $name = $newArray["name"];
                            $type = $newArray["type"];
                            $price  = $newArray["price"];
                            $rating = $newArray["rating"];
                            $sale = $newArray["sale"];
               
                            echo "<div class='filterdiv $type $sale'>"; //print a filterdiv with additional classes of product type and either 1 or 0
                            switch ($type) { //get image based on product type
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
                            //print info to div
                            echo "
                            <br><span> ".$name." </span> 
                            <br><span> ".$type. "</span><br>
                            <br><span> Rating: ".$rating."/100</span>
                            <br><br><span> $".$price. "</span>";

                            if($sale == 1){
                            echo "<br><span style='color: red;'> On Sale Now! </span>";
                            }

                            else echo "<br>";

                            echo "<br><button onclick='addtoCart($id)'>Add To Cart</button>
                            <button onclick='passProductID($id)'>View Details</button>
                            </div>";
                        }
                    } 
                   
                    else {
                        printf("Could not retrieve records: %s\n", mysqli_error($mysqli));
                    }
               
                    mysqli_free_result($res);//free memory
               
                    mysqli_close($mysqli); //close connection
                ?>
            </div>
        </article>

        <?php
            include "loginstatus.php";
        ?>

        <!-- Right-side Panel -->
        <div class="aside-right">
            
        </div>

        <?php
            include "footer.php";
        ?>

        <script src="main.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

        <script>
            //uncheck all boxes except the one clicked on, code example found on stackoverflow
            $('input.filterbox').on('change', function() {
            $('input.filterbox').not(this).prop('checked', false);  
            });

            //check if a filter is applied on page load
            if (typeof shopFilter() === "undefined"){ //apply filter if there is one
                filterSelection("all"); //make all products visible if no filter
            }

        </script>
        
    </body>
    
</html>