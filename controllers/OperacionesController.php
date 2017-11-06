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

		$data_style = ['normalize','main_style','font-awesome'];

		$data_javascript = ['header'];

		$data_head = array(

				'data_style' => $data_style,
				'data_javascript' => $data_javascript
		);

		$sub_menu = resolve_sub_opcion(get_class($this),$_SESSION['opciones_menu']);

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