<?php

include_once '../core/config/General.php';
include_once $PATH_MODULOS_US.'searchengine/lib/func.inc2.php';
include_once $PATH_MODULOS_US.'searchengine/lib/SearchEngine2.php';

if(isset($_POST['searchwords'])){

    $where = null;

    $keywords = htmlentities(trim($_POST['searchwords']));

    $keywords = preg_split('/[\s]+/', $keywords);

    $total_keywords = count($keywords);

    //$where = "%".$keywords."%";

    echo $total_keywords.'</br>';
    //echo $where.'</br>';
    print_r($keywords);

    echo '</br>';

    //    $result = new SearchEngine2();
    //    $result->setId($where);
    //    print_r($result->searchengine());

    // echo '</br>';

    $resultsarray = array();

    foreach($keywords as $keyword){
        $where = "%".$keyword."%";
        $result = new SearchEngine2();
        $result->setId($where);
        $results = $result->searchengine();
        $resultsarray[]=$results;

   }

    $resultsarray = array_unique($resultsarray);
    print_r($resultsarray);
    echo '</br>';
}


?>