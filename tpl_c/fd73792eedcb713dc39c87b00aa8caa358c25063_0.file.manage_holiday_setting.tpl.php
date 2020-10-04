<?php
/* Smarty version 3.1.30, created on 2020-09-27 21:02:29
  from "C:\xampp6\htdocs\emcscheduler\tpl\Admin\HolidaySetting\manage_holiday_setting.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f70e1c5709da4_46963791',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fd73792eedcb713dc39c87b00aa8caa358c25063' => 
    array (
      0 => 'C:\\xampp6\\htdocs\\emcscheduler\\tpl\\Admin\\HolidaySetting\\manage_holiday_setting.tpl',
      1 => 1597555198,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:globalheader.tpl' => 1,
    'file:globalfooter.tpl' => 1,
    'file:javascript-includes.tpl' => 1,
  ),
),false)) {
function content_5f70e1c5709da4_46963791 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_cycle')) require_once 'C:\\xampp6\\htdocs\\emcscheduler\\lib\\external\\Smarty\\plugins\\function.cycle.php';
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>


<?php $_smarty_tpl->_subTemplateRender("file:globalheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('InlineEdit'=>true,'Owl'=>true,'TitleKey'=>'HolidaySetting'), 0, false);
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"/>
<?php echo '<script'; ?>
 type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"> <?php echo '</script'; ?>
>
<style>
	.error-msg {
		color:red;
	}
</style>


<?php echo '<script'; ?>
>
	/*$(document).ready(function(){
		$('#blackoutReason').keyup(check_blockout_name);
	});

	function check_blockout_name() {
		var data = $('#blackoutReason').val();
		var table_name = 'blackout_series';
		var column = 'title';

		$.ajax({
			url: 'check_resource.php',
			type: 'POST',
			data: jQuery.param({ data: data, table_name:table_name, column:column}) ,
			cache: false,
			success: function (response) {
				if(response == 0){
					$(".btn-success").removeAttr("disabled");
					$("#message").html("").addClass("error-msg");
				} else {
					$(".btn-success").attr("disabled", true);
					$("#message").html("Blockout Name Already Exist").addClass("error-msg");

				}
			},
			error: function () {
				alert("error");
			}
		});
	}*/
<?php echo '</script'; ?>
>

<div id="page-manage-resources" class="admin-page">
	<div>
		<h1><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ManageHolidaySetting'),$_smarty_tpl);?>
</h1>
	</div>

	<div class="panel panel-default filterTable" id="filter-resources-panel">
	    
		<div class="panel-heading"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"AddHoliday"),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['showhide_icon'][0][0]->ShowHideIcon(array(),$_smarty_tpl);?>
</div>
		<div class="panel-body">
				<?php $_smarty_tpl->_assignInScope('groupClass', "col-xs-12 col-sm-4 col-md-3");
?>
            <form id="addHolidayForm" class="horizontal-list" role="form" method="post">
				<div class="<?php echo $_smarty_tpl->tpl_vars['groupClass']->value;?>
">
                    <label for="beginDate" class="reservationDate"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'BeginDate'),$_smarty_tpl);?>
</label>
					<input id="beginDate" type="text" class="form-control dateinput inline"
						   value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['BeginDate']->value),$_smarty_tpl);?>
"/>
                </div>
                <div class="<?php echo $_smarty_tpl->tpl_vars['groupClass']->value;?>
">
                    <label for="endDate" class="reservationDate"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'EndDate'),$_smarty_tpl);?>
</label>
					<input id="endDate" type="text" class="form-control dateinput inline"
						   value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['EndDate']->value),$_smarty_tpl);?>
"/>
                </div>
                <div class="<?php echo $_smarty_tpl->tpl_vars['groupClass']->value;?>
">
					<div class="required form-group has-feedback">
						<input <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'SUMMARY'),$_smarty_tpl);?>
 type="text" id="reason" required 
													  class="form-control required" placeholder="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Reason'),$_smarty_tpl);?>
"/>
						<i class="glyphicon glyphicon-asterisk form-control-feedback" data-bv-icon-for="reason"></i>
					</div>
					
				</div>
				<div class="<?php echo $_smarty_tpl->tpl_vars['groupClass']->value;?>
">
					<label for="addScheduleId" class="no-show"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Schedule'),$_smarty_tpl);?>
</label>
					<select id="addScheduleId" name="addScheduleId" class="form-control selectpicker" data-live-search="true" 
					    style="width:300px">
						<option>All Schedules</option>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['schedules']->value, 'i', false, 'myId');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['myId']->value => $_smarty_tpl->tpl_vars['i']->value) {
?>
							<option label="<?php echo $_smarty_tpl->tpl_vars['i']->value['name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['i']->value['name'];?>
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
				<div class="clearfix"></div>
			</form>
	     </div>
		 <div class="panel-footer">
				<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['add_button'][0][0]->AddButton(array('id'=>"addHolidayBtn",'class'=>"btn-sm"),$_smarty_tpl);?>

				<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['reset_button'][0][0]->ResetButton(array('id'=>"clearFilter",'class'=>"btn-sm"),$_smarty_tpl);?>

		 </div>
		
   </div>
    <div class="panel panel-default filterTable" id="filter-resources-panel">
			<div class="panel-heading"><span
						class="glyphicon glyphicon-filter"></span> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"Filter"),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['showhide_icon'][0][0]->ShowHideIcon(array(),$_smarty_tpl);?>

			</div>
	<form role="form" name="searchForm" id="searchForm" action="manage_holiday_setting.php">
			<div class="panel-body">
				<?php $_smarty_tpl->_assignInScope('groupClass', "col-xs-12 col-sm-4 col-md-3");
?>
				<div class="form-group <?php echo $_smarty_tpl->tpl_vars['groupClass']->value;?>
">
					<input id="beginDateFilter" name="beginDateFilter" type="text" class="form-control dateinput inline"
						   value=""/>
					-
                    <input id="endDateFilter" name="endDateFilter" type="text" class="form-control dateinput inline"
						   value=""/>
				</div>
				<div class="form-group <?php echo $_smarty_tpl->tpl_vars['groupClass']->value;?>
">
					<label for="filterScheduleId" class="no-show"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Schedule'),$_smarty_tpl);?>
</label>
					<select id="filterScheduleId" name="scheduleId" class="form-control selectpicker" data-live-search="true">
						<option value="">All Schedules</option>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['schedules']->value, 'i', false, 'myId');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['myId']->value => $_smarty_tpl->tpl_vars['i']->value) {
?>
							<option label="<?php echo $_smarty_tpl->tpl_vars['i']->value['name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['i']->value['name'];?>
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
				<div class="clearfix"></div>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['AttributeFilters']->value, 'attribute');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['attribute']->value) {
?>
					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->DisplayControl(array('type'=>"AttributeControl",'idPrefix'=>"search",'attribute'=>$_smarty_tpl->tpl_vars['attribute']->value,'searchmode'=>true,'class'=>"customAttribute filter-customAttribute".((string)$_smarty_tpl->tpl_vars['attribute']->value->Id())." ".((string)$_smarty_tpl->tpl_vars['groupClass']->value)),$_smarty_tpl);?>

				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			</div>
			<div class="panel-footer">
					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['filter_button'][0][0]->FilterButton(array('id'=>"filterButton",'class'=>"btn-sm"),$_smarty_tpl);?>
&nbsp;&nbsp;
					<button id="showAll" class="btn btn-link btn-sm"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ViewAll'),$_smarty_tpl);?>
</button>
			</div>
	  </form>
	</div>
	
   <table class="table" id="holidayTable">
		<thead>
		<tr>
			<th><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['sort_column'][0][0]->SortColumn(array('key'=>'Schedule','field'=>ColumnNames::SCHEDULE_HOLIDAY),$_smarty_tpl);?>
</th>
			<th><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['sort_column'][0][0]->SortColumn(array('key'=>'BeginDate','field'=>ColumnNames::BLACKOUT_START),$_smarty_tpl);?>
</th>
			<th><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['sort_column'][0][0]->SortColumn(array('key'=>'EndDate','field'=>ColumnNames::BLACKOUT_END),$_smarty_tpl);?>
</th>
			<th><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['sort_column'][0][0]->SortColumn(array('key'=>'Reason','field'=>ColumnNames::REASON_HOLIDAY),$_smarty_tpl);?>
</th>
			<th><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'CreatedBy'),$_smarty_tpl);?>
</th>
			<th><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Update'),$_smarty_tpl);?>
</th>
			<th><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Delete'),$_smarty_tpl);?>
</th>
			<th class="action-delete">
				<div class="checkbox checkbox-single">
					<input type="checkbox" id="delete-all" aria-label="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'All'),$_smarty_tpl);?>
"/>
					<label for="delete-all" class="no-show">All</label>
				</div>
			</th>
		</tr>
		</thead>
		<tbody>
       <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['holiday']->value, 'holi');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['holi']->value) {
?>
			<?php smarty_function_cycle(array('values'=>'row0,row1','assign'=>'rowCss'),$_smarty_tpl);?>

			<!--<?php $_smarty_tpl->_assignInScope('id', $_smarty_tpl->tpl_vars['blackout']->value->InstanceId);
?>-->
			<tr class="editable <?php echo $_smarty_tpl->tpl_vars['rowCss']->value;?>
" data-value=<?php echo $_smarty_tpl->tpl_vars['holi']->value['id'];?>
>
				<td><?php echo $_smarty_tpl->tpl_vars['holi']->value['schedule'];?>
</td>
				<td class="date"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['holi']->value['begin']),$_smarty_tpl);?>
</td>
				<td class="date"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['holi']->value['end']),$_smarty_tpl);?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['holi']->value['reason'];?>
</td>
				<td style="max-width:150px;"><?php echo $_smarty_tpl->tpl_vars['holi']->value['createdby'];?>
</td>
				<td class="update edit"><a href="#"><span class="fa fa-edit"></span></a></td>
				
				<?php if ($_smarty_tpl->tpl_vars['blackout']->value->IsRecurring) {?>
					<td class="update">
						<a href="#" class="update delete-recurring"><span class="fa fa-trash icon remove"></span></a>
					</td>
				<?php } else { ?>
					<td class="update">
						<a href="#" class="update delete"><span class="fa fa-trash icon remove"></span></a>
					</td>
				<?php }?>
			</tr>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		</tbody>
		<tfoot>
		<tr>
			<td colspan="7">
			     <input type="hidden" id="fname" value=<?php echo $_smarty_tpl->tpl_vars['fname']->value;?>
><input type="hidden" id="lname" value=<?php echo $_smarty_tpl->tpl_vars['lname']->value;?>
>
			     <input type="hidden" id="userId" value=<?php echo $_smarty_tpl->tpl_vars['UserId']->value;?>
>
			</td>
			<td class="action-delete"><a href="#" id="delete-selected" class="no-show" title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Delete'),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Delete'),$_smarty_tpl);?>
<span class="fa fa-trash icon remove"></span></a></td>
		</tr>
		</tfoot>
	</table>
	<!-- <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['pagination'][0][0]->CreatePagination(array('pageInfo'=>$_smarty_tpl->tpl_vars['PageInfo']->value,'showCount'=>true),$_smarty_tpl);?>
-->
	
	<div id="globalError" class="error no-show"></div>
    
    <div id="wait-box" class="wait-box">
		<div id="creatingNotification">
			<h3>
				<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8857984965f70e1c56fdf39_69092532', "ajaxMessage");
?>

			</h3>
			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_image'][0][0]->PrintImage(array('src'=>"reservation_submitting.gif"),$_smarty_tpl);?>

		</div>
	</div>


	
	<div class="modal fade" id="empModal" role="dialog">
       <div class="modal-dialog" style="width:950px;">
	     <!-- Modal content-->
	     <div class="modal-content">
             <div class="modal-body" id="modalBodyUpdate">
          
             </div>
      
         </div>
       </div>
    </div>
	
	<div class="modal fade" id="deleteDialog"  role="dialog" aria-labelledby="deleteModalLabel"
		 aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="deleteModalLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Delete'),$_smarty_tpl);?>
</h4>
				</div>
				<div class="modal-body">
					<div class="alert alert-warning">
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'DeleteWarning'),$_smarty_tpl);?>

					</div>
				</div>
				<div class="modal-footer">
				    <input type="hidden" id="hid1" value="">
					<form id="deleteForm" method="post">
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['cancel_button'][0][0]->CancelButton(array(),$_smarty_tpl);?>

						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['delete_button'][0][0]->DeleteButton(array('class'=>"btnUpdateAllInstances",'id'=>"deleteButton"),$_smarty_tpl);?>

					</form>

				</div>
			</div>
		</div>
	</div>
	
</div>

    <?php $_smarty_tpl->_subTemplateRender("file:globalfooter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    
    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->DisplayControl(array('type'=>"DatePickerSetupControl",'ControlId'=>"beginDate",'AltId'=>"formattedBeginDate"),$_smarty_tpl);?>

    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->DisplayControl(array('type'=>"DatePickerSetupControl",'ControlId'=>"endDate",'AltId'=>"formattedEndDate"),$_smarty_tpl);?>

    
    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->DisplayControl(array('type'=>"DatePickerSetupControl",'ControlId'=>"beginDateFilter",'AltId'=>"formattedBeginDate"),$_smarty_tpl);?>

    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->DisplayControl(array('type'=>"DatePickerSetupControl",'ControlId'=>"endDateFilter",'AltId'=>"formattedEndDate"),$_smarty_tpl);?>

    
    
	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['csrf_token'][0][0]->CSRFToken(array(),$_smarty_tpl);?>

	<?php $_smarty_tpl->_subTemplateRender("file:javascript-includes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('InlineEdit'=>true,'Owl'=>true,'Clear'=>true), 0, false);
?>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"ajax-helpers.js"),$_smarty_tpl);?>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"autocomplete.js"),$_smarty_tpl);?>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"js/tree.jquery.js"),$_smarty_tpl);?>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"dropzone.js"),$_smarty_tpl);?>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"date-helper.js"),$_smarty_tpl);?>

    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"admin/holidaysetting.js"),$_smarty_tpl);?>

    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"recurrence.js"),$_smarty_tpl);?>

    
<?php }
/* {block "ajaxMessage"} */
class Block_8857984965f70e1c56fdf39_69092532 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Working'),$_smarty_tpl);?>
...
				<?php
}
}
/* {/block "ajaxMessage"} */
}
