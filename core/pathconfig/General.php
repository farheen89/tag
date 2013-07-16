<?php

error_reporting(E_ALL);

/*Configuration to global path*/
$ROOTPATH   	         = $_SERVER['DOCUMENT_ROOT']."/";
$ROOT_CORE               = $ROOTPATH."core/";
$PATH_CORE_APP   	     = $ROOT_CORE."app/";
$PATH_CORE_LIB           = $ROOT_CORE."datafactory/";
$PATH_CORE_DB            = $ROOT_CORE."datafactory/database/";

/*Configuration to US Page*/
$ROOT_US                 = $ROOTPATH."us/";
$PATH_US_LAYOUT 	     = $ROOT_US."layout/";
$PATH_US_HEADER 	     = $ROOT_US."layout/header/";
$PATH_US_APP             = $ROOT_US."layout/app/";
$PATH_US_CSS	         = "http://www.blue-broker.com.br/us/layout/css/";

include_once $PATH_CORE_DB.'Config.php';
include_once $PATH_CORE_DB.'Mysql.php';