<?php
class Payment extends MY_Controller

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
	| MODULE: 			Payment
	| -----------------------------------------------------
	| This is Payment module controller file.
	| -----------------------------------------------------
	*/
	function __construct()
	{
		parent::__construct();
	}

	public

	function index()
	{
		echo "hello boy...";
		die();
	}

	public function paynow()
	{
		$payment_info = $this->base_model->fetch_records_from('paypal_settings', array(
			'status' => 'Active'
		));

		if (count($payment_info) > 0) {
			$amount = $this->session->userdata('bookinginfo');
			$total_amount = $amount['cost_of_journey'];

			$payment_info = $payment_info[0];
			$config['business'] = $payment_info->paypal_email;

			// Image header url [750 pixels wide by 90 pixels high]

			$config['cpp_header_image'] 	= base_url() . "assets/system_design/images/logo.png";
			$config['return'] 				= site_url() . '/payment/payment_success';
			$config['cancel_return'] 		= site_url() . '/payment/payment_cancel';
			$config['notify_url'] 			= ''; //'process_payment.php'; //IPN Post
			$config['production'] 			= FALSE;
			if ($payment_info->account_type != 'sandbox') $config['production'] = TRUE;
			$config['currency_code'] 		= $payment_info->currency;
			$this->load->library('paypal', $config);
			$this->paypal->add("Journey", $total_amount); //ADD  item
			$this->paypal->pay(); //Proccess the payment
		}
		else {
			$this->prepare_flashmessage("Please contact admin for this payment gateway", 1);
			$quizid = $subscriptioninfo['quizid'];

			// remove session data

			$this->session->unset_userdata('subscription_data');
			$this->session->unset_userdata('subscription_examname');
			redirect('user/instructions/' . $quizid, 'refresh');
		}
	}

	/*Payment Success	*/
	function payment_success()
	{
		$bookinginfo = $this->session->userdata('bookinginfo');
		$bookinginfo['payment_type'] 		= "paypal";
		$bookinginfo['payment_received'] 	= "1";
		$bookinginfo['transaction_id'] 		= $this->input->post("txn_id");
		$bookinginfo['payer_id'] 			= $this->input->post("payer_id");
		$bookinginfo['payer_email'] 		= $this->input->post("payer_email");
		$bookinginfo['payer_name'] 			= $this->input->post("first_name") . 
												" " . $this->input->post("last_name");
		$table 								= "bookings";
		$this->base_model->insert_operation($bookinginfo, $table);
		$this->prepare_flashmessage("Payment Done Successfully for the Booking <strong>" . $bookinginfo['booking_ref'] . "</strong> with Transaction ID: <strong>" . $bookinginfo['transaction_id'] . "</strong>", 0);
		$this->data['journey_details'] 		= $this->session->userdata('journey_details');
		$this->data['user'] 				= $this->session->userdata('user');
		$this->data['payment_mode'] 		= "Paypal";
		/*email funuctionality*/
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
		$message = $this->load->view('booking_confirmation_email.php', $this->data, TRUE);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from($site_settings_rec->portal_email); // change it to yours
		$this->email->to($this->data['user']['email']); // change it to yours
		$this->email->subject('Digital vehicle booking system query');
		$this->email->message($message);
		$this->email->send();

		// email functionality end
		// remove session data

		$this->session->unset_userdata('bookinginfo');
		$this->session->unset_userdata('user');
		$this->session->unset_userdata('journey_details');
		$this->data['css_type'] = array(
			"form"
		);
		$this->data['title'] 				= 'Booking Confirmation';
		$this->data['heading'] 				= "Booking Confirmation";
		$this->data['sub_heading'] 			= "Booking Confirmation";
		$this->data['bread_crumb'] 			= true;
		$this->data['content'] 				= 'site/payment_confirmation';
		$this->_render_page('templates/site_template', $this->data);
	}

	// Payment Cancel

	function payment_cancel()
	{
		$this->prepare_flashmessage("Payment Cancelled for the exam ", 1);

		// remove session data

		$this->session->unset_userdata('bookinginfo');
		$this->session->unset_userdata('journey_details');
		redirect('welcome/onlineBooking', 'refresh');
	}

	// Payment History

	function payment_history()
	{
		$this->data['title'] 				= 'Payment Reports';
		$this->data['active_menu'] 			= 'payment_history';
		$this->data['records'] 				= $this->base_model->run_query("SELECT s.transaction_id, s.payer_email, s.payer_name, 
		q.name as quizname, q.quizcost as cost, s.dateofsubscription, q.validitytype, 
		s.expirydate, q.validityvalue, s.remainingattempts FROM " . $this->db->dbprefix('quiz') . " q," . $this->db->dbprefix('quizsubscriptions') . " s," . $this->db->dbprefix('users') . " u  where 
		 s.quizid=q.quizid and s.user_id=u.id and s.user_id = " . $this->session->userdata('user_id'));
		$this->data['content'] = 'user/reports/payment_history';
		$this->_render_page('temp/usertemplate', $this->data);
	}
}