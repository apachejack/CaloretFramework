<?php
namespace Caloret;

class Autoloader {
    public function __construct(){
        spl_autoload_register(array($this, "loader"));
    }

    protected function loader($nombreClase){

    	switch(true){
    		case $this->esModelo($nombreClase):
    			$dir = __DIR__."/../src/app/Models/";
    		break;

    		case $this->esControlador($nombreClase):
    			$dir = __DIR__."/../src/app/Controllers/";
    		break;


    		case $this->esConexionBD($nombreClase): 
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

    protected function esModelo($nombreClase){
    	return preg_match("/Model$/", $nombreClase);
    }

    protected function esControlador($nombreClase){
    	return preg_match("/Controller$/", $nombreClase);
    }

    protected function esConexionBD($nombreClase){
    	return ($nombreClase == "DB");
    }
}
