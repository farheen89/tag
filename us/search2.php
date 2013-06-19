<?php

include_once '../core/config/General.php';
include_once $PATH_MODULOS_US.'searchengine/lib/func.inc2.php';
include_once $PATH_MODULOS_US.'searchengine/lib/SearchEngine2.php';

if(isset($_POST['searchwords'])){

    $where = "";

    $keywords = htmlentities(trim($_POST['searchwords']));

    //$keywords = preg_split('/[\s]+/', $keywords);

    $total_keywords = count($keywords);

    //$where = "%".$keywords."%";

    $keywords = "%$keywords%";
    echo '</br>'.$total_keywords.'</br>';
    echo $keywords;

        $result = new SearchEngine2();
        $result->setId($keywords);
        print_r($result->searchengine());

}


/* Depois tentar isso

<?php
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    // aqui eu mostro os valores de minha consulta
    echo "Nome: {$linha['nome']} - Usuário: {$linha['usuario']}<br />";
}
?>
*/

?>