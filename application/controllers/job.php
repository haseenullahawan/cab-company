<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Job extends MY_Controller

{
    function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->lang->load('auth');
        $this->lang->load('general');
        $this->load->helper('language');
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
        $this->load->model('sitemodel');
        

        $this->data['configuration'] = get_configuration();
    }
    
    /* Added by Saravanan.R
       STARTS
    */
    public function home(){
        if($this->session->userdata('role_id')!='8'){
            $this->session->set_flashdata('error', 'Invalide detail');
            redirect('jobseeker/login.php');
        }
        redirect('job');
        
    }
    public function index() {
        $this->data['css_type'] 	= array("form","datatable");
        $this->data['active_class'] = "Jobseeker";
        $this->data['gmaps'] 		= false;
        $this->data['title'] 		= 'Jobseeker';
        $this->data['subtitle'] 	= 'Jobseeker';
        $this->data['title_link'] 	= '#';
        $this->data['civility'] = array(
            'name' => 'civility', 'class' => 'user form-control', 'placeholder' => 'Civility',
            'id' => 'civility',   'type' => 'text',  'value' => $this->form_validation->set_value('civility'),
        );
       $this->data['first_name'] = array(
            'name' => 'firstname', 'class' => 'user form-control', 'placeholder' => 'First name',
            'id' => 'first_name',   'type' => 'text',  'value' => $this->form_validation->set_value('first_name'),
        );
       $this->data['last_name'] = array(
            'name' => 'lastname', 'class' => 'user form-control', 'placeholder' => 'Last name',
            'id' => 'last_name', 'type' => 'text', 'value' => $this->form_validation->set_value('last_name'),
        );
       $this->data['email'] = array(
            'name' => 'email', 'class' => 'user-name form-control', 'placeholder' => 'User Email',
            'id' => 'email', 'type' => 'text', 'value' => $this->form_validation->set_value('email'),
        );
       $this->data['phone'] = array(
            'name' => 'phone', 'class' => 'phone1 form-control', 'placeholder' => 'phone',
            'id' => 'phone',   'type' => 'text', 'maxlength' => '11', 'value' => $this->form_validation->set_value('phone'),
        );
       $this->data['mobile'] = array(
            'name' => 'mobile', 'class' => 'phone1 form-control', 'placeholder' => 'Mobile',
            'id' => 'mobile', 'type' => 'text', 'maxlength' => '15', 'value' => $this->form_validation->set_value('mobile'),
        );
       $this->data['fax'] = array(
            'name' => 'fax', 'class' => 'phone1 form-control', 'placeholder' => 'Fax',
            'id' => 'fax', 'type' => 'text', 'maxlength' => '15', 'value' => $this->form_validation->set_value('fax'),
        );
       $this->data['password'] = array(
            'name' => 'password', 'class' => 'password form-control', 'placeholder' => 'Password','id' => 'password',
            'type' => 'password', 'value' => $this->form_validation->set_value('password'),
        );
       $this->data['company'] = array(
            'name' => 'company', 'class' => 'user form-control', 'placeholder' => 'Company',
            'id' => 'company', 'type' => 'text', 'maxlength' => '150', 'value' => $this->form_validation->set_value('company'),
        );
       $this->data['address'] = array(
            'name' => 'address', 'class' => 'user form-control', 'placeholder' => 'Address',
            'id' => 'address',   'type' => 'text',  'value' => $this->form_validation->set_value('address'),
        );
       $this->data['city'] = array(
            'name' => 'city', 'class' => 'user form-control', 'placeholder' => 'City',
            'id' => 'city',   'type' => 'text',  'value' => $this->form_validation->set_value('city'),
        );
       $this->data['zipcode'] = array(
            'name' => 'zipcode', 'class' => 'user form-control', 'placeholder' => 'Zipcode',
            'id' => 'zipcode',   'type' => 'text',  'value' => $this->form_validation->set_value('zipcode'),
        );
        $this->data['content'] 		= 'site/jobseekers';
		$this->data['job_jobcategory'] = $this->sitemodel->getConfig('job_jobcategory');
		$this->data['job_requiredexperiance'] = $this->sitemodel->getConfig('job_requiredexperiance');
		$this->data['job_typeofcontract'] = $this->sitemodel->getConfig('job_typeofcontract');
		$this->data['job_workingplace'] = $this->sitemodel->getConfig('job_workingplace');
		$this->data['job_natureofcontract'] = $this->sitemodel->getConfig('job_natureofcontract');
		$this->data['job_hourspermonth'] = $this->sitemodel->getConfig('job_hourspermonth');
		$this->data['job_job'] = $this->sitemodel->getConfig('job_job');


	
        $this->data['jobs_listing']= $this->sitemodel->getJob_fornt();
        //print_r($this->data['jobs_listing']);
      //  die();
        $this->_render_page('templates/site_template', $this->data); 
    }
    public function job_detail($id){
         $this->data['css_type'] 	= array("form","datatable");
        $this->data['active_class'] = "Jobseeker";
        $this->data['gmaps'] 		= false;
        $this->data['title'] 		= 'Jobseeker';
        $this->data['subtitle'] 	= 'Jobseeker';
        $this->data['title_link'] 	= '#';
          $this->data['content'] 		= 'site/job_detail';
        		$this->data['job_detail'] = $this->sitemodel->job_detail($id);
        		if($this->data['job_detail']->num_rows()==0){
        		    redirect();
        		}
         $this->_render_page('templates/site_template', $this->data); 
    }
    public function signup() {
        $this->data['css_type'] 	= array("form","datatable");
        $this->data['active_class'] = "Jobseeker Signup";
        $this->data['gmaps'] 		= false;
        $this->data['title'] 		= 'Jobseeker Signup';
        $this->data['subtitle'] 	= 'Jobseeker Signup';
        $this->data['title_link'] 	= '#';
        /*$this->data['civility'] = array(
            'name' => 'civility', 'class' => 'user form-control', 'placeholder' => 'Civility',
            'id' => 'civility',   'type' => 'text',  'value' => $this->form_validation->set_value('civility'),
        );
       $this->data['first_name'] = array(
            'name' => 'firstname', 'class' => 'user form-control', 'placeholder' => 'First name',
            'id' => 'first_name',   'type' => 'text',  'value' => $this->form_validation->set_value('first_name'),
        );
       $this->data['last_name'] = array(
            'name' => 'lastname', 'class' => 'user form-control', 'placeholder' => 'Last name',
            'id' => 'last_name', 'type' => 'text', 'value' => $this->form_validation->set_value('last_name'),
        );
       $this->data['email'] = array(
            'name' => 'email', 'class' => 'user-name form-control', 'placeholder' => 'User Email',
            'id' => 'email', 'type' => 'text', 'value' => $this->form_validation->set_value('email'),
        );
       $this->data['phone'] = array(
            'name' => 'phone', 'class' => 'phone1 form-control', 'placeholder' => 'phone',
            'id' => 'phone',   'type' => 'text', 'maxlength' => '11', 'value' => $this->form_validation->set_value('phone'),
        );
       $this->data['mobile'] = array(
            'name' => 'mobile', 'class' => 'phone1 form-control', 'placeholder' => 'Mobile',
            'id' => 'mobile', 'type' => 'text', 'maxlength' => '15', 'value' => $this->form_validation->set_value('mobile'),
        );
       $this->data['fax'] = array(
            'name' => 'fax', 'class' => 'phone1 form-control', 'placeholder' => 'Fax',
            'id' => 'fax', 'type' => 'text', 'maxlength' => '15', 'value' => $this->form_validation->set_value('fax'),
        );
       $this->data['password'] = array(
            'name' => 'password', 'class' => 'password form-control', 'placeholder' => 'Password','id' => 'password',
            'type' => 'password', 'value' => $this->form_validation->set_value('password'),
        );
       $this->data['company'] = array(
            'name' => 'company', 'class' => 'user form-control', 'placeholder' => 'Company',
            'id' => 'company', 'type' => 'text', 'maxlength' => '150', 'value' => $this->form_validation->set_value('company'),
        );
       $this->data['address'] = array(
            'name' => 'address', 'class' => ' form-control', 'placeholder' => 'Address','rows' => '5', 'cols' => '40',
            'id' => 'address',   'type' => 'text',  'value' => $this->form_validation->set_value('address'),
        );
       $this->data['city'] = array(
            'name' => 'city', 'class' => 'user form-control', 'placeholder' => 'City',
            'id' => 'city',   'type' => 'text',  'value' => $this->form_validation->set_value('city'),
        );
       $this->data['zipcode'] = array(
            'name' => 'zipcode', 'class' => 'user form-control', 'placeholder' => 'Zipcode',
            'id' => 'zipcode',   'type' => 'text',  'value' => $this->form_validation->set_value('zipcode'),
        );
        */
        if (!empty($_POST)){
        $this->form_validation->set_rules('firstname', 'first_name', 'trim|required');
       
        $this->form_validation->set_rules('lastname', 'lastname', 'trim|required');
              $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[vbs_users.email]');

        
       $this->form_validation->set_rules('mobile', 'phone', 'trim|required');
       $this->form_validation->set_rules('comp_name', 'name', 'trim|required');
 
        $this->form_validation->set_rules('password', 'password', 'trim|required');
       $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

       
        $this->form_validation->set_rules('address', 'address', 'trim|required');
     
        $this->form_validation->set_rules('city', 'city', 'trim|required');
       
        $this->form_validation->set_rules('zipcode', 'zipcode', 'trim|required');
       if ($this->form_validation->run() == false) {

         $this->data['content'] 		= 'site/jobseeker_signup';
        
        $this->_render_page('templates/site_template', $this->data);
       }
        else{
                $data = array(
                "ip_address"   =>$_SERVER['REMOTE_ADDR'],
                "username"   => $this->input->post('email'),
                "civility"  => $this->input->post('civility'),
                "first_name" => $this->input->post('firstname'),
                "last_name"  => $this->input->post('lastname'),
                "company_name"  => $this->input->post('comp_name'),
                "email" => $this->input->post('email'),
                "phone" => $this->input->post('mobile'),
                "password"   => $this->input->post('password'),
                "address" => $this->input->post('address'),
                "city" => $this->input->post('city'),
                "zipcode" => $this->input->post('zipcode'),
                "role_id" => '8',
                );

                $this->db->insert('vbs_users', $data);
                $this->session->set_flashdata('message', 'JobSeeker has been Register successfully');
                redirect('jobseeker/login');         }
        }else{
            
              $this->data['content'] 		= 'site/jobseeker_signup';
        
        $this->_render_page('templates/site_template', $this->data);
        }
        
         
    }
    
    public function login() {
           $this->data['css_type'] 	= array("form","datatable");
        $this->data['active_class'] = "Jobseeker";
        $this->data['gmaps'] 		= false;
        $this->data['title'] 		= 'Jobseeker Login';
        $this->data['subtitle'] 	= 'Jobseeker Login';
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
             $this->data['content'] 		= 'site/jobseeker_login';  
        }else{
            redirect('jobseeker/home');
        }
        $this->_render_page('templates/site_template', $this->data);
        
    } 
  function validateUserDetail() {
      
      
              $this->load->model('jobseeker_model');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
 
        $result = $this->jobseeker_model->validateDetail('vbs_users',array('username' => $username, 'password' => $password));
 
        if ($result->num_rows() > 0) {
            $jobseeker_data = $result->row();
            if(false){
                $this->form_validation->set_message('validateUserDetail', 'Your Email is not verify.');
                return false;
            }else{
              
                        $this->session->set_userdata('UserId', $jobseeker_data->id);
                        $this->session->set_userdata('username', $jobseeker_data->username);
                        $this->session->set_userdata('role_id', $jobseeker_data->role_id);
                        $this->session->set_userdata('first_name', $jobseeker_data->first_name);
                        /*$this->session->set_userdata('id', $jobseeker_data->id);
                        $this->session->set_userdata('email', $jobseeker_data->email);
                        $this->session->set_userdata('name', $jobseeker_data->real_name);
                        $this->session->set_userdata('access_level', $jobseeker_data->access_level);*/
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
}
    