<?php 
require 'model/ClientesModel.php';
require 'helpers/resolve_opcion.php';


class ClientesController extends ClientesModel
{
	public function indexAction()
	{	

		if(isset($data_style))
		{
	       unset($data_style);
	       $data_style = [];
	       $data_javascript = [];
	    } 

		$data_style = ['css/normalize',
					   'css/main_style', 
					   'css/font-awesome', 
					   'data_table/css/jquery-ui.css', 
					   'data_table/datatables.min', 
					   'css/clientes', 
					   'modal/modal'];

		$data_javascript = ['js/jquery-3.2.1.min', 
							'js/main', 'data_table/datatables.min', 'js/modificar', 'modal/modal', 'js/clientes'];

		$data_head = array(
				'data_style' => $data_style,
				'data_javascript' => $data_javascript
		);

		$sub_menu = resolve_sub_opcion(get_class($this),$_SESSION['opciones_menu']);

		return new View('clientes', [
									  'titulo' => 'Clientes', 
									  'data_head' => $data_head, 
									  'opciones_sub_menu' => $sub_menu
									]);
	}

	/*public static function registrarAction(){

		$data = json_decode(file_get_contents("php://input"));
		$strJson = json_encode([ 'rc' => 'registrar_cliente', 'data' => $data]);
		
		return getWS( $strJson , BASE_URL_WS );//Call WS return JSON

	}*/ //verificar QA !!!

	public static function consultar_clientesAction(){
		
		$strJson = json_encode([ 'rc' => 'consultar_cliente' ]);
		
		return getWS( $strJson , BASE_URL_WS );//Call WS return JSON

	}

}