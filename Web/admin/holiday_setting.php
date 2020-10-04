<?php
require_once('../../config/crud.php');

$obj = new bookingClass;

/* $begin = $_POST['Bd'].' '.$_POST['Bt'];
 $end = $_POST['Ed'].' '.$_POST['Et'];
 */


$begin = $_POST['beginDate'];
$end = $_POST['endDate'];
$reason = $_POST['reason'];
$schedule = $_POST['scheduleId'];
$createdby = $_POST['fname'].' '.$_POST['lname'];

//pass vairable to check for duplicate
$data = $obj->addHolidaySetting($begin, $end, $reason, $schedule, $createdby);


echo json_encode($data);


