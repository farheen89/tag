<?php

include_once '../core/config/General.php';
include_once $PATH_MODULOS_US.'searchengine/lib/func.inc3.php';
include_once $PATH_MODULOS_US.'searchengine/lib/SearchEngine3.php';

if(isset($_POST['searchwords'])){

    $suffix = "";

    $keywords = htmlentities(trim($_POST['searchwords']));

    $errors = array();

    if(empty($keywords)){
        $errors[] = 'Please enter a search term';
    }else if (strlen($keywords)<2){
        $errors[] = 'Your search term must be two or more characteres';
    }else if(search_results($keywords) === false){
        $errors[] = 'Your search for '.$keywords.' returned no results';
    }

    if(empty($errors)){

        $results = search_results($keywords);
        $results_num = count ($results);

        $suffix = ($results_num != 1) ? 's' : '';

        echo '<p>Your search for <strong>'.$keywords.'</strong> returned <strong>'.$results_num.'</strong> result'.$suffix.'</p>';

        foreach($results as $result){
            echo '<p><strong>'. $result['Title'].'</strong><br>';
        }

    }else{
        foreach($errors as $error){
            echo $error,'</br>';
        }
    }
}

?>