<?php
namespace DB;
use PDO;

class dbQuery{
    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=172.19.0.2;dbname=project','igor','jkl98k17');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function insertData($table , $data){

        $key = implode(', ', array_keys($data));
        $tags = ":".implode(', :', array_keys($data));
        $sql = "INSERT INTO {$table} ({$key}) VALUES ({$tags})";
        $result = $this->db->prepare($sql);
        $result->execute($data);
    }

    public function updateData($table , $data, $id){

        $dataUp = "";
        foreach ($data as $key => $value){
            $dataUp .= ', '.$key.'='."'$value'";
        }
        $setData = trim($dataUp,',');
        $sql = "UPDATE {$table} SET {$setData} WHERE id = {$id}";
        $result = $this->db->prepare($sql);
        $result->execute($data);
    }

    public function deleteData($table , $id){
        $sql = "DELETE FROM {$table} WHERE id = {$id}";
        $result = $this->db->prepare($sql);
        $result->execute();
    }

    public function getOrderData($table, $orderBy, $offset, $limit){
        $sql = "SELECT * FROM {$table} ORDER BY {$orderBy} LIMIT {$offset} , {$limit} ";
        $valueDb = $this->db->prepare($sql);
        $valueDb->execute();
        return $valueDb->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllData($table){
        $sql = "SELECT * FROM {$table}";
        $valueDb = $this->db->prepare($sql);
        $valueDb->execute();
        return $valueDb->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOne($table , $id){
        $sql = "SELECT * FROM {$table} WHERE id = {$id}";
        $valueDb = $this->db->prepare($sql);
        $valueDb->execute();
        return $valueDb->fetch(PDO::FETCH_ASSOC);
    }
    public function getCountData($table){
        $sql = "SELECT count(*) FROM {$table}";
        $valueDb = $this->db->prepare($sql);
        $valueDb->execute();
        $result = $valueDb->fetch(PDO::FETCH_ASSOC);
        return $result['count(*)'];
    }
    public function admin(){
        $sql = "SELECT * FROM administration";
        $admin = $this->db->prepare($sql);
        $admin->execute();
        return $result = $admin->fetch(PDO::FETCH_ASSOC);
    }
}

