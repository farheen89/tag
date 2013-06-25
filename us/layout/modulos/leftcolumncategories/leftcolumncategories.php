<link rel="stylesheet" type="text/css" href="http://www.blue-broker.com.br/core/modulos/leftcolumncategories/css/leftcolumncategories.css" media="screen" />

<?php
include_once $PATH_MODULOS_CORE.'leftcolumncategories/lib/CategoriesList.php';
$categorias = new CategoriesList();
?>

<div id="categories_box">
    <div id="categories_title">
        <?php
        foreach ($categorias->listAll() as $cat){
            echo $cat['desc'];
        }
        ?>
    </div>
    <div id="categories_line">
        <?
        $categorias = new CategoriesList();
        $where = "";
        $like = "";
        $order = "";
        $categorias->setWhere($where);
        $categorias->setLike($like);
        $categorias->setOrder($order);
        $categoriass = $categorias->listWhereOrder();
        foreach ($categoriass as $cat){
        echo $cat['desc'];
        }
        ?>
    </div>

</div>