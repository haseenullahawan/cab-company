<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends MY_Controller

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
	| MODULE: 			Auth
	| -----------------------------------------------------
	| This is auth module controller file.
	| -----------------------------------------------------
	*/
	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('form_validation');
		$this->load->helper('url');

		// Load MongoDB library instead of native db driver if required

		$this->config->item('use_mongodb', 'ion_auth') ? $this->load->library('mongo_db') : $this->load->database();
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth') , $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
		$this->load->helper('language');
	}

	// redirect if needed, otherwise display the user list

	function index($param = '')
	{
		if ($param == "home") {
			$this->session->unset_userdata('journey_details');
			$this->session->unset_userdata('user');
		}

		if (!$this->ion_auth->logged_in()) {
			$this->data['css_type'] = array(
				"homebooking"
			);
			$this->data['bread_crumb'] = FALSE;
			$waiting_times = $this->base_model->run_query("SELECT * FROM ".$this->db->dbprefix('waitings')." where status='Active'");
			$this->data['waiting_time_status'] = $this->base_model->run_query("SELECT waiting_time,distance_type FROM " . $this->db->dbprefix('booking_system_settings')) [0];
			$this->db->order_by("image", "random");
			$this->data['vehicles'] = $this->db->get($this->db->dbprefix('vehicle'))->result();
			$waiting_options = array(
				"0 0" => $this->lang->line('waiting')
			);
			foreach($waiting_times as $row) $waiting_options[$row->waiting_time . "Mins " . $row->cost] = $row->waiting_time . " min (" . $row->cost . ")";
			$this->data['waiting_options'] = $waiting_options;
			$this->data['airports'] = $this->db->get_where($this->db->dbprefix('airports') , array(
				'status' => 'active'
			))->result();
			$this->db->select('user_name,content');
			//  $this->data['testimonials'] = $this->db->get($this->db->dbprefix('testimonials_settings'))->result();
                        $this->db->select('title, content, user_name, user_photo');
			$this->data['testimonials'] = $this->db->get_where('testimonials_settings', array('status' => 'Active'))->result();
                        $query = "SELECT p.*,v.image,v.name as vehicle_name,v.model,s.id as service_id, s.image as service_image 
                                        FROM " . $this->db->dbprefix('package_settings') . " p 
                                                INNER JOIN " . $this->db->dbprefix('vehicle') . " v ON v.id = p.vehicle_id
                                                LEFT JOIN " . $this->db->dbprefix('services') . " s ON s.package_id = p.id 
                                        WHERE p.status='Active' ORDER BY s.order_no ASC";
                        //$records = $this->base_model->run_query("SELECT p.*,v.image,v.name as vehicle_name,v.model,s.id as service_id FROM " . $this->db->dbprefix('package_settings') . " p, " . $this->db->dbprefix('vehicle') . " v, " . $this->db->dbprefix('services') . " s WHERE v.id=p.vehicle_id AND p.status='Active' AND p.id = s.package_id");
                        $records = $this->base_model->run_query($query);
                        
                        $this->data['packages']  = $records;
                        $this->data['stations'] = $this->db->get_where($this->db->dbprefix('stations'), array('status' => 'Active'))->result();
                        $this->data['hotels'] = $this->db->get_where($this->db->dbprefix('hotels'), array('status' => 'Active'))->result();
                        $this->data['parks'] = $this->db->get_where($this->db->dbprefix('parks'), array('status' => 'Active'))->result();
                        $this->data['vehicles'] = $this->db->get_where($this->db->dbprefix('vehicle') , array('status' => 'active'))->result();
                        $this->data['page'] = 'general_booking';
                        $amount = $this->calculate_cost($r->cost_type, $distance, $r->id, $other_data, $pickup_hours, $pickup_mins);

			$this->data['country_code'] = "in";
			$this->data['distance_unit'] = $this->data['waiting_time_status']->distance_type; //  Unit must be mile/km
			$this->data['content'] = 'site/index';
			$this->_render_page('templates/site_template', $this->data);
		}

		// remove this elseif if you want to enable this for non-admins

		elseif ($this->ion_auth->is_member()) {
			$dt = array();
			$dt = $this->session->userdata('journey_details');
			if (count($dt) > 1) redirect('welcome/passengerDetails', 'refresh');
			else redirect('users');
		}
		elseif ($this->ion_auth->is_admin()) {

			// set the flash data error message if there is one

			redirect('admin');
		}
		else {

			// Redirect to General user

			redirect('executive/', 'refresh');
		}
	}

	public function addMetaData($page = 'home', $data = []){
		$data['title'] = 'Accueil - HANDI EXPRESS Transport de personnes à mobilité réduite';
		$data['meta_keywords'] = "pmr,transport pmr,pmr transport,transport étudiant handicapé,transport travailleur handicapé,transport handicapé,handi-express,handiexpress,pmr transport,transport pmr,transport adapté,transport fauteuil roulant,transport avec rampe d'accés,transport mobilité réduite,personne agée,personne à mobilité réduite,transport de personnes,transport de personnes à mobilité réduite,transport pmr scolaire,taxi pmr,pmr taxi,taxi handicapé,transport personnes handicapées,PMR transport,TPMR,transport pmr , transport mobilité réduite  , transport handicapé, transport personnes mobilité réduite , transport adapté transport enfant handicapé, transport malade, taxi handicapé, transports handicapés , transport personne agée   , taxi pmr , taxi handicapé, taxi avec rampe,transport handicapes , transport de personnes handicapées,transport de personne handicapé,transport enfants handicapés,transport de personnes agées,transport personnes agée,transport personnes handicapées,transport spécialisé";
		$data['meta_description'] = "Le spécialiste du Transport de Personnes à Mobilité Réduite en île de France,SERVICE NON STOP 24H/24 7J/7.Tél : 01 48 13 09 34";
		switch($page){
			case "onlineBooking":
				$data['title'] = "Reservation";
				break;
			case "contactUs":
				$data['title'] = "Transport de personnes à mobilité réduite Ile de France Handy Express spécialiste du transport de personnes à mobilité réduite en Ile de France";
				$data['meta_description'] = "Transport de personnes à mobilité réduite en Ile de France, Handy Express le spécialiste du transport à mobilité réduite en Ile de France...";
				$data['meta_keywords'] = "transport de personnes à mobilité réduite ile de france, transport handicapé ile de france, specialiste transport handicapé ile de france, transport pmr ile de france";
				break;
			case "faqs":
				$data['title'] = "Base de connaissances - HANDI EXPRESS Transport de personnes à mobilité réduite";
				break;
			case "prices":
				$data['title'] = "NOS-TARIFS - HANDI EXPRESS Transport de personnes à mobilité réduite";
				break;
			case "fleet":
				$data['title'] = "vehicules - HANDI EXPRESS Transport de personnes à mobilité réduite";
				break;
			case "termsServices":
				$data['title'] = " - HANDI EXPRESS Transport de personnes à mobilité réduite";
				break;
			case "privacyPolicy":
				$data['title'] = " - HANDI EXPRESS Transport de personnes à mobilité réduite";
				break;
			case "legalNotice":
				$data['title'] = " - HANDI EXPRESS Transport de personnes à mobilité réduite";
				break;
		}

	}



	function users($param1 = '', $param2 = '', $param3 = '')
	{
		$this->data['users'] = array();
		if ($param1 == "business_users") {
			$this->data['users'] = $this->base_model->run_query("select u.* from " . $this->db->dbprefix('users') . " u, " . $this->db->dbprefix('users_groups') . " ug where u.id=ug.user_id and ug.group_id=3");
		}
		else {
			$this->data['users'] = $this->base_model->run_query("select u.* from " . $this->db->dbprefix('users') . " u, " . $this->db->dbprefix('users_groups') . " ug where u.id=ug.user_id and ug.group_id=2");
		}

		$this->data['active_menu'] = 'home';
		$this->data['title'] = 'Admin Dashboard';
		$this->data['content'] = 'admin_views/users/general_users';
		$this->data['heading'] = 'All Users';
		$this->_render_page('template/admin_template', $this->data);

		// $this->_render_page('auth/index', $this->data);

	}

	// log the user in

	function login()
	{
		$this->data['title'] = $this->lang->line('login');

		// validate form input

		$this->data['message'] = "";
		if ($this->input->post()) {
			$this->form_validation->set_rules('identity', 'Email', 'required|valid_email|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'required|xss_clean');
			$this->load->library(array(
				'email',
				'form_validation'
			));
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			if ($this->form_validation->run() == true) {

				// check to see if the user is logging in
				// check for "remember me"

				$remember = (bool)$this->input->post('remember');
				if ($this->ion_auth->login($this->input->post('identity') , $this->input->post('password') , $remember)) {

					// if the login is successful

					$this->session->set_flashdata('message', 'Successfully logged In');
					redirect('/', 'refresh');
				}
				else {

					// if the login was un-successful
					// redirect them back to the login page

					$this->prepare_flashmessage("Invalid Login", 1);
					redirect('auth/login', 'refresh');
				}
			}
		}

		$this->data['identity'] = array(
			'name' => 'identity',
			'id' => 'identity',
			'type' => 'text',
			'class' => 'user-name',
			'placeholder' => $this->lang->line('email') ,
			'value' => $this->form_validation->set_value('identity') ,
		);
		$this->data['password'] = array(
			'name' => 'password',
			'id' => 'password',
			'type' => 'password',
			'placeholder' => $this->lang->line('password') ,
			'class' => 'password'
		);
		$this->data['css'] = array(
			'form'
		);
		/*$this->load->view('site/login', $this->data);*/
                $this->data['bread_crumb'] = true;
                $this->data['heading'] = $this->lang->line('login');;
		$this->data['content'] 	= 'site/login';
                $this->data['active_class'] = $this->lang->line('login');
		$this->data['sub_heading']  = $this->lang->line('login');       
                $this->data['journey_details'] 	= $this->session->userdata('journey_details');
		$this->_render_page('templates/site_template', $this->data);
	}
        
        // log the partner user in Newly added

	function partnerlogin() {
		$this->data['title'] = $this->lang->line('login');

		// validate form input

		$this->data['message'] = "";
		if ($this->input->post()) {
			$this->form_validation->set_rules('identity', 'Email', 'required|valid_email|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'required|xss_clean');
			$this->load->library(array(
				'email',
				'form_validation'
			));
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			if ($this->form_validation->run() == true) {

				// check to see if the user is logging in
				// check for "remember me"

				$remember = (bool)$this->input->post('remember');
				if ($this->ion_auth->login($this->input->post('identity') , $this->input->post('password') , $remember)) {

					// if the login is successful

					$this->session->set_flashdata('message', 'Successfully logged In');
					redirect('/', 'refresh');
				}
				else {

					// if the login was un-successful
					// redirect them back to the login page

					$this->prepare_flashmessage("Invalid Login", 1);
					redirect('auth/partnerLogin', 'refresh');
				}
			}
		}

		$this->data['identity'] = array(
			'name' => 'identity',
			'id' => 'identity',
			'type' => 'text',
			'class' => 'user-name',
			'placeholder' => $this->lang->line('email') ,
			'value' => $this->form_validation->set_value('identity') ,
		);
		$this->data['password'] = array(
			'name' => 'password',
			'id' => 'password',
			'type' => 'password',
			'placeholder' => $this->lang->line('password') ,
			'class' => 'password'
		);
		$this->data['css'] = array(
			'form'
		);
		/*$this->load->view('site/login', $this->data);*/
                $this->data['bread_crumb'] = true;
                $this->data['heading'] = 'Partner' .$this->lang->line('login');;
		$this->data['content'] 	= 'site/partner-login';
                $this->data['active_class'] = $this->lang->line('login');
		$this->data['sub_heading']  = $this->lang->line('login');       
                $this->data['journey_details'] 	= $this->session->userdata('journey_details');
		$this->_render_page('templates/site_template', $this->data);
	}

	// log the user out

	function logout()
	{
		$this->data['title'] = $this->lang->line('logout');

		// log the user out

		$logout = $this->ion_auth->logout();

		// redirect them to the login page

		$this->prepare_flashmessage($this->lang->line('success_logout') , 0);
		redirect('auth/login', 'refresh');
	}

	// change password

	function change_password($param = '')
	{
		$this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label') , 'required');
		$this->form_validation->set_rules('new_password', $this->lang->line('change_password_validation_new_password_label') , 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
		$this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label') , 'required');
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login', 'refresh');
		}

		$user = $this->ion_auth->user()->row();
		if ($this->form_validation->run() == false) {

			// display the form
			// set the flash data error message if there is one

			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
			$this->data['old_password'] = array(
				'name' => 'old',
				'id' => 'old',
				'type' => 'password',
				'placeholder' => $this->lang->line('old_password') ,
			);
			$this->data['new_password'] = array(
				'name' => 'new_password',
				'id' => 'new',
				'type' => 'password',
				'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
				'placeholder' => $this->lang->line('new_password') ,
			);
			$this->data['new_password_confirm'] = array(
				'name' => 'new_confirm',
				'id' => 'new_confirm',
				'type' => 'password',
				'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
				'placeholder' => $this->lang->line('confirm_password') ,
			);
			$this->data['user_id'] = array(
				'name' => 'user_id',
				'id' => 'user_id',
				'type' => 'hidden',
				'value' => $user->id,
			);

			// render
			// $this->_render_page('auth/change_password', $this->data);

			if ($param == "executive") {
				$this->data['content'] = 'executives/change_password';
				$this->data['css_type'] = array(
					'form'
				);
				$this->data['gmaps'] = "false";
				$this->data['title'] = $this->lang->line('change_password');
				$this->_render_page('templates/executive_template', $this->data);
			}
			elseif ($param == "admin") {
				$this->data['content'] = 'admin/change_password';
				$this->data['css_type'] = array(
					'form'
				);
				$this->data['gmaps'] = "false";
				$this->data['title'] = $this->lang->line('change_password');
				$this->_render_page('templates/admin_template', $this->data);
			}
		}
		else {
			$identity = $this->session->userdata('identity');
			$change = $this->ion_auth->change_password($identity, $this->input->post('old') , $this->input->post('new_password'));
			if ($change) {

				// if the password was successfully changed
				// $this->session->set_flashdata('message', $this->ion_auth->messages());

				if ($param == "executive") {
					$this->prepare_flashmessage($this->lang->line('password_changed_success') , 0);
					redirect('auth/change_password/executive', 'refresh');
				}
				elseif ($param == "admin") {
					$this->prepare_flashmessage($this->lang->line('password_changed_success') , 0);
					redirect('auth/change_password/admin', 'refresh');
				}

				// $this->logout();

			}
			else {

				// $this->session->set_flashdata('message', $this->ion_auth->errors());

				if ($param == "executive") {
					$this->prepare_flashmessage($this->ion_auth->errors() , 1);
					redirect('auth/change_password/executive', 'refresh');
				}
				elseif ($param == "admin") {
					$this->prepare_flashmessage($this->ion_auth->errors() , 1);
					redirect('auth/change_password/admin', 'refresh');
				}
			}
		}
	}

	// forgot password

	function forgot_password()
	{

		// setting validation rules by checking wheather identity is username or email

		if ($this->input->post()) {
			if ($this->config->item('identity', 'ion_auth') == 'username') {
				$this->form_validation->set_rules('email', $this->lang->line('forgot_password_username_identity_label') , 'required');
			}
			else {
				$this->form_validation->set_rules('email', $this->lang->line('forgot_password_validation_email_label') , 'required|valid_email');
			}

			if ($this->form_validation->run() == true) {

				// get identity from username or email

				if ($this->config->item('identity', 'ion_auth') == 'username') {
					$identity = $this->ion_auth->where('username', strtolower($this->input->post('email')))->users()->row();
				}
				else {
					$identity = $this->ion_auth->where('email', strtolower($this->input->post('email')))->users()->row();
				}

				if (empty($identity)) {
					if ($this->config->item('identity', 'ion_auth') == 'username') {
						$this->prepare_flashmessage($this->ion_auth->set_message('forgot_password_username_not_found') , 1);
					}
					else {
						$this->prepare_flashmessage($this->ion_auth->set_message('forgot_password_email_not_found') , 1);
					}

					$this->prepare_flashmessage($this->ion_auth->messages() , 3);
					redirect("auth/forgot_password", 'refresh');
				}

				// run the forgotten password method to email an activation code to the user

				$forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth') });
				if ($forgotten) {

					// if there were no errors

					$this->prepare_flashmessage($this->ion_auth->messages() , 3);
					redirect("auth/login", 'refresh'); //we should display a confirmation page here instead of the login page
				}
				else {
					$this->prepare_flashmessage($this->ion_auth->messages() , 3);
					redirect("auth/forgot_password", 'refresh');
				}
			}
		}

		// setup the input

		if ($this->config->item('identity', 'ion_auth') == 'username') {
			$this->data['identity_label'] = $this->lang->line('forgot_password_username_identity_label');
		}
		else {
			$this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
		}

		// set any errors and display the form

		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['title'] = $this->lang->line('forgot_password_heading');
		$this->data['email'] = array(
			'name' => 'email',
			'id' => 'email',
			'type' => 'text',
			'class' => 'user-name',
			'placeholder' => $this->lang->line('email') ,
			'value' => $this->form_validation->set_value('email') ,
		);
		$this->data['css'] = array(
			'form'
		);
		$this->load->view('site/forgot_password', $this->data);
	}

	// reset password - final step for forgotten password

	public

	function reset_password($code = NULL)
	{
		if (!$code) {
			show_404();
		}

		// echo $code; die();

		$user = $this->ion_auth->forgotten_password_check($code);
		if ($user) {

			// if the code is valid then display the password reset form

			$this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label') , 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
			$this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label') , 'required');
			if ($this->form_validation->run() == false) {

				// display the form
				// set the flash data error message if there is one

				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
				$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
				$this->data['new_password'] = array(
					'name' => 'new',
					'id' => 'new',
					'type' => 'password',
					'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
				);
				$this->data['new_password_confirm'] = array(
					'name' => 'new_confirm',
					'id' => 'new_confirm',
					'type' => 'password',
					'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
				);
				$this->data['user_id'] = array(
					'name' => 'user_id',
					'id' => 'user_id',
					'type' => 'hidden',
					'value' => $user->id,
				);
				$this->data['csrf'] = $this->_get_csrf_nonce();
				$this->data['code'] = $code;

				// render
				// $this->_render_page('auth/reset_password', $this->data);

				$this->data['active_menu'] = 'home';
				$this->data['title'] = 'Welcome to ';
				$this->data['css'] = array(
					'form'
				);
				$this->load->view('site/reset_password', $this->data);
			}
			else {

				// do we have a valid request?

				if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id')) {

					// something fishy might be up

					$this->ion_auth->clear_forgotten_password_code($code);
					show_error($this->lang->line('error_csrf'));
				}
				else {

					// finally change the password

					$identity = $user->{$this->config->item('identity', 'ion_auth') };
					$change = $this->ion_auth->reset_password($identity, $this->input->post('new'));
					if ($change) {

						// if the password was successfully changed

						$this->session->set_flashdata('message', $this->ion_auth->messages());
						$this->logout();
					}
					else {
						$this->session->set_flashdata('message', $this->ion_auth->errors());
						redirect('auth/reset_password/' . $code, 'refresh');
					}
				}
			}
		}
		else {

			// if the code is invalid then send them back to the forgot password page

			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("auth/forgot_password", 'refresh');
		}
	}

	// activate the user

	function activate($id, $code = false)
	{
		if ($code !== false) {
			$activation = $this->ion_auth->activate($id, $code);
		}
		else
		if ($this->ion_auth->is_admin()) {
			$activation = $this->ion_auth->activate($id);
		}

		if ($activation) {

			// redirect them to the auth page

			$this->prepare_flashmessage($this->ion_auth->messages() , 0);

			// $this->session->set_flashdata('message', $this->ion_auth->messages());

			redirect("auth/login", 'refresh');
		}
		else {

			// redirect them to the forgot password page

			$this->prepare_flashmessage($this->ion_auth->errors() , 1);
			redirect("auth/login", 'refresh');
		}
	}

	/**
	 *
	 * @Customer De-Activate
	 * @author John Peter
	 * @return
	 */
	function deactivate($id = NULL)
	{
		$id = $this->config->item('use_mongodb', 'ion_auth') ? (string)$id : (int)$id;
		$this->load->library('form_validation');
		$this->form_validation->set_rules('confirm', $this->lang->line('deactivate_validation_confirm_label') , 'required');
		$this->form_validation->set_rules('id', $this->lang->line('deactivate_validation_user_id_label') , 'required|alpha_numeric');
		if ($this->form_validation->run() == FALSE) {

			// insert csrf check

			$this->data['csrf'] = $this->_get_csrf_nonce();
			$this->data['user'] = $this->ion_auth->user($id)->row();
			$this->data['title'] = 'Deactivate User';
			$this->data['content'] = 'auth/deactivate_user';
			$this->_render_page('templates/admin_template', $this->data);
		}
		else {

			// do we really want to deactivate?

			if ($this->input->post('confirm') == 'yes') {

				// do we have a valid request?

				if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id')) {
					show_error($this->lang->line('error_csrf'));
				}

				// do we have the right userlevel?

				if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin()) {
					$this->ion_auth->deactivate($id);
				}
			}

			// redirect them back to the auth page

			redirect('auth', 'refresh');
		}
	}

	// create a new user

	function create_user()
	{
		$this->data['title'] = "register";

		// $this->load->config('ion_auth');

		$this->config->load('ion_auth', TRUE);
		$tables = $this->config->item('tables', 'ion_auth');
		if ($this->input->post()) {

			// validate form input

			$this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label') , 'required|xss_clean');
			$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label') , 'required|xss_clean');
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label') , 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
			$this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone1_label') , 'required|xss_clean|integer|min_length[10]|max_length[11]');
			$this->form_validation->set_rules('address1', $this->lang->line('create_user_validation_address_label') , 'required|xss_clean');
			$this->form_validation->set_rules('address2', $this->lang->line('create_user_validation_address_label') , 'required|xss_clean');
			$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label') , 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
			$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label') , 'required');
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			if ($this->form_validation->run() == true) {
				$username = $this->input->post('first_name') . ' ' . $this->input->post('last_name');
				$email = strtolower($this->input->post('email'));
				$password = $this->input->post('password');
				$additional_data = array(
					'first_name' => $this->input->post('first_name') ,
					'last_name' => $this->input->post('last_name') ,
					'phone' => $this->input->post('phone') ,
					'date_of_registration' => date('Y-m-d')
				);
				if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data)) {
                                    $user_rec = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('users') . " WHERE email = '" . $email ."'");
                                    $inputdata['user_id'] = $user_rec[0]->id;
                                    $inputdata['address1'] = $this->input->post('address1');
                                    $inputdata['address2'] = $this->input->post('address2');
                                    $table_name = "users_details";
                                    $this->base_model->insert_operation($inputdata, $table_name);

					// check to see if we are creating the user
					// redirect them back to the admin page

					$this->prepare_flashmessage($this->ion_auth->messages() , 2);
					redirect("auth/login", 'refresh');
				}
			}
		}

		$this->data['first_name'] = array(
			'name' => 'first_name',
			'class' => 'user',
			'placeholder' => $this->lang->line('first_name') ,
			'id' => 'first_name',
			'type' => 'text',
			'value' => $this->form_validation->set_value('first_name') ,
		);
		$this->data['last_name'] = array(
			'name' => 'last_name',
			'class' => 'user',
			'placeholder' => $this->lang->line('last_name') ,
			'id' => 'last_name',
			'type' => 'text',
			'value' => $this->form_validation->set_value('last_name') ,
		);
		$this->data['email'] = array(
			'name' => 'email',
			'class' => 'user-name',
			'placeholder' => $this->lang->line('user_email') ,
			'id' => 'email',
			'type' => 'text',
			'value' => $this->form_validation->set_value('email') ,
		);
		$this->data['phone'] = array(
			'name' => 'phone',
			'class' => 'phone1',
			'placeholder' => $this->lang->line('phone') ,
			'id' => 'phone',
			'type' => 'text',
			'maxlength' => '11',
			'value' => $this->form_validation->set_value('phone') ,
		);
		$this->data['password'] = array(
			'name' => 'password',
			'class' => 'password',
			'placeholder' => $this->lang->line('password') ,
			'id' => 'password',
			'type' => 'password',
			'value' => $this->form_validation->set_value('password') ,
		);
		$this->data['password_confirm'] = array(
			'name' => 'password_confirm',
			'class' => 'password',
			'placeholder' => $this->lang->line('confirm_password') ,
			'id' => 'password_confirm',
			'type' => 'password',
			'value' => $this->form_validation->set_value('password_confirm') ,
		);
                $this->data['address1'] = array(
			'name' => 'address1',
			'class' => 'user',
			'placeholder' => $this->lang->line('address') ,
			'id' => 'address1',
			'type' => 'text',
			'value' => $this->form_validation->set_value('address') ,
		);
                $this->data['address2'] = array(
			'name' => 'address2',
			'class' => 'location',
			'placeholder' => $this->lang->line('billing_address'),
			'id' => 'address2',
			'type' => 'text',
			'value' => $this->form_validation->set_value('address') ,
		);
		$this->data['css'] = array(
			'form'
		);
		$this->data['title'] = 'Register';
		/*$this->load->view('site/register', $this->data);*/
                $this->data['gmaps'] = 'true';
                $this->data['heading'] = 'Register';
                $this->data['bread_crumb'] = true;
                $this->data['content'] 	= 'site/register';
                $this->data['journey_details'] 	= $this->session->userdata('journey_details');
                $this->data['active_class'] = "register";
		$this->data['sub_heading']  = $this->lang->line('register');
		$this->_render_page('templates/site_template', $this->data);
	}

	// edit a user

	function edit_user($id)
	{
		$this->data['title'] = "Edit User";
		if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id))) {
			redirect('auth', 'refresh');
		}

		$user = $this->ion_auth->user($id)->row();
		$groups = $this->ion_auth->groups()->result_array();
		$currentGroups = $this->ion_auth->get_users_groups($id)->result();

		// validate form input

		$this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label') , 'required|xss_clean');
		$this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label') , 'xss_clean');
		$this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label') , 'required|xss_clean|min_length[10]|max_length[11]|integer');
		$this->form_validation->set_rules('company', $this->lang->line('edit_user_validation_company_label') , 'xss_clean');
		$this->form_validation->set_rules('groups', $this->lang->line('edit_user_validation_groups_label') , 'xss_clean');
		if (isset($_POST) && !empty($_POST)) {

			// do we have a valid request?

			if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id')) {
				show_error($this->lang->line('error_csrf'));
			}

			$data = array(
				'first_name' => $this->input->post('first_name') ,
				'last_name' => $this->input->post('last_name') ,
				'company' => $this->input->post('company') ,
				'phone' => $this->input->post('phone') ,
			);

			// Only allow updating groups if user is admin

			if ($this->ion_auth->is_admin()) {

				// Update the groups user belongs to

				$groupData = $this->input->post('groups');
				if (isset($groupData) && !empty($groupData)) {
					$this->ion_auth->remove_from_group('', $id);
					foreach($groupData as $grp) {
						$this->ion_auth->add_to_group($grp, $id);
					}
				}
			}

			// update the password if it was posted

			if ($this->input->post('password')) {
				$this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label') , 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
				$this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label') , 'required');
				$data['password'] = $this->input->post('password');
			}

			if ($this->form_validation->run() === TRUE) {
				$this->ion_auth->update($user->id, $data);

				// check to see if we are creating the user
				// redirect them back to the admin page

				$this->session->set_flashdata('message', "User Saved");
				if ($this->ion_auth->is_admin()) {
					redirect('auth', 'refresh');
				}
				else {
					redirect('/', 'refresh');
				}
			}
		}

		// display the edit user form

		$this->data['csrf'] = $this->_get_csrf_nonce();

		// set the flash data error message if there is one

		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view

		$this->data['user'] = $user;
		$this->data['groups'] = $groups;
		$this->data['currentGroups'] = $currentGroups;
		$this->data['first_name'] = array(
			'name' => 'first_name',
			'id' => 'first_name',
			'type' => 'text',
			'value' => $this->form_validation->set_value('first_name', $user->first_name) ,
		);
		$this->data['last_name'] = array(
			'name' => 'last_name',
			'id' => 'last_name',
			'type' => 'text',
			'value' => $this->form_validation->set_value('last_name', $user->last_name) ,
		);
		$this->data['company'] = array(
			'name' => 'company',
			'id' => 'company',
			'type' => 'text',
			'value' => $this->form_validation->set_value('company', $user->company) ,
		);
		$this->data['phone'] = array(
			'name' => 'phone',
			'id' => 'phone',
			'type' => 'text',
			'value' => $this->form_validation->set_value('phone', $user->phone) ,
		);
		$this->data['password'] = array(
			'name' => 'password',
			'id' => 'password',
			'type' => 'password'
		);
		$this->data['password_confirm'] = array(
			'name' => 'password_confirm',
			'id' => 'password_confirm',
			'type' => 'password'
		);
		$this->data['active_menu'] = 'home';
                $this->data['gmaps'] = 'true';
		$this->data['title'] = 'Welcome to ';
		$this->data['content'] = 'auth/edit_user';
		$this->_render_page('template/admin_template', $this->data);

		// $this->_render_page('auth/edit_user', $this->data);

	}

	// List Groups

	function groups()
	{
		$this->data['title'] = "User Groups";
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
			redirect('auth', 'refresh');
		}

		$this->data['groups'] = $this->base_model->fetch_records_from('groups');
		$this->data['active_menu'] = 'home';
		$this->data['title'] = 'Welcome to ';
		$this->data['content'] = 'auth/user_groups';
		$this->_render_page('template/admin_template', $this->data);
	}

	// create a new group

	function create_group()
	{
		$this->data['title'] = $this->lang->line('create_group_title');
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
			redirect('auth', 'refresh');
		}

		// validate form input

		$this->form_validation->set_rules('group_name', $this->lang->line('create_group_validation_name_label') , 'required|alpha_dash|xss_clean');
		$this->form_validation->set_rules('description', $this->lang->line('create_group_validation_desc_label') , 'xss_clean');
		if ($this->form_validation->run() == TRUE) {
			$new_group_id = $this->ion_auth->create_group($this->input->post('group_name') , $this->input->post('description'));
			if ($new_group_id) {

				// check to see if we are creating the group
				// redirect them back to the admin page

				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("auth", 'refresh');
			}
		}
		else {

			// display the create group form
			// set the flash data error message if there is one

			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
			$this->data['group_name'] = array(
				'name' => 'group_name',
				'id' => 'group_name',
				'type' => 'text',
				'value' => $this->form_validation->set_value('group_name') ,
			);
			$this->data['description'] = array(
				'name' => 'description',
				'id' => 'description',
				'type' => 'text',
				'value' => $this->form_validation->set_value('description') ,
			);
			$this->data['active_menu'] = 'home';
			$this->data['title'] = 'Create Group';
			$this->data['content'] = 'auth/create_group';
			$this->_render_page('template/admin_template', $this->data);

			// $this->_render_page('auth/create_group', $this->data);

		}
	}

	// edit a group

	function edit_group($id)
	{

		// bail if no group id given

		if (!$id || empty($id)) {
			redirect('auth', 'refresh');
		}

		$this->data['title'] = $this->lang->line('edit_group_title');
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
			redirect('auth', 'refresh');
		}

		$group = $this->ion_auth->group($id)->row();

		// validate form input

		$this->form_validation->set_rules('group_name', $this->lang->line('edit_group_validation_name_label') , 'required|alpha_dash|xss_clean');
		$this->form_validation->set_rules('group_description', $this->lang->line('edit_group_validation_desc_label') , 'xss_clean');
		if (isset($_POST) && !empty($_POST)) {
			if ($this->form_validation->run() === TRUE) {
				$group_update = $this->ion_auth->update_group($id, $_POST['group_name'], $_POST['group_description']);
				if ($group_update) {
					$this->session->set_flashdata('message', $this->lang->line('edit_group_saved'));
				}
				else {
					$this->session->set_flashdata('message', $this->ion_auth->errors());
				}

				redirect("auth", 'refresh');
			}
		}

		// set the flash data error message if there is one

		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view

		$this->data['group'] = $group;
		$this->data['group_name'] = array(
			'name' => 'group_name',
			'id' => 'group_name',
			'type' => 'text',
			'value' => $this->form_validation->set_value('group_name', $group->name) ,
		);
		$this->data['group_description'] = array(
			'name' => 'group_description',
			'id' => 'group_description',
			'type' => 'text',
			'value' => $this->form_validation->set_value('group_description', $group->description) ,
		);
		$this->data['active_menu'] = 'home';
		$this->data['title'] = 'Edit user Group';
		$this->data['content'] = 'auth/edit_group';
		$this->_render_page('template/admin_template', $this->data);
	}
}