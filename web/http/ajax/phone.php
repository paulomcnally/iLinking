<?php
require '../require.php';
$mobile=( isset( $_POST['mobile'] ) && !empty( $_POST['mobile'] ) ) ? $mysql->escape( $_POST['mobile'] ) : NULL; 
$registered=get_now(); 

// Validations
if( is_null( $mobile ) ) { die( _json_error("No ha ingresado un n&uacute;mero celular v&aacute;lido.") ); }
if( phone_exist( $mobile ) ) { die( _json_error("El n&uacute;mero ".$mobile." ya existe.") ); }
// Insert
$data_A = array("uid"=>$_SESSION[$GLOBALS['us']], "phone"=>$mobile, "registered"=>$registered);
$saved = mysql_insert( $data_A, "phones" );
if( $saved->status )
	{
	echo _json_ok( "Saved" );
	}
	else
		{
		echo _json_error("Error al intentar guardar el n&uacute;mero... Disculpa la molestia");
		}
?>