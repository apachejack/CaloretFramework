<?php
class TestModel{

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

		return DB::filter($campos, "coches", $filtros);

	}
}