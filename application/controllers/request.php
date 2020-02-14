<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Request extends MY_Controller

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
		$this->load->model('request_model');
        $this->load->model('notes_model');
		$this->load->model('calls_model');
        $this->load->model('jobs_model');
		$this->load->model('support_model');
		
        $this->load->model('smtp_model');
        $this->load->model('notifications_model');
        $this->load->model('popups_model');
        $this->load->model('base_model');
        $this->load->model('userx_model');
        $this->load->model('reminders_model');
		$this->data['configuration'] = get_configuration();
	}

	public function index(){
		$this->data['css_type'] 	= array("form","datatable");
		$this->data['active_class'] = "request";
		$this->data['gmaps'] 		= false;
		$this->data['title'] 		= $this->lang->line("request");
		$this->data['title_link'] 	= base_url('admin/request');
		$this->data['content'] 		= 'admin/request/index';

        $this->load->model('calls_model');
        //$this->load->model('request_model');
        $this->load->model('jobs_model');

        $data = [];
        $data['request'] = $this->request_model->getAll();
        $data['jobs'] 	 = $this->jobs_model->getAll();
        $data['calls']   = $this->calls_model->getAll();
        $this->data['popups'] = $this->popups_model->get(array('id'=>1));
        $this->data['data'] = $this->request_model->getAll();
        $this->data['company_data'] = $this->userx_model->get_company();
		$this->data['MAIL'] = $this->smtp_model->get(array('id' => 1));
		$this->_render_page('templates/admin_template', $this->data);
	}

	public function add(){
		$this->data['css_type'] 	= array("form");
		$this->data['active_class'] = "request";
		$this->data['gmaps'] 	= false;
		$this->data['title'] 	= $this->lang->line("request");
		$this->data['title_link'] = base_url('admin/request');
		$this->data['subtitle'] = "Add";
		$this->data['content']  = 'admin/request/add';
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->store();
		}
		$this->_render_page('templates/admin_template', $this->data);
	}

	public function store(){
			$error = request_validate();
			if (empty($error)) {
				//$dob = to_unix_date(@$_POST['dob']);
				$id = $this->request_model->create([
					'civility' 		=> @$_POST['civility'],
					'first_name' 	=> @$_POST['name'],
					'last_name' 	=> @$_POST['prename'],
					'company' 		=> @$_POST['company'],
					'email' 		=> @$_POST['email'],
					'telephone' 	=> @$_POST['tel'],
					//'dob' 			=> @$dob,
					'message' 		=> @$_POST['message'],
					'status' 		=> @$_POST['status'],
					'msg_subject' 	=> @$_POST['msg_subject'],
					'ip_address'	=> $this->input->ip_address()
				]);

				$this->session->set_flashdata('alert', [
					'message' => "Successfully Created.",
					'class' => "alert-success",
					'type' => "Success"
				]);
				redirect('admin/request/'.$id.'/edit');
			} else {
				$this->data['alert'] = [
					'message' => @$error[0],
					'class' => "alert-danger",
					'type' => "Error"
				];
			}
	}
    
    public function hi($name,$age,$gender) {
        echo "Hi $name , Are you $age and $gender?";
    }
    public function filterby() {
        // $msg = json_encode($_GET);
        // {"modules":"Default","year_lists":"2020","month_lists":"jan","from_period":"","to_period":""}
        $year = $_GET['year_lists'];
        $modules = $_GET['modules'];
        $month = $_GET['month_lists'];
        $from_date = empty($_GET['from_period']) ? 1 : $_GET['from_period'];
        $to_date = empty($_GET['to_period']) ? 31 : $_GET['to_period'];
        // 2020-12-31
        $from = "$year-$month-$from_date";
        $to = "$year-$month-$to_date";
        $req1 = $this->request_model->getRowsCount("(created_at BETWEEN '$from' AND '$to') AND status='New'");
        $req2 = $this->request_model->getRowsCount("(created_at BETWEEN '$from' AND '$to') AND status='Pending'");
        $req3 = $this->request_model->getRowsCount("(created_at BETWEEN '$from' AND '$to') AND status='Replied'");
        $req4 = $this->request_model->getRowsCount("(created_at BETWEEN '$from' AND '$to') AND status='Closed'");
        
        $cal1 = $this->calls_model->getRowsCount("(created_at BETWEEN '$from' AND '$to') AND status='New'");
        $cal2 = $this->calls_model->getRowsCount("(created_at BETWEEN '$from' AND '$to') AND status='Pending'");
        $cal3 = $this->calls_model->getRowsCount("(created_at BETWEEN '$from' AND '$to') AND status='Replied'");
        $cal4 = $this->calls_model->getRowsCount("(created_at BETWEEN '$from' AND '$to') AND status='Closed'");
        
        $job1 = $this->jobs_model->getRowsCount("(created_at BETWEEN '$from' AND '$to') AND status='New'");
        $job2 = $this->jobs_model->getRowsCount("(created_at BETWEEN '$from' AND '$to') AND status='Pending'");
        $job3 = $this->jobs_model->getRowsCount("(created_at BETWEEN '$from' AND '$to') AND status='Meeting'");
        $job4 = $this->jobs_model->getRowsCount("(created_at BETWEEN '$from' AND '$to') AND status='Accepted'");
        $job5 = $this->jobs_model->getRowsCount("(created_at BETWEEN '$from' AND '$to') AND status='Denied'");
        
        $sup1 = $this->support_model->getRowsCount("(created_on BETWEEN '$from' AND '$to') AND status='New'");
        $sup2 = $this->support_model->getRowsCount("(created_on BETWEEN '$from' AND '$to') AND status='Pending'");
        $sup3 = $this->support_model->getRowsCount("(created_on BETWEEN '$from' AND '$to') AND status='Replied'");
        $sup4 = $this->support_model->getRowsCount("(created_on BETWEEN '$from' AND '$to') AND status='Closed'");
        
        $msg = "from $from to $to";
        $res = [
            'chart1' => [$req1,$req2,$req3,$req4],
            'chart2' => [$cal1,$cal2,$cal3,$cal4],
            'chart3' => [$job1,$job2,$job3,$job4,$job5],
            'chart4' => [$sup1,$sup2,$sup3,$sup4],
            'msg' => $msg
        ];
        echo json_encode($res);
    }
	public function edit($id){

		$this->data['data'] 		= $this->request_model->get(['id' => $id]);
		if($this->data['data'] != false) {
			$this->data['css_type'] = array("form");
			$this->data['active_class'] = "request";
			$this->data['gmaps'] = false;
			$this->data['title'] 	= $this->lang->line("request");
			$this->data['title_link'] = base_url('admin/request');
			$this->data['subtitle'] = create_timestamp_uid($this->data['data']->created_at,$id);
			$this->data['content']  = 'admin/request/edit';
			
			$this->load->model('quick_replies_model');
			$this->data['quick_replies']  = $this->quick_replies_model->getAll(array('delete_bit' => 0, 'status' => 1, 'module' => 2));
			
			if($this->data['data']->unread != 0)
				$this->request_model->update(['unread' => 0], $id);

			if($this->data['data']->status == "New")
				$this->request_model->update(array('Status' => "Pending", 'reminder_update_date' => "", 'reminder_count' => 0), $id);
			
			//$this->data['replies'] = $this->base_model->get("request_replies", array('request_id'=>$id));
			$this->data['replies'] = $this->base_model->get_replies($id, 2);
			$this->data['company_data'] = $this->userx_model->get_company();
			$this->_render_page('templates/admin_template', $this->data);
		} else show_404();
	}

	public function update($id){
		$request = $this->request_model->get(['id' => $id]);
		if($request != false) {
			//$error = request_validate();
			if (empty($error)) {
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
				$notifications = $this->notifications_model->get(array('status'=>$check, 'department'=>2, 'notification_status'=>1));
				if($notifications != null && !empty($notifications)){
					$MAIL = $this->smtp_model->get(array('id' => 1));
					$company_data = $this->userx_model->get_company();
					$request_reply = $this->request_model->get_reply($request->id);
					$message .= $notifications->message;
					$subject = $notifications->subject;
					$subject = str_replace("{quote_request_subject}","Demande de Devis Handi-Express.fr",$subject);	
					if(!empty($request_reply)){
						$message = str_replace("{last_quote_request_user_reply}",$request_reply[0]->message,$message);	
					}else{
						$message = str_replace("Reply : {last_quote_request_user_reply}","",$message);	
					}
					$message = str_replace("{quote_request_sender_email}",$request->email,$message);
					$message = str_replace("{quote_request_date}",from_unix_date($request->created_at),$message);
					$message = str_replace("{quote_request_time}",from_unix_time($request->created_at),$message);
					$message = str_replace("{quote_request_civility}",$request->civility,$message);
					$message = str_replace("{quote_request_first_name}",$request->first_name,$message);
					$message = str_replace("{quote_request_last_name}",$request->last_name,$message);
					$message = str_replace("{quote_request_company_name}",$request->company,$message);
					$message = str_replace("Subject : {quote_request_subject}","",$message);
					$message = str_replace("{quote_request_message}",$request->message,$message);
					if(@$_POST['status'] == "New"){
						$message .= '<div class="row section-company-info" style=" background: -webkit-linear-gradient(#efefef, #ECECEC, #CECECE);margin: 10px 0px;max-height: 600px;border: 2px solid #a4a8ab;padding:10px;">
						<div class="col-md-5">
							<div class="text_company">';
						if(isset($company_data['name']) && !empty($company_data['name'])){
							$message .= '<p><span>'.$company_data["name"].'</span></p>';
						}
						if(isset($company_data['email']) && !empty($company_data['email'])){
							$message .= '<p><span style="font-weight: 600;font-size: 16px;width: 60px;display: inline-block;">Email:</span><span>'.$company_data['email'].'</span></p>';
						}
						if(isset($company_data['phone']) && !empty($company_data['phone'])){
							$message .= '<p><span style="font-weight: 600;font-size: 16px;width: 60px;display: inline-block;">Phone:</span><span>'.$company_data['phone'].'</span></p>';
						}
						if(isset($company_data['fax']) && !empty($company_data['fax'])){
							$message .= '<p><span style="font-weight: 600;font-size: 16px;width: 60px;display: inline-block;">Fax:</span><span>'.$company_data['fax'].'</span></p>';
						}
						if(isset($company_data['website']) && !empty($company_data['website'])){
							$message .= '<p><span style="font-weight: 600;font-size: 16px;width: 60px;display: inline-block;">Website:</span><span>'.$company_data['website'].'</span></p>';
						}
						if(isset($company_data['city']) && !empty($company_data['city'])){
							$message .= '<p><span style="font-weight: 600;font-size: 16px;width: 60px;display: inline-block;">Address:</span><span>'.$company_data['city'].' '.$company_data['country'].'</span></p>';
						}
						$message .= '<p class="social_icons">';
							if(isset($company_data['facebook_link']) && !empty($company_data['facebook_link'])){
								$message .= '<a style="font-size: 12px;display: inline-block;height: 25px;width: 25px;background: #fff;border-radius: 50%;text-align: center;line-height: 25px;margin-right: 15px;" href="'.$company_data['facebook_link'].'" target="_blank"><i class="fa fa-facebook"></i></a>';
							}
							if(isset($company_data['youtube_link']) && !empty($company_data['youtube_link'])){
								$message .= '<a style="font-size: 12px;display: inline-block;height: 25px;width: 25px;background: #fff;border-radius: 50%;text-align: center;line-height: 25px;margin-right: 15px;" href="'.$company_data['youtube_link'].'" target="_blank"><i class="fa fa-youtube"></i></a>';
							}
							if(isset($company_data['instagram_link']) && !empty($company_data['instagram_link'])){
								$message .= '<a style="font-size: 12px;display: inline-block;height: 25px;width: 25px;background: #fff;border-radius: 50%;text-align: center;line-height: 25px;margin-right: 15px;" href="'.$company_data['instagram_link'].'" target="_blank"><i class="fa fa-instagram"></i></a>';
							}
						$message .= '</p>
						</div>
							</div>
							<div class="col-md-7" style="margin-top: 15px;">
								<div class="profile_image">';
						$message .= '<a href="" class="company_image"><img style="width: 100%;max-width: 300px;max-height: 370px;"';
						if(isset($company_data['logo']) && !empty($company_data['logo'])){
							$message .= 'src="'.base_url('uploads/company').'/'.$company_data['logo'].'"';
						}
						$message .= 'alt=""></a>';
						$message .= '</div>
							</div>
						</div>';
					}
					$check = sendReply($request,$subject,$message,"",$MAIL,array(@$_POST['status']));
				}
				//$dob = to_unix_date(@$_POST['dob']);
				if($_POST['status'] == "Replied"){
					$this->request_model->update([
	/*						'civility' 		=> @$_POST['civility'],
							'first_name' 	=> @$_POST['name'],
							'last_name' 	=> @$_POST['prename'],
							'email' 		=> @$_POST['email'],
							'telephone' 	=> @$_POST['tel'],
							//'dob' 			=> @$dob,
							'message' 		=> @$_POST['message'],*/
							'status' 		=> @$_POST['status'],
							'reminder_update_date' 		=> date('Y-m-d H:i:s'),
							'reminder_count' 		=> 0,
					], $id);
				}else{
					$this->request_model->update([
	/*						'civility' 		=> @$_POST['civility'],
							'first_name' 	=> @$_POST['name'],
							'last_name' 	=> @$_POST['prename'],
							'email' 		=> @$_POST['email'],
							'telephone' 	=> @$_POST['tel'],
							//'dob' 			=> @$dob,
							'message' 		=> @$_POST['message'],*/
							'status' 		=> @$_POST['status'],
							'reminder_update_date' 		=> "",
							'reminder_count' 		=> 0,
					], $id);
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
			redirect('admin/request/'.$id.'/edit');
		} else show_404();
	}


	/*public function reply($id){
		$call = $this->request_model->get(['id' => $id]);
		if($call != false) {
			$this->form_validation->set_rules('reply_subject', 'Subject', 'trim|xss_clean|min_length[0]|max_length[200]');
			$this->form_validation->set_rules('reply_message', 'Message', 'trim|xss_clean|min_length[0]|max_length[5000]');
			if ($this->form_validation->run() !== false) {

				$subject = isset($_POST['reply_subject']) ? $_POST['reply_subject'] : '';
				$message = isset($_POST['reply_message']) ? $_POST['reply_message'] : '';
				$msg = $message;
				$MAIL = $this->smtp_model->get(array('id' => 1));
				$company_data = $this->userx_model->get_company();
				$message .= '<div class="row section-company-info" style=" background: -webkit-linear-gradient(#efefef, #ECECEC, #CECECE);margin: 10px 0px;max-height: 600px;border: 2px solid #a4a8ab;padding:10px;">
				<div class="col-md-5">
					<div class="text_company">';
				if(isset($company_data['name']) && !empty($company_data['name'])){
					$message .= '<p><span>'.$company_data["name"].'</span></p>';
				}
				if(isset($company_data['email']) && !empty($company_data['email'])){
					$message .= '<p><span style="font-weight: 600;font-size: 16px;width: 60px;display: inline-block;">Email:</span><span>'.$company_data['email'].'</span></p>';
				}
				if(isset($company_data['phone']) && !empty($company_data['phone'])){
					$message .= '<p><span style="font-weight: 600;font-size: 16px;width: 60px;display: inline-block;">Phone:</span><span>'.$company_data['phone'].'</span></p>';
				}
				if(isset($company_data['fax']) && !empty($company_data['fax'])){
					$message .= '<p><span style="font-weight: 600;font-size: 16px;width: 60px;display: inline-block;">Fax:</span><span>'.$company_data['fax'].'</span></p>';
				}
				if(isset($company_data['website']) && !empty($company_data['website'])){
					$message .= '<p><span style="font-weight: 600;font-size: 16px;width: 60px;display: inline-block;">Website:</span><span>'.$company_data['website'].'</span></p>';
				}
				if(isset($company_data['city']) && !empty($company_data['city'])){
					$message .= '<p><span style="font-weight: 600;font-size: 16px;width: 60px;display: inline-block;">Address:</span><span>'.$company_data['city'].' '.$company_data['country'].'</span></p>';
				}
				$message .= '<p class="social_icons">';
					if(isset($company_data['facebook_link']) && !empty($company_data['facebook_link'])){
						$message .= '<a style="font-size: 12px;display: inline-block;height: 25px;width: 25px;background: #fff;border-radius: 50%;text-align: center;line-height: 25px;margin-right: 15px;" href="'.$company_data['facebook_link'].'" target="_blank"><i class="fa fa-facebook"></i></a>';
					}
					if(isset($company_data['youtube_link']) && !empty($company_data['youtube_link'])){
						$message .= '<a style="font-size: 12px;display: inline-block;height: 25px;width: 25px;background: #fff;border-radius: 50%;text-align: center;line-height: 25px;margin-right: 15px;" href="'.$company_data['youtube_link'].'" target="_blank"><i class="fa fa-youtube"></i></a>';
					}
					if(isset($company_data['instagram_link']) && !empty($company_data['instagram_link'])){
						$message .= '<a style="font-size: 12px;display: inline-block;height: 25px;width: 25px;background: #fff;border-radius: 50%;text-align: center;line-height: 25px;margin-right: 15px;" href="'.$company_data['instagram_link'].'" target="_blank"><i class="fa fa-instagram"></i></a>';
					}
				$message .= '</p>
				</div>
					</div>
					<div class="col-md-7" style="margin-top: 15px;">
						<div class="profile_image">';
				$message .= '<a href="" class="company_image"><img style="width: 100%;max-width: 300px;max-height: 370px;"';
				if(isset($company_data['logo']) && !empty($company_data['logo'])){
					$message .= 'src="'.base_url('uploads/company').'/'.$company_data['logo'].'"';
				}
				$message .= 'alt=""></a>';
				$message .= '</div>
					</div>
				</div>';
				$check = sendReply($call,$subject,$message,"",$MAIL);

				if($check['status'] != false) {
					$this->request_model->update(array('last_action' => date('Y-m-d H:i:s'), 'status'=>'Replied'), $id);
					$data = array(
						'subject' => $subject,
						'message' => $msg,
						'request_id' => $id,
						'addedBy' => $this->session->userdata('user')->id,
						'created_at' => date('Y-m-d H:i:s'),
					);
					$this->base_model->SaveForm('vbs_request_replies', $data);
					$lastid = $this->base_model->get_last_record('vbs_request_replies');
					if ($_FILES['attachment']['name']) {
					    $cart = array();
						$cpt = count($_FILES['attachment']['name']);
						for($i=0; $i<$cpt; $i++)
						{
							if(!empty($_FILES['attachment']['name'][$i])){
								$_FILES['file']['name'] = $_FILES['attachment']['name'][$i];
								$_FILES['file']['type'] = $_FILES['attachment']['type'][$i];
								$_FILES['file']['tmp_name'] = $_FILES['attachment']['tmp_name'][$i];
								$_FILES['file']['error'] = $_FILES['attachment']['error'][$i];
								$_FILES['file']['size'] = $_FILES['attachment']['size'][$i];
								// $profile_image = time() ."-" . preg_replace('/\s+/', '', $_FILES['attachment']['name'][$i]);
								$path = $_FILES['attachment']['name'][$i];
								$ext = pathinfo($path, PATHINFO_EXTENSION);
								$profile_image = time() ."_" . rand(100,1000) .$i.'.'.$ext;
								$config['file_name'] = $profile_image;
								$config['upload_path']          = './assets/attachment/';
								$config['allowed_types']        = 'gif|jpg|png|jpeg|docx|doc|pdf|txt|mp3|wav|zip|csv|sql|xml|psd|svg|ico|html|php|ppt|xls|xlsx|mp4|mpg|mpeg|wmv|mov|3gp|mkv';
								$this->load->library('upload', $config);
								$this->upload->initialize($config);
								if ( ! $this->upload->do_upload('file'))
								{
									$message = array('error' => $this->upload->display_errors());
									$this->session->set_flashdata('message', $message);
									redirect($_SERVER['HTTP_REFERER']);
								}
								else
								{
									$dataa = array('upload_data' => $this->upload->data());
									array_push($cart, $profile_image);
								}
							}
						}
						$attachment['attachment'] = implode(",",$cart);
						$data = array(
							'request_reply_id' => $lastid->id,
							'attachments' => $attachment['attachment'],
						);
						$this->base_model->SaveForm('vbs_request_attachments', $data);
					}
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
	}*/
	
	public function reply($id){
		$call = $this->request_model->get(['id' => $id]);
		if($call != false) {
			$this->form_validation->set_rules('reply_subject', 'Subject', 'trim|xss_clean|min_length[0]|max_length[200]');
			$this->form_validation->set_rules('reply_message', 'Message', 'trim|xss_clean|min_length[0]|max_length[5000]');
			if ($this->form_validation->run() !== false) {

				$subject = isset($_POST['reply_subject']) ? $_POST['reply_subject'] : '';
				$message = isset($_POST['reply_message']) ? $_POST['reply_message'] : '';
				$msg = $message;
				$MAIL = $this->smtp_model->get(array('id' => 1));
				$company_data = $this->userx_model->get_company();
				$message .= '<div class="row section-company-info" style=" background: -webkit-linear-gradient(#efefef, #ECECEC, #CECECE);margin: 10px 0px;max-height: 600px;border: 2px solid #a4a8ab;padding:10px;">
				<div class="col-md-5">
					<div class="text_company">';
				if(isset($company_data['name']) && !empty($company_data['name'])){
					$message .= '<p><span>'.$company_data["name"].'</span></p>';
				}
				if(isset($company_data['email']) && !empty($company_data['email'])){
					$message .= '<p><span style="font-weight: 600;font-size: 16px;width: 60px;display: inline-block;">Email:</span><span>'.$company_data['email'].'</span></p>';
				}
				if(isset($company_data['phone']) && !empty($company_data['phone'])){
					$message .= '<p><span style="font-weight: 600;font-size: 16px;width: 60px;display: inline-block;">Phone:</span><span>'.$company_data['phone'].'</span></p>';
				}
				if(isset($company_data['fax']) && !empty($company_data['fax'])){
					$message .= '<p><span style="font-weight: 600;font-size: 16px;width: 60px;display: inline-block;">Fax:</span><span>'.$company_data['fax'].'</span></p>';
				}
				if(isset($company_data['website']) && !empty($company_data['website'])){
					$message .= '<p><span style="font-weight: 600;font-size: 16px;width: 60px;display: inline-block;">Website:</span><span>'.$company_data['website'].'</span></p>';
				}
				if(isset($company_data['city']) && !empty($company_data['city'])){
					$message .= '<p><span style="font-weight: 600;font-size: 16px;width: 60px;display: inline-block;">Address:</span><span>'.$company_data['city'].' '.$company_data['country'].'</span></p>';
				}
				$message .= '<p class="social_icons">';
					if(isset($company_data['facebook_link']) && !empty($company_data['facebook_link'])){
						$message .= '<a style="font-size: 12px;display: inline-block;height: 25px;width: 25px;background: #fff;border-radius: 50%;text-align: center;line-height: 25px;margin-right: 15px;" href="'.$company_data['facebook_link'].'" target="_blank"><i class="fa fa-facebook"></i></a>';
					}
					if(isset($company_data['youtube_link']) && !empty($company_data['youtube_link'])){
						$message .= '<a style="font-size: 12px;display: inline-block;height: 25px;width: 25px;background: #fff;border-radius: 50%;text-align: center;line-height: 25px;margin-right: 15px;" href="'.$company_data['youtube_link'].'" target="_blank"><i class="fa fa-youtube"></i></a>';
					}
					if(isset($company_data['instagram_link']) && !empty($company_data['instagram_link'])){
						$message .= '<a style="font-size: 12px;display: inline-block;height: 25px;width: 25px;background: #fff;border-radius: 50%;text-align: center;line-height: 25px;margin-right: 15px;" href="'.$company_data['instagram_link'].'" target="_blank"><i class="fa fa-instagram"></i></a>';
					}
				$message .= '</p>
				</div>
					</div>
					<div class="col-md-7" style="margin-top: 15px;">
						<div class="profile_image">';
				$message .= '<a href="" class="company_image"><img style="width: 100%;max-width: 300px;max-height: 370px;"';
				if(isset($company_data['logo']) && !empty($company_data['logo'])){
					$message .= 'src="'.base_url('uploads/company').'/'.$company_data['logo'].'"';
				}
				$message .= 'alt=""></a>';
				$message .= '</div>
					</div>
				</div>';
				
				if ($_FILES['attachment']['name']) {
					$cart = array();
					$cpt = count($_FILES['attachment']['name']);
					for($i=0; $i<$cpt; $i++)
					{
						if(!empty($_FILES['attachment']['name'][$i])){
							$_FILES['file']['name'] = $_FILES['attachment']['name'][$i];
							$_FILES['file']['type'] = $_FILES['attachment']['type'][$i];
							$_FILES['file']['tmp_name'] = $_FILES['attachment']['tmp_name'][$i];
							$_FILES['file']['error'] = $_FILES['attachment']['error'][$i];
							$_FILES['file']['size'] = $_FILES['attachment']['size'][$i];
							// $profile_image = time() ."-" . preg_replace('/\s+/', '', $_FILES['attachment']['name'][$i]);
							$path = $_FILES['attachment']['name'][$i];
							$ext = pathinfo($path, PATHINFO_EXTENSION);
							$profile_image = time() ."_" . rand(100,1000) .$i.'.'.$ext;
							$config['file_name'] = $profile_image;
							$config['upload_path']          = './uploads/attachment/';
							$config['allowed_types']        = 'gif|jpg|png|jpeg|docx|doc|pdf|txt|mp3|wav|zip|csv|sql|xml|psd|svg|ico|html|php|ppt|xls|xlsx|mp4|mpg|mpeg|wmv|mov|3gp|mkv';
							$this->load->library('upload', $config);
							$this->upload->initialize($config);
							if ( ! $this->upload->do_upload('file'))
							{
								$message = array('error' => $this->upload->display_errors());
								$this->session->set_flashdata('message', $message);
								redirect($_SERVER['HTTP_REFERER']);
							}
							else
							{
								$dataa = array('upload_data' => $this->upload->data());
								array_push($cart, $profile_image);
							}
						}
					}
					$attachment['attachment'] = implode(",",$cart);
				}
				$check = sendReply($call,$subject,$message,"",$MAIL,array(),array(),$attachment['attachment']);

				if($check['status'] != false) {
					$this->request_model->update(array('last_action' => date('Y-m-d H:i:s'), 'status'=>'Replied', 'reminder_update_date' => date('Y-m-d H:i:s'), 'reminder_count' => 0), $id);
					$data = array(
						'subject' => $subject,
						'message' => $msg,
						'request_id' => $id,
						'type' => 2,
						'addedBy' => $this->session->userdata('user')->id,
						'created_at' => date('Y-m-d H:i:s'),
					);
					$this->base_model->SaveForm('vbs_request_replies', $data);
					$lastid = $this->base_model->get_last_record('vbs_request_replies');	
					if($attachment['attachment'] != ""){
						$data = array(
							'request_reply_id' => $lastid->id,
							'attachments' => $attachment['attachment'],
						);
						$this->base_model->SaveForm('vbs_request_attachments', $data);
					}
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
		$this->request_model->delete($id);
		$this->session->set_flashdata('alert', [
				'message' => "Successfully deleted.",
				'class' => "alert-success",
				'type' => "Success"
		]);
		redirect('admin/request');
	}
}