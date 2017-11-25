<?php 
require 'helpers/resolve_opcion.php';


class Orden_ProduccionController 
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
						'css/registro', 
						'select2/css/select2.min'];

		$data_javascript = [
							'js/jquery-3.2.1.min', 
							'js/main', 
							'select2/js/select2.full.min',
							'js/orden_produccion' ];

		$data_head = array(
				'data_style' => $data_style,
				'data_javascript' => $data_javascript
		);

		$sub_menu = [ "Registro_Stock_MP", 
					  "Modificar_Stock_MP", 
					  "Stock_MP", 
					  "Orden_Produccion", 
					  "Stock_Fisico", 
					  "Stock_Disponible" ];
		
		return new View('orden_produccion', [
									  		  'titulo' => 'Orden Producción', 
									  		  'data_head' => $data_head, 
									  		  'opciones_sub_menu' => $sub_menu
									        ]);
	}

	public static function consultar_disponible_MPAction(){
		
		$strJson = json_encode([ 'rc' => 'consultar_disponible_MP' ]);
		
		return getWS( $strJson , BASE_URL_WS );//Call WS return JSON

	}

	public static function consultar_proveedorAction(){
	
		$strJson = json_encode([ 'rc' => 'consultar_proveedor']);
		
		return getWS( $strJson , BASE_URL_WS );//Call WS return JSON

	}

}