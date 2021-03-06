<?php 
require 'helpers/resolve_opcion.php';

class VentasController 
{
	public function indexAction()
	{	

		if(isset($data_style))
		{
	       unset($data_style);
	       $data_style = [];
	       $data_javascript = [];
	    } 

		$data_style = ['css/normalize','css/main_style', 'css/font-awesome', 'data_table/css/jquery-ui.css', 'data_table/datatables.min'];

		$data_javascript = ['js/jquery-3.2.1.min', 'js/main', 'data_table/datatables.min'];

		$data_head = array(
				'data_style' => $data_style,
				'data_javascript' => $data_javascript
		);

		$sub_menu = [ "Registro_Stock_MP", "Modificar_Stock_MP", "Stock_MP", "Produccion", "Stock_Fisico", "Stock_Disponible" ];
		
		return new View('ventas', [
									  'titulo' => 'Ventas', 
									  'data_head' => $data_head, 
									  'opciones_sub_menu' => $sub_menu
									]);
	}

	public static function consultar_ventasAction(){
		
		$strJson = json_encode([ 'rc' => 'consultar_ventas' ]);
		
		return getWS( $strJson , BASE_URL_WS );//Call WS return JSON

	}

}