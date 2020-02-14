<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


defined('BASEPATH') OR exit('No direct script access allowed');
class Infraction extends MY_Controller

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
		$this->load->model('custom_model');
		$this->load->model('infraction_model');
		$this->data['configuration'] = get_configuration();

		error_reporting(E_ALL);
		ini_set('display_errors', 1);
	}

	public function clean_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	public function index(){
		$this->data['css_type'] 	= array("form","datatable");
		$this->data['active_class'] = "infraction";
		$this->data['gmaps'] 		= false;
		$this->data['title'] 		=	'Infraction';
		$this->data['title_link'] 	= base_url('admin/request');
		$this->data['content'] 		= 'admin/infraction/index';

    $this->load->model('calls_model');
    $this->load->model('jobs_model');

    $data = [];
    $data['request'] = $this->request_model->getAll();
    $data['jobs'] 	 = $this->jobs_model->getAll();
    $data['calls']   = $this->calls_model->getAll();
    $this->data['popups'] = $this->popups_model->get(array('id'=>1));
    $this->data['data'] = $this->request_model->getAll();
    $this->data['drivers'] = $this->custom_model->get_all_drivers();
    $this->data['payment_methods'] = $this->custom_model->get_all_payment_methods();
    $this->data['infractions'] = $this->infraction_model->getAll();
		$this->_render_page('templates/admin_template', $this->data);
	}

	public function add(){
		$this->data['css_type'] 	= array("form");
		$this->data['active_class'] = "request";
		$this->data['gmaps'] 	= false;
		$this->data['title'] 	= 'Infraction'; //$this->lang->line("infraction");
		$this->data['title_link'] = base_url('admin/infraction');
		$this->data['subtitle'] = "Add";
		$this->data['content']  = 'admin/infraction/add';
		$this->data['drivers'] = $this->custom_model->get_all_drivers();
		$this->data['payment_methods'] = $this->custom_model->get_all_payment_methods();
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->store();
		}

		$this->_render_page('templates/admin_template', $this->data);
	}

	public function store(){

        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('infraction_date', 'Infraction_date', 'required');
        $this->form_validation->set_rules('infraction_number', 'Infraction_number', 'required');
        $this->form_validation->set_rules('stationary_fast_category', 'Stationary fast category', 'required');
        $this->form_validation->set_rules('deduced_points', 'Deduced points', 'required');
        $this->form_validation->set_rules('driver', 'Driver', 'required');
        $this->form_validation->set_rules('infraction_date2', 'infraction date', 'required');
        $this->form_validation->set_rules('infraction_time', 'Infraction time', 'required');
        $this->form_validation->set_rules('postal_code', 'Postal code', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('amount1', 'Amount', 'required');
        $this->form_validation->set_rules('delay1', 'Delay', 'required');
        $this->form_validation->set_rules('amount2', 'Amount', 'required');
        $this->form_validation->set_rules('delay2', 'Delay', 'required');
        $this->form_validation->set_rules('amount3', 'Amount', 'required');
        $this->form_validation->set_rules('delay3', 'Delay', 'required');
        $this->form_validation->set_rules('paid_amount', 'Paid amount', 'required');
        $this->form_validation->set_rules('payment_method', 'Payment method', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');

      $error = validation_errors();
			if (empty($error)) {
				$this->infraction_model->create([
					'status' => $this->clean_input($this->input->post('status')),
					'infraction_date' => $this->clean_input($this->input->post('infraction_date')),
					'infraction_number' => $this->clean_input($this->input->post('infraction_number')),
					'stationary_fast_category' => $this->clean_input($this->input->post('stationary_fast_category')),
					'deduced_points' => $this->clean_input($this->input->post('deduced_points')),
					'driver' => $this->clean_input($this->input->post('driver')),
					'infraction_date2' => $this->clean_input($this->input->post('infraction_date2')),
					'infraction_time' => $this->clean_input($this->input->post('infraction_time')),
					'address' => $this->clean_input($this->input->post('address')),
					'postal_code' => $this->clean_input($this->input->post('postal_code')),
					'city' => $this->clean_input($this->input->post('city')),
					'amount1' => $this->clean_input($this->input->post('amount1')),
					'delay1' => $this->clean_input($this->input->post('delay1')),
					'amount2' => $this->clean_input($this->input->post('amount2')),
					'delay2' => $this->clean_input($this->input->post('delay2')),
					'amount3' => $this->clean_input($this->input->post('amount3')),
					'delay3' => $this->clean_input($this->input->post('delay3')),
					'paid_amount' => $this->clean_input($this->input->post('paid_amount')),
					'payment_method' => $this->clean_input($this->input->post('payment_method')),
					'message' => $this->clean_input($this->input->post('message')),
				]);

				$this->session->set_flashdata('alert', [
					'message' => "Successfully Created.",
					'class' => "alert-success",
					'type' => "Success"
				]);
				redirect('admin/infraction/add');
				// redirect('admin/request/'.$id.'/edit');
			} else {
				$this->data['alert'] = [
					'message' => @$error[0],
					'class' => "alert-danger",
					'type' => "Error"
				];
			}
	}

	public function edit($id){
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->form_validation->set_rules('status', 'Status', 'required');
			$this->form_validation->set_rules('infraction_date', 'Infraction_date', 'required');
			$this->form_validation->set_rules('infraction_number', 'Infraction_number', 'required');
			$this->form_validation->set_rules('stationary_fast_category', 'Stationary fast category', 'required');
			$this->form_validation->set_rules('deduced_points', 'Deduced points', 'required');
			$this->form_validation->set_rules('driver', 'Driver', 'required');
			$this->form_validation->set_rules('infraction_date2', 'infraction date', 'required');
			$this->form_validation->set_rules('infraction_time', 'Infraction time', 'required');
			$this->form_validation->set_rules('postal_code', 'Postal code', 'required');
			$this->form_validation->set_rules('address', 'Address', 'required');
			$this->form_validation->set_rules('city', 'City', 'required');
			$this->form_validation->set_rules('amount1', 'Amount', 'required');
			$this->form_validation->set_rules('delay1', 'Delay', 'required');
			$this->form_validation->set_rules('amount2', 'Amount', 'required');
			$this->form_validation->set_rules('delay2', 'Delay', 'required');
			$this->form_validation->set_rules('amount3', 'Amount', 'required');
			$this->form_validation->set_rules('delay3', 'Delay', 'required');
			$this->form_validation->set_rules('paid_amount', 'Paid amount', 'required');
			$this->form_validation->set_rules('payment_method', 'Payment method', 'required');
			$this->form_validation->set_rules('message', 'Message', 'required');

      $error = validation_errors();
			if (empty($error)) {
				$this->infraction_model->update([
					'status' => $this->clean_input($this->input->post('status')),
					'infraction_date' => $this->clean_input($this->input->post('infraction_date')),
					'infraction_number' => $this->clean_input($this->input->post('infraction_number')),
					'stationary_fast_category' => $this->clean_input($this->input->post('stationary_fast_category')),
					'deduced_points' => $this->clean_input($this->input->post('deduced_points')),
					'driver' => $this->clean_input($this->input->post('driver')),
					'infraction_date2' => $this->clean_input($this->input->post('infraction_date2')),
					'infraction_time' => $this->clean_input($this->input->post('infraction_time')),
					'address' => $this->clean_input($this->input->post('address')),
					'postal_code' => $this->clean_input($this->input->post('postal_code')),
					'city' => $this->clean_input($this->input->post('city')),
					'amount1' => $this->clean_input($this->input->post('amount1')),
					'delay1' => $this->clean_input($this->input->post('delay1')),
					'amount2' => $this->clean_input($this->input->post('amount2')),
					'delay2' => $this->clean_input($this->input->post('delay2')),
					'amount3' => $this->clean_input($this->input->post('amount3')),
					'delay3' => $this->clean_input($this->input->post('delay3')),
					'paid_amount' => $this->clean_input($this->input->post('paid_amount')),
					'payment_method' => $this->clean_input($this->input->post('payment_method')),
					'message' => $this->clean_input($this->input->post('message')),
				], ['id' => $id]);

				$this->session->set_flashdata('alert', [
					'message' => "Successfully Created.",
					'class' => "alert-success",
					'type' => "Success"
				]);
				redirect('admin/infraction/' . $id . '/edit');
				// redirect('admin/request/'.$id.'/edit');
			} else {
				$this->data['alert'] = [
					'message' => @$error[0],
					'class' => "alert-danger",
					'type' => "Error"
				];
			}
		}
		$this->data['infraction'] = $this->infraction_model->get(['id' => $id]);
		if(count($this->data['infraction']) > 0) {
			$this->data['css_type'] = array("form");
			$this->data['active_class'] = "infraction";
			$this->data['gmaps'] = false;
			$this->data['title'] 	= 'Infraction';
			$this->data['title_link'] = base_url('admin/infraction');
			$this->data['subtitle'] = $id;
			$this->data['content']  = 'admin/infraction/edit';
			
			$this->load->model('quick_replies_model');
			$this->data['quick_replies']  = $this->quick_replies_model->getAll(array('delete_bit' => 0, 'status' => 1, 'module' => 2));
			
			// if($this->data['data']->unread != 0)
			// 	$this->request_model->update(['unread' => 0], $id);

			// if($this->data['data']->status == "New")
			// 	$this->request_model->update(['Status' => "Pending"], $id);
			
			$this->data['replies'] = $this->base_model->get("request_replies", array('request_id'=>$id));
			$this->data['company_data'] = $this->userx_model->get_company();
			$this->data['drivers'] = $this->custom_model->get_all_drivers();
			$this->data['payment_methods'] = $this->custom_model->get_all_payment_methods();
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
					$message .= $notifications->message;
					$message .= '<br><br><div class="row section-company-info" style=" background: -webkit-linear-gradient(#efefef, #ECECEC, #CECECE);margin: 10px 0px;max-height: 600px;border: 2px solid #a4a8ab;padding:10px;">
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
					$check = sendReply($request,$notifications->subject,$message,"",$MAIL,array(@$_POST['status']));
				}
				//$dob = to_unix_date(@$_POST['dob']);
				$this->request_model->update([
/*						'civility' 		=> @$_POST['civility'],
						'first_name' 	=> @$_POST['name'],
						'last_name' 	=> @$_POST['prename'],
						'email' 		=> @$_POST['email'],
						'telephone' 	=> @$_POST['tel'],
						//'dob' 			=> @$dob,
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
			redirect('admin/request/'.$id.'/edit');
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
				$MAIL = $this->smtp_model->get(array('id' => 1));
				$message .= '<br><br><div class="row section-company-info" style=" background: -webkit-linear-gradient(#efefef, #ECECEC, #CECECE);margin: 10px 0px;max-height: 600px;border: 2px solid #a4a8ab;padding:10px;">
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
						'message' => $message,
						'request_id' => $id,
						'addedBy' => $this->session->userdata('user')->id,
						'created_at' => date('Y-m-d H:i:s'),
					);
					$this->base_model->SaveForm('vbs_request_replies', $data);
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
		$this->infraction_model->delete($id);
		$this->session->set_flashdata('alert', [
				'message' => "Successfully deleted.",
				'class' => "alert-success",
				'type' => "Success"
		]);
		redirect('admin/infraction');
	}
}