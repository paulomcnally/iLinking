<?php
/**
 * Send SMS
 * SMSC Android 1.0
 * CopyLeft:	McNally Developers
 * Author:		Paulo McNally | paulo@mcnallydevelopers.com
 * Created:		2011-04-08 22:20:24 -0600
 * Last Update:	2011-04-08 22:20:24 -0600
 * Description:	Send SMS witch cURL request to Android
 * Privileges:	INSERT
 */
require_once dirname( dirname( __FILE__ ) ) . "/load.php";

// Open DB Connections
$mysql = new MySQL( $db_host, $db_user, $db_pass, $db_name );
$mysql_ilinking = new MySQL( $db_host_ilinking, $db_user_ilinking, $db_pass_ilinking, $db_name_ilinking );

$post_in_pages = get_option('post_in_pages');

if( pid_exist( $post_in_pages->pid ) )
	{
	echo print_debug("Este escript se esta ejecutando desde " . $post_in_pages->last );
	}

$post_in_pages->pid = getmypid();
$post_in_pages->last = date("Y-m-d H:i:s");
$post_in_pages->status = "Runing";
set_option('post_in_pages', $post_in_pages );

// Get Local Data
$local_data = $mysql->results("SELECT * FROM list_sms_to_process WHERE campaign_id = 2");
if( $mysql->num_rows > 0 )
	{
	// Set Log File Name
	$Log = new Log( "post_" . date("Y-m-d") );
	foreach( $local_data as $local_row )
		{
		$fbpage_id = json_decode( $local_row->keyword_config );
		$access_token = $mysql_ilinking->value("SELECT F.access_token FROM phones P, facebook F WHERE P.phone = SUBSTRING('".$local_row->sms_sender."',4) AND F.uid = P.uid");
		if( !empty( $access_token ) )
			{
			if( @preg_match_all( "/".$local_row->regular_expresion."/", $local_row->sms_text, $message ) )
				{
				$post = array(
					"access_token" => $access_token,
					"message" => html_entity_decode(utf8_encode($message[2][0]))
					);
				$GraphFacebook	=	new GraphFacebook( $fbpage_id->fbpage_id, $post );
				$send_result = json_decode($GraphFacebook->Publish());
				$mysql->query("UPDATE sms SET end_dt = now() WHERE sms_id = " . $local_row->sms_id);
				
				// Set String Log File And Response
				$return = json_encode( array( "sender"=>$local_row->sms_sender, "fbpage_id"=>$fbpage_id->fbpage_id, "text"=>$message[2][0], "date"=>date("Y-m-d H:i:s"), "sms_id"=>$local_row->sms_id, "fbpost_id"=>$send_result->id ) );

				// Save Log File
				$Log->makeLog( $return );
				}
			}
		}
	}


$post_in_pages->status = "Idle";
set_option('post_in_pages', $post_in_pages );
?>