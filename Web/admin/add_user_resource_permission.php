<?php
/*require_once('../../config/crud.php');

$obj = new bookingClass;

$gid = $_POST['gid'];
$uid = $_POST['uid'];

//pass vairable to check for duplicate
$check = $obj->insertGroupUsers($gid,$uid);

echo $check;*/


require_once('../../config/crud.php');

$obj = new bookingClass;

$rid = $_POST['rid'];
$uid = $_POST['uid'];

//pass vairable to check for duplicate
$check = $obj->insertUsersResource($rid, $uid);

echo $check;


?>