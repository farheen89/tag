<?php

error_reporting(E_ALL);

set_include_path("lib/" . PATH_SEPARATOR . "config/" . PATH_SEPARATOR . "lib/db" .PATH_SEPARATOR . get_include_path());

$ROOTPATH   	 = $_SERVER['DOCUMENT_ROOT']."/";
$ROOTWEB         = $ROOTPATH."us/";
$PATHCONFIG    	 = $ROOTWEB."config/";
$PATHLAYOUT 	 = $ROOTWEB."layout/";
$PATHMODULOS 	 = $ROOTWEB."layout/modulos/";
$PATHIMG         = $ROOTWEB."layout/img/";
$PATHCSS 	     = "http://www.blue-broker.com.br/us/layout/css/";
$PATHLIB         = $ROOTWEB."lib/";
$PATHDB 	     = $ROOTWEB."lib/db/";
$PATHJS          = $ROOTWEB."lib/js/";



include_once $PATHDB.'Config.php';
include_once $PATHDB.'Mysql.php';