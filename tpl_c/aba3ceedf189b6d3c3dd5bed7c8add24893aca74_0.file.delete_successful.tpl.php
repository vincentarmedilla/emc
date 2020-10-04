<?php
/* Smarty version 3.1.30, created on 2020-09-14 00:38:11
  from "C:\xampp5\htdocs\ulemc\tpl\Ajax\reservation\delete_successful.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f5e9f539cf1e7_48101021',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aba3ceedf189b6d3c3dd5bed7c8add24893aca74' => 
    array (
      0 => 'C:\\xampp5\\htdocs\\ulemc\\tpl\\Ajax\\reservation\\delete_successful.tpl',
      1 => 1590243420,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f5e9f539cf1e7_48101021 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div>
	<div id="reservation-response-image">
		<span class="fa fa-check fa-5x success"></span>
	</div>

	<div id="deleted-message" class="reservation-message"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ReservationRemoved'),$_smarty_tpl);?>
</div>

	<input type="button" id="btnSaveSuccessful" value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Close'),$_smarty_tpl);?>
" class="btn btn-success" />
</div><?php }
}
