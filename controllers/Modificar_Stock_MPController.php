<?php 
require 'helpers/resolve_opcion.php';

class Modificar_Stock_MPController
{
	public function indexAction()
	{	

		if(isset($data_style))
		{
	       unset($data_style);
	       $data_style = [];
	       $data_javascript = [];
	    } 

		$data_style = ['css/normalize','css/main_style', 'css/font-awesome', 'css/modificar', 'data_table/css/jquery-ui.css', 'data_table/datatables.min', 'modal/modal'];

		$data_javascript = ['js/jquery-3.2.1.min', 'js/main', 'data_table/datatables.min', 'js/modificar_Stock_MP', 'modal/modal'];

		$data_head = array(
				'data_style' => $data_style,
				'data_javascript' => $data_javascript
		);

		$sub_menu = [ "Registro_Stock_MP", 
					  "Modificar_Stock_MP", 
					  "Stock_MP", 
					  "Orden_Produccion", 
					  "Stock_Disponible" ];
		
		return new View('Modificar_Stock_MP', [
									  'titulo' => 'Modificar Stock MP', 
									  'data_head' => $data_head, 
									  'opciones_sub_menu' => $sub_menu
									]);
	}

	public static function consultar_Stock_MPAction(){

		$strJson = json_encode([ 'rc' => 'consultar_Stock_MP']);
		
		return getWS( $strJson , BASE_URL_WS );//Call WS return JSON

	}

	public static function modificar_Stock_MPAction(){
		
		$data = json_decode(file_get_contents("php://input"));

		$strJson = json_encode([ 'rc' => 'modificar_Stock_MP', 'data' => (array)$data]);
		
		return getWS( $strJson , BASE_URL_WS );//Call WS return JSON*/

	}	

	public static function eliminar_Stock_MPAction(){
		
		$data = json_decode(file_get_contents("php://input"));

		$strJson = json_encode([ 'rc' => 'eliminar_Stock_MP', 'data' => $data]);
		
		return getWS( $strJson , BASE_URL_WS );//Call WS return JSON

	}

}