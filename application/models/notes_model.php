<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Notes_Model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	public static $table = "notes";

	public function get($where = []){
		$query = $this->db->get_where(self::$table, $where);
		return $query->num_rows() > 0 ? $query->row() : false;
	}

	public function getAll($where = [], $limit = false){
		if(!empty($where)) $this->db->where($where);
		if($limit != false) $this->db->limit($limit);
		$this->db->order_by('id','asc');
		$query = $this->db->get(self::$table);
		return $query->num_rows() > 0 ? $query->result() : false;
	}

	public function create($data){
		$this->db->trans_begin();
		$this->db->insert(self::$table, $data);
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return false;
		} else {
			$this->db->trans_commit();
			return true;
		}
	}

	public function bulkInsert($data){
		$this->db->trans_begin();
		$this->db->insert_batch(self::$table, $data);
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return false;
		} else {
			$this->db->trans_commit();
			return true;
		}
	}

	public function delete($where){
		return $this->db->delete(self::$table, $where);
	}


	public function createNotesArray($id, $type){
		$notes = [];
		$notesArr = $this->input->post('note');
		foreach($notesArr as $key => $note){
			if($note != "")
				$notes[] = [
					'type' => $type,
					'type_id' => $id,
					'note' => $note
				];
		}
		return $notes;
	}
        
        
        public function createNotesAddedByArray($id, $type){
		$notes = [];
		$notesArr = $this->input->post('note2');
		$note_added_by = $this->input->post('note_added_by');
		foreach($notesArr as $key => $note){
			if($note != "")
				$notes[] = [
					'type' => $type,
					'type_id' => $id,
					'note' => $note,
					'note_added_by' => $note_added_by[$key],
				];
		}
		return $notes;
	}
}