<?php

/*
** Get Title V1.0 
** Assign page title passed on $title variable
*/

function getTitle()
{
    global $pageTitle;

    echo $pageTitle;
}

/*
** errorPage V1.0
** A function that show custom page and redirect to another page
** $msg     = The message to show
** $redirect = The page to redirect to
*/
function customPage($msg, $redirect)
{
    global $tmp;
    include "$tmp/header.php";
    echo "<body class='customPage'>";
    include "$tmp/navbar.php";

    ?>

    <div class="container">
        <?php echo $msg; ?>
        <div class="alert alert-warning"> You will be redirect in <span class="time">3</span> Seconds</div>
    </div>
    <script src="layout/js/customPage.js"></script>
    <?php header("refresh:3;url=$redirect");?>

    <?php
}

/*
** Time Convertor V1.0
** A simple function that convert timestamp to simple readable form
** EX [2021-05-03 14:32:00 ==> Yesterday 2:32 PM]
** $date1 = First Date,
** $date2 = Second Date [Default is now()]
*/

function timeConvert($date1, $date2 = NULL)
{
    $date2 = (is_null($date2))? date("Y-m-d H:i:s"): $date2;
    $date1 = new DateTime($date1);
    $date2 = new DateTime($date2);

    $date = date_diff($date1, $date2);

    if ($date->format("%m") < 1)
    {
        if ($date->format("%d") < 1)
        {
            if ($date1->format("d") == $date2->format("d")){
                return $date1->format("h:i A");
            }
            else
            {
                return $date->format("%h hours ago");
            }
        }
        else if ($date->format("%d") == 1)
        {
            return "Yest. " . $date1->format("h:i A");
        }
        else if ($date->format("%d") < 7)
        {
            return $date->format("%d days ago");
        }
        else
        {
            return (int)($date->format("%d") / 7) . " weeks ago";
        }
    }
    else
    {
        $months = round($date->format("%a") / 30);

        return $months . (($months == 1)? " month": " months") . " ago";
    }
}

// Get Client IP Address
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