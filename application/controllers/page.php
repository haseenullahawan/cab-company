<?php
class Page extends MY_Controller {
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
	| MODULE: 			Page
	| -----------------------------------------------------
	| This is Page module controller file.
	| -----------------------------------------------------
	*/
	function __construct()

	{
		parent::__construct();
	
	}
	
	public function index($param = '' , $param1 = '')
	{	
		
		$table_name = "aboutus";
		$cond = "id";
		$cond_val = $param;
		if(!$this->base_model->check_duplicate($table_name,$cond,$cond_val)){
			redirect('auth','refresh');
		} 
		else {
		
			$this->db->select('*');
			$rec = $this->db->get_where('vbs_aboutus',array('id' => $param))->result()[0];
			
			$this->data['css_type']=array();
			$this->data['title'] = $rec->name;
			$this->data['active_class'] = urldecode($param1);
			$this->data['heading'] = urldecode($param1);
			$this->data['sub_heading'] = urldecode($param1);
			$this->data['meta_keywords'] = $rec->seo_keywords;
			$this->data['meta_description'] = $rec->meta_description;
			$this->data['description'] = $rec->description;
			$this->data['bread_crumb'] = true;
			$this->data['content'] = 'site/about_info';
			$this->_render_page('templates/site_template',$this->data);
			
		}
	
	}
	
}

?>