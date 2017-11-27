<?php 
require 'helpers/resolve_opcion.php';
class stock_MPController 
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
					   'modal/modal'];

		$data_javascript = [
							'data_table_export/jquery-3.2.1.min',
							'data_table_export/datatables.min',
							'data_table_export/Buttons/js/buttons.flash.min',	
							'data_table_export/pdfmake/pdfmake.min',
							'data_table_export/pdfmake/vfs_fonts',
							'modal/modal',
							'js/main', 
							'js/stock_MP'];
		
		$data_head = array(
				'data_style' => $data_style,
				'data_javascript' => $data_javascript
		);

		$sub_menu = [ "Registro_Stock_MP", 
					  "Modificar_Stock_MP", 
					  "Stock_MP", 
					  "Orden_Produccion", 
					  "Stock_Disponible" ];
		
		return new View('stock_MP', [
									  'titulo' => 'Stock Materia Prima', 
									  'data_head' => $data_head, 
									  'opciones_sub_menu' => $sub_menu
									]);
	}
	
	public static function consultar_Stock_MPAction(){

		$strJson = json_encode([ 'rc' => 'consultar_Stock_MP' ]);
		
		return getWS( $strJson , BASE_URL_WS );//Call WS return JSON

	}
}