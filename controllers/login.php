<?php

require '../helpers/connection_helper.php';
require '../config/base_url_ws.php';
require '../interface/interface_controller.php';

class loginController 
{

	private $get_request;

	public static $responseJson;

	private $decodeResponse;

	public function __construct(){

		$strJson = $this->decodeRequest(file_get_contents("php://input"));
		$this->sendRequest($strJson);
	
	}

	public function decodeRequest($file = ''){

		$decode_data = [ 'rc' => 'get_login', 'data' => json_decode($file) ];

		return json_encode($decode_data);

	}

	public function sendRequest($strJson = ''){

		self::$responseJson = getWS( $strJson , BASE_URL_WS );//Call WS return JSON
	}

	/*
		print JSON WS
	*/

	public function getLogin(){

		$dataArrayResponse = $this->decodeResponse(self::$responseJson);

		echo self::$responseJson;

		if ($dataArrayResponse['rc'] == 200){
			$this->setSession();
		}

	}

	/*
		return Array[]
	*/
	public function decodeResponse(string $responseJson){

		$this->decodeResponse = json_decode($responseJson);	

		if (is_null($this->decodeResponse)) {
				
			return false;

		}else{

			return (array)$this->decodeResponse;
		}
					
	}

	public function setSession(){
	
		if ($this->decodeResponse != false) {
			
			if ($this->decodeResponse->rc == 200) {
				session_start();
				foreach ($this->decodeResponse->data[0] as $key => $value) {
				
					$_SESSION[$key] = $value;
					
				}

				$this->setMenu();
			}

		}else{

			return false;

		}

	}

	public function setMenu(){

		$_SESSION['opciones_menu']= $this->getMenu();
		
	}

	public function getMenu(){

	  $session_user = ["user_name" => $_SESSION['user_name'],"status" => $_SESSION['status']];
	  				 
	  $decode_data    = [ 'rc' => 'get_menu', 'data' => $session_user];
	
	  $responseJson   =  getWS(json_encode($decode_data), BASE_URL_WS);
	  $decodeJsonData = json_decode( $responseJson );			  

			if (is_null($decodeJsonData)) {
				
				return false;
			
			}else if ($decodeJsonData->rc == 200) {
		    
		    	return $decodeJsonData->data;
			
			}else {

			 	return false;	
			}
	 		
	}

}

$login = new loginController();
$login->getLogin();





