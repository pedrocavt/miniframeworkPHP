<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap
{
	//metodo abstract da classe pai
	protected function initRoutes()
	{

		//rota 1
		$routes['home'] = array(
			'route' => '/',
			'controller' => 'indexController',
			'action' => 'index'
		);

		//rota 2	
		// $routes['sobre-nos'] = array(
		// 	'route' => '/sobre-nos',
		// 	'controller' => 'indexController',
		// 	'action' => 'sobreNos'
		// );

		//seta as rotas da classe pai
		$this->setRoutes($routes);
	}
}
