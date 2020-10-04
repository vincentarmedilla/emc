<?php
/* Smarty version 3.1.30, created on 2020-09-17 09:40:32
  from "C:\xampp6\htdocs\ulemc\tpl\Ajax\reservation\update_successful.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f6312f0568cd2_87530978',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'db7a59f3d9ae476aa9406068bbe0bfee05485710' => 
    array (
      0 => 'C:\\xampp6\\htdocs\\ulemc\\tpl\\Ajax\\reservation\\update_successful.tpl',
      1 => 1590243420,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Ajax/reservation/save_successful.tpl' => 1,
  ),
),false)) {
function content_5f6312f0568cd2_87530978 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php $_smarty_tpl->_subTemplateRender("file:Ajax/reservation/save_successful.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('divId'=>"reservation-updated",'messageKey'=>"ReservationUpdated"), 0, false);
}
}
