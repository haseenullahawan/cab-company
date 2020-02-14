<?php
class Settings extends MY_Controller

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
	| MODULE: 			Settings
	| -----------------------------------------------------
	| This is settings module controller file.
	| -----------------------------------------------------
	*/
	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('form_validation');
		$this->load->helper('url');

		// Load MongoDB library instead of native db driver if required
		$this->config->item('use_mongodb', 'ion_auth') ? 
		$this->load->library('mongo_db') : $this->load->database();
		$this->form_validation->set_error_delimiters(
		$this->config->item('error_start_delimiter', 'ion_auth') , 
		$this->config->item('error_end_delimiter', 'ion_auth')
		);
		$this->lang->load('auth');
		$this->lang->load('general');
		$this->load->helper('language');
		$this->load->model('request_model');
		$this->load->model('jobs_model');
		$this->load->model('support_model');
		$this->load->model('calls_model');
	}

	// FUNCTION FOR SITE SETTINGS
	function siteSettings()
	{
		$this->data['message'] = "";
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) 
			redirect('auth', 'refresh');
		if ($this->input->post('submit') == $this->lang->line('update')) {

			// FORM VALIDATIONS
			$this->form_validation->set_rules('sitename', 'Site Name', 'xss_clean|required');
			$this->form_validation->set_rules('address', 'Address', 'xss_clean|required');
			$this->form_validation->set_rules('city', 'City', 'xss_clean|required');
			$this->form_validation->set_rules('state', 'State', 'xss_clean|required');
			$this->form_validation->set_rules('country', 'Country', 'xss_clean|required');
			$this->form_validation->set_rules('zip', 'Zip Code', 'xss_clean|required');
			$this->form_validation->set_rules('phone', 'Phone', 'xss_clean|required|min_length[10])|max_length[11]');
			$this->form_validation->set_rules(
												'portal_email', 
												'Portal Email',
												'xss_clean|required|valid_email'
												);
			$this->form_validation->set_rules('site_country', 'Site country', 'xss_clean|required');
			$this->form_validation->set_rules('day_start_time', 'Day Start Time', 'xss_clean');
			$this->form_validation->set_rules('day_end_time', 'Day End Time', 'xss_clean');
			$this->form_validation->set_rules('night_start_time', 'Night Start Time', 'xss_clean');
			$this->form_validation->set_rules('night_end_time', 'Night End Time', 'xss_clean');
			$this->form_validation->set_rules('email_type', 'Email Type', 'xss_clean');
			$this->form_validation->set_rules('design_by', 'Design by', 'xss_clean');
			$this->form_validation->set_rules(
												'rights_reserved_content', 
												'Rights reserved content', 
												'xss_clean'
												);
			$this->form_validation->set_rules('date_formats', 'Date', 'xss_clean');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			if ($this->form_validation->run() == TRUE) {
				$inputdata['site_name'] 	= $this->input->post('sitename');
				$inputdata['address'] 		= $this->input->post('address');
				$inputdata['city'] 			= $this->input->post('city');
				$inputdata['state'] 		= $this->input->post('state');
				$inputdata['country'] 		= $this->input->post('country');
				$inputdata['zip'] 			= $this->input->post('zip');
				$inputdata['phone'] 		= $this->input->post('phone');
				$inputdata['fax'] 			= $this->input->post('fax');
				$inputdata['portal_email'] 	= $this->input->post('portal_email');
				$inputdata['site_country'] 	= $this->input->post('site_country');
				$inputdata['distance_type'] = $this->input->post('distance_type');
				$inputdata['airports_status'] = $this->input->post('airports');
				$inputdata['day_start_time'] = $this->input->post('day_start_time');
				$inputdata['day_end_time'] 	= $this->input->post('day_end_time');
				$inputdata['night_start_time'] = $this->input->post('night_start_time');
				$inputdata['night_end_time'] = $this->input->post('night_end_time');
				$inputdata['email_type'] 	= $this->input->post('email_type');
				$inputdata['design_by'] 	= $this->input->post('design_by');
				$inputdata['rights_reserved_content'] = $this->input->post('rights_reserved_content');
				$inputdata['date_formats'] 	= $this->input->post('date_formats');
				$inputdata['time_zone'] 	= $this->input->post('site_timezone');
				$inputdata['land_line'] 	= $this->input->post('land_line');
				$inputdata['app_settings']  = $this->input->post('app_settings');
				$inputdata['contact_map']   = $this->input->post('contact_map');
				if (!strcmp("on", $this->input->post('paypal'))) {
					$inputdata['paypal'] 	= "1";
				}
				else {
					$inputdata['paypal'] 	= "0";
				}

				if ($this->input->post('cash') == "on") {
					$inputdata['cash'] 		= "1";
				}
				else {
					$inputdata['cash'] 		= "0";
				}

				$table_name 				= "site_settings";
				$where['id'] 				= $this->input->post('update_record_id');
				if ($this->base_model->update_operation(
														$inputdata, 
														$table_name, 
														$where
														)) {
					$this->prepare_flashmessage($this->lang->line('site_settings') . 
					" " . $this->lang->line('update_success') , 0);
					redirect('settings/siteSettings', 'refresh');
				}
				else {
					$this->prepare_flashmessage($this->lang->line('unable_to_update') . 
					" " . $this->lang->line('site_settings') , 1);
					redirect('settings/siteSettings');
				}
			}
		}

		$site_settings = $this->base_model->run_query("SELECT * FROM " . 
		$this->db->dbprefix('site_settings'));
		if (count($site_settings) > 0) 
			$this->data['site_settings'] 	= $site_settings[0];
		else 
			$this->data['site_settings'] 	= array();
		$countries 							= $this->db->get('country')->result();
		$country_options 					= array();
		foreach($countries as $row) 
			$country_options[$row->country_code_alpha2] = $row->country_name;
		$this->data['country_options'] 		= $country_options;
		$this->db->select('TimeZone');
		$time_zones = $this->db->get('calendar|timezones')->result();
		$time_zone_options 					= array();
		foreach($time_zones as $row) 
			$time_zone_options[$row->TimeZone] = $row->TimeZone;
		$this->data['time_zone_options'] 	= $time_zone_options;
		$this->data['gmaps'] 				= "false";
		$this->data['css_type'] 			= array('form');
		$this->data['active_class'] 		= "masterSettings";
		$this->data['title'] 				= $this->lang->line('site_settings');
		$this->data['content'] 				= "admin/settings/site_settings";
		$this->_render_page('templates/admin_template', $this->data);
	}

	// FUNCTION FOR SITE SETTINGS END

	/****** THEME SETTINGS - START ******/
	function themeSettings()
	{
		$themeColor = $this->input->post('colorName');
		if ($themeColor != "" && ($themeColor == "Red" || $themeColor == "Yellow")) {
			if ($this->base_model->update_operation(array(
				'site_theme' => $themeColor
			) , 'site_settings', '')) {
				$this->prepare_flashmessage($this->lang->line('site_theme') . 
				" " . $this->lang->line('update_success') , 0);
			}
			else {
				$this->prepare_flashmessage($this->lang->line('unable_to_update') . 
				" " . $this->lang->line('site_theme') , 1);
			}

			redirect('settings/themeSettings', 'refresh');
		}

		$this->data['gmaps'] 				= "false";
		$this->data['css_type'] 			= array('form');
		$this->data['active_class'] 		= "masterSettings";
		$this->data['title'] 				= $this->lang->line('theme_settings');
		$this->data['content'] 				= "admin/settings/theme_settings";
		$this->_render_page('templates/admin_template', $this->data);
	}

	/****** THEME SETTINGS - START ******/

	// FUNCTION FOR BOOKING SYSTEM SETTINGS

	function bookingSystemSettings()
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) 
			redirect('auth', 'refresh');
		if ($this->input->post('submit') == "Update") {
			// FORM VALIDATIONS
			$this->form_validation->set_rules(
												'distance_type', 
												'Distance Type', 
												'xss_clean|required'
											);
			$this->form_validation->set_rules(	
												'waiting_time', 
												'Waiting Time', 
												'xss_clean|required'
												);
			if ($this->form_validation->run() == TRUE) {
				$inputdata['distance_type'] = $this->input->post('distance_type');
				$inputdata['waiting_time'] 	= $this->input->post('waiting_time');
				$table_name 				= "booking_system_settings";
				$where['id'] 				= $this->input->post('update_record_id');
				if ($this->base_model->update_operation($inputdata, $table_name, $where)) {
					$this->prepare_flashmessage("Updated Successfully", 0);
					redirect('settings/bookingSystemSettings', 'refresh');
				}
				else {
					$this->prepare_flashmessage("Unable to update", 1);
					redirect('settings/bookingSystemSettings');
				}
			}
			else {
				$this->prepare_flashmessage(validation_errors() , 1);
				redirect('settings/bookingSystemSettings');
			}
		}

		$booking_system_settings = $this->base_model->run_query("SELECT * FROM " . 
		$this->db->dbprefix('booking_system_settings'));
		if (count($booking_system_settings) > 0) 
			$this->data['booking_system_settings'] 	= $booking_system_settings[0];
		else $this->data['booking_system_settings'] = array();
		$this->data['gmaps'] 						= "false";
		$this->data['css_type'] 					= array('form');
		$this->data['title'] = $this->lang->line('booking') . 
		" " . $this->lang->line('system') . " " . $this->lang->line('settings');
		$this->data['content'] 						= "admin/settings/booking_system_settings";
		$this->_render_page('templates/admin_template', $this->data);
	}

	// FUNCTION FOR BOOKING SYSTEM SETTINGS END
	// CURD OPERATIONS FUNCTION FOR VEHICLE CATEGORIES

	function vehicleCategories($param = '', $param1 = '')
	{
		$this->data['message'] = "";
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) 
			redirect('auth', 'refresh');
		$this->data['css_type'] 			= array('datatable');
		$this->data['title'] 				= $this->lang->line('vehicle_categories');
		$this->data['active_class'] 		= "vehicle";
		$this->data['content'] 				= "admin/settings/vehicle_categories";
		if ($param == "Add") {
			if ($this->input->post('submit') == $this->lang->line('add')) {
				// FORM VALIDATIONS
				$this->form_validation->set_rules('category', 'Category', 'xss_clean|required');
				$this->form_validation->set_rules('status', 'Status', 'xss_clean');
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				if ($this->form_validation->run() == TRUE) {
					$inputdata['category'] = $this->input->post('category');
					$inputdata['status'] = $this->input->post('status');
					$table_name = "vehicle_categories";
					if ($this->base_model->insert_operation($inputdata, $table_name)) {
						$this->prepare_flashmessage($this->lang->line('vehicle_category') . " " . $this->lang->line('add_success') , 0);
						redirect('settings/vehicleCategories', 'refresh');
					}
					else {
						$this->prepare_flashmessage($this->lang->line('unable_to_add') . " " . $this->lang->line('vehicle_category') , 1);
						redirect('settings/vehicleCategories');
					}
				}
			}

			$this->data['gmaps'] 			= "false";
			$this->data['css_type'] 		= array(
				'form'
			);
			$this->data['title'] 			= $this->lang->line('add_vehicle_category');
			$this->data['operation']		= "Add";
			$this->data['content'] 			= "admin/settings/add_vehicle_categories";
		}
		elseif ($param == "Edit") {
			$table_name = "vehicle_categories";
			if ($this->input->post('submit') == $this->lang->line('update')) {

				// FORM VALIDATIONS

				$this->form_validation->set_rules('category', 'Category', 'xss_clean|required');
				$this->form_validation->set_rules('status', 'Status', 'xss_clean');
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				$param1 = $this->input->post('update_rec_id');
				if ($this->form_validation->run() == TRUE) {
					$inputdata['category'] = $this->input->post('category');
					$inputdata['status'] = $this->input->post('status');
					$where['id'] = $this->input->post('update_rec_id');
					if ($this->base_model->update_operation($inputdata, $table_name, $where)) {
						$this->prepare_flashmessage($this->lang->line('vehicle_category') . " " . $this->lang->line('update_success') , 0);
						redirect('settings/vehicleCategories', 'refresh');
					}
					else {
						$this->prepare_flashmessage($this->lang->line('unable_to_update') . " " . $this->lang->line('vehicle_category') , 1);
						redirect('settings/vehicleCategories');
					}
				}
			}

			$vehicle_category_rec = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('vehicle_categories') . " WHERE id = " . $param1);
			$this->data['vehicle_category_rec'] = $vehicle_category_rec[0];
			$this->data['css_type'] = array(
												'form'
											);
			$this->data['gmaps'] = "false";
			$this->data['title'] = $this->lang->line('edit_vehicle_category');
			$this->data['operation'] = "Edit";
			$this->data['content'] = "admin/settings/add_vehicle_categories";
		}
		elseif ($param == "Delete") {
			$table_name 					= "vehicle_categories";
			$where['id'] 					= $param1;
			$cond 							= "id";
			$cond_val 						= $param1;
			if ($this->base_model->check_duplicate($table_name, $cond, $cond_val) && is_numeric($param1)) {
				if ($this->base_model->delete_record($table_name, $where)) {
					$this->prepare_flashmessage($this->lang->line('vehicle_category') . " " . $this->lang->line('delete_success') , 0);
					redirect('settings/vehicleCategories', 'refresh');
				}
				else {
					$this->prepare_flashmessage($this->lang->line('unable_to_delete') . " " . $this->lang->line('vehicle_category') , 1);
					redirect('settings/vehicleCategories');
				}
			}
			else {
				$this->prepare_flashmessage($this->lang->line('invalid') . " " . $this->lang->line('operation') , 1);
				redirect('settings/vehicleCategories', 'refresh');
			}
		}
		elseif ($param1 == "") {
			$vehicle_categories = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('vehicle_categories'));
			if (count($vehicle_categories) > 0) $this->data['vehicle_categories'] = $vehicle_categories;
			else $this->data['vehicle_categories'] = array();
		}

		$this->_render_page('templates/admin_template', $this->data);
	}

	// CURD OPERATIONS FUNCTION FOR VEHICLE CATEGORIES END
	// CURD OPERATIONS FUNCTION FOR VEHICLE FEATURES

	public function vehicleFeatures($param = '', $param1 = '')
	{
		$this->data['message'] 				= "";
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) redirect('auth', 'refresh');
		$this->data['css_type'] = array(
			'datatable'
		);
		$this->data['title'] 				= $this->lang->line('vehicle_features');
		$this->data['active_class'] 		= "vehicle";
		$this->data['content'] 				= "admin/settings/vehicle_features";
		if ($param == "Add") {
			if ($this->input->post('submit') == $this->lang->line('add')) {

				// FORM VALIDATIONS

				$this->form_validation->set_rules('feature', 'Feature', 'xss_clean|required');
				$this->form_validation->set_rules('status', 'Status', 'xss_clean');
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				if ($this->form_validation->run() == TRUE) {
					$inputdata['features'] = $this->input->post('feature');
					$inputdata['status'] = $this->input->post('status');
					$table_name = "features";
					if ($this->base_model->insert_operation($inputdata, $table_name)) {
						$this->prepare_flashmessage($this->lang->line('vehicle_feature') . " " . $this->lang->line('add_success') , 0);
						redirect('settings/vehicleFeatures', 'refresh');
					}
					else {
						$this->prepare_flashmessage($this->lang->line('unable_to_add') . " " . $this->lang->line('vehicle_feature') , 1);
						redirect('settings/vehicleFeatures');
					}
				}
			}

			$this->data['gmaps'] 			= "false";
			$this->data['css_type'] = array(
												'form'
											);
			$this->data['title'] 			= $this->lang->line('add_vehicle_feature');
			$this->data['operation'] 		= "Add";
			$this->data['content'] 			= "admin/settings/add_vehicle_features";
		}
		elseif ($param == "Edit") {
			$table_name = "features";
			if ($this->input->post('submit') == $this->lang->line('update')) {

				// FORM VALIDATIONS

				$this->form_validation->set_rules('feature', 'Feature', 'xss_clean|required');
				$this->form_validation->set_rules('status', 'Status', 'xss_clean');
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				$param1 = $this->input->post('update_rec_id');
				if ($this->form_validation->run() == TRUE) {
					$inputdata['features'] = $this->input->post('feature');
					$inputdata['status'] = $this->input->post('status');
					$where['id'] = $this->input->post('update_rec_id');
					if ($this->base_model->update_operation($inputdata, $table_name, $where)) {
						$this->prepare_flashmessage($this->lang->line('vehicle_feature') . " " . $this->lang->line('update_success') , 0);
						redirect('settings/vehicleFeatures', 'refresh');
					}
					else {
						$this->prepare_flashmessage($this->lang->line('unable_to_update') . " " . $this->lang->line('vehicle_feature') , 1);
						redirect('settings/vehicleFeatures');
					}
				}
			}

			$vehicle_feature_rec = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('features') . " WHERE id = " . $param1);
			$this->data['vehicle_feature_rec'] = $vehicle_feature_rec[0];
			$this->data['css_type'] = array(
				'form'
			);
			$this->data['gmaps']			 = "false";
			$this->data['title']			 = $this->lang->line('edit_vehicle_feature');
			$this->data['operation']		 = "Edit";
			$this->data['content']			 = "admin/settings/add_vehicle_features";
		}
		elseif ($param == "Delete") {
			$table_name 					= "features";
			$where['id'] 					= $param1;
			$cond 							= "id";
			$cond_val 						= $param1;
			if ($this->base_model->check_duplicate($table_name, $cond, $cond_val) && is_numeric($param1)) {
				if ($this->base_model->delete_record($table_name, $where)) {
					$this->prepare_flashmessage($this->lang->line('vehicle_feature') . " " . $this->lang->line('delete_success') , 0);
					redirect('settings/vehicleFeatures', 'refresh');
				}
				else {
					$this->prepare_flashmessage($this->lang->line('unable_to_delete') . " " . $this->lang->line('vehicle_category') , 1);
					redirect('settings/vehicleFeatures');
				}
			}
			else {
				$this->prepare_flashmessage($this->lang->line('invalid') . " " . $this->lang->line('operation') , 1);
				redirect('settings/vehicleFeatures', 'refresh');
			}
		}
		elseif ($param1 == "") {
			$vehicle_features = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('features'));
			if (count($vehicle_features) > 0) $this->data['vehicle_features'] = $vehicle_features;
			else $this->data['vehicle_features'] = array();
		}

		$this->_render_page('templates/admin_template', $this->data);
	}

	// CURD OPERATIONS FUNCTION FOR VEHICLE FEATURES END
	// CURD OPERATIONS FUNCTION FOR AIRPORTS

	function airports($param = '', $param1 = '')
	{
		$this->data['message'] = "";
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) redirect('auth', 'refresh');
		$this->data['css_type'] = array(
			'datatable'
		);
		$this->data['title'] 				= $this->lang->line('airports');
		$this->data['active_class'] 		= "airports";
		$this->data['content'] 				= "admin/settings/airports";
		if ($param == "Add") {
			if ($this->input->post('submit') == $this->lang->line('add')) {

				// FORM VALIDATIONS

				$this->form_validation->set_rules('airport_name', 'Airport Name', 'xss_clean|required');
				$this->form_validation->set_rules('airport_address', 'Airport Address', 'xss_clean|required');
				$this->form_validation->set_rules('status', 'Status', 'xss_clean');
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				if ($this->form_validation->run() == TRUE) {
					$inputdata['airport_name'] = $this->input->post('airport_name');
					$inputdata['address'] = $this->input->post('airport_address');
					$inputdata['status'] = $this->input->post('status');
					$table_name = "airports";
					if ($this->base_model->insert_operation($inputdata, $table_name)) {
						$this->prepare_flashmessage($this->lang->line('airport') . " " . $this->lang->line('add_success') , 0);
						redirect('settings/airports', 'refresh');
					}
					else {
						$this->prepare_flashmessage($this->lang->line('unable_to_add') . " " . $this->lang->line('airport') , 1);
						redirect('settings/airports');
					}
				}
			}

			$this->data['gmaps'] = "true";
			$this->data['css_type'] = array(
												'form'
											);
			$this->data['title'] = $this->lang->line('add_airport');
			$this->data['active_class']	 	= "airports";
			$this->data['operation'] 		= "Add";
			$this->data['content'] 			= "admin/settings/add_airports";
		}
		elseif ($param == "Edit") {
			$table_name						= "airports";
			if ($this->input->post('submit') == $this->lang->line('update')) {

				// FORM VALIDATIONS

				$this->form_validation->set_rules('airport_name', 'Airport Name', 'xss_clean|required');
                                $this->form_validation->set_rules('airport_address', 'Airport Address', 'xss_clean|required');
				$this->form_validation->set_rules('status', 'Status', 'xss_clean');
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				$param1 = $this->input->post('update_rec_id');
				if ($this->form_validation->run() == TRUE) {
					$inputdata['airport_name'] = $this->input->post('airport_name');
                                        $inputdata['address'] = $this->input->post('airport_address');
					$inputdata['status'] = $this->input->post('status');
					$where['id'] = $this->input->post('update_rec_id');
					if ($this->base_model->update_operation($inputdata, $table_name, $where)) {
						$this->prepare_flashmessage($this->lang->line('airport') . " " . $this->lang->line('update_success') , 0);
						redirect('settings/airports', 'refresh');
					}
					else {
						$this->prepare_flashmessage($this->lang->line('unable_to_update') . " " . $this->lang->line('airport') , 1);
						redirect('settings/airports');
					}
				}
			}

			$airport_rec = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('airports') . " WHERE id = " . $param1);
			$this->data['airport_rec'] = $airport_rec[0];
			$this->data['css_type'] = array(
												'form'
											);
			$this->data['gmaps'] 			= "true";
			$this->data['title'] 			= $this->lang->line('edit_airport');
			$this->data['active_class'] 	= "airports";
			$this->data['operation'] 		= "Edit";
			$this->data['content'] 			= "admin/settings/add_airports";
		}
		elseif ($param == "Delete") {
			$table_name 					= "airports";
			$where['id'] 					= $param1;
			$cond 							= "id";
			$cond_val 						= $param1;
			if ($this->base_model->check_duplicate($table_name, $cond, $cond_val) && is_numeric($param1)) {
				if ($this->base_model->delete_record($table_name, $where)) {
					$this->prepare_flashmessage($this->lang->line('airport') . " " . $this->lang->line('delete_success') , 0);
					redirect('settings/airports', 'refresh');
				}
				else {
					$this->prepare_flashmessage($this->lang->line('unable_to_delete') . " " . $this->lang->line('airport') , 1);
					redirect('settings/airports');
				}
			}
			else {
				$this->prepare_flashmessage($this->lang->line('invalid') . " " . $this->lang->line('operation') , 1);
				redirect('settings/airports', 'refresh');
			}
		}
		elseif ($param1 == "") {
			$airports = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('airports'));
			if (count($airports) > 0) $this->data['airports'] = $airports;
			else $this->data['airports'] = array();
		}

		$this->_render_page('templates/admin_template', $this->data);
	}

	// CURD OPERATIONS FUNCTION FOR AIRPORTS END
	// CURD OPERATIONS FUNCTION FOR AIRPORT LOCATIONS

	public function airportLocations($param = '', $param1 = '')
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) redirect('auth', 'refresh');
		$this->data['css_type'] = array(
											'datatable'
										);
		$this->data['title'] 				= $this->lang->line('airport_locations');
		$this->data['content'] 				= "admin/settings/airport_locations";
		if ($param == "Add") {
			if ($this->input->post('submit') == $this->lang->line('add')) {

				// FORM VALIDATIONS

				$this->form_validation->set_rules('location_name', 'Airport Location Name', 'xss_clean|required');
				$this->form_validation->set_rules('status', 'Status', 'xss_clean');
				if ($this->form_validation->run() == TRUE) {
					$inputdata['location_name'] = $this->input->post('location_name');
					$inputdata['status'] = $this->input->post('status');
					$table_name = "airport_locations";
					if ($this->base_model->insert_operation($inputdata, $table_name)) {
						$this->prepare_flashmessage($this->lang->line('location_name') . " " . $this->lang->line('add_success') , 0);
						redirect('settings/airportLocations', 'refresh');
					}
					else {
						$this->prepare_flashmessage($this->lang->line('unable_to_add') . " " . $this->lang->line('location_name') , 1);
						redirect('settings/airportLocations');
					}
				}
				else {
					$this->prepare_flashmessage(validation_errors() , 1);
					redirect('settings/airportLocations/' . $this->lang->line('add'));
				}
			}

			$this->data['css_type'] = array('form');
			$this->data['title'] 			= $this->lang->line('add') . 
												" " . $this->lang->line('airport') . 
												" " . $this->lang->line('location_name');
			$this->data['gmaps'] 			= "false";
			$this->data['operation'] 		= "Add";
			$this->data['content'] 			= "admin/settings/add_airport_locations";
		}
		elseif ($param == "Edit") {
			$table_name = "airport_locations";
			if ($this->input->post('submit') == $this->lang->line('update')) {

				// FORM VALIDATIONS

				$this->form_validation->set_rules('location_name', 'Airport Location Name', 'xss_clean|required');
				$this->form_validation->set_rules('status', 'Status', 'xss_clean');
				if ($this->form_validation->run() == TRUE) {
					$inputdata['location_name'] = $this->input->post('location_name');
					$inputdata['status'] = $this->input->post('status');
					$where['id'] = $this->input->post('update_rec_id');
					if ($this->base_model->update_operation($inputdata, $table_name, $where)) {
						$this->prepare_flashmessage($this->lang->line('location_name') . " " . $this->lang->line('update_success') , 0);
						redirect('settings/airportLocations', 'refresh');
					}
					else {
						$this->prepare_flashmessage($this->lang->line('unable_to_update') . " " . $this->lang->line('location_name') , 1);
						redirect('settings/airportLocations');
					}
				}
				else {
					$this->prepare_flashmessage(validation_errors() , 1);
					redirect('settings/airportLocations/Edit/' . $this->input->post('update_rec_id'));
				}
			}

			$cond = "id";
			$cond_val = $param1;
			if (!is_numeric($param1) || !$this->base_model->check_duplicate($table_name, $cond, $cond_val)) {
				$this->prepare_flashmessage($this->lang->line('invalid') . " " . $this->lang->line('operation') , 1);
				redirect('settings/airportLocations', 'refresh');
			}

			$airport_loc_rec = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('airport_locations') . " WHERE id = " . $param1);
			$this->data['airport_loc_rec'] 	= $airport_loc_rec[0];
			$this->data['css_type'] 		= array('form');
			$this->data['gmaps'] 			= "false";
			$this->data['title'] 			= $this->lang->line('edit') .
												" " . $this->lang->line('airport');
			$this->data['operation'] 		= "Edit";
			$this->data['content'] 			= "admin/settings/add_airport_locations";
		}
		elseif ($param == "Delete") {
			$table_name 					= "airport_locations";
			$where['id'] 					= $param1;
			$cond 							= "id";
			$cond_val 						= $param1;
			if ($this->base_model->check_duplicate($table_name, $cond, $cond_val) && is_numeric($param1)) {
				if ($this->base_model->delete_record($table_name, $where)) {
					$this->prepare_flashmessage($this->lang->line('location_name') . " " . $this->lang->line('delete_success') , 0);
					redirect('settings/airportLocations', 'refresh');
				}
				else {
					$this->prepare_flashmessage($this->lang->line('unable_to_delete') . " " . $this->lang->line('airport') , 1);
					redirect('settings/airportLocations');
				}
			}
			else {
				$this->prepare_flashmessage($this->lang->line('invalid') . " " . $this->lang->line('operation') , 1);
				redirect('settings/airportLocations', 'refresh');
			}
		}
		elseif ($param1 == "") {
			$airport_locations = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('airport_locations'));
			if (count($airport_locations) > 0) $this->data['airport_locations'] = $airport_locations;
			else $this->data['airport_locations'] = array();
		}

		$this->_render_page('templates/admin_template', $this->data);
	}

	// CURD OPERATIONS FUNCTION FOR AIRPORT LOCATIONS END
	// CURD OPERATIONS FUNCTION FOR AIRPORT CARS

	public

	function airportCars($param = '', $param1 = '')
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) redirect('auth', 'refresh');
		$this->data['css_type'] 			= array('datatable');
		$this->data['title'] 				= $this->lang->line('airport_cars');
		$this->data['content'] 				= "admin/settings/airport_cars";
		if ($param == "Add") {
			if ($this->input->post('submit') == $this->lang->line('add')) {

				// FORM VALIDATIONS

				$this->form_validation->set_rules('airport', 'Airport', 'xss_clean|required');
				$this->form_validation->set_rules('location', 'Location', 'xss_clean|required');
				$this->form_validation->set_rules('vehicle', 'Vehicle', 'xss_clean|required');
				$this->form_validation->set_rules('cost', 'Cost', 'xss_clean|required');
				$this->form_validation->set_rules('status', 'Status', 'xss_clean');
				if ($this->form_validation->run() == TRUE) {
					$inputdata['airport_id'] = $this->input->post('airport');
					$inputdata['location_id'] = $this->input->post('location');
					$inputdata['vehicle_id'] = $this->input->post('vehicle');
					$inputdata['cost'] = $this->input->post('cost');
					$inputdata['status'] = $this->input->post('status');
					$table_name = "airport_cars";
					if ($this->base_model->insert_operation($inputdata, $table_name)) {
						$this->prepare_flashmessage($this->lang->line('airport_car') . " " . $this->lang->line('add_success') , 0);
						redirect('settings/airportCars', 'refresh');
					}
					else {
						$this->prepare_flashmessage($this->lang->line('unable_to_add') . " " . $this->lang->line('airport_car') , 1);
						redirect('settings/airportCars');
					}
				}
				else {
					$this->prepare_flashmessage(validation_errors() , 1);
					redirect('settings/airportCars/' . $this->lang->line('add'));
				}
			}

			$airport_options 				= array();
			$location_options 				= array();
			$vehicle_options 				= array();
			$this->data['airports'] = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('airports') . " WHERE status = 'Active'");
			foreach($this->data['airports'] as $row) $airport_options[$row->id] = $row->airport_name;
			$this->data['loactions'] = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('airport_locations') . " WHERE status = 'Active'");
			foreach($this->data['loactions'] as $row) $location_options[$row->id] = $row->location_name;
			$this->data['vehicles'] = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('vehicle') . " WHERE status = 'Active'");
			foreach($this->data['vehicles'] as $row) $vehicle_options[$row->id] = $row->name;
			$this->data['airport_options'] 	= $airport_options;
			$this->data['location_options'] = $location_options;
			$this->data['vehicle_options'] 	= $vehicle_options;
			$this->data['css_type'] 		= array('form');
			$this->data['gmaps'] 			= "false";
			$this->data['title'] 			= $this->lang->line('add') . 
												" " . $this->lang->line('airport_cars');
			$this->data['operation'] 		= "Add";
			$this->data['content'] 			= "admin/settings/add_airport_cars";
		}
		elseif ($param == "Edit") {
			$table_name 					= "airport_cars";
			if ($this->input->post('submit') == $this->lang->line('update')) {

				// FORM VALIDATIONS

				$this->form_validation->set_rules('airport', 'Airport', 'xss_clean|required');
				$this->form_validation->set_rules('location', 'Location', 'xss_clean|required');
				$this->form_validation->set_rules('vehicle', 'Vehicle', 'xss_clean|required');
				$this->form_validation->set_rules('cost', 'Cost', 'xss_clean|required');
				$this->form_validation->set_rules('status', 'Status', 'xss_clean');
				if ($this->form_validation->run() == TRUE) {
					$inputdata['airport_id']  = $this->input->post('airport');
					$inputdata['location_id'] = $this->input->post('location');
					$inputdata['vehicle_id']  = $this->input->post('vehicle');
					$inputdata['cost'] 		  = $this->input->post('cost');
					$inputdata['status']      = $this->input->post('status');
					$where['id']              = $this->input->post('update_rec_id');
					if ($this->base_model->update_operation($inputdata, $table_name, $where)) {
						$this->prepare_flashmessage($this->lang->line('airport_car') . " " . $this->lang->line('update_success') , 0);
						redirect('settings/airportCars', 'refresh');
					}
					else {
						$this->prepare_flashmessage($this->lang->line('unable_to_update') . " " . $this->lang->line('airport_car') , 1);
						redirect('settings/airportCars');
					}
				}
				else {
					$this->prepare_flashmessage(validation_errors() , 1);
					redirect('settings/airportCars/Edit/' . $this->input->post('update_rec_id'));
				}
			}

			$cond = "id";
			$cond_val = $param1;
			if (!is_numeric($param1) || !$this->base_model->check_duplicate($table_name, $cond, $cond_val)) {
				$this->prepare_flashmessage($this->lang->line('invalid') . " " . $this->lang->line('operation') , 1);
				redirect('settings/airportCars', 'refresh');
			}

			$airport_options 				= array();
			$location_options 				= array();
			$vehicle_options 				= array();
			$this->data['airports'] 		= $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('airports') . " WHERE status = 'Active'");
			foreach($this->data['airports'] as $row) $airport_options[$row->id] = $row->airport_name;
			$this->data['loactions'] = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('airport_locations') . " WHERE status = 'Active'");
			foreach($this->data['loactions'] as $row) $location_options[$row->id] = $row->location_name;
			$this->data['vehicles'] = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('vehicle') . " WHERE status = 'Active'");
			foreach($this->data['vehicles'] as $row) $vehicle_options[$row->id] = $row->name;
			$this->data['airport_options'] = $airport_options;
			$this->data['location_options'] = $location_options;
			$this->data['vehicle_options'] = $vehicle_options;
			$airport_car = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('airport_cars') . " WHERE id = " . $param1);
			$this->data['airport_car'] 		= $airport_car[0];
			$this->data['css_type'] 		= array('form');
			$this->data['gmaps'] 			= "false";
			$this->data['title'] 			= $this->lang->line('edit') .
												" " . $this->lang->line('airport_car');
			$this->data['operation'] 		= "Edit";
			$this->data['content'] 			= "admin/settings/add_airport_cars";
		}
		elseif ($param == "Delete") {
			$table_name 					= "airport_cars";
			$where['id'] 					= $param1;
			$cond 							= "id";
			$cond_val 						= $param1;
			if ($this->base_model->check_duplicate($table_name, $cond, $cond_val) && is_numeric($param1)) {
				if ($this->base_model->delete_record($table_name, $where)) {
					$this->prepare_flashmessage($this->lang->line('airport_car') . " " . $this->lang->line('delete_success') , 0);
					redirect('settings/airportCars', 'refresh');
				}
				else {
					$this->prepare_flashmessage($this->lang->line('unable_to_delete') . " " . $this->lang->line('airport_car') , 1);
					redirect('settings/airportCars');
				}
			}
			else {
				$this->prepare_flashmessage($this->lang->line('invalid') . " " . $this->lang->line('operation') , 1);
				redirect('settings/airportCars', 'refresh');
			}
		}
		elseif ($param1 == "") {
			$airport_cars = $this->base_model->run_query("SELECT ac.* , a.airport_name , al.location_name , v.name FROM vbs_airport_cars as ac , vbs_airports as a , vbs_airport_locations as al , vbs_vehicle as v WHERE ac.airport_id = a.id AND ac.location_id = al.id AND ac.vehicle_id = v.id");
			if (count($airport_cars) > 0) $this->data['airport_cars'] = $airport_cars;
			else $this->data['airport_cars'] = array();
		}

		$this->_render_page('templates/admin_template', $this->data);
	}

	// CURD OPERATIONS FUNCTION FOR AIRPORT CARS END
	// CURD OPERATIONS FOR TESTIMONIALS

	public function testimonials($param = '', $param1 = '')
	{
		$this->data['message'] 				= "";
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) redirect('auth', 'refresh');
		$this->data['css_type'] 			= array('datatable');
		$this->data['active_class'] 		= "masterSettings";
		$this->data['title'] 				= $this->lang->line('testimonial_settings');
		$this->data['content'] 				= "admin/settings/testimonials";
		if ($param == "Add") {
			if ($this->input->post('submit') == $this->lang->line('add')) {

				// FORM VALIDATIONS

				$this->form_validation->set_rules('author', 'Author', 'xss_clean|required');
				$this->form_validation->set_rules('title', 'Title', 'xss_clean');
				$this->form_validation->set_rules('description', 'Description', 'xss_clean|required');
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				if ($this->form_validation->run() == TRUE) {
					$inputdata['user_name'] 	= $this->input->post('author');
					$inputdata['title'] 		= $this->input->post('title');
					$this->data['active_class'] = "masterSettings";
					$inputdata['content'] 		= $this->input->post('description');
					$inputdata['added_date'] 	= date('Y-m-d');
					$inputdata['status'] 		= $this->input->post('status');
					
					$f_type = explode(".",$_FILES['userfile']['name']);
					$last_in = (count($f_type)-1);
					if(($f_type[$last_in] != "gif") && ($f_type[$last_in] != "jpg") && ($f_type[$last_in] != "png")) {
						$this->prepare_flashmessage($this->lang->line('invalid_file'), 1);
						redirect('settings/testimonials', 'refresh');
					}
					
					$table_name 				= "testimonials_settings";
					$insertId 					= $this->base_model->insert_operation_id($inputdata, $table_name);
					if ($insertId > 0) {
						$config['upload_path'] = './uploads/testimonials_images';
						$config['allowed_types'] = 'gif|jpg|png';
						$config['overwrite'] = 'TRUE';
						$this->load->library('upload', $config);

						if ($this->upload->do_upload()) {
							$file_name['user_photo'] = $_FILES['userfile']['name'];
							$where['id'] 			 = $insertId;
							$this->base_model->update_operation($file_name, $table_name, $where);
							$this->prepare_flashmessage($this->lang->line('testimony') . " " . $this->lang->line('add_success') , 0);
							redirect('settings/testimonials', 'refresh');
						}
					}
					else {
						$this->prepare_flashmessage($this->lang->line('unable_to_add') . " " . $this->lang->line('testimony') , 1);
						redirect('settings/testimonials');
					}
					$this->prepare_flashmessage($this->lang->line('testimony') . " " . $this->lang->line('add_success') , 0);
					redirect('settings/testimonials');
				}
			}

			$this->data['css_type'] 		= array('form');
			$this->data['gmaps'] 			= "false";
			$this->data['title'] 			= $this->lang->line('add_testimony');
			$this->data['active_class'] 	= "masterSettings";
			$this->data['operation'] 		= "Add";
			$this->data['content'] 			= "admin/settings/add_testimonials";
		}
		elseif ($param == "Edit") {
			$table_name 					= "testimonials_settings";
			if ($this->input->post('submit') == $this->lang->line('update')) {

				// FORM VALIDATIONS

				$this->form_validation->set_rules('author', 'Author', 'xss_clean|required');
				$this->form_validation->set_rules('title', 'Title', 'xss_clean');
				$this->form_validation->set_rules('description', 'Description', 'xss_clean|required');
				$this->form_validation->set_rules('status', 'Status', 'xss_clean');
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				if ($this->form_validation->run() == TRUE) {
					$inputdata['user_name'] 	= $this->input->post('author');
					$inputdata['title'] 		= $this->input->post('title');
					$this->data['active_class'] = "masterSettings";
					$inputdata['content'] 		= $this->input->post('description');
					$inputdata['added_date'] 	= date('Y-m-d');
					$inputdata['status'] 		= $this->input->post('status');
					$where['id'] 				= $this->input->post('update_rec_id');
                                        if (!empty($_FILES['userfile']['name'])) {
						if ($this->input->post('current_img') != "" && file_exists('uploads/testimonials_images/' . $this->input->post('current_img'))) unlink('uploads/testimonials_images/' . $this->input->post('current_img'));
						$fname = str_replace(' ', '', $_FILES['userfile']['name']);	
						$filename = $this->input->post('update_rec_id') . "_" . $fname;
						$inputdata['user_photo'] = $filename;
						$this->do_upload('./uploads/testimonials_images/', 'jpg|jpeg|png', $filename, 'settings/testimonials','userfile');
					}
					if ($this->base_model->update_operation($inputdata, $table_name, $where)) {
						$this->prepare_flashmessage($this->lang->line('testimony') . " " . $this->lang->line('update_success') , 0);
						redirect('settings/testimonials', 'refresh');
					}
					else {
						$this->prepare_flashmessage($this->lang->line('unable_to_update') . " " . $this->lang->line('location_name') , 1);
						redirect('settings/testimonials');
					}
				}
			}

			$query = $this->db->get_where('testimonials_settings', array('id' => $param1));
			$testimony 						= $query->result();
			$this->data['testimony'] 		= $testimony[0];
			$this->data['css_type'] 		= array('form');
			$this->data['gmaps'] 			= "false";
			$this->data['title'] 			= $this->lang->line('edit_testimony');
			$this->data['operation'] 		= "Edit";
			$this->data['content'] 			= "admin/settings/add_testimonials";
		}
		elseif ($param == "Delete") {
			$table_name 					= "testimonials_settings";
			$where['id'] 					= $param1;
			$cond 							= "id";
			$cond_val 						= $param1;
			if ($this->base_model->check_duplicate($table_name, $cond, $cond_val) && is_numeric($param1)) {
				if ($this->base_model->delete_record($table_name, $where)) {
					$this->prepare_flashmessage($this->lang->line('testimony') . " " . $this->lang->line('delete_success') , 0);
					redirect('settings/testimonials', 'refresh');
				}
				else {
					$this->prepare_flashmessage($this->lang->line('unable_to_delete') . " " . $this->lang->line('testimony') , 1);
					redirect('settings/testimonials');
				}
			}
			else {
				$this->prepare_flashmessage($this->lang->line('invalid') . " " . $this->lang->line('operation') , 1);
				redirect('settings/testimonials', 'refresh');
			}
		}
		elseif ($param1 == "") {
			$testimonials = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('testimonials_settings'));
			if (count($testimonials) > 0) $this->data['testimonials'] = $testimonials;
			else $this->data['testimonials'] = array();
		}

		$this->_render_page('templates/admin_template', $this->data);
	}

	// CURD OPERATIONS FOR TESTIMONIALS END

	public function onlinebooking()
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) redirect('auth', 'refresh');
		$this->data['css_type'] 			= array();
		$this->data['content'] 				= "site/onlinebooking";
		$this->_render_page('templates/site_form_template', $this->data);
	}

	// CURD OPERATIONS FOR BOOKINGS

	public function bookings($param = '', $param1 = '')
	{
		$this->data['message'] 				= "";
		if (!$this->ion_auth->logged_in() && !($this->ion_auth->is_admin() || $this->ion_auth->is_executive())) redirect('auth', 'refresh');
		$this->data['css_type'] 			= array('datatable');
		$this->data['title'] 				= $this->lang->line('all_bookings');
		$this->data['active_class'] 		= "bookings";
		if($this->ion_auth->is_executive())
			$this->data['active_class'] 	= "all_bookings";
		$this->data['content'] = "admin/settings/bookings";
		if ($param == "Add") {
			if ($this->input->post('submit') == $this->lang->line('book')) {

				// FORM VALIDATIONS

				$this->form_validation->set_rules('pick_date', 'Pickup Date', 'xss_clean|required');
				$this->form_validation->set_rules('time_picker', 'Pick Time', 'required|xss_clean');
				$this->form_validation->set_rules('local_pick', 'Source', 'required|xss_clean');
				$this->form_validation->set_rules('local_drop', 'Destination', 'required|xss_clean');
				$this->form_validation->set_rules('distance', 'Distance', 'xss_clean');
				$this->form_validation->set_rules('radiog_dark', 'Select Car', 'required|xss_clean');
				$this->form_validation->set_rules('payment_mode', 'Payment Mode', 'xss_clean');
				$this->form_validation->set_rules('status', 'Status', 'xss_clean');
				
				$this->form_validation->set_rules(
													'customer_name',
													'Customer Name', 
													'required|xss_clean'
												  );
												  
				$this->form_validation->set_rules(
													'customer_phone',
													'Customer Phone',
													'required|xss_clean'
												  );
												  
				$this->form_validation->set_rules(
													'customer_email', 
													'Customer Email', 
													'valid_email|xss_clean'
												 );
				$this->form_validation->set_rules('total_cost', 'Cost', 'required|xss_clean');
				$this->form_validation->set_rules('booking_ref', 'Cost', 'required|xss_clean');
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				if ($this->form_validation->run() == TRUE) {
					$inputdata['booking_ref'] 	= $this->input->post('booking_ref');
					$inputdata['pick_date'] 	= date('Y-m-d', strtotime($this->input->post('pick_date')));
					$inputdata['pick_time'] 	= $this->input->post('time_picker');
					$inputdata['pick_point'] 	= $this->input->post('local_pick');
					$inputdata['drop_point'] 	= $this->input->post('local_drop');
					$inputdata['distance'] 		= $this->input->post('distance');
					$cab_details = explode('_', $this->input->post('radiog_dark'));
					$inputdata['vehicle_selected'] 	= $cab_details[0];
					$inputdata['cost_of_journey'] 	= $this->input->post('total_cost');
					$inputdata['payment_type'] 		= $this->input->post('payment_mode');
					$inputdata['is_conformed'] 		= $this->input->post('status');
					$inputdata['registered_name'] 	= $this->input->post('customer_name');
					$inputdata['phone'] 		= $this->input->post('customer_phone');
					$inputdata['email'] 		= $this->input->post('customer_email');
					$inputdata['bookdate'] 		= date('Y-m-d');
					$table_name 				= "bookings";
					if ($this->base_model->insert_operation($inputdata, $table_name)) {
						$this->prepare_flashmessage($this->lang->line('booking') . " " . $this->lang->line('successful') , 0);
						redirect('settings/todayBookings', 'refresh');
					}
					else {
						$this->prepare_flashmessage($this->lang->line('unable_to_book'));
						redirect('settings/todayBookings');
					}
				}
			}

			$waiting_times 					= $this->base_model->run_query(
			"SELECT * FROM vbs_waitings where status='Active'"
											);
			$waiting_options = array("0 0" => "Select waiting time");
			foreach($waiting_times as $row) $waiting_options[$row->waiting_time . "Mins " . $row->cost] = $row->waiting_time . " min (" . $row->cost . ")";

			
			$this->data['gmaps'] 				= "true";
			$this->data['waiting_time_status']	= $this->base_model->run_query("SELECT waiting_time,distance_type FROM vbs_booking_system_settings") [0];
			$this->data['waiting_options'] 		= $waiting_options;
			$this->data['distance_unit'] 		= $this->data['waiting_time_status']->distance_type;
			$this->data['css_type'] 			= array('form');
			$this->data['title'] 				= $this->lang->line('add_booking');
			$this->data['operation'] 			= "Add";
			$this->data['active_class'] 		= "bookings";
			if($this->ion_auth->is_executive())
				$this->data['active_class'] 	= "add_booking";
			$this->data['content'] 				= "admin/settings/add_bookings";
		}
		elseif ($param == "Edit") {
		}
		elseif ($param == "Delete") {
		}
		elseif (is_numeric($param1) && ($param == "cancel" || $param == "confirm")) {

			if ($param == "cancel") {
				$inputdata['is_conformed'] 	= "cancelled";
				$inputdata['is_new'] 		= 1;
				$table 						= "bookings";
				$where['id'] 				= $param1;
				$this->base_model->update_operation($inputdata, $table, $where);
				$this->prepare_flashmessage($this->lang->line('canceled') , 0);
			}
			elseif ($param == "confirm") {
				$inputdata['is_conformed'] 	= "confirm";
				$inputdata['is_new'] 		= 1;
				$table 						= "bookings";
				$where['id'] 				= $param1;
				$this->base_model->update_operation($inputdata, $table, $where);
				$this->prepare_flashmessage($this->lang->line('confirm') , 0);
			}


			redirect('settings/bookings', 'refresh');
		}


		$bookings = $this->base_model->run_query("SELECT b.*,v.name FROM vbs_bookings AS b , vbs_vehicle AS v WHERE b.vehicle_selected = v.id ORDER BY b.bookdate DESC");
		
		if($param == "unReadBookings") {
		
			$bookings = $this->base_model->run_query("SELECT b.*,v.name FROM vbs_bookings AS b , vbs_vehicle AS v WHERE b.vehicle_selected = v.id AND b.is_new = '0' ORDER BY b.bookdate DESC");
			$this->data['title'] = $this->lang->line('unread_bookings');
		
		}


		if (count($bookings) > 0) $this->data['bookings'] = $bookings;
		else $this->data['bookings'] 		= array();
		$template 							= "admin_template";
		if ($this->ion_auth->is_executive()) $template = "executive_template";
		$this->_render_page('templates/' . $template, $this->data);
	}

	// CURD OPERATIONS FOR BOOKINGS END
	// FUNCTION FOR PAYPAL SETTINGS

	public function paypalSettings()
	{
		$this->data['message'] 				= "";
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) redirect('auth', 'refresh');
		if ($this->input->post('submit') == $this->lang->line('update')) {

			// FORM VALIDATIONS

			$this->form_validation->set_rules('paypalemail', 'Paypal Email', 'trim|required|valid_email|xss_clean');
			$this->form_validation->set_rules('currency', 'Currency', 'trim|required|xss_clean');
			$this->form_validation->set_rules('account_type', 'Account Type', 'required|xss_clean');
			$this->form_validation->set_rules('status', 'Status', 'required|xss_clean');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			if ($this->form_validation->run() == TRUE) {
				$inputdata['paypal_email'] 	= $this->input->post('paypalemail');
				$inputdata['currency'] 		= $this->input->post('currency');
				$inputdata['account_type'] 	= $this->input->post('account_type');
				$inputdata['status'] 		= $this->input->post('status');
				$image['logo_image'] 		= $_FILES['userfile']['name'];
				
				
				$f_type = explode(".",$_FILES['userfile']['name']);
					$last_in = (count($f_type)-1);
					if(($f_type[$last_in] != "gif") && ($f_type[$last_in] != "jpg") && ($f_type[$last_in] != "png") && ($f_type[$last_in] != "jpeg")) {
						$this->prepare_flashmessage($this->lang->line('invalid_file'), 1);
						redirect('settings/paypalSettings', 'refresh');
					}
					
					
				$table_name 				= "paypal_settings";
				$where['id'] 				= $this->input->post('update_record_id');
				if ($this->base_model->update_operation($inputdata, $table_name, $where)) {
					if ($_FILES['userfile']['name']) {
						$config['upload_path'] 		= './uploads/paypal_settings_images/';
						$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
						$this->load->library('upload', $config);
						if (!$this->upload->do_upload()) {
							$this->prepare_flashmessage($this->upload->display_errors() , 1);
							redirect('settings/paypalSettings', 'refresh');
						}
						else {
							$inputdata['logo_image'] = $_FILES['userfile']['name'];
							if ($this->base_model->update_operation($inputdata, $table_name, $where)) {
								$this->prepare_flashmessage($this->lang->line('image') . " " . $this->lang->line('update_success') , 0);
								redirect('settings/paypalSettings', 'refresh');
							}
						}
					}

					$this->prepare_flashmessage($this->lang->line('paypal_settings') . " " . $this->lang->line('update_success') , 0);
					redirect('settings/paypalSettings', 'refresh');
				}
				else {
					$this->prepare_flashmessage($this->lang->line('unable_to_update') . " " . $this->lang->line('paypal_settings') , 1);
					redirect('settings/paypalSettings');
				}
			}
		}

		$currency = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('currency'));

		

		$currency_opts = array();
		foreach($currency as $row) $currency_opts[$row->currency_code_alpha] = $row->currency_name;



		$this->data['currency_opts'] = $currency_opts;
		$paypal_settings = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('paypal_settings'));

		

		if (count($paypal_settings) > 0) $this->data['paypal_settings'] = $paypal_settings[0];
		else $this->data['paypal_settings'] = array();
		$this->data['css_type'] = array(
			'form'
		);
		$this->data['gmaps'] 				= "false";
		$this->data['active_class'] 		= "masterSettings";
		$this->data['title'] 				= $this->lang->line('paypal_settings');
		$this->data['content'] 				= "admin/settings/paypal_settings";
		$this->_render_page('templates/admin_template', $this->data);
	}

	// FUNCTION FOR PAYPAL SETTINGS END
	
	// FUNCTION FOR EMAILSETTINGS

	public function emailSettings()
	{
		$this->data['message'] 				= "";
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) redirect('auth', 'refresh');
		if ($this->input->post('submit') == $this->lang->line('update')) {

			// FORM VALIDATIONS

			$this->form_validation->set_rules('smtp_host', 'Host', 'trim|required');
			$this->form_validation->set_rules('smtp_user', 'Email', 'trim|required|xss_clean');
			$this->form_validation->set_rules('smtp_port', 'Port', 'trim|required');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			if ($this->form_validation->run() == TRUE) {

				// echo "form validation is success";die();

				$inputdata['smtp_host'] 	= $this->input->post('smtp_host');
				$inputdata['smtp_user'] 	= $this->input->post('smtp_user');
				$inputdata['smtp_password'] = $this->input->post('smtp_password');
				$inputdata['smtp_port'] 	= $this->input->post('smtp_port');
				$table_name 				= "email_settings";
				$where['id'] 				= $this->input->post('update_record_id');
				if ($this->base_model->update_operation($inputdata, $table_name, $where)) {
					$this->prepare_flashmessage($this->lang->line('email_settings') . " " . $this->lang->line('update_success') , 0);
					redirect('settings/emailSettings', 'refresh');
				}
				else {
					$this->prepare_flashmessage($this->lang->line('unable_to_update') . " " . $this->lang->line('email_settings') , 1);
					redirect('settings/emailSettings');
				}
			}
		}

		$email_settings = $this->base_model->run_query("SELECT * FROM vbs_email_settings");

		

		if (count($email_settings) > 0) $this->data['email_settings'] = $email_settings[0];
		else $this->data['email_settings'] 	= array();
		$this->data['css_type'] 			= array('form');
		$this->data['active_class'] 		= "masterSettings";
		$this->data['gmaps'] 				= "false";
		$this->data['title'] 				= $this->lang->line('email_settings');
		$this->data['content'] 				= "admin/settings/email_settings";
		$this->_render_page('templates/admin_template', $this->data);
	}

	// FUNCTION FOR EMAIL SETTINGS END
	// FUNCTION FOR PACKAGE SETTINGS

	public function packageSettings($param = '', $param1 = '')
	{
		$this->data['message'] 				= "";
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) redirect('auth', 'refresh');
		$this->data['css_type'] 			= array('datatable');
		$this->data['title'] 				= $this->lang->line('package_settings');
		$this->data['active_class'] 		= "masterSettings";
		$this->data['content'] 				= "admin/settings/package_settings";
		if ($param == "Add" || $param == "Edit") {
			$vehicles = $this->base_model->fetch_records_from('vehicle', array(
																'status' => 'Active'
															  ));
			$vehicleOptions[''] = $this->lang->line('select') . " " . $this->lang->line('vehicle');
			foreach($vehicles as $key => $val) {
				$vehicleOptions[$val->id] = $val->name . " - " . $val->model . " (P: " . $val->passengers_capacity . ", LL: " . $val->large_luggage_capacity . ", SL: " . $val->small_luggage_capacity . ")";
			}

			$this->data['vehicleOptions'] 	= $vehicleOptions;
		}

		if ($param == "Add") {
			if ($this->input->post('submit') == $this->lang->line('add')) {

				// FORM VALIDATIONS

				$this->form_validation->set_rules('vehicle_id', 'Vehicle', 'xss_clean|required');
				$this->form_validation->set_rules('name', 'Name', 'xss_clean|required');
				$this->form_validation->set_rules('hours', 'Hours', 'xss_clean|required');
				$this->form_validation->set_rules('distance', 'Distance', 'xss_clean|required');
				$this->form_validation->set_rules('min_cost', 'Minimum Cost', 'xss_clean|required');
				$this->form_validation->set_rules('charge_distance', 'Charge Per Distance', 'xss_clean|required');
				$this->form_validation->set_rules('charge_hour', 'Charge Per Hour', 'xss_clean|required');
				$this->form_validation->set_rules('terms_conditions', 'Terms and Conditions', 'xss_clean');
				$this->form_validation->set_rules('status', 'Status', 'xss_clean');
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				if ($this->form_validation->run() == TRUE) {
					$inputdata['vehicle_id'] 	= $this->input->post('vehicle_id');
					$inputdata['name'] 			= $this->input->post('name');
					$inputdata['hours'] 		= $this->input->post('hours');
					$inputdata['distance'] 		= $this->input->post('distance');
					$inputdata['min_cost'] 		= $this->input->post('min_cost');
					$inputdata['charge_distance'] = $this->input->post('charge_distance');
					$inputdata['charge_hour'] 	= $this->input->post('charge_hour');
					$inputdata['terms_conditions'] = $this->input->post('terms_conditions');
					$inputdata['status'] 		= $this->input->post('status');
					$table_name 				= "package_settings";
					if ($this->base_model->insert_operation($inputdata, $table_name)) {
						$this->prepare_flashmessage($this->lang->line('package') . " " . $this->lang->line('add_success') , 0);
						redirect('settings/packageSettings', 'refresh');
					}
					else {
						$this->prepare_flashmessage($this->lang->line('unable_to_add') . " " . $this->lang->line('package') , 1);
						redirect('settings/packageSettings');
					}
				}
			}

			$this->data['css_type'] 		= array('form');
			$this->data['gmaps'] 			= "false";
			$this->data['active_class'] 	= "masterSettings";
			$this->data['title'] = $this->lang->line('add_package');
			$this->data['operation'] 		= "Add";
			$this->data['content'] 			= "admin/settings/add_package_settings";
		}
		elseif ($param == "Edit") {
			$table_name 					= "package_settings";
			if ($this->input->post('submit') == $this->lang->line('update')) {

				// FORM VALIDATIONS

				$this->form_validation->set_rules('vehicle_id', 'Vehicle', 'xss_clean|required');
				$this->form_validation->set_rules('name', 'Name', 'xss_clean|required');
				$this->form_validation->set_rules('hours', 'Hours', 'xss_clean|required');
				$this->form_validation->set_rules('distance', 'Distance', 'xss_clean|required');
				$this->form_validation->set_rules('min_cost', 'Minimum Cost', 'xss_clean|required');
				$this->form_validation->set_rules(
													'charge_distance',
													'Charge Per Distance',
													'xss_clean|required'
												  );
				$this->form_validation->set_rules(
													'charge_hour', 
													'Charge Per Hour', 
													'xss_clean|required'
												  );
				$this->form_validation->set_rules(
													'terms_conditions', 
													'Terms and Conditions', 
													'xss_clean|required'
												  );
				$this->form_validation->set_rules('status', 'Status', 'xss_clean');
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				$param1 = $this->input->post('update_rec_id');
				if ($this->form_validation->run() == TRUE) {
					$inputdata['vehicle_id'] 	= $this->input->post('vehicle_id');
					$inputdata['name'] 			= $this->input->post('name');
					$inputdata['hours'] 		= $this->input->post('hours');
					$inputdata['distance'] 		= $this->input->post('distance');
					$inputdata['min_cost'] 		= $this->input->post('min_cost');
					$inputdata['charge_distance'] = $this->input->post('charge_distance');
					$inputdata['charge_hour'] 	= $this->input->post('charge_hour');
					$inputdata['terms_conditions'] = $this->input->post('terms_conditions');
					$inputdata['status'] 		= $this->input->post('status');
					$where['id'] 				= $this->input->post('update_rec_id');
					if ($this->base_model->update_operation($inputdata, $table_name, $where)) {
						$this->prepare_flashmessage($this->lang->line('package') . " " . $this->lang->line('update_success') , 0);
						redirect('settings/packageSettings', 'refresh');
					}
					else {
						$this->prepare_flashmessage($this->lang->line('unable_to_update') . " " . $this->lang->line('package') , 1);
						redirect('settings/packageSettings');
					}
				}
			}

			$package_setting_rec = $this->base_model->run_query("SELECT p.*,v.image FROM " . $this->db->dbprefix('package_settings') . " as p, " . $this->db->dbprefix('vehicle') . " as v WHERE v.id=p.vehicle_id AND p.id = " . $param1);
			$this->data['package_setting_rec'] = $package_setting_rec[0];
			$this->data['css_type'] = array(
				'form'
			);
			$this->data['gmaps'] 			= "false";
			$this->data['title'] 			= $this->lang->line('edit_package_setting');
			$this->data['active_class'] 	= "masterSettings";
			$this->data['operation'] 		= "Edit";
			$this->data['content'] 			= "admin/settings/add_package_settings";
		}
		elseif ($param == "Delete") {
			$table_name 					= "package_settings";
			$where['id'] 					= $param1;
			$cond 							= "id";
			$cond_val 						= $param1;
			if ($this->base_model->check_duplicate($table_name, $cond, $cond_val) && is_numeric($param1)) {			
				if ($this->base_model->delete_record($table_name, $where)) {
					$this->prepare_flashmessage($this->lang->line('package') . " " . $this->lang->line('delete_success') , 0);
					redirect('settings/packageSettings', 'refresh');
				}
				else {
					$this->prepare_flashmessage($this->lang->line('unable_to_delete') . " " . $this->lang->line('package') , 1);
					redirect('settings/packageSettings');
				}
			}
			else {
				$this->prepare_flashmessage($this->lang->line('invalid') . " " . $this->lang->line('operation') , 1);
				redirect('settings/packageSettings', 'refresh');
			}
		}
		elseif ($param1 == "") {
			$package_settings = $this->base_model->run_query("SELECT p.*,v.image,v.name as vehicle_name,v.model FROM " . $this->db->dbprefix('package_settings') . " p, " . $this->db->dbprefix('vehicle') . " v WHERE v.id=p.vehicle_id");
			if (count($package_settings) > 0) $this->data['package_settings'] = $package_settings;
			else $this->data['package_settings'] = array();
		}
                $this->data['bread_crumb'] 			= true;
		$this->_render_page('templates/admin_template', $this->data);
	}

	// CURD OPERATIONS FOR PACKAGE SETTINGS IS OVER
	// FUNCTION FOR WAITINGS

	public function waitings($param = " ", $param1 = " ")
	{
		$this->data['message'] 				= "";
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) redirect('auth', 'refresh');
		$this->data['css_type'] 			= array('datatable');
		$this->data['title'] 				= $this->lang->line('waiting_time_settings');
		$this->data['active_class'] 		= "masterSettings";
		$this->data['content'] 				= "admin/settings/waitings";
		if ($this->input->post()) {
			$this->form_validation->set_rules('waiting_time', 'Waiting time', 'xss_clean|required');
			$this->form_validation->set_rules('cost', 'Cost', 'xss_clean|required');
			$this->form_validation->set_rules('status', 'Status', 'xss_clean');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		}

		if ($param == "Add") {
			if ($this->input->post('submit') == $this->lang->line('add')) {
				if ($this->form_validation->run() == TRUE) {
					$inputdata['waiting_time'] 	= $this->input->post('waiting_time');
					$inputdata['cost'] 			= $this->input->post('cost');
					$inputdata['status'] 		= $this->input->post('status');
					$table_name 				= 'waitings';
					if ($this->db->insert('waitings', $inputdata)) {
						$this->prepare_flashmessage($this->lang->line('waiting') . " " . $this->lang->line('add_success') , 0);
						redirect('settings/waitings', 'refresh');
					}
					else {
						$this->prepare_flashmessage($this->lang->line('unable_to_add') . " " . $this->lang->line('waiting') , 1);
						redirect('settings/waitings');
					}
				}
			}

			$this->data['css_type'] 			= array('form');
			$this->data['gmaps'] 				= "false";
			$this->data['title'] 				= $this->lang->line('add_waiting_time');
			$this->data['active_class'] 		= "masterSettings";
			$this->data['operation'] 			= "Add";
			$this->data['content'] 				= "admin/settings/add_waitings";
		}
		elseif ($param == "Edit") {
			$table_name 						= "waitings";
			if ($this->input->post('submit') == $this->lang->line('update')) {
				if ($this->form_validation->run() == TRUE) {
					$inputdata['waiting_time'] 	= $this->input->post('waiting_time');
					$inputdata['cost'] 			= $this->input->post('cost');
					$inputdata['status'] 		= $this->input->post('status');
					$where['id'] 				= $this->input->post('update_rec_id');
					if ($this->db->update('waitings', $inputdata, array(
						'id' => $this->input->post('update_rec_id')
					))) {
						$this->prepare_flashmessage($this->lang->line('waiting') . " " . $this->lang->line('update_success') , 0);
						redirect('settings/waitings', 'refresh');
					}
					else {
						$this->prepare_flashmessage($this->lang->line('unable_to_update') . " " . $this->lang->line('waiting') , 1);
						redirect('settings/waitings');
					}
				}
			}

			$query = $this->db->get_where('waitings', array('id' => $param1));
			$waiting_rec 					= $query->result();
			$this->data['waiting_rec'] 		= $waiting_rec[0];
			$this->data['css_type'] 		= array('form');
			$this->data['gmaps'] 			= "false";
			$this->data['title'] 			= $this->lang->line('edit_waiting');
			$this->data['active_class'] 	= "masterSettings";
			$this->data['operation'] 		= "Edit";
			$this->data['content'] 			= "admin/settings/add_waitings";
		}
		elseif ($param == "Delete") {
			$table_name 					= "waitings";
			$where['id']					= $param1;
			$cond 							= "id";
			$cond_val 						= $param1;
			if ($this->base_model->check_duplicate($table_name, $cond, $cond_val) && is_numeric($param1)) {
				if ($this->db->delete('waitings', array(
					'id' => $param1
				))) {
					$this->prepare_flashmessage($this->lang->line('waiting') . " " . $this->lang->line('delete_success') , 0);
					redirect('settings/waitings', 'refresh');
				}
				else {
					$this->prepare_flashmessage($this->lang->line('unable_to_delete') . " " . $this->lang->line('waiting') , 1);
					redirect('settings/waiting');
				}
			}
			else {
				$this->prepare_flashmessage($this->lang->line('invalid') . " " . $this->lang->line('operation') , 1);
				redirect('settings/waitings', refresh);
			}
		}
		elseif ($param1 == " ") {
			$waitings = $this->db->get('waitings');
			if (count($waitings) > 0) $this->data['waitings'] = $waitings;
			else $this->data['waitings'] = array();
		}

		$this->_render_page('templates/admin_template', $this->data);
	}

	// CURD OPERATIONS FOR WAITINGS IS OVER
	// CURD OPERATIONS FOR ABOUT-US

	public function aboutUs($param = '', $param1 = '')
	{
		$this->data['message'] 				= "";
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) redirect('auth', 'refresh');
		$this->data['css_type'] 			= array('datatable');
		$this->data['active_class'] 		= "page";
		$this->data['title'] 				= $this->lang->line('pages');
		$this->data['content'] 				= "admin/about_us";
		if ($param == "Add") {
			if ($this->input->post('submit') == $this->lang->line('add')) {

				// FORM VALIDATIONS

				$this->form_validation->set_rules('title', 'Title', 'xss_clean|required');
				$this->form_validation->set_rules('description', 'Description');
				$this->form_validation->set_rules('meta_tag', 'Meta Tag');
				$this->form_validation->set_rules('meta_tag_keywords', 'Meta Description');
				$this->form_validation->set_rules('seo_keywords', 'SEO Keywords');
				$this->form_validation->set_rules('bottom', 'Bottom', 'xss_clean');
				$this->form_validation->set_rules('sort_order', 'Sort Order', 'xss_clean');
				$this->form_validation->set_rules('under_category', 'Under Category', 'xss_clean');
				$this->form_validation->set_rules('status', 'Status', 'xss_clean');
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				if ($this->form_validation->run() == TRUE) {
					$inputdata['name'] 			= $this->input->post('title');
					$inputdata['description'] 	= $this->input->post('description');
					$inputdata['meta_tag'] 		= $this->input->post('meta_tag');
					$inputdata['meta_description'] = $this->input->post('meta_tag_keywords');
					$inputdata['seo_keywords'] 	= $this->input->post('seo_keywords');
					$inputdata['is_bottom'] 	= $this->input->post('bottom');
					$inputdata['sort_order'] 	= $this->input->post('sort_order');
					$inputdata['parent_id'] 	= $this->input->post('under_category');
					$inputdata['status'] 		= $this->input->post('status');
					$table_name 				= "aboutus";
					if ($this->base_model->insert_operation($inputdata, $table_name)) {
						$this->prepare_flashmessage($this->lang->line('page') . " " . $this->lang->line('add_success') , 0);
						redirect('settings/aboutUs', 'refresh');
					}
					else {
						$this->prepare_flashmessage($this->lang->line('unable_to_add') . " " . $this->lang->line('page') , 1);
						redirect('settings/aboutUs');
					}
				}
			}

			$this->db->select('id,name');
			$categories = $this->db->get_where('vbs_aboutus', array('parent_id' => 0))->result();
			$category_opts 					= array("0" => "Root");
			foreach($categories as $row) $category_opts[$row->id] = $row->name;
			$this->data['category_opts'] 	= $category_opts;
			$this->data['gmaps'] 			= "false";
			$this->data['css_type'] 		= array('form');
			$this->data['title'] 			= $this->lang->line('add_page');
			$this->data['active_class'] 	= "page";
			$this->data['operation'] 		= "Add";
			$this->data['content'] 			= "admin/add_about_us";
		}
		elseif ($param == "Edit") {
			$table_name 					= "aboutus";
			if ($this->input->post('submit') == $this->lang->line('update')) {

				// FORM VALIDATIONS

				$this->form_validation->set_rules('title', 'Title', 'xss_clean|required');
				$this->form_validation->set_rules('description', 'Description');
				$this->form_validation->set_rules('meta_tag', 'Meta Tag');
				$this->form_validation->set_rules('meta_tag_keywords', 'Meta Description');
				$this->form_validation->set_rules('seo_keywords', 'SEO Keywords');
				$this->form_validation->set_rules('bottom', 'Bottom', 'xss_clean');
				$this->form_validation->set_rules('sort_order', 'Sort Order', 'xss_clean');
				$this->form_validation->set_rules('under_category', 'Under Category', 'xss_clean');
				$this->form_validation->set_rules('status', 'Status', 'xss_clean');
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				if ($this->form_validation->run() == TRUE) {
					$inputdata['name'] 			= $this->input->post('title');
					$inputdata['description'] 	= $this->input->post('description');
					$inputdata['meta_tag'] 		= $this->input->post('meta_tag');
					$inputdata['meta_description'] = $this->input->post('meta_tag_keywords');
					$inputdata['seo_keywords'] 	= $this->input->post('seo_keywords');
					$inputdata['is_bottom'] 	= $this->input->post('bottom');
					$inputdata['sort_order'] 	= $this->input->post('sort_order');
					$inputdata['parent_id'] 	= $this->input->post('under_category');
					$inputdata['status'] 		= $this->input->post('status');
					$where['id'] 				= $this->input->post('update_rec_id');
					if ($this->base_model->update_operation($inputdata, $table_name, $where)) {
						$this->prepare_flashmessage($this->lang->line('page') . " " . $this->lang->line('update_success') , 0);
						redirect('settings/aboutUs', 'refresh');
					}
					else {
						$this->prepare_flashmessage($this->lang->line('unable_to_update') . " " . $this->lang->line('page') , 1);
						redirect('settings/aboutUs');
					}
				}

				$param1 						= $this->input->post('update_rec_id');
			}

			$this->db->select('id,name');
			$categories = $this->db->get_where('vbs_aboutus', array('parent_id' => 0))->result();
			$category_opts 						= array("0" => "Root");
			foreach($categories as $row) $category_opts[$row->id] = $row->name;
			$this->data['category_opts'] 		= $category_opts;
			$aboutus_rec = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('aboutus') . " WHERE id = " . $param1);
			$this->data['aboutus_rec'] 			= $aboutus_rec[0];

			

			$this->data['css_type'] 			= array('form');
			$this->data['gmaps'] 				= "false";
			$this->data['title'] 				= $this->lang->line('edit_page');
			$this->data['active_class'] 		= "page";
			$this->data['operation'] 			= "Edit";
			$this->data['content'] 				= "admin/add_about_us";
		}
		elseif ($param == "Delete") {
			$table_name 						= "aboutus";
			$where['id'] 						= $param1;
			$cond 								= "id";
			$cond_val 							= $param1;
			if ($this->base_model->check_duplicate($table_name, $cond, $cond_val) && is_numeric($param1)) {
				if ($this->base_model->delete_record($table_name, $where)) {
					$this->prepare_flashmessage($this->lang->line('page') . " " . $this->lang->line('delete_success') , 0);
					redirect('settings/aboutUs', 'refresh');
				}
				else {
					$this->prepare_flashmessage($this->lang->line('unable_to_delete') . " " . $this->lang->line('page') , 1);
					redirect('settings/aboutUs');
				}
			}
			else {
				$this->prepare_flashmessage($this->lang->line('invalid') . " " . $this->lang->line('operation') , 1);
				redirect('settings/aboutUs', 'refresh');
			}
		}
		elseif ($param1 == "") {
			$aboutus_recs = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('aboutus'));
			if (count($aboutus_recs) > 0) $this->data['aboutus_recs'] = $aboutus_recs;
			else $this->data['aboutus_recs'] = array();
		}

		$this->_render_page('templates/admin_template', $this->data);
	}

	// CURD OPERATIONS FOR ABOUT-US  END
	// FUNCTION FOR REASONS TO BOOK WITH US

	public function reasonsToBook($param = '', $param1 = '')
	{
		$this->data['title'] 		= $this->lang->line('reasons_to_book_with_us');
		$this->data['active_class'] = "masterSettings";
		$this->data['css_type'] 	= array('datatable');
		$this->data['content'] 		= "admin/settings/add_reasons_to_book";
		$reasons_rec = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('reasons_to_book')) [0];

	

		if (isset($reasons_rec)) $this->data['reasons_rec'] = $reasons_rec;
		else $this->data['reasons_rec'] = array();
		$instructions_rec = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('instructions'));
		if(count($instructions_rec)>0)
			$instructions_rec = $instructions_rec[0];
		if (isset($instructions_rec)) $this->data['instructions_rec'] = $instructions_rec;
		else $this->data['instructions_rec'] = $instructions_rec;
		if ($this->input->post('submit') == $this->lang->line('update')) {
			if ($param == "reasons") {
				$table_name = "reasons_to_book";
				$this->form_validation->set_rules('title', 'Title', 'xss_clean|required');
				$this->form_validation->set_rules('content', 'Content', 'xss_clean|required');
				$this->form_validation->set_rules('status', 'Status', 'xss_clean');
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				if ($this->form_validation->run() == TRUE) {
					$inputdata['title'] 	= $this->input->post('title');
					$inputdata['content'] 	= $this->input->post('content');
					$inputdata['status'] 	= $this->input->post('status');
					$where['id'] 			= $this->input->post('update_rec_id');

					// echo $this->input->post('update_rec_id');die();

					if ($this->base_model->update_operation($inputdata, $table_name, $where)) {
						$this->prepare_flashmessage($table_name . " " . $this->lang->line('update_success') , 0);
						redirect('settings/reasonsToBook', 'refresh');
					}
					else {
						$this->prepare_flashmessage($this->lang->line('unable_to_update') . " " . $table_name, 1);
						redirect('settings/reasonsToBook');
					}
				}
			}
			elseif ($param == "instructions") {
				$table_name 				= "instructions";
				$this->form_validation->set_rules('instructions_title', 'Title', 'xss_clean|required');
				$this->form_validation->set_rules(
													'instructions_content', 
													'Content', 
													'xss_clean|required'
												  );
				$this->form_validation->set_rules('status', 'Status', 'xss_clean');
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				if ($this->form_validation->run() == TRUE) {
					$inputdata['title'] 	= $this->input->post('instructions_title');
					$inputdata['content'] 	= $this->input->post('instructions_content');
					$inputdata['status'] 	= $this->input->post('status');
					$where['id'] 			= $this->input->post('update_rec_id');


					if ($this->base_model->update_operation($inputdata, $table_name, $where)) {
						$this->prepare_flashmessage($table_name . " " . $this->lang->line('update_success') , 0);
						redirect('settings/reasonsToBook', 'refresh');
					}
					else {
						$this->prepare_flashmessage($this->lang->line('unable_to_update') . " " . $table_name, 1);
						redirect('settings/reasonsToBook');
					}
				}
			}
		}

		$this->_render_page('templates/admin_template', $this->data);
	}

	// FUNCTION TO REASONS TO BOOK WITH US END
	// FUNCTION FOR TODAY BOOKINGS

	public function todayBookings($param = '', $param1 = '')
	{
		$this->data['message'] 				= "";
		if (!$this->ion_auth->logged_in() && !($this->ion_auth->is_admin() || $this->ion_auth->is_executive())) redirect('auth', 'refresh');
		$this->data['css_type'] 			= array('datatable');
		$this->data['title'] 				= $this->lang->line('today_bookings');
		$this->data['active_class'] 		= "bookings";
		if($this->ion_auth->is_executive())
			$this->data['active_class'] 	= "today_bookings";
			$this->data['content'] 			= "admin/settings/todaybookings";
		if (is_numeric($param1) && ($param == "cancel" || $param == "confirm")) {

			if ($param == "cancel") {
				$inputdata['is_conformed'] 	= "cancelled";
				$inputdata['is_new'] 		= 1;
				$table 						= "bookings";
				$where['id'] 				= $param1;
				$this->base_model->update_operation($inputdata, $table, $where);

				// email funuctionality

				$journey_details = $this->base_model->run_query("SELECT b.*,v.name as car_name, v.model as car_model FROM vbs_bookings as b, vbs_vehicle as v WHERE b.id=" . $param1 . " AND v.id = b.vehicle_selected");
				$this->data['journey_details'] = $journey_details[0];
				$site_settings_rec = $this->db->get('vbs_site_settings')->result() [0];
				$config = Array(
								'protocol' => 'smtp',
								'smtp_host' => 'ssl://smtp.googlemail.com',
								'smtp_port' => 465,
								'smtp_user' => $site_settings_rec->portal_email, // change it to yours
								'smtp_pass' => '*****', // change it to yours
								'mailtype' => 'html',
								'charset' => 'iso-8859-1',
								'wordwrap' => TRUE
								);
				$message = $this->load->view('confirmation_email.php', $this->data, TRUE);
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				$this->email->from($site_settings_rec->portal_email); // change it to yours
				$this->email->to($journey_details[0]->email); // change it to yours
				$this->email->subject('Digital vehicle booking system query');
				$this->email->message($message);
				$this->email->send();

				// email functionality end

				$this->prepare_flashmessage($this->lang->line('canceled') , 0);
			}
			elseif ($param == "confirm") {
				$inputdata['is_conformed'] 	= "confirm";
				$inputdata['is_new'] 		= 1;
				$table 						= "bookings";
				$where['id'] 				= $param1;
				$this->base_model->update_operation($inputdata, $table, $where);

				// email funuctionality

				$journey_details = $this->base_model->run_query("SELECT b.*,v.name as car_name, v.model as car_model FROM vbs_bookings as b, vbs_vehicle as v WHERE b.id=" . $param1 . " AND v.id = b.vehicle_selected");
				$this->data['journey_details'] = $journey_details[0];
				$site_settings_rec = $this->db->get('vbs_site_settings')->result() [0];
				$config = Array(
								'protocol' => 'smtp',
								'smtp_host' => 'ssl://smtp.googlemail.com',
								'smtp_port' => 465,
								'smtp_user' => $site_settings_rec->portal_email, // change it to yours
								'smtp_pass' => '*****', // change it to yours
								'mailtype' => 'html',
								'charset' => 'iso-8859-1',
								'wordwrap' => TRUE
							   );
				$message = $this->load->view('confirmation_email.php', $this->data, TRUE);
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				$this->email->from($site_settings_rec->portal_email); // change it to yours
				$this->email->to($journey_details[0]->email); // change it to yours
				$this->email->subject('Digital vehicle booking system query');
				$this->email->message($message);
				$this->email->send();

				// email functionality end

				$this->prepare_flashmessage($this->lang->line('confirm') , 0);
			}

			redirect('settings/todayBookings', 'refresh');
		}

				$today 			= date("Y-m-d");

		$todaybookings = $this->base_model->run_query("SELECT b.*,v.name FROM vbs_bookings AS b , vbs_vehicle AS v WHERE b.vehicle_selected = v.id AND  b.bookdate = '" . $today . "'");

		

		if (count($todaybookings) > 0) $this->data['todaybookings'] = $todaybookings;
		else $this->data['todaybookings'] = array();

		

		$template = "admin_template";
		if ($this->ion_auth->is_executive()) $template = "executive_template";
		$this->_render_page('templates/' . $template, $this->data);
	}

	// FUNCTION TO TODAY BOOKING END

	public function searchBookings()
	{
		$this->data['message'] = "";
		if (!$this->ion_auth->logged_in() && !($this->ion_auth->is_admin() || $this->ion_auth->is_executive())) redirect('auth', 'refresh');
		$this->data['css_type'] 	= array('datatable');
		$this->data['title'] 		= $this->lang->line('search_bookings');
		$this->data['active_class'] = "bookings";
		if($this->ion_auth->is_executive())
				$this->data['active_class'] = "search_bookings";
		$this->data['content'] = "admin/settings/searchbookings";
		if ($this->input->post('submit') == $this->lang->line('submit')) {
			$this->form_validation->set_rules('from_date', 'From Date', 'xss_clean|required');
			$this->form_validation->set_rules('to_date', 'To Date', 'xss_clean|required');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			if ($this->form_validation->run() == TRUE) {
				$fromdate 	= $this->input->post('from_date');
				$todate 	= $this->input->post('to_date');

				$bookings = $this->base_model->run_query("SELECT b.*,v.name FROM vbs_bookings AS b, vbs_vehicle AS v WHERE b.vehicle_selected = v.id AND bookdate BETWEEN '" . $fromdate . " 'AND' " . $todate . " '");
				if (count($bookings) > 0) $this->data['bookings'] = $bookings;
				else $this->data['css_type'] = array(
					'table'
				);
				$this->data['gmaps'] 	= "false";
				$this->data['title'] 	= $this->lang->line('search_bookings');
				$this->data['content'] 	= "admin/settings/bookings";
			}
		}

				$template = "admin_template";
		if ($this->ion_auth->is_executive()) $template = "executive_template";
		$this->_render_page('templates/' . $template, $this->data);
	}

	public function socialNetworks($param = '', $param1 = '')
	{
		$this->data['message'] = "";
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) redirect('auth', 'refresh');
		$network_settings = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('social_networks'));
		if (count($network_settings) > 0) $this->data['network_settings'] = $network_settings[0];
		else $this->data['network_settings'] = array();
		$this->data['gmaps'] 				= "false";
		$this->data['css_type'] 			= array('form');
		$this->data['title'] 				= $this->lang->line('social_network_settings');
		$this->data['active_class'] 		= "masterSettings";
		$this->data['content'] 				= "admin/settings/add_social_networks";
		$table_name 						= "social_networks";
		if ($this->input->post('submit') == $this->lang->line('update')) {
			$this->form_validation->set_rules('facebook', 'Facebook', 'xss_clean');
			$this->form_validation->set_rules('twitter', 'Twitter', 'xss_clean');
			$this->form_validation->set_rules('linkedin', 'Linkedin', 'xss_clean');
			$this->form_validation->set_rules('google_plus', 'Google+', 'xss_clean');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			if ($this->form_validation->run() == TRUE) {
				$inputdata['facebook'] 		= $this->input->post('facebook');
				$inputdata['twitter'] 		= $this->input->post('twitter');
				$inputdata['linkedin'] 		= $this->input->post('linkedin');
				$inputdata['google_plus'] 	= $this->input->post('google_plus');
				$where['id'] 				= $this->input->post('update_rec_id');
				if ($this->base_model->update_operation($inputdata, $table_name, $where)) {
					$this->prepare_flashmessage($this->lang->line('social_networks') . " " . $this->lang->line('update_success') , 0);
					redirect('settings/socialNetworks', 'refresh');
				}
				else {
					$this->prepare_flashmessage($this->lang->line('unable_to_update') . " " . $table_name, 1);
					redirect('settings/socialNetworks');
				}
			}
			else {
				$this->prepare_flashmessage(validation_errors() , 1);
				redirect('settings/socialNetworks/' . $this->input->post('update_rec_id'));
			}

			$cond 							= "id";
			$cond_val 						= $param1;
			if (!is_numeric($param1) || !$this->base_model->check_duplicate($table_name, $cond, $cond_val)) {
				$this->prepare_flashmessage($this->lang->line('invalid') . " " . $this->lang->line('operation') , 1);
				redirect('settings/socialNetworks', 'refresh');
			}
		}

		$this->_render_page('templates/admin_template', $this->data);
	}

	// SEO SETTINGS

	public function seoSettings($param = '', $param1 = '')
	{
		$this->data['message'] = "";
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) redirect('auth', 'refresh');
		$this->data['css_type'] 			= array('datatable');
		$this->data['title'] 				= $this->lang->line('seo_settings');
		$this->data['active_class'] 		= "masterSettings";
		$this->data['content'] 				= "admin/settings/seo_settings";
		if ($param == "Add") {
			if ($this->input->post('submit') == $this->lang->line('add')) {

				// FORM VALIDATIONS

				$this->form_validation->set_rules('name', 'Name', 'xss_clean|required');
				$this->form_validation->set_rules('site_title', 'Site Title', 'xss_clean|required');
				$this->form_validation->set_rules(
													'site_description', 
													'Site Description', 
													'xss_clean|required'
												  );
				$this->form_validation->set_rules(
													'site_keywords',
													'Site Keywords', 
													'xss_clean|required'
												  );
				$this->form_validation->set_rules(
													'google_analytics', 
													'Google Analytics', 
													'xss_clean|required'
												  );
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				if ($this->form_validation->run() == TRUE) {
					$inputdata['name'] 		 		= $this->input->post('name');
					$inputdata['site_title'] 		= $this->input->post('site_title');
					$inputdata['site_description'] 	= $this->input->post('site_description');
					$inputdata['site_keywords'] 	= $this->input->post('site_keywords');
					$inputdata['google_analytics'] 	= $this->input->post('google_analytics');
					$table_name 					= "seo_settings";
					if ($this->base_model->insert_operation($inputdata, $table_name)) {
						$this->prepare_flashmessage($this->lang->line('seo_setting') . " " . $this->lang->line('add_success') , 0);
						redirect('settings/seoSettings', 'refresh');
					}
					else {
						$this->prepare_flashmessage($this->lang->line('unable_to_add') . " " . $this->lang->line('seo_setting') , 1);
						redirect('settings/seoSettings');
					}
				}
			}

			$this->data['css_type'] 		= array('form');
			$this->data['gmaps'] 			= "false";
			$this->data['title'] 			= $this->lang->line('add_seo_setting');
			$this->data['active_class'] 	= "masterSettings";
			$this->data['operation'] 		= "Add";
			$this->data['content'] 			= "admin/settings/add_seo_settings";
		}
		elseif ($param == "Edit") {
			$table_name = "seo_settings";
			if ($this->input->post('submit') == $this->lang->line('update')) {

				// FORM VALIDATIONS

				$this->form_validation->set_rules('name', 'Name', 'xss_clean|required');
				$this->form_validation->set_rules('site_title', 'Site Title', 'xss_clean|required');
				$this->form_validation->set_rules(
													'site_description', 
													'Site Description', 
													'xss_clean|required'
												  );
				$this->form_validation->set_rules(
													'site_keywords', 
													'Site Keywords', 
													'xss_clean|required'
												  );
				$this->form_validation->set_rules(
													'google_analytics', 
													'Google Analytics', 
													'xss_clean|required'
												  );
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				if ($this->form_validation->run() == TRUE) {
					$inputdata['name'] 				= $this->input->post('name');
					$inputdata['site_title'] 		= $this->input->post('site_title');
					$inputdata['site_description'] 	= $this->input->post('site_description');
					$inputdata['site_keywords'] 	= $this->input->post('site_keywords');
					$inputdata['google_analytics'] 	= $this->input->post('google_analytics');
					$where['id'] 					= $this->input->post('update_rec_id');

					
					if ($this->base_model->update_operation($inputdata, $table_name, $where)) {
						$this->prepare_flashmessage($this->lang->line('seo_setting') . " " . $this->lang->line('update_success') , 0);
						redirect('settings/seoSettings', 'refresh');
					}
					else {
						$this->prepare_flashmessage($this->lang->line('unable_to_update') . " " . $this->lang->line('seo_setting') , 1);
						redirect('settings/seoSettings');
					}
				}
			}

			$query = $this->db->get_where('seo_settings', array('id' => $param1));
			$seo_setting_rec 				= $query->result();
			$this->data['seo_setting_rec'] 	= $seo_setting_rec[0];
			$this->data['css_type'] 		= array('form');
			$this->data['gmaps'] 			= "false";
			$this->data['title'] 			= $this->lang->line('edit_seo_setting');
			$this->data['active_class'] 	= "masterSettings";
			$this->data['operation'] 		= "Edit";
			$this->data['content'] 			= "admin/settings/add_seo_settings";
		}
		elseif ($param == "Delete") {
			$table_name 					= "seo_settings";
			$where['id'] 					= $param1;
			$cond 							= "id";
			$cond_val 						= $param1;
			if ($this->base_model->check_duplicate($table_name, $cond, $cond_val) && is_numeric($param1)) {
				if ($this->base_model->delete_record($table_name, $where)) {
					$this->prepare_flashmessage($this->lang->line('seo_setting') . " " . $this->lang->line('delete_success') , 0);
					redirect('settings/seoSettings', 'refresh');
				}
				else {
					$this->prepare_flashmessage($this->lang->line('unable_to_delete') . " " . $this->lang->line('seo_setting') , 1);
					redirect('settings/seoSettings');
				}
			}
			else {
				$this->prepare_flashmessage($this->lang->line('invalid') . " " . $this->lang->line('operation') , 1);
				redirect('settings/seoSettings', 'refresh');
			}
		}
		elseif ($param1 == "") {
			$seo_settings = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('seo_settings'));
			if (count($seo_settings) > 0) $this->data['seo_settings'] = $seo_settings;
			else $this->data['seo_settings'] = array();
		}

		$this->_render_page('templates/admin_template', $this->data);
	}

	// END OF SEO SETTINGS

	public function faqs($param = '', $param1 = '')
	{
		$this->data['message'] = "";
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) redirect('auth', 'refresh');
		$this->data['css_type'] 		= array('datatable');
		$this->data['active_class'] 	= "faq";
		$this->data['title'] 			= $this->lang->line('faqs');
		$this->data['content'] 			= "admin/settings/faqs";
		if ($param == "Add") {
			if ($this->input->post('submit') == $this->lang->line('add')) {

				// FORM VALIDATIONS

				$this->form_validation->set_rules('question', 'Question', 'trim|xss_clean|required');
				$this->form_validation->set_rules('answer', 'Answer', 'trim|xss_clean|required');
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				if ($this->form_validation->run() == TRUE) {
					$inputdata['question'] 	= $this->input->post('question');
					$inputdata['answer'] 	= $this->input->post('answer');
					$inputdata['status'] 	= $this->input->post('status');
					$table_name 			= "faqs";
					if ($this->base_model->insert_operation($inputdata, $table_name)) {
						$this->prepare_flashmessage($this->lang->line('faq') . " " . $this->lang->line('add_success') , 0);
						redirect('settings/faqs', 'refresh');
					}
					else {
						$this->prepare_flashmessage($this->lang->line('unable_to_add') . " " . $this->lang->line('faq') , 1);
						redirect('settings/faqs');
					}
				}
			}

			$this->data['gmaps'] 			= "false";
			$this->data['css_type'] 		= array('form');
			$this->data['title'] 			= $this->lang->line('faqs');
			$this->data['active_class'] 	= "faq";
			$this->data['operation'] 		= "Add";
			$this->data['content'] 			= "admin/settings/add_faqs";
		}
		elseif ($param == "Edit") {
			$table_name = "faqs";
			if ($this->input->post('submit') == $this->lang->line('update')) {

				// FORM VALIDATIONS

				$this->form_validation->set_rules('question', 'Question', 'trim|xss_clean|required');
				$this->form_validation->set_rules('answer', 'Answer', 'trim|required|xss_clean');
				$param1 = $this->input->post('update_rec_id');
				if ($this->form_validation->run() == TRUE) {
					$inputdata['question'] 	= $this->input->post('question');
					$inputdata['answer'] 	= $this->input->post('answer');
					$inputdata['status'] 	= $this->input->post('status');
					$where['id'] 			= $this->input->post('update_rec_id');
					if ($this->base_model->update_operation($inputdata, $table_name, $where)) {
						$this->prepare_flashmessage($this->lang->line('faq') . " " . $this->lang->line('update_success') , 0);
						redirect('settings/faqs', 'refresh');
					}
					else {
						$this->prepare_flashmessage($this->lang->line('unable_to_update') . " " . $this->lang->line('faq') , 1);
						redirect('settings/faqs');
					}
				}
			}

			$faqs_rec = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('faqs') . " WHERE id = " . $param1);
			$this->data['faqs_rec'] 		= $faqs_rec[0];
			$this->data['css_type'] 		= array('form');
			$this->data['gmaps'] 			= "false";
			$this->data['active_class'] 	= "faq";
			$this->data['title'] 			= $this->lang->line('edit') . " " . $this->lang->line('faq');
			$this->data['operation'] 		= "Edit";
			$this->data['content'] 			= "admin/settings/add_faqs";
		}
		elseif ($param == "Delete") {
			$table_name 					= "faqs";
			$where['id'] 					= $param1;
			$cond 							= "id";
			$cond_val 						= $param1;
			if ($this->base_model->check_duplicate($table_name, $cond, $cond_val) && is_numeric($param1)) {
				if ($this->base_model->delete_record($table_name, $where)) {
					$this->prepare_flashmessage($this->lang->line('faq') . " " . $this->lang->line('delete_success') , 0);
					redirect('settings/faqs', 'refresh');
				}
				else {
					$this->prepare_flashmessage($this->lang->line('unable_to_delete') . " " . $this->lang->line('faq') , 1);
					redirect('settings/faqs');
				}
			}
			else {
				$this->prepare_flashmessage($this->lang->line('invalid') . " " . $this->lang->line('operation') , 1);
				redirect('settings/faqs', 'refresh');
			}
		}
		elseif ($param1 == "") {
			$faqs = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('faqs'));
			if (count($faqs) > 0) $this->data['faqs'] = $faqs;
			else $this->data['faqs'] = array();
		}

		$this->_render_page('templates/admin_template', $this->data);
	}
	
	
	function appSettings()
	{	
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) 
			redirect('auth', 'refresh');
		
		$this->data['css_type'] 		= array('form');
		$this->data['gmaps'] 			= false;
		$this->data['active_class'] 	= "App Settings";
		$this->data['title'] 			= $this->lang->line('app_settings');
		$this->data['content'] 			= "admin/settings/mobileapps_upload";
						
						if($this->input->post()) { 
						
						$f_type = explode(".",$_FILES['userfile']['name']);
						$last_in = (count($f_type)-1);
						if(($f_type[$last_in] != "apk") && ($f_type[$last_in] != "ipa")) {
						$this->prepare_flashmessage($this->lang->line('invalid_file'), 1);
						redirect('settings/testimonials', 'refresh');
						}
					
						$config['upload_path'] = './uploads/mobileapp_files';
						$config['allowed_types'] = 'apk|ipa';
						$config['overwrite'] = 'TRUE';
						$this->load->library('upload', $config);
						
						if ($this->upload->do_upload()) {
						
							$table_name = "site_settings";
							$ColName    =  "id";
							$file = explode('.',$_FILES['userfile']['name']);
							
							if($file[1] == "apk")
								$file_name['android_filename'] = base_url()."uploads/mobileapp_files/".$_FILES['userfile']['name'];
							if($file[1] == "ipa")
								$file_name['ios_filename'] = base_url()."uploads/mobileapp_files/".$_FILES['userfile']['name'];
							
							$where['id'] = $this->base_model->getMaxId($table_name,$ColName);
							$this->base_model->update_operation($file_name, $table_name ,$where);
							$this->prepare_flashmessage($this->lang->line('app_settings') . " " . $this->lang->line('successful') , 0);
							redirect('settings/appSettings', 'refresh');
						} else {
								echo $this->upload->display_errors(); die();
							$this->prepare_flashmessage($this->lang->line('unable_to_add') . " " . $this->lang->line('app_settings') , 1);
							redirect('settings/appSettings');
					}
					
				}
		$this->_render_page('templates/admin_template', $this->data);
	}
        
        
        /****** VALIDATE IMAGE ******/
        function _image_check($image = '', $param2 = '') {
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
        function do_upload($upload_path = '', $allowed_types = '', $filename = '', $redirect_path, $field_name = '') {
                $config['upload_path'] 				= $upload_path;
                $config['allowed_types'] 			= $allowed_types;
                $config['max_size'] 				= '100240';
                $config['max_width'] 				= '6000';
                $config['max_height'] 				= '6000';
                $config['file_name'] 				= $filename;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload($field_name)) {
                        $error = array(
                                'error' => $this->upload->display_errors()
                        );
                        $this->prepare_flashmessage($error['error'], 1);
                        redirect($redirect_path, 'refresh');
                }
        }
        // CURD OPERATIONS FOR SERVICES

	public function services($param = '', $param1 = '') {
		$this->data['message'] 				= "";
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) redirect('auth', 'refresh');
		$this->data['css_type'] 			= array('datatable');
		$this->data['active_class'] 		= "services";
		$this->data['title'] 				= $this->lang->line('services_pages');
		//  $this->data['content'] 				= "admin/about_us";
		$this->data['content'] 				= "admin/services";
                
		if ($param == "Add") {
			if ($this->input->post('submit') == $this->lang->line('add')) {

				// FORM VALIDATIONS

				$this->form_validation->set_rules('title_fr', 'Title', 'xss_clean|required');
				$this->form_validation->set_rules('title_en', 'Title', 'xss_clean|required');
				$this->form_validation->set_rules('description_fr', 'Description');
				$this->form_validation->set_rules('description_en', 'Description');
				$this->form_validation->set_rules('meta_tag_fr', 'Meta Tag');
				$this->form_validation->set_rules('meta_tag_en', 'Meta Tag');
				$this->form_validation->set_rules('meta_description_fr', 'Meta Description');
				$this->form_validation->set_rules('meta_description_en', 'Meta Description');
				$this->form_validation->set_rules('seo_keywords_fr', 'SEO Keywords');
				$this->form_validation->set_rules('seo_keywords_en', 'SEO Keywords');
				//  $this->form_validation->set_rules('bottom', 'Bottom', 'xss_clean');
				//  $this->form_validation->set_rules('sort_order', 'Sort Order', 'xss_clean');
                                if (!empty($_FILES['servicefile']['name'])) {
                                        $this->form_validation->set_rules('servicefile', $this->lang->line('image') , 'trim|xss_clean|callback__image_check[' . $_FILES['servicefile']['name'] . ']');
                                }
				$this->form_validation->set_rules('package_id', 'Package', 'xss_clean');
				$this->form_validation->set_rules('status', 'Status', 'xss_clean');
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				if ($this->form_validation->run() == TRUE) {
					$inputdata['name_fr'] 			= $this->input->post('title_fr');
					$inputdata['description_fr'] 	= $this->input->post('description_fr');
					$inputdata['meta_tag_fr'] 		= $this->input->post('meta_tag_fr');
					$inputdata['meta_description_fr'] = $this->input->post('meta_description_fr');
					$inputdata['seo_keywords_fr'] 	= $this->input->post('seo_keywords_fr');
                                        $inputdata['name_en'] 			= $this->input->post('title_en');
					$inputdata['description_en'] 	= $this->input->post('description_en');
					$inputdata['meta_tag_en'] 		= $this->input->post('meta_tag_en');
					$inputdata['meta_description_en'] = $this->input->post('meta_description_en');
					$inputdata['seo_keywords_en'] 	= $this->input->post('seo_keywords_en');
					//  $inputdata['is_bottom'] 	= $this->input->post('bottom');
					//  $inputdata['sort_order'] 	= $this->input->post('sort_order');
					$inputdata['package_id'] 	= $this->input->post('package_id');
					$inputdata['status'] 		= $this->input->post('status');
					$inputdata['order_no'] 		= $this->input->post('order_no');
					$table_name 				= "services";
                                        $insertId = $this->base_model->insert_operation_id($inputdata, $table_name);
					//  if ($this->base_model->insert_operation($inputdata, $table_name)) {
					if ($insertId > 0) {
                                            /* Save Vehicle Image */
						if (!empty($_FILES['servicefile']['name'])) {
							$filename   = $insertId . "_" . str_replace(' ', '',$_FILES['servicefile']['name']);
							$fileinput['image'] = $filename;
							// echo $filename; die();
							$this->base_model->update_operation($fileinput, 
                                                                                            'services', 
                                                                                            array('id' => $insertId)
                                                                                            );
							$this->do_upload(
											'./uploads/service_images/', 
											'jpg|jpeg|png', 
											$filename, 
											'settings/services', 'servicefile'
											);
						}
						$this->prepare_flashmessage($this->lang->line('page') . " " . $this->lang->line('add_success') , 0);
						redirect('settings/services', 'refresh');
					}
					else {
						$this->prepare_flashmessage($this->lang->line('unable_to_add') . " " . $this->lang->line('page') , 1);
						redirect('settings/services');
					}
				}
			}

			$this->db->select('id,name');
			$packages = $this->db->get_where('vbs_package_settings', array('status' => 'Active'))->result();
                        $package_opts = array();
			//$category_opts 					= array("0" => "Root");
			foreach($packages as $row) $package_opts[$row->id] = $row->name;
			$this->data['package_opts'] 	= $package_opts;
			$this->data['gmaps'] 			= "false";
			$this->data['css_type'] 		= array('form');
			$this->data['title'] 			= $this->lang->line('add_service');
			$this->data['active_class'] 	= "services";
			$this->data['operation'] 		= "Add";
			$this->data['content'] 			= "admin/add_service";
		}
		elseif ($param == "Edit") {
			$table_name 					= "services";
			if ($this->input->post('submit') == $this->lang->line('update')) {
                                $id = $this->input->post('update_rec_id');
				// FORM VALIDATIONS

				$this->form_validation->set_rules('title_fr', 'Title', 'xss_clean|required');
				$this->form_validation->set_rules('title_en', 'Title', 'xss_clean|required');
				$this->form_validation->set_rules('description_fr', 'Description');
				$this->form_validation->set_rules('description_en', 'Description');
				$this->form_validation->set_rules('meta_tag_fr', 'Meta Tag');
				$this->form_validation->set_rules('meta_tag_en', 'Meta Tag');
				$this->form_validation->set_rules('meta_description_fr', 'Meta Description');
				$this->form_validation->set_rules('meta_description_en', 'Meta Description');
				$this->form_validation->set_rules('seo_keywords_fr', 'SEO Keywords');
				$this->form_validation->set_rules('seo_keywords_en', 'SEO Keywords');
				//  $this->form_validation->set_rules('bottom', 'Bottom', 'xss_clean');
				//  $this->form_validation->set_rules('sort_order', 'Sort Order', 'xss_clean');
				$this->form_validation->set_rules('package_id', 'Package', 'xss_clean');
				$this->form_validation->set_rules('status', 'Status', 'xss_clean');
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				if ($this->form_validation->run() == TRUE) {
					$inputdata['name_fr'] 			= $this->input->post('title_fr');
					$inputdata['description_fr'] 	= $this->input->post('description_fr');
					$inputdata['meta_tag_fr'] 		= $this->input->post('meta_tag_fr');
					$inputdata['meta_description_fr'] = $this->input->post('meta_description_fr');
					$inputdata['seo_keywords_fr'] 	= $this->input->post('seo_keywords_fr');
                                        $inputdata['name_en'] 			= $this->input->post('title_en');
					$inputdata['description_en'] 	= $this->input->post('description_en');
					$inputdata['meta_tag_en'] 		= $this->input->post('meta_tag_en');
					$inputdata['meta_description_en'] = $this->input->post('meta_description_en');
					$inputdata['seo_keywords_en'] 	= $this->input->post('seo_keywords_en');
					//  $inputdata['is_bottom'] 	= $this->input->post('bottom');
					//  $inputdata['sort_order'] 	= $this->input->post('sort_order');
					$inputdata['package_id'] 	= $this->input->post('package_id');
                                        $inputdata['order_no'] 		= $this->input->post('order_no');
					$inputdata['status'] 		= $this->input->post('status');
					$where['id'] 				= $id;
                                        if (!empty($_FILES['servicefile']['name'])) {
						if ($this->input->post('current_img') != "" && file_exists('uploads/service_images/' . $this->input->post('current_img'))) unlink('uploads/service_images/' . $this->input->post('current_img'));
						$fname = str_replace(' ', '', $_FILES['servicefile']['name']);	
						$filename = $id . "_" . $fname;
						$inputdata['image'] = $filename;
						$this->do_upload('./uploads/service_images/', 'jpg|jpeg|png', $filename, 'settings/services/','servicefile');
					}
					if ($this->base_model->update_operation($inputdata, $table_name, $where)) {
						$this->prepare_flashmessage($this->lang->line('page') . " " . $this->lang->line('update_success') , 0);
						redirect('settings/services', 'refresh');
					}
					else {
						$this->prepare_flashmessage($this->lang->line('unable_to_update') . " " . $this->lang->line('page') , 1);
						redirect('settings/services');
					}
				}

				$param1 						= $this->input->post('update_rec_id');
			}

			$this->db->select('id,name');
			//  $categories = $this->db->get_where('vbs_services', array('parent_id' => 0))->result();
			//  $category_opts 						= array("0" => "Root");
			//  foreach($categories as $row) $category_opts[$row->id] = $row->name;
                        $packages = $this->db->get_where('vbs_package_settings', array('status' => 'Active'))->result();
                        $package_opts = array();
                        foreach($packages as $row) $package_opts[$row->id] = $row->name;
			$this->data['package_opts'] 		= $package_opts;
			$aboutus_rec = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('services') . " WHERE id = " . $param1);
			$this->data['aboutus_rec'] 			= $aboutus_rec[0];
			$this->data['css_type'] 			= array('form');
			$this->data['gmaps'] 				= "false";
			$this->data['title'] 				= $this->lang->line('edit_page');
			$this->data['active_class'] 		= "page";
			$this->data['operation'] 			= "Edit";
			$this->data['content'] 				= "admin/add_service";
		}
		elseif ($param == "Delete") {
			$table_name 						= "services";
			$where['id'] 						= $param1;
			$cond 								= "id";
			$cond_val 							= $param1;
			if ($this->base_model->check_duplicate($table_name, $cond, $cond_val) && is_numeric($param1)) {
				if ($this->base_model->delete_record($table_name, $where)) {
					$this->prepare_flashmessage($this->lang->line('page') . " " . $this->lang->line('delete_success') , 0);
					redirect('settings/services', 'refresh');
				}
				else {
					$this->prepare_flashmessage($this->lang->line('unable_to_delete') . " " . $this->lang->line('page') , 1);
					redirect('settings/services');
				}
			}
			else {
				$this->prepare_flashmessage($this->lang->line('invalid') . " " . $this->lang->line('operation') , 1);
				redirect('settings/services', 'refresh');
			}
		}
		elseif ($param1 == "") {
                        if ($this->lang->lang() == 'en') {
                            $query = "SELECT    s.id as id, s.package_id as package_id, name_en as name
                                                , description_en as description, meta_tag_en as meta_tag
                                                , meta_description_en as meta_description, seo_keywords_en as seo_keywords
                                                , s.image as image, s.order_no as order_no, s.status as status FROM "  . $this->db->dbprefix('services') . " s ORDER BY order_no ASC";
                        }
                        else {
                            $query = "SELECT    s.id as id, s.package_id as package_id, name_fr as name
                                                , description_fr as description, meta_tag_fr as meta_tag
                                                , meta_description_fr as meta_description, seo_keywords_fr as seo_keywords
                                                , s.image as image, s.order_no as order_no, s.status as status FROM "  . $this->db->dbprefix('services') . " s ORDER BY order_no ASC";
                        }
			$aboutus_recs = $this->base_model->run_query($query);
			if (count($aboutus_recs) > 0) $this->data['aboutus_recs'] = $aboutus_recs;
			else $this->data['aboutus_recs'] = array();
		}

		$this->_render_page('templates/admin_template', $this->data);
	}
        
        
        // Live Traffic
        public function infoTrafic() {
		$this->data['message'] 				= "";
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) redirect('auth', 'refresh');
		$this->data['css_type'] 			= array('datatable');
		$this->data['active_class'] 		= "infotrafic";
		$this->data['title'] 				= $this->lang->line("live_traffic");
		$this->data['content'] 				= "admin/infotrafic";
                
		$this->_render_page('templates/admin_template', $this->data);
	}
        
        // Live Traffic
        public function map() {
		$this->data['message'] 				= "";
		//  if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin() || !$this->ion_auth->is_executive()) redirect('auth', 'refresh');
		$this->data['css_type'] 			= array('form');
		$this->data['active_class'] 		= "map";
		$this->data['title'] 				= $this->lang->line('map');
		$this->data['content'] 				= "admin/map";
                $this->data['gmaps'] 				= "true";
                
		$this->_render_page('templates/admin_template', $this->data);
	}
        
        // Flight Traffic
        public function trackFlight() {
		$this->data['message'] 				= "";
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) redirect('auth', 'refresh');
		$this->data['css_type'] 			= array('datatable');
		$this->data['active_class'] 		= "trackflight";
		$this->data['title'] 				= $this->lang->line('track_flight');
		$this->data['content'] 				= "admin/trackflight";
		$this->data['gmaps'] 				= "true";
		$this->data['css_type'] 			= array('form');
                
		$this->_render_page('templates/admin_template', $this->data);
	}
        
        // getFlightStatus
        public function getFlightStatus() {
           //load the Curl library 
            //  $this->load->library('curl'); 
            //Request using GET Method
            // $get_url = "https://api.flightstats.com/flex/flightstatus/rest/v2/json/flight/track/".$flight_id."?appId=e644eebd&appKey=7ceac3b0b004186cd80a622003467914&includeFlightPlan=false&maxPositions=2";  
            // $flight_status = $this->curl->simple_get($get_url, false, array(CURLOPT_USERAGENT => true)); 
            
            
            $flight_id = $this->input->post('flight_id');
            echo "Flight ID : " . $flight_id ;
            $url = "https://api.flightstats.com/flex/flightstatus/rest/v2/json/flight/track/".$flight_id."?appId=e644eebd&appKey=7ceac3b0b004186cd80a622003467914&includeFlightPlan=false&maxPositions=2";
             
            //open connection
            $ch = curl_init();
            //set the url, number of POST vars, POST data
            curl_setopt($ch,CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            // Will return the response, if false it print the response
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            //execute post
            $result = curl_exec($ch);
            //close connection
            curl_close($ch);
            
            $flight_status = json_decode($result, true);
            echo "<PRE>";print_r($flight_status);echo "</PRE>";
            echo $flight_status;
            die();
        }
        
        
        // CURD OPERATIONS FUNCTION FOR TRAIN

	function stations($param = '', $param1 = '')
	{
		$this->data['message'] = "";
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) redirect('auth', 'refresh');
		$this->data['css_type'] = array(
			'datatable'
		);
		$this->data['title'] 				= $this->lang->line('stations');
		$this->data['active_class'] 		= "stations";
		$this->data['content'] 				= "admin/settings/stations";
		if ($param == "Add") {
			if ($this->input->post('submit') == $this->lang->line('add')) {

				// FORM VALIDATIONS

				$this->form_validation->set_rules('station_name', 'Station Name', 'xss_clean|required');
				$this->form_validation->set_rules('station_address', 'Station Address', 'xss_clean|required');
				$this->form_validation->set_rules('status', 'Status', 'xss_clean');
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				if ($this->form_validation->run() == TRUE) {
					$inputdata['station_name'] = $this->input->post('station_name');
					$inputdata['address'] = $this->input->post('station_address');
					$inputdata['status'] = $this->input->post('status');
					$table_name = "stations";
					if ($this->base_model->insert_operation($inputdata, $table_name)) {
						$this->prepare_flashmessage($this->lang->line('station') . " " . $this->lang->line('add_success') , 0);
						redirect('settings/stations', 'refresh');
					}
					else {
						$this->prepare_flashmessage($this->lang->line('unable_to_add') . " " . $this->lang->line('station') , 1);
						redirect('settings/stations');
					}
				}
			}

			$this->data['gmaps'] = "true";
			$this->data['css_type'] = array('form');
			$this->data['title'] = $this->lang->line('add_station');
			$this->data['active_class']	 	= "stations";
			$this->data['operation'] 		= "Add";
			$this->data['content'] 			= "admin/settings/add_stations";
		}
		elseif ($param == "Edit") {
			$table_name						= "stations";
			if ($this->input->post('submit') == $this->lang->line('update')) {

				// FORM VALIDATIONS

				$this->form_validation->set_rules('station_name', 'Station Name', 'xss_clean|required');
                                $this->form_validation->set_rules('station_address', 'Station Address', 'xss_clean|required');
				$this->form_validation->set_rules('status', 'Status', 'xss_clean');
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				$param1 = $this->input->post('update_rec_id');
				if ($this->form_validation->run() == TRUE) {
					$inputdata['station_name'] = $this->input->post('station_name');
					$inputdata['address'] = $this->input->post('station_address');
					$inputdata['status'] = $this->input->post('status');
					$where['id'] = $this->input->post('update_rec_id');
					if ($this->base_model->update_operation($inputdata, $table_name, $where)) {
						$this->prepare_flashmessage($this->lang->line('station') . " " . $this->lang->line('update_success') , 0);
						redirect('settings/stations', 'refresh');
					}
					else {
						$this->prepare_flashmessage($this->lang->line('unable_to_update') . " " . $this->lang->line('station') , 1);
						redirect('settings/stations');
					}
				}
			}

			$station_rec = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('stations') . " WHERE id = " . $param1);
			$this->data['station_rec'] = $station_rec[0];
			$this->data['css_type'] = array(
												'form'
											);
			$this->data['gmaps'] 			= "true";
			$this->data['title'] 			= $this->lang->line('edit_station');
			$this->data['active_class'] 	= "stations";
			$this->data['operation'] 		= "Edit";
			$this->data['content'] 			= "admin/settings/add_stations";
		}
		elseif ($param == "Delete") {
			$table_name 					= "stations";
			$where['id'] 					= $param1;
			$cond 							= "id";
			$cond_val 						= $param1;
			if ($this->base_model->check_duplicate($table_name, $cond, $cond_val) && is_numeric($param1)) {
				if ($this->base_model->delete_record($table_name, $where)) {
					$this->prepare_flashmessage($this->lang->line('station') . " " . $this->lang->line('delete_success') , 0);
					redirect('settings/stations', 'refresh');
				}
				else {
					$this->prepare_flashmessage($this->lang->line('unable_to_delete') . " " . $this->lang->line('station') , 1);
					redirect('settings/stations');
				}
			}
			else {
				$this->prepare_flashmessage($this->lang->line('invalid') . " " . $this->lang->line('operation') , 1);
				redirect('settings/stations', 'refresh');
			}
		}
		elseif ($param1 == "") {
			$stations = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('stations'));
			if (count($stations) > 0) $this->data['stations'] = $stations;
			else $this->data['stations'] = array();
		}

		$this->_render_page('templates/admin_template', $this->data);
	}
        
        // CURD OPERATIONS FUNCTION FOR HOTEL

	function hotels($param = '', $param1 = '')
	{
		$this->data['message'] = "";
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) redirect('auth', 'refresh');
		$this->data['css_type'] = array(
			'datatable'
		);
		$this->data['title'] 				= $this->lang->line('hotels');
		$this->data['active_class'] 		= "hotels";
		$this->data['content'] 				= "admin/settings/hotels";
		if ($param == "Add") {
			if ($this->input->post('submit') == $this->lang->line('add')) {

				// FORM VALIDATIONS

				$this->form_validation->set_rules('hotel_name', 'Hotel Name', 'xss_clean|required');
				$this->form_validation->set_rules('hotel_address', 'Hotel Address', 'xss_clean|required');
				$this->form_validation->set_rules('status', 'Status', 'xss_clean');
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				if ($this->form_validation->run() == TRUE) {
					$inputdata['hotel_name'] = $this->input->post('hotel_name');
					$inputdata['address'] = $this->input->post('hotel_address');
					$inputdata['status'] = $this->input->post('status');
					$table_name = "hotels";
					if ($this->base_model->insert_operation($inputdata, $table_name)) {
						$this->prepare_flashmessage($this->lang->line('hotel') . " " . $this->lang->line('add_success') , 0);
						redirect('settings/hotels', 'refresh');
					}
					else {
						$this->prepare_flashmessage($this->lang->line('unable_to_add') . " " . $this->lang->line('hotel') , 1);
						redirect('settings/hotels');
					}
				}
			}

			$this->data['gmaps'] = "true";
			$this->data['css_type'] = array('form');
			$this->data['title'] = $this->lang->line('add_hotel');
			$this->data['active_class']	 	= "hotels";
			$this->data['operation'] 		= "Add";
			$this->data['content'] 			= "admin/settings/add_hotels";
		}
		elseif ($param == "Edit") {
			$table_name						= "hotels";
			if ($this->input->post('submit') == $this->lang->line('update')) {

				// FORM VALIDATIONS

				$this->form_validation->set_rules('hotel_name', 'Hotel Name', 'xss_clean|required');
                                $this->form_validation->set_rules('hotel_address', 'Hotel Address', 'xss_clean|required');
				$this->form_validation->set_rules('status', 'Status', 'xss_clean');
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				$param1 = $this->input->post('update_rec_id');
				if ($this->form_validation->run() == TRUE) {
					$inputdata['hotel_name'] = $this->input->post('hotel_name');
					$inputdata['address'] = $this->input->post('hotel_address');
					$inputdata['status'] = $this->input->post('status');
					$where['id'] = $this->input->post('update_rec_id');
					if ($this->base_model->update_operation($inputdata, $table_name, $where)) {
						$this->prepare_flashmessage($this->lang->line('hotel') . " " . $this->lang->line('update_success') , 0);
						redirect('settings/hotels', 'refresh');
					}
					else {
						$this->prepare_flashmessage($this->lang->line('unable_to_update') . " " . $this->lang->line('hotel') , 1);
						redirect('settings/hotels');
					}
				}
			}

			$hotel_rec = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('hotels') . " WHERE id = " . $param1);
			$this->data['hotel_rec'] = $hotel_rec[0];
			$this->data['css_type'] = array(
												'form'
											);
			$this->data['gmaps'] 			= "true";
			$this->data['title'] 			= $this->lang->line('edit_hotel');
			$this->data['active_class'] 	= "hotels";
			$this->data['operation'] 		= "Edit";
			$this->data['content'] 			= "admin/settings/add_hotels";
		}
		elseif ($param == "Delete") {
			$table_name 					= "hotels";
			$where['id'] 					= $param1;
			$cond 							= "id";
			$cond_val 						= $param1;
			if ($this->base_model->check_duplicate($table_name, $cond, $cond_val) && is_numeric($param1)) {
				if ($this->base_model->delete_record($table_name, $where)) {
					$this->prepare_flashmessage($this->lang->line('hotel') . " " . $this->lang->line('delete_success') , 0);
					redirect('settings/hotels', 'refresh');
				}
				else {
					$this->prepare_flashmessage($this->lang->line('unable_to_delete') . " " . $this->lang->line('hotel') , 1);
					redirect('settings/hotels');
				}
			}
			else {
				$this->prepare_flashmessage($this->lang->line('invalid') . " " . $this->lang->line('operation') , 1);
				redirect('settings/hotels', 'refresh');
			}
		}
		elseif ($param1 == "") {
			$hotels = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('hotels'));
			if (count($hotels) > 0) $this->data['hotels'] = $hotels;
			else $this->data['hotels'] = array();
		}

		$this->_render_page('templates/admin_template', $this->data);
	}
        
        
        // CURD OPERATIONS FUNCTION FOR PARK

	function parks($param = '', $param1 = '')
	{
		$this->data['message'] = "";
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) redirect('auth', 'refresh');
		$this->data['css_type'] = array(
			'datatable'
		);
		$this->data['title'] 				= $this->lang->line('parks');
		$this->data['active_class'] 		= "parks";
		$this->data['content'] 				= "admin/settings/parks";
		if ($param == "Add") {
			if ($this->input->post('submit') == $this->lang->line('add')) {

				// FORM VALIDATIONS

				$this->form_validation->set_rules('park_name', 'Park Name', 'xss_clean|required');
				$this->form_validation->set_rules('park_address', 'Park Address', 'xss_clean|required');
				$this->form_validation->set_rules('status', 'Status', 'xss_clean');
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				if ($this->form_validation->run() == TRUE) {
					$inputdata['park_name'] = $this->input->post('park_name');
					$inputdata['address'] = $this->input->post('park_address');
					$inputdata['status'] = $this->input->post('status');
					$table_name = "parks";
					if ($this->base_model->insert_operation($inputdata, $table_name)) {
						$this->prepare_flashmessage($this->lang->line('park') . " " . $this->lang->line('add_success') , 0);
						redirect('settings/parks', 'refresh');
					}
					else {
						$this->prepare_flashmessage($this->lang->line('unable_to_add') . " " . $this->lang->line('park') , 1);
						redirect('settings/parks');
					}
				}
			}

			$this->data['gmaps'] = "true";
			$this->data['css_type'] = array('form');
			$this->data['title'] = $this->lang->line('add_park');
			$this->data['active_class']	 	= "parks";
			$this->data['operation'] 		= "Add";
			$this->data['content'] 			= "admin/settings/add_parks";
		}
		elseif ($param == "Edit") {
			$table_name						= "parks";
			if ($this->input->post('submit') == $this->lang->line('update')) {

				// FORM VALIDATIONS

				$this->form_validation->set_rules('park_name', 'Park Name', 'xss_clean|required');
                                $this->form_validation->set_rules('park_address', 'Park Address', 'xss_clean|required');
				$this->form_validation->set_rules('status', 'Status', 'xss_clean');
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				$param1 = $this->input->post('update_rec_id');
				if ($this->form_validation->run() == TRUE) {
					$inputdata['park_name'] = $this->input->post('park_name');
					$inputdata['address'] = $this->input->post('park_address');
					$inputdata['status'] = $this->input->post('status');
					$where['id'] = $this->input->post('update_rec_id');
					if ($this->base_model->update_operation($inputdata, $table_name, $where)) {
						$this->prepare_flashmessage($this->lang->line('park') . " " . $this->lang->line('update_success') , 0);
						redirect('settings/parks', 'refresh');
					}
					else {
						$this->prepare_flashmessage($this->lang->line('unable_to_update') . " " . $this->lang->line('park') , 1);
						redirect('settings/parks');
					}
				}
			}

			$hotel_rec = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('parks') . " WHERE id = " . $param1);
			$this->data['park_rec'] = $hotel_rec[0];
			$this->data['css_type'] = array(
												'form'
											);
			$this->data['gmaps'] 			= "true";
			$this->data['title'] 			= $this->lang->line('edit_park');
			$this->data['active_class'] 	= "parks";
			$this->data['operation'] 		= "Edit";
			$this->data['content'] 			= "admin/settings/add_parks";
		}
		elseif ($param == "Delete") {
			$table_name 					= "parks";
			$where['id'] 					= $param1;
			$cond 							= "id";
			$cond_val 						= $param1;
			if ($this->base_model->check_duplicate($table_name, $cond, $cond_val) && is_numeric($param1)) {
				if ($this->base_model->delete_record($table_name, $where)) {
					$this->prepare_flashmessage($this->lang->line('park') . " " . $this->lang->line('delete_success') , 0);
					redirect('settings/parks', 'refresh');
				}
				else {
					$this->prepare_flashmessage($this->lang->line('unable_to_delete') . " " . $this->lang->line('park') , 1);
					redirect('settings/parks');
				}
			}
			else {
				$this->prepare_flashmessage($this->lang->line('invalid') . " " . $this->lang->line('operation') , 1);
				redirect('settings/parks', 'refresh');
			}
		}
		elseif ($param1 == "") {
			$parks = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('parks'));
			if (count($parks) > 0) $this->data['parks'] = $parks;
			else $this->data['parks'] = array();
		}

		$this->_render_page('templates/admin_template', $this->data);
	}
}
?>