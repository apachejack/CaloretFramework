<?php
/*
	Con 2 comandos estas dependencias las hubiese cargado con Composer y su autoloader 
	y estaría accediendo a ellas mediante su namespace. 
	Si le ves futuro al Caloret Framework, refactorizo ;) jaja.
*/
require_once(__DIR__."/Autoloader.php");
require_once(__DIR__."/../lib/Db/DB.php");
require_once(__DIR__."/../lib/Db/GeneradorSQL/Generador.php");
require_once(__DIR__."/../lib/Db/GeneradorSQL/GeneradorWhere.php");
require_once(__DIR__."/../lib/Db/GeneradorSQL/GeneradorSelect.php");

require_once(__DIR__."/CaloretResponse.php");
require_once(__DIR__."/CaloretController.php");
require_once(__DIR__."/CaloretTemplating.php");