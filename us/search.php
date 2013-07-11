<?php

include_once '../core/config/General.php';
include_once $PATH_APP_US.'searchengine/lib/func.inc.php';
include_once $PATH_APP_US.'searchengine/lib/SearchEngine.php';

if(isset($_POST['searchwords'])){

    $where = null;

    $keywords = htmlentities(trim($_POST['searchwords']));

    $keywords = preg_split('/[\s]+/', $keywords);

    $total_keywords = count($keywords);

    echo $total_keywords.'</br>';

    print_r($keywords);

    echo '</br>';

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