<?php

include("connect.inc.php"); 

global $permalinks;

$permalinks = "";

// check if permalinks are on or off
$check = mysql_query("SELECT op_value from options WHERE op_id = '1'"); // change op_id if necessary
$checkRow = mysql_fetch_assoc($check); 
$permalinks = $checkRow['op_value'];



// generate the rewritten url in internal links 

function generate_permalinks($id) {
    global $permalinks;


if ( $permalinks == yes ) // rewrite the url finding the slug from the id
    {
        $query = mysql_query("SELECT slug from news WHERE id = '$id'");
        $row = mysql_fetch_object($query);
        $url = $row->slug; 
        echo $url;
    }
else
    {
        $url = "single.php?id=$id"; //simply keeps the "natural" url
        echo $url;
    }

}




// get the article

function get_article($var) {
    global $permalinks;
    
if ( $permalinks == yes && empty($_REQUEST['id']) ) // second clause lets single.php?id=x work wheter permalinks are on or off
    {
        $checkSlug = explode("/", $_SERVER["REQUEST_URI"]); // analyze rewritten url
        $checkDir = count($checkSlug); // count elements 
        $n = $checkDir - 1; // find last element
        $findSlug = $checkSlug[$n]; // isolate the last part of the url
        $slug = str_replace("single.php?slug=", "", $findSlug); // isolate the slug
        $sql = mysql_query("SELECT title, article FROM news WHERE slug = '$slug'"); // now it's pretty easy to understand
        $row = mysql_fetch_object($sql); 
    } 
       
else if ( !empty($_REQUEST['id']) ) {
        $sql = mysql_query("SELECT title, article FROM news WHERE id = $var");
        $row = mysql_fetch_object($sql);      
    }
    ?>
        <h3><?php echo $row->title; ?></h3>
        <p><?php echo $row->article; ?></p>
    <?php
}    
?>