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
 * @category  Reports
 * @package   DOVBSV2
 * @author    DOVBSV2 <digitalvidhya4u@gmail.com>
 * @copyright 2017 - 2018, DOVBSV2
 * @license   http://opensource.org/licenses/MIT    MIT License
 * @link      http://codeigniter.com
 * @since     Version 1.0.0
 */
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH . 'controllers/Vehicle_settings.php';

/**
 * CodeIgniter User_authentication Class
 * 
 * Reports.
 *
 * @category  Reports
 * @package   DOVBSV2
 * @author    DOVBSV2 <digitalvidhya4u@gmail.com>
 * @copyright 2017 - 2018, DOVBSV2
 * @license   http://opensource.org/licenses/MIT    MIT License
 * @link      http://codeigniter.com
 */

class Reports extends Vehicle_Settings
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
	| MODULE: 			Reports
	| -----------------------------------------------------
	| This is Reports module controller file.
	| -----------------------------------------------------
	**/
	function __construct()
	{
		parent::__construct();
        check_access('admin');
	}

	/**
     * Reports index
     *
     *
     * @return boolean
    **/ 
	public function index()
	{
		redirect('/');
	}

	/**
     * Overall vehicles reports
     *
     *
     * @return array
    **/ 
    function overallVehicles()
    {
        $this->data['request_from_reports_controller'] 	= 'yes';
        
        $active_class = "report";
        
        $title = $this->lang->line('overall_vehicles');
        
        $sub_title = $this->lang->line('reports');
        
        
        $this->data['ajaxrequest'] = array(
			'url' => site_url().'reports/ajax_get_overall_vehicles',
			'disablesorting' => '0,8',
		);
		
		$this->data['css_type']     = array('datatable');
		
		$this->data['active_class'] = "report";
		
		$this->data['message'] 		= $this->session->flashdata('message');
        $this->data['sub_title']    = 'Reports';
		$this->data['title'] 	    = $title;
        $this->data['sub_title'] 	= $sub_title;
		$this->data['content'] 		= "admin/reports/overall_vehicles";
		$this->_render_page(TEMPLATE_ADMIN, $this->data);
    }   
    
    /**
     * Overall vehicles reports
     *
     *
     * @return array
    **/ 
    function ajax_get_overall_vehicles()
    {
		if($this->input->is_ajax_request())
		{
			$data = array();
			$no = $_POST['start'];

			$conditions = array();
           
			$columns = array('v.name','v.fuel_type','v.cost_type','vc.category');	
			
			$query 	= "SELECT v.*,vc.category,
            (SELECT count(IF(b.is_conformed='confirm',1,NULL)) FROM " . 
            $this->db->dbprefix("bookings") . 
            " b WHERE b.vehicle_selected=v.id) AS confirmed_bookings,
            (SELECT count(IF(b.is_conformed='cancelled',1,NULL)) FROM " . 
            $this->db->dbprefix("bookings") . 
            " b WHERE b.vehicle_selected=v.id) AS cancelled_bookings,
            (SELECT count(IF(b.is_conformed='pending',1,NULL)) FROM " . 
            $this->db->dbprefix("bookings") . 
            " b WHERE b.vehicle_selected=v.id) AS pending_bookings,
            (SELECT count(*) FROM " . $this->db->dbprefix("bookings") . 
            " b WHERE b.vehicle_selected=v.id) AS total_bookings FROM " . 
            $this->db->dbprefix("vehicle") . " v LEFT JOIN " . 
            $this->db->dbprefix("vehicle_categories") . 
            " vc ON v.category_id=vc.id ";
			
			$records = $this->base_model->get_datatables($query, 'customnew', $conditions, $columns, array('v.id'=>'desc'));
			
            
			if(!empty($records)) {

				foreach($records as $record)
				{
                    
                    $img='';
                    
                    /*if ($record->image!='' && file_exists(VEHICLE_IMG_UPLOAD_PATH_URL.$record->image)) {
                        $img = '<img src="'.VEHICLE_IMG_PATH.$record->image.'" alt="Vehicle Image">';
                    }*/

                    $img = $img = '<img class="img-responsive vehicle-img" src="'.get_vehicle_image($record->image).'" alt="Vehicle Image">';
                    
					$no++;
					$row = array();

					$row[] = $no;
                    
					$row[] = '<span>'.$img.' '.$record->name.' - '.$record->total_vehicles.'</span>';
					
                    $row[] = '<span>'.$record->category.'</span>';
                    
                    
                    $row[] = '<span>'.ucfirst($record->fuel_type).'</span>';
                    
                    
					$row[] = '<span>'.ucfirst($record->cost_type).'</span>';
                    
                      
                    $row[] = '<span>'.$record->total_bookings.'</span>'; 
                    
                    $row[] = '<span>'.$record->confirmed_bookings.'</span>';
                    
                    $row[] = '<span>'.$record->cancelled_bookings.'</span>';
                    
                    $row[] = '<span>'.$record->pending_bookings.'</span>';
                    
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
     * Payments reports
     *
     *
     * @return array
    **/ 
    function payments()
    {
        $this->data['ajaxrequest'] = array(
			'url' => site_url().'reports/ajax_get_payments',
			'disablesorting' => '0,7',
		);
		
		$this->data['css_type']     = array('datatable');
		
		$this->data['active_class'] = "report";
		
		$this->data['message'] 		= $this->session->flashdata('message');
        $this->data['sub_title']    = 'Reports';
		$this->data['title'] 	    = $this->lang->line('payments');
		$this->data['content'] 		= "admin/reports/n_reports";
		$this->_render_page(TEMPLATE_ADMIN, $this->data);
    }    

    /**
     * Payments reports
     *
     *
     * @return array
    **/ 
    function ajax_get_payments()
    {
		if($this->input->is_ajax_request())
		{
			// return false;
			$data = array();
			$no = $_POST['start'];

			$conditions = array();
           
			$columns = array('booking_ref','registered_name','cost_of_journey','payment_type','transaction_id','bookdate','is_conformed');	
			
			$query 	= "SELECT * from ".TBL_PREFIX.TBL_BOOKINGS." WHERE  (payment_type='paypal' and payment_received=1 and is_conformed!='cancelled') OR (payment_type='cash' and is_conformed='confirm') ";
			
			$records = $this->base_model->get_datatables($query, 'customnew', $conditions, $columns, array('bookdate'=>'desc'));
			
            
			if(!empty($records)) {

				foreach($records as $record)
				{
             
					$no++;
					$row = array();

					$row[] = $no;
                    
					$row[] = '<span>'.$record->registered_name.'</span>';
					
                    $row[] = '<span>'.$record->booking_ref.'</span>';
                    
                    
                    $row[] = '<span>'.$this->config->item('site_settings')->currency_symbol.$record->cost_of_journey.'</span>';
                    
                    
					$row[] = '<span>'.$record->payment_type.'</span>';
                    
                    $row[] = '<span>'.$record->transaction_id.'</span>';
                    
                    $row[] = '<span>'.get_date($record->bookdate).'</span>';
                      
                    $row[] = '<span>'.ucwords($record->is_conformed).'</span>';
                       
                       
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
}
