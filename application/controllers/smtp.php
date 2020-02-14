<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Smtp extends MY_Controller
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
			
		$this->load->model('smtp_model');
		$this->load->model('request_model');
		$this->load->model('jobs_model');
		$this->load->model('calls_model');
		$this->load->model('support_model');
		$this->data['configuration'] = get_configuration();
	}


	public function edit($id){
		$this->data['data']	= $this->smtp_model->get(['id' => $id]);
		if($this->data['data'] != false) {
			$this->data['css_type'] = array("form");
			$this->data['active_class'] = "smtp";
			$this->data['gmaps'] 	= false;
			$this->data['title'] 	= $this->lang->line("configurations");
			$this->data['subtitle'] 	= $this->lang->line("smtp_text");
			$this->data['title_link'] 	= '#';
			$this->data['content']  = 'admin/smtp/edit';
			$this->_render_page('templates/admin_template', $this->data);
		} else show_404();
	}

	public function update($id){
		$error = $this->smtp_model->smtp_validate(true);
		$con = $this->smtp_model->get(['id' => $id]);
		if($con != false) {
			if (empty($error)) {
				$this->smtp_model->update([
					'status' 	=> @$_POST['status'],
					'name' 	=> @$_POST['name'],
					'smtp_host' 	=> @$_POST['smtp_host'],
					'smtp_user' 	=> @$_POST['smtp_user'],
					'smtp_password' 	=> @$_POST['smtp_password'],
					'path_to_send_mail' 	=> @$_POST['path_to_send_mail'],
					'send_copy_to_sender' 	=> @$_POST['send_copy_to_sender'],
					'smtp_status_1' 	=> @$_POST['smtp_status_1'],
					'smtp_name_1' 	=> @$_POST['smtp_name_1'],
					'smtp_host_1' 	=> @$_POST['smtp_host_1'],
					'smtp_user_1' 	=> @$_POST['smtp_user_1'],
					'smtp_password_1' 	=> @$_POST['smtp_password_1'],
					'smtp_path_to_send_mail_1' 	=> @$_POST['smtp_path_to_send_mail_1'],
					'smtp_send_copy_to_sender_1' 	=> @$_POST['smtp_send_copy_to_sender_1'],
					// 'status1' 	=> @$_POST['status1'],
					// 'name1' 	=> @$_POST['name1'],
					// 'host1' 	=> @$_POST['host1'],
					// 'call_from' 	=> @$_POST['call_from'],
					// 'call_to' 	=> @$_POST['call_to'],
					// 'auto_take_link' 	=> @$_POST['auto_take_link'],
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

			redirect('admin/smtp/'.$id.'/edit');
		} else show_404();
	}
}