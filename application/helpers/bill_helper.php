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
    function getOption($tableName,$value='id',$showValue='name',$select="",$cond=array(),$selectOption=FALSE)
	{
		$CI =& get_instance();
		$CI->load->model('bill_Model');
		$records2 = $CI->bill_Model->multiCondition($tableName,$cond);
		if ($records2)
		{
			if($selectOption) echo "<option value='' disabled selected>Select option</option>";
			foreach ($records2 as $row2)
			{
				if($row2[$value] == $select) $selected= "selected";
				else $selected ="";
				echo "<option value='".$row2[$value]."' ".$selected.">".$row2[$showValue]."</option>";
			}
		}
		else
			echo "<option value=''>No Options</option>";
	}
	///////////////generic function for get field
	function getField($tableName,$row_key,$row_value,$field)
	{
		$CI =& get_instance();
		$CI->load->model('bill_Model');
		return $records2 = $CI->bill_Model->getField($tableName,$row_key,$row_value,$field);
	}
	function getRow($tableName,$row_key,$row_value,$cond = array())
	{
		$CI =& get_instance();
		$CI->load->model('bill_Model');
		return $records2 = $CI->bill_Model->getRow($tableName,$row_key,$row_value,$cond);
	}
	
	function multiCondition($table,$conditions,$result = 'all')
	{
		$CI =& get_instance();
		$CI->load->model('bill_Model');
		return $records2 = $CI->bill_Model->multiCondition($table,$conditions,$result);
	}
	function countRows($tableName,$cond = array())
	{
		$CI =& get_instance();
		$CI->load->model('bill_Model');
		return $records2 = $CI->bill_Model->countRows($tableName,$cond);
	}
}

