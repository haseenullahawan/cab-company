<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class My_Model extends CI_Model
{
    function __construct(){
		parent::__construct();
	}
	public function userlogin()
	{
		$username = $this->input->post('login_username');
		$password =sha1($this->input->post('login_password'));
		$query = $this->db->get_where('user', array('username'=>$username,'password'=>$password));
		if($query->num_rows() >0)
		{
			return $query->result();
		}
		else
			return array();
	}
	
	public function get_table($table)
	{
		$data = $this->db->get($table);
		return $data->result_array();		
	}

	public function get_table_row($condition,$table)
	{
		$this->db->where($condition);		
		$data = $this->db->get($table);
		return $data->result_array();		
	}	

	public function checkNumRows($table,$where='')
	{
        $query=$this->db->get_where($table,$where);
        return  $query->num_rows();;
    }

	public function get_table_row_query($query)
	{		
		$data = $this->db->query($query);
		return $data->result_array();		
	}

	public function get_table_row_query2($query)
	{
		$data = $this->db->query($query);
		return $data->row_array();
	}

	public function insert_table($table,$user_val)
	{
	    
	    $this->db->trans_begin();
		$error = $this->db->insert($table,$user_val);
		return $this->db->insert_id();
	}

	public function delete_table($condition,$table)
	{
		$this->db->where($condition);
		return $data = $this->db->delete($table);
	}
	public function update_table($condition,$table,$user_val)
	{
		$this->db->where($condition);
		$this->db->set($user_val);
		$this->db->update($table);
		return $this->db->affected_rows();
	}

}

