<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Basic_model extends CI_Model{
	
    public function __construct(){
        parent::__construct();
      
    }
    
    public function validateDetail($tblName, $where = ""){
        
        
         $this->db->select('*');
        $this->db->from($tblName);
        if (!empty($where)){
        $this->db->where($where);
    }
return $this->db->get();
    }
    //------------Get table all records----------
    public function getAll($tblName, $where = ""){
         $this->db->select('*');
        $this->db->from($tblName);
        if (!empty($where)){
        $this->db->where($where);
    }
return $this->db->get();
    }

    //------------Get Detail information----------
    public function getDetailInfo($tblName, $where){
        if ($where != ''){
            $SqlExec = "SELECT * FROM ".$tblName . " WHERE ".$where."";
        }else{
            $SqlExec = "SELECT * FROM ".$tblName."";
        }
        $result  = $this->db->query($SqlExec);
        return $result->row();
    }

    /* -----------Insert Records----------------- */
    public function insertData($tblName, $data){
        $this->db->insert($tblName, $data);
        return $this->db->insert_id();
    }

    /* -----------Delete Records----------------- */
    public function deleteData($tblName, $where){
      
        return $this->db->delete($tblName, $where);
    }

    /* -----------Update Records----------------- */
    public function updateData($tblName, $data, $where){
		//print_r($data); exit;
       
        $this->db->update($tblName, $data, $where);
        return true;
    }

    //------------count table all records-------
    public function countAll($tblName, $where = ""){
        if (!empty($where)){
            $SqlExec = "SELECT * FROM $tblName WHERE $where";
        }else{
            $SqlExec = "SELECT * FROM $tblName";
        }
        return $this->db->query($SqlExec)->num_rows();
    }

    //------------Get table all records----------
    public function fetchAll($tblName, $limit, $where = ""){
        if (!empty($where)){
            $SqlExec = "SELECT * FROM $tblName WHERE $where $limit";
        }else{
            $SqlExec = "SELECT * FROM $tblName $limit";
        }
        return $this->db->query($SqlExec)->result();
    }
}
