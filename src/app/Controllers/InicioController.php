<?php
use Caloret\Controller;

class InicioController extends Controller{
	
	public function accionInicio(){
		$this->printTemplate("layout", ["title" => "Caloret, caloret"]);
	}
	
}