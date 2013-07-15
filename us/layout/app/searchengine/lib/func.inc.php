<?php

include_once $PATH_APP_US.'searchengine/lib/SearchEngine.php';

function search_results($keywords){

    $returned_results = null;
    $where = 'Brand';
    $like = null;
    $suffix = null;

    $keywords = preg_split('/[\s,;]+/', $keywords);

    foreach($keywords as $keyword){
        $like = "%".$keyword."%";
        $result = new SearchEngine();
        $result->setId($where);
        $result->setId($like);
        $results = $result->searchengine();
        $countresults = count($results);
    }

    if($countresults === 0){
        return false;
    }else{

    foreach($results as $key=>$finalresult){
        $returned_results[] = array('title' => $finalresult['Title']);
    }

        return $returned_results;

    }

}