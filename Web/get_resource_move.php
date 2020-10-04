<?php
    require_once('../config/crud.php');
    $obj = new bookingClass;
    
    $res = $obj->getReservationsResources($_POST['referenceNo']);
    $rid = array();
    foreach ($res as $row) {
        echo $row['name'].'<br>';
        $rid[] = $row['resource_id'];
    }
   
?>
		
		<input type="hidden" value="<?php foreach($rid as $rd) { echo $rd.','; }?>" name="resource_id[]">
