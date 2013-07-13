<?php

include_once '../core/config/General.php';
include_once $PATH_APP_US.'searchengine/lib/new_func.inc.php';
include_once $PATH_APP_US.'searchengine/lib/SearchEngine.php';

if(isset($_POST['searchwords'])){

    $where = null;

    $keywords = htmlentities(trim($_POST['searchwords']));

    $errors = array();


    if(empty($keywords)){
        $errors[] = 'Please enter a search term.';
    }elseif(strlen($keywords)<3){
        $errors[] = 'Your search term must be three or more characters.';
    }else if (search_results($keywords) === false){
        $errors[] = 'Your search for ' . $keywords . ' returned no results.';
    }

    if(empty($errors)){

        $results = search_results($keywords);
        $countresults = count($results);

        $suffix = ($countresults != 1) ? 's' : '';

        echo 'Your search for <strong>' . $keywords . '</strong> returned <strong>' . $countresults . '</strong> result'. $suffix . '.</br></br>';

        foreach($results as $result){
            echo $result['title'].'</br>';
        }


    }else{
        foreach($errors as $error){
            echo $error.'<br>';
        }
    }

}
?>