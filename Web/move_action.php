<?php
error_reporting(0);
@ini_set('display_errors', 0);
    require_once('../config/crud.php');
    
    $obj = new bookingClass;
   
  
  
    $res = $obj->getReservations($_POST['seriesId']);
    
    $layout = $obj->getLayout($_POST['timezone']);
    
    $bl = $obj->getTimeBlocks($layout['layout_id']);
    
    //echo '<pre>';print_r($bl);echo '</pre>';
    //ECHO '<pre>';print_r($obj->getReservations($_POST['seriesId']));ECHO '</pre>';
?>
<style>
th, td {
  padding: 8px;
}
div[disabled]
{
  pointer-events: none;
  opacity: 0.7;
}
</style>
<script>
$(document).ready(function () {
	$("input[id^='series_id']").each(function() {
		var id = $(this).val();
		$('.s_'+id).keyup(function() {
			 
			});
	});
	
	//$('#list-resources-panel').find('input:hidden').each(function(){
	$("input[id^='reference_number']").each(function() {
		var referenceNo = $(this).val();
		
		$( "#BeginDate"+referenceNo ).datepicker();
		

	 	$( "#EndDate"+referenceNo ).datepicker();


	 	$( "#Until"+referenceNo ).datepicker();
		$.ajax({
			url: 'get_resource_move.php',
			type: 'POST',
			data: jQuery.param({ referenceNo: referenceNo}) ,
			cache: false,
			success: function (response) {
				$("#resource"+referenceNo).html(response);
				//alert(response);
			},
			error: function () {
				//alert("error");
			}
		});
	});

	 $('#updateMove').click(function() {
		
             $.ajax({
     			url: 'update_move_action.php',
     			type: 'POST',
     			data: $('#moveAction :input').serialize(),
     			cache: false,
     			success: function (response) {
     				
     				$('#confirmBox .modal-body-confirm').html(response);
     				 $("#confirmBox").modal();
         			//alert('Updated');
         			//location.reload();
     				//$("#resource"+sid).html(response);
     				//alert(response);
     			},
     			error: function () {
     				//alert("error");
     			}
     		});
             e.preventDefault();
         });

	 $( ".close_confirmation" ).click(function() {
		    location.reload();
		});
	 
});

</script>

<!-- Modal -->
  <div class="modal fade" id="confirmBox">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        
        <div class="modal-body-confirm">
          	
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default close_confirmation" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
    
<div id="moveAction">
<table style="width:100%" id="list-resources-panel">
  <tr>
    <th>Reference No<input type="hidden" value="<?php echo str_replace("/","GGG",$_POST['timezone']);?>" name="timezone"></th>
    <th>Resource (PR/HR)</th>
    <th>Order No./Project No.</th>
    <th>Begin</th>
    <th>End</th>
    <th>New Begin</th>
    <th>New End</th>
    <th>Until</th>
  </tr>
  <?php foreach ($res as $row) { 
      $stime = $row['start_date'];
      $stime = new DateTime($stime, new DateTimeZone('UTC'));
      $stime->setTimezone(new DateTimeZone($_POST['timezone']));
      $st1 = $stime->format("H:i:s");
      $st = $stime->format("Y-m-d H:i:s");
      $stw = $stime->format("Y-m-d");
      
      $etime = $row['end_date'];
      $etime = new DateTime($etime, new DateTimeZone('UTC'));
      $etime->setTimezone(new DateTimeZone($_POST['timezone']));
      $et1 = $etime->format("H:i:s");
      $et = $etime->format("Y-m-d H:i:s");
      $etw = $etime->format("Y-m-d");
   ?>
  <tr>
    <td><?php echo $row['reference_number'];?></td>
    <td><div id="resource<?php echo $row['reference_number'];?>"></div><input type="hidden" name="reference_number[]" id="reference_number" class="reference_number" value="<?php echo $row['reference_number'];?>">
    <input type="hidden" name="series_id[]" id="series_id" class="series_id" value="<?php echo $row['series_id'];?>">
   
    </td>
    <td><?php echo $row['project'];?></td>
    <td><?php echo date('m/d/Y h:i A', strtotime($st));?></td>
    <td><?php echo date('m/d/Y h:i A', strtotime($et));?></td>
    <td>
     <!--<div <?php if($row['repeat_type'] != 'none') {?> disabled  <?php }?>>-->
    	<input type="text" id="BeginDate<?php echo $row['reference_number'];?>" name="BeginDate[]" class="form-control input-sm inline-block dateinput" value="<?php echo date('m/d/Y', strtotime($stw));?>"/>
    	<select name="BeginTime[]">
    		<?php foreach ($row['d'] as $b) {?>
    		<option <?php if($b['start_time'] == $st1) {?> selected <?php }?> value="<?php echo $b['start_time']; ?>"><?php $date = new DateTime($b['start_time']);     echo $date->format('h:i a') ;?></option>
    		<?php } ?>
    	</select>
    </td>
    <!-- </div>-->
    <td>
    <!--  <div <?php if($row['repeat_type'] != 'none') {?> disabled  <?php }?>>-->
    
    	<input type="text" id="EndDate<?php echo $row['reference_number'];?>" name="EndDate[]" class="form-control input-sm inline-block dateinput" value="<?php echo date('m/d/Y', strtotime($etw));?>"/>
    	<select name="EndTime[]">
    		<?php foreach ($row['d'] as $b) {?>
    		<option <?php if($b['end_time'] == $et1) {?> selected <?php }?> value="<?php echo $b['end_time'];?>"><?php $date = new DateTime($b['end_time']);     echo $date->format('h:i a') ;?></option>
    		<?php } ?>
    	</select>
   
     <!--</div>-->
    </td>
    <td><div <?php if($row['repeat_type'] != 'none') {?> disabled  <?php }?>><?php $str = explode("=",$row['repeat_options']); $d = explode(" ",$str[2]);  ?> <input value="<?php echo $d[0] ?>" type="text" name="until[]" id="Until<?php echo $row['reference_number'];?>" class="form-control input-sm inline-block dateinput s_<?php echo $row['series_id'];?>"></div> </td>
  </tr>
  <?php } ?>
</table>

</div>

