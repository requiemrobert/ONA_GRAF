<?php 
require 'model/ClientesModel.php';
require 'helpers/resolve_opcion.php';

class ProveedoresController extends ClientesModel
{
	public function indexAction()
	{	

		if(isset($data_style))
		{
	       unset($data_style);
	       $data_style = [];
	       $data_javascript = [];
	    } 

		$data_style = ['css/normalize','css/main_style', 'css/font-awesome', 'css/registro', 'data_table/datatables.min'];

		$data_javascript = ['js/jquery-3.2.1.min', 'js/main', 'js/registro_cliente', 'data_table/datatables.min'];

		$data_head = array(
				'data_style' => $data_style,
				'data_javascript' => $data_javascript
		);

		$sub_menu = resolve_sub_opcion("ProveedoresController", $_SESSION['opciones_menu']);
	
		return new View('registro_proveedor', [
									  'titulo' => 'Registro Proveedor', 
									  'data_head' => $data_head, 
									  'opciones_sub_menu' => $sub_menu
									]);
	}

	public static function registrar_proveedorAction(){

		$data = json_decode(file_get_contents("php://input"));
		$strJson = json_encode([ 'rc' => 'registrar_proveedor', 'data' => $data]);
		
		return getWS( $strJson , BASE_URL_WS );//Call WS return JSON

	}

}