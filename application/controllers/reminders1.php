<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reminders1 extends MY_Controller
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
		$this->load->model('reminders1_model');
		$this->load->model('request_model');
		$this->load->model('jobs_model');
		$this->load->model('calls_model');
		$this->load->model('support_model');
		$this->data['configuration'] = get_configuration();
	}

	public function index(){
		$this->data['css_type'] 	= array("form","datatable");
		$this->data['active_class'] = "reminders1";
		$this->data['gmaps'] 		= false;
		$this->data['title'] 		= $this->lang->line("configurations");
		$this->data['subtitle'] 		= $this->lang->line("reminders1");
		$this->data['title_link'] 	= '#';
		$this->data['content'] 		= 'admin/reminders1/index';
        $data = [];
		$this->data['data'] = $this->reminders1_model->getAll();
		$this->_render_page('templates/admin_template', $this->data);
	}

	public function add(){
		$this->data['css_type'] 	= array("form");
		$this->data['active_class'] = "reminders1";
		$this->data['gmaps'] 	= false;
		$this->data['title'] 	= $this->lang->line("reminders1");
		$this->data['subtitle'] 	= 'Add Reminder';
		$this->data['title_link'] 	= base_url('admin/reminders1');
		$this->data['content']  = 'admin/reminders1/add';
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->addreminders1();
		}
		$this->_render_page('templates/admin_template', $this->data);
	}

	public function addreminders1(){
		$error = $this->reminders1_model->reminder1_validate(true);
		if (empty($error)) {
			$message = isset($_POST['message']) ? $_POST['message'] : '';
			$reminder_before_days = isset($_POST['reminder_before_days']) ? $_POST['reminder_before_days'] : '';
			$reminder_after_days = isset($_POST['reminder_after_days']) ? $_POST['reminder_after_days'] : '';
			$id = $this->reminders1_model->create([
				'reminder_status' 	=> @$_POST['reminder_status'],
				'name' 	=> @$_POST['name'],
				'status' 	=> @$_POST['status'],
				'module' => @$_POST['module'],
				'subject' => @$_POST['subject'],
				'message' => $message,
				'reminder_before_days' => implode(',', $reminder_before_days),
				'reminder_after_days' => implode(',', $reminder_after_days),
				'created_at' 	=> date('Y-m-d H:i:s'),
			]);
			if($id == 0){
				$this->session->set_flashdata('alert', [
					'message' => "Record Already Exist.",
					'class' => "alert-danger",
					'type' => "Error"
				]);
				redirect('admin/reminders1/add');
			}else{
				$this->session->set_flashdata('alert', [
					'message' => "Successfully Created.",
					'class' => "alert-success",
					'type' => "Success"
				]);
			}
			
			redirect('admin/reminders1/'.$id.'/edit');
		} else {
			$this->data['alert'] = [
				'message' => @$error[0],
				'class' => "alert-danger",
				'type' => "Error"
			];
		}
	}

	public function edit($id){
		$this->data['data']	= $this->reminders1_model->get(['id' => $id]);
		if($this->data['data'] != false) {
			$this->data['css_type'] = array("form");
			$this->data['active_class'] = "reminders1";
			$this->data['gmaps'] 	= false;
			$this->data['title'] 	= $this->lang->line("configurations");
			$this->data['subtitle'] 	= 'Edit Reminder';
			$this->data['title_link'] 	= '#';
			$this->data['content']  = 'admin/reminders1/edit';
			$this->_render_page('templates/admin_template', $this->data);
		} else show_404();
	}

	public function update($id){
		$error = $this->reminders1_model->reminder1_validate(true);
		$con = $this->reminders1_model->get(['id' => $id]);
		if($con != false) {
			if (empty($error)) {
				$message = isset($_POST['message']) ? $_POST['message'] : '';
				$reminder_before_days = isset($_POST['reminder_before_days']) ? $_POST['reminder_before_days'] : '';
				$reminder_after_days = isset($_POST['reminder_after_days']) ? $_POST['reminder_after_days'] : '';
				$this->reminders1_model->update([
					'reminder_status' 	=> @$_POST['reminder_status'],
					'name' 	=> @$_POST['name'],
					'status' 	=> @$_POST['status'],
					'module' => @$_POST['module'],
					'subject' => @$_POST['subject'],
					'message' => $message,
					'reminder_before_days' => implode(',', $reminder_before_days),
					'reminder_after_days' => implode(',', $reminder_after_days),
					'updated_at' 	=> date('Y-m-d'),
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

			redirect('admin/reminders1/'.$id.'/edit');
		} else show_404();
	}

	public function delete($id){
		$this->reminders1_model->delete($id);
		$this->session->set_flashdata('alert', [
				'message' => "Successfully deleted.",
				'class' => "alert-success",
				'type' => "Success"
		]);
		redirect('admin/reminders1');
	}
}