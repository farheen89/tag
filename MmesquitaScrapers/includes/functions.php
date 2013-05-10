<?php



require("config.inc.php");		//linking include files


//FUNCTION DEFINED
/*
arguments from config.inc.php
Opens the Link to the SQL-Server
if failed to do so then returns nothing
and display error message.
*/
//===================================== 

function openSQLlink()
{ 

	global $config;
	if ($dataLink = mysql_pconnect($config['dbserver'], $config['dbuser'], $config['dbpass'])){ // True - Successful Connection.
		return $dataLink;
	}
	else{
		//errMSG (mysql_errno(), mysql_error(), "Sorry, query you sent cannot be processed at this time. Please try later.", "Faild to open the SQL Server Connection, in function openSQLlink() @ common.script" );
		echo mysql_errno().mysql_error();
		//exit();
	}
		
}//end-openSQLlink()
 

//FUNCTION DEFINED
// executing query send
//====================================

function ors($query, $link){
	$query = stripslashes ($query);
	if ($ResultSet = mysql_query($query, $link)){	//Successfuly executed
		return $ResultSet;
	}
	else{
		echo mysql_errno().mysql_error();
		//exit();
	}
}//end-ors()



//FUNCTION DEFINED
//setting odb connection
//============================

function odb($database, $link){
	if ($selectedDatabase = mysql_select_db($database, $link)){
		return $selectedDatabase;
	}
	else
	{
		echo mysql_errno().mysql_error();
	}
}//end-odb()



//FUNCTION DEFINED
/*
Insert no of <BR> tags in HTML, followed by 'new line (\n)'
Take $n as number of <BR> tags to be write.
*/
//=========================================================

function lineBR($n=1)
{

	while ($n>0){
		echo "\n<BR>";
		$n--;
	}
	echo "\n";
}//end lineBR()



//FUNCTION DEFINED
//write events to log file
//=========================================================

function writelog($log) {

	$filename = '../log.txt';
	
	$date = date("d-m-Y");
	$time = date("g:i a");  
	$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);	//getting ip of commenter
	$ip = gethostbyname($hostname);
	
	$curlog=$date."\t".$time."\t".$ip."\n".$log."\n\n";
	
    $handle = fopen($filename, 'a');
    fwrite($handle, $curlog);
}



//FUNCTION DEFINED
//determine required pages for record show
//=====================================

function pagesReq($totalRec, $recPP)
{
	$pages = (int)($totalRec / $recPP);
	if (($totalRec % $recPP)>0) $pages++;
	return $pages;
}//end-pagesReq()



//FUNCTION DEFINED
//takes password and encrypt it and takes encrypted password and decrypt it
//=====================================

function encrypt($password)
{
	//$length; $encryptedpass;
	//$passarray=array();
	//$length=strlen($password);
	//$passarray=$password;
	//return $encryptedpass;
}//end-pagesReq()

?>