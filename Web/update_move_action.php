<?php
    require_once('../config/crud.php');
    $obj = new bookingClass;
    
    $check = $obj->checkUpdateMove($_POST['reference_number'],$_POST['series_id'],$_POST['BeginDate'],$_POST['BeginTime'],$_POST['EndDate'],$_POST['EndTime'],$_POST['timezone']);
    
    //$res = $obj->updateResourceMove($_POST['reference_number'],$_POST['series_id'],$_POST['BeginDate'],$_POST['BeginTime'],$_POST['EndDate'],$_POST['EndTime'],$_POST['timezone'],$_POST['until'],$_POST['resource_id']);
    
    $info = $obj->getInformation($_POST['series_id']);
   
    ?>
    <div id="reservation-response-image" align="center">
		<span class="fa fa-check fa-5x success"></span>
	</div>
	<div style="font-size: 2em; font-weight:bold;" align="center">Your reservation was successfully Move!</div>
	<div align="center"><?php  $res = $obj->updateResourceMove($_POST['reference_number'],$_POST['series_id'],$_POST['BeginDate'],$_POST['BeginTime'],$_POST['EndDate'],$_POST['EndTime'],$_POST['timezone'],$_POST['until'],$_POST['resource_id']); ?></div>
  	
    