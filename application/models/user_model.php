<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}


	public static $table = "users";
	public static $resetPassword = "reset_password";


	public function get($where = []){
		$query = $this->db->select("user.*,role.name as role,department.name as department")
			->from(self::$table . " user")
			->join("roles role","role.id = user.role_id", "left")
			->join("departments department","department.id = user.department_id", "left")
			->where($where)->get();
		return $query->num_rows() > 0 ? $query->row() : false;
	}

	public function login($username, $password, $usernameCol = "email"){
		$query = $this->db->select("user.*,role.name as role,department.name as department")
			->from(self::$table . " user")
			->join("roles role","role.id = user.role_id","left")
			->join("departments department","department.id = user.department_id","left")
			->where([$usernameCol => $username, 'password' => md5($password)])
			->get();

		return $query->num_rows() > 0 ? $query->row() : false;
	}



	public function client_login($username, $password, $usernameCol = "email"){
		$where_in = array(6,7,8,9);
		
		return $query = $this->db->where([$usernameCol => $username, 'password' => md5($password)])->WHERE_IN('role_id',$where_in)->get('vbs_users')->row_array();

	}





	public function getAll($where = [], $limit = false){

		$this->db->select("user.*,role.name as role,department.name as department")
			->from(self::$table . " user")
			->join("roles role","role.id = user.role_id","left")
			->join("departments department","department.id = user.department_id","left");

		if(!empty($where)) $this->db->where($where);
		if($limit != false) $this->db->limit($limit);
		$this->db->order_by('id','desc');
		$query = $this->db->get();
		return $query->num_rows() > 0 ? $query->result_array() : false;
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

	public function update($data, $id){
		if($this->db->update(self::$table, $data, ['id' => $id]))
			return true;
		else
			return false;
	}

	public function delete($id){
		return $this->db->delete(self::$table, ['id' => $id]);
	}


	public static function sendReply($obj, $subject, $message, $type = "contact"){

		require_once(APPPATH."third_party/phpmailer/Exception.php");
		require_once(APPPATH."third_party/phpmailer/PHPMailer.php");
		require_once(APPPATH."third_party/phpmailer/SMTP.php");
		$mail = new \PHPMailer\PHPMailer\PHPMailer(true);
		$emailMessage = nl2br($message) . "<br>";

		$emailMessage .= "<h4 style='color: #000'>HANDI EXPRESS SAS<br>";
		$emailMessage .= "Service secrétariat</h4>";
		$emailMessage .= "<p><b>Siteweb : </b>www.handi-express.fr</p>";
		$emailMessage .= "<p><b>Email : </b>direction@handi-express.fr</p>";
		$emailMessage .= "<p><b>Tél : </b>01 48 13 09 34</p>";
		$emailMessage .= "<p><b>Fax : </b>01 83 62 84 04</p>";
		$emailMessage .= "<p><b>Adresse : </b>du siège social : 48-50 Avenue d'Enghien 93800 Epinay sur seine</p>";


		try {
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host     = 'tls://smtp.office365.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;
			$mail->CharSet  = 'UTF-8';                           // Enable SMTP authentication
			$replyTo = $type == "job" ? 'direction@handi-express.fr' : 'contact@handi-express.fr';
			$mail->addReplyTo($replyTo, 'Handi Express');
			$mail->Username = 'direction@handi-express.fr';                 // SMTP username
			$mail->Password = 'Hanouf77';                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to
			//Recipients
			$mail->setFrom('direction@handi-express.fr', 'Handi Express');
			$mail->addAddress($obj->email, $obj->civility . " " . $obj->first_name . " " . $obj->last_name);
			//Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = $subject;
			$mail->Body    = $emailMessage;
			$check = $mail->send();
			return [
				'status' => true,
				'message' => 'Message sent'
			];
		} catch (\PHPMailer\PHPMailer\Exception $e) {
			return [
				'status' => false,
				'message' => 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo
			];
		}
	}



	public function getResetPassword($where){
		$query = $this->db->get_where(self::$resetPassword, $where);
		return $query->num_rows() > 0 ? $query->row() : false;
	}

	public function addResetPassword($data){
		$this->db->trans_begin();
		$this->db->insert(self::$resetPassword, $data);
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return false;
		} else {
			$this->db->trans_commit();
			return true;
		}
	}

	public function updateResetPassword($data, $id){
		if($this->db->update(self::$resetPassword, $data, ['id' => $id]))
			return true;
		else
			return false;
	}

	public function deleteResetPassword($id){
		return $this->db->delete(self::$resetPassword, ['id' => $id]);
	}
}