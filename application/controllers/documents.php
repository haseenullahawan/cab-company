<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documents extends MY_Controller
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
		$this->load->model('notifications_model');
		$this->load->model('request_model');
		$this->load->model('jobs_model');
		$this->load->model('calls_model');
		$this->load->model('support_model');
		
		$this->data['configuration'] = get_configuration();
	}

	public function index(){
		$this->data['css_type'] 	= array("form","datatable");
		$this->data['active_class'] = "documents";
		$this->data['gmaps'] 		= false;
		$this->data['title'] 		= $this->lang->line("documents");
		$this->data['content'] 		= 'admin/documents/index';
        $data = [];
		$this->data['data'] = $this->notifications_model->getAll();
		$this->_render_page('templates/admin_template', $this->data);
	}

	public function add()
	{
		$this->data['css_type'] 	= array("form");
		$this->data['active_class'] = "documents";
		$this->data['gmaps'] 	= false;
		$this->data['title'] 	= $this->lang->line("documents");
		$this->data['subtitle'] 	= 'Add Documents';
		$this->data['title_link'] 	= site_url('admin/documents');
		$this->data['content']  = 'admin/documents/add';
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->addDocuments();
		}
		$this->_render_page('templates/admin_template', $this->data);
	}

	public function addDocuments()
	{
		$error = $this->notifications_model->notification_validate(true);
		if (empty($error)) {
			$message = isset($_POST['message']) ? $_POST['message'] : '';
			$id = $this->notifications_model->create([
				'document_status' 	=> @$_POST['document_status'],
				'name' 	=> @$_POST['name'],
				'status' 	=> @$_POST['status'],
				'department' => @$_POST['department'],
				'subject' => @$_POST['subject'],
				'send_copy_to_department_operator' => @$_POST['send_copy_to_department_operator'],
				'message' => $message,
				'created_at' 	=> date('Y-m-d H:i:s'),
			]);
			if($id == 0){
				$this->session->set_flashdata('alert', [
					'message' => "Record Already Exist.",
					'class' => "alert-danger",
					'type' => "Error"
				]);
				redirect('admin/documents/add');
			}else{
				$this->session->set_flashdata('alert', [
					'message' => "Successfully Created.",
					'class' => "alert-success",
					'type' => "Success"
				]);
			}
			
			redirect('admin/documents/'.$id.'/edit');
		} else {
			$this->data['alert'] = [
				'message' => @$error[0],
				'class' => "alert-danger",
				'type' => "Error"
			];
		}
	}
}