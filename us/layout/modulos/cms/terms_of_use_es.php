<?php
include_once $PATH_MODULOS_CORE.'cms/lib/CmsList.php';


$cms = new CmsList();
$where = "url";
$like = "'terms_of_use_es.php'";
$order = "`order`";
$cms->setWhere($where);
$cms->setLike($like);
$cms->setOrder($order);
$cmss = $cms->listWhereLikeOrder();
foreach ($cmss as $cm){
    echo $cm['html'].'</br>';
}
?>