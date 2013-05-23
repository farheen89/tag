<?php

include_once '../core/config/General.php';
include_once $PATH_MODULOS_US.'searchengine/lib/func.inc.php';

$searchwords = $_POST['searchwords'];

    $keywords = htmlentities(trim($searchwords));

    if(empty($keywords)){
        echo 'Please enter a search term';
    }elseif (strlen($keywords)<2){
        echo 'Your search term must be two or more characteres';
    }else{
        echo $keywords;
    }

/*}elseif (search_results($keywords) === false){
        $errors[] = 'Your search for '.$keywords.' returned no results';*/

        /*

            $results = search_results($keywords);
            $results_num = count($results);

            $suffix = ($results_num !=1) ? 's' : '';

            echo '<p>Your search for <strong>', $keywords, '</strong> returned <strong>', $results_num, '</strong> result', $suffix, '</p>';

            foreach($results as $result){
                echo '<p><strong>', $result['title'], '</strong><br> ', $result['description'], ' <br><a href="', $result['url'] ,'" target="_balnk">', $result['url'], '</a></p>';
            }

        }else{
            foreach($errors as $error){
                echo $error, '</br>';
            }
        }
    }*/
?>