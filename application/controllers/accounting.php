<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounting extends MY_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->lang->load('auth');
		$this->lang->load('general');
		$this->load->helper('language');
		if (!$this->basic_auth->is_login())
			redirect("admin", 'refresh');
		else
			$this->data['user'] = $this->basic_auth->user();
		$this->load->model('configurations_model');
		$this->load->model('request_model');
		$this->load->model('jobs_model');
		$this->load->model('calls_model');
		$this->data['configuration'] = get_configuration();
	}

	public function index(){
	    
		$this->data['css_type'] 	= array("form","datatable");
		$this->data['active_class'] = "Accounting";
		$this->data['gmaps'] 		= false;
		$this->data['title'] 		= $this->lang->line("accounting");
		$this->data['title_link'] 	= base_url('admin/accounting.php');
		$this->data['subtitle'] 	= "subtitle";
		$this->data['content'] 		= 'admin/accounting/index';
        $data = [];
		$this->data['data'] = $this->configurations_model->getAll(array('delete_bit' => 0));
	//	print_r($data);exit();
		$this->_render_page('templates/admin_template', $this->data);
	}

	public function add(){
		$this->data['css_type'] 	= array("form");
		$this->data['active_class'] = "configurations";
		$this->data['gmaps'] 	= false;
		$this->data['title'] 	= $this->lang->line("configurations");
		$this->data['title_link'] 	= base_url('admin/configurations.php');
		$this->data['subtitle'] = "Configurations";
		$this->data['content']  = 'admin/configurations/add';
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->addQuickReplies();
		}
		$this->_render_page('templates/admin_template', $this->data);
	}

	public function addQuickReplies(){
		$error = $this->configurations_model->quickreply_validate(true);
		if (empty($error)) {
			$id = $this->configurations_model->create([
				'name' 	=> @$_POST['name'],
				'created_at' 	=> date('Y-m-d'),
			]);
			$this->session->set_flashdata('alert', [
				'message' => "Successfully Created.",
				'class' => "alert-success",
				'type' => "Success"
			]);
			redirect('admin/configurations/'.$id.'/edit');
		} else {
			$this->data['alert'] = [
				'message' => @$error[0],
				'class' => "alert-danger",
				'type' => "Error"
			];
		}
	}

	public function edit($id){
		$this->data['data']	= $this->configurations_model->get(['id' => $id]);
		if($this->data['data'] != false) {
			$this->data['css_type'] = array("form");
			$this->data['active_class'] = "configurations";
			$this->data['gmaps'] 	= false;
			$this->data['title'] 	= $this->lang->line("configurations");
			$this->data['title_link'] 	= base_url('admin/configurations.php');
			$this->data['content']  = 'admin/configurations/edit';
			$this->_render_page('templates/admin_template', $this->data);
		} else show_404();
	}

	public function update($id){
		$error = $this->configurations_model->quickreply_validate(true);
		$con = $this->configurations_model->get(['id' => $id]);
		if($con != false) {
			if (empty($error)) {
				
				$this->configurations_model->update([
					'name' 	=> @$_POST['name'],
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

			redirect('admin/configurations/'.$id.'/edit');
		} else show_404();
	}

	public function delete($id){
		$this->configurations_model->delete($id);
		$this->session->set_flashdata('alert', [
				'message' => "Successfully deleted.",
				'class' => "alert-success",
				'type' => "Success"
		]);
		redirect('admin/configurations');
	}
}