<link rel="stylesheet" type="text/css" href="http://www.blue-broker.com.br/core/modulos/leftcolumncategories/css/leftcolumncategories.css" media="screen" />

<?php
include_once $PATH_MODULOS_CORE.'leftcolumncategories/lib/CategoriesList.php';
?>

<div id="categories_box">
    <div id="categories_title">
        <?php
        $categorias = new CategoriesList();
        $where = "type";
        $like = "'title'";
        $order = "`order`";
        $categorias->setWhere($where);
        $categorias->setLike($like);
        $categorias->setOrder($order);
        $categoriass = $categorias->listWhereLikeOrder();
        foreach ($categoriass as $cat){
            echo $cat['category'].'</br>';
        }
        ?>
    </div>
    <div id="categories_line">
        <?
        $categorias = new CategoriesList();
        $where = "type";
        $like = "'Category'";
        $order = "`order`";
        $categorias->setWhere($where);
        $categorias->setLike($like);
        $categorias->setOrder($order);
        $categoriass = $categorias->listWhereLikeOrder();
        foreach ($categoriass as $cat){
        echo $cat['category'].'</br><HR>';
        }
        ?>
    </div>

</div>