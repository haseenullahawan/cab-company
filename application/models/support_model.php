<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Support_Model extends CI_Model {

	function __construct(){
		parent::__construct();
	}


	public static $table = "support";

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
	
	public function getRowsCount($where = [], $limit = false){
		if(!empty($where)) $this->db->where($where);
		if($limit != false) $this->db->limit($limit);
		$this->db->order_by('id','desc');
		$query = $this->db->get(self::$table);
		return $query->num_rows() > 0 ? $query->num_rows() : 0;
	}
	
	public function GetSupportAttachments($support_id){
		$this->db->select('*');
		$this->db->from('vbs_support_attachments');
		$this->db->where('support_id',$support_id);
		
		$query = $this->db->get();
		return $query->num_rows() > 0 ? $query->result() : false;
	}
	
	public function SupportChartCount(){
        $data = $this->db->query("SELECT COUNT(id) as count,MONTHNAME(created_on) as month_name FROM vbs_support WHERE YEAR(created_on) >= '2019'
      GROUP BY YEAR(created_on),MONTH(created_on)");
        return  $data->result();;
    }

    public function SupportLineChart() {
        $dayQuery =  $this->db->query("SELECT  MONTHNAME(created_on) as y, COUNT(id) as a FROM vbs_support WHERE  YEAR(created_on) >= '2019' GROUP BY YEAR(created_on),MONTH(created_on)");

        return $dayQuery->result();

    }
	
	public function UserSupportChartCount($user_id){
        $data = $this->db->query("SELECT COUNT(id) as count,MONTHNAME(created_on) as month_name FROM vbs_support WHERE YEAR(created_on) >= '2019' AND user_id = '".$user_id."' GROUP BY YEAR(created_on),MONTH(created_on)");
        return  $data->result();;
    }

    public function UserSupportLineChart($user_id) {
        $dayQuery =  $this->db->query("SELECT  MONTHNAME(created_on) as y, COUNT(id) as a FROM vbs_support WHERE  YEAR(created_on) >= '2019' AND user_id = '".$user_id."' GROUP BY YEAR(created_on),MONTH(created_on)");

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
				'p_title'  => 'Civility',
				'fname'      => 'Nom',
				'lname'   => 'Prenom',
				'email'     => 'Votre email',
				'phone'       => 'Telephone',
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
			if($key == "phone" AND !preg_match('/^0[0123456790]\d{8}$/', $_POST[$key])){
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
	
	function insert_operation_id( $inputdata, $table, $email = '' )
	{

		$result  = $this->db->insert($this->db->dbprefix($table),$inputdata);

		return $this->db->insert_id();

	}
	
	public function getQuickReply($id){
		$this->db->select('message_sentence');
		$this->db->from('vbs_quick_replies');
		$this->db->where('id',$id);
		
		$query = $this->db->get();
		return $query->row();
	}

	public function headerCount(){
		$data = $this->db->query("SELECT * FROM vbs_driverRequest WHERE status IN (1,2)"); 

        return  $data->result();
    }
	
	public function previous_replies($id){
		$this->db->select('*');
		$this->db->from('vbs_support_replies');
		$this->db->where('support_id',$id);
		$this->db->order_by('created_on','ASC');
		
		$query = $this->db->get();
		return $query->result();
	}
	public function getUserAddedBy($id){
		$this->db->select('u.*,d.name as department');
		$this->db->from('vbs_users u');
		$this->db->join('vbs_departments d','d.id=u.department_id','left');
		$this->db->where('u.id',$id);
		
		$query = $this->db->get();
		return $query->row();
	}
	public function getSupportReplyUser($id, $addedBy) {
        $dbQuery =  $this->db->query("SELECT u.username, d.name as department FROM vbs_support_replies as r left outer join vbs_users as u on u.id = r.addedBy left outer join vbs_departments as d on d.id = u.department_id WHERE r.id = ".$id." AND r.addedBy = ".$addedBy." ");
        return $dbQuery->result();
    }
    
    public function get_reply($request_id) {
        $dbQuery =  $this->db->query("SELECT * FROM vbs_request_replies rr WHERE rr.request_id = ".$request_id." AND rr.type = 5 order by id desc limit 1");
        return $dbQuery->result();
	}
	
	public function validateDetail($tblName, $where = ""){
        $this->db->select('*');
        $this->db->from($tblName);
        if (!empty($where)){
			$this->db->where($where);
		}
		return $this->db->get();
    }
	public function getUserData($user_id){
        $this->db->select('*');
        $this->db->from('vbs_users');
		$this->db->where('id',$user_id);
		
		$query = $this->db->get();
		return $query->row();
    }
	
	public function updateProfile($data, $id){
		if($this->db->update('vbs_users', $data, ['id' => $id]))
			return true;
		else
			return false;
	}
}