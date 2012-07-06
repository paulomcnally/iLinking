<?php
require '../require.php';
$name=( isset( $_POST['name'] ) && !empty( $_POST['name'] ) ) ? $mysql->escape( $_POST['name'] ) : NULL; 
$nick=( isset( $_POST['nick'] ) && !empty( $_POST['nick'] ) ) ? $mysql->escape( $_POST['nick'] ) : NULL;
$email=( isset( $_POST['email'] ) && !empty( $_POST['email'] ) ) ? $mysql->escape( $_POST['email'] ) : NULL;
$password=( isset( $_POST['password'] ) && !empty( $_POST['password'] ) ) ? md5(md5($_POST['password'])) : NULL; 
$registered=get_now(); 
$active=1;
$country=get_country()->Results->Name;
// Validations
if( is_null( $name ) ) { die( _json_error("Escriba su nombre completo.") ); }
if( is_null( $nick ) ) { die( _json_error("Escriba su nombre de usuario.") ); }
if( nick_exist( $nick ) ) { die( _json_error("El nombre de usuario ".$nick." ya existe.") ); }
if( is_null( $email ) ) { die( _json_error("Escriba su direcci&oacute;n de correo electr&oacute;nico.") ); }
if( email_exist( $email ) ) { die( _json_error("La direcci&oacute;n de correo electr&oacute;nico ".$email." ya existe.") ); }
if( is_null( $password ) ) { die( _json_error("Escriba una contrase&ntilde;a.") ); }
if( strlen($password) < 6 ) { die( _json_error("Su contrase&ntilde;a debe ser de 6 o m&aacute;s caracteres.") ); }

// Insert
$data_A = array("name"=>$name, "email"=>$email, "password"=>$password, "registered"=>$registered, "active"=>$active, "country"=>$country, "nick"=>$nick);
$saved = mysql_insert( $data_A, "users" );
if( $saved->status )
	{
	echo _json_ok( "ID: " . $saved->insert_id );
	$_SESSION[$us] = $saved->insert_id;
	}
	else
		{
		echo _json_error("Error al intentar registrarte... Disculpa la molestia");
		}
?>