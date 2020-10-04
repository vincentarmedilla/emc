<?php
/* Smarty version 3.1.30, created on 2020-09-17 09:41:22
  from "C:\xampp6\htdocs\ulemc\tpl\json_data.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f6313227384c4_63895781',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '25179871760d54e74a5d374efd47bcf49ebfc991' => 
    array (
      0 => 'C:\\xampp6\\htdocs\\ulemc\\tpl\\json_data.tpl',
      1 => 1590243420,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f6313227384c4_63895781 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if ($_smarty_tpl->tpl_vars['data']->value != '') {
echo $_smarty_tpl->tpl_vars['data']->value;?>

<?php }
if ($_smarty_tpl->tpl_vars['error']->value != '') {
echo $_smarty_tpl->tpl_vars['error']->value;?>

<?php }
}
}
