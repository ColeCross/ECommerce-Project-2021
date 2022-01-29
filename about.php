<!-- about.php - the About Us and Contact Us pages combined. 
Includes a small google maps link. -->
<!DOCTYPE html>

<html>

    <head>

        <title>One-Stop Part Shop - About</title>

        <link rel="stylesheet" href="style.css">

        <style>
            map{
                border-radius: 25px;
                padding: 20px;
                width: 340px;
                background-color: #333;
                height: 290px;
                float: left;
            }

            .description{
                background-color: #262626;
                border: 5px solid #333;
            }

            .description span {
                font-size: 20px;
            }

            article p{
                font-size: 20px;
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

        <body>
        
        <?php
            include "header.php";
        ?>
    
            <aside style="height: 70vh; border-right: 5px solid #333;">
            </aside>

            <!-- Company Description -->
            <article style="height: 70vh">

                <h1 style="font-size: 40px; text-align: center;">About Our Company</h1>

                <p>
                    One-Stop Part Shop was founded in the 1980s as a custom automobile part manufacturer with an emphasis on keeping costs down so that customers could afford to keep their cars in good working order.
                    However, after an unfortunate string of failures and resulting lawsuits, One-Stop Part Shop was deemed unable to survive in the automobile part manufacturing industry, especially as automobile parts grew more and more
                    tailor-made to specific brands of cars and it became significantly harder to develop parts that work for numerous types of vehicle. So we  were forced to look elsewhere, and began to develop a plan to enter the computer part industry. During the late 1980s and 1990s, One-Stop Part Shop set aside their desire to build
                    computer parts and began to serve as a storefront for existing companies to sell their parts, eventually leading up to where we stand today. 
                </p>

            </article>

            <?php
                include "loginstatus.php";
            ?>

            <div class="aside-right" style="height: 50vh; border-left: 5px solid #333;">
                <!-- Google Maps embed -->
                <br>
                <h1>Our Office Location</h1>

                <map>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d662.9586188600268!2d-81.18417189012315!3d37.77643517416345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x884ef2df8de5158f%3A0x5a2ce035dc3cba3c!2sLearning%20Resource%20Center!5e0!3m2!1sen!2sus!4v1613174611306!5m2!1sen!2sus" width="auto" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </map>

            </div>

            <div class="description">
                <!-- Contact Info -->
                <a id="Contact"></a>

                <h1>Questions? Concerns? Contact Us!</h1>

                <br><span>One-Stop Part Shop Customer Support</span><br>
                <br><span>Email: CustomerSupport@OSPS.com</span><br>
                <br><span>Phone: +1 (800)-299-5273</span><br>
                <br><span>Mailing Address: 512 S Kanawha St, Beckley, WV 25801</span>

            </div>

            <?php
            include "footer.php";
        ?>

        <script src="main.js"></script>

    </body>
</html>