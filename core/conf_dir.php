<?php

include_once 'pathconfig/General.php';

echo "<font size=\"7\"><strong>Path Configurations<br><br></strong></font>";

echo "<font size=\"5\"><strong>core Path<br><br></strong></font>";

echo "<font size=\"4\"><strong>Diretorio Raiz /: </strong></font>".$ROOTPATH."<br><br>";

echo "<font size=\"4\"><strong>Diretorio da pasta \"/core/\": </strong></font>".$ROOT_CORE."<br><br>";

echo "<font size=\"4\"><strong>Diretorio da pasta \"/core/modules/\": </strong></font>".$PATH_CORE_APP."<br><br>";

echo "<font size=\"4\"><strong>Diretorio da pasta \"/core/datafactory/\": </strong></font>".$PATH_CORE_LIB."<br><br>";

echo "<font size=\"4\"><strong>Diretorio da pasta \"/core/datafactory/database/\": </strong></font>".$PATH_CORE_DB."<br><br>";

echo "<font size=\"5\"><strong>US Path<br><br></strong></font>";

echo "<font size=\"4\"><strong>Diretorio da pasta \"/us/\": </strong></font>".$ROOT_US."<br><br>";

echo "<font size=\"4\"><strong>Diretorio da pasta \"/us/layout/\": </strong></font>".$PATH_US_LAYOUT."<br><br>";

echo "<font size=\"4\"><strong>Diretorio da pasta \"/us/layout/css/\": </strong></font>".$PATH_US_CSS."<br><br>";

