<?php
/**
 * Process SMS
 * SMSC Android 1.0
 * CopyLeft:	McNally Developers
 * Author:		Paulo McNally | paulo@mcnallydevelopers.com
 * Created:		2011-05-11 23:33:10 -0600
 * Last Update:	2011-05-11 23:33:10 -0600
 * Description:	Process SMS received
 * Privileges:	none
 */
require_once dirname( dirname( __FILE__ ) ) . "/load.php";

// Open DB Connections
$mysql = new MySQL( $db_host, $db_user, $db_pass, $db_name );

// Set Post Data
$phone		=	( isset( $_POST['phone'] ) && !empty( $_POST['phone'] ) ) ? str_replace("+","",$_POST['phone']) : 0;
$text		=	( isset( $_POST['text'] ) && !empty( $_POST['text'] ) ) ? $mysql->escape( $_POST['text'] ) : "Empty";
$start_dt	=	( isset( $_POST['start_dt'] ) ) ? date("Y-m-d H:i:s",strtotime( $_POST['start_dt'] ) ) : date("Y-m-d H:i:s");
$android_id	=	( isset( $_POST['android_id'] ) && is_numeric( $_POST['android_id'] ) ) ? (int)$_POST['android_id'] : 2;


$number_exist = number_exist( $phone );
// Save SMS row
$mysql->query("CALL get_campaing_by_message('".$text."',@keyword_id,@campaign_id)");
$keyword_id = $mysql->value("SELECT @keyword_id");
$campaign_id = $mysql->value("SELECT @campaign_id");

$receiver = $mysql->value("SELECT android_sim_number FROM androids WHERE android_id = " . $android_id);

$sms = array( "sms_sender"=>$phone, "sms_receiver"=>$receiver, "sms_text"=>$text, "start_dt"=>$start_dt, "keyword_id"=>$keyword_id, "sms_type"=>"received");
$mysql->query("INSERT INTO sms(".$mysql->set_keys($sms).") VALUES(".$mysql->set_values($sms).")");
$sms_id = $mysql->insert_id;

$response ="Visita www.ilinking.com y podras enviar tus SMS a Facebook y Twitter.";

switch( $campaign_id )
	{
	// iLinking
	case 1:
		if( $number_exist )
			{
			$iLinking = new iLinking( $phone, $text, $sms_id );
			$response = ( !is_null( $iLinking->response ) ) ? $iLinking->response : $response;
			}
	break;
	// SMS to Wall Page
	case 2:
		if( $number_exist )
			{
			$SmsToWallPage = new SmsToWallPage( $phone, $text, $sms_id, $keyword_id );
			$response = ( !is_null( $SmsToWallPage->response ) ) ? $SmsToWallPage->response : $response;
			}
	break;
	// Check your Polling Place
	case 3:
		$CheckYourPollingPlace = new CheckYourPollingPlace( $phone, $text, $sms_id, $keyword_id );
		$response = ( !is_null( $CheckYourPollingPlace->response ) ) ? $CheckYourPollingPlace->response : $response;
	break;
	}
// Save iLinking Response
$sms = array( "sms_sender"=>$receiver, "sms_receiver"=>$phone, "sms_text"=>$response, "start_dt"=>$start_dt, "keyword_id"=>$keyword_id, "sms_type"=>"sent", "end_dt"=>date("Y-m-d H:i:s"), "sms_id_parent"=>$sms_id);
$mysql->query("INSERT INTO sms(".$mysql->set_keys($sms).") VALUES(".$mysql->set_values($sms).")");
echo $response . " www.ilinking.com";
?>