<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class BookingSystem extends MY_Controller

{
	/*
	| -----------------------------------------------------
	| PRODUCT NAME: 	DIGI VEHICLE BOOKING SYSTEM (DVBS)
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
	*/
	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('request_model');
		$this->load->model('jobs_model');
		$this->load->model('support_model');
		$this->load->model('calls_model');

		// Load MongoDB library instead of native db driver if required

		$this->config->item('use_mongodb', 'ion_auth') ? $this->load->library('mongo_db') : $this->load->database();
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth') , $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
		$this->load->helper('language');
	}

	function index()
	{
	}

	function getVechicles()
	{
		$amount 							= '0';
		$distance 							= ceil(str_replace(",","",$this->input->post('distance')));
		$pick_time 							= explode(":", $this->input->post('Pickup_time'));
		$mer 								= $pick_time[2];
		$var 								= strcmp("PM", trim($mer));
                //$selected_car 							= $this->input->post('selected_car_id');
                $selected_car_id = $this->input->post('selected_car_id');
		if (!$var) {
			$pickup_hours = $pick_time[0] + 12;
		}
		else {
			$pickup_hours = $pick_time[0];
		}

		$pickup_mins = $pick_time[1] / 100;

		$page = $this->input->post('page');


		$time 								= "";
		$html_data 							= "0";

		$recs = $this->db->get_where($this->db->dbprefix('vehicle') , array(
			'status' => 'active'
		))->result();
		$i = 1;
		$html_data1 = "";
		$html_data2 = "";
		if ($page == "booking_page") {
			$html_data1 = "<ul class='nav nav-tabs on-bo-he'>
    <li>
	 <a data-toggle='tab' role='tab' aria-controls='home' href='#home'>
    <div class='on-bo-heddings'><i class='fa fa-automobile'></i> </div> " . $this->lang->line('select_your_car') . "   </a></li>
    <small class='on-smhed'> ( " . $this->lang->line('select_the_car_that_suits_to_your_requirement') . " ) </small>
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
                        
                        $locale_info = localeconv();
                        $symbol = $locale_info['int_curr_symbol'];
                        if ($symbol == 'EUR') {
                            $currency = html_entity_decode('&euro;', ENT_QUOTES, 'utf-8');
                        }
                        else if ($symbol == 'USD') {
                            $currency = html_entity_decode('&dollar;', ENT_QUOTES, 'utf-8');
                        }
                        
			$amount = $this->calculate_cost($r->cost_type, $distance, $r->id, $other_data, $pickup_hours, $pickup_mins);
			$funname = "onClick='setActive(\"cab_" . $r->id . "\");'";
                        $fquery = "SELECT f.features as feature_name 
                                            FROM vbs_vehicle_features vf
                                                INNER JOIN vbs_features f ON f.id = vf.feature_id
                                            WHERE vf.vehicle_id = " . $r->id;
                        $records = $this->base_model->run_query($fquery);
                        $show_wheelchair = "";
                        $show_wheelchair_li = "";
                        foreach($records as $frow) {
                            if (strpos($frow->feature_name,'TPMR') !== false) {
                                $show_wheelchair = '<div class="wheelchair-icon">&nbsp;</div>';
                                $show_wheelchair_li = '<li class="wheelchair-li-icon">&nbsp;</li>';
                            }
                        }
                        
                        if ($r->id == $selected_car_id) {
                            $car_selected = "checked=checked";
                        }
                        else {
                            $car_selected ="";
                        }
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
                                        
                                        if (strpos($r->name,'bus') !== false) {
                                            $vehicle_icone = "<i class='fa fa-bus'></i>";
                                        }
                                        else if ( strpos($r->name,'Van') !== false ) {
                                            $vehicle_icone = '<div class="van-icon"><img src="' . base_url(). 'assets/system_design/images/van-white.png" style="width:30px;"  /></div>';
                                        }
                                        else {
                                            $vehicle_icone = "<i class='fa fa-car'></i>";
                                        }
                                        /* <div class='money' id='cost_" . $r->id . "'>" . $amount . " " . $this->lang->line($locale_info['currency_symbol']) . "</div> */
					$html_data = $html_data . " <div class='" . $classval . "'>
          
 			<input type='radio' name='radiog_dark'  id='cab_" . $r->id . "' class='css-" . $stl . " css-label' " . $radiocheck . "  " . $funname . " value= " . $r->id . "_" . $amount . " " . $car_selected . " ><label for='cab_" . $r->id . "' class='css-label' " . $style . "></label>
           <div class='che-car'> " . $vehicle_icone . " </div>
            <aside>" . $r->name . "</aside>
            
           <div class='text-to'> 
			<div class='members' >  " . $r->passengers_capacity . " </div>
			<div class='wheelchairs'> " . $r->small_luggage_capacity . " </div>
			<div class='luggage'> " . $r->large_luggage_capacity . " </div>
			<input type='hidden' for='cab_" . $r->id . "' name='cname_" . $r->id . "' id='cname_" . $r->id . "' value='" . $r->name . "' data-model='" . $r->model . "'>
			<input type='hidden' name='total_distance' readonly value='" . $distance . "' />
			</div>
			
          </div> ";
				}

				if ($page == "booking_page") {
					$funname = "onClick='setActiveOnline(\"cab_" . $r->id . "\");'";
					$html_data = $html_data . "
				
			<div class='col-md-4' style='float: left; list-style: outside none none; position: relative; width: 280px; margin-right: 10px;'>
                            <div class='car-sel-bx'>
				<div class='fleets_head'><h3>" . $r->name . "</h3></div>
				<img src='http://navetteo.fr/uploads/vehicle_images/". $r->image . "' style='width:150px'/>
			
				<ul class='peoples'>
					<li class='people-icon'>" . $r->passengers_capacity . "</li>	
                                        <li class='wheelchair-li-icon'>" . $r->small_luggage_capacity . "</li>
					<li class='suitcase-icon'>" . $r->large_luggage_capacity . "</li>
				</ul>
		
				<div class='select-radio'>

				<input type='radio' name='radiog_dark' id='cab_" . $r->id . "' class='css-checkbox carse-label' " . $funname . " value= " . $r->id . "_" . $amount . " " . $car_selected . "  >  
                                <label for='cab_" . $r->id . "' class='carse-label'>&nbsp;</label>
				</div>
			<input type='hidden' for='cab_" . $r->id . "' name='cname_" . $r->id . "' id='cname_" . $r->id . "' value='" . $r->name . "' data-model='" . $r->model . "'>
			</div>

</div> ";
				}
			}
		}

		echo $html_data1 . $html_data . $html_data2;
                /* price label <label for='cab_" . $r->id . "' class='carse-label'>" . money_format('%.2n', $amount) . "</label> */
		// echo $html_data;
		// die();

	}

	function calculate_cost($type = '', $distance = '', $vehicle_id, $other = array() , $pickup_hours = '', $pickup_mins = '')
	{

		// $pickip_min = $pickup_mins;

		$pickup_time = ceil($pickup_hours + $pickup_mins);

		// echo $pickup_time;die();

		$vehicle_cost_values = $this->base_model->run_query("SELECT * FROM vbs_cost_type_values WHERE vehicle_id = " . $vehicle_id);
		$timings = $this->base_model->run_query("SELECT * FROM vbs_site_settings");
		$day_start_time = explode(":", $timings[0]->day_start_time) [0];
		$day_end_time = explode(":", $timings[0]->day_end_time) [0];
		if ($type == '' || $distance == '') return '';
		if ($type == 'flat') {

			// Validation for Day/Night Time
			// Condition For Day Time

			if (($pickup_time > $day_start_time) && ($pickup_time <= $day_end_time)) {

				// Setting minimum cost for Day

				$cost = $other['min_cost_day'];
				if ($distance > $other['min_dist_day']) {

					// Calculate the remaining distance to travel for Day

					$extra_Distance = $distance - $other['min_dist_day'];
					$cost = $cost + ($extra_Distance * $vehicle_cost_values[0]->day_flat_rate);
					return $cost;
				}
				else {
					return $cost;
				}
			}
			else {

				// Setting minimum cost for Night time

				$cost = $other['min_cost_night'];
				if ($distance > $other['min_dist_night']) {

					// Calculate the remaining distance to travel

					$extra_Distance = $distance - $other['min_dist_night'];
					$cost = $cost + ($extra_Distance * $vehicle_cost_values[0]->night_flat_rate);
					return $cost;
				}
				else {
					return $cost;
				}
			}
		}
		elseif ($type == 'incremental') {
			$cost = 0;

			// Validation for Day/Night Time
			// Condition For Day Time

			if (($pickup_time > $day_start_time) && ($pickup_time < $day_end_time)) {

				// Find the range of distance

				foreach($vehicle_cost_values as $row) {
					if ($distance > $row->from_distance_value && $distance < $row->to_distance_value) $cost = $row->day_cost;
				}

				// Calculate cost according to distance

				$cost = ($cost * $distance);
				return $cost;
			}
			else {

				// Night time cost calculation

				foreach($vehicle_cost_values as $row) {
					if ($distance > $row->from_distance_value && $distance < $row->to_distance_value) $cost = $row->night_cost;
				}

				$cost = ($cost * $distance);
				return $cost;
			}
		}
	}
}