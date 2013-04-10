<?php /* Smarty version Smarty-3.1.13, created on 2013-04-05 04:51:28
         compiled from "templates\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1349051538b10f01316-66259379%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20a5b87bf1d249a8e4b5bdf6dc560aa9c65c681a' => 
    array (
      0 => 'templates\\header.tpl',
      1 => 1365130262,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1349051538b10f01316-66259379',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51538b10f03150_77215586',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51538b10f03150_77215586')) {function content_51538b10f03150_77215586($_smarty_tpl) {?><link href="style/general.css" rel="stylesheet" type="text/css">

<div id="top">
    <div id="search-field">
    <form>
        <input id="search_form" type="text" value="" id="inputString" onKeyUp="lookup(this.value);" onBlur="fill();" />
        <button id="button-buscar" type="submit">BUSCAR</button>
    </form>
    </div>
</div>
<?php }} ?>