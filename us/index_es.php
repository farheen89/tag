<?php
include_once '../core/config/General.php';
include_once $PATH_LAYOUT_US.'header.php';
?>

<div id="page">
    <div id="top">
        <?php include_once $PATH_APP_US.'top/top_es.php' ?>
    </div>

    <div id="main">
        <div id="column_1">
            <?php include_once $PATH_APP_US.'leftcolumncategories/leftcolumncategories.php'; ?>
        </div>
        <div id="column_2"></div>
        <div id="column_3">
            <div id="banner">
                <?php include_once $PATH_APP_US.'banner/banner.php' ?>
            </div>
        </div>
    </div>

    <div id="footer">
        <?php include_once $PATH_APP_US.'footer/pie.php' ?>
    </div>
</div>
