<?php

defined('BASEPATH') OR exit('No direct script access allowed');
 
$CI =& get_instance();
$CI->load->database();
$CI->load->library('stripe');

$results = array();

 
$results = $CI->db->query('select * from vbs_stripe_settings')->result_array();
if(count($results)>0) {
	$CI->config->set_item('stripe_settings', $results[0]);
}


$config = $CI->config->item('stripe_settings');
$stripe = new Stripe( $config ); 