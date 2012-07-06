<?php
/**
 * name		Log Class
 * package	McNally Developers
 * date		2010/07/12 15:34 -0600
 * require	None
 * version	1.0
 *
 * Crea un log del parametro $str, generalmente usado para query de mySQL
 * Retorna un log con el nombre del script + _ + Ano Mes Dia polin_20100712
 * Requiere que el patch (root patch) tenga permisos 777
 */
class Log
	{
	public $log_prefix		=	"mcnallydevelopers_";
	
	public $log_patch		=	"/var/log/"; // Require 777
	
	public $log_ext			=	"log";
	
	private $log_file_name	=	"";
	
	private $log_dir		=	"";
	
	function __construct( $log_file_name = NULL, $log_dir = NULL )
		{
		$this->log_file_name = ( is_null( $log_file_name ) ) ? basename( $_SERVER['PHP_SELF'], ".php" ) : $log_file_name;
		$this->log_file_name = ( end( explode( ".", $this->log_file_name ) ) == $this->log_ext ) ? $this->log_file_name : $this->log_file_name .= "." . $this->log_ext;
		$this->log_dir = ( is_null( $log_dir ) ) ? $this->log_prefix . basename( $_SERVER['PHP_SELF'], ".php" ) : $log_dir;
		$this->goLogPatch();
		$this->checkDir();
		}
	
	
	private function goLogPatch()
		{
		@chdir( $this->log_patch );
		}
	

	private function checkDir()
		{
		if( !is_dir( $this->log_patch . $this->log_dir ) )
			{
			if( !@mkdir( $this->log_patch . $this->log_dir, 0777, TRUE ) )
				{
				die( "mkdir Error" );
				}
			}
		}
	

	public function makeLog( $string = NULL, $newLine = true )
		{
		$fp = @fopen( $this->log_patch . $this->log_dir . "/" . $this->log_file_name, "a+" );
		if( !$fp )
			{
			die( "fopen Error" );
			}
		if( $newLine )
			{
			$string .= PHP_EOL;
			}
		if( @fwrite( $fp, $string ) === FALSE )
			{
			die( "fwrite Error" );
			}
		@fclose( $fp );
		$this->_string = "";
		}
	}
?>