<?php 
require 'helpers/resolve_opcion.php';

class ProductosController
{
	public function indexAction()
	{	

		if(isset($data_style))
		{
	       unset($data_style);
	       $data_style = '';
	    } 

		$data_style = ['css/normalize', 'css/main_style', 'css/font-awesome'];

		$data_javascript = ['js/jquery-3.2.1.min', 'js/main'];

		$data_head = array(
				'data_style' => $data_style,
				'data_javascript' => $data_javascript
		);

		$sub_menu = resolve_sub_opcion(get_class($this),$_SESSION['opciones_menu']);

		return new View('productos', [
									  'titulo' => 'Home', 
									  'data_head' => $data_head, 
									  'opciones_sub_menu' => $sub_menu
								    ]);
		}
}