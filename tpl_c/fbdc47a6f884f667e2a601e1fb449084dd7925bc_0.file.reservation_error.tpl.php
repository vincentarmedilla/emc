<?php
/* Smarty version 3.1.30, created on 2020-09-10 08:21:42
  from "C:\xampp5\htdocs\ulemc\tpl\Ajax\reservation\reservation_error.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f59c5f6cbd923_22102113',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fbdc47a6f884f667e2a601e1fb449084dd7925bc' => 
    array (
      0 => 'C:\\xampp5\\htdocs\\ulemc\\tpl\\Ajax\\reservation\\reservation_error.tpl',
      1 => 1590243420,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f59c5f6cbd923_22102113 (Smarty_Internal_Template $_smarty_tpl) {
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
