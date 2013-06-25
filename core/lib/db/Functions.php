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


    public function listAll(){
        $db = $this->getDb();
        $stmt = $db->prepare("SELECT * FROM " . $this->_table);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listWhereOrder(){
        $db = $this->getDb();
        $stmt = $db->prepare("SELECT * FROM " . $this->_table . " :where :like :order");
        $stmt->bindValue(":where",$this->getWhere());
        $stmt->bindValue(":like",$this->getLike());
        $stmt->bindValue(":order",$this->getOrder());
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listAllFooterOrder(){
        $db = $this->getDb();
        $stmt = $db->prepare("SELECT * FROM " . $this->_table . " WHERE source LIKE :id AND language LIKE 'en' ORDER BY 'order'");
        $stmt->bindValue(":id",$this->getId());
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
