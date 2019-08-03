<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$CI =& get_instance();
$CI->load->database();

$config['googleplus']['application_name'] = '';
$config['googleplus']['client_id']        = $CI->config->item('site_settings')->google_client_id;
$config['googleplus']['client_secret']    = $CI->config->item('site_settings')->google_client_secret;
$config['googleplus']['redirect_uri']     = '';
$config['googleplus']['api_key']          = '';
$config['googleplus']['scopes']           = array();

