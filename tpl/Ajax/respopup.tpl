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
<style>
    .customAttribute {
        float: left;
        padding-right: 10px;
    }
    .attributeValue {
        float:left;
    }
    .temp {
    border: 2px solid #408AD2 ;
    text-align:center;
    }
</style>
{if $status eq '2'}
<div style="background-color: #408AD2 ; color:white;text-align:center;">CONFIRMED/RESERVED</div>
{else}
<div class="temp">TEMPORARY</div>
{/if}

{if $authorized}
	{if in_array('owner', $userFields)}
    {$fullName} ({$email}) <br>
    {/if}
    
    {if in_array('date_time', $userFields)}
    <strong>Date and Time:</strong> <!--  {assign var="key" value="res_popup"}-->
    {formatdate date=$startDate key=res_popup} - {formatdate date=$endDate key=$key} <br>
    {if $startDate->DateEquals($endDate)}
        {assign var="key" value="res_popup_time"}
    {/if}
    {/if}
    
    {if in_array('duration', $userFields)}
<!--    {formatdate date=$startDate key=res_popup} - {formatdate date=$endDate key=$key} <br> -->
    <strong>Duration:</strong> {$duration} <br>
    {/if}
    
    {if in_array('title', $userFields)}
    <strong>Title:</strong> {if $title neq ''}<div style="width:300px;">{$title}</div><!--{$title|truncate:30:"...":true}-->{else}{translate key=NoTitleLabel}{/if}<br>
    {/if}
    
    {if in_array('description', $userFields)}
    <strong>Description:</strong> {if $summary neq ''}<div style="width:300px;">{$summary}</div><!--  {$summary|truncate:30:"..."|nl2br}-->{else}{translate key=NoDescriptionLabel}{/if} <br>
    {/if}
    
     {if in_array('resources', $userFields)}
    <strong>Resource:</strong>
<!--      <pre>{$engineers|@print_r}</pre> -->
<!--     {foreach from=$resources item=resource name=resource_loop} -->
<!--     	{assign var="newname" value=" "|explode:$resource->Name()} -->
<!--     	{capture assign=fullname}{$newname[1]} {$newname[2]}{/capture} -->
<!--     	 {if !in_array($fullname, $eng)} -->
<!--         <div>{$resource->Name()}</div> -->
<!--         {/if} -->
<!--         {if !$smarty.foreach.resource_loop.last} {/if} -->
<!--     {/foreach} <br> -->

	{foreach from=$resource item=value}
		{if $value.userid eq ''}
			<div>{$value.name}</div>
		{/if}
        
        
    {/foreach}<br>
     {/if}
    
    {if in_array('projectlead', $userFields)}
    <strong>Project Lead:</strong>  {foreach from=$participants item=user name=participant_loop}
    {if !$user->IsOwner()}
        {fullname first=$user->FirstName last=$user->LastName}
    {/if}
    {if !$smarty.foreach.participant_loop.last}, {/if}
{/foreach}<br>
{/if}
	
	 
	 {if in_array('testengineer', $userFields)}
    <strong>Test Engineers:</strong>
    <div style="width:300px;">
    {foreach from=$engineers item=value}
        {$value.fullname},
    {/foreach}
    </div>
    {*<pre>{$engineers|print_r}</pre>*}
    <br>
    {*<strong>Accessories:</strong>  {foreach from=$accessories item=accessory name=accessory_loop}
    {$accessory->Name} ({$accessory->QuantityReserved})
    {if !$smarty.foreach.accessory_loop.last}, {/if}
{/foreach}<br>*}
	{/if}
	
	{if in_array('clientname', $userFields)}  
    <div><strong>Client Name:</strong> {$client_name}</div>
    {/if}
    
    {if in_array('orderno', $userFields)}  
    <strong>Order No./Project No.:</strong> {$project}<br>
    {/if}
    
    {if in_array('requestno', $userFields)}  
    <strong>Request No.:</strong> {$request_no}<br>
     {/if}
     
     {if in_array('clientonsite', $userFields)}
    <strong>Client on site:</strong> {$cos}<br>
    {/if}
    
     {if in_array('sampleonsite', $userFields)}
    <strong>Sample on site:</strong> {$sos}<br>
    {/if}
	
	{if in_array('billable', $userFields)}
    <strong>Billable:</strong> {if $billable eq '1'} Yes {else} No {/if}
    {/if}
    
    
    
    {*{foreach from=$attributes item=attribute}
        {assign var=attr value="att`$attribute->Id()`"}
        {capture name="attr"}
            {control type="AttributeControl" attribute=$attribute readonly=true}<br>
        {/capture}
        {$smarty.capture.attr}
        {$formatter->Add($attr, $smarty.capture.attr)}
    {/foreach}*}


{/if}

{*
{if $authorized}
    <div class="res_popup_details" style="margin:0">

        {capture "name"}
            <div class="user">
                {if $hideUserInfo || $hideDetails}
                    {translate key=Private}
                {else}
                    {$fullName}
                {/if}
            </div>
        {/capture}
        {$formatter->Add('name', $smarty.capture.name)}

        {capture "email"}
            <div class="email">
                {if !$hideUserInfo && !$hideDetails}
                    {$email}
                {/if}
            </div>
        {/capture}
        {$formatter->Add('email', $smarty.capture.email)}

        {capture "phone"}
            <div class="phone">
                {if !$hideUserInfo && !$hideDetails}
                    {$phone}
                {/if}
            </div>
        {/capture}
        {$formatter->Add('phone', $smarty.capture.phone)}

        {capture "dates"}
            {assign var="key" value="res_popup"}
            {if $startDate->DateEquals($endDate)}
                {assign var="key" value="res_popup_time"}
            {/if}
            <div class="dates">{formatdate date=$startDate key=res_popup} - {formatdate date=$endDate key=$key}</div>
        {/capture}
        {$formatter->Add('dates', $smarty.capture.dates)}

        {capture "title"}
            {if !$hideDetails}
                <div class="title">{if $title neq ''}{$title}{else}{translate key=NoTitleLabel}{/if}</div>
            {/if}
        {/capture}
        {$formatter->Add('title', $smarty.capture.title)}

        {capture "resources"}
            <div class="resources">
                {translate key="Resources"} ({$resources|@count}):
                {foreach from=$resources item=resource name=resource_loop}
                    {$resource->Name()}
                    {if !$smarty.foreach.resource_loop.last}, {/if}
                {/foreach}
            </div>
        {/capture}
        {$formatter->Add('resources', $smarty.capture.resources)}

        {capture "participants"}
            {if !$hideUserInfo && !$hideDetails}
                <div class="users">
                    *}
{*{translate key="Participants"} ({$participants|@count}):*}{*

                    Project Lead:
                    {foreach from=$participants item=user name=participant_loop}
                        {if !$user->IsOwner()}
                            {fullname first=$user->FirstName last=$user->LastName}
                        {/if}
                        {if !$smarty.foreach.participant_loop.last}, {/if}
                    {/foreach}
                </div>
            {/if}
        {/capture}
        {$formatter->Add('participants', $smarty.capture.participants)}

        {capture "accessories"}
            {if !$hideDetails}
                <div class="accessories">
                    {translate key="Accessories"} ({$accessories|@count}):
                    {foreach from=$accessories item=accessory name=accessory_loop}
                        {$accessory->Name} ({$accessory->QuantityReserved})
                        {if !$smarty.foreach.accessory_loop.last}, {/if}
                    {/foreach}
                </div>
            {/if}
        {/capture}
        {$formatter->Add('accessories', $smarty.capture.accessories)}

        {capture "description"}
            {if !$hideDetails}
                <div class="summary">{if $summary neq ''}{$summary|truncate:300:"..."|nl2br}{else}{translate key=NoDescriptionLabel}{/if}</div>
            {/if}
        {/capture}
        {$formatter->Add('description', $smarty.capture.description)}

        {capture "attributes"}
            {if !$hideDetails}
                {if $attributes|count > 0}
                    <br/>
                    {foreach from=$attributes item=attribute}
                        {assign var=attr value="att`$attribute->Id()`"}
                        {capture name="attr"}
                            <div>{control type="AttributeControl" attribute=$attribute readonly=true}</div>
                        {/capture}
                        {$smarty.capture.attr}
                        {$formatter->Add($attr, $smarty.capture.attr)}
                    {/foreach}
                {/if}
            {/if}
        {/capture}
        {$formatter->Add('attributes', $smarty.capture.attributes)}

        {capture "pending"}
            {if $requiresApproval}
                <div class="pendingApproval">{translate key=PendingApproval}</div>
            {/if}
        {/capture}
        {$formatter->Add('pending', $smarty.capture.pending)}

        {capture "duration"}
            <div class="duration">{$duration}</div>
        {/capture}
        {$formatter->Add('duration', $smarty.capture.duration)}
        <!-- {$ReservationId} -->

        {$formatter->Display()}
    </div>
{else}
    {translate key='InsufficientPermissionsError'}
{/if}*}
