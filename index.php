<?php
	/*
	 * El frontend controller se encarga de configurar nuestra aplicacion
	 * Se puede agregar archivos con require y con include, la diferencia es que include los incluye,
	 * pero sin ser obligatorio que exista el archivo, con require si debe existir el archivo.
	 */

	require "config/config.php";
	require "config/base_url.php";
	require 'helpers/load_css_script.php';
	require 'helpers/render_tool.php';

	//Library
	require 'library/Request.php';
	require 'library/Inflector.php';
    require 'library/Response.php';
	require 'library/View.php';
	require 'library/session_token.php';

	if(empty($_GET['url']))
	{
		$url = "";
	}
	else
	{
		$url = $_GET['url'];
	}

	if (!isset($_SESSION) or is_null($_SESSION) or empty($_SESSION))
	{ 
		header("Location: " . BASE_URL ."logout");
	}

	$request = new Request($url);
	$request->executeRequest();
