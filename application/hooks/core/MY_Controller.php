<?php 
ob_start();
class MY_Controller extends CI_Controller
{
	protected $data;
	protected $page;
	protected $header_data;
	protected $left_data;
	protected $footer_data;
	protected $main_site_path = '/home3/conquero/public_html/labs/dvbs/';
	public $main_site_url = 'http://conquerorstech.net/labs/dvbs/';
	function __construct()
	{

		parent::__construct();

		$this->data['isnewmember'] = false;
                
		/*set the currency from admin...********** */
		
		/**set the site settings from admin...**********/
			
			$this->data['site_settings'] = $this->config->item('site_settings');
			
			$this->db->select('site_country , time_zone , date_formats');
		$country = $this->db->get('site_settings')->result()[0];
                if ($this->lang->lang() == 'fr') {
                    setlocale(LC_MONETARY, "fr_".strtoupper($country->site_country)); //'en_FR'
                }
                else if ($this->lang->lang() == 'en') {
                    setlocale(LC_MONETARY, "fr_".strtoupper($country->site_country)); //'en_US'
                }
		date_default_timezone_set($country->time_zone);
		$this->data['country_code'] = $country->site_country;
		
		/*** DATE FORMATS ***/
		$this->data['date_format'] = $this->config->item('date_format'); /* Like y-m-d etc.*/
		$this->data['seperator'] = $this->config->item('seperator');
		$this->data['date_elem1'] = $this->config->item('date_elem1');
		$this->data['date_elem2'] = $this->config->item('date_elem2');
		$this->data['date_elem3'] = $this->config->item('date_elem3');	
                
                $members = $this->db->query("select u.* from vbs_users u, vbs_users_groups g where u.id=g.user_id and u.active='1' and g.group_id='2'")->result();
		$n = count($members);
                $this->data['members_count'] = $n;
                
                $executives = $this->db->query("select u.* from vbs_users u, vbs_users_groups g where u.id=g.user_id  and u.active='1' and g.group_id='3'")->result();
		$e = count($executives);
                $this->data['executives_count'] = $e;
                
                $vehicles = $this->db->query("select * from vbs_vehicle where status='active'")->result();
		$v = count($vehicles);
                $this->data['vehicles_count'] = $v;
                
                $airports = $this->db->query("select * from vbs_airports where status='active'")->result();
                $a = count($airports);
                $this->data['airports_count'] = $a;
                
		$package = $this->db->query("select * from vbs_package_settings where status='active'")->result();
		$p = count($package);
                $this->data['packages_count'] = $p;
                
		$bookings = $this->db->query("select * from vbs_bookings")->result();
		$b = count($bookings);
                $this->data['bookings_count'] = $b;


		$this->data['configuration'] = get_configuration();
	}
			
			function validate_admin()	{		
			$this->load->library('ion_auth');		
				if($this->ion_auth->logged_in())
				{
					if(!$this->ion_auth->is_admin())		
					{			
					
					$this->prepare_flashmessage("You have no access to this module",1);			
					redirect('user', 'refresh');		
					}
					return true;
				}			
				else
				{
					$this->prepare_flashmessage("Please Login to continue..",1);			
					redirect('auth/login', 'refresh');
				}			
			}																							
	function is_valid($id=0)
	{
		if($id==0)
		return FALSE;
		
		$recs = $this->session->userdata('logindata');
		
		if(count($recs)>0)
		{
			if($recs->user_group_id==1)
			{
				// ADMIN
				//redirect('admin/index');
				return TRUE;
				
			}
			else if($recs->user_group_id==2)
			{
				//USER
				$this->prepare_flashmessage("You have no permission to view",3);
				redirect('users/dashboard');
			}
			
		}
		
		//NOT LOGGED IN
		 		$this->prepare_flashmessage("Session Expired..",1);
				redirect('users/login');
	}
	
	
	function render_admin_view()
	{
		
		if($this->is_valid(1))
		{
		
			$this->load->view('admin/common/header',$this->header_data);
			$this->load->view('admin/common/left',$this->left_data);
			
			
			$this->load->view('admin/common/footer');
		}
		
		
	}
	
	
	

	function send_mail($to, $subject, $message, $cc = array(), $bcc = array())

	{

		$this->load->library('email');

		

		$config['mailtype'] = 'html';

		$this->email->initialize($config);

		

		$this->email->from('adiyya@gmail.com', 'Adiyya Tadikamalla');

		$this->email->to( $to );

		if( $cc != '' )

		$this->email->cc($cc);

		if( $bcc != '' )

		$this->email->bcc( $bcc );

		$this->email->subject( $subject );

		$this->email->message( $message );

		$this->email->send();

	}

	

	function create_thumbnail($sourceimage,$newpath, $width, $height)
	{

		$this->load->library('image_lib');

		$this->image_lib->clear();

		$config['image_library'] = 'gd2';

		$config['source_image'] = $sourceimage;

		$config['create_thumb'] = TRUE;

		$config['new_image'] = $newpath;

		$config['dynamic_output'] = FALSE;

		$config['maintain_ratio'] = TRUE;

		$config['width'] = $width;

		$config['height'] = $height;

	    $config['thumb_marker'] = '';

		

		$this->image_lib->initialize($config); 

		return $this->image_lib->resize();

	}

	

	

	function validate_upload_image($fieldmessage,$fieldname,$filepath,$allowed_types,$thumbnailpath='',$width='',$height='')

	{

		$config['upload_path'] = $filepath;

		//$config['allowed_types'] = 'gif|jpeg|jpg|png';

		if( $allowed_types )

			$config['allowed_types'] = $allowed_types;

		else

			$config['allowed_types'] = 'gif|jpeg|jpg|png';

		$config['remove_spaces'] = TRUE;

		$config['overwrite'] = FALSE;

		

		$this->load->library('upload', $config);



		if(!$this->upload->do_upload($fieldname))

		{

			$this->form_validation->set_message($fieldmessage,$this->upload->display_errors());

			

			return $this->upload->display_errors();

			
		}

		else

		{

			$filedata = $this->upload->data();

			$this->uploadedimagename = $filedata['file_name'];

			if(!empty($thumbnailpath))

			{

				 $this->create_thumbnail($filedata['full_path'],$thumbnailpath,$width,$height);

			}

			return TRUE;

		}

	}

  
	function prepare_flashmessage($msg,$type)
	{
		$returnmsg='';
		switch($type){
			case 0: $returnmsg = " <div class='col-md-12'>
										<div class='alert alert-success'>
											<a href='#' class='close' data-dismiss='alert'>&times;</a>
											<strong>Success!</strong> ". $msg."
										</div>
									</div>";
				break;
			case 1: $returnmsg = " <div class='col-md-12'>
										<div class='alert alert-danger'>
											<a href='#' class='close' data-dismiss='alert'>&times;</a>
											<strong>Error!</strong> ". $msg."
										</div>
									</div>";
				break;
			case 2: $returnmsg = " <div class='col-md-12'>
										<div class='alert alert-info'>
											<a href='#' class='close' data-dismiss='alert'>&times;</a>
											<strong>Info!</strong> ". $msg."
										</div>
									</div>";
				break;
			case 3: $returnmsg = " <div class='col-md-12'>
										<div class='alert alert-warning'>
											<a href='#' class='close' data-dismiss='alert'>&times;</a>
											<strong>Warning!</strong> ". $msg."
										</div>
									</div>";
				break;
		}
		
		$this->session->set_flashdata("message",$returnmsg);
	}

	function prepare_localflashmessage($msg,$type)
	{
		$returnmsg='';
		switch($type){
			case 0: $returnmsg = " <div class='col-md-12'>
										<div class='alert alert-success'>
											<a href='#' class='close' data-dismiss='alert'>&times;</a>
											<strong>Success!</strong> ". $msg."
										</div>
									</div>";
				break;
			case 1: $returnmsg = " <div class='col-md-12'>
										<div class='alert alert-danger'>
											<a href='#' class='close' data-dismiss='alert'>&times;</a>
											<strong>Error!</strong> ". $msg."
										</div>
									</div>";
				break;
			case 2: $returnmsg = " <div class='col-md-12'>
										<div class='alert alert-info'>
											<a href='#' class='close' data-dismiss='alert'>&times;</a>
											<strong>Info!</strong> ". $msg."
										</div>
									</div>";
				break;
			case 3: $returnmsg = " <div class='col-md-12'>
										<div class='alert alert-warning'>
											<a href='#' class='close' data-dismiss='alert'>&times;</a>
											<strong>Warning!</strong> ". $msg."
										</div>
									</div>";
				break;
		}
		
		$this->session->set_flashdata("localmessage",$returnmsg);
		$this->session->set_flashdata("is_setlocalmessage",true);
	}	
  
  

  function logout()
   {	
		$this->session->sess_destroy();

   		$this->admin_session_validate();
	}
	
	
	function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key   = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

	function _valid_csrf_nonce()
	{
		if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
			$this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	function _render_page($view, $data=null, $render=false)
	{
		
		$this->viewdata = (empty($data)) ? $this->data: $data;

		$view_html = $this->load->view($view, $this->viewdata, $render);

		if (!$render) return $view_html;
	}
	
	
	
	// set Pagination
	function set_pagination($url,$offset,$numrows,$perpage,$pagingfunction='')
	{
		$config['base_url'] = base_url().$url;  //Setting Pagination parameters
		$config['per_page'] = $perpage;
		$config['offset'] = $offset;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['num_links'] = 4; // numlinks before and after current page
		$config['total_rows'] =  $numrows;
		
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		
		if(!empty($pagingfunction))
			$config['paging_function'] = $pagingfunction; 
		else	$config['paging_function'] = 'ajax_paging';
		$this->pagination->initialize($config);  
	}
	
	

}

?>