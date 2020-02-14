<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quick_replies extends MY_Controller
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
		$this->load->model('quick_replies_model');
		$this->load->model('request_model');
		$this->load->model('jobs_model');
		$this->load->model('calls_model');
		$this->load->model('support_model');
		
		$this->data['configuration'] = get_configuration();
	}

	public function index(){
		$this->data['css_type'] 	= array("form","datatable");
		$this->data['active_class'] = "quick_replies";
		$this->data['gmaps'] 		= false;
		$this->data['title'] 		= $this->lang->line("configurations");
		$this->data['subtitle'] 		= $this->lang->line("quick_replies");
		$this->data['title_link'] 	= '#';
		$this->data['content'] 		= 'admin/quick_replies/index';
        $data = [];
		$this->data['data'] = $this->quick_replies_model->getAll(array('delete_bit' => 0));
		$this->_render_page('templates/admin_template', $this->data);
	}

	public function add(){
		$this->data['css_type'] 	= array("form");
		$this->data['active_class'] = "quick_replies";
		$this->data['gmaps'] 	= false;
		$this->data['title'] 	= $this->lang->line("configurations");
		$this->data['title_link'] 	= '#';
		$this->data['subtitle'] = "Add Quick Reply";
		$this->data['content']  = 'admin/quick_replies/add';
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->addQuickReplies();
		}
		$this->_render_page('templates/admin_template', $this->data);
	}

	public function addQuickReplies(){
		$error = $this->quick_replies_model->quickreply_validate(true);
		if (empty($error)) {
			$message = isset($_POST['message_sentence']) ? $_POST['message_sentence'] : '';
			$id = $this->quick_replies_model->create([
				'name' 	=> @$_POST['name'],
				'status' 	=> @$_POST['status'],
				'module' 	=> @$_POST['module'],
				'message_sentence' => $message,
				'created_at' 	=> date('Y-m-d H:i:s'),
			]);
			$this->session->set_flashdata('alert', [
				'message' => "Successfully Created.",
				'class' => "alert-success",
				'type' => "Success"
			]);
			// redirect('admin/quick_replies/'.$id.'/edit');
			redirect('admin/quick_replies');
		} else {
			$this->data['alert'] = [
				'message' => @$error[0],
				'class' => "alert-danger",
				'type' => "Error"
			];
		}
	}

	public function edit($id){
		$this->data['data']	= $this->quick_replies_model->get(['id' => $id]);
		if($this->data['data'] != false) {
			$this->data['css_type'] = array("form");
			$this->data['active_class'] = "quick_replies";
			$this->data['gmaps'] 	= false;
			$this->data['title'] 	= $this->lang->line("configurations");
			$this->data['subtitle'] 	= 'Edit Quick Reply';
			$this->data['title_link'] 	= '#';
			$this->data['content']  = 'admin/quick_replies/edit';
			$this->_render_page('templates/admin_template', $this->data);
		} else show_404();
	}

	public function update($id){
		$error = $this->quick_replies_model->quickreply_validate(true);
		$con = $this->quick_replies_model->get(['id' => $id]);
		if($con != false) {
			if (empty($error)) {
				$message = isset($_POST['message_sentence']) ? $_POST['message_sentence'] : '';
				$this->quick_replies_model->update([
					'name' 	=> @$_POST['name'],
					'status' 	=> @$_POST['status'],
					'module' 	=> @$_POST['module'],
					'message_sentence' => $message,
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

			// redirect('admin/quick_replies/'.$id.'/edit');
			redirect('admin/quick_replies');
		} else show_404();
	}

	public function delete($id){
		$this->quick_replies_model->delete($id);
		$this->session->set_flashdata('alert', [
				'message' => "Successfully deleted.",
				'class' => "alert-success",
				'type' => "Success"
		]);
		redirect('admin/quick_replies');
	}
}