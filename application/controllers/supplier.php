<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Supplier extends MY_Controller

{
	function __construct()
	{
		parent::__construct();
        
        
        
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->lang->load('auth');
		$this->lang->load('general');
		$this->load->helper('language');
		$this->load->helper('accounting_helper');
		if (!$this->basic_auth->is_login())
			redirect("admin", 'refresh');
		else
			$this->data['user'] = $this->basic_auth->user();
		$this->load->model('supplier_model');
		$this->load->model('request_model');
		$this->load->model('jobs_model');
		$this->load->model('support_model');
		$this->load->model('calls_model');
        $this->load->model('notes_model');

		$this->data['configuration'] = get_configuration();
	}

	public function index(){
		$this->data['css_type'] 	= array("form","datatable");
		$this->data['active_class'] = "supplier";
		$this->data['gmaps'] 		= false;
		$this->data['title'] 		= "Supplier";
		$this->data['title_link'] 	= base_url('admin/supplier');
		$this->data['content'] 		= 'admin/supplier/index';

        $this->load->model('calls_model');
        $this->load->model('request_model');
        $this->load->model('jobs_model');

        $data = [];
        $data['request'] = $this->request_model->getAll();
        $data['jobs'] 	 = $this->jobs_model->getAll();
        $data['calls']   = $this->calls_model->getAll();

        $this->data['data'] = $this->supplier_model->getAll();
        //print_r($this->data);
		$this->_render_page('templates/admin_template', $this->data);
	}

	public function add(){
	    $data = [];
		$this->data['css_type'] 	= array("form");
		$this->data['active_class'] = "supplier";
		$this->data['gmaps'] 	= false;
		$this->data['title'] 	= "Supplier";
		$this->data['title_link'] = base_url('admin/supplier');
		//$this->data['subtitle'] = "Add";
		$this->data['content']  = 'admin/supplier/add';
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
				$id = $this->supplier_model->create([
					'civility' 		=> @$_POST['civility'],
					'first_name' 	=> @$_POST['first_name'],
					'last_name' 	=> @$_POST['last_name'],
					'email' 		=> @$_POST['email'],
					'phone'     	=> @$_POST['phone'],
					'fax'     	=> @$_POST['fax'],
					'delay' 	=> @$_POST['delay'],
					'VAT' 		=> @$_POST['VAT'],
					//'amount'     	=> @$_POST['amount'],
					//'to_pay' 		=> @$_POST['to_pay'],
					'reccurency' 		=> @$_POST['reccurency'],
					//'invoice_number' 		=> @$_POST['invoice_number'],
					'category'     	=> @$_POST['category'],
					//'invoice_date' 		=> @$_POST['invoice_date'],
					'period' 		=> @$_POST['period'],
					'status' 		=> @$_POST['status'],
					'payment_method_id' 	=> @$_POST['payment_method_id'],
					'ip_address'	=> $this->input->ip_address()
				]);

				$this->session->set_flashdata('alert', [
					'message' => "Successfully Created.",
					'class' => "alert-success",
					'type' => "Success"
				]);
				redirect('admin/supplier/'.$id.'/edit');
			} else {
				$this->data['alert'] = [
					'message' => @$error[0],
					'class' => "alert-danger",
					'type' => "Error"
				];
			}
	}

	public function edit($id){

		$this->data['data'] 		= $this->supplier_model->get(['id' => $id]);
		if($this->data['data'] != false) {
			$this->data['css_type'] = array("form");
			$this->data['active_class'] = "supllier";
			$this->data['gmaps'] = false;
			$this->data['title'] 	= "Supplier";
			$this->data['title_link'] = base_url('admin/supplier');
			$this->data['subtitle'] = "update";
			$this->data['content']  = 'admin/supplier/edit';
			
// 			if($this->data['data']->unread != 0)
// 				$this->request_model->update(['unread' => 0], $id);

// 			if($this->data['data']->status == "New")
// 				$this->supplier_model->update(['Status' => "Pending"], $id);
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
		$request = $this->supplier_model->get(['id' => $id]);
		if($request != false) {
			//$error = request_validate();
			if (empty($error)) {
				//$dob = to_unix_date(@$_POST['dob']);
				$this->supplier_model->update([
				// 		'civility' 		=> @$_POST['civility'],
				// 		'first_name' 	=> @$_POST['first_name'],
				// 		'last_name' 	=> @$_POST['last_name'],
						'email' 		=> @$_POST['email'],
						'phone' 	=> @$_POST['phone'],
						'fax'     	=> @$_POST['fax'],
					'delay' 	=> @$_POST['delay'],
					'VAT' 		=> @$_POST['VAT'],
					//'amount'     	=> @$_POST['amount'],
					//'to_pay' 		=> @$_POST['to_pay'],
					'reccurency' 		=> @$_POST['reccurency'],
					//'invoice_number' 		=> @$_POST['invoice_number'],
					'category'     	=> @$_POST['category'],
					//'invoice_date' 		=> @$_POST['invoice_date'],
					'period' 		=> @$_POST['period'],
					'status' 		=> @$_POST['status'],
					'payment_method_id' 	=> @$_POST['payment_method_id'],
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
			redirect('admin/supplier/'.$id.'/edit');
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

			redirect('admin/supplier/'.$id.'/edit');
		} else show_404();
	}

	public function delete($id){
		$this->supplier_model->delete($id);
		$this->session->set_flashdata('alert', [
				'message' => "Successfully deleted.",
				'class' => "alert-success",
				'type' => "Success"
		]);
		redirect('admin/supplier');
	}
}