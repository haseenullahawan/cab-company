<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function getPayMethodsById($id){
    
        $CI =& get_instance();
        $CI->load->model('pay_methods_model');
        $data = $CI->pay_methods_model->getAll();
        //var_dump($data); exit();
        $res = " ";
        foreach($data as $row){
            if($row['id'] === $id){
            
            $res = $row['name'];
            
            }
            
        }
        
        return $res;
}


function getPayMethods(){
    
        $CI =& get_instance();
        $CI->load->model('pay_methods_model');
        $data = $CI->pay_methods_model->getAll();
        
        return $data;
}

