<!--
    Colton Cross
    This is the log out function
-->
<!DOCTYPE html>

<html>

    <head>
        <title>One-Stop Part Shop - Log Out</title>

        <link rel="stylesheet" href="style.css">

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
        <div class="description" style="background-color: #262626">
            <?php
                session_destroy(); //destroy the session

                echo "Successfully Logged Out. <br>";
                echo "Return to homepage: "?> <a href="index.php">Home</a> <?php
            ?>
        </div>

        <?php
            include "footer.php";
        ?>

        <script src="main.js"></script>

    </body>

</html>