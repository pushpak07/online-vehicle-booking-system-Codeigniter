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
 * @category  Vehicles
 * @package   DOVBSV2
 * @author    DOVBSV2 <digitalvidhya4u@gmail.com>
 * @copyright 2017 - 2018, DOVBSV2
 * @license   http://opensource.org/licenses/MIT    MIT License
 * @link      http://codeigniter.com
 * @since     Version 1.0.0
 */
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * CodeIgniter Vehicles Class
 * 
 * Vehicles.
 *
 * @category  Vehicles
 * @package   DOVBSV2
 * @author    DOVBSV2 <digitalvidhya4u@gmail.com>
 * @copyright 2017 - 2018, DOVBSV2
 * @license   http://opensource.org/licenses/MIT    MIT License
 * @link      http://codeigniter.com
 */
class Vehicles extends MY_Controller
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
	| MODULE: 			Vehicles
	| -----------------------------------------------------
	| This is Vehicles module controller file.
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
     * Vehicles list
     *
     *
     * @return array
    **/ 
	function index()
	{
		$this->data['ajaxrequest'] = array(
			'url' => site_url().'vehicles/ajax_get_list',
			'disablesorting' => '0,7',
		);
		
		$this->data['css_type']     = array('datatable');
		
		$this->data['active_class'] = "vehicle";
		
		$this->data['message'] 		= $this->session->flashdata('message');
		$this->data['title'] 	    = $this->lang->line('vehicles');
		$this->data['content'] 		= "admin/settings/vehicles/n_vehicles";
		$this->_render_page(TEMPLATE_ADMIN, $this->data);	
	}

    /**
     * Vehicles list
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

			$columns = array('v.name','v.fuel_type','v.cost_type','v.status','c.category');	
			
			$query 	= "SELECT v.*,c.category from ".TBL_PREFIX.TBL_VEHICLE." v  left join ".TBL_PREFIX.TBL_VEHICLE_CATEGORIES." c on v.category_id=c.id WHERE 1=1 ";
			
			$records = $this->base_model->get_datatables($query, 'customnew', $conditions, $columns, array('id'=>'desc'));
			
            
			if(!empty($records)) {

				foreach($records as $record)
				{
                    $img = '<img class="img-responsive vehicle-img" src="'.get_vehicle_image($record->image).'" alt="Vehicle Image">';
                        
                    
					$no++;
					$row = array();

					$row[] = '<input id="checkbox-'.$record->id.'" class="checkbox-custom checkbox_class" name="ids[]" type="checkbox" onclick="javascript:deselectall_check(\'selectall\')" value="'.$record->id.'">';
                    
                    
                    $row[] = '<span>'.$img.'</span>';
                    
					$row[] = '<span>'.$record->name.'</span>';
					
                    $row[] = '<span>'.$record->category.'</span>';
                    
                    $row[] = '<span>'.$record->fuel_type.'</span>';
                    
                    $row[] = '<span>'.$record->cost_type.'</span>';
                    
                    
					$checked = '';
					$class = 'badge danger';
					if($record->status == 'Active'){
						$checked = ' checked';
						$class = 'badge success';	
					}
					$row[] = '<span class="'.$class.'">'.$record->status.'</span>';
					
                    
					$dta = '<div class="table-action">';


					$dta .= '<div class="digiCrud">
				  <div class="slideThree slideBlue">
					
					<input type="checkbox" value="' . $record->id . '" id="status_' . $record->id . '" name="check_' . $record->id . '" onclick="statustoggle(this, \'' .  site_url().'vehicles/statustoggle' .'\')"'.$checked . '/>
					<label for="status_' . $record->id . '"></label>
				  </div>
				</div>';


					$dta .= '<span> ';
                    $dta .= '<a href="'.site_url().'vehicle_settings/vehicles/Edit/'.$record->id.'" class="'.CLASS_EDIT_BTN.'" title="Edit Vehicle"><i class="'.CLASS_ICON_EDIT.'" ></i></a>';
					$dta .= '</span>';
					
					$str = $dta;
					
				
					$str .= '<a data-toggle="modal" class="btn btn-danger" title="Delete Vehicle" data-target="#deletemodal" onclick="delete_record('.$record->id . ',\''.site_url().'vehicles/delete_record'.'\')">
						<i class="fa fa-trash" data-toggle="tooltip" data-placement="left" title="Delete Vehicle"></i>
					</a>';
                    

				$str .= '</div>';
					
                
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
     * Delete Vehicle
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
                $details = $this->base_model->fetch_records_from_in(TBL_VEHICLE, 'id', $ids);
                
                if(!empty($details))
                {
                    
                    if ($this->base_model->delete_record_in(TBL_VEHICLE, 'id', $ids)) {
                        
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
     * Change status of Vehicle
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
                $this->base_model->update_operation_in( $filedata, TBL_VEHICLE, 'id', explode(',', $id) );
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
