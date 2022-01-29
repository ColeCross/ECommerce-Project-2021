<!-- 
    Colton Cross
    This is a simple checkout page that empties the cart and thanks to user for a purchase
-->
<!DOCTYPE html>

<html>

    <head>
        <title>One Stop Part Shop - Checkout</title>

        <link rel="stylesheet" href="style.css">

        <style>
            article{
                font-size: 20px;
                height: 45vh;
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
            include("header.php");
        ?>

        <aside style="height: 45vh;">
        
        </aside>

        <article style="height: 45vh;">
            <p>Thank you for your purchase of 
                <?php
                    //show order total
                    $subtotal = 0;
                    foreach ($_SESSION["cart"] as $i){
                        $subtotal += $i["price"];
                    }
                    $tax = $subtotal * 0.06;
                    $total = $subtotal + $tax;
                    echo "$" .$total. ".";
                ?>
            </p>

            <a href="index.php">Return to the Homepage</a> 

            <?php
                $_SESSION["cart"] = array(); //clear cart
            ?>
                
        </article>

        <?php
            include("loginstatus.php");
        ?>

        <div class="aside-right" style="height: 25vh;">
        
        </div>

        <?php
            include("footer.php");
        ?>

        <script src="main.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

        <script>
            $(".navbar").load("header.php .navbar");
        </script>

    </body>
</html>