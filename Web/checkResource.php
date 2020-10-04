<?php
require_once('../config/crud.php');
$obj = new bookingClass;

$datas = $obj->getUnAvailableResource($_POST['unavailableResourceId']);

echo json_encode($datas);
