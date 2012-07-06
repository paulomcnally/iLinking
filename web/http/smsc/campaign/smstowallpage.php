<?php
class SmsToWallPage
	{
	private $phone;
	private $text;
	private $sms_id;
	private $access_token;
	private $post;
	private $keyword_id;
	public $facebook_response = NULL;
	private $facebook_regex = '/"id":"\d{1,}_(\d{1,})"/';
	public $response = NULL;
	function __construct( $phone, $text, $sms_id, $keyword_id )
		{
		$this->phone = $phone;
		$this->text = $text;
		$this->sms_id = $sms_id;
		$this->keyword_id = $keyword_id;
		$this->facebook();
		$this->save_detail();
		}
	private function facebook()
		{
		$fbpage_id = json_decode( $GLOBALS['mysql']->value( "SELECT keyword_config FROM keywords WHERE keyword_id = " . $this->keyword_id ) )->fbpage_id;
		$GLOBALS['mysql']->query("CALL get_facebook_access_token('".$this->phone."',@uid,@access_token)");
		$this->access_token = $GLOBALS['mysql']->value("SELECT @access_token");
		if( $this->access_token != "EMPTY" )
			{
			$reg_ex = $GLOBALS['mysql']->value("SELECT regular_expresion FROM keyword_regex WHERe keyword_id = ".$this->keyword_id." AND active = 1");
			@preg_match_all( '/'.$reg_ex.'/', $this->text, $matcht );
			if( isset( $matcht[2][0] ) )
				{
				$this->post = array(
					"access_token" => $this->access_token,
					"message" => html_entity_decode(utf8_encode($matcht[2][0]))
				);
				$GraphFacebook	=	new GraphFacebook( $fbpage_id, $this->post );
				$result = $GraphFacebook->Publish();
				if( preg_match($this->facebook_regex,$result))
					{
					@preg_match_all($this->facebook_regex,$result,$match);
					if( isset( $match[1][0] ) )
						{
						$this->facebook_response = $match[1][0];
						$this->response = "Exito! Su mensaje fue publicado en la pagina de Fans en Facebook.";
						}
					}
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
		$GLOBALS['mysql']->query("UPDATE sms SET end_dt = '".date("Y-m-d H:i:s")."' WHERE sms_id = ".$this->sms_id);
		}
	}
?>