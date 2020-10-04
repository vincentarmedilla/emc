<?php
/**
 * Copyright 2012-2019 Nick Korbel
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

require_once(ROOT_DIR . 'lib/Application/Reporting/namespace.php');
require_once(ROOT_DIR . 'lib/Application/Attributes/namespace.php');

class CustomReport implements IReport
{
	/**
	 * @var CustomReportData
	 */
	private $data;
	/**
	 * @var ReportColumns
	 */
	private $cols;
	/**
	 * @var int
	 */
	private $resultCount = 0;

	/**
	 * @param array $rows
	 * @param IAttributeRepository $attributeRepository
	 */
	public function __construct($rows, IAttributeRepository $attributeRepository)
	{
		$this->resultCount = count($rows);

		$this->cols = new ReportColumns();
		if (count($rows) > 0)
		{
		   
			foreach ($rows[0] as $columnName => $value)
			{
				if ($columnName == ColumnNames::ATTRIBUTE_LIST)
				{
					$attributes = $attributeRepository->GetByCategory(CustomAttributeCategory::RESERVATION);

					foreach ($attributes as $attribute)
					{
						$this->cols->AddAttribute(CustomAttributeCategory::RESERVATION, $attribute->Id(), $attribute->Label());
					}
				}
				elseif ($columnName == ColumnNames::USER_ATTRIBUTE_LIST)
				{
					$attributes = $attributeRepository->GetByCategory(CustomAttributeCategory::USER);

					foreach ($attributes as $attribute)
					{
						$this->cols->AddAttribute(CustomAttributeCategory::USER, $attribute->Id(), $attribute->Label());
					}
				}
				elseif ($columnName == ColumnNames::RESOURCE_ATTRIBUTE_LIST)
				{
					$attributes = $attributeRepository->GetByCategory(CustomAttributeCategory::RESOURCE);

					foreach ($attributes as $attribute)
					{
						$this->cols->AddAttribute(CustomAttributeCategory::RESOURCE, $attribute->Id(), $attribute->Label());
					}
				}
				elseif ($columnName == ColumnNames::RESOURCE_TYPE_ATTRIBUTE_LIST)
				{
					$attributes = $attributeRepository->GetByCategory(CustomAttributeCategory::RESOURCE_TYPE);

					foreach ($attributes as $attribute)
					{
						$this->cols->AddAttribute(CustomAttributeCategory::RESOURCE_TYPE, $attribute->Id(), $attribute->Label());
					}
				}
				else
				{
					$this->cols->Add($columnName);
				}
			}
		}
		
		foreach ($rows as $key=>$value) 
		{
		   
		    if($value['billable'] == '1') {
		        $rows[$key]['billable'] = 'Yes';
		    } else {
		        $rows[$key]['billable'] = 'No';
		    }
		    
		    if($value['status'] == '2') {
		        $rows[$key]['status'] = 'Confirmed';
		    } else {
		        $rows[$key]['status'] = 'Temporary';
		    }
		   
		    $str = $rows[$key]['total_ducation'];
		    $r = explode(" ",$str);
		    
		    $day = explode("=",$r[0]);
		    $hrs = explode("=",$r[1]);
		    $min = explode("=",$r[2]);
		    
		    if($day[0] == '0')
		    {
		        $d = '';
		    } else {
		        $d = $day[0].' '.$day[1];
		    }
		    
		    if($hrs[0] == '00')
		    {
		        $h = '';
		    } else {
		        $h = $hrs[0].' '.$hrs[1];
		    }
		    
		    if($min[0] == '00')
		    {
		        $m = '';
		    } else {
		        $m = $min[0].' '.$min[1];
		    }
		      
		    $actualDuration = json_decode($rows[$key]['date_time_duration']);
		    $sum = strtotime('00:00:00');
		    $totaltime = 0;
		    foreach($actualDuration as $d) {
		        $t = explode("=>",$d);
		        $timeinsec = strtotime($t[3]) - $sum;
		        $totaltime = $totaltime + $timeinsec;
		    }
		    $h = intval($totaltime / 3600);
		    $totaltime = $totaltime - ($h * 3600);
		    
		    // Minutes is obtained by dividing
		    // remaining total time with 60
		    $m = intval($totaltime / 60);
		    
		    // Remaining value is seconds
		    $s = $totaltime - ($m * 60);
		    
		    // Printing the result
		    $total_h = ("$h:$m:$s");
		    $parts = explode(":", $total_h); //if you know its safe
		    $total_s = ($parts[0] * 60 * 60 + $parts[1] * 60 + $parts[2]) . "s";
		    
		    $rows[$key]['total_ducation'] = $this->secondsToTime($total_s);
		    
		   
		    
		    $dura = json_decode($rows[$key]['date_time_duration']);
		    
		    if(empty($dura)) {
		        $rows[$key]['actualstart'] = "";
		        $rows[$key]['actualend'] = "";
		    } else {
		    //get the first and last value of array for actual start and actual end
		    $actualStart = reset($dura);
		    $actualEnd = end($dura);
		    
		    $st = explode("=>",$actualStart);
		    $ed = explode("=>",$actualEnd);
		    
		    $rows[$key]['actualstart'] = date("m/d/Y",strtotime($st[0])).' '.date('h:i A', strtotime($st[1]));
		    $rows[$key]['actualend'] = date("m/d/Y",strtotime($ed[0])).' '.date('h:i A', strtotime($ed[2]));
		    }
		}
		
		
		$this->data = new CustomReportData($rows);
	}
	
	function secondsToTime($seconds)
	{
	    $dtF = new \DateTime('@0');
	    $dtT = new \DateTime("@$seconds");
	    return $dtF->diff($dtT)->format('%a days, %h hours, %i minutes');
	}

	/**
	 * @return IReportColumns
	 */
	public function GetColumns()
	{
		return $this->cols;
	}

	/**
	 * @return IReportData
	 */
	public function GetData()
	{
		return $this->data;
	}

	/**
	 * @return int
	 */
	public function ResultCount()
	{
		return $this->resultCount;
	}
}