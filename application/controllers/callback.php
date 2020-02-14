<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Callback extends MY_Controller
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
		$this->load->model('callback_model');
		$this->load->model('request_model');
		$this->load->model('jobs_model');
		$this->load->model('calls_model');
		$this->load->model('support_model');
		$this->data['configuration'] = get_configuration();
	}


	public function edit($id){
		$this->data['data']	= $this->callback_model->get(['id' => $id]);
		if($this->data['data'] != false) {
			$this->data['css_type'] = array("form");
			$this->data['active_class'] = "callback";
			$this->data['gmaps'] 	= false;
			$this->data['title'] 	= $this->lang->line("configurations");
			$this->data['subtitle'] 	= $this->lang->line("callback");
			$this->data['title_link'] 	= '#';
			$this->data['content']  = 'admin/callback/edit';
			$this->_render_page('templates/admin_template', $this->data);
		} else show_404();
	}

	public function update($id){
		$error = $this->callback_model->callback_validate(true);
		$con = $this->callback_model->get(['id' => $id]);
		if($con != false) {
			if (empty($error)) {
				$this->callback_model->update([
					'status1' 	=> @$_POST['status1'],
					'name1' 	=> @$_POST['name1'],
					'host1' 	=> @$_POST['host1'],
					'call_from' 	=> @$_POST['call_from'],
					'call_to' 	=> @$_POST['call_to'],
					'auto_take_link' 	=> @$_POST['auto_take_line'],
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

			redirect('admin/callback/'.$id.'/edit');
		} else show_404();
	}
}