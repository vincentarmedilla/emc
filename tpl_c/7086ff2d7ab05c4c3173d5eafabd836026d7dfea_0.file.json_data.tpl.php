<?php
/* Smarty version 3.1.30, created on 2020-06-17 02:23:39
  from "/var/www/html/qa/tpl/json_data.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ee97eabbbd5d0_05249836',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7086ff2d7ab05c4c3173d5eafabd836026d7dfea' => 
    array (
      0 => '/var/www/html/qa/tpl/json_data.tpl',
      1 => 1590243420,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee97eabbbd5d0_05249836 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if ($_smarty_tpl->tpl_vars['data']->value != '') {
echo $_smarty_tpl->tpl_vars['data']->value;?>

<?php }
if ($_smarty_tpl->tpl_vars['error']->value != '') {
echo $_smarty_tpl->tpl_vars['error']->value;?>

<?php }
}
}
