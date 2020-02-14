<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Driver extends MY_Controller

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

        $this->data['configuration'] = get_configuration();
        $this->data['title'] = "Driver Dashboard";
        $this->data['css_type'] = array("form","datatable");
        $this->data['user']  = $this->session->userdata('user');
    }
    /*
    public function index()
    {
        $this->data['css_type'] = array("form", "datatable");
        $this->data['active_class'] = "cars";
        $this->data['gmaps'] = false;
        $this->data['title'] = $this->lang->line("cars");
        $this->data['title_link'] = base_url('admin/cars');
        $this->data['content'] = 'admin/cars/index';

        $this->load->model('calls_model');
        $this->load->model('request_model');
        $this->load->model('jobs_model');

        $data = [];
        $data['request'] = $this->request_model->getAll();
        $data['jobs'] = $this->jobs_model->getAll();
        $data['calls'] = $this->calls_model->getAll();

        $this->data['data'] = $this->request_model->getAll();
        $this->_render_page('templates/admin_template', $this->data);
    }*/

    public function configurations(){
        $this->data['css_type'] 	= array("form","datatable");
        $this->data['active_class'] = "Config Drivers";
        $this->data['gmaps'] 		= false;
        $this->data['title'] 		= $this->lang->line("configurations");
        $this->data['subtitle'] 	= 'Config Drivers';
        $this->data['title_link'] 	= '#';
        $this->data['content'] 		= 'admin/drivers/configurations';
        $data = [];
        $this->data['data'] = $this->notifications_model->getAll();
        $this->_render_page('templates/admin_template', $this->data);
    }

    
    /* Added by Saravanan.R
       STARTS
    */
    public function index() {
        $this->data['css_type'] 	= array("form","datatable");
        $this->data['active_class'] = "Drivers";
        $this->data['gmaps'] 		= false;
        $this->data['title'] 		= 'Drivers';
        $this->data['subtitle'] 	= 'Drivers';
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
            'name' => 'address', 'class' => 'user form-control', 'placeholder' => 'Address','rows' => '5', 'cols' => '40',
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
        $this->data['content'] 		= 'site/drivers';
        
        $this->_render_page('templates/site_template', $this->data); 
    }
    
    public function signup() {
        $this->data['css_type'] 	= array("form","datatable");
        $this->data['active_class'] = "Driver";
        $this->data['gmaps'] 		= false;
        $this->data['title'] 		= 'Driver Signup';
        $this->data['subtitle'] 	= 'Driver';
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
        $this->data['content'] 		= 'site/driver_signup';
        
        
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
        		$user_role = 'drivers';
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
                        redirect('driver/login', 'refresh');
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
    }
    
    public function login() {
           $this->data['css_type'] 	= array("form","datatable");
        $this->data['active_class'] = "Drivers";
        $this->data['gmaps'] 		= false;
        $this->data['title'] 		= 'Driver Login';
        $this->data['subtitle'] 	= 'Driver Login';
        
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
                    redirect("driver/dashboard", 'refresh');
                } else
                    
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
        
        $this->data['content'] 		= 'site/driver_login';
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
        $this->session->set_flashdata('message', $this->ion_auth->messages());
        redirect('driver/login', 'refresh');
    }
    
    public function dashboard() {
        $this->data['css'] = array('form');
        $this->data['bread_crumb'] = true;
        $this->data['heading'] = 'Driver Dashboard';
        $this->data['content']  = 'driver/dashboard';
        $this->data['forgot_form']  = false;  
         
        $this->_render_page('templates/client_template', $this->data);
    }

    /* ENDS by Saravanan.R */
    
    public function addstatusprocess(){
        extract($_GET);
        //print_r($_GET);
        //die();
        $values = [
            'status' => $statut,
            'is_delete' => 1,
            'create_date' => date("Y-m-d H:i:s")
        ];


       // print_r($values);

      $insert = $this->cars_model->insertData('vbs_driverStatus',$values,'status',$statut);

       if($insert == 1){
           echo "success";
       }
    }

    public function addciviliteprocess(){
        extract($_GET);
        //print_r($_GET);
        //die();
        $values = [
            'civilite' => $civilite,
            'is_delete' => 1,
            'create_date' => date("Y-m-d H:i:s")
        ];


        // print_r($values);

        $insert = $this->cars_model->insertData('vbs_driverCivilite',$values,'civilite',$civilite);

        if($insert == 1){
            echo "success";
        }
    }
    public function addpostprocess(){
        extract($_GET);
        //print_r($_GET);
        //die();
        $values = [
            'post' => $post,
            'is_delete' => 1,
            'create_date' => date("Y-m-d H:i:s")
        ];


        // print_r($values);

        $insert = $this->cars_model->insertData('vbs_driverPost',$values,'post',$post);

        if($insert == 1){
            echo "success";
        }
    }
    public function addpatternprocess(){
        extract($_GET);
        //print_r($_GET);
        //die();
        $values = [
            'pattern' => $pattern,
            'is_delete' => 1,
            'create_date' => date("Y-m-d H:i:s")
        ];


        // print_r($values);

        $insert = $this->cars_model->insertData('vbs_driverPattern',$values,'pattern',$pattern);

        if($insert == 1){
            echo "success";
        }
    }
    public function addageprocess(){
        extract($_GET);
        //print_r($_GET);
        //die();
        $values = [
            'contract' => $age,
            'is_delete' => 1,
            'create_date' => date("Y-m-d H:i:s")
        ];


        // print_r($values);

        $insert = $this->cars_model->insertData('vbs_driverContract',$values,'contract',$age);

        if($insert == 1){
            echo "success";
        }
    }
    public function addseriesprocess(){
        extract($_GET);
        //print_r($_GET);
        //die();
        $values = [
            'nature' => $series,
            'is_delete' => 1,
            'create_date' => date("Y-m-d H:i:s")
        ];


        // print_r($values);

        $insert = $this->cars_model->insertData('vbs_driverNature',$values,'nature',$series);

        if($insert == 1){
            echo "success";
        }
    }

      public function addboiteprocess(){
        extract($_GET);
        //print_r($_GET);
        //die();
        $values = [
            'hours' => $boite,
            'is_delete' => 1,
            'create_date' => date("Y-m-d H:i:s")
        ];


        // print_r($values);

        $insert = $this->cars_model->insertData('vbs_driverHours',$values,'hours',$boite);

        if($insert == 1){
            echo "success";
        }
    }

        public function addfuelprocess(){
        extract($_GET);
        //print_r($_GET);
        //die();
        $values = [
            'type' => $fuel,
            'is_delete' => 1,
            'create_date' => date("Y-m-d H:i:s")
        ];


        // print_r($values);

        $insert = $this->cars_model->insertData('vbs_driverType',$values,'type',$fuel);

        if($insert == 1){
            echo "success";
        }
    }

        public function addmailprocess(){
        extract($_GET);
        //print_r($_GET);
        //die();
        $values = [
            'courroie' => $mail,
            'is_delete' => 1,
            'create_date' => date("Y-m-d H:i:s")
        ];


        // print_r($values);

        $insert = $this->cars_model->insertData('vbs_carCourroie',$values,'courroie',$mail);

        if($insert == 1){
            echo "success";
        }
    }

      public function addcolorprocess(){
        extract($_GET);
        //print_r($_GET);
        //die();
        $values = [
            'couleur' => $color,
            'is_delete' => 1,
            'create_date' => date("Y-m-d H:i:s")
        ];


        // print_r($values);

        $insert = $this->cars_model->insertData('vbs_carCouleur',$values,'couleur',$color);

        if($insert == 1){
            echo "success";
        }
    }

       public function addnatureprocess(){
        extract($_GET);
        //print_r($_GET);
        //die();
        $values = [
            'nature' => $nature,
            'is_delete' => 1,
            'create_date' => date("Y-m-d H:i:s")
        ];


        // print_r($values);

        $insert = $this->cars_model->insertData('vbs_carNature',$values,'nature',$nature);

        if($insert == 1){
            echo "success";
        }
    }

    public function getstatusprocess(){
        extract($_GET);
        $statut = $this->cars_model->getStaut('vbs_driverStatus','is_delete','1',$name,$from,$to,'status');
        $tbody = '';
        if(!empty($statut)){
            $i = 1;
            foreach ($statut as $stat){
                $tbody .= '
                <tr>
                <td align="center">
	             <input type="checkbox" name="check" class="StautClass"  id="check" value="'.$stat->id.'" >
	             <input type="hidden" id="update_statut" value="'.$stat->status.'">
	             </td>
                 <td align="center">'.$i.'</td>
                 <td align="center">'.$stat->status.'</td>
                 <td align="center">'.$stat->create_date.'</td>
                </tr>
                ';
                $i++;
            }
        }else{
            $tbody .= '<tr align="center"><td colspan="4"><span class="text-danger text-center">No Record Found</span></td></tr>';
        }

        echo $tbody;
    }

    public function getcivilityprocess(){
        extract($_GET);
        $statut = $this->cars_model->getStaut('vbs_driverCivilite','is_delete','1',$name,$from,$to,'civilite');
        $tbody = '';
        if(!empty($statut)){
            $i = 1;
            foreach ($statut as $stat){
                $tbody .= '
                <tr>
                <td align="center">
	             <input type="checkbox" name="CivilityCheck" class="CivilityClass"  id="CivilityCheck" value="'.$stat->id.'" >
	             <input type="hidden" id="update_civility" value="'.$stat->civilite.'">
	             </td>
                 <td align="center">'.$i.'</td>
                 <td align="center">'.$stat->civilite.'</td>
                 <td align="center">'.$stat->create_date.'</td>
                </tr>
                ';
                $i++;
            }
        }else{
            $tbody .= '<tr align="center"><td colspan="4"><span class="text-danger text-center">No Record Found</span></td></tr>';
        }

        echo $tbody;
    }

    public function getpostprocess(){
        extract($_GET);
        $statut = $this->cars_model->getStaut('vbs_driverPost','is_delete','1',$name,$from,$to,'post');
        $tbody = '';
        if(!empty($statut)){
            $i = 1;
            foreach ($statut as $stat){
                $tbody .= '
                <tr>
                <td align="center">
	             <input type="checkbox" name="PostCheck" class="PostClass"  id="postCheck" value="'.$stat->id.'" >
	             <input type="hidden" id="update_post" value="'.$stat->post.'">
	             </td>
                 <td align="center">'.$i.'</td>
                 <td align="center">'.$stat->post.'</td>
                 <td align="center">'.$stat->create_date.'</td>
                </tr>
                ';
                $i++;
            }
        }else{
            $tbody .= '<tr align="center"><td colspan="4"><span class="text-danger text-center">No Record Found</span></td></tr>';
        }

        echo $tbody;
    }
    public function getpatternprocess(){
        extract($_GET);
        $statut = $this->cars_model->getStaut('vbs_driverPattern','is_delete','1',$name,$from,$to,'pattern');
        $tbody = '';
        if(!empty($statut)){
            $i = 1;
            foreach ($statut as $stat){
                $tbody .= '
                <tr>
                <td align="center">
	             <input type="checkbox" name="PatternCheck" class="PatternClass"  id="PatternCheck" value="'.$stat->id.'" >
	             <input type="hidden" id="update_pattern" value="'.$stat->pattern.'">
	             </td>
                 <td align="center">'.$i.'</td>
                 <td align="center">'.$stat->pattern.'</td>
                 <td align="center">'.$stat->create_date.'</td>
                </tr>
                ';
                $i++;
            }
        }else{
            $tbody .= '<tr align="center"><td colspan="4"><span class="text-danger text-center">No Record Found</span></td></tr>';
        }

        echo $tbody;
    }
    public function getageprocess(){
        extract($_GET);
        $statut = $this->cars_model->getStaut('vbs_driverContract','is_delete','1',$name,$from,$to,'contract');
        $tbody = '';
        if(!empty($statut)){
            $i = 1;
            foreach ($statut as $stat){
                $tbody .= '
                <tr>
                <td align="center">
	             <input type="checkbox" name="AgeCheck" class="AgeClass"  id="AgeCheck" value="'.$stat->id.'" >
	             <input type="hidden" id="update_age" value="'.$stat->contract.'">
	             </td>
                 <td align="center">'.$i.'</td>
                 <td align="center">'.$stat->contract.'</td>
                 <td align="center">'.$stat->create_date.'</td>
                </tr>
                ';
                $i++;
            }
        }else{
            $tbody .= '<tr align="center"><td colspan="4"><span class="text-danger text-center">No Record Found</span></td></tr>';
        }

        echo $tbody;
    }
    public function getseriesprocess(){
        extract($_GET);
        $statut = $this->cars_model->getStaut('vbs_driverNature','is_delete','1',$name,$from,$to,'nature');
        $tbody = '';
        if(!empty($statut)){
            $i = 1;
            foreach ($statut as $stat){
                $tbody .= '
                <tr>
                <td align="center">
	             <input type="checkbox" name="SeriesCheck" class="SeriesClass"  id="SeriesCheck" value="'.$stat->id.'" >
	             <input type="hidden" id="update_series" value="'.$stat->nature.'">
	             </td>
                 <td align="center">'.$i.'</td>
                 <td align="center">'.$stat->nature.'</td>
                 <td align="center">'.$stat->create_date.'</td>
                </tr>
                ';
                $i++;
            }
        }else{
            $tbody .= '<tr align="center"><td colspan="4"><span class="text-danger text-center">No Record Found</span></td></tr>';
        }

        echo $tbody;
    }

        public function getboiteprocess(){
        extract($_GET);
        $statut = $this->cars_model->getStaut('vbs_driverHours','is_delete','1',$name,$from,$to,'hours');
        $tbody = '';
        if(!empty($statut)){
            $i = 1;
            foreach ($statut as $stat){
                $tbody .= '
                <tr>
                <td align="center">
                 <input type="checkbox" name="BoiteCheck" class="BoiteClass"  id="BoiteCheck" value="'.$stat->id.'" >
                 <input type="hidden" id="update_boite" value="'.$stat->hours.'">
                 </td>
                 <td align="center">'.$i.'</td>
                 <td align="center">'.$stat->hours.'</td>
                 <td align="center">'.$stat->create_date.'</td>
                </tr>
                ';
                $i++;
            }
        }else{
            $tbody .= '<tr align="center"><td colspan="4"><span class="text-danger text-center">No Record Found</span></td></tr>';
        }

        echo $tbody;
    }

       public function getfuelprocess(){
        extract($_GET);
        $statut = $this->cars_model->getStaut('vbs_driverType','is_delete','1',$name,$from,$to,'type');
        $tbody = '';
        if(!empty($statut)){
            $i = 1;
            foreach ($statut as $stat){
                $tbody .= '
                <tr>
                <td align="center">
                 <input type="checkbox" name="FuelCheck" class="FuelClass"  id="FuelCheck" value="'.$stat->id.'" >
                 <input type="hidden" id="update_fuel" value="'.$stat->type.'">
                 </td>
                 <td align="center">'.$i.'</td>
                 <td align="center">'.$stat->type.'</td>
                 <td align="center">'.$stat->create_date.'</td>
                </tr>
                ';
                $i++;
            }
        }else{
            $tbody .= '<tr align="center"><td colspan="4"><span class="text-danger text-center">No Record Found</span></td></tr>';
        }

        echo $tbody;
    }

         public function getmailprocess(){
        extract($_GET);
        $statut = $this->cars_model->getStaut('vbs_carCourroie','is_delete','1',$name,$from,$to,'courroie');
        $tbody = '';
        if(!empty($statut)){
            $i = 1;
            foreach ($statut as $stat){
                $tbody .= '
                <tr>
                <td align="center">
                 <input type="checkbox" name="MailCheck" class="MailClass"  id="MailCheck" value="'.$stat->id.'" >
                 <input type="hidden" id="update_mail" value="'.$stat->courroie.'">
                 </td>
                 <td align="center">'.$i.'</td>
                 <td align="center">'.$stat->courroie.'</td>
                 <td align="center">'.$stat->create_date.'</td>
                </tr>
                ';
                $i++;
            }
        }else{
            $tbody .= '<tr align="center"><td colspan="4"><span class="text-danger text-center">No Record Found</span></td></tr>';
        }

        echo $tbody;
    }

       public function getcolorprocess(){
        extract($_GET);
        $statut = $this->cars_model->getStaut('vbs_carCouleur','is_delete','1',$name,$from,$to,'couleur');
        $tbody = '';
        if(!empty($statut)){
            $i = 1;
            foreach ($statut as $stat){
                $tbody .= '
                <tr>
                <td align="center">
                 <input type="checkbox" name="ColorCheck" class="ColorClass"  id="ColorCheck" value="'.$stat->id.'" >
                 <input type="hidden" id="update_color" value="'.$stat->couleur.'">
                 </td>
                 <td align="center">'.$i.'</td>
                 <td align="center">'.$stat->couleur.'</td>
                 <td align="center">'.$stat->create_date.'</td>
                </tr>
                ';
                $i++;
            }
        }else{
            $tbody .= '<tr align="center"><td colspan="4"><span class="text-danger text-center">No Record Found</span></td></tr>';
        }

        echo $tbody;
    }

       public function getnatureprocess(){
        extract($_GET);
        $statut = $this->cars_model->getStaut('vbs_carNature','is_delete','1',$name,$from,$to,'nature');
        $tbody = '';
        if(!empty($statut)){
            $i = 1;
            foreach ($statut as $stat){
                $tbody .= '
                <tr>
                <td align="center">
                 <input type="checkbox" name="NatureCheck" class="NatureClass"  id="NatureCheck" value="'.$stat->id.'" >
                 <input type="hidden" id="update_nature" value="'.$stat->nature.'">
                 </td>
                 <td align="center">'.$i.'</td>
                 <td align="center">'.$stat->nature.'</td>
                 <td align="center">'.$stat->create_date.'</td>
                </tr>
                ';
                $i++;
            }
        }else{
            $tbody .= '<tr align="center"><td colspan="4"><span class="text-danger text-center">No Record Found</span></td></tr>';
        }

        echo $tbody;
    }


    public function updatestatusprocess(){
        extract($_GET);

        /*print_r($_GET);
        die();*/
        $values = [
            'status' => $statut
        ];
        $update = $this->cars_model->updateStatut($id,$statut,$values,'vbs_driverStatus','status');

        if($update == 1){
            echo "success";
        }else{
            echo "failed";
        }

    }

    public function updateciviliteprocess(){
        extract($_GET);

        /*print_r($_GET);
        die();*/
        $values = [
            'civilite' => $civilite
        ];
        $update = $this->cars_model->updateStatut($id,$civilite,$values,'vbs_driverCivilite','civilite');

        if($update == 1){
            echo "success";
        }else{
            echo "failed";
        }

    }
    public function updatepostprocess(){
        extract($_GET);

        /*print_r($_GET);
        die();*/
        $values = [
            'post' => $post
        ];
        $update = $this->cars_model->updateStatut($id,$post,$values,'vbs_driverPost','post');

        if($update == 1){
            echo "success";
        }else{
            echo "failed";
        }

    }
    public function updatepatternprocess(){
        extract($_GET);

        /*print_r($_GET);
        die();*/
        $values = [
            'pattern' => $pattern
        ];
        $update = $this->cars_model->updateStatut($id,$pattern,$values,'vbs_driverPattern','pattern');

        if($update == 1){
            echo "success";
        }else{
            echo "failed";
        }

    }
    public function updateageprocess(){
        extract($_GET);

        /*print_r($_GET);
        die();*/
        $values = [
            'contract' => $age
        ];
        $update = $this->cars_model->updateStatut($id,$age,$values,'vbs_driverContract','contract');

        if($update == 1){
            echo "success";
        }else{
            echo "failed";
        }

    }
    public function updateseriesprocess(){
        extract($_GET);

        /*print_r($_GET);
        die();*/
        $values = [
            'nature' => $series
        ];
        $update = $this->cars_model->updateStatut($id,$series,$values,'vbs_driverNature','nature');

        if($update == 1){
            echo "success";
        }else{
            echo "failed";
        }

    }

        public function updateboiteprocess(){
        extract($_GET);

        /*print_r($_GET);
        die();*/
        $values = [
            'hours' => $boite
        ];
        $update = $this->cars_model->updateStatut($id,$boite,$values,'vbs_driverHours','hours');

        if($update == 1){
            echo "success";
        }else{
            echo "failed";
        }

    }


       public function updatefuelprocess(){
        extract($_GET);

        /*print_r($_GET);
        die();*/
        $values = [
            'type' => $fuel
        ];
        $update = $this->cars_model->updateStatut($id,$fuel,$values,'vbs_driverType','type');

        if($update == 1){
            echo "success";
        }else{
            echo "failed";
        }

    }

        public function updatemailprocess(){
        extract($_GET);

        /*print_r($_GET);
        die();*/
        $values = [
            'courroie' => $mail
        ];
        $update = $this->cars_model->updateStatut($id,$mail,$values,'vbs_carCourroie','courroie');

        if($update == 1){
            echo "success";
        }else{
            echo "failed";
        }

    }

       public function updatecolorprocess(){
        extract($_GET);

        /*print_r($_GET);
        die();*/
        $values = [
            'couleur' => $color
        ];
        $update = $this->cars_model->updateStatut($id,$color,$values,'vbs_carCouleur','couleur');

        if($update == 1){
            echo "success";
        }else{
            echo "failed";
        }

    }

       public function updatenatureprocess(){
        extract($_GET);

        /*print_r($_GET);
        die();*/
        $values = [
            'nature' => $nature
        ];
        $update = $this->cars_model->updateStatut($id,$nature,$values,'vbs_carNature','nature');

        if($update == 1){
            echo "success";
        }else{
            echo "failed";
        }

    }

    public function deletestatusprocess(){
        extract($_GET);

      //$delete =  $this->cars_model->deleteDelete('vbs_carStatut',$id);
        $values = [
            'is_delete' => '0'
        ];
        $update = $this->cars_model->deactive($values,$id,'vbs_driverStatus');
       if($update == 1){
           echo "success";
       }
    }

    public function deleteciviliteprocess(){
        extract($_GET);

        //$delete =  $this->cars_model->deleteDelete('vbs_carStatut',$id);
        $values = [
            'is_delete' => '0'
        ];
        $update = $this->cars_model->deactive($values,$id,'vbs_driverCivilite');
        if($update == 1){
            echo "success";
        }
    }
    public function deletepostprocess(){
        extract($_GET);

        //$delete =  $this->cars_model->deleteDelete('vbs_carStatut',$id);
        $values = [
            'is_delete' => '0'
        ];
        $update = $this->cars_model->deactive($values,$id,'vbs_driverPost');
        if($update == 1){
            echo "success";
        }
    }

    public function deletepatternprocess(){
        extract($_GET);

        //$delete =  $this->cars_model->deleteDelete('vbs_carStatut',$id);
        $values = [
            'is_delete' => '0'
        ];
        $update = $this->cars_model->deactive($values,$id,'vbs_driverPattern');
        if($update == 1){
            echo "success";
        }
    }
    public function deleteageprocess(){
        extract($_GET);

        //$delete =  $this->cars_model->deleteDelete('vbs_carStatut',$id);
        $values = [
            'is_delete' => '0'
        ];
        $update = $this->cars_model->deactive($values,$id,'vbs_driverContract');
        if($update == 1){
            echo "success";
        }
    }
    public function deleteseriesprocess(){
        extract($_GET);

        //$delete =  $this->cars_model->deleteDelete('vbs_carStatut',$id);
        $values = [
            'is_delete' => '0'
        ];
        $update = $this->cars_model->deactive($values,$id,'vbs_driverNature');
        if($update == 1){
            echo "success";
        }
    }

        public function deleteboiteprocess(){
        extract($_GET);

        //$delete =  $this->cars_model->deleteDelete('vbs_carStatut',$id);
        $values = [
            'is_delete' => '0'
        ];
        $update = $this->cars_model->deactive($values,$id,'vbs_driverHours');
        if($update == 1){
            echo "success";
        }
    }

       public function deletefuelprocess(){
        extract($_GET);

        //$delete =  $this->cars_model->deleteDelete('vbs_carStatut',$id);
        $values = [
            'is_delete' => '0'
        ];
        $update = $this->cars_model->deactive($values,$id,'vbs_driverType');
        if($update == 1){
            echo "success";
        }
    }

      public function deletemailprocess(){
        extract($_GET);

        //$delete =  $this->cars_model->deleteDelete('vbs_carStatut',$id);
        $values = [
            'is_delete' => '0'
        ];
        $update = $this->cars_model->deactive($values,$id,'vbs_carCourroie');
        if($update == 1){
            echo "success";
        }
    }

     public function deletecolorprocess(){
        extract($_GET);

        //$delete =  $this->cars_model->deleteDelete('vbs_carStatut',$id);
        $values = [
            'is_delete' => '0'
        ];
        $update = $this->cars_model->deactive($values,$id,'vbs_carCouleur');
        if($update == 1){
            echo "success";
        }
    }

     public function deletenatureprocess(){
        extract($_GET);

        //$delete =  $this->cars_model->deleteDelete('vbs_carStatut',$id);
        $values = [
            'is_delete' => '0'
        ];
        $update = $this->cars_model->deactive($values,$id,'vbs_carNature');
        if($update == 1){
            echo "success";
        }
    }
    
    
}
