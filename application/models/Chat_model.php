<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Chat_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}


	function changechatingboxsetting($status)
	{
		// echo "Model";exit;
		$data = array("chat_status"=>$status,"active_by"=>0);
		$this->db->update("header_settings",$data);
	}



}
?>