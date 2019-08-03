<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$CI =& get_instance();
$CI->load->database();

$results = $CI->db->query('select * from vbs_payu_settings')->result_array();
if(count($results)>0) {
	$CI->config->set_item('payumoney', $results[0]); 
}
$config = $CI->config->item('payumoney');

