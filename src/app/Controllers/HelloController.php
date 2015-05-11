<?php
use \Caloret\Controller;

class HelloController extends Controller{

	public function helloWorld(){
		$this->printJson(["alertMsg" => "Hola Iván!"]);
	}

}