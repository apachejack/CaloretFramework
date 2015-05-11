<?php
use Caloret\Model;

class BmwModel extends Model{

	public function getAll(){
		
		$campos = array('modelo', 'color', 'peso');

		$filtros = array(
			array(
				"modelo", "=", "bmw"
			)
		);

		return $this->filterDb($campos, "coches", $filtros);

	}
}