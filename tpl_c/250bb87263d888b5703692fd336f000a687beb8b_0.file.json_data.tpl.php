<?php
/* Smarty version 3.1.30, created on 2020-10-04 06:04:43
  from "C:\xampp6\htdocs\emcscheduler\tpl\json_data.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f7949db240a14_36108994',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '250bb87263d888b5703692fd336f000a687beb8b' => 
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
function content_5f7949db240a14_36108994 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if ($_smarty_tpl->tpl_vars['data']->value != '') {
echo $_smarty_tpl->tpl_vars['data']->value;?>

<?php }
if ($_smarty_tpl->tpl_vars['error']->value != '') {
echo $_smarty_tpl->tpl_vars['error']->value;?>

<?php }
}
}
