<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reminders extends MY_Controller
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
		$this->load->model('reminders_model');
		$this->load->model('request_model');
		$this->load->model('jobs_model');
		$this->load->model('calls_model');
		$this->load->model('support_model');
		$this->data['configuration'] = get_configuration();
	}

	public function index(){
		$this->data['css_type'] 	= array("form","datatable");
		$this->data['active_class'] = "reminders";
		$this->data['gmaps'] 		= false;
		$this->data['title'] 		= $this->lang->line("configurations");
		$this->data['subtitle'] 		= $this->lang->line("reminders");
		$this->data['title_link'] 	= '#';
		$this->data['content'] 		= 'admin/reminders/index';
        $data = [];
		$this->data['data'] = $this->reminders_model->getAll();
		$this->_render_page('templates/admin_template', $this->data);
	}

	public function add(){
		$this->data['css_type'] 	= array("form");
		$this->data['active_class'] = "reminders";
		$this->data['gmaps'] 	= false;
		$this->data['title'] 	= $this->lang->line("reminders");
		$this->data['subtitle'] 	= 'Add Reminder';
		$this->data['title_link'] 	= base_url('admin/reminders');
		$this->data['content']  = 'admin/reminders/add';
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->addreminders();
		}
		$this->_render_page('templates/admin_template', $this->data);
	}

	public function addreminders(){
		$error = $this->reminders_model->reminder_validate(true);
		if (empty($error)) {
			$message = isset($_POST['message']) ? $_POST['message'] : '';
			$reminder_days = isset($_POST['reminder_days']) ? $_POST['reminder_days'] : '';
			$id = $this->reminders_model->create([
				'reminder_status' 	=> @$_POST['reminder_status'],
				'name' 	=> @$_POST['name'],
				'status' 	=> @$_POST['status'],
				'module' => @$_POST['module'],
				'subject' => @$_POST['subject'],
				'message' => $message,
				'reminder_days' => implode(',', $reminder_days),
				'created_at' 	=> date('Y-m-d H:i:s'),
			]);
			if($id == 0){
				$this->session->set_flashdata('alert', [
					'message' => "Record Already Exist.",
					'class' => "alert-danger",
					'type' => "Error"
				]);
				redirect('admin/reminders/add');
			}else{
				$this->session->set_flashdata('alert', [
					'message' => "Successfully Created.",
					'class' => "alert-success",
					'type' => "Success"
				]);
			}
			
			redirect('admin/reminders/'.$id.'/edit');
		} else {
			$this->data['alert'] = [
				'message' => @$error[0],
				'class' => "alert-danger",
				'type' => "Error"
			];
		}
	}

	public function edit($id){
		$this->data['data']	= $this->reminders_model->get(['id' => $id]);
		if($this->data['data'] != false) {
			$this->data['css_type'] = array("form");
			$this->data['active_class'] = "reminders";
			$this->data['gmaps'] 	= false;
			$this->data['title'] 	= $this->lang->line("configurations");
			$this->data['subtitle'] 	= 'Edit Reminder';
			$this->data['title_link'] 	= '#';
			$this->data['content']  = 'admin/reminders/edit';
			$this->_render_page('templates/admin_template', $this->data);
		} else show_404();
	}

	public function update($id){
		$error = $this->reminders_model->reminder_validate(true);
		$con = $this->reminders_model->get(['id' => $id]);
		if($con != false) {
			if (empty($error)) {
				$message = isset($_POST['message']) ? $_POST['message'] : '';
				$reminder_days = isset($_POST['reminder_days']) ? $_POST['reminder_days'] : '';
				$this->reminders_model->update([
					'reminder_status' 	=> @$_POST['reminder_status'],
					'name' 	=> @$_POST['name'],
					'status' 	=> @$_POST['status'],
					'module' => @$_POST['module'],
					'subject' => @$_POST['subject'],
					'message' => $message,
					'reminder_days' => implode(',', $reminder_days),
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

			redirect('admin/reminders/'.$id.'/edit');
		} else show_404();
	}

	public function delete($id){
		$this->reminders_model->delete($id);
		$this->session->set_flashdata('alert', [
				'message' => "Successfully deleted.",
				'class' => "alert-success",
				'type' => "Success"
		]);
		redirect('admin/reminders');
	}
}