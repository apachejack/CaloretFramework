<?php
class GeneradorSelect extends Generador{
	protected $campos_seleccionados = array();

	public function __construct(array $campos_seleccionados, $tabla, array $filtros_where){
		$this->definirCamposSeleccionados($campos_seleccionados);
		$this->definirNombreTabla($tabla);
		$this->definirFiltrosWhere($filtros_where);
	}

	public function definirCamposSeleccionados(array $campos){
		$this->campos_seleccionados = $campos;
	}

	public function agregarCampoSeleccionado($campo){
		$this->campos_seleccionados[] = $campo;
	}

	public function obtenerCamposSeleccionados(){
		return $this->campos_seleccionados;
	}

	protected function convertirCamposASQL(){
		return implode(",", $this->obtenerCamposSeleccionados());
	}

	public function generarSQL(){

		$campos = $this->convertirCamposASQL();
		$tabla = $this->obtenerNombreTabla();

		try{
			$where = ( new GeneradorWhere($this->obtenerFiltrosWhere()) )->generarSQL();
		}
		catch(\Exception $e){
			die($e->getMessage());
		}

		$sql = "SELECT $campos 
				FROM $tabla  
				$where";

		return $sql;
	}

}