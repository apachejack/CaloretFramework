<?php
use \Caloret\Controller;

class CarsController extends Controller{

	public function bmwSearchAction(){
		$bmw = new BmwModel();
		$this->printTemplate("coches", ["modelo" => "BMW", "coches" => $bmw->getAll() ]);
	}

}