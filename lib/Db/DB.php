<?php
class DB{
	static private $DBH = null;

	static $login = null;

	private function __construct(){
		//Solo puedes acceder desde get()
	}

	public static function setLogin(array $datos){
		self::$login = $datos;
	}

	private static function connect(){
	    try {
		    self::$DBH = new \PDO('mysql:host='.self::$login["dbpath"].';dbname='.self::$login["dbname"], self::$login["dbuser"], self::$login["dbpass"]);
		    
		    self::$DBH->query("SET character_set_client=utf8;
				SET character_set_connection=utf8;
				SET character_set_database=utf8;
				SET character_set_results=utf8;
				SET character_set_server=utf8;");


		} catch (\PDOException $e) {
		    print "Error!: " . $e->getMessage();
		    die();
		}
	}

	public static function get(){

		if(is_null(self::$DBH)){
			self::connect();
		}

	    return self::$DBH;
	}

	public static function filter(array $campos, $tabla, array $filtros){

		require_once(__DIR__."/GeneradorSQL/Generador.php");
		require_once(__DIR__."/GeneradorSQL/GeneradorWhere.php");
		require_once(__DIR__."/GeneradorSQL/GeneradorSelect.php");

		$Select = new GeneradorSelect($campos, $tabla, $filtros);

		$query = $Select->generarSQL();

		$stmt = self::get()->prepare($query);
		$stmt->execute();

		return $stmt->fetchAll();
	}

	public function __clone() {
   		throw new \Exception("Solo puedes acceder desde get() ");
	}
}