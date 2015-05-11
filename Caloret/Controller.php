<?php
namespace Caloret;

class Controller{
	public function printTemplate($path, $content){
		$template = Templating::renderTemplate($path, $content);
		Response::set($template);
	}

	public function notFound(){
		Response::set("No tenemos lo que buscas.", 404);
	}

	public function printJson(array $content){
		Response::set(
			json_encode($content)
		);

		Response::setHeader('Content-Type: application/json ; charset=utf-8');
	}
}