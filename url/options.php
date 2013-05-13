<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="Rewrite Example" />
<meta name="keywords" content="php and .htaccess rewrite example, rewrite map, php rewrite, permalinks, smart urls, slugging system." />
<meta name="author" content="Gruppo Modulo | Siti Web Piacenza, Genova, Milano" />
<title>Gruppo Modulo Rewrite Sample | Enable Permalinks</title>
  </head>
<body>
<h1>Gruppo Modulo Rewrite Sample</h1>
<?php 
//require_once("menu.inc.php");
include("connect.inc.php"); 
$action = !empty($_REQUEST['action']) ? $_REQUEST['action'] : '';

if ( $action == "change" )
{
	   $permalinks = !empty($_REQUEST['permalinks']) ? addslashes($_REQUEST['permalinks']) : '';
        
        $sql = mysql_query("update options set 
            op_value = '$permalinks' where op_id = '1'"); 
	     ?>   
	     <div><p><strong>SUCCESS</strong>: <strong>Permalinks</strong> modified succesfully.</p></div> 
	     <?php
}
?>

<h3>Permalinks Status</h3>
<form method="post">
<input type="hidden" name="action" value="change" />
<label>Enable Permalinks?</label>
<select name="permalinks">
    <?php 
    $sql = mysql_query("SELECT op_id, op_value FROM options");
    $row = mysql_fetch_object($sql);
    if ( $row->op_value == "yes" ) 
    {
        ?><option value="yes">Yes</option>
            <option value="no">No</option>
        <?php
    }
    else
    {
        ?><option value="no">No</option>
            <option value="yes">Yes</option>
        <?php
    }
?>
</select>
 <p>
        <input type="submit" name="save" value="Save &raquo;" /></p>
			
</form>
<p>Back to <a href="index.php">Index</a></p>
</body>
</html>