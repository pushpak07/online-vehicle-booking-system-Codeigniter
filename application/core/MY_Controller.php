<?php 
ob_start();
class MY_Controller extends CI_Controller
{
	protected $data;
    
	function __construct()
	{

		parent::__construct();

		
		$this->data['isnewmember'] = false;
		
		$this->data['site_settings'] = $this->config->item('site_settings');
		
		setlocale(LC_MONETARY, "en_".strtoupper($this->config->item('site_settings')->site_country)); //'en_US'
		date_default_timezone_set($this->config->item('site_settings')->time_zone);
		$this->data['country_code'] = $this->config->item('site_settings')->site_country;
		

		
		/*** DATE FORMATS ***/
		$this->data['date_format'] = $this->config->item('date_format'); /* Like y-m-d etc.*/
		$this->data['seperator'] = $this->config->item('seperator');
		$this->data['date_elem1'] = $this->config->item('date_elem1');
		$this->data['date_elem2'] = $this->config->item('date_elem2');
		$this->data['date_elem3'] = $this->config->item('date_elem3');
		$this->db->query('SET sql_mode = ""'); //For MySQl >5.4		
		
	}
			
			function validate_admin()	{		
			$this->load->library('ion_auth');		
				if($this->ion_auth->logged_in())
				{
					if(!$this->ion_auth->is_admin())		
					{			
					
					$this->prepare_flashmessage("You have no access to this module",1);			
					redirect('user', 'refresh');		
					}
					return true;
				}
				else
				{
					$this->prepare_flashmessage("Please Login to continue..",1);			
					redirect('auth/login', 'refresh');
				}			
			}																							
	public function default_language()
	{
		return $this->config->item('site_settings')->default_language;
	}
	
	function is_valid($id=0)
	{
		if($id==0)
		return FALSE;
		
		$recs = $this->session->userdata('logindata');
		
		if(count($recs)>0)
		{
			if($recs->user_group_id==1)
			{
				// ADMIN
				//redirect('admin/index');
				return TRUE;
				
			}
			else if($recs->user_group_id==2)
			{
				//USER
				$this->prepare_flashmessage("You have no permission to view",3);
				redirect('users/dashboard');
			}
			
		}
		
		//NOT LOGGED IN
		 		$this->prepare_flashmessage("Session Expired..",1);
				redirect('users/login');
	}
	
	
	function render_admin_view()
	{
		
		if($this->is_valid(1))
		{
		
			$this->load->view('admin/common/header',$this->header_data);
			$this->load->view('admin/common/left',$this->left_data);
			
			
			$this->load->view('admin/common/footer');
		}
		
		
	}
	
	
	

	function send_mail($to, $subject, $message, $cc = array(), $bcc = array())

	{

		$this->load->library('email');

		

		$config['mailtype'] = 'html';

		$this->email->initialize($config);

		

		$this->email->from('adiyya@gmail.com', 'Adiyya Tadikamalla');

		$this->email->to( $to );

		if( $cc != '' )

		$this->email->cc($cc);

		if( $bcc != '' )

		$this->email->bcc( $bcc );

		$this->email->subject( $subject );

		$this->email->message( $message );

		$this->email->send();

	}

	

	function create_thumbnail($sourceimage,$newpath, $width, $height)
	{

		$this->load->library('image_lib');

		$this->image_lib->clear();

		$config['image_library'] = 'gd2';

		$config['source_image'] = $sourceimage;

		$config['create_thumb'] = TRUE;

		$config['new_image'] = $newpath;

		$config['dynamic_output'] = FALSE;

		$config['maintain_ratio'] = TRUE;

		$config['width'] = $width;

		$config['height'] = $height;

	    $config['thumb_marker'] = '';

		

		$this->image_lib->initialize($config); 

		return $this->image_lib->resize();

	}

	

	

	function validate_upload_image($fieldmessage,$fieldname,$filepath,$allowed_types,$thumbnailpath='',$width='',$height='')

	{

		$config['upload_path'] = $filepath;

		//$config['allowed_types'] = 'gif|jpeg|jpg|png';

		if( $allowed_types )

			$config['allowed_types'] = $allowed_types;

		else

			$config['allowed_types'] = 'gif|jpeg|jpg|png';

		$config['remove_spaces'] = TRUE;

		$config['overwrite'] = FALSE;

		

		$this->load->library('upload', $config);



		if(!$this->upload->do_upload($fieldname))

		{

			$this->form_validation->set_message($fieldmessage,$this->upload->display_errors());

			

			return $this->upload->display_errors();

			
		}

		else

		{

			$filedata = $this->upload->data();

			$this->uploadedimagename = $filedata['file_name'];

			if(!empty($thumbnailpath))

			{

				 $this->create_thumbnail($filedata['full_path'],$thumbnailpath,$width,$height);

			}

			return TRUE;

		}

	}

  
	function prepare_flashmessage($msg,$type)
	{
		$returnmsg='';
		switch($type){
			case 0: $returnmsg = " <div class='col-md-12'>
										<div class='alert alert-success'>
											<a href='#' class='close' data-dismiss='alert'>&times;</a>
											<strong>Success!</strong> ". $msg."
										</div>
									</div>";
				break;
			case 1: $returnmsg = " <div class='col-md-12'>
										<div class='alert alert-danger'>
											<a href='#' class='close' data-dismiss='alert'>&times;</a>
											<strong>Error!</strong> ". $msg."
										</div>
									</div>";
				break;
			case 2: $returnmsg = " <div class='col-md-12'>
										<div class='alert alert-info'>
											<a href='#' class='close' data-dismiss='alert'>&times;</a>
											<strong>Info!</strong> ". $msg."
										</div>
									</div>";
				break;
			case 3: $returnmsg = " <div class='col-md-12'>
										<div class='alert alert-warning'>
											<a href='#' class='close' data-dismiss='alert'>&times;</a>
											<strong>Warning!</strong> ". $msg."
										</div>
									</div>";
				break;
		}
		
		$this->session->set_flashdata("message",$returnmsg);
	}

	function prepare_localflashmessage($msg,$type)
	{
		$returnmsg='';
		switch($type){
			case 0: $returnmsg = " <div class='col-md-12'>
										<div class='alert alert-success'>
											<a href='#' class='close' data-dismiss='alert'>&times;</a>
											<strong>Success!</strong> ". $msg."
										</div>
									</div>";
				break;
			case 1: $returnmsg = " <div class='col-md-12'>
										<div class='alert alert-danger'>
											<a href='#' class='close' data-dismiss='alert'>&times;</a>
											<strong>Error!</strong> ". $msg."
										</div>
									</div>";
				break;
			case 2: $returnmsg = " <div class='col-md-12'>
										<div class='alert alert-info'>
											<a href='#' class='close' data-dismiss='alert'>&times;</a>
											<strong>Info!</strong> ". $msg."
										</div>
									</div>";
				break;
			case 3: $returnmsg = " <div class='col-md-12'>
										<div class='alert alert-warning'>
											<a href='#' class='close' data-dismiss='alert'>&times;</a>
											<strong>Warning!</strong> ". $msg."
										</div>
									</div>";
				break;
		}
		
		$this->session->set_flashdata("localmessage",$returnmsg);
		$this->session->set_flashdata("is_setlocalmessage",true);
	}	
  
  

   function logout()
   {	
		$this->session->sess_destroy();

   		$this->admin_session_validate();
	}
	
	
	function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key   = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

	function _valid_csrf_nonce()
	{
       
		if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
			$this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	function _render_page($view, $data=null, $render=false)
	{
		
		$this->viewdata = (empty($data)) ? $this->data: $data;

		$view_html = $this->load->view($view, $this->viewdata, $render);

		if (!$render) return $view_html;
	}
	
	
	
	// set Pagination
	function set_pagination($url,$offset,$numrows,$perpage,$pagingfunction='')
	{
		$config['base_url'] = base_url().$url;  //Setting Pagination parameters
		$config['per_page'] = $perpage;
		$config['offset'] = $offset;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['num_links'] = 4; // numlinks before and after current page
		$config['total_rows'] =  $numrows;
		
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		
		if(!empty($pagingfunction))
			$config['paging_function'] = $pagingfunction; 
		else	$config['paging_function'] = 'ajax_paging';
		$this->pagination->initialize($config);  
	}
	
	
    /***Email Template
    * to User
    * When Booking done
    **/
    function booking_mail_template_user($data=array()) {
        
        
        $content='';
        
        $email_template = $this->base_model->fetch_records_from(TBL_EMAIL_TEMPLATES,array('subject'=>'when_user_done_booking_template_mail_to_user','status'=>'Active'));
        
        
        if (!empty($email_template) && !empty($data)) {
            
            $email_template = $email_template[0];
					
            $content 		= $email_template->email_template;
            
        
            $logo_img='<img src="'.get_site_logo().'" class="img-responsive" style="width:30%">';
            
            
            $content     	= str_replace("__SITE_LOGO__",$logo_img,$content);
                    
            $content     	= str_replace("__SITE_TITLE__",$this->config->item('site_settings')->site_title,$content);
            
            
            $content     	= str_replace("__USER_NAME__",isset($data['user']['username']) ? $data['user']['username'] : '',$content);
            
            
            $content     	= str_replace("__SITE_TITLE__",$this->config->item('site_settings')->site_title,$content);
             
             
            $content     	= str_replace("__BOOKING_REF_NO__",isset($data['journey_details']['booking_ref']) ? $data['journey_details']['booking_ref'] : '',$content);
            
            
            $content     	= str_replace("__PICK_POINT__",isset($data['journey_details']['pick_up']) ? $data['journey_details']['pick_up'] : '',$content);
             
             
            $content     	= str_replace("__DROP_POINT__",isset($data['journey_details']['drop_of']) ? $data['journey_details']['drop_of'] : '',$content);
             
             
            $content     	= str_replace("__DATE_TIME__",isset($data['journey_details']['pick_date']) ? $data['journey_details']['pick_date'].' & '.$data['journey_details']['pick_time'] : '',$content);
             
            $content     	= str_replace("__RETURN_JOURNEY__",isset($data['journey_details']['return_journey']) ? $data['journey_details']['return_journey'] : 'No',$content);
            
            $content     	= str_replace("__WAITING_TIME__",isset($data['journey_details']['waitingTime']) ? $data['journey_details']['waitingTime'].' & '.$this->config->item('site_settings')->currency_symbol.$data['journey_details']['waitingCost'] : '',$content);
            
            $content     	= str_replace("__MILES_TIME__",isset($data['journey_details']['total_distance']) ? $data['journey_details']['total_distance'].' & '.$data['journey_details']['total_time'] : '',$content);
            
            $content     	= str_replace("__CAR_TYPE__",isset($data['journey_details']['car_name']) ? $data['journey_details']['car_name'] : '',$content);
            
            $content     	= str_replace("__PAYMENT_TYPE__",isset($data['payment_mode']) ? ucfirst($data['payment_mode']) : '',$content);
            
            $content     	= str_replace("__AMOUNT__",isset($data['journey_details']['total_cost']) ? $this->config->item('site_settings')->currency_symbol.$data['journey_details']['total_cost'] : '',$content);
            
            $content     	= str_replace("__DRIVER_MSG__",isset($data['user']['information']) ? $data['user']['information'] : '',$content);
            
            $content     	= str_replace("__CONTACT_US__",$this->config->item('site_settings')->land_line,$content);
            
            
            $content     	= str_replace("__SITE_TITLE__",$this->config->item('site_settings')->site_title,$content);
        }
       
        return $content;
    }
    
    
    
    /***Email Template
    * to ADMIN
    * When Booking done
    **/
    function booking_mail_template_admin($data=array()) {
        
        $content='';
        
        $email_template = $this->base_model->fetch_records_from(TBL_EMAIL_TEMPLATES,array('subject'=>'when_user_done_booking_template_mail_to_admin','status'=>'Active'));
        
        
        if (!empty($email_template) && !empty($data)) {
            
            $email_template = $email_template[0];
					
            $content 		= $email_template->email_template;
            
        
            $logo_img='<img src="'.get_site_logo().'" class="img-responsive" style="width:30%">';
            
            
            $content     	= str_replace("__SITE_LOGO__",$logo_img,$content);
                    
            $content     	= str_replace("__SITE_TITLE__",$this->config->item('site_settings')->site_title,$content);
            
            
            $content     	= str_replace("__USER_NAME__",isset($data['user']['username']) ? $data['user']['username'] : '',$content);
            
            
            $content     	= str_replace("__USER_NAME__",isset($data['user']['username']) ? $data['user']['username'] : '',$content);
            
            $content     	= str_replace("__EMAIL__",isset($data['user']['email']) ? $data['user']['email'] : '',$content);
            
            $content     	= str_replace("__PHONE__",isset($data['user']['phone']) ? $data['user']['phone'] : '',$content);
             
             
            $content     	= str_replace("__BOOKING_REF_NO__",isset($data['journey_details']['booking_ref']) ? $data['journey_details']['booking_ref'] : '',$content);
            
            
            $content     	= str_replace("__PICK_POINT__",isset($data['journey_details']['pick_up']) ? $data['journey_details']['pick_up'] : '',$content);
             
             
            $content     	= str_replace("__DROP_POINT__",isset($data['journey_details']['drop_of']) ? $data['journey_details']['drop_of'] : '',$content);
             
             
            $content     	= str_replace("__DATE_TIME__",isset($data['journey_details']['pick_date']) ? $data['journey_details']['pick_date'].' & '.$data['journey_details']['pick_time'] : '',$content);
             
            $content     	= str_replace("__RETURN_JOURNEY__",isset($data['journey_details']['return_journey']) ? $data['journey_details']['return_journey'] : 'No',$content);
            
            $content     	= str_replace("__WAITING_TIME__",isset($data['journey_details']['waitingTime']) ? $data['journey_details']['waitingTime'].' & '.$this->config->item('site_settings')->currency_symbol.$data['journey_details']['waitingCost'] : '',$content);
            
            $content     	= str_replace("__MILES_TIME__",isset($data['journey_details']['total_distance']) ? $data['journey_details']['total_distance'].' & '.$data['journey_details']['total_time'] : '',$content);
            
            $content     	= str_replace("__CAR_TYPE__",isset($data['journey_details']['car_name']) ? $data['journey_details']['car_name'] : '',$content);
            
            $content     	= str_replace("__PAYMENT_TYPE__",isset($data['payment_mode']) ? ucfirst($data['payment_mode']) : '',$content);
            
            $content     	= str_replace("__AMOUNT__",isset($data['journey_details']['total_cost']) ? $this->config->item('site_settings')->currency_symbol.$data['journey_details']['total_cost'] : '',$content);
            
            $content     	= str_replace("__DRIVER_MSG__",isset($data['user']['information']) ? $data['user']['information'] : '',$content);
            
            $content     	= str_replace("__CONTACT_US__",$this->config->item('site_settings')->land_line,$content);
            
            
            $content     	= str_replace("__SITE_TITLE__",$this->config->item('site_settings')->site_title,$content);
        }
       
        return $content;
    }
    
    
    /***Email Template
    * to User
    * When ADMIN/EXECUTIVE confirm or cancel booking 
    **/
    function booking_confirm_cancel_template_user($data=array()) {
        
       
        $content='';
        
        $email_template = $this->base_model->fetch_records_from(TBL_EMAIL_TEMPLATES,array('subject'=>'when_admin_executive_confirm_cancel_delete_booking_template_mail_to_user','status'=>'Active'));
        
        
        if (!empty($email_template) && !empty($data)) {
            
            $email_template = $email_template[0];
            
            
            if (isset($data['is_deleted']) && $data['is_deleted']=='Yes')
                $status='Deleted';
            else {
                $status='Cancelled';
            
                if ($data['journey_details']['is_conformed']=='confirm')
                $status='Confirmed';
            }
            
            
                
					
            $content 		= $email_template->email_template;
            
        
            $logo_img='<img src="'.get_site_logo().'" class="img-responsive" style="width:30%">';
            
            
            $content     	= str_replace("__SITE_LOGO__",$logo_img,$content);
                    
            $content     	= str_replace("__SITE_TITLE__",$this->config->item('site_settings')->site_title,$content);
            
            
            $content     	= str_replace("__USER_NAME__",isset($data['journey_details']['registered_name']) ? $data['journey_details']['registered_name'] : '',$content);
            
            
            
            $content     	= str_replace("__SITE_TITLE__",$this->config->item('site_settings')->site_title,$content);
             
             
            $content     	= str_replace("__BOOKING_STATUS__",$status,$content);
              
             
            $content     	= str_replace("__BOOKING_REF_NO__",isset($data['journey_details']['booking_ref']) ? $data['journey_details']['booking_ref'] : '',$content);
            
            
            $content     	= str_replace("__PICK_POINT__",isset($data['journey_details']['pick_point']) ? $data['journey_details']['pick_point'] : '',$content);
             
             
            $content     	= str_replace("__DROP_POINT__",isset($data['journey_details']['drop_point']) ? $data['journey_details']['drop_point'] : '',$content);
             
             
            $content     	= str_replace("__DATE_TIME__",isset($data['journey_details']['pick_date']) ? $data['journey_details']['pick_date'].' & '.$data['journey_details']['pick_time'] : '',$content);
             
            $content     	= str_replace("__RETURN_JOURNEY__",isset($data['journey_details']['return_journey']) ? $data['journey_details']['return_journey'] : 'No',$content);
            
            $content     	= str_replace("__WAITING_TIME__",isset($data['journey_details']['waiting_time']) ? $data['journey_details']['waiting_time'].' & '.$this->config->item('site_settings')->currency_symbol.$data['journey_details']['waiting_cost'] : '',$content);
            
            $content     	= str_replace("__MILES_TIME__",isset($data['journey_details']['distance']) ? $data['journey_details']['distance'].$data['journey_details']['distance_type'].' & '.$data['journey_details']['total_time'] : '',$content);
            
            $content     	= str_replace("__CAR_TYPE__",isset($data['journey_details']['name']) ? $data['journey_details']['name'] : '',$content);
            
            $content     	= str_replace("__PAYMENT_TYPE__",isset($data['journey_details']['payment_type']) ? ucfirst($data['journey_details']['payment_type']) : '',$content);
            
            $content     	= str_replace("__AMOUNT__",isset($data['journey_details']['cost_of_journey']) ? $this->config->item('site_settings')->currency_symbol.$data['journey_details']['cost_of_journey'] : '',$content);
            
            $content     	= str_replace("__DRIVER_MSG__",isset($data['user']['information']) ? $data['user']['information'] : '',$content);
            
            $content     	= str_replace("__CONTACT_US__",$this->config->item('site_settings')->land_line,$content);
            
            
            $content     	= str_replace("__SITE_TITLE__",$this->config->item('site_settings')->site_title,$content);
        }
        
        return $content;
    }


    /***Email Template
    * to Admin
    * When USER has cancelled booking 
    **/
    function booking_cancel_template_admin($data=array()) {
        
        $content='';
        
        $email_template = $this->base_model->fetch_records_from(TBL_EMAIL_TEMPLATES,array('subject'=>'when_user_cancel_booking_template_mail_to_admin','status'=>'Active'));
        
        
        if (!empty($email_template) && !empty($data)) {
            
            $email_template = $email_template[0];
            	
            $content 		= $email_template->email_template;
            
            $logo_img		= '<img src="'.get_site_logo().'" class="img-responsive" style="width:30%">';
            

            $content     	= str_replace("__SITE_LOGO__",$logo_img,$content);
                 

            $content     	= str_replace("__SITE_TITLE__",$this->config->item('site_settings')->site_title,$content);
            
            $content     	= str_replace("__USER_NAME__",isset($data['journey_details']['registered_name']) ? $data['journey_details']['registered_name'] : '',$content);
            

            $content     	= str_replace("__BOOKING_REF_NO__",isset($data['journey_details']['booking_ref']) ? $data['journey_details']['booking_ref'] : '',$content);
            

            $content     	= str_replace("__PICK_POINT__",isset($data['journey_details']['pick_point']) ? $data['journey_details']['pick_point'] : '',$content);
             
             
            $content     	= str_replace("__DROP_POINT__",isset($data['journey_details']['drop_point']) ? $data['journey_details']['drop_point'] : '',$content);
             
             
            $content     	= str_replace("__DATE_TIME__",isset($data['journey_details']['pick_date']) ? $data['journey_details']['pick_date'].' & '.$data['journey_details']['pick_time'] : '',$content);
             
            $content     	= str_replace("__RETURN_JOURNEY__",isset($data['journey_details']['return_journey']) ? $data['journey_details']['return_journey'] : 'No',$content);
            
            $content     	= str_replace("__WAITING_TIME__",isset($data['journey_details']['waiting_time']) ? $data['journey_details']['waiting_time'].' & '.$this->config->item('site_settings')->currency_symbol.$data['journey_details']['waiting_cost'] : '',$content);
            
            $content     	= str_replace("__MILES_TIME__",isset($data['journey_details']['distance']) ? $data['journey_details']['distance'].$data['journey_details']['distance_type'].' & '.$data['journey_details']['total_time'] : '',$content);
            
            $content     	= str_replace("__CAR_TYPE__",isset($data['journey_details']['name']) ? $data['journey_details']['name'] : '',$content);
            
            $content     	= str_replace("__PAYMENT_TYPE__",isset($data['journey_details']['payment_type']) ? ucfirst($data['journey_details']['payment_type']) : '',$content);
            
            $content     	= str_replace("__AMOUNT__",isset($data['journey_details']['cost_of_journey']) ? $this->config->item('site_settings')->currency_symbol.$data['journey_details']['cost_of_journey'] : '',$content);

         
            $content     	= str_replace("__SITE_TITLE__",$this->config->item('site_settings')->site_title,$content);
        }
        
        return $content;
    }

    function check_isdemo($redirect_url)
	{	
		if(DEMO)	
		{		
			$this->prepare_flashmessage('Access Denied on demo server', 2);		
			redirect($redirect_url);	
		}
	}

	function check_isdemo_ajax()
	{	
		return DEMO;
	}
}
?>