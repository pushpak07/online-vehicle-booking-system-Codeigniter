<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


		

/****** Send Email ******/

	function sendEmail($from = null, $to = null, $sub = null, $msg = null, $cc = null, $bcc = null, $attachment = null)
  	{
		
		if(!filter_var($from, FILTER_VALIDATE_EMAIL) || !filter_var($to, FILTER_VALIDATE_EMAIL)) {
			return false;
		}
		$CI =& get_instance();
     	
	
		
			
		/**sendEmail through Webmail settings **/
		if($msg != "") {
			
			//$CI = & get_instance();
			$CI->load->library('email');
			$CI->email->clear();
			$config = Array(
						'protocol' 	=> 'smtp',
						'smtp_host' => $CI->config->item('emailSettings')->smtp_host,
						'smtp_port' => $CI->config->item('emailSettings')->smtp_port,
						'smtp_user' => $CI->config->item('emailSettings')->smtp_user,
						'smtp_pass' => $CI->config->item('emailSettings')->smtp_password,
						'charset' 	=> 'utf-8',
						'mailtype' 	=> 'html',
						'newline' 	=> "\r\n",
						'wordwrap' 	=> TRUE
					);		

			if($CI->config->item('emailSettings')->mail_config == "webmail"){
			
			$CI->email->initialize($config);
			
			$CI->email->from($CI->config->item('emailSettings')->smtp_user, $CI->config->item('site_title', 'ion_auth'));
			
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
		}
		
		/**end of  sendEmail through Web mail settings**/
		else{
		$CI->load->config('mandrill');
		
		$CI->load->library('mandrill');	
		
		$mandrill_ready = NULL;
		
		try {
		    $CI->mandrill->init( $CI->config->item('mandrill_api_key') );
		    $mandrill_ready = TRUE;
		} catch(Mandrill_Exception $e) {
		    $mandrill_ready = FALSE;
		}

		if( $mandrill_ready ) {

		    //Send us some email!
		    $email = array(
		        'html' => $msg, //Consider using a view file
				'text' => '',
		        'subject' => $sub,
		        'from_email' => $from,
		        'from_name' => $CI->config->item('site_title','ion_auth'),
		        'to' => array(array('email' => $to )) 
		        );

				$result = $CI->mandrill->messages_send($email);
				//print_r($result);
				if($result[0]['status']=='sent')
				return TRUE;
				else
				return FALSE;
		}
	}
	
	/*sendEmail through mandrill**/
		
    }
return false;
}



/****** Send Email 
if ( ! function_exists('sendEmail'))
{
	function sendEmail($from = null, $to = null, $sub = null, $msg = null, $cc = null, $bcc = null, $attachment = null)
  	{
  		$CI = & get_instance();
  		//echo "in send email"; die();
  		$from = $CI->config->item('emailSettings')->smtp_user;
		
  		$CI->load->library('mandrill');
		if(!filter_var($from, FILTER_VALIDATE_EMAIL) || !filter_var($to, FILTER_VALIDATE_EMAIL)) {
			//echo "stuck here"; die();
			return false;
		}
		
	//	echo "out here";
		
		if($msg != "") {
		
			$key = $CI->config->item('emailSettings')->api_key;
			
			try {
			
		    $CI->mandrill->init( $key );
		    $mandrill_ready = TRUE;

		} catch(Mandrill_Exception $e) {

		    $mandrill_ready = FALSE;
		    //echo "<pre> <br>in catch"; print_r($e); die();

		}
		
		//echo "Out If"	; die();
		
		if( $mandrill_ready ) {
			
		    //Send us some email!
		    $email = array(
		        'html' => $msg, //Consider using a view file
		        'text' => '',
		        'subject' => $sub,
		        'from_email' => $from,
		        'from_name' => $CI->config->item('site_settings')->site_title,
		        'to' => array(array('email' => $to )) 
		       	//for multiple emails
				/* 'to' => array(array('email' => 'joe@example.com' ),
		       				 array('email' => 'joe2@example.com' )) 
		        );
			
		    $result = $CI->mandrill->messages_send($email);
		  /*  echo "<pre>"; print_r($result); 
		    echo"<br/>Status". $result[0]['status'];
		    die(); 
		    if($result[0]['status'] == "sent")
		  	  return TRUE;
		    
		   //echo "yo boy...<pre>"; print_r($result); die();
		    

		}
		
		}
		return false;
    }
}*/


 
 
 
 