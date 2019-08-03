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
 * @category  Users
 * @package   DOVBSV2
 * @author    DOVBSV2 <digitalvidhya4u@gmail.com>
 * @copyright 2017 - 2018, DOVBSV2
 * @license   http://opensource.org/licenses/MIT    MIT License
 * @link      http://codeigniter.com
 * @since     Version 1.0.0
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter User_authentication Class
 * 
 * Users.
 *
 * @category  Users
 * @package   DOVBSV2
 * @author    DOVBSV2 <digitalvidhya4u@gmail.com>
 * @copyright 2017 - 2018, DOVBSV2
 * @license   http://opensource.org/licenses/MIT    MIT License
 * @link      http://codeigniter.com
 */
class Users extends MY_Controller
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
	| MODULE: 			Users
	| -----------------------------------------------------
	| This is users module controller file.
	| -----------------------------------------------------
	**/
	function __construct()
	{
		parent::__construct();
	
		check_access('members');
	
	}
	/**
     * Users list
     *
     *
     * @return array
    **/ 
	function index()
	{
		$waiting_times 	= $this->base_model->run_query("SELECT * FROM vbs_waitings");

		$this->db->order_by("image", "random");
		$this->data['vehicles'] 			= $this->db->get('vbs_vehicle', 4)->result();
		$waiting_options = array( "0 0" => $this->lang->line('select_waiting_time'));
		foreach($waiting_times as $row) $waiting_options[$row->waiting_time . "Mins " . $row->cost] = $row->waiting_time . " Mins (" . $row->cost . ")";
		$this->data['waiting_options'] 		= $waiting_options;
		$this->data['country_code'] 		= "in";

		$site_settings = $this->base_model->run_query("SELECT * FROM vbs_site_settings");
		if (count($site_settings) > 0) 
			$this->data['site_settings'] 	= $site_settings[0];
		else $this->data['site_settings'] 	= array();
		
		$this->data['airports'] = $this->db->get_where($this->db->dbprefix('airports'), array(
				'status' => 'active'
			))->result();
		$this->data['css_type'] 			= array("homebooking");
		$this->data['bread_crumb'] 			= FALSE;
        
		$this->data['title'] = $this->lang->line('welcome')." ".$this->lang->line('DVBS');
        
        
		$this->data['content'] 				= 'site/index';
        
		$this->_render_page(getTemplate(), $this->data);
	}

    
	/**
     * User Bookings list
     *
     *
     * @return array
    **/ 
    function my_bookings() 
    {
        
         $this->data['ajaxrequest'] = array(
			'url' => site_url().'users/ajax_get_bookings',
			'disablesorting' => '0,8',
		);
		
		$this->data['css_type']     = array('datatable');
		
		$this->data['active_class'] = "my_account";
		
		$this->data['message'] 		= $this->session->flashdata('message');
		$this->data['title'] 	    = 'Booking History';
		$this->data['content'] 		= "users/booking_history";
		$this->_render_page(getTemplate(), $this->data);
        
    }
    
    /**
     * User Bookings list
     *
     *
     * @return array
    **/ 
    function ajax_get_bookings()
    {
		if($this->input->is_ajax_request())
		{
			// return false;
			$data = array();
			$no = $_POST['start'];

			$conditions = array();

			$columns = array('bookdate','pick_date','pick_time','pick_point','drop_point','cost_of_journey','is_conformed');	
			
			$query 	= "SELECT * from ".TBL_PREFIX.TBL_BOOKINGS." where user_id = ".$this->ion_auth->get_user_id()." ";
			
           
            
			$records = $this->base_model->get_datatables($query, 'customnew', $conditions, $columns, array('id'=>'desc'));
			
            
            
			if(!empty($records)) {

				foreach($records as $record)
				{
					$no++;
					$row = array();

					$row[] = $no;
                    
                    $row[] = '<span>'.anchor(site_url().'users/booking_details/'.$record->booking_ref, $record->booking_ref).'</span>';

					$row[] = '<span>'.get_date($record->bookdate).'</span>';
                   
                    $row[] = '<span>'.get_date($record->pick_date).'</span>';
                    
                    // $row[] = '<span>'.$record->pick_time.'</span>';
                    
                    $row[] = '<span>'.$record->pick_point.'</span>';
                    
                    $row[] = '<span>'.$record->drop_point.'</span>';
                    
                    $row[] = '<span>'.$this->config->item('site_settings')->currency_symbol.$record->cost_of_journey.'</span>';
                    
					
                    $class = 'badge warning';
					if ($record->is_conformed == 'confirm')
						$class = 'badge success';	
					else if($record->is_conformed=='pending')
                        $class = 'badge warning';
                    else if($record->is_conformed=='cancelled')
                        $class = 'badge danger';
                                       
                     
					$row[] = '<span class="'.$class.'">'.$record->is_conformed.'</span>';
					
                    
					$str='';
                    
                    if ($record->is_conformed=="pending") 
                    { 
                        $str .= '<a data-toggle="modal" class="btn btn-danger bmc-btn-danger btn-xs" data-target="#bkng_status_modal" onclick="bkng_status_record('.$record->id . ',\''.site_url().'users/booking_status'.'\')">
						Cancel
                        </a>';
                    
                    }
					
                    $row[] = $str;
					
                
					$data[] = $row;
				
				}
			}

			$output = array(
					"draw" => $_POST['draw'],
					"recordsTotal" => $this->base_model->numrows,
					"recordsFiltered" => $this->base_model->numrows,
					"data" => $data,
			);

			echo json_encode($output);
		}
    }
    
    /**
     * Change status of Booking
     *
     *
     * @return boolean
    **/ 
    function booking_status()
    {
		if (!DEMO) {
            
            if($this->input->post())
            {
                $id = $this->input->post('id');
                
                $filedata = array();
                $message = '';
                
                $filedata['is_conformed'] = 'cancelled';
               
          
                if ($this->base_model->update_operation_in( $filedata, TBL_BOOKINGS, 'id', explode(',', $id) ))
                {

                	//send email to admin
                    $site_settings_rec = $this->config->item('site_settings');

                    $journey_details = $this->base_model->run_query("SELECT b.*,v.name FROM vbs_bookings as b, vbs_vehicle as v WHERE b.id=" . $id . " AND v.id = b.vehicle_selected");
                    
                    if (!empty($journey_details))
                        $journey_details = $journey_details[0];
                    
                    $journey_details = (array) $journey_details;
                    
                    $this->data['journey_details'] = $journey_details;


                    //SEND EMAIL TO USER WHEN CANCELLED/CONFIRMED BOOKING
                    $message =  $this->booking_cancel_template_admin($this->data);
                    
                    $from = $journey_details['email'];
                    
                    $to   = $this->config->item('site_settings')->portal_email;
                    
                    $sub  = 'USER has Cancelled his Booking - '.$this->lang->line('booking_ref').": ".$journey_details['booking_ref'];
                    
                    sendEmail($from, $to, $sub, $message);


                	$message = $this->lang->line('booking_cancelled');
                	echo json_encode(array('status' => 1, 'message' => $message, 'action' => 'success'));
                }
                else
                {
                	$message = $this->lang->line('booking_not_cancelled');
                	echo json_encode(array('status' => 0, 'message' => $message, 'action' => 'failed'));
                }
            } 
            else
            {
                $message = $this->lang->line('MSG_WRONG_OPERATION');
                echo json_encode(array('status' => 0, 'message' => $message, 'action' => 'failed'));			
            }
		} else{	
				$msg = 'Access Denied on demo server';				
				echo json_encode(array('status' => 0, 'message' => $msg, 'action' => 'failed'));		
		}
    }


	/**
     * View Booking Details
     *
     * @param string $ref_no
     * @return array
    **/ 
    function booking_details($ref_no) 
    {
        
        $record = $this->base_model->run_query("SELECT b.*,v.name FROM vbs_bookings AS b , vbs_vehicle AS v WHERE b.vehicle_selected = v.id AND b.booking_ref='".$ref_no."' ");
        
        if (!empty($record)) {
            $record = $record[0];
           
            $this->data['gmaps'] 				= "false";
            $this->data['css_type'] 			= array('form');
            $this->data['record'] 			    = $record;
            $this->data['active_class'] 		= "my_account";
            $this->data['title'] 				= $this->lang->line('booking_details');
            $this->data['content'] 				= 'users/booking_details';
            $this->_render_page(getTemplate(), $this->data);
        
        } else {
            redirect(site_url().'users/my_bookings');
        }
    }

    /**
     * Update user profile
     *
     *
     * @return boolean
    **/ 
	function profile()
	{
		$this->data['message'] 				= "";
        
		if ($this->input->post('submit') == "Update") {
            
           
			$this->check_isdemo(site_url().'users/profile');
            
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
				$where['id'] 				= $this->ion_auth->get_user_id();
				if ($this->base_model->update_operation($inputdata, $table_name, $where)) {
					$this->prepare_flashmessage($this->lang->line('update_success'), 0);
					
				}
				else {
					$this->prepare_flashmessage($this->lang->line('unable_failure'), 1);
					
				}
                
                redirect(site_url().'users/profile', 'refresh');
			}
		}

		$this->data['profile_info'] 	= getUserRec();
		$this->data['css_type'] 		= array('form');
		$this->data['title'] 			= $this->lang->line('profile');
        $this->data['active_class']     = 'my_account';
		$this->data['content'] 			= "users/profile";
        
		$this->_render_page(getTemplate(), $this->data);
	}

    /**
     * Change password
     *
     *
     * @return boolean
    **/ 
	function change_password()
	{
		$this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
        
		$this->form_validation->set_rules('new_password', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
        
		$this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');
        
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        
		$user = $this->ion_auth->user()->row();
        
		if ($this->form_validation->run() == FALSE) {

			// display the form
			// set the flash data error message if there is one
			$this->data['min_password_length'] = $this->config->item(
												'min_password_length', 
												'ion_auth'
												);
                                                
			$this->data['old_password'] = array(
												'name' => 'old',
												'id' => 'old',
												'type' => 'password',
												'placeholder' => $this->lang->line('old_password') ,
                                                'class'=>'form-control'
												);
			$this->data['new_password'] = array(
													'name' => 'new_password',
													'id' => 'new',
													'type' => 'password',
													'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
													'placeholder' => $this->lang->line('new_password') ,
                                                    'class'=>'form-control'
												);
			$this->data['new_password_confirm'] = array(
														'name' => 'new_confirm',
														'id' => 'new_confirm',
														'type' => 'password',
														'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
														'placeholder' => $this->lang->line('confirm_password') ,
                                                        'class'=>'form-control'
													);
			$this->data['user_id'] 				= array(
														'name' => 'user_id',
														'id' => 'user_id',
														'type' => 'hidden',
														'value' => $user->id,
													);
			$this->data['css_type'] 			= array('form');
			$this->data['title'] 				= 'Change Password';
            $this->data['active_class']         = 'my_account';
			$this->data['content'] 				= "users/change_password";
            
			$this->_render_page(getTemplate(), $this->data);
            
		} else {
            
           
			$this->check_isdemo(site_url().'users/change_password');
            
			$identity 							= $this->session->userdata('identity');
			$change 							= $this->ion_auth->change_password(
													$identity, 
													$this->input->post('old'), 
													$this->input->post('new_password')
													);
			if ($change) {

			// if the password was successfully changed
				$this->prepare_flashmessage($this->lang->line('password_changed_success'), 0);
				redirect('users/change_password', 'refresh');
			}
			else {
				$this->prepare_flashmessage($this->ion_auth->errors(), 1);
				redirect('users/change_password', 'refresh');
			}
		}
	}
}
