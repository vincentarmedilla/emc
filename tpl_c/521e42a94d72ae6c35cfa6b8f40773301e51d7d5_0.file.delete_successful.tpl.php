<?php
/* Smarty version 3.1.30, created on 2020-08-20 10:59:42
  from "C:\xampp2\htdocs\ulemc\tpl\Ajax\reservation\delete_successful.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f3e3b7e9ae4b5_90493289',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '521e42a94d72ae6c35cfa6b8f40773301e51d7d5' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\ulemc\\tpl\\Ajax\\reservation\\delete_successful.tpl',
      1 => 1590243420,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f3e3b7e9ae4b5_90493289 (Smarty_Internal_Template $_smarty_tpl) {
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
