<?php

namespace MF\Init;

//classe que gerencia as rotas
abstract class Bootstrap
{
	private $routes;

	//tem que ser setada na classe filha
	abstract protected function initRoutes();

	//inicia as rotas e pega a url
	public function __construct()
	{
		$this->initRoutes();
		$this->run($this->getUrl());
	}

	//retorna as rotas
	public function getRoutes()
	{
		return $this->routes;
	}

	//seta as rotas
	public function setRoutes(array $routes)
	{
		$this->routes = $routes;
	}

	//pega a url
	protected function run($url)
	{
		foreach ($this->getRoutes() as $key => $route) {
			if ($url == $route['route']) { //verifica se esta dentro das rotas
				$class = "App\\Controllers\\" . ucfirst($route['controller']); //chama a classe

				$controller = new $class; //instancia um objeto

				$action = $route['action'];

				$controller->$action(); //chama o método do controller
			}
		}
	}

	//retorna o path da url
	protected function getUrl()
	{
		return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	}
}
