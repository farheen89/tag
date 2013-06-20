<?php

include_once 'Mysql.php';

abstract class Functions{

    protected $id = null;
    protected $_table = null;

   public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function listar(){
        $db = $this->getDb();
        $stmt = $db->prepare("SELECT * FROM " . $this->_table);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchengine(){
        $db = $this->getDb();
        $stmt = $db->prepare("SELECT Title FROM " . $this->_table . " WHERE Brand LIKE :id");
        $stmt->bindValue(":id",$this->getId());
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDb(){
        global $config;
        return Connection::factory($config);
    }
}
