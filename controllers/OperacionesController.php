<?php
require 'helpers/resolve_opcion.php';
	
class OperacionesController
{
	public function indexAction()
	{	
		
		if(isset($data_style))
		{
	       unset($data_style);
	       $data_style = '';
	    } 

		$data_style = ['css/normalize','css/main_style','css/font-awesome'];

		$data_javascript = ['js/jquery-3.2.1.min', 'js/main'];

		$data_head = array(

				'data_style' => $data_style,
				'data_javascript' => $data_javascript
		);

		$sub_menu = [ "Registro_Stock_MP", 
					  "Modificar_Stock_MP", 
					  "Stock_MP", 
					  "Orden_Produccion", 
					  "Stock_Disponible" ];

		return new View('operaciones',[
										  'titulo' => 'Home', 
										  'data_head' => $data_head, 
										  'opciones_sub_menu' => $sub_menu
									  ]);
	}
	
	public function ciudadAction($ciudad)
	{
		exit('contactos ' . $ciudad);
	}
}