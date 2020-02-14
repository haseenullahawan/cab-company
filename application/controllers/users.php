<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends MY_Controller
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
		{
			redirect("admin", 'refresh');
		}
		else
		{
			$this->data['user'] = $this->basic_auth->user();
		}
		$this->load->model('userx_model');
		$this->load->model('request_model');
		$this->load->model('jobs_model');
		$this->load->model('support_model');
		$this->load->model('calls_model');

		$this->data['configuration'] = get_configuration();
	}

	public function index(){
		$this->data['css_type'] 	= array("form","datatable");
		$this->data['active_class'] = "users";
		$this->data['gmaps'] 	= false;
		$this->data['title'] 	= 'Users'; // $this->lang->line("calls");
		$this->data['title_link'] 	= base_url('admin/users');
		$this->data['users_data'] = $this->userx_model->getAll();
		$this->data['content']  = 'admin/users/index';
		$this->_render_page('templates/admin_template', $this->data);
	}

	public function add()
	{
		$this->data['css_type'] 	= array("form");
		$this->data['active_class'] = "users";
		$this->data['gmaps'] 	= false;
		$this->data['title'] 	= 'Users'; // $this->lang->line("calls");
		$this->data['title_link'] 	= base_url('admin/users');
		$this->data['subtitle'] = "Add";
		$this->data['departments'] = $this->userx_model->departments();
		$this->data['roles'] = $this->userx_model->roles();
		$this->data['company_data'] = $this->userx_model->get_company();
		$this->data['content']  = 'admin/users/add';
		$this->_render_page('templates/admin_template', $this->data);
	}

	public function save()
	{
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'Password', 'required');
/*		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('link', 'Link', 'required');*/
		$this->form_validation->set_rules('department', 'Department', 'required');
		$this->form_validation->set_rules('role', 'Role', 'required');

		if ($this->form_validation->run() == FALSE)
        {
        	$this->session->set_flashdata('validation_errors', validation_errors());
        	redirect('admin/users/add');
        }
        else
        {
        	$path_to_folder = 'uploads/user/';
        	$config['upload_path'] = realpath($path_to_folder);
        	$config['allowed_types'] = 'gif|jpg|jpeg|png';
        	$config['max_size']	= '3000000'; // 3mb
        	$new_name = uniqid('USR_', true);
        	$new_name = explode('.', $new_name)[0];
        	$config['file_name'] = $new_name;

        	$this->load->library('upload', $config);
        	if($this->upload->do_upload('avatar'))
        	{
        		$avatar = $this->upload->data();
        		$avatar = $avatar['file_name'];
        	}
        	else
        	{
        		$avatar = NULL;
        	}

        	$db_array = array(
				'ip_address' => $this->input->ip_address(),
        		'username' => $this->input->post('username'),
        		'password' => md5($this->input->post('password')),
        		'email' => $this->input->post('email'),
        		'active' => $this->input->post('status'),
        		'first_name' => $this->input->post('first_name'),
        		'last_name' => $this->input->post('last_name'),
        		'phone' => $this->input->post('phone'),
        		'image' => $avatar,
        		'department_id' => $this->input->post('department'),
        		'role_id' => $this->input->post('role'),
        		'gender' => $this->input->post('gender'),
        		'link' => $this->input->post('link'),
        	);

//			var_dump($db_array);exit;
        	$id = $this->userx_model->create($db_array);
        	$this->session->set_flashdata('alert', [
        			'message' => "Role successfully added.",
        			'class' => "alert-success",
        			'type' => "Success"
        	]);
        	redirect('admin/users/'.$id.'/edit');
        }
	}

	public function edit($id){
		$this->data['css_type'] 	= array("form");
		$this->data['active_class'] = "users";
		$this->data['gmaps'] 	= false;
		$this->data['title'] 	= 'Users'; // $this->lang->line("calls");
		$this->data['title_link'] 	= base_url('admin/users');
		$this->data['row_data'] = $this->userx_model->get(['user.id' => $id]);
		$this->data['departments'] = $this->userx_model->departments();
		$this->data['roles'] = $this->userx_model->roles();
		$this->data['company_data'] = $this->userx_model->get_company();
		$this->data['subtitle'] = create_timestamp_uid($this->data['row_data']['created_at'],$this->data['row_data']['id']);
		$this->data['content']  = 'admin/users/edit';
		$this->_render_page('templates/admin_template', $this->data);
	}

	public function update($id)
	{
		$id_data = $this->userx_model->get(['user.id' => $id]);
		if($id_data != false)
		{
			$this->form_validation->set_rules('first_name', 'First Name', 'required');
			$this->form_validation->set_rules('last_name', 'Last Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check['.$id.']');
			$this->form_validation->set_rules('username', 'Username', 'required|callback_username_check['.$id.']');
/*			$this->form_validation->set_rules('phone', 'Phone', 'required');
			$this->form_validation->set_rules('link', 'Link', 'required');*/
			$this->form_validation->set_rules('department', 'Department', 'required');
			$this->form_validation->set_rules('role', 'Role', 'required');

			if ($this->form_validation->run() == FALSE)
	        {
	        	$this->session->set_flashdata('validation_errors', validation_errors());
	        	redirect('admin/users/'.$id.'/edit');
	        }
	        else
	        {
	        	$path_to_folder = 'uploads/user/';
	        	$old_avatar = $this->input->post('old_avatar');
	        	$path_to_folder_old = $path_to_folder.$old_avatar;
	        	$config['upload_path'] = realpath($path_to_folder);
	        	$config['allowed_types'] = 'gif|jpg|jpeg|png';
	        	$config['max_size']	= '3000000'; // 3mb
	        	$new_name = uniqid('USR_', true);
	        	$new_name = explode('.', $new_name)[0];
	        	$config['file_name'] = $new_name;

	        	$this->load->library('upload', $config);
	        	if($this->upload->do_upload('avatar'))
	        	{
	        		$avatar = $this->upload->data();
	        		$avatar = $avatar['file_name'];
	        		if(is_file($path_to_folder_old))
	        		{
	        			unlink($path_to_folder_old);
	        		}
	        	}
	        	else
	        	{
	        		$avatar = $old_avatar;
	        	}

	        	if(empty($this->input->post('password')))
	        	{
	        		$password = $this->input->post('old_password');
	        	}
	        	else
	        	{
	        		$password = md5($this->input->post('password'));
	        	}
	        	$db_array = array(
	        		'username' => $this->input->post('username'),
	        		'password' => $password,
	        		'email' => $this->input->post('email'),
	        		'active' => $this->input->post('status'),
	        		'first_name' => $this->input->post('first_name'),
	        		'last_name' => $this->input->post('last_name'),
	        		'phone' => $this->input->post('phone'),
	        		'image' => $avatar,
					//date_of_registration' => date('Y-m-d'),
	        		'department_id' => $this->input->post('department'),
	        		'role_id' => $this->input->post('role'),
	        		'gender' => $this->input->post('gender'),
	        		'link' => $this->input->post('link'),
	        	);

	        	$this->userx_model->update($db_array,$id);
	        	$this->session->set_flashdata('alert', [
	        			'message' => "User successfully updated.",
	        			'class' => "alert-success",
	        			'type' => "Success"
	        	]);
	        	redirect('admin/users/'.$id.'/edit');
	        }
		}
		else
		{
			show_404();
		}
	}

	public function email_check($str,$id)
    {
        if ($this->userx_model->validate_string('vbs_users','email',$str,$id) === true)
        {
            $this->form_validation->set_message('email_check', $str.' is already in use');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    public function username_check($str,$id)
    {
        if ($this->userx_model->validate_string('vbs_users','username',$str,$id) === true)
        {
            $this->form_validation->set_message('username_check', $str.' is already in use');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

	public function delete($id){
		$this->userx_model->delete($id);

		$this->session->set_flashdata('alert', [
				'message' => "User successfully deleted.",
				'class' => "alert-success",
				'type' => "Success"
		]);
		redirect('admin/users');
	}
}