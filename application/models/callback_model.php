<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Callback_Model extends CI_Model {

	function __construct(){
		parent::__construct();
	}


	public static $table = "email_settings";


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

	function callback_validate($cvReq = true){
		$reqInputs = [
			'status1'      => 'Callback Status',
			'name1'      => 'Callback Name',
			'host1' 	=> 'Callback Host',
			'call_from' 	=> 'Call From',
			'call_to' 	=> 'Call To',
			'auto_take_link' 	=> 'Auto Take Line',
		];
	
		$error = [];
		foreach($reqInputs as $key => $input){
			$check = !isset($_POST[$key]) || $_POST[$key] == "" || empty($_POST[$key]);
			if($check && !in_array($key, ['message','letter','cv']) ){
				$error[] = "Merci de compléter toutes les cases correctement.$key";
			}
			if($key == "email" AND !filter_var($_POST[$key], FILTER_VALIDATE_EMAIL)){
				$error[] = "S'il vous plaît entrer un email valide.";
			}
			if($key == "tel" AND !preg_match('/^0[0123456790]\d{8}$/', $_POST[$key])){
				$error[] = "Veuillez entrer un numéro de téléphone valide avec 10 chiffres commençant par 0.";
			}
			if($key == "dob" AND !valid_date($_POST[$key])){
				$error[] = "Veuillez entrer une date valide";
			} elseif($key == "dob" AND calculateAge(to_unix_date($_POST[$key])) < 18){
				$error[] = "l'âge doit être supérieur à 18 ans";
			}
			if($key == "cv" AND (!isset($_FILES['cv']) || empty($_FILES['cv']['name'])))
				$error[] = "veuillez joindre cv.";
		}
		return $error;
	}

}