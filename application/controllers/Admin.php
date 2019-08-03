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
 * @category  Admin
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
 * Admin.
 *
 * @category  Admin
 * @package   DOVBSV2
 * @author    DOVBSV2 <digitalvidhya4u@gmail.com>
 * @copyright 2017 - 2018, DOVBSV2
 * @license   http://opensource.org/licenses/MIT    MIT License
 * @link      http://codeigniter.com
 */
class Admin extends MY_Controller
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
	| MODULE: 			Admin
	| -----------------------------------------------------
	| This is Admin module controller file.
	| -----------------------------------------------------
	 **/
	function __construct()
	{
		parent::__construct();
        
		$this->config->item('use_mongodb', 'ion_auth') ? $this->load->library('mongo_db') : $this->load->database();
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
    
	}

	/**
     * ADMIN DASHBOARD 
     * Fetch records count of modules
     *
     * @return array
    **/ 
	public function index()
	{
		check_access('admin');	
				
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
        
        
        /***today bookings**/
		$todaybookings=$this->dvbs_model->admin_home_get_todays_bookings();
        $this->data['todaybookings'] = $todaybookings;
	
        
        
		/****** Recent Bookings Chart Data ******/
		$records = $this->base_model->run_query('SELECT bookdate, count(IF(is_conformed="confirm",1,NULL)) AS confirmed_bookings,
		count(IF(is_conformed="cancelled",1,NULL)) AS cancelled_bookings, 
		count(IF(is_conformed="pending",1,NULL)) AS pending_bookings, 
		count(*) AS total_bookings FROM ' . $this->db->dbprefix("bookings") . ' GROUP BY bookdate ORDER BY id DESC LIMIT 4');
              
		if (count($records) > 0) {
            
			$result 						= array();
			$temp 							= array();
            
			array_push($temp, $this->lang->line('date'), $this->lang->line('total_bookings'), $this->lang->line('cancelled_bookings'), $this->lang->line('pending_bookings'), $this->lang->line('confirmed_bookings'));
            
			array_push($result, $temp);
            
			foreach($records as $d) {
				$temp 						= array();
				array_push($temp, date('M d', strtotime($d->bookdate)), $d->total_bookings, $d->cancelled_bookings, $d->pending_bookings, $d->confirmed_bookings);
				array_push($result, $temp);
			}

            
			$str = "";
			$cnt = 0;
			foreach($result as $r) {
				if ($cnt++ == 0) {
					$str = $str . "['" . $r[0] . "','" . $r[1] . "','" . $r[2] . "','" . $r[3] . "','" . $r[4] . "'],";
				}
				else {
					$str = $str . "['" . $r[0] . "'," . $r[1] . "," . $r[2] . "," . $r[3] . "," . $r[4] . "],";
				}
			}

			$this->data['result'] = $str;
		}
        
        
        
        
        /**latest 10 customers**/
		$customers = $this->dvbs_model->admin_home_get_customers();
        
        /**total customers count**/
		$n = $this->dvbs_model->admin_home_get_members_count();
        
        /**inactive customers count**/
		$im = $this->dvbs_model->admin_home_inactive_members_count();

        /**executives count**/
		$e = $this->dvbs_model->admin_home_executives_count();
        
        /**inactive executives count**/
		$ie = $this->dvbs_model->admin_home_inactive_executives_count();
        
        /**vehicles count**/
		$v = $this->dvbs_model->admin_home_vehicles_count();
        
        /**airports count**/
		$a = $this->dvbs_model->admin_home_airports_count();
        
        /**packages count**/
		$p = $this->dvbs_model->admin_home_packages_count();
        
        /**bookings count**/
		$b = $this->dvbs_model->admin_home_bookings_count();


        
		$this->data['n'] 			= $n;
		$this->data['im'] 			= $im;
		$this->data['e'] 			= $e;
		$this->data['ie'] 			= $ie;
		$this->data['v'] 			= $v;
		$this->data['a'] 			= $a;
		$this->data['p'] 			= $p;
		$this->data['b'] 			= $b;
		$this->data['customers'] 	= $customers;
        
		$this->data['css_type'] 	= array("form","datatable");
		$this->data['gmaps'] 		= "false";
		$this->data['active_class'] = "dashboard";
		$this->data['title'] 		= 'Welcome to DVBS';
        
		$this->data['content'] 		= 'admin/dashboard';
        
		$this->_render_page(TEMPLATE_ADMIN, $this->data);
	}

    
    /**
     * ADMIN PROFILE 
     * 
     *
     * @return boolean
    **/
	public function profile()
	{
        check_access('admin');
		
		$this->data['message'] = "";
		
		if (isset($_POST['submit'])) {
            
          

			$this->check_isdemo(site_url().'admin/profile');

			// FORM VALIDATIONS

			$this->form_validation->set_rules('user_name', 'User Name', 'xss_clean|required');
			$this->form_validation->set_rules('email', 'Email', 'valid_email|xss_clean|required');
			$this->form_validation->set_rules('first_name', 'First Name', 'xss_clean|required');
			$this->form_validation->set_rules('last_name', 'Last Name', 'xss_clean|required');
			$this->form_validation->set_rules('phone', 'Phone', 'xss_clean|required|min_length[9]|max_length[30]');
            
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            
			if ($this->form_validation->run() == TRUE) {
                
				$inputdata['username'] 		= $this->input->post('user_name');
				$inputdata['email'] 		= $this->input->post('email');
				$inputdata['first_name'] 	= $this->input->post('first_name');
				$inputdata['last_name'] 	= $this->input->post('last_name');
				$inputdata['phone'] 		= $this->input->post('phone');
                
				$table_name 				= "users";
                
				$where['id'] 				= $this->input->post('update_rec_id');
				
				
				if ($this->base_model->update_operation($inputdata, $table_name, $where)) {
					$this->prepare_flashmessage("Updated Successfully", 0);
					redirect('admin/profile', 'refresh');
				}
				else {
					$this->prepare_flashmessage("Unable to update", 1);
					redirect('admin/profile');
				}
			}
		}

        
		$admin_details = getUserRec();
		$this->data['admin_details'] 		= $admin_details;
		$this->data['css_type'] 			= array('form');
		$this->data['gmaps'] 				= "false";
		$this->data['title'] 				= 'Profile';
		$this->data['content'] 				= 'admin/admin_profile';
        
		$this->_render_page(TEMPLATE_ADMIN, $this->data);
	}
    
    
    /**
     * View
     * 
     *
     * @return array
    **/
    public function form_view()
    {
		check_access('admin');
        
		$this->data['css_type'] 			= array("form","datatable");
		$this->data['title'] 				= 'Add Vechicle';
		$this->data['content'] 				= 'admin/settings/vechicle_add';
		$this->_render_page(getTemplate(), $this->data);
    }
    
	

     
	/**
     * User Details
     *
     * @param string $param 
     * @return array
    **/
	public function userDetails($param = '')
	{
		if (!$this->ion_auth->logged_in())
			redirect(SITEURL);
        
		$user = getUserRec($param);
        if (empty($user))
            redirect(SITEURL);
        
		$this->data['gmaps'] 				= "false";
		$this->data['css_type'] 			= array();
		$this->data['users'] 				= $user;
		$this->data['title'] 				= $this->lang->line('user') ." " . $this->lang->line('details');
		$this->data['content'] 				= 'admin/user_details';
        
		$this->_render_page(TEMPLATE_ADMIN, $this->data);
	}

     /**
     * Admin can DeActivate the user
     *
     * @param  int    $id
     * @param  string $param
     * @param  string $code
     * @return boolean
     */
	function deactivate($id, $param = '', $code = FALSE)
	{
		check_access('admin');
		

		$this->check_isdemo(site_url().'admin/profile');
        
		if ($code !== FALSE) {
			$deactivation = $this->ion_auth->deactivate($id, $code);
		}
		else
		if ($this->ion_auth->is_admin()) {
			$deactivation = $this->ion_auth->deactivate($id);
		}
        
        $redirect=site_url().'admin/customers';
        
		if ($param == "exe")
			$redirect=site_url().'admin/executives';
		
        if ($param == "driver") 
			$redirect=site_url().'admin/drivers';
        
		

		if ($deactivation) {

			// redirect them to the auth page

			$this->prepare_flashmessage($this->ion_auth->messages(), 0);

		} else {
            $this->prepare_flashmessage($this->ion_auth->errors(), 1);
  }
        
        redirect($redirect, 'refresh');
	}

    /**
     * Admin can Activate the user
     * @param  [int]    $id    [unique id]
     * @param  [string] $param
     * @param  [string] $code
     *
     * @return boolean
     */
	function activate($id, $param = '', $code = FALSE)
	{
		check_access('admin');

		$this->check_isdemo(site_url().'admin/profile');
		
		if ($code !== FALSE) {
			$activation = $this->ion_auth->activate($id, $code);
		}
		else if ($this->ion_auth->is_admin()) {
			$activation = $this->ion_auth->activate($id);
		}
        
        $redirect=site_url().'admin/customers';
        
		if ($param == "exe")
			$redirect=site_url().'admin/executives';
		
        if ($param == "driver") 
			$redirect=site_url().'admin/drivers';
        
        
        
		if ($activation) {

			// redirect them to the auth page

			$this->prepare_flashmessage($this->ion_auth->messages(), 0);

		} else {
            
            $this->prepare_flashmessage($this->ion_auth->errors(), 1);
  }
        
        redirect($redirect, 'refresh');
	}
	
}
