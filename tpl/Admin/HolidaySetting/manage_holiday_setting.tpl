{*
Copyright 2011-2019 Nick Korbel

This file is part of Booked Scheduler.

Booked Scheduler is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Booked Scheduler is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Booked Scheduler.  If not, see <http://www.gnu.org/licenses/>.
*}

{include file='globalheader.tpl' InlineEdit=true Owl=true TitleKey='HolidaySetting'}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"/>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"> </script>
<style>
	.error-msg {
		color:red;
	}
</style>


<script>
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
</script>

<div id="page-manage-resources" class="admin-page">
	<div>
		<h1>{translate key='ManageHolidaySetting'}</h1>
	</div>

	<div class="panel panel-default filterTable" id="filter-resources-panel">
	    
		<div class="panel-heading">{translate key="AddHoliday"} {showhide_icon}</div>
		<div class="panel-body">
				{assign var=groupClass value="col-xs-12 col-sm-4 col-md-3"}
            <form id="addHolidayForm" class="horizontal-list" role="form" method="post">
				<div class="{$groupClass}">
                    <label for="beginDate" class="reservationDate">{translate key=BeginDate}</label>
					<input id="beginDate" type="text" class="form-control dateinput inline"
						   value="{formatdate date=$BeginDate}"/>
                </div>
                <div class="{$groupClass}">
                    <label for="endDate" class="reservationDate">{translate key=EndDate}</label>
					<input id="endDate" type="text" class="form-control dateinput inline"
						   value="{formatdate date=$EndDate}"/>
                </div>
                <div class="{$groupClass}">
					<div class="required form-group has-feedback">
						<input {formname key=SUMMARY} type="text" id="reason" required 
													  class="form-control required" placeholder="{translate key=Reason}"/>
						<i class="glyphicon glyphicon-asterisk form-control-feedback" data-bv-icon-for="reason"></i>
					</div>
					
				</div>
				<div class="{$groupClass}">
					<label for="addScheduleId" class="no-show">{translate key=Schedule}</label>
					<select id="addScheduleId" name="addScheduleId" class="form-control selectpicker" data-live-search="true" 
					    style="width:300px">
						<option>All Schedules</option>
						{foreach from=$schedules key=myId item=i}
							<option label="{$i.name}" value="{$i.name}">
								{$i.name}
							</option>
						{/foreach}
					</select>
				</div>
				<div class="clearfix"></div>
			</form>
	     </div>
		 <div class="panel-footer">
				{add_button id="addHolidayBtn" class="btn-sm"}
				{reset_button id="clearFilter" class="btn-sm"}
		 </div>
		
   </div>
    <div class="panel panel-default filterTable" id="filter-resources-panel">
			<div class="panel-heading"><span
						class="glyphicon glyphicon-filter"></span> {translate key="Filter"} {showhide_icon}
			</div>
	<form role="form" name="searchForm" id="searchForm" action="manage_holiday_setting.php">
			<div class="panel-body">
				{assign var=groupClass value="col-xs-12 col-sm-4 col-md-3"}
				<div class="form-group {$groupClass}">
					<input id="beginDateFilter" name="beginDateFilter" type="text" class="form-control dateinput inline"
						   value=""/>
					-
                    <input id="endDateFilter" name="endDateFilter" type="text" class="form-control dateinput inline"
						   value=""/>
				</div>
				<div class="form-group {$groupClass}">
					<label for="filterScheduleId" class="no-show">{translate key=Schedule}</label>
					<select id="filterScheduleId" name="scheduleId" class="form-control selectpicker" data-live-search="true">
						<option value="">All Schedules</option>
						{foreach from=$schedules key=myId item=i}
							<option label="{$i.name}" value="{$i.name}">
								{$i.name}
							</option>
						{/foreach}
					</select>
				</div>
				<div class="clearfix"></div>
				{foreach from=$AttributeFilters item=attribute}
					{control type="AttributeControl" idPrefix="search" attribute=$attribute searchmode=true class="customAttribute filter-customAttribute{$attribute->Id()} {$groupClass}"}
				{/foreach}
			</div>
			<div class="panel-footer">
					{filter_button id="filterButton" class="btn-sm"}&nbsp;&nbsp;
					<button id="showAll" class="btn btn-link btn-sm">{translate key=ViewAll}</button>
			</div>
	  </form>
	</div>
	
   <table class="table" id="holidayTable">
		<thead>
		<tr>
			<th>{sort_column key=Schedule field=ColumnNames::SCHEDULE_HOLIDAY}</th>
			<th>{sort_column key=BeginDate field=ColumnNames::BLACKOUT_START}</th>
			<th>{sort_column key=EndDate field=ColumnNames::BLACKOUT_END}</th>
			<th>{sort_column key=Reason field=ColumnNames::REASON_HOLIDAY}</th>
			<th>{translate key=CreatedBy}</th>
			<th>{translate key=Update}</th>
			<th>{translate key=Delete}</th>
			<th class="action-delete">
				<div class="checkbox checkbox-single">
					<input type="checkbox" id="delete-all" aria-label="{translate key=All}"/>
					<label for="delete-all" class="no-show">All</label>
				</div>
			</th>
		</tr>
		</thead>
		<tbody>
       {foreach from=$holiday item=holi}
			{cycle values='row0,row1' assign=rowCss}
			<!--{assign var=id value=$blackout->InstanceId}-->
			<tr class="editable {$rowCss}" data-value={$holi.id}>
				<td>{$holi.schedule}</td>
				<td class="date">{formatdate date=$holi.begin}</td>
				<td class="date">{formatdate date=$holi.end}</td>
				<td>{$holi.reason}</td>
				<td style="max-width:150px;">{$holi.createdby}</td>
				<td class="update edit"><a href="#"><span class="fa fa-edit"></span></a></td>
				
				{if $blackout->IsRecurring}
					<td class="update">
						<a href="#" class="update delete-recurring"><span class="fa fa-trash icon remove"></span></a>
					</td>
				{else}
					<td class="update">
						<a href="#" class="update delete"><span class="fa fa-trash icon remove"></span></a>
					</td>
				{/if}
			</tr>
		{/foreach}
		</tbody>
		<tfoot>
		<tr>
			<td colspan="7">
			     <input type="hidden" id="fname" value={$fname}><input type="hidden" id="lname" value={$lname}>
			     <input type="hidden" id="userId" value={$UserId}>
			</td>
			<td class="action-delete"><a href="#" id="delete-selected" class="no-show" title="{translate key=Delete}">{translate key=Delete}<span class="fa fa-trash icon remove"></span></a></td>
		</tr>
		</tfoot>
	</table>
	<!-- {pagination pageInfo=$PageInfo showCount=true}-->
	
	<div id="globalError" class="error no-show"></div>
    
    <div id="wait-box" class="wait-box">
		<div id="creatingNotification">
			<h3>
				{block name="ajaxMessage"}
					{translate key=Working}...
				{/block}
			</h3>
			{html_image src="reservation_submitting.gif"}
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
					<h4 class="modal-title" id="deleteModalLabel">{translate key=Delete}</h4>
				</div>
				<div class="modal-body">
					<div class="alert alert-warning">
						{translate key=DeleteWarning}
					</div>
				</div>
				<div class="modal-footer">
				    <input type="hidden" id="hid1" value="">
					<form id="deleteForm" method="post">
						{cancel_button}
						{delete_button class="btnUpdateAllInstances" id="deleteButton"}
					</form>

				</div>
			</div>
		</div>
	</div>
	
</div>

    {include file='globalfooter.tpl'}
    
    {control type="DatePickerSetupControl" ControlId="beginDate" AltId="formattedBeginDate"}
    {control type="DatePickerSetupControl" ControlId="endDate" AltId="formattedEndDate"}
    
    {control type="DatePickerSetupControl" ControlId="beginDateFilter" AltId="formattedBeginDate"}
    {control type="DatePickerSetupControl" ControlId="endDateFilter" AltId="formattedEndDate"}
    
    
	{csrf_token}
	{include file="javascript-includes.tpl" InlineEdit=true Owl=true Clear=true}
	{jsfile src="ajax-helpers.js"}
	{jsfile src="autocomplete.js"}
	{jsfile src="js/tree.jquery.js"}
	{jsfile src="dropzone.js"}
	{jsfile src="date-helper.js"}
    {jsfile src="admin/holidaysetting.js"}
    {jsfile src="recurrence.js"}
    
