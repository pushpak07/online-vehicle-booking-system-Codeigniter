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
 * @category  Airports
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
 * Drivers.
 *
 * @category  Drivers
 * @package   DOVBSV2
 * @author    DOVBSV2 <digitalvidhya4u@gmail.com>
 * @copyright 2017 - 2018, DOVBSV2
 * @license   http://opensource.org/licenses/MIT    MIT License
 * @link      http://codeigniter.com
 */
class Drivers extends MY_Controller
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
	| MODULE: 			Drivers
	| -----------------------------------------------------
	| This is Drivers module controller file.
	| -----------------------------------------------------
	**/
	function __construct()
	{
		parent::__construct();
        
		
		// Load MongoDB library instead of native db driver if required

		$this->config->item('use_mongodb', 'ion_auth') ? $this->load->library('mongo_db') : $this->load->database();
        
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth') , $this->config->item('error_end_delimiter', 'ion_auth'));
        
		$this->lang->load('auth');
        
        check_access('admin');
        	
	}

	/**
     * Drivers list
     *
     *
     * @return array
    **/ 
	function index()
	{
		$this->data['ajaxrequest'] = array(
			'url' => site_url().'drivers/ajax_get_list',
			'disablesorting' => '0,6',
		);
		
		$this->data['css_type']     = array('datatable');
		
		$this->data['active_class'] = "users";
		
		$this->data['message'] 		= $this->session->flashdata('message');
		$this->data['title'] 	    = $this->lang->line('drivers');
		$this->data['content'] 		= "admin/drivers/drivers";
		$this->_render_page(TEMPLATE_ADMIN, $this->data);	
		
	}
    
    /**
     * Drivers list
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

			$columns = array('u.username','u.email','u.phone','u.active','u.first_name','u.last_name');	
			
			$query 	= "SELECT u.* FROM ".TBL_PREFIX.TBL_USERS." u INNER JOIN ".TBL_PREFIX.TBL_USERS_GROUPS." ug on u.id=ug.user_id where ug.group_id=4";
			
           
			$records = $this->base_model->get_datatables($query, 'customnew', $conditions, $columns, array('id'=>'desc'));
			
            
			if(!empty($records)) {

				foreach($records as $record)
				{
                    $drivr_license='';
                    if ($record->license!='' && file_exists(DRIVER_LICENSE_UPLOAD_PATH_URL.$record->license)) {
                        
                        $drivr_license=get_driver_license($record->license);
                        
                    }
                   
                   
					$no++;
                    
					$row = array();
                    

					$row[] = '<input id="checkbox-'.$record->id.'" class="checkbox-custom checkbox_class" name="ids[]" type="checkbox" onclick="javascript:deselectall_check(\'selectall\')" value="'.$record->id.'">';
                    
                    
					$row[] = '<span> <img src="'.get_user_image($record->image).'" alt="Driver Photo" class="img-responsive">'.$record->username.'</span>';
					
                    $row[] = '<span>'.$record->email.'</span>';
                    
                    $row[] = '<span>'.$record->phone.'</span>';
                    
                    
                    if ($drivr_license!='') {
                    
                    $row[] = '<span onclick="license(\''.$drivr_license.'\')" > <img src="'.$drivr_license.'" alt="Driver License" class="img-responsive"> </span>';
                    
                    
                    
                    } else {
                        
                        $row[]='';
                        
                    }
                    
                    
					$checked    = '';
					$class      = 'badge danger';
                    $status     ='Inactive';
                    
					if ($record->active ==1) {
						$checked    = ' checked';
						$class      = 'badge success';
                        $status     = 'Active';
					}
					$row[] = '<span class="'.$class.'">'.$status.'</span>';
					
					
					
					$dta ='';
					$dta .= '<span>';
					$dta .= form_open(site_url().'drivers/edit_driver');
					$dta .= '<input type="hidden" name="id" value="'.$record->id.'">';
					$dta .= '<button type="submit" name="edit_record" class="'.CLASS_EDIT_BTN.'"><i class="'.CLASS_ICON_EDIT.'" ></i></button>';
					$dta .= form_close();
					$dta .= '</span>';
					
					$str = $dta;
					
				
					$str .= '<a data-toggle="modal" class="btn btn-danger" data-target="#deletemodal" onclick="delete_record('.$record->id . ',\''.site_url().'drivers/delete_record'.'\')">
						<i class="fa fa-trash" data-toggle="tooltip" data-placement="left" title="Remove"></i>
					</a>';
                    
                    
                    $str .= '<div class="digiCrud">
				  <div class="slideThree slideBlue">
					
					<input type="checkbox" value="' . $record->id . '" id="status_' . $record->id . '" name="check_' . $record->id . '" onclick="statustoggle(this, \'' .  site_url().'drivers/statustoggle' .'\')"'.$checked . '/>
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
     * Add/Edit Driver
     *
     *
     * @return boolean
    **/ 
    function add_driver()
	{
        check_access('admin');
        
		if(isset($_POST['add_driver']))
		{
			if(DEMO) 
			{
				$this->prepare_flashmessage($this->lang->line('CRUD_operations_disabled_in_DEMO_version'), 2);
				redirect(site_url().'drivers', REFRESH);
			}
				
			$msg='';
			$status=0;
            
			$tables = $this->config->item('tables', 'ion_auth');
            
            
			$this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'),'required|xss_clean');
            
			$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label') ,'xss_clean');
            
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label') , 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
            
			$this->form_validation->set_rules('phone',$this->lang->line('create_user_validation_phone_label') ,'required|xss_clean|min_length[9]|max_length[30]');
            
			$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label') , 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[confirm_password]');
            
			$this->form_validation->set_rules('confirm_password', $this->lang->line('create_user_validation_password_confirm_label') , 'required');
			
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			
			
			if($this->form_validation->run() == true) 
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
                
				$group 	= array('group_id' => '4');
                
				
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
					$this->prepare_flashmessage($msg,$status);
					redirect(site_url().'drivers',REFRESH);
			}
		}
		
		$pagetitle = $this->lang->line('add_driver');
		
		$this->data['css_type']      = array('form');
		$this->data['title']	     = $pagetitle;
		
		$this->data['active_class']  = "users";
		$this->data['content'] 		 = 'admin/drivers/add_driver';
		$this->_render_page(TEMPLATE_ADMIN, $this->data);
	}
    
    /**
     * Add/Edit Driver
     *
     *
     * @return boolean
    **/ 
    function edit_driver()
	{
		if(isset($_POST['edit_driver']))
		{
			if(DEMO) 
			{
				$this->prepare_flashmessage($this->lang->line('CRUD_operations_disabled_in_DEMO_version'), 2);
				redirect(site_url().'drivers', REFRESH);
			}
				
			$msg='';
			$status=0;
			
			$this->form_validation->set_rules('first_name', 'First Name', 'xss_clean|trim|required');
			$this->form_validation->set_rules('last_name', 'Last Name', 'xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'xss_clean|trim|required');
			$this->form_validation->set_rules('phone', 'Phone', 'xss_clean|trim|required|min_length[9]|max_length[30]');
			$this->form_validation->set_rules('status', 'Status', 'xss_clean');
			
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			
			$user_id = $this->input->post('id');
			
			if($this->form_validation->run() == true) 
			{
				$data = array();
				
				$data['first_name']  = $this->input->post('first_name');
				$data['last_name']   = $this->input->post('last_name');
				$data['email']		 = $this->input->post('email');
				$data['phone']		 = $this->input->post('phone');
				$data['active']		 = $this->input->post('status');
				
                
                
				if($this->input->post('id') > 0)
				{
					$where['id'] = $this->input->post('id');
					if($this->base_model->update_operation($data,TBL_USERS,$where))
					{
                        unset($data);
						$msg .= $this->lang->line('details_saved_successfully');
						$status = 0;
                        
                        
                        //IMAGES
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
						$msg .= $this->lang->line('details_not_saved');
						$status = 1;
					}
				} else {
                    
                    $msg .= $this->lang->line('MSG_WRONG_OPERATION');
					$status = 0;
                }
				
				$this->prepare_flashmessage($msg,$status);
				redirect(site_url().'drivers',REFRESH);
			}
		}
		
		
		
		$pagetitle = $this->lang->line('edit_driver');
		if(isset($_POST['edit_record']))
		{
			$id = $this->input->post('id');
			if($id > 0)
			{
				$record = $this->base_model->fetch_records_from(TBL_USERS,array('id' => $id));
				if(empty($record)) 
				{
					$this->prepare_flashmessage($this->lang->line('no_details_found'), 2);
					redirect(site_url().'drivers');				
				}
				
				$this->data['record'] =	$record[0];
			}
			else
				redirect(site_url().'drivers');
		}
		
		
		$this->data['css_type']      = array('form');
		$this->data['title']	     = $pagetitle;
		
		$this->data['active_class']  = "users";
		$this->data['content'] 		 = 'admin/drivers/edit_driver';
		$this->_render_page(TEMPLATE_ADMIN, $this->data);
	}
    
    /**
     * Delete Driver
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
                    
                    if ($this->base_model->delete_record_in(TBL_USERS, 'id',$ids)) {
                        
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
     * Change status of Driver
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
?>