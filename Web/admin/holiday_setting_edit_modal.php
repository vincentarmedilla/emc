<script type="text/javascript" src="../scripts/admin/holidaysetting.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
        
    
<?php
require_once("../../config/crud.php");

    
$host = "localhost"; /* Host name */
$user = "dev_emc"; /* User */
$password = "w~m3UY((.dU!^MK)"; /* Password */
$dbname = "qa"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


$holidayId = $_POST["id"];
$userId = $_POST["userId"];
$resGrpId = array();

$obj = new bookingClass;
$gk = array();

$sql = "SELECT * FROM holiday_setting where id=".$holidayId;
$result = mysqli_query($con,$sql);


$grpId = "SELECT *  FROM user_groups WHERE user_id='$userId'";
$resGrpId = mysqli_query($con,$grpId);



while($gid = mysqli_fetch_array($resGrpId)){
    $gk[] = $gid["group_id"];
}

$schedule_result = $obj->fetchScheduleByGroup($gk);

?>
<?php
 while($row = mysqli_fetch_array($result) ){
    
     $begin = $row['begin'];
     $end = $row['end'];
     $reason = $row['reason'];
     
     
     $strTokBegDate = $begin;
     $strTokEndDate = $end;
     
     
     $begDate = strtok($strTokBegDate,  ' ');
     
     $endDate = strtok($strTokEndDate, ' ');
?>
     
     <div style="width:800px; height:200px">
     
                         <div>  </br>&nbsp;&nbsp;&nbsp;&nbsp;
                                <label for="beginDateUpdate" class="reservationDate">Begin</label>&nbsp;&nbsp;&nbsp;&nbsp;
            					<input id="beginDateUpdate" name="beginDateUpdate" type="text" class="form-control dateinput inline" style="width:150px;"
            						   value="<?php echo $begDate?>"/>
                                 <input type="hidden" value="<?php echo $holidayId?>" id="hid"/>
                         </div>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                         <div style="position:absolute;top:15%;left:50%;">
                                <label for="endDateUpdate" class="reservationDate">End</label>&nbsp;&nbsp;&nbsp;&nbsp;
            					<input id="endDateUpdate" name="endDateUpdate" type="text" class="form-control dateinput inline"  style="width:150px;"
            						   value="<?php echo $endDate?>"/>
                         </div></br>
                         <div> &nbsp;&nbsp;&nbsp;&nbsp;
                               <label for="reasonUpdate" class="reservationDate">Reason</label>&nbsp;&nbsp;&nbsp;&nbsp; 
                               <input type="text" id="reasonUpdate" name="reasonUpdate" required  value="<?php echo $reason?>" style="width:300px;"
    													  class="form-control dateinput inline"/>
    						    <i class="glyphicon glyphicon-asterisk form-control-feedback" data-bv-icon-for="reason" style="position:absolute;top:39%;left:37%;"></i>
                         </div>
                         <div style="position:absolute; top:38%; left:57%; width:300px;">  
					               <select id="updateScheduleId" name="updateScheduleId" class="form-control selectpicker" data-live-search="true">
					                                <option value="">All Schedules</option>
					               				<?php foreach ($schedule_result as $row) { ?>
					               				    <option value="<?php echo $row['name'];?>"> <?php echo $row['name'];?> </option>
                                                <?php } ?>       
						           </select>
                         </div>
                         <div style="position:absolute; top:63%; left:72%;">
                                   <button type="cancel" class="btn btn-default btn-sm" data-dismiss="modal" onclick="closeModal()">
                                          Cancel
                                   </button>                            
                         </div>
                         <div style="position:absolute; top:63%; left:79%;">   
						           <button type="button" class="btn btn-success save btn-sm" id="updateHolidayBtn">
                                          <span class="glyphicon glyphicon-ok-circle"></span>
                                          Update
                                   </button>
                         </div>
     </div>
            
<?php } ?>

<script type="text/JavaScript">
          var x = document.getElementById("empModal");
          function closeModal() {
                 x.close;
          } 

          $(document).ready(function () { $( "#beginDateUpdate").datepicker();});
          $(document).ready(function () { $( "#endDateUpdate").datepicker();});
          $('.selectpicker').selectpicker();
</script>





