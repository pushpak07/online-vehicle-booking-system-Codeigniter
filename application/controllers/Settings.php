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
 * @category  Settings
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
 * Settings.
 *
 * @category  Settings
 * @package   DOVBSV2
 * @author    DOVBSV2 <digitalvidhya4u@gmail.com>
 * @copyright 2017 - 2018, DOVBSV2
 * @license   http://opensource.org/licenses/MIT    MIT License
 * @link      http://codeigniter.com
 */
class Settings extends MY_Controller
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
	| MODULE: 			Settings
	| -----------------------------------------------------
	| This is settings module controller file.
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
      
	}

	
	/**
     * Site Settings
     *
     *
     * @return boolean
    **/ 
	function site_settings()
	{

        check_access('admin');
        
		$this->data['message'] = "";
		
		if ($this->input->post('submit') == 'Update') {
            
            
            $this->check_isdemo(site_url().'settings/site_settings');
        
            $msg='';
            $status=0;
            
            
			// FORM VALIDATIONS
			$this->form_validation->set_rules('site_title', 'Site Title', 'xss_clean|required');
			$this->form_validation->set_rules('sitename', 'Site Name', 'xss_clean|required');
			$this->form_validation->set_rules('address', 'Address', 'xss_clean|required');
			$this->form_validation->set_rules('city', 'City', 'xss_clean|required');
			$this->form_validation->set_rules('state', 'State', 'xss_clean|required');
			$this->form_validation->set_rules('country', 'Country', 'xss_clean|required');
			$this->form_validation->set_rules('zip', 'Zip Code', 'xss_clean|required');
			$this->form_validation->set_rules('phone', 'Phone', 'xss_clean|required|min_length[9])|max_length[30]');
			$this->form_validation->set_rules(
												'portal_email', 
												'Portal Email',
												'xss_clean|required|valid_email'
												);


			$this->form_validation->set_rules('country_code', 'Country code', 'xss_clean|required');

			$this->form_validation->set_rules('site_country', 'Site country', 'xss_clean|required');
			$this->form_validation->set_rules('currency_symbol', 'Currency Symbol', 'xss_clean|required');
			$this->form_validation->set_rules('day_start_time', 'Day Start Time', 'xss_clean');
			$this->form_validation->set_rules('day_end_time', 'Day End Time', 'xss_clean');
			$this->form_validation->set_rules('night_start_time', 'Night Start Time', 'xss_clean');
			$this->form_validation->set_rules('night_end_time', 'Night End Time', 'xss_clean');
            
			$this->form_validation->set_rules('driver_charge_night', 'Driver Charge For Night', 'required|xss_clean');
            
            
            $this->form_validation->set_rules('tax_amount', 'Tax Amount', 'xss_clean');
            
            
			$this->form_validation->set_rules('email_type', 'Email Type', 'xss_clean');
			$this->form_validation->set_rules('design_by', 'Design by', 'xss_clean');
			$this->form_validation->set_rules('url_for_design_by', 'URL for Design by', 'xss_clean');
			$this->form_validation->set_rules(
												'rights_reserved_content', 
												'Rights reserved content', 
												'xss_clean'
												);
			$this->form_validation->set_rules('date_formats', 'Date', 'xss_clean');
			$this->form_validation->set_rules('google_api_key', 'Google API Key', 'required|xss_clean');

            
            
            $this->form_validation->set_rules('facebook_app_id', 'Facebook APP ID', 'required|xss_clean');
            $this->form_validation->set_rules('facebook_app_secret', 'Facebook APP Secret', 'required|xss_clean');
            $this->form_validation->set_rules('google_client_id', 'Google Client ID', 'required|xss_clean');
            $this->form_validation->set_rules('google_client_secret', 'Google Client Secret', 'required|xss_clean');
            
            
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');


			if ($this->form_validation->run() == TRUE) {
                
              
				$inputdata['site_title'] 	= $this->input->post('site_title');
				$inputdata['site_name'] 	= $this->input->post('sitename');
				$inputdata['address'] 		= $this->input->post('address');
				$inputdata['city'] 			= $this->input->post('city');
				$inputdata['state'] 		= $this->input->post('state');
				$inputdata['country'] 		= $this->input->post('country');
				$inputdata['zip'] 			= $this->input->post('zip');
				$inputdata['phone'] 		= $this->input->post('phone');
				$inputdata['fax'] 			= $this->input->post('fax');
				$inputdata['portal_email'] 	= $this->input->post('portal_email');
				$inputdata['country_code']  = $this->input->post('country_code');
				$inputdata['site_country'] 	= $this->input->post('site_country');
				$inputdata['currency_symbol'] = $this->input->post('currency_symbol');
				$inputdata['distance_type'] = $this->input->post('distance_type');
				$inputdata['airports_status'] = $this->input->post('airports');
				$inputdata['day_start_time'] = $this->input->post('day_start_time');
				$inputdata['day_end_time'] 	= $this->input->post('day_end_time');
				$inputdata['night_start_time'] = $this->input->post('night_start_time');
				$inputdata['night_end_time'] = $this->input->post('night_end_time');
				$inputdata['driver_charge_night'] = $this->input->post('driver_charge_night');
                
                
                $inputdata['apply_tax']    = $this->input->post('apply_tax');
                if ($this->input->post('tax_amount')>0)
                    $inputdata['tax_amount']    = $this->input->post('tax_amount');
                else 
                    $inputdata['tax_amount']    = NULL;
                
				$inputdata['email_type'] 	= $this->input->post('email_type');
				$inputdata['design_by'] 	= $this->input->post('design_by');
				$inputdata['url_for_design_by'] = $this->input->post('url_for_design_by');
				$inputdata['rights_reserved_content'] = $this->input->post('rights_reserved_content');
				$inputdata['date_formats'] 	= $this->input->post('date_formats');
				$inputdata['time_zone'] 	= $this->input->post('site_timezone');
				$inputdata['land_line'] 	= $this->input->post('land_line');
				$inputdata['default_language']  = $this->input->post('default_language');
				$inputdata['language_dropdown'] = $this->input->post('language_dropdown');
				$inputdata['contact_map']   = $this->input->post('contact_map');
				$inputdata['google_api_key']   = $this->input->post('google_api_key');

				if ($this->input->post('paypal')=='on') {
					$inputdata['paypal'] 	= "1";
				}
				else {
					$inputdata['paypal'] 	= "0";
				}

                
				if ($this->input->post('cash') == "on") {
					$inputdata['cash'] 		= "1";
				}
				else {
					$inputdata['cash'] 		= "0";
				}

				if ($this->input->post('stripe') == "on") {
					$inputdata['stripe'] 		= "1";
				}
				else {
					$inputdata['stripe'] 		= "0";
				}

				if ($this->input->post('payu') == "on") {
					$inputdata['payu'] 		= "1";
				}
				else {
					$inputdata['payu'] 		= "0";
				}

                
                if ($this->input->post('sms_notification')=='Yes')
                    $inputdata['sms_notification']='Yes';
                else
                    $inputdata['sms_notification']='No';
                
                
                
                $inputdata['facebook_app_id']        = $this->input->post('facebook_app_id');
                $inputdata['facebook_app_secret']    = $this->input->post('facebook_app_secret');
                $inputdata['google_client_id']       = $this->input->post('google_client_id');
                $inputdata['google_client_secret']   = $this->input->post('google_client_secret');
                
                
                
				$table_name 				= "site_settings";
				$where['id'] 				= $this->input->post('update_record_id');
				if ($this->base_model->update_operation($inputdata, $table_name, $where)) {
                    
                    
                    $msg .= $this->lang->line('update_success');
                    $status = 0;
					
					
                    
                    //IMAGES
                    if(count($_FILES) > 0) 
                    {
                        $data = array();
                        
                        //site logo
                        if($_FILES['userfile']['name'] != '' && $_FILES['userfile']['error'] != 4)
                        {
                           $record = $this->base_model->fetch_records_from('site_settings');
                        
                            if(!empty($record))
							{
								$record = $record[0];
								if($record->site_logo != '' && file_exists(LOGO_IMG_UPLOAD_PATH_URL.$record->site_logo))
								{
									unlink(LOGO_IMG_UPLOAD_PATH_URL.$record->site_logo);
								}
                            }
                            
                            
                            
                            $ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
                            $file_name = 'site_logo.'. $ext;
                            $config['upload_path'] 		= LOGO_IMG_UPLOAD_PATH_URL;
                            $config['allowed_types'] 	= ALLOWED_TYPES;
                            
                            $config['max_size'] 	    = 5120;//5 MB
                            
                            $config['file_name']  = $file_name;
                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);

                            if($this->upload->do_upload('userfile'))
                            {
                                $data['site_logo'] = $file_name;
                            }
                            else
                            {
                                $msg .= '<br>'.strip_tags($this->upload->display_errors());
                                $status =1;
                            }
                        }
                        
                        
                        //fevicon
                        if($_FILES['fevicon']['name'] != '' && $_FILES['fevicon']['error'] != 4)
                        {
                            $record = $this->base_model->fetch_records_from('site_settings');
							
							if(!empty($record))
							{
								$record = $record[0];
								if($record->fevicon != '' && file_exists(FEVICON_IMG_UPLOAD_PATH_URL.$record->fevicon))
								{
									unlink(FEVICON_IMG_UPLOAD_PATH_URL.$record->fevicon);
								}
							}
                            
                            
                            
                            $ext = pathinfo($_FILES['fevicon']['name'], PATHINFO_EXTENSION);
							$file_name1 = 'fevicon.'. $ext;
							$config['upload_path'] 		= FEVICON_IMG_UPLOAD_PATH_URL;
							$config['allowed_types'] 	= 'ico';

							$config['max_size'] 	    = 5120;//5 MB
							
							$config['file_name']  = $file_name1;
                            
                            $this->load->library('upload', $config);
							$this->upload->initialize($config);

                            if($this->upload->do_upload('fevicon'))
                            {
                                $data['fevicon'] = $file_name1;
                            }
                            else
                            {
                                $msg .= '<br>'.strip_tags($this->upload->display_errors());
                                $status =1;
                            }
                        }
                        
                        
                        if (!empty($data))
                        $this->base_model->update_operation($data, TBL_SITE_SETTINGS, $where);
                    
                    }
                    //IMAGES
                   
				}
				else {
                    
					$msg .= $this->lang->line('update_failure');
					$status=1;
				}
                
                
                $redirect_path = "settings/site_settings";
                if($this->input->post('default_language') != "") {

                    $redirect_path = base_url().$this->input->post('default_language')."/settings/site_settings";
                }
                
                $this->prepare_flashmessage($msg, $status);                
                redirect($redirect_path, 'refresh');
			} 
		}
		
		
		
		
		/**site settings**/
		$site_settings = $this->config->item('site_settings');
		$this->data['record'] 	= $site_settings;
		
        
        /**country options**/
		$country_options = $this->dvbs_model->get_country_options();
		$this->data['country_options'] 		= $country_options;
        
        
		/**timezone options**/
        $time_zone_options = $this->dvbs_model->get_timezone_options();
		$this->data['time_zone_options'] 	= $time_zone_options;
        
        
		$this->data['gmaps'] 				= "false";
		$this->data['css_type'] 			= array('form');
		$this->data['active_class'] 		= "masterSettings";
		$this->data['title'] 				= $this->lang->line('site_settings');
		$this->data['content'] 				= "admin/settings/site_settings";
        
		$this->_render_page(TEMPLATE_ADMIN, $this->data);
	}

    
	
	/**
     * Testimonials list
     *
     *
     * @return array
    **/ 
	public function testimonials() 
	{
        
        $this->data['ajaxrequest'] = array(
			'url' => site_url().'settings/ajax_get_testimonials',
			'disablesorting' => '0,4'
		);
		
		$this->data['css_type']     = array('datatable');
		
		$this->data['active_class'] = "masterSettings";
		
		$this->data['message'] 		= $this->session->flashdata('message');
		$this->data['title'] 	    = $this->lang->line('testimonial_settings');
		$this->data['content'] 		= "admin/settings/testimonials";
		$this->_render_page(TEMPLATE_ADMIN, $this->data);
        
 }

    /**
     * Testimonials list
     *
     *
     * @return array
    **/ 
    function ajax_get_testimonials() 
    {
        
        if($this->input->is_ajax_request())
		{
			// return false;
			$data = array();
			$no = $_POST['start'];

			$conditions = array();

			$columns = array('user_name','title','content','added_date','status');	
			
			$query 	= "SELECT * FROM vbs_testimonials_settings ";
			
           
            
			$records = $this->base_model->get_datatables($query, 'customnew', $conditions, $columns, array('id'=>'desc'));
			
            
            
			if(!empty($records)) {

				foreach($records as $record)
				{
					$no++;
					$row = array();

					$row[] = '<input id="checkbox-'.$record->id.'" class="checkbox-custom checkbox_class" name="ids[]" type="checkbox" onclick="javascript:deselectall_check(\'selectall\')" value="'.$record->id.'">';
                    
					$row[] = '<span>'.$record->user_name.'</span>';
                   
                    $row[] = '<span>'.substr($record->content, 0, 50).'..'.'</span>';
                    
                    // $row[] = '<span>'.get_date($record->added_date).'</span>';
                    
                    
                    
					$checked = '';
					$class = 'badge danger';
					if($record->status == 'Active'){
						$checked = ' checked';
						$class = 'badge success';	
					}
					$row[] = '<span class="'.$class.'">'.$record->status.'</span>';
                    
                    $dta ='';
					$dta .= '<span>';
					$dta .= form_open(site_url().'settings/addedit_testimonial');
					$dta .= '<input type="hidden" name="id" value="'.$record->id.'">';
					$dta .= '<button type="submit" name="edit_testimonial" class="'.CLASS_EDIT_BTN.'"><i class="'.CLASS_ICON_EDIT.'" ></i></button>';
					$dta .= form_close();
					$dta .= '</span>';
					
					$str = $dta;
					
				
					$str .= '<a data-toggle="modal" class="btn btn-danger" data-target="#deletemodal" onclick="delete_record('.$record->id . ',\''.site_url().'settings/delete_testimonial'.'\')">
						<i class="fa fa-trash" data-toggle="tooltip" data-placement="left" title="Remove"></i>
					</a>';
					
                     $str .= '<div class="digiCrud">
                      <div class="slideThree slideBlue">
                        
                        <input type="checkbox" value="' . $record->id . '" id="status_' . $record->id . '" name="check_' . $record->id . '" onclick="statustoggle(this, \'' .  site_url().'settings/tetimonial_statustoggle' .'\')"'.$checked . '/>
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
     * Delete Testimonial
     *
     *
     * @return boolean
    **/ 
    function delete_testimonial()
    {	
		if (!DEMO) {
            
            $id = $this->input->post('id');
            if(!empty($id))
            {			
                $ids = explode(',', $id);
                $details = $this->base_model->fetch_records_from_in(TBL_TESTIMONIALS_SETTINGS, 'id', $ids);
                
                if(!empty($details))
                {
                    
                    if ($this->base_model->delete_record_in(TBL_TESTIMONIALS_SETTINGS, 'id', $ids)) {
                        
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
     * Change status of Testimonial
     *
     *
     * @return boolean
    **/ 
    function tetimonial_statustoggle()
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
                $this->base_model->update_operation_in( $filedata, TBL_TESTIMONIALS_SETTINGS, 'id', explode(',', $id) );
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
    
    /**
     * Add/Edit Testimonial
     *
     *
     * @return boolean
    **/ 
    function addedit_testimonial() 
    {
       if (isset($_POST['addedit_testimonial']))
	   {
			
			$this->check_isdemo(site_url().'settings/testimonials');
				
			$msg='';
			$status=0;
            
			$this->form_validation->set_rules('author', 'Author', 'xss_clean|required');
            $this->form_validation->set_rules('title', 'Title', 'xss_clean');
            $this->form_validation->set_rules('description', 'Description', 'xss_clean|required');
            $this->form_validation->set_rules('status', 'Status', 'xss_clean');
			
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			
			$id = $this->input->post('id');
			
			if($this->form_validation->run() == TRUE) 
			{
				$data['user_name'] 	    = $this->input->post('author');
                $data['title'] 		    = $this->input->post('title');
                
                $data['content'] 		= $this->input->post('description');
               
                $data['status'] 		= $this->input->post('status');
            
                
				if($this->input->post('id') > 0)
				{
					$where['id'] = $this->input->post('id');
					if($this->base_model->update_operation($data, TBL_TESTIMONIALS_SETTINGS, $where))
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
                    $data['added_date'] 	= date('Y-m-d');
                     
					$id = $this->base_model->insert_operation_id($data, TBL_TESTIMONIALS_SETTINGS);
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
                
                
                 //IMAGES
                if(count($_FILES) > 0) 
                {
                    $data = array();
                    
                    //site logo
                    if ($_FILES['userfile']['name'] != '' && $_FILES['userfile']['error'] != 4) {
                       
                        if ($this->input->post('id')>0) {
                            
                            $record = $this->base_model->fetch_records_from(TBL_TESTIMONIALS_SETTINGS, array('id'=>$id));
                            
                            if (!empty($record)) {
                                $record = $record[0];
                                
                                if ($record->user_photo != '' && file_exists(TESTI_USER_IMG_UPLOAD_PATH_URL.$record->user_photo)) {
                                    unlink(TESTI_USER_IMG_UPLOAD_PATH_URL.$record->user_photo);
                                }
                            
                            }
                        }
                        
                        
                        
                        $ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
                        $file_name = 'testimonial_'.$id.'.'. $ext;
                        $config['upload_path'] 		= TESTI_USER_IMG_UPLOAD_PATH_URL;
                        $config['allowed_types'] 	= ALLOWED_TYPES;
                        
                        $config['max_size'] 	    = 5120;//5 MB
                        
                        $config['file_name']  = $file_name;
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);

                        if($this->upload->do_upload('userfile'))
                        {
                            $data['user_photo'] = $file_name;
                        }
                        else
                        {
                            $msg .= '<br>'.strip_tags($this->upload->display_errors());
                            $status =1;
                        }
                    }
                    
                    
                    if (!empty($data)) {
                        
                        $where['id'] = $id;
                        
                        $this->base_model->update_operation($data, TBL_TESTIMONIALS_SETTINGS, $where);
                    }
                
                }
                //IMAGES
                
                    
				
				if($msg != '')
					$this->prepare_flashmessage($msg, $status);
					redirect(site_url().'settings/testimonials', REFRESH);
			}
       }
		
		
		
		$pagetitle = $this->lang->line('add_testimony');
		if(isset($_POST['edit_testimonial']))
		{
			$id = $this->input->post('id');
			if($id > 0)
			{
				$pagetitle = $this->lang->line('edit_testimony');
				$record = $this->base_model->fetch_records_from(TBL_TESTIMONIALS_SETTINGS, array('id' => $id));
				if(empty($record)) 
				{
					$this->prepare_flashmessage($this->lang->line('no_details_found'), 2);
					redirect(site_url().'settings/testimonials');				
				}
				
				$this->data['record'] =	$record[0];
			}
			else
				redirect(site_url().'settings/testimonials');
		}
		
       
		$this->data['css_type']      = array('form');
		$this->data['title']	     = $pagetitle;
		
		$this->data['active_class']  = "masterSettings";
		$this->data['content'] 		 = 'admin/settings/add_testimonials';
		$this->_render_page(TEMPLATE_ADMIN, $this->data); 
        	
    }
 
	/**
     * Paypal Settings
     *
     *
     * @return boolean
    **/ 
	public function paypal_settings()
	{
        check_access('admin');
        
		$this->data['message'] 				= "";
        
		if ($this->input->post('submit') == 'Update') {
            
           
			$this->check_isdemo(site_url().'settings/paypal_settings');
            
            $msg='';
            $status=0;
            
			
			// FORM VALIDATIONS

			$this->form_validation->set_rules('paypalemail', 'Paypal Email', 'trim|required|valid_email|xss_clean');
			$this->form_validation->set_rules('currency', 'Currency', 'trim|required|xss_clean');
			$this->form_validation->set_rules('account_type', 'Account Type', 'required|xss_clean');

			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            
            $id = $this->input->post('update_record_id');


			if ($this->form_validation->run() == TRUE) {

				$inputdata['paypal_email'] 	= $this->input->post('paypalemail');
				$inputdata['currency'] 		= $this->input->post('currency');
				$inputdata['account_type'] 	= $this->input->post('account_type');

				$image['logo_image'] 		= $_FILES['userfile']['name'];
				$table_name 				= "paypal_settings";
				$where['id'] 				= $this->input->post('update_record_id');
                
				if ($this->base_model->update_operation($inputdata, $table_name, $where)) {
                    
                    unset($inputdata);
                    
                    $msg .= $this->lang->line('update_success');
                    $status = 0;
					
					
                    
                    //IMAGES
                    if(count($_FILES) > 0) 
                    {
                        $data = array();
                        
                        //paypal logo
                        if($_FILES['userfile']['name'] != '' && $_FILES['userfile']['error'] != 4)
                        {
                           $record = $this->base_model->fetch_records_from('paypal_settings');
                        
                            if(!empty($record))
							{
								$record = $record[0];
								if($record->logo_image != '' && file_exists(PAYPAL_LOGO_IMG_UPLOAD_PATH_URL.$record->logo_image))
								{
									unlink(PAYPAL_LOGO_IMG_UPLOAD_PATH_URL.$record->logo_image);
								}
                            }
                            
                            
                            
                            $ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
                            $file_name = 'paypal_logo.'. $ext;
                            $config['upload_path'] 		= PAYPAL_LOGO_IMG_UPLOAD_PATH_URL;
                            $config['allowed_types'] 	= ALLOWED_TYPES;
                            
                            $config['max_size'] 	    = 5120;//5 MB
                            
                            $config['file_name']  = $file_name;
                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);

                            if($this->upload->do_upload('userfile'))
                            {
                                $data['logo_image'] = $file_name;
                            }
                            else
                            {
                                $msg .= '<br>'.strip_tags($this->upload->display_errors());
                                $status =1;
                            }
                        }
                        
                       
                        if (!empty($data))
                        $this->base_model->update_operation($data, TBL_PAYPAL_SETTINGS, $where);
                    
                    }
                    //IMAGES
                   
				} else {
                    
                    $msg .= $this->lang->line('update_failure');
                    $status =1;
    }

                if (!empty($msg))
					$this->prepare_flashmessage($msg, $status);
                
					redirect(site_url().'settings/paypal_settings', 'refresh');
			}
				
		}
		
	
		$this->data['currency_opts'] = $this->dvbs_model->get_currency_options();
        
		
		$this->data['record'] = $this->config->item('paypal_settings');
        
		$this->data['css_type'] = array('form');
		$this->data['gmaps'] 				= "false";
		$this->data['active_class'] 		= "masterSettings";
		$this->data['title'] 				= $this->lang->line('paypal_settings');
		$this->data['content'] 				= "admin/settings/paypal_settings";
        
		$this->_render_page(TEMPLATE_ADMIN, $this->data);
	}

	
	/**
     * Stripe Settings
     *
     *
     * @return boolean
    **/ 
	function stripe_settings()
	{
		check_access('admin');
        
		$this->data['message'] 				= "";
        
		if ($this->input->post('submit') == 'Update') {
            
          
			$this->check_isdemo(site_url().'settings/stripe_settings');
            
            $msg='';
            $status=0;
            
			
			// FORM VALIDATIONS

			$this->form_validation->set_rules('stripe_key_test_public', 'Stripe key test public', 'required|xss_clean');
			$this->form_validation->set_rules('stripe_key_test_secret', 'Stripe key test secret', 'required|xss_clean');
			$this->form_validation->set_rules('stripe_key_live_public', 'Stripe key live public', 'required|xss_clean');
			$this->form_validation->set_rules('stripe_key_live_secret', 'Stripe key live secret', 'required|xss_clean');
			$this->form_validation->set_rules('currency', 'Currency', 'trim|required|xss_clean');
			$this->form_validation->set_rules('stripe_test_mode', 'Account Type', 'required|xss_clean');

			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            
            $id = $this->input->post('update_record_id');


			if ($this->form_validation->run() == TRUE) {

				$inputdata['stripe_key_test_public'] 	= $this->input->post('stripe_key_test_public');
				$inputdata['stripe_key_test_secret'] 	= $this->input->post('stripe_key_test_secret');
				$inputdata['stripe_key_live_public'] 	= $this->input->post('stripe_key_live_public');
				$inputdata['stripe_key_live_secret'] 	= $this->input->post('stripe_key_live_secret');
				$inputdata['currency'] 		= $this->input->post('currency');
				$inputdata['stripe_test_mode'] 	= $this->input->post('stripe_test_mode');
				
				$table_name 				= "stripe_settings";
				$where['id'] 				= $this->input->post('update_record_id');
                
				if ($this->base_model->update_operation($inputdata, $table_name, $where)) {
                    
                    $msg .= $this->lang->line('update_success');
                    $status = 0;
					
                   
				} else {
                    
                    $msg .= $this->lang->line('update_failure');
                    $status =1;
    }

                if (!empty($msg))
					$this->prepare_flashmessage($msg, $status);
                
					redirect(site_url().'settings/stripe_settings', 'refresh');
			}
				
		}
		
		$this->data['currency_opts'] = $this->dvbs_model->get_currency_options();
        
		$records = $this->base_model->fetch_records_from('stripe_settings');
		$this->data['record'] = $records[0];
        
		$this->data['css_type'] = array('form');
		$this->data['gmaps'] 				= "false";
		$this->data['active_class'] 		= "masterSettings";
		$this->data['title'] 				= $this->lang->line('stripe_settings');
		$this->data['content'] 				= "admin/settings/stripe_settings";
        
		$this->_render_page(TEMPLATE_ADMIN, $this->data);
	}

	
	/**
     * Payu Settings
     *
     *
     * @return boolean
    **/ 
	function payu_settings()
	{
		check_access('admin');
        
		$this->data['message'] 				= "";
        
		if ($this->input->post('submit') == 'Update') {
            
         
			$this->check_isdemo(site_url().'settings/payu_settings');
            
            $msg='';
            $status=0;
            
			
			// FORM VALIDATIONS
			$this->form_validation->set_rules('test_merchant_key', 'Test Merchant Key', 'required|xss_clean');
			$this->form_validation->set_rules('test_salt', 'Test salt', 'required|xss_clean');
			$this->form_validation->set_rules('live_merchant_key', 'Stripe key live public', 'required|xss_clean');
			$this->form_validation->set_rules('live_salt', 'Live Salt', 'required|xss_clean');
			$this->form_validation->set_rules('mode', 'Mode', 'required|xss_clean');

			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            
            $id = $this->input->post('update_record_id');


			if ($this->form_validation->run() == TRUE) {

				$inputdata['test_merchant_key'] 	= $this->input->post('test_merchant_key');
				$inputdata['test_salt'] 	= $this->input->post('test_salt');
				$inputdata['live_merchant_key'] 	= $this->input->post('live_merchant_key');
				$inputdata['live_salt'] 	= $this->input->post('live_salt');
				$inputdata['mode'] 	= $this->input->post('mode');
				
				$table_name 				= "payu_settings";
				$where['id'] 				= $this->input->post('update_record_id');
                
				if ($this->base_model->update_operation($inputdata, $table_name, $where)) {
                    
                    $msg .= $this->lang->line('update_success');
                    $status = 0;
					
                   
				} else {
                    
                    $msg .= $this->lang->line('update_failure');
                    $status =1;
    }

                if (!empty($msg))
					$this->prepare_flashmessage($msg, $status);
                
					redirect(site_url().'settings/payu_settings', 'refresh');
			}	
		}
		
		$this->data['currency_opts'] = $this->dvbs_model->get_currency_options();
        
		$records = $this->base_model->fetch_records_from('payu_settings');
		$this->data['record'] = $records[0];
        
		$this->data['css_type'] = array('form');
		$this->data['gmaps'] 				= "false";
		$this->data['active_class'] 		= "masterSettings";
		$this->data['title'] 				= $this->lang->line('payu_settings');
		$this->data['content'] 				= "admin/settings/payu_settings";
        
		$this->_render_page(TEMPLATE_ADMIN, $this->data);
	}
    
    
	/**
     * Email Settings
     *
     *
     * @return boolean
    **/ 
	public function email_settings()
	{
        check_access('admin');
        
		$this->data['message'] 				= "";
        
		if ($this->input->post('submit') == 'Update') {
            
           
			$this->check_isdemo(site_url().'settings/email_settings');
            
			// FORM VALIDATIONS
			$this->form_validation->set_rules('smtp_host', 'Host', 'trim|required');
			$this->form_validation->set_rules('smtp_user', 'Email', 'trim|required|xss_clean');
			$this->form_validation->set_rules('smtp_port', 'Port', 'trim|required');
			$this->form_validation->set_rules('smtp_password', 'Password', 'required');
			
			$this->form_validation->set_rules('mail_config', 'Mail Config', 'required');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');


			if ($this->form_validation->run() == TRUE) {

				$inputdata['smtp_host'] 	= $this->input->post('smtp_host');
				$inputdata['smtp_user'] 	= $this->input->post('smtp_user');
				$inputdata['smtp_password'] = $this->input->post('smtp_password');
				$inputdata['smtp_port'] 	= $this->input->post('smtp_port');
				$inputdata['api_key'] 		= $this->input->post('api_key');
				$inputdata['mail_config'] 	= $this->input->post('mail_config');

				$table_name 				= "email_settings";
				$where['id'] 				= $this->input->post('update_record_id');

				if ($this->base_model->update_operation($inputdata, $table_name, $where)) {
					$this->prepare_flashmessage($this->lang->line('email_settings') . " " . $this->lang->line('update_success'), 0);
					
				}
				else {
					$this->prepare_flashmessage($this->lang->line('unable_to_update') . " " . $this->lang->line('email_settings'), 1);
					
				}
                redirect('settings/email_settings', 'refresh');
			}
		}

		$email_settings = $this->config->item('email_settings');
        $this->data['email_settings'] = $email_settings;
		
		$this->data['css_type'] 			= array('form');
		$this->data['active_class'] 		= "masterSettings";
		$this->data['gmaps'] 				= "false";
		$this->data['title'] 				= $this->lang->line('email_settings');
		$this->data['content'] 				= "admin/settings/email_settings";
        
		$this->_render_page(TEMPLATE_ADMIN, $this->data);
	}
	
    

	/**
     * Packages list
     *
     *
     * @return array
    **/ 
	public function packages()
	{
        check_access('admin');
        
        $this->data['ajaxrequest'] = array(
			'url' => site_url().'settings/ajax_get_packages',
			'disablesorting' => '0,8',
		);
		
		$this->data['css_type']     = array('datatable');
		
		$this->data['active_class'] = "masterSettings";
		
		$this->data['message'] 		= $this->session->flashdata('message');
		$this->data['title'] 	    = $this->lang->line('package_settings');
		$this->data['content'] 		= "admin/settings/package_settings";
		$this->_render_page(TEMPLATE_ADMIN, $this->data);
	}
    
    /**
     * Packages list
     *
     *
     * @return array
    **/ 
    function ajax_get_packages() 
    {
        
        if($this->input->is_ajax_request())
		{
			// return false;
			$data = array();
			$no = $_POST['start'];

			$conditions = array();

			$columns = array('name','hours','distance','min_cost','charge_distance','charge_hour','status');	
			
			$query 	= "SELECT * from ".TBL_PREFIX.TBL_PACKAGE_SETTINGS." WHERE id!=''";
			
           
            
			$records = $this->base_model->get_datatables($query, 'customnew', $conditions, $columns, array('id'=>'desc'));
			
            
            
			if(!empty($records)) {

				foreach($records as $record)
				{
					$no++;
					$row = array();

					$row[] = '<input id="checkbox-'.$record->id.'" class="checkbox-custom checkbox_class" name="ids[]" type="checkbox" onclick="javascript:deselectall_check(\'selectall\')" value="'.$record->id.'">';
                    
					$row[] = '<span>'.$record->name.'</span>';
                   
                    $row[] = '<span>'.$record->hours.'</span>';
                    
                    $row[] = '<span>'.$record->distance.'</span>';
                    
                    $row[] = '<span>'.$record->min_cost.'</span>';
                    
                    $row[] = '<span>'.$record->charge_distance.'</span>';
                    
                    $row[] = '<span>'.$record->charge_hour.'</span>';
                    
					$checked = '';
					$class = 'badge danger';
					if($record->status == 'Active'){
						$checked = ' checked';
						$class = 'badge success';	
					}
					$row[] = '<span class="'.$class.'">'.$record->status.'</span>';
					
                    
					$dta ='';
					$dta .= '<span>';
					$dta .= form_open(site_url().'settings/addedit_package');
					$dta .= '<input type="hidden" name="id" value="'.$record->id.'">';
					$dta .= '<button type="submit" name="edit_package" class="'.CLASS_EDIT_BTN.'"><i class="'.CLASS_ICON_EDIT.'" ></i></button>';
					$dta .= form_close();
					$dta .= '</span>';
					
					$str = $dta;
					
				
					$str .= '<a data-toggle="modal" class="btn btn-danger" data-target="#deletemodal" onclick="delete_record('.$record->id . ',\''.site_url().'settings/delete_package'.'\')">
						<i class="fa fa-trash" data-toggle="tooltip" data-placement="left" title="Remove"></i>
					</a>';
					
                     $str .= '<div class="digiCrud">
                      <div class="slideThree slideBlue">
                        
                        <input type="checkbox" value="' . $record->id . '" id="status_' . $record->id . '" name="check_' . $record->id . '" onclick="statustoggle(this, \'' .  site_url().'settings/package_statustoggle' .'\')"'.$checked . '/>
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
     * Delete Package
     *
     *
     * @return boolean
    **/ 
    function delete_package()
    {	
		if (!DEMO) {
            
            $id = $this->input->post('id');
            if(!empty($id))
            {			
                $ids = explode(',', $id);
                $details = $this->base_model->fetch_records_from_in(TBL_PACKAGE_SETTINGS, 'id', $ids);
                
                if(!empty($details))
                {
                    
                    if ($this->base_model->delete_record_in(TBL_PACKAGE_SETTINGS, 'id', $ids)) {
                        
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
     * Change status of Package
     *
     *
     * @return boolean
    **/ 
    function package_statustoggle()
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
                $this->base_model->update_operation_in( $filedata, TBL_PACKAGE_SETTINGS, 'id', explode(',', $id) );
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
    
    /**
     * Add/Edit Package
     *
     *
     * @return boolean
    **/ 
    function addedit_package() 
    {
        
       if (isset($_POST['addedit_package']))
	   {
			$this->check_isdemo(site_url().'settings/packages');
				
			$msg='';
			$status=0;
            
			
            $this->form_validation->set_rules('name', 'Name', 'xss_clean|required');
            $this->form_validation->set_rules('hours', 'Hours', 'xss_clean|required');
            $this->form_validation->set_rules('distance', 'Distance', 'xss_clean|required');
            $this->form_validation->set_rules('min_cost', 'Minimum Cost', 'xss_clean|required');
            $this->form_validation->set_rules('charge_distance', 'Charge Per Distance', 'xss_clean|required');
            $this->form_validation->set_rules('charge_hour', 'Charge Per Hour', 'xss_clean|required');
           
			
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			
			$id = $this->input->post('update_rec_id');
			
			if($this->form_validation->run() == TRUE) 
			{
				$inputdata['vehicle_id'] 	= $this->input->post('vehicle_id');
                $inputdata['name'] 			= $this->input->post('name');
                $inputdata['hours'] 		= $this->input->post('hours');
                $inputdata['distance'] 		= $this->input->post('distance');
                $inputdata['min_cost'] 		= $this->input->post('min_cost');
                $inputdata['charge_distance']  = $this->input->post('charge_distance');
                $inputdata['charge_hour'] 	   = $this->input->post('charge_hour');
                $inputdata['terms_conditions'] = $this->input->post('terms_conditions');
                $inputdata['status'] 		   = $this->input->post('status');
            
                
				if($this->input->post('update_rec_id') > 0)
				{
					$where['id'] = $this->input->post('update_rec_id');
					if($this->base_model->update_operation($inputdata, TBL_PACKAGE_SETTINGS, $where))
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
                   
					$id = $this->base_model->insert_operation_id($inputdata, TBL_PACKAGE_SETTINGS);
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
				unset($inputdata, $where);
                
				if($msg != '')
					$this->prepare_flashmessage($msg, $status);
					redirect(site_url().'settings/packages', REFRESH);
			}
       }
		
		
		
		$pagetitle = $this->lang->line('add_package');
		if(isset($_POST['edit_package']))
		{
			$id = $this->input->post('id');
			if($id > 0)
			{
				$pagetitle = $this->lang->line('edit_package');
				$record = $this->base_model->fetch_records_from(TBL_PACKAGE_SETTINGS, array('id' => $id));
				if(empty($record)) 
				{
					$this->prepare_flashmessage($this->lang->line('no_details_found'), 2);
					redirect(site_url().'settings/packages');				
				}
				
				$this->data['record'] =	$record[0];
			}
			else
				redirect(site_url().'settings/packages');
		}
		
        //vehicle options
        $vehicle_options = $this->dvbs_model->get_vehicle_options();
        $this->data['vehicle_options'] = $vehicle_options;
       
		$this->data['css_type']      = array('form','ckeditor');
		$this->data['title']	     = $pagetitle;
		
		$this->data['active_class']  = "masterSettings";
		$this->data['content'] 		 = 'admin/settings/add_package_settings';
		$this->_render_page(TEMPLATE_ADMIN, $this->data); 
        	
    }
   
	/**
     * Waitings list
     *
     *
     * @return array
    **/ 
	public function waitings()
	{
        check_access('admin');
        
        $this->data['ajaxrequest'] = array(
			'url' => site_url().'settings/ajax_get_waitings',
			'disablesorting' => '0,4',
		);
		
		$this->data['css_type']     = array('datatable');
		
		$this->data['active_class'] = "masterSettings";
		
		$this->data['title'] 	    = $this->lang->line('waiting_time_settings');
		$this->data['content'] 		= "admin/settings/waitings";
		$this->_render_page(TEMPLATE_ADMIN, $this->data);
	}
    
    /**
     * Waitings list
     *
     *
     * @return array
    **/ 
    function ajax_get_waitings() 
    {
        
        if($this->input->is_ajax_request())
		{
			// return false;
			$data = array();
			$no = $_POST['start'];

			$conditions = array();

			$columns = array('waiting_time','cost','status');	
			
			$query 	= "SELECT * from ".TBL_PREFIX.TBL_WAITINGS." WHERE id!=''";
			
           
            
			$records = $this->base_model->get_datatables($query, 'customnew', $conditions, $columns, array('id'=>'desc'));
			
            
            
			if(!empty($records)) {

				foreach($records as $record)
				{
					$no++;
					$row = array();

					$row[] = '<input id="checkbox-'.$record->id.'" class="checkbox-custom checkbox_class" name="ids[]" type="checkbox" onclick="javascript:deselectall_check(\'selectall\')" value="'.$record->id.'">';
                    
					$row[] = '<span>'.$record->waiting_time.'</span>';
                   
                    $row[] = '<span>'.$record->cost.'</span>';
                    
                    
					$checked = '';
					$class = 'badge danger';
					if($record->status == 'Active'){
						$checked = ' checked';
						$class = 'badge success';	
					}
					$row[] = '<span class="'.$class.'">'.$record->status.'</span>';
					
                    
					$dta ='';
					$dta .= '<span>';
					$dta .= form_open(site_url().'settings/addedit_waiting');
					$dta .= '<input type="hidden" name="id" value="'.$record->id.'">';
					$dta .= '<button type="submit" name="edit_waiting" class="'.CLASS_EDIT_BTN.'"><i class="'.CLASS_ICON_EDIT.'" ></i></button>';
					$dta .= form_close();
					$dta .= '</span>';
					
					$str = $dta;
					
				
					$str .= '<a data-toggle="modal" class="btn btn-danger" data-target="#deletemodal" onclick="delete_record('.$record->id . ',\''.site_url().'settings/delete_waiting'.'\')">
						<i class="fa fa-trash" data-toggle="tooltip" data-placement="left" title="Remove"></i>
					</a>';
					
                     $str .= '<div class="digiCrud">
                      <div class="slideThree slideBlue">
                        
                        <input type="checkbox" value="' . $record->id . '" id="status_' . $record->id . '" name="check_' . $record->id . '" onclick="statustoggle(this, \'' .  site_url().'settings/waiting_statustoggle' .'\')"'.$checked . '/>
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
     * Delete Waiting
     *
     *
     * @return boolean
    **/ 
    function delete_waiting()
    {	
		if (!DEMO) {
            
            $id = $this->input->post('id');
            if(!empty($id))
            {			
                $ids = explode(',', $id);
                $details = $this->base_model->fetch_records_from_in(TBL_WAITINGS, 'id', $ids);
                
                if(!empty($details))
                {
                    
                    if ($this->base_model->delete_record_in(TBL_WAITINGS, 'id', $ids)) {
                        
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
     * Change status of Waiting
     *
     *
     * @return boolean
    **/ 
    function waiting_statustoggle()
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
                $this->base_model->update_operation_in( $filedata, TBL_WAITINGS, 'id', explode(',', $id) );
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
    
    /**
     * Add/Edit Waiting
     *
     *
     * @return boolean
    **/ 
    function addedit_waiting() 
    {
       if (isset($_POST['addedit_waiting']))
	   {
			$this->check_isdemo(site_url().'settings/waitings');
				
			$msg='';
			$status=0;
            
			
           $this->form_validation->set_rules('waiting_time', 'Waiting time', 'xss_clean|required');
		   $this->form_validation->set_rules('cost', 'Cost', 'xss_clean|required');
		   $this->form_validation->set_rules('status', 'Status', 'xss_clean');
			
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			
			$id = $this->input->post('update_rec_id');
			
			if($this->form_validation->run() == TRUE) 
			{
				$inputdata['waiting_time'] 	= $this->input->post('waiting_time');
				$inputdata['cost'] 			= $this->input->post('cost');
				$inputdata['status'] 		= $this->input->post('status');
            
                
				if($this->input->post('update_rec_id') > 0)
				{
					$where['id'] = $this->input->post('update_rec_id');
					if($this->base_model->update_operation($inputdata, TBL_WAITINGS, $where))
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
                   
					$id = $this->base_model->insert_operation_id($inputdata, TBL_WAITINGS);
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
				unset($inputdata, $where);
                
				if($msg != '')
					$this->prepare_flashmessage($msg, $status);
					redirect(site_url().'settings/waitings', REFRESH);
			}
       }
		
		
		
		$pagetitle = $this->lang->line('add_waiting_time');
		if(isset($_POST['edit_waiting']))
		{
			$id = $this->input->post('id');
			if($id > 0)
			{
				$pagetitle = $this->lang->line('edit_waiting_time');
				$record = $this->base_model->fetch_records_from(TBL_WAITINGS, array('id' => $id));
				if(empty($record)) 
				{
					$this->prepare_flashmessage($this->lang->line('no_details_found'), 2);
					redirect(site_url().'settings/waitings');				
				}
				
				$this->data['record'] =	$record[0];
			}
			else
				redirect(site_url().'settings/waitings');
		}
		
        
		$this->data['css_type']      = array('form');
		$this->data['title']	     = $pagetitle;
		
		$this->data['active_class']  = "masterSettings";
		$this->data['content'] 		 = 'admin/settings/add_waitings';
		$this->_render_page(TEMPLATE_ADMIN, $this->data); 
        	
    }
    
	
	
	 /**
     * Reasons to book with us
     *
     * @param string $param
     * @param string $param1
     * @return boolean
    **/ 
	public function reasonsToBook($param = '', $param1 = '')
	{	
		check_access('admin');
			
		$this->data['title'] 		= $this->lang->line('reasons_to_book_with_us');
		$this->data['active_class'] = "masterSettings";
		$this->data['css_type'] 	= array('form','ckeditor');
		$this->data['content'] 		= "admin/settings/add_reasons_to_book";
        
        
		$reasons_rec = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('reasons_to_book'));

		if (!empty($reasons_rec)) 
            $reasons_rec = $reasons_rec[0];
        
        $this->data['reasons_rec'] = $reasons_rec;
		
        
        
        
		$instructions_rec = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('instructions'));
        
		if(!empty($instructions_rec))
			$instructions_rec = $instructions_rec[0];
        
        $this->data['instructions_rec'] = $instructions_rec;
        
        
        
		if ($this->input->post('submit') == 'Update') {
            
            $msg='';
            $status=0;
            
			if ($param == "reasons") {
                
				$table_name = "reasons_to_book";
				$this->form_validation->set_rules('title', 'Title', 'xss_clean|required');
				$this->form_validation->set_rules('content', 'Content', 'xss_clean|required');
				$this->form_validation->set_rules('status', 'Status', 'xss_clean');
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				if ($this->form_validation->run() == TRUE) {
					
					$inputdata['title'] 	= $this->input->post('title');
					$inputdata['content'] 	= $this->input->post('content');
					$inputdata['status'] 	= $this->input->post('status');
					$where['id'] 			= $this->input->post('update_rec_id');

					// echo $this->input->post('update_rec_id');die();

					if ($this->base_model->update_operation($inputdata, $table_name, $where)) {
                        
                        $msg .= $table_name . " " . $this->lang->line('update_success');
                        $status =0 ;
                        
					} else {
                        $msg .= $this->lang->line('unable_to_update') . " " . $table_name;
                        $status =1 ;
					}
                    
                    $this->prepare_flashmessage($msg, $status);
                    redirect(site_url().'settings/reasonsToBook');
				}
                
			} else if ($param == "instructions") {
                
				$table_name 				= "instructions";
                
				$this->form_validation->set_rules('instructions_title', 'Title', 'xss_clean|required');
				$this->form_validation->set_rules('instructions_content', 'Content', 'xss_clean|required');
				$this->form_validation->set_rules('status', 'Status', 'xss_clean');
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                
				if ($this->form_validation->run() == TRUE) {
					
					$inputdata['title'] 	= $this->input->post('instructions_title');
					$inputdata['content'] 	= $this->input->post('instructions_content');
					$inputdata['status'] 	= $this->input->post('status');
					$where['id'] 			= $this->input->post('update_rec_id');


					if ($this->base_model->update_operation($inputdata, $table_name, $where)) {
                        
                        $msg .= $table_name . " " . $this->lang->line('update_success');
                        $status =0 ;
                        
					} else {
                        $msg .= $this->lang->line('unable_to_update') . " " . $table_name;
                        $status =1 ;
                       
					}
                    
                    $this->prepare_flashmessage($msg, $status);
                    redirect(site_url().'settings/reasonsToBook');
				}
			}
		}

		$this->_render_page(TEMPLATE_ADMIN, $this->data);
	}

	
	 /**
     * Social Networks
     *
     * @param string $param
     * @param string $param1
     * @return boolean
    **/ 
	public function social_networks($param = '', $param1 = '')
	{
        check_access('admin');
        
		$this->data['message'] = "";
        
		$network_settings = $this->config->item('social_networks');
        $this->data['record'] = $network_settings;
		
		$this->data['gmaps'] 				= "false";
		$this->data['css_type'] 			= array('form');
		$this->data['title'] 				= $this->lang->line('social_network_settings');
		$this->data['active_class'] 		= "masterSettings";
		$this->data['content'] 				= "admin/settings/add_social_networks";
        
		$table_name = "social_networks";
        
		if ($this->input->post('submit') == 'Update') {
            
			$this->check_isdemo(site_url().'settings/social_networks');
            
            $msg='';
            $status=0;
            
			$this->form_validation->set_rules('facebook', 'Facebook', 'xss_clean');
			$this->form_validation->set_rules('twitter', 'Twitter', 'xss_clean');
			$this->form_validation->set_rules('linkedin', 'Linkedin', 'xss_clean');
			$this->form_validation->set_rules('google_plus', 'Google+', 'xss_clean');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            
			if ($this->form_validation->run() == TRUE) {
				
				$inputdata['facebook'] 		= $this->input->post('facebook');
				$inputdata['twitter'] 		= $this->input->post('twitter');
				$inputdata['linkedin'] 		= $this->input->post('linkedin');
				$inputdata['google_plus'] 	= $this->input->post('google_plus');
                
				$where['id'] 				= $this->input->post('update_rec_id');
				if ($this->base_model->update_operation($inputdata, $table_name, $where)) {
                    
                    $msg .= $this->lang->line('update_success');
                    $status = 0;
					
				} else {
                    $msg .= $this->lang->line('update_failure');
                    $status = 1;
				}
                
                $this->prepare_flashmessage($msg, $status);
                redirect(site_url().'settings/social_networks', 'refresh');
			}
			
		}

		$this->_render_page(TEMPLATE_ADMIN, $this->data);
	}

	 /**
     * SEO Settings
     *
     *
     * @return boolean
    **/ 
    function seo_settings() 
    {
       if (isset($_POST['update_seo']))
	   {
			$this->check_isdemo(site_url().'settings/seo_settings');
				
			$msg='';
			$status=0;
            
			// FORM VALIDATIONS
            $this->form_validation->set_rules(
                                                'site_description', 
                                                'Site Description', 
                                                'xss_clean|required'
                                              );
            $this->form_validation->set_rules(
                                                'meta_description', 
                                                'Meta Description', 
                                                'xss_clean'
                                              );
            $this->form_validation->set_rules(
                                                'site_keywords', 
                                                'Site Keywords', 
                                                'xss_clean|required'
                                              );
            $this->form_validation->set_rules(
                                                'google_analytics', 
                                                'Google Analytics', 
                                                'xss_clean'
                                              );
        
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			
			$id = $this->input->post('update_rec_id');
			
			if($this->form_validation->run() == TRUE) 
			{
				$inputdata['site_description'] 	= $this->input->post('site_description');
                $inputdata['meta_description'] 	= $this->input->post('meta_description');
                $inputdata['site_keywords'] 	= $this->input->post('site_keywords');
                $inputdata['google_analytics'] 	= $this->input->post('google_analytics');
                
                $where['id'] 					= $this->input->post('update_rec_id');
        
                if($this->base_model->update_operation($inputdata, TBL_SEO_SETTINGS, $where))
                {
                    $msg .= $this->lang->line('details_saved_successfully');
                    $status = 0;
                }
                else
                {
                    $msg .= $this->lang->line('details_not_saved');
                    $status = 1;
                }
				
				unset($inputdata, $where);
               
				if ($msg != '')
					$this->prepare_flashmessage($msg, $status);
					redirect(site_url().'settings/seo_settings', REFRESH);
			} 
           
       }
        
        $seo_settings = $this->config->item('seo_settings');
        $this->data['record']        = $seo_settings;
        
        $this->data['css_type']      = array('form','ckeditor');
		$this->data['title']	     = $this->lang->line('seo_settings');
		
		$this->data['active_class']  = "masterSettings";
		$this->data['content'] 		 = 'admin/settings/add_seo_settings';
		$this->_render_page(TEMPLATE_ADMIN, $this->data); 
        
    }

	
	 /**
     * Placeholder Settings
     *
     *
     * @return boolean
    **/ 
	public function placeholder_settings()
	{
        check_access('admin');
        
		$this->data['message'] 				= "";
        
		if ($this->input->post('submit') == 'Update') {
            
           

			$this->check_isdemo(site_url().'settings/placeholder_settings');
            
            $msg='';
            $status=0;
            
			// FORM VALIDATIONS
			$this->form_validation->set_rules('pick_point_placeholder', 'Placeholder For Pick-Point', 'trim|xss_clean');
			$this->form_validation->set_rules('drop_point_placeholder', 'Placeholder For Drop-Point', 'trim|xss_clean');

			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

			if ($this->form_validation->run() == TRUE) {

				$inputdata['pick_point_placeholder'] = $this->input->post('pick_point_placeholder');
				$inputdata['drop_point_placeholder'] = $this->input->post('drop_point_placeholder');

				$table_name 				= "site_settings";
				$where['id'] 				= $this->input->post('update_record_id');
				if ($this->base_model->update_operation($inputdata, $table_name, $where)) 
                {
                    $msg .= $this->lang->line('update_success');
                    $status = 0;
				} 
                else 
                {
                    $msg .= $this->lang->line('update_failure');
                    $status = 1;
                }
                
                $this->prepare_flashmessage($msg, $status);
                
				redirect(site_url().'settings/placeholder_settings', 'refresh');
			}
		}

		$this->data['css_type'] = array('form');
		$this->data['gmaps'] 				= "false";
		$this->data['active_class'] 		= "masterSettings";
		$this->data['title'] 				= $this->lang->line('placeholder_settings');
		$this->data['content'] 				= "admin/settings/placeholder_settings";
        
		$this->_render_page(TEMPLATE_ADMIN, $this->data);
	}
    
    
     /**
     * SMS Gateways
     *
     *
     * @return boolean
    **/ 
	function sms_gateways()
	{
        check_access('admin');
         
		$records = array();
		$records = $this->base_model->fetch_records_from(TBL_SMS_GATEWAYS);
		$this->data['records'] 		 = $records;
		$this->data['css_type']      = array('datatable');
		$this->data['title']	     = $this->lang->line('sms_gateways');
		$this->data['gmaps'] 		 = "false";
		$this->data['active_class']  = "masterSettings";
		
		$this->data['content'] 		 = 'admin/settings/sms_gateways';
		$this->_render_page(TEMPLATE_ADMIN, $this->data);
	}
    
    
     /**
     * UPDATE SMS FIEDL VALUES
     *
     *
     * @return boolean
    **/ 
	function update_sms_field_values()
	{	
        check_access('admin');
         
		$msg='';
		$status=0;
		
		if(isset($_POST['edit_sms_gateway']))
		{
			
			$sms_gateway_id = $this->input->post('sms_gateway_id');
			if($sms_gateway_id > 0)
			{
				$sms_gateway_details = $this->base_model->fetch_records_from(TBL_SETTINGS_FIELDS, array('sms_gateway_id'=>$sms_gateway_id));
				
				$sms_gateways = $this->base_model->fetch_records_from(
				TBL_SMS_GATEWAYS, array('sms_gateway_id'=>$sms_gateway_id));
				
				if(empty($sms_gateway_details) || empty($sms_gateways))
				{
					$msg .= 'Record Not Found';
					$status=1;
					
				    $this->prepare_flashmessage($msg, $status);
					redirect('settings/sms_gateways');
				}
				else
				{
					$this->data['sms_gateway_details']= $sms_gateway_details;
					
                    $this->data['css_type'] 	= array('form');
                    
					$this->data['active_class'] = "masterSettings";
					$this->data['gmaps'] 		= "false";
					$this->data['title']        = $sms_gateways[0]->sms_gateway_name; 
					$this->data['content'] = 'admin/settings/sms_update_field_values';
					$this->_render_page(TEMPLATE_ADMIN, $this->data);
				}
			}
			else
				redirect('settings/sms_gateways');
		}
		else if(isset($_POST['update_sms_gateway']))
		{
			
			$this->check_isdemo(site_url().'settings/sms_gateways');
            
			$field_values  = $this->input->post();
			
			foreach($field_values as $field_id => $val) 
			{
				$fld_id = explode('_', $field_id);
				if(is_array($fld_id) && isset($fld_id[1]))
				{
					$data  = array();
					$data  = array(
						'field_output_value' => $val,
						'updated' => date('Y-m-d H:i:s'));
					$where = array('field_id' => $fld_id[1]);
					$this->base_model->update_operation($data, TBL_SETTINGS_FIELDS, $where);
					unset($data, $where);
				}
			}	
			$msg .= 'Details Updated Successfully';
			$status=0;
			
			$this->prepare_flashmessage($msg, $status);
			redirect('settings/sms_gateways', 'refresh');	
		}
		else
			redirect('settings/sms_gateways');
	}
    
    
	
	/**
     * Make default SMS Gateway
     *
     *
     * @return boolean
    **/ 
	function makedefault()
	{
        check_access('admin');
         
		$msg='';
		$status=0;
		if(isset($_POST['sms_gateway']))
		{
         

			$this->check_isdemo(site_url().'settings/sms_gateways');
            
			$details = $this->base_model->fetch_records_from(TBL_SMS_GATEWAYS);
			
			if(!empty($details))
			{
				$this->db->query('UPDATE '.TBL_PREFIX.TBL_SMS_GATEWAYS.' SET is_default="No"');
				
				$sms_gateway_id = $this->input->post('sms_gateway_id');
				if($sms_gateway_id > 0)
				{
					if($this->db->query('UPDATE '.TBL_PREFIX.TBL_SMS_GATEWAYS.' SET is_default="Yes" WHERE sms_gateway_id = '.$sms_gateway_id))
					{
						$msg .= 'Updated Successfully';
						$status = 0;
					}
					else
					{
						$msg .= 'Not Updated';
						$status = 1;
					}
				}
				else
				{
					$msg .= 'Invalid Operation';
					$status = 1;
				}
			}
		}
		if($msg != '')
		$this->prepare_flashmessage($msg, $status);
		redirect('settings/sms_gateways', 'refresh');		
	}
	
    
    /**
     * List SMS Templates
     *
     *
     * @return array
    **/ 
	function sms_templates()
	{
        check_access('admin');
         
		if(isset($_POST['edit_template']))
		{
			$sms_template_id = $this->input->post('sms_template_id');
			if($sms_template_id > 0)
			{
				$template	= $this->base_model->fetch_records_from(TBL_SMS_TEMPLATES, array('sms_template_id'=>$sms_template_id));
				
				if(!empty($template))
				{
					$this->data['record'] 		 = $template[0];
					
					$this->data['title']	     = 'Edit SMS Template';
					$this->data['gmaps'] 		 = "false";
					$this->data['active_class']  = "masterSettings";
                    $this->data['css_type']      = array('form');
			
					$this->data['content'] 		 = 'admin/settings/edit_sms_template';
				}
				else
					redirect('settings/sms_templates');
			}
			else
				redirect('settings/sms_templates');
		}
		else if(isset($_POST['update_sms_template']))
		{
			$this->check_isdemo(site_url().'settings/sms_templates');
            
			$msg='';
			$status=0;
			
			$sms_template_id = $this->input->post('sms_template_id');
			if($sms_template_id > 0)
			{
				$this->form_validation->set_rules('subject', $this->lang->line('subject'), 'required');
				$this->form_validation->set_rules('sms_template', $this->lang->line('sms_template'), 'required');
			
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				
				if($this->form_validation->run()==TRUE)
				{
					
					$data = array();
					$data['subject'] 	  = $this->input->post('subject');
					$data['sms_template'] = $this->input->post('sms_template');
					
					$where = array('sms_template_id'=>$sms_template_id);
					if($this->base_model->update_operation($data, TBL_SMS_TEMPLATES, $where)) 
					{
						unset($data);
						$msg  .= 'Details Updated Successfully';
						$status= 0;
					}
					else
					{
						$msg   .= 'Details not Updated';
						$status = 1;
					}
					
					$this->prepare_flashmessage($msg, $status);
					redirect('settings/sms_templates', 'refresh');
				}
			}
			else
				redirect('settings/sms_templates');
		}
		else
		{
			$records = array();
			$records = $this->base_model->fetch_records_from(TBL_SMS_TEMPLATES);
			$this->data['records'] 		 = $records;
			
			$this->data['title']	     = $this->lang->line('sms_templates');
			$this->data['gmaps'] 		 = "false";
			$this->data['active_class']  = "masterSettings";
			$this->data['css_type']      = array('datatable');
			
			$this->data['content'] 		 = 'admin/settings/sms_templates';
		}
		$this->_render_page(TEMPLATE_ADMIN, $this->data);
	}
    
    
   
    /**
     * List Email templates
     *
     *
     * @return array
    **/ 
	function email_templates()
	{
        check_access('admin');
         
		if(isset($_POST['edit_template']))
		{
			$id = $this->input->post('id');
			if($id > 0)
			{
				$template	= $this->base_model->fetch_records_from(TBL_EMAIL_TEMPLATES, array('id'=>$id));
				
				if(!empty($template))
				{
					$this->data['record'] 		 = $template[0];
					
					$this->data['title']	     = 'Edit Email Template';
					
                    $this->data['gmaps'] 		 = "false";
                    $this->data['active_class']  = "masterSettings";
                    $this->data['css_type']      = array('form','ckeditor');
			
            
					$this->data['content'] 		 = 'admin/settings/edit_email_template';
				}
				else
					redirect(URL_EMAIL_TEMPLATES);
			}
			else
				redirect(URL_EMAIL_TEMPLATES);
		}
		else if(isset($_POST['update_email_template']))
		{
           
			$this->check_isdemo(site_url().'settings/email_templates');
            
			$msg='';
			$status=0;
			
			$id = $this->input->post('id');
			if($id > 0)
			{
				$this->form_validation->set_rules('subject', $this->lang->line('subject'), 'required');
				$this->form_validation->set_rules('email_template', $this->lang->line('email_template'), 'required');
			
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				
				if($this->form_validation->run()==TRUE)
				{
					$data = array();
					$data['subject'] 		= $this->input->post('subject');
					$data['email_template'] = $this->input->post('email_template');
					
					$where = array('id'=>$id);
					if($this->base_model->update_operation($data, TBL_EMAIL_TEMPLATES, $where)) 
					{
						unset($data);
						$msg  .= 'Details Updated Successfully';
						$status= 0;
					}
					else
					{
						$msg   .= 'Details Not Updated';
						$status = 1;
					}
					
					$this->prepare_flashmessage($msg, $status);
					redirect('settings/email_templates', 'refresh');
				}
			}
			else
				redirect('settings/email_templates');
		}
		else
		{
			$records = array();
			$records = $this->base_model->fetch_records_from(TBL_EMAIL_TEMPLATES);
			$this->data['records'] 		 = $records;
			
			$this->data['title']	     = $this->lang->line('email_templates');
			$this->data['gmaps'] 		 = "false";
			$this->data['active_class']  = "masterSettings";
			$this->data['css_type']      = array('datatable');
			
			$this->data['content'] 		 = 'admin/settings/email_templates';
		}
		$this->_render_page(TEMPLATE_ADMIN, $this->data);
	}
    
    
    
    
    /**
     * CURD OPERATIONS FUNCTION FOR AIRPORT LOCATIONS
     *
     * @param string $param
     * @param string $param1
     * @return boolean
    **/ 
	public function airportLocations($param = '', $param1 = '')
	{
		check_access('admin');
        
		$this->data['css_type'] = array('datatable');
        
		$this->data['title'] 				= $this->lang->line('airport_locations');
		$this->data['content'] 				= "admin/settings/airport_locations";
		if ($param == "Add") {
			if ($this->input->post('submit') == 'Add') {

				$this->check_isdemo(site_url().'airportLocations');

				// FORM VALIDATIONS

				$this->form_validation->set_rules('location_name', 'Airport Location Name', 'xss_clean|required');
				$this->form_validation->set_rules('status', 'Status', 'xss_clean');
				if ($this->form_validation->run() == TRUE) {
					$inputdata['location_name'] = $this->input->post('location_name');
					$inputdata['status'] = $this->input->post('status');
					$table_name = "airport_locations";
					if ($this->base_model->insert_operation($inputdata, $table_name)) {
						$this->prepare_flashmessage($this->lang->line('location_name') . " " . $this->lang->line('add_success'), 0);
						redirect('settings/airportLocations', 'refresh');
					}
					else {
						$this->prepare_flashmessage($this->lang->line('unable_to_add') . " " . $this->lang->line('location_name'), 1);
						redirect('settings/airportLocations');
					}
				}
				else {
					$this->prepare_flashmessage(validation_errors(), 1);
					redirect('settings/airportLocations/' . $this->lang->line('add'));
				}
			}

			$this->data['css_type'] = array('form');
			$this->data['title'] 			= $this->lang->line('add') . 
												" " . $this->lang->line('airport') . 
												" " . $this->lang->line('location_name');
			$this->data['gmaps'] 			= "false";
			$this->data['operation'] 		= "Add";
			$this->data['content'] 			= "admin/settings/add_airport_locations";
		}
		elseif ($param == "Edit") {
			$table_name = "airport_locations";
			if ($this->input->post('submit') == 'Update') {

				$this->check_isdemo(site_url().'airportLocations');

				// FORM VALIDATIONS

				$this->form_validation->set_rules('location_name', 'Airport Location Name', 'xss_clean|required');
				$this->form_validation->set_rules('status', 'Status', 'xss_clean');
				if ($this->form_validation->run() == TRUE) {
					$inputdata['location_name'] = $this->input->post('location_name');
					$inputdata['status'] = $this->input->post('status');
					$where['id'] = $this->input->post('update_rec_id');
					if ($this->base_model->update_operation($inputdata, $table_name, $where)) {
						$this->prepare_flashmessage($this->lang->line('location_name') . " " . $this->lang->line('update_success'), 0);
						redirect('settings/airportLocations', 'refresh');
					}
					else {
						$this->prepare_flashmessage($this->lang->line('unable_to_update') . " " . $this->lang->line('location_name'), 1);
						redirect('settings/airportLocations');
					}
				}
				else {
					$this->prepare_flashmessage(validation_errors(), 1);
					redirect('settings/airportLocations/Edit/' . $this->input->post('update_rec_id'));
				}
			}

			$cond = "id";
			$cond_val = $param1;
			if (!is_numeric($param1) || !$this->base_model->check_duplicate($table_name, $cond, $cond_val)) {
				$this->prepare_flashmessage($this->lang->line('invalid') . " " . $this->lang->line('operation'), 1);
				redirect('settings/airportLocations', 'refresh');
			}

			$airport_loc_rec = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('airport_locations') . " WHERE id = " . $param1);
			$this->data['airport_loc_rec'] 	= $airport_loc_rec[0];
			$this->data['css_type'] 		= array('form');
			$this->data['gmaps'] 			= "false";
			$this->data['title'] 			= $this->lang->line('edit') .
												" " . $this->lang->line('airport');
			$this->data['operation'] 		= "Edit";
			$this->data['content'] 			= "admin/settings/add_airport_locations";
		}
		elseif ($param == "Delete") {
			$table_name 					= "airport_locations";
			$where['id'] 					= $param1;
			$cond 							= "id";
			$cond_val 						= $param1;
			if ($this->base_model->check_duplicate($table_name, $cond, $cond_val) && is_numeric($param1)) {
				if ($this->base_model->delete_record($table_name, $where)) {
					$this->prepare_flashmessage($this->lang->line('location_name') . " " . $this->lang->line('delete_success'), 0);
					redirect('settings/airportLocations', 'refresh');
				}
				else {
					$this->prepare_flashmessage($this->lang->line('unable_to_delete') . " " . $this->lang->line('airport'), 1);
					redirect('settings/airportLocations');
				}
			}
			else {
				$this->prepare_flashmessage($this->lang->line('invalid') . " " . $this->lang->line('operation'), 1);
				redirect('settings/airportLocations', 'refresh');
			}
		}
		elseif ($param1 == "") {
			$airport_locations = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('airport_locations'));
			if (count($airport_locations) > 0) $this->data['airport_locations'] = $airport_locations;
			else $this->data['airport_locations'] = array();
		}

		$this->_render_page(getTemplate(), $this->data);
	}

	
	/**
     * CURD OPERATIONS FUNCTION FOR AIRPORT CARS
     *
     * @param string $param
     * @param string $param1
     * @return boolean
    **/ 
	public function airportCars($param = '', $param1 = '')
	{
		check_access('admin');
        
		$this->data['css_type'] 			= array('datatable');
		$this->data['title'] 				= $this->lang->line('airport_cars');
		$this->data['content'] 				= "admin/settings/airport_cars";
		if ($param == "Add") {
			if ($this->input->post('submit') == 'Add') {

				$this->check_isdemo(site_url().'airportCars');

				// FORM VALIDATIONS

				$this->form_validation->set_rules('airport', 'Airport', 'xss_clean|required');
				$this->form_validation->set_rules('location', 'Location', 'xss_clean|required');
				$this->form_validation->set_rules('vehicle', 'Vehicle', 'xss_clean|required');
				$this->form_validation->set_rules('cost', 'Cost', 'xss_clean|required');
				$this->form_validation->set_rules('status', 'Status', 'xss_clean');
				if ($this->form_validation->run() == TRUE) {
					$inputdata['airport_id'] = $this->input->post('airport');
					$inputdata['location_id'] = $this->input->post('location');
					$inputdata['vehicle_id'] = $this->input->post('vehicle');
					$inputdata['cost'] = $this->input->post('cost');
					$inputdata['status'] = $this->input->post('status');
					$table_name = "airport_cars";
					if ($this->base_model->insert_operation($inputdata, $table_name)) {
						$this->prepare_flashmessage($this->lang->line('airport_car') . " " . $this->lang->line('add_success'), 0);
						redirect('settings/airportCars', 'refresh');
					}
					else {
						$this->prepare_flashmessage($this->lang->line('unable_to_add') . " " . $this->lang->line('airport_car'), 1);
						redirect('settings/airportCars');
					}
				}
				else {
					$this->prepare_flashmessage(validation_errors(), 1);
					redirect('settings/airportCars/' . $this->lang->line('add'));
				}
			}

			$airport_options 				= array();
			$location_options 				= array();
			$vehicle_options 				= array();
			$this->data['airports'] = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('airports') . " WHERE status = 'Active'");
			foreach($this->data['airports'] as $row) $airport_options[$row->id] = $row->airport_name;
			$this->data['loactions'] = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('airport_locations') . " WHERE status = 'Active'");
			foreach($this->data['loactions'] as $row) $location_options[$row->id] = $row->location_name;
			$this->data['vehicles'] = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('vehicle') . " WHERE status = 'Active'");
			foreach($this->data['vehicles'] as $row) $vehicle_options[$row->id] = $row->name;
			$this->data['airport_options'] 	= $airport_options;
			$this->data['location_options'] = $location_options;
			$this->data['vehicle_options'] 	= $vehicle_options;
			$this->data['css_type'] 		= array('form');
			$this->data['gmaps'] 			= "false";
			$this->data['title'] 			= $this->lang->line('add') . 
												" " . $this->lang->line('airport_cars');
			$this->data['operation'] 		= "Add";
			$this->data['content'] 			= "admin/settings/add_airport_cars";
		}
		elseif ($param == "Edit") {
			$table_name 					= "airport_cars";
			if ($this->input->post('submit') == 'Update') {

				$this->check_isdemo(site_url().'airportCars');

				// FORM VALIDATIONS

				$this->form_validation->set_rules('airport', 'Airport', 'xss_clean|required');
				$this->form_validation->set_rules('location', 'Location', 'xss_clean|required');
				$this->form_validation->set_rules('vehicle', 'Vehicle', 'xss_clean|required');
				$this->form_validation->set_rules('cost', 'Cost', 'xss_clean|required');
				$this->form_validation->set_rules('status', 'Status', 'xss_clean');
				if ($this->form_validation->run() == TRUE) {
					$inputdata['airport_id']  = $this->input->post('airport');
					$inputdata['location_id'] = $this->input->post('location');
					$inputdata['vehicle_id']  = $this->input->post('vehicle');
					$inputdata['cost'] 		  = $this->input->post('cost');
					$inputdata['status']      = $this->input->post('status');
					$where['id']              = $this->input->post('update_rec_id');
					if ($this->base_model->update_operation($inputdata, $table_name, $where)) {
						$this->prepare_flashmessage($this->lang->line('airport_car') . " " . $this->lang->line('update_success'), 0);
						redirect('settings/airportCars', 'refresh');
					}
					else {
						$this->prepare_flashmessage($this->lang->line('unable_to_update') . " " . $this->lang->line('airport_car'), 1);
						redirect('settings/airportCars');
					}
				}
				else {
					$this->prepare_flashmessage(validation_errors(), 1);
					redirect('settings/airportCars/Edit/' . $this->input->post('update_rec_id'));
				}
			}

			$cond = "id";
			$cond_val = $param1;
			if (!is_numeric($param1) || !$this->base_model->check_duplicate($table_name, $cond, $cond_val)) {
				$this->prepare_flashmessage($this->lang->line('invalid') . " " . $this->lang->line('operation'), 1);
				redirect('settings/airportCars', 'refresh');
			}

			$airport_options 				= array();
			$location_options 				= array();
			$vehicle_options 				= array();
			$this->data['airports'] 		= $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('airports') . " WHERE status = 'Active'");
			foreach($this->data['airports'] as $row) $airport_options[$row->id] = $row->airport_name;
			$this->data['loactions'] = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('airport_locations') . " WHERE status = 'Active'");
			foreach($this->data['loactions'] as $row) $location_options[$row->id] = $row->location_name;
			$this->data['vehicles'] = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('vehicle') . " WHERE status = 'Active'");
			foreach($this->data['vehicles'] as $row) $vehicle_options[$row->id] = $row->name;
			$this->data['airport_options'] = $airport_options;
			$this->data['location_options'] = $location_options;
			$this->data['vehicle_options'] = $vehicle_options;
			$airport_car = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('airport_cars') . " WHERE id = " . $param1);
			$this->data['airport_car'] 		= $airport_car[0];
			$this->data['css_type'] 		= array('form');
			$this->data['gmaps'] 			= "false";
			$this->data['title'] 			= $this->lang->line('edit') .
												" " . $this->lang->line('airport_car');
			$this->data['operation'] 		= "Edit";
			$this->data['content'] 			= "admin/settings/add_airport_cars";
		}
		elseif ($param == "Delete") {

			$this->check_isdemo(site_url().'airportCars');
			
			$table_name 					= "airport_cars";
			$where['id'] 					= $param1;
			$cond 							= "id";
			$cond_val 						= $param1;
			if ($this->base_model->check_duplicate($table_name, $cond, $cond_val) && is_numeric($param1)) {
				if ($this->base_model->delete_record($table_name, $where)) {
					$this->prepare_flashmessage($this->lang->line('airport_car') . " " . $this->lang->line('delete_success'), 0);
					redirect('settings/airportCars', 'refresh');
				}
				else {
					$this->prepare_flashmessage($this->lang->line('unable_to_delete') . " " . $this->lang->line('airport_car'), 1);
					redirect('settings/airportCars');
				}
			}
			else {
				$this->prepare_flashmessage($this->lang->line('invalid') . " " . $this->lang->line('operation'), 1);
				redirect('settings/airportCars', 'refresh');
			}
		}
		elseif ($param1 == "") {
			$airport_cars = $this->base_model->run_query("SELECT ac.* , a.airport_name , al.location_name , v.name FROM vbs_airport_cars as ac , vbs_airports as a , vbs_airport_locations as al , vbs_vehicle as v WHERE ac.airport_id = a.id AND ac.location_id = al.id AND ac.vehicle_id = v.id");
			if (count($airport_cars) > 0) $this->data['airport_cars'] = $airport_cars;
			else $this->data['airport_cars'] = array();
		}

		$this->_render_page(getTemplate(), $this->data);
	}
    
    /**
     * Online booking
     *
     *
     * @return array
    **/ 
    public function onlinebooking()
    {
		check_access('admin');
		$this->data['css_type'] 			= array();
		$this->data['content'] 				= "site/onlinebooking";
		$this->_render_page('templates/site_form_template', $this->data);
    }
}
