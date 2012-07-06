<?php
/**
 * SMSC Android 1.0
 * 2011-04-08 08:59:46 -0600
 * Load al files and configurations
 */

// Set Default configuration server
set_time_limit(0);
ini_set('memory_limit',-1);
date_default_timezone_set("America/Managua");

// Set Default variables
$db_host	=	"ilinkingsmsc.db.6864390.hostedresource.com";
$db_user	=	"ilinkingsmsc";
$db_pass	=	"smzcP09Y_(";
$db_name	=	"ilinkingsmsc";

$db_host_ilinking	=	"smssocial.db.6864390.hostedresource.com";
$db_user_ilinking	=	"smssocial";
$db_pass_ilinking	=	"M_U*uu98UEJ";
$db_name_ilinking	=	"smssocial";

//Default Twitter App
$twitter_consumer_key		=	"bgagV15hh0V5TRZRRC550g";
$twitter_consumer_secret	=	"xtagcguE808KdNLOSXcVViahjL9Wx4zt1tMSE9B6Qg";

// Set default directory and files inclusions
$base = dirname(__FILE__) . DIRECTORY_SEPARATOR;
$f_core = $base . "core" . DIRECTORY_SEPARATOR;
$f_api = $base . "api" . DIRECTORY_SEPARATOR;
$f_campaign = $base . "campaign" . DIRECTORY_SEPARATOR;
require_once $f_core . "class.mysql.php";
require_once $f_core . "class.curl.php";
require_once $f_core . "class.log.php";
require_once $f_core . "class.gfacebook.php";
require_once $f_core . "OAuth.php";
require_once $f_core . "twitteroauth.php";
require_once $f_core . "functions.php";
// Campaing
require_once $f_campaign . "ilinking.php";
require_once $f_campaign . "smstowallpage.php";
require_once $f_campaign . "checkyourpollingplace.php";
?>