<?php

class bookingClass {
    private $host="localhost";
    private $user="dev_emc";
    private $db="qa";
    private $pass="w~m3UY((.dU!^MK)";
    private $conn;

    public function __construct(){

        $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db,$this->user,$this->pass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
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
        return $schedule->fetchAll();
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

    public function updateSeries($series_id,$client_name,$project,$client_on_site,$sample_on_site,$request_no,$status)
    {
        $sql = "UPDATE  reservation_series
 SET client_name=:client_name,project=:project,client_on_site=:client_on_site,sample_on_site=:sample_on_site,request_no=:request_no,status=:status
 WHERE series_id=:series_id";
        $q = $this->conn->prepare($sql);
        $q->execute(array(':series_id'=>$series_id,':client_name'=>$client_name,':project'=>$project,':client_on_site'=>$client_on_site,':sample_on_site'=>$sample_on_site,':request_no'=>$request_no,':status' => $status));
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
        $resources = $this->conn->prepare("select series_id,reference_number from reservation_instances where reference_number = :reference_number");
        $resources->execute(array(':reference_number'=>$refid));
        $ri = $resources->fetch(PDO::FETCH_ASSOC);
        
        $sql = "UPDATE reservation_series SET status_id=:status_id WHERE series_id =:series_id";
        $q = $this->conn->prepare($sql);
        $s = $q->execute(array(':series_id'=>$ri['series_id'],':status_id'=>'2'));
        if($s) {
            return true;
        } else {
            return false;
        }
        
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
    
}

?>
