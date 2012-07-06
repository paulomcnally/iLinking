<?php
class iLinking
	{
	private $phone;
	private $text;
	private $sms_id;
	private $uid;
	private $access_token;
	private $post;
	public $facebook_response = NULL;
	public $twitter_response = NULL;
	private $facebook_regex = '/"id":"\d{1,}_(\d{1,})"/';
	private $twitter_regex = '/"id":(\d{1}\.\d{1,}e\+\d{1,})/'; //'/"id_str":"(\d{1,})"/';
	public $response = NULL;
	function __construct( $phone, $text, $sms_id )
		{
		$this->phone = $phone;
		$this->text = $text;
		$this->sms_id = $sms_id;
		$this->facebook();
		$this->twitter();
		$this->save_detail();
		}
	private function facebook()
		{
		$GLOBALS['mysql']->query("CALL get_facebook_access_token('".$this->phone."',@uid,@access_token)");
		$this->uid = $GLOBALS['mysql']->value("SELECT @uid");
		$this->access_token = $GLOBALS['mysql']->value("SELECT @access_token");
		if( $this->access_token != "EMPTY" )
			{
			$this->post = array(
				"access_token" => $this->access_token,
				"message" => html_entity_decode(utf8_encode($this->text))
				);
			$GraphFacebook	=	new GraphFacebook( $this->uid, $this->post );
			$result = $GraphFacebook->Publish();
			if( preg_match($this->facebook_regex,$result))
				{
				preg_match_all($this->facebook_regex,$result,$match);
				if( isset( $match[1][0] ) )
					{
					$this->facebook_response = $match[1][0];
					$this->response .= "Publicado en Facebook. ";
					}
				}
			}
		}
	
	private function twitter()
		{
		$GLOBALS['mysql']->query("CALL get_twitter_access_token('".$this->phone."',@oauth_token,@oauth_token_secret)");
		$this->oauth_token = $GLOBALS['mysql']->value("SELECT @oauth_token");
		$this->oauth_token_secret = $GLOBALS['mysql']->value("SELECT @oauth_token_secret");
		if( $this->oauth_token != "EMPTY" )
			{
			$twitter=new TwitterOAuth($GLOBALS['twitter_consumer_key'], $GLOBALS['twitter_consumer_secret'],$this->oauth_token, $this->oauth_token_secret);
			$parameters = array('status' => html_entity_decode(utf8_encode($this->clean($this->limit( $this->text )))), "include_entities" =>1 );
			$result = json_decode(json_encode($twitter->post('statuses/update', $parameters)));
			
			if( isset( $result->id_str ) )
				{
				$this->twitter_response = $result->id_str;
				$this->response .= "Publicado en Twitter. ";
				}
			}
		}
	
	private function save_detail()
		{
		if( !is_null( $this->facebook_response ) )
			{
			$save_fb = array("id"=>$this->sms_id,"type"=>"FB","result"=>$this->facebook_response,"end_dt"=>date("Y-m-d H:i:s"));
			$GLOBALS['mysql']->query("INSERT INTO detail(".$GLOBALS['mysql']->set_keys($save_fb).") VALUES(".$GLOBALS['mysql']->set_values($save_fb).")");
			}
		if( !is_null( $this->twitter_response ) )
			{
			$save_tw = array("id"=>$this->sms_id,"type"=>"TW","result"=>$this->twitter_response,"end_dt"=>date("Y-m-d H:i:s"));
			$GLOBALS['mysql']->query("INSERT INTO detail(".$GLOBALS['mysql']->set_keys($save_tw).") VALUES(".$GLOBALS['mysql']->set_values($save_tw ).")");
			}
		$GLOBALS['mysql']->query("UPDATE sms SET end_dt = '".date("Y-m-d H:i:s")."' WHERE sms_id = ".$this->sms_id);
		}
	
	private function clean($s){$a=array("'",'"');foreach($a as $b){$s=str_ireplace($b,"",$s);}return $s;}
	private function limit($s){return substr($s,0,140);}
	}
?>