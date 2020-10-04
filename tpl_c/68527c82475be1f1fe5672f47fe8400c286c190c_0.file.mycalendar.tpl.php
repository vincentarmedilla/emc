<?php
/* Smarty version 3.1.30, created on 2020-09-21 10:13:24
  from "C:\xampp6\htdocs\emcscheduler\tpl\Calendar\mycalendar.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f6860a4d60c37_95691041',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '68527c82475be1f1fe5672f47fe8400c286c190c' => 
    array (
      0 => 'C:\\xampp6\\htdocs\\emcscheduler\\tpl\\Calendar\\mycalendar.tpl',
      1 => 1590243420,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Calendar/calendar-page-base.tpl' => 1,
  ),
),false)) {
function content_5f6860a4d60c37_95691041 (Smarty_Internal_Template $_smarty_tpl) {
?>


<?php ob_start();
echo Pages::MY_CALENDAR;
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_assignInScope('pageUrl', $_prefixVariable1);
$_smarty_tpl->_assignInScope('pageIdSuffix', "my-calendar");
$_smarty_tpl->_assignInScope('subscriptionTpl', "mycalendar.subscription.tpl");
$_smarty_tpl->_subTemplateRender("file:Calendar/calendar-page-base.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
