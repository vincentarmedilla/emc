<?php
/* Smarty version 3.1.30, created on 2020-06-15 08:54:16
  from "C:\xampp2\htdocs\ulemcscheduler\tpl\Ajax\reservation\update_successful.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ee71b18e15885_21839466',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eceba7bba6b007fa8b66240af16864f5cb9487f5' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\ulemcscheduler\\tpl\\Ajax\\reservation\\update_successful.tpl',
      1 => 1590243420,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Ajax/reservation/save_successful.tpl' => 1,
  ),
),false)) {
function content_5ee71b18e15885_21839466 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php $_smarty_tpl->_subTemplateRender("file:Ajax/reservation/save_successful.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('divId'=>"reservation-updated",'messageKey'=>"ReservationUpdated"), 0, false);
}
}
