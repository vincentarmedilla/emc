<?php
/**
 * Copyright 2017-2019 Nick Korbel
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

require_once(ROOT_DIR . 'Pages/ActionPage.php');
require_once(ROOT_DIR . 'Pages/SecurePage.php');
require_once(ROOT_DIR . 'Pages/Ajax/AutoCompletePage.php');
require_once(ROOT_DIR . 'Presenters/Search/SearchReservationsPresenter.php');
require_once(ROOT_DIR . 'lib/Application/Schedule/namespace.php');
require_once(ROOT_DIR . 'Domain/Access/namespace.php');
require_once(ROOT_DIR . 'config/dbconfig.php');
require_once(ROOT_DIR . 'config/crud.php');
interface ISearchReservationsPage extends IActionPage
{
	/**
	 * @param ResourceDto[] $resources
	 */
	public function SetResources($resources);

	/**
	 * @param Schedule[] $schedules
	 */
	public function SetSchedules($schedules);

	public function SetCurrentUser(UserSession $userSession);

	/**
	 * @param ReservationItemView[] $reservations
	 * @param string $timezone
	 */
	public function ShowReservations($reservations, $timezone);

	/**
	 * @return string
	 */
	public function GetRequestedRange();

	/**
	 * @return string
	 */
	public function GetRequestedStartDate();

	/**
	 * @return string
	 */
	public function GetRequestedEndDate();

	/**
	 * @return int[]
	 */
	public function GetResources();

	/**
	 * @return int[]
	 */
	public function GetSchedules();

	/**
	 * @return int
	 */
	public function GetUserId();

	/**
	 * @return string
	 */
	public function GetTitle();

	/**
	 * @return string
	 */
	public function GetDescription();

	/**
	 * @return string
	 */
	public function GetReferenceNumber();

	/**
	 * @param Date $today
	 */
	public function SetToday($today);
}

class SearchReservationsPage extends ActionPage implements ISearchReservationsPage
{
	/**
	 * @var SearchReservationsPresenter
	 */
	private $presenter;

	public function __construct()
	{
		parent::__construct('SearchReservations');

		$resourceService = ResourceService::Create();
		$this->presenter = new SearchReservationsPresenter($this,
														   ServiceLocator::GetServer()->GetUserSession(),
														   new ReservationViewRepository(),
														   $resourceService,
														   new ScheduleService(new ScheduleRepository(), $resourceService, new DailyLayoutFactory()));
	}

	public function ProcessAction()
	{
		$this->presenter->ProcessAction();
	}

	public function ProcessDataRequest($dataRequest)
	{
		// no-op
	}

	public function ProcessPageLoad()
	{
	    //get user info
        $user = ServiceLocator::GetServer()->GetUserSession();

        $obj = new bookingClass;
        //database connection seperate
        $database = New Connection();
        $db = $database->openConnection();

        //get the id groups based on user groups
        $g = array();
        foreach($user->Groups as $value) {
            $query_get_group = $db->prepare("select * from groups where group_id = '$value' or admin_group_id  = '$value'");
            $query_get_group->execute();
            $g[] = $query_get_group->fetchAll();
        }

        $t = array_reduce($g, 'array_merge', array());

        $group_users = array();
        foreach($t as $value) {
            $gid =  $value['group_id'];
            $sth = $db->prepare("select a.*,b.lname,b.fname,b.email,b.user_id as uid,c.resource_id,c.name from user_groups a
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

		$this->presenter->PageLoad();
		$this->Set('group_users',$obj->getUserGroups($user->Groups));
		$this->Display('Search/search-reservations.tpl');
	}

	public function SetResources($resources)
	{
		$this->Set('Resources', $resources);
	}

	public function SetSchedules($schedules)
	{
		$this->Set('Schedules', $schedules);
	}

	public function SetCurrentUser(UserSession $userSession)
	{
		$this->Set('UserNameFilter', sprintf('%s (%s)', new FullName($userSession->FirstName, $userSession->LastName), $userSession->Email));
		$this->Set('UserIdFilter', $userSession->UserId);
	}

	public function SetToday($today)
	{
		$this->Set('Today', $today);
		$this->Set('Tomorrow', $today->AddDays(1));
	}

	public function ShowReservations($reservations, $timezone)
	{
	    $obj = new bookingClass;
	    $user = ServiceLocator::GetServer()->GetUserSession();
	    
	    //get the id groups based on user groups
	    $g = array();
	    foreach($user->Groups as $gid) {
	        $g = $obj->get__group_id($gid);
	       
	    }
	    
	    $this->Set('userView',$obj->CountPermissionUser($user->UserId));
	    $this->Set('permission',$obj->CountPermission($user->UserId));
	    $this->Set('check',$g['type']);
		$this->Set('Reservations', $reservations);
		$this->Set('Timezone', $timezone);
		$this->Display('Search/search-reservations-results.tpl');
	}

	public function GetRequestedRange()
	{
		return $this->GetForm(FormKeys::AVAILABILITY_RANGE);
	}

	public function GetRequestedStartDate()
	{
		return $this->GetForm(FormKeys::BEGIN_DATE);
	}

	public function GetRequestedEndDate()
	{
		return $this->GetForm(FormKeys::END_DATE);
	}

	public function GetUserId()
	{
		return $this->GetForm(FormKeys::USER_ID);
	}

	public function GetResources()
	{
		$resources = $this->GetForm(FormKeys::RESOURCE_ID);
		if (empty($resources))
		{
			return array();
		}

		return $resources;
	}

	public function GetSchedules()
	{
		$schedules = $this->GetForm(FormKeys::SCHEDULE_ID);
		if (empty($schedules))
		{
			return array();
		}

		return $schedules;
	}

	public function GetTitle()
	{
		return $this->GetForm(FormKeys::RESERVATION_TITLE);
	}

	public function GetDescription()
	{
		return $this->GetForm(FormKeys::DESCRIPTION);
	}

	public function GetReferenceNumber()
	{
		return $this->GetForm(FormKeys::REFERENCE_NUMBER);
	}

}

