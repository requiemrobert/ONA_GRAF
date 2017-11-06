<?php 


function resolve_sub_opcion($className, $opciones_menu =[]) 
{
	
	$posicionController = strpos($className, "Controller");

	$opcionName = strtolower( substr($className, 0, $posicionController) ); 

	$sub_menu = [];	

	if (is_null($opciones_menu) or empty($opciones_menu)) {
		
		return false;

	}else{

		foreach ($opciones_menu as $key => $value) {
		
			if ($key == $opcionName) {
				
				$sub_menu = $value;
			}

		}

	}

	return $sub_menu;
}