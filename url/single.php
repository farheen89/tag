<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="Rewrite Example" />
<meta name="keywords" content="php and .htaccess rewrite example, rewrite map, php rewrite, permalinks, smart urls, slugging system." />
<meta name="author" content="Gruppo Modulo | Siti Web Piacenza, Genova, Milano" />
<title>Gruppo Modulo Rewrite Sample | View Single Article</title>
  </head>
<body>
<h1>Gruppo Modulo Rewrite Sample</h1>
<?php 
include("connect.inc.php"); 
include("functions.php"); 

get_article($_REQUEST['id']);

?>

<p><a href="index.php">Back to articles list</a></p>
</body>
</html>