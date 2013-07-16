<?php

include_once 'Mysql.php';

abstract class Functions{

    protected $id = null;
    protected $_table = null;
    protected $where = null;
    protected $like = null;
    protected $order = null;

   public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setOrder($order)
    {
        $this->order = $order;
    }

    public function getOrder()
    {
        return $this->order;
    }

    public function setWhere($where)
    {
        $this->where = $where;
    }

    public function getWhere()
    {
        return $this->where;
    }

    public function setLike($like)
    {
        $this->like = $like;
    }

    public function getLike()
    {
        return $this->like;
    }

    public function listWhereLikeOrder(){
        $db = $this->getDb();
        $stmt = $db->prepare("SELECT * FROM " . $this->_table . " WHERE " . $this->getWhere() . " LIKE " . $this->getLike() . " ORDER BY " . $this->getOrder());
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchengine2(){
        $db = $this->getDb();
        $stmt = $db->prepare("SELECT * FROM " . $this->_table . " WHERE " . $this->getWhere() . " LIKE " . $this->getLike());
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
