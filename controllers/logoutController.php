<?php


class logoutController
{
	public function indexAction()
	{	
		
		try {

			session_unset();
			session_destroy();
			header("Location: " . BASE_URL ."login/");

		} catch (Exception $e) {
			echo 'Excepción capturada: ',  $e->getMessage(), "\n";
		}

		return "TRUE";
		
	}
}

