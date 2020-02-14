<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Company extends MY_Controller
{
	function __construct(){
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->lang->load('auth');
		$this->lang->load('general');
		$this->load->helper('language');
		if (!$this->basic_auth->is_login()) {
			redirect("admin", 'refresh');
		} else {
			$this->data['user'] = $this->basic_auth->user();
		}
		$this->load->model('company_model');
		$this->load->model('request_model');
		$this->load->model('jobs_model');
		$this->load->model('support_model');
		$this->load->model('calls_model');

		$this->data['configuration'] = get_configuration();
	}

	public function index(){
		$this->data['css_type'] = array("form");
		$this->data['active_class'] = "Company Profile";
		$this->data['gmaps'] 	= false;
		$this->data['title'] 	= 'Company Profile';
		$this->data['title_link'] 	= base_url('admin/company');
		$this->data['company']  = $this->company_model->getFirst();
		$this->data['content']  = 'admin/company/index';
		$this->_render_page('templates/admin_template', $this->data);
	}

	public function save(){
		$this->form_validation->set_rules('type', 'Type', 'required');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		/*		$this->form_validation->set_rules('fax', 'Fax', 'required');
                $this->form_validation->set_rules('website', 'Website', 'required');
                $this->form_validation->set_rules('street', 'Street', 'required');
                $this->form_validation->set_rules('zip_code', 'Zip Code', 'required');
                $this->form_validation->set_rules('city', 'City', 'required');
                $this->form_validation->set_rules('country', 'Country', 'required');
                $this->form_validation->set_rules('sirft', 'SIRFT', 'required');
                $this->form_validation->set_rules('rcs', 'RCS', 'required');
                $this->form_validation->set_rules('licence', 'Licence', 'required');
                $this->form_validation->set_rules('numero_tva', 'NUMERO TVA', 'required');
                $this->form_validation->set_rules('capital', 'Capital', 'required');
                $this->form_validation->set_rules('facebook_link', 'Facebook Link', 'required');
                $this->form_validation->set_rules('youtube_link', 'Youtube Link', 'required');
                $this->form_validation->set_rules('instagram_link', 'Instagram Link', 'required');
		*/

		if ($this->form_validation->run() == FALSE) {
        	$this->session->set_flashdata('validation_errors', validation_errors());
        	redirect('admin/company');
        } else {
        	$path_to_folder = 'uploads/company/';
        	$old_logo = $this->input->post('old_logo');
        	$path_to_folder_old = $path_to_folder.$old_logo;
        	$config['upload_path'] = realpath($path_to_folder);
        	$config['allowed_types'] = 'gif|jpg|jpeg|png';
        	$config['max_size']	= '3000000'; // 3mb
        	$new_name = uniqid('COM_', true);
        	$new_name = explode('.', $new_name)[0];
        	$config['file_name'] = $new_name;

        	$this->load->library('upload', $config);
			$logo = $old_logo;
        	if($this->upload->do_upload('logo')) {
        		$logo = $this->upload->data();
        		$logo = $logo['file_name'];
        		if(is_file($path_to_folder_old)) {
        			unlink($path_to_folder_old);
        		}
        	}

        	$db_array = array(
        		'type' 		=> $this->input->post('type'),
        		'name' 		=> $this->input->post('name'),
        		'email' 	=> $this->input->post('email'),
        		'phone' 	=> $this->input->post('phone'),
        		'fax' 		=> $this->input->post('fax'),
        		'website' 	=> $this->input->post('website'),
        		'logo' 		=> $logo,
        		'street' 	=> $this->input->post('street'),
        		'zip_code' 	=> $this->input->post('zip_code'),
        		'city' 		=> $this->input->post('city'),
        		'country' 	=> $this->input->post('country'),
        		'sirft' 	=> $this->input->post('sirft'),
        		'rcs' 		=> $this->input->post('rcs'),
        		'licence' 	=> $this->input->post('licence'),
        		'numero_tva' => $this->input->post('numero_tva'),
        		'capital' 	 => $this->input->post('capital'),
        		'facebook_link' 	=> $this->input->post('facebook_link'),
        		'youtube_link' 		=> $this->input->post('youtube_link'),
        		'instagram_link' 	=> $this->input->post('instagram_link'),
        	);

			$company = $this->company_model->getFirst();

			if($company != false)
				$this->company_model->update($db_array, $company['id']);
			else
				$this->company_model->insert($db_array);

        	$this->session->set_flashdata('alert', [
				'message' 	=> "Successfully Updated.",
				'class' 	=> "alert-success",
				'type' 		=> "Success"
        	]);

        	redirect('admin/company');
        }
	}
}