<?php 
namespace App\Models;

use App\Classes\ExceptionErros;
abstract class Connection {
     private static $conn = null;
	 private static function conn(){
	    try{
		   if(self::$conn == null){
			  self::$conn = new \PDO(DATABASE['driver'].":host=".DATABASE['host'].";dbname=".DATABASE['dbname'].";charset=utf8",DATABASE['username'],DATABASE['passwd']);
			  self::$conn->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
		   }
		}catch(\PDOException $e){
			ExceptionErros::getLog($e->getMessage());
		}
		return self::$conn;
	 }
	 
	 protected static function getConn(){
		return self::conn();
     }
  }
 