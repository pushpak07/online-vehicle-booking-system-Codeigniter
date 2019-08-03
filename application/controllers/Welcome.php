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
 * @category  Welcome
 * @package   DOVBSV2
 * @author    DOVBSV2 <digitalvidhya4u@gmail.com>
 * @copyright 2017 - 2018, DOVBSV2
 * @license   http://opensource.org/licenses/MIT    MIT License
 * @link      http://codeigniter.com
 * @since     Version 1.0.0
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter Welcome Class
 * 
 * Welcome.
 *
 * @category  Welcome
 * @package   DOVBSV2
 * @author    DOVBSV2 <digitalvidhya4u@gmail.com>
 * @copyright 2017 - 2018, DOVBSV2
 * @license   http://opensource.org/licenses/MIT    MIT License
 * @link      http://codeigniter.com
 */
class Welcome extends MY_Controller
{
	/**
	| -----------------------------------------------------
	| PRODUCT NAME: 	DIGI VEHICLE BOOKING SYSTEM (DVBS)
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
	| MODULE: 			Welcome
	| -----------------------------------------------------
	| This is welcome module controller file.
	| -----------------------------------------------------
	**/
	public function __construct()
	{
		parent::__construct();

		// To use site_url and redirect on this controller.
		//$this->load->helper('digiemail');
		
		$this->form_validation->set_error_delimiters(
		$this->config->item('error_start_delimiter', 'ion_auth'), 
		$this->config->item('error_end_delimiter', 'ion_auth')
		);
	}

    /**
     * Site index
     *
     *
     * @return path
    **/ 
	function index()
	{
		redirect('auth', 'refresh');
	}

    /**
     * Booking
     *
     *
     * @return boolean
    **/ 
	function onlineBooking()
	{
		$this->data['waiting'] 	= $this->db->get('waitings')->result();

		$waiting_options = $this->dvbs_model->get_book_waiting_options();
		$this->data['waiting_options'] 	= $waiting_options;

		$this->data['airports'] 		= $this->dvbs_model->get_home_airports('Active');

		$this->data['css_type'] 		= array("form","onlinebooking");
		$this->data['heading'] 			= $this->lang->line('online_booking');
		$this->data['sub_heading'] 		= "Online Booking";
		$this->data['bread_crumb'] 		= TRUE;
		$this->data['active_class'] 	= "onlinebooking";
		$this->data['title'] 			= $this->lang->line('online_booking');
		$this->data['content'] 			= 'site/online-booking';

		$this->_render_page(getTemplate(), $this->data);
	}

    /**
     * Booking Passenger Details
     *
     *
     * @return boolean
    **/ 
	function passengerDetails()
	{	
		if ($this->input->post()) {
            
			// echo "<pre>"; print_r($this->input->post()); die();
            
			if($this->input->post('check_cars') == "0") {
				$this->prepare_flashmessage("No cars Available for given locations", 1);
				redirect('welcome/onlineBooking');
			}

			$this->data['journey_details'] = $this->input->post();
            
			$this->session->unset_userdata('journey_details');
			$this->session->set_userdata('journey_details', $this->input->post());
            
            $this->session->unset_userdata('coupon_details');
            

			if ($this->ion_auth->logged_in()) {
				$this->data['user'] 	 = $this->db->get_where(
				$this->db->dbprefix('users'), 
				array('id' => $this->ion_auth->get_user_id())
				)->result_array() [0];
                
                
				$this->data['content'] = 'site/passenger-details';
			}
			else {
				$this->data['content'] = 'site/login-details';
			}
		} else {

			if ($this->ion_auth->logged_in()) {
				$this->data['user'] = $this->db->get_where($this->db->dbprefix('users'), 
				array('id' => $this->ion_auth->get_user_id()))->result_array() [0];
			}
            
			$this->data['journey_details'] 	= $this->session->userdata('journey_details');
			$this->data['content'] 			= 'site/passenger-details';
		}

		$this->data['css_type'] 			= array("form", "datatable");
		$this->data['heading'] 				= $this->lang->line('passenger_details');
		$this->data['sub_heading'] 			= "Passenger Details";
		$this->data['bread_crumb'] 			= TRUE;
		$this->data['title'] 				= $this->lang->line('passenger_details');

		$this->_render_page(getTemplate(), $this->data);
	}
    
    
    
    /**
     * Passenger summary content
     * AJAX CALL
     * 
     * @return page
    **/ 
    function passenger_summary_content() 
    {
        $page='';
        $journey_details 	= $this->session->userdata('journey_details');
       
       
        if (!empty($journey_details))
        {
            
                $page .= '<div class="col-md-3">
                    <div class="right-side-cont">
                        <div class="right-side-hed ">
                            '.$this->lang->line('booking_summary').'
                        </div>
                 
                        <div class="bre"> <strong>'. $this->lang->line('booking_reference').':</strong> '. $journey_details['booking_ref'].'</div>';
                 
                        
            $total_cst=0;
             
             
            //TAX        
            if ($this->config->item('site_settings')->apply_tax=='Yes' && $this->config->item('site_settings')->tax_amount>0) 
            {
                $total_cst += $this->config->item('site_settings')->tax_amount;
            }
             
            //JOURNEY COST    
            if (isset($journey_details['total_cost'])) 
            { 
            
                $total_cst += $journey_details['total_cost']; 
            }
          
            

            $page .= '<div class="bre">';
            
            if (isset($journey_details['waitnReturn']) && $journey_details['waitnReturn']=="on")  
            {
                
                $page .= '<aside class="le-con"><strong>'. $this->lang->line('journey_type').'</strong></br>'.$this->lang->line('two_way').'</aside>
                
                <aside class="ri-con">
                
                <strong>'.$this->lang->line('two_way_fare').'</strong> </br>'. 
                $this->config->item('site_settings')->currency_symbol.$total_cst
                .'</aside>';
                
            } 
            else 
            {
                
                $page .= '<aside class="le-con"><strong>'.$this->lang->line('journey_type').'</strong></br>'.$this->lang->line('one_way').'</aside>';
                
                
                $page .= ' <aside class="ri-con"> <strong>'. $this->lang->line('one_way_fare').'</strong> </br>'.$this->config->item('site_settings')->currency_symbol.$total_cst.'</aside>';
                
                
            }
            
            $page .= '</div>';  
                      

            
            
            
            
            $page .= '<div class="services">
            
                <h3>
                     '.$this->lang->line('journey_details').': 
                     <aside class="side"><a href="'.site_url().'welcome/onlineBooking"> <i class="fa fa-edit"></i> </a></aside>
                  </h3>
            
            
            
            <ul>
            <li><strong>'.$this->lang->line('pick_up').':</strong><br>'.$journey_details['pick_up'].'</li>
             <li><strong>'.$this->lang->line('drop_of').':</strong><br>'.$journey_details['drop_of'].'</li>
             <li><strong>'.$this->lang->line('pick_up_date').':</strong><br>'.$journey_details['pick_date'].'</li>
             <li><strong>'.$this->lang->line('pick_up_time').':</strong><br>'.$journey_details['pick_time'].'</li>
                   
             ';
            
            if (isset($journey_details['total_cost'])) {
            
            $label = $this->lang->line('cost_of_journey');
             if(isset($journey_details['waitnReturn']) && $journey_details['waitnReturn']=="on")  {
                 $label = $this->lang->line('cost_of_journey').'<br>'.'<small>includes waiting cost</small>';
             }
            
            $page .= '<li>
                        <strong>'.$label.':</strong>
                        <aside class="side">'. $this->config->item('site_settings')->currency_symbol.$journey_details['total_cost'].'</aside>
                     </li>';
                     
                     
            }
            
            
            if(isset($journey_details['waitnReturn']) && $journey_details['waitnReturn']=="on")  {
                
                $page .= '<li>
                        <strong>'.$this->lang->line('waiting_time').':</strong><br>'.$journey_details['waitingTime'].'
                        <aside class="side">'. $this->config->item('site_settings')->currency_symbol. 
						$journey_details['waitingCost'].'</aside>
                     </li>';
                
            }
            
            if ($this->config->item('site_settings')->apply_tax=='Yes' && $this->config->item('site_settings')->tax_amount>0) {
                
                $page .= ' <li>
                        <strong>'.$this->lang->line('tax_amount').':</strong>
                        <aside class="side">'. $this->config->item('site_settings')->currency_symbol.$this->config->item('site_settings')->tax_amount.'</aside>
                     </li>';
            }
            
            
             
            $page .= '<li><strong>'.$this->lang->line('journey_miles_and_time').':</strong><br>'.$journey_details['total_distance'].' & '.$journey_details['total_time'].'</li>';
            
            
            $page .= '<li>
                        <strong>'.$this->lang->line('car').':</strong><br>'.$journey_details['car_name'].'
                     </li>  </ul>';
            $page .= '</div>';
            
            
                 
            $page .=  '</div>
                </div>';
                
        }
        
        echo $page;
    }

     /**
     * Booking Payment
     * 
     * 
     * @return boolean
    **/ 
	function payment()
	{
         // echo "<pre>";print_R($this->session->userdata('journey_details'));die();
               
               
		if ($this->input->post()) {
			$this->session->unset_userdata('user');
            
            $this->session->unset_userdata('coupon_details');
            
			$this->data['user'] = $this->input->post();
			$this->session->set_userdata('user', $this->input->post());
		}
        
		$this->data['journey_details'] 		= $this->session->userdata('journey_details');
		$this->data['title'] 				= $this->lang->line('payment_details');
		$this->data['css_type'] 			= array("form", "datatable");
		$this->data['heading'] 				= $this->lang->line('payment_details');
		$this->data['sub_heading'] 			= "Payment Details";
		$this->data['bread_crumb'] 			= TRUE;
		$this->data['content'] 				= 'site/payment';

		$this->_render_page(getTemplate(), $this->data);
	}
	
    
     /**
     * Payment summary content
     * AJAX CALL
     * 
     * @return page
    **/ 
    function payment_summary_content() 
    {
        
        $page='';
        $journey_details 	= $this->session->userdata('journey_details');
        $user = $this->session->userdata('user');
        
        $coupon_details 	= $this->session->userdata('coupon_details');
        
        if (!empty($journey_details) && !empty($user)) {
            
        $page .= '<div class="col-md-3">
                    <div class="right-side-cont">
                        <div class="right-side-hed ">
                            '.$this->lang->line('booking_summary').'
                        </div>
                 
                        <div class="bre"> <strong>'. $this->lang->line('booking_reference').':</strong> '. $journey_details['booking_ref'].'</div>';
                 
                        
             $total_cst=0;
             
             
             //TAX        
             if ($this->config->item('site_settings')->apply_tax=='Yes' && $this->config->item('site_settings')->tax_amount>0) {
                 $total_cst += $this->config->item('site_settings')->tax_amount;
             }
             
             //JOURNEY COST    
             if (isset($journey_details['total_cost'])) { 
            
                $total_cst += $journey_details['total_cost']; 
             }
             
             //COUPON
             if (isset($coupon_details['coupon_applied']) && $coupon_details['coupon_applied']=='Yes') { 
            
                $total_cst -= $coupon_details['coupon_amount']; 
             }
             
            if ($total_cst<0)
                $total_cst=0;
            
            

            $page .= '<div class="bre">';
            
            if (isset($journey_details['waitnReturn']) && $journey_details['waitnReturn']=="on")  {
                
                $page .= '<aside class="le-con"><strong>'. $this->lang->line('journey_type').'</strong></br>'.$this->lang->line('two_way').'</aside>
                
                <aside class="ri-con">
                
                <strong>'.$this->lang->line('two_way_fare').'</strong> </br>'. 
                $this->config->item('site_settings')->currency_symbol.$total_cst
                .'</aside>';
                
            } else {
                
                $page .= '<aside class="le-con"><strong>'.$this->lang->line('journey_type').'</strong></br>'.$this->lang->line('one_way').'</aside>';
                
                
                $page .= ' <aside class="ri-con"> <strong>'. $this->lang->line('one_way_fare').'</strong> </br>'.$this->config->item('site_settings')->currency_symbol.$total_cst.'</aside>';
                
                
            }
            
            $page .= '</div>';  
                      

            
            
            
            
            $page .= '<div class="services">
            
                <h3>
                     '.$this->lang->line('journey_details').': 
                     <aside class="side"><a href="'.site_url().'welcome/onlineBooking"> <i class="fa fa-edit"></i> </a></aside>
                  </h3>
            
            
            
            <ul>
            <li><strong>'.$this->lang->line('pick_up').':</strong><br>'.$journey_details['pick_up'].'</li>
             <li><strong>'.$this->lang->line('drop_of').':</strong><br>'.$journey_details['drop_of'].'</li>
             <li><strong>'.$this->lang->line('pick_up_date').':</strong><br>'.$journey_details['pick_date'].'</li>
             <li><strong>'.$this->lang->line('pick_up_time').':</strong><br>'.$journey_details['pick_time'].'</li>
                   
             ';
            
            if (isset($journey_details['total_cost'])) {
            
            $label = $this->lang->line('cost_of_journey');
             if(isset($journey_details['waitnReturn']) && $journey_details['waitnReturn']=="on")  {
                 $label = $this->lang->line('cost_of_journey').'<br>'.'<small>includes waiting cost</small>';
             }
            
            $page .= '<li>
                        <strong>'.$label.':</strong>
                        <aside class="side">'. $this->config->item('site_settings')->currency_symbol.$journey_details['total_cost'].'</aside>
                     </li>';
                     
                     
            }
            
            
            if(isset($journey_details['waitnReturn']) && $journey_details['waitnReturn']=="on")  {
                
                $page .= '<li>
                        <strong>'.$this->lang->line('waiting_time').':</strong><br>'.$journey_details['waitingTime'].'
                        <aside class="side">'. $this->config->item('site_settings')->currency_symbol. 
						$journey_details['waitingCost'].'</aside>
                     </li>';
                
            }
            
            if ($this->config->item('site_settings')->apply_tax=='Yes' && $this->config->item('site_settings')->tax_amount>0) {
                
                $page .= ' <li>
                        <strong>'.$this->lang->line('tax_amount').':</strong>
                        <aside class="side">'. $this->config->item('site_settings')->currency_symbol.$this->config->item('site_settings')->tax_amount.'</aside>
                     </li>';
            }
            
            
            //COUPON
            if (isset($coupon_details['coupon_applied']) && $coupon_details['coupon_applied']=='Yes') { 
            
                
                $page .= ' <li>
                        <strong>'.$this->lang->line('coupon_discount_amount').':</strong>
                        <aside class="side">'. $this->config->item('site_settings')->currency_symbol.$coupon_details['coupon_amount'].'</aside>
                     </li>';
                     
            }
             
             
            $page .= '<li><strong>'.$this->lang->line('journey_miles_and_time').':</strong><br>'.$journey_details['total_distance'].' & '.$journey_details['total_time'].'</li>';
            
            
            $page .= '<li>
                        <strong>'.$this->lang->line('car').':</strong><br>'.$journey_details['car_name'].'
                     </li>  </ul>';
           $page .= '</div>';
            
            
           

           $page .= '<div class="one-way-fare">
                  '.$this->lang->line('personal_details').'  
               </div>';
            
            
            
            $page .= '<div class="services">
                  <ul>
                     <li><strong>'.$this->lang->line('name').':</strong><br>'. $user['username'].'</li>
                     <li><strong>'.$this->lang->line('email').':</strong><br>'. $user['email'].'</li>
                     <li><strong>'.$this->lang->line('phone').':</strong><br>'. $user['phone'].'</li>
					 <li><strong>'.$this->lang->line('information_to_driver').':</strong><br>'. $user['information'].'</li>
                  </ul>
               </div>';
            
            
            
            

            
                      
                      
                        
                 
        $page .=  '</div>
                </div>';
                
        }
        
        echo $page;
    }
    
     /**
     * Apply coupon - Booking
     * AJAX CALL
     * 
     * @return boolean
    **/ 
    function apply_coupon() 
    {
        
        if ($this->input->is_ajax_request()) {
            
            $cpn_code = $this->input->post('cpn_code');
            
            if (!empty($cpn_code)) {
                
                $journey_details = $this->session->userdata('journey_details');
                
                if (!empty($journey_details)) {
                    
                    $coupon_details = $this->session->userdata('coupon_details');
                    
                    if (isset($coupon_details['coupon_applied']) && $coupon_details['coupon_applied']=='Yes') {
                        
                        echo 99;//already applied
                        
                    } else {
                        
                        
                        $today = date('Y-m-d');
                        
                        $record = $this->base_model->run_query("select * from ".TBL_PREFIX.TBL_COUPONS." where '".$today."' between from_date and to_date and coupon_code='".$cpn_code."' and status='Active' ");
                        
                        if (!empty($record)) {
                            
                            $record = $record[0];
                            
                            //coupon_applied
                            //coupon_amount
                            //coupon_code
                            
                            $coupon_details = array('coupon_applied'=>'Yes',
                            'coupon_amount'=>$record->discount_amount,
                            'coupon_code'=>$cpn_code);
                            
                           
                            $this->session->set_userdata('coupon_details', $coupon_details);
                            
                            echo 1;
                            
                        } else 
                            echo 0;
                    }
                        
                } else 
                    echo 0;
                
            } else 
                echo 0;
        }
    }
    
    
    
    /**
     * Payment confirmation - Booking
     * 
     * 
     * @return boolean
    **/ 
	function paymentConfirmation()
	{
		if ($this->input->post()) {

            $this->check_isdemo(site_url());

            // echo "<pre>";print_R($_POST);
            
             // echo "<pre>";print_R($this->session->userdata);
             // die();
             
             // echo "<pre>";print_R($this->session->userdata('journey_details'));
            // die();
            
            
			$payment_mode 					= $this->input->post();

			if($this->session->userdata('journey_details')['booking_ref'] != "") {

			$this->data['journey_details'] 	= $this->session->userdata('journey_details');
			$this->data['user'] 			= $this->session->userdata('user');
			$this->data['payment_mode'] 	= $this->input->post('radiog_dark');


			if ( $this->ion_auth->logged_in() && $this->ion_auth->is_member()) 
			$inputdata['user_id'] 			= $this->ion_auth->get_user_id();


			$inputdata['booking_ref'] 		= $this->data['journey_details']['booking_ref'];
			$inputdata['pick_date'] 		= date('Y-m-d', strtotime($this->data['journey_details']['pick_date']));
			$inputdata['pick_time'] 		= $this->data['journey_details']['pick_time'];
			$inputdata['pick_point'] 		= $this->data['journey_details']['pick_up'];
			$inputdata['drop_point'] 		= $this->data['journey_details']['drop_of'];



			$dis_info = explode(" ", $this->data['journey_details']['total_distance']);

			$vehicle_id = explode("_", $this->data['journey_details']['radiog_dark']);
            
            
            

			$inputdata['distance'] 			= $dis_info[0];
			$inputdata['distance_type'] 	= $this->config->item('site_settings')->distance_type;
			$inputdata['vehicle_selected'] 	= $vehicle_id[0];
            
            
            
            
            
            $coupon_details = $this->session->userdata('coupon_details');
            
            //TOTAL COST (INCLUDE WAITING COST)
            //TAX
            //COUPON
            
            $total_cst=0;
            
            //TAX        
            if ($this->config->item('site_settings')->apply_tax=='Yes' && $this->config->item('site_settings')->tax_amount>0) 
            {
                 $total_cst += $this->config->item('site_settings')->tax_amount;
            }
             
            //JOURNEY COST    
            if (isset($this->data['journey_details']['total_cost'])) 
            { 
            
                $total_cst += $this->data['journey_details']['total_cost']; 
            }
             
            //COUPON
            if (!empty($coupon_details) && $coupon_details['coupon_applied']=='Yes' && $coupon_details['coupon_amount']>0) 
            {
                $total_cst -= $coupon_details['coupon_amount'];
            }
            
            
            if ($total_cst<0)
                $total_cst=0;

            $this->data['total_cst']  = $total_cst;
            
            
             
            
           
            
			$inputdata['cost_of_journey'] 	= $total_cst;//$this->data['journey_details']['total_cost'];
            

            $inputdata['only_booking_cost'] = $this->data['journey_details']['total_cost'];
            
			$inputdata['payment_type'] 		= $payment_mode['radiog_dark'];


			if ($inputdata['payment_type'] == "cash") 
				$inputdata['payment_received'] = "0";


			$inputdata['is_conformed'] 		= "pending";
			$inputdata['bookdate'] 			= date('Y-m-d');
			$inputdata['registered_name'] 	= $this->data['user']['username'];
			$inputdata['phone'] 			= $this->data['user']['phone'];
			$inputdata['email'] 			= $this->data['user']['email'];
			$inputdata['info_to_drivers'] 	= $this->data['user']['information'];
			$inputdata['package_type'] 		= $this->data['journey_details']['package_type'];


            //
            $inputdata['total_time'] 		= $this->data['journey_details']['total_time'];
            
            
            if (isset($this->data['journey_details']['waitnReturn']) && $this->data['journey_details']['waitnReturn']=='on') {
                
                $inputdata['return_journey'] 	= 'Yes';
                
                $inputdata['waiting_time'] 		= $this->data['journey_details']['waitingTime'];
                
                $inputdata['waiting_cost'] 		= $this->data['journey_details']['waitingCost'];
            
            } else {
                
                $inputdata['return_journey'] 	= 'No';
            }
            
            
            //TAX
            if ($this->config->item('site_settings')->apply_tax=='Yes' && $this->config->item('site_settings')->tax_amount>0) {
                
                $inputdata['tax_applied'] 	= 'Yes';
                $inputdata['tax_amount'] 	= $this->config->item('site_settings')->tax_amount;
            } else {
                
                $inputdata['tax_applied'] 	= 'No';
                $inputdata['tax_amount'] 	= NULL;
            }
            
            
            
            //COUPON
           
            if (!empty($coupon_details) && $coupon_details['coupon_applied']=='Yes') {
                
                $inputdata['coupon_applied'] 	= 'Yes';
                $inputdata['coupon_code'] 	    = $coupon_details['coupon_code'];
                $inputdata['coupon_discount_amount'] = $coupon_details['coupon_amount'];
            } else {
                
                $inputdata['coupon_applied'] 	= 'No';
                $inputdata['coupon_code'] 	    = NULL;
                $inputdata['coupon_discount_amount'] = NULL;
            }
            
            
            
			if ($inputdata['payment_type'] == "paypal") {
				$this->session->set_userdata('bookinginfo', $inputdata);
				redirect(site_url().'payment/paynow');
			}

            if ($inputdata['payment_type'] == "payu") {
                $this->session->set_userdata('bookinginfo', $inputdata);
                redirect(site_url().'payumoney/payment');
            }

            if ($inputdata['payment_type'] == "stripe") {
                $this->load->library('stripe');
                // $stripe = new Stripe( $config )
                $card_data = array(

                  'number' => $this->input->post('card_number'),

                  'cvc' => $this->input->post('cvv'),

                  'exp_month' => $this->input->post('exp_month'),

                  'exp_year' => $this->input->post('exp_year'),

                  'name' => $this->input->post('email'),

                );
                $dollars = $total_cst;
                $email = $this->input->post('email');
                $cents = number_format((float)$dollars*100., 0, '.', "");
                $tokenArray = json_decode($this->stripe->card_token_create($card_data, $cents));





                $stripeToken = $tokenArray->id;
                $amount =  $cents;
                $card = $card_data;
                $customer =  json_decode($this->stripe->create_customer($email, $stripeToken));
                $customer_id = $customer->id;
                $desc = "Booking Reference ".$this->data['journey_details']['booking_ref'];

                $payWithStripe = json_Decode($this->stripe->charge_customer($amount, $customer_id, $desc));

                
                if ($payWithStripe->status != 'succeeded' ) {
                    redirect('/');
                }
                
                $inputdata['payment_received']    = $total_cst;
                $inputdata['payment_received']    = "1";
                $inputdata['transaction_id']      = $payWithStripe->balance_transaction;
                $inputdata['payer_id']            = $payWithStripe->customer;
                $inputdata['payer_email']         = $payWithStripe->source->name;
                
            }

            
            

			$table 	= "bookings";
			$this->base_model->insert_operation($inputdata, $table); 

			if (1) {
                
                
            
				/* Send Booking Mail to User and Admin */
				
				$message = $this->booking_mail_template_admin($this->data);
                
                //$this->load->view('booking_confirmation_email.php', $this->data, TRUE);

				$from = $inputdata['email'];

				$to = $this->config->item('site_settings')->portal_email;

				$sub = $this->lang->line('booking_ref').": ".$inputdata['booking_ref'];

				if ( sendEmail($from, $to, $sub, $message) ) {

					$from    = $this->config->item('site_settings')->portal_email;

					$to      = $inputdata['email'];

					$sub = $this->lang->line('booking_ref').": ".$inputdata['booking_ref'];
                    
                    
                    $message = $this->booking_mail_template_user($this->data);
                

					sendEmail($from, $to, $sub, $message);
				}
                
                
                
                 //SEND SMS
                $mobile_number 	= $inputdata['phone'];
                    
                if ($this->config->item('site_settings')->sms_notification=='Yes' && $mobile_number!='') {
                    
                    $sms_details = $this->base_model->fetch_records_from(TBL_SMS_TEMPLATES, array('subject'=>'booking_successful'));
                    
                    if(!empty($sms_details))
                    {
                        $content = strip_tags($sms_details[0]->sms_template);
                        
                        $content     	= str_replace("__SITE_TITLE__", $this->config->item('site_settings')->site_title, $content);
                        
                        
                        $content     	= str_replace("__BOOKING_REF__NO__", $inputdata['booking_ref'], $content);
                        
                        $content     	= str_replace("__TOTAL__COST__", $this->config->item('site_settings')->currency_symbol.$this->data['journey_details']['total_cost'], $content);
                        
                        sendSMS($mobile_number, $content);
                    }
                }
                //SMS END
                    

				$this->session->unset_userdata('bookinginfo');
				$this->session->unset_userdata('user');
				$this->session->unset_userdata('journey_details');
                $this->session->unset_userdata('coupon_details');
				
				$this->data['css_type'] 	= array("form");
				$this->data['title'] 		= 'Booking Confirmation';
				$this->data['heading'] 		= "Booking Confirmation";
				$this->data['sub_heading'] 	= "Booking Confirmation";
				$this->data['bread_crumb'] 	= TRUE;
				$this->data['content'] 		= 'site/payment_confirmation';

				$this->_render_page(getTemplate(), $this->data);
			}
			
			} else redirect('/');
		}
	    else {
			redirect('/');
     }
	}  


    /**
     * List Faqs
     *
     * 
     * @return array
    **/ 
	function faqs()
	{
		$faqs = $this->dvbs_model->get_home_faqs();

		$this->data['faqs'] 				= $faqs;

		$this->data['css_type'] 			= array("form");
		$this->data['title'] 				= 'FAQs';
		$this->data['heading'] 				= "FAQs";
		$this->data['sub_heading'] 			= "FAQs";
		$this->data['active_class'] 		= "faqs";
		$this->data['bread_crumb'] 			= TRUE;
		$this->data['content'] 				= 'site/faqs';

		$this->_render_page(getTemplate(), $this->data);
	}



	 /**
     * Contact us
     *
     * 
     * @return boolean
    **/ 
	function contactUs()
	{
		$this->data['message'] 				= "";

		if ($this->input->post()) {

            $this->check_isdemo(site_url().'welcome/contactUs');
            
            $msg='';
            $status=0;
			
			// form validations
			$this->form_validation->set_rules('name', 'Name', 'required|xss_clean');
			$this->form_validation->set_rules('contact_no', 'Phone number', 'required|xss_clean|min_length[9]|max_length[30]');
			$this->form_validation->set_rules('email', 'Email', 'required|xss_clean');
			$this->form_validation->set_rules('booking_no', 'Booking Number', 'trim|xss_clean');
			$this->form_validation->set_rules('message', 'Message', 'xss_clean');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

			if ($this->form_validation->run() == TRUE) {

				// $this->data['info'] = $this->input->post();

				/* $message = $this->load->view('email_format.php', $this->data, TRUE); */
                
                $name       = $this->input->post('name');		
				$email 		= $this->input->post('email');
				$phone 	    = $this->input->post('contact_no');
				$message 	= $this->input->post('message');
                $booking_no = $this->input->post('booking_no');
                
                
                $email_template = $this->base_model->fetch_records_from(TBL_EMAIL_TEMPLATES, array('subject'=>'contact_query','status'=>'Active'));
                
                if(!empty($email_template)) 
				{
                    $email_template = $email_template[0];
					
					$content 		= $email_template->email_template;
					
				
					$logo_img='<img src="'.get_site_logo().'" class="img-responsive" style="width:30%">';
					
					$content     	= str_replace("__SITE_LOGO__", $logo_img, $content);
                    
                    $content     	= str_replace("__SITE_TITLE__", $this->config->item('site_settings')->site_title, $content);
					
					$content     	= str_replace("__USER__", $name, $content);
					
					$content     	= str_replace("__USER_NAME__", $name, $content);
					
					$content     	= str_replace("__EMAIL__", $email, $content);
					
					$content     	= str_replace("__PHONE__", $phone, $content);
                    
                    $content     	= str_replace("__BOOKING_NO__", $booking_no, $content);
                    
                    $content     	= str_replace("__MESSAGE__", $message, $content);
					
					$content     	= str_replace("__SITE_TITLE__", $this->config->item('site_settings')->site_title, $content);
                    
                    
                    $from = $this->input->post('email');
				
                    $to = $this->config->item('site_settings')->portal_email;
				

                    $sub = $this->config->item('site_title', 'ion_auth') . ' - ' . $this->lang->line('contact_query');
				

                    if ( sendEmail($from, $to, $sub, $content) ) {

                        $msg .= $this->lang->line('your_contact_request_sent_successfully');
						$status=0;
                    }
                    
                    else {
                        
                            
                        $msg .= $this->lang->line('your_contact_query_not_sent_due_to_some_technical_issue_please_contact_us_after_sometime_thank_you');
                        $status=1;
                    }
                
                
                } else {
                    
                    $msg .= $this->lang->line('your_contact_query_not_sent_due_to_some_technical_issue_please_contact_us_after_sometime_thank_you');
					$status=1;
                    
                }
                
                $this->prepare_flashmessage($msg, $status);
				redirect('welcome/contactUs', 'refresh');
                
			}


		}



		$this->data['css_type'] 			= array("form");
		$this->data['title'] 				= $this->lang->line('contact_us');
		$this->data['heading'] 				= $this->lang->line('contact_us');
		$this->data['active_class'] 		= "contactus";
		$this->data['sub_heading'] 			= $this->lang->line('contact_us');
		$this->data['bread_crumb'] 			= TRUE;
		$this->data['content'] 				= 'site/contact_us';

		$this->_render_page(getTemplate(), $this->data);
	}

	 /**
     * List Testimonials
     *
     * 
     * @return array
    **/ 
	function testimonials()
	{
		$testimonials = $this->dvbs_model->get_testimonials('Active');
		$this->data['testimonials'] 		= $testimonials;
		$this->data['css_type'] 			= array("form");
		$this->data['title'] 				= 'Testimonials';
		$this->data['heading'] 				= "Testimonials";
		$this->data['sub_heading'] 			= "Testimonials";
		$this->data['active_class'] 		= "Testimonials";
		$this->data['bread_crumb'] 			= TRUE;
		$this->data['content'] 				= 'site/testimonials';

		$this->_render_page(getTemplate(), $this->data);
	}


}
