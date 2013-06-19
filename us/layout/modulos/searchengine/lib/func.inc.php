<?php

include_once $PATH_MODULOS_US.'searchengine/lib/SearchEngine.php';

function search_results($keywords){
    $returned_results = array();

    $results_num = "";

    $where = "";

    $keywords = preg_split('/[\s]+/', $keywords);

    $total_keywords = count($keywords);

    foreach($keywords as $key=>$keyword){
        $where .= "`Brand` LIKE '%$keyword%'";
        if($key != ($total_keywords - 1)){
            $where .= " AND ";
        }
    }

        $results = "SELECT `Title` FROM `tbl_products` WHERE $where";
        $results_num = ($results = mysql_query($results)) ? mysql_num_rows($results) : 0 ;

        if($results_num === 0){
            return false;
        }else{

            while ($results_row = mysql_fetch_assoc($results)){
                $returned_results[] = array(
                    'Title' => $results_row['Title']
                );
            }
            return $returned_results;

        }
}