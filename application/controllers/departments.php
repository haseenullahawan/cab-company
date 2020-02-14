<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Departments extends MY_Controller
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
		$this->load->model('department_model');
		$this->load->model('request_model');
		$this->load->model('jobs_model');
		$this->load->model('support_model');
		$this->load->model('calls_model');

		$this->data['configuration'] = get_configuration();
	}

	public function index(){
		$this->data['css_type'] 	= array("form","datatable");
		$this->data['active_class'] = "departments";
		$this->data['gmaps'] 	= false;
		$this->data['title'] 	= 'Departments'; // $this->lang->line("calls");
		$this->data['title_link'] 	= base_url('admin/departments');
		// $this->data['subtitle'] = "Update";
		$this->data['departments'] = $this->department_model->getAll();
		$this->data['modules'] = $this->department_model->getModules();
		$this->data['content']  = 'admin/department/index';
		$this->_render_page('templates/admin_template', $this->data);
	}

	public function add(){
		$this->data['css_type'] 	= array("form");
		$this->data['active_class'] = "departments";
		$this->data['gmaps'] 	= false;
		$this->data['title'] 	= 'Department'; // $this->lang->line("calls");
		$this->data['title_link'] 	= base_url('admin/departments');
		// $this->data['subtitle'] = "Add";
		$this->data['modules'] = $this->department_model->getModules();
		$this->data['content']  = 'admin/department/add';
		$this->_render_page('templates/admin_template', $this->data);
	}

	public function save()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|is_unique[departments.name]');
		//$this->form_validation->set_rules('description', 'Description', 'required');
		if ($this->form_validation->run() == FALSE) {
        	$this->session->set_flashdata('validation_errors', validation_errors());
        	redirect('admin/departments/add');
        } else {
			$modules = isset($_POST['module']) ? $this->input->post('module') : [];
	    	$db_array = array(
	    		'status' => $this->input->post('status'),
	    		'name' => $this->input->post('name'),
				'description' => isset($_POST['description']) ? $this->input->post('description') : '',
	    		'modules' => json_encode($modules),
	    	);

	    	$id = $this->department_model->create($db_array);
	    	$this->session->set_flashdata('alert', [
	    			'message' => "Department successfully added.",
	    			'class' => "alert-success",
	    			'type' => "Success"
	    	]);

	    	redirect('admin/departments/'.$id.'/edit');
        }
	}

	public function edit($id){
		$this->data['css_type'] 	= array("form");
		$this->data['active_class'] = "departments";
		$this->data['gmaps'] 	= false;
		$this->data['title'] 	= 'Department'; // $this->lang->line("calls");
		$this->data['title_link'] 	= base_url('admin/departments');
		$row_data = $this->department_model->get(['id' => $id]);

		if(empty($row_data['modules'])){
			$row_modules = array();
		} else {
			$row_modules = json_decode($row_data['modules'],true);
		}

		$this->data['row_data'] = $row_data;
		$this->data['row_modules'] = $row_modules;
		$this->data['modules'] = $this->department_model->getModules();
		$this->data['subtitle'] = create_timestamp_uid($row_data['created_at'],$row_data['id']);
		$this->data['content']  = 'admin/department/edit';
		$this->_render_page('templates/admin_template', $this->data);
	}

	public function update($id){
		$id_data = $this->department_model->get(['id' => $id]);
		if($id_data != false) {
			$this->form_validation->set_rules('name', 'Name', 'required|callback_dep_check['.$id.']');
			//$this->form_validation->set_rules('description', 'Description', 'required');
			if ($this->form_validation->run() == FALSE) {
	        	$this->session->set_flashdata('validation_errors', validation_errors());
	        	redirect('admin/departments/'.$id.'/edit');
	        } else {
				$modules = isset($_POST['module']) ? $this->input->post('module') : [];
	        	$db_array = array(
	        		'status' => $this->input->post('status'),
	        		'name' => $this->input->post('name'),
	        		'description' => isset($_POST['description']) ? $this->input->post('description') : '',
	        		'modules' => json_encode($modules),
	        	);

	        	$this->department_model->update($db_array,$id);
	        	$this->session->set_flashdata('alert', [
	        			'message' => "Department successfully updated.",
	        			'class' => "alert-success",
	        			'type' => "Success"
	        	]);
	        	redirect('admin/departments/'.$id.'/edit');
	        }
		} else {
			show_404();
		}
	}

	public function dep_check($str,$id)
    {
        if ($this->department_model->validate_string('vbs_departments','name',$str,$id) === true) {
            $this->form_validation->set_message('dep_check', $str.' is already exist');
            return FALSE;
        } else {
            return TRUE;
        }
    }

	public function delete($id){
		$this->department_model->delete($id);

		$this->session->set_flashdata('alert', [
				'message' => "Department successfully deleted.",
				'class' => "alert-success",
				'type' => "Success"
		]);
		redirect('admin/departments');
	}
}