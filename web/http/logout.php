<?php
require 'require.php';
if( !is_login() )
	{
	header("Location: index.php");
	exit();
	}
session_unset($_SESSION[$us]);
header("Location: index.php");
exit();
?>