<?php
/* Smarty version 3.1.30, created on 2020-09-28 06:47:15
  from "C:\xampp6\htdocs\emcscheduler\tpl\Admin\manage_audit_trail.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f716ad3845631_56648140',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'caef216d076a36d094824bcd5ace328c10578225' => 
    array (
      0 => 'C:\\xampp6\\htdocs\\emcscheduler\\tpl\\Admin\\manage_audit_trail.tpl',
      1 => 1601233150,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:globalheader.tpl' => 1,
    'file:javascript-includes.tpl' => 1,
    'file:globalfooter.tpl' => 1,
  ),
),false)) {
function content_5f716ad3845631_56648140 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_regex_replace')) require_once 'C:\\xampp6\\htdocs\\emcscheduler\\lib\\external\\Smarty\\plugins\\modifier.regex_replace.php';
?>

<?php $_smarty_tpl->_subTemplateRender("file:globalheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('Select2'=>true), 0, false);
?>


<div id="page-manage-announcements" class="admin-page">
	<h1>Audit Trail</h1>

	
	<table class="table" id="announcementList">
		<thead>
		<tr>
			<th>Time Edited</th>
			<th>User</th>
			<th>Field</th>
			<th>Old Data</th>
			<th>New Data</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['auditTrail']->value, 'i', false, 'myId', 'foo', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['myId']->value => $_smarty_tpl->tpl_vars['i']->value) {
?>
			
			<tr class="<?php echo $_smarty_tpl->tpl_vars['rowCss']->value;?>
" data-announcement-id="<?php echo $_smarty_tpl->tpl_vars['i']->value['announcementid'];?>
">
				<td class="announcementText"><?php echo $_smarty_tpl->tpl_vars['i']->value['date_time'];?>
</td>
				<td class="announcementPriority"><?php echo $_smarty_tpl->tpl_vars['i']->value['fname'];?>
 <?php echo $_smarty_tpl->tpl_vars['i']->value['lname'];?>
</td>
				<td class="announcementPriority"><?php echo $_smarty_tpl->tpl_vars['i']->value['type'];?>
</td>
				<td class="announcementStart"><?php echo $_smarty_tpl->tpl_vars['i']->value['old_data'];?>
</td>
				<td class="announcementEnd"><?php echo $_smarty_tpl->tpl_vars['i']->value['new_data'];?>
</td>
				<td class="announcementEnd"><?php echo $_smarty_tpl->tpl_vars['i']->value['action'];?>
</td>
			</tr>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		</tbody>
	</table>

	<input type="hidden" id="activeId"/>

	<div class="modal fade" id="deleteDialog" tabindex="-1" role="dialog" aria-labelledby="deleteDialogLabel" aria-hidden="true">
		<div class="modal-dialog">
			<form id="deleteForm" method="post">
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

	<div class="modal fade" id="editDialog" tabindex="-1" role="dialog" aria-labelledby="editDialogLabel" aria-hidden="true">
		<div class="modal-dialog">
			<form id="editForm" method="post">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="editDialogLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Edit'),$_smarty_tpl);?>
</h4>
					</div>
					<div class="modal-body">
						<div class="form-group has-feedback">
							<label for="editText"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Announcement'),$_smarty_tpl);?>
</label><br/>
							<textarea id="editText" class="form-control required" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'ANNOUNCEMENT_TEXT'),$_smarty_tpl);?>
></textarea>
							<i class="glyphicon glyphicon-asterisk form-control-feedback" data-bv-icon-for="editText"></i>
						</div>
						<div class="form-group">
							<label for="editBegin"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'BeginDate'),$_smarty_tpl);?>
</label><br/>
							<input type="text" id="editBegin" class="form-control"/>
							<input type="hidden" id="formattedEditBegin" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'ANNOUNCEMENT_START'),$_smarty_tpl);?>
 />
						</div>
						<div class="form-group">
							<label for="editEnd"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'EndDate'),$_smarty_tpl);?>
</label><br/>
							<input type="text" id="editEnd" class="form-control"/>
							<input type="hidden" id="formattedEditEnd" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'ANNOUNCEMENT_END'),$_smarty_tpl);?>
 />
						</div>
						<div class="form-group">
							<label for="editPriority"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Priority'),$_smarty_tpl);?>
</label> <br/>
							<input type="number" min="0" step="1" id="editPriority" class="form-control" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'ANNOUNCEMENT_PRIORITY'),$_smarty_tpl);?>
 />
						</div>
						<div class="form-group" style="display: none;">
							<label for="editUserGroups" class="no-show"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'UsersInGroups'),$_smarty_tpl);?>
</label>
							<select id="editUserGroups" class="form-control" multiple="multiple" style="width:100%" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>FormKeys::GROUP_ID,'multi'=>true),$_smarty_tpl);?>
>
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Groups']->value, 'group');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['group']->value) {
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['group']->value->Id;?>
"><?php echo $_smarty_tpl->tpl_vars['group']->value->Name;?>
</option>
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

							</select>
						</div>
						<div class="form-group" style="display: none;">
							<label for="editResourceGroups" class="no-show"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'UsersWithAccessToResources'),$_smarty_tpl);?>
</label>
							<select id="editResourceGroups" class="form-control" multiple="multiple" style="width:100%" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'RESOURCE_ID','multi'=>true),$_smarty_tpl);?>
>
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Resources']->value, 'resource');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['resource']->value) {
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetId();?>
"><?php echo $_smarty_tpl->tpl_vars['resource']->value->GetName();?>
</option>
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

							</select>
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

	<div class="modal fade" id="emailDialog" tabindex="-1" role="dialog" aria-labelledby="emailDialogLabel" aria-hidden="true">
		<div class="modal-dialog">
			<form id="emailForm" method="post">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="emailDialogLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'SendAsEmail'),$_smarty_tpl);?>
</h4>
					</div>
					<div class="modal-body">
						<div class="alert alert-info"><span id="emailCount" class="bold"></span> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AnnouncementEmailNotice'),$_smarty_tpl);?>
</div>
					</div>
					<div class="modal-footer">
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['cancel_button'][0][0]->CancelButton(array(),$_smarty_tpl);?>

						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['update_button'][0][0]->UpdateButton(array('key'=>'SendAsEmail'),$_smarty_tpl);?>

						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['indicator'][0][0]->DisplayIndicator(array(),$_smarty_tpl);?>

					</div>
				</div>
			</form>
		</div>
	</div>

    <?php $_smarty_tpl->_subTemplateRender("file:javascript-includes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('Select2'=>true), 0, false);
?>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->DisplayControl(array('type'=>"DatePickerSetupControl",'ControlId'=>"BeginDate",'AltId'=>"formattedBeginDate"),$_smarty_tpl);?>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->DisplayControl(array('type'=>"DatePickerSetupControl",'ControlId'=>"EndDate",'AltId'=>"formattedEndDate"),$_smarty_tpl);?>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->DisplayControl(array('type'=>"DatePickerSetupControl",'ControlId'=>"editBegin",'AltId'=>"formattedEditBegin"),$_smarty_tpl);?>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->DisplayControl(array('type'=>"DatePickerSetupControl",'ControlId'=>"editEnd",'AltId'=>"formattedEditEnd"),$_smarty_tpl);?>


	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['csrf_token'][0][0]->CSRFToken(array(),$_smarty_tpl);?>


	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"ajax-helpers.js"),$_smarty_tpl);?>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"admin/announcement.js"),$_smarty_tpl);?>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"js/jquery.form-3.09.min.js"),$_smarty_tpl);?>


	<?php echo '<script'; ?>
 type="text/javascript">
		$(document).ready(function () {

			var actions = {
				add: '<?php echo ManageAnnouncementsActions::Add;?>
',
				edit: '<?php echo ManageAnnouncementsActions::Change;?>
',
				deleteAnnouncement: '<?php echo ManageAnnouncementsActions::Delete;?>
',
				email: '<?php echo ManageAnnouncementsActions::Email;?>
'
			};

			var accessoryOptions = {
				submitUrl: '<?php echo $_SERVER['SCRIPT_NAME'];?>
',
				saveRedirect: '<?php echo $_SERVER['SCRIPT_NAME'];?>
',
				getEmailCountUrl: '<?php echo $_SERVER['SCRIPT_NAME'];?>
?dr=emailCount',
				actions: actions
			};

			var announcementManagement = new AnnouncementManagement(accessoryOptions);
			announcementManagement.init();

			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['announcements']->value, 'announcement');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['announcement']->value) {
?>
			announcementManagement.addAnnouncement(
					'<?php echo $_smarty_tpl->tpl_vars['announcement']->value->Id();?>
',
					'<?php echo smarty_modifier_regex_replace(preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['announcement']->value->Text()),"/[\n]/","\\n");?>
',
					'<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['announcement']->value->Start()->ToTimezone($_smarty_tpl->tpl_vars['timezone']->value)),$_smarty_tpl);?>
',
					'<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['announcement']->value->End()->ToTimezone($_smarty_tpl->tpl_vars['timezone']->value)),$_smarty_tpl);?>
',
					'<?php echo $_smarty_tpl->tpl_vars['announcement']->value->Priority();?>
',
					[<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['announcement']->value->GroupIds(), 'id');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['id']->value) {
echo $_smarty_tpl->tpl_vars['id']->value;?>
,<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
],
					[<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['announcement']->value->ResourceIds(), 'id');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['id']->value) {
echo $_smarty_tpl->tpl_vars['id']->value;?>
,<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
],
                    <?php echo $_smarty_tpl->tpl_vars['announcement']->value->DisplayPage();?>

			);
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


			$('#add-announcement-panel').showHidePanel();

			$('#announcementGroups, #editUserGroups').select2({
				placeholder: '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'UsersInGroups'),$_smarty_tpl);?>
'
			});

			$('#resourceGroups, #editResourceGroups').select2({
				placeholder: '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'UsersWithAccessToResources'),$_smarty_tpl);?>
'
			});
		});
	<?php echo '</script'; ?>
>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:globalfooter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
