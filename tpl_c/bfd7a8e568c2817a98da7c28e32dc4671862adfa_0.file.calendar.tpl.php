<?php
/* Smarty version 3.1.30, created on 2020-08-12 09:23:46
  from "C:\xampp2\htdocs\ulemc\tpl\Calendar\calendar.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f339902af23b8_13228703',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bfd7a8e568c2817a98da7c28e32dc4671862adfa' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\ulemc\\tpl\\Calendar\\calendar.tpl',
      1 => 1592983647,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Calendar/calendar-page-base.tpl' => 1,
  ),
),false)) {
function content_5f339902af23b8_13228703 (Smarty_Internal_Template $_smarty_tpl) {
?>


<?php if ($_smarty_tpl->tpl_vars['pageUrl']->value == null) {
ob_start();
echo Pages::CALENDAR;
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_assignInScope('pageUrl', $_prefixVariable1);
}
$_smarty_tpl->_assignInScope('pageIdSuffix', "calendar");
$_smarty_tpl->_assignInScope('subscriptionTpl', "calendar.subscription.tpl");
$_smarty_tpl->_subTemplateRender("file:Calendar/calendar-page-base.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
