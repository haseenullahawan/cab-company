<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Supplier_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	public static $table = "suppliers";

	public function get($where = []){
		$query = $this->db->get_where(self::$table, $where);
		return $query->num_rows() > 0 ? $query->row_array() : false;
	}

	public function getAll($where = [], $limit = false){
		if(!empty($where)) $this->db->where($where);
		if($limit != false) $this->db->limit($limit);
		$this->db->order_by('id','desc');
		$query = $this->db->get(self::$table);
		return $query->num_rows() > 0 ? $query->result_array() : false;
	}

	public function create($data)
	{
		$this->db->insert(self::$table, $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	public function validate_string($table,$column,$val,$id)
	{
		$this->db->where("id !=",$id);
		$this->db->where($column,$val);
		$query = $this->db->get($table);
		return $query->num_rows() > 0 ? true : false;
	}

	public function update($data, $id){
		if($this->db->update(self::$table, $data, ['id' => $id]))
			return true;
		else
			return false;
	}

	public function delete($id){
		return $this->db->delete(self::$table, ['id' => $id]);
	}

}