<?php
/* Smarty version 3.1.30, created on 2020-08-20 12:41:54
  from "C:\xampp2\htdocs\ulemc\tpl\json_data.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f3e5372d29514_03049377',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fe7632a1bd119e8cd14f091126e159fa06683330' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\ulemc\\tpl\\json_data.tpl',
      1 => 1590243420,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f3e5372d29514_03049377 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if ($_smarty_tpl->tpl_vars['data']->value != '') {
echo $_smarty_tpl->tpl_vars['data']->value;?>

<?php }
if ($_smarty_tpl->tpl_vars['error']->value != '') {
echo $_smarty_tpl->tpl_vars['error']->value;?>

<?php }
}
}
