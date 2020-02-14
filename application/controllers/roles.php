<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Roles extends MY_Controller
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
		{
			redirect("admin", 'refresh');
		}
		else
		{
			$this->data['user'] = $this->basic_auth->user();
		}
		$this->load->model('roles_model');
		$this->load->model('request_model');
		$this->load->model('jobs_model');
		$this->load->model('support_model');
		$this->load->model('calls_model');

		$this->data['configuration'] = get_configuration();
	}

	public function index(){
		$this->data['css_type'] 	= array("form","datatable");
		$this->data['active_class'] = "roles";
		$this->data['gmaps'] 	= false;
		$this->data['title'] 	= 'Roles'; // $this->lang->line("calls");
		$this->data['title_link'] 	= base_url('admin/roles');
		$this->data['subtitle'] = NULL;
		$this->data['roles'] = $this->roles_model->getAll();
		$this->data['content']  = 'admin/roles/index';
		$this->_render_page('templates/admin_template', $this->data);
	}

	public function add(){
		$this->data['css_type'] 	= array("form");
		$this->data['active_class'] = "roles";
		$this->data['gmaps'] 	= false;
		$this->data['title'] 	= 'Roles'; // $this->lang->line("calls");
		$this->data['title_link'] 	= base_url('admin/roles');
		$this->data['subtitle'] = NULL;
		$this->data['content']  = 'admin/roles/add';
		$this->_render_page('templates/admin_template', $this->data);
	}

	public function save()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|is_unique[roles.name]');
		if ($this->form_validation->run() == FALSE)
        {
        	$this->session->set_flashdata('validation_errors', validation_errors());
        	redirect('admin/roles/add');
        }
        else
        {
        	$db_array = array(
        		'status' 		=> $this->input->post('status'),
        		'name' 			=> $this->input->post('name'),
				'role_view' => isset($_POST['role_view']) != false ? "yes" : "no",
				'role_add' => isset($_POST['role_add']) != false ? "yes" : "no",
				'role_edit' => isset($_POST['role_edit']) != false ? "yes" : "no",
				'role_delete' => isset($_POST['role_delete']) != false ? "yes" : "no"
        	);

        	$id = $this->roles_model->create($db_array);
        	$this->session->set_flashdata('alert', [
        			'message' 	=> "Role successfully added.",
        			'class' 	=> "alert-success",
        			'type' 		=> "Success"
        	]);
        	redirect('admin/roles/'.$id.'/edit');
        }
	}

	public function edit($id){
		$this->data['css_type'] 	= array("form");
		$this->data['active_class'] = "roles";
		$this->data['gmaps'] 	= false;
		$this->data['title'] 	= 'Roles'; // $this->lang->line("calls");
		$this->data['title_link'] 	= base_url('admin/roles');
		$this->data['row_data'] = $this->roles_model->get(['id' => $id]);
		$this->data['content']  = 'admin/roles/edit';
		$this->data['subtitle'] = create_timestamp_uid($this->data['row_data']['created_at'],$this->data['row_data']['id']);
		$this->_render_page('templates/admin_template', $this->data);
	}

	public function update($id){
		$id_data = $this->roles_model->get(['id' => $id]);
		if($id_data != false) {
			$this->form_validation->set_rules('name', 'Name', 'required|callback_role_check['.$id.']');
			if ($this->form_validation->run() == FALSE) {
	        	$this->session->set_flashdata('validation_errors', validation_errors());
	        	redirect('admin/roles/'.$id.'/edit');
	        } else {
	        	$db_array = array(
	        		'status' => $this->input->post('status'),
	        		'name' => $this->input->post('name'),
					'role_view' => isset($_POST['role_view']) != false ? "yes" : "no",
	        		'role_add' => isset($_POST['role_add']) != false ? "yes" : "no",
	        		'role_edit' => isset($_POST['role_edit']) != false ? "yes" : "no",
	        		'role_delete' => isset($_POST['role_delete']) != false ? "yes" : "no"
	        	);

	        	$this->roles_model->update($db_array,$id);
	        	$this->session->set_flashdata('alert', [
	        			'message' => "Role successfully updated.",
	        			'class' => "alert-success",
	        			'type' => "Success"
	        	]);
	        	redirect('admin/roles/'.$id.'/edit');
	        }
		} else {
			show_404();
		}
	}

	public function role_check($str,$id){
        if ($this->roles_model->validate_string('vbs_roles','name',$str,$id) === true) {
            $this->form_validation->set_message('role_check', $str.' is already exist');
            return FALSE;
        } else {
            return TRUE;
        }
    }

	public function delete($id){
		$this->roles_model->delete($id);

		$this->session->set_flashdata('alert', [
				'message' => "Role successfully deleted.",
				'class' => "alert-success",
				'type' => "Success"
		]);
		redirect('admin/roles');
	}
}