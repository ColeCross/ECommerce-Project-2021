<?php
//php file to change active account email
    if(!isset($_SESSION)){
        session_start();
    }

    include('connectdb.php'); //connection

    $username = $_SESSION['username'];
    $newMail = $_POST['nEmail'];

    $sql = "UPDATE projectAccounts SET email=$newMail WHERE name=$username"; //change email in database to new email

    $_SESSION["useremail"] = $newMail;

    $res = mysqli_query($mysqli, $sql);

    mysqli_free_result($res); //free memory
    mysqli_close($mysqli); //close connection

    header("Location: account.php");
?>