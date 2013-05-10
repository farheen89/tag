<?php include_once $PATHLIB.'LeftColumnCategories.php';?>

<?php

$categories = new LeftColumnCategories();
$categories->getId(1);
print_r($categories->find());

?>

<link rel="stylesheet" type="text/css" href="http://www.blue-broker.com.br/us/layout/modulos/leftcolumncategories/css/leftcolumncategories.css" media="screen" />
<div id="categories_box">
    <div id="categories_title">
        Main Categories
    </div>
    <div id="categories_line">
        &nbsp;
    </div>

</div>