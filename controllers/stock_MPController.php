<?php 
require 'model/ClientesModel.php';
require 'helpers/resolve_opcion.php';


class stock_MPController extends ClientesModel
{
	public function indexAction()
	{	

		if(isset($data_style))
		{
	       unset($data_style);
	       $data_style = [];
	       $data_javascript = [];
	    } 

		$data_style = [
					   'css/normalize',
					   'css/main_style', 
					   'css/font-awesome', 

					   'data_table_export/datatables.min',	
					   'data_table_export/Buttons/css/buttons.dataTables.min',

					   'css/clientes', 
					   'modal/modal',
					   'css/registro'];

		$data_javascript = [
							'data_table_export/jquery-3.2.1.min',
							'data_table_export/datatables.min',
							'data_table_export/Buttons/js/buttons.flash.min',	

							'modal/modal',
							'js/main', 
							'js/clientes'];

		$data_head = array(
				'data_style' => $data_style,
				'data_javascript' => $data_javascript
		);

		$sub_menu = ["Stock_MP", "Registro_Stock_MP", "Produccion", "Stock_Fisico", "Stock_Disponible"];
		return new View('stock_MP', [
									  'titulo' => 'Stock Materia Prima', 
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
		
		$strJson = json_encode([ 'rc' => 'consultar_stock_MP' ]);
		
		return getWS( $strJson , BASE_URL_WS );//Call WS return JSON

	}

}