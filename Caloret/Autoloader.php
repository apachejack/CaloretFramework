<?php
namespace Caloret;

class Autoloader {
    static public function loader($nombreClase){

    	switch(true){
    		case self::esModelo($nombreClase):
    			$dir = __DIR__."/../src/app/Models/";
    		break;

    		case self::esControlador($nombreClase):
    			$dir = __DIR__."/../src/app/Controllers/";
    		break;

    		case self::esConexionBD($nombreClase): 
    			$dir = __DIR__."/../lib/Db/";
    		break;
    	}

        $ruta_archivo = $dir . $nombreClase . ".php";

        if(file_exists($ruta_archivo)){
            include($ruta_archivo);
            
            if(class_exists($nombreClase)){
                return true;
            }

            return true;
        }

        return false;
    }

    static protected function esModelo($nombreClase){
    	return preg_match("/Model$/", $nombreClase);
    }

    static protected function esControlador($nombreClase){
    	return preg_match("/Controller$/", $nombreClase);
    }

    static protected function esConexionBD($nombreClase){
    	return ($nombreClase == "DB");
    }

    static public function start(){
        spl_autoload_register("self::loader");
    }
}

Autoloader::start();
