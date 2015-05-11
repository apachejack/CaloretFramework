<?php
/* todas las librerías que necesiten inicializarse o tomar datos */

use Lib\Db\DB;

DB::setLogin([
	"dbpath" => "localhost",
	"dbname" => "framework", 
	"dbuser" => "framework", 
	"dbpass" => "framework"
]);

