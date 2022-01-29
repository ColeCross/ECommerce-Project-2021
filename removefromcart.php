<?php
    //php function to remove an item from the cart

    if(!isset($_SESSION)){
        session_start();

    }

    $rID = $_POST["rID"]; //get product id from the ajax function

    if (count($_SESSION["cart"]) > 1){ //check if cart has more than one item
        foreach ($_SESSION["cart"] as $i){ //compare all product ids to that one to be removed
            if ($i["id"] == $rID){
                array_splice($_SESSION["cart"], 1, 1); //remove the correct id
                break;
            }
        }
    }

    else $_SESSION["cart"] = array(); //clear cart if only one item in the cart
    
?>