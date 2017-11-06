<?php 
require 'model/ClientesModel.php';
require 'helpers/resolve_opcion.php';

class ConsultaController extends ClientesModel
{
	public function indexAction()
	{	

		if(isset($data_style))
		{
	       unset($data_style);
	       $data_style = [];
	       $data_javascript = [];
	    } 

		$data_style = ['normalize','main_style', 'font-awesome', 'gridly.min', 'cconsulta'];

		$data_javascript = ['jquery-3.2.1.min','consulta'];

		$data_head = array(
				'data_style' => $data_style,
				'data_javascript' => $data_javascript
		);

		$sub_menu = resolve_sub_opcion(get_class($this),$_SESSION['opciones_menu']);
	
		return new View('consulta', [
									  'titulo' => 'Consulta', 
									  'data_head' => $data_head, 
									  'opciones_sub_menu' => $sub_menu
									]);
	}

	public static function consultarAction(){

		$data = json_decode(file_get_contents("php://input"));
		$strJson = json_encode([ 'rc' => 'consultar_cliente', 'data' => $data]);
		
		return getWS( $strJson , BASE_URL_WS );//Call WS return JSON

	}

}