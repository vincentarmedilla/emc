<?php
/* Smarty version 3.1.30, created on 2020-08-18 10:12:32
  from "C:\xampp2\htdocs\ulemc\tpl\Ajax\reservation\update_successful.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f3b8d7016de59_57301571',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '21f92329a64680ac6391db7e6443464a736ae534' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\ulemc\\tpl\\Ajax\\reservation\\update_successful.tpl',
      1 => 1590243420,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Ajax/reservation/save_successful.tpl' => 1,
  ),
),false)) {
function content_5f3b8d7016de59_57301571 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php $_smarty_tpl->_subTemplateRender("file:Ajax/reservation/save_successful.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('divId'=>"reservation-updated",'messageKey'=>"ReservationUpdated"), 0, false);
}
}
