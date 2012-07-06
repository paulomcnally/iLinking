<?php
require '../require.php';
$email=( isset( $_POST['email'] ) && !empty( $_POST['email'] ) ) ? $mysql->escape( $_POST['email'] ) : NULL;
$password=( isset( $_POST['password'] ) && !empty( $_POST['password'] ) ) ? md5(md5($_POST['password'])) : NULL; 
$registered=get_now(); 
$active=1;
$country=get_country()->Results->Name;
// Validations

if( is_null( $email ) ) { die( _json_error("Escriba su direcci&oacute;n de correo electr&oacute;nico.") ); }
if( is_null( $password ) ) { die( _json_error("Escriba una contrase&ntilde;a.") ); }

// Insert
$result = login( $email, $password );
if( $result->status )
	{
	echo _json_ok( "ID: " . $result->uid );
	$_SESSION[$us] = $result->uid;
	}
	else
		{
		echo _json_error("Intente una ves m&aacute;s.");
		}
?>