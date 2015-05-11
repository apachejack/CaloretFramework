<?php
class BmwModel{

	public function getAll(){
		
		$campos = array('modelo', 'color', 'peso');

		$filtros = array(
			array(
				"modelo", "=", "bmw"
			)
		);

		return DB::filter($campos, "coches", $filtros);

	}
}