<?php 
require 'helpers/resolve_opcion.php';


class ClientesController 
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

							'modal/modal',
							'js/main', 
							'js/clientes'];

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

	public static function consultar_clientesAction(){
		
		$strJson = json_encode([ 'rc' => 'consultar_cliente' ]);
		
		return getWS( $strJson , BASE_URL_WS );//Call WS return JSON

	}

}