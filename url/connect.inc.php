<?php

// connect to database

$dbhost = "localhost"; //replace this value if necessary
$user = "blueb123_user1"; //replace this value if necessary
$pwd = "olg1xgq3"; //replace this value if necessary
$db = "blueb123_tag"; // replace this value if you have changed db name

$connect = mysql_connect($dbhost, $user, $pwd);
mysql_select_db($db, $connect);

?>