<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="Rewrite Example" />
<meta name="keywords" content="php and .htaccess rewrite example, rewrite map, php rewrite, permalinks, smart urls, slugging system." />
<meta name="author" content="Gruppo Modulo | Siti Web Piacenza, Genova, Milano" />
<title>Gruppo Modulo Rewrite Sample | View News List</title>
  </head>
<body>
<h1>Gruppo Modulo php .htaccess rewrite Sample</h1>
<h3>Example Archive</h3>
<ul>
<?php 
include("connect.inc.php"); 
include("functions.php"); 

$sql = mysql_query("SELECT id, title FROM news ORDER BY id");
while ( $row = mysql_fetch_assoc($sql) ) 
    {
    ?>
    <li><a href="<?php generate_permalinks($row['id']); ?>"><?php echo $row['title']; ?></a></li>
    <?php
    }
?>
</ul>
<p><strong>Permalinks format</strong>: <a href="options.php">change permalinks options</a></p>
</body>
</html>