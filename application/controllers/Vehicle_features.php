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
 * @category  Vehicle Features
 * @package   DOVBSV2
 * @author    DOVBSV2 <digitalvidhya4u@gmail.com>
 * @copyright 2017 - 2018, DOVBSV2
 * @license   http://opensource.org/licenses/MIT    MIT License
 * @link      http://codeigniter.com
 * @since     Version 1.0.0
 */
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * CodeIgniter Vehicle Features Class
 * 
 * Vehicle Features.
 *
 * @category  Vehicle_Features
 * @package   DOVBSV2
 * @author    DOVBSV2 <digitalvidhya4u@gmail.com>
 * @copyright 2017 - 2018, DOVBSV2
 * @license   http://opensource.org/licenses/MIT    MIT License
 * @link      http://codeigniter.com
 */
class Vehicle_features extends MY_Controller
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
	| MODULE: 			Vehicle_features
	| -----------------------------------------------------
	| This is Vehicle_features module controller file.
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
     * Vehicle features list
     *
     *
     * @return array
    **/ 
	function index()
	{
		$this->data['ajaxrequest'] = array(
			'url' => site_url().'vehicle_features/ajax_get_list',
			'disablesorting' => '0,3',
		);
		
		$this->data['css_type']     = array('datatable');
		
		$this->data['active_class'] = "vehicle";
		
		$this->data['message'] 		= $this->session->flashdata('message');
		$this->data['title'] 	    = $this->lang->line('vehicle_features');
		$this->data['content'] 		= "admin/vehicle_features/vehicle_features";
		$this->_render_page(TEMPLATE_ADMIN, $this->data);	
		
	}
    
    /**
     * Vehicle features list
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

			$columns = array('features','status');	
			
			$query 	= "SELECT * from ".TBL_PREFIX.TBL_FEATURES." WHERE id!=''";
			
			$records = $this->base_model->get_datatables($query, 'customnew', $conditions, $columns, array('id'=>'desc'));
			
            
			if(!empty($records)) {

				foreach($records as $record)
				{
					$no++;
					$row = array();

					$row[] = '<input id="checkbox-'.$record->id.'" class="checkbox-custom checkbox_class" name="ids[]" type="checkbox" onclick="javascript:deselectall_check(\'selectall\')" value="'.$record->id.'">';
                    
					$row[] = '<span>'.$record->features.'</span>';
					
					$checked = '';
					$class = 'badge danger';
					if($record->status == 'Active'){
						$checked = ' checked';
						$class = 'badge success';	
					}
					$row[] = '<span class="'.$class.'">'.$record->status.'</span>';
					
					$dta ='';
					$dta .= '<span>';
					$dta .= form_open(site_url().'vehicle_features/addedit');
					$dta .= '<input type="hidden" name="id" value="'.$record->id.'">';
					$dta .= '<button type="submit" name="edit_record" class="'.CLASS_EDIT_BTN.'"><i class="'.CLASS_ICON_EDIT.'" ></i></button>';
					$dta .= form_close();
					$dta .= '</span>';
					
					$str = $dta;
					
				
					$str .= '<a data-toggle="modal" class="btn btn-danger" data-target="#deletemodal" onclick="delete_record('.$record->id . ',\''.site_url().'vehicle_features/delete_record'.'\')">
						<i class="fa fa-trash" data-toggle="tooltip" data-placement="left" title="Remove"></i>
					</a>';
                    
                    
                    $str .= '<div class="digiCrud">
				  <div class="slideThree slideBlue">
					
					<input type="checkbox" value="' . $record->id . '" id="status_' . $record->id . '" name="check_' . $record->id . '" onclick="statustoggle(this, \'' .  site_url().'vehicle_features/statustoggle' .'\')"'.$checked . '/>
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
     * Add/Edit Vehicle feature
     *
     *
     * @return boolean
    **/ 
    function addedit()
    {
		if(isset($_POST['addedit_vf']))
		{
			$this->check_isdemo(site_url().'vehicle_features');
				
			$msg='';
			$status=0;
			
			$this->form_validation->set_rules('feature', 'Feature', 'xss_clean|required');
			
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			
			$id = $this->input->post('id');
			
			if($this->form_validation->run() == TRUE) 
			{
				$data = array();
				
				$data['features']   = $this->input->post('feature');
				$data['status']		= $this->input->post('status');
				
				if($this->input->post('id') > 0)
				{
					$where['id'] = $this->input->post('id');
					if($this->base_model->update_operation($data, TBL_FEATURES, $where))
					{
						$msg .= $this->lang->line('details_saved_successfully');
						$status = 0;
					}
					else
					{
						$msg .= $this->lang->line('details_not_saved');
						$status = 1;
					}
				}
				else
				{
					$id = $this->base_model->insert_operation_id($data, TBL_FEATURES);
					if($id)
					{
						$msg .= $this->lang->line('details_saved_successfully');
						$status = 0;
					}
					else
					{
						$msg .= $this->lang->line('details_not_saved');
						$status = 1;
					}
				}
				unset($data, $where);
				
				if($msg != '')
					$this->prepare_flashmessage($msg, $status);
					redirect(site_url().'vehicle_features', REFRESH);
			}
		}
		
		$pagetitle = $this->lang->line('add_vehicle_feature');
		if(isset($_POST['edit_record']))
		{
			$id = $this->input->post('id');
			if($id > 0)
			{
				$pagetitle = $this->lang->line('edit_vehicle_feature');
				$record = $this->base_model->fetch_records_from(TBL_FEATURES, array('id' => $id));
				if(empty($record)) 
				{
					$this->prepare_flashmessage($this->lang->line('no_details_found'), 2);
					redirect(site_url().'vehicle_features');				
				}
				
				$this->data['record'] =	$record[0];
			}
			else
				redirect(site_url().'vehicle_features');
		}
		
		
		$this->data['css_type']      = array('form');
		$this->data['title']	     = $pagetitle;
		
		$this->data['active_class']  = "vehicle";   
		$this->data['content'] 		 = 'admin/vehicle_features/addedit';
		$this->_render_page(TEMPLATE_ADMIN, $this->data);
    }
    
    /**
     * Delete Vehicle feature
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
                $details = $this->base_model->fetch_records_from_in(TBL_FEATURES, 'id', $ids);
                
                if(!empty($details))
                {
                    
                    if ($this->base_model->delete_record_in(TBL_FEATURES, 'id', $ids)) {
                        
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
     * Change status of Vehicle feature
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
                    $filedata['status'] = 'Inactive';
                    $message = $this->lang->line('MSG_DEACTIVATED');
                }
                else
                {
                    $filedata['status'] = 'Active';				
                    $message = $this->lang->line('MSG_ACTIVATED');
                }	
                $this->base_model->update_operation_in( $filedata, TBL_FEATURES, 'id', explode(',', $id) );
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
