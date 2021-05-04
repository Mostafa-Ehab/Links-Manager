<?php 

    if (isset($_SESSION['id']))
    {
        session_unset();
        session_destroy();
    }
    if (isset($_COOKIE['token']))
    {
        setcookie("token", "", time() - 3600);
    }
    header("Location: /login.php");
    exit;

?>