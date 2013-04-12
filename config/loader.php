<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Mauricio
 * Date: 24/03/13
 * Time: 20:51
 * To change this template use File | Settings | File Templates.
 */

function __autoload($class_name){
    $class_name = str_replace("_",DIRECTORY_SEPARATOR,$class_name).".php";
    require_once $class_name;
}