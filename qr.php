<?php
include "templates/cookie.php";
include "templates/dbconnect.php";

if ($_SERVER['REQUEST_METHOD'] == "GET")
{
    if (!empty($_GET['img']))
    {
        $name =  "qr/" . $_GET['img'] . ".png";
        if (is_file($name))
        {
            $id = $_SESSION['id'];
            $sql = "SELECT id FROM links WHERE user_id = '$id'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($qr = mysqli_fetch_assoc($result))
                {
                    if ($qr['id'] == $_GET['img'])
                    {
                        $file = fopen($name, "rb");

                        header("Content-Type: image/png");
                        header("Content-Length: " . filesize($name));

                        fpassthru($file);
                        exit;
                    }
                }
            }
        }
    }
}
echo "): Please check your input";
exit;
?>