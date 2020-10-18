<?php
include 'dbconfiguration.php';

class bookingClass {
    private $host="localhost";
    private $user="root";
    private $db="qa";
    private $pass="";
    private $conn;

    public function __construct(){

        $this->conn = new PDO("mysql:host=".constant("dbhost").";dbname=".constant("dbase"),constant("dbuser"),constant("dbpass"),array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ));
    }
    
    //close connection
    public function closeConnection()
    {
        $this->conn = nulll;
    }

    //fetch resource by group
    public function fetchResourceByGroup($group_id)
    {
        $ids = join(', ', $group_id);
        $resources = $this->conn->prepare("select * from resources where admin_group_id IN ($ids)");
        $resources->execute();
        return $resources->fetchAll();
    }

    public function getAllUsersGroups($uid)
    {
        $ids = join(', ', $uid);
        $resources = $this->conn->prepare("select * from users where user_id IN ($ids)");
        $resources->execute();
        return $resources->fetchAll();
    }

    public function fetchUserId($gid)
    {
        $ids = join(',', $gid);
        $resources = $this->conn->prepare("select * from user_groups where group_id IN ($ids)");
        $resources->execute();
        return $resources->fetchAll();
    }

    public function get__group_id($group_id)
    {
        $resources = $this->conn->prepare("select * from groups where group_id = '$group_id'");
        $resources->execute();
        return $resources->fetch();
    }
    
    public function getResourceType($scheduleId)
    {
       
        $type = $this->conn->prepare("SELECT  a.resource_type_id, b.* from  resources a
                                    left join resource_types b on a.resource_type_id = b.resource_type_id
                                    where a.schedule_id = '$scheduleId' GROUP BY b.resource_type_name");
        $type->execute();
        return $type->fetchAll();
    }
    
    public function getResourceTypeName($resourceTypeId)
    {
        $ids = join(',', $resourceTypeId);
        $name = $this->conn->prepare("select * from resource_types where resource_type_id IN ($ids)");
        $name->execute();
        return $name->fetchAll();
    }
    
    public function getResourceTypeByGroupId($groupId) {
        $query = $this->conn->prepare("select a.resource_type_id,b.* from resources a "
                . "left join resource_types b on a.resource_type_id = b.resource_type_id "
                . "where a.admin_group_id = '$groupId' GROUP BY b.resource_type_name");
        $query->execute();
        return $query->fetchAll();
    }
    
    public function getGroup($gid)
    {
        $resources = $this->conn->prepare("select * from groups where gid = '$gid'");
        $resources->execute();
        return $resources->fetchAll();
    }
    
    

    public function get_all_group_id($group_id)
    {
        $resources = $this->conn->prepare("select * from groups where group_id = '$group_id' or admin_group_id = '$group_id'");
        $resources->execute();
        return $resources->fetchAll();
    }
    
    
    public function gerResource($rid)
    {
        $resources = $this->conn->prepare("select * from resources where resource_id = '$rid'");
        $resources->execute();
        return $resources->fetch();
    }

    public function getAllUsers()
    {
        $resources = $this->conn->prepare("select * from users");
        $resources->execute();
        return $resources->fetchAll();
    }

    public function getReservationInstance($refid)
    {
        $resources = $this->conn->prepare("select * from reservation_instances where reference_number = '$refid'");
        $resources->execute();
        return $resources->fetch();
    }

    public function getReservationInstanceSeries($rid)
    {
        $sth = $this->conn->prepare("SELECT a.*,b.* from  reservation_instances a
                                    inner join reservation_series b on a.series_id = b.series_id
                                    where a.reference_number = '$rid' ");
        $sth->execute();
        return $sth->fetch();
    }

    public  function getProjectLead($reservInstanceId)
    {
        $sth = $this->conn->prepare("SELECT a.*,b.* from  reservation_users a
                                    inner join users b on a.user_id = b.user_id
                                    where a.reservation_instance_id = '$reservInstanceId' AND reservation_user_level = 2");
        $sth->execute();
        return $sth->fetchAll();
    }
    

    public function getMainResource($rid)
    {
        $sth = $this->conn->prepare("SELECT a.*,b.*,c.* from  reservation_instances a
                                    left join reservation_resources b on a.series_id = b.series_id
                                    left join resources c on b.resource_id = c.resource_id
                                    where a.reference_number = '$rid' and  b.resource_level_id = '1'");
        $sth->execute();
        return $sth->fetch();
    }

    public function getTestEngineers($id)
    {
        $e = $this->conn->prepare("select a.*,b.user_id,b.lname,b.fname, concat(b.fname,' ',b.lname) AS fullname from reservation_users a
                                    inner join users b on a.user_id = b.user_id
                                    where a.reservation_instance_id = '$id' and reservation_user_level = '3'");

        $e->execute();
        return $e->fetchAll(PDO::FETCH_ASSOC);
    }

    //fetch schedule by group
    public function fetchScheduleByGroup($group_id)
    {
        $ids = join(', ', $group_id);
        $schedule = $this->conn->prepare("select * from schedules where admin_group_id IN ($ids)");
        $schedule->execute();
        return $schedule->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function AllSchedule()
    {
        $schedule = $this->conn->prepare("select * from schedules");
        $schedule->execute();
        return $schedule->fetchAll(PDO::FETCH_ASSOC);
    }

    //fetch users by group assigned
    public function getUsers($group_id)
    {
        
        //get the id groups based on user groups
        $g = array();
        foreach($group_id as $value) {
            $query_get_group = $this->conn->prepare("select * from groups where group_id = '$value' or admin_group_id  = '$value'");
            $query_get_group->execute();
            $j = $query_get_group->fetch();
            
            $query_get_group1 = $this->conn->prepare("select * from groups where gid = '$j[gid]'");
            $query_get_group1->execute();
            $g[] = $query_get_group1->fetchAll();
        }
        
       
        $t = array_reduce($g, 'array_merge', array());
        //print_r($t);
        //list of user based on group id
        $group_users = array();
        foreach($t as $value) {
            $gid =  $value['group_id'];
            $sth = $this->conn->prepare("select a.*,b.lname,b.fname,b.email,b.user_id as uid,c.resource_id,c.name from user_groups a
                                left join users b on a.user_id = b.user_id
                                left join resources c on b.user_id = c.userid
                                where a.group_id = '$gid'");
            $sth->execute();
            $result_group = $sth->fetchAll();
            $group_users[] = $result_group;
        }

        $convert_users= array_reduce($group_users, 'array_merge', array());

        $lead_users = array();
        foreach ($convert_users as $key => $value) {
            $lead_users[$value['user_id']] = $value;
        }

        return $lead_users;
    }

    public function showData($table){

        $sql="SELECT * FROM $table";
        $q = $this->conn->query($sql) or die("failed!");

        while($r = $q->fetch(PDO::FETCH_ASSOC)){
            $data[]=$r;
        }
        return $data;
    }

    public function getById($id,$table){

        $sql="SELECT * FROM $table WHERE id = :id";
        $q = $this->conn->prepare($sql);
        $q->execute(array(':id'=>$id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getIdInstance($reference_number){

        $sql="SELECT * FROM reservation_instances WHERE reference_number = :reference_number";
        $q = $this->conn->prepare($sql);
        $q->execute(array(':reference_number'=>$reference_number));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    
    public function getSchd($uid)
    {
        $sql="SELECT default_schedule_id,fields FROM users WHERE user_id = :user_id";
        $q = $this->conn->prepare($sql);
        $q->execute(array(':user_id'=>$uid));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function update($id,$name,$email,$mobile,$address,$table){

        $sql = "UPDATE $table
 SET name=:name,email=:email,mobile=:mobile,address=:address
 WHERE id=:id";
        $q = $this->conn->prepare($sql);
        $q->execute(array(':id'=>$id,':name'=>$name,
            ':email'=>$email,':mobile'=>$mobile,':address'=>$address));
        return true;

    }
    
    public function updatingTimeDateBlockout($id,$start,$end)
    {
     
        $sql="SELECT * FROM blackout_instances WHERE blackout_instance_id = :id";
        $q = $this->conn->prepare($sql);
        $q->execute(array(':id'=>$id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        
        $bsi = $data['blackout_series_id'];
        $sql2 = "select * from blackout_instances WHERE blackout_series_id = :bsi";
        $q2 = $this->conn->prepare($sql2);
        $q2->execute(array(':bsi'=>$bsi));
        $data2 = $q2->fetchAll(PDO::FETCH_ASSOC);
        //echo '<pre>';print_r($data2);echo '</pre>';exit();
        foreach($data2 as $arr) {
            $sd = new DateTime($arr['start_date']);
            $st = new DateTime($start);
            $ed = new DateTime($arr['end_date']);
            $et = new DateTime($end);
            $stdate = $sd->format('Y-m-d').' '.$st->format('H:i:s');
            $etdate = $ed->format('Y-m-d').' '.$et->format('H:i:s');
            $bii = $arr['blackout_instance_id'];
            
           // echo $bii .'=>'.$stdate.'=>'.$etdate;
            
            $sql3 = "update blackout_instances SET startDate=:start,endDate=:end WHERE blackout_instance_id =:bii";
            $q3 = $this->conn->prepare($sql3);
            $q3->execute(array(':bii'=>$bii,':start'=>$stdate,':end'=>$etdate));
            
        }
        
        return true;
       
    }
    
    public function updateGroupId($gid)
    {
        $sql = "UPDATE groups SET gid=:gid WHERE group_id=:gid";
        $q = $this->conn->prepare($sql);
        $q->execute(array(':gid'=>$gid));
        return true;
    }
    
    public function updateGroupings($groupAdminId,$gid)
    {
        $sql = "UPDATE groups SET gid=:group_id WHERE group_id=:gid";
        $q = $this->conn->prepare($sql);
        $q->execute(array(':group_id'=>$groupAdminId,':gid'=>$gid));
        return true;
    }
    
    public function updateUser($userId,$schedId){
        
        $sql = "UPDATE users SET default_schedule_id=:default_schedule_id WHERE user_id=:user_id";
        $q = $this->conn->prepare($sql);
        $q->execute(array(':default_schedule_id'=>$schedId,':user_id'=>$userId));
        return true;
        
    }

    public function updateSeries($series_id,$client_name,$project,$client_on_site,$sample_on_site,$request_no,$status,$billable)
    {
        $sql = "UPDATE  reservation_series
 SET client_name=:client_name,project=:project,client_on_site=:client_on_site,sample_on_site=:sample_on_site,request_no=:request_no,status=:status,billable=:billable
 WHERE series_id=:series_id";
        $q = $this->conn->prepare($sql);
        $q->execute(array(':series_id'=>$series_id,':client_name'=>$client_name,':project'=>$project,':client_on_site'=>$client_on_site,':sample_on_site'=>$sample_on_site,':request_no'=>$request_no,':status' => $status, ':billable' => $billable));
        return true;
    }
    
    public function updateReservationInstances($series_id,$endDate)
    {
        $sql = "UPDATE  reservation_instances SET end_date=:end_date WHERE series_id=:series_id";
        $q = $this->conn->prepare($sql);
        $q->execute(array(':series_id'=>$series_id,':end_date'=>$endDate));
        return true;
    }

    public function getSeriesData($series_id)
    {
        $resources = $this->conn->prepare("select * from reservation_series where series_id = '$series_id'");
        $resources->execute();
        return $resources->fetch();
    }

    public function getReservationResources($series_id)
    {
        $resources = $this->conn->prepare("select * from reservation_resources where series_id = '$series_id'");
        $resources->execute();
        return $resources->fetch();
    }

    public function getClientName($series_id)
    {
        $resources = $this->conn->prepare("select a.*,b.* from reservation_instances a left join reservation_series b on a.series_id = b.series_id where a.reservation_instance_id = '$series_id'");
        $resources->execute();
        return $resources->fetch();
    }

    public function insertReservationUsers($user_id,$reservation_instance_id)
    {
        $sql = "INSERT INTO reservation_users SET reservation_instance_id=:reservation_instance_id,user_id=:user_id,reservation_user_level=:reservation_user_level";
        $q = $this->conn->prepare($sql);
        $q->execute(array(':reservation_instance_id'=>$reservation_instance_id,':user_id'=>$user_id,':reservation_user_level' => '3'));
        return true;
    }
    
    
    public function insertReservation($user_id,$reservation_instance_id)
    {
        $sql = "INSERT INTO reservation_users SET reservation_instance_id=:reservation_instance_id,user_id=:user_id,reservation_user_level=:reservation_user_level";
        $q = $this->conn->prepare($sql);
        $q->execute(array(':reservation_instance_id'=>$reservation_instance_id,':user_id'=>$user_id,':reservation_user_level' => '1'));
        return true;
    }

    public function insertData($name,$email,$mobile,$address,$table){

        $sql = "INSERT INTO $table SET name=:name,email=:email,mobile=:mobile,address=:address";
        $q = $this->conn->prepare($sql);
        $q->execute(array(':name'=>$name,':email'=>$email,
            ':mobile'=>$mobile,':address'=>$address));
        return true;
    }

    public function insertGroupUsers($group_id,$user_id)
    {
        $sql = "INSERT INTO user_groups SET user_id=:user_id,group_id=:group_id";
        $q = $this->conn->prepare($sql);
        $q->execute(array(':user_id'=>$user_id,':group_id'=>$group_id));
        return true;
    }

    public function insertUsersResource($resource_id,$user_id)
    {
        $sql = "INSERT INTO user_resource_permissions SET user_id=:user_id,resource_id=:resource_id,permission_type=:permission_type";
        $q = $this->conn->prepare($sql);
        $q->execute(array(':user_id' => $user_id,':resource_id' => $resource_id , ':permission_type' => '1'));
        return true;
    }
    
    public function insertGroupResource($resource_id,$group_id)
    {
        $sql = "INSERT INTO group_resource_permissions SET group_id=:group_id,resource_id=:resource_id";
        $q = $this->conn->prepare($sql);
        $q->execute(array(':group_id' => $group_id,':resource_id' => $resource_id));
        return true;
    }

    public function updateGroupUsers($group_id,$user_id)
    {

        $sql = "INSERT user_groups SET user_id=:user_id, group_id=:group_id";
        $q = $this->conn->prepare($sql);
        $q->execute(array(':group_id'=>$group_id,':user_id'=>$user_id));
        return true;
    }
    
    public function addHolidaySetting($begin, $end, $reason, $schedule, $createdby)
    {
        $sql = "INSERT holiday_setting SET begin=:begin, end=:end, reason=:reason, schedule=:schedule, createdby=:createdby";
        $q = $this->conn->prepare($sql);
        $q->execute(array(':begin'=>$begin,':end'=>$end,':reason'=>$reason,':schedule'=>$schedule, ':createdby'=>$createdby));
        return true;
    }

    public function updateHolidaySetting($begin, $end, $reason, $schedule, $hid)
    {
        $sql = "UPDATE holiday_setting
                 SET begin=:begin,end=:end,reason=:reason,schedule=:schedule WHERE id=:hid";
        $q = $this->conn->prepare($sql);
        $q->execute(array(':begin'=>$begin,':end'=>$end,
            ':reason'=>$reason,':schedule'=>$schedule,':hid'=>$hid));
        return true;
        
    }
    
    public function deleteHolidaySetting($hid){
        $sql="DELETE FROM holiday_setting WHERE id=:hid";
        $q = $this->conn->prepare($sql);
        $q->execute(array(':hid'=>$hid));
        return true;
    }
    
        
    public function getHolidaySetting(){
        $sql = $this->conn->prepare("SELECT * FROM holiday_setting");
        $sql->execute();
        return $sql->fetchAll();
    }
    
    public function getFilterHolidaySetting($begin, $end, $sched) {
        
        $q = $this->conn->prepare("SELECT * FROM holiday_setting
                                         WHERE(begin >= '$begin' AND
                                               end <= '$end')
                                               OR schedule LIKE '$sched'");
        $q->execute();
        return $q->fetchAll();
        
    }
    
    /* public function getHolidaySettingById($hid){
        
        $sql = "SELECT * FROM holiday_setting WHERE id=:hid";
        $q = $this->conn->prepare($sql);
        $q->execute(array(':hid'=>$hid));
        return true;
    } */
    
    
    public function deleteData($id,$table){

        $sql="DELETE FROM $table WHERE id=:id";
        $q = $this->conn->prepare($sql);
        $q->execute(array(':id'=>$id));
        return true;
    }

    public function deleteExistingReservation($user_id,$reservation_instance_id)
    {
        $sql="DELETE FROM reservation_users WHERE user_id=:user_id AND reservation_instance_id=:reservation_instance_id";
        $q = $this->conn->prepare($sql);
        $q->execute(array(':user_id'=>$user_id,':reservation_instance_id'=>$reservation_instance_id));
        return true;
    }

    public function deleteExistingReservationSeries($reservation_user_level,$reservation_instance_id)
    {
        $sql="DELETE FROM reservation_users WHERE reservation_user_level=:reservation_user_level AND reservation_instance_id=:reservation_instance_id";
        $q = $this->conn->prepare($sql);
        $q->execute(array(':reservation_user_level'=>$reservation_user_level,':reservation_instance_id'=>$reservation_instance_id));
        return true;
    }

    public function checkResource($table,$column,$data)
    {
        $sth = $this->conn->prepare("SELECT * FROM $table where  $column = ?");
        $sth->execute(array($_POST['data']));
        return $sth->rowCount();
    }

    public function getUsersByGroup($gids,$uid)
    {
        $sth = $this->conn->prepare("select a.*,b.lname,b.fname,b.email,b.user_id as uid from user_groups a
                                left join users b on a.user_id = b.user_id
                                where a.group_id = '$gids' and a.user_id = '$uid'");
        $sth->execute();
        return $sth->fetch();
    }
    
    public function getUsersGroup($gid) {
        
        $sth = $this->conn->prepare("select  a.*,b.lname,b.fname,b.email,b.user_id as uid from user_groups a
                                left join users b on a.user_id = b.user_id
                                where a.group_id = '$gid' GROUP BY b.user_id");
        $sth->execute();
        return $sth->fetchAll();
    }
    
    public function getResource($gid)
    {
//         $sth = $this->conn->prepare("select  a.*,b.name from resource_group_assignment a
//                                 left join resources b on a.resource_id = b.resource_id
//                                 where a.resource_group_id = '$gid'");
        $sth = $this->conn->prepare("select resource_id,name from resources
                                where admin_group_id = '$gid'");
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
    
    //get group of users
    public function getUserGroup($group)
    {
        $g = array();
        foreach($group as $value) {
            $g[] = $this->get_all_group_id($value);
        }
        $group_merge = array_reduce($g, 'array_merge', array());
        $gid = array();
        foreach ($group_merge as $row) {
            $gid[] = $this->getGroup($row['gid']);
        }
        $two = array_reduce($gid, 'array_merge', array());
        
        $one = array();
        foreach($two as $item) {
            $one[] = $item['group_id'];
        }
        return $userGroup = array_unique($one);
    }
    
    public function getResourceAdmin($gid)
    {
        $sth = $this->conn->prepare("select  a.name,b.* from groups a
                                left join group_roles b on a.group_id = b.group_id
                                where b.role_id = '3' and b.group_id = '$gid'");
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getBlockUsers($begin,$end)
    {
       
        $sth = $this->conn->prepare("select  a.*,b.* from blackout_instances a
                                    left join blackout_series_resources b on a.blackout_series_id = b.blackout_series_id 
                                    where  a.startDate >= '$begin' and a.endDate <= '$end'");
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function updateFields($content,$userId)
    {
        $sql = "UPDATE users SET fields=:content WHERE user_id=:id";
        $q = $this->conn->prepare($sql);
        $q->execute(array(':id'=>$userId,':content'=>$content));
        return true;
    }
    
    public function getUserGroups($groupId)
    {
        //get the resource type based on group id
        $gk = array();
        foreach($groupId as $value) {
            $gk[] = $this->get_all_group_id($value);
        }
        
       
        
        $group_merge = array_reduce($gk, 'array_merge', array());
        $gid = array();
        foreach ($group_merge as $row) {
            $gid[] = $this->getGroup($row['gid']);
        }
       
        $two = array_reduce($gid, 'array_merge', array());
        
        $one = array();
        foreach($two as $item) {
            $one[] = $item['group_id'];
        }
        
        //all group of the user
        $userGroup = array_unique($one);
        
        //get users
        $groupUsers = array();
        foreach($userGroup as $value) {
            $groupUsers[] = $this->getUsersGroup($value);
        }
        
        $gu = array_reduce($groupUsers, 'array_merge', array());
       
        return array_values(array_column($gu, null, 2));
    }
    
    public function getResourceAdmins($gid)
    {
        $gk = array();
        foreach($gid as $value) {
            $gk[] = $this->get_all_group_id($value);
        }
        
        $group_merge = array_reduce($gk, 'array_merge', array());
        $gid = array();
        foreach ($group_merge as $row) {
            $gid[] = $this->getGroup($row['gid']);
        }
        
        $two = array_reduce($gid, 'array_merge', array());
        
        $one = array();
        foreach($two as $item) {
            $one[] = $item['group_id'];
        }
        
        $userGroup = array_unique($one);
        
        //get resource admin
        $radmin = array();
        foreach($userGroup as $value) {
            $radmin[] = $this->getResourceAdmin($value);
        }
        
        return $rad = array_reduce($radmin, 'array_merge', array());
    }
    
    
    public function getGroups($grid)
    {
        foreach($grid as $value) {
            $gk[] = $this->get_all_group_id($value);
        }
        
        $group_merge = array_reduce($gk, 'array_merge', array());
        $gid = array();
        foreach ($group_merge as $row) {
            $gid[] = $this->getGroup($row['gid']);
        }
        
        $two = array_reduce($gid, 'array_merge', array());
        
        $one = array();
        foreach($two as $item) {
            $one[] = $item['group_id'];
        }
        //all group of the user
        $userGroup = array_unique($one);
        $gpid = array();
        foreach($userGroup as $value) {
            $gpid[] = $this->getGroup($value);
        }
        return $groups = array_reduce($gpid, 'array_merge', array());
    }
    
    public function getResourcesInfo($rn)
    {
        $sth = $this->conn->prepare("select a.reference_number,b.series_id,c.name,c.userid from reservation_instances a 
                                inner join reservation_resources b on a.series_id = b.series_id
                                inner join resources c on b.resource_id = c.resource_id
                                where a.reference_number = '$rn'");
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function deleteInvitees($instanceId,$inviteeId)
    {
        $sql="DELETE FROM reservation_users WHERE reservation_instance_id=:reservation_instance_id and user_id=:user_id and reservation_user_level = '3'";
        $q = $this->conn->prepare($sql);
        $q->execute(array(':reservation_instance_id'=>$instanceId,':user_id'=>$inviteeId));
        return true;
    }
    
    public function updateUserColumns($userid,$content,$column)
    {
        $sql = "UPDATE user_preferences SET value=:value WHERE user_id=:user_id AND name=:name";
        $q = $this->conn->prepare($sql);
        $q->execute(array(':user_id'=>$userid,':value'=>$content,':name'=>$column));
        return true;
    }
    
    public function getAdminResUsers($id)
    {
        
        $ids = join(', ', $id);
        $resources = $this->conn->prepare("select * from user_groups where group_id IN ($ids)");
        $resources->execute();
       // echo '<pre>';print_r($resources->fetchAll(PDO::FETCH_ASSOC));echo '</pre>';
       // return $resources->fetchAll(PDO::FETCH_ASSOC);
        
    }
    
    public function getUserWithPermission($id,$rid,$gid,$srn)
    {
        
        $i = $gid['resource_id'];
        $j = $srn['resource_id'];
        $ids = join(', ', $id);
        $resources = $this->conn->prepare("select * from user_resource_permissions where user_id IN ($ids)  and permission_type = '0' and (resource_id = '$rid' or resource_id = '$i' or resource_id = '$j')");
        $resources->execute();
        return $resources->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getUserPermissions($id)
    {
        $ids = join(', ', $id);
        $resources = $this->conn->prepare("select user_id,fname,lname,user_id,email from users where user_id IN ($ids)");
        $resources->execute();
        return $resources->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getUserGroupsAll($id)
    {
        $ids = join(', ', $id);
        $gid = array();
        $result = array();
        $newArr = array();
        $resources = $this->conn->prepare("select * from groups where group_id IN ($ids)");
        $resources->execute();
        foreach($resources->fetchAll(PDO::FETCH_ASSOC) as $it)
        {
            //if($it['gid'] != $it['group_id']) {
                $gp = $this->conn->prepare("select group_id from groups where gid = '$it[gid]' and type = 'admin'");
                $gp->execute();
                $gid = $gp->fetchAll(PDO::FETCH_ASSOC);
            //}
        }
        
        $oneDimensionalArray = array_map('current', $gid);
        
        foreach($oneDimensionalArray as $gi) 
        {
            $sth = $this->conn->prepare("select a.*,b.fname,b.lname,b.user_id,b.email from user_groups a
                                left  join users b on a.user_id = b.user_id
                                where a.group_id = '$gi'");
            $sth->execute();
             $result[] = $sth->fetchAll(PDO::FETCH_ASSOC);
           
        }
        foreach ($result as $tmp) {
            $newArr = array_merge($newArr, array_values($tmp));
        }
        
        return $newArr;
    }
    
    public function getAllGroups($id)
    {
       
        $ids = join(', ', $id);
        $gid = array();
        $result = array();
        $newArr = array();
        $resources = $this->conn->prepare("select * from groups where group_id IN ($ids)");
        $resources->execute();
        foreach($resources->fetchAll(PDO::FETCH_ASSOC) as $it)
        {
            
                $gp = $this->conn->prepare("select group_id from groups where gid = '$it[gid]' and type = 'admin'");
                $gp->execute();
                $gid = $gp->fetchAll(PDO::FETCH_ASSOC);
            
        }
        
        return $oneDimensionalArray = array_map('current', $gid);
    }
    
    
    public function getAllUsersInGroup($id)
    {
        $ids = join(', ', $id);
        $gid = array();
        $result = array();
        $newArr = array();
        $resources = $this->conn->prepare("select * from groups where group_id IN ($ids)");
        $resources->execute();
        foreach($resources->fetchAll(PDO::FETCH_ASSOC) as $it)
        {
            
            $gp = $this->conn->prepare("select group_id from groups where gid = '$it[gid]'");
            $gp->execute();
            $gid[] = $gp->fetchAll(PDO::FETCH_ASSOC);
            
        }
        $result = array_reduce($gid, 'array_merge', array());
        $groudId = array_column($result, 'group_id');
        
        $users = array();
        foreach($groudId as $gid) {
            $us = $this->conn->prepare("select a.*,b.fname,b.lname,b.email from user_groups a
                                         left join users b on a.user_id = b.user_id where a.group_id = '$gid' GROUP BY a.user_id;");
            $us->execute();
            $users[] = $us->fetchAll(PDO::FETCH_ASSOC);
        }
        
        $new_array = array();
        foreach($users as $array)
        {
            foreach($array as $val)
            {
                array_push($new_array, $val);
            }
        }
        
        //remove duplicate in array
        $data = array_reverse($new_array);
        
        $result = array_reverse( // Reverse array to the initial order.
            array_values( // Get rid of string keys (make array indexed again).
                array_combine( // Create array taking keys from column and values from the base array.
                    array_column($data, 'user_id'),
                    $data
                    )
                )
            );
        
        return $result;
    }
    
    function getGroupAnnouncements($gid)
    {
        $id = array();
        foreach($gid as $gi) {
            $id[] = $gi['group_id'];
        }
        $ids = join(', ', $id);
        $announce = $this->conn->prepare("select * from announcement_groups where group_id IN ($ids)");
        $announce->execute();
       
        
        $tid = array();
        foreach($announce->fetchAll(PDO::FETCH_ASSOC) as $nid) {
            $tid[] = $nid['announcementid'];
        }
        
        $i = join(', ', $tid);
        $nn = $this->conn->prepare("select * from announcements where announcementid  IN ($i)");
        $nn->execute();
        return $nn->fetchAll(PDO::FETCH_ASSOC);
    }
    
    function getGroupAuditrail($gid)
    {
        $search = $_GET['referenceId'];
        $id = array();
        foreach($gid as $gi) {
            $id[] = $gi['group_id'];
        }
        $ids = join(', ', $id);
        $announce = $this->conn->prepare("select * from audit_trail_groups where group_id IN ($ids)");
        $announce->execute();
        
        
        $tid = array();
        foreach($announce->fetchAll(PDO::FETCH_ASSOC) as $nid) {
            $tid[] = $nid['audit_trail_id'];
        }
        
        $i = join(', ', $tid);
        
        $query = "select a.*,b.fname,b.lname,c.name from audit_trail a
                                     left join users b on a.user_id = b.user_id
                                    left join schedules c on a.schedule_id = c.schedule_id
                                    where a.audit_trail_id  IN ($i) and a.reference_id LIKE '%".$search."%'";
        if($_GET['scheduleId'])
            $query .= " AND a.schedule_id = '$_GET[scheduleId]' ";
        
       if($_GET['auditAction'])
           $query .= " AND a.action = '$_GET[auditAction]' ";
       
       if($_GET['userOwner'])
               $query .= " AND a.user_id = '$_GET[userOwner]' ";
           
       if($_GET['startDate'])
               $query .= " AND a.dtr BETWEEN '$_GET[startDate]' AND  '$_GET[endDate]'";
            
        
        $nn = $this->conn->prepare($query);
        $nn->execute();
        return $nn->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
    function checkBloked($id)
    {
               
        $sth = $this->conn->prepare("SELECT COUNT(*) AS `total` FROM blackout_series_resources WHERE resource_id  = :resource_id");
        $sth->execute(array(':resource_id'=>$id));
        $result  = $sth->fetchObject();
        if ($result->total > 0)
        {
            echo $id;
        }
    }
    
    public function deleteReservation($refid)
    {
//         $resources = $this->conn->prepare("select series_id,reference_number from reservation_instances where reference_number = :reference_number");
//         $resources->execute(array(':reference_number'=>$refid));
//         $ri = $resources->fetch(PDO::FETCH_ASSOC);
        
//         $sql = "UPDATE reservation_series SET status_id=:status_id WHERE series_id =:series_id";
//         $q = $this->conn->prepare($sql);
//         $s = $q->execute(array(':series_id'=>$ri['series_id'],':status_id'=>'2'));
//         if($s) {
//             return true;
//         } else {
//             return false;
//         }
            $sql="DELETE FROM reservation_instances WHERE reference_number=:reference_number";
            $q = $this->conn->prepare($sql);
            $q->execute(array(':reference_number'=>$refid));
            return true;
        
    }
    
    function getLayout($timeZone)
    {
        $sth = $this->conn->prepare("select * from layouts where timezone = '$timeZone'");
        $sth->execute();
        return $sth->fetch(PDO::FETCH_ASSOC);
    }
    
    function getTimeBlock($layoutIds,$startDate)
    {
        $time = new DateTime($startDate);
        $timep = $time->format('H:i');
        $timeBlock = $this->conn->prepare("select * from time_blocks where layout_id = '$layoutIds' and start_time = '$timep'");
        $timeBlock->execute();
        return $timeBlock->fetch(PDO::FETCH_ASSOC);
    }
    
    function getTimeBlocks($layoutIds)
    {
        $timeBlock = $this->conn->prepare("select * from time_blocks where layout_id = '$layoutIds' and availability_code = '1'");
        $timeBlock->execute();
        return $timeBlock->fetchAll(PDO::FETCH_ASSOC);
    }
    
    function getReservations($seriesId)
    {
        foreach($seriesId as $value) {
            $ids1 = explode("@",$value);
            $ids2[] = $ids1[0];
            $schid[] = $ids1[1];
        }
        
        $ids = join(', ', $ids2);
        
        $move = $this->conn->prepare("SELECT  a.*, b.* from  reservation_series a
                                    left join reservation_instances b on a.series_id = b.series_id
                                    where a.series_id IN ($ids)");
        $move->execute();
        
        $sc = join(', ', $schid);
        
        foreach($schid as $val) {
            $glayout1 = $this->conn->prepare("SELECT layout_id from schedules where schedule_id = '$val'");
            $glayout1->execute();
            $ly[] = $glayout1->fetchAll(PDO::FETCH_ASSOC);
        }
       
        $layoutIds= array_reduce($ly, 'array_merge', array());
        
        foreach( $layoutIds as $key => $value) {
            $gtime = $this->conn->prepare("SELECT * from time_blocks where layout_id = '$value[layout_id]' and availability_code = '1'");
            $gtime->execute();
            $gt[] = $gtime->fetchAll(PDO::FETCH_ASSOC);
        }
        
        $rs = $move->fetchAll(PDO::FETCH_ASSOC);
         
        //$arr_res = array_replace_recursive($rs, $gt);
        
        
        foreach($rs as $key => $val){
            foreach($gt as $key1 => $val) {
                if($key == $key1) {
                    $rs[$key]['d'] = $gt[$key1];
                }
            }
        }
        
        //echo '<pre>';print_r($rs);echo '</pre>';
       // echo '<pre>';print_r($gt);echo '</pre>';
        
        return $rs;
    }
    
    
    
    function getReservationsResources($referenceNo)
    {
        
//         $move = $this->conn->prepare("SELECT  a.*, b.name from  reservation_resources a
//                                     left join resources b on a.resource_id = b.resource_id
//                                     where a.series_id = '$seriesId'");
        $move = $this->conn->prepare("SELECT  a.*, b.*, c.name from  reservation_instances a
                                    left join reservation_resources b on a.series_id = b.series_id
                                    left join resources c on b.resource_id = c.resource_id
                                    where a.reference_number = '$referenceNo'");
        $move->execute();
        return $move->fetchAll(PDO::FETCH_ASSOC);
    }
    
    function checkUpdateMove($referenceNo,$seriesId,$beginDate,$beginTime,$endDate,$endTime,$timezone)
    {
        
    }
    
    function updateResourceMove($referenceNo,$seriesId,$beginDate,$beginTime,$endDate,$endTime,$timezone,$until,$resourceid)
    {
        error_reporting(0);
        $rf = $referenceNo;
        $ri = $resourceid;
        $id = $seriesId;
        $bD = $beginDate;
        $bT = $beginTime;
        $eD = $endDate;
        $eT = $endTime;
        $tz = str_replace("GGG","/",$timezone);
        $un = $until;
        $resource = $resourceid;
        
        for($count = 0; $count < count($referenceNo); $count++)
        {
            $start = $bD[$count].' '.$bT[$count];
            $givenS = new DateTime($start, new DateTimeZone($tz));
            $givenS->setTimezone(new DateTimeZone("UTC"));
            $outputS = $givenS->format("Y-m-d H:i:s");
            
            if($eT[$count] == '00:00:00') {
                $et = '24:00:00';
            } else {
                $et = $eT[$count];
            }
            
            $end =  $eD[$count].' '.$et;
            $givenE = new DateTime($end, new DateTimeZone($tz));
            $givenE->setTimezone(new DateTimeZone("UTC"));
            $outputE = $givenE->format("Y-m-d H:i:s");
            
            $blockout = $this->conn->prepare("select * FROM blackout_instances bi
                                                left join blackout_series bs
                                                ON bi.blackout_series_id = bs.blackout_series_id
                                                left join blackout_series_resources bsr
                                                ON  bi.blackout_series_id = bsr.blackout_series_id
                                                left join resources r
                                                on bsr.resource_id = r.resource_id
                                                left join users u
                                                ON u.user_id = bs.owner_id
                                                WHERE (bi.start_date > '$outputS' AND bi.start_date < '$outputE') OR
					                           (bi.end_date > '$outputS' AND bi.end_date < '$outputE') OR (bi.start_date <= '$outputS' AND bi.end_date >= '$outputE')");
            $blockout->execute();
            $blc = $blockout->fetchAll(PDO::FETCH_ASSOC);
            $blck = array();
            foreach( $blc as $key => $value) {
                
                
                $blck[] =  $value['resource_id'];
                
            }
            
            
            
            
            $checkdate = $this->conn->prepare("select a.*,b.*,c.status_id from reservation_instances a
                                                left join reservation_resources b
                                                on a.series_id = b.series_id
                                                left join reservation_series c
                                                on a.series_id = c.series_id
                                                WHERE (a.start_date > '$outputS' AND a.start_date < '$outputE') OR
					                           (a.end_date > '$outputS' AND a.end_date < '$outputE') OR (a.start_date <= '$outputS' AND a.end_date >= '$outputE') AND c.status_id = '1'");
            $checkdate->execute();
            $cdate = $checkdate->fetchAll(PDO::FETCH_ASSOC);
            $pr1 = array();
            foreach( $cdate as $key => $value) {
                
                
                $pr1[] =  $value['resource_id'];
                
            }
            
           
            //echo '<pre>';print_r($pr1);echo '</pre>';
            //check resource type HR or PR
            $rid = explode(",",$resource[$count]);
            $resources = array();
            foreach($rid as $ids) {
                $get_rs = $this->conn->prepare("select resource_id,name,userid from resources where resource_id = '$ids'");
                $get_rs->execute();
                $rs = $get_rs->fetch(PDO::FETCH_ASSOC);
                $resources[] = $rs;
            }
            $oneDimensionalArray = array_map('current', $resources);
           // echo '<pre>';print_r($resources);echo '</pre>';
           //list of Physical Resource
            $pr = array();
            foreach( $resources as $key => $value) {
                
                if($value['userid'] == '') {
                    $pr[] =  $value['resource_id'];
                }
            }
            
           
            //echo '<pre>';print_r($pr);echo '</pre>';
            
           // echo 'Series Id '.$id[$count];
            $get_serie = $this->conn->prepare("select * from reservation_instances where reference_number = '$rf[$count]'");
            $get_serie->execute();
            $gs = $get_serie->fetch(PDO::FETCH_ASSOC);
            
            if (!array_intersect(array_filter($blck), array_filter($pr))) {
            if (!array_intersect($pr1, $pr)) {
               
            //check if reservation have checkin and checkout set
            if($gs['date_time_duration'] == '')
            {
           
           
            $get_series = $this->conn->prepare("select series_id from reservation_instances where start_date = '$outputS' and end_date = '$outputE'");
            $get_series->execute();
            $series = $get_series->fetchAll(PDO::FETCH_ASSOC);
            
            $checkdate = $this->conn->prepare("select * from reservation_instances WHERE (start_date >= '$outputS' AND start_date <= '$outputE') OR
					(end_date >= '$outputS' AND end_date <= '$outputE') OR (start_date <= '$outputS' AND end_date >= '$outputE')");
            
           
            //print_r($series);exit();
            //last modified
            date_default_timezone_set($tz);
            $outputLastModified = date('Y/m/d h:i:s', time());
            
            
            if ((strtotime($outputS)) > (strtotime($outputE)))
            {
                //echo 'reservation.php?='.$rf[$count].'<br>';
                echo 'Your reference Number <a href=reservation.php?rn='.$rf[$count].' style=color:red target="_blank">'.$rf[$count].'</a> End date cant be more that your Start Date<br>';
                
            } else {
                if(empty($un[$count])) {
                    $lmd = "UPDATE reservation_series SET last_modified =:last_modified WHERE series_id=:series_id";
                    $ld = $this->conn->prepare($lmd);
                    $ld->execute(array(':series_id'=>$id[$count],':last_modified'=>$outputLastModified));
                    
                    $sql = "UPDATE reservation_instances SET start_date =:start_date, end_date =:end_date WHERE reference_number=:reference_number";
                    $q = $this->conn->prepare($sql);
                    $q->execute(array(':reference_number'=>$rf[$count],':start_date'=>$outputS, ':end_date'=>$outputE));
                    echo 'Your reference Number is <a href=reservation.php?rn='.$rf[$count].' style=color:green target="_blank">'.$rf[$count].'</a><br>';
                    $dateStart = new DateTime($start);
                    $nm = array();
                    echo '<strong>New Date</strong>: '.$dateStart->format('m/d/Y h:i:s a').'<br>';
                    echo 'Resources: ';
                    
                    foreach( $resources as $key => $value) {
                        if($value['name'] != '') {
                            $nm[] = $value['name'];
                        }
                    }
                    echo implode(', ', $nm);
                    echo '<br><br>';
                   
                } else {
                    $lmd = "UPDATE reservation_series SET last_modified =:last_modified WHERE series_id=:series_id";
                    $ld = $this->conn->prepare($lmd);
                    $ld->execute(array(':series_id'=>$id[$count],':last_modified'=>$outputLastModified));
                    
                    $sql = "UPDATE reservation_instances SET start_date =:start_date, end_date =:end_date WHERE reference_number=:reference_number";
                    $q = $this->conn->prepare($sql);
                    $q->execute(array(':reference_number'=>$rf[$count],':start_date'=>$outputS, ':end_date'=>$outputE));
                    echo 'Your reference Number is <a href=reservation.php?rn='.$rf[$count].' style=color:green target="_blank">'.$rf[$count].'</a><br>';
                    $dateStart = new DateTime($start);
                    echo '<strong>New Date</strong>: '.$dateStart->format('m/d/Y h:i:s a').'<br>';
                    echo 'Resources: ';
                    //echo '<pre>';print_r($resources);echo '</pre>';
                    foreach( $resources as $key => $value) {
                        if($value['name'] != '') {
                            $nm[] = $value['name'];
                        }               
                    }
                    echo implode(', ', $nm);
                    
                }
            }
            //return true;
           // echo $id[$count].'='.$un[$count].'<br>';
            } else {
                echo 'This action is not allowed due to a post check-in/out conflict with Reference Number <a href=reservation.php?rn='.$rf[$count].' style=color:red target="_blank">'.$rf[$count].'</a><br>';
            }
            } else {
                echo 'This action is not allowed due to a reservation conflict';
                echo ' with Reference Number <a href=reservation.php?rn='.$rf[$count].' style=color:red target="_blank">'.$rf[$count].'</a><br><br>';
            }
            } else {
                echo 'This action is not allowed due to a blackout times conflict';
                echo ' with Reference Number <a href=reservation.php?rn='.$rf[$count].' style=color:red target="_blank">'.$rf[$count].'</a><br><br>';
            }
        }
        
    }
    
    function getInformation($seriesId)
    {
       // print_r($seriesId);
    }
    
    function countDoubleBooking($id)
    {
        echo $id;
    }
    
    public function getReservationUntil($sid)
    {
        $series = $this->conn->prepare("select * from reservation_series where series_id = '$sid'");
        $series->execute();
        return $series->fetch(PDO::FETCH_ASSOC);
    }
    
    public function updateReservationIntance($durationD,$notes,$rf)
    {
        $sql = "UPDATE reservation_instances SET date_time_duration =:duration_data, duration_notes =:notes WHERE reference_number=:rf";
        $q = $this->conn->prepare($sql);
        $q->execute(array(':duration_data'=>$durationD,':rf'=>$rf,':notes'=>$notes));
        return true;
    }
    
    public function getResourceData($rid)
    {
        $resources = $this->conn->prepare("select * from resources where resource_id  = '$rid'");
        $resources->execute();
        return $resources->fetch(PDO::FETCH_ASSOC);
    }
    
    public  function  InsertAUditTrail($contents,$rf,$user,$old,$new,$type,$action,$gid,$sid,$dateUpdated,$dtb)
    {
        $cn = json_encode($contents);
        $sql = "INSERT INTO audit_trail SET content=:content,user_id=:user_id,reference_id=:reference_id,new_data=:new_data,old_data=:old_data,type=:type,action=:action,schedule_id=:schedule_id,date_time_update=:date_time_update,dtb=:dtb ";
        $q = $this->conn->prepare($sql);
        $q->execute(array(':content'=>$cn,':user_id'=>$user,':reference_id' => $rf, ':old_data' => $old,':new_data' => $new,':type' => $type, ':action' => $action,':schedule_id' => $sid, ':date_time_update' => $dateUpdated,':dtb' => $dtb));
        
        $lastId = $this->conn->lastInsertId();
        $sql_2 = "INSERT INTO audit_trail_groups SET audit_trail_id=:audit_trail_id,group_id=:group_id";
        $q_2 = $this->conn->prepare($sql_2);
        $q_2->execute(array(':audit_trail_id'=>$lastId,':group_id'=>$gid));
        
        
        return true;
    }
    
    public function getAuditTrail()
    { 
        $audit = $this->conn->prepare("select a.*,b.fname,b.lname from audit_trail a
                                        left join users b on a.user_id = b.user_id");
        $audit->execute();
        return $audit->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getUnAvailableResource($rid)
    {
        $rs = $this->conn->prepare("select resource_id from resources where resource_id = '$rid' and userid IS NULL");
        $rs->execute();
        return $rs->fetch(PDO::FETCH_NUM);
    }
    
    public function CountPermission($userId)
    {
        $rs = $this->conn->prepare("SELECT COUNT(*) FROM user_resource_permissions where user_id = '$userId'");
        $rs->execute();
        return $rs->fetchColumn();
    }
    
    public function CountPermissionUser($userId)
    {
        $rs = $this->conn->prepare("SELECT COUNT(*) FROM user_resource_permissions where user_id = '$userId' and permission_id = '1' and permission_type = '1'");
        $rs->execute();
        return $rs->fetchColumn();
    }
    
    public function InsertOwner($user,$rid)
    {
        $ri = $this->conn->prepare("select * from reservation_instances where reference_number  = '$rid'");
        $ri->execute();
        $riData = $ri->fetch(PDO::FETCH_ASSOC);
        
        $uid = explode("=",$user);
        //echo $uid[1].' '.$riData['series_id'];exit();
        
        $sql = "INSERT INTO reservation_users SET reservation_instance_id=:reservation_instance_id,user_id=:user_id,reservation_user_level=:reservation_user_level";
        $q = $this->conn->prepare($sql);
        $q->execute(array(':reservation_instance_id'=>$riData['reservation_instance_id'],':user_id'=>$uid[1],':reservation_user_level'=> '1'));
        
        $sql = "UPDATE reservation_series SET owner_id =:owner_id WHERE series_id=:series_id";
        $q = $this->conn->prepare($sql);
        $q->execute(array(':owner_id'=>$uid[1],':series_id'=>$riData['series_id']));
               
    }
    
    public function getUsersReservation($rf)
    {
        $ri = $this->conn->prepare("select * from reservation_instances where reference_number  = '$rf'");
        $ri->execute();
        $riData = $ri->fetch(PDO::FETCH_ASSOC);
        
        //get users from reservation
        $ru = $this->conn->prepare("select user_id from reservation_users where reservation_instance_id  = '$riData[reservation_instance_id]'");
        $ru->execute();
        return $ru->fetchAll(PDO::FETCH_NUM);
    }
    
    public function checkHumanResource($id)
    {
        $rs = $this->conn->prepare("select * from resources where resource_id  = '$id'");
        $rs->execute();
        return $rs->fetch(PDO::FETCH_ASSOC);
    }
    
    public function getCurrentResources($referenceId)
    {
        $ri = $this->conn->prepare("select * from reservation_instances where reference_number  = '$referenceId'");
        $ri->execute();
        $riData = $ri->fetch(PDO::FETCH_ASSOC);
        
        
        $ru = $this->conn->prepare("select resource_id from reservation_resources where series_id  = '$riData[series_id]'");
        $ru->execute();
        return $ru->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getCurrentEngineer($referenceId,$reservation_users_level )
    {
        $ri = $this->conn->prepare("select * from reservation_instances where reference_number  = '$referenceId'");
        $ri->execute();
        $riData = $ri->fetch(PDO::FETCH_ASSOC);
        
        
        $ru = $this->conn->prepare("select user_id from reservation_users where reservation_instance_id  = '$riData[reservation_instance_id]' and reservation_user_level = '$reservation_users_level'");
        $ru->execute();
        return $ru->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getResources($rid)
    {
        $ids = join(', ', $rid);
        $resources = $this->conn->prepare("select name from resources where resource_id  IN ($ids)");
        $resources->execute();
        return $resources->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getProjectLeads($uid)
    {
        $ids = join(', ', $uid);
        $resources = $this->conn->prepare("select email from users where user_id  IN ($ids)");
        $resources->execute();
        return $resources->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getUserInfo($uid)
    {
        $u = $this->conn->prepare("select email from users where user_id  = '$uid'");
        $u->execute();
        return $u->fetch(PDO::FETCH_ASSOC);
    }
}

?>
