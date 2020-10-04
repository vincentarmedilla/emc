<?php
/* Smarty version 3.1.30, created on 2020-06-12 09:04:15
  from "C:\xampp2\htdocs\ulemcscheduler\tpl\Calendar\calendar.filter.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ee328ef0dda95_48747867',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '775cad019f38d0c830a54915ad6e57d58b6793ba' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\ulemcscheduler\\tpl\\Calendar\\calendar.filter.tpl',
      1 => 1590243420,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee328ef0dda95_48747867 (Smarty_Internal_Template $_smarty_tpl) {
?>

</style>
<div class="row form-inline">
    <div id="filter">

		<?php if ($_smarty_tpl->tpl_vars['GroupName']->value) {?>
		<span class="groupName"><?php echo $_smarty_tpl->tpl_vars['GroupName']->value;?>
</span>
		<?php } else { ?>
		<div>
            <div class="inline"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['indicator'][0][0]->DisplayIndicator(array('id'=>'loadingIndicator'),$_smarty_tpl);?>
</div>
			<label for="calendarFilter"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"ChangeCalendar"),$_smarty_tpl);?>
</label>
			<select id="calendarFilter">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['filters']->value->GetFilters(), 'filter');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['filter']->value) {
?>
					
					<?php ob_start();
echo $_smarty_tpl->tpl_vars['filter']->value->Name();
$_prefixVariable6=ob_get_clean();
if ($_prefixVariable6 != 'All Reservations') {?>
					<optgroup label="<?php echo $_smarty_tpl->tpl_vars['filter']->value->Name();?>
">
					<option value="s<?php echo $_smarty_tpl->tpl_vars['filter']->value->Id();?>
" class="schedule" <?php if ($_smarty_tpl->tpl_vars['filter']->value->Id() == $_smarty_tpl->tpl_vars['MySchdId']->value) {?>selected="selected"<?php }?>><div style="color:red;"><?php echo $_smarty_tpl->tpl_vars['filter']->value->Name();?>
</div></option>
					<?php }?>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['filter']->value->GetFilters(), 'subfilter');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['subfilter']->value) {
?>
						<option value="r<?php echo $_smarty_tpl->tpl_vars['subfilter']->value->Id();?>
" class="resource" <?php if ($_smarty_tpl->tpl_vars['subfilter']->value->Selected()) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['subfilter']->value->Name();?>
</option>
						
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

					</optgroup>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				<?php }?>
			</select>
			
		</div>
	</div>

	<div id="resourceGroupsContainer">
		<div id="resourceGroups"></div>
	</div>
</div>

<?php echo '<script'; ?>
 type="text/javascript">
	$(function(){
		$('#calendarFilter').select2();
	});

<?php echo '</script'; ?>
><?php }
}
