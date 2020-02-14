<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Company_Model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	public static $table = "company";

	public function get($where = []){
		$query = $this->db->get_where(self::$table, $where);
		return $query->num_rows() > 0 ? $query->row_array() : false;
	}

	public function getFirst(){
		$query = $this->db->get(Company_Model::$table);
		return $query->num_rows() > 0 ? $query->row_array() : false;
	}

	public function getAll($where = [], $limit = false){
		if(!empty($where)) $this->db->where($where);
		if($limit != false) $this->db->limit($limit);
		$this->db->order_by('id','desc');
		$query = $this->db->get(self::$table);
		return $query->num_rows() > 0 ? $query->result() : false;
	}

	public function insert($data){
		if($this->db->insert(self::$table, $data))
			return true;
		else
			return false;
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

	public static function validate(){
		$error = [];
		$reqInputs = [
				'civility'  => 'Civility',
				'name'      => 'Nom',
				'prename'   => 'Prenom',
				'email'     => 'Votre email',
				'num' 		=> 'Telephone'
		];

		foreach ($reqInputs as $key => $input) {
			$check = !isset($_POST[$key]) || $_POST[$key] == "" || empty($_POST[$key]);
			if ($check) {
				$error[] = "Merci de compléter toutes les cases correctement.";
			}
			if($key == "email" AND !filter_var($_POST[$key], FILTER_VALIDATE_EMAIL)){
				$error[] = "S'il vous plaît entrer un email valide.";
			}
			if ($key == "num" AND !preg_match('/^0[0123456790]\d{8}$/', $_POST[$key])) {
				$error[] = "Veuillez entrer un numéro de téléphone valide avec 10 chiffres commençant par 0.";
			}
		}
		return $error;
	}

}