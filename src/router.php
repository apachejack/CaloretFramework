<?php
use Caloret\Response;

/* 
Obviamente se podría hacer un router menos primitivo jugando con .htaccess
para hacer un controlador frontal elegante. 
No he considerado que fuese necesario trabajarselo más
 */

switch(true){
	case (isset($_GET['c']) && isset($_GET['m'])):

		/* Routeador universal para controladores y métodos */
		
		$controllerName = $_GET["c"];
		$methodName = $_GET["m"];

		if(!class_exists($controllerName)){
			Response::set("El controlador no existe", 404);
		}
		else{
			$Controller = new $controllerName();
		}

		if(!method_exists($Controller, $methodName)){
			Response::set("El método no existe", 404);
		}
		else{
			$Controller->$methodName();
		}
		
	break;

	case (empty($_GET) && empty($_POST)):
		$inicio = new InicioController();
		$inicio->accionInicio();
	break;

	default:
		Response::set("Error 404", 404);
	break;

}

Response::get();