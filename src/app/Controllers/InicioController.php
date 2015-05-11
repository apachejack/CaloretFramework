<?php
class InicioController extends CaloretController{
	
	public function accionInicio(){
		$this->printTemplate("layout", ["title" => "Caloret, caloret"]);
	}
	
}