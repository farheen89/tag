<?php

include_once 'Config.php';
include_once 'Connection.php';

class Mysql {

    private static $instance;

    public static function getConnection($config){
        if(!isset(self::$instance)){

            $dsn = $config['adapter'] . ":host=" . $config['hostname'] . ";dbname=" . $config['dbname'];

             try{
                self::$instance =  new PDO($dsn, $config['user'], $config['pass']);
             }catch (PDOException $e){
                echo "Erro: " . $e->getMessage();
             }
        }
        return self::$instance;
    }
}
