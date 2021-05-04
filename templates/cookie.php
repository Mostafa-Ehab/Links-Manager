<?php

//session_start();

if (!isset($_SESSION['id']))
{
    if (!isset($_COOKIE['token']))
    {
        header('Location: /login.php');
        //echo "Seession and cookie not found";
        exit;
    }
    else
    {
        include "dbconnect.php";
        $token = $_COOKIE['token'];
        $sql = "SELECT * FROM users WHERE session = '$token'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 0)
        {
            //echo "Destroy Cookie Cookie is Incorrect";
            setcookie("token", "", time() - 3600);
            header("Location: /login.php");
            exit;
        }
        else
        {
            session_start();
            setcookie("token", $token, time() + 86400);
            $_SESSION['id'] = mysqli_fetch_assoc($result)['id'];
        }
    }
}
$id = $_SESSION['id'];

?>