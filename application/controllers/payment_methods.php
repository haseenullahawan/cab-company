<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Payment_methods extends MY_Controller

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
		$this->load->model('pay_methods_model');
		$this->load->model('request_model');
		$this->load->model('jobs_model');
		$this->load->model('support_model');
		$this->load->model('calls_model');
        $this->load->model('notes_model');

		$this->data['configuration'] = get_configuration();
	}

	public function index(){
		$this->data['css_type'] 	= array("form","datatable");
		$this->data['active_class'] = "payment_methods";
		$this->data['gmaps'] 		= false;
		$this->data['title'] 		= "Payment Methods";
		$this->data['title_link'] 	= base_url('admin/payment_methods');
		$this->data['content'] 		= 'admin/payment_methods/index';

        $this->load->model('calls_model');
        $this->load->model('request_model');
        $this->load->model('jobs_model');

        $data = [];
        $data['request'] = $this->request_model->getAll();
        $data['jobs'] 	 = $this->jobs_model->getAll();
        $data['calls']   = $this->calls_model->getAll();

        $this->data['data'] = $this->pay_methods_model->getAll();
        //print_r($this->data);
		$this->_render_page('templates/admin_template', $this->data);
	}

	public function add(){
	    $data = [];
		$this->data['css_type'] 	= array("form");
		$this->data['active_class'] = "payment_methods";
		$this->data['gmaps'] 	= false;
		$this->data['title'] 	= "Payment Methods";
		$this->data['title_link'] = base_url('admin/payment_methods');
		//$this->data['subtitle'] = "Add";
		$this->data['content']  = 'admin/payment_methods/add';
// 		print_r($this->data['content']);
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->store();
		}
		$this->load->model('calls_model');
        $this->load->model('request_model');
        $this->load->model('jobs_model');
        $data = [];
        $data['request'] = $this->request_model->getAll();
        $data['jobs'] 	 = $this->jobs_model->getAll();
        $data['calls']   = $this->calls_model->getAll();
		$this->_render_page('templates/admin_template', $this->data);
	}

	public function store(){
		//	$error = request_validate();
			if (empty($error)) {
				//$dob = to_unix_date(@$_POST['dob']);
				$id = $this->pay_methods_model->create([
					'name' 		=> @$_POST['name']
				]);

				$this->session->set_flashdata('alert', [
					'message' => "Successfully Created.",
					'class' => "alert-success",
					'type' => "Success"
				]);
				redirect('admin/payment_methods/'.$id.'/edit');
			} else {
				$this->data['alert'] = [
					'message' => @$error[0],
					'class' => "alert-danger",
					'type' => "Error"
				];
			}
	}

	public function edit($id){

		$this->data['data'] 		= $this->pay_methods_model->get(['id' => $id]);
		if($this->data['data'] != false) {
			$this->data['css_type'] = array("form");
			$this->data['active_class'] = "payment_methods";
			$this->data['gmaps'] = false;
			$this->data['title'] 	= "Payment Methods";
			$this->data['title_link'] = base_url('admin/payment_methods');
			$this->data['subtitle'] = "update";
			$this->data['content']  = 'admin/payment_methods/edit';
			
// 			if($this->data['data']->unread != 0)
// 				$this->request_model->update(['unread' => 0], $id);

// 			if($this->data['data']->status == "New")
// 				$this->pay_methods_model->update(['Status' => "Pending"], $id);
		$this->load->model('calls_model');
        $this->load->model('request_model');
        $this->load->model('jobs_model');
        $data = [];
        $data['request'] = $this->request_model->getAll();
        $data['jobs'] 	 = $this->jobs_model->getAll();
        $data['calls']   = $this->calls_model->getAll();
        //print_r($this->data);exit(); 
			$this->_render_page('templates/admin_template', $this->data);
		} else show_404();
	}

	public function update($id){
		$request = $this->pay_methods_model->get(['id' => $id]);
		if($request != false) {
			//$error = request_validate();
			if (empty($error)) {
				//$dob = to_unix_date(@$_POST['dob']);
				$this->pay_methods_model->update([
					'name' 		=> @$_POST['name']
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
			redirect('admin/payment_methods/'.$id.'/edit');
		} else show_404();
	}


	public function reply($id){
		$call = $this->request_model->get(['id' => $id]);
		if($call != false) {
			$this->form_validation->set_rules('reply_subject', 'Subject', 'trim|xss_clean|min_length[0]|max_length[200]');
			$this->form_validation->set_rules('reply_message', 'Message', 'trim|xss_clean|min_length[0]|max_length[5000]');
			if ($this->form_validation->run() !== false) {

				$subject = isset($_POST['reply_subject']) ? $_POST['reply_subject'] : '';
				$message = isset($_POST['reply_message']) ? $_POST['reply_message'] : '';
				$check = sendReply($call,$subject,$message);

				if($check['status'] != false) {
					$this->request_model->update(['last_action' => date('Y-m-d H:i:s')], $id);
					$this->session->set_flashdata('alert', [
						'message' => "Successfully Reply Sent.",
						'class' => "alert-success",
						'type' => "Success"
					]);
				} else
					$this->session->set_flashdata('alert', [
							'message' => $check['message'],
							'class' => "alert-danger",
							'type' => "Danger"
					]);
			} else {
				$validator['messages'] = "";
				foreach ($_POST as $key => $inp) {
					if(form_error($key) != false){
						$this->session->set_flashdata('alert', [
								'message' => form_error($key,"<span>","</span>"),
								'class' => "alert-danger",
								'type' => "Danger"
						]);
						break;
					}
				}
			}

			redirect('admin/payment_methods/'.$id.'/edit');
		} else show_404();
	}

	public function delete($id){
		$this->pay_methods_model->delete($id);
		$this->session->set_flashdata('alert', [
				'message' => "Successfully deleted.",
				'class' => "alert-success",
				'type' => "Success"
		]);
		redirect('admin/payment_methods');
	}
}