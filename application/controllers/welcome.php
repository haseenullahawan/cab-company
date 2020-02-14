<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Welcome extends MY_Controller
{
	/*
	| -----------------------------------------------------
	| PRODUCT NAME: 	DIGI VEHICLE BOOKING SYSTEM (DVBS)
	| -----------------------------------------------------
	| AUTHOR:			DIGITAL VIDHYA TEAM
	| -----------------------------------------------------
	| EMAIL:			digitalvidhya4u@gmail.com
	| -----------------------------------------------------
	| COPYRIGHTS:		RESERVED BY DIGITAL VIDHYA
	| -----------------------------------------------------
	| WEBSITE:			http://digitalvidhya.com
	|                   http://codecanyon.net/user/digitalvidhya
	| -----------------------------------------------------
	|
	| MODULE: 			Welcome
	| -----------------------------------------------------
	| This is welcome module controller file.
	| -----------------------------------------------------
	*/
	public function __construct()
	{
		parent::__construct();
		// To use site_url and redirect on this controller.
		$this->load->helper('url');
		$this->form_validation->set_error_delimiters(
				$this->config->item('error_start_delimiter', 'ion_auth'),
				$this->config->item('error_end_delimiter', 'ion_auth')
		);
        $this->load->model('quick_replies_model');
		$this->data['configuration'] = get_configuration();
	}

	private function addMetaData($page = 'home', $data = [])
	{
		$data['meta_keywords'] = "tpmr;transport pmr;pmr transport;transport handicapé;transport handicapés;handicapé transport;transport handicape;transport handicap;transport mobilité réduite;transport adapté;transports handicapés;transport des handicapés;transport enfant handicapé;transports handicapés;transport personne agée;taxi handicapé;handicapé taxi;taxi pmr;taxi avec rampe;transport handicapes;transport de personnes handicapées;transport de personne handicapé;transport personnes âgées;transport personnes handicapées;transport de personnes à mobilité réduite;transport personne mobilité réduite;transport de personnes agées;transport personnes agée;transport personnes handicapées;transport personne handicapée;transport personne agée​";
		$data['meta_description'] = "HANDI EXPRESS Le spécialiste du transport de personnes à mobilité réduite,Transport de personnes handicapées et Transport de personne âgées.Tout Trajet - Toute Distance 24h/24 - 7j/7.";
		switch ($page) {
			case "home":
				$data['title'] = 'HANDI EXPRESS Transport de personnes à mobilité réduite';
				break;
			case "onlineBooking":
				$data['title'] = "Réservation - Handi-Express";
				break;
			case "contactUs":
				$data['title'] = "contact@handi-express.fr";
				break;
			case "faqs":
				$data['title'] = "Base de connaissances - HANDI EXPRESS";
				break;
			case "prices":
				$data['title'] = "NOS-TARIFS - HANDI EXPRESS";
				break;
			case "fleet":
				$data['title'] = "Parc - HANDI EXPRESS";
				break;
			case "termsServices":
				$data['title'] = "Conditions d'utilisation - HANDI EXPRESS";
				break;
			case "privacyPolicy":
				$data['title'] = "Politique de vie privée - HANDI EXPRESS";
				break;
			case "legalNotice":
				$data['title'] = "Mentions Légales - HANDI EXPRESS";
				break;
			case "zones":
				$data['title'] = "Zones - HANDI EXPRESS";
				break;
		}
		return $data;
	}

	

	function onlineReservation() {
		$this->data['css_type'] 		= array("form","onlinebooking");
		$this->data['page'] = 'booking_page';
		$this->data['vehicles'] = $this->db->get($this->db->dbprefix('vehicle'))->result();
		$this->data['heading'] 			= $this->lang->line('reservation');
		$this->data['sub_heading'] 		= $this->lang->line('reservation');
		$this->data['bread_crumb'] 		= true;
		$this->data['active_class'] 	= "onlinebooking";
		$this->data['title'] 			= $this->lang->line('welcome_to_DVBS');
		$this->data = $this->addMetaData("onlineReservation", $this->data);
		$this->data['content'] 			= 'site/reservation';
		$this->_render_page('templates/site_template', $this->data);
	}




	

	function payment()
	{
		if ($this->input->post()) {
			$this->session->unset_userdata('user');
			$this->data['user'] = $this->input->post();
			$this->session->set_userdata('user', $this->input->post());
		}

		$this->data['user'] = $this->db->query("SELECT u.*,ud.address1 as address1, ud.address2 as address2, ud.company_name as company_name, ud.fax_no as fax_no FROM vbs_users u LEFT JOIN vbs_users_details ud ON ud.user_id = u.id WHERE u.id=".$this->ion_auth->get_user_id())->result_array() [0];
		$this->data['journey_details'] 		= $this->session->userdata('journey_details');
		$this->data['title'] 				= $this->lang->line('welcome_to_DVBS');
		$this->data['css_type'] 			= array("form", "datatable");
		$this->data['heading'] 				= $this->lang->line('payment_details');
		$this->data['sub_heading'] 			= "Payment Details";
		$this->data['bread_crumb'] 			= true;
		$this->data['content'] 				= 'site/payment';
		$this->_render_page('templates/site_template', $this->data);
	}

	// FUNCTION FOR CONTACT US
	function contactUs(){
		$this->data['message'] 				= "";
		
		if ($this->input->post()) {
			
			// form validations
			$this->form_validation->set_rules('name', 'Name', 'required|xss_clean');
			$this->form_validation->set_rules('telephone', 'Phone number', 'required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'required|xss_clean');
			//$this->form_validation->set_rules('booking_no', 'Booking Number', 'trim|xss_clean');
			$this->form_validation->set_rules('message', 'Message', 'required|xss_clean');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			//if ($this->form_validation->run() === TRUE) {
				
				$user_id = $this->base_model->run_query2('SELECT id FROM vbs_users WHERE email="'.$this->input->post('email').'"')['id'];
				
				if($user_id==''){
					$dta = array(
						"ip_address"   =>$_SERVER['REMOTE_ADDR'],
						"username"   => $this->input->post('email'),
						"civility"  => $this->input->post('civility'),
						"first_name" => $this->input->post('first_name'),
						"last_name"  => $this->input->post('last_name'),
						"company_name"  => $this->input->post('company_name'),
						"email" => $this->input->post('email'),
						"phone" => $this->input->post('telephone'),
						"password"   => md5($this->input->post('telephone')),
						"role_id" => '10',
						"department_id" => '2',
					);

					$user_id = $this->base_model->insert_operation_id($dta, 'users');
				}
				
				$user_details = $this->base_model->run_query2('SELECT username,phone FROM vbs_users WHERE id="'.$user_id.'"');
				$inputdata = array(
					'user_id' => $user_id,
					'p_title' => $this->input->post('civility'),
					'fname' => $this->input->post('first_name'),
					'lname' => $this->input->post('last_name'),
					'company' => $this->input->post('company_name'),
					'email' => $this->input->post('email'),
					'phone' => $this->input->post('telephone'),
					'mobile' => $this->input->post('mobile'),
					'department' => $this->input->post('department'),
					'priority' => $this->input->post('priority'),
					'subject' => $this->input->post('subject'),
					'message' => $this->input->post('visit_message'),
					'unread' => 1,
					'status' => 'New',
					'ip_address'	=> $this->input->ip_address()
				);
				$support_id = $this->base_model->insert_operation_id($inputdata, 'support');
				
				
				
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
												'support_id' => $support_id,
												'filename' => $filename,
											);
								$this->base_model->insert_operation($inputdata1, 'support_attachments');
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
				$this->data['info'] 		= $this->input->post();
				$message 					= $this->load->view(
						'email_format.php',
						$this->data,
						TRUE
				);

				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				$this->email->from($site_settings_rec->portal_email); // change it to yours
				$this->email->reply_to($this->input->post('email'));
				$this->email->to($site_settings_rec->portal_email); // change it to yours
				$this->email->subject('Support system query');
				$this->email->message($message);
				if ($this->email->send()) {
					$message 			= $this->lang->line('email_received');
					$message 			.= '<br/><br/> :<a href="'.site_url('support/login').'">Login Link</a><br/>';
					$message 			.= $this->lang->line('forgot_password_username_identity_label').':- '.$user_details['username'];
					$message 			.= '<br/>'.$this->lang->line('create_user_validation_password_label').':- '.$user_details['phone'];
					$this->email->set_newline("\r\n");
					$this->email->from($site_settings_rec->portal_email); // change it to yours
					$this->email->to($this->input->post('email'));
					$this->email->subject('Acknowledgement - Support system');
					$this->email->message($message);
					$this->email->send();
					
					$this->prepare_flashmessage($this->lang->line('email_sent_successfully_we_will_contact_you_as_soon_as_possible'), 0);
					redirect('welcome/contactUs', 'refresh');
				}
				else {
					$this->prepare_flashmessage($this->lang->line('unable_to_send_email'), 1);
					redirect('welcome/contactUs', 'refresh');
				}
			//}
			// echo "<pre>";
		// print_r('Hello');
		// echo "</pre>";
		}
			$this->data = $this->addMetaData("contactUs", $this->data);
		$this->data['css_type'] 			= array("form");
		$this->data['title'] 				= 'Contact Us'; // $this->lang->line('contact_us');
		$this->data['heading'] 				= 'Contact Us'; // $this->lang->line('contact_us');
		$this->data['active_class'] 		= "contactus";
		$this->data['sub_heading'] 			= $this->lang->line('contact_us');
		$this->data['bread_crumb'] 			= true;
	 	$this->data['content'] 				= 'site/contact_us';
		$this->_render_page('templates/site_template', $this->data);
	}

	function paymentConfirmation()
	{
		if ($this->input->post()) {
			$payment_mode 					= $this->input->post();
			if($this->session->userdata('journey_details')['booking_ref'] != "") {
				$this->data['journey_details'] 	= $this->session->userdata('journey_details');
				//  $this->data['user'] 			= $this->session->userdata('user');
				$this->data['user'] = $this->db->query("SELECT u.*,ud.address1 as address1, ud.address2 as address2 FROM vbs_users u LEFT JOIN vbs_users_details ud ON ud.user_id = u.id WHERE u.id=".$this->ion_auth->get_user_id())->result_array() [0];
				$this->data['payment_mode'] 	= $this->input->post('radiog_dark');
				if (
						$this->ion_auth->logged_in() &&
						$this->ion_auth->is_member()
				)
					$inputdata['user_id'] 			= $this->ion_auth->get_user_id();
				$inputdata['booking_ref'] 		= $this->data['journey_details']['booking_ref'];
				$inputdata['pick_date'] 		= date('Y-m-d', strtotime($this->data['journey_details']['pick_date']));
				$inputdata['pick_time'] 		= $this->data['journey_details']['pick_time'];
				$inputdata['pick_point'] 		= $this->data['journey_details']['pick_up'];
				$inputdata['drop_point'] 		= $this->data['journey_details']['drop_of'];
				$dis_info 						= explode(
						" ",
						$this->data['journey_details']['total_distance']
				);
				$vehicle_id 					= explode(
						"_",
						$this->data['journey_details']['radiog_dark']
				);
				$inputdata['distance'] 			= $dis_info[0];
				$inputdata['vehicle_selected'] 	= $vehicle_id[0];
				$inputdata['cost_of_journey'] 	= $this->data['journey_details']['total_cost'];
				$inputdata['payment_type'] 		= str_replace("_"," ", $payment_mode['radiog_dark']);
				if ($payment_mode['radiog_dark'] == "cash" || $payment_mode['radiog_dark'] == "cash_to_driver") {
					$inputdata['payment_received'] = "0";
				}
				$inputdata['is_conformed'] 		= "pending";
				$inputdata['bookdate'] 			= date('Y-m-d');
				$inputdata['registered_name'] 	= $this->data['user']['username'];
				$inputdata['phone'] 			= $this->data['user']['phone'];
				$inputdata['email'] 			= $this->data['user']['email'];
				if (isset($this->data['user']['information']) && $this->data['user']['information'] != "") {
					$inputdata['info_to_drivers'] 	= $this->data['user']['information'];
				}
				else {
					$inputdata['info_to_drivers'] 	= "-";
				}

				$inputdata['package_type'] 		= $this->data['journey_details']['package_type'];

				$recs = $this->db->get_where($this->db->dbprefix('vehicle') , array(
						'status' => 'active','id' =>  $vehicle_id[0]
				))->result();
				$fquery = "SELECT f.features as feature_name
                                            FROM vbs_vehicle_features vf
                                                INNER JOIN vbs_features f ON f.id = vf.feature_id
                                            WHERE vf.vehicle_id = " . $vehicle_id[0];
				$records = $this->base_model->run_query($fquery);
				$show_wheelchair = 'No';
				foreach($records as $frow) {
					if (strpos($frow->feature_name,'TPMR') !== false) {
						$show_wheelchair = 'Yes';
					}
				}

				foreach($recs as $r) {
					$this->data['journey_details']['wheelchair'] = $show_wheelchair;
					$this->data['journey_details']['passengers_capacity'] = $r->passengers_capacity;
					$this->data['journey_details']['large_luggage_capacity'] = $r->large_luggage_capacity;
					$this->data['journey_details']['small_luggage_capacity'] = $r->small_luggage_capacity;
				}



				if ($inputdata['payment_type'] == "paypal") {
					$this->session->set_userdata('bookinginfo', $inputdata);
					redirect('payment/paynow');
				}
				/*
                echo "<PRE>";
                echo "Journey Details : ";
                print_r($this->data['journey_details']);
                echo "User : ";
                print_r($this->data['user']);
                echo "Payment Mode : ";
                print_r($payment_mode);
                echo "Input Data : ";
                print_r($inputdata);
                echo "</PRE>";
                */

				$table 							= "bookings";
				if ($this->base_model->insert_operation($inputdata, $table)) {
					// email funuctionality
					$site_settings_rec 			= $this->db->get('vbs_site_settings')->result()[0];
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
					$message = $this->load->view(
							'booking_confirmation_email.php',
							$this->data,
							TRUE
					);
					$journey_details = $this->data["journey_details"];
					$journey_user = $this->data["user"];
					$pdf_message = $this->load->view('booking_confirmation_pdf.php',$this->data, TRUE);

					//this the the PDF filename that user will get to download
					$attached_pdf = FCPATH . "/uploads/booking_files/" . $this->data['user']['username'] . "-" . date('Y-m-d-h-i') . ".pdf";
					// Creating MPDF
					/*if (file_exists($attached_pdf) == FALSE) {
                        ini_set('memory_limit','64M'); // boost the memory limit if it's low <img class="emoji" draggable="false" alt="😉" src="https://s.w.org/images/core/emoji/72x72/1f609.png">
                        //  $html = $this->load->view('pdf_report', $message, true); // render the view into HTML

                        $this->load->library('pdf');
                        $pdf = $this->pdf->load();
                        $pdf->WriteHTML($message); // write the HTML into the PDF
                        $pdf->Output($attached_pdf, 'F'); // save to file because we can
                    }*/

					// PDF Using TCPDF
					if (file_exists($attached_pdf) == FALSE) {
						// PDF Content & PDF File path
						$this->createPDF($attached_pdf, $journey_details, $journey_user);
					}

					$this->load->library('email', $config);
					$this->email->set_newline("\r\n");
					$this->email->from($site_settings_rec->portal_email); // change it to yours
					$this->email->to($this->data['user']['email']); // change it to yours
					$this->email->subject('Digital vehicle booking system query');
					$this->email->message($message);
					$this->email->attach($attached_pdf);
					$this->email->send();
					// email functionality end

					// Sending Email to ADMIN
					$this->load->library('email', $config);
					$this->email->set_newline("\r\n");
					$this->email->from($site_settings_rec->portal_email); // change it to yours
					$this->email->to($site_settings_rec->portal_email); // change it to yours
					$this->email->subject('Booking Notification from Navetteo.fr');
					$this->email->message($message);
					$this->email->send();

					$this->session->unset_userdata('bookinginfo');
					$this->session->unset_userdata('user');
					$this->session->unset_userdata('journey_details');
					$this->data['css_type'] 	= array("form");
					$this->data['title'] 		= 'Booking Confirmation';
					$this->data['heading'] 		= "Booking Confirmation";
					$this->data['sub_heading'] 	= "Booking Confirmation";
					$this->data['bread_crumb'] 	= TRUE;
					$this->data['content'] 		= 'site/payment_confirmation';
					$this->_render_page('templates/site_template', $this->data);
				}

			} else redirect('/');
		}
		else {
			redirect('/');
		}
	}

	function createPDF($attached_pdf, $journey_details, $journey_user) {
		$site_settings = $this->base_model->run_query("SELECT * FROM " .  $this->db->dbprefix('site_settings'));
		$navetteo_address = $site_settings[0];

		ini_set('memory_limit','64M'); // boost the memory limit if it's low <img class="emoji" draggable="false" alt="😉" src="https://s.w.org/images/core/emoji/72x72/1f609.png">
		$this->load->library('tcPDF');
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set auto page breaks
		$pdf->SetMargins(10, PDF_MARGIN_TOP, 10);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(0);
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		//  $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		$pdf->AddPage();

		$pdf->Image( base_url() . '/assets/system_design/images/email-logo.png',10,10,50);

		$quote_html = "Quote";

		$pdf->Ln(7);

		$devisBorderColor = array('LTRB' => array('width' => .50, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));

		$companyCell = $pdf->GetY();
		$pdf->SetXY(90,$companyCell);
		$pdf->SetFont('helvetica','B',16);
		$pdf->SetFillColor(255,255,255);
		$pdf->MultiCell(45, 8, $quote_html, $devisBorderColor, 'C', 1, 1, '', '', true, 0, true, true, 10, 'M');

		# Company Details

		$pdf->SetXY(10,$companyCell+16);
		$pdf->SetFillColor(255,255,255);
		$pdf->SetFont('helvetica','B',14);
		$pdf->SetTextColor(0,0,0);
		//  $pdf->MultiCell(50, 10, trim($companyaddress[0]) , 0, 'L', 1, 0, '', '', true, 0, false, true, 10, 'M');
		$pdf->MultiCell(50, 10, 'Navetteo SAS', 0, 'L', 1, 0, '', '', true, 0, false, true, 10, 'M');

		$companyEndCell = $pdf->GetY();
		$pdf->SetFont('helvetica','',10);
		$pdf->SetTextColor(0,0,0);
		$pdf->setCellHeightRatio(1.5);
$company_address = '';
		$company_address .= $navetteo_address->address . "<br/>" ;
		$company_address .= $navetteo_address->zip . " " . $navetteo_address->city . "<br/>" ;
		$company_address .= $navetteo_address->country . "<br/>" ;
		$company_address .= "Email : "  . $navetteo_address->portal_email . "<br/>" ;
		$company_address .= "Tel : "  . $navetteo_address->phone . "<br/>" ;
		$company_address .= "Fax : "  . $navetteo_address->fax . "<br/>" ;
		$pdf->writeHTMLCell(50,150,10,$companyEndCell+10,$company_address,0,0,false,true,'L',true);
		$pdf->SetFont('helvetica','',10);

		$pdf->Ln(30);
		$ref_no = "Réservation N : " . $journey_details['booking_ref'];
		$pdf->writeHTMLCell(50,150,10,$companyEndCell+50,$ref_no,0,0,false,true,'L',true);

		//  # Client Details;
		$tblClientDetailsHtml = '<table width="100%" bgcolor="#fff" cellspacing="1" cellpadding="2" border="0">';
		$tblClientDetailsHtml .= '<tr height="0" bgcolor="#fff" style="font-weight:normal;text-align:left;font-size:11px;">
                                                <td width="60%">&nbsp;</td>
                                                <td width="40%" style="font-weight:normal;text-align:left;font-size:11px;">';
		$tblClientDetailsHtml .= '<br/>' . $journey_user["username"] ;
		$tblClientDetailsHtml .= '<br/>' . $journey_user["address1"] ;
		$tblClientDetailsHtml .= '<br/>' . $journey_user["address2"] ;
		$tblClientDetailsHtml .= '<br/>' . $journey_user["email"] ;
		$tblClientDetailsHtml .= '<br/>' . $journey_user["phone"] ;
		$tblClientDetailsHtml .= '</td> </tr>';
		$tblClientDetailsHtml .= '</table>';
		$pdf->writeHTML($tblClientDetailsHtml, true, false, true, false, '');

		// # Booking Details #ED2939
		$bookingTopHtml = '<table width="100%" bgcolor="#ED2939" cellspacing="0" cellpadding="0" border="0"><tr style="line-height:25%" bgcolor="#ED2939"><td></td></tr></table>';
		$pdf->writeHTML($bookingTopHtml, false, false, false, false, '');
		$bookingHtml =   '<table width="100%" bgcolor="#fff" cellspacing="1" cellpadding="2" border="0">
                                    <tr style="height:40px;">
                                            <td style="width:33.3333%;font-size: 12px; color: #ffffff; text-transform: uppercase;" align="center" valign="middle" bgcolor="#1274ac"><strong>' . $this->lang->line('pick_up_location') . '</strong></td>
                                            <td style="width:33.3333%;font-size: 12px; color: #ffffff; text-transform: uppercase;" align="center" valign="middle" bgcolor="#1274ac"><strong>' . $this->lang->line('drop_of_location') . '</strong></td>
                                            <td style="width:33.3333%;font-size: 12px; color: #ffffff; text-transform: uppercase;" align="center" valign="middle" bgcolor="#1274ac"><strong>' .  $this->lang->line("passenger") . '</strong></td>
                                    </tr>
                                </table>';
		$pdf->writeHTML($bookingHtml, false, false, false, false, '');
		$bookingHtml1 = '   <table width="100%" bgcolor="#fff" cellspacing="1" cellpadding="2" border="0">
                                    <tr style="height:70px;background:#f6f6f6;">
                                            <td style="width:33.3333%;padding: 4px;" valign="top">' . $journey_details['pick_up'] . ' </td>
                                            <td style="width:33.3333%;padding: 4px;" valign="top">' .  $journey_details['drop_of'] . '</td>
                                            <td style="width:33.3333%;padding: 4px;" valign="top">' . $this->lang->line("name") . ' : ' .  $journey_user['username'] . ' <br/>' .  $this->lang->line("email") . ' : ' .  $journey_user["email"] . '<br/>' .  $this->lang->line("phone") . ' : ' .  $journey_user['phone'] . '<br/> </td>
                                    </tr>
                                </table>';
		$pdf->writeHTML($bookingHtml1, false, false, false, false, '');
		$bookingHtml3 = '<table width="100%" bgcolor="#fff" cellspacing="1" cellpadding="2" border="0">
                                    <tr style="height:70px;">
                                            <td style="width:33.3333%;padding: 0px;" valign="top">
                                                    <table style="width:100%;" border="0" cellspacing="0" cellpadding="0" align="left">
                                                            <tbody>
                                                                    <tr style="height:20px;">
                                                                            <td  style="color: #f6f6f6; text-transform: uppercase; font-size: 11px;" align="center" valign="middle" bgcolor="#343434">Date</td>
                                                                            <td  style="color: #f6f6f6; text-transform: uppercase; font-size: 11px;" align="center" valign="middle" bgcolor="#343434">Heure</td>
                                                                    </tr>
                                                                    <tr style="height:60px;">
                                                                            <td  style="color: #ffffff; font-size: 11px;" align="center" valign="middle" bgcolor="#343434;line-height:60px;">' . $journey_details['pick_date'] . '</td>
                                                                            <td  style="color: #ffffff; font-size: 11px;" align="center" valign="middle" bgcolor="#343434;line-height:60px;">' . $journey_details['pick_time'] . '</td>
                                                                    </tr>
                                                            </tbody>
                                                    </table>
                                            </td>
                                            <td style="width:33.3333%;padding: 0px;" valign="top">
                                                    <table style="width:100%;" border="0" cellspacing="0" cellpadding="0" align="left">
                                                            <tbody>
                                                                    <tr style="height:20px;">
                                                                            <td  style="color: #f6f6f6; text-transform: uppercase; font-size: 11px;" align="center" valign="middle" bgcolor="#343434" height="20">Distance</td>
                                                                            <td  style="color: #f6f6f6; text-transform: uppercase; font-size: 11px;" align="center" valign="middle" bgcolor="#343434" height="20">' .  $this->lang->line('amount') . '</td>
                                                                    </tr>
                                                                    <tr style="height:60px;">
                                                                            <td  style="color: #ffffff; font-size: 11px;" align="center" valign="middle" bgcolor="#343434;line-height:60px;">' .  $journey_details['total_distance'] . '</td>
                                                                            <td  style="color: #ffffff; font-size: 11px;" align="center" valign="middle" bgcolor="#343434;line-height:60px;">' .  $journey_details['total_cost'] . ' ' . $this->lang->line($locale_info['currency_symbol']) . ' </td>
                                                                    </tr>
                                                            </tbody>
                                                    </table>
                                            </td>
                                            <td style="width:33.3333%;padding: 0px;" valign="top">
                                                    <table style="width:100%;" border="0" cellspacing="0" cellpadding="0" align="left">
                                                            <tbody>
                                                                    <tr style="height:20px;">
                                                                            <td style="color: #f6f6f6; text-transform: uppercase; font-size: 11px;" align="center" valign="middle" bgcolor="#343434">' .  $this->lang->line('vehicles') . '</td>
                                                                            <td style="color: #f6f6f6; text-transform: uppercase; font-size: 11px;" align="center" valign="middle" bgcolor="#343434">' . $this->lang->line('status') . '</td>
                                                                    </tr>
                                                                    <tr style="height:60px;">
                                                                            <td style="color: #ffffff; font-size: 11px;" align="center" valign="middle" bgcolor="#343434;line-height:60px;">' . $journey_details['car_name'] . ',<br/>' . $journey_details['car_model'] . '</td>
                                                                            <td style="color: #ffffff; font-size: 11px;" align="center" valign="middle" bgcolor="#343434;line-height:60px;">' . $this->lang->line('status_pending') . '</td>
                                                                    </tr>
                                                            </tbody>
                                                    </table>
                                            </td>
                                    </tr>
                            </table>';
		$pdf->writeHTML($bookingHtml3, true, false, false, false, '');
		$bookingHtml2 = '   <table cellpadding="0" cellspacing="0" width="100%" border="0" bgcolor="#ffffff" style="padding:4px;background:#ffffff;">
                                        <tr>
                                                <td><p style="padding:5px;">' . $this->lang->line('booking_email_note') . '</p></td>
                                        </tr>
                                </table>';
		$pdf->writeHTML($bookingHtml2, true, false, false, false, '');
		$bookingHtml4   = ' <table cellpadding="0" cellspacing="0" width="100%" border="0" style="width:100%;background:#ffffff;float:left">
                                        <tbody>
                                                <tr>
                                                        <td style="border-top-width:1px; border-top-style:solid; border-top-color:#dcdcdc;"></td>
                                                </tr>
                                                <tr>
                                                        <td align="left" style="font-size:8px; color:#000;">NAVETTEO SAS, 10 Rue de Penthièvre, 75008 Paris. SIRET : 81257428300014 TVA intra : FR 50 812574283<br ><b>Email :</b> contact@navetteo.fr';
		if ($this->lang->lang() == 'fr') {
			$bookingHtml4 .= '<b>Tel :</b>';
		} else {
			$bookingHtml4 .= '<b>Phone :</b>';
		}
		$bookingHtml4 .= ' 01 85 09 02 32  <b>Fax :</b> 01 85 09 02 33  </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                </tr>
                                        </tbody>
                                </table>';
		$lastCell = $pdf->GetY();
		$pdf->SetXY(10,$lastCell+30);
		$pdf->writeHTML($bookingHtml4, true, false, false, false, '');

		//  $pdf->writeHTMLCell(0, 0, '', '', $pdf_message, 0, 1, 0, true, '', true);
		$pdf->Output($attached_pdf, 'F');
	}

	function faqs()
	{
		$faqs = $this->db->get_where('faqs', array('status' => 'Active'))->result();
		$this->data['faqs'] 				= $faqs;
		$this->data['css_type'] 			= array("form");
		$this->data['title'] 				= 'Base de connaissances';
		$this->data['heading'] 				= "Base de connaissances";
		$this->data['sub_heading'] 			= "Base de connaissances";
		$this->data['active_class'] 		= "faqs";
		$this->data['bread_crumb'] 			= TRUE;
		$this->data['content'] 				= 'site/faqs';
		$this->data = $this->addMetaData("faqs", $this->data);
		$this->_render_page('templates/site_template', $this->data);
	}

	function testimonials()
	{
		$testimonials 						= $this->db->get_where(
				'testimonials_settings',
				array('status' => 'Active')
		)->result();
		$this->data['testimonials'] 		= $testimonials;
		$this->data['css_type'] 			= array("form");
		$this->data['title'] 				= $this->lang->line('testimonials') . " - Handi Express";
		$this->data['heading'] 				= $this->lang->line('testimonials');
		$this->data['sub_heading'] 			= $this->lang->line('testimonials');
		$this->data['active_class'] 		= "testimonials";
		$this->data['bread_crumb'] 			= TRUE;
		$this->data = $this->addMetaData("testimonials", $this->data);
		$this->data['content'] 				= 'site/testimonials';
		$this->_render_page('templates/site_template', $this->data);
	}

	function themes()
	{
		$this->data['css_type'] 			= array("form");
		$this->data['title'] 				= 'Testimonials';
		$this->data['heading'] 				= "Testimonials";
		$this->data['sub_heading'] 			= "Testimonials";
		$this->data['active_class'] 		= "Testimonials";
		$this->data['bread_crumb'] 			= TRUE;
		$this->load->view('site/theame');
	}

	function download_app($param1='')
	{
		$this->load->helper('download');

		if($param1!='') {
			if ($param1=='android') {
				$path = base_url()."uploads/mobileapp_files/DigiVBS.apk";
				$data = file_get_contents($path);
				$name = 'android.apk';
				force_download($name, $data);
			}
			elseif ($param1=='ios') {
				$path = base_url()."uploads/mobileapp_files/DigiVBS.apk";
				$data = file_get_contents($path);
				$name = 'ios.ipa';
				force_download($name, $data);
			}
		}

	}

	function prices() {
		//$prices = $this->db->get_where('prices', array('status' => 'Active'))->result();
		$records = $this->base_model->run_query("SELECT p.*,v.image,v.name as vehicle_name,v.model, v.ct_flat_min_cost_day, v.ct_flat_min_cost_night, v.cost_starting_from FROM " . $this->db->dbprefix('package_settings') . " p, " . $this->db->dbprefix('vehicle') . " v WHERE v.id=p.vehicle_id AND p.status='Active'");
		$this->data['records'] 				= $records;
		$this->data['css_type'] 			= array("form");
		$this->data['title'] 				= $this->lang->line('ourprice_page');
		$this->data['heading'] 				= $this->lang->line('ourprice_page');
		$this->data['sub_heading'] 			= $this->lang->line('ourprice_page');
		$this->data['active_class']                     = "prices";
		$this->data['bread_crumb'] 			= TRUE;
		$this->data['content'] 				= 'site/prices';
		$this->data = $this->addMetaData("prices", $this->data);
		$this->_render_page('templates/site_template', $this->data);
	}

	function zones() {
		//$prices = $this->db->get_where('prices', array('status' => 'Active'))->result();
		//$this->data['faqs'] 				= $prices;
		$this->data['css_type'] 			= array("form");
		$this->data['title'] 				= 'Zones';
		$this->data['heading'] 				= "Zones";
		$this->data['sub_heading'] 			= "Zones";
		$this->data['active_class'] 		= "zones";
		$this->data['bread_crumb'] 			= TRUE;
		$this->data = $this->addMetaData("zones", $this->data);
		$this->data['content'] 				= 'site/zones';
		$this->_render_page('templates/site_template', $this->data);
	}

	function termsServices() {
		//$prices = $this->db->get_where('prices', array('status' => 'Active'))->result();
		//$this->data['faqs'] 				= $prices;
		$this->data['css_type'] 			= array("form");
		$this->data['title'] 				= $this->lang->line('terms_conditions');
		$this->data['heading'] 				= $this->lang->line('terms_conditions');
		$this->data['sub_heading'] 			= $this->lang->line('terms_conditions');
		$this->data['active_class'] 		= "terms-services";
		$this->data['bread_crumb'] 			= TRUE;
		$this->data = $this->addMetaData("termsServices", $this->data);
		$this->data['content'] 				= 'site/terms-services';
		$this->_render_page('templates/site_template', $this->data);
	}

	function privacyPolicy() {
		//$prices = $this->db->get_where('prices', array('status' => 'Active'))->result();
		//$this->data['faqs'] 				= $prices;
		$this->data['css_type'] 			= array("form");
		$this->data['title'] 				= $this->lang->line('privacy_policy');;
		$this->data['heading'] 				= $this->lang->line('privacy_policy');;
		$this->data['sub_heading'] 			= $this->lang->line('privacy_policy');;
		$this->data['active_class'] 		= "privacy-policy";
		$this->data['bread_crumb'] 			= TRUE;
		$this->data = $this->addMetaData("privacyPolicy", $this->data);
		$this->data['content'] 				= 'site/privacy-policy';
		$this->_render_page('templates/site_template', $this->data);
	}

	function legalNotice() {
		//$prices = $this->db->get_where('prices', array('status' => 'Active'))->result();
		//$this->data['faqs'] 				= $prices;
		$this->data['css_type'] 			= array("form");
		$this->data['title'] 				= $this->lang->line('legal_notice');
		$this->data['heading'] 				= $this->lang->line('legal_notice');
		$this->data['sub_heading'] 			= $this->lang->line('legal_notice');
		$this->data['active_class'] 		= "legal-notice";
		$this->data['bread_crumb'] 			= TRUE;
		$this->data = $this->addMetaData("legalNotice", $this->data);
		$this->data['content'] 				= 'site/legal-notice';
		$this->_render_page('templates/site_template', $this->data);
	}

	function fleet() {
		$this->data['css_type'] 			= array("form");
		$this->data['title'] 				= $this->lang->line('page_fleet');
		$this->data['heading'] 				= $this->lang->line('page_fleet');
		$this->data['sub_heading'] 			= $this->lang->line('page_fleet');
		$this->data['active_class'] 		= "fleet";
		$this->data['bread_crumb'] 			= TRUE;
		$this->data = $this->addMetaData("fleet", $this->data);
		$this->data['content'] 				= 'site/fleet';
		$this->data['vehicles'] = $this->db->get($this->db->dbprefix('vehicle'))->result();

		$this->_render_page('templates/site_template', $this->data);
	}

	function getServices() {
		$service_html = "";
		$category = $this->input->post('cagy');
		$airports = array('dorly'=>"Transfert D'Orly",'cdg' => 'Transfert CDG','beauvais' => "Transfert Beauvais");
		$stations = array('du-nord'=>"Du Nord",'montparnasse' => 'Montparnasse','saint-lazard' => "Saint Lazard", 'de-lyon' => "De Lyon", 'de-lest' => "DE L'est");
		$parks = array('disneyland'=>"Park Disneyland",'asterix' => 'Parc Asterix','paris-tour' => "Paris Tour");

		$service_html = "<option value=''>Services</option>";
		if ($category == 'airports') {
			foreach($airports as $key => $airport) {
				$service_html .= "<option value='" . $key . "'>" . $airport . "</option>";
			}
		}
		else if ($category == 'stations') {
			foreach($stations as $key => $station) {
				$service_html .= "<option value='" . $key . "'>" . $station . "</option>";
			}
		}
		else if ($category == 'parks') {
			foreach($parks as $key => $park) {
				$service_html .= "<option value='" . $key . "'>" . $park . "</option>";
			}
		}

		echo $service_html;
	}
	
	
	function getReply()
	{
		$data = $this->quick_replies_model->get("id = ".$this->input->post('val')." and module = ".$this->input->post('type')." ");
		echo $data->message_sentence;
	}
}
/* End of file Welcome.php */
/* Location: ./application/controllers/Welcome.php */