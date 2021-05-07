<?php

session_start();

include "includes/functions/init.php";

$pageTitle = "Links Manager";
if (isset($_SESSION['id'])){
    if (isset($_GET['action']))
    {

        /* 
        ** Render Handler
        ** if TRUE  Return JSON || ErrorCode
        ** if FALSE Return HTML
        */
        $noRender = (isset($_GET['no-render']))? TRUE: FALSE;

        /*
        ** Search Page
        */
        if ($_GET['action'] == "search" && isset($_GET['q']))
        {
            $stmt = $conn->prepare("SELECT ID, Title, `URL`, `Time`, `Fav`
                                        FROM links
                                    WHERE deleted = 0 AND `User_ID` = :id
                                        AND (Title LIKE :q OR `URL` LIKE :q)
                                    ORDER BY ID DESC");


            $stmt->execute(array('id'=> $_SESSION['id'], 'q'=> "%" . $_GET['q'] . "%"));

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($noRender)
            {
                for ($i = 0; $i < count($results); $i++) {
                    $results[$i]['Time'] = timeConvert($results[$i]['Time']);
                }

                echo json_encode($results);
            }
            else
            {
                include "$tmp/home.php";
            }
        }
        else if ($_GET['action'] == "fav" && isset($_GET['url-id']))
        {
            $stmt = $conn->prepare("SELECT Fav FROM links
                                    WHERE deleted = 0 AND `User_ID` = ? AND ID = ?");
            $stmt->execute(array($_SESSION['id'], $_GET['url-id']));

            if ($noRender)
            {
                if ($stmt->rowCount() == 0)
                {
                    echo 111;
                }
                else
                {
                    $add = ($stmt->fetch()['Fav'] == 0)? TRUE: FALSE;
                    $stmt2 = $conn->prepare("UPDATE links SET Fav = ? WHERE ID = ?");
                    $stmt2->execute(array(($add? 1: 0),$_GET['url-id']));

                    echo 0;
                }
            }
            else
            {
                if ($stmt->rowCount() == 0)
                {
                    customPage('<div class="alert alert-danger"><strong>Error! </strong>No URL With ID ' . $_GET['url-id'] . ' <a href="#">Let Us Know</a></div>', "/");
                }
                else
                {
                    $add = ($stmt->fetch()['Fav'] == 0)? TRUE: FALSE;
                    $stmt2 = $conn->prepare("UPDATE links SET Fav = ? WHERE ID = ?");
                    $stmt2->execute(array(($add? 1: 0),$_GET['url-id']));

                    customPage('<div class="alert alert-success"><strong>Successfully</strong> ' . ($add? "Added URL To": "Removed URL From") . ' Favourites </div>', "/");
                }
            }
        }

        /*
        ** Get URL QR Code
        */
        else if ($_GET['action'] == "qrcode" && isset($_GET['url-id']))
        {
            $stmt = $conn->prepare("SELECT * FROM links
                                    WHERE deleted = 0 AND `User_ID` = ? AND ID = ?");
            $stmt->execute(array($_SESSION['id'], $_GET['url-id']));

            if ($stmt->rowCount() == 0)
            {
                $file = file_get_contents("https://api.memegen.link/images/custom//No_URL_With_ID_" . $_GET['url-id'] . ".jpg?alt=https://cdn.pixabay.com/photo/2018/01/16/10/36/mistake-3085712_960_720.jpg");
                header("Content-Type: image/png");
                echo $file;
            }
            else
            {
                $name =  "qr/" . $_GET['url-id'] . ".png";

                if (is_file($name))
                {
                    $file = fopen($name, "rb");
                    header("Content-Type: image/png");
                    fpassthru($file);
                    exit;
                }
                else
                {
                    $file = file_get_contents("https://api.memegen.link/images/custom//No_URL_With_ID_" . $_GET['url-id'] . ".jpg?alt=https://cdn.pixabay.com/photo/2018/01/16/10/36/mistake-3085712_960_720.jpg");
                    header("Content-Type: image/png");
                    echo $file;
                }
            }
        }

        /*
        ** Delete URL
        */
        else if ($_GET['action'] == 'delete' && isset($_GET['url-id']))
        {
            $stmt = $conn->prepare("SELECT deleted FROM links
                                    WHERE deleted = 0 AND `User_ID` = ? AND ID = ?");
            $stmt->execute(array($_SESSION['id'], $_GET['url-id']));

            if ($noRender)
            {
                if ($stmt->rowCount() == 0)
                {
                    echo 111;
                }
                else
                {
                    $stmt2 = $conn->prepare("UPDATE links SET deleted = 1 WHERE ID = ?");
                    $stmt2->execute(array($_GET['url-id']));

                    echo 0;
                }
            }
            else
            {
                if ($stmt->rowCount() == 0)
                {
                    customPage('<div class="alert alert-danger"><strong>Error! </strong>No URL With ID ' . $_GET['url-id'] . ' <a href="#">Let Us Know</a></div>', "/");
                }
                else
                {
                    $stmt2 = $conn->prepare("UPDATE links SET deleted = 1 WHERE ID = ?");
                    $stmt2->execute(array($_GET['url-id']));

                    customPage('<div class="alert alert-success"><strong>Successfully</strong> Deleted URL </div>', "/");
                }
            }
        }

        /*
        ** Automatically Get Title
        */
        else if ($_GET['action'] == 'title' && isset($_GET['url']))
        {
            $url = $_GET['url'];
            if (filter_var($url, FILTER_VALIDATE_URL))
            {
                try
                {
                    $html = file_get_html($url);
                    $title = $html->find('title', 0);
                    echo $title->plaintext;
                }
                catch (Throwable $t)
                {
                    if ($noRender)
                    {
                        echo 121;
                    }
                    else
                    {
                        echo "Couldn't Automatically Get Title";
                    }
                }
            }
            else
            {
                if ($noRender)
                {
                    echo 122;
                }
                else
                {
                    echo "URL is Invalid";
                }
            }
        }

        /*
        ** Add URL & Title
        */
        else if ($_GET['action'] == 'add' && isset($_POST['url']) && isset($_POST['title']))
        {
            $url = $_POST['url'];
            $title = $_POST['title'];
            if (filter_var($url, FILTER_VALIDATE_URL))
            {
                if (!empty($title))
                {
                    $stmt = $conn->prepare("INSERT INTO links(`User_ID`, Title, `URL`, `Time`, IP)
                                            VALUES (?, ?, ?, now(), ?)");
                    $stmt->execute(array($_SESSION['id'], $title, $url, IP()));

                    $last_id = $conn->lastInsertId();
                    QRcode::png($url, "data/qr/$last_id.png", 'L', 10, 2);
                    echo 0;
                }
                else
                {
                    if ($noRender)
                    {
                        echo 123;
                    }
                    else
                    {
                        echo "Title is Invalid";
                    }
                }
            }
            else
            {
                if ($noRender)
                {
                    echo 122;
                }
                else
                {
                    echo "URL is Invalid";
                }
            }
        }

    }
    else
    {
        $stmt = $conn->prepare("SELECT ID, Title, `URL`, `Time`, `Fav`
                                    FROM links
                                WHERE deleted = 0 AND `User_ID` = ?
                                ORDER BY ID DESC");

        $stmt->execute(array($_SESSION['id']));

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include "$tmp/home.php";
    }
} else {
    header("Location: login.php");
}

?>
