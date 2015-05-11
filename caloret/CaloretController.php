<?php
class CaloretController{
	public function printTemplate($path, $content){
		$template = CaloretTemplating::renderTemplate($path, $content);
		CaloretResponse::set($template);
	}

	public function notFound(){
		CaloretResponse::set("No tenemos lo que buscas.", 404);
	}

	public function printJson(array $content){
		CaloretResponse::set(
			json_encode($content)
		);

		CaloretResponse::setHeader('Content-Type: application/json ; charset=utf-8');
	}
}