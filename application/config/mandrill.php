<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	     $CI =& get_instance();
		 $CI->load->database();
		 
		 $results = $CI->db->get('vbs_email_settings')->result();
			
		 
$config['mandrill_api_key'] = $results[0]->api_key;
 