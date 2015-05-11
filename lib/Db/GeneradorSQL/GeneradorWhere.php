<?php
/* SÓLO PERMITE COMBINAR FILTROS WHERE MEDIANTE AND */

class GeneradorWhere{
	protected $comparadores = [
		"LIKE" => "string", 
		"IN" => "array", 
		"BETWEEN" => "array", 
		"=" => "string",  
		"<" => "string",  
		">" => "string",  
		"<=" => "string", 
		">=" => "string"
	];

	protected $filtros = array();

	public function __construct(array $filtros){
		$this->definirFiltrosWhere($filtros);
	}

	public function definirFiltrosWhere(array $filtros){
		$this->filtros = $filtros;
	}

	public function agregarFiltroWhere($filtro){
		$this->filtros[] = $filtro;
	}

	protected function validarFormatoFiltro(array $filtro){
		$campo = $filtro[0];
		$comparador = $filtro[1];
		$valor = $filtro[2];

		if(!is_string($campo)){
			throw new \Exception("El campo de tabla a filtrar debe ser un string");
		}

		if(!isset( $this->comparadores[$comparador] )){
			throw new \Exception("El comparador '$comparador' no está permitido");
		}

		$tipo_campo_permitido = $this->comparadores[$comparador];

		switch($tipo_campo_permitido){
			case "string": 
				if(!is_string($valor)){
					throw new \Exception("El comparador '$comparador' solo acepta valores string");
				}
			break;

			case "array": 
				if(!is_array($valor)){
					throw new \Exception("El comparador '$comparador' solo acepta valores array");
				}
			break;
		}

		return $filtro;
	}

	protected function sanearValores(){
		array_walk($this->filtros, function(&$item, $key){
			
			if( !is_array($item[2]) ){
				$item[2] = $this->sanearValor($item[2]); 
			}
			else{
				array_walk($item[2], function(&$valor, $key){
					$valor = $this->sanearValor($valor);
				});
			}

		});
	}

	protected function sanearValor($valor){
		return DB::get()->quote($valor);
	}

	protected function validarFiltros(){
		foreach($this->filtros as $filtro){
			$this->validarFormatoFiltro($filtro);
		}
	}

	protected function convertirFiltroATexto(array $filtro){
		$filtro_string = "";
		$campo = $filtro[0];
		$comparador = $filtro[1];
		$valor = $filtro[2];

		switch ($comparador){
			case "BETWEEN": 
				$filtro_string = $campo . " BETWEEN " . $valor[0] . " AND " . $valor[1];
			break;

			case "IN":
				$filtro_string = $campo . " IN (" . implode(",", $valor) . ")";
			break;

			default: 
				$filtro_string = implode(" ", $filtro);
			break;
		}	

		return $filtro_string;	
	}

	protected function generarSintaxisWhere(){
		/* SÓLO PERMITE COMBINAR WHERES MEDIANTE AND */
		$filtros_string = [];

		//Convierte a texto cada filtro guardado en el array
		foreach($this->filtros as $key => $value){
			$filtros_string[] = $this->convertirFiltroATexto($this->filtros[$key]);
		}

		//Junta todos los filtros string
		return implode(" AND ", $filtros_string);
	}


	public function generarSQL(){
		$sql = "";

		$this->validarFiltros();
		$this->sanearValores();
		$sintaxis = $this->generarSintaxisWhere();

		if(!empty($sintaxis)){
			$sql = " WHERE ". $this->generarSintaxisWhere();
		}

		return $sql;
	}

}