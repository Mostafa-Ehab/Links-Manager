<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "links manager";

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if (!$conn)
    {
        die ("Failed" . mysqli_connect_error());
    }
?>