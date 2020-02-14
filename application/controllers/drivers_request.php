<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Drivers_request extends MY_Controller



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

		$this->load->model('bookings_model');

		$this->load->model('request_model');

		$this->load->model('driver_request_model');

		$this->load->model('jobs_model');

		$this->load->model('support_model');

		$this->load->model('calls_model');

        $this->load->model('notes_model');

        $this->load->model('notifications_model');

		

		$this->data['configuration'] = get_configuration();

	}



	public function index(){


		$this->data['css_type'] 	= array("form","datatable");

		$this->data['active_class'] = "drivers_requests";

		$this->data['gmaps'] 		= false;

		$this->data['title'] 		= "Drivers Requests";

		$this->data['title_link'] 	= base_url('admin/drivers_requests');

		$this->data['content'] 		= 'admin/drivers_request/index';



        $this->load->model('calls_model');

        $this->load->model('request_model');

        $this->load->model('jobs_model');



        $data = [];

        $data['driver_request'] = $this->driver_request_model->getAll();

        // $data['jobs'] 	 = $this->jobs_model->getAll();

        // $data['calls']   = $this->calls_model->getAll();

        $this->data['data'] = $this->driver_request_model->getAll();



		$this->_render_page('templates/admin_template', $this->data);

	}



	public function add(){

			$this->data['css_type'] 	= array("form");

			$this->data['active_class'] = "drivers_requests";

			$this->data['gmaps'] 	= false;

			$this->data['title'] 	= "Driver Requests";

			$this->data['title_link'] = base_url('admin/drivers_requests');

			$this->data['subtitle'] = "Add";

			$this->data['content']  = 'admin/drivers_request/add';
			$user =  $this->db->query("SELECT  * FROM vbs_users WHERE  id = 1");

			$get_user = $user->row();
			// $this->data['user'] = $this->driver_request_model->getuser();

			// echo "<pre>";
			// print_r($this->basic_auth->is_login());
			// exit;
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {

			$this->store();

		}

		$this->_render_page('templates/admin_template', $this->data);

	}

	public function absence_request_store(){
		
		$error = absence_request_validate();
		
			if (empty($error)) {

				// $dob = to_unix_date(@$_POST['dob']);
				// print_r($_FILES);
				// exit;
				
				$id = $this->driver_request_model->create([

					'request_type' 		=> 1,

					'status' 		=> @$_POST['status'],

					'from_date' 	=> @$_POST['from_date'],

					'from_morning' 	=> @$_POST['from_morning'],

					'to_date' 		=> @$_POST['to_date'],

					'to_morning' 	=> @$_POST['to_morning'],

					'from_month' 	=> "",

					'to_month' 		=> "",

					'comment' 		=> @$_POST['comment'],

					'date' 			=> date("Y-m-d"),

					'paid_amount'	=> 0,

					'payment_method'=> 0,

					'rest_due' 		=> 0,

					'amount' 		=> 0,

					'time' 			=> time(),

					'notes_time' 	=> 0,

					'notes_category'=> 0,

					'text'			=> @$_POST['text'],

					'driver_name'			=> @$_POST['driver_name'],

				]);


				$filename = "";

				if($_FILES['attachment']['name'][0]!=''){
					$this->load->library('upload');
					$files = $_FILES;
					$aantal = count($_FILES['attachment']['name']);

					for($i=0; $i<$aantal; $i++)
					{
						$_FILES['attachment']['name']= $files['attachment']['name'][$i];
						$_FILES['attachment']['type']= $files['attachment']['type'][$i];
						$_FILES['attachment']['tmp_name']= $files['attachment']['tmp_name'][$i];
						$_FILES['attachment']['error']= $files['attachment']['error'][$i];
						$_FILES['attachment']['size']= $files['attachment']['size'][$i];    

						$tmpFilePath = $_FILES['attachment']['tmp_name'];
						
						$filename = time() . '_' .$_FILES['attachment']['name'];

						//Make sure we have a file path
						if ($tmpFilePath != ""){
							//Setup our new file path
							$newFilePath = "./uploads/drivers_request/" . $filename;

							//Upload the file into the temp dir
							if(move_uploaded_file($tmpFilePath, $newFilePath)) {
								$inputdata1 = array(
												'driver_request_id' => $id,
												'attachments' => $filename,
											);
								$this->driver_request_model->insert_operation($inputdata1, 'driver_request_attachments');
								// $this->driver_request_model->update([
								// 	'files' 		=> $filename,
								// ], $id);
							}
						}else{
							$filename = "";
						}
					
					}
				}

				$this->session->set_flashdata('alert', [

					'message' => "Successfully Created.",

					'class' => "alert-success",

					'type' => "Success"

				]);

				redirect('admin/drivers_requests');

			} else {

				$this->data['alert'] = [

					'message' => @$error[0],

					'class' => "alert-danger",

					'type' => "Error"

				];

			}
	}



	public function vacation_request_store(){
		
		$error = vacation_request_validate();

			if (empty($error)) {

				// $dob = to_unix_date(@$_POST['dob']);

				$id = $this->driver_request_model->create([

					'request_type' 		=> 2,

					'status' 		=> @$_POST['status'],

					'from_date' 	=> @$_POST['from_date'],

					'from_morning' 	=> @$_POST['from_morning'],

					'to_date' 		=> @$_POST['to_date'],

					'to_morning' 	=> @$_POST['to_morning'],

					'from_month' 	=> "",

					'to_month' 		=> "",

					'comment' 		=> @$_POST['comment'],

					'date' 			=> date("Y-m-d"),

					'paid_amount'	=> 0,

					'payment_method'=> 0,

					'rest_due' 		=> 0,

					'amount' 		=> 0,

					'time' 			=> time(),

					'notes_time' 	=> 0,

					'notes_category'=> 0,

					'text'			=> @$_POST['text'],

					'driver_name'			=> @$_POST['driver_name'],

				]);

				$filename = "";
				if($_FILES['attachment']['name'][0]!=''){

					$this->load->library('upload');
					$files = $_FILES;
					$aantal = count($_FILES['attachment']['name']);
					for($i=0; $i<$aantal; $i++)
					{
						$_FILES['attachment']['name']= $files['attachment']['name'][$i];
						$_FILES['attachment']['type']= $files['attachment']['type'][$i];
						$_FILES['attachment']['tmp_name']= $files['attachment']['tmp_name'][$i];
						$_FILES['attachment']['error']= $files['attachment']['error'][$i];
						$_FILES['attachment']['size']= $files['attachment']['size'][$i];    

						$tmpFilePath = $_FILES['attachment']['tmp_name'];
						
						$filename = time() . '_' .$_FILES['attachment']['name'];
						
						//Make sure we have a file path
						if ($tmpFilePath != ""){
							//Setup our new file path
							$newFilePath = "./uploads/drivers_request/" . $filename;

							//Upload the file into the temp dir
							if(move_uploaded_file($tmpFilePath, $newFilePath)) {
								$inputdata1 = array(
									'driver_request_id' => $id,
									'attachments' => $filename,
								);
					$this->driver_request_model->insert_operation($inputdata1, 'driver_request_attachments');
								// $this->driver_request_model->update([
								// 	'files' 		=> $filename,
								// ], $id);
							}
						}else{
							$filename = "";
						}
					
					}
					
				}

				
				$this->session->set_flashdata('alert', [
	
					'message' => "Successfully Created.",

					'class' => "alert-success",

					'type' => "Success"

				]);

				redirect('admin/drivers_requests');

			} else {

				$this->session->set_flashdata('alert', [
	
					'message' => @$error[0],

					'class' => "alert-danger",

					'type' => "Error"

				]);
				redirect('admin/drivers_requests/add');


			}
	}


	public function salary_request_store(){
		
		$error = salary_request_validate();

			if (empty($error)) {

				// $dob = to_unix_date(@$_POST['dob']);

				$id = $this->driver_request_model->create([

					'request_type' 	=> 3,

					'status' 		=> @$_POST['status'],

					'from_date' 	=> 0,

					'from_morning' 	=> 0,

					'to_date' 		=> 0,

					'to_morning' 	=> 0,

					'from_month' 	=> @$_POST['from_month'],

					'to_month' 		=> @$_POST['to_month'],

					'comment' 		=> @$_POST['comment'],

					'date' 			=> date("Y-m-d"),

					'paid_amount'	=> @$_POST['paid_by_driver'],

					'payment_method'=> @$_POST['payment_method'],

					'rest_due' 		=> @$_POST['rest_due'],

					'amount' 		=> @$_POST['amount'],

					'time' 			=> time(),

					'notes_time' 	=> 0,

					'notes_category'=> "",

					'time_deduce'=> @$_POST['time_deduce'],

					'text'			=> @$_POST['text'],

					'driver_name'	=> @$_POST['driver_name'],
					
					'paid_by_employee'	=> @$_POST['amount'],

					'paid_by_driver'	=> @$_POST['paid_by_driver'],

				]);

				$filename = "";
				if($_FILES['attachment']['name'][0]!=''){

					$this->load->library('upload');
					$files = $_FILES;
					$aantal = count($_FILES['attachment']['name']);
					for($i=0; $i<$aantal; $i++)
					{
						$_FILES['attachment']['name']= $files['attachment']['name'][$i];
						$_FILES['attachment']['type']= $files['attachment']['type'][$i];
						$_FILES['attachment']['tmp_name']= $files['attachment']['tmp_name'][$i];
						$_FILES['attachment']['error']= $files['attachment']['error'][$i];
						$_FILES['attachment']['size']= $files['attachment']['size'][$i];    

						$tmpFilePath = $_FILES['attachment']['tmp_name'];
						
						$filename = time() . '_' .$_FILES['attachment']['name'];
						
						//Make sure we have a file path
						if ($tmpFilePath != ""){
							//Setup our new file path
							$newFilePath = "./uploads/drivers_request/" . $filename;

							//Upload the file into the temp dir
							if(move_uploaded_file($tmpFilePath, $newFilePath)) {
								$inputdata1 = array(
									'driver_request_id' => $id,
									'attachments' => $filename,
								);
					$this->driver_request_model->insert_operation($inputdata1, 'driver_request_attachments');
								// $this->driver_request_model->update([
								// 	'files' 		=> $filename,
								// ], $id);
							}
						}else{
							$filename = "";
						}
					
					}
					
				}

				
				$this->session->set_flashdata('alert', [
	
					'message' => "Successfully Created.",

					'class' => "alert-success",

					'type' => "Success"

				]);

				redirect('admin/drivers_requests');

			} else {

				$this->session->set_flashdata('alert', [
	
					'message' => @$error[0],

					'class' => "alert-danger",

					'type' => "Error"

				]);
				redirect('admin/drivers_requests/add');


			}
	}


	public function notes_request_store(){
		// echo strtotime(@$_POST['time']);exit;
		$error = notes_request_validate();

			if (empty($error)) {

				// $dob = to_unix_date(@$_POST['dob']);

				$id = $this->driver_request_model->create([

					'request_type' 	=> 4,

					'status' 		=> @$_POST['status'],

					'from_date' 	=> 0,

					'from_morning' 	=> 0,

					'to_date' 		=> 0,

					'to_morning' 	=> 0,

					'from_month' 	=> "",

					'to_month' 		=> "",

					'comment' 		=> @$_POST['comment'],

					'date' 			=> date("Y-m-d"),

					'paid_amount'	=> @$_POST['notes_paid_amount'],

					'payment_method'=> @$_POST['payment_method'],

					'rest_due' 		=> @$_POST['notes_rest_due'],

					'amount' 		=> @$_POST['notes_amount'],

					'time' 			=> time(),

					'notes_time' 	=> @$_POST['time'],

					'notes_category'=> @$_POST['category'],

					'text'			=> @$_POST['text'],

					'driver_name'			=> @$_POST['driver_name'],

					'payment_date'			=> @$_POST['payment_date'],

					'paid_by_employee'	=> @$_POST['notes_paid_amount'],

					'paid_by_driver'	=> @$_POST['notes_paid_amount'],

				]);

				$filename = "";
				if($_FILES['attachment']['name'][0]!=''){

					$this->load->library('upload');
					$files = $_FILES;
					$aantal = count($_FILES['attachment']['name']);
					for($i=0; $i<$aantal; $i++)
					{
						$_FILES['attachment']['name']= $files['attachment']['name'][$i];
						$_FILES['attachment']['type']= $files['attachment']['type'][$i];
						$_FILES['attachment']['tmp_name']= $files['attachment']['tmp_name'][$i];
						$_FILES['attachment']['error']= $files['attachment']['error'][$i];
						$_FILES['attachment']['size']= $files['attachment']['size'][$i];    

						$tmpFilePath = $_FILES['attachment']['tmp_name'];
						
						$filename = time() . '_' .$_FILES['attachment']['name'];
						
						//Make sure we have a file path
						if ($tmpFilePath != ""){
							//Setup our new file path
							$newFilePath = "./uploads/drivers_request/" . $filename;

							//Upload the file into the temp dir
							if(move_uploaded_file($tmpFilePath, $newFilePath)) {
									$inputdata1 = array(
										'driver_request_id' => $id,
										'attachments' => $filename,
									);
						$this->driver_request_model->insert_operation($inputdata1, 'driver_request_attachments');
								// $this->driver_request_model->update([
								// 	'files' 		=> $filename,
								// ], $id);
							}
						}else{
							$filename = "";
						}
					
					}
					
				}

				
				$this->session->set_flashdata('alert', [
	
					'message' => "Successfully Created.",

					'class' => "alert-success",

					'type' => "Success"

				]);

				redirect('admin/drivers_requests');

			} else {

				$this->session->set_flashdata('alert', [
	
					'message' => @$error[0],

					'class' => "alert-danger",

					'type' => "Error"

				]);
				redirect('admin/drivers_requests/add');


			}
	}


	public function edit($id){

		$this->data['data'] 		= $this->driver_request_model->get(['id' => $id]);


		if($this->data['data'] != false) {

			$this->data['css_type'] = array("form");

			$this->data['active_class'] = "drivers_requests";

			$this->data['gmaps'] = false;

			$this->data['title'] 	= "Drivers Requests";

			$this->data['title_link'] = base_url('admin/drivers_requests');

			// $this->data['subtitle'] = create_timestamp_uid($this->data['data']->bookdate,$id);
			$this->data['content']  = 'admin/drivers_request/edit';
			

			$this->_render_page('templates/admin_template', $this->data);

		} else show_404();

	}


	public function absence_vacation_update($id){

		$driver_request = $this->driver_request_model->get(['id' => $id]);

		if($driver_request != false) {

			// $error = request_validate();

			if (empty($error)) {

				//$dob = to_unix_date(@$_POST['dob']);

				// $check = 1;

				// if(@$_POST['status'] == "New"){

				// 	$check = 1;

				// }else if(@$_POST['status'] == "Pending"){

				// 	$check = 2;

				// }else if(@$_POST['status'] == "Replied"){

				// 	$check = 3;

				// }else{

				// 	$check = 4;

				// }

				// $notifications = $this->notifications_model->get(array('status'=>$check, 'department'=>4, 'notification_status'=>1));

				// if($notifications != null && !empty($notifications)){

				// 	$MAIL = $this->smtp_model->get(array('id' => 1));

				// 	$check = sendReply($request,$notifications->subject,$notifications->message,"",$MAIL,array(@$_POST['status']));

				// }

				$filename = "";
				if($_FILES['attachment']['name'][0]!=''){

					$this->load->library('upload');
					$files = $_FILES;
					$aantal = count($_FILES['attachment']['name']);
					for($i=0; $i<$aantal; $i++)
					{
						$_FILES['attachment']['name']= $files['attachment']['name'][$i];
						$_FILES['attachment']['type']= $files['attachment']['type'][$i];
						$_FILES['attachment']['tmp_name']= $files['attachment']['tmp_name'][$i];
						$_FILES['attachment']['error']= $files['attachment']['error'][$i];
						$_FILES['attachment']['size']= $files['attachment']['size'][$i];    

						$tmpFilePath = $_FILES['attachment']['tmp_name'];
						
						$filename = time() . '_' .$_FILES['attachment']['name'];
						
						//Make sure we have a file path
						if ($tmpFilePath != ""){
							//Setup our new file path
							$newFilePath = "./uploads/drivers_request/" . $filename;

							//Upload the file into the temp dir
							if(move_uploaded_file($tmpFilePath, $newFilePath)) {
									$inputdata1 = array(
										'driver_request_id' => $id,
										'attachments' => $filename,
									);
						$this->driver_request_model->insert_operation($inputdata1, 'driver_request_attachments');
								// $this->driver_request_model->update([
								// 	'files' 		=> $filename,
								// ], $id);
							}
						}else{
							$filename = "";
						}
					
					}
					
				}

				$this->driver_request_model->update([

						'status' 		=> @$_POST['status'],

						'comment' 		=> @$_POST['comment'],
	
						'text'			=> @$_POST['text'],

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

			redirect('admin/drivers_requests/'.$id.'/edit');

		} else show_404();

	}



	public function salary_notes_update($id){

		$driver_request = $this->driver_request_model->get(['id' => $id]);

		if($driver_request != false) {

			// $error = request_validate();
			$check = @$_POST['status'];
			// $notifications = $this->notifications_model->get(array('status'=>$check, 'department'=>4, 'notification_status'=>1));

			// if($notifications != null && !empty($notifications)){

			// 	$MAIL = $this->smtp_model->get(array('id' => 1));

			// 	$check = sendReply($request,$notifications->subject,$notifications->message,"",$MAIL,array(@$_POST['status']));

			// }
			if (empty($error)) {
				// echo $paid_by_driver;exit;
				// 4 notes
				if($driver_request->request_type == 4){
					$due = @$_POST['notes_rest_due'];
					
					$this->driver_request_model->update([

						'amount' 		=> @$_POST['amount'],
	
						'rest_due' 		=> @$due,
	
						'status' 		=> @$_POST['status'],
	
						'comment' 		=> @$_POST['comment'],
		
						'text'			=> @$_POST['text'],
	
						'paid_by_driver'=> @$paid_by_driver,
	
						'paid_by_employee'	=> @$_POST['notes_paid_amount'],
	
						'paid_amount'	=> @$_POST['notes_paid_amount'],
	
						'payment_method'=> @$_POST['payment_method'],
	
						'notes_category'		=> @$_POST['category'],
	
						'payment_date'			=> @$_POST['payment_date'],
	
					], $id);
				}else{
					$check = $driver_request->paid_by_driver + $_POST['per_month'];
					if($check < $driver_request->paid_by_employee){
						$paid_by_driver = $driver_request->paid_by_driver + $_POST['per_month'];
						$due = @$_POST['rest_due'] - $driver_request->paid_by_driver;
						
					}else{
						$paid_by_driver = $driver_request->paid_by_driver;
						$due = 0;
						// echo "ssss";exit;
					}
					// echo $due;
					// exit;
					$this->driver_request_model->update([

						'amount' 		=> @$_POST['amount'],
	
						'rest_due' 		=> @$due,
	
						'status' 		=> @$_POST['status'],
	
						'comment' 		=> @$_POST['comment'],
		
						'text'			=> @$_POST['text'],
	
						'paid_by_driver'=> @$paid_by_driver,
	
					], $id);
				}



				$filename = "";
				if($_FILES['attachment']['name'][0]!=''){

					$this->load->library('upload');
					$files = $_FILES;
					$aantal = count($_FILES['attachment']['name']);
					for($i=0; $i<$aantal; $i++)
					{
						$_FILES['attachment']['name']= $files['attachment']['name'][$i];
						$_FILES['attachment']['type']= $files['attachment']['type'][$i];
						$_FILES['attachment']['tmp_name']= $files['attachment']['tmp_name'][$i];
						$_FILES['attachment']['error']= $files['attachment']['error'][$i];
						$_FILES['attachment']['size']= $files['attachment']['size'][$i];    

						$tmpFilePath = $_FILES['attachment']['tmp_name'];
						
						$filename = time() . '_' .$_FILES['attachment']['name'];
						
						//Make sure we have a file path
						if ($tmpFilePath != ""){
							//Setup our new file path
							$newFilePath = "./uploads/drivers_request/" . $filename;

							//Upload the file into the temp dir
							if(move_uploaded_file($tmpFilePath, $newFilePath)) {
									$inputdata1 = array(
										'driver_request_id' => $id,
										'attachments' => $filename,
									);
						$this->driver_request_model->insert_operation($inputdata1, 'driver_request_attachments');
								// $this->driver_request_model->update([
								// 	'files' 		=> $filename,
								// ], $id);
							}
						}else{
							$filename = "";
						}
					
					}
					
				}



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

			redirect('admin/drivers_requests/'.$id.'/edit');

		} else show_404();

	}


	public function search(){

		$this->data['css_type'] 	= array("form","datatable");

		$this->data['active_class'] = "drivers_requests";

		$this->data['gmaps'] 		= false;

		$this->data['title'] 		= "Drivers Requests";

		$this->data['title_link'] 	= base_url('admin/drivers_requests');

		$this->data['content'] 		= 'admin/drivers_request/search';



        $this->load->model('calls_model');

        $this->load->model('request_model');

        $this->load->model('jobs_model');



        $data = [];

        // $data['driver_request'] = $this->driver_request_model->getAll();
        $type = $_POST['type'];
        $status = $_POST['status'];
        $original_from  = $_POST['from'];
		$original_to    = $_POST['to'];
		$driver    = $_POST['driver'];
		// echo $original_from."<<br>".$original_to."<";
		// exit;
		if(!empty($original_from)){
			$from_date = str_replace('/', '-', $original_from);
			$from = date('Y-m-d', strtotime($from_date));
		}else{
			$from = '';
		}

        if(!empty($original_to)){
			$to_date = str_replace('/', '-', $original_to);
			$to = date('Y-m-d', strtotime($to_date));
		}else{
			$to = '';
		}
        
        $this->data['data'] = $this->driver_request_model->search($type,$status,$from,$to,$driver);

// echo "<pre>";
// print_r($this->data['data']);
// exit;

		$this->_render_page('templates/admin_template', $this->data);

	}


	public function delete($id){
// echo "ss";exit;
		$this->driver_request_model->delete($id);

		$this->session->set_flashdata('alert', [

				'message' => "Successfully deleted.",

				'class' => "alert-success",

				'type' => "Success"

		]);

		redirect('admin/drivers_requests');

	}

}