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
 * @category  Driver
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
 * Driver.
 *
 * @category  Driver
 * @package   DOVBSV2
 * @author    DOVBSV2 <digitalvidhya4u@gmail.com>
 * @copyright 2017 - 2018, DOVBSV2
 * @license   http://opensource.org/licenses/MIT    MIT License
 * @link      http://codeigniter.com
 */
class Driver extends MY_Controller
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
	| MODULE: 			Driver
	| -----------------------------------------------------
	| This is Driver module controller file.
	| -----------------------------------------------------
	**/
	function __construct()
	{
		parent::__construct();
        
	
		// Load MongoDB library instead of native db driver if required

		$this->config->item('use_mongodb', 'ion_auth') ? $this->load->library('mongo_db') : $this->load->database();
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth') , $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
        
		// $this->load->helper('language');
		
		check_access('driver');
	}

	/**
     * Drivers list
     *
     *
     * @return array
    **/ 
	function index()
	{  
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
        
        
        /**today bookings**/
		$todaybookings = $this->dvbs_model->get_exe_dashboard_today_bookings();
        $this->data['todaybookings'] = $todaybookings;
		 
          
          
		/****** Recent Bookings Chart Data ******/
		$records = $this->base_model->run_query('SELECT bookdate, count(IF(is_conformed="confirm",1,NULL)) AS confirmed_bookings,count(IF(is_conformed="cancelled",1,NULL)) AS cancelled_bookings, count(IF(is_conformed="pending",1,NULL)) AS pending_bookings, count(*) AS total_bookings FROM ' . $this->db->dbprefix("bookings") . ' GROUP BY bookdate ORDER BY id DESC LIMIT 4');
                        
		if (count($records) > 0)
		{
			$result = array();
			$temp = array();
			array_push($temp, $this->lang->line('date') , $this->lang->line('total_bookings') , $this->lang->line('cancelled_bookings') , $this->lang->line('pending_bookings') , $this->lang->line('confirmed_bookings'));
			array_push($result, $temp);
			foreach($records as $d)
			{
				$temp = array();
				array_push($temp, date('M d', strtotime($d->bookdate)) , $d->total_bookings, $d->cancelled_bookings, $d->pending_bookings, $d->confirmed_bookings);
				array_push($result, $temp);
			}

			$str = "";
			$cnt = 0;
			foreach($result as $r)
			{
				if ($cnt++ == 0)
					{
					$str = $str . "['" . $r[0] . "','" . $r[1] . "','" . $r[2] . "','" . $r[3] . "','" . $r[4] . "'],";
					}
				  else
					{
					$str = $str . "['" . $r[0] . "'," . $r[1] . "," . $r[2] . "," . $r[3] . "," . $r[4] . "],";
					}
			}

			$this->data['result'] = $str;
		}

        
        /***customers**/
		$customers = $this->dvbs_model->exe_dashboard_customers();
        
        
        /**members count**/
		$n = $this->dvbs_model->exe_dashboard_members_count();
		
        
        /**inactive members count**/
		$im = $this->dvbs_model->exe_dashboard_inactive_members_count();
		
        
        /**executive count**/
		$e = $this->dvbs_model->exe_dashboard_executives_count();
		
        
        /**inactive executives count**/
		$ie = $this->dvbs_model->exe_dashboard_inactive_executives_count();
		
        
        /**vehicles count**/
		$v = $this->dvbs_model->exe_dashboard_vehicles_count();
		
        
        /**airports count**/
		$a = $this->dvbs_model->exe_dashboard_airports_count();
		
        
        /**packages count**/
		$p = $this->dvbs_model->exe_dashboard_packages_count();
		
        
        /**bookings count**/
		$b = $this->dvbs_model->exe_dashboard_bookings_count();
		
        
		
		$this->data['n'] = $n;
		$this->data['im'] = $im;
		$this->data['e'] = $e;
		$this->data['ie'] = $ie;
		$this->data['v'] = $v;
		$this->data['a'] = $a;
		$this->data['p'] = $p;
		$this->data['b'] = $b;
		$this->data['customers'] = $customers;
		$this->data['css_type'] = array(
			"form",
			"datatable"
		);
		$this->data['gmaps'] = "false";
		$this->data['active_class'] = "dashboard";
		$this->data['title'] = 'Welcome to DVBS';
		$this->data['content'] = 'drivers/dashboard';
       
		$this->_render_page(getTemplate(), $this->data);
	}
	

    /**
     * Update Driver profile
     *
     *
     * @return boolean
    **/ 
	public function profile()
	{
		$this->data['message'] = "";
			
		if ($this->input->post('submit') == "Update")
		{
            
            $msg='';
            $status=0;
            
			// FORM VALIDATIONS

			$this->form_validation->set_rules('user_name', 'User Name', 'xss_clean|required');
			$this->form_validation->set_rules('email', 'Email', 'valid_email|xss_clean|required');
			$this->form_validation->set_rules('first_name', 'First Name', 'xss_clean|required');
			$this->form_validation->set_rules('last_name', 'Last Name', 'xss_clean|required');
			$this->form_validation->set_rules('phone', 'Phone', 'xss_clean|required|min_length[9]|max_length[30]');
            
            
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            
            
			if ($this->form_validation->run() == TRUE)
			{
				$inputdata['username'] = $this->input->post('user_name');
				$inputdata['email'] = $this->input->post('email');
				$inputdata['first_name'] = $this->input->post('first_name');
				$inputdata['last_name'] = $this->input->post('last_name');
				$inputdata['phone'] = $this->input->post('phone');
				$table_name = "users";
                
				$where['id'] = $user_id = $this->input->post('update_rec_id');
                
				if ($this->base_model->update_operation($inputdata, $table_name, $where))
                {
                    $msg .= $this->lang->line('update_success');
                    $status=0;
                    
                    
                    
                //Upload Image
				if(count($_FILES) > 0) 
				{
                    $data = array();
                    
                    //profile image
					if($_FILES['image']['name'] != '' && $_FILES['image']['error'] != 4)
					{
						$record = $this->base_model->fetch_records_from(TBL_USERS,array('id'=>$user_id));
					
						if(!empty($record))
						{
							$record = $record[0];
							if($record->image != '' && file_exists(USER_IMG_UPLOAD_PATH_URL.$record->image))
							{
								unlink(USER_IMG_UPLOAD_PATH_URL.$record->image);
							}
						}
						

						$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
						$file_name = 'user_'.$user_id.'.'.$ext;
						$config['upload_path'] 		= USER_IMG_UPLOAD_PATH_URL;
						$config['allowed_types'] 	= ALLOWED_TYPES;
                        
						$config['max_size'] 	    = 5120;//5 MB
                        
						$config['file_name']  = $file_name;
						$this->load->library('upload', $config);
						$this->upload->initialize($config);

						if($this->upload->do_upload('image'))
						{
							$data['image'] = $file_name;
						}
						else
						{
							$msg .= '<br>'.strip_tags($this->upload->display_errors());
							$status =1;
						}
					}
                    
                    //driving license
                    if($_FILES['license']['name'] != '' && $_FILES['license']['error'] != 4)
					{
						$record = $this->base_model->fetch_records_from(TBL_USERS,array('id'=>$user_id));
					
						if(!empty($record))
						{
							$record = $record[0];
							if($record->license != '' && file_exists(DRIVER_LICENSE_UPLOAD_PATH_URL.$record->license))
							{
								unlink(DRIVER_LICENSE_UPLOAD_PATH_URL.$record->license);
							}
						}
						

						$ext = pathinfo($_FILES['license']['name'], PATHINFO_EXTENSION);
                        
						$file_name = 'license_'.$user_id.'.'.$ext;
                        
						$config['upload_path'] 		= DRIVER_LICENSE_UPLOAD_PATH_URL;
						$config['allowed_types'] 	= ALLOWED_TYPES;
                        
						$config['max_size'] 	    = 5120;//5 MB
                        
						$config['file_name']  = $file_name;
						$this->load->library('upload', $config);
						$this->upload->initialize($config);

						if($this->upload->do_upload('license'))
						{
							$data['license'] = $file_name;
						}
						else
						{
							$msg .= '<br>'.strip_tags($this->upload->display_errors());
							$status =1;
						}
					}
                    
                    
                    if (!empty($data))
                    $this->base_model->update_operation($data,TBL_USERS,array('id'=>$user_id));
                
				}
                   
                   
                }
                else
                {
                    $msg .= $this->lang->line('update_failure');
                    $status=1;
                }
                
                $this->prepare_flashmessage($msg,$status);
                redirect('driver/profile', 'refresh');
			}
		}

		$admin_details = getUserRec();
        
		$this->data['admin_details'] = $admin_details;
		$this->data['css_type'] = array(
			'form'
		);
		$this->data['gmaps'] = "false";
		$this->data['title'] = 'Profile';
		$this->data['content'] = 'drivers/profile';
		$this->_render_page(getTemplate(), $this->data);
	}  
}
?>