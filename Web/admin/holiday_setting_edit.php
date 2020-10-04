<?php
require_once('../../config/crud.php');

$obj = new bookingClass;

/* $begin = $_POST['Bd'].' '.$_POST['Bt'];
 $end = $_POST['Ed'].' '.$_POST['Et'];
 */



$begin = $_POST['beginDateUpdate'].' '.$_POST['startTimeUpdate'];
$end = $_POST['endDateUpdate'].' '.$_POST['endTimeUpdate'];
$reason = $_POST['reasonUpdate'];
$schedule = $_POST['updateScheduleId'];
$hid = $_POST['hid'];



$data = $obj->updateHolidaySetting($begin, $end, $reason, $schedule, $hid);


echo json_encode($data);


