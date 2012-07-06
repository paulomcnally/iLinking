<?php
class CheckYourPollingPlace
	{
	private $phone;
	private $text;
	private $sms_id;
	private $cedula;
	private $keyword_id;
	public $response = NULL;
	function __construct( $phone, $text, $sms_id, $keyword_id )
		{
		$this->phone = $phone;
		$this->text = $text;
		$this->sms_id = $sms_id;
		$this->keyword_id = $keyword_id;
		$this->getData();
		}
	private function getData()
		{
		$reg_ex = $GLOBALS['mysql']->value("SELECT regular_expresion FROM keyword_regex WHERe keyword_id = ".$this->keyword_id." AND active = 1");
		@preg_match_all( '/'.$reg_ex.'/', $this->text, $matcht );
		if( isset( $matcht[1][0] ) )
			{
			$this->cedula = $matcht[1][0];
			$cURL = new cURL( "http://www.cse.gob.ni/padron/buscarjrv.php", "post", array("cedula"=>$this->cedula) );
			if( $cURL->info["http_code"] != '' )
				{
				@preg_match_all('/<b>NOMBRE:<\/b>(.*)<br><b>CEDULA:<\/b>(.*)<br><br> <b> DATOS DEL CENTRO DE VOTACION:<\/b> <br><br><b>JRV:<\/b>(.*)<br> <b>CV:<\/b>(.*)<br>  <b>DEPARTAMENTO:<\/b>(.*)<br> <b>MUNICIPIO:<\/b>(.*)<br> <b>DISTRITO:<\/b>(.*)<br> <b>UBICACION:<\/b>(.*)<br> <b>DIRECCION:<\/b>(.*)<br>/',$cURL->result,$data);
				if( isset( $data[2][0] ) )
					{
					$this->response = trim($data[2][0]);
					}
					else
						{
						$this->response = "El resultado obtenido por el sitio web del CSE no es valido.";
						}
				
				}
				else
					{
					$this->response = "Error al intentar leer el sitio web del Consejo Supremo Electoral.";
					}
			}
			else
				{
				$this->response = "El numero de cedula no es valido.";
				}
		}
	}
?>