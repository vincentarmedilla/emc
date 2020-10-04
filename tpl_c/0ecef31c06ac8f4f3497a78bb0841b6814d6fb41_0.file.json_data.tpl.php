<?php
/* Smarty version 3.1.30, created on 2020-08-19 08:09:15
  from "C:\xampp2\htdocs\ulemc\tpl\json_data.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f3cc20ba1acc0_58906702',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0ecef31c06ac8f4f3497a78bb0841b6814d6fb41' => 
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
function content_5f3cc20ba1acc0_58906702 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if ($_smarty_tpl->tpl_vars['data']->value != '') {
echo $_smarty_tpl->tpl_vars['data']->value;?>

<?php }
if ($_smarty_tpl->tpl_vars['error']->value != '') {
echo $_smarty_tpl->tpl_vars['error']->value;?>

<?php }
}
}
