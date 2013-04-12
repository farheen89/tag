<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Mauricio
 * Date: 09/04/13
 * Time: 22:48
 * To change this template use File | Settings | File Templates.
 */

class Database_Adapter_Mysql implements Database_Adapter_Interface {

    private static $instance;

    public function getConnection($dbconfig){

        if(!isset(self::$instance)){

        $dsn = $dbconfig['adapter'].":host=".$dbconfig['hostname'].";dbname=".$dbconfig['dbname'];
        try{
            self::$instance = new PDO($dsn,$dbconfig['user'],$dbconfig['password']);
        }
        catch(PDOException $e){
            echo $e->getMessage();

            }
        }
        return self::$instance;
    }
}