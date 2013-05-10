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

    public function fetchAll(){
        $db = $this->getDb();
        $stm = $db->prepare("Select * from " . $this->_table);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);

    }

    public function find(){
        $db = $this->getDb();
        $stm = $db->prepare("select * from " . $this->_table . "where id=:id");
        $stm->bindValue(":id",$this->getId());
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function getDb(){
        global $config;
        return Connection::factory($config);
    }
}