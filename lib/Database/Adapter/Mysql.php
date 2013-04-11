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

    public function getConnection($config){

        if(!isset(self::$instance)){

        $dsn = $config['adapter'].":host=".$config['hostname'].";dbname=".$config['dbname'];
        try{
            self::$instance = new PDO($dsn,$config['user'],$config['password']);
        }
        catch(PDOException $e){
            echo $e->getMessage();

            }
        }
        return self::$instance;
    }
}