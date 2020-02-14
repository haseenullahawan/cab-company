<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Department_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	public static $table = "departments";

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

	public function getModules()
	{
		$query = $this->db->get('vbs_modules');
		$modules = $query->result_array();
		$modules_box = array();
		foreach($modules as $module)
		{
			$modules_box[$module['id']] = $module;
		}
		return $modules_box;
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