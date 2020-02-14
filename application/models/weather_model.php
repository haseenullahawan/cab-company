<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Weather_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}


	public static $table = "vbs_weather";


	public function get($where = []){
		$query = $this->db->select("*")
			->from(self::$table)->get();
		return $query->num_rows() > 0 ? $query->row() : false;
	}

    public function update($data, $id){
		if($this->db->update(self::$table, $data, ['id' => $id]))
			return true;
		else
			return false;
	}

}