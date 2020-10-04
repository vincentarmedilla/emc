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

{* All of the slot display formatting *}
<style>
.error_message {
         color:red;
    }
    .context-menu{
 display: none;
 position: absolute;
 border: 1px solid black;
 border-radius: 3px;
 width: 200px;
 background: white;
 box-shadow: 10px 10px 5px #888888;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
	$(".error_message").hide();
	$(".delete_reason").click(function(){
		  var id = $('#referenceId').val();
		  var deleteReason = $("#deleteReason").val();
      	if(deleteReason == "") {
      		$("#deleteReason").addClass("error");
      		$('.error_message').show();
      		jqXHR.abort();
      	} else {
      	  $.ajax({
              url: 'delete_reservation.php',
              type: 'POST',
              data: jQuery.param({ id: id}) ,
              cache: false,
              success: function (response) {
                  if(response) {
                  	location.reload();
                  }
              },
              error: function () {
                  alert("error");
              }
          });
              
      	}
		
	});

	$('.delete_items').mousedown(function(event) {
		   var rfid = $(this).attr('referenceid');
		  
		   $("#referenceId").val(rfid);
		   
	        switch (event.which) {
	            case 1:
	                
	                break;
	            case 2:
	                
	                break;
	            case 3:
	            	
	            	 $('#GSCCModal').modal('show');
	            	 var id = $(this).attr('resid');
	            	 var text1 = $(this).text();
	            	 var n = text1.split('=>>>');
	            	
	            	 $("#referenceId").val(n[1].trim());
	            	 
	            	
	                break;
	            default:
	                
	        }
		});
	
   $('.reserved2').mousedown(function(event) {
        switch (event.which) {
            case 1:
                
                break;
            case 2:
                
                break;
            case 3:
            	
            	 $('#GSCCModal').modal('show');
            	 var id = $(this).attr('resid');
            	 var text1 = $(this).text();
            	 var n = text1.split('=>>>');
            	 
            	 $("#referenceId").val(n[1].trim());
            	 
            	
                break;
            default:
                
        }
	});


  
});
</script>
<style>
    .nostyle2 { color:white !important; text-indent:-9999px;}
</style>

{function name=displayGeneralReserved}
    {if $Slot->IsPending()}
        {assign var=class value='pending'}
    {elseif $Slot->HasCustomColor()}
        {assign var=color value='style="background-color:'|cat:$Slot->Color()|cat:' !important;color:'|cat:$Slot->TextColor()|cat:' !important;"'}
    {/if}
    {assign var="newname" value="=>"|explode:$Slot->Label($SlotLabelFactory)|escapequotes}
    
    {if !isset($smarty.get.st)}
    <td {$spantype|default:'col'}span="{$Slot->PeriodSpan()}" class="reserved reserved2  {$OwnershipClass}  clickres slot"
        resid="{$Slot->Id()}" {$color} {if $Draggable}draggable="true"{/if} data-resourceId="{$ResourceId}"
        id="{$Slot->Id()}|{$Slot->Date()->Format('Ymd')}" {if $OwnershipClass neq 'participating'}{if $newname[0] eq 1}style="background-color:{if $OwnershipClass eq 'mine'}#6F9BAE{else}white{/if};border-width:{if $OwnershipClass neq 'mine'} 2px{/if};border-color:{if $OwnershipClass neq 'mine'} #408AD2{/if};color:{if $OwnershipClass neq 'mine'}black{/if}"{/if}{/if}>{$newname[1]} <div style="visibility: hidden">=>>>{$Slot->Id()}</div></td>
   {elseif $smarty.get.st eq 'mine'}
   		 <td {$spantype|default:'col'}span="{$Slot->PeriodSpan()}" class="{if $smarty.get.st eq $OwnershipClass} reserved {else} nostyle2 {/if} {if $smarty.get.st eq $OwnershipClass} {$OwnershipClass} {/if} clickres slot"
        resid="{$Slot->Id()}" {$color} {if $Draggable}draggable="true"{/if} data-resourceId="{$ResourceId}"
        id="{$Slot->Id()}|{$Slot->Date()->Format('Ymd')}" >{$newname[1] }</td>
   {elseif $smarty.get.st eq 'participating'}
   		 <td {$spantype|default:'col'}span="{$Slot->PeriodSpan()}" class="{if $smarty.get.st eq $OwnershipClass} reserved {else} nostyle2 {/if} {if $smarty.get.st eq $OwnershipClass} {$OwnershipClass} {/if} clickres slot"
        resid="{$Slot->Id()}" {$color} {if $Draggable}draggable="true"{/if} data-resourceId="{$ResourceId}"
        id="{$Slot->Id()}|{$Slot->Date()->Format('Ymd')}" >{$newname[1] }</td>
   {elseif $smarty.get.st eq 'admin'}
   		{if $newname[0] eq 2}
   			{if $OwnershipClass eq 'admin'}
           		<td {$spantype|default:'col'}span="{$Slot->PeriodSpan()}"  class="{if $smarty.get.st eq $OwnershipClass} reserved reserved2 {/if} {if $smarty.get.st eq $OwnershipClass} {$OwnershipClass} {/if} clickres slot"
                resid="{$Slot->Id()}" {$color} {if $Draggable}draggable="true"{/if} data-resourceId="{$ResourceId}"
                id="{$Slot->Id()}|{$Slot->Date()->Format('Ymd')}">{$newname[1]}{$OwnershipClass}</td>
            {elseif $OwnershipClass eq 'participating'}
                <td {$spantype|default:'col'}span="{$Slot->PeriodSpan()}"  class=" reserved reserved2 participating clickres slot"
                resid="{$Slot->Id()}" {$color} {if $Draggable}draggable="true"{/if} data-resourceId="{$ResourceId}"
                id="{$Slot->Id()}|{$Slot->Date()->Format('Ymd')}">{$newname[1]}</td>
            {elseif $OwnershipClass eq 'mine'}
            	<td {$spantype|default:'col'}span="{$Slot->PeriodSpan()}"  class=" reserved reserved2 mine clickres slot"
                resid="{$Slot->Id()}" {$color} {if $Draggable}draggable="true"{/if} data-resourceId="{$ResourceId}"
                id="{$Slot->Id()}|{$Slot->Date()->Format('Ymd')}">{$newname[1]}</td>
            {/if}
        {else}
        	<td {$spantype|default:'col'}span="{$Slot->PeriodSpan()}"  class="  reserved2"
                resid="{$Slot->Id()}" {$color} {if $Draggable}draggable="true"{/if} data-resourceId="{$ResourceId}"
                id="{$Slot->Id()}|{$Slot->Date()->Format('Ymd')}"></td>
        {/if}
    {elseif $smarty.get.st eq 'temporary'}
   		{if $newname[0] eq 1}
   			{if $OwnershipClass eq 'admin'}
           		<td {$spantype|default:'col'}span="{$Slot->PeriodSpan()}"  class=" reserved reserved2   clickres slot"
                resid="{$Slot->Id()}" {$color} {if $Draggable}draggable="true"{/if} data-resourceId="{$ResourceId}"
                id="{$Slot->Id()}|{$Slot->Date()->Format('Ymd')}" style="background-color:white;border-width: 2px;border-color:#408AD2;color:black">{$newname[1]}</td>
            {elseif $OwnershipClass eq 'participating'}
                <td {$spantype|default:'col'}span="{$Slot->PeriodSpan()}"  class=" reserved reserved2 participating clickres slot"
                resid="{$Slot->Id()}" {$color} {if $Draggable}draggable="true"{/if} data-resourceId="{$ResourceId}"
                id="{$Slot->Id()}|{$Slot->Date()->Format('Ymd')}">{$newname[1]}</td>
            {elseif $OwnershipClass eq 'mine'}
            	<td {$spantype|default:'col'}span="{$Slot->PeriodSpan()}"  class=" reserved reserved2 mine clickres slot"
                resid="{$Slot->Id()}" {$color} {if $Draggable}draggable="true"{/if} data-resourceId="{$ResourceId}"
                id="{$Slot->Id()}|{$Slot->Date()->Format('Ymd')}">{$newname[1]}</td>
            {/if}
        {else}
        	<td {$spantype|default:'col'}span="{$Slot->PeriodSpan()}"  class=""
                resid="{$Slot->Id()}" {$color} {if $Draggable}draggable="true"{/if} data-resourceId="{$ResourceId}"
                id="{$Slot->Id()}|{$Slot->Date()->Format('Ymd')}"></td>
        {/if}
    {elseif $smarty.get.st eq 'past'}
   		<td {$spantype|default:'col'}span="{$Slot->PeriodSpan()}"  class="{if $smarty.get.st eq 'past'} reserved reserved2 {/if} {if $smarty.get.st eq 'reserve'} nostyle {/if} clickres slot"
        resid="{$Slot->Id()}" {$color} {if $Draggable}draggable="true"{/if} data-resourceId="{$ResourceId}"
        id="{$Slot->Id()}|{$Slot->Date()->Format('Ymd')}" {if $smarty.get.st eq 'past'}style="background-color: white;color:white;"{/if}>{$newname[1]} Reservation</td>
        {elseif $smarty.get.st eq 'temporary'}
   		<td {$spantype|default:'col'}span="{$Slot->PeriodSpan()}"  class="{if $smarty.get.st eq 'temporary'} reserved {/if} {if $smarty.get.st eq 'reserve'} nostyle {/if} clickres slot"
        resid="{$Slot->Id()}" {$color} {if $Draggable}draggable="true"{/if} data-resourceId="{$ResourceId}"
        id="{$Slot->Id()}|{$Slot->Date()->Format('Ymd')}" {if $smarty.get.st eq 'temporary'}{if $newname[0] eq 1}style="background-color: white;border-width: 2px;border-color: #408AD2; color:black"{/if}{/if}>{$newname[1]} Temporary</td>         
   {/if}
{/function}

{function name=displayMyReserved}
    {call name=displayGeneralReserved Slot=$Slot Href=$Href SlotRef=$SlotRef OwnershipClass='mine' Draggable=true ResourceId=$ResourceId}
{/function}

{function name=displayAdminReserved}
    {call name=displayGeneralReserved Slot=$Slot Href=$Href SlotRef=$SlotRef OwnershipClass='admin' Draggable=true ResourceId=$ResourceId}
{/function}

{function name=displayMyParticipating}
    {call name=displayGeneralReserved Slot=$Slot Href=$Href SlotRef=$SlotRef OwnershipClass='participating' ResourceId=$ResourceId}
{/function}

{function name=displayReserved}
    {call name=displayGeneralReserved Slot=$Slot Href=$Href SlotRef=$SlotRef OwnershipClass='' Draggable="{$CanViewAdmin}" ResourceId=$ResourceId}
{/function}

{function name=displayPastTime}
	<td {$spantype|default:'col'}span="{$Slot->PeriodSpan()}" ref="{$SlotRef}"
        class="pasttime slot"  draggable="{$CanViewAdmin}" resid="{$Slot->Id()}"
        data-resourceId="{$ResourceId}">{$Slot->Label($SlotLabelFactory)|escapequotes}</td>
{/function}

{function name=displayReservable}
    <td {$spantype|default:'col'}span="{$Slot->PeriodSpan()}" ref="{$SlotRef}" class="reservable clickres slot"
        data-href="{$Href}"
        data-start="{$Slot->BeginDate()->Format('Y-m-d H:i:s')|escape:url}"
        data-end="{$Slot->EndDate()->Format('Y-m-d H:i:s')|escape:url}"
        data-resourceId="{$ResourceId}">&nbsp;
    </td>
{/function}

{function name=displayRestricted}
    <td {$spantype|default:'col'}span="{$Slot->PeriodSpan()}" class="restricted slot">&nbsp;</td>
{/function}

{function name=displayUnreservable}
	<td {$spantype|default:'col'}span="{$Slot->PeriodSpan()}"
        class="unreservable slot">{$Slot->Label($SlotLabelFactory)|escape}</td>
{/function}

{function name=displaySlot}
    {call name=$DisplaySlotFactory->GetFunction($Slot, $AccessAllowed) Slot=$Slot Href=$Href SlotRef=$SlotRef ResourceId=$ResourceId}
{/function}

{* End slot display formatting *}

{block name="header"}
    {include file='globalheader.tpl' Qtip=true FloatThead=true Select2=true cssFiles='scripts/css/jqtree.css' printCssFiles='css/schedule.print.css'}
{/block}

<div id="page-schedule">

    {assign var=startTime value=microtime(true)}

    {if $ShowResourceWarning}
        <div class="alert alert-warning no-resource-warning"><span
                    class="fa fa-warning"></span> {translate key=NoResources} <a
                    href="admin/manage_resources.php">{translate key=AddResource}</a></div>
    {/if}

    {if $CanViewAdmin}
        <div id="slow-schedule-warning" class="alert alert-warning no-show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

            We noticed this page is taking a long time to load. To speed ths page up, try
            reducing the number of <a class="alert-link" href="admin/manage_resources.php">resources</a> on this
            schedule or
            reducing the number of <a class="alert-link" href="admin/manage_schedules.php">days</a> being shown.
            <br/><br/>
            This page is taking <span id="warning-time"></span> seconds to load
            <span id="warning-resources"></span> resources for <span id="warning-days"></span> days.

            <button type="button" class="close close-forever" aria-label="Do not show again">
                <span aria-hidden="true">Do not show again</span>
            </button>
        </div>
    {/if}

    {if $IsAccessible}
        <div id="defaultSetMessage" class="alert alert-success hidden">
            {translate key=DefaultScheduleSet}
        </div>
        {block name="schedule_control"}
            <div class="row">
                {assign var=titleWidth value="col-sm-12 col-xs-12"}
                {if !$HideSchedule}
                    {assign var=titleWidth value="col-sm-6 col-xs-12"}
                    <div id="schedule-actions" class="col-sm-3 col-xs-12">
                        {block name="actions"}
                            <a href="#" id="make_default"
                               style="display:none;">{html_image src="star_boxed_full.png" altKey="MakeDefaultSchedule"}</a>
                            <a href="#" class="schedule-style" id="schedule_standard"
                               schedule-display="{ScheduleStyle::Standard}">{html_image src="table.png" altKey="StandardScheduleDisplay"}</a>
                            <a href="#" class="schedule-style" id="schedule_tall"
                               schedule-display="{ScheduleStyle::Tall}">{html_image src="table-tall.png" altKey="TallScheduleDisplay"}</a>
                            <a href="#" class="schedule-style hidden-sm hidden-xs" id="schedule_wide"
                               schedule-display="{ScheduleStyle::Wide}">{html_image src="table-wide.png" altKey="WideScheduleDisplay"}</a>
                            <a href="#" class="schedule-style hidden-sm hidden-xs" id="schedule_week"
                               schedule-display="{ScheduleStyle::CondensedWeek}">{html_image src="table-week.png" altKey="CondensedWeekScheduleDisplay"}</a>
                            <div>
                                {if $SubscriptionUrl != null && $ShowSubscription}
                                    {html_image src="feed.png"}
                                    <a target="_blank" href="{$SubscriptionUrl->GetAtomUrl()}">Atom</a>
                                    |
                                    <a target="_blank" href="{$SubscriptionUrl->GetWebcalUrl()}">iCalendar</a>
                                {/if}
                            </div>
                        {/block}
                    </div>
                {/if}

                <div id="schedule-title" class="schedule_title {$titleWidth} col-xs-12">
                    <label for="schedules" class="no-show">Schedule</label>
                    <select id="schedules" class="form-control" style="width:auto;">
                        {foreach from=$Schedules item=schedule}
                            <option value="{$schedule->GetId()}"
                                    {if $schedule->GetId() == $ScheduleId}selected="selected"{/if}>{$schedule->GetName()}</option>
                        {/foreach}
                    </select>
                    <a href="#" id="calendar_toggle" title="{translate key=ShowHideNavigation}">
                        <span class="glyphicon glyphicon-calendar"></span>
                        <span class="no-show">{translate key=ShowHideNavigation}</span>
                    </a>
                    <div id="individualDates">
                        <div class="checkbox inline">
                            <input type='checkbox' id='multidateselect'/>
                            <label for='multidateselect'>{translate key=SpecificDates}</label>
                        </div>
                        <a class="btn btn-default btn-sm" href="#" id="individualDatesGo"><i
                                    class="fa fa-angle-double-right"></i>
                            <span class="no-show">{translate key=SpecificDates}</span>
                        </a>
                    </div>
                    <div id="individualDatesList"></div>
                </div>

                {capture name="date_navigation"}
                    {if !$HideSchedule}
                        <div class="schedule-dates col-sm-3 col-xs-14" style="font-size: 20px;">
                            {assign var=TodaysDate value=Date::Now()}
                            <a href="#" class="change-date btn-link btn-success" data-year="{$TodaysDate->Year()}"
                               data-month="{$TodaysDate->Month()}" data-day="{$TodaysDate->Day()}"
                               alt="{translate key=Today}"><i class="fa fa-home"></i>
                                <span class="no-show">{translate key=Today}</span>
                            </a>
                            {assign var=FirstDate value=$DisplayDates->GetBegin()}
                            {assign var=LastDate value=$DisplayDates->GetEnd()->AddDays(-1)}
                            <a href="#" class="change-date" data-year="{$PreviousDate->Year()}"
                               data-month="{$PreviousDate->Month()}"
                               data-day="{$PreviousDate->Day()}">{html_image src="arrow_large_left.png" alt="{translate key=Back}"}</a>
                            {formatdate date=$FirstDate} - {formatdate date=$LastDate}
                            <a href="#" class="change-date" data-year="{$NextDate->Year()}"
                               data-month="{$NextDate->Month()}"
                               data-day="{$NextDate->Day()}">{html_image src="arrow_large_right.png" alt="{translate key=Forward}"}</a>

                            {if $ShowFullWeekLink}
                                <a href="{add_querystring key=SHOW_FULL_WEEK value=1}"
                                   id="showFullWeek">({translate key=ShowFullWeek})</a>
                            {/if}
                        </div>
                    {/if}
                {/capture}

                {$smarty.capture.date_navigation}
            </div>
            <div type="text" id="datepicker" style="display:none;"></div>
        {/block}

        {if $ScheduleAvailabilityEarly}
            <div class="alert alert-warning center">
                <strong>
                    {translate key=ScheduleAvailabilityEarly}
                    <a href="#" class="change-date" data-year="{$ScheduleAvailabilityStart->Year()}"
                       data-month="{$ScheduleAvailabilityStart->Month()}"
                       data-day="{$ScheduleAvailabilityStart->Day()}">
                        {format_date date=$ScheduleAvailabilityStart timezone=$timezone}
                    </a> -
                    <a href="#" class="change-date" data-year="{$ScheduleAvailabilityEnd->Year()}"
                       data-month="{$ScheduleAvailabilityEnd->Month()}"
                       data-day="{$ScheduleAvailabilityEnd->Day()}">
                        {format_date date=$ScheduleAvailabilityEnd timezone=$timezone}
                    </a>
                </strong>
            </div>
        {/if}

        {if $ScheduleAvailabilityLate}
            <div class="alert alert-warning center">
                <strong>
                    {translate key=ScheduleAvailabilityLate}
                    <a href="#" class="change-date" data-year="{$ScheduleAvailabilityStart->Year()}"
                       data-month="{$ScheduleAvailabilityStart->Month()}"
                       data-day="{$ScheduleAvailabilityStart->Day()}">
                        {format_date date=$ScheduleAvailabilityStart timezone=$timezone}
                    </a> -
                    <a href="#" class="change-date" data-year="{$ScheduleAvailabilityEnd->Year()}"
                       data-month="{$ScheduleAvailabilityEnd->Month()}"
                       data-day="{$ScheduleAvailabilityEnd->Day()}">
                        {format_date date=$ScheduleAvailabilityEnd timezone=$timezone}
                    </a>
                </strong>
            </div>
        {/if}

        {if $AllowConcurrentReservations}
            <div class="alert alert-warning center">
                <strong>
                    <a href="{Pages::CALENDAR}?sid={$ScheduleId}">{format_date date=$ScheduleAvailabilityStart timezone=$timezone}{translate key=OnlyViewedCalendar}</a>
                </strong>
            </div>
        {/if}

        {if !$HideSchedule}
            {block name="legend"}
                <div class="hidden-xs row col-sm-12 schedule-legend">
                    <div class="center">
                        <div class="legend reservable">{translate key=Reservable}</a></div>
                         <div class="legend reserved mine"><a href="?st=mine" style="color:white">{translate key=MyReservation}</a></div>
                          <div class="legend reserved participating" style="width:160px;"><a href="?st=participating" style="color:white;">P Lead/T Engineer</a></div>
                        
                        <div class="legend reserved reserved2" style="width: 164px;"><a style="color:white" href="?st=admin">{translate key=Reserved}/Confirmed</a></div>
                        <div class="legend  participating" style="border: 2px solid #408AD2 ;
    text-align:center;"><a href="?st=temporary">Temporary</a></div>
    					<div class="legend unreservable">{translate key=Unreservable}</div>
                        <div class="legend pasttime">{translate key=Past} Blocked</div>
                          <div class="legend " style="border: solid white 1px; background-color:white important!;"><a href="{$Path}schedule.php" style="color:black">View All</a></div>
                        {if $LoggedIn}
                        
                           
                            
                            {*<div class="legend reserved participating">{translate key=Participant}</div>*}
                           
                            
                        {/if}
                        {*<div class="legend reserved pending">{translate key=Pending}</div>*}
                        
                        {*<div class="legend restricted">{translate key=Restricted}</div>*}
                    </div>
                </div>
            {/block}
            
            <div class="row">
            	<div id="reservations-left" class="col col-lg-2">
                <div id="reservations-left" class="col-md-12 default-box">
                    <div class="reservations-left-header">{translate key=ResourceFilter}
                        <a href="#" class="pull-right toggle-sidebar" title="Hide Reservation Filter"><i
                                    class="glyphicon glyphicon-remove"></i>
                            <span class="no-show">Hide Reservation Filter</span>
                        </a>
                    </div>

                    <div class="reservations-left-content">
                        <form method="get" role="form" id="advancedFilter">

                            {if count($ResourceAttributes) + count($ResourceTypeAttributes) > 5}
                                <div>
                                    <input type="submit" value="{translate key=Filter}"
                                           class="btn btn-success btn-sm" {formname key=SUBMIT}/>
                                </div>
                            {/if}

                            <div>
                                {*<label>{translate key=Resource}</label>*}
                                <div id="resourceGroups"></div>
                            </div>
                            <div id="resettable">
                               <!-- <div class="form-group col-xs-12">
                                    <label for="maxCapactiy">{translate key=MinimumCapacity}</label>
                                    <input type='number' min='0' id='maxCapactiy' size='5' maxlength='5'
                                           class="form-control input-sm" {formname key=MAX_PARTICIPANTS}
                                           value="{$MaxParticipantsFilter}"/>
                                </div> -->
                                
                                <div class="form-group col-xs-12">
                                    <label for="resourceType">{translate key=ResourceType}</label>
                                   {* <select id="resourceType" {formname key=RESOURCE_TYPE_ID} {formname key=RESOURCE_TYPE_ID}
                                            class="form-control input-sm">
                                        <option value="">- {translate key=All} -</option>
                                        {object_html_options options=$ResourceTypes label='Name' key='Id' selected=$ResourceTypeIdFilter}
                                    </select>*}
                                    {*<pre>{$resourceTypes|@print_r}</pre>*}
                                    <select id="resourceType" {formname key=RESOURCE_TYPE_ID} {formname key=RESOURCE_TYPE_ID}
                                            class="form-control input-sm">
                                        <option value="">- All -</option>
                                        {foreach from=$resourceTypes key=myId item=i name=foo}
                                            {if $i.resource_type_name eq ''}
						
                                                {else}
                                                    <option value="{$i.resource_type_id}" label="{$i.resource_type_name}">
							{$i.resource_type_name}
						</option>
                                                {/if}
					{/foreach}
                                    </select>
                                </div>

                                {foreach from=$ResourceAttributes item=attribute}
                                    {control type="AttributeControl" attribute=$attribute align='vertical' searchmode=true namePrefix='r' inputClass="input-sm" class="customAttribute col-xs-12"}
                                {/foreach}

                                {foreach from=$ResourceTypeAttributes item=attribute}
                                    {control type="AttributeControl" attribute=$attribute align='vertical' searchmode=true namePrefix='rt' inputClass="input-sm" class="customAttribute col-xs-12"}
                                {/foreach}

                                <div class="btn-submit">
                                    <button type="submit" class="btn btn-success btn-sm"
                                            value="submit">{translate key=Filter}</button>
                                </div>
                                <div class="btn-clear">
                                    <button id="show_all_resources" type="button"
                                            class="btn btn-default btn-xs">{translate key=ClearFilter}</button>
                                </div>

                            </div>

                            <input type="hidden" id="sid" name="sid" value="{$ScheduleId}"/>
                            <input type="hidden" name="sds"
                                   value="{foreach from=$SpecificDates item=d}{$d->Format('Y-m-d')},{/foreach}"/>
                            <input type="hidden" name="sd" value="{$DisplayDates->GetBegin()->Format('Y-m-d')}"/>
                            <input type="hidden" {formname key=SUBMIT} value="true"/>
                            <input type="hidden" name="clearFilter" id="clearFilter" value="0"/>
                        </form>
                    </div>
                	
                </div>
                
                 <div id="reservations-left" class="col-md-12 default-box" style="margin-top: 15px;">
                    <div class="reservations-left-header">ToolTip Settings</div>

                   
                	<div class="reservations-left-content">
                	<form method="post" action="#">
                		
                		<label><input type="checkbox" name="select-all" id="select-all" /> Select All</label><br>
                		<label><input type="checkbox" class="tfields" name="fields"   value="owner" {if in_array('owner', $userFields)}checked="checked" {/if}> Owner</label><br>
                		<label><input type="checkbox" class="tfields" name="fields"   value="date_time" {if in_array('date_time', $userFields)}checked="checked" {/if}> Date and Time</label><br>
                		<label><input type="checkbox" class="tfields" name="fields"   value="duration" {if in_array('duration', $userFields)}checked="checked" {/if}> Duration</label><br>
                       <label><input type="checkbox" class="tfields" name="fields"   value="title" {if in_array('title', $userFields)}checked="checked" {/if}> Title</label><br>
                       <label><input type="checkbox" class="tfields" name="fields"  value="description" {if in_array('description', $userFields)} checked="checked" {/if}> Description</label><br>
                       <label><input type="checkbox" class="tfields" name="fields"  value="resources"  {if in_array('resources', $userFields)}checked="checked" {/if}> Resource</label><br>
                       <label><input type="checkbox" class="tfields" name="fields"  value="projectlead" {if in_array('projectlead', $userFields)} checked="checked" {/if}> Project Lead</label><br>
                       <label><input type="checkbox" class="tfields" name="fields"  value="testengineer" {if in_array('testengineer', $userFields)} checked="checked" {/if}> Test Engineers</label><br>
                       <label><input type="checkbox" class="tfields" name="fields" value="clientname" {if in_array('clientname', $userFields)} checked="checked"{/if}> Client Name</label><br>
                       <label><input type="checkbox" class="tfields" name="fields"  value="orderno" {if in_array('orderno', $userFields)} checked="checked" {/if}> Order No./Project No.</label><br>
                       <label><input type="checkbox" class="tfields" name="fields"  value="requestno" {if in_array('requestno', $userFields)} checked="checked" {/if}> Request No.</label><br>
                       <label><input type="checkbox" class="tfields" name="fields"  value="clientonsite" {if in_array('clientonsite', $userFields)} checked="checked" {/if}> Client on site</label><br>
                       <label><input type="checkbox" class="tfields" name="fields"  value="sampleonsite" {if in_array('sampleonsite', $userFields)} checked="checked" {/if}> Sample on site</label><br>
                       <label><input type="checkbox" class="tfields" name="fields"  value="billable" {if in_array('billable', $userFields)} checked="checked" {/if}> Billable</label><br>
                    </div>
                    <div class="btn-submit form-group col-xs-12" style="margin-bottom:10px;">
                    	<input type="hidden" id="userId" name="userId" value="{$userId}">
                         <button type="submit" class="btn btn-success btn-sm" value="Save" id="updateFields">Save</button>
                   </div>
                    </form>
                </div>
               </div>
				
				
				
				
                <div id="reservations" class="col-md-10 col-sm-12">
                    <div>
                        <a href="#" id="restore-sidebar" title="Show Reservation Filter"
                           class="hidden toggle-sidebar">{translate key=ResourceFilter} and Tooltip Setting <i
                                    class="glyphicon glyphicon-filter"></i> <i
                                    class="glyphicon glyphicon-chevron-right"></i></a>
                    </div>
                    {block name="reservations"}
                        {include file="Schedule/schedule-reservations-grid.tpl" }
                    {/block}
                </div>
            </div>
        {/if}
    {else}
        <div class="error">{translate key=NoResourcePermission}</div>
    {/if}
    <div class="clearfix">&nbsp;</div>
    <input type="hidden" name="scheduleId" value="{$ScheduleId}" id="scheduleId"/>

    <div class="row no-margin">
        <div class="col-sm-9 visible-md visible-lg">&nbsp;</div>
        {$smarty.capture.date_navigation}
    </div>
    {assign var=endTime value=microtime(true)}

</div>

<form id="moveReservationForm">
    <input id="moveReferenceNumber" type="hidden" {formname key=REFERENCE_NUMBER} />
    <input id="moveStartDate" type="hidden" {formname key=BEGIN_DATE} />
    <input id="moveResourceId" type="hidden" {formname key=RESOURCE_ID} />
    <input id="moveSourceResourceId" type="hidden" {formname key=ORIGINAL_RESOURCE_ID} />
    {csrf_token}
</form>

{include file="javascript-includes.tpl" Qtip=true FloatThead=true Select2=true}

{block name="scripts-before"}

{/block}

{block name="scripts-common"}

    {jsfile src="js/moment.min.js"}
    {jsfile src="schedule.js"}
    {jsfile src="resourcePopup.js"}
    {jsfile src="js/tree.jquery.js"}
    {jsfile src="js/jquery.cookie.js"}
    {jsfile src="ajax-helpers.js"}
    
    <script type="text/javascript">

		
    	$(document).ready(function () {
    		
    		
    		$("#updateFields").click(function(){
    			
    			var field = [];
    			 $("input[name='fields']:checked").each(function(){
    				 field.push(this.value);
    		     });
    		     var userId = $('#userId').val();

    		     
    			$.post("update_fields.php",
    					  {
    						field: field, userId:userId
    					  },
    					  function(data, status){
        					  alert('ToolTip Settings Updated');
        					  location.reload(); 
    					    //alert("Data: " + data + "\nStatus: " + status);
    					  });
    			  return false;
    			});
    	});
    	
        {if $LoadViewOnly}
        $(document).ready(function () {
            var scheduleOptions = {
                reservationUrlTemplate: "view-reservation.php?{QueryStringKeys::REFERENCE_NUMBER}=[referenceNumber]",
                summaryPopupUrl: "ajax/respopup.php",
                cookieName: "{$CookieName}",
                scheduleId: "{$ScheduleId}",
                scriptUrl: '{$ScriptUrl}',
                selectedResources: [{','|implode:$ResourceIds}],
                specificDates: [{foreach from=$SpecificDates item=d}'{$d->Format('Y-m-d')}',{/foreach}],
                disableSelectable: '{$IsMobile}'
            };
            var schedule = new Schedule(scheduleOptions, {$ResourceGroupsAsJson});
            {if $AllowGuestBooking}
            schedule.init();
            schedule.initUserDefaultSchedule(true);
            {else}
            schedule.initNavigation();
            schedule.initRotateSchedule();
            schedule.initReservations();
            schedule.initResourceFilter();
            schedule.initResources();
            schedule.initUserDefaultSchedule(true);
            {/if}
        });
        {else}
        $(document).ready(function () {
            var scheduleOpts = {
                reservationUrlTemplate: "{$Path}{Pages::RESERVATION}?{QueryStringKeys::REFERENCE_NUMBER}=[referenceNumber]",
                summaryPopupUrl: "{$Path}ajax/respopup.php",
                setDefaultScheduleUrl: "{$Path}{Pages::PROFILE}?action=changeDefaultSchedule&{QueryStringKeys::SCHEDULE_ID}=[scheduleId]",
                cookieName: "{$CookieName}",
                scheduleId: "{$ScheduleId|escape:'javascript'}",
                scriptUrl: '{$ScriptUrl}',
                selectedResources: [{','|implode:$ResourceIds}],
                specificDates: [{foreach from=$SpecificDates item=d}'{$d->Format('Y-m-d')}',{/foreach}],
                updateReservationUrl: "{$Path}ajax/reservation_move.php",
                lockTableHead: {$LockTableHead},
                disableSelectable: '{$IsMobile}'
            };

            var schedule = new Schedule(scheduleOpts, {$ResourceGroupsAsJson});
            schedule.init();
        });
        {/if}

        $('#schedules').select2({
            width: 'resolve'
        });

        var pageLoadTime = {round($endTime-$startTime)};
        var resourceCount = {$Resources|count};
        var dayCount = {$BoundDates|count};

        if (pageLoadTime > 10 && !cookies.isDismissed('slow-schedule-warning')) {
            $('#slow-schedule-warning').removeClass('no-show');
            $('#warning-time').text(pageLoadTime);
            $('#warning-resources').text(resourceCount);
            $('#warning-days').text(dayCount);
        }

        $('#slow-schedule-warning').find('.close-forever').on('click', function (e) {
            cookies.dismiss('slow-schedule-warning', '{$ScriptUrl}');
            $('#slow-schedule-warning').addClass('no-show');
        });
        
        $(document).ready(function(){
             {*$(location).attr('href', 'http://localhost/ul_booked/Web/schedule.php?sid=9');
           
            var url_param = $(location).attr('href').split("?");
            var param = (url_param[1]);
            alert(param);
            if(param != '') {
                alert('submit');
                return false;
            }
            var sid = $('#sid').val();
            alert(sid);*}
        });
    </script>
{/block}

{block name="scripts-after"}

{/block}

<script>
$(document).ready(function(){
	$('#select-all').click(function(event) {   
	    if(this.checked) {
	        // Iterate each checkbox
	        $('.tfields:checkbox').each(function() {
	            this.checked = true;                        
	        });
	    } else {
	        $('.tfields:checkbox').each(function() {
	            this.checked = false;                       
	        });
	    }
	});	 
});
</script>
{control type="DatePickerSetupControl"
ControlId='datepicker'
DefaultDate=$FirstDate
NumberOfMonths=$PopupMonths
ShowButtonPanel='true'
OnSelect='dpDateChanged'
FirstDay=$FirstWeekday}
<div id="GSCCModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;  </button>
        <h4 class="modal-title" id="myModalLabel">Delete</h4>
      </div>
      <div class="modal-body">
      <label>Are you sure you want to delete this?</label>
      	<textarea id="deleteReason" class="form-control" placeholder="Reason to Delete"></textarea>
      	<div class="error_message">Reason is required</div>
        <input type="hidden" name="referenceId" id="referenceId" value=""/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger save delete_reason save" id="confirmDelete"><span class="glyphicon glyphicon-trash"></span> Delete</button>
      </div>
    </div>
  </div>
</div>
{include file='globalfooter.tpl'}