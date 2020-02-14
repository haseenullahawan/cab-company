<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Packages extends MY_Controller

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
	| MODULE: 			Packages
	| -----------------------------------------------------
	| This is Packages module controller file.
	| -----------------------------------------------------
	*/
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// $records = $this->base_model->run_query("SELECT p.*,v.image,v.name as vehicle_name,v.model FROM " . $this->db->dbprefix('package_settings') . " p, " . $this->db->dbprefix('vehicle') . " v WHERE v.id=p.vehicle_id AND p.status='Active'");
            $query = "SELECT p.*,v.image,v.name as vehicle_name,v.model,s.id as service_id, s.image as service_image 
                                        FROM " . $this->db->dbprefix('package_settings') . " p 
                                                INNER JOIN " . $this->db->dbprefix('vehicle') . " v ON v.id = p.vehicle_id
                                                LEFT JOIN " . $this->db->dbprefix('services') . " s ON s.package_id = p.id 
                                        WHERE p.status='Active' ORDER BY s.order_no ASC";
            $records = $this->base_model->run_query($query);
		$this->data['records'] 				= $records;
		$this->data['active_class'] 		= 'packages';
		$this->data['css_type'] 			= array();
		$this->data['title'] 				= $this->lang->line('packages');
		$this->data['sub_heading'] 			= $this->lang->line('packages');
		$this->data['content'] 				= 'site/packages';
		$this->_render_page('templates/site_template', $this->data);
	}

	public function booking($param1 = '')
	{
		if ($param1 == '' || !is_numeric($param1)) redirect('packages');
		$recs = $this->db->get_where($this->db->dbprefix('package_settings') , array(
			'status' => 'active',
			'id' => $param1
		))->result();
		if (count($recs) <= 0) redirect('packages');
		$this->data['package_details'] = $recs[0];
		$vehicleid = $recs[0]->vehicle_id;
		unset($recs);
		$recs = $this->db->get_where($this->db->dbprefix('vehicle') , array(
			'id' => $vehicleid
		))->result();
		$this->data['cabs'] 				= $recs;
		$this->data['gmaps'] 				= "true";
		$this->data['country_code'] 		= "in";
		$this->data['css_type'] 			= array("slider");
		$this->data['heading'] 				= $this->lang->line('package_booking');
		$this->data['active_class'] 		= "packages";
		$this->data['sub_heading'] 			= $this->lang->line('package_booking');
		$this->data['bread_crumb'] 			= true;
		$this->data['title'] 				= $this->lang->line('welcome_to_DVBS');
		$this->data['content'] 				= 'site/package_booking_online';
		$this->_render_page('templates/site_template', $this->data);
	}
}