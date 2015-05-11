<?php
class CaloretResponse{
	protected static $code = null;
	protected static $content = null;
	protected static $headers = [];

	protected static function getPathTemplates(){
		return __DIR__."/../src/app/templates/";
	}

	protected static function setCode($code){
		self::$code = (int)$code;
	}

	protected static function getCode(){
		return self::$code;
	}

	public static function set($content, $code = 200){
		self::setCode($code);
		self::$content = $content;
	}

	public static function setHeader($header){
		self::$headers[] = $header;
	}

	protected static function printHeaders(){
		header('Content-Type: text/html; charset=utf-8');
		
		foreach(self::$headers as $i => $header_specification){
			header($header_specification);
		}

		switch (self::$code){
			case 404:
				header("HTTP/1.0 404 Not Found", true, self::getCode() );
			break;
		}
	}

	public static function get(){
		self::printHeaders();
		echo self::$content;
	}
}