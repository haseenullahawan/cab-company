<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DVBS {
	
	function golbalSettings()
	{
		$CI =& get_instance(); 
		$CI->load->database();
		echo "<pre>"; print_r($CI); die();
	$CI->load->database();
		$dta = $CI->db->get('vbs_site_settings')->results();
		echo "<pre>"; print_r($dta); die();
	}
}