<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends MY_Controller

{
    /*
    | -----------------------------------------------------
    | PRODUCT NAME:     DIGI VEHICLE BOOKING SYSTEM (DVBS)
    | -----------------------------------------------------
    | AUTHOR:           DIGITAL VIDHYA TEAM
    | -----------------------------------------------------
    | EMAIL:            digitalvidhya4u@gmail.com
    | -----------------------------------------------------
    | COPYRIGHTS:       RESERVED BY DIGITAL VIDHYA
    | -----------------------------------------------------
    | WEBSITE:          http://digitalvidhya.com
    |                   http://codecanyon.net/user/digitalvidhya
    | -----------------------------------------------------
    |
    | MODULE:           Auth
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
         $this->load->model('sitemodel');
        $this->config->item('use_mongodb', 'ion_auth') ? $this->load->library('mongo_db') : $this->load->database();
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth') , $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
        $this->lang->load('general');
        $this->load->model('request_model');
        $this->load->model('jobs_model');
        $this->load->model('support_model');
        $this->load->model('calls_model');
        $this->load->helper('language');
        $this->load->model('smtp_model');
        $this->data['configuration'] = get_configuration();
    }

    protected $data;
    // redirect if needed, otherwise display the user list

    function index($param = '')
    {
                $this->data['getjob'] = $this->sitemodel->getJob();
        if ($param == "home") {
            $this->session->unset_userdata('journey_details');
            $this->session->unset_userdata('user');
        }

        if (!$this->ion_auth->logged_in()) {
            $this->data['css_type'] = array(
                "homebooking"
            );
            $this->data['bread_crumb'] = FALSE; 
            $this->data['vehicles'] = $this->db->order_by('id', 'asc')->get_where($this->db->dbprefix('vehicle') , array('status' => 'active'))->result();
            $this->data['title'] = 'HANDI EXPRESS Transport de personnes à mobilité réduite';
            $this->data['meta_keywords'] = "tpmr;transport pmr;pmr transport;transport handicapé;transport handicapés;handicapé transport;transport handicape;transport handicap;transport mobilité réduite;transport adapté;transports handicapés;transport des handicapés;transport enfant handicapé;transports handicapés;transport personne agée;taxi handicapé;handicapé taxi;taxi pmr;taxi avec rampe;transport handicapes;transport de personnes handicapées;transport de personne handicapé;transport personnes âgées;transport personnes handicapées;transport de personnes à mobilité réduite;transport personne mobilité réduite;transport de personnes agées;transport personnes agée;transport personnes handicapées;transport personne handicapée;transport personne agée​";
            $this->data['meta_description'] = "HANDI EXPRESS Le spécialiste du transport de personnes à mobilité réduite,Transport de personnes handicapées et Transport de personne âgées.Tout Trajet - Toute Distance 24h/24 - 7j/7.";
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
            $query = "SELECT p.*,v.image,v.name as vehicle_name,v.model,s.id as service_id, s.image as service_image, s.meta_description_en as meta_description_en, s.meta_description_fr as meta_description_fr
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

            $this->data['page'] = 'general_booking';
            //  $amount = $this->calculate_cost($r->cost_type, $distance, $r->id, $other_data, $pickup_hours, $pickup_mins);

            $this->data['country_code'] = "in";
            $this->data['distance_unit'] = $this->data['waiting_time_status']->distance_type; //  Unit must be mile/km
            $this->data['active_class'] = "home";
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

    function admin()
    {
        $checkIfLogin = $this->basic_auth->is_login();

        if($checkIfLogin){
            redirect("admin/dashboard");
        }

        $this->data['title'] = $this->lang->line('login');
        $this->data['alert'] = "";
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[2]|valid_email|max_length[50]|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[2]|max_length[50]|xss_clean');

            if ($this->form_validation->run() !== false) {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $remember = $this->input->post('remember_me');
                $user = $this->basic_auth->login($username, $password, $remember);

                if($user != false){
                    redirect("admin/dashboard");
                } else
                    $this->data['alert'] = [
                        'message' => "Authentication failed.",
                        'class' => "alert-danger",
                        'type' => "Error"
                    ];

            } else
                $this->data['alert'] = [
                    'message' => "Invalid email or password.",
                    'class' => "alert-danger",
                    'type' => "Error"
                ];
        }


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
        $this->data['css'] = array('form');
        $this->data['bread_crumb'] = true;
        $this->data['heading'] = $this->lang->line('login');;
        $this->data['content']  = 'site/admin_login';
        $this->data['forgot_form']  = false;
        $this->data['active_class'] = $this->lang->line('login');
        $this->data['sub_heading']  = $this->lang->line('login');
        $this->data['journey_details']  = $this->session->userdata('journey_details');

        $this->_render_page('templates/site_template', $this->data);
    }

     function login()
    {
        $checkIfLogin = $this->basic_auth->is_login();

        if($checkIfLogin){
                    redirect("welcome/passengerDetails", 'refresh');
            //redirect("user/profile");
        }

        $this->data['title'] = $this->lang->line('login');
        $this->data['alert'] = "";
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[2]|valid_email|max_length[50]|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[2]|max_length[50]|xss_clean');
            if ($this->form_validation->run() !== false) {
                $username = $this->input->post('email');
                $password = $this->input->post('password');
                $remember = $this->input->post('remember_me');
                $user = $this->ion_auth->login($username, $password, $remember);
                    
                if($user != false){
                    redirect("welcome/passengerDetails", 'refresh');
                } else
                    $this->data['alert'] = [
                        'message' => "Authentication failed.",
                        'class' => "alert-danger",
                        'type' => "Error"
                    ];

            } else
                $this->data['alert'] = [
                    'message' => "Invalid email or password.",
                    'class' => "alert-danger",
                    'type' => "Error"
                ];
        }


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
        $this->data['css'] = array('form');
        $this->data['bread_crumb'] = true;
        $this->data['heading'] = $this->lang->line('login');;
        $this->data['content']  = 'site/admin_login';
        $this->data['forgot_form']  = false;
        $this->data['active_class'] = $this->lang->line('login');
        $this->data['sub_heading']  = $this->lang->line('login');
        $this->data['journey_details']  = $this->session->userdata('journey_details');

        $this->_render_page('templates/site_template', $this->data);
    }


    function forgot_password()
    {
        $checkIfLogin = $this->basic_auth->is_login();
        if($checkIfLogin){
            redirect("admin/dashboard");
        }
        $this->data['title'] = $this->lang->line('login_forgot_password');
        $this->data['alert'] = "";
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[2]|valid_email|max_length[50]|xss_clean');

            if ($this->form_validation->run() !== false) {
                $username = $this->input->post('username');
                $user = $this->user_model->get(['email' => $username]);

                if($user != false){
                    $this->load->library('mail_sender');
                    $mailData['email']   = $this->input->post('email');
                    $mailData['subject'] = "Reset Password | HANDI-EXPRESS.FR";
                    $mailData['view']    = 'emails/reset_password';
                    $mailData['email']   = $user->email;
                    $mailData['data']    = json_decode(json_encode($user), true);
                    $mailData['data']['verification_code'] = $this->basic_auth->resetPasswordKey($user);
                    //var_dump($mailData);exit;

                    $sent = $this->mail_sender->sendMail($mailData);

                    if($sent === true) {
                        $this->session->set_flashdata([
                            'message' => "Verification email sent.",
                            'class' => "alert-success",
                            'type' => "Success"
                        ]);
                        redirect("admin");
                    } else
                        $this->data['alert'] = [
                            'message' => $sent['msg'],
                            'class' => "alert-error",
                            'type' => "Error"
                        ];

                } else
                    $this->data['alert'] = [
                        'message' => "Invalid username.",
                        'class' => "alert-danger",
                        'type' => "Error"
                    ];

            } else
                $this->data['alert'] = [
                    'message' => "Invalid username.",
                    'class' => "alert-danger",
                    'type' => "Error"
                ];
        }

        //var_dump($data);exit;
        $this->data['username'] = array(
            'name' => 'username',
            'id' => 'identity',
            'type' => 'text',
            'class' => 'user',
            'placeholder' => $this->lang->line('login_identity_label') ,
            'value' => $this->form_validation->set_value('username') ,
        );

        $this->data['css'] = array('form');
        $this->data['bread_crumb'] = true;
        $this->data['heading'] = $this->lang->line('login');;
        $this->data['content']  = 'site/admin_login';
        $this->data['forgot_form']  = true;
        $this->data['active_class'] = $this->lang->line('login');
        $this->data['sub_heading']  = $this->lang->line('login_forgot_password');
        $this->data['journey_details']  = $this->session->userdata('journey_details');

        $this->_render_page('templates/site_template', $this->data);
    }

    public function reset_password(){

        if($this->input->get_post('key') != false) {
            $key = $this->input->get_post('key');
            $this->data['key'] = $key;
            $this->data['title'] = 'Reset Password | HANDI-EXPRESS.FR';

            $resetData = $this->user_model->getResetPassword(['verification_code' => $key]);
            if($resetData != false) {
                if((int)$resetData->counter > 0) {
                    if ($_SERVER['REQUEST_METHOD'] != 'POST')
                        $this->user_model->updateResetPassword([
                            'counter' => $resetData->counter - 1
                        ], $resetData->id);

                    // If request submitted
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') $this->doReset($resetData->user_id);

                    $this->data['css'] = array('form');
                    $this->data['bread_crumb'] = true;
                    $this->data['heading'] = $this->lang->line('login');;
                    $this->data['content']  = 'site/reset_password';
                    $this->data['active_class'] = $this->lang->line('login');
                    $this->data['sub_heading']  = $this->lang->line('login_reset_password');
                    $this->data['journey_details']  = $this->session->userdata('journey_details');

                    $this->data['password'] = array(
                        'name' => 'password',
                        'id' => 'password',
                        'type' => 'password',
                        'placeholder' => $this->lang->line('password') ,
                        'class' => 'password'
                    );

                    $this->data['confirm_password'] = array(
                        'name' => 'confirm_password',
                        'id' => 'confirm_password',
                        'type' => 'password',
                        'placeholder' => $this->lang->line('confirm_password') ,
                        'class' => 'confirm_password'
                    );

                    $this->_render_page('templates/site_template', $this->data);

                } else {
                    $this->user_model->deleteResetPassword($resetData->id);
                    $this->session->set_flashdata('alert', [
                        'message' => "Your reset password link has been expired. Please request again.",
                        'class' => "alert-danger",
                        'type' => "Error"
                    ]);
                    redirect('admin');
                }

            } else show_404();

        } else show_404();
    }




    public function doReset($userID){
        $this->form_validation->set_rules('password', 'Password', 'required|xss_clean');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]|xss_clean');
        if ($this->form_validation->run() != FALSE) {

            $check = $this->user_model->update([
                'password' => md5($this->input->post('password'))
            ], $userID);

            if($check != false){
                // update reset password table

                $this->session->set_flashdata('alert', [
                    'message' => "Password has been changed successfully.",
                    'class' => "alert-success",
                    'type' => "Success"
                ]);

            } else {
                $this->session->set_flashdata('alert', [
                    'message' => "Something went wrong. Please try again",
                    'class' => "alert-danger",
                    'type' => "Error"
                ]);
            }

            redirect('admin');
        }
    }


// log the user in

    function clientlogin() {
        $this->data['title'] = $this->lang->line('login');

        // validate form input

        $this->data['message'] = "";
        //  echo "befoer post check 1<br/>";
        if ($this->input->post()) {
            $this->form_validation->set_rules('identity', 'Email', 'required|valid_email|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'required|xss_clean');
            $this->load->library(array(
                'email',
                'form_validation'
            ));
            //  echo "1111<br/>";
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if ($this->form_validation->run() == true) {

                // check to see if the user is logging in
                // check for "remember me"
                //  echo "2222<br/>";
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
        $this->data['css'] = array('form');
        /*$this->load->view('site/login', $this->data);*/
        $this->data['bread_crumb'] = true;
        $this->data['heading'] = $this->lang->line('login');;
        $this->data['content']  = 'site/limo-login';
        $this->data['active_class'] = $this->lang->line('login');
        $this->data['sub_heading']  = $this->lang->line('login');
        $this->data['journey_details']  = $this->session->userdata('journey_details');
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
        $this->data['content']  = 'site/partner-login';
        $this->data['active_class'] = $this->lang->line('login');
        $this->data['sub_heading']  = $this->lang->line('login');
        $this->data['journey_details']  = $this->session->userdata('journey_details');
        $this->_render_page('templates/site_template', $this->data);
    }


    // Limo Driver Login
    function driverlogin() {
        $this->data['title'] = 'Driver ' .$this->lang->line('login');

        // validate form input

        $this->data['message'] = "";

        $this->data['css'] = array('form');
        $this->data['bread_crumb'] = true;
        $this->data['heading'] = 'Driver ' .$this->lang->line('login');;
        $this->data['content']  = 'site/driver-login';
        $this->data['active_class'] = $this->lang->line('login');
        $this->data['sub_heading']  = $this->lang->line('login');
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
        redirect('login', 'refresh');
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

        $this->load->config('ion_auth');
        $this->config->load('ion_auth', TRUE);
        $tables = $this->config->item('tables', 'ion_auth');
        if ($this->input->post('email')) {

            // validate form input

            $this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label') , 'required|xss_clean');
            $this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label') , 'required|xss_clean');
            //$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label') , 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label') , 'required|valid_email');
            $this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone1_label') , 'required|xss_clean|integer|min_length[10]|max_length[11]');
            $this->form_validation->set_rules('address1', $this->lang->line('create_user_validation_address_label') , 'required|xss_clean');
           // $this->form_validation->set_rules('address2', $this->lang->line('create_user_validation_address_label') , 'required|xss_clean');
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
                    $inputdata['fax_no'] = $this->input->post('fax');
                    $inputdata['company_name'] = $this->input->post('company');
                    $table_name = "users_details";
                    $this->base_model->insert_operation($inputdata, $table_name);

                    $this->ion_auth->login($email , $password);

 if($this->ion_auth->logged_in()){
                    // check to see if we are creating the user
                    // redirect them back to the admin page

                    $this->prepare_flashmessage($this->ion_auth->messages() , 2);
                    redirect("welcome/passengerDetails", 'refresh');
                }
                }else{
                    $username = $this->input->post('first_name') . ' ' . $this->input->post('last_name');
                    $email = strtolower($this->input->post('email'));
                    $password = $this->input->post('password');
                  //  echo "login";
                    $this->ion_auth->login($email , $password);
                  

                    // check to see if we are creating the user
                    // redirect them back to the admin page
                    if($this->ion_auth->logged_in()){
                        $this->prepare_flashmessage($this->ion_auth->messages() , 2);
                        redirect("welcome/passengerDetails", 'refresh');
                    }
                   
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
        $this->data['fax'] = array(
            'name' => 'fax',
            'class' => 'phone1',
            'placeholder' => $this->lang->line('fax') ,
            'id' => 'fax',
            'type' => 'text',
            'maxlength' => '15',
            'value' => $this->form_validation->set_value('fax') ,
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
        $this->data['company'] = array(
            'name' => 'company',
            'class' => 'user',
            'placeholder' => $this->lang->line('company') ,
            'id' => 'company',
            'type' => 'text',
            'maxlength' => '150',
            'value' => $this->form_validation->set_value('company') ,
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
        $this->data['content']  = 'site/register';
        $this->data['journey_details']  = $this->session->userdata('journey_details');
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



    function submitContactForm()
    {
        if (!$this->input->is_ajax_request()) {
            redirect(base_url());
        } else {

            $data  = ['status'=>false, 'msg' => 'Invalid Request!'];
            $error = request_validate();

            if(empty($error)){
                $civility = @$_POST['civility'];
                $name     = @$_POST['name'];
                $lastName = @$_POST['prename'];
                $company  = @$_POST['company'];
                $email    = @$_POST['email'];
                $tel      = @$_POST['tel'];
                //$dob      = to_unix_date(@$_POST['dob']);
                $msg      = @$_POST['message'];

                $this->load->model('request_model');
                $this->request_model->create([
                    'civility'      => $civility,
                    'first_name'    => $name,
                    'last_name'     => $lastName,
                    'email'         => $email,
                    'company'       => $company,
                    'telephone'     => $tel,
                    'message'       => $msg,
                    //'dob'             => $dob,
                    'status'        => "New",
                    'ip_address'    => $this->input->ip_address()
                ]);

                date_default_timezone_set('Europe/Paris');

                $subject = "Demande de Devis Handi-Express.fr";
                $emailMessage  = "Madame, Monsieur <br> <p>Nous avons bien reçu votre demande de devis et nous vous en remercions, un de nos opérateurs reviendra vers vous dés que possible.</p>";
                $emailMessage .= "<p> Date : " . date('d M Y') .", Heure: " . date("H:i:s") . "</p>";
                $emailMessage .= "<p><b>De :</b> $civility $name $lastName</p>";
                $emailMessage .= "<p><b>Telephone :</b> $tel </p>";
                $emailMessage .= "<p><b>Email :</b> $email </p>";
                $emailMessage .= "<p><b>Company :</b> $company </p>";
                //$emailMessage .= "<p><b>DOB :</b> " . $_POST['dob'] . " </p>";
                $emailMessage .= "<p><b>Message :</b></p><p>" . nl2br($msg) . "</p><br>";
                /*$emailMessage .= "<p style='color:#f24e3a'>NB : Merci de ne pas répondre à cet email directement, et<br>";
                $emailMessage .= "d'utiliser nos coordonnées ci-dessous pour nous contacter.</p><br>";*/

                $emailMessage .= "<h4 style='color: #000'>HANDI EXPRESS SAS<br>";
                $emailMessage .= "Service secrétariat</h4>";
                $emailMessage .= "<p><b>Siteweb : </b>www.handi-express.fr</p>";
                $emailMessage .= "<p><b>Email : </b>contact@handi-express.fr</p>";
                $emailMessage .= "<p><b>Tél : </b>01 48 13 09 34</p>";
                $emailMessage .= "<p><b>Fax : </b>01 83 62 84 04</p>";
                $emailMessage .= "<p><b>Adresse : </b> 48-50 Avenue d'Enghien 93800 Epinay sur seine</p>";


                /*require_once(APPPATH."third_party/phpmailer/Exception.php");
                require_once(APPPATH."third_party/phpmailer/PHPMailer.php");
                require_once(APPPATH."third_party/phpmailer/SMTP.php");
                $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
                try {
                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host     = $this->data['configuration']['SMTP_HOST'];// Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;
                    $mail->CharSet  = 'UTF-8';                           // Enable SMTP authentication
                    $mail->addReplyTo('contact@handi-express.fr', 'Handi Express');
                    $mail->Username = $this->data['configuration']['SMTP_USERNAME'];         // SMTP username
                    $mail->Password = $this->data['configuration']['SMTP_PASSWORD'];         // SMTP password
                    $mail->SMTPSecure = $this->data['configuration']['SMTP_SSL'] == 1 ? "ssl" : 'tls';
                    $mail->Port = $this->data['configuration']['SMTP_PORT'];
                    //Recipients
                    $mail->setFrom('direction@handi-express.fr', 'Handi Express');

                    $mail->addReplyTo($email, $name);
                    $mail->addAddress('contact@handi-express.fr');
                    $mail->addAddress('direction@handi-express.fr');
                    $mail->addAddress('traitement@office-assistance.ma');
                    //Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = $subject;
                    $mail->Body    = $emailMessage;
                    //$mail->SMTPDebug = 3;
                    //var_dump($mail);exit;
                    $mail->send();
                    $mail->clearAddresses();
                    $mail->addAddress($email);
                    $mail->send();
                } catch (\PHPMailer\PHPMailer\Exception $e) {
                    //echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                }*/
                $dataSMTP   = $this->smtp_model->get(['id' => 1]);
                if($dataSMTP->status == 1){
                    require_once(APPPATH."third_party/phpmailer/Exception.php");
                    require_once(APPPATH."third_party/phpmailer/PHPMailer.php");
                    require_once(APPPATH."third_party/phpmailer/SMTP.php");
                    $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
                    try {
                        //$mail->isSMTP();                                      // Set mailer to use SMTP
                        //$mail->Host     = $this->data['configuration']['SMTP_HOST'];// Specify main and backup SMTP servers
                        $mail->Host     = $dataSMTP->smtp_host;// Specify main and backup SMTP servers
                        $mail->SMTPAuth = true;
                        $mail->CharSet  = 'UTF-8';                           // Enable SMTP authentication
                        //$mail->addReplyTo('contact@handi-express.fr', 'Handi Express');
                        $mail->addReplyTo('contact@handi-express.fr', $dataSMTP->name);
                        //$mail->Username = $this->data['configuration']['SMTP_USERNAME'];         // SMTP username
                        $mail->Username = $dataSMTP->smtp_user;         // SMTP username
                        //$mail->Password = $this->data['configuration']['SMTP_PASSWORD'];         // SMTP password
                        $mail->Password = $dataSMTP->smtp_password;         // SMTP password
                        $mail->SMTPSecure = $this->data['configuration']['SMTP_SSL'] == 1 ? "ssl" : 'tls';
                        //$mail->Port = $this->data['configuration']['SMTP_PORT'];
                        $mail->Port = $dataSMTP->smtp_port;
                        //Recipients
                        //$mail->setFrom('direction@handi-express.fr', 'Handi Express');
                        $mail->setFrom($dataSMTP->smtp_user, 'Handi Express');
                        if($dataSMTP->send_copy_to_sender == 1){
                            $mail->addAddress($email);
                        }
                        $mail->addAddress('contact@handi-express.fr');     // Add a recipient
                        $mail->addAddress('traitement@office-assistance.ma');
                        $mail->addAddress($dataSMTP->smtp_user);
                        //Content
                        $mail->isHTML(true);                                  // Set email format to HTML
                        $mail->Subject = $subject;
                        $mail->Body    = $emailMessage;
                        //$mail->SMTPDebug = 3;
                        //var_dump($mail);exit;
                        //$mail->send();
                        //$mail->clearAddresses();
                        /*if($dataSMTP->send_copy_to_sender == 1){
                            $mail->addAddress($email);
                        }*/
                        $mail->SMTPOptions = array(
                            'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                            )
                        );
                        $mail->send();
                    } catch (\PHPMailer\PHPMailer\Exception $e) {
                        //echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                    }
                }
                //$data = ['status' => true, 'msg' => 'Nous avons bien reçu votre message et nous en vers vous remercions, un de nos opérateurs reviendra vers vous dés que possible.'];
                $data = ['status' => true, 'msg' => @$_POST['success_message']];
            } else $data['msg'] = @$error[0];

            echo json_encode($data);
        }
    }

    function submitJobForm()
    {
        if (!$this->input->is_ajax_request()) {
            redirect(base_url());
        } else {

            $data  = ['status'=>false, 'msg' => 'Invalid Request!'];
            $error = job_validate();

            $CV = $Letter = false;
            createJobFilesPath();
            //var_dump($_FILES);exit;
            $this->load->library('upload');
            if(isset($_FILES['cv']['name']) && !empty($_FILES['cv']['name'])){
                $config['upload_path']              = './uploads/jobs/cv/'. date('Y-m-d') . '/';
                $config['allowed_types']            = 'doc|docx|pdf';
                $config['max_size']                 = '10240';
                $config['file_name']                = str_replace(' ', '_', $_FILES['cv']['name']);

                $this->upload->initialize($config);
                if (!$this->upload->do_upload('cv')) {
                    $error[] = $this->upload->display_errors();
                } else {
                    $CV =  $this->upload->data();
                    $CV['upload_path'] = 'uploads/jobs/cv/'. date('Y-m-d') . '/' . $CV['file_name'];
                }
            }

            if(isset($_FILES['letter']['name']) && !empty($_FILES['letter']['name'])){
                $letterConfig['upload_path']    = './uploads/jobs/letter/'. date('Y-m-d') . '/';
                $letterConfig['allowed_types']  = 'doc|docx|pdf';
                $letterConfig['max_size']       = '10240';
                $letterConfig['file_name']      = str_replace('_', '', $_FILES['letter']['name']);
                $this->upload->initialize($letterConfig);
                if (!$this->upload->do_upload('letter')) {
                    $error[] = $this->upload->display_errors();
                } else {
                    $Letter =  $this->upload->data();
                    $Letter['upload_path'] = 'uploads/jobs/letter/'. date('Y-m-d') . '/' . $Letter['file_name'];
                }
            }

            //var_dump($CV);exit;
            if(empty($error)){

                $civility = @$_POST['civility'];
                $name     = @$_POST['name'];
                $lastName = @$_POST['prename'];
                $email    = @$_POST['email'];
                $tel      = @$_POST['tel'];
                $zip      = @$_POST['postal_code'];
                $dob      = to_unix_date(@$_POST['dob']);
                $age      = calculateAge($dob);
                $offer    = @$_POST['offer'];
                date_default_timezone_set('Europe/Paris');

                $this->load->model('jobs_model');
                $this->jobs_model->create([
                    'civility'      => $civility,
                    'first_name'    => $name,
                    'last_name'     => $lastName,
                    'email'         => $email,
                    'telephone'     => $tel,
                    'status'        => "New",
                    'postal_code'   => $zip,
                    'dob'           => $dob,
                    'age'           => $age,
                    'offer'         => $offer,
                    'cv'            => $CV != false ? json_encode($CV) : '',
                    'letter'        => $Letter != false ? json_encode($Letter) : '',
                    'ip_address'    => $this->input->ip_address()
                ]);

                $subject = "Candidature Chauffeur Handi-Express.fr";

                $emailMessage = "Madame, Monsieur <br> <p>Nous avons bien reçu votre candidature, et nous vous en remercions, sachez que si votre profil nous convient, nous allons vous convoquer par email à un entretien d'embauche.</p>";
                $emailMessage .= "---------------------------------------------------------------------------------------------------------------------------------- <br>";
                $emailMessage .= "<p> Date : " . date('d M Y') .", Heure: " . date("H:i:s") . "</p>";
                $emailMessage .= "<p><b>De :</b> $civility $name $lastName</p>";
                $emailMessage .= "<p><b>Job Offer :</b> $offer </p>";
                $emailMessage .= "<p><b>DOB :</b> " . $_POST['dob'] . " </p>";
                $emailMessage .= "<p><b>Age :</b> $age </p>";
                $emailMessage .= "<p><b>Telephone :</b> $tel </p>";
                $emailMessage .= "<p><b>Code Postal :</b> $zip </p>";
                $emailMessage .= "<p><b>Email :</b> $email </p>";
                $emailMessage .= "---------------------------------------------------------------------------------------------------------------------------------- <br>";
                /*$emailMessage .= "<p style='color:#f24e3a'>NB : Merci de ne pas répondre à cet email directement, et<br>";
                $emailMessage .= "d'utiliser nos coordonnées ci-dessous pour nous contacter.</p><br>";*/

                $emailMessage .= "<h4 style='color: #000'>HANDI EXPRESS SAS<br>";
                $emailMessage .= "Service secrétariat</h4>";
                $emailMessage .= "<p><b>Siteweb : </b>www.handi-express.fr</p>";
                $emailMessage .= "<p><b>Email : </b>direction@handi-express.fr</p>";
                $emailMessage .= "<p><b>Tél : </b>01 48 13 09 34</p>";
                $emailMessage .= "<p><b>Fax : </b>01 83 62 84 04</p>";
                $emailMessage .= "<p><b>Adresse : </b>48-50 Avenue d'Enghien 93800 Epinay sur seine</p>";

                /*require_once(APPPATH."third_party/phpmailer/Exception.php");
                require_once(APPPATH."third_party/phpmailer/PHPMailer.php");
                require_once(APPPATH."third_party/phpmailer/SMTP.php");
                $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
                try {
                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host     = $this->data['configuration']['SMTP_HOST'];// Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;
                    $mail->CharSet  = 'UTF-8';                           // Enable SMTP authentication
                    $mail->addReplyTo('contact@handi-express.fr', 'Handi Express');
                    $mail->Username = $this->data['configuration']['SMTP_USERNAME'];         // SMTP username
                    $mail->Password = $this->data['configuration']['SMTP_PASSWORD'];         // SMTP password
                    $mail->SMTPSecure = $this->data['configuration']['SMTP_SSL'] == 1 ? "ssl" : 'tls';
                    $mail->Port = $this->data['configuration']['SMTP_PORT'];
                    //Recipients
                    $mail->setFrom('direction@handi-express.fr', 'Handi Express');
                    $mail->addReplyTo($email, $name);
                    $mail->addAddress('contact@handi-express.fr');     // Add a recipient
                    $mail->addAddress('direction@handi-express.fr');
                    $mail->addAddress('traitement@office-assistance.ma');
                    //$mail->addAddress('bilalblaxi@gmail.com');

                    if($CV != false)
                        $mail->addAttachment($CV['full_path'], $CV['client_name']);

                    if($Letter != false)
                        $mail->addAttachment($Letter['full_path'], $Letter['client_name']);

                    //Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = $subject;
                    $mail->Body    = $emailMessage;
                    $mail->send();
                    $mail->clearAddresses();
                    $mail->addAddress($email);
                    $mail->send();
                } catch (\PHPMailer\PHPMailer\Exception $e) {
                    //echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                }*/
                
                $dataSMTP   = $this->smtp_model->get(['id' => 1]);
                if($dataSMTP->status == 1){
                    require_once(APPPATH."third_party/phpmailer/Exception.php");
                    require_once(APPPATH."third_party/phpmailer/PHPMailer.php");
                    require_once(APPPATH."third_party/phpmailer/SMTP.php");
                    $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
                    try {
                        //$mail->isSMTP();                                      // Set mailer to use SMTP
                        // $mail->Host     = $this->data['configuration']['SMTP_HOST'];// Specify main and backup SMTP servers
                        $mail->Host     = $dataSMTP->smtp_host;// Specify main and backup SMTP servers
                        $mail->SMTPAuth = true;
                        $mail->CharSet  = 'UTF-8';                           // Enable SMTP authentication
                        // $mail->addReplyTo('contact@handi-express.fr', 'Handi Express');
                        $mail->addReplyTo('contact@handi-express.fr', $dataSMTP->name);
                        // $mail->Username = $this->data['configuration']['SMTP_USERNAME'];         // SMTP username
                        $mail->Username = $dataSMTP->smtp_user;         // SMTP username
                        // $mail->Password = $this->data['configuration']['SMTP_PASSWORD'];         // SMTP password
                        $mail->Password = $dataSMTP->smtp_password;         // SMTP password
                        $mail->SMTPSecure = $this->data['configuration']['SMTP_SSL'] == 1 ? "ssl" : 'tls';
                        // $mail->Port = $this->data['configuration']['SMTP_PORT'];
                        $mail->Port = $dataSMTP->smtp_port;
                        //Recipients
                        // $mail->setFrom('direction@handi-express.fr', 'Handi Express');
                        $mail->setFrom($dataSMTP->smtp_user, 'Handi Express');
                        if($dataSMTP->send_copy_to_sender == 1){
                            $mail->addAddress($email);
                        }
                        $mail->addAddress('contact@handi-express.fr');     // Add a recipient
                        $mail->addAddress('traitement@office-assistance.ma');
                        $mail->addAddress($dataSMTP->smtp_user);
                        //$mail->addAddress('bilalblaxi@gmail.com');

                        if($CV != false)
                            $mail->addAttachment($CV['full_path'], $CV['client_name']);

                        if($Letter != false)
                            $mail->addAttachment($Letter['full_path'], $Letter['client_name']);

                        //Content
                        $mail->isHTML(true);                                  // Set email format to HTML
                        $mail->Subject = $subject;
                        $mail->Body    = $emailMessage;
                        //$mail->send();
                        //$mail->clearAddresses();
                        /*if($dataSMTP->send_copy_to_sender == 1){
                            $mail->addAddress($email);
                        }*/
                        $mail->SMTPOptions = array(
                            'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                            )
                        );
                        $mail->send();
                    } catch (\PHPMailer\PHPMailer\Exception $e) {
                        //echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                    }
                }
                //$data = ['status' => true, 'msg' => 'Nous avons bien reçu votre candidature, et nous vous en remercions, sachez que si votre profil nous convient, nous allons vous convoquer par email à un entretien d\'embauche. Cordialement'];
                $data = ['status' => true, 'msg' => @$_POST['success_message']];
            } else $data['msg'] = @$error[0];

            echo json_encode($data);
        }
    }


    function callMe()
    {
        if (!$this->input->is_ajax_request()) {
            redirect(base_url());
        } else {
            $data = ['status' => false, 'msg' => 'Invalid Request!'];

            $error = call_validate();
            if (empty($error)) {
                error_reporting(E_ERROR | E_WARNING);
                $civility = @$_POST['civility'];
                $name     = @$_POST['name'];
                $lastName = @$_POST['prename'];
                $company  = @$_POST['company'];
                $email    = @$_POST['email'];
                $tel      = @$_POST['num'];
                $subject  = @$_POST['subject'];
                $day      = @$_POST['days'];
                //$dob      = to_unix_date(@$_POST['dob']);
                $from_time= @$_POST['from_time'];
                $to_time  = @$_POST['to_time'];
                $message  = @$_POST['message'];

                $this->load->model('calls_model');
                $this->calls_model->create([
                    'civility'      => $civility,
                    'first_name'    => $name,
                    'last_name'     => $lastName,
                    'email'         => $email,
                    'company'       => $company,
                    'telephone'     => $tel,
                    'subject'       => $subject,
                    'day'           => $day,
                    //'dob'             => $dob,
                    'from_time'     => $from_time,
                    'to_time'       => $to_time,
                    'message'       => $message,
                    'status'        => "New",
                    'ip_address'    => $this->input->ip_address()
                ]);

                date_default_timezone_set('Europe/Paris');

                $emailMessage = "Madame, Monsieur <br> <p>si vous n'arrivez pas à nous joindre, sachez que nous avons enregistré vos coordonnées et un opérateur vous rappellera dés que possible.</p>";
                $emailMessage .= "<p> Date : " . date('d M Y') .", Heure: " . date("H:i:s") . "</p>";
                $emailMessage .= "<p><b>De :</b> $civility $name $lastName</p>";
                $emailMessage .= "<p><b>Company :</b> $company </p>";
                $emailMessage .= "<p><b>Telephone :</b> $tel </p>";
                //$emailMessage .= "<p><b>DOB :</b> " . $_POST['dob'] . " </p>";
                $emailMessage .= "<p><b>Email :</b> $email </p>";
                $emailMessage .= "<p><b>Objet :</b> $subject </p>";
                $emailMessage .= "<p><b>Heure de contact :</b> $day De{$from_time}H A{$to_time}H.</p>";

                $subject = "Demande de Rappel Handi-Express.fr";
                $emailMessage .= "<h4 style='color: #000'>HANDI EXPRESS SAS<br>";
                $emailMessage .= "Service secrétariat</h4>";
                $emailMessage .= "<p><b>Siteweb : </b>www.handi-express.fr</p>";
                $emailMessage .= "<p><b>Email : </b>contact@handi-express.fr</p>";
                $emailMessage .= "<p><b>Tél : </b>01 48 13 09 34</p>";
                $emailMessage .= "<p><b>Fax : </b>01 83 62 84 04</p>";
                $emailMessage .= "<p><b>Adresse : </b>48-50 Avenue d'Enghien 93800 Epinay sur seine</p>";
                
                $dataSMTP   = $this->smtp_model->get(['id' => 1]);
                if($dataSMTP->status == 1){
                    require_once(APPPATH."third_party/phpmailer/Exception.php");
                    require_once(APPPATH."third_party/phpmailer/PHPMailer.php");
                    require_once(APPPATH."third_party/phpmailer/SMTP.php");
                    $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
                    try {
                        //$mail->isSMTP();                                      // Set mailer to use SMTP
                        // $mail->Host     = $this->data['configuration']['SMTP_HOST'];// Specify main and backup SMTP servers
                        $mail->Host     = $dataSMTP->smtp_host;// Specify main and backup SMTP servers
                        $mail->SMTPAuth = true;
                        $mail->CharSet  = 'UTF-8';                           // Enable SMTP authentication
                        // $mail->addReplyTo('contact@handi-express.fr', 'Handi Express');
                        $mail->addReplyTo('contact@handi-express.fr', $dataSMTP->name);
                        // $mail->Username = $this->data['configuration']['SMTP_USERNAME'];         // SMTP username
                        $mail->Username = $dataSMTP->smtp_user;         // SMTP username
                        // $mail->Password = $this->data['configuration']['SMTP_PASSWORD'];         // SMTP password
                        $mail->Password = $dataSMTP->smtp_password;         // SMTP password
                        $mail->SMTPSecure = $this->data['configuration']['SMTP_SSL'] == 1 ? "ssl" : 'tls';
                        // $mail->Port = $this->data['configuration']['SMTP_PORT'];
                        $mail->Port = $dataSMTP->smtp_port;
                        //Recipients
                        // $mail->setFrom('direction@handi-express.fr', 'Handi Express');
                        $mail->setFrom($dataSMTP->smtp_user, 'Handi Express');
                        if($dataSMTP->send_copy_to_sender == 1){
                            $mail->addAddress($email);
                        }
                        $mail->addAddress('contact@handi-express.fr');     // Add a recipient
                        $mail->addAddress('traitement@office-assistance.ma');
                        $mail->addAddress($dataSMTP->smtp_user);
                        //$mail->addAddress('bilalblaxi@gmail.com');
    
                        if($CV != false)
                            $mail->addAttachment($CV['full_path'], $CV['client_name']);
    
                        if($Letter != false)
                            $mail->addAttachment($Letter['full_path'], $Letter['client_name']);
    
                        //Content
                        $mail->isHTML(true);                                  // Set email format to HTML
                        $mail->Subject = $subject;
                        $mail->Body    = $emailMessage;
                        //$mail->send();
                        //$mail->clearAddresses();
                        /*if($dataSMTP->send_copy_to_sender == 1){
                            $mail->addAddress($email);
                        }*/
                        $mail->SMTPOptions = array(
                            'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                            )
                        );
                        $mail->send();
                    } catch (\PHPMailer\PHPMailer\Exception $e) {
                        $data['errors'] = 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;;
                        $data['msg'] = "La connexion a échoué";
                        die($data);
                    }
                }

                //$identifiant="handiexpress93"; /*identifiant créé via le Manager*/
                //$mot_de_passe="adil1977"; /*mot de passe de l'identifiant créé via le Manager*/
                //$votre_ligne_qui_appel = $_REQUEST["num"]; /*normalement, c'est le numéro de votre ligne click2call*/
                //$ligne_a_appeler="0033148130934"; /*on récupère la valeur (numéro) renseigné dans le formulaire de la page html*/
                //$votre_ligne="0972303551"; /*votre numéro de ligne sur lequel vous avez mis en place votre click2call dans le Manager*/
                //try {
                    //$soap = new SoapClient("https://www.ovh.com/soapi/soapi-re-1.63.wsdl");
                    /*telephonyClick2CallDo*/
                    //$data['res'] = $soap->telephonyClick2CallDo("$identifiant", "$mot_de_passe", "$votre_ligne_qui_appel", "$ligne_a_appeler", "$votre_ligne");
                    //$data['msg'] = "Merci de patienter...un operateur va prendre votre appel...";
                    //$data['msg'] = @$_POST['success_message'];
                    //$data['status'] = true;
                //} catch (SoapFault $fault) {
                    //$data['errors'] = $fault;
                    //$data['msg'] = "La connexion a échoué";
                //}
                $dataCallback   = $this->smtp_model->get(['id' => 1]);
                if($dataCallback->status1 == 1){
                    $identifiant="handiexpress93"; /*identifiant créé via le Manager*/
                    $mot_de_passe="adil1977"; /*mot de passe de l'identifiant créé via le Manager*/
                    $votre_ligne_qui_appel = $_REQUEST["num"]; /*normalement, c'est le numéro de votre ligne click2call*/
                    // $ligne_a_appeler="0033148130934"; /*on récupère la valeur (numéro) renseigné dans le formulaire de la page html*/
                    // $votre_ligne="0972303551"; /*votre numéro de ligne sur lequel vous avez mis en place votre click2call dans le Manager*/
                    $ligne_a_appeler=$dataCallback->call_from; /*on récupère la valeur (numéro) renseigné dans le formulaire de la page html*/
                    $votre_ligne=$dataCallback->call_to; /*votre numéro de ligne sur lequel vous avez mis en place votre click2call dans le Manager*/
                    try {
                        // $soap = new SoapClient("https://www.ovh.com/soapi/soapi-re-1.63.wsdl");
                        $soap = new SoapClient($dataCallback->host1);
                        /*telephonyClick2CallDo*/
                        $data['res'] = $soap->telephonyClick2CallDo("$identifiant", "$mot_de_passe", "$votre_ligne_qui_appel", "$ligne_a_appeler", "$votre_ligne");
                        $data['msg'] = @$_POST['success_message'];
                        $data['status'] = true;
                    } catch (SoapFault $fault) {
                        $data['errors'] = $fault;
                        $data['msg'] = "La connexion a échoué";
                    }
                }else{
                    $data['errors'] = 0;
                    $data['msg'] = "Rappel non activé";
                }
            } else $data['msg'] = @$error[0];

            echo json_encode($data);
        }
    }
    
    function submitContactFormPopup(){
        if (!$this->input->is_ajax_request()) {
            redirect(base_url());
        } else {    
            $data  = ['status'=>false, 'msg' => 'Invalid Request!'];
            
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
                            'ip_address'    => $this->input->ip_address()
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
            $this->data['info']         = $this->input->post();
            $message                    = $this->load->view(
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
                $message            = $this->lang->line('email_received');
				$message 			.= '<br/><br/> :<a href="'.site_url('support/login').'">Login Link</a><br/>';
				$message 			.= $this->lang->line('forgot_password_username_identity_label').':- '.$user_details['username'];
				$message 			.= '<br/>'.$this->lang->line('create_user_validation_password_label').':- '.$user_details['phone'];
                $this->email->set_newline("\r\n");
                $this->email->from($site_settings_rec->portal_email); // change it to yours
                $this->email->to($this->input->post('email'));
                $this->email->subject('Acknowledgement - Support system');
                $this->email->message($message);
                $this->email->send();
                
                $data = ['status' => true, 'msg' => @$_POST['success_message']];
            }
            else {
                $data['msg'] = @$error[0];
            }


            echo json_encode($data);
        }
    }

        function client()
    {

        $checkIfLogin = $this->basic_auth->is_login();

        if($checkIfLogin){
            redirect("admin/dashboard");
        }

        $this->data['title'] = $this->lang->line('Client login');
        $this->data['alert'] = "";
         
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[2]|valid_email|max_length[50]|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[2]|max_length[50]|xss_clean');

            if ($this->form_validation->run() !== false) {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $remember = $this->input->post('remember_me');

                $where_in = array(6,7,8,9);
                $user =  $this->db->where(['email'=> $username, 'password' => md5($password)])->WHERE_IN('role_id',$where_in)->get('vbs_users')->row_array();


                if ($user && $user['active'] == 1) {

               $_SESSION['clients'] = $user['id'];
                 }

                if($user != false){
                   // redirect("admin/dashboard");
                } else
                    $this->data['alert'] = [
                        'message' => "Authentication failed.",
                        'class' => "alert-danger",
                        'type' => "Error"
                    ];

            } else
                $this->data['alert'] = [
                    'message' => "Invalid email or password.",
                    'class' => "alert-danger",
                    'type' => "Error"
                ];
        }
        

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
        $this->data['css'] = array('form');
        $this->data['bread_crumb'] = true;
        $this->data['heading'] = $this->lang->line('login');;
        $this->data['content']  = 'site/client_login';
        $this->data['active_class'] = $this->lang->line('login');
        $this->data['sub_heading']  = "User ".$this->lang->line('login');
        $this->data['journey_details']  = $this->session->userdata('journey_details');

        $this->_render_page('templates/site_template', $this->data);
    
    }


    public function signup()
    {
        $this->data['title'] = "register";

        $this->load->config('ion_auth');
        $this->config->load('ion_auth', TRUE);
        $tables = $this->config->item('tables', 'ion_auth');
        if ($this->input->post('email')) {

            // validate form input

            $this->form_validation->set_rules('firstname', $this->lang->line('create_user_validation_fname_label') , 'required|xss_clean');
            $this->form_validation->set_rules('lastname', $this->lang->line('create_user_validation_lname_label') , 'required|xss_clean');
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label') , 'required|valid_email|is_unique[vbs_users.email]');
            $this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone1_label') , 'required|xss_clean|integer|min_length[10]|max_length[11]');
            $this->form_validation->set_rules('address1', $this->lang->line('create_user_validation_address_label') , 'required|xss_clean');
            $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label') , 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
            $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label') , 'required');
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if ($this->form_validation->run() == true) {
                $username = $this->input->post('first_name') . ' ' . $this->input->post('last_name');
                $email = strtolower($this->input->post('email'));
                $password = $this->input->post('password');
                $user_role = $this->input->post('user-type');
                $additional_data = array(
                    'first_name' => $this->input->post('firstname') ,
                    'last_name' => $this->input->post('lastname') ,
                    'phone' => $this->input->post('phone') ,
                    'date_of_registration' => date('Y-m-d')
                );

                if ($this->form_validation->run() == true && $this->ion_auth->register($user_role,$username, $password, $email, $additional_data)) {

                    $user_rec = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('users') . " WHERE email = '" . $email ."'");
                    $inputdata['user_id'] = $user_rec[0]->id;
                    $inputdata['address1'] = $this->input->post('address1');
                    $inputdata['address2'] = $this->input->post('address2');
                    $inputdata['fax_no'] = $this->input->post('fax');
                    $inputdata['company_name'] = $this->input->post('company');
                    $table_name = "users_details";
                    $this->base_model->insert_operation($inputdata, $table_name);

                    $this->basic_auth->client_login($username, $password, $remember);
                    if($this->ion_auth->logged_in()){
                    // check to see if we are creating the user
                    // redirect them back to the admin page
                    $this->prepare_flashmessage($this->ion_auth->messages() , 2);
                    redirect("welcome/passengerDetails", 'refresh');
                }
                }else{
                    $username = $this->input->post('first_name') . ' ' . $this->input->post('last_name');
                    $email = strtolower($this->input->post('email'));
                    $password = $this->input->post('password');
                  //  echo "login";
                    $this->ion_auth->login($email , $password);
                  

                    // check to see if we are creating the user
                    // redirect them back to the admin page
                    if($this->ion_auth->logged_in()){
                        $this->prepare_flashmessage($this->ion_auth->messages() , 2);
                        redirect("welcome/passengerDetails", 'refresh');
                    }
                   
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
        $this->data['fax'] = array(
            'name' => 'fax',
            'class' => 'phone1',
            'placeholder' => $this->lang->line('fax') ,
            'id' => 'fax',
            'type' => 'text',
            'maxlength' => '15',
            'value' => $this->form_validation->set_value('fax') ,
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
        $this->data['company'] = array(
            'name' => 'company',
            'class' => 'user',
            'placeholder' => $this->lang->line('company') ,
            'id' => 'company',
            'type' => 'text',
            'maxlength' => '150',
            'value' => $this->form_validation->set_value('company') ,
        );
        $this->data['address1'] = array(
            'name' => 'address1',
            'class' => 'user',
            'placeholder' => $this->lang->line('address') ,
            'id' => 'address1',
            'type' => 'text',
            'value' => $this->form_validation->set_value('address') ,
        );
       
        $this->data['css'] = array(
            'form'
        );
        $this->data['title'] = 'Register';
        $this->data['gmaps'] = 'true';
        $this->data['heading'] = 'Register';
        $this->data['bread_crumb'] = true;
        $this->data['content']  = 'site/client_signup';
        $this->data['journey_details']  = $this->session->userdata('journey_details');
        $this->data['active_class'] = "register";
        $this->data['sub_heading']  = $this->lang->line('register');
        $this->_render_page('templates/site_template', $this->data);
    }


    public function Test()
    {
        echo $_SESSION['clients'];
    }


}