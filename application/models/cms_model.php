<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Cms_Model extends CI_Model {

	function __construct(){
		parent::__construct();
	}


	public static $table = "cms";

	public function get($where = []){
		$query = $this->db->get_where(self::$table, $where);
		return $query->num_rows() > 0 ? $query->row() : false;
	}

	public function getAll($where = [], $limit = false){
		if(!empty($where)) $this->db->where($where);
		if($limit != false) $this->db->limit($limit);
		$this->db->order_by('id','desc');
		$query = $this->db->get(self::$table);
		return $query->num_rows() > 0 ? $query->result() : false;
	}
    // public function QouteChartCount(){
    //     $data = $this->db->query("SELECT COUNT(id) as count,MONTHNAME(created_at) as month_name FROM vbs_request WHERE YEAR(created_at) >= '2019'
    //   GROUP BY YEAR(created_at),MONTH(created_at)");
    //     return  $data->result();;
    // }
    // public function QouteLineChart() {
    //     $dayQuery =  $this->db->query("SELECT  MONTHNAME(created_at) as y, COUNT(id) as a FROM vbs_request WHERE  YEAR(created_at) >= '2019'  GROUP BY YEAR(created_at),MONTH(created_at)");

    //     return $dayQuery->result();

    // }
	public function create($data){
		$this->db->trans_begin();
		$this->db->insert(self::$table, $data);
		$insert_id = $this->db->insert_id();
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return false;
		} else {
			$this->db->trans_commit();
			return $insert_id;
		}
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