<?php
include_once '../core/pathconfig/General.php';
include_once $PATH_US_HEADER.'header.php';
?>

<div id="page">
    <div id="top">
        <?php include_once $PATH_US_APP.'top/top_es.php' ?>
    </div>

    <div id="main">
        <div id="column_1">
            <?php include_once $PATH_US_APP.'leftcolumncategories/leftcolumncategories.php'; ?>
        </div>
        <div id="column_2"></div>
        <div id="column_3">
            <div id="banner">
                <?php include_once $PATH_US_APP.'banner/banner.php' ?>
            </div>
        </div>
    </div>

    <div id="footer">
        <?php include_once $PATH_US_APP.'footer/pie.php' ?>
    </div>
</div>
