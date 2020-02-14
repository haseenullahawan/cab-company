<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Popups extends MY_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->lang->load('auth');
		$this->load->helper('language');
		if (!$this->basic_auth->is_login())
			redirect("admin", 'refresh');
		else
			$this->data['user'] = $this->basic_auth->user();
		$this->load->model('popups_model');
		$this->load->model('request_model');
		$this->load->model('jobs_model');
		$this->load->model('calls_model');
		$this->load->model('settings_model');
		$this->load->model('support_model');
		$this->data['configuration'] = get_configuration();
	}


	public function edit($id){
		$this->data['data']	= $this->popups_model->get(['id' => $id]);
		// $this->data['data1']	= $this->settings_model->get(['id' => $id]);
		if($this->data['data'] != false) {
			$this->data['css_type'] = array("form");
			$this->data['active_class'] = "popups";
			$this->data['gmaps'] 	= false;
			$this->data['title'] 	= $this->lang->line("configurations");
			$this->data['subtitle'] 	= $this->lang->line("popups");
			$this->data['title_link'] 	= '#';
			$this->data['content']  = 'admin/popups/edit';
			$this->_render_page('templates/admin_template', $this->data);
		} else show_404();
	}

	public function update($id){
		$error = $this->popups_model->popups_validate(true);
		$con = $this->popups_model->get(['id' => $id]);
		if($con != false) {
			if (true) {
				$message1 = isset($_POST['message1']) ? $_POST['message1'] : '';
				$message2 = isset($_POST['message2']) ? $_POST['message2'] : '';
				$message3 = isset($_POST['message3']) ? $_POST['message3'] : '';
				$message4 = isset($_POST['message4']) ? $_POST['message4'] : '';
				if ((@$_POST['position1'] == @$_POST['position2']) || (@$_POST['position2'] == @$_POST['position3']) || (@$_POST['position3'] == @$_POST['position4'])) {
					$this->session->set_flashdata('alert', [
						'message' => "Two or three Popups Cannot at the same location.",
						'class' => "alert-danger",
						'type' => "Error"
					]);	
					return redirect("admin/popups/1/edit");
					die();
				}
				$this->popups_model->update([
					'status1' 	=> @$_POST['status1'],
					'status2' 	=> @$_POST['status2'],
					'status3' 	=> @$_POST['status3'],
					'status4' 	=> @$_POST['status4'],
					'request_closing_days_1' 	=> @$_POST['request_closing_days_1'],
					'request_closing_days_2' 	=> @$_POST['request_closing_days_2'],
					'request_closing_days_3' 	=> @$_POST['request_closing_days_3'],
					'request_closing_days_4' 	=> @$_POST['request_closing_days_4'],
					'name1' 	=> @$_POST['name1'],
					'name2' 	=> @$_POST['name2'],
					'name3' 	=> @$_POST['name3'],
					'name4' 	=> @$_POST['name4'],
					'auto_open1' 	=> @$_POST['auto_open1'],
					'auto_open2' 	=> @$_POST['auto_open2'],
					'auto_open3' 	=> @$_POST['auto_open3'],
					'auto_open4' 	=> @$_POST['auto_open4'],
					'position1' 	=> @$_POST['position1'],
					'position2' 	=> @$_POST['position2'],
					'position3' 	=> @$_POST['position3'],
					'position4' 	=> @$_POST['position4'],
					'success_message1' 	=> $message1,
					'success_message2' 	=> $message2,
					'success_message3' 	=> $message3,
					'success_message4' 	=> $message4,
				], $id);

				$this->session->set_flashdata('alert', [
						'message' => "Successfully Updated.",
						'class' => "alert-success",
						'type' => "Success"
				]);
			} else {
				$this->session->set_flashdata('alert', [
						'message' => @$error[0],
						'class' => "alert-danger",
						'type' => "Error"
				]);
			}

			redirect('admin/popups/'.$id.'/edit');
		} else show_404();
	}
}