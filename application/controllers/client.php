<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Client extends MY_Controller

{
    function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->lang->load('auth');
        $this->lang->load('general');
        $this->load->helper('language');
		$this->load->library('session');
		$this->load->model('user_model');
        //if (!$this->basic_auth->is_login())
        //    redirect("admin", 'refresh');
       // else
        //    $this->data['user'] = $this->basic_auth->user();
        $this->load->model('invoice_model');
		$this->load->model('request_model');
		$this->load->model('jobs_model');
		$this->load->model('support_model');
		$this->load->model('calls_model');
        $this->load->model('notes_model');
        $this->load->model('notifications_model');
        $this->load->model('cars_model');
        
        
        $this->data['title'] = "Client Dashboard";
        $this->data['css_type'] = array("form","datatable");
        $this->data['user']  = $this->session->userdata('user');
        
        $this->data['configuration'] = get_configuration();
    }
    
    /* Added by Saravanan.R
       STARTS
    */
    public function signup() {
        $this->data['css_type'] 	= array("form","datatable");
        $this->data['active_class'] = "Client";
        $this->data['gmaps'] 		= false;
        $this->data['title'] 		= 'Client Signup';
        $this->data['subtitle'] 	= 'Client';
        $this->data['title_link'] 	= '#';
        $this->load->library('form_validation');
        
    
        $this->data['civility'] = array('name' => 'civility', 'class' => 'user form-control', 'placeholder' => 'Civility', 'id' => 'civility',   'type' => 'text',  'value' => $this->form_validation->set_value('civility') );
        $this->data['first_name'] = array('name' => 'first_name', 'class' => 'user form-control', 'placeholder' => 'First name', 'id' => 'first_name',   'type' => 'text',  'value' => $this->form_validation->set_value('first_name'));
        $this->data['last_name'] = array('name' => 'last_name', 'class' => 'user form-control', 'placeholder' => 'Last name','id' => 'last_name', 'type' => 'text', 'value' => $this->form_validation->set_value('last_name'));
        $this->data['email'] = array('name' => 'email', 'class' => 'user-name form-control', 'placeholder' => 'User Email','id' => 'email', 'type' => 'text', 'value' => $this->form_validation->set_value('email'));
        $this->data['phone'] = array('name' => 'phone', 'class' => 'phone1 form-control', 'placeholder' => 'phone','id' => 'phone',   'type' => 'text', 'maxlength' => '11', 'value' => $this->form_validation->set_value('phone'));
        $this->data['mobile'] = array('name' => 'mobile', 'class' => 'phone1 form-control', 'placeholder' => 'Mobile','id' => 'mobile', 'type' => 'text', 'maxlength' => '15', 'value' => $this->form_validation->set_value('mobile'));
        $this->data['fax'] = array('name' => 'fax', 'class' => 'phone1 form-control', 'placeholder' => 'Fax','id' => 'fax', 'type' => 'text', 'maxlength' => '15', 'value' => $this->form_validation->set_value('fax'));
        $this->data['password'] = array('name' => 'password', 'class' => 'password form-control', 'placeholder' => 'Password','id' => 'password','type' => 'password', 'value' => $this->form_validation->set_value('password'));
        $this->data['company'] = array('name' => 'company', 'class' => 'user form-control', 'placeholder' => 'Company','id' => 'company', 'type' => 'text', 'maxlength' => '150', 'value' => $this->form_validation->set_value('company'));
        $this->data['address'] = array('name' => 'address', 'class' => 'user form-control', 'placeholder' => 'Address','rows' => '5', 'cols' => '40','id' => 'address',   'type' => 'text',  'value' => $this->form_validation->set_value('address'));
        $this->data['city'] = array('name' => 'city', 'class' => 'user form-control', 'placeholder' => 'City','id' => 'city',   'type' => 'text',  'value' => $this->form_validation->set_value('city'));
        $this->data['zipcode'] = array('name' => 'zipcode', 'class' => 'user form-control', 'placeholder' => 'Zipcode','id' => 'zipcode',   'type' => 'text',  'value' => $this->form_validation->set_value('zipcode'));
        $this->data['content'] 		= 'site/client_signup';
        
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            	// validate form input
        	$this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label') , 'required|xss_clean');
        	$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label') , 'required|xss_clean');
        	$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label') , 'required|valid_email|is_unique[vbs_users.email]');
        	$this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone1_label') , 'xss_clean|integer|min_length[8]|max_length[10]');
        	$this->form_validation->set_rules('mobile', $this->lang->line('create_user_validation_phone1_label') , 'required|xss_clean|integer|min_length[10]|max_length[10]');
        	$this->form_validation->set_rules('address', $this->lang->line('create_user_validation_address_label') , 'required|xss_clean');
        	$this->form_validation->set_rules('city', $this->lang->line('create_user_validation_address_label') , 'required|xss_clean');
        	$this->form_validation->set_rules('zipcode', $this->lang->line('create_user_validation_address_label') , 'required|xss_clean|min_length[5]');
        	$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label') , 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']'); // |matches[password_confirm]
        
        	$this->load->library('form_validation');
        	$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        	
        	if ($this->form_validation->run() == true) {
        		$username = $this->input->post('first_name') . ' ' . $this->input->post('last_name');
        		$email = strtolower($this->input->post('email'));
        		$password = $this->input->post('password');
        		$user_role = 'members';
        		$additional_data = array(
        									'first_name' => $this->input->post('first_name') ,
        									'last_name' => $this->input->post('last_name') ,
        									'phone' => $this->input->post('phone') ,
        									'date_of_registration' => date('Y-m-d')
        								);
        
        		if ($this->form_validation->run() == true && $this->ion_auth->register($user_role,$username, $password, $email, $additional_data)) {
        			$user_rec = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('users') . " WHERE email = '" . $email ."'");
        			$inputdata['user_id'] = $user_rec[0]->id;
        			$inputdata['address1'] = $this->input->post('address');
        			$inputdata['address2'] = $this->input->post('city');
        			$inputdata['fax_no'] = $this->input->post('fax');
        			$inputdata['company_name'] = $this->input->post('company');
        			$table_name = "users_details";
        			
        			$status = $this->base_model->insert_operation($inputdata, $table_name);
        			
        			// $user = $this->basic_auth->login($username, $password);
                  
                    if($status){
				         
                        // $this->session->set_flashdata('message', $this->ion_auth->messages());
        				// check to see if we are creating the user
        				// redirect them back to the admin page
                        $this->session->set_flashdata('messages', $this->ion_auth->messages());
                        redirect('client/login', 'refresh');
        			}
        			else {
        			    $this->session->set_flashdata('error', $this->ion_auth->messages());
                        $this->_render_page('templates/site_template', $this->data);
        			}
        		} 
        		else {
    			    $this->session->set_flashdata('error', $this->ion_auth->messages());
                    $this->_render_page('templates/site_template', $this->data);
    			}
        	}
		}
		else {
		
            
            $this->_render_page('templates/site_template', $this->data);
		}
        //$this->load->view('site/common/header',$this->data); 
        //$this->load->view('site/common/navigation',$this->data); 
        // $this->load->view('site/driver_registration',$this->data); 
        // $this->load->view('site/common/footer',$this->data); 
    }
    
    public function login() {
        
        $this->data['alert'] = "";array("form","datatable");
        $this->data['css_type'] 	= 
        $this->data['active_class'] = "Client";
        $this->data['gmaps'] 		= false;
        $this->data['title'] 		= 'Client Login';
        $this->data['subtitle'] 	= 'Client Login';
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
				    $this->session->set_userdata("user", $user);
                    $this->session->set_flashdata('message', $this->ion_auth->messages());
                    redirect("client/dashboard", 'refresh');
                } else
                    echo "<PRE>";print_r($user);echo "</PRE>";  
                    $this->data['alert'] = [
                        'message' => "Authentication failed.",
                        'class' => "alert-danger",
                        'type' => "Error"
                    ];

            } else {
                $this->data['alert'] = [
                    'message' => "Invalid email or password.",
                    'class' => "alert-danger",
                    'type' => "Error"
                ];
            }
        }
        
        $this->data['content'] 		= 'site/client_login';
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
        
        $this->_render_page('templates/site_template', $this->data);
        
    } 
    
    public function logout() {
        $this->basic_auth->logout();
        // redirect them to the login page
        //$this->session->set_flashdata('message', $this->basic_auth->messages());
        redirect('client/login', 'refresh');
    }
    
    public function dashboard() {
        $this->data['css'] = array('form');
        $this->data['bread_crumb'] = true;
        $this->data['heading'] = 'Client Dashboard';
        $this->data['content']  = 'users/dashboard';
        $this->data['forgot_form']  = false;  
         
        $this->_render_page('templates/client_template', $this->data);
    }
    /* ENDS by Saravanan.R */
    
}
    