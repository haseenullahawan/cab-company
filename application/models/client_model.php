<?php if (! defined('BASEPATH')) exit('No direct script access allowed');



class client_model extends CI_Model



{

    function __construct(){

        parent::__construct();

    }


    function saverecords($status,$civilite,$nom,$pre_nom,$company,$address1,$address2,$email,$phone,$mobile,$fax,$code_postal,$ville,$client_type,$birthday,$disabled,$payment_method,$payment_delay,$note)
	{
	$query="insert into vbs_client values('$status','$civilite','$nom','$pre_nom','$company','$address1','$address2','$email','$phone','$mobile','$fax','$code_postal','$ville'
	                                        ,'$client_type','$birthday','$disabled','$payment_method','$payment_delay','$note')";
	$this->db->query($query);
	}
	
	
    // public function getdata($TableName){
    //     $query = $this->db->get('vbs_client');
    //     return $query->result();
    // }


    // public function insertData($TableName,$values,$column,$parameter){

    //     $this->db->select('*');

    //     $this->db->from($TableName);

    //     $this->db->where($column,$parameter);

    //     $query = $this->db->get();



    //     if($query->num_rows() == 0){

    //         return  $this->db->insert($TableName,$values);

    //     }

    // }



    // public function getStaut($TableName,$Column,$Parameter,$statut,$from,$to,$column){

    //     $this->db->select('*');

    //     $this->db->from($TableName);

    //     if($statut != ""){

    //         $this->db->like($column,$statut);

    //     }elseif($from != "" && $to != ""){

    //         $this->db->where('create_date >=', $from .'  '. date('h:i:s'));

    //         $this->db->where('create_date <=', $to .'  '. date('h:i:s'));

    //     }

    //     $this->db->where($Column,$Parameter);

    //     $query = $this->db->get();



    //     return $query->result();

    // }





    //  public function updateStatut($id,$statut,$values,$TableName,$column){

    //     $this->db->select('*');

    //     $this->db->from($TableName);

    //     $this->db->where($column,$statut);

    //      $this->db->where('is_delete','1');

    //     $query = $this->db->get();



    //     if($query->num_rows() > 0){

    //         return false;

    //     }else{

    //         $this->db->where('id',$id);

    //         return $this->db->update($TableName,$values);

    //     }

    //  }







    //  public function deleteDelete($TableName,$id){

    //         $this->db->where('id',$id);

    //         return $this->db->delete($TableName);

    //  }



    //  public function deactive($values,$id,$TableName){

    //     $this->db->set($values);

    //     $this->db->where('id',$id);

    //     return $this->db->update($TableName);

    //  }



}

?>