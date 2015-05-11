<?php
class CarsController extends CaloretController{

	public function bmwSearchAction(){
		$bmw = new BmwModel();
		$this->printTemplate("coches", ["modelo" => "BMW", "coches" => $bmw->getAll() ]);
	}

}