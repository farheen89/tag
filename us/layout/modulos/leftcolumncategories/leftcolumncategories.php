<meta http-equiv="content-Type" content="text/html; charset=utf-8" />
<?php
include_once $PATHMODULOS.'leftcolumncategories/lib/ListaCategorias.php';
$categorias = new ListaCategorias();

?>

<link rel="stylesheet" type="text/css" href="http://www.blue-broker.com.br/us/layout/modulos/leftcolumncategories/css/leftcolumncategories.css" media="screen" />
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