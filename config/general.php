<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Mauricio
 * Date: 24/03/13
 * Time: 20:47
 * To change this template use File | Settings | File Templates.
 */

error_reporting(E_ALL);
set_include_path("lib/" . PATH_SEPARATOR. "config/" . PATH_SEPARATOR . get_include_path());
session_start();

require_once 'loader.php';
require_once 'db.php';
require_once 'smarty.php';