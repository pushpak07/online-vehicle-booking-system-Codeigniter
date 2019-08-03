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
 * @category  Payment
 * @package   DOVBSV2
 * @author    DOVBSV2 <digitalvidhya4u@gmail.com>
 * @copyright 2017 - 2018, DOVBSV2
 * @license   http://opensource.org/licenses/MIT    MIT License
 * @link      http://codeigniter.com
 * @since     Version 1.0.0
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter User_authentication Class
 * 
 * Payment.
 *
 * @category  Payment
 * @package   DOVBSV2
 * @author    DOVBSV2 <digitalvidhya4u@gmail.com>
 * @copyright 2017 - 2018, DOVBSV2
 * @license   http://opensource.org/licenses/MIT    MIT License
 * @link      http://codeigniter.com
 */
class Payment extends MY_Controller
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
	| MODULE: 			Payment
	| -----------------------------------------------------
	| This is Payment module controller file.
	| -----------------------------------------------------
	**/
	function __construct()
	{
		parent::__construct();
        
        check_access('members');
	}

	/**
     * Payment index
     *
     *
     * @return
    **/ 
	public function index()
	{
		redirect(SITEURL);
	}

	/**
     * Payment
     *
     *
     * @return boolean
    **/ 
	public function paynow()
	{
        if(DEMO) 
        {
            $this->prepare_flashmessage($this->lang->line('CRUD_operations_disabled_in_DEMO_version'), 2);
            redirect(SITEURL, REFRESH);
        }
            
		$payment_info = $this->config->item('paypal_settings');

		if (!empty($payment_info)) 
        {
            
			$amount = $this->session->userdata('bookinginfo');
            
			$total_amount = $amount['cost_of_journey'];

			
			$config['business'] = $payment_info->paypal_email;

			// Image header url [750 pixels wide by 90 pixels high]

			$config['cpp_header_image'] 	= get_paypal_logo();
            $config['return'] 				= site_url().'payment/payment_success';
            $config['cancel_return'] 		= site_url().'payment/payment_cancel';
			$config['notify_url'] 			= ''; //'process_payment.php'; //IPN Post
            
			$config['production'] 			= FALSE;
			if ($payment_info->account_type != 'sandbox') 
                $config['production'] = TRUE;
            
            
			$config['currency_code'] 		= $payment_info->currency;
            
			$this->load->library('paypal', $config);
			$this->paypal->add("Journey", $total_amount); //ADD  item
			$this->paypal->pay(); //Proccess the payment
            
		} else {
            
			$this->prepare_flashmessage("Please contact admin for this payment gateway", 1);
			$quizid = $subscriptioninfo['quizid'];

			// remove session data

			$this->session->unset_userdata('subscription_data');
			$this->session->unset_userdata('subscription_examname');
			redirect('user/instructions/' . $quizid, 'refresh');
		}
	}
    
    

	
	/**
     * Payment success
     *
     *
     * @return boolean
    **/ 
	function payment_success()
	{
        if (DEMO) 
        {
            $this->prepare_flashmessage($this->lang->line('CRUD_operations_disabled_in_DEMO_version'), 2);
            redirect(SITEURL, REFRESH);
        }
        
		$bookinginfo = $this->session->userdata('bookinginfo');
        
		$bookinginfo['payment_type'] 		= "paypal";
		$bookinginfo['payment_received'] 	= "1";
		$bookinginfo['transaction_id'] 		= $this->input->post("txn_id");
		$bookinginfo['payer_id'] 			= $this->input->post("payer_id");
		$bookinginfo['payer_email'] 		= $this->input->post("payer_email");
		$bookinginfo['payer_name'] 			= $this->input->post("first_name")." ".$this->input->post("last_name");
        
        

		$table 								= "bookings";
        
        
		$id = $this->base_model->insert_operation_id($bookinginfo, $table);
        
        if ($id) {
        
		$this->prepare_flashmessage("Payment Done Successfully for the Booking <strong>" . $bookinginfo['booking_ref'] . "</strong> with Transaction ID: <strong>" . $bookinginfo['transaction_id'] . "</strong>", 0);
        
        
		$this->data['journey_details'] 		= $this->session->userdata('journey_details');
		$this->data['user'] 				= $this->session->userdata('user');
		$this->data['payment_mode'] 		= "Paypal";
        
        
		/*email funuctionality*/
		$message =  $this->booking_mail_template_admin($this->data);
        
        //$this->load->view('booking_confirmation_email.php', $this->data, TRUE);
		
		$from = $this->data['user']['email'];
		$to = $this->config->item('site_settings')->portal_email;
        
		$subject = $this->config->item('site_settings')->site_title.' - Booking Reference No. '.$bookinginfo['booking_ref'];
        
        
		if (sendEmail($from, $to, $subject, $message)) {
        
            $from = $this->config->item('site_settings')->portal_email;

            $to = $this->data['user']['email'];
            
            $message =  $this->booking_mail_template_user($this->data);
            
            sendEmail($from, $to, $subject, $message);
        
  		}
		// email functionality end
        
        
         //SEND SMS
        $mobile_number 	= $this->data['user']['phone'];
            
        if ($this->config->item('site_settings')->sms_notification=='Yes' && $mobile_number!='') {
            
            $sms_details = $this->base_model->fetch_records_from(TBL_SMS_TEMPLATES, array('subject'=>'booking_successful'));
            
            if(!empty($sms_details))
            {
                $content = strip_tags($sms_details[0]->sms_template);
                
                $content     	= str_replace("__SITE_TITLE__", $this->config->item('site_settings')->site_title, $content);
                
                
                $content     	= str_replace("__BOOKING_REF__NO__", $bookinginfo['booking_ref'], $content);
                
                $content     	= str_replace("__TOTAL__COST__", $this->config->item('site_settings')->currency_symbol.$this->data['journey_details']['total_cost'], $content);
                
                sendSMS($mobile_number, $content);
            }
        }
        //SMS END
        
                
        
		// remove session data
		$this->session->unset_userdata('bookinginfo');
		$this->session->unset_userdata('user');
		$this->session->unset_userdata('journey_details');
        
        $this->session->unset_userdata('coupon_details');
        
		$this->data['css_type'] = array("form");
		$this->data['title'] 				= 'Booking Confirmation';
		$this->data['heading'] 				= "Booking Confirmation";
		$this->data['sub_heading'] 			= "Booking Confirmation";
		$this->data['bread_crumb'] 			= TRUE;
        
		$this->data['content'] 				= 'site/payment_confirmation';
        
		$this->_render_page(TEMPLATE_SITE, $this->data);
        
        } else {
            
            $this->prepare_flashmessage("Please contact admin for this payment gateway", 1);
			
			redirect(SITEURL);
        }
	}

	
	/**
     * Payment Cancel
     *
     *
     * @return boolean
    **/ 
	function payment_cancel()
	{
		$this->prepare_flashmessage("Payment Cancelled..Please contact Admin", 1);
		// remove session data
		$this->session->unset_userdata('bookinginfo');
		$this->session->unset_userdata('journey_details');
		redirect('welcome/onlineBooking', 'refresh');
	}

    
	
	/**
     * Payment History
     *
     *
     * @return array
    **/ 
	function payment_history()
	{
		$this->data['title'] 				= 'Payment Reports';
		$this->data['active_menu'] 			= 'payment_history';
        
		$this->data['records'] = $this->base_model->run_query("SELECT s.transaction_id,s.payer_email,s.payer_name, 
		q.name as quizname,q.quizcost as cost,s.dateofsubscription, q.validitytype,s.expirydate,q.validityvalue,s.remainingattempts FROM " . $this->db->dbprefix('quiz') . " q," . $this->db->dbprefix('quizsubscriptions') . " s," . $this->db->dbprefix('users') . " u  where s.quizid=q.quizid and s.user_id=u.id and s.user_id = " . $this->session->userdata('user_id'));
         
		$this->data['content'] = 'user/reports/payment_history';
        
		$this->_render_page('temp/usertemplate', $this->data);
	}
}
