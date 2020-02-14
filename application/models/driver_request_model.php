<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Driver_request_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}


	public static $table = "driverRequest";

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
    public function QouteChartCount(){
        $data = $this->db->query("SELECT COUNT(id) as count,MONTHNAME(created_at) as month_name FROM vbs_request WHERE YEAR(created_at) >= '2019'
      GROUP BY YEAR(created_at),MONTH(created_at)");
        return  $data->result();
    }
    public function QouteLineChart() {
        $dayQuery =  $this->db->query("SELECT  MONTHNAME(created_at) as y, COUNT(id) as a FROM vbs_request WHERE  YEAR(created_at) >= '2019'  GROUP BY YEAR(created_at),MONTH(created_at)");

        return $dayQuery->result();

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


	public static function validate(){
		$reqInputs = [
				'civility'  => 'Civility',
				'name'      => 'Nom',
				'prename'   => 'Prenom',
				'email'     => 'Votre email',
				'tel'       => 'Telephone',
				'message'   => 'Votre message'
		];

		$error = [];
		foreach($reqInputs as $key => $input){
			$check = !isset($_POST[$key]) || $_POST[$key] == "" || empty($_POST[$key]);
			if($check){
				$error[] = "Merci de compléter toutes les cases correctement.";
			}
			if($key == "email" AND !filter_var($_POST[$key], FILTER_VALIDATE_EMAIL)){
				$error[] = "S'il vous plaît entrer un email valide.";
			}
			if($key == "tel" AND !preg_match('/^0[0123456790]\d{8}$/', $_POST[$key])){
				$error[] = "Veuillez entrer un numéro de téléphone valide avec 10 chiffres commençant par 0.";
			}
		}

		return $error;
	}


	function insert_operation( $inputdata, $table, $email = '' )
	{

		if($this->db->insert($this->db->dbprefix($table),$inputdata))

		return 1;

		else 

		return 0;

	}

	public function GetDriversAttachments($driver_request_id){
		// echo "sss";exit;
		$this->db->select('*');
		$this->db->from('vbs_driver_request_attachments');
		$this->db->where('driver_request_id',$driver_request_id);
		
		$query = $this->db->get();
		return $query->num_rows() > 0 ? $query->result() : false;
	}
	
	
	public function search($type,$status,$from,$to,$driver, $where = [], $limit = false){
	   
	    if(!empty($type))   $this->db->where('request_type', $type);
	    if(!empty($status)) $this->db->where('status', $status);
	    if(!empty($from)) $this->db->where('date >=', $from);
		if(!empty($to)) $this->db->where('date <=', $to);
		if(!empty($driver))   $this->db->where('driver_name', $driver);

		$this->db->order_by('id','desc');
		$query = $this->db->get(self::$table);
		return $query->num_rows() > 0 ? $query->result() : false;
	}

	// public function getuser($where = []){
	// 	$this->db->from('vbs_users');
	// 	$query = $this->db->where('id',1);
	// 	return $query->num_rows() > 0 ? $query->row() : false;
	// }

}