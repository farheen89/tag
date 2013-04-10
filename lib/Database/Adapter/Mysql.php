<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Mauricio
 * Date: 09/04/13
 * Time: 22:48
 * To change this template use File | Settings | File Templates.
 */

require_once ('../../../config/db.php');

class Database_Adapter_Mysql {

    public function getConnection(){

        $dsn = $config['adapter'].":host=".$config['hostname'].";dbname=".$config['dbname'];
        try{
            $pdo = new PDO($dsn,$config['user'],$config['password']);
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}