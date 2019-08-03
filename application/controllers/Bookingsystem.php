<?php
/**
 * DOVBSV2
 * 
 * An online cab booking system in codeigneter framework
 * 
 * This content is released under the Codecanyon Market License (CML)
 * 
 * Copyright (c) 2017 - 2018, Codecakes
 *
 * @category  Airports
 * @package   DOVBSV2
 * @author    DOVBSV2 <digitalvidhya4u@gmail.com>
 * @copyright 2017 - 2018, DOVBSV2
 * @license   http://opensource.org/licenses/MIT    MIT License
 * @link      http://codeigniter.com
 * @since     Version 1.0.0
 */
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * CodeIgniter User_authentication Class
 * 
 * Bookingsystem.
 *
 * @category  Bookingsystem
 * @package   DOVBSV2
 * @author    DOVBSV2 <digitalvidhya4u@gmail.com>
 * @copyright 2017 - 2018, DOVBSV2
 * @license   http://opensource.org/licenses/MIT    MIT License
 * @link      http://codeigniter.com
 */
class BookingSystem extends MY_Controller
{
	/**
	| -----------------------------------------------------
	| PRODUCT NAME: 	DIGI VEHICLE BOOKING SYSTEM (DVBSV2)
	| -----------------------------------------------------
	| AUTHOR:			DIGITAL VIDHYA TEAM
	| -----------------------------------------------------
	| EMAIL:			digitalvidhya4u@gmail.com
	| -----------------------------------------------------
	| COPYRIGHTS:		RESERVED BY DIGITAL VIDHYA
	| -----------------------------------------------------
	| WEBSITE:			http://digitalvidhya.com
	|                   http://codecanyon.net/user/digitalvidhya
	| -----------------------------------------------------
	|
	| MODULE: 			BookingSystem
	| -----------------------------------------------------
	| This is BookingSystem module controller file.
	| -----------------------------------------------------
	**/
	function __construct()
	{
		parent::__construct();
		
		// Load MongoDB library instead of native db driver if required

		$this->config->item('use_mongodb', 'ion_auth') ? $this->load->library('mongo_db') : $this->load->database();
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
        
		// $this->load->helper('language');
	}
	/**
     * index
     *
     *
     * @return 
    **/ 
	function index()
	{
       
	}
	/**
     * Get Vehicles
     *
     *
     * @return array
    **/ 
	function getVechicles()
	{	
		$amount 							= '0';
		$distance 							= ceil(str_replace(",", "", $this->input->post('distance')));
		$pick_time 							= explode(":", $this->input->post('Pickup_time'));
		$mer 								= $pick_time[2];
		$var 								= strcmp("PM", trim($mer));
		if (!$var) {
			$pickup_hours = (float)$pick_time[0] + 12;
		}
		else {
			$pickup_hours = (float)$pick_time[0];
		}
		$pickup_mins = (float)($pick_time[1]) / 100;

		$page = $this->input->post('page');
		
		
		//code to get total journey hours
		$journey_time = explode(" ", chop($this->input->post('journey_time'), "(Approx)"));
		// echo "<pre>"; print_r($journey_time); die();
		$total_hours = 0;
		if($journey_time[1] == "day" || $journey_time[1] == "days"){
			$total_hours = $journey_time[0]*24;
				if($journey_time[3] == "hour" || $journey_time[3] == "hours")
					$total_hours = $total_hours+$journey_time[2];
		}elseif($journey_time[1] == "hour" || $journey_time[1] == "hours"){
			$total_hours = $journey_time[0];
				if($journey_time[3] == "mins" && $journey_time[2]>15)
					$total_hours = $total_hours+1;
		}
		//code to get total journey hours END
		
		//code to get total days journey and total nights journey
		
		$my_day_start_time = (float)$this->config->item('site_settings')->day_start_time;
		$my_day_end_time = (float)$this->config->item('site_settings')->day_end_time;
		$my_night_start_time = (float)$this->config->item('site_settings')->night_start_time;
		$my_night_end_time = (float)$this->config->item('site_settings')->night_end_time;
		$my_day_hours = (float)$my_day_end_time - (float)$my_day_start_time;
		$my_night_hours = 24 - $my_day_hours;
		$my_pickup_time = ceil($pickup_hours + $pickup_mins);
		$my_day_hours_travelled 	= 0;
		$my_night_hours_travelled 	= 0;
		$no_of_days_journey 		= 0;
		$no_of_nights_journey 		= 0;
		if(($my_pickup_time > $my_day_start_time) && ($my_pickup_time <= $my_day_end_time)){
			
			$my_day_hours_travelled = $my_day_end_time - $pickup_hours;
			$total_hours = $total_hours -  $my_day_hours_travelled;
				while($total_hours > $my_night_hours){
					$my_night_hours_travelled = $my_night_hours;
					$total_hours = $total_hours - $my_night_hours;
					if($total_hours > $my_day_hours){
					$my_day_hours_travelled = $my_day_hours_travelled + $my_day_hours;
					$total_hours = $total_hours - $my_day_hours;
					}else{
					$my_day_hours_travelled = $my_day_hours_travelled + $total_hours;
					$total_hours = $total_hours - $total_hours;
					}
				}
		$my_night_hours_travelled = $my_night_hours_travelled + $total_hours;
		}else{
			$my_night_hours_travelled = $my_night_start_time + $my_night_hours - $pickup_hours;
			$total_hours = $total_hours -  $my_night_hours_travelled;
				while($total_hours > $my_day_hours){
					$my_day_hours_travelled = $my_day_hours;
					$total_hours = $total_hours - $my_day_hours;
					if($total_hours > $my_night_hours){
					$my_night_hours_travelled = $my_night_hours_travelled + $my_night_hours;
					$total_hours = $total_hours - $my_night_hours;
					}else{
					$my_night_hours_travelled = $my_night_hours_travelled + $total_hours;
					$total_hours = $total_hours - $total_hours;
					}
				}
			
		$my_day_hours_travelled = $my_day_hours_travelled + $total_hours;
		}
		
		$no_of_days_journey = ceil($my_day_hours_travelled/24);
		$no_of_nights_journey= ceil($my_night_hours_travelled/9);

		//code to get total days journey and total nights journey END
		 
		$time 								= "";
		$html_data 							= "0";

		$recs = $this->db->get_where($this->db->dbprefix('vehicle'), array(
			'status' => 'active'
		))->result();
		$i = 1;
		$html_data1 = "";
		$html_data2 = "";
		if ($page == "booking_page") {
			$html_data1 = "<ul class='nav nav-tabs on-bo-he'>
    <li>
	 <a data-toggle='tab' role='tab' aria-controls='home' href='#home'>
    <div class='on-bo-heddings'><i class='fa fa-automobile'></i> </div> Select Your Car   </a></li>
    <small class='on-smhed'> ( Select the Car that suits to your requirement ) </small>
  </ul> 
  <div class='col-md-12'>
  	<div class='overley'></div>
  <ul class='bxslider'>";
			$html_data2 = "</ul> </div>";
		}

		foreach($recs as $r) {
			if ($html_data == "0") $html_data = "";
			$classval = "scrool-cab";
			$radiocheck = "";
			/*if($i++==1) {
			$radiocheck = "checked";
			$classval="scrool-cab active";
			}*/

			// Calculate the cost according to vehicle

			$other_data = array();
			if ($r->cost_type == 'flat') {
				$other_data = array(
					'min_dist_day' => $r->ct_flat_min_dist_day,
					'min_dist_night' => $r->ct_flat_min_dist_night,
					'min_cost_day' => $r->ct_flat_min_cost_day,
					'min_cost_night' => $r->ct_flat_min_cost_night
				);
			}

			

			$amount = $this->calculate_cost($r->cost_type, $distance, $r->id, $other_data, $pickup_hours, $pickup_mins, $no_of_nights_journey, $r->cost_starting_from);
			$funname = "onClick='setActive(\"cab_" . $r->id . "\");'";
			if ($amount > 0) {
				if ($page == "general_booking" || $page == "admin_booking") {
					if ($page == "general_booking") {
						$stl = "checkbox";
						$style = "";
					}
					elseif ($page == "admin_booking") {
						$stl = "radio";
						$style = "style='margin:15px 5px;'";
					}

					$vehicle_image = "<img width='45' height='45' src='".get_vehicle_image($r->image)."'>";


					
					 
					
					$html_data = $html_data . " <div class='" . $classval . "'>
          
 			<input type='radio' name='radiog_dark'  id='cab_" . $r->id . "' class='css-" . $stl . " css-label' " . $radiocheck . "  " . $funname . " value= " . $r->id . "_" . $amount . "><label for='cab_" . $r->id . "' class='css-label' " . $style . "></label>
           <div class='che-car'> ".$vehicle_image." </div>

            <aside><span>" . $r->name.'</span><label class="bmc-model">'.$r->model."</label></aside>
            
           <div class='text-to'> 
		   
			<div class='members' >  " . $r->passengers_capacity . " </div>
			<div class='luggage'> " . $r->large_luggage_capacity . " </div>
			<div class='bags'> " . $r->small_luggage_capacity . " </div>
			<div class='money' id='cost_" . $r->id . "'> " .$this->config->item('site_settings')->currency_symbol." ".$amount. "</div>
			<input type='hidden' for='cab_" . $r->id . "' name='cname_" . $r->id . "' id='cname_" . $r->id . "' value='" . $r->name . "'>
			<input type='hidden' name='total_distance' readonly value='" . $distance . "' />
            
            
            <input type='hidden' name='total_time' readonly value='". $this->input->post('journey_time'). "' />
            
           
			</div>
			
          </div> ";
				}

				if ($page == "booking_page") {


			$vimage = "<img class='bmc-vehicle img-responsive' src='". get_vehicle_image($r->image)."'>";

					

					// ($r->image != "" && file_exists('uploads/vehicle_images/'.$r->image)) ? "<img class='bmc-vehicle img-responsive' src='".base_url()."uploads/vehicle_images/".$r->image."'>" : "<i class='fa fa-automobile'></i>";


					$funname = "onClick='setActiveOnline(\"cab_" . $r->id . "\");'";
					$html_data = $html_data . "
				
			<div class='col-md-4' style='float: left; list-style: outside none none; position: relative; width: 280px; margin-right: 10px;'>

				<div class='car-sel-bx'> ".$vimage."
				
				<h3>" . $r->name.'<label class="bmc-model">'.$r->model.'</label>' . "</h3>
			
				<ul class='peoples'>

					<li class='people-icon'>" . $r->passengers_capacity . "</li>	

					<li class='suitcase-icon'>" . $r->large_luggage_capacity . "</li>

					<li class='bag-icon last'>" . $r->small_luggage_capacity . "</li>
		
				</ul>
		
				<div class='select-radio'>

				<input type='radio' name='radiog_dark' id='cab_" . $r->id . "' 
				class='css-checkbox carse-label' " . $funname . " value= " . $r->id . "_" . $amount . "  >  
			
				<label for='cab_" . $r->id . "' class='carse-label'>" .$this->config->item('site_settings')->currency_symbol." ".$amount. "</label>

				</div>
			<input type='hidden' for='cab_" . $r->id . "' name='cname_" . $r->id . "' id='cname_" . $r->id . "' value='" . $r->name . "'>
			</div>

</div> ";
				}
			}
		}

		echo $html_data1 . $html_data . $html_data2;

		// echo $html_data;
		// die();

	}

	
	/**
     * Calculate Booking cost
     *
     * @param string  $type
     * @param float   $distance
     * @param int     $vehicle_id
     * @param array   $other
     * @param array   $other
     * @param string  $pickup_hours
     * @param string  $pickup_mins
     * @param int     $no_of_nights_journey
     * @param decimal $starting_cost
     * @return array
    **/ 
	function calculate_cost($type = '', $distance = '', $vehicle_id, $other = array() , $pickup_hours = '', $pickup_mins = '',$no_of_nights_journey = '', $starting_cost = 0)
	{
		// $pickip_min = $pickup_mins;

		$pickup_time = ceil($pickup_hours + $pickup_mins);

		// echo $pickup_time;die();

		$vehicle_cost_values = $this->base_model->run_query("SELECT * FROM vbs_cost_type_values WHERE vehicle_id = " . $vehicle_id);
		
		$timings = $this->base_model->run_query("SELECT * FROM vbs_site_settings");
		$day_start_time = explode(":", $timings[0]->day_start_time) [0];
		$day_end_time = explode(":", $timings[0]->day_end_time) [0];
		if ($type == '' || $distance == '') return '';

		$cost=0;

		if ($type == 'flat') {

			// Validation for Day/Night Time
			// Condition For Day Time

			if (($pickup_time > $day_start_time) && ($pickup_time <= $day_end_time)) {

				// Setting minimum cost for Day

				

				$cost = $starting_cost;

				
				if ($distance > $other['min_dist_day']) 
				{
					// Calculate the remaining distance to travel for Day
					$cost = $cost+($other['min_dist_day']*$other['min_cost_day']); 


					$extra_Distance = $distance - $other['min_dist_day'];
					$cost = $cost + ($extra_Distance * $vehicle_cost_values[0]->day_flat_rate);
					
					return $cost;
				}
				else 
				{
					$cost = $cost+($distance*$other['min_cost_day']);
					return $cost;
				}




				
			}
			
			else {

				// Setting minimum cost for Night time

				$cost = $starting_cost;


				if ($distance > $other['min_dist_night']) {

					// Calculate the remaining distance to travel

					$cost += $other['min_dist_night']*$other['min_cost_night']; 

					$extra_Distance = $distance - $other['min_dist_night'];

					$cost = $cost + ($extra_Distance * $vehicle_cost_values[0]->night_flat_rate);

					$cost = $cost + ($no_of_nights_journey * $this->config->item('site_settings')->driver_charge_night);

					return $cost;
				}
				else {

					$cost = $cost + ($distance*$other['min_cost_night']);  

					$cost = $cost + ($no_of_nights_journey * $this->config->item('site_settings')->driver_charge_night);

					return $cost;
				}
				
			}
			
		}
		
		elseif ($type == 'incremental') {

			$cost = 0;

			$cost1 = 0;
			$cost2 = 0;
			$cost3 = 0;
			$final_cost = 0;
			$total_cost = 0;

			$cost4=0;

			// Validation for Day/Night Time
			
			// Condition For Day Time

			if (($pickup_time >= $day_start_time) && ($pickup_time <= $day_end_time)) {
				// Find the range of distance

				foreach($vehicle_cost_values as $row) {





					$difference=0;
					$difference = $row->to_distance_value - $row->from_distance_value;
					
					
					if(($row->from_distance_value) == '1') {
						$difference += 1;
					}


					if ($distance >= $difference) 
					{
						
						$cost += $difference*$row->day_cost; 
						$distance = $distance - $difference; 
					}
					else 
					{
						$cost += $distance*$row->day_cost; 
						$distance = 0;
					}


				}



				if ($distance>0)
				{
					$cost_records_count = count($vehicle_cost_values);

					$last_record = $vehicle_cost_values[$cost_records_count-1];

					$cost4 = ($last_record->day_cost)*$distance;
				}

				

				$total_cost =  $final_cost+$cost+$cost4;


				// Calculate cost

				

				return $total_cost + $starting_cost;
			}
			else {

				// Night time cost calculation
					
				foreach($vehicle_cost_values as $row) {



					$difference=0;
					$difference = $row->to_distance_value - $row->from_distance_value;
					
					if(($row->from_distance_value) == '1') {
						$difference += 1;
					}


					if ($distance >= $difference) 
					{
						
						$cost += $difference*$row->night_cost; 
						$distance = $distance - $difference; 
					}
					else 
					{
						$cost += $distance*$row->night_cost; 
						$distance = 0;
					}



				}

				if ($distance>0)
				{
					$cost_records_count = count($vehicle_cost_values);

					$last_record = $vehicle_cost_values[$cost_records_count-1];

					$cost4 = ($last_record->night_cost)*$distance;
				}
				
				$total_cost =  $final_cost+$cost+$cost4;
			

				// Calculate cost	
				return $total_cost + $starting_cost + ($no_of_nights_journey * $this->config->item('site_settings')->driver_charge_night);


			}
		}
	}
}
