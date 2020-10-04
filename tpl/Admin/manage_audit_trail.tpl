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
{include file='globalheader.tpl' Select2=true}

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
		{foreach from=$auditTrail key=myId item=i name=foo}
			
			<tr class="{$rowCss}" data-announcement-id="{$i.announcementid }">
				<td class="announcementText">{$i.date_time}</td>
				<td class="announcementPriority">{$i.fname} {$i.lname}</td>
				<td class="announcementPriority">{$i.type}</td>
				<td class="announcementStart">{$i.old_data}</td>
				<td class="announcementEnd">{$i.new_data}</td>
				<td class="announcementEnd">{$i.action}</td>
			</tr>
		{/foreach}
		</tbody>
	</table>

	<input type="hidden" id="activeId"/>

	<div class="modal fade" id="deleteDialog" tabindex="-1" role="dialog" aria-labelledby="deleteDialogLabel" aria-hidden="true">
		<div class="modal-dialog">
			<form id="deleteForm" method="post">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="deleteDialogLabel">{translate key=Delete}</h4>
					</div>
					<div class="modal-body">
						<div class="alert alert-warning">
							<div>{translate key=DeleteWarning}</div>
						</div>
					</div>
					<div class="modal-footer">
						{cancel_button}
						{delete_button}
						{indicator}
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
						<h4 class="modal-title" id="editDialogLabel">{translate key=Edit}</h4>
					</div>
					<div class="modal-body">
						<div class="form-group has-feedback">
							<label for="editText">{translate key=Announcement}</label><br/>
							<textarea id="editText" class="form-control required" {formname key=ANNOUNCEMENT_TEXT}></textarea>
							<i class="glyphicon glyphicon-asterisk form-control-feedback" data-bv-icon-for="editText"></i>
						</div>
						<div class="form-group">
							<label for="editBegin">{translate key='BeginDate'}</label><br/>
							<input type="text" id="editBegin" class="form-control"/>
							<input type="hidden" id="formattedEditBegin" {formname key=ANNOUNCEMENT_START} />
						</div>
						<div class="form-group">
							<label for="editEnd">{translate key='EndDate'}</label><br/>
							<input type="text" id="editEnd" class="form-control"/>
							<input type="hidden" id="formattedEditEnd" {formname key=ANNOUNCEMENT_END} />
						</div>
						<div class="form-group">
							<label for="editPriority">{translate key='Priority'}</label> <br/>
							<input type="number" min="0" step="1" id="editPriority" class="form-control" {formname key=ANNOUNCEMENT_PRIORITY} />
						</div>
						<div class="form-group" style="display: none;">
							<label for="editUserGroups" class="no-show">{translate key=UsersInGroups}</label>
							<select id="editUserGroups" class="form-control" multiple="multiple" style="width:100%" {formname key=FormKeys::GROUP_ID multi=true}>
								{foreach from=$Groups item=group}
									<option value="{$group->Id}">{$group->Name}</option>
								{/foreach}
							</select>
						</div>
						<div class="form-group" style="display: none;">
							<label for="editResourceGroups" class="no-show">{translate key=UsersWithAccessToResources}</label>
							<select id="editResourceGroups" class="form-control" multiple="multiple" style="width:100%" {formname key=RESOURCE_ID multi=true}>
								{foreach from=$Resources item=resource}
									<option value="{$resource->GetId()}">{$resource->GetName()}</option>
								{/foreach}
							</select>
						</div>
					</div>
					<div class="modal-footer">
						{cancel_button}
						{update_button}
						{indicator}
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
						<h4 class="modal-title" id="emailDialogLabel">{translate key=SendAsEmail}</h4>
					</div>
					<div class="modal-body">
						<div class="alert alert-info"><span id="emailCount" class="bold"></span> {translate key=AnnouncementEmailNotice}</div>
					</div>
					<div class="modal-footer">
						{cancel_button}
						{update_button key=SendAsEmail}
						{indicator}
					</div>
				</div>
			</form>
		</div>
	</div>

    {include file="javascript-includes.tpl" Select2=true}
	{control type="DatePickerSetupControl" ControlId="BeginDate" AltId="formattedBeginDate"}
	{control type="DatePickerSetupControl" ControlId="EndDate" AltId="formattedEndDate"}
	{control type="DatePickerSetupControl" ControlId="editBegin" AltId="formattedEditBegin"}
	{control type="DatePickerSetupControl" ControlId="editEnd" AltId="formattedEditEnd"}

	{csrf_token}

	{jsfile src="ajax-helpers.js"}
	{jsfile src="admin/announcement.js"}
	{jsfile src="js/jquery.form-3.09.min.js"}

	<script type="text/javascript">
		$(document).ready(function () {

			var actions = {
				add: '{ManageAnnouncementsActions::Add}',
				edit: '{ManageAnnouncementsActions::Change}',
				deleteAnnouncement: '{ManageAnnouncementsActions::Delete}',
				email: '{ManageAnnouncementsActions::Email}'
			};

			var accessoryOptions = {
				submitUrl: '{$smarty.server.SCRIPT_NAME}',
				saveRedirect: '{$smarty.server.SCRIPT_NAME}',
				getEmailCountUrl: '{$smarty.server.SCRIPT_NAME}?dr=emailCount',
				actions: actions
			};

			var announcementManagement = new AnnouncementManagement(accessoryOptions);
			announcementManagement.init();

			{foreach from=$announcements item=announcement}
			announcementManagement.addAnnouncement(
					'{$announcement->Id()}',
					'{$announcement->Text()|escape:"quotes"|regex_replace:"/[\n]/":"\\n"}',
					'{formatdate date=$announcement->Start()->ToTimezone($timezone)}',
					'{formatdate date=$announcement->End()->ToTimezone($timezone)}',
					'{$announcement->Priority()}',
					[{foreach from=$announcement->GroupIds() item=id}{$id},{/foreach}],
					[{foreach from=$announcement->ResourceIds() item=id}{$id},{/foreach}],
                    {$announcement->DisplayPage()}
			);
			{/foreach}

			$('#add-announcement-panel').showHidePanel();

			$('#announcementGroups, #editUserGroups').select2({
				placeholder: '{translate key=UsersInGroups}'
			});

			$('#resourceGroups, #editResourceGroups').select2({
				placeholder: '{translate key=UsersWithAccessToResources}'
			});
		});
	</script>
</div>
{include file='globalfooter.tpl'}
