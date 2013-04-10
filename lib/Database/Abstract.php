<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Mauricio
 * Date: 09/04/13
 * Time: 22:59
 * To change this template use File | Settings | File Templates.
 */

abstract class Database_Abastract{

    protected $id = nulll;
    protected $_table = null;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        if(!is_null($this->id))
            throw new Exception('O ID nao pode ser alterado');
        $this->id = (int) $id;
    }

    //lista tudo
    public function fetchAll(){

    }

    //pega apenas um registro
    public function find(){

    }

    //deleta o registro onde id=$thisi>id
    public function delete(){

    }

    //pego a conexao PDO com o banco de dados
    public function getDb(){

    }

}