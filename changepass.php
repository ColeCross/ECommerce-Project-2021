<?php
    if(!isset($_SESSION)){
        session_start();
    }

    include('connectdb.php'); //connection

    $username = $_SESSION['username'];
    $newPass = password_hash($_POST['Pass'], PASSWORD_DEFAULT);

    $sql = "UPDATE projectAccounts SET password=$newPass WHERE name=$username"; //change password in database to new password

    $res = mysqli_query($mysqli, $sql);

    mysqli_free_result($res); //free memory
    mysqli_close($mysqli); //close connection

    header("Location: account.php");
?>