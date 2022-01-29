<!-- index.php - Home Page, featuring a small product showcase 
and the main menu that leads to the shopping menu. -->
<!DOCTYPE html>

<html>
    <!-- Head -->
    <head>   
        <title>One-Stop Part Shop - Home</title>

        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

        <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

        <link rel="stylesheet" href="style.css">

        <style>
            /* Style for the swiper bullet color */
            .swiper-pagination-bullet-active {
                background-color: #6666ff;
            }   

            .description{
                background-color: #262626; 
                border-bottom: 5px solid #333; 
                width: 60%; 
                float: left;
                padding: none;
                margin: none;
            }

            .aside-right {
                height: 154vh;
            }
        </style>

        <!-- Start session if not already started -->
        <?php
            if(!isset($_SESSION)){
                session_start();

            }

            if(!isset($_SESSION["cart"])){

                $_SESSION["cart"] = array();
            }
        ?>
    </head>

    <!-- Body -->
    <body>
        
        <!-- include Header -->
        <?php
            include "header.php";
        ?>
        
        <!-- Left-side Panel -->
        <aside style="height: 174vh">

            <!-- Special Filters Menu, link to shop.php with filters applied. -->
            <h2>See Our Specials!</h2>
            <div class="menu_grid">
                <a href="shop.php" onclick="setX(9)">Today's Best Deals</a><br>
                <a href="shop.php" onclick="setX(10)">Best Sellers</a><br>
                <a href="shop.php" onclick="setX(11)">On Sale Now</a><br>
                <a href="shop.php" onclick="setX(12)">Special Offers</a><br>
                <a href="shop.php" onclick="setX(13)">Highest Rated</a><br>
                <a href="shop.php" onclick="setX(14)">Newest</a><br>
            </div>

        </aside>

        <!-- Showcase Swiper Area -->
        <div class="description">
            
            <!-- Swiper, found at https://github.com/nolimits4web/Swiper/blob/master/demos/030-pagination.html*/-->
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="images/Cpu1.jpg"></img>
                    </div>
                    <div class="swiper-slide">
                        <img src="images/HDD1.jpg"></img>
                    </div>
                    <div class="swiper-slide">
                        <img src="images/RAM1.jpg"></img>
                    </div>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>

        <!-- include Login Status Box -->

        <?php
            include "loginstatus.php";
        ?>

        <!-- Right-side Panel -->
        <div class="aside-right">
            
        </div>

        <!-- Primary Article of the page -->
        <article style="overflow-y: hidden">
            <h1 style="text-align: center;">Looking for Parts?</h1>

            <!-- 3x3 Grid Menu, links to shop.php with appropriate filters automatically applied -->
            <div class="menu_grid">

                <a class="menu_item_link" href="shop.php" onclick="setX(1)">
                    <div class="menu_item">Processors</div>
                </a>

                <a class="menu_item_link" href="shop.php" onclick="setX(2)">
                    <div class="menu_item">Video Cards</div>
                </a>

                <a class="menu_item_link" href="shop.php" onclick="setX(3)">
                    <div class="menu_item">Power Supplies</div>
                </a>

                <a class="menu_item_link" href="shop.php" onclick="setX(4)">
                    <div class="menu_item">Storage</div>
                </a>

                <a class="menu_item_link" href="shop.php" onclick="setX(5)">
                    <div class="menu_item">Memory</div>
                </a>

                <a class="menu_item_link" href="shop.php" onclick="setX(6)">
                    <div class="menu_item">Cases</div>
                </a>

                <a class="menu_item_link" href="shop.php" onclick="setX(7)">
                    <div class="menu_item">Motherboards</div>
                </a>

                <a class="menu_item_link" href="shop.php" onclick="setX(8)">
                    <div class="menu_item">Cooling</div>
                </a>

                <a class="menu_item_link" href="shop.php">
                    <div class="menu_item">View All</div>
                </a>
            </div>

        </article>

        <!-- add Footer -->
        <?php
            include "footer.php";
        ?>

        <!-- Initialize Swiper -->
        <script>
            var swiper = new Swiper('.swiper-container', {
                autoplay: { //make swiper change slides automatically
                    delay: 8500 //delay on slide change
                },
                loop: true, //make swiper loop
                pagination: { //make bullet points and make them clickable
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });
            
        </script>

        <script src="main.js"></script>

    </body>

</html>