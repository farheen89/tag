<?php

include_once $PATH_MODULOS_US.'searchengine/lib/SearchEngine.php';
//$results = new SearchEngine();

function search_results($keywords){
    $returned_results = array();
    $where = "";

    $keywords = preg_split('/[\s]+/', $keywords);

    $total_keywords = count($keywords);

    foreach($keywords as $key=>$keyword){
        $where .= "`keywords` LIKE '%$keyword%'";
        if($key != ($total_keywords - 1)){
            $where .= " AND ";
        }
    }

        //$results = "SELECT `title`, LEFT(`description`, 70) as `description`, `url` FROM `articles` WHERE $where";
        $results_num = ($results = mysql_query($results)) ? mysql_num_rows($results) : 0 ;

        if($results_num === 0){
            return false;
        }else{
            while ($results_row = mysql_fetch_assoc($results)){
                $returned_results[] = array(
                    'title' => $results_row['title'],
                    'description' => $results_row['description'],
                    'url' => $results_row['url']
                );
            }

            return $returned_results;
        }
}