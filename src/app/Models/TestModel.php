<?php
use Caloret\Model;

class TestModel extends Model{

	public function getCars(){
		
		$campos = array('modelo', 'color', 'peso');

		$filtros = array(
			array(
				"color", "=", "verde"
			), 
			array(
				"peso", "BETWEEN", array(100, 500)
			)
		);

		return $this->filterDb($campos, "coches", $filtros);

	}
}