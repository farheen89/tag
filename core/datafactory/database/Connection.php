<?php

include_once 'Mysql.php';

class Connection {

    public static function factory($config){
        switch($config['adapter']){
            case "mysql" :
                return Mysql::getConnection($config);
                break;
        }
    }

}