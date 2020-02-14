<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends MY_Controller
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
		$this->load->model('jobs_model');
		$this->load->model('notes_model');
		$this->load->model('calls_model');
        $this->load->model('request_model');
		$this->load->model('support_model');
		
        $this->load->model('smtp_model');
        $this->load->model('notifications_model');
        $this->load->model('popups_model');
        $this->load->model('userx_model');
        $this->load->model('base_model');
        $this->load->model('reminders_model');
		$this->data['configuration'] = get_configuration();
	}

	public function index(){
		$this->data['css_type'] 	= array("form","datatable");
		$this->data['active_class'] = "jobs";
		$this->data['gmaps'] 		= false;
		$this->data['title'] 		= $this->lang->line("jobs");
		$this->data['title_link'] 	= base_url('admin/jobs');
		$this->data['content'] 		= 'admin/jobs/index';

        
        //$this->load->model('jobs_model');

        $data = [];
        $data['request'] = $this->request_model->getAll();
        $data['jobs'] 	 = $this->jobs_model->getAll();
        $data['calls']   = $this->calls_model->getAll();


		$this->data['data'] = $this->jobs_model->getAll();
		$this->data['popups'] = $this->popups_model->get(array('id'=>1));
		$this->data['company_data'] = $this->userx_model->get_company();
		$this->data['MAIL'] = $this->smtp_model->get(array('id' => 1));
		$this->_render_page('templates/admin_template', $this->data);
	}

	public function add(){
		$this->data['css_type'] 	= array("form");
		$this->data['active_class'] = "jobs";
		$this->data['gmaps'] 	= false;
		$this->data['title'] 	= $this->lang->line("jobs");
		$this->data['title_link'] 	= base_url('admin/jobs');
		$this->data['subtitle'] = "Add";
		$this->data['content']  = 'admin/jobs/add';
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->store();
		}

		$this->_render_page('templates/admin_template', $this->data);
	}


	public function store(){
			$error = job_validate(true);
			$CV = $Letter = false;

			createJobFilesPath();
			$this->uploadJobFiles($CV, $Letter, $error);

			if (empty($error)) {
				$evaluation = [
					'communication' => $this->input->post('communication'),
					'presentation' 	=> $this->input->post('presentation'),
					'driving' 		=> $this->input->post('driving'),
					'look' 			=> $this->input->post('look'),
					'experience' 	=> $this->input->post('experience'),
				];

				$dob = to_unix_date(@$_POST['dob']);
				$id = $this->jobs_model->create([
					'civility' 		=> @$_POST['civility'],
					'first_name' 	=> @$_POST['name'],
					'last_name' 	=> @$_POST['prename'],
					'email' 		=> @$_POST['email'],
					'telephone' 	=> @$_POST['tel'],
					'postal_code' 	=> @$_POST['postal_code'],
					'dob' 			=> $dob,
					'age' 			=> calculateAge($dob),
					'status' 		=> @$_POST['status'],
					'msg_subject' 	=> @$_POST['msg_subject'],
					'cv' 			=> $CV != false ? json_encode($CV) : '',
					'letter' 		=> $Letter != false ? json_encode($Letter) : '',
					'evaluation' 	=> json_encode($evaluation),
					'ip_address'	=> $this->input->ip_address(),
				]);

				$notes = $this->notes_model->createNotesArray($id, 'job');
				if(!empty($notes)) $this->notes_model->bulkInsert($notes);

				$this->session->set_flashdata('alert', [
					'message' => "Successfully Created.",
					'class' => "alert-success",
					'type' => "Success"
				]);
				redirect('admin/jobs/'.$id.'/edit');
			} else {
				$this->data['alert'] = [
					'message' => @$error[0],
					'class' => "alert-danger",
					'type' => "Error"
				];
			}
	}

	public function edit($id){

		$this->data['data'] 		= $this->jobs_model->get(['id' => $id]);
		if($this->data['data'] != false) {
			$this->data['css_type'] = array("form");
			$this->data['active_class'] = "jobs";
			$this->data['gmaps'] 	= false;
			$this->data['title'] 	= $this->lang->line("jobs");
			$this->data['title_link'] 	= base_url('admin/jobs');
			$this->data['subtitle'] = create_timestamp_uid($this->data['data']->created_at,$id);
			$this->data['content']  = 'admin/jobs/edit';
			$this->data['evaluation']  = json_decode($this->data['data']->evaluation, true);
			$this->load->model('quick_replies_model');
			$this->data['quick_replies']  = $this->quick_replies_model->getAll(array('delete_bit' => 0, 'status' => 1, 'module' => 1));
			if($this->data['data']->unread != 0)
				$this->jobs_model->update(['unread' => 0], $id);

			if($this->data['data']->status == "New")
				$this->jobs_model->update(['Status' => "Pending", 'reminder_update_date' => "", 'reminder_count' => 0], $id);

			$this->data['notes'] = $this->notes_model->getAll(['type' => 'job','type_id' => $id]);
            $this->data['replies'] = $this->base_model->get_replies($id, 1);
			$this->data['company_data'] = $this->userx_model->get_company();
			$this->_render_page('templates/admin_template', $this->data);
		} else show_404();
	}

	public function update($id){
		$job = $this->jobs_model->get(['id' => $id]);
		if($job != false) {
//			$error = job_validate(false);
//			$CV = $Letter = false;

//			createJobFilesPath();
//			$this->uploadJobFiles($CV, $Letter, $error);

			if (empty($error)) {

				$evaluation = [
					'communication' => $this->input->post('communication'),
					'presentation' 	=> $this->input->post('presentation'),
					'driving' 		=> $this->input->post('driving'),
					'look' 			=> $this->input->post('look'),
					'experience' 	=> $this->input->post('experience'),
				];

//				$dob = to_unix_date(@$_POST['dob']);
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
				$notifications = $this->notifications_model->get(array('status'=>$check, 'department'=>1, 'notification_status'=>1));
				if($notifications != null && !empty($notifications)){
					$MAIL = $this->smtp_model->get(array('id' => 1));
					$company_data = $this->userx_model->get_company();
					$job_reply = $this->jobs_model->get_reply($job->id);
					$message .= $notifications->message;
					$subject = $notifications->subject;
					$subject = str_replace("{job_request_subject}","Candidature Chauffeur Handi-Express.fr",$subject);	
					if(!empty($job_reply)){
						$message = str_replace("{last_job_request_user_reply}",$job_reply[0]->message,$message);	
					}else{
						$message = str_replace("Reply : {last_job_request_user_reply}","",$message);	
					}
					$message = str_replace("{job_request_sender_email}",$job->email,$message);
					$message = str_replace("{job_request_date}",from_unix_date($job->created_at),$message);
					$message = str_replace("{job_request_time}",from_unix_time($job->created_at),$message);
					$message = str_replace("{job_request_civility}",$job->civility,$message);
					$message = str_replace("{job_request_first_name}",$job->first_name,$message);
					$message = str_replace("{job_request_last_name}",$job->last_name,$message);
					$message = str_replace("Company : {job_request_company_name}","",$message);
					$message = str_replace("{job_request_subject}",$job->subject,$message);
					$message = str_replace("{job_request_message}",$job->message,$message);
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
					$check = sendReply($job,$subject,$message,"job",$MAIL,array(),array(),array(@$_POST['status']));
				}
				if($_POST['status'] == "Replied"){
					$this->jobs_model->update([
	/*						'civility' 		=> @$_POST['civility'],
							'first_name' 	=> @$_POST['name'],
							'last_name' 	=> @$_POST['prename'],
							'email' 		=> @$_POST['email'],
							'telephone' 	=> @$_POST['tel'],
							'postal_code' 	=> @$_POST['postal_code'],
							'dob' 			=> $dob,
							'age' 			=> calculateAge($dob),*/
							'status' 		=> @$_POST['status'],
							'evaluation' 	=> json_encode($evaluation),
							'reminder_update_date' 		=> date('Y-m-d H:i:s'),
							'reminder_count' 		=> 0,
	/*						'cv' 			=> $CV != false ? json_encode($CV) : $job->cv,
							'letter' 		=> $Letter != false ? json_encode($Letter) : $job->letter,*/
					], $id);
				}else{
					$this->jobs_model->update([
	/*						'civility' 		=> @$_POST['civility'],
							'first_name' 	=> @$_POST['name'],
							'last_name' 	=> @$_POST['prename'],
							'email' 		=> @$_POST['email'],
							'telephone' 	=> @$_POST['tel'],
							'postal_code' 	=> @$_POST['postal_code'],
							'dob' 			=> $dob,
							'age' 			=> calculateAge($dob),*/
							'status' 		=> @$_POST['status'],
							'evaluation' 	=> json_encode($evaluation),
							'reminder_update_date' 		=> date('Y-m-d H:i:s'),
							'reminder_count' 		=> 0,
	/*						'cv' 			=> $CV != false ? json_encode($CV) : $job->cv,
							'letter' 		=> $Letter != false ? json_encode($Letter) : $job->letter,*/
					], $id);
				}

				$this->notes_model->delete(['type' => 'job', 'type_id' => $id]);
				$notes = $this->notes_model->createNotesArray($id, 'job');
				if(!empty($notes)) $this->notes_model->bulkInsert($notes);

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

			redirect('admin/jobs/'.$id.'/edit');
		} else show_404();
	}

	/*public function reply($id){
		$call = $this->jobs_model->get(['id' => $id]);
		if($call != false) {
			$this->form_validation->set_rules('reply_subject', 'Subject', 'trim|xss_clean|min_length[0]|max_length[200]');
			$this->form_validation->set_rules('reply_message', 'Message', 'trim|xss_clean|min_length[0]|max_length[5000]');
			if ($this->form_validation->run() !== false) {

				$subject = isset($_POST['reply_subject']) ? $_POST['reply_subject'] : '';
				$message = isset($_POST['reply_message']) ? $_POST['reply_message'] : '';
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
				$check = sendReply($call,$subject,$message, "job",$MAIL);

				if($check['status'] != false) {
					$this->jobs_model->update(['last_action' => date('Y-m-d H:i:s')], $id);
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

			redirect('admin/jobs/'.$id.'/edit');
		} else show_404();
	}*/
	
	public function reply($id){
		$call = $this->jobs_model->get(['id' => $id]);
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
				$check = sendReply($call,$subject,$message, "job",$MAIL,$attachment['attachment']);

				if($check['status'] != false) {
					$this->jobs_model->update(array('last_action' => date('Y-m-d H:i:s'), 'status'=>'Replied', 'reminder_update_date' => date('Y-m-d H:i:s'), 'reminder_count' => 0), $id);
					$data = array(
						'subject' => $subject,
						'message' => $msg,
						'request_id' => $id,
						'type' => 1,
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

			redirect('admin/jobs/'.$id.'/edit');
		} else show_404();
	}

	public function delete($id){
		$this->jobs_model->delete($id);

		$this->session->set_flashdata('alert', [
				'message' => "Successfully deleted.",
				'class' => "alert-success",
				'type' => "Success"
		]);
		redirect('admin/jobs');
	}

	public function uploadJobFiles(&$CV, &$Letter, &$error){

		$this->load->library('upload');
		if(isset($_FILES['cv']['name']) && !empty($_FILES['cv']['name'])){
			$config['upload_path'] 				= './uploads/jobs/cv/'. date('Y-m-d') . '/';
			$config['allowed_types'] 			= 'doc|docx|pdf';
			$config['max_size'] 				= '10240';
			$config['file_name'] 				= str_replace(' ', '_', $_FILES['cv']['name']);

			$this->upload->initialize($config);
			if (!$this->upload->do_upload('cv')) {
				$error[] = $this->upload->display_errors();
			} else {
				$CV =  $this->upload->data();
				$CV['upload_path'] = 'uploads/jobs/cv/'. date('Y-m-d') . '/' . $CV['file_name'];
			}
		}

		if(isset($_FILES['letter']['name']) && !empty($_FILES['letter']['name'])){
			$letterConfig['upload_path'] 	= './uploads/jobs/letter/'. date('Y-m-d') . '/';
			$letterConfig['allowed_types'] 	= 'doc|docx|pdf';
			$letterConfig['max_size'] 		= '10240';
			$letterConfig['file_name'] 		= str_replace('_', '', $_FILES['letter']['name']);
			$this->upload->initialize($letterConfig);
			if (!$this->upload->do_upload('letter')) {
				$error[] = $this->upload->display_errors();
			} else {
				$Letter =  $this->upload->data();
				$Letter['upload_path'] = 'uploads/jobs/letter/'. date('Y-m-d') . '/' . $Letter['file_name'];
			}
		}
	}
}