<link rel="stylesheet" type="text/css" href="http://www.blue-broker.com.br/core/modulos/top/css/top.css" media="screen" />

<?php
include_once $PATH_LAYOUT_US.'modulos/searchengine/func.ini.php';
?>

<div id="top_search">
    <div id="search-field">

            <input id="search_form" type="text" name="keywords" value="" onKeyUp="lookup(this.value);" onBlur="fill();" />
            <div id="dropdown">

            </div>
            <button id="button-buscar" type="submit">SEARCH</button>

    </div>
    <div id="basetop">&nbsp;</div
</div>

<?php
if(isset($_POST['keywords'])){
    $keywords = mysql_real_escape_string(htmlentities(trim($_POST['keywords'])));

    $errors = array();

    if(empty($keywords)){
        $errors[] = 'Please enter a search term';
    }elseif (strlen($keywords<2)){
        $errors[] = 'Your search term must be two or more characteres';
    }elseif (search_results($keywords) === false){
        $errors[] = 'Your search for '.$keywords.' returned no results';
    }

    if(empty($errors)){

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
}

?>