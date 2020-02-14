<?php 

if (! defined('BASEPATH')) exit('No direct script access allowed');

class Custom_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	public function get_all_drivers() {
		$this->db->where('is_delete', 0);
		$query = $this->db->get('vbs_driverCivilite');
		return $query->result();
	}

	public function get_all_payment_methods() {
		$this->db->where('is_delete', 0);
		$query = $this->db->get('vbs_clientPayment');
		return $query->result();
	}

}