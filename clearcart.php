<?php
//small php file to clear the cart when a link is clicked on cart.php
    if(!isset($_SESSION)){
        session_start();
    }

    $_SESSION["cart"] = array(); //empty cart array

    header("Location: cart.php"); //return to cart.php and reload the page to update
?>