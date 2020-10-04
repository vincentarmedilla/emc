<?php
/* Smarty version 3.1.30, created on 2020-06-17 02:21:13
  from "/var/www/html/qa/tpl/Ajax/reservation/update_successful.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ee97e1980f798_22206715',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f8925f35c97b0e04904b7042ab82a1faba1c22d7' => 
    array (
      0 => '/var/www/html/qa/tpl/Ajax/reservation/update_successful.tpl',
      1 => 1590243420,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Ajax/reservation/save_successful.tpl' => 1,
  ),
),false)) {
function content_5ee97e1980f798_22206715 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php $_smarty_tpl->_subTemplateRender("file:Ajax/reservation/save_successful.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('divId'=>"reservation-updated",'messageKey'=>"ReservationUpdated"), 0, false);
}
}
