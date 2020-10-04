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
	    
	    if( $_POST['request_no_hidden'] != $_POST['request_no']) {
	        $list = array('Requet No' => $_POST['request_no'],'Old Data' => $_POST['request_no_hidden'],'Action' => 'Edit');
	       
	        $obj->InsertAUditTrail($list,$this->GetReferenceNumber(),$user->UserId,$_POST['request_no_hidden'],$_POST['request_no'],'Request Number','Edit');
	    }
	    
	    if( $_POST['projects_hidden'] != $_POST['projects']) {
	        $list = array('Project No' => $_POST['projects'],'Old Data' => $_POST['projects_hidden'],'Action' => 'Edit');
	       
	        $obj->InsertAUditTrail($list,$this->GetReferenceNumber(),$user->UserId,$_POST['projects_hidden'],$_POST['projects'],'Project Number','Edit');
	    }
	    
	    if( $_POST['reservationTitle_hidden'] != $_POST['reservationTitle']) {
	        $list = array('Title' => $_POST['reservationTitle'],'Old Data' => $_POST['reservationTitle_hidden'],'Action' => 'Edit');
	        
	        $obj->InsertAUditTrail($list,$this->GetReferenceNumber(),$user->UserId,$_POST['reservationTitle_hidden'],$_POST['reservationTitle'],'Title','Edit');
	    }
	    
	    if( $_POST['description_hidden'] != $_POST['reservationDescription']) {
	        $list = array('Description' => $_POST['reservationDescription'],'Old Data' => $_POST['description_hidden'],'Action' => 'Edit');
	        
	        $obj->InsertAUditTrail($list,$this->GetReferenceNumber(),$user->UserId,$_POST['description_hidden'],$_POST['reservationDescription'],'Description','Edit');
	    }
	    
	    if( $_POST['client_hidden'] != $_POST['client']) {
	        $list = array('Client' => $_POST['client'],'Old Data' => $_POST['client_hidden'],'Action' => 'Edit');
	        
	        $obj->InsertAUditTrail($list,$this->GetReferenceNumber(),$user->UserId,$_POST['client_hidden'],$_POST['client'],'Client Name','Edit');
	    }
	    
	    if(!empty($_POST['users'])) {
	        $obj->InsertOwner($_POST['users'],$this->GetReferenceNumber());
	    }
	    
		try
		{
			$this->EnforceCSRFCheck();
			$reservation = $this->_presenter->BuildReservation();
			$this->_presenter->HandleReservation($reservation);

// 			if ($this->_reservationSavedSuccessfully)
// 			{
				$this->Set('Resources', $reservation->AllResources());
				$this->Set('Instances', $reservation->Instances());
				$this->Set('Timezone', ServiceLocator::GetServer()->GetUserSession()->Timezone);
				$this->Display('Ajax/reservation/update_successful.tpl');
// 			}
// 			else
// 			{
// 				$this->Display('Ajax/reservation/save_failed.tpl');
// 			}
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