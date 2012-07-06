<?php
/**
 * name		cURL Class
 * package	McNally Developers
 * date		2011/04/08 21:35:06 -0600
 * require	None
 * version	1.0
 */

class cURL
	{
	/**
	 * Url
	 * @Uri
	 */
	public $url;
	
	
	/**
	 * Result Page
	 * @String
	 */
	public $result;
	
	
	/**
	 * All Information from cURL Request
	 * url, content_type, http_code, header_size, request_size, filetime
	 * ssl_verify_result, redirect_count, total_time, namelookup_time, connect_time
	 * pretransfer_time, size_upload, size_download, speed_download, speed_upload
	 * download_content_length, upload_content_length, starttransfer_time, redirect_time
	 */
	public $info = array();
	
	
	/**
	 * Result Error Request
	 * @String
	 */
	public $error = NULL;
	
	
	/**
	 * key and vars to Post
	 * @Array
	 */
	public $post_data = array();
	
	
	/**
	 * Type Request
	 * @String
	 */
	private $type;
	
	/**
	 * Curl Instance
	 * @curl_init
	 */
	private $ch;
	
	
	function __construct( $url = NULL, $type = "get", $post_data = array(), $go = true )
		{
		$this->url = $url;
		$this->type = $type;
		$this->post_data = $post_data;
		
		if( $this->validate() )
			{
			$this->ch = curl_init();
			curl_setopt( $this->ch, CURLOPT_URL, $this->url );
			curl_setopt( $this->ch, CURLOPT_RETURNTRANSFER, 1);
			$this->{ $this->type }();
			if( $go )
				{
				$this->go();
				}
			}
		}
	
	
	/**
	 * Execute Request
	 * v1.0
	 * @return none
	 */
	public function go()
		{
		$this->result = curl_exec( $this->ch );
		$this->error();
		$this->info();
		curl_close( $this->ch );
		}
	
	
	/**
	 * Validate vars
	 * v1.0
	 * @return Bool
	 */
	private function validate()
		{
		if( is_null( $this->url ) )
			{
			$this->error = "url is empty";
			return false;
			}
		if( $this->type == "post" && count( $this->post_data ) == 0  )
			{
			$this->error = "post_data not values";
			return false;
			}
		if( $this->type != "post" && $this->type != "get"  )
			{
			$this->error = "type is post or get";
			return false;
			}
		return true;
		}

	/**
	 * Get Result Page
	 * v1.0
	 * @return none
	 */
	public function get()
		{
		curl_setopt( $this->ch, CURLOPT_HEADER, 0);
		}


	/**
	 * Send Post Data And Get Result Page
	 * v1.0
	 * @return none
	 */
	public function post()
		{
		curl_setopt( $this->ch, CURLOPT_POST, 1 );
		curl_setopt( $this->ch, CURLOPT_POSTFIELDS, $this->post_data );
		}
	
	/**
	 * Get Last Error
	 * v1.0
	 * @return String
	 */
	private function error()
		{
		if( $this->result === FALSE)
			{
			$this->error = curl_error( $this->ch );
			}
		}
	
	/**
	 * Get Information cURL request
	 * v1.0
	 * @return none
	 */
	private function info()
		{
		$this->info = curl_getinfo( $this->ch );
		}
	} 
?>