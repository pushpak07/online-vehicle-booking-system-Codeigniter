<?php
/**
 * DOVBSV2
 * 
 * An online cab booking system in codeigneter framework
 * 
 * This content is released under the Codecanyon Market License (CML)
 * 
 * Copyright (c) 2017 - 2018, Codecakes
 *
 * @category  Packages
 * @package   DOVBSV2
 * @author    DOVBSV2 <digitalvidhya4u@gmail.com>
 * @copyright 2017 - 2018, DOVBSV2
 * @license   http://opensource.org/licenses/MIT    MIT License
 * @link      http://codeigniter.com
 * @since     Version 1.0.0
 */
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * CodeIgniter User_authentication Class
 * 
 * Packages.
 *
 * @category  Packages
 * @package   DOVBSV2
 * @author    DOVBSV2 <digitalvidhya4u@gmail.com>
 * @copyright 2017 - 2018, DOVBSV2
 * @license   http://opensource.org/licenses/MIT    MIT License
 * @link      http://codeigniter.com
 */
class Packages extends MY_Controller
{
	/**
	| -----------------------------------------------------
	| PRODUCT NAME: 	DIGI VEHICLE BOOKING SYSTEM (DVBSV2)
	| -----------------------------------------------------
	| AUTHOR:			DIGITAL VIDHYA TEAM
	| -----------------------------------------------------
	| EMAIL:			digitalvidhya4u@gmail.com
	| -----------------------------------------------------
	| COPYRIGHTS:		RESERVED BY DIGITAL VIDHYA
	| -----------------------------------------------------
	| WEBSITE:			http://digitalvidhya.com
	|                   http://codecanyon.net/user/digitalvidhya
	| -----------------------------------------------------
	|
	| MODULE: 			Packages
	| -----------------------------------------------------
	| This is Packages module controller file.
	| -----------------------------------------------------
	**/
	function __construct()
	{
		parent::__construct();
	}

	/**
     * Packages list
     *
     *
     * @return array
    **/ 
	public function index()
	{
		$records = $this->dvbs_model->get_home_packages();
		$this->data['records'] 				= $records;
		$this->data['active_class'] 		= 'packages';
		$this->data['css_type'] 			= array();
		$this->data['title'] 				= $this->lang->line('packages');
		$this->data['sub_heading'] 			= $this->lang->line('packages');
		$this->data['content'] 				= 'site/packages';
		$this->_render_page(getTemplate(), $this->data);
	}

	/**
     * Package Booking
     *
     * @param string $param1
     * @return boolean
    **/ 
	public function booking($param1 = '')
	{
		if ($param1 == '' || !is_numeric($param1)) redirect('packages');
		$recs = $this->db->get_where($this->db->dbprefix('package_settings'), array(
			'status' => 'active',
			'id' => $param1
		))->result();


		if (count($recs) <= 0) 
			redirect('packages');


		$this->data['package_details'] = $recs[0];

		$vehicleid = $recs[0]->vehicle_id;
		unset($recs);

		$recs = $this->db->get_where($this->db->dbprefix('vehicle'), array('id' => $vehicleid))->result();


		$this->data['cabs'] 				= $recs;
		$this->data['gmaps'] 				= "true";
		$this->data['country_code'] 		= "in";
		$this->data['css_type'] 			= array("slider");
		$this->data['active_class'] 		= "packages";
		$this->data['heading'] 				= $this->lang->line('package_booking');
		$this->data['sub_heading'] 			= $this->lang->line('package_booking');
		$this->data['bread_crumb'] 			= TRUE;
		$this->data['title'] 				= $this->lang->line('welcome_to_DVBS');
		$this->data['content'] 				= 'site/package_booking_online';
		$this->_render_page(getTemplate(), $this->data);
	}
}
