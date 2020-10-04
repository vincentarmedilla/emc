<?php
/* Smarty version 3.1.30, created on 2020-06-17 04:26:57
  from "/var/www/html/qa/tpl/json_data.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ee99b912ce9a1_93776460',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '228728b4da58af89ff3e5a54ae4d0d0bda75345a' => 
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
function content_5ee99b912ce9a1_93776460 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if ($_smarty_tpl->tpl_vars['data']->value != '') {
echo $_smarty_tpl->tpl_vars['data']->value;?>

<?php }
if ($_smarty_tpl->tpl_vars['error']->value != '') {
echo $_smarty_tpl->tpl_vars['error']->value;?>

<?php }
}
}
