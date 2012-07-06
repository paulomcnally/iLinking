<?php
function get_now()
	{
	return date("Y-m-d H:i:s");
	}

function get_es_day( $date )
	{
	$days = array( "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday" );
	$days_es = array( "Lunes", "Martes", "Mi&eacute;coles", "Jueves", "Viernes", "S&aacute;bado", "Domingo" );
	foreach( $days as $d=>$day )
		{
		$date = str_replace( $day, $days_es[$d], $date );
		}
	return $date;
	}

function get_es_month( $date )
	{
	$months = array( "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" );
	$months_es = array( "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" );
	foreach( $months as $m=>$month )
		{
		$date = str_replace( $month, "de " . $months_es[$m] . " del", $date );
		}
	return $date;
	}

function set_value( $option, $value )
	{
	global $mysql;
	global $table_options;
	$query = "UPDATE ".$table_options." SET option_value = '".$value."' WHERE option_name = '".$option."'";
	$result = $mysql->query( $query );
	if( $mysql->rows_affected > 0 )
		{
		return true;
		}
	return false;
	}

function get_value( $option )
	{
	global $mysql;
	global $table_options;
	$query = "SELECT option_Value FROM ".$table_options." WHERE option_name = '".$option."'";
	$result = $mysql->value( $query );
	if( $mysql->num_rows > 0 )
		{
		return json_decode( $result );
		}
		else
			{
			die("No se ha encontrado valores para la opcion" . $option);
			}
	return date("Y-m-d H:i:s");
	}


function validate_params( $array, $option )
	{
	$values = get_value($option);
	if( count( $values->post ) > 0 )
		{
		foreach( $values->post as $post )
			{
			$flag = FALSE;
			if( $post->is_require )
				{
				if( count( $array ) > 0 )
					{
					foreach( $array as $__key=>$__post )
						{
						if( $post->name == $__key )
							{
							$flag = TRUE;
							}
						}
					if( !$flag )
						{
						return '{"status":false,"msg":"El campo ' . $post->name . ' no ha sido enviado!"}';
						}
					foreach( $array as $__key=>$__post )
						{
						if( $post->name == $__key )
							{
							switch( $post->type )
								{
								case "string":
									if( empty( $__post ) )
										{
										return '{"status":false,"msg":"El campo ' . $__key . ' no puede estar vac&iacute;o!"}';
										}
								break;
								case "boolean":
									if( !is_bool( $__post ) )
										{
										return '{"status":false,"msg":"El campo ' . $__key . ' no es tipo boolean!"}';
										}
								break;
								case "numeric":
									if( !ctype_digit( $__post ) )
										{
										return '{"status":false,"msg":"El campo ' . $__key . ' no es tipo numerico!"}';
										}
								break;
								case "datetime":
									if( !preg_match( '/\A\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}\z/', $__post ) )
										{
										return '{"status":false,"msg":"El campo ' . $__key . ' no es tipo datetime!"}';
										}
								break;
								}
							}
						}
					}
				}
			}
		}
	return '{"status":true,"msg":"So kool"}';
	}


function mysql_insert( $array, $table )
	{
	$query = "INSERT INTO ".$table."(".$GLOBALS['mysql']->set_keys($array).") VALUES(".$GLOBALS['mysql']->set_values($array).")";
	$GLOBALS['mysql']->query( $query );
	if( $GLOBALS['mysql']->rows_affected > 0 )
		{
		return json_decode('{"status":true,"insert_id":'.$GLOBALS['mysql']->insert_id.'}');
		}
	return json_decode('{"status":false}');
	}

function mysql_replace( $array, $table )
	{
	$query = "REPLACE INTO ".$table."(".$GLOBALS['mysql']->set_keys($array).") VALUES(".$GLOBALS['mysql']->set_values($array).")";
	$GLOBALS['mysql']->query( $query );
	if( $GLOBALS['mysql']->rows_affected > 0 )
		{
		return json_decode('{"status":true,"insert_id":'.$GLOBALS['mysql']->insert_id.'}');
		}
	return json_decode('{"status":false}');
	}




function get_bitly_short_url($url)
	{ 
	$connectURL = 'http://api.bit.ly/v3/shorten?login=paulomcnally&apiKey=R_4e1d4f7f7d36ee492bc3da1d59bd78ec&uri='.urlencode($url).'&format=txt';
	return curl_get_result($connectURL);
	}

function curl_get_result($url)
	{
	$ch = curl_init();
	$timeout = 20;
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
	}

function is_login()
	{
	if( isset( $_SESSION[$GLOBALS['us']] ) )
		{
		return true;
		}
		else
			{
			return false;
			}
	}

function no_login_message()
	{
	die("<h1>Sesi&oacute;n caducada. Inicie sesi&oacute;n.</h1>");
	}


function set_normal_date($date)
	{
	return get_es_month(get_es_day(date("l j F Y",strtotime($date))));
	}
	
function set_normal_time($date)
	{
	return date("g:i a",strtotime($date));
	}

function get_country()
	{ 
	$url = 'http://www.geognos.com/api/en/countries/info/'.get_ip().'.json';
	return json_decode(curl_get_result($url));
	}
	
function get_ip()
	{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    	{
		$ip=$_SERVER['HTTP_CLIENT_IP'];
    	}
    	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    		{
      		$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    		}
    		else
    		{
      		$ip=$_SERVER['REMOTE_ADDR'];
    		}
    return $ip;
	}

function twitter_exist( $uid )
	{
	if( $e = $GLOBALS['mysql']->query( "SELECT id FROM twitter WHERE uid = '".$uid."'" ) )
		{
		return true;
		}
		else
			{
			return false;
			}
	}

function facebook_exist( $uid )
	{
	if( $e = $GLOBALS['mysql']->query( "SELECT id FROM facebook WHERE uid = '".$uid."'" ) )
		{
		return true;
		}
		else
			{
			return false;
			}
	}

function phone_exist( $phone )
	{
	if( $e = $GLOBALS['mysql']->query( "SELECT uid FROM phones WHERE phone = '".$phone."'" ) )
		{
		return true;
		}
		else
			{
			return false;
			}
	}

function email_exist( $email )
	{
	if( $e = $GLOBALS['mysql']->query( "SELECT uid FROM users WHERE email = '".$email."'" ) )
		{
		return true;
		}
		else
			{
			return false;
			}
	}

function nick_exist( $nick )
	{
	if( $e = $GLOBALS['mysql']->query( "SELECT uid FROM users WHERE nick = '".$nick."'" ) )
		{
		return true;
		}
		else
			{
			return false;
			}
	}


function login( $email, $password )
	{
	if( $e = $GLOBALS['mysql']->query( "SELECT uid FROM users WHERE email = '".$email."' AND `password` = '".$password."'" ) )
		{
		return json_decode( '{"status":true,"uid":"'.$GLOBALS['mysql']->last_result[0]->uid.'"}' );
		}
	return json_decode( '{"status":false}' );
	}

function phone_list( $uid )
	{
	return $GLOBALS['mysql']->results("SELECT phone, registered FROM phones WHERE uid = '".$uid."'");
	}


function _json_error( $msg )
	{
	return '{"status":false,"msg":"'.$msg.'"}';
	}

function _json_ok( $msg )
	{
	return '{"status":true,"msg":"'.$msg.'"}';
	}
?>