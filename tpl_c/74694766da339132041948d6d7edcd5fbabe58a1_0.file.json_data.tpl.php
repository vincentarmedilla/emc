<?php
/* Smarty version 3.1.30, created on 2020-06-15 08:43:29
  from "C:\xampp2\htdocs\ulemcscheduler\tpl\json_data.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ee71891aa92c9_32917748',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '74694766da339132041948d6d7edcd5fbabe58a1' => 
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
function content_5ee71891aa92c9_32917748 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if ($_smarty_tpl->tpl_vars['data']->value != '') {
echo $_smarty_tpl->tpl_vars['data']->value;?>

<?php }
if ($_smarty_tpl->tpl_vars['error']->value != '') {
echo $_smarty_tpl->tpl_vars['error']->value;?>

<?php }
}
}
