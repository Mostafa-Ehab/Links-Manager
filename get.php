<?php 
include "templates/cookie.php";
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    include "templates/dbconnect.php";

    if (empty($_REQUEST["q"]))
    {
        if (empty($_REQUEST['fav']))
        {
            //echo "We recieved All saved links";
            $sql = "SELECT id, title, url, time, fav FROM links WHERE user_id = '$id' AND deleted = 0 ORDER BY id DESC";
        }
        else
        {
            //echo "We recieved Only favourite links";
            $sql = "SELECT id, title, url, time, fav FROM links WHERE user_id = '$id' AND deleted = 0 AND fav = 1 ORDER BY id DESC";
        }
    }/*
    {
        $sql = "SELECT id, title, url, time, fav FROM links WHERE deleted = 0 AND fav = 1 ORDER BY id DESC";
    }*/
    else
    {
        $q = $_REQUEST["q"];

        if (empty($_REQUEST['fav']))
        {
            //echo "We recieved All saved links match $q";
            $sql = "SELECT id, title, url, time, fav FROM links WHERE user_id = '$id' AND (title LIKE '%$q%' OR url LIKE '%$q%') AND deleted = 0 ORDER BY id DESC";
        }
        else
        {
            $sql = "SELECT id, title, url, time, fav FROM links WHERE user_id = '$id' AND (title LIKE '%$q%' OR url LIKE '%$q%') AND deleted = 0 AND fav = 1 ORDER BY id DESC";
        }
    }
    //echo $id;
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $data = array();
        while($row = mysqli_fetch_assoc($result))
        {
            $time = $row["time"];
            $d = strtotime($time);
            if ($d > strtotime("-1 day"))
            {
                $time = date("h:m", $d);
            }
            else
            {
                $time = date("m/d", $d);
            }
            $row['time'] = $time;

            array_push($data, $row);

        }

        echo json_encode($data);
        exit;
    }
    else
    {
        echo "no match";
        exit;
    }
}
else
{
    echo "No response";
    exit;
}
?>