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
 * @category  PayUMoney
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
 * PayUMoney.
 *
 * @category  PayUMoney
 * @package   DOVBSV2
 * @author    DOVBSV2 <digitalvidhya4u@gmail.com>
 * @copyright 2017 - 2018, DOVBSV2
 * @license   http://opensource.org/licenses/MIT    MIT License
 * @link      http://codeigniter.com
 */
class PayUMoney extends MY_Controller {

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
	| MODULE: 			PayUMoney
	| -----------------------------------------------------
	| This is PayUMoney module controller file.
	| -----------------------------------------------------
	**/
	public function __construct()
 {
        parent::__construct();
 }

    /**
     * Payment
     *
     *
     * @return boolean
    **/ 
	public function payment()
	{
		$this->load->library('payu');

		$key 			= $this->payu->get_key();
		$salt 			= $this->payu->get_salt();

		$action_url 	= $this->payu->get_action_url();
		$transaction_id = $this->payu->get_transaction_id();
		$hash 			= '';

		$bookinginfo = $this->session->userdata('bookinginfo');
		$amount = $bookinginfo['cost_of_journey'];
		$firstname = $bookinginfo['registered_name'];
		$email = $bookinginfo['email'];
		$phone = $bookinginfo['phone'];
		$transaction_id = $bookinginfo['booking_ref'];
		$productinfo = "Reference Booking ".$transaction_id;
		$surl	= site_url().'payumoney/payment_success';
		$furl	= site_url().'payumoney/payment_failed';
		$curl	= site_url().'payumoney/payment_canceled';

	
		$data['key'] 			= $key; 
        $data['txnid'] 			= $transaction_id;
        $data['amount'] 		= $amount;
        $data['productinfo']	= $productinfo;
        $data['firstname'] 		= $firstname;
	    $data['email'] 			= $email;
	    $data['udf1'] 			= '';
	    $data['udf2'] 			= '';
	    $data['udf3'] 			= '';
	    $data['udf4'] 			= '';
	    $data['udf5'] 			= '';
	    $data['udf6'] 			= '';
	    $data['udf7'] 			= '';
	    $data['udf8'] 			= '';
	    $data['udf9'] 			= '';
	    $data['udf10'] 			= '';
	    $hash 	= $this->payu->get_hash($data);
	    $data['phone'] 			= $phone;
		$data['surl'] 			= $surl;
	    $data['furl'] 			= $furl;
	    $data['curl'] 			= $curl;
		$data['action'] = $action_url;
		$data['hash'] = $hash;

		$this->load->view('site/payment_send', $data);

	}
	
	/**
     * Payment
     *
     *
     * @return boolean
    **/ 
	public function send_payment()
	{

		$this->load->library('payu');
		
		$firstname 	= 'john peter';//$this->session->flashdata('firstname');
		$email 		= $this->session->flashdata('email');
		$phone 		= $this->session->flashdata('phone');
		$amount 	= $this->session->flashdata('amount');
		$key 		= $this->session->flashdata('key');
		$txnid 		= $this->session->flashdata('txnid');
		$surl 		= $this->session->flashdata('surl');
		$furl 		= $this->session->flashdata('furl');
		$productinfo = $this->session->flashdata('productinfo');
		$hash 		= $this->session->flashdata('hash');
		$action_url 	= $this->session->flashdata('action_url');

		$data['firstname'] = $firstname;
		$this->data['email'] = $email;
		$this->data['phone'] = $phone;
		$this->data['amount'] = $amount;
		$this->data['key'] = $key;
		$this->data['txnid'] = $txnid;
		$this->data['surl'] = $surl;
		$this->data['furl'] = $furl;
		$this->data['productinfo'] = $productinfo;
		$this->data['hash'] = $hash;
		$this->data['action_url'] = $action_url;
		$this->data['content'] = 'site/payment_send';
		
		$this->load->view('site/payment_send', $data);
	}
	
	/**
     * Payment success
     *
     *
     * @return boolean
    **/ 
	public function payment_success()
	{
		$this->load->library('payu');
		
		$bookinginfo = $this->session->userdata('bookinginfo');
        
		$bookinginfo['payment_type'] 		= "payu";
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
        
		$this->_render_page('templates/site_template', $this->data);
        
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
     * Payment failed
     *
     *
     * @return boolean
    **/ 
	public function payment_failed()
	{
		$this->prepare_flashmessage("Payment Cancelled..Please contact Admin", 1);
		// remove session data
		$this->session->unset_userdata('bookinginfo');
		$this->session->unset_userdata('journey_details');
		redirect('welcome/onlineBooking', 'refresh');

	}
	
	/**
     * Payment cancelled
     *
     *
     * @return boolean
    **/ 
	public function payment_canceled()
	{
		$this->prepare_flashmessage("Payment Cancelled..Please contact Admin", 1);
		// remove session data
		$this->session->unset_userdata('bookinginfo');
		$this->session->unset_userdata('journey_details');
		redirect('welcome/onlineBooking', 'refresh');

	}
}
