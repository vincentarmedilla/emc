<?php
require_once('../config/crud.php');

$obj = new bookingClass;

$obj->countDoubleBooking($_POST['unavailableResourceId']);