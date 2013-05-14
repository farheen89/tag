<?php

error_reporting(E_ALL);

/*Configuration to global path*/
$ROOTPATH   	         = $_SERVER['DOCUMENT_ROOT']."/";
$ROOT_GLOBAL             = $ROOTPATH."global/";
$PATH_MODULOS_GLOBAL 	 = $ROOT_GLOBAL."modulos/";
$PATH_LIB_GLOBAL         = $ROOT_GLOBAL."lib/";
$PATH_DB_GLOBAL          = $ROOT_GLOBAL."lib/db/";
$PATH_JS_GLOBAL          = $ROOT_GLOBAL."lib/js/";

/*Configuration to US Page*/
$ROOT_US                 = $ROOTPATH."us/";
$PATH_LAYOUT_US 	     = $ROOT_US."layout/";
$PATH_CSS_US	         = "http://www.blue-broker.com.br/us/layout/css/";




include_once $PATH_DB_GLOBAL.'Config.php';
include_once $PATH_DB_GLOBAL.'Mysql.php';