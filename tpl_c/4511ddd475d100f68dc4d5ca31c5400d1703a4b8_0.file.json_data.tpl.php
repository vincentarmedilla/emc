<?php
/* Smarty version 3.1.30, created on 2020-09-07 12:10:09
  from "C:\xampp5\htdocs\ulemc\tpl\json_data.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f56070127d3f1_87188448',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4511ddd475d100f68dc4d5ca31c5400d1703a4b8' => 
    array (
      0 => 'C:\\xampp5\\htdocs\\ulemc\\tpl\\json_data.tpl',
      1 => 1590243420,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f56070127d3f1_87188448 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if ($_smarty_tpl->tpl_vars['data']->value != '') {
echo $_smarty_tpl->tpl_vars['data']->value;?>

<?php }
if ($_smarty_tpl->tpl_vars['error']->value != '') {
echo $_smarty_tpl->tpl_vars['error']->value;?>

<?php }
}
}
