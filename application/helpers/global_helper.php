<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	/****** Send Email ******/
if ( ! function_exists('sendEmail'))
{
	function sendEmail($from = null, $to = null, $sub = null, $msg = null, $cc = null, $bcc = null, $attachment = null, $multiuser = null)
	{

		if(!filter_var($from, FILTER_VALIDATE_EMAIL) || !filter_var($to, FILTER_VALIDATE_EMAIL)) {
			return false;
		}
		$CI =& get_instance();

		/**sendEmail through Webmail settings **/
		if($msg != "") {

			$CI->load->library('email');
			$CI->email->clear();
			$config = Array(
						'protocol' 	=> 'smtp',
						'smtp_host' => $CI->config->item('email_settings')->smtp_host,
						'smtp_port' => $CI->config->item('email_settings')->smtp_port,
						'smtp_user' => $CI->config->item('email_settings')->smtp_user,
						'smtp_pass' => $CI->config->item('email_settings')->smtp_password,
						'charset' 	=> 'utf-8',
						'mailtype' 	=> 'html',
						'newline' 	=> "\r\n",
						'wordwrap' 	=> TRUE
					);

			if($CI->config->item('email_settings')->mail_config == "webmail"){

				$CI->email->initialize($config);

				$CI->email->from($CI->config->item('email_settings')->smtp_user, $CI->config->item('site_settings')->site_title);

				$CI->email->reply_to($from);

				$CI->email->to($to);

				if($cc != "" && filter_var($cc, FILTER_VALIDATE_EMAIL))
					$CI->email->cc($cc);
				if($bcc != "" && filter_var($bcc, FILTER_VALIDATE_EMAIL))
					$CI->email->bcc($bcc);

				if($attachment != "")
					$CI->email->attach($attachment);

				$CI->email->subject($sub);
				$CI->email->message($msg);

				if( $CI->email->send() )
					return true;

			} else { /*sendEmail through mandrill**/

				$CI->load->config('mandrill');

				$CI->load->library('mandrill');

				$mandrill_ready = NULL;

				try {
					$CI->mandrill->init($CI->config->item('mandrill_api_key'));
					$mandrill_ready = TRUE;
				} catch(Mandrill_Exception $e) {
					$mandrill_ready = FALSE;
				}

				if( $mandrill_ready ) {

					$to_list = array(array('email' => $to ));
					if($multiuser)
						$to_list = $to;

					//Send us some email!
					$email = array(
						'html' => $msg, //Consider using a view file
						'text' => '',
						'subject' => $sub,
						'from_email' => $from,
						'from_name' => $CI->config->item('site_settings')->site_title,
						'to' => $to_list
						);

						$result = $CI->mandrill->messages_send($email);
						
						if($result[0]['status']=='sent')
						return TRUE;
						else
						return FALSE;
				}
			}
		}
		return false;
	}
}



//Get User INfo
if( ! function_exists('getUserRec'))
{
	function getUserRec($userId='')
	{			
		$CI =& get_instance();
		$user = $CI->ion_auth->user()->row();
		if($userId!='' && is_numeric($userId))
		{
			$user = $CI->ion_auth->user($userId)->row();
		}			
		return $user;
	}
}


//Get User Type
if( ! function_exists('getUserType'))
{
	function getUserType($user_id='')
	{
		$CI =& get_instance();
		$user_type='';
		if($user_id=='')
		{
			$user_id = getUserRec()->id;
		}
		$user_groups = $CI->ion_auth->get_users_groups($user_id)->result();
		switch($user_groups[0]->id)
		{
			case 1: $user_type='admin';
				break;
			case 2: $user_type='members';
				break;
			case 3: $user_type='executives';
				break;				
			default:
				break;
		} 
		return $user_type;
	}
}

//Get User Type Id
if( ! function_exists('getUserTypeId'))
{
	function getUserTypeId($user_id='')
	{
		$CI =& get_instance();
		$user_type='';
		
		if($user_id=='') 
		{
			$user_id = getUserRec()->id;
		}
		
		if ($user_id>0) {
			$user_groups = $CI->ion_auth->get_users_groups($user_id)->result();
			if(count($user_groups)>0)
				return $user_groups[0]->id;
			else
				return 0;
		} else {
			return false;
		}
	}
}



//Get User Type
if( ! function_exists('getTemplate'))
{
	function getTemplate()
	{
		$CI =& get_instance();
		$user_type='';
		$template='';
		
		if($CI->ion_auth->logged_in())
		{
			$user_id = getUserRec()->id;
            
			$user_groups = $CI->ion_auth->get_users_groups($user_id)->result();
            
			switch($user_groups[0]->id)
			{
				case 1: 
					$user_type='admin';
					$template = TEMPLATE_ADMIN;
					break;
				case 2: 
					$user_type='members';
					$template = TEMPLATE_SITE;
					break;
				case 3: 
					$user_type='executives';
					$template = TEMPLATE_EXECUTIVE;
					break;
               /* case 4: 
					$user_type='driver';
					$template = TEMPLATE_DRIVER;
					break;*/    
				default:
					$template = TEMPLATE_SITE;
					break;
			} 
		}
		else
		{
			$template = TEMPLATE_SITE;
		}
		return $template;
	}
}


 /**flashmessage**/
if ( ! function_exists('prepare_message'))
{
    function prepare_message($msg,$type = 2)
	{
		$returnmsg='';
		switch($type){
			case 0: $returnmsg = " <div class='col-md-12'>
										<div class='alert alert-success'>
											<a href='#' class='close' data-dismiss='alert'>&times;</a>
											<strong> Success! </strong> ". $msg."
										</div>
									</div>";
				break;
			case 1: $returnmsg = " <div class='col-md-12'>
										<div class='alert alert-danger'>
											<a href='#' class='close' data-dismiss='alert'>&times;</a>
											<strong> Error! </strong> ". $msg."
										</div>
									</div>";
				break;
			case 2: $returnmsg = " <div class='col-md-12'>
										<div class='alert alert-info'>
											<a href='#' class='close' data-dismiss='alert'>&times;</a>
											<strong> Info! </strong> ". $msg."
										</div>
									</div>";
				break;
			case 3: $returnmsg = " <div class='col-md-12'>
										<div class='alert alert-warning'>
											<a href='#' class='close' data-dismiss='alert'>&times;</a>
											<strong> Warning! </strong> ". $msg."
										</div>
									</div>";
				break;
		}
		
		return $returnmsg;
	}
}


/**
	* Check for logged in uyser
	*
	* @access    public
	* @param    string
	* @return    string
	*/
if ( ! function_exists('check_access'))
{
	function check_access( $type = 'admin')
	{
		$CI	=&	get_instance();
		
		if (!$CI->ion_auth->logged_in())
		{
			$CI->prepare_flashmessage('Please Login to Continue',2);
			redirect(SITEURL);
		}
		elseif ($type == 'admin')
		{
			if (!$CI->ion_auth->is_admin())
			{
				$CI->prepare_flashmessage('MSG NO ENTRY',2);
				redirect(SITEURL);
			}
		}
		elseif ($type == 'members')
		{
			if (!$CI->ion_auth->is_member())
			{
				$CI->prepare_flashmessage('Please Login to Continue',2);
				redirect(SITEURL);
			}
		}
		elseif($type == 'executives')
		{
			if (!$CI->ion_auth->is_executive())
			{
				$CI->prepare_flashmessage('MSG NO ENTRY',2);
				redirect(SITEURL);
			}
		}
       /* elseif($type == 'driver')
		{
			if (!$CI->ion_auth->is_driver())
			{
				$CI->prepare_flashmessage('MSG NO ENTRY',2);
				redirect(SITEURL);
			}
		}*/
	}
}

/***Converts date to time***/
if ( ! function_exists('get_date'))
{
	function get_date($date) 
	{
		$CI	=&	get_instance();
		
		if ($date=='') {
			return false;
		} else {
			
            $format='Y-m-d';
            
			$site_format = $CI->config->item('site_settings')->date_formats;
            
			if ($site_format!='') {
                
                switch($site_format)
                {
                    case 'YYYY-mm-dd':
                    $format = 'Y-m-d';
                    break;
                    
                    case 'YYYY-dd-mm':
                    $format = 'Y-d-m';
                    break;
                    
                    case 'dd-mm-YYYY':
                    $format = 'd-m-Y';
                    break;
                    
                    case 'dd-YYYY-mm':
                    $format = 'd-Y-m';
                    break;
                    
                    
                    case 'mm-dd-YYYY':
                    $format = 'm-d-Y';
                    break;
                    
                    case 'mm-YYYY-dd':
                    $format = 'm-Y-d';
                    break;
                    
                    case 'YYYY/mm/dd':
                    $format = 'Y/m/d';
                    break;
                    
                    case 'YYYY/dd/mm':
                    $format = 'Y/d/m';
                    break;
                    
                    case 'dd/mm/YYYY':
                    $format = 'd/m/Y';
                    break;
                    
                    case 'dd/YYYY/mm':
                    $format = 'd/Y/m';
                    break;
                    
                    case 'mm/dd/YYYY':
                    $format = 'm/d/Y';
                    break;
                    
                    case 'mm/YYYY/dd':
                    $format = 'm/Y/d';
                    break;
                    
                    
                    case 'YYYY.mm.dd':
                    $format = 'Y.m.d';
                    break;
                    
                    case 'YYYY.dd.mm':
                    $format = 'Y.d.m';
                    break;
                    
                    case 'dd.mm.YYYY':
                    $format = 'd.m.Y';
                    break;
                    
                    case 'dd.YYYY.mm':
                    $format = 'd.Y.m';
                    break;
                     
                    case 'mm.dd.YYYY':
                    $format = 'm.d.Y';
                    break;
                    
                    case 'mm.YYYY.dd':
                    $format = 'm.Y.d';
                    break;
                    
                    
                    default:
                    $format = 'Y-m-d';
                    break;
                    
                }
        
                
				return date($format,strtotime($date));
			} else {
				return $date;
			}
		}
	}
}



/***active inactive***/
if ( ! function_exists('activeinactive'))
{
	function activeinactive()
	{
		return array('Active' => 'Active', 'Inactive' => 'Inactive');
	}
}

/***no yes***/
if ( ! function_exists('noyes'))
{
	function noyes()
	{
		return array('No' => 'No', 'Yes' => 'Yes');
	}
}

/***yes no***/
if ( ! function_exists('yesno'))
{
	function yesno()
	{
		return array('Yes' => 'Yes', 'No' => 'No');
	}
}

/***require symbol***/
if ( ! function_exists('required_symbol'))
{
	function required_symbol()
	{
		return '&nbsp;<font color="red">*</font>';
	}
}


/***get image***/
if ( ! function_exists('get_user_image'))
{
	function get_user_image($image='')
	{
		if($image=='')
            return DEFAULT_USER_IMAGE;
		
        
		if(!empty($image)) 
		{
			if(file_exists(USER_IMG_UPLOAD_PATH_URL.$image))
				return USER_IMG_PATH.$image;
			else
				return DEFAULT_USER_IMAGE;
		}
		else 
		{
			return DEFAULT_USER_IMAGE;
		}
	}
}

/**get testimonial user image**/
if ( ! function_exists('get_test_user_image'))
{
	function get_test_user_image($image='')
	{
		if(!empty($image)) 
		{
			if(file_exists(TESTI_USER_IMG_UPLOAD_PATH_URL.$image))
				return TEST_USER_IMG_PATH.$image;
			else
				return DEFAULT_USER_IMAGE;
		}
		else 
		{
			return DEFAULT_USER_IMAGE;
		}
	}
}


/***get driver license***/
/*if ( ! function_exists('get_driver_license'))
{
	function get_driver_license($image='')
	{
		if($image=='')
			return false;
		
		
		if(!empty($image)) 
		{
			if(file_exists(DRIVER_LICENSE_UPLOAD_PATH_URL.$image))
				return DRIVER_LICENSE_IMG_PATH.$image;
			else
				return false;
		}
		else 
		{
			return false;
		}
	}
}
*/


/***clean string***/
if ( ! function_exists('clean_string'))
{
	function clean_string($string = "")
	{
		if(empty($string))
			return "";

		$string = strtolower($string);
		$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   		$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

   		$string = preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.

		return $string;
	}
}


/***prepare slug***/
if ( ! function_exists('prepare_slug'))
{
	function prepare_slug($string = "", $column_to_be_checked = "", $table_name = "")
	{
		if(empty($string) || empty($column_to_be_checked) || empty($table_name))
			return "";

		$string = clean_string($string);

		$CI	=&	get_instance();
		$duplicate_rec_cnt = $CI->db->where($column_to_be_checked, $string)->count_all_results($table_name);

		if($duplicate_rec_cnt > 0) {
			$string .= '-'.$duplicate_rec_cnt;
		}

		return $string;
	}
}

/***filter slug***/
if ( ! function_exists('filter_slug'))
{
	function filter_slug($slug = "")
	{
		if(empty($slug))
			return "";

		$slug = str_replace('_', '-', $slug);

		return $slug;
	}
}



/***get currency options***/
if ( ! function_exists('get_currency_opts'))
{
	function get_currency_opts()
	{

		$CI	=&	get_instance();
		$currencies = $CI->db->get('currency')->result();

		$currency_opts = array('' => 'No Records Available');
		if(!empty($currencies)) {

			$currency_opts = array(''=> 'Select' );

			foreach ($currencies as $key => $value) {
				$currency_opts[$value->currency_code_alpha] = ucwords($value->currency_name);
			}
		}

		return $currency_opts;
	}
}

if ( ! function_exists('clean_text'))
{
	function clean_text($string) 
	{
	   $string = str_replace(' ', '_', $string); // Replaces all spaces with hyphens.

	   return preg_replace('/[^A-Za-z0-9\_]/', '', $string); // Removes special chars.
	}	
}

//Prepare DDL
if( ! function_exists('prepare_dropdown')){
	function prepare_dropdown($table_name='', $isSelect='',$col_value='',$first_col_text,$second_col_text='', $cond = array(),$order_by = '',$include_all=false){
		
		$CI =& get_instance();
		
		$catRecords = $CI->base_model->fetch_records_from(
		$table_name, is_array($cond)? $cond : '','',$order_by);
		if($isSelect) {
			$catOptions[''] = 'Select';
		}

		if($include_all){
			$catOptions['All'] = 'All';
		}
		
		if($second_col_text != '') {
			foreach ($catRecords as $key => $val) {
				$catOptions[$val->$col_value]=$val->$first_col_text.' - '.$val->$second_col_text;	
			}
		} else {
			foreach ($catRecords as $key => $val) {
				$catOptions[$val->$col_value]=$val->$first_col_text;	
			}
		}
		return $catOptions;
	}
}


//FEVICON
if( ! function_exists('get_fevicon'))
{
	function get_fevicon()
	{
		$CI	=&	get_instance();
		
		$fevicon_img='';
		
		if($CI->config->item('site_settings')->fevicon != '' && file_exists(FEVICON_IMG_UPLOAD_PATH_URL.$CI->config->item('site_settings')->fevicon)) 
		{
			$fevicon_img = FEVICON_IMG_PATH.$CI->config->item('site_settings')->fevicon;
		}
		else
		{
			$fevicon_img = FEVICON;
		}
		
		return $fevicon_img;
	}
}

//SITE LOGO
if ( ! function_exists('get_site_logo'))
{
	function get_site_logo()
	{
		$CI	=&	get_instance();
		
		$site_img='';
		
		if($CI->config->item('site_settings')->site_logo != '' && file_exists(LOGO_IMG_UPLOAD_PATH_URL.$CI->config->item('site_settings')->site_logo)) 
		{
			$site_img = LOGO_IMG_PATH.$CI->config->item('site_settings')->site_logo;
		}
		else
		{
			$site_img = DEFAULT_SITE_LOGO;
		}
		
		return $site_img;
	}
}




//VEHICLE IMAGE
if ( ! function_exists('get_vehicle_image'))
{
	function get_vehicle_image($image='')
	{
		$vehicle_img='';
		if($image=='')
		{
			$vehicle_img=DEFAULT_VEHICLE_IMG;
		}
		else
		{
			$CI	=&	get_instance();
			
			if($image != '' && file_exists(VEHICLE_IMG_UPLOAD_PATH_URL.$image)) 
			{
				$vehicle_img = VEHICLE_IMG_PATH.$image;
			}
			else
			{
				$vehicle_img = DEFAULT_VEHICLE_IMG;
			}
		}
		return $vehicle_img;
	}
}


//PAYPAL LOGO
if ( ! function_exists('get_paypal_logo'))
{
	function get_paypal_logo()
	{
		$CI	=&	get_instance();
		
		$site_img='';
		
		if($CI->config->item('paypal_settings')->logo_image != '' && file_exists(PAYPAL_LOGO_IMG_UPLOAD_PATH_URL.$CI->config->item('paypal_settings')->logo_image)) 
		{
			$site_img = PAYPAL_LOGO_IMG_PATH.$CI->config->item('paypal_settings')->logo_image;
		}
		else
		{
			$site_img = DEFAULT_SITE_LOGO;
		}
		
		return $site_img;
	}
}





//ANDROID
/* if( ! function_exists('get_android_img'))
{
	function get_android_img()
	{
		$CI	=&	get_instance();
		
		$android_img = SITEURL.RESOURCES.DS.'admin'.DS.'img'.DS.'android.png';
		
		return $android_img;
	}
} */

//IOS
/* if( ! function_exists('get_ios_img'))
{
	function get_ios_img()
	{
		$CI	=&	get_instance();
		
		$ios_img = SITEURL.RESOURCES.DS.'admin'.DS.'img'.DS.'appleios.png';
		
		return $ios_img;
	}
} */



// SEND SMS0
if( ! function_exists('sendSMS'))
{
	function sendSMS($mobile_number='',$message='')
	{
		if ($mobile_number=='' || $message=='') 
		{
			return array('result' => 0, 'message' => 'Please enter mobile number');
		}
		
		$CI =& get_instance();
		$query = 'SELECT * FROM '.$CI->db->dbprefix('sms_gate_ways').'  WHERE  status="Active" AND is_default = "Yes"';
		$sms_settings = $CI->db->query($query)->result();
		
		
		if (count($sms_settings) == 0) //If there is no default SMS gateway, we will pick the any one gateway to send the SMS
		{
			$query = 'SELECT sst2.* FROM '.$CI->db->dbprefix('sms_gate_ways').' sst1 INNER JOIN '.$CI->db->dbprefix('system_settings_fields').' sst2 ON sst1.sms_gateway_id = sst2.sms_gateway_id WHERE  sst1.status="Active" ORDER BY sms_gateway_name LIMIT 1';
			$sms_settings = $CI->db->query($query)->result();
		}
		
	    if (count($sms_settings)>0 && $sms_settings[0]->status=='Active') 
		{
			$fields = $CI->db->query('SELECT * FROM  '.$CI->db->dbprefix('system_settings_fields').' sf WHERE sms_gateway_id = '.$sms_settings[0]->sms_gateway_id)->result();
			$to = $CI->config->item('site_settings')->country_code.$mobile_number;			
			if(count($fields) > 0)
			{
				$result = array();
				if($sms_settings[0]->sms_gateway_name == 'Cliakatell') 
				{

					$CI->load->library('clickatell');

					$response = $CI->clickatell->send_message($to, $message);
					
					if($response === FALSE)
					{
						$result = array('result' => 0, 'message' => $CI->clickatell->error_message);
					}
					else
					{
						$result = array('result' => 1, 'message' => 'Message sent successfully');
					}
				}
				elseif($sms_settings[0]->sms_gateway_name == 'Nexmo') 
				{
					$CI->load->library('nexmo');
					$CI->nexmo->set_format('json');
					$from = '1234567890';
					$smstext = array(
							'text' => $message,
						);
					$response = $CI->nexmo->send_message($from, $to, $smstext);
					
					$other_details = serialize($response);
					$status = $response['messages'][0]['status'];
					if($status == 0) {
						$result = array('result' => 1, 'message' => 'Message sent successfully');
					} else {
						$result = array('result' => 0, 'message' => $response['messages'][0]['error-text']);
					}
				}
				elseif($sms_settings[0]->sms_gateway_name == 'Plivo') 
				{
					$CI->load->library('plivo');
					$sms_data = array(
							'src' => '919700376656', //The phone number to use as the caller id (with the country code). E.g. For USA 15671234567
							'dst' => $to, // The number to which the message needs to be send (regular phone numbers must be prefixed with country code but without the ‘+’ sign) E.g., For USA 15677654321.
							'text' => $message, // The text to send
							'type' => 'sms', //The type of message. Should be 'sms' for a text message. Defaults to 'sms'
						);
					$response = $CI->plivo->send_sms($sms_data);
					$other_details = serialize($response);
					if ($response[0] == '202') //Success
					{
						$result = array('result' => 1, 'message' => 'Message sent successfully');
					}
					else
					{
						$response2 = json_decode($response[1], TRUE);
						//print_r($response2);print_r($response);die();
						$result = array('result' => 0, 'message' => $response2["error"]);
					}
				}
				elseif($sms_settings[0]->sms_gateway_name == 'Solutionsinfini') 
				{
					$CI->load->helper('solutionsinfini');
					$solution_object = new sendsms();
					$response = $solution_object->send_sms($to, $message, current_url());
					if(strpos($response,'Message GID') === false) //Failed
					{
						$result = array('result' => 0, 'message' => $response);
					}
					else
					{
						$result = array('result' => 1, 'message' => 'Message sent successfully');
					}
				}
				elseif($sms_settings[0]->sms_gateway_name == 'Twilio') 
				{
					$CI->load->helper('ctech-twilio');
					$client = get_twilio_service();
					$twilio_number = '';
					//print_r($fields); die();
					foreach($fields as $field)
					{
						if($field->field_key == 'Twilio_Phone_Number')
							$twilio_number = $field->field_output_value;
					}
					try {
						$response = $client->account->messages->sendMessage($twilio_number,'+'.$to,$message);
						//print_r($response);die();
						$result = array('result' => 1, 'message' => 'Message sent successfully');
					} catch (Exception $e ){
						$result = array('result' => 0, 'message' => $e->getMessage());
					}
				}
				else if($sms_settings[0]->sms_gateway_name == 'MSG91')
				{
					$CI->load->helper('msgnineone'); 
					$msgnineone = new msgnineone();
					$result = $msgnineone->sendSMS($to,$message);
					if(!empty($result))
					{
						$result = array('result' => 1, 'message' => 'Message sent successfully');
					}else{
						$result = array('result' => 0, 'message' => 'Message not sent successfully');
					}
				}
				return $result;
			}
			else
			{
				return array('result' => 0, 'message' => 'No SMS gateway configured. Please contact administrator');
			}
			
		}
		else
		{
			return array('result' => 0, 'message' => 'No SMS gateway configured. Please contact administrator'); 
		}
		
	}
}




// DATE FORMAT
if( ! function_exists('get_date_format_options'))
{
	function get_date_format_options()
	{
		 /*$options = array(								
            'mm/dd/YYYY' => 'mm/dd/YYYY',
            'mm/YYYY/dd' => 'mm/YYYY/dd',
            'dd/mm/YYYY' => 'dd/mm/YYYY',
            'dd/YYYY/mm' => 'dd/YYYY/mm',
            'YYYY/mm/dd' => 'YYYY/mm/dd',
            'YYYY/dd/mm' => 'YYYY/dd/mm',
            
            
            'mm.dd.YYYY' => 'mm.dd.YYYY',
            'mm.YYYY.dd' => 'mm.YYYY.dd',
            'dd.mm.YYYY' => 'dd.mm.YYYY',
            'dd.YYYY.mm' => 'dd.YYYY.mm',
            'YYYY.mm.dd' => 'YYYY.mm.dd',
            'YYYY.dd.mm' => 'YYYY.dd.mm',
            
            
            'mm-dd-YYYY' => 'mm-dd-YYYY',
            'mm-YYYY-dd' => 'mm-YYYY-dd',
            'dd-mm-YYYY' => 'dd-mm-YYYY',
            'dd-YYYY-mm' => 'dd-YYYY-mm',
            'YYYY-dd-mm' => 'YYYY-dd-mm',
            'YYYY-mm-dd' => 'YYYY-mm-dd'
            
            );*/


     	$options = array(								
            'mm/dd/YYYY' => 'mm/dd/YYYY',
            'YYYY/mm/dd' => 'YYYY/mm/dd',
            'dd.mm.YYYY' => 'dd.mm.YYYY',
            'dd-mm-YYYY' => 'dd-mm-YYYY',
            'YYYY-mm-dd' => 'YYYY-mm-dd'
            );

     	return $options;
                        
	}
}
?>