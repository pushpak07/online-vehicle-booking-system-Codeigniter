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
 * @category  Coupons
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
 * Coupons.
 *
 * @category  Coupons
 * @package   DOVBSV2
 * @author    DOVBSV2 <digitalvidhya4u@gmail.com>
 * @copyright 2017 - 2018, DOVBSV2
 * @license   http://opensource.org/licenses/MIT    MIT License
 * @link      http://codeigniter.com
 */
class Coupons extends MY_Controller
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
	| MODULE: 			Coupons
	| -----------------------------------------------------
	| This is Coupons module controller file.
	| -----------------------------------------------------
	**/
	function __construct()
	{
		parent::__construct();
       
		// Load MongoDB library instead of native db driver if required
		$this->config->item('use_mongodb', 'ion_auth') ? 
		$this->load->library('mongo_db') : $this->load->database();
		$this->form_validation->set_error_delimiters(
		$this->config->item('error_start_delimiter', 'ion_auth'), 
		$this->config->item('error_end_delimiter', 'ion_auth')
		);
		$this->lang->load('auth');
        
        check_access('admin');
	}
    
    /**
     * Coupons list
     *
     * @param string $param
     * @param string $param1
     * @return array
    **/ 
	public function index($param='',$param1='')
	{
        $this->data['ajaxrequest'] = array(
			'url' => site_url().'coupons/ajax_get_list',
			'disablesorting' => '0,6',
		);
		
		$this->data['css_type']     = array('datatable');
		
		$this->data['active_class'] = "coupons";
		
		$this->data['message'] 		= $this->session->flashdata('message');
		$this->data['title'] 	    = $this->lang->line('coupons');
		$this->data['content'] 		= "admin/coupons/coupons";
		$this->_render_page(TEMPLATE_ADMIN, $this->data);
	}
    
     /**
     * Coupons list
     *
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

			$columns = array('coupon_title','coupon_code','discount_amount','from_date','to_date','status');	
			$query 	 = "SELECT * from ".TBL_PREFIX.TBL_COUPONS." WHERE coupon_id!=''";
			
			$records = $this->base_model->get_datatables($query, 'customnew', $conditions, $columns, array('coupon_id'=>'desc'));
			
            
            
			if(!empty($records)) {

				foreach($records as $record)
				{
					$no++;
					$row = array();

					$row[] = '<input id="checkbox-'.$record->coupon_id.'" class="checkbox-custom checkbox_class" name="ids[]" type="checkbox" onclick="javascript:deselectall_check(\'selectall\')" value="'.$record->coupon_id.'">';
                    
					$row[] = '<span>'.$record->coupon_title.'</span>';
                   
                    $row[] = '<span>'.$record->coupon_code.'</span>';
                    
                    $row[] = '<span>'.$record->discount_amount.'</span>';
                    
                    $row[] = '<span>'.get_date($record->from_date).'</span>';
                    
                    $row[] = '<span>'.get_date($record->to_date).'</span>';
                    
					$checked = '';
					$class = 'badge danger';
					if($record->status == 'Active'){
						$checked = ' checked';
						$class = 'badge success';	
					}
					$row[] = '<span class="'.$class.'">'.$record->status.'</span>';
					
                    
					$dta ='';
					$dta .= '<span>';
					$dta .= form_open(site_url().'coupons/addedit');
					$dta .= '<input type="hidden" name="coupon_id" value="'.$record->coupon_id.'">';
					$dta .= '<button type="submit" name="edit_coupon" class="'.CLASS_EDIT_BTN.'"><i class="'.CLASS_ICON_EDIT.'" ></i></button>';
					$dta .= form_close();
					$dta .= '</span>';
					
					$str = $dta;
					
				
					$str .= '<a data-toggle="modal" class="btn btn-danger" data-target="#deletemodal" onclick="delete_record('.$record->coupon_id . ',\''.site_url().'coupons/delete_record'.'\')">
						<i class="fa fa-trash" data-toggle="tooltip" data-placement="left" title="Remove"></i>
					</a>';
					
                     $str .= '<div class="digiCrud">
                      <div class="slideThree slideBlue">
                        
                        <input type="checkbox" value="' . $record->coupon_id . '" id="status_' . $record->coupon_id . '" name="check_' . $record->coupon_id . '" onclick="statustoggle(this, \'' .  site_url().'coupons/statustoggle' .'\')"'.$checked . '/>
                        <label for="status_' . $record->coupon_id . '"></label>
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
     * Add/Edit Coupons
     *
     * 
     * @return array
    **/
    function addedit() 
    {
        
       if (isset($_POST['addedit_coupon']))
	   {
			
			$this->check_isdemo(site_url().'coupons');
				
			$msg='';
			$status=0;
            
			$this->form_validation->set_rules('coupon_title', $this->lang->line('coupon_title'), 'required|xss_clean');
				
            $this->form_validation->set_rules('coupon_code', $this->lang->line('coupon_code'), 'required|xss_clean');
            
            $this->form_validation->set_rules('discount_amount', $this->lang->line('discount_amount'), 'required|xss_clean');
            
            $this->form_validation->set_rules('from_date', $this->lang->line('from_date'), 'required|xss_clean');
            
            $this->form_validation->set_rules('to_date', $this->lang->line('to_date'), 'required|xss_clean|callback__checkdate');
				
            
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			
			$id = $this->input->post('coupon_id');
			
			if($this->form_validation->run() == TRUE) 
			{
				$coupon_data=array();
                $coupon_data['coupon_title']	= $this->input->post('coupon_title');
                $coupon_data['coupon_code']		= $this->input->post('coupon_code');
                $coupon_data['discount_amount']= $this->input->post('discount_amount');

                $from_date=NULL;
                if ($this->input->post('from_date')!='')
                	$from_date = date('Y-m-d', strtotime($this->input->post('from_date')));

                $to_date=NULL;
                if ($this->input->post('to_date')!='')
                	$to_date = date('Y-m-d', strtotime($this->input->post('to_date')));
                

                $coupon_data['from_date']  		= $from_date;
                $coupon_data['to_date']    		= $to_date;

                $coupon_data['status'] 	        = $this->input->post('status');
            
                
				if($this->input->post('coupon_id') > 0)
				{
					$where['coupon_id'] = $this->input->post('coupon_id');
					if($this->base_model->update_operation($coupon_data, TBL_COUPONS, $where))
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
					$id = $this->base_model->insert_operation_id($coupon_data, TBL_COUPONS);
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
                
                
                //SEND SMS
                $sms_users = $this->dvbs_model->get_sms_users();
                if ($this->input->post('send_sms')=='Yes' && $this->config->item('site_settings')->sms_notification=='Yes' && !empty($sms_users)) {
                    
                    $sms_details = $this->base_model->fetch_records_from(TBL_SMS_TEMPLATES, array('subject'=>'send_coupon'));
                    
                    if(!empty($sms_details))
                    {
                        $content = strip_tags($sms_details[0]->sms_template);
                        
                        $content     	= str_replace("__COUPON_CODE__", $this->input->post('coupon_code'), $content);
                        
                        $content     	= str_replace("__DISCOUNT_AMOUNT__", $this->config->item('site_settings')->currency_symbol.$this->input->post('discount_amount'), $content);
                        
                        
                        //USERS
                        
                        foreach ($sms_users as $usr):
                        
                            $mobile_number 	= $usr->phone;
                    
                            sendSMS($mobile_number, $content);
                            
                        endforeach;
                        
                    }
                }
                    
				
				if($msg != '')
					$this->prepare_flashmessage($msg, $status);
					redirect(site_url().'coupons', REFRESH);
			}
       }
		
		
		
		$pagetitle = $this->lang->line('add_coupon');
		if(isset($_POST['edit_coupon']))
		{
			$id = $this->input->post('coupon_id');
			if($id > 0)
			{
				$pagetitle = $this->lang->line('edit_coupon');
				$record = $this->base_model->fetch_records_from(TBL_COUPONS, array('coupon_id' => $id));
				if(empty($record)) 
				{
					$this->prepare_flashmessage($this->lang->line('no_details_found'), 2);
					redirect(site_url().'coupons');				
				}
				
				$this->data['record'] =	$record[0];
			}
			else
				redirect(site_url().'coupons');
		}
		
       
		$this->data['css_type']      = array('form');
		$this->data['title']	     = $pagetitle;
		
		$this->data['active_class']  = "coupons";
		$this->data['content'] 		 = 'admin/coupons/add_coupon';
		$this->_render_page(TEMPLATE_ADMIN, $this->data); 
        	
    }
    
    /**
     *Check Coupon Date
     *
     *
     * @return boolean
    **/ 
    function _checkdate() 
    {
		
		$from_date = $this->input->post('from_date');
        $to_date   = $this->input->post('to_date');
        
		if (strtotime($from_date) > strtotime($to_date)) {
		
            $this->form_validation->set_message('_checkdate', 'Dates are not Valid');
            return FALSE;
		}
		else 
			return TRUE;
    }
    
    /**
     * Delete Coupon Record
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
                $details = $this->base_model->fetch_records_from_in(TBL_COUPONS, 'coupon_id', $ids);
                
                if(!empty($details))
                {
                    
                    if ($this->base_model->delete_record_in(TBL_COUPONS, 'coupon_id', $ids)) {
                        
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
     * Change status of Coupon
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
                $this->base_model->update_operation_in( $filedata, TBL_COUPONS, 'coupon_id', explode(',', $id) );
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
