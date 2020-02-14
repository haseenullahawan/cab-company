<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Settings1 extends MY_Controller

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
		$this->load->model('settings_model');
        $this->load->model('notes_model');
		$this->load->model('jobs_model');
		$this->load->model('calls_model');
		$this->load->model('request_model');
		$this->load->model('smtp_model');
		$this->load->model('notifications_model');
		$this->data['configuration'] = get_configuration();
	}

	public function edit($id){
		$this->data['data']	= $this->settings_model->get(['id' => $id]);
		if($this->data['data'] != false) {
			$this->data['css_type'] = array("form");
			$this->data['active_class'] = "settings";
			$this->data['gmaps'] 	= false;
			$this->data['title'] 	= $this->lang->line("settings");
			// $this->data['subtitle'] 	= $this->lang->line("callback");
			$this->data['title_link'] 	= '#';
			$this->data['content']  = 'admin/settings/index';
			$this->_render_page('templates/admin_template', $this->data);
		} else show_404();
	}

	public function update($id=1){
		$con = $this->settings_model->get(['id' => $id]);
		if($con != false) {
			$this->settings_model->update([
				'request_closing_days' 	=> @$_POST['request_closing_days'],
			], $id);

			$this->session->set_flashdata('alert', [
					'message' => "Successfully Updated.",
					'class' => "alert-success",
					'type' => "Success"
			]);

			//redirect('admin/settings/'.$id.'');
			redirect('admin/popups/1/edit');
		} else show_404();
	}
}