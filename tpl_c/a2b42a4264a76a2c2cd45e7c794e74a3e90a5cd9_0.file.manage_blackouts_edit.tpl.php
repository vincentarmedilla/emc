<?php
/* Smarty version 3.1.30, created on 2020-07-22 08:11:52
  from "C:\xampp2\htdocs\ulemc\tpl\Admin\Blackouts\manage_blackouts_edit.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f17d8a8e2f991_63177776',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a2b42a4264a76a2c2cd45e7c794e74a3e90a5cd9' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\ulemc\\tpl\\Admin\\Blackouts\\manage_blackouts_edit.tpl',
      1 => 1590243420,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f17d8a8e2f991_63177776 (Smarty_Internal_Template $_smarty_tpl) {
?>


<form id="editBlackoutForm" class="form-inline" role="form" method="post">
	<div id="updateBlackout">
		<div class="form-group col-xs-6">
			<label for="updateStartDate"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'BeginDate'),$_smarty_tpl);?>
</label>
			<input type="text" id="updateStartDate" class="form-control dateinput inline-block "
				   value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['BlackoutStartDate']->value),$_smarty_tpl);?>
"/>
			<input <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'BEGIN_DATE'),$_smarty_tpl);?>
 id="formattedUpdateStartDate" type="hidden"
											 value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['BlackoutStartDate']->value,'key'=>'system'),$_smarty_tpl);?>
"/>
			<input <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'BEGIN_TIME'),$_smarty_tpl);?>
 type="text" id="updateStartTime"
											 class="form-control dateinput inline-block timepicker"
											 value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['BlackoutStartDate']->value,'format'=>'h:i A'),$_smarty_tpl);?>
"/>
		</div>

		<div class="form-group col-xs-6">
			<label for="updateEndDate"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'EndDate'),$_smarty_tpl);?>
</label>
			<input type="text" id="updateEndDate" class="form-control dateinput inline-block " size="10"
				   value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['BlackoutEndDate']->value),$_smarty_tpl);?>
"/>
			<input <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'END_DATE'),$_smarty_tpl);?>
 type="hidden" id="formattedUpdateEndDate"
										   value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['BlackoutEndDate']->value,'key'=>'system'),$_smarty_tpl);?>
"/>
			<input <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'END_TIME'),$_smarty_tpl);?>
 type="text" id="updateEndTime"
										   class="form-control dateinput inline-block timepicker"
										   value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['BlackoutEndDate']->value,'format'=>'h:i A'),$_smarty_tpl);?>
"/>
		</div>

		<div class="form-group col-xs-12 blackouts-edit-resources">
			<label><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Resources'),$_smarty_tpl);?>
</label>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Resources']->value, 'resource');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['resource']->value) {
?>
				<?php $_smarty_tpl->_assignInScope('checked', '');
?>
				<?php if (in_array($_smarty_tpl->tpl_vars['resource']->value->GetId(),$_smarty_tpl->tpl_vars['BlackoutResourceIds']->value)) {?>
					<?php $_smarty_tpl->_assignInScope('checked', "checked='checked'");
?>
				<?php }?>
				<label class="resourceItem">
					<div class="checkbox">
						<input <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'RESOURCE_ID','multi'=>true),$_smarty_tpl);?>
 type="checkbox"
																	  value="<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetId();?>
" <?php echo $_smarty_tpl->tpl_vars['checked']->value;?>

																	  id="r<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetId();?>
"/>
						<label for="r<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetId();?>
"><?php echo $_smarty_tpl->tpl_vars['resource']->value->GetName();?>
</label>
					</div>
				</label>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		</div>

		<div class="col-xs-12">
			<div class="form-group has-feedback">
				<label for="blackoutReason"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Reason'),$_smarty_tpl);?>
</label>
				<input <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'SUMMARY'),$_smarty_tpl);?>
 type="text" id="blackoutReason" required
											  class="form-control required" value="<?php echo $_smarty_tpl->tpl_vars['BlackoutTitle']->value;?>
"/>
				<i class="glyphicon glyphicon-asterisk form-control-feedback" data-bv-icon-for="blackoutReason"></i>
			</div>
		</div>

		<div>
			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->DisplayControl(array('type'=>"RecurrenceControl",'RepeatTerminationDate'=>$_smarty_tpl->tpl_vars['RepeatTerminationDate']->value,'prefix'=>'edit'),$_smarty_tpl);?>

		</div>

		<div class="form-group col-xs-12">
            <div class="radio">
                <input <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'CONFLICT_ACTION'),$_smarty_tpl);?>
 type="radio" id="bookAroundUpdate"
                                                      name="existingReservations"
                                                      checked="checked"
                                                      value="<?php echo ReservationConflictResolution::BookAround;?>
"/>
                <label for="notifyExisting"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'BlackoutAroundConflicts'),$_smarty_tpl);?>
</label>
            </div>
            <div class="radio">
                <input <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'CONFLICT_ACTION'),$_smarty_tpl);?>
 type="radio" id="notifyExistingUpdate"
                                                      name="existingReservations"
                                                      value="<?php echo ReservationConflictResolution::Notify;?>
"/>
                <label for="notifyExisting"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'BlackoutShowMe'),$_smarty_tpl);?>
</label>
            </div>
            <div class="radio">
                <input <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'CONFLICT_ACTION'),$_smarty_tpl);?>
 type="radio" id="deleteExistingUpdate"
                                                      name="existingReservations"
                                                      value="<?php echo ReservationConflictResolution::Delete;?>
"/>
                <label for="deleteExisting"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'BlackoutDeleteConflicts'),$_smarty_tpl);?>
</label>
            </div>
		</div>

		<div id="update-blackout-buttons" class="col-xs-12 margin-bottom-25">
			<div class="pull-right">
				<button type="button" class="btn btn-default" id="cancelUpdate">
					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Cancel'),$_smarty_tpl);?>

				</button>
				<?php if ($_smarty_tpl->tpl_vars['IsRecurring']->value) {?>
					<button type="button" class="btn btn-success save btnUpdateThisInstance">
						<span class="glyphicon glyphicon-ok-circle"></span>
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ThisInstance'),$_smarty_tpl);?>

					</button>
					<button type="button" class="btn btn-success save btnUpdateAllInstances">
						<span class="glyphicon glyphicon-ok-circle"></span>
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AllInstances'),$_smarty_tpl);?>

					</button>
				<?php } else { ?>
					<button type="button" class="btn btn-success save update btnUpdateAllInstances">
						<span class="glyphicon glyphicon-ok-circle"></span>
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Update'),$_smarty_tpl);?>

					</button>
				<?php }?>

			</div>
		</div>

		<input type="hidden" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'BLACKOUT_INSTANCE_ID'),$_smarty_tpl);?>
 value="<?php echo $_smarty_tpl->tpl_vars['BlackoutId']->value;?>
"/>
		<input type="hidden" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'SERIES_UPDATE_SCOPE'),$_smarty_tpl);?>
 class="hdnSeriesUpdateScope"
			   value="<?php echo SeriesUpdateScope::FullSeries;?>
"/>
	</div>
	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['csrf_token'][0][0]->CSRFToken(array(),$_smarty_tpl);?>

</form>

<?php echo '<script'; ?>
 type="text/javascript">
	$(function ()
	{
		var recurOpts = {
			repeatType: '<?php echo $_smarty_tpl->tpl_vars['RepeatType']->value;?>
',
			repeatInterval: '<?php echo $_smarty_tpl->tpl_vars['RepeatInterval']->value;?>
',
			repeatMonthlyType: '<?php echo $_smarty_tpl->tpl_vars['RepeatMonthlyType']->value;?>
',
			repeatWeekdays: [<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['RepeatWeekdays']->value, 'day');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['day']->value) {
echo $_smarty_tpl->tpl_vars['day']->value;?>
, <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
]
		};

		var recurrence = new Recurrence(recurOpts, {}, 'edit');
		recurrence.init();
	});
<?php echo '</script'; ?>
>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->DisplayControl(array('type'=>"DatePickerSetupControl",'ControlId'=>"updateStartDate",'AltId'=>"formattedUpdateStartDate"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->DisplayControl(array('type'=>"DatePickerSetupControl",'ControlId'=>"updateEndDate",'AltId'=>"formattedUpdateEndDate"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->DisplayControl(array('type'=>"DatePickerSetupControl",'ControlId'=>"editEndRepeat",'AltId'=>"editformattedEndRepeat"),$_smarty_tpl);
}
}
