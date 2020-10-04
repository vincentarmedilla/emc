<?php
/* Smarty version 3.1.30, created on 2020-06-15 18:48:46
  from "C:\xampp2\htdocs\ulemcscheduler\tpl\json_data.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ee7a66e49ace9_31430092',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '806797191a4ad9353460d321d139fd9a58b39d1d' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\ulemcscheduler\\tpl\\json_data.tpl',
      1 => 1590243420,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee7a66e49ace9_31430092 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if ($_smarty_tpl->tpl_vars['data']->value != '') {
echo $_smarty_tpl->tpl_vars['data']->value;?>

<?php }
if ($_smarty_tpl->tpl_vars['error']->value != '') {
echo $_smarty_tpl->tpl_vars['error']->value;?>

<?php }
}
}
