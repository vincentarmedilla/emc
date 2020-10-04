<?php
/* Smarty version 3.1.30, created on 2020-09-17 11:53:36
  from "C:\xampp6\htdocs\emcscheduler\tpl\Ajax\reservation\reservation_error.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f6332206e3bf0_92394397',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'beaf00b3eecd7d5672b7631b3dd21f5ad573c4ff' => 
    array (
      0 => 'C:\\xampp6\\htdocs\\emcscheduler\\tpl\\Ajax\\reservation\\reservation_error.tpl',
      1 => 1590243420,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f6332206e3bf0_92394397 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div>
	<div id="reservation-response-image">
		<span class="fa fa-warning fa-5x error"></span>
	</div>

	<div id="failed-message" class="reservation-message"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ReservationCriticalError'),$_smarty_tpl);?>
</div>

	<button id="btnSaveFailed" class="btn btn-warning"><span class="fa fa-arrow-circle-left"></span> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ReservationErrors'),$_smarty_tpl);?>
</button>
</div><?php }
}
