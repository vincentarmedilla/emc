<?php
require_once('../../config/crud.php');

$obj = new bookingClass;


$hid1 = $_POST['hid1'];


$data = $obj->deleteHolidaySetting($hid1);


echo json_encode($data);


