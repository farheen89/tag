<?php

error_reporting(E_ALL);

set_include_path("lib/" . PATH_SEPARATOR . "config/" . PATH_SEPARATOR . "lib/db" .PATH_SEPARATOR . get_include_path());

$ROOTPATH   	 = $_SERVER['DOCUMENT_ROOT']."/";
$ROOTWEB         = $ROOTPATH."tag/";
$PATHCONFIG    	 = $ROOTWEB."config/";
$PATHLAYOUT 	 = $ROOTWEB."layout/";
$PATHMODULOS 	 = $ROOTWEB."layout/modulos/";
$PATHCSS 	     = "http://www.cupomsocialclube.com.br/desenvolvimento2/layout/css/";
$PATHDB 	     = $ROOTWEB."lib/db/";
$PATHLIB         = $ROOTLIB."lib/";

include_once $PATHDB.'Config.php';
include_once $PATHDB.'Mysql.php';