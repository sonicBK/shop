<?php
	class App
	{
		protected $controller = 'productController';
		protected $method = 'index';
		protected $params = array();

		public function __construct()
		{
			$url = $this->parseUrl();
		
			if (file_exists('app/controller/'. $url[0] .'.php')) 
			{
			 	$this->controller = $url[0];
				unset($url[0]);
			}		
	
			require_once('app/controller/'. $this->controller .'.php');
			
			$this->controller = ucfirst($this->controller);
			
			$this->controller = new $this->controller;
			
			
			if(isset($url[1]))
			{
				if(method_exists($this->controller, $url[1]))
				{
					$this->method = $url[1];
					unset($url[1]);
				}
			}

			$this->params = $url ? array_values($url) : array();

			call_user_func_array(array($this->controller, $this->method), $this->params);
		}

		public function parseUrl()
		{
			if (isset($_GET['u'])) 
			{
				return $url = explode('/',filter_var(rtrim($_GET['u'], '/'), FILTER_SANITIZE_URL));			
				//filter_var($url, FILTER_SANITIZE_URL ) loai bo ki tu ko can thiet trong url
			}
		}
	}