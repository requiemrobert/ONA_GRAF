<?php 
require 'model/ClientesModel.php';
require 'helpers/resolve_opcion.php';


class Registro_Stock_MPController extends ClientesModel
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

		$data_javascript = ['js/jquery-3.2.1.min', 'js/main', 'js/Registro_Stock_MP', 'data_table/datatables.min'];

		$data_head = array(
				'data_style' => $data_style,
				'data_javascript' => $data_javascript
		);

		$sub_menu = ["Stock_MP", "Registro_Stock_MP", "Produccion", "Stock_Fisico", "Stock_Disponible"];

		return new View('Registro_Stock_MP', [
									  'titulo' => 'Registro Stock MP', 
									  'data_head' => $data_head, 
									  'opciones_sub_menu' => $sub_menu
									]);
	}

	public static function consultar_clientesAction(){
		
		$strJson = json_encode([ 'rc' => 'consultar_stock_MP' ]);
		
		return getWS( $strJson , BASE_URL_WS );//Call WS return JSON

	}

}