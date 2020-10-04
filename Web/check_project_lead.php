<?php
require_once('../config/dbconfig.php');
$database = New Connection();
$db = $database->openConnection();
$uid = $_POST['userId'];;
$sth2 = $db->prepare("select a.*, b.* from users a inner join  reservation_users b
                    on a.user_id = b.user_id where b.user_id = '$uid' and reservation_user_level = '2'  ");
$sth2->execute();
$result1 = $sth2->fetch();
echo json_encode($result1);
