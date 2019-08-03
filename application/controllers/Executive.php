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
 * @category  Executive
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
 * Executive.
 *
 * @category  Executive
 * @package   DOVBSV2
 * @author    DOVBSV2 <digitalvidhya4u@gmail.com>
 * @copyright 2017 - 2018, DOVBSV2
 * @license   http://opensource.org/licenses/MIT    MIT License
 * @link      http://codeigniter.com
 */
class Executive extends MY_Controller
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
	| MODULE: 			Executive
	| -----------------------------------------------------
	| This is Executive module controller file.
	| -----------------------------------------------------
	**/
	function __construct()
	{
		parent::__construct();
     
		// Load MongoDB library instead of native db driver if required

		$this->config->item('use_mongodb', 'ion_auth') ? $this->load->library('mongo_db') : $this->load->database();
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
        
		check_access('executives');
	}

	/**
     * Executive dashboard
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
			array_push($temp, $this->lang->line('date'), $this->lang->line('total_bookings'), $this->lang->line('cancelled_bookings'), $this->lang->line('pending_bookings'), $this->lang->line('confirmed_bookings'));
			array_push($result, $temp);
			foreach($records as $d)
			{
				$temp = array();
				array_push($temp, date('M d', strtotime($d->bookdate)), $d->total_bookings, $d->cancelled_bookings, $d->pending_bookings, $d->confirmed_bookings);
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
		$this->data['content'] = 'executives/dashboard';
        
		$this->_render_page(TEMPLATE_EXECUTIVE, $this->data);
	}
	

	 /**
     * Executives list
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
			
			$query 	= "SELECT u.* FROM ".TBL_PREFIX.TBL_USERS." u INNER JOIN ".TBL_PREFIX.TBL_USERS_GROUPS." ug on u.id=ug.user_id WHERE ug.group_id=3";
			
           
            
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
					$dta .= form_open(site_url().'executives/edit_executive');
					$dta .= '<input type="hidden" name="id" value="'.$record->id.'">';
					$dta .= '<button type="submit" name="edit_record" class="'.CLASS_EDIT_BTN.'"><i class="'.CLASS_ICON_EDIT.'" ></i></button>';
					$dta .= form_close();
					$dta .= '</span>';
					
					$str = $dta;
					
				
					$str .= '<a data-toggle="modal" class="btn btn-danger" data-target="#deletemodal" onclick="delete_record('.$record->id . ',\''.site_url().'executives/delete_record'.'\')">
						<i class="fa fa-trash" data-toggle="tooltip" data-placement="left" title="Remove"></i>
					</a>';
                    
                    
                    $str .= '<div class="digiCrud">
				  <div class="slideThree slideBlue">
					
					<input type="checkbox" value="' . $record->id . '" id="status_' . $record->id . '" name="check_' . $record->id . '" onclick="statustoggle(this, \'' .  site_url().'executives/statustoggle' .'\')"'.$checked . '/>
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
     * Update Executive profile
     *
     *
     * @return boolean
    **/ 
	public function profile()
	{
		$this->data['message'] = "";
			
		if ($this->input->post('submit') == "Update")
		{
            
            $this->check_isdemo(site_url().'executive/profile');
            
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
				$where['id'] = $this->input->post('update_rec_id');
				if ($this->base_model->update_operation($inputdata, $table_name, $where))
                {
                    $this->prepare_flashmessage("Updated Successfully", 0);
                    redirect('executive/profile', 'refresh');
    }
                else
                {
                    $this->prepare_flashmessage("Unable to update", 1);
                    redirect('executive/profile');
                }
			}
		}

		$admin_details = getUserRec();
        
		$this->data['admin_details'] = $admin_details;
		$this->data['css_type'] = array(
			'form'
		);
		$this->data['gmaps'] = "false";
		$this->data['title'] = 'Profile';
		$this->data['content'] = 'executives/executive_profile';
		$this->_render_page(TEMPLATE_EXECUTIVE, $this->data);
	}
}
