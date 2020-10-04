<?php

require_once('../../config/crud.php');

$obj = new bookingClass;

$gid = $_POST['gid'];
$uid = $_POST['uid'];

$obj->addHolidaySetting($gid, $uid);


?>