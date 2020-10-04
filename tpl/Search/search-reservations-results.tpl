{*
Copyright 2017-2019 Nick Korbel

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
    #rerank_details {
display: none;
float:right;
background: white;
position: absolute;
right:0;
border: 1px solid black;
border-radius: 6px;
width: 150px;
padding: 15px;
overflow: hidden;
text-shadow: none;
z-index: 50;
}

td.action {
  max-width: 100px;
  text-align: center;
}
</style>
<script>
$(document).ready(function() {
    $('input[type="checkbox"]').click(function() {
        var index = $(this).attr('name').substr(3);
        index--;
        $('table tr').each(function() { 
            $('td:eq(' + index + ')',this).toggle();
        });
        $('th.' + $(this).attr('name')).toggle();
    });
});

$(function () {
    
    
    
    $('a.showreranks').click(function () {
      position = $(this).position();
      $('body').append('<div class="overlay"></div>')
      $('#rerank_details').slideToggle(300);
      $('#rerank_details').css('top', position.top + 17);
      return false;
    });
});

(function (a) { 
  
  jQuery.fn.screencenter = function () {
      this.css("position","absolute");
      this.css("top", (($(window).height() - this.outerHeight()) / 2) + $(window).scrollTop() + "px");
      this.css("left", (($(window).width() - this.outerWidth()) / 2) + $(window).scrollLeft() + "px");
      return this;
  }
  
})(jQuery);
</script>
<div id="rerank_details" class="gen_comment">
        <div id="customize-column"><div class=""><div><label><input type="checkbox" name="col1" checked="checked">{translate key=OwnerUser}</label></div><div><label><input type="checkbox" checked="checked" name="col2"> {translate key=Resource}</label></div><div><label><input type="checkbox" checked="checked" name="col3"> {translate key=ProjectLead}</label></div><div><label><input type="checkbox" checked="checked" name="col4"> {translate key=Title}</label></div><div><label><input type="checkbox" checked="checked" name="col5"> {translate key=Description}</label></div><div><label><input type="checkbox" checked="checked" name="col6"> {translate key=ClientName}</label></div><div><label><input type="checkbox" checked="checked" name="col7"> {translate key=ProjOrderNo}</label></div><div><label><input type="checkbox" checked="checked" name="col8"> {translate key=RequestNo}</label></div><div><label><input type="checkbox" checked="checked" name="col9"> {translate key=BeginDate}</label></div><div><label><input type="checkbox" checked="checked" name="col10"> {translate key=EndDate}</label></div><div><label><input type="checkbox" checked="checked" name="col11"> {translate key=Duration}</label></div><div><label><input type="checkbox" checked="checked" name="col12">  {translate key=Created}</label></div><div><label><input type="checkbox" checked="checked" name="col13"> {translate key=LastModified}</label></div><div><label><input type="checkbox" checked="checked" name="col14">Billed</label></div></div></div>
        
</div>


<div id="report-actions">
		

		
		<a href="#" id="btnCustomizeColumns" class="showreranks"><span class="fa fa-filter"></span> {translate key=Columns}</a>

		
	</div>
	<button type="button" class="btn btn-success" {if $permission eq '0' AND $check eq 'user' OR $userView neq '0'} disabled {/if} id="Move_reservation">Move Reservation</button>
	
<table class="table" id="reservationTable">
	<thead>
	<tr>
		<th class="col1">{translate key=OwnerUser}</th>
		<th class="col2">{translate key=ResourcePrHr}</th>
		<th class="col3">{translate key=ProjectLead}</th>
		<th class="col4">{translate key=Title}</th>
		<th class="col5">{translate key=Description}</th>
		<th class="col6">{translate key=ClientName}</th>
		<th class="col7">{translate key=ProjOrderNo}</th>
		<th class="col8">{translate key=RequestNo}</th>
		<th class="col9">{translate key=BeginDate}</th>
		<th class="col10">{translate key=EndDate}</th>
		<th class="col11">{translate key=Duration}</th>
		<th class="col12">{translate key=Created}</th>
		<th class="col13">{translate key=LastModified}</th>
		<th class="col14">Billable</th>
		<th class="action">Move</th>
	</tr>
	</thead>
	<tbody>
	{foreach from=$Reservations item=reservation}
		{cycle values='row0,row1' assign=rowCss}
		{if $reservation->RequiresApproval}
			{assign var=rowCss value='pending'}
		{/if}
		{assign var=reservationId value=$reservation->ReservationId}
 		<tr class="{$rowCss}" data-seriesId="{$reservation->SeriesId}" data-refnum="{$reservation->ReferenceNumber}">
			<!-- <tr> -->
			<td class="user">{fullname first=$reservation->FirstName last=$reservation->LastName ignorePrivacy=($reservation->OwnerId==$UserId)}</td>
			<td class="resource">{$reservation->ResourceName}</td>
			
			<td class="user">
			    {foreach $reservation->ProjLead as $p}
    				{$p}
				{/foreach}
			</td>
			
			<td class="title">{$reservation->Title}</td>
			<td class="description">{$reservation->Description}</td>
			<td class="clientname">{$reservation->Client_name}</td>
			<td class="description">{$reservation->project_no}</td>
			<td class="description">{$reservation->Request_No}</td>
			<td class="date">{formatdate date=$reservation->StartDate timezone=$Timezone key=short_reservation_date}</td>
			<td class="date">{formatdate date=$reservation->EndDate timezone=$Timezone key=short_reservation_date}</td>
			<td class="duration">{$reservation->GetDuration()->__toString()}</td>
			<td class="created">{formatdate date=$reservation->CreatedDate timezone=$Timezone key=short_datetime}</td>
			<td class="created">{formatdate date=$reservation->ModifiedDate timezone=$Timezone key=short_datetime}</td>
			<td class="description">{if $reservation->billable eq '1'}Yes{else}No{/if}</td>
			<td class="action no-edit">
			<input type="checkbox"  {if $permission eq '0' AND $check eq 'user' OR $userView neq '0'}  disabled {/if} value="{$reservation->SeriesId}" name="reservations[]"><input type="hidden" name="timezone" id="timezone" value="{$Timezone}"></td>
		</tr>

		{*<label>{translate key='CheckInTime'}</label> {formatdate date=$reservation->CheckinDate timezone=$Timezone key=short_datetime}*}
		{*</div>*}
		{*<div>*}
		{*<label>{translate key='CheckOutTime'}</label> {formatdate date=$reservation->CheckoutDate timezone=$Timezone key=short_datetime}*}
		{*</div>*}
		{*<div>*}
		{*<label>{translate key='OriginalEndDate'}</label> {formatdate date=$reservation->OriginalEndDate timezone=$Timezone key=short_datetime}*}


	{/foreach}
	</tbody>
</table>
<script type="text/javascript">
	$(document).ready(function () {
		$('#report-no-data, #report-results').trigger('loaded');
		
		 $("#Move_reservation").click(function(){
		    	var reservationChecked = []
		    	var timezone = $('#timezone').val();
		        $("input[name='reservations[]']:checked").each(function ()
		        {
		        	reservationChecked.push(parseInt($(this).val()));
		        });
				
		    	 
				$.post("move_action.php",
						  {
						    seriesId: reservationChecked,
						    timezone:timezone
						  },
						  function(data, status){
							  $('.modal-body').html(data);
							  $('#dataModal').modal('show');
						  });
		    	
		    });
	});
</script>
<style>
    .modal.modal-wide .modal-dialog {
  width: 90%;
}

.modal-wide .modal-body {
  overflow-y: auto;
}
</style>
<div id="dataModal" class="modal fade modal-wide">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Move Reservation</h4>  
                </div>  
                <div class="modal-body">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     <button type="button" class="btn btn-success" id="updateMove">Update</button>
                </div>  
           </div>  
      </div>  
 </div>