<?php
require_once('../config/crud.php');

$obj = new bookingClass;

echo $obj->deleteReservation($_POST['id']);