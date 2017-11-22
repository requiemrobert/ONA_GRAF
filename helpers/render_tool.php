<?php 

session_start();

function render_profile(){
	
	return ucfirst (substr($_SESSION['user_name'], 0 , 1));

}

function render_menu(){

	$render =  '<ul class="navcontainer">';	
	$render .= '<li><a href='.BASE_URL.'><i class="fa fa-home fa-lg" aria-hidden="true"></i>';
	$render .= '<label>Inicio</label></a></li>';

	if ( !empty($_SESSION['opciones_menu']) ) {
		
			foreach ($_SESSION['opciones_menu'] as $key => $value) {

				$render .= "<li><a href='". $key ."'>";
				$render .= "<i class='fa ". menu_ico($key) ." fa-lg' aria-hidden='true'></i>";
				$render .= "<label>". $key ."</label></a></li>";

			}	
	}

	$render .= '</ul>';

	return $render;

}

function render_sub_menu($data_opciones = []){
	
	$render =   '<ul class="sidebar-menu">';	
		
	if (!empty($data_opciones) ) {
	
		foreach ($data_opciones as $sub_menu ) {
		
			
			if ($sub_menu == "consulta") {

				$render .=	'<li> <a href="'. BASE_URL .'clientes'.'" id='. $sub_menu .' >';

			}
			else
			{
				$render .=	'<li> <a href='. BASE_URL . $sub_menu .' id='. $sub_menu .' >';
			}

			$render .=  "<i class='fa ". menu_ico($sub_menu)." fa-me' aria-hidden='true'></i>";
			$render .=  "<label> ". $sub_menu ."</label>";
			$render .=	"</a></li>";

		}
		
	}

	$render .=  '</ul>';

	return $render; 	
}

function menu_ico($menu=''){

	switch ($menu) {
		case 'operaciones':
			 return 'fa-wrench';
			break;

		case 'produccion':
			 return 'fa-cogs';
			break;	

		case 'stock':
			 return 'fa-archive';
			break;	

		case 'ventas':
			 return 'fa-balance-scale';
			break;	
			
		case 'productos':
			 return 'fa-cart-plus';
			break;	
		
		case 'clientes':
			 return 'fa-users';
			break;	

		case 'proveedores':
			 return 'fa-truck';
			break;
		case 'usuarios':
			 return 'fa-user-circle-o';
			break;

		case 'registro':
			 return 'fa-address-book-o';
			break;

		case 'consulta':	
			 return 'fa-search';
			break;

		case 'modificar':
			 return 'fa-pencil-square-o';
			break;			

		case 'reportes':
			 return 'fa-bar-chart';
			break;	

		default:
			return 'fa-file-o';
			break;
	}

}

function render_footer(){

	$footer  = '<footer>';
	$footer .= '<section class="social-media">';
	$footer .= '<ul>';
	$footer .= '	<li><a href="#" class=""><i class="fa fa-facebook fa-lg hi-icon" aria-hidden="true"></i></a></li>';
	$footer .= '	<li><a href="#" class=""><i class="fa fa-twitter fa-lg hi-icon" aria-hidden="true"></i></a></li>';
	$footer .= '	<li><a href="#" class=""><i class="fa fa-google-plus fa-lg hi-icon" aria-hidden="true"></i></a></li>';
	$footer .= '</ul>';
	$footer .= '</section>';
	$footer .= '<section class="policy">';
	$footer .= '<ul>';
	$footer .= '<li><a href="#">Política de Privacidad</a></li>';
	$footer .= '<li><a href="#">Información Legal</a></li>';
	$footer .= '<li><a href="#">Términos y Condiciones</a></li>';
	$footer .= '</ul>';
	$footer .= '</section>';
	$footer .= '<section class="Copyright">';
	$footer .= '<p>© Copyright, Ona</p>';
	$footer .= '</section>';
	$footer .= '</footer>';

	return $footer; 	

}



