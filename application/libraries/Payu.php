<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	/**
	* Name: PayUMoney
	*
	* Author: Vikas Burman
	*
	* EMAIL: bvikasvburman@gmail.com
	*
	* Location: Indore
	*
	* Created:  18.01.2017
	*
	* Description:  Pay U Money Lib
	*
	*/
	class Payu
	{
		protected $_ci;
		
		protected $mode;
		protected $merchant_key;
		protected $salt;
		// protected $base_url;
		protected $hash_sequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
		
		public function __construct()
		{
			//initialize the CI super-object
			$this->_ci =& get_instance();
			//load config
			$this->_ci->load->config('payumoney', TRUE);
			
			//get settings from config
			$this->mode        		= $this->_ci->config->item('mode', 'payumoney');
			// $this->merchant_key 	= $this->_ci->config->item('merchant_key', 'payumoney');
			// $this->salt 		 	= $this->_ci->config->item('salt', 'payumoney');
			// $this->base_url 		= $this->_ci->config->item('base_url', 'payumoney');
		}
		//==========================================================
		public function get_key(){
			if($this->mode === 'live'){
				$this->merchant_key = $this->_ci->config->item('live_merchant_key', 'payumoney');	
				
			}else{
				$this->merchant_key =  $this->_ci->config->item('test_merchant_key', 'payumoney');
			}
			return $this->merchant_key ;
		}
		//==========================================================
		public function get_salt(){
			if($this->mode === 'live'){
				$this->salt = $this->_ci->config->item('live_salt', 'payumoney');	
				
			}else{
				$this->salt =  $this->_ci->config->item('test_salt', 'payumoney');
			}
			return $this->salt;
		}
		//==========================================================
		public function get_action_url(){
			if($this->mode === 'live'){
				return 'https://secure.payu.in/_payment';	
			}else{
				return 'https://test.payu.in/_payment';
			}
			
		}
		//==========================================================
		public function get_transaction_id(){
			return substr(hash('sha256', mt_rand() . microtime()), 0, 20);
		}
		//==========================================================
		public function get_hash( $posted ){
			$hash_sequence = $this->hash_sequence;
			$hash_vars_seq = explode('|', $hash_sequence);
			$hash_string = '';
			foreach( $hash_vars_seq as $hash_var ) {
				$hash_string .= isset( $posted[$hash_var] ) ? $posted[$hash_var] : '';
				$hash_string .= '|';
			}
			$hash_string .= $this->salt;
			$hash 	= strtolower(hash('sha512', $hash_string));
			return $hash;
		}
		//==========================================================
	
		public function get_valid_hash( $posted ){
			$salt 		= $this->get_salt();
			$key 		= $this->get_key(); 
			
			$status       = $posted["status"];
			$firstname    = $posted["firstname"];
			$amount       = $posted["amount"];
			$txnid        = $posted["txnid"];
			$posted_hash  = $posted["hash"];
			$key          = $posted["key"];
			$productinfo  = $posted["productinfo"];
			$email        = $posted["email"];
			$user_id      = $posted["user_id"];
			$transaction_mode      = $posted["transaction_mode"];
			
			if ( isset( $posted["additionalCharges"]) ) {
				$additional_charges 	= $posted["additionalCharges"];
				$retHashSeq 			= $additional_charges.'|'. $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
			} else {
				$retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
			}
			$hash = hash("sha512", $retHashSeq);
			if ( $hash != $posted_hash ) {
				return false;
			} else {
				return array('status' => $status, 'txnid' => $txnid, 'amount' => $amount, 'user_id' => $user_id, 'transaction_mode' => $transaction_mode);
			}
		}		
		//==========================================================
	}