<?php
include_once $PATH_APP_CORE.'cms/lib/CmsList.php';


$cms = new CmsList();
$where = "url";
$like = "'termos_de_uso.php'";
$order = "`order`";
$cms->setWhere($where);
$cms->setLike($like);
$cms->setOrder($order);
$cmss = $cms->listWhereLikeOrder();
foreach ($cmss as $cm){
    echo $cm['html'].'</br>';
}
?>