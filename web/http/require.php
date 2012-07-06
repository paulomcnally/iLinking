<?php
session_start();
$base = dirname( __FILE__ ) . "/";
$f_core = $base . "core/";
$session = md5("newsletter");

// MySQL vars
$db_host = ""; // MySQL host
$db_user = ""; // MySQL user
$db_pass = ""; // MySQL pass
$db_name = ""; // MySQL database name

// Web vars
$webName		=	"iLinking";
$webContent		=	"Publica en tu Facebook y Twitter v&iacute;a mensajes de Texto. Registrate y disfruta de publicar en redes sociales sin necesidad de Internet en tu celular.";
$webImage		=	"http://profile.ak.fbcdn.net/hprofile-ak-snc4/187880_195123430508513_7148074_n.jpg";

// Facebook app vars
// Create new Facebook app in https://developers.facebook.com/apps
$appId			=	''; // https://developers.facebook.com/apps
$appSecret		=	''; // https://developers.facebook.com/apps
$appNamespace	=	''; // https://developers.facebook.com/apps
$appUrl			=	'http://apps.facebook.com/'.$appNamespace.'/';
$scope			=	"publish_stream,offline_access";
$loginUrl		=	"http://graph.facebook.com/oauth/authorize?client_id=".$appId."&redirect_uri=".$appUrl."&scope=".$scope;

// Url and page vars
$us				=	"smssocialtokenkey338";
$url_site		=	"http://ilinking.com/"; // Change with your domain proyect
$url_twitter	=	$url_site . "connections/twitter/redirect.php";
$url_facebook	=	$url_site . "connections/facebook/";
$url_facebook_pages	=	$url_site . "connections/facebook/pages/";

$last_sms_limit	= 10;
$main=json_decode('[{"caption":"Inicio","url":"./","isLogin":false},{"caption":"Inicio","url":"./","isLogin":true},{"caption":"Mis N&uacute;meros","url":"phone.php","isLogin":true},{"caption":"Redes Sociales","url":"social.php","isLogin":true},{"caption":"Faq","url":"faq.php","isLogin":true},{"caption":"Salir","url":"logout.php","isLogin":true},{"caption":"Iniciar sesi&oacute;n","url":"login.php","isLogin":false},{"caption":"Registrate","url":"singup.php","isLogin":false},{"caption":"Faq","url":"faq.php","isLogin":false}]');

// Include files
require_once $f_core .  'mysql.php';
require_once $f_core .  'functions.php';
?>