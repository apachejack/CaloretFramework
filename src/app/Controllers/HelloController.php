<?php
class HelloController extends CaloretController{

	public function helloWorld(){
		$this->printJson(["alertMsg" => "Hola Iván!"]);
	}

}