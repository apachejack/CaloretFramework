<?php
/* todas las librerías que necesiten inicializarse o tomar datos */
use Caloret\Caloret;

$Caloret = new Caloret();

DB::setLogin([
	"dbpath" => "localhost",
	"dbname" => "framework", 
	"dbuser" => "framework", 
	"dbpass" => "framework"
]);

