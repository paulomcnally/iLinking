<?php
function get_option( $key )
	{
	return json_decode( $GLOBALS['mysql']->value("SELECT `value` FROM options WHERE `key` = '".$key."'") );
	}

function set_option( $key, $value )
	{
	$GLOBALS['mysql']->query("UPDATE options SET `value` = '".json_encode($value)."' WHERE `key` = '".$key."'");
	}

function print_debug( $string, $newLine = "\n" )
	{
	return $string.$newLine;
	}

function pid_exist( $pid )
	{
	$shell = @shell_exec("ps aux | grep php");
	@preg_match_all( '/root\s{1,}(\d{1,})/', $shell, $match );
	if( count($match) > 0 )
		{
		if( count( $match[1] ) > 0 )
			{
			if ( in_array( $pid, $match[1] ) )
				{
				return true;
				}
			}
		}
	return false;
	}

function facebook_post( $uid, $post = array() )
	{
	if( isset( $uid ) && count( $post ) > 0 )
		{
		$GraphFacebook	=	new GraphFacebook( $fbpage_id->fbpage_id, $post );
		return json_decode($GraphFacebook->Publish());
		}
	}

function number_exist( $number )
	{
	$GLOBALS['mysql']->query("CALL number_exist('".$number."',@response)");
	$response = $GLOBALS['mysql']->value("SELECT @response");
	if( $response == 0 )
		{
		return false;
		}
	return true;
	}
?>