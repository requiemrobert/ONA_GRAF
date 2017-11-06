<?php

class ClientesModel 
{
	private $get_request;

	public static $responseJson;

	private $decodeResponse;

	public $ping;
	
	public static function decodeRequest($file = ''){

		self::$requestDecode = json_decode($file);
		
	}

	public static function registrarCliente(){

		$strJson = json_encode([ 'rc' => 'registrar_cliente', 'data' => (array)self::$requestDecode]);
		
		return getWS( $strJson , BASE_URL_WS );//Call WS return JSON

	}



}