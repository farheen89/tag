<?php

include_once $PATH_MODULOS_US.'searchengine/lib/SearchEngine3.php';

function search_results($keywords){
    //$returned_results = array();

    $results_num = "";

    //$where = "";

    //$keywords = preg_split('/[\s]+/', $keywords);
    /*
    $total_keywords = count($keywords);


    foreach($keywords as $key=>$keyword){
        $where .= "`Brand` LIKE '%$keyword%'";
        if($key != ($total_keywords - 1)){
            $where .= " AND ";
        }
    }

    //$results = "SELECT `Title` FROM `tbl_products` WHERE $where";

    */

    $where = $keywords;

    $result = new SearchEngine3();
    $result->setId($where);
    $result->searchengine();

    $results_num = count($result);

    if($results_num === 0){
        $result->searchengine();

    }else{

        $result->searchengine();

    }
}