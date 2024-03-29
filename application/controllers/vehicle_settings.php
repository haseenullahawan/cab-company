<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vehicle_Settings extends MY_Controller
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
	| MODULE: 			Vehicle Settings
	| -----------------------------------------------------
	| This is Vehicle Settings module controller file.
	| -----------------------------------------------------
	*/
	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('form_validation');
		$this->load->helper('url');

		// Load MongoDB library instead of native db driver if required
		$this->config->item('use_mongodb', 'ion_auth') ? $this->load->library('mongo_db') : $this->load->database();
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth') , $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
		$this->lang->load('general');
		$this->load->helper('language');
		$this->load->model('request_model');
		$this->load->model('jobs_model');
		$this->load->model('support_model');
		$this->load->model('calls_model');
	}

	function index()
	{
		redirect('/');
	}

	/****** VALIDATE URL ******/
	function _valid_url($url)
	{
		$pattern = "/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i";
		if (!preg_match($pattern, $url)) {
			$this->form_validation->set_message('_valid_url', $this->lang->line('valid_url_req'));
			return false;
		}
		return true;
	}

	/****** VALIDATE IMAGE ******/
	function _image_check($image = '', $param2 = '')
	{
		$name = explode('.', $param2);
		if (count($name) > 2 || count($name) <= 0) {
			$this->form_validation->set_message('_image_check', $this->lang->line('valid_image'));
			return FALSE;
		}
		$ext = $name[1];
		$allowed_types = array(
			'jpg',
			'jpeg',
			'png'
		);
		if (!in_array($ext, $allowed_types)) {
			$this->form_validation->set_message('_image_check', $this->lang->line('valid_image'));
			return FALSE;
		}
		else {
			return TRUE;
		}
	}

	/****** DO UPLOAD FILES ******/
	function do_upload($upload_path = '', $allowed_types = '', $filename = '', $redirect_path)
	{
		$config['upload_path'] 				= $upload_path;
		$config['allowed_types'] 			= $allowed_types;
		$config['max_size'] 				= '10240';
		$config['max_width'] 				= '6000';
		$config['max_height'] 				= '6000';
		$config['file_name'] 				= $filename;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload()) {
			$error = array(
				'error' => $this->upload->display_errors()
			);
			$this->prepare_flashmessage($error['error'], 1);
			redirect($redirect_path, 'refresh');
		}
	}

	/******	CRUD OPERATIONS FOR VEHICLE SETTINGS - START	******/

	function vehicles($param1 = '', $param2 = '', $param3 = '')
	{
		$this->data['message'] 				= "";
		if (
		!$this->ion_auth->logged_in() || 
		!$this->ion_auth->is_admin()
		) 
			redirect('auth', 'refresh');
		$common_table 						= 'vehicle';
		$page_name 							= 'admin/settings/vehicles/vehicles';
		$title 								= $this->lang->line('vehicles');
		$sub_title 							= $this->lang->line('vehicle_settings');
		$active_class 						= "vehicle";
		if ($param1 == "Add" || $param1 == "Update") {
			/* Validation Rules */
			$this->form_validation->set_rules('category_id', $this->lang->line('category_id') , 'trim|required|xss_clean');
			$this->form_validation->set_rules('name', $this->lang->line('name') , 'trim|required|xss_clean|min_length[3]|max_length[30]');
			$this->form_validation->set_rules('model', $this->lang->line('model') , 'trim|required|xss_clean|alpha_numeric_spaces|max_length[40]');
			$this->form_validation->set_rules('fuel_type', $this->lang->line('fuel_type') , 'trim|required|xss_clean');
			$this->form_validation->set_rules('passengers_capacity', $this->lang->line('passenger_capacity') , 'trim|required|xss_clean|integer');
			$this->form_validation->set_rules('large_luggage_capacity', $this->lang->line('large_luggage_capacity') , 'trim|required|xss_clean|integer');
			$this->form_validation->set_rules('small_luggage_capacity', $this->lang->line('small_luggage_capacity') , 'trim|required|xss_clean|integer');
			$this->form_validation->set_rules('starting_cost', 'Starting Cost', 'trim|required|xss_clean|integer');
			$this->form_validation->set_rules('waiting_time', $this->lang->line('waiting_time') , 'trim|xss_clean');
			$this->form_validation->set_rules('cost_type', $this->lang->line('cost_type') , 'trim|required|xss_clean');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			if (!empty($_FILES['userfile']['name'])) {
				$this->form_validation->set_rules('userfile', $this->lang->line('image') , 'trim|xss_clean|callback__image_check[' . $_FILES['userfile']['name'] . ']');
			}

			/* Get Data and Insert into DB */
			$inputdata['category_id'] 		= $this->input->post('category_id');
			$inputdata['name'] 				= $this->input->post('name');
			$inputdata['model'] 			= $this->input->post('model');
			$inputdata['fuel_type'] 		= $this->input->post('fuel_type');
			$inputdata['passengers_capacity'] = $this->input->post('passengers_capacity');
			$inputdata['large_luggage_capacity'] = $this->input->post('large_luggage_capacity');
			$inputdata['small_luggage_capacity'] = $this->input->post('small_luggage_capacity');
			$inputdata['description'] 		= $this->input->post('description');
			$inputdata['total_vehicles'] 	= $this->input->post('total_vehicles');
			$inputdata['cost_starting_from']= $this->input->post('starting_cost');
			$inputdata['waiting_time'] 		= $this->input->post('waiting_time');
			$inputdata['cost_type'] 		= $this->input->post('cost_type');
			$inputdata['status'] 			= $this->input->post('status');
			if ($inputdata['cost_type'] == "flat") {
				$inputdata['ct_flat_min_dist_day'] = $this->input->post('ct_flat_min_dist_day');
				$inputdata['ct_flat_min_cost_day'] = $this->input->post('ct_flat_min_cost_day');
				$inputdata['ct_flat_min_dist_night'] = $this->input->post('ct_flat_min_dist_night');
				$inputdata['ct_flat_min_cost_night'] = $this->input->post('ct_flat_min_cost_night');
			}
		}

		if ($param1 == "Add" || $param1 == "Edit") {
			/****** Prepare Vehicle Category Options ******/
			$vehicleCats = $this->base_model->run_query('select * from ' . $this->db->dbprefix("vehicle_categories") . ' where status="Active"');
			$vehicleCatOptions[''] = $this->lang->line('select') . " " . $this->lang->line('vehicle') . " " . $this->lang->line('category');
			foreach($vehicleCats as $id => $val) {
				$vehicleCatOptions[$val->id] = $val->category;
			}

			$this->data['vehicleCatOptions'] = $vehicleCatOptions;
			/****** Get Records of Vehicle Features ******/
			$vehicleFeatures = $this->base_model->run_query('select * from ' . $this->db->dbprefix("features") . ' where status="Active"');
			$this->data['vehicleFeatures'] = $vehicleFeatures;
		}

		/* Add Vehicle */
		if ($param1 == "Add") {
			if ($this->input->post('submit') != '') {
				if ($this->form_validation->run() == TRUE) {
					$insertId = $this->base_model->insert_operation_id($inputdata, $common_table);
					if ($insertId > 0) {
						if ($inputdata['waiting_time'] == "enable") {
							/* Save Waiting Time Costs */
							$wt_data = $this->input->post('wt_data');
							$values = explode("^", $wt_data);
							$len = count($values);
							$result = array_filter($values, create_function('$a', 'return preg_match("#\S#", $a);'));
							$i = 0;
							foreach($result as $v) {
								if ($i++ < $len) {
									$values1 = explode(",", $v);
									if ($values1[0] != "" && $values1[1] != "" && $values1[2] != "") {
										$wtData['from_time'] 	= $values1[0];
										$wtData['to_time'] 		= $values1[1];
										$wtData['cost'] 		= $values1[2];
										$wtData['vehicle_id'] 	= $insertId;
										$this->base_model->insert_operation($wtData, 'waiting_time');
									}
								}
							}
						}

						if ($inputdata['cost_type'] == "incremental") {
							/* Save Cost Type Values if type is incremental.*/
							$ct_data 		= $this->input->post('ct_data');
							$values 		= explode("^", $ct_data);
							$len 			= count($values);
							$result 		= array_filter($values, create_function('$a', 'return preg_match("#\S#", $a);'));
							$i 				= 0;
							foreach($result as $v) {
								if ($i++ < $len) {
									$values1 = explode(",", $v);
									if ($values1[0] != "" && $values1[1] != "" && 
										$values1[2] != "" && $values1[3] != "") {
										$ctData['from_distance_value'] = $values1[0];
										$ctData['to_distance_value'] = $values1[1];
										$ctData['day_cost'] 	= $values1[2];
										$ctData['night_cost'] 	= $values1[3];
										$ctData['type'] 		= $inputdata['cost_type'];
										$ctData['day_flat_rate'] = 0.00;
										$ctData['night_flat_rate'] = 0.00;
										$ctData['vehicle_id'] 	= $insertId;
										$this->base_model->insert_operation($ctData, 'cost_type_values');
									}
								}
							}
						}
						elseif ($inputdata['cost_type'] == "flat") {
							/* Save Cost Type Values if type is flat.*/
							$ct_data = explode('^', $this->input->post('ct_data'));
							if (is_numeric($ct_data[0]) && is_numeric($ct_data[1])) {
								$ctData['from_distance_value'] 	= "";
								$ctData['to_distance_value'] 	= "";
								$ctData['day_cost'] 			= 0.00;
								$ctData['night_cost'] 			= 0.00;
								$ctData['type'] = $inputdata['cost_type'];
								$ctData['day_flat_rate'] 		= $ct_data[0];
								$ctData['night_flat_rate'] 		= $ct_data[1];
								$ctData['vehicle_id'] 			= $insertId;
								$this->base_model->insert_operation($ctData, 'cost_type_values');
							}
						}

						/* Save Vehicle Features. */
						$vehicle_features 						= $this->input->post('feature_id');
						foreach($vehicle_features as $vf) {
							if ($vf != "" && is_numeric($vf)) {
								$vfData['feature_id'] 			= $vf;
								$vfData['vehicle_id'] 			= $insertId;
								$this->base_model->insert_operation($vfData, 'vehicle_features');
							}
						}

						/* Save Vehicle Image */
						if (!empty($_FILES['userfile']['name'])) {
							$filename 							= $insertId . "_" . 
																str_replace(' ', '',$_FILES['userfile']['name']);
							$fileinput['image'] 				= $filename;
							// echo $filename; die();
							$this->base_model->update_operation(
																$fileinput, 
																$common_table, 
																array('id' => $insertId)
																);
							$this->do_upload(
											'./uploads/vehicle_images/', 
											'jpg|jpeg|png', 
											$filename, 
											'vehicle_settings/vehicles/Add'
											);
						}

						$msg = $this->lang->line('vehicle') . " " . 
						$this->lang->line('add_success');
						$this->prepare_flashmessage($msg, 0);
						redirect('vehicle_settings/vehicles', 'refresh');
					}
					else {
						$this->prepare_flashmessage($this->lang->line('session_expired') , 2);
						redirect('/', 'refresh');
					}
				}
			}

			$page_name = 'admin/settings/vehicles/vehicle_add_edit';
			$title = $this->lang->line('add') . " " . $this->lang->line('vehicle');
		}

		/* Edit Selected Vehicle */
		if ($param1 == "Edit") {
			if ($param2 != '' && is_numeric($param2)) {
				$where['id'] 				= $param2;
				$edit_data 					= $this->base_model->fetch_records_from(
											$common_table, 
											$where
											);
				if (isset($edit_data) && count($edit_data) > 0) {
					$this->data['edit_data'] = $edit_data[0];
					/* Selected Vehicle Fetures */
					$edit_vf_data = $this->base_model->run_query(
					"select feature_id from " . $this->db->dbprefix('vehicle_features') .
					" where vehicle_id=" . $param2
					);
					$vfData 				= array();
					foreach($edit_vf_data as $f) {
						array_push($vfData, $f->feature_id);
					}

					$this->data['vfData'] 	= $vfData;
					/* If Waiting Time is enabled, get costs */
					if ($edit_data[0]->waiting_time == "enable") {
						$wtCosts = $this->base_model->run_query(
						"select * from " . $this->db->dbprefix('waiting_time') . 
						" where vehicle_id=" . $param2
						);
						$this->data['wtCosts'] 	= $wtCosts;
					}

					/*Get Cost Type Values */
					if ($edit_data[0]->cost_type == "flat") {
						$ctFlatValues = $this->base_model->run_query("select * from " . $this->db->dbprefix('cost_type_values') . " where vehicle_id=" . $param2);
						$this->data['ctFlatValues'] = $ctFlatValues[0];
					}
					elseif ($edit_data[0]->cost_type == "incremental") {
						$ctIncrValues 		= $this->base_model->run_query(
						"select * from " . $this->db->dbprefix('cost_type_values') . 
						" where vehicle_id=" . $param2
						);
						$this->data['ctIncrValues'] = $ctIncrValues;
					}

					$page_name = 'admin/settings/vehicles/vehicle_add_edit';
					$title = $this->lang->line('update') . " " . $this->lang->line('vehicle');
				}
				else {
					$this->prepare_flashmessage($this->lang->line('vehicle') . 
					" " . $this->lang->line('not_exist') , 1);
					redirect('vehicle_settings/vehicles', 'refresh');
				}
			}
			else {
				$this->prepare_flashmessage($this->lang->line('vehicle') . 
				" " . $this->lang->line('not_exist') , 1);
				redirect('vehicle_settings/vehicles', 'refresh');
			}
		}

		// Update Selected Vehicle
		if ($param1 == "Update") {
			if (
			$this->input->post('submit') != '' && 
			$this->input->post('Id_to_update') != '' && 
			is_numeric($this->input->post('Id_to_update'))
			) {
				$id = $this->input->post('Id_to_update');
				if ($this->form_validation->run() == false) {
					$this->prepare_flashmessage(validation_errors() , 1);
					redirect('vehicle_settings/vehicles/Edit/' . $id, 'refresh');
				}
				else {
					$where['id'] 			= $id;
					$where2['vehicle_id'] 	= $id;
					if (!empty($_FILES['userfile']['name'])) {
						 
						if ($this->input->post('current_img') != "" && file_exists('uploads/vehicle_images/' . $this->input->post('current_img'))) unlink('uploads/vehicle_images/' . $this->input->post('current_img'));
						$fname = str_replace(' ', '', $_FILES['userfile']['name']);	
						$filename = $id . "_" . $fname;
						$inputdata['image'] = $filename;
						$this->do_upload('./uploads/vehicle_images/', 'jpg|jpeg|png', $filename, 'vehicle_settings/vehicles/Edit/' . $id);
					}

					if ($this->base_model->update_operation(
															$inputdata, 
															$common_table, 
															$where
															)) {
						$this->base_model->delete_record('waiting_time', $where2);
						$this->base_model->delete_record('cost_type_values', $where2);
						$this->base_model->delete_record('vehicle_features', $where2);
						if ($inputdata['waiting_time'] == "enable") {
							/* Save Waiting Time Costs */
							$wt_data 		= $this->input->post('wt_data');
							$values 		= explode("^", $wt_data);
							$len 			= count($values);
							$result 		= array_filter(
															$values, 
															create_function('$a', 'return preg_match("#\S#", $a);'));
							$i = 0;
							foreach($result as $v) {
								if ($i++ < $len) {
									$values1 = explode(",", $v);
									if (
										$values1[0] != "" && 
										$values1[1] != "" && 
										$values1[2] != ""
										) {
										$wtData['from_time'] = $values1[0];
										$wtData['to_time'] 	= $values1[1];
										$wtData['cost'] 	= $values1[2];
										$wtData['vehicle_id'] = $id;
										$this->base_model->insert_operation($wtData, 'waiting_time');
									}
								}
							}
						}

						if ($inputdata['cost_type'] == "incremental") {
							/* Save Cost Type Values if type is incremental.*/
							$ct_data 		= $this->input->post('ct_data');
							$values 		= explode("^", $ct_data);
							$len 			= count($values);
							$result 		= array_filter(
															$values, 
															create_function('$a', 'return preg_match("#\S#", $a);'));
							$i = 0;
							foreach($result as $v) {
								if ($i++ < $len) {
									$values1 = explode(",", $v);
									if ($values1[0] != "" && $values1[1] != "" && $values1[2] != "" && $values1[3] != "") {
										$ctData['from_distance_value'] 	= $values1[0];
										$ctData['to_distance_value'] 	= $values1[1];
										$ctData['day_cost'] 			= $values1[2];
										$ctData['night_cost'] 			= $values1[3];
										$ctData['type'] 				= $inputdata['cost_type'];
										$ctData['day_flat_rate'] 		= 0.00;
										$ctData['night_flat_rate'] 		= 0.00;
										$ctData['vehicle_id'] 			= $id;
										$this->base_model->insert_operation(
																			$ctData, 
																			'cost_type_values'
																			);
									}
								}
							}
						}
						elseif ($inputdata['cost_type'] == "flat") {
							/* Save Cost Type Values if type is flat.*/
							$ct_data = explode('^', $this->input->post('ct_data'));
							if (is_numeric($ct_data[0]) && is_numeric($ct_data[1])) {
								$ctData['from_distance_value'] 	= "";
								$ctData['to_distance_value'] 	= "";
								$ctData['day_cost'] 			= 0.00;
								$ctData['night_cost'] 			= 0.00;
								$ctData['type'] 				= $inputdata['cost_type'];
								$ctData['day_flat_rate'] 		= $ct_data[0];
								$ctData['night_flat_rate'] 		= $ct_data[1];
								$ctData['vehicle_id'] 			= $id;
								$this->base_model->insert_operation($ctData, 'cost_type_values');
							}
						}

						/* Save Vehicle Features. */
						$vehicle_features = $this->input->post('feature_id');
						foreach($vehicle_features as $vf) {
							if ($vf != "" && is_numeric($vf)) {
								$vfData['feature_id'] 			= $vf;
								$vfData['vehicle_id'] 			= $id;
								$this->base_model->insert_operation($vfData, 'vehicle_features');
							}
						}

						$msg = $this->lang->line('vehicle') . " " . 
						$this->lang->line('update_success');
						$this->prepare_flashmessage($msg, 0);
						redirect('vehicle_settings/vehicles', 'refresh');
					}
					else {
						$this->prepare_flashmessage($this->lang->line('session_expired') , 2);
						redirect('/', 'refresh');
					}
				}
			}
			else {
				$this->prepare_flashmessage($this->lang->line('please_edit_record') , 2);
				redirect('vehicle_settings/vehicles', 'refresh');
			}
		}

		// Delete Selected Vehicle

		if ($param1 == "Delete") {
			if ($param2 != '' && is_numeric($param2)) {
				$where['id'] 				= $param2;
				$whr['vehicle_id'] 			= $param2;
				if ($this->base_model->delete_record($common_table, $where)) {
					$this->base_model->delete_record('waiting_time', $whr);
					$this->base_model->delete_record('cost_type_values', $whr);
					$this->base_model->delete_record('vehicle_features', $whr);
					$msg = $this->lang->line('vehicle') . " " . $this->lang->line('delete_success');
					$this->prepare_flashmessage($msg, 0);
				}
			}

			redirect('vehicle_settings/vehicles', 'refresh');
		}

		// Change Status of Selected Vehicle
		if ($param1 == "change_status" && ($param3 == "Active" || $param3 == "Inactive")) {
			if ($param2 != '' && is_numeric($param2)) {
				$where['id'] 				= $param2;
				$dta['status'] 				= $param3;
				if ($this->base_model->update_operation($dta, $common_table, $where)) {
					$msg = $this->lang->line('vehicle') . " " . 
					$this->lang->line('status_change_success');
					$this->prepare_flashmessage($msg, 0);
				}
			}
			redirect('vehicle_settings/vehicles', 'refresh');
		}

		$vehicles = array();
		$param1_list_array = array(
			'Add',
			'Edit',
			'Update',
			'Delete'
		); /*We dont need records of vehicles for these operations.*/
		/*** For Reports ***/
		if ($param1 == "reports") {
			$overallVehicles = $this->base_model->run_query(
			'select sum(v.total_vehicles) as cnt from ' . 
			$this->db->dbprefix("vehicle") . ' v, ' . 
			$this->db->dbprefix("vehicle_categories") . 
			' vc where vc.id=v.category_id'
			) [0]->cnt;
			$this->data['overallVehicles'] 					= $overallVehicles;
			$this->data['request_from_reports_controller'] 	= 'yes';
			$active_class 									= "report";
			$title = $this->lang->line('overall_vehicles');
			$sub_title = $this->lang->line('reports');
		}

		if (!in_array($param1, $param1_list_array)) {
			$vehicles = $this->base_model->run_query('SELECT v.*,vc.category,
			(SELECT count(IF(b.is_conformed="confirm",1,NULL)) FROM ' . 
			$this->db->dbprefix("bookings") . 
			' b WHERE b.vehicle_selected=v.id) AS confirmed_bookings,
			(SELECT count(IF(b.is_conformed="cancelled",1,NULL)) FROM ' . 
			$this->db->dbprefix("bookings") . 
			' b WHERE b.vehicle_selected=v.id) AS cancelled_bookings,
			(SELECT count(IF(b.is_conformed="pending",1,NULL)) FROM ' . 
			$this->db->dbprefix("bookings") . 
			' b WHERE b.vehicle_selected=v.id) AS pending_bookings,
			(SELECT count(*) FROM ' . $this->db->dbprefix("bookings") . 
			' b WHERE b.vehicle_selected=v.id) AS total_bookings FROM ' . 
			$this->db->dbprefix("vehicle") . ' v, ' . 
			$this->db->dbprefix("vehicle_categories") . 
			' vc WHERE vc.id=v.category_id ORDER BY v.id DESC');
		}
		$this->data['records'] 				= $vehicles;
		$this->data['gmaps'] 				= "false";
		$this->data['active_class'] 		= $active_class;
		$this->data['css_type'] 			= array(
													"form",
													"datatable"
												);
		$this->data['title'] 				= $title;
		$this->data['sub_title'] 			= $sub_title;
		$this->data['content'] 				= $page_name;
		$this->_render_page('templates/admin_template', $this->data);
	}

	/******	CRUD OPERATIONS FOR VEHICLE SETTINGS - END	******/
}

/* End of file Vehicle_Settings.php */
/* Location: ./application/controllers/Vehicle_Settings.php */