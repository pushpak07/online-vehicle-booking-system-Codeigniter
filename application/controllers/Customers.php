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
 * @category  Customers
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
 * Customers.
 *
 * @category  Customers
 * @package   DOVBSV2
 * @author    DOVBSV2 <digitalvidhya4u@gmail.com>
 * @copyright 2017 - 2018, DOVBSV2
 * @license   http://opensource.org/licenses/MIT    MIT License
 * @link      http://codeigniter.com
 */
class Customers extends MY_Controller
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
	| MODULE: 			Customers
	| -----------------------------------------------------
	| This is Customers module controller file.
	| -----------------------------------------------------
	**/
	function __construct()
	{
		parent::__construct();
       
		// Load MongoDB library instead of native db driver if required

		$this->config->item('use_mongodb', 'ion_auth') ? $this->load->library('mongo_db') : $this->load->database();
        
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        
		$this->lang->load('auth');
        
		
        check_access('admin');
        	
	}

	/**
     * Customers list
     *
     *
     * @return array
    **/ 
	function index()
	{
		$this->data['ajaxrequest'] = array(
			'url' => site_url().'customers/ajax_get_list',
			'disablesorting' => '0,6',
		);
		
		$this->data['css_type']     = array('datatable');
		
		$this->data['active_class'] = "users";
		
		$this->data['message'] 		= $this->session->flashdata('message');
		$this->data['title'] 	    = $this->lang->line('customers');
		$this->data['content'] 		= "admin/customers/customers";
		$this->_render_page(TEMPLATE_ADMIN, $this->data);	
		
	}
    
    /**
     * Customers list
     *
     *
     * @return array
    **/
    function ajax_get_list()
    {
		if($this->input->is_ajax_request())
		{
			// return false;
			$data = array();
			$no = $_POST['start'];

			$conditions = array();

			$columns = array('u.username','u.email','u.phone','u.active','u.first_name','u.last_name','u.date_of_registration');	
			
			$query 	= "SELECT u.* FROM ".TBL_PREFIX.TBL_USERS." u INNER JOIN ".TBL_PREFIX.TBL_USERS_GROUPS." ug on u.id=ug.user_id where ug.group_id=2";
			
           
            
			$records = $this->base_model->get_datatables($query, 'customnew', $conditions, $columns, array('id'=>'desc'));
			
            
            
			if(!empty($records)) {

				foreach($records as $record)
				{
					$no++;
					$row = array();

					$row[] = '<input id="checkbox-'.$record->id.'" class="checkbox-custom checkbox_class" name="ids[]" type="checkbox" onclick="javascript:deselectall_check(\'selectall\')" value="'.$record->id.'">';
                    
					$row[] = '<span>'.$record->username.'</span>';
					
                    $row[] = '<span>'.$record->email.'</span>';
                    
                    $row[] = '<span>'.$record->phone.'</span>';
                    
                    $row[] = '<span>'.get_date($record->date_of_registration).'</span>';
                  
                  
					$checked    = '';
					$class      = 'badge danger';
                    $status     ='Inactive';
                    
					if ($record->active ==1) {
						$checked    = ' checked';
						$class      = 'badge success';
                        $status     = 'Active';
					}
					$row[] = '<span class="'.$class.'">'.$status.'</span>';
					
					
					
					$str = '';
					
				
					$str .= '<a data-toggle="modal" class="btn btn-danger" data-target="#deletemodal" onclick="delete_record('.$record->id . ',\''.site_url().'customers/delete_record'.'\')">
						<i class="fa fa-trash" data-toggle="tooltip" data-placement="left" title="Remove"></i>
					</a>';
                    
                    
                    $str .= '<div class="digiCrud">
				  <div class="slideThree slideBlue">
					
					<input type="checkbox" value="' . $record->id . '" id="status_' . $record->id . '" name="check_' . $record->id . '" onclick="statustoggle(this, \'' .  site_url().'customers/statustoggle' .'\')"'.$checked . '/>
					<label for="status_' . $record->id . '"></label>
				  </div>
				</div>';
					
                
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
     * Add/Edit Customer
     *
     *
     * @return boolean
    **/
    function add_customer()
    {
        check_access('admin');
        
		if(isset($_POST['add_customer']))
		{
			
			$this->check_isdemo(site_url().'customers');
				
			$msg='';
			$status=0;
            
			$tables = $this->config->item('tables', 'ion_auth');
            
            
			$this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required|xss_clean');
			$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required|xss_clean');
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
			$this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'required|xss_clean|min_length[9]|max_length[30]');
			$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[confirm_password]');
			$this->form_validation->set_rules('confirm_password', $this->lang->line('create_user_validation_password_confirm_label'), 'required');
			
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			
			
			if($this->form_validation->run() == TRUE) 
			{
				$username = $this->input->post('first_name').' '.$this->input->post('last_name');
                
				$email 				= strtolower($this->input->post('email'));
				$password 			= $this->input->post('password');
                
				$additional_data    = array(
                'first_name'    => $this->input->post('first_name') ,
				'last_name'     => $this->input->post('last_name') ,
				'phone'         => $this->input->post('phone') ,
				'active'        => $this->input->post('status') ,
				'date_of_registration' => date('Y-m-d'));
                
                
				$group 	= array('group_id' => '2');
                
				
                $id = $this->ion_auth->register($username, $password, $email, $additional_data, $group);
                if($id)
                {
                   $msg .= strip_tags($this->ion_auth->messages());
                   $status=0;
                }
                else
                {
                   $msg .= strip_tags($this->ion_auth->messages());
                   $status=1;
                }
				
				
				if($msg != '')
					$this->prepare_flashmessage($msg, $status);
					redirect(site_url().'customers', REFRESH);
			}
		}
		
		$pagetitle = $this->lang->line('add_customer');
		
		$this->data['css_type']      = array('form');
		$this->data['title']	     = $pagetitle;
		
		$this->data['active_class']  = "users";
		$this->data['content'] 		 = 'admin/customers/addedit';
		$this->_render_page(TEMPLATE_ADMIN, $this->data);
    }
    
    /**
     * Delete Customer
     *
     *
     * @return boolean
    **/
    function delete_record()
    {	
		if (!DEMO) {
            
            $id = $this->input->post('id');
            if(!empty($id))
            {			
                $ids = explode(',', $id);
                $details = $this->base_model->fetch_records_from_in(TBL_USERS, 'id', $ids);
                
                if(!empty($details))
                {
                    
                    if ($this->base_model->delete_record_in(TBL_USERS, 'id', $ids)) {
                        
                       $msg = $this->lang->line('delete_success');
                        
                       echo json_encode(array('status' => 1, 'message' => $msg, 'action' => 'success','details'=>$details));
                    
                    } else {
                        
                        $msg = $this->lang->line('delete_failed');
                        
                        echo json_encode(array('status' => 0, 'message' => $msg, 'action' => 'failed'));
                    }
                    
                    
                }
                else
                {
                    $msg = $this->lang->line('MSG_WRONG_OPERATION');
                    echo json_encode(array('status' => 0, 'message' => $msg, 'action' => 'failed'));
                }
            }
            else
            {
                $msg = $this->lang->line('MSG_WRONG_OPERATION');
                
                echo json_encode(array('status' => 0, 'message' => $msg, 'action' => 'failed'));
            }
            
  } else {						
            $msg = 'Access Denied on demo server';				
            echo json_encode(array('status' => 0, 'message' => $msg, 'action' => 'failed'));		
  }
    }
    
    /**
     * Change status of Customer
     *
     *
     * @return boolean
    **/
    function statustoggle()
    {
		if (!DEMO) {
            
            if($this->input->post())
            {
                $id = $this->input->post('id');
                $term_status = $this->input->post('status');
                $filedata = array();
                $message = '';
                if($term_status == 'false')
                {
                    $filedata['active'] = 0;
                    $message = $this->lang->line('MSG_DEACTIVATED');
                }
                else
                {
                    $filedata['active'] = 1;				
                    $message = $this->lang->line('MSG_ACTIVATED');
                }	
                $this->base_model->update_operation_in( $filedata, TBL_USERS, 'id', explode(',', $id) );
                echo json_encode(array('status' => 1, 'message' => $message, 'action' => 'success'));
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
}
