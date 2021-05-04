<?php
    function escape($str) {
        $string = str_replace(' ', '-', $str); // Replaces all spaces with hyphens.

        return preg_replace('/[\'"\\\]/', '', $str); // Removes special chars.
    }

    include "templates/cookie.php";
    include "templates/phpqrcode/qrlib.php";
    include "templates/simple_html_dom.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        include "templates/dbconnect.php";

        if (!empty($_POST["title"]) && !empty($_POST["url"]))
        {
            $title = escape($_POST["title"]);
            $url = $_POST["url"];
            $IP = IP();

            if (!$title)
            {
                echo "Please Enter title";
                exit;
            }
            else if (!$url)
            {
                echo "Please Enter URL";
                exit;
            }
            else if (filter_var($url, FILTER_VALIDATE_URL) == false)
            {
                echo "Sorry URL is Invalid";
                exit;
            }

            $sql = "INSERT INTO links(user_id, title, url, IP)
                    values($id, '$title', '$url', '$IP')";
            
            if(mysqli_query($conn, $sql))
            {
                $last_id = mysqli_insert_id($conn);
                QRcode::png($url, "qr/$last_id.png", 'L', 10, 2);
                echo 0;
                exit;
            }
            else
            {
                echo "Internal Error" . mysqli_error($conn);
            }

            mysqli_close($conn);
        }
        else if (!empty($_POST["fav"]))
        {
            $id = $_POST["fav"];

            // Get value of FAV from database
            $sql = "SELECT fav FROM links WHERE id = $id";
            $result = mysqli_query($conn, $sql);
            $fav = abs(mysqli_fetch_assoc($result)['fav'] - 1);
            
            // Reverse value of FAV
            $sql = "UPDATE links SET fav = $fav WHERE id = $id";
            if(mysqli_query($conn, $sql))
            {
                echo 0;
                exit;
            }
            else
            {
                echo "Internal Error" . mysqli_error($conn);
            }

            mysqli_close($conn);
        }
        else if (!empty($_POST['del']))
        {
            $id = $_POST['del'];
            $sql = "UPDATE links SET deleted = 1 WHERE id = $id";

            if (mysqli_query($conn, $sql))
            {
                echo 0;
                exit;
            }
        }
        else 
        {
            echo "): Please check you request";
            exit;
        }
    }
    else if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        if (!empty($_REQUEST["q"]))
        {
            $html = file_get_html($_REQUEST["q"]);
            $title = $html->find('title', 0);
            $image = $html->find('img', 0);

            echo $title->plaintext;
            exit;
        }
        else
        {
            echo "): Please check you input";
            exit;
        }
    }
    else
    {
        echo "): Please check you input";
        exit;
    }
        
    function IP()
    {
        if ( !empty($_SERVER['HTTP_CLIENT_IP']) ) {
        // Check IP from internet.
        $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']) ) {
        // Check IP is passed from proxy.
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
        // Get IP address from remote address.
        $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

?>