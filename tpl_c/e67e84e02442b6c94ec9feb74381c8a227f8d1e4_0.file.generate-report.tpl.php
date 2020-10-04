<?php
/* Smarty version 3.1.30, created on 2020-09-13 15:42:35
  from "C:\xampp5\htdocs\ulemc\tpl\Reports\generate-report.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f5e21cb5f53b2_33459542',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e67e84e02442b6c94ec9feb74381c8a227f8d1e4' => 
    array (
      0 => 'C:\\xampp5\\htdocs\\ulemc\\tpl\\Reports\\generate-report.tpl',
      1 => 1599181815,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:globalheader.tpl' => 1,
    'file:Reports/chart.tpl' => 1,
    'file:javascript-includes.tpl' => 1,
    'file:globalfooter.tpl' => 1,
  ),
),false)) {
function content_5f5e21cb5f53b2_33459542 (Smarty_Internal_Template $_smarty_tpl) {
?>


<?php $_smarty_tpl->_subTemplateRender("file:globalheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('cssFiles'=>"scripts/js/jqplot/jquery.jqplot.min.css",'Select2'=>true), 0, false);
?>

<?php echo '<script'; ?>
>
	$(document).ready(function(){
		$("#user-filter").change(function() {
			var $value = $(this).val();
			$('#user_id').val($value);
		});

		$("#participant-filter").change(function() {
			var $value = $(this).val();
			$('#participant_id').val($value);
		});
	});
<?php echo '</script'; ?>
>
<div id="page-generate-report">
	<div id="customReportInput-container">
		<form role="form" id="customReportInput">
			<div class="panel panel-default" id="report-filter-panel">
				<div class="panel-heading">
					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'GenerateReport'),$_smarty_tpl);?>
 <a href="#"><span class="no-show">Collapse</span><span class="icon black show-hide glyphicon"></span></a>
				</div>
				<div class="panel-body no-padding">
					<div id="custom-report-input">
						<div class="row input-set" id="selectDiv">
							<div class="col-md-1"><span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Select'),$_smarty_tpl);?>
</span></div>
							<div class="col-md-11 radio">
								<div class="col-md-1">
									<input type="radio" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'REPORT_RESULTS'),$_smarty_tpl);?>

										   value="<?php echo Report_ResultSelection::FULL_LIST;?>
"
										   id="results_list" checked="checked"/>
									<label for="results_list"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'List'),$_smarty_tpl);?>
</label>
								</div>
								<div class="col-md-1">
									<input type="radio" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'REPORT_RESULTS'),$_smarty_tpl);?>

										   value="<?php echo Report_ResultSelection::TIME;?>
"
										   id="results_time"/>
									<label for="results_time"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'TotalTime'),$_smarty_tpl);?>
</label>
								</div>
								<div class="col-md-1">
									<input type="radio" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'REPORT_RESULTS'),$_smarty_tpl);?>

										   value="<?php echo Report_ResultSelection::COUNT;?>
"
										   id="results_count"/>
									<label for="results_count"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Count'),$_smarty_tpl);?>
</label>
								</div>
                                <div class="col-md-9">
									<input type="radio" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'REPORT_RESULTS'),$_smarty_tpl);?>

										   value="<?php echo Report_ResultSelection::UTILIZATION;?>
"
										   id="results_utilization"/>
									<label for="results_utilization"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Utilization'),$_smarty_tpl);?>
</label>
								</div>
							</div>
						</div>

						<div class="row input-set select-toggle" id="listOfDiv">
							<div class="col-md-1"><span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Usage'),$_smarty_tpl);?>
</span></div>
							<div class="col-md-11 radio">
								<div class="col-md-1">
									<input type="radio" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'REPORT_USAGE'),$_smarty_tpl);?>
 value="<?php echo Report_Usage::RESOURCES;?>
"
										   id="usage_resources"
										   checked="checked">
									<label for="usage_resources"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Resources'),$_smarty_tpl);?>
</label>
								</div>
<!-- 								<div class="col-md-11"> -->
<!-- 									<input type="radio" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'REPORT_USAGE'),$_smarty_tpl);?>
 value="<?php echo Report_Usage::ACCESSORIES;?>
" -->
<!-- 										   id="usage_accessories"> -->
<!-- 									<label for="usage_accessories"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Accessories'),$_smarty_tpl);?>
</label> -->
<!-- 								</div> -->
							</div>
						</div>

						<div class="row input-set select-toggle" id="aggregateDiv" style="display:none;">
							<div class="col-md-1"><span class=""><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AggregateBy'),$_smarty_tpl);?>
</span></div>
							<div class="col-md-11 radio">
								<div class="col-md-1">
									<input type="radio" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'REPORT_GROUPBY'),$_smarty_tpl);?>
 value="<?php echo Report_GroupBy::NONE;?>
"
										   id="groupby_none" checked="checked"/>
									<label for="groupby_none"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'None'),$_smarty_tpl);?>
</label>
								</div>
								<div class="col-md-1">
									<input type="radio" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'REPORT_GROUPBY'),$_smarty_tpl);?>
 value="<?php echo Report_GroupBy::RESOURCE;?>
"
										   id="groupby_resource" class="utilization-eligible"/>
									<label for="groupby_resource"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Resource'),$_smarty_tpl);?>
</label>
								</div>
								<div class="col-md-1">
									<input type="radio" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'REPORT_GROUPBY'),$_smarty_tpl);?>
 value="<?php echo Report_GroupBy::SCHEDULE;?>
"
										   id="groupby_schedule" class="utilization-eligible"/>
									<label for="groupby_schedule"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Schedule'),$_smarty_tpl);?>
</label>
								</div>
								<div class="col-md-1">
									<input type="radio" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'REPORT_GROUPBY'),$_smarty_tpl);?>
 value="<?php echo Report_GroupBy::USER;?>
"
										   id="groupby_user"/>
									<label for="groupby_user"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'User'),$_smarty_tpl);?>
</label>
								</div>
								<div class="col-md-8">
									<input type="radio" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'REPORT_GROUPBY'),$_smarty_tpl);?>
 value="<?php echo Report_GroupBy::GROUP;?>
"
										   id="groupby_group"/>
									<label for="groupby_group"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Group'),$_smarty_tpl);?>
</label>
								</div>
							</div>
						</div>
						<div class="row input-set form-group-sm" id="rangeDiv">
							<div class="col-md-1"><span class=""><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Range'),$_smarty_tpl);?>
</span></div>
							<div class="col-md-11 radio">
								<div class="col-md-2">
									<input type="radio" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'REPORT_RANGE'),$_smarty_tpl);?>

										   value="<?php echo Report_Range::CURRENT_MONTH;?>
" id="current_month"
                                           checked="checked"/>
									<label for="current_month"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'CurrentMonth'),$_smarty_tpl);?>
</label>
								</div>
								<div class="col-md-2">
									<input type="radio" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'REPORT_RANGE'),$_smarty_tpl);?>
 value="<?php echo Report_Range::CURRENT_WEEK;?>
"
										   id="current_week"/>
									<label for="current_week"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'CurrentWeek'),$_smarty_tpl);?>
</label>
								</div>
								<div class="col-md-1">
									<input type="radio" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'REPORT_RANGE'),$_smarty_tpl);?>
 value="<?php echo Report_Range::TODAY;?>
"
										   id="today"/>
									<label for="today" style="width:auto;"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Today'),$_smarty_tpl);?>
</label>
								</div>
                                <div class="col-md-1">
                                    <input type="radio" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'REPORT_RANGE'),$_smarty_tpl);?>
 value="<?php echo Report_Range::ALL_TIME;?>
"
                                           id="range_all"/>
                                    <label for="range_all"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AllTime'),$_smarty_tpl);?>
</label>
                                    <input type="hidden" name="submitButton" value="submit">
                                </div>
								<div class="col-md-6">
									<input type="radio" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'REPORT_RANGE'),$_smarty_tpl);?>
 value="<?php echo Report_Range::DATE_RANGE;?>
"
										   id="range_within"/>
									<label for="range_within" style="width:auto;"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Between'),$_smarty_tpl);?>
</label>
                                    <label for="startDate" class="no-show"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'StartDate'),$_smarty_tpl);?>
</label>
									<input type="input" class="form-control dateinput inline" id="startDate"/> -
									<input type="hidden" id="formattedBeginDate" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'REPORT_START'),$_smarty_tpl);?>
/>
                                    <label for="endDate" class="no-show"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'EndDate'),$_smarty_tpl);?>
</label>
                                    <input type="input" class="form-control dateinput inline" id="endDate"/>
									<input type="hidden" id="formattedEndDate" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'REPORT_END'),$_smarty_tpl);?>
 />
								</div>
							</div>
						</div>
						<div class="row input-set form-group-sm">

							<div class="col-md-1"><span class=""><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'FilterBy'),$_smarty_tpl);?>
</span></div>
							<div class="col-md-11">
								<div class="form-group no-margin no-padding col-md-2">
                                    <label for="resourceId" class="no-show"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Resource'),$_smarty_tpl);?>
</label>
                                    <select class="form-control" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'RESOURCE_ID','multi'=>true),$_smarty_tpl);?>
 multiple="multiple" id="resourceId">
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['resource_groups']->value, 'i', false, 'myId');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['myId']->value => $_smarty_tpl->tpl_vars['i']->value) {
?>
                                    		<option value="<?php echo $_smarty_tpl->tpl_vars['i']->value['resource_id'];?>
)">
												<?php echo $_smarty_tpl->tpl_vars['i']->value['name'];?>

                                    		</option>
                                		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

									</select>
								</div>
								<div class="form-group no-margin no-padding col-md-2">
                                    <label for="resourceTypeId" class="no-show"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ResourceType'),$_smarty_tpl);?>
</label>
                                    <select class="form-control" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'RESOURCE_TYPE_ID','multi'=>true),$_smarty_tpl);?>
 multiple="multiple" id="resourceTypeId">
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['resourceType']->value, 'i', false, 'myId');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['myId']->value => $_smarty_tpl->tpl_vars['i']->value) {
?>
                                                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['i']->value['resource_type_id'];?>
)">
												<?php echo $_smarty_tpl->tpl_vars['i']->value['resource_type_name'];?>

                                                                                   </option>
                                                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

									</select>
								</div>
								
								<div class="form-group no-margin no-padding col-md-2">
                                    <label for="scheduleId" class="no-show"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Schedule'),$_smarty_tpl);?>
</label>
                                    <select class="form-control" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'SCHEDULE_ID','multi'=>true),$_smarty_tpl);?>
 multiple="multiple" id="scheduleId">
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['schedules']->value, 'i', false, 'myId');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['myId']->value => $_smarty_tpl->tpl_vars['i']->value) {
?>
											<option label="<?php echo $_smarty_tpl->tpl_vars['i']->value['name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['i']->value['schedule_id'];?>
">
												<?php echo $_smarty_tpl->tpl_vars['i']->value['name'];?>

											</option>
										<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

										
									</select>
								</div>
								<div class="form-group no-margin no-padding col-md-2">
                                    <label for="groupId" class="no-show"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Group'),$_smarty_tpl);?>
</label>
                                    <select class="form-control" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'GROUP_ID','multi'=>true),$_smarty_tpl);?>
 multiple="multiple" id="groupId">
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['groups']->value, 'i', false, 'myId');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['myId']->value => $_smarty_tpl->tpl_vars['i']->value) {
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['i']->value['group_id'];?>
)">
												<?php echo $_smarty_tpl->tpl_vars['i']->value['name'];?>

											</option>
										<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

										
									</select>
								</div>
							</div>
							<div class="col-md-11 col-md-offset-1">
								<div class="form-group no-margin no-padding col-md-2">
									<div id="user-filter-div">
										<div class="">
											<label class="control-label sr-only"
												   for="user-filter"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AllUsers'),$_smarty_tpl);?>
</label>
											
											<select id="user-filter" class="form-control selectpicker" data-live-search="true">
												<option value="" selected>Select User</option>
												<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['group_users']->value, 'i', false, 'myId');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['myId']->value => $_smarty_tpl->tpl_vars['i']->value) {
?>
													<option value="<?php echo $_smarty_tpl->tpl_vars['i']->value['user_id'];?>
">
														<?php echo $_smarty_tpl->tpl_vars['i']->value['fname'];?>
 - <?php echo $_smarty_tpl->tpl_vars['i']->value['email'];?>

													</option>
												<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

											</select>
											<input id="user_id" class="filter-id" type="hidden" name="userId"/>
										</div>
									</div>
								</div>


								<div class="form-group no-margin no-padding col-md-2">
									<div id="participant-filter-div">
										<div class="form-group">
											<label class="control-label sr-only"
												   for="participant-filter"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AllParticipants'),$_smarty_tpl);?>
</label>

											<select id="participant-filter" class="form-control selectpicker" data-live-search="true">
												<option value="" selected>Select Lead</option>
												<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['group_users']->value, 'i', false, 'myId');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['myId']->value => $_smarty_tpl->tpl_vars['i']->value) {
?>
													<option value="<?php echo $_smarty_tpl->tpl_vars['i']->value['user_id'];?>
">
														<?php echo $_smarty_tpl->tpl_vars['i']->value['fname'];?>
 - <?php echo $_smarty_tpl->tpl_vars['i']->value['email'];?>

													</option>
												<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

											</select>
											<input id="participant_id" class="filter-id" type="hidden" name="PARTICIPANT_ID">
										</div>
									</div>
								</div>
								
								 <div class="form-group col-sm-2">
                        			<select class="form-control" name="billable" id="billable">
                        				<option value="">All</option>
                        				<option value="1">Billable</option>
                        				<option value="2">Non-Billable</option>
                        			</select>
                        		
								</div>
								
								<div class="form-group no-margin  col-md-2">
									<div id="participant-filter-div">
										<div class="form-group">
											<label class="control-label sr-only"
												   for="participant-filter"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AllParticipants'),$_smarty_tpl);?>
</label>
											<input id="clientName" name="clientName" type="text" class="form-control"
												   placeholder="Client Name"/>
										</div>
									</div>
								</div>

								<div class="form-group no-margin  col-md-2">
									<div id="participant-filter-div">
										<div class="form-group">
											<label class="control-label sr-only"
												   for="participant-filter"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AllParticipants'),$_smarty_tpl);?>
</label>
											<input id="projectNo" name="projectNo" type="text" class="form-control"
												   placeholder="Project No."/>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
                <div class="panel-footer">
                    <input type="submit" value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'GetReport'),$_smarty_tpl);?>
" class="btn btn-primary btn-sm"
                           id="btnCustomReport" asyncAction=""/>
                    <div class="checkbox inline-block">
                        <input type="checkbox" id="chkIncludeDeleted" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'INCLUDE_DELETED'),$_smarty_tpl);?>
/>
                        <label for="chkIncludeDeleted"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'IncludeDeleted'),$_smarty_tpl);?>
</label>
                    </div>
                </div>
			</div>
            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['csrf_token'][0][0]->CSRFToken(array(),$_smarty_tpl);?>

        </form>
	</div>
</div>

<div id="saveMessage" class="alert alert-success" style="display:none;">
	<strong><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ReportSaved'),$_smarty_tpl);?>
</strong> <a
			href="<?php echo $_smarty_tpl->tpl_vars['Path']->value;?>
reports/<?php echo Pages::REPORTS_SAVED;?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'MySavedReports'),$_smarty_tpl);?>
</a>
</div>

<div id="resultsDiv">
</div>

<div id="indicator" style="display:none; text-align: center;"><h3><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Working'),$_smarty_tpl);?>

	</h3><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_image'][0][0]->PrintImage(array('src'=>"admin-ajax-indicator.gif"),$_smarty_tpl);?>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:Reports/chart.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="modal fade" id="saveDialog" tabindex="-1" role="dialog" aria-labelledby="saveDialogLabel"
	 aria-hidden="true">
	<div class="modal-dialog">
		<form id="saveReportForm" method="post">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="saveDialogLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'SaveThisReport'),$_smarty_tpl);?>
</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="saveReportName"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Name'),$_smarty_tpl);?>
</label>
						<input type="text" id="saveReportName" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'REPORT_NAME'),$_smarty_tpl);?>
 class="form-control"
							   placeholder="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'NoTitleLabel'),$_smarty_tpl);?>
"/>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default cancel"
							data-dismiss="modal"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Cancel'),$_smarty_tpl);?>
</button>
					<button type="button" id="btnSaveReport" class="btn btn-success"><span
								class="glyphicon glyphicon-ok-circle"></span>
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'SaveThisReport'),$_smarty_tpl);?>

					</button>
					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['indicator'][0][0]->DisplayIndicator(array(),$_smarty_tpl);?>

				</div>
			</div>
		</form>
	</div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:javascript-includes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('Select2'=>true), 0, false);
?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"autocomplete.js"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"ajax-helpers.js"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"reports/generate-reports.js"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"reports/common.js"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"reports/chart.js"),$_smarty_tpl);?>


<?php echo '<script'; ?>
 type="text/javascript">
	$(document).ready(function () {
		var reportOptions = {
			userAutocompleteUrl: "<?php echo $_smarty_tpl->tpl_vars['Path']->value;?>
ajax/autocomplete.php?type=<?php echo AutoCompleteType::User;?>
",
			groupAutocompleteUrl: "<?php echo $_smarty_tpl->tpl_vars['Path']->value;?>
ajax/autocomplete.php?type=<?php echo AutoCompleteType::Group;?>
",
			customReportUrl: "<?php echo $_SERVER['SCRIPT_NAME'];?>
?<?php echo QueryStringKeys::ACTION;?>
=<?php echo ReportActions::Generate;?>
",
			printUrl: "<?php echo $_SERVER['SCRIPT_NAME'];?>
?<?php echo QueryStringKeys::ACTION;?>
=<?php echo ReportActions::PrintReport;?>
&",
			csvUrl: "<?php echo $_SERVER['SCRIPT_NAME'];?>
?<?php echo QueryStringKeys::ACTION;?>
=<?php echo ReportActions::Csv;?>
&",
			saveUrl: "<?php echo $_SERVER['SCRIPT_NAME'];?>
?<?php echo QueryStringKeys::ACTION;?>
=<?php echo ReportActions::Save;?>
"
		};

		var reports = new GenerateReports(reportOptions);
		reports.init();

		var common = new ReportsCommon({
			scriptUrl: '<?php echo $_smarty_tpl->tpl_vars['ScriptUrl']->value;?>
',
            chartOpts: {
                dateAxisFormat: '<?php echo $_smarty_tpl->tpl_vars['DateAxisFormat']->value;?>
'
            }
		});
		common.init();

        $('#resourceId').select2({
            placeholder: '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AllResources'),$_smarty_tpl);?>
'
        });
        $('#resourceTypeId').select2({
            placeholder: '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AllResourceTypes'),$_smarty_tpl);?>
'
        });
        $('#accessoryId').select2({
            placeholder: '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AllAccessories'),$_smarty_tpl);?>
'
        });
        $('#scheduleId').select2({
            placeholder: '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AllSchedules'),$_smarty_tpl);?>
'
        });
        $('#groupId').select2({
            placeholder: '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AllGroups'),$_smarty_tpl);?>
'
        });
	});

	$('#report-filter-panel').showHidePanel();


	$('#user-filter, #participant-filter').clearable();
<?php echo '</script'; ?>
>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->DisplayControl(array('type'=>"DatePickerSetupControl",'ControlId'=>"startDate",'AltId'=>"formattedBeginDate"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->DisplayControl(array('type'=>"DatePickerSetupControl",'ControlId'=>"endDate",'AltId'=>"formattedEndDate"),$_smarty_tpl);?>


</div>
<?php $_smarty_tpl->_subTemplateRender("file:globalfooter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
