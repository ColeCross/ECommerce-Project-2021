<?php
    //php file to add items to the shopping cart

    include("connectdb.php");

    if(!isset($_SESSION)){
        session_start();

    }

    $addID = $_POST["addID"]; //get product ID

    $sql = "SELECT * FROM projectProducts WHERE id = $addID"; //get product info based on ID
    $res = mysqli_query($mysqli, $sql);

    if ($res) {

        $newArray = mysqli_fetch_array($res, MYSQLI_ASSOC);

        $_SESSION["cart"][] = $newArray; //add product info to cart array

        echo "added <br>";

    }

    else echo "not added";

    mysqli_free_result($res); //free memory
               
    mysqli_close($mysqli); //close connection
    
?>