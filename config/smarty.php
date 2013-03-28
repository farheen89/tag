<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Mauricio
 * Date: 24/03/13
 * Time: 19:08
 * To change this template use File | Settings | File Templates.
 */

require_once 'libs/Smarty.class.php';

$smarty = new Smarty();
$smarty->template_dir = "templates";
$smarty->compile_dir = "templates_c";
$smarty->cache_dir = "cache";
$smarty->config_dir = "configs";