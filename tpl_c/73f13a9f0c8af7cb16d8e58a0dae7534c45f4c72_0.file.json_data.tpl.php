<?php
/* Smarty version 3.1.30, created on 2020-09-07 12:10:37
  from "C:\xampp5\htdocs\ulemc\tpl\json_data.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f56071dd9fb64_20270046',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '73f13a9f0c8af7cb16d8e58a0dae7534c45f4c72' => 
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
function content_5f56071dd9fb64_20270046 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if ($_smarty_tpl->tpl_vars['data']->value != '') {
echo $_smarty_tpl->tpl_vars['data']->value;?>

<?php }
if ($_smarty_tpl->tpl_vars['error']->value != '') {
echo $_smarty_tpl->tpl_vars['error']->value;?>

<?php }
}
}
