<?php
/* Smarty version 3.1.30, created on 2020-09-30 16:34:56
  from "C:\xampp6\htdocs\emcscheduler\tpl\json_data.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f749790266d17_49784526',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '19eb9b3990656856edf55b047ff26a8a6fb73a27' => 
    array (
      0 => 'C:\\xampp6\\htdocs\\emcscheduler\\tpl\\json_data.tpl',
      1 => 1590243420,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f749790266d17_49784526 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if ($_smarty_tpl->tpl_vars['data']->value != '') {
echo $_smarty_tpl->tpl_vars['data']->value;?>

<?php }
if ($_smarty_tpl->tpl_vars['error']->value != '') {
echo $_smarty_tpl->tpl_vars['error']->value;?>

<?php }
}
}
