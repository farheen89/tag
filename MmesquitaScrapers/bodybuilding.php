<?
/* ================= MAIN CODE Starts here =================*/

/* ================= MAIN FUNCTION CALLS =================*/
set_time_limit(0);
//error_reporting(0);
//ini_set('output_buffering','on');

require("includes/curl.inc.php");
require("includes/bodybuilding.inc.php");
require("includes/config.inc.php"); 				//linking include files
require("includes/functions.php"); 

$sqlLink = openSQLlink();							//Opening Link to MySQL
$refDB = odb($config['dbname'], $sqlLink);

/* ================= MAIN FUNCTION CALLS =================*/



	$log="";
	$log.='<font color="#006600" size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>======================================================</b><br>';
	$log.='<b>Date: '.date("Y-m-d H:i:s").'</b><br>';
	$log.='Grabbing Listings from <b>http://www.bodybuilding.com/</b><br>';
	$log.='<b>======================================================</b><br><br>';
	echo $log;
	$log="";
	echo str_repeat(" ", 500);
    ob_flush();
    flush();
	
	$ccount = 0;
	
	$res=grab_records();

	
	
	echo '<br><b>======================================================</b><br>';
	if($res==0)
	{
	echo '<font color=red><b>Error: 0</b> listings found from the website.</font>';
	}
	else
	{
	echo '<b>Success: '.$res.'</b> listings found from the website, please see summary above.';
	}
	echo '<br><b>======================================================</b><br><br></font>';
	echo str_repeat(" ", 500);
    ob_flush();
    flush();

@mysql_close($sqlLink);
?>