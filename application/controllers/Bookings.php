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
 * Bookings.
 *
 * @category  Bookings
 * @package   DOVBSV2
 * @author    DOVBSV2 <digitalvidhya4u@gmail.com>
 * @copyright 2017 - 2018, DOVBSV2
 * @license   http://opensource.org/licenses/MIT    MIT License
 * @link      http://codeigniter.com
 */
class Bookings extends MY_Controller
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
	| MODULE: 			Bookings
	| -----------------------------------------------------
	| This is Bookings module controller file.
	| -----------------------------------------------------
	**/
	function __construct()
	{
		parent::__construct();
        
		// Load MongoDB library instead of native db driver if required

		$this->config->item('use_mongodb', 'ion_auth') ? $this->load->library('mongo_db') : $this->load->database();
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
      
        if (!$this->ion_auth->logged_in() || !($this->ion_auth->is_admin() || $this->ion_auth->is_executive())) 
            redirect(SITEURL);
       
	}

    /**
     * Bookings list
     *
     *
     * @return array
    **/ 
	function index()
	{
		$this->data['ajaxrequest'] = array(
			'url' => site_url().'bookings/ajax_get_all_bookings',
			'disablesorting' => '0,10',
		);
		
		$this->data['css_type']     = array('datatable');
		
		$this->data['active_class'] = "bookings";
        $this->data['active_ex_class'] = "all_bookings";
		
		$this->data['message'] 		= $this->session->flashdata('message');
		$this->data['title'] 	    = $this->lang->line('all_bookings');
		$this->data['content'] 		= "admin/bookings/bookings";
		$this->_render_page(getTemplate(), $this->data);	
		
	}
    
    /**
     * Bookings list
     *
     *
     * @return array
    **/ 
    function ajax_get_all_bookings() 
    {
        
        if($this->input->is_ajax_request())
		{
			// return false;
			$data = array();
			$no = $_POST['start'];

			$conditions = array();

			$columns = array('b.booking_ref','b.registered_name','b.bookdate','b.pick_date','b.pick_time','b.pick_point','b.distance','b.distance_type','v.name','b.cost_of_journey','b.is_conformed');	
			
			$query 	= "SELECT b.*,v.name FROM vbs_bookings AS b , vbs_vehicle AS v WHERE b.vehicle_selected = v.id";
			
           
            
			$records = $this->base_model->get_datatables($query, 'customnew', $conditions, $columns, array('b.bookdate'=>'desc'));
			
            
            
			if(!empty($records)) {

				foreach($records as $record)
				{
					$no++;
					$row = array();

					$row[] = $no;
                    
					$row[] = '<span>'.$record->booking_ref.'</span>';
                   
                    $row[] = '<span>'.$record->registered_name.'</span>';
                    
                    $row[] = '<span>'.get_date($record->bookdate).'</span>';
                    
                    $row[] = '<span>'.get_date($record->pick_date).'</span>';
                    
                    $row[] = '<span>'.$record->pick_time.'</span>';
                    
                    $row[] = '<span>'.$this->config->item('site_settings')->currency_symbol.$record->cost_of_journey.'</span>';
                    
                    $class = 'badge warning';
					if ($record->is_conformed == 'confirm')
						$class = 'badge success';	
					else if($record->is_conformed=='pending')
                        $class = 'badge warning';
                    else if($record->is_conformed=='cancelled')
                        $class = 'badge danger';
                                       
                     
					$row[] = '<span class="'.$class.'">'.$record->is_conformed.'</span>';
                    
                    
                    //$row[] = '<span>'.'ACTION'.'</span>';
                    
                    
                    //ACTION
                    $str = '<div class="btn-group">
                              <button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button">
                              <span class="caret"></span></button>
                              <ul class="dropdown-menu menu-drop" role="menu" aria-labelledby="dLabel">';
                              
                    if ($record->is_conformed=="pending" || $record->is_conformed=="cancel") {  
                    
                    $str .= '<li>
                            <a href="javascript:void(0)" onclick="chnage_booking_status('.$record->id . ', \''.'confirm'.'\', \''.site_url().'bookings/change_status'.'\')" >'.$this->lang->line('confirm').'</a>
                            </li>';

                         
                             
                    } if ($record->is_conformed=="pending" || $record->is_conformed=="confirm") {        
                                 
                    $str .= '<li>
                            <a href="javascript:void(0)" onclick="chnage_booking_status('.$record->id . ', \''.'cancel'.'\', \''.site_url().'bookings/change_status'.'\')" >'.$this->lang->line('cancel').'</a>
                            </li>';             
                                 
                    }          
                                 
                    $str .= '<li>
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#deletemodal" onclick="delete_record('.$record->id . ',\''.site_url().'bookings/delete_booking'.'\')">'.$this->lang->line('delete').'</a>
                             </li> 
                             
                             
                            
                             
                             <li>
                             <a href="'.site_url().'bookings/view_details/'.$record->id.'">'.$this->lang->line('view_details').'</a>
                             </li>
                             
                             
                             </ul>
                           </div>';
                    //ACTION
                    
                    $row[] = $str;
                    
                    $row[] = '<span>'.$record->pick_point.'</span>';
                    
                    $row[] = '<span>'.$record->drop_point.'</span>';
                    
                    
					$row[] = '<span>'.$record->distance.$record->distance_type.'</span>';
                    
                    
                    $row[] = '<span>'.$record->name.'</span>';
                    
                    
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
     * Add Booking
     *
     *
     * @return boolean
    **/ 
	function add_booking() 
 {
        
        if (isset($_POST['add_booking'])) {
            
           

            $this->check_isdemo(site_url().'bookings/add_booking');
        
            
            $this->form_validation->set_rules('pick_date', 'Pickup Date', 'xss_clean|required');
            $this->form_validation->set_rules('time_picker', 'Pick Time', 'required|xss_clean');
            $this->form_validation->set_rules('local_pick', 'Source', 'required|xss_clean');
            $this->form_validation->set_rules('local_drop', 'Destination', 'required|xss_clean');
            $this->form_validation->set_rules('distance', 'Distance', 'xss_clean');
            $this->form_validation->set_rules('radiog_dark', 'Select Car', 'required|xss_clean');
            $this->form_validation->set_rules('payment_mode', 'Payment Mode', 'xss_clean');
            $this->form_validation->set_rules('status', 'Status', 'xss_clean');
            
            $this->form_validation->set_rules(
													'customer_name',
													'Customer Name', 
													'required|xss_clean'
												  );
												  
            $this->form_validation->set_rules(
													'customer_phone',
													'Customer Phone',
													'required|xss_clean|min_length[9]|max_length[30]'
												  );
            
            $this->form_validation->set_rules(
													'customer_email', 
													'Customer Email', 
													'valid_email|xss_clean'
												 );
            $this->form_validation->set_rules('total_cost', 'Cost', 'required|xss_clean');
            $this->form_validation->set_rules('booking_ref', 'Cost', 'required|xss_clean');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                                                  
            if ($this->form_validation->run() == TRUE) {
                   
                $inputdata['booking_ref'] 	= $this->input->post('booking_ref');

                $inputdata['pick_date'] 	= date('Y-m-d', strtotime($this->input->post('pick_date')));

                $inputdata['pick_time'] 	= $this->input->post('time_picker');
                $inputdata['pick_point'] 	= $this->input->post('local_pick');
                $inputdata['drop_point'] 	= $this->input->post('local_drop');
                $inputdata['distance'] 		= $this->input->post('total_distance');
                $inputdata['distance_type'] = $this->config->item('site_settings')->distance_type;
                
                
                $inputdata['total_time']    = $this->input->post('total_time');
                
               
                if ($this->input->post('return_journey')=='on') {
                    
                    $inputdata['return_journey']= 'Yes';
                    
                    $inputdata['waiting_time']    = $this->input->post('waitingTime');
                    
                    $inputdata['waiting_cost']    = $this->input->post('waitingCost');
                    
                } else {
                    
                    $inputdata['return_journey']= 'No';
                }
                
                $cab_details = explode('_', $this->input->post('radiog_dark'));
                $inputdata['vehicle_selected'] 	= $cab_details[0];

                $inputdata['cost_of_journey'] 	= $this->input->post('total_cost');

                $inputdata['only_booking_cost'] = $this->input->post('total_cost');

                $inputdata['payment_type'] 		= $this->input->post('payment_mode');
                $inputdata['is_conformed'] 		= $this->input->post('status');
                $inputdata['registered_name'] 	= $this->input->post('customer_name');
                $inputdata['phone'] 		= $this->input->post('customer_phone');
                $inputdata['email'] 		= $this->input->post('customer_email');
                $inputdata['bookdate'] 		= date('Y-m-d');


                $inputdata['tax_applied']  = 'No';
                $inputdata['tax_amount']    = NULL;

                $inputdata['coupon_applied']    = 'No';
                $inputdata['coupon_code']       = NULL;
                $inputdata['coupon_discount_amount'] = NULL;


                
                $table_name 				= "bookings";
                
                if ($this->base_model->insert_operation($inputdata, $table_name)) {
                    
                    $this->prepare_flashmessage($this->lang->line('admin_booking_message'), 0);
                }
                else {
                    $this->prepare_flashmessage($this->lang->line('unable_to_book'), 1);
                    
                }
                
                redirect(site_url().'bookings', 'refresh');
            }

            
                
        }
        
        
        $waiting_options = $this->dvbs_model->get_waiting_options();
            $this->data['waiting_options'] 		= $waiting_options;

            
        $this->data['gmaps'] 				= "true";
        $this->data['css_type'] 			= array('form');
        $this->data['title'] 				= $this->lang->line('add_booking');
        $this->data['active_class'] 		= "bookings";
        
        $this->data['active_ex_class']      = "add_booking";

        $this->data['content'] 				= "admin/bookings/add_booking";
        
        $this->_render_page(getTemplate(), $this->data);	
 }
   
    /**
     * Delete Booking
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
                $details = $this->base_model->fetch_records_from_in(TBL_FAQS, 'id', $ids);
                
                if(!empty($details))
                {
                    
                    if ($this->base_model->delete_record_in(TBL_FAQS, 'id', $ids)) {
                        
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
     * Today Bookings
     *
     *
     * @return array
    **/ 
    function today_bookings()
    {
		$this->data['ajaxrequest'] = array(
			'url' => site_url().'bookings/ajax_get_today_bookings',
			'disablesorting' => '0,10',
		);
		
		$this->data['css_type']     = array('datatable');
		
		$this->data['active_class'] = "bookings";
		
        $this->data['active_ex_class'] = "today_bookings";

		$this->data['message'] 		= $this->session->flashdata('message');
		$this->data['title'] 	    = $this->lang->line('today_bookings');
		$this->data['content'] 		= "admin/bookings/bookings";
		$this->_render_page(getTemplate(), $this->data);	
		
    }
    
    /**
     * Today Bookings
     *
     *
     * @return array
    **/ 
    function ajax_get_today_bookings() 
    {
        
        if($this->input->is_ajax_request())
		{
            $today 	= date("Y-m-d");
            
			// return false;
			$data = array();
			$no = $_POST['start'];

			$conditions = array();

			$columns = array('b.booking_ref','b.registered_name','b.bookdate','b.pick_date','b.pick_time','b.pick_point','b.distance','b.distance_type','v.name','b.cost_of_journey','b.is_conformed');	
			
			$query 	= "SELECT b.*,v.name FROM vbs_bookings AS b, vbs_vehicle AS v WHERE b.vehicle_selected = v.id AND  b.bookdate = '".$today."' ";
			
           
            
			$records = $this->base_model->get_datatables($query, 'customnew', $conditions, $columns, array('b.bookdate'=>'desc'));
			
            
            
			if(!empty($records)) {

				foreach($records as $record)
				{
					$no++;
					$row = array();

					$row[] = $no;
                    
					$row[] = '<span>'.$record->booking_ref.'</span>';
                   
                    $row[] = '<span>'.$record->registered_name.'</span>';
                    
                    $row[] = '<span>'.get_date($record->bookdate).'</span>';
                    
                    $row[] = '<span>'.get_date($record->pick_date).'</span>';
                    
                    $row[] = '<span>'.$record->pick_time.'</span>';
                    
                    $row[] = '<span>'.$this->config->item('site_settings')->currency_symbol.$record->cost_of_journey.'</span>';
                    
                    $class = 'badge warning';
					if ($record->is_conformed == 'confirm')
						$class = 'badge success';	
					else if($record->is_conformed=='pending')
                        $class = 'badge warning';
                    else if($record->is_conformed=='cancelled')
                        $class = 'badge danger';
                                       
                     
					$row[] = '<span class="'.$class.'">'.$record->is_conformed.'</span>';
                    
                    
                    // $row[] = '<span>'.'ACTION'.'</span>';
                    
                     //ACTION
                    $str = '<div class="btn-group">
                              <button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button">
                              <span class="caret"></span></button>
                              <ul class="dropdown-menu menu-drop" role="menu" aria-labelledby="dLabel">';
                              
                    if ($record->is_conformed=="pending" || $record->is_conformed=="cancel") {  
                    
                    $str .= '<li>
                            <a onclick="chnage_booking_status('.$record->id . ', \''.'confirm'.'\', \''.site_url().'bookings/change_status'.'\')" >'.$this->lang->line('confirm').'</a>
                            </li>';

                         
                             
                    } if ($record->is_conformed=="pending" || $record->is_conformed=="confirm") {        
                                 
                    $str .= '<li>
                            <a onclick="chnage_booking_status('.$record->id . ', \''.'cancel'.'\', \''.site_url().'bookings/change_status'.'\')" >'.$this->lang->line('cancel').'</a>
                            </li>';             
                                 
                    }          
                                 
                    $str .= '<li>
                                <a data-toggle="modal" data-target="#deletemodal" onclick="delete_record('.$record->id . ',\''.site_url().'bookings/delete_booking'.'\')">'.$this->lang->line('delete').'</a>
                             </li> 
                             
                             
                            
                             
                             <li>
                             <a href="'.site_url().'bookings/view_details/'.$record->id.'">'.$this->lang->line('view_details').'</a>
                             </li>
                             
                             
                             </ul>
                           </div>';
                    //ACTION
                    
                    $row[] = $str;
                    
                    $row[] = '<span>'.$record->pick_point.'</span>';
                    
                    $row[] = '<span>'.$record->drop_point.'</span>';
                    
                    
					$row[] = '<span>'.$record->distance.$record->distance_type.'</span>';
                    
                    
                    $row[] = '<span>'.$record->name.'</span>';
                    
                    
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
     * Search Bookings
     *
     *
     * @return array
    **/ 
    function search_bookings()
    {
		$this->data['css_type']     = array('form');
		
		$this->data['active_class'] = "bookings";

        $this->data['active_ex_class'] = "search_bookings";
		
		$this->data['message'] 		= $this->session->flashdata('message');
		$this->data['title'] 	    = $this->lang->line('search_bookings');
		$this->data['content'] 		= "admin/bookings/search_bookings";
		$this->_render_page(getTemplate(), $this->data);
    }
    
    /**
     * Search Bookings
     *
     *
     * @return array
    **/ 
    function get_search_bookings() 
    {
        
        if (isset($_POST['search_bookings'])) {

            $this->check_isdemo(site_url().'bookings/search_bookings');
            
            $this->form_validation->set_rules('from_date', 'From Date', 'xss_clean|required');
			$this->form_validation->set_rules('to_date', 'To Date', 'xss_clean|required|callback__checkdate');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
           
            if ($this->form_validation->run() == TRUE) {
                
                $fromdate 	= $this->input->post('from_date');
				$todate 	= $this->input->post('to_date');
                
				if (strtotime($fromdate) > strtotime($todate)) {
                    
                    $this->prepare_flashmessage("Invalid Input", 1);
                    redirect(site_url().'bookings/search_bookings');
                    
				} else {

                    $fromdate = date('Y-m-d', strtotime($fromdate));
                    $todate = date('Y-m-d', strtotime($todate));
                    
                    $params = array('from_date'=>$fromdate,'to_date'=>$todate);
                  
                    $this->data['ajaxrequest'] = array(
                        'url'               => site_url().'bookings/ajax_get_search_bookings',
                        'disablesorting'    => '0,10',
                        'params'            =>  $params
                    );
                    
                    $this->data['css_type']     = array('datatable');
                    
                    $this->data['active_class'] = "bookings";
                    
                    $this->data['message'] 		= $this->session->flashdata('message');
                    $this->data['title'] 	    = $this->lang->line('search_bookings');
                    $this->data['content'] 		= "admin/bookings/bookings";
                    $this->_render_page(getTemplate(), $this->data);	
    }
            } else {
                $this->prepare_flashmessage(strip_tags(validation_errors()), 1);
                redirect(site_url().'bookings/search_bookings');
            }
            
        } else 
            redirect(site_url().'bookings/search_bookings');
    }
    
    /**
     * Check valid dates of search Booking
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
     * Search Bookings
     *
     *
     * @return array
    **/ 
    function ajax_get_search_bookings() 
    {
        
        if($this->input->is_ajax_request())
		{
            
            $fromdate   =$this->input->post('from_date');
            $todate     =$this->input->post('to_date');
            
            
			// return false;
			$data = array();
			$no = $_POST['start'];

			$conditions = array();

			$columns = array('b.booking_ref','b.registered_name','b.bookdate','b.pick_date','b.pick_time','b.pick_point','b.distance','b.distance_type','v.name','b.cost_of_journey','b.is_conformed');	
			
			$query 	= "SELECT b.*,v.name FROM vbs_bookings AS b, vbs_vehicle AS v WHERE b.vehicle_selected = v.id AND bookdate BETWEEN '" . $fromdate . " 'AND' " . $todate . " ' ";
			
           
            
			$records = $this->base_model->get_datatables($query, 'customnew', $conditions, $columns, array('b.bookdate'=>'desc'));
			
            
            
			if(!empty($records)) {

				foreach($records as $record)
				{
					$no++;
					$row = array();

					$row[] = $no;
                    
					$row[] = '<span>'.$record->booking_ref.'</span>';
                   
                    $row[] = '<span>'.$record->registered_name.'</span>';
                    
                    $row[] = '<span>'.get_date($record->bookdate).'</span>';
                    
                    $row[] = '<span>'.get_date($record->pick_date).'</span>';
                    
                    $row[] = '<span>'.$record->pick_time.'</span>';
                    
                    $row[] = '<span>'.$this->config->item('site_settings')->currency_symbol.$record->cost_of_journey.'</span>';
                    
                    $class = 'badge warning';
					if ($record->is_conformed == 'confirm')
						$class = 'badge success';	
					else if($record->is_conformed=='pending')
                        $class = 'badge warning';
                    else if($record->is_conformed=='cancelled')
                        $class = 'badge danger';
                                       
                     
					$row[] = '<span class="'.$class.'">'.$record->is_conformed.'</span>';
                    
                    
                    // $row[] = '<span>'.'ACTION'.'</span>';
                    
                     //ACTION
                    $str = '<div class="btn-group">
                              <button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button">
                              <span class="caret"></span></button>
                              <ul class="dropdown-menu menu-drop" role="menu" aria-labelledby="dLabel">';
                              
                    if ($record->is_conformed=="pending" || $record->is_conformed=="cancel") {  
                    
                    $str .= '<li>
                            <a onclick="chnage_booking_status('.$record->id . ', \''.'confirm'.'\', \''.site_url().'bookings/change_status'.'\')" >'.$this->lang->line('confirm').'</a>
                            </li>';

                         
                             
                    } if ($record->is_conformed=="pending" || $record->is_conformed=="confirm") {        
                                 
                    $str .= '<li>
                            <a onclick="chnage_booking_status('.$record->id . ', \''.'cancel'.'\', \''.site_url().'bookings/change_status'.'\')" >'.$this->lang->line('cancel').'</a>
                            </li>';             
                                 
                    }          
                                 
                    $str .= '<li>
                                <a data-toggle="modal" data-target="#deletemodal" onclick="delete_record('.$record->id . ',\''.site_url().'bookings/delete_booking'.'\')">'.$this->lang->line('delete').'</a>
                             </li> 
                             
                             
                            
                             
                             <li>
                             <a href="'.site_url().'bookings/view_details/'.$record->id.'">'.$this->lang->line('view_details').'</a>
                             </li>
                             
                             
                             </ul>
                           </div>';
                    //ACTION
                    
                    $row[] = $str;
                    
                    $row[] = '<span>'.$record->pick_point.'</span>';
                    
                    $row[] = '<span>'.$record->drop_point.'</span>';
                    
                    
					$row[] = '<span>'.$record->distance.$record->distance_type.'</span>';
                    
                    
                    $row[] = '<span>'.$record->name.'</span>';
                    
                    
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
    function change_status() 
    {
        
        $msg = '';
        
        if (!DEMO) {
            
            $id         = $this->input->post('id');
            $status     = $this->input->post('bkstatus');
            
            if (!empty($id) && !empty($status)) {		
            
                $ids = explode(',', $id);
                
                $details = $this->base_model->fetch_records_from_in(TBL_BOOKINGS, 'id', $ids);
                
                if (!empty($details)) {
                    
                    $data = array();
                    
                    if ($status == 'confirm') {
                        
                        $data['is_conformed'] = 'confirm';
                        $msg = $this->lang->line('booking_confirmed');
                        
                    } else if ($status == 'cancel') {
                        
                        $data['is_conformed'] = 'cancelled';			
                        $msg = $this->lang->line('booking_cancelled');
                    }	
                    $data['is_new']  = 1;
                    
                    
                   if ($this->base_model->update_operation_in( $data, TBL_BOOKINGS, 'id', explode(',', $id) )) {
                    
                        // email funuctionality
                        $site_settings_rec = $this->config->item('site_settings');

                        $journey_details = $this->base_model->run_query("SELECT b.*,v.name FROM vbs_bookings as b, vbs_vehicle as v WHERE b.id=" . $id . " AND v.id = b.vehicle_selected");
                        
                        if (!empty($journey_details))
                            $journey_details = $journey_details[0];
                        
                        $journey_details = (array) $journey_details;
                        
                        $this->data['journey_details'] = $journey_details;

                        
                        //SEND EMAIL TO USER WHEN CANCELLED/CONFIRMED BOOKING
                        $message =  $this->booking_confirm_cancel_template_user($this->data);
                        
                        $from = $site_settings_rec->portal_email;
                        
                        $to   = $journey_details['email'];
                        
                        $sub  = $this->lang->line('booking_ref').": ".$journey_details['booking_ref'];
                        
                        sendEmail($from, $to, $sub, $message);
                        
                        
                        //SEND SMS TO USER
                        $mobile_number 	= $journey_details['phone'];
                    
                        if ($this->config->item('site_settings')->sms_notification=='Yes' && $mobile_number!='') {
                            
                            $sms_details = $this->base_model->fetch_records_from(TBL_SMS_TEMPLATES, array('subject'=>'booking_status_changed'));
                            
                            if(!empty($sms_details))
                            {
                                $content = strip_tags($sms_details[0]->sms_template);
                                
                                $content     	= str_replace("__USER__", $journey_details['registered_name'], $content);
                                
                                if ($status == 'confirm') {
                                    
                                    $content     	= str_replace("__BOOKING_STATUS__", 'Confirmed', $content);
                                } else if ($status == 'cancel') {
                                    
                                    $content     	= str_replace("__BOOKING_STATUS__", 'Cancelled', $content);
                                }
                                
                                $content     	= str_replace("__BOOKING_REF_NO__", $journey_details['booking_ref'], $content);
                                
                                sendSMS($mobile_number, $content);
                            }
                        }
                        //
                
                    
                        echo json_encode(array('status' => 1, 'message' => $msg, 'action' => 'success'));
                    
                   } else {
                       
                        echo json_encode(array('status' => 0, 'message' => $msg, 'action' => 'failed'));
                   }
                   
                } else {
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
     * Delete Booking
     *
     *
     * @return boolean
    **/ 
    function delete_booking()
    {	
		if (!DEMO) {
            
            $id = $this->input->post('id');
            
            if (!empty($id)) {			
            
                //$ids = explode(',', $id);
                
               
                
                //SEND EMAIL TO USER WHEN BOOKING DELETED
                $journey_details = $this->base_model->run_query("SELECT b.*,v.name FROM vbs_bookings as b, vbs_vehicle as v WHERE b.id=" . $id . " AND v.id = b.vehicle_selected");
                    
                if (!empty($journey_details))
                    $journey_details = $journey_details[0];
                
                $journey_details = (array) $journey_details;
                
                $this->data['journey_details'] = $journey_details;
                
                $this->data['is_deleted']='Yes';
                
                $message =  $this->booking_confirm_cancel_template_user($this->data);
                    
                $from = $this->config->item('site_settings')->portal_email;
                    
                $to   = $journey_details['email'];
                    
                $sub  = $this->lang->line('booking_ref').": ".$journey_details['booking_ref']; 
            
                if (!empty($journey_details)) {
                    
                    if ($this->base_model->delete_record_in(TBL_BOOKINGS, 'id', $id)) {
                        
                        //SEND E-MAIL TO USER - WHEN BOOKING DELETED  
                        sendEmail($from, $to, $sub, $message);
                        
                        
                        //SEND SMS TO USER - WHEN BOOKING DELETED
                        $mobile_number 	= $journey_details['phone'];
                    
                        if ($this->config->item('site_settings')->sms_notification=='Yes' && $mobile_number!='') {
                            
                            $sms_details = $this->base_model->fetch_records_from(TBL_SMS_TEMPLATES, array('subject'=>'booking_deleted'));
                            
                            if(!empty($sms_details))
                            {
                                $content = strip_tags($sms_details[0]->sms_template);
                                
                                $content     	= str_replace("__USER__", $journey_details['registered_name'], $content);
                                
                                
                                $content     	= str_replace("__BOOKING_REF_NO__", $journey_details['booking_ref'], $content);
                                
                                sendSMS($mobile_number, $content);
                            }
                        }
                        
                       $msg = $this->lang->line('delete_success');
                        
                       echo json_encode(array('status' => 1, 'message' => $msg, 'action' => 'success'));
                    
                    } else {
                        
                        $msg = $this->lang->line('delete_failed');
                        
                        echo json_encode(array('status' => 0, 'message' => $msg, 'action' => 'failed'));
                    }
                    
                    
                } else {
                    $msg = $this->lang->line('MSG_WRONG_OPERATION');
                    echo json_encode(array('status' => 0, 'message' => $msg, 'action' => 'failed'));
                }
            } else {
                $msg = $this->lang->line('MSG_WRONG_OPERATION');
                
                echo json_encode(array('status' => 0, 'message' => $msg, 'action' => 'failed'));
            }
            
  } else {						
                $msg = 'Access Denied on demo server';				
                echo json_encode(array('status' => 0, 'message' => $msg, 'action' => 'failed'));		
  }
    }
    
    /**
     * View Booking Details
     *
     *
     * @param int $id
     * @return array
    **/ 
    function view_details($id) 
    {
        
        $record = $this->base_model->run_query("SELECT b.*,v.name FROM vbs_bookings AS b , vbs_vehicle AS v WHERE b.vehicle_selected = v.id AND b.id=".$id." ");
        
        if (!empty($record)) {
            $record = $record[0];
            
            $data = array();
            $data['is_new'] 			= 1;
			
			$where['id'] 				= $id;
			
			$this->base_model->update_operation($data, TBL_BOOKINGS, $where);
            
            $this->data['gmaps'] 				= "false";
            $this->data['css_type'] 			= array('form');
            $this->data['record'] 			    = $record;
            $this->data['active_class'] 		= "bookings";
            $this->data['title'] 				= $this->lang->line('booking_details');
            $this->data['content'] 				= 'admin/bookings//booking_details';
            $this->_render_page(getTemplate(), $this->data);
        
        } else {
            redirect(site_url().'bookings');
        }
    }
}
