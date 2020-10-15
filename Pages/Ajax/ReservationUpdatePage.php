<?php
/**
 * Copyright 2011-2019 Nick Korbel
 *
 * This file is part of Booked Scheduler.
 *
 * Booked Scheduler is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Booked Scheduler is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Booked Scheduler.  If not, see <http://www.gnu.org/licenses/>.
 */

require_once(ROOT_DIR . 'Pages/Ajax/ReservationSavePage.php');
require_once(ROOT_DIR . 'Presenters/Reservation/ReservationPresenterFactory.php');
require_once(ROOT_DIR . 'config/crud.php');

interface IReservationUpdatePage extends IReservationSavePage
{
	/**
	 * @return string
	 */
	public function GetReferenceNumber();

	/**
	 * @return SeriesUpdateScope
	 */
	public function GetSeriesUpdateScope();

	/*
	 * @return array|int[]
	 */
	public function GetRemovedAttachmentIds();
}

class ReservationUpdatePage extends ReservationSavePage implements IReservationUpdatePage
{
	/**
	 * @var ReservationUpdatePresenter
	 */
	private $_presenter;

	/**
	 * @var bool
	 */
	private $_reservationSavedSuccessfully = false;

	public function __construct()
	{
		parent::__construct();

		$factory = new ReservationPresenterFactory();
		$this->_presenter = $factory->Update($this, ServiceLocator::GetServer()->GetUserSession());
	}

	public function PageLoad()
	{
	    $user = ServiceLocator::GetServer()->GetUserSession();
	    $obj = new bookingClass;
	    $arr3 = array();
	    
	    foreach ($_POST['endDating'] as $key => $val1) {
	        $val2 = $_POST['as'][$key];
	        $val3 = $_POST['ae'][$key];
	        if($val3 == '00:00') {
	            $val3 = '24:00';
	        }
	       
	        //calculate
	        $time1 = strtotime($val2);
	        $time2 = strtotime($val3);
	        $datetime1 = new DateTime($val2);
	        $datetime2 = new DateTime($val3);
	        
	        $intervalTime = $datetime1->diff($datetime2);
	        $rj = $intervalTime->format('%H:%I');
	        
	       // $seconds_diff = $time2 - $time1; 
	       // $difference = ($seconds_diff/3600);
	        
	        $arr3[$key] = $val1 ."=>". $val2.'=>'.$val3.'=>'.$rj;
	    }
	     
	   
	    $cur = current($_POST['ae']);
	    
	    if (!empty($cur)) {
	        $encoded = json_encode($arr3);
	        $obj->updateReservationIntance($encoded,$_POST['duration_notes'],$this->GetReferenceNumber());
	    }
	    
// 	    if($_POST['client_on_sites'] == "") {
// 	        $_POST['client_on_sites'] = 'No';
// 	    }
	   
// 	    if( $_POST['client_on_sites_hidden'] != $_POST['client_on_sites']) {
// 	        $list = array('Requet No' => $_POST['client_on_sites'],'Old Data' => $_POST['client_on_sites_hidden'],'Action' => 'Edit');
	        
// 	        $obj->InsertAUditTrail($list,$this->GetReferenceNumber(),$user->UserId,$_POST['client_on_sites_hidden'],$_POST['client_on_sites'],'Client On Site','Edit');
// 	    }
	  
	   
	    date_default_timezone_set($user->Timezone); // your user's timezone
	    $dateUpdated = date('D m/d/y h:i:s a', time());
	    $dtb = date('Y/m/d');
	    
	    $gr = $user->Groups;
	    
	    if( $_POST['request_no_hidden'] != $_POST['request_no']) {
	        $list = array('Requet No' => $_POST['request_no'],'Old Data' => $_POST['request_no_hidden'],'Action' => 'Edit');
	       
	        $obj->InsertAUditTrail($list,$this->GetReferenceNumber(),$user->UserId,$_POST['request_no_hidden'],$_POST['request_no'],'Request Number','Record Updated',$gr[0],$_POST['scheduleId'],$dateUpdated,$dtb);
	    }
	    
	    if( $_POST['projects_hidden'] != $_POST['projects']) {
	        $list = array('Project No' => $_POST['projects'],'Old Data' => $_POST['projects_hidden'],'Action' => 'Edit');
	       
	        $obj->InsertAUditTrail($list,$this->GetReferenceNumber(),$user->UserId,$_POST['projects_hidden'],$_POST['projects'],'Project Number','Record Updated',$gr[0],$_POST['scheduleId'],$dateUpdated,$dtb);
	    }
	    
	    if( $_POST['reservationTitle_hidden'] != $_POST['reservationTitle']) {
	        $list = array('Title' => $_POST['reservationTitle'],'Old Data' => $_POST['reservationTitle_hidden'],'Action' => 'Edit');
	        
	        $obj->InsertAUditTrail($list,$this->GetReferenceNumber(),$user->UserId,$_POST['reservationTitle_hidden'],$_POST['reservationTitle'],'Title','Record Updated',$gr[0],$_POST['scheduleId'],$dateUpdated,$dtb);
	    }
	    
	    if( $_POST['description_hidden'] != $_POST['reservationDescription']) {
	        $list = array('Description' => $_POST['reservationDescription'],'Old Data' => $_POST['description_hidden'],'Action' => 'Edit');
	        
	        $obj->InsertAUditTrail($list,$this->GetReferenceNumber(),$user->UserId,$_POST['description_hidden'],$_POST['reservationDescription'],'Description','Record Updated',$gr[0],$_POST['scheduleId'],$dateUpdated,$dtb);
	    }
	    
	    
	    if( $_POST['client_hidden'] != $_POST['client']) {
	        $list = array('Client' => $_POST['client'],'Old Data' => $_POST['client_hidden'],'Action' => 'Edit');
	        
	        $obj->InsertAUditTrail($list,$this->GetReferenceNumber(),$user->UserId,$_POST['client_hidden'],$_POST['client'],'Client Name','Record Updated',$gr[0],$_POST['scheduleId'],$dateUpdated,$dtb);
	    }
	    
// 	    if( $_POST['beginDate_hidden'] != $_POST['formattedBeginDate']) {
// 	        $list = array('Client' => $_POST['client'],'Old Data' => $_POST['client_hidden'],'Action' => 'Edit');
	        
// 	        $obj->InsertAUditTrail($list,$this->GetReferenceNumber(),$user->UserId,$_POST['beginDate_hidden'],$_POST['formattedBeginDate'],'Begin Date','Record Updated',$gr[0],$_POST['scheduleId'],$dateUpdated);
// 	    }
	    
// 	    if( $_POST['endDate_hidden'] != $_POST['formattedEndDate']) {
// 	        $list = array('Client' => $_POST['client'],'Old Data' => $_POST['client_hidden'],'Action' => 'Edit');
	        
// 	        $obj->InsertAUditTrail($list,$this->GetReferenceNumber(),$user->UserId,$_POST['endDate_hidden'],$_POST['formattedEndDate'],'End Date','Record Updated',$gr[0],$_POST['scheduleId'],$dateUpdated);
// 	    }
	    
	    if( $_POST['status_hidden'] != $_POST['status']) {
	        if($_POST['status'] == '2') {
	            $stat = 'Confirmed';
	        } else {
	            $stat = 'Temporary';
	        }
	        
	        if($_POST['status_hidden'] == '2') {
	            $stath = 'Confirmed';
	        } else {
	            $stath = 'Temporary';
	        }
	        $list = array('Client' => $_POST['client'],'Old Data' => $_POST['client_hidden'],'Action' => 'Edit');
	        
	        $obj->InsertAUditTrail($list,$this->GetReferenceNumber(),$user->UserId,$stath,$stat,'Status','Record Updated',$gr[0],$_POST['scheduleId'],$dateUpdated,$dtb);
	    }
	    
	    //change owner
	    if( $_POST['userId_hidden'] != $_POST['userId']) {
	        $list = array('Client' => $_POST['client'],'Old Data' => $_POST['client_hidden'],'Action' => 'Edit');
	        $newUser = explode("=",$_POST['users']);
	        $oldUser = $obj->getUserInfo($_POST['userId_hidden']);
	        $obj->InsertAUditTrail($list,$this->GetReferenceNumber(),$user->UserId,$oldUser['email'],$newUser[0],'User Owner','Record Updated',$gr[0],$_POST['scheduleId'],$dateUpdated,$dtb);
	    }
	    
	    if (isset($_POST['client_on_sites'])) {
	        
	        if( $_POST['client_on_sites_hidden'] != $_POST['client_on_sites']) {
	            $list = array('Client' => $_POST['client_on_sites'],'Old Data' => $_POST['client_on_sites_hidden'],'Action' => 'Edit');
	            
	            $obj->InsertAUditTrail($list,$this->GetReferenceNumber(),$user->UserId,$_POST['client_on_sites_hidden'],$_POST['client_on_sites'],'Client On Site','Record Updated',$gr[0],$_POST['scheduleId'],$dateUpdated,$dtb);
	        }
	    } else {
	        if( $_POST['client_on_sites_hidden'] == $_POST['client_on_sites']) {
	            $list = array('Client' => $_POST['client_on_sites'],'Old Data' => $_POST['client_on_sites_hidden'],'Action' => 'Edit');
	            
	            $obj->InsertAUditTrail($list,$this->GetReferenceNumber(),$user->UserId,$_POST['client_on_sites_hidden'],$_POST['client_on_sites'],'Client On Site','Record Updated',$gr[0],$_POST['scheduleId'],$dateUpdated,$dtb);
	        }
	    }
	    
	   
	    if (isset($_POST['sample_on_site'])) {
    	    if( $_POST['sample_on_site_hidden'] != $_POST['sample_on_site']) {
    	        $list = array('Client' => $_POST['client_on_sites'],'Old Data' => $_POST['client_on_sites_hidden'],'Action' => 'Edit');
    	        
    	        $obj->InsertAUditTrail($list,$this->GetReferenceNumber(),$user->UserId,$_POST['sample_on_site_hidden'],$_POST['sample_on_site'],'Sample On Site','Record Updated',$gr[0],$_POST['scheduleId'],$dateUpdated,$dtb);
    	    }
	    } else {
	        if( $_POST['sample_on_site_hidden'] == $_POST['sample_on_site']) {
	            $list = array('Client' => $_POST['client_on_sites'],'Old Data' => $_POST['client_on_sites_hidden'],'Action' => 'Edit');
	            
	            $obj->InsertAUditTrail($list,$this->GetReferenceNumber(),$user->UserId,$_POST['sample_on_site_hidden'],$_POST['sample_on_site'],'Sample On Site','Record Updated',$gr[0],$_POST['scheduleId'],$dateUpdated,$dtb);
	        }
	    }
	    
	    if (isset($_POST['billable'])) {
    	    if( $_POST['billable_hidden'] != $_POST['billable']) {
    	        if($_POST['billable'] == '') {
    	            $bill = 'No';
    	        } else {
    	            $bill = 'Yes';
    	        }
    	        
    	        if($_POST['billable_hidden'] == '') {
    	            $billh = 'No';
    	        } else {
    	            $billh = 'Yes';
    	        }
    	        $list = array('Client' => $_POST['client_on_sites'],'Old Data' => $_POST['client_on_sites_hidden'],'Action' => 'Edit');
    	        
    	        $obj->InsertAUditTrail($list,$this->GetReferenceNumber(),$user->UserId,$billh,$bill,'Billable','Record Updated',$gr[0],$_POST['scheduleId'],$dateUpdated,$dtb);
    	    }
	    } else {
	        if( $_POST['billable_hidden'] == $_POST['billable']) {
	            if($_POST['billable'] == '') {
	                $bill = 'No';
	            } else {
	                $bill = 'Yes';
	            }
	            
	            if($_POST['billable_hidden'] == '') {
	                $billh = 'No';
	            } else {
	                $billh = 'Yes';
	            }
	            $list = array('Client' => $_POST['client_on_sites'],'Old Data' => $_POST['client_on_sites_hidden'],'Action' => 'Edit');
	            
	            $obj->InsertAUditTrail($list,$this->GetReferenceNumber(),$user->UserId,$billh,$bill,'Billable','Record Updated',$gr[0],$_POST['scheduleId'],$dateUpdated,$dtb);
	        }
	    }
	    
	  

	    
	    $actualResources = $_POST['additionalResources'];
	    array_push($actualResources,$_POST['resourceId']);
	    $actual = array_unique($actualResources);
	    $actualR = $obj->getResources($actual);
	    $actualR1 = array_map('current', $actualR);
	    $actualUpdate = implode(', ', $actualR1);
	   
	    
	    $currentResources = $obj->getCurrentResources($this->GetReferenceNumber());
	    $currentR = array_map('current', $currentResources);
	    $currentR1 = $obj->getResources($currentR);
	    $currentR2 = array_map('current', $currentR1);
	    $currentUpdate = implode(', ', $currentR2);
	    
	    
	    $resultResource = array_merge(array_diff($actualResources, $currentR), array_diff($currentR, $actualResources));
	    
	    if(!empty($resultResource)) {
	        $obj->InsertAUditTrail($list,$this->GetReferenceNumber(),$user->UserId,$currentUpdate,$actualUpdate,'Resources','Record Updated',$gr[0],$_POST['scheduleId'],$dateUpdated,$dtb);
	    }
	    
	    $actualProjectLead = $_POST['participantList'];
	    $actualPl = $obj->getProjectLeads($actualProjectLead);
	    $actualPl1 = array_map('current', $actualPl);
	    $actualUpdatePl = implode(', ', $actualPl1);
	    
	    
	    $currentProjectLead = $obj->getCurrentEngineer($this->GetReferenceNumber(),'2');
	    $currentPL = array_map('current', $currentProjectLead);
	    $currentPl = $obj->getProjectLeads($currentPL);
	    $currentPl2 = array_map('current', $currentPl);
	    $currentPl3 = implode(', ', $currentPl2);
	    
	    $resultPl = array_merge(array_diff($actualProjectLead, $currentPL), array_diff($currentPL, $actualProjectLead));
	    
 	    if(!empty($resultPl)) {
 	       
 	        $obj->InsertAUditTrail($list,$this->GetReferenceNumber(),$user->UserId,$currentPl3,$actualUpdatePl,'Project Lead','Record Updated',$gr[0],$_POST['scheduleId'],$dateUpdated,$dtb);
 	    } 
	   
	    
		try
		{
			$this->EnforceCSRFCheck();
			$reservation = $this->_presenter->BuildReservation();
			$this->_presenter->HandleReservation($reservation);
 			if ($this->_reservationSavedSuccessfully)
 			{
 			    if(!empty($_POST['users_owner'])) {
 			        $obj->InsertOwner($_POST['users_owner'],$this->GetReferenceNumber());
 			    }
				$this->Set('Resources', $reservation->AllResources());
				$this->Set('Instances', $reservation->Instances());
				$this->Set('Timezone', ServiceLocator::GetServer()->GetUserSession()->Timezone);
				$this->Display('Ajax/reservation/update_successful.tpl');
 			}
 			else
 			{
 				$this->Display('Ajax/reservation/save_failed.tpl');
 			}
		} catch (Exception $ex)
		{
		    
			Log::Error('ReservationUpdatePage - Critical error saving reservation: %s', $ex);
			$this->Display('Ajax/reservation/reservation_error.tpl');
		}
	}

	public function SetSaveSuccessfulMessage($succeeded)
	{
		$this->_reservationSavedSuccessfully = $succeeded;
	}

	public function SetReferenceNumber($referenceNumber)
	{
		$this->Set('ReferenceNumber', $referenceNumber);
	}

	public function SetErrors($errors)
	{
		$this->Set('Errors', $errors);
	}

	public function SetWarnings($warnings)
	{
		// set warnings variable
	}

	public function GetReservationId()
	{
		return $this->GetForm(FormKeys::RESERVATION_ID);
	}

	public function GetSeriesUpdateScope()
	{
		return $this->GetForm(FormKeys::SERIES_UPDATE_SCOPE);
	}

	public function GetRemovedAttachmentIds()
	{
		$fileIds = $this->GetForm(FormKeys::REMOVED_FILE_IDS);
		if (is_array($fileIds))
		{
			return array_keys($fileIds);
		}

		return array();
	}
}