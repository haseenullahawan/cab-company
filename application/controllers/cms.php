<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cms extends MY_Controller



{

	function __construct()

	{

		parent::__construct();



		$this->load->library('form_validation');

		$this->load->helper('url');

		$this->lang->load('auth');

		$this->lang->load('general');

		$this->load->helper('language');

		$this->load->helper('validate');

		if (!$this->basic_auth->is_login())

			redirect("admin", 'refresh');

		else

			$this->data['user'] = $this->basic_auth->user();

		$this->load->model('request_model');

		$this->load->model('cms_model');

		$this->load->model('jobs_model');

		$this->load->model('support_model');

		$this->load->model('calls_model');

        $this->load->model('notes_model');

        $this->load->model('notifications_model');



		$this->data['configuration'] = get_configuration();

	}



	public function index(){



		$this->data['css_type'] 	= array("form","datatable");

		$this->data['active_class'] = "cms";

		$this->data['gmaps'] 		= false;

		$this->data['title'] 		= $this->lang->line("cms");

		$this->data['title_link'] 	= base_url('cms/index');

		$this->data['content'] 		= 'admin/cms/index';



        $this->load->model('calls_model');

        $this->load->model('request_model');

        $this->load->model('jobs_model');



        $data = [];
        
        $data['cms'] = $this->cms_model->getAll();

        //$data['bookings'] = $this->bookings_model->getAll();

        $data['jobs'] 	 = $this->jobs_model->getAll();

        $data['calls']   = $this->calls_model->getAll();

        $this->data['data'] = $this->cms_model->getAll();



		$this->_render_page('templates/admin_template', $this->data);

	}



	public function add(){

		$this->data['css_type'] 	= array("form");

		$this->data['active_class'] = "cms";

		$this->data['gmaps'] 	= false;

		$this->data['title'] 	= $this->lang->line("cms");

		$this->data['title_link'] = base_url('cms/add');

		$this->data['subtitle'] = "Add";

		$this->data['content']  = 'admin/cms/add';

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {

			$this->store();

		}

		$this->_render_page('templates/admin_template', $this->data);

	}



	public function store(){

			//$error = request_validate();

			if (empty($error)) {

				//$dob = to_unix_date(@$_POST['dob']);
                
				$id = $this->cms_model->create([

					'status' 		=> @$_POST['status'],

					'name' 	        => @$_POST['name'],

					'subject' 	    => @$_POST['subject'],

					'message' 		=> @$_POST['message']

			       	]);
				
				// echo $id; exit;



				$this->session->set_flashdata('alert', [

					'message' => "Successfully Created.",

					'class' => "alert-success",

					'type' => "Success"

				]);

				redirect('cms/edit/'.$id);

			} else {

				$this->data['alert'] = [

					'message' => @$error[0],

					'class' => "alert-danger",

					'type' => "Error"

				];

			}

	}



	public function edit($id){



		$this->data['data'] 		= $this->cms_model->get(['id' => $id]);



		if($this->data['data'] != false) {

			$this->data['css_type'] = array("form");

			$this->data['active_class'] = "cms";

			$this->data['gmaps'] = false;

			$this->data['title'] 	= $this->lang->line("cms");

			$this->data['title_link'] = base_url('cms/edit');

			$this->data['subtitle'] = create_timestamp_uid($this->data['data']->bookdate,$id);

			$this->data['content']  = 'admin/cms/edit';

			

			if($this->data['data']->unread != 0)

				$this->cms_model->update(['unread' => 0], $id);



			// if($this->data['data']->is_conformed == "pending")

			// 	$this->bookings_model->update(['is_conformed' => "Pending"], $id);

			

			$this->_render_page('templates/admin_template', $this->data);

		} else show_404();

	}



	public function update($id){

		$request = $this->cms_model->get(['id' => $id]);

		if($request != false) {

			//$error = request_validate();

			if (empty($error)) {

				//$dob = to_unix_date(@$_POST['dob']);

				$check = 1;

				if(@$_POST['status'] == "New"){

					$check = 1;

				}else if(@$_POST['status'] == "Pending"){

					$check = 2;

				}else if(@$_POST['status'] == "Replied"){

					$check = 3;

				}else{

					$check = 4;

				}

				$notifications = $this->notifications_model->get(array('status'=>$check, 'department'=>4, 'notification_status'=>1));

				if($notifications != null && !empty($notifications)){

					$MAIL = $this->smtp_model->get(array('id' => 1));

					$check = sendReply($request,$notifications->subject,$notifications->message,"",$MAIL,array(@$_POST['status']));

				}

				$this->cms_model->update([

						'name' 		=> @$_POST['name'],

						'subject' 	=> @$_POST['subject'],

						'message' 	=> @$_POST['message'],
						
						'status' 	=> @$_POST['status'],

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

			redirect('cms/edit/'.$id);

		} else show_404();

	}





	public function reply($id){

		$call = $this->cms_model->get(['id' => $id]);

		if($call != false) {

			$this->form_validation->set_rules('reply_subject', 'Subject', 'trim|xss_clean|min_length[0]|max_length[200]');

			$this->form_validation->set_rules('reply_message', 'Message', 'trim|xss_clean|min_length[0]|max_length[5000]');

			if ($this->form_validation->run() !== false) {



				$subject = isset($_POST['reply_subject']) ? $_POST['reply_subject'] : '';

				$message = isset($_POST['reply_message']) ? $_POST['reply_message'] : '';

				$check = sendReply($call,$subject,$message);



				if($check['status'] != false) {

					$this->cms_model->update(['last_action' => date('Y-m-d H:i:s')], $id);

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



			redirect('admin/request/'.$id.'/edit');

		} else show_404();

	}



	public function delete($id){

		$this->cms_model->delete($id);

		$this->session->set_flashdata('alert', [

				'message' => "Successfully deleted.",

				'class' => "alert-success",

				'type' => "Success"

		]);

		redirect('cms/index');

	}

}