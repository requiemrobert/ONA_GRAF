<?php 
require 'model/ClientesModel.php';
require 'helpers/resolve_opcion.php';

class ModificarController extends ClientesModel
{
	public function indexAction()
	{	

		if(isset($data_style))
		{
	       unset($data_style);
	       $data_style = [];
	       $data_javascript = [];
	    } 

		$data_style = ['css/normalize','css/main_style', 'css/font-awesome', 'css/gridly.min', 'css/modificar', 'data_table/css/jquery-ui.css', 'data_table/datatables.min', 'modal/modal'];

		$data_javascript = ['js/jquery-3.2.1.min', 'js/main', 'data_table/datatables.min', 'js/modificar', 'modal/modal'];

		$data_head = array(
				'data_style' => $data_style,
				'data_javascript' => $data_javascript
		);

		$sub_menu = resolve_sub_opcion("clientesController", $_SESSION['opciones_menu']);
		
		return new View('modificar', [
									  'titulo' => 'Modificar Datos Clientes', 
									  'data_head' => $data_head, 
									  'opciones_sub_menu' => $sub_menu
									]);
	}

	public static function consultar_clientesAction(){
		
		$strJson = json_encode([ 'rc' => 'consultar_cliente' ]);
		
		return getWS( $strJson , BASE_URL_WS );//Call WS return JSON

	}

	public static function modificar_clienteAction(){
		
		$data = json_decode(file_get_contents("php://input"));

		$strJson = json_encode([ 'rc' => 'modificar_cliente', 'data' => $data]);
		
		return getWS( $strJson , BASE_URL_WS );//Call WS return JSON

	}	

}