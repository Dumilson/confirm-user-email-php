<?php
namespace App\Models;

use App\Classes\ExceptionErros;
use App\Models\Connection;

class Models extends Connection {

    protected static $table; 

    public static function insert($table, Array $data) {
        try{
            $pdo =  parent::getConn();
            $fields = implode(", ", array_keys($data));
            $values = ":".implode(", :", array_keys($data));
            $sql = "INSERT INTO $table ($fields) VALUES ($values)";
            $statement = $pdo->prepare($sql);
            foreach ($data as $key => $value) {
                $statement->bindValue(":$key", $value, \PDO::PARAM_STR);
            }
            $statement->execute();

            if($statement->rowCount() > 0){
                return $pdo->lastInsertId();
            }else{
                return false;
            }
		}catch(\Exception $e){
			ExceptionErros::getLog($e->getMessage());
		}

       return false;
    }

    public static function select($table, $where = null, $order = null, $limit=null, $columns = "*") {
        try{
            $pdo =  parent::getConn();
            $where = strlen($where) ? ' WHERE '.$where : '';
            $columns = strlen($columns) ? $columns : '*';
            $order = strlen($order) ? 'ORDER'.$order : '';
            $limit = strlen($limit) ? 'LIMIT'.$limit : '';
            $sql = "SELECT {$columns} FROM {$table} {$where} {$order} {$limit}";
            $statement = $pdo->query($sql);
            $statement->execute();
            return $statement->fetchAll();
        }catch(\Exception $e){
            ExceptionErros::getLog($e->getMessage());
        }
        
    }

    public static function delete($table, $id) {

        try{
            $pdo =  parent::getConn();
            $sql = "DELETE FROM $table where id = :id";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(":id", $id);
            $statement->execute();
            if($statement->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }catch(\Exception $e){
            ExceptionErros::getLog($e->getMessage());
        }


        
    }

    public static function find($table, $id, $columns = "*") {
        try {
            $columns = strlen($columns) ? $columns : '*';
            $pdo =  parent::getConn();
            $sql = "SELECT {$columns} FROM $table WHERE id = :id LIMIT 1";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(":id", $id);
            $statement->execute();
            return $statement->fetch();
        }
        catch(\Exception $e){
            ExceptionErros::getLog($e->getMessage());
        }
    }

    public static function findColum($table, $column, $value, $columns = "*") {
        try{
            $columns = strlen($columns) ? $columns : '*';
            $pdo =  parent::getConn();
            $sql = "SELECT {$columns} FROM $table WHERE $column = $value";
            $statement = $pdo->prepare($sql);
            $statement->execute();
            return $statement->fetch();
        }catch(\Exception $e){
            ExceptionErros::getLog($e->getMessage());
        }

    }

    public static function selectWhereSwitch($table, $where,  $columns = "*") {
        if(!empty($where)){
                $columns = strlen($columns) ? $columns : '*';
                $pdo =  parent::getConn();
                $sql = "SELECT * FROM $table $where";
                $statement = $pdo->prepare($sql);
                $statement->execute();
                return $statement->fetchAll();
        }else{
            return "WHERE variable can not be null";
        }        
    }

    public static function selectChekc($table, $where,  $columns = "*") {
        if(!empty($where)){
                $columns = strlen($columns) ? $columns : '*';
                $pdo =  parent::getConn();
                $sql = "SELECT {$columns} FROM $table $where";
                $statement = $pdo->prepare($sql);
                $statement->execute();

                if($statement->rowCount() > 0 ){
                    return ['status' => true, "data" => $statement->fetch(\PDO::FETCH_ASSOC)];
                }else{
                    return ['status' => false, "data" => "Sem registros"];
                }
        }else{
            return "Where not be null";
        }
    }

    public static function update($table, Array $data, $id) {
        $pdo =  parent::getConn();
        $new_values = "";
        foreach ($data as $key => $value) {
            $new_values .= "$key=:$key, ";
        }
        $new_values = substr($new_values, 0, -2);
        $sql = "UPDATE $table SET $new_values WHERE id = :id";
        $statement = $pdo->prepare($sql);
        foreach ($data as $key => $value) {
            $statement->bindValue(":$key", $value, \PDO::PARAM_STR);
        }
        $statement->bindValue(":id", $id);
        $statement->execute();
        if($statement->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
}