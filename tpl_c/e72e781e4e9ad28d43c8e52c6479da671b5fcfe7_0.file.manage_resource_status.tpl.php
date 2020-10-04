<?php
/* Smarty version 3.1.30, created on 2020-06-26 12:24:59
  from "C:\xampp2\htdocs\ulemc\tpl\Admin\Resources\manage_resource_status.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ef5ccfba882d0_69132121',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e72e781e4e9ad28d43c8e52c6479da671b5fcfe7' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\ulemc\\tpl\\Admin\\Resources\\manage_resource_status.tpl',
      1 => 1593052325,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:globalheader.tpl' => 1,
    'file:Admin/Resources/manage_resource_menu.tpl' => 1,
    'file:javascript-includes.tpl' => 1,
    'file:globalfooter.tpl' => 1,
  ),
),false)) {
function content_5ef5ccfba882d0_69132121 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'displayReason' => 
  array (
    'compiled_filepath' => 'C:\\xampp2\\htdocs\\ulemc\\tpl_c\\e72e781e4e9ad28d43c8e52c6479da671b5fcfe7_0.file.manage_resource_status.tpl.php',
    'uid' => 'e72e781e4e9ad28d43c8e52c6479da671b5fcfe7',
    'call_name' => 'smarty_template_function_displayReason_21391878215ef5ccfba25388_26830611',
  ),
));
if (!is_callable('smarty_function_cycle')) require_once 'C:\\xampp2\\htdocs\\ulemc\\lib\\external\\Smarty\\plugins\\function.cycle.php';
?>

<?php $_smarty_tpl->_subTemplateRender("file:globalheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div id="page-manage-resource-status" class="admin-page">

	

	<?php $_smarty_tpl->_subTemplateRender("file:Admin/Resources/manage_resource_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ResourcePageTitleKey'=>'ManageResourceStatus'), 0, false);
?>


	<div id="globalError" class="error" style="display:none"></div>

	<div class="panel panel-default resource-status-list" id="resource-status-list-available">
		<div class="panel-heading"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"Available"),$_smarty_tpl);?>

			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['showhide_icon'][0][0]->ShowHideIcon(array(),$_smarty_tpl);?>

			<a href="#" add-to="<?php echo ResourceStatus::AVAILABLE;?>
" class="add-link pull-right"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"Add"),$_smarty_tpl);?>

				<span class="fa fa-plus-circle icon add"></span>
			</a>
		</div>
		<div class="panel-body add-contents">
			<?php ob_start();
echo ResourceStatus::AVAILABLE;
$_prefixVariable1=ob_get_clean();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['StatusReasons']->value[$_prefixVariable1], 'reason');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['reason']->value) {
?>
				<?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'displayReason', array('reason'=>$_smarty_tpl->tpl_vars['reason']->value), true);?>

			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		</div>
	</div>

	<!--<div class="panel panel-default resource-status-list" id="resource-status-list-unavailable">
		<div class="panel-heading"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"Unavailable"),$_smarty_tpl);?>

			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['showhide_icon'][0][0]->ShowHideIcon(array(),$_smarty_tpl);?>

			<a href="#" add-to="<?php echo ResourceStatus::UNAVAILABLE;?>
" class="add-link pull-right"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"Add"),$_smarty_tpl);?>

				<span class="fa fa-plus-circle icon add"></span>
			</a>
		</div>
		<div class="panel-body add-contents">
			<?php ob_start();
echo ResourceStatus::UNAVAILABLE;
$_prefixVariable2=ob_get_clean();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['StatusReasons']->value[$_prefixVariable2], 'reason');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['reason']->value) {
?>
				<?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'displayReason', array('reason'=>$_smarty_tpl->tpl_vars['reason']->value), true);?>

			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		</div>
	</div>-->

	<div class="panel panel-default resource-status-list" id="resource-status-list-hidden">
		<div class="panel-heading"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"Hidden"),$_smarty_tpl);?>

			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['showhide_icon'][0][0]->ShowHideIcon(array(),$_smarty_tpl);?>

			<a href="#" add-to="<?php echo ResourceStatus::HIDDEN;?>
" class="add-link pull-right"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"Add"),$_smarty_tpl);?>

				<span class="fa fa-plus-circle icon add"></span>
			</a>
		</div>
		<div class="panel-body add-contents">
			<?php ob_start();
echo ResourceStatus::HIDDEN;
$_prefixVariable3=ob_get_clean();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['StatusReasons']->value[$_prefixVariable3], 'reason');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['reason']->value) {
?>
				<?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'displayReason', array('reason'=>$_smarty_tpl->tpl_vars['reason']->value), true);?>

			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		</div>
	</div>

	<input type="hidden" id="activeId" value=""/>

	<div class="modal fade" id="addDialog" tabindex="-1" role="dialog" aria-labelledby="addDialogLabel"
		 aria-hidden="true">
		<div class="modal-dialog">
			<form id="addForm" method="post" ajaxAction="<?php echo ManageResourceStatusActions::Add;?>
">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="addDialogLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Add'),$_smarty_tpl);?>
</h4>
					</div>
					<div class="modal-body">
						<div class="form-group has-feedback">
							<label for="add-reason-description"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Name'),$_smarty_tpl);?>
</label><br/>
							<input type="text" class="form-control required" required
								   id="add-reason-description" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'RESOURCE_STATUS_REASON'),$_smarty_tpl);?>
 />
							<input type="hidden" id="add-reason-status" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'RESOURCE_STATUS_ID'),$_smarty_tpl);?>
 />
							<i class="glyphicon glyphicon-asterisk form-control-feedback"
							   data-bv-icon-for="add-reason-description"></i>
						</div>
					</div>
					<div class="modal-footer">
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['cancel_button'][0][0]->CancelButton(array(),$_smarty_tpl);?>

						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['add_button'][0][0]->AddButton(array(),$_smarty_tpl);?>

						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['indicator'][0][0]->DisplayIndicator(array(),$_smarty_tpl);?>

					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="modal fade" id="editDialog" tabindex="-1" role="dialog" aria-labelledby="editDialogLabel"
		 aria-hidden="true">
		<div class="modal-dialog">
			<form id="editForm" method="post" ajaxAction="<?php echo ManageResourceStatusActions::Update;?>
">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="editDialogLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Edit'),$_smarty_tpl);?>
</h4>
					</div>
					<div class="modal-body">
						<div class="form-group has-feedback">
							<label for="edit-reason-description"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Name'),$_smarty_tpl);?>
</label><br/>
							<input type="text" class="form-control required" required
								   id="edit-reason-description" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'RESOURCE_STATUS_REASON'),$_smarty_tpl);?>
 />
							<input type="hidden" id="add-reason-status" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'RESOURCE_STATUS_ID'),$_smarty_tpl);?>
 />
							<i class="glyphicon glyphicon-asterisk form-control-feedback"
							   data-bv-icon-for="edit-reason-description"></i>
						</div>
					</div>
					<div class="modal-footer">
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['cancel_button'][0][0]->CancelButton(array(),$_smarty_tpl);?>

						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['update_button'][0][0]->UpdateButton(array(),$_smarty_tpl);?>

						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['indicator'][0][0]->DisplayIndicator(array(),$_smarty_tpl);?>

					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="modal fade" id="deleteDialog" tabindex="-1" role="dialog" aria-labelledby="deleteDialogLabel"
		 aria-hidden="true">
		<div class="modal-dialog">
			<form id="deleteForm" method="post" ajaxAction="<?php echo ManageResourceStatusActions::Delete;?>
">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="deleteDialogLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Delete'),$_smarty_tpl);?>
</h4>
					</div>
					<div class="modal-body">
						<div class="alert alert-warning">
							<div><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'DeleteWarning'),$_smarty_tpl);?>
</div>
						</div>
					</div>
					<div class="modal-footer">
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['cancel_button'][0][0]->CancelButton(array(),$_smarty_tpl);?>

						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['delete_button'][0][0]->DeleteButton(array(),$_smarty_tpl);?>

						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['indicator'][0][0]->DisplayIndicator(array(),$_smarty_tpl);?>

					</div>
				</div>
			</form>
		</div>
	</div>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['csrf_token'][0][0]->CSRFToken(array(),$_smarty_tpl);?>

    <?php $_smarty_tpl->_subTemplateRender("file:javascript-includes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"ajax-helpers.js"),$_smarty_tpl);?>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"admin/resource-status.js"),$_smarty_tpl);?>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"js/jquery.form-3.09.min.js"),$_smarty_tpl);?>


	<?php echo '<script'; ?>
 type="text/javascript">

		$(document).ready(function () {
			var opts = {
				submitUrl: '<?php echo $_SERVER['SCRIPT_NAME'];?>
',
				saveRedirect: '<?php echo $_SERVER['SCRIPT_NAME'];?>
'
			};

			var resourceStatus = new ResourceStatusManagement(opts);
			resourceStatus.init();

			$('#resource-status-list-available').showHidePanel();
			$('#resource-status-list-unavailable').showHidePanel();
			$('#resource-status-list-hidden').showHidePanel();
		})

	<?php echo '</script'; ?>
>

</div>

<?php $_smarty_tpl->_subTemplateRender("file:globalfooter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
/* smarty_template_function_displayReason_21391878215ef5ccfba25388_26830611 */
if (!function_exists('smarty_template_function_displayReason_21391878215ef5ccfba25388_26830611')) {
function smarty_template_function_displayReason_21391878215ef5ccfba25388_26830611($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
		<?php smarty_function_cycle(array('values'=>'row0,row1','assign'=>'rowCss'),$_smarty_tpl);?>

		<div class="<?php echo $_smarty_tpl->tpl_vars['rowCss']->value;?>
 reason-item" reasonId="<?php echo $_smarty_tpl->tpl_vars['reason']->value->Id();?>
">
			<span class="reason-description"><?php echo $_smarty_tpl->tpl_vars['reason']->value->Description();?>
</span>

			<div class="pull-right">
				<a href="#" class="update edit"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Edit'),$_smarty_tpl);?>
</a> |
				<a href="#" class="update delete"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Delete'),$_smarty_tpl);?>
</a>
			</div>
		</div>
	<?php
}}
/*/ smarty_template_function_displayReason_21391878215ef5ccfba25388_26830611 */
}
