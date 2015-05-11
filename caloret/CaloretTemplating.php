<?php
class CaloretTemplating{

	protected static function getPathTemplates(){
		return __DIR__."/../src/app/templates/";
	}

	public static function renderTemplate($template_path, $data){
		$file =  self::getPathTemplates() . $template_path . ".php";
		
		if(!file_exists($file) ){
			throw new \Exception("No se encuentra la plantilla en $archivo");
		}

		ob_start();
		extract($data);
		include($file);
		
		return ob_get_clean();
	}
}