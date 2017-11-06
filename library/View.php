<?php
class View extends Response
{
	protected $template;
	protected $vars = array();
	protected $responseView;
	protected $layout;

	public function __construct($template, $vars = array())
	{
		$this->template = $template;
		$this->vars = $vars; # variables seteadas en el Controller que instancia la vista
	}

	public function getTemplate()
	{
		return $this->template;
	}

	public function getVars()
	{
		return $this->vars;
	}

	public function getViewFileName($template)
 	{
 		return 'views/' . $template . '.tpl.php';
 	}

 	public function getLayoutFileName($layout)
 	{
 		return 'views/' . $layout . '.tpl.php';
 	}

	public function executeView()
	{
		$template = $this->getTemplate();
		$vars = $this->getVars();
		$viewFileName  = $this->getViewFileName($template);
		$layoutHead = $this->getLayoutFileName($layout='layoutHead');

		call_user_func(function () use ($viewFileName, $vars)
		{
			extract($vars);

			ob_start();

			require $viewFileName; # content Main view
			
			$tpl_content = ob_get_clean();
			
			require "views/layout.tpl.php";

		});

	}


}
