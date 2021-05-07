<?php

/*
** ------------------------------------
** -------------- Routes --------------
** ------------------------------------
*/

$tmp    = 'includes/templates';
$func   = 'includes/functions';

/*
** ------------------------------------
** --------- Import functions ---------
** ------------------------------------
*/

include "$func/dbconnect.php";
include "$func/functions.php";
include "$func/simple_html_dom.php";
include "$func/phpqrcode/qrlib.php";

/*
** ------------------------------------
** ----------- Error handler ----------
** ------------------------------------
*/

error_reporting(E_ERROR | E_PARSE);

?>