<?php

error_reporting(E_ALL);

/*Configuration to global path*/
$ROOTPATH   	         = $_SERVER['DOCUMENT_ROOT']."/";
$ROOT_CORE               = $ROOTPATH."core/";
$PATH_MODULOS_CORE   	 = $ROOT_CORE."modules/";
$PATH_LIB_CORE           = $ROOT_CORE."lib/";
$PATH_DB_CORE            = $ROOT_CORE."lib/db/";
$PATH_JS_CORE            = $ROOT_CORE."lib/js/";

/*Configuration to US Page*/
$ROOT_US                 = $ROOTPATH."us/";
$PATH_LAYOUT_US 	     = $ROOT_US."layout/";
$PATH_MODULOS_US         = $ROOT_US."layout/modules/";
$PATH_CSS_US	         = "http://www.blue-broker.com.br/us/layout/css/";

/*Configuration to BR Page*/
/*
$ROOT_BR                 = $ROOTPATH."us/";
$PATH_LAYOUT_BR 	     = $ROOT_BR."layout/";
$PATH_MODULOS_BR         = $ROOT_BR."layout/modules/";
$PATH_CSS_BR	         = "http://www.blue-broker.com.br/us/layout/css/";
*/

include_once $PATH_DB_CORE.'Config.php';
include_once $PATH_DB_CORE.'Mysql.php';