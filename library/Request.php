<?php
/**
  *@author Duilio
**/
 class Request
 {
	protected $url;
	protected $controller;
	protected $defaultController = 'home';
	protected $action;
	protected $defaultAction     = 'index';
	protected $params            = array();
	protected $response;

 	public function __construct($url)
 	{
 		$this->url =  $url;
 		$segments = explode('/', $this->getUrl());
 		$this->resolveController($segments);
 		$this->resolveAction($segments);
 		$this->resolveParams($segments);

 	}

 	public function resolveController(&$segments)
 	{
 		$this->controller = array_shift($segments);
 		if(empty($this->controller))
 		{
 			$this->controller = $this->defaultController;
 		}
 	}

 	public function resolveAction(&$segments)
 	{
 		$this->action = array_shift($segments);
 		if(empty($this->action))
 		{
 			$this->action = $this->defaultAction;
 		}
 	}

 	public function resolveParams(&$segments)
 	{
 		$this->params = $segments;
 	}

 	public function getUrl()
 	{
 		return $this->url;
 	}

 	public function getController()
 	{
 		return $this->controller;
 	}

 	public function getControllerClassName()
 	{
 		return Inflector::camel($this->getController()) . 'Controller'; #funcion static(no es instanciado)
 	}

 	public function getControllerFileName()
 	{
 		return 'controllers/' . $this->getControllerClassName() . '.php';
 	}

 	public function getAction()
 	{
 		return $this->action;
 	}

 	public function getActionMethodName()
 	{
 		return Inflector::lowerCamel($this->getAction()) . 'Action';#funcion static(no es instanciado)
 	}

 	public function getParams()
 	{
 		return $this->params;
 	}

 	public function executeRequest()
 	{
			$controllerClassName = $this->getControllerClassName();#crea una clase para ser instanciada
			$controllerFileName  = $this->getControllerFileName();
			$actionMethodName    = $this->getActionMethodName();
			$params              = $this->getParams();

			if( ! file_exists($controllerFileName) )
			{
				exit('<h1>Controlador no existe</h1>');
			}

			require $controllerFileName;

			$controller = new $controllerClassName();

			$response = call_user_func_array([$controller, $actionMethodName], $params);

			$this->executeResponse($response);
 	}

 	public function executeResponse($response)
 	{
			if($response instanceOf Response)
			{
				$response->executeView();
			}
			elseif (is_string($response))
			{
				echo $response;
			}
			elseif (is_array($response))
			{
				echo json_encode($response);
			}
			else
			{
				//header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
				//echo 'Your view folder path does not appear to be set correctly. Please open the following file and correct this: '.SELF;
				//exit('Respuesta no valida');
			}

 	}

 }
