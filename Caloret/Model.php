<?php
namespace Caloret;
use Lib\Db\DB;

class Model{
	public function getConn(){
		return DB::get();
	}

	public function filterDb($fields, $table, $filters_where){
		return DB::filter($fields, $table, $filters_where);
	}
}