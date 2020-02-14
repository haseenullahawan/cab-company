<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Executive extends MY_Controller

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
	| MODULE: 			Executive
	| -----------------------------------------------------
	| This is Executive module controller file.
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
		$this->load->model('request_model');
		$this->load->model('jobs_model');
		$this->load->model('support_model');
		$this->load->model('calls_model');
		$this->lang->load('general');
		$this->load->helper('language');
		}

	function index()
		{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_executive()) redirect('auth', 'refresh');
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$today = date("Y-m-d");
		$todaybookings = $this->base_model->run_query("SELECT b.*,v.name FROM vbs_bookings AS b , vbs_vehicle AS v WHERE b.vehicle_selected = v.id AND  b.bookdate = '" . $today . "' AND b.is_conformed = 'pending' ORDER BY b.pick_date ASC LIMIT 10");
		if (count($todaybookings) > 0) $this->data['todaybookings'] = $todaybookings;
		  else $this->data['todaybookings'] = array();
		/****** Recent Bookings Chart Data ******/
		$records = $this->base_model->run_query('SELECT bookdate, count(IF(is_conformed="confirm",1,NULL)) AS confirmed_bookings,
						count(IF(is_conformed="cancelled",1,NULL)) AS cancelled_bookings, 
						count(IF(is_conformed="pending",1,NULL)) AS pending_bookings, 
						count(*) AS total_bookings 
						FROM ' . $this->db->dbprefix("bookings") . ' GROUP BY bookdate
						ORDER BY id DESC LIMIT 4');
		if (count($records) > 0)
			{
			$result = array();
			$temp = array();
			array_push($temp, $this->lang->line('date') , $this->lang->line('total_bookings') , $this->lang->line('cancelled_bookings') , $this->lang->line('pending_bookings') , $this->lang->line('confirmed_bookings'));
			array_push($result, $temp);
			foreach($records as $d)
				{
				$temp = array();
				array_push($temp, date('M d', strtotime($d->bookdate)) , $d->total_bookings, $d->cancelled_bookings, $d->pending_bookings, $d->confirmed_bookings);
				array_push($result, $temp);
				}

			$str = "";
			$cnt = 0;
			foreach($result as $r)
				{
				if ($cnt++ == 0)
					{
					$str = $str . "['" . $r[0] . "','" . $r[1] . "','" . $r[2] . "','" . $r[3] . "','" . $r[4] . "'],";
					}
				  else
					{
					$str = $str . "['" . $r[0] . "'," . $r[1] . "," . $r[2] . "," . $r[3] . "," . $r[4] . "],";
					}
				}

			$this->data['result'] = $str;
			}

		$customers = $this->db->query("select u.* from vbs_users u, vbs_users_groups g where u.id=g.user_id and g.group_id='2' GROUP BY u.id ORDER BY u.date_of_registration DESC LIMIT 10")->result();
		$members = $this->db->query("select u.* from vbs_users u, vbs_users_groups g where u.id=g.user_id and u.active='1' and g.group_id='2'")->result();
		$n = count($members);
		$inactiveMembers = $this->db->query("select u.* from vbs_users u, vbs_users_groups g where u.id=g.user_id and u.active='0' and g.group_id='2'")->result();
		$im = count($inactiveMembers);
		$executives = $this->db->query("select u.* from vbs_users u, vbs_users_groups g where u.id=g.user_id  and u.active='1' and g.group_id='3'")->result();
		$e = count($executives);
		$inactiveExecutives = $this->db->query("select u.* from vbs_users u, vbs_users_groups g where u.id=g.user_id  and u.active='0' and g.group_id='3'")->result();
		$ie = count($inactiveExecutives);
		$vehicles = $this->db->query("select * from vbs_vehicle where status='active'")->result();

		// echo "<pre>";print_r($vehicles);die();

		$v = count($vehicles);
		$airports = $this->db->query("select * from vbs_airports where status='active'")->result();
		$a = count($airports);
		$package = $this->db->query("select * from vbs_package_settings where status='active'")->result();
		$p = count($package);
		$bookings = $this->db->query("select * from vbs_bookings")->result();
		$b = count($bookings);

		// echo $b;die();

		$this->data['n'] = $n;
		$this->data['im'] = $im;
		$this->data['e'] = $e;
		$this->data['ie'] = $ie;
		$this->data['v'] = $v;
		$this->data['a'] = $a;
		$this->data['p'] = $p;
		$this->data['b'] = $b;
		$this->data['customers'] = $customers;
		$this->data['css_type'] = array(
			"form",
			"datatable"
		);
		$this->data['gmaps'] = "false";
		$this->data['active_class'] = "dashboard";
		$this->data['title'] = 'Dashboard';
		$this->data['content'] = 'executives/dashboard';
		$this->_render_page('templates/executive_template', $this->data);
		}

	//

	public function profile()
		{
		$this->data['message'] = "";
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_executive()) redirect('auth', 'refresh');
		if ($this->input->post('submit') == "Update")
			{

			// FORM VALIDATIONS

			$this->form_validation->set_rules('user_name', 'User Name', 'xss_clean|required');
			$this->form_validation->set_rules('email', 'Email', 'valid_email|xss_clean|required');
			$this->form_validation->set_rules('first_name', 'First Name', 'xss_clean|required');
			$this->form_validation->set_rules('last_name', 'Last Name', 'xss_clean|required');
			$this->form_validation->set_rules('phone', 'Phone', 'xss_clean|required');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			if ($this->form_validation->run() == TRUE)
				{
				$inputdata['username'] = $this->input->post('user_name');
				$inputdata['email'] = $this->input->post('email');
				$inputdata['first_name'] = $this->input->post('first_name');
				$inputdata['last_name'] = $this->input->post('last_name');
				$inputdata['phone'] = $this->input->post('phone');
				$table_name = "users";
				$where['id'] = $this->input->post('update_rec_id');
				if ($this->base_model->update_operation($inputdata, $table_name, $where))
					{
					$this->prepare_flashmessage("Updated Successfully", 0);
					redirect('executive/profile', 'refresh');
					}
				  else
					{
					$this->prepare_flashmessage("Unable to update", 1);
					redirect('executive/profile');
					}
				}
			}

		$admin_details = $this->db->get_where('users', array(
			'id' => $this->ion_auth->get_user_id()
		))->row();
		$this->data['admin_details'] = $admin_details;
		$this->data['css_type'] = array(
			'form'
		);
		$this->data['gmaps'] = "false";
		$this->data['title'] = 'Profile';
		$this->data['content'] = 'executives/executive_profile';
		$this->_render_page('templates/executive_template', $this->data);
		}
	}