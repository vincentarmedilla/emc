<?php
require_once('../config/crud.php');

$obj = new bookingClass;

$obj->checkBloked($_POST['unavailableResourceId']);
