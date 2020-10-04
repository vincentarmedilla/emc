  $(document).ready(function() {
   				    $('#addHolidayBtn').on('click', function() {
				        var beginDate = $('#beginDate').val();
				        var endDate = $('#endDate').val();
				        var reason = $('#reason').val();
				        var scheduleId  = $('#addScheduleId').val();
				        var fname = $('#fname').val();
				        var lname = $('#lname').val();
				        var values = [];
				        var val;
				        var allSched = $("#addScheduleId option:selected").text();

				        
				        if(allSched == "All Schedules"){ 
				        	 $.each($('#addScheduleId').prop('options'), function () {
				                 values.push(this.value);   
				             });
				        	 values.shift();
				        	 scheduleId = values;
					    }
				          
					    if(reason!="" && beginDate!="" && endDate!="" && scheduleId!=""){
					            $.ajax({
					                url: "holiday_setting.php",
					                type: "POST",
					                data: {
					                    beginDate: beginDate,
					                    endDate: endDate,
					                    reason: reason,
					                    scheduleId: scheduleId.toString(),
					                    fname: fname,
					                    lname: lname               
					                },
					                cache: false,
					                success: function(dataResult){
					                	showWaitBox();
					                	location.reload();
					                }
					            });
					    }
					    
					    if(reason==""){
					        	document.getElementById("reason").style.borderColor = "#AB1D26";
					    }
					    if(beginDate==""){
				        	document.getElementById("beginDate").style.borderColor = "#AB1D26";
				        }
					    if(endDate==""){
				        	document.getElementById("endDate").style.borderColor = "#AB1D26";
				        }
					    if(scheduleId==""){
				        	document.getElementById("bcolor").style.borderColor = "#AB1D26";
				        }					    
			        });
    });
    
	$(document).ready(function () {
		$('#filter-resources-panel').showHidePanel();
	});
	
	$(document).ready(function(){
		$('.edit').on('click',function(e){
			e.preventDefault();	
			var tr = $(this).parents('tr'); 
		    var id = tr.attr('data-value');
		    var userId = $('#userId').val();
		    
			    $.ajax({
				    url: 'holiday_setting_edit_modal.php',
				    type: 'post',
				    data: {
				    	id: id,
				    	userId: userId
				    },
				    success: function(response){ 
				      // Add response in Modal body
				      $('#modalBodyUpdate').html(response);
				      // Display Modal
				      $('#empModal').modal('show'); 
				    }
			    });
		    
		 });
	});
	
	$(document).ready(function() {
		  $('#updateHolidayBtn').on('click', function() {
	        var beginDateUpdate = $('#beginDateUpdate').val();
	        var endDateUpdate = $('#endDateUpdate').val();
	        var reasonUpdate = $('#reasonUpdate').val();
	        var updateScheduleId = $('#updateScheduleId').val();
            var hid = $('#hid').val();
            
            var allSched = $("#updateScheduleId option:selected").text();
            var values = [];
          
	        if(allSched == "All Schedules"){ 
	        	 $.each($('#updateScheduleId').prop('options'), function () {
	                 values.push(this.value);   
	             });
	        	 values.shift();
	        	 updateScheduleId = values;
		    }
          
            if(reasonUpdate!=""){ 
                   $.ajax({
		                url: "holiday_setting_edit.php",
		                type: "POST",
		                data: {
		                	beginDateUpdate: beginDateUpdate,
		                	endDateUpdate: endDateUpdate,
		                	reasonUpdate: reasonUpdate,
		                	updateScheduleId: updateScheduleId.toString(),
                            hid: hid
		                },
		                cache: false,
		                success: function(dataResult){
		                	$('#empModal').modal('hide'); 
                          showWaitBox();    
                          location.reload();
		                }
		            });
            } else {
         	    document.getElementById("reasonUpdate").style.borderColor = "#AB1D26";
	            document.getElementById("updateScheduleId").borderColor = "#AB1D26";
     
            }
		            
      });
  });
	
	$(document).ready(function(){
		$('#deleteButton').on('click',function(e){
			e.preventDefault();	
			var hid1 = document.getElementById("hid1").value;
		  $.ajax({
		    url: 'holiday_setting_delete.php',
		    type: 'post',
		    data: {
		    	hid1: hid1
		    },
		    cache: false,
		    success: function(){ 
		      $('#deleteDialog').modal('hide');
		      location.reload();
		    }
		  });
		 });
	});
	
	
	$(document).ready(function(){
		$('.delete').on('click',function(e){
			e.preventDefault();	
			var tr = $(this).parents('tr'); 
		    var hid1 = tr.attr('data-value');
		    document.getElementById("hid1").value = hid1;
		    
			   $('#deleteDialog').modal('show'); 
			});
	});
	
	
	
	$(document).ready(function(){
		$('#clearFilter').on('click',function(e){
			e.preventDefault();	
			$('#addHolidayForm')[0].reset();
			 $('#addScheduleId').val('').trigger('change');
		 });
	});	
	
   function hideDialog(){
	   $('#deleteDialog').modal('hide');
	   showWaitBox();
	   location.reload();
   }	
	
	function showWaitBox() {
		$.blockUI({message: $('#wait-box')});
		$('#creatingNotification').show();
	}
	
	
	
	$.blockUI.defaults.css.width = '60%';
	$.blockUI.defaults.css.left = '20%';
	
	