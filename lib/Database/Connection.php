<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Mauricio
 * Date: 10/04/13
 * Time: 23:04
 * To change this template use File | Settings | File Templates.
 */


class Database_Connection{

    public static function factory($dbconfig){
        switch ($dbconfig['adapter']){

        case "mysql":
            return Database_Adapter_Mysql::getConnection($dbconfig);
     }
    }

}