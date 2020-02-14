.<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Language_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	public static $table = "languages";
	public static $trans_table = "lang_token";
	public static $lang_trans = "lang_trans";

    public function language_create($data){
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
	public function translation_create($data){
		$this->db->trans_begin();
		$dataid = $this->db->query("SELECT id FROM vbs_lang_token where description = '".$data['token_id']."'");
		$lang_id = $dataid->result_array();
		if(isset($lang_id[0]['id']) && $lang_id[0]['id'] != ''){
		    $newdata=array('lang_id'=>$data['lang'],
                'token_id'=> $lang_id[0]['id'],
                'translation'=>$data['translation'],
               );
		}
		else{
		    $transdata=array('lang'=>$data['lang'],
                'description'=> $data['token_id'],
               ); 
		    $this->db->insert(self::$trans_table, $transdata);
		    $insert_id = $this->db->insert_id();
		    $newdata=array('lang_id'=>$data['lang'],
                'token_id'=> $insert_id,
                'translation'=>$data['translation'],
               );
		}
// 		$newdata=array('lang_id'=>$data['lang'],
//                 'description'=> $lang_id[0]['id'],
//                 'token'=>$data['translation'],
//               );
		$this->db->insert(self::$lang_trans, $newdata);
		$insert_id = $this->db->insert_id();
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return false;
		} else {
			$this->db->trans_commit();
			return $insert_id;
		}
	}
	public function taran_inner_create($data){
		$this->db->trans_begin();
		
		$this->db->insert(self::$lang_trans, $data);
		$insert_id = $this->db->insert_id();
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return false;
		} else {
			$this->db->trans_commit();
			return $insert_id;
		}
	}

}