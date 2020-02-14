<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Support extends MY_Controller

{
	function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->lang->load('auth');
		$this->lang->load('general');
		$this->load->helper('language');
		// if (!$this->basic_auth->is_login())
			// redirect("admin", 'refresh');
		// else
			// $this->data['user'] = $this->basic_auth->user();
		$this->load->model('request_model');
		$this->load->model('jobs_model');
		$this->load->model('support_model');
		$this->load->model('calls_model');
		$this->load->model('smtp_model');
        $this->load->model('notifications_model');
        $this->load->model('userx_model');
		$this->load->model('base_model');
		$this->load->model('reminders_model');
		$this->data['configuration'] = get_configuration();
	}
	
	public function GetSupportAttachments($support_id){
		return $this->support_model->GetSupportAttachments($support_id);
	}

	public function index(){
		$this->data['css_type'] 	= array("form","datatable");
		$this->data['active_class'] = "support";
		$this->data['gmaps'] 		= false;
		$this->data['title'] 		= $this->lang->line("support");
		$this->data['content'] 		= 'admin/support/index';
		$this->data['obj'] 		    = $this;

		$this->data['data'] = $this->support_model->getAll();
		$this->data['company_data'] = $this->userx_model->get_company();
		$this->data['MAIL'] = $this->smtp_model->get(array('id' => 1));
		$this->_render_page('templates/admin_template', $this->data);
	}

	public function add(){
		$this->data['css_type'] 	= array("form");
		$this->data['active_class'] = "support";
		$this->data['gmaps'] 	= false;
		$this->data['title'] 	= $this->lang->line("support");
		$this->data['title_link'] 	= site_url('admin/support');
		$this->data['subtitle'] = "Add";
		$this->data['content']  = 'admin/support/add';
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->store();
		}
		$this->_render_page('templates/admin_template', $this->data);
	}

	public function store(){
			//$error = support_validate();
			if (empty($error)) {
				$id = $this->support_model->create([
					'p_title' 		=> @$_POST['civility'],
					'fname' 		=> @$_POST['name'],
					'lname' 		=> @$_POST['prename'],
					'email' 		=> @$_POST['email'],
					'company' 		=> @$_POST['company_name'],
					'phone' 		=> @$_POST['tel'],
					'mobile' 		=> @$_POST['mobile'],
					'message' 		=> @$_POST['message'],
					'department' 	=> @$_POST['department'],
					'priority' 		=> @$_POST['priority'],
					'status' 		=> @$_POST['status'],
					'subject' 		=> @$_POST['msg_subject'],
					'ip_address'	=> $this->input->ip_address()
				]);
				
				$filename = "";
				if($_FILES['attachments']['name'][0]!=''){
					$this->load->library('upload');
					$files = $_FILES;
					$aantal = count($_FILES['attachments']['name']);
					for($i=0; $i<$aantal; $i++)
					{
						$_FILES['attachments']['name']= $files['attachments']['name'][$i];
						$_FILES['attachments']['type']= $files['attachments']['type'][$i];
						$_FILES['attachments']['tmp_name']= $files['attachments']['tmp_name'][$i];
						$_FILES['attachments']['error']= $files['attachments']['error'][$i];
						$_FILES['attachments']['size']= $files['attachments']['size'][$i];    

						$tmpFilePath = $_FILES['attachments']['tmp_name'];
						
						$filename = time() . '_' .$_FILES['attachments']['name'];
						
						//Make sure we have a file path
						if ($tmpFilePath != ""){
							//Setup our new file path
							$newFilePath = "./uploads/contact_files/" . $filename;

							//Upload the file into the temp dir
							if(move_uploaded_file($tmpFilePath, $newFilePath)) {
								$inputdata1 = array(
												'support_id' => $id,
												'filename' => $filename,
											);
								$this->support_model->insert_operation($inputdata1, 'support_attachments');
							}
						}else{
							$filename = "";
						}
					
					}
				}
				
				$site_settings_rec = $this->db->get('vbs_site_settings')->result() [0];
				$config = Array(
						'protocol' => 'smtp',
						'smtp_host' => 'ssl://smtp.googlemail.com',
						'smtp_port' => 465,
						'smtp_user' => $site_settings_rec->portal_email, // change it to yours
						'smtp_pass' => '*****', // change it to yours
						'mailtype' => 'html',
						'charset' => 'iso-8859-1',
						'wordwrap' => TRUE
				);
				$message            = $this->lang->line('email_received');

				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				$this->email->from($site_settings_rec->portal_email); // change it to yours
				$this->email->reply_to($site_settings_rec->portal_email);
				$this->email->to($this->input->post('email')); // change it to yours
				$this->email->subject('Acknowledgement - Support system');
				$this->email->message($message);
				$this->email->send();

				$this->session->set_flashdata('alert', [
					'message' => "Successfully Created.",
					'class' => "alert-success",
					'type' => "Success"
				]);
				redirect('admin/support/'.$id.'/edit');
			} else {
				$this->data['alert'] = [
					'message' => @$error[0],
					'class' => "alert-danger",
					'type' => "Error"
				];
			}
	}

	public function edit($id){

		$this->data['data'] 		= $this->support_model->get(['id' => $id]);
		if($this->data['data'] != false) {
			$this->data['css_type'] = array("form");
			$this->data['active_class'] = "support";
			$this->data['gmaps'] = false;
			$this->data['title'] 	= $this->lang->line("support");
			$this->data['title_link'] 	= site_url('admin/support');
			$this->data['subtitle'] = create_timestamp_uid($this->data['data']->created_on,$id);
			$this->data['content']  = 'admin/support/edit';
			$this->load->model('quick_replies_model');
			$this->data['quick_replies']  = $this->quick_replies_model->getAll(array('delete_bit' => 0, 'status' => 1, 'module' => 4));
			$this->data['previous_replies']  = $this->support_model->previous_replies($id);
			$this->data['obj'] 		    = $this;
			if($this->data['data']->unread != 0)
				$this->support_model->update(['unread' => 0], $id);
			
			$this->data['replies'] = $this->base_model->get_replies($id, 4);
			$this->data['company_data'] = $this->userx_model->get_company();
			$this->_render_page('templates/admin_template', $this->data);
		} else show_404();
	}

	public function update($id){
		$support = $this->support_model->get(['id' => $id]);
		if($support != false) {
			//$error = support_validate();
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
				$notifications = $this->notifications_model->get(array('status'=>$check, 'department'=>5, 'notification_status'=>1));
				if($notifications != null && !empty($notifications)){
					$MAIL = $this->smtp_model->get(array('id' => 1));
					$company_data = $this->userx_model->get_company();
					$support_reply = $this->support_model->get_reply($support->id);
					$message = $notifications->message;
					$subject = $notifications->subject;
					$subject = str_replace("{support_request_subject}","",$subject);	
					if(!empty($support_reply)){
						$message = str_replace("{last_support_request_user_reply}",$support_reply[0]->message,$message);	
					}else{
						$message = str_replace("Reply : {last_support_request_user_reply}","",$message);	
					}
					$message = str_replace("{support_request_sender_email}",$support->email,$message);
					$message = str_replace("{support_request_date}",from_unix_date($support->created_at),$message);
					$message = str_replace("{support_request_time}",from_unix_time($support->created_at),$message);
					$message = str_replace("{support_request_civility}",$support->p_title,$message);
					$message = str_replace("{support_request_first_name}",$support->fname,$message);
					$message = str_replace("{support_request_last_name}",$support->lname,$message);
					$message = str_replace("{support_request_company_name}",$support->company,$message);
					$message = str_replace("{support_request_subject}",$support->subject,$message);
					$message = str_replace("{support_request_message}",$support->message,$message);
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
					$check = supportSendReply($support,$subject,$message,"",$MAIL,array(@$_POST['status']));
				}
				$this->support_model->update([
/*						'civility' 		=> @$_POST['civility'],
						'first_name' 	=> @$_POST['name'],
						'last_name' 	=> @$_POST['prename'],
						'email' 		=> @$_POST['email'],
						'telephone' 	=> @$_POST['tel'],
						'message' 		=> @$_POST['message'],*/
						'status' 		=> @$_POST['status'],
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
			redirect('admin/support/'.$id.'/edit');
		} else show_404();
	}
	public function closeTicket($id){
		$support = $this->support_model->get(['id' => $id]);
		if($support != false) {
			//$error = support_validate();
			if (empty($error)) {
                $check = 4;
				
				$notifications = $this->notifications_model->get(array('status'=>$check, 'department'=>5, 'notification_status'=>1));
				if($notifications != null && !empty($notifications)){
					$MAIL = $this->smtp_model->get(array('id' => 1));
					$company_data = $this->userx_model->get_company();
					$support_reply = $this->support_model->get_reply($support->id);
					$message = $notifications->message;
					$subject = $notifications->subject;
					$subject = str_replace("{support_request_subject}","",$subject);	
					if(!empty($support_reply)){
						$message = str_replace("{last_support_request_user_reply}",$support_reply[0]->message,$message);	
					}else{
						$message = str_replace("Reply : {last_support_request_user_reply}","",$message);	
					}
					$message = str_replace("{support_request_sender_email}",$support->email,$message);
					$message = str_replace("{support_request_date}",from_unix_date($support->created_at),$message);
					$message = str_replace("{support_request_time}",from_unix_time($support->created_at),$message);
					$message = str_replace("{support_request_civility}",$support->p_title,$message);
					$message = str_replace("{support_request_first_name}",$support->fname,$message);
					$message = str_replace("{support_request_last_name}",$support->lname,$message);
					$message = str_replace("{support_request_company_name}",$support->company,$message);
					$message = str_replace("{support_request_subject}",$support->subject,$message);
					$message = str_replace("{support_request_message}",$support->message,$message);
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
					$check = supportSendReply($support,$subject,$message,"",$MAIL,array('Closed'));
				}
				
				if($_POST['status'] == "Replied"){
					$this->support_model->update([
	/*						'civility' 		=> @$_POST['civility'],
    						'first_name' 	=> @$_POST['name'],
    						'last_name' 	=> @$_POST['prename'],
    						'email' 		=> @$_POST['email'],
    						'telephone' 	=> @$_POST['tel'],
    						'message' 		=> @$_POST['message'],*/
    						'status' 		=> 'Closed',
							'reminder_update_date' 		=> date('Y-m-d H:i:s'),
							'reminder_count' 		=> 0,
					], $id);
				}else{
					$this->support_model->update([
	/*						'civility' 		=> @$_POST['civility'],
    						'first_name' 	=> @$_POST['name'],
    						'last_name' 	=> @$_POST['prename'],
    						'email' 		=> @$_POST['email'],
    						'telephone' 	=> @$_POST['tel'],
    						'message' 		=> @$_POST['message'],*/
    						'status' 		=> 'Closed',
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
			redirect('admin/support/'.$id.'/edit');
		} else show_404();
	}
	
	public function getQuickReply($id){
		$quick = $this->support_model->getQuickReply($id);
		
		echo $quick->message_sentence;
	}

	public function AddedBy($id){
		$user = $this->support_model->getUserAddedBy($id);
		
		return $user;
	}


	public function reply($id){
		$support = $this->support_model->get(['id' => $id]);
		if($support != false) {
			$this->form_validation->set_rules('reply_subject', 'Subject', 'trim|xss_clean|min_length[0]|max_length[200]');
			if($_POST['quick_replies'] == ''){
				$this->form_validation->set_rules('reply_message', 'Message', 'trim|xss_clean|min_length[0]|max_length[5000]');
			}
			
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
								$message1 = array('error' => $this->upload->display_errors());
								$this->session->set_flashdata('message', $message1);
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
				
				if($_POST['quick_replies'] != ''){
					$quick = $this->support_model->getQuickReply($_POST['quick_replies']);
		
					$msg = $quick->message_sentence;
				}
				
				
				$MAIL = $this->smtp_model->get(array('id' => 1));
				$reply_link = site_url('admin/support/'.$id.'/edit');
				$check = supportSendReply($support,$subject,$message,"",$MAIL,array(),array(),$attachment['attachment'],$reply_link);

				if($check['status'] != false) {
					$this->support_model->update(array('last_action' => date('Y-m-d H:i:s'), 'status'=>'Replied', 'reminder_update_date' => date('Y-m-d H:i:s'), 'reminder_count' => 0), $id);
					$data = array(
						'message' => $msg,
						'support_id' => $id,
						'addedBy' => $this->session->userdata('user')->id,
						'attachments' => $attachment['attachment'],
					);
					$lastid = $this->support_model->insert_operation_id($data, 'support_replies');

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

			redirect('admin/support/'.$id.'/edit');
		} else show_404();
	}

	public function delete($id){
		$this->support_model->delete($id);
		$this->session->set_flashdata('alert', [
				'message' => "Successfully deleted.",
				'class' => "alert-success",
				'type' => "Success"
		]);
		redirect('admin/support');
	}
	
	public function home(){
        if($this->session->userdata('role_id')!='10'){
            $this->session->set_flashdata('error', 'Invalide detail');
            redirect('support/login');
        }
        $this->data['css_type'] 	= array("form","datatable");
		$this->data['active_class'] = "dashboard";
		$this->data['gmaps'] 		= false;
		$this->data['title'] 		= $this->lang->line('dashboard');
		$this->data['content'] 		= 'admin/support/dashboard';
       

		$data = [];
		$data['support']   = $this->support_model->getAll(array('user_id'=>$this->session->userdata('UserId')));

		
//        for bar chart Support request
        $SupportRecord = $this->support_model->UserSupportChartCount($this->session->userdata('UserId'));
        foreach($SupportRecord as $row3) {
            $data31['label'][] = $row3->month_name;
            $data31['data'][] = (int) $row3->count;
        }
        $this->data['support_chart_data'] = json_encode($data31);

		
//        for line chart Support
        $SupportLine = $this->support_model->UserSupportLineChart($this->session->userdata('UserId'));

        foreach ($SupportLine as $line){
            $data61['day'][] = $line->y;
            $data61['count'][] = $line->a;
        }
        $this->data['support_line_data'] = json_encode($data61);
		
		foreach($data as $key => $d){
			if($d != false){
				foreach($d as $i){
					if(!empty($i->status))
						$this->data[$key][strtolower($i->status)] = isset($this->data[$key][strtolower($i->status)]) ? $this->data[$key][strtolower($i->status)] + 1 : 1;
				}
			}
		}
        
        $this->_render_page('templates/support_template', $this->data);
    }
	
	public function login() {
           $this->data['css_type'] 	= array("form","datatable");
        $this->data['active_class'] = "Support";
        $this->data['gmaps'] 		= false;
        $this->data['title'] 		= 'Support Login';
        $this->data['subtitle'] 	= 'Support Login';
        $this->data['username'] = array(
            'name' => 'username',
            'id' => 'identity',
            'type' => 'text',
            'class' => 'user',
            'placeholder' => $this->lang->line('login_identity_label') ,
            'value' => $this->form_validation->set_value('username') ,
        );

        $this->data['password'] = array(
            'name' => 'password',
            'id' => 'password',
            'type' => 'password',
            'placeholder' => $this->lang->line('password') ,
            'class' => 'password'
        );
        $this->data['forgot_form']  = false;
     
        $this->form_validation->set_rules('username', 'username ', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_validateUserDetail');

        if ($this->form_validation->run() == FALSE) {
			$checkUser = $this->validateUserDetail();
			if($checkUser){
				redirect('support/home');
			}
             $this->data['content'] 		= 'site/supportUser_login';  
        }else{
            redirect('support/home');
        }
        $this->_render_page('templates/site_template', $this->data);
        
    } 
  function validateUserDetail() {
      
      
        $username = $this->input->post('username');
        $password = $this->input->post('password');
 
        $result = $this->support_model->validateDetail('vbs_users',array('username' => $username, 'password' => md5($password)));
 
        if ($result->num_rows() > 0) {
            $support_data = $result->row();
            if(false){
                $this->form_validation->set_message('validateUserDetail', 'Your Email is not verify.');
                return false;
            }else{
				$this->session->set_userdata('UserId', $support_data->id);
				$this->session->set_userdata('username', $support_data->username);
				$this->session->set_userdata('role_id', $support_data->role_id);
				$this->session->set_userdata('first_name', $support_data->first_name);
				/*$this->session->set_userdata('id', $support_data->id);
				$this->session->set_userdata('email', $support_data->email);
				$this->session->set_userdata('name', $support_data->real_name);
				$this->session->set_userdata('access_level', $support_data->access_level);*/
            return true; 
            }
           
        } else {

            if ($password == '') {
                $this->form_validation->set_message('validateUserDetail', 'The Password field is required.');
            } else {
                $this->form_validation->set_message('validateUserDetail', 'Your email or password is incorrect.');
            }
            return false;
        }
    }
	
	public function my_tickets(){
		if($this->session->userdata('role_id')!='10'){
            $this->session->set_flashdata('error', 'Invalide login session');
            redirect('support/login');
        }
		$this->data['css_type'] 	= array("form","datatable");
		$this->data['active_class'] = "support";
		$this->data['gmaps'] 		= false;
		$this->data['title'] 		= $this->lang->line("support");
		$this->data['content'] 		= 'admin/support/users_data/my_tickets';
		$this->data['obj'] 		    = $this;

		$this->data['data'] = $this->support_model->getAll(array('user_id'=>$this->session->userdata('UserId')));
		$this->data['company_data'] = $this->userx_model->get_company();
		$this->data['MAIL'] = $this->smtp_model->get(array('id' => 1));
		$this->_render_page('templates/support_template', $this->data);
	}
	
	public function my_profile(){
		if($this->session->userdata('role_id')!='10'){
            $this->session->set_flashdata('error', 'Invalide login session');
            redirect('support/login');
        }
		if(isset($_POST['submit'])){
			$data = array(
						'username' => $this->input->post('user_name'),
						'email' => $this->input->post('email'),
						'first_name' => $this->input->post('first_name'),
						'last_name' => $this->input->post('last_name'),
						'company_name' => $this->input->post('company_name'),
						'phone' => $this->input->post('phone'),
					);
			
			$this->support_model->updateProfile($data,$this->input->post('user_id'));
		}
		
		$this->data['css_type'] 	= array("form","datatable");
		$this->data['active_class'] = "dashboard";
		$this->data['gmaps'] 		= false;
		$this->data['title'] 		= $this->lang->line("My_Profile");
		$this->data['content'] 		= 'admin/support/users_data/my_profile';
		$this->data['obj'] 		    = $this;

		$this->data['user_data'] = $this->support_model->getUserData($this->session->userdata('UserId'));
		$this->data['company_data'] = $this->userx_model->get_company();
		$this->data['MAIL'] = $this->smtp_model->get(array('id' => 1));
		$this->_render_page('templates/support_template', $this->data);
	}
	
	public function ticket_edit($id){
		if($this->session->userdata('role_id')!='10'){
            $this->session->set_flashdata('error', 'Invalide login session');
            redirect('support/login');
        }

		$this->data['data'] 		= $this->support_model->get(['id' => $id]);
		if($this->data['data'] != false) {
			$this->data['css_type'] = array("form");
			$this->data['active_class'] = "support";
			$this->data['gmaps'] = false;
			$this->data['title'] 	= $this->lang->line("support");
			$this->data['title_link'] 	= site_url('support/my_tickets');
			$this->data['subtitle'] = create_timestamp_uid($this->data['data']->created_on,$id);
			$this->data['content']  = 'admin/support/users_data/edit';
			$this->load->model('quick_replies_model');
			$this->data['quick_replies']  = $this->quick_replies_model->getAll(array('delete_bit' => 0, 'status' => 1, 'module' => 4));
			$this->data['previous_replies']  = $this->support_model->previous_replies($id);
			$this->data['obj'] 		    = $this;
			if($this->data['data']->unread != 0)
				$this->support_model->update(['unread' => 0], $id);
			
			$this->data['replies'] = $this->base_model->get_replies($id, 4);
			$this->data['company_data'] = $this->userx_model->get_company();
			$this->_render_page('templates/support_template', $this->data);
		} else show_404();
	}

	public function ticket_update($id){
		if($this->session->userdata('role_id')!='10'){
            $this->session->set_flashdata('error', 'Invalide login session');
            redirect('support/login');
        }
		$support = $this->support_model->get(['id' => $id]);
		if($support != false) {
			//$error = support_validate();
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
				$notifications = $this->notifications_model->get(array('status'=>$check, 'department'=>5, 'notification_status'=>1));
				if($notifications != null && !empty($notifications)){
					$MAIL = $this->smtp_model->get(array('id' => 1));
					$company_data = $this->userx_model->get_company();
					$support_reply = $this->support_model->get_reply($support->id);
					$message = $notifications->message;
					$subject = $notifications->subject;
					$subject = str_replace("{support_request_subject}","",$subject);	
					if(!empty($support_reply)){
						$message = str_replace("{last_support_request_user_reply}",$support_reply[0]->message,$message);	
					}else{
						$message = str_replace("Reply : {last_support_request_user_reply}","",$message);	
					}
					$message = str_replace("{support_request_sender_email}",$support->email,$message);
					$message = str_replace("{support_request_date}",from_unix_date($support->created_at),$message);
					$message = str_replace("{support_request_time}",from_unix_time($support->created_at),$message);
					$message = str_replace("{support_request_civility}",$support->p_title,$message);
					$message = str_replace("{support_request_first_name}",$support->fname,$message);
					$message = str_replace("{support_request_last_name}",$support->lname,$message);
					$message = str_replace("{support_request_company_name}",$support->company,$message);
					$message = str_replace("{support_request_subject}",$support->subject,$message);
					$message = str_replace("{support_request_message}",$support->message,$message);
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
					$reply_link = site_url('user/support/'.$id.'/ticket_edit');
					$check = supportSendReply($support,$subject,$message,"",$MAIL,array(@$_POST['status']),"","",$reply_link);
				}
				$this->support_model->update([
					  /*'civility' 		=> @$_POST['civility'],
						'first_name' 	=> @$_POST['name'],
						'last_name' 	=> @$_POST['prename'],
						'email' 		=> @$_POST['email'],
						'telephone' 	=> @$_POST['tel'],
						'message' 		=> @$_POST['message'],*/
						'status' 		=> @$_POST['status'],
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
			redirect('user/support/'.$id.'/ticket_edit');
		} else show_404();
	}
	
	public function ticket_reply($id){
		if($this->session->userdata('role_id')!='10'){
            $this->session->set_flashdata('error', 'Invalide login session');
            redirect('support/login');
        }
		$support = $this->support_model->get(['id' => $id]);
		if($support != false) {
			$this->form_validation->set_rules('reply_subject', 'Subject', 'trim|xss_clean|min_length[0]|max_length[200]');
			if($_POST['quick_replies'] == ''){
				$this->form_validation->set_rules('reply_message', 'Message', 'trim|xss_clean|min_length[0]|max_length[5000]');
			}
			
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
								$message1 = array('error' => $this->upload->display_errors());
								$this->session->set_flashdata('message', $message1);
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
				
				if($_POST['quick_replies'] != ''){
					$quick = $this->support_model->getQuickReply($_POST['quick_replies']);
		
					$msg = $quick->message_sentence;
				}
				
				
				$MAIL = $this->smtp_model->get(array('id' => 1));
				$reply_link = site_url('user/support/'.$id.'/ticket_edit');
				$check = supportSendReply($support,$subject,$message,"",$MAIL,array(),array(),$attachment['attachment'],$reply_link);

				if($check['status'] != false) {
					$this->support_model->update(array('last_action' => date('Y-m-d H:i:s'), 'status'=>'Replied', 'reminder_update_date' => date('Y-m-d H:i:s'), 'reminder_count' => 0), $id);
					$data = array(
						'message' => $msg,
						'support_id' => $id,
						'addedBy' => $this->session->userdata('UserId'),
						'attachments' => $attachment['attachment'],
					);
					$lastid = $this->support_model->insert_operation_id($data, 'support_replies');

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

			redirect('user/support/'.$id.'/ticket_edit');
		} else show_404();
	}
	
	public function ticket_add(){
		$this->data['css_type'] 	= array("form");
		$this->data['active_class'] = "support";
		$this->data['gmaps'] 	= false;
		$this->data['title'] 	= $this->lang->line("support");
		$this->data['title_link'] 	= site_url('support/my_tickets');
		$this->data['subtitle'] = "Add";
		$this->data['content']  = 'admin/support/users_data/add';
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->ticket_store();
		}
		$this->_render_page('templates/support_template', $this->data);
	}

	public function ticket_store(){
			//$error = support_validate();
			if (empty($error)) {
				$id = $this->support_model->create([
					'p_title' 		=> @$_POST['civility'],
					'fname' 		=> @$_POST['name'],
					'lname' 		=> @$_POST['prename'],
					'email' 		=> @$_POST['email'],
					'company' 		=> @$_POST['company_name'],
					'phone' 		=> @$_POST['tel'],
					'mobile' 		=> @$_POST['mobile'],
					'message' 		=> @$_POST['message'],
					'department' 	=> @$_POST['department'],
					'priority' 		=> @$_POST['priority'],
					'status' 		=> @$_POST['status'],
					'subject' 		=> @$_POST['msg_subject'],
					'ip_address'	=> $this->input->ip_address()
				]);
				
				$filename = "";
				if($_FILES['attachments']['name'][0]!=''){
					$this->load->library('upload');
					$files = $_FILES;
					$aantal = count($_FILES['attachments']['name']);
					for($i=0; $i<$aantal; $i++)
					{
						$_FILES['attachments']['name']= $files['attachments']['name'][$i];
						$_FILES['attachments']['type']= $files['attachments']['type'][$i];
						$_FILES['attachments']['tmp_name']= $files['attachments']['tmp_name'][$i];
						$_FILES['attachments']['error']= $files['attachments']['error'][$i];
						$_FILES['attachments']['size']= $files['attachments']['size'][$i];    

						$tmpFilePath = $_FILES['attachments']['tmp_name'];
						
						$filename = time() . '_' .$_FILES['attachments']['name'];
						
						//Make sure we have a file path
						if ($tmpFilePath != ""){
							//Setup our new file path
							$newFilePath = "./uploads/contact_files/" . $filename;

							//Upload the file into the temp dir
							if(move_uploaded_file($tmpFilePath, $newFilePath)) {
								$inputdata1 = array(
												'support_id' => $id,
												'filename' => $filename,
											);
								$this->support_model->insert_operation($inputdata1, 'support_attachments');
							}
						}else{
							$filename = "";
						}
					
					}
				}
				
				$site_settings_rec = $this->db->get('vbs_site_settings')->result() [0];
				$config = Array(
						'protocol' => 'smtp',
						'smtp_host' => 'ssl://smtp.googlemail.com',
						'smtp_port' => 465,
						'smtp_user' => $site_settings_rec->portal_email, // change it to yours
						'smtp_pass' => '*****', // change it to yours
						'mailtype' => 'html',
						'charset' => 'iso-8859-1',
						'wordwrap' => TRUE
				);
				$message            = $this->lang->line('email_received');

				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				$this->email->from($site_settings_rec->portal_email); // change it to yours
				$this->email->reply_to($site_settings_rec->portal_email);
				$this->email->to($this->input->post('email')); // change it to yours
				$this->email->subject('Acknowledgement - Support system');
				$this->email->message($message);
				$this->email->send();

				$this->session->set_flashdata('alert', [
					'message' => "Successfully Created.",
					'class' => "alert-success",
					'type' => "Success"
				]);
				redirect('admin/support/'.$id.'/edit');
			} else {
				$this->data['alert'] = [
					'message' => @$error[0],
					'class' => "alert-danger",
					'type' => "Error"
				];
			}
	}
	
	public function ticket_delete($id){
		$this->support_model->delete($id);
		$this->session->set_flashdata('alert', [
				'message' => "Successfully deleted.",
				'class' => "alert-success",
				'type' => "Success"
		]);
		redirect('support/home');
	}
}