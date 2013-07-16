<link rel="stylesheet" type="text/css" href="http://www.blue-broker.com.br/core/app/leftcolumncategories/css/leftcolumncategories.css" media="screen" />

<?php
include_once $PATH_CORE_APP.'leftcolumncategories/lib/CategoriesList.php';
$categorias = new CategoriesList();

?>

<div id="categories_box">
    <div id="categories_title">
        <?php
        foreach ($categorias->listar() as $cat){
            echo $cat['title'];
        }
        ?>
    </div>
    <div id="categories_line">
        &nbsp;
    </div>

</div>