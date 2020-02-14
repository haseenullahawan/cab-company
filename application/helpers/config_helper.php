<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_configuration'))
{
    function get_configuration()
    {
        $data = [];
        $CI =& get_instance();
        $CI->load->model('config_model');
        $configData = $CI->config_model->getAll();
        if($configData != false){
            foreach($configData as $item)
                $data[$item->key] = $item->value;
        }
        return $data;
    }
}
 
   