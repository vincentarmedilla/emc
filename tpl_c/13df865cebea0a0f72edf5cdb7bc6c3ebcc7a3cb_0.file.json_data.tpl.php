<?php
/* Smarty version 3.1.30, created on 2020-09-14 00:38:27
  from "C:\xampp5\htdocs\ulemc\tpl\json_data.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f5e9f639aa7b9_32437599',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '13df865cebea0a0f72edf5cdb7bc6c3ebcc7a3cb' => 
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
function content_5f5e9f639aa7b9_32437599 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if ($_smarty_tpl->tpl_vars['data']->value != '') {
echo $_smarty_tpl->tpl_vars['data']->value;?>

<?php }
if ($_smarty_tpl->tpl_vars['error']->value != '') {
echo $_smarty_tpl->tpl_vars['error']->value;?>

<?php }
}
}
