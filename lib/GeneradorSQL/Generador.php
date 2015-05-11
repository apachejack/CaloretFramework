<?php
namespace Lib\GeneradorSQL;

abstract class Generador{
	protected $tabla = null;
	protected $filtros_where = [];

	public function definirNombreTabla($tabla){
		$this->tabla = $tabla;
	}

	public function obtenerNombreTabla(){
		return $this->tabla;
	}

	public function definirFiltrosWhere(array $filtros){
		$this->filtros_where = $filtros;
	}

	public function obtenerFiltrosWhere(){
		return $this->filtros_where;
	}

	public function agregarFiltroWhere($filtro){
		$this->filtro_where[] = $filtro;
	}

	protected function generarWhere(){

	}
}