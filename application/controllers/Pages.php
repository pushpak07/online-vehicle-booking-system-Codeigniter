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
 * @category  Pages
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
 * Pages.
 *
 * @category  Pages
 * @package   DOVBSV2
 * @author    DOVBSV2 <digitalvidhya4u@gmail.com>
 * @copyright 2017 - 2018, DOVBSV2
 * @license   http://opensource.org/licenses/MIT    MIT License
 * @link      http://codeigniter.com
 */
class Pages extends MY_Controller
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
	| MODULE: 			Pages
	| -----------------------------------------------------
	| This is Pages module controller file.
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
     * Pages list
     *
     *
     * @return array
    **/ 
	function index()
	{
		$this->data['ajaxrequest'] = array(
			'url' => site_url().'pages/ajax_get_list',
			'disablesorting' => '0,5',
		);
		
		$this->data['css_type']     = array('datatable');
		
		$this->data['active_class'] = "page";
		
		$this->data['message'] 		= $this->session->flashdata('message');
		$this->data['title'] 	    = $this->lang->line('pages');
		$this->data['content'] 		= "admin/pages/pages";
		$this->_render_page(TEMPLATE_ADMIN, $this->data);	
	}
    
	/**
     * Pages list
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

			$columns = array('name','description','meta_tag','meta_description','seo_keywords','is_bottom','sort_order','parent_id','status');	
			
			$query 	= "SELECT * from ".TBL_PREFIX.TBL_ABOUTUS." WHERE id!=''";
			
           
			$records = $this->base_model->get_datatables($query, 'customnew', $conditions, $columns, array('id'=>'asc'));
			
            
			if(!empty($records)) {

				foreach($records as $record)
				{
					$no++;
					$row = array();

					$row[] = '<input id="checkbox-'.$record->id.'" class="checkbox-custom checkbox_class" name="ids[]" type="checkbox" onclick="javascript:deselectall_check(\'selectall\')" value="'.$record->id.'">';
                    
					$row[] = '<span>'.$record->name.'</span>';
                   
                    $row[] = '<span>'.$record->is_bottom.'</span>';
                    
                    $row[] = '<span>'.$record->sort_order.'</span>';
                    
                    $row[] = '<span>'.$record->parent_id.'</span>';
                    
                   
                    
					$checked = '';
					$class = 'badge danger';
					if($record->status == 'Active'){
						$checked = ' checked';
						$class = 'badge success';	
					}
					$row[] = '<span class="'.$class.'">'.$record->status.'</span>';
					
                    
					$dta ='';
					$dta .= '<span>';
					$dta .= form_open(site_url().'pages/addedit');
					$dta .= '<input type="hidden" name="id" value="'.$record->id.'">';
					$dta .= '<button type="submit" name="edit_page" class="'.CLASS_EDIT_BTN.'"><i class="'.CLASS_ICON_EDIT.'" ></i></button>';
					$dta .= form_close();
					$dta .= '</span>';
					
					$str = $dta;
					
				
					$str .= '<a data-toggle="modal" class="btn btn-danger" data-target="#deletemodal" onclick="delete_record('.$record->id . ',\''.site_url().'pages/delete_record'.'\')">
						<i class="fa fa-trash" data-toggle="tooltip" data-placement="left" title="Remove"></i>
					</a>';
					
                     $str .= '<div class="digiCrud">
                      <div class="slideThree slideBlue">
                        
                        <input type="checkbox" value="' . $record->id . '" id="status_' . $record->id . '" name="check_' . $record->id . '" onclick="statustoggle(this, \'' .  site_url().'pages/statustoggle' .'\')"'.$checked . '/>
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
     * Add/Edit Page
     *
     *
     * @return boolean
    **/ 
    function addedit()
    {
		if (isset($_POST['addedit_page']))
		{
			
			$this->check_isdemo(site_url().'pages');
				
			$msg='';
			$status=0;
            
			$this->form_validation->set_rules('title', 'Title', 'xss_clean|required');
            $this->form_validation->set_rules('description', 'Description');
            $this->form_validation->set_rules('meta_tag', 'Meta Tag');
            $this->form_validation->set_rules('meta_tag_keywords', 'Meta Description');
            $this->form_validation->set_rules('seo_keywords', 'SEO Keywords');
            $this->form_validation->set_rules('bottom', 'Bottom', 'xss_clean');
            $this->form_validation->set_rules('sort_order', 'Sort Order', 'xss_clean');
            
			
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			
			$id = $this->input->post('id');
			
			if($this->form_validation->run() == TRUE) 
			{
				$data = array();
				
				$data['name']               = $this->input->post('title');
				$data['description']        = $this->input->post('description');
				$data['meta_tag']		    = $this->input->post('meta_tag');
                
				$data['meta_description']   = $this->input->post('meta_tag_keywords');
                
                $data['seo_keywords']		= $this->input->post('seo_keywords');
                
                $data['is_bottom']		    = $this->input->post('bottom');
                $data['sort_order']		    = $this->input->post('sort_order');
                $data['parent_id']		    = $this->input->post('under_category');
                $data['status']		        = $this->input->post('status');
                
                
                
				if($this->input->post('id') > 0)
				{
					$where['id'] = $this->input->post('id');
					if($this->base_model->update_operation($data, TBL_ABOUTUS, $where))
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
					$id = $this->base_model->insert_operation_id($data, TBL_ABOUTUS);
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
					redirect(site_url().'pages', REFRESH);
			}
		}
		
		
		
		$pagetitle = $this->lang->line('add_page');
		if(isset($_POST['edit_page']))
		{
			$id = $this->input->post('id');
			if($id > 0)
			{
				$pagetitle = $this->lang->line('edit_page');
				$record = $this->base_model->fetch_records_from(TBL_ABOUTUS, array('id' => $id));
				if(empty($record)) 
				{
					$this->prepare_flashmessage($this->lang->line('no_details_found'), 2);
					redirect(site_url().'pages');				
				}
				
				$this->data['record'] =	$record[0];
			}
			else
				redirect(site_url().'pages');
		}
		
        //parent pages options
        $category_options = $this->dvbs_model->parent_pages_options();
        $this->data['category_options'] = $category_options;
        
        
		$this->data['css_type']      = array('form','ckeditor');
		$this->data['title']	     = $pagetitle;
		
		$this->data['active_class']  = "page";
		$this->data['content'] 		 = 'admin/pages/addedit';
		$this->_render_page(TEMPLATE_ADMIN, $this->data);
    }
    
    /**
     * Delete Page
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
                $details = $this->base_model->fetch_records_from_in(TBL_ABOUTUS, 'id', $ids);
                
                if(!empty($details))
                {
                    
                    if ($this->base_model->delete_record_in(TBL_ABOUTUS, 'id', $ids)) {
                        
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
     * Change status of Page
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
                $this->base_model->update_operation_in( $filedata, TBL_ABOUTUS, 'id', explode(',', $id) );
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
