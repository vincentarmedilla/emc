<?php
/* Smarty version 3.1.30, created on 2020-06-17 06:27:13
  from "/var/www/html/qa/tpl/json_data.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ee9b7c14cbb23_01551966',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3df352df1f6b52038c70e98a5c32978175784bac' => 
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
function content_5ee9b7c14cbb23_01551966 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if ($_smarty_tpl->tpl_vars['data']->value != '') {
echo $_smarty_tpl->tpl_vars['data']->value;?>

<?php }
if ($_smarty_tpl->tpl_vars['error']->value != '') {
echo $_smarty_tpl->tpl_vars['error']->value;?>

<?php }
}
}
