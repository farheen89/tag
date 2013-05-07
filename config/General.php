<?php

error_reporting(E_ALL);

set_include_path("lib/" . PATH_SEPARATOR . "config/" . PATH_SEPARATOR . "lib/db" .PATH_SEPARATOR . get_include_path());

$PATHCSS 	     = "http://www.cupomsocialclube.com.br/desenvolvimento2/layout/css/";
$ROOTPATH   	 = $_SERVER['DOCUMENT_ROOT']."/";
$ROOTWEB         = $ROOTPATH."tag/";
$PATHCONFIG    	 = $ROOTWEB."config/";
$PATHLAYOUT 	 = $ROOTWEB."layout/";
$PATHMODULOS 	 = $ROOTWEB."layout/modulos/";
$PATHIMG         = $ROOTWEB."layout/img/";
$PATHLIB         = $ROOTWEB."lib/";
$PATHDB 	     = $ROOTWEB."lib/db/";
$PATHJS          = $ROOTWEB."lib/js/";


include_once $PATHDB.'Config.php';
include_once $PATHDB.'Mysql.php';