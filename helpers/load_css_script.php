<?php 

function loadCss($data_head){

	extract($data_head);

	for ($i=0; $i < count($data_style); $i++) { 
	
		echo "<link rel='stylesheet' type='text/css' href='media/$data_style[$i].css'>";
		
	}

}

function loadScript($data_head){

	extract($data_head);

	for ($i=0; $i < count($data_javascript); $i++) { 
	
		echo "<script src='media/$data_javascript[$i].js'></script>";
		
	}

}