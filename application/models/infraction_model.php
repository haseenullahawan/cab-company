<?php 

if (! defined('BASEPATH')) exit('No direct script access allowed');

class Infraction_model extends CI_Model {

	function __construct(){
		parent::__construct();

		error_reporting(E_ALL);
		ini_set('display_errors', 1);
	}

	public function create($data) {
		$this->db->insert('vbs_infraction',$data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function getAll() {
		$query = $this->db->get('vbs_infraction');
		return $query->result();
	}

	public function delete($id) {
		return $this->db->delete('vbs_infraction', array('id' => $id));
	}

	public function get($row) {
		$this->db->where($row);
		$query = $this->db->get('vbs_infraction');
		return $query->row();
	}

	public function update($data, $condition) {
		$this->db->where($condition);
		return $this->db->update('vbs_infraction', $data);
	}

}