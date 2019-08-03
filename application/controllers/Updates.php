<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Updates extends MY_Controller {



/*

| -----------------------------------------------------

| PRODUCT NAME: 	DIGI ONLINE VEHICLE BOOKING SYSTEM (DOVBS)

| -----------------------------------------------------

| AUTHER:			DIGITAL VIDHYA TEAM

| -----------------------------------------------------

| EMAIL:			digitalvidhya4u@gmail.com

| -----------------------------------------------------

| COPYRIGHTS:		RESERVED BY DIGITAL VIDHYA

| -----------------------------------------------------

| WEBSITE:			http://digitalvidhya.com

|                   http://codecanyon.net/user/digitalvidhya      

| -----------------------------------------------------

|

| MODULE: 			General

| -----------------------------------------------------

| This is general module controller file.

| -----------------------------------------------------

*/



	

	function __construct()

    {

        parent::__construct();
		
		

		$this->load->library('form_validation');

		$this->load->helper('url');
		

    } 

	

	//Home Page (Default Function. If no function is called, this function will be called).	
	public function index()
	{
		redirect(site_url().'updates/db_changes');

	}


	/**	
	 * Database v1 to v2 changes log for existing users		
	 * @return boolean
	 */
	function db_changes()
	{

		//Bookings table
		//1.total_time	VARCHAR(50) Default NULL
		$query="ALTER TABLE vbs_bookings ADD COLUMN IF NOT EXISTS total_time varchar(50) DEFAULT NULL";
		$this->db->query($query);



		//2.only_booking_cost float(10,2) Default NULL
		$query="ALTER TABLE vbs_bookings ADD COLUMN IF NOT EXISTS only_booking_cost float(10,2) DEFAULT NULL";
		$this->db->query($query);


		//3.drop column payment_type
		$query = "ALTER TABLE vbs_bookings DROP COLUMN IF EXISTS payment_type";
		$this->db->query($query);



		//4.payment_type ENUM ('cash','paypal','credit card','stripe','payu') Default cash
		$query="ALTER TABLE vbs_bookings ADD COLUMN IF NOT EXISTS payment_type ENUM('cash','paypal','credit card','stripe','payu') DEFAULT 'cash'";
		$this->db->query($query);


		//5.return_journey ENUM ('Yes','No') Default NULL
		$query="ALTER TABLE vbs_bookings ADD COLUMN IF NOT EXISTS return_journey ENUM('Yes','No') DEFAULT NULL";
		$this->db->query($query);


		//6.waiting_time VARCHAR(10) Default NULL
		$query="ALTER TABLE vbs_bookings ADD COLUMN IF NOT EXISTS waiting_time VARCHAR(10) DEFAULT NULL";
		$this->db->query($query);



		//7.waiting_cost float(10,2) Default NULL
		$query="ALTER TABLE vbs_bookings ADD COLUMN IF NOT EXISTS waiting_cost float(10,2) DEFAULT NULL";
		$this->db->query($query);


		//8.coupon_applied ENUM('Yes','No') Default NULL
		$query="ALTER TABLE vbs_bookings ADD COLUMN IF NOT EXISTS coupon_applied ENUM('Yes','No') DEFAULT NULL";
		$this->db->query($query);



		//9.coupon_code VARCHAR(50) Default NULL
		$query="ALTER TABLE vbs_bookings ADD COLUMN IF NOT EXISTS coupon_code VARCHAR(50) DEFAULT NULL";
		$this->db->query($query);



		//10.coupon_discount_amount float(10,2) Default NULL
		$query="ALTER TABLE vbs_bookings ADD COLUMN IF NOT EXISTS coupon_discount_amount float(10,2) DEFAULT NULL";
		$this->db->query($query);



		//11.tax_applied ENUM('Yes','No') Default NULL
		$query="ALTER TABLE vbs_bookings ADD COLUMN IF NOT EXISTS tax_applied ENUM('Yes','No') DEFAULT NULL";
		$this->db->query($query);


		//12.tax_amount float(10,2) Default NULL
		$query="ALTER TABLE vbs_bookings ADD COLUMN IF NOT EXISTS tax_amount float(10,2) DEFAULT NULL";
		$this->db->query($query);


		/*
		==================================================================================================
		 */
		
		//vbs_coupons create table
		$query="CREATE TABLE IF NOT EXISTS `vbs_coupons` (
				  `coupon_id` int(11) PRIMARY KEY AUTO_INCREMENT,
				  `coupon_title` varchar(100) DEFAULT NULL,
				  `coupon_code` varchar(20) DEFAULT NULL,
				  `discount_amount` float(10,2) DEFAULT NULL,
				  `from_date` date DEFAULT NULL,
				  `to_date` date DEFAULT NULL,
				  `created` datetime DEFAULT NULL,
				  `updated` datetime DEFAULT NULL,
				  `status` enum('Active','Inactive') DEFAULT NULL
				) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

		$this->db->query($query);
		
		/*
		=================================================================================================
		*/


		//vbs_groups - record
		$query = "INSERT IGNORE INTO `vbs_groups`(`id`, `name`, `description`) VALUES ('','driver','Driver')";		
		$this->db->query($query);

		/*
		===================================================================================================
		*/

		//vbs_payu_settings create table
		$query="CREATE TABLE IF NOT EXISTS `vbs_payu_settings` (
				  `id` int(11) PRIMARY KEY AUTO_INCREMENT,
				  `test_merchant_key` varchar(20) NOT NULL,
				  `test_salt` varchar(20) NOT NULL,
				  `live_merchant_key` varchar(20) NOT NULL,
				  `live_salt` varchar(20) NOT NULL,
				  `mode` enum('test','live') NOT NULL DEFAULT 'test'
				) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

		$this->db->query($query);	


		//record
		$query="INSERT IGNORE INTO `vbs_payu_settings`(`id`, `test_merchant_key`, `test_salt`,`live_merchant_key`,`live_salt`,`mode`) VALUES ('','test merchant key','test salt','live merchant key','live salt','test')";
		$this->db->query($query);

		/*
		===================================================================================================
		*/
	


		//vbs_site_settings

		//1.stripe int(11) Default 0
		$query="ALTER TABLE vbs_site_settings ADD COLUMN IF NOT EXISTS stripe int(11) DEFAULT 0";
		$this->db->query($query);


		//2.payu  int(11) Default 0
		$query="ALTER TABLE vbs_site_settings ADD COLUMN IF NOT EXISTS payu int(11) DEFAULT 0";
		$this->db->query($query);


		/*//3.DELETE COLUMN date_formats 
		$query = "ALTER TABLE vbs_site_settings DROP COLUMN IF EXISTS date_formats";
		$this->db->query($query);


		//4.date_formats ENUM('mm/dd/YYYY','YYYY/mm/dd','dd.mm.YYYY','dd-mm-YYYY','YYYY-mm-dd')
		$query="ALTER TABLE vbs_site_settings ADD COLUMN IF NOT EXISTS date_formats ENUM('mm/dd/YYYY','YYYY/mm/dd','dd.mm.YYYY','dd-mm-YYYY','YYYY-mm-dd') DEFAULT NULL";
		$this->db->query($query);*/

		//4.date_formats
		$query="ALTER TABLE vbs_site_settings ALTER COLUMN date_formats ENUM('mm/dd/YYYY','YYYY/mm/dd','dd.mm.YYYY','dd-mm-YYYY','YYYY-mm-dd') DEFAULT NULL";
		$this->db->query($query);


		//5.fevicon VARCHAR(50) Default NULL
		$query="ALTER TABLE vbs_site_settings ADD COLUMN IF NOT EXISTS fevicon VARCHAR(50) DEFAULT NULL";
		$this->db->query($query);


		//6.country_code VARCHAR(10) Default NULL
		$query="ALTER TABLE vbs_site_settings ADD COLUMN IF NOT EXISTS country_code VARCHAR(10) DEFAULT NULL";
		$this->db->query($query);


		//7.apply_tax ENUM('Yes','No') Default NULL
		$query="ALTER TABLE vbs_site_settings ADD COLUMN IF NOT EXISTS apply_tax ENUM('Yes','No') DEFAULT NULL";
		$this->db->query($query);


		//8.tax_amount float(10,2) Default NULL
		$query="ALTER TABLE vbs_site_settings ADD COLUMN IF NOT EXISTS tax_amount float(10,2) DEFAULT NULL";
		$this->db->query($query);


		//9.sms_notification ENUM('Yes','No') Default NULL
		$query="ALTER TABLE vbs_site_settings ADD COLUMN IF NOT EXISTS sms_notification ENUM('Yes','No') DEFAULT NULL";
		$this->db->query($query);


		//10.facebook_app_id VARCHAR(500) Default NULL
		$query="ALTER TABLE vbs_site_settings ADD COLUMN IF NOT EXISTS facebook_app_id VARCHAR(500) DEFAULT NULL";
		$this->db->query($query);


		//11.facebook_app_secret VARCHAR(500) Default NULL
		$query="ALTER TABLE vbs_site_settings ADD COLUMN IF NOT EXISTS facebook_app_secret VARCHAR(500) DEFAULT NULL";
		$this->db->query($query);


		//12.google_client_id VARCHAR(500) Default NULL
		$query="ALTER TABLE vbs_site_settings ADD COLUMN IF NOT EXISTS google_client_id VARCHAR(500) DEFAULT NULL";
		$this->db->query($query);


		//13.google_client_secret VARCHAR(500) Default NULL
		$query="ALTER TABLE vbs_site_settings ADD COLUMN IF NOT EXISTS google_client_secret VARCHAR(500) DEFAULT NULL";
		$this->db->query($query);

		/*
		====================================================================================================
		*/
	

		//vbs_sms_gate_ways create table & records

		$query = "CREATE TABLE IF NOT EXISTS `vbs_sms_gate_ways` (
				  `sms_gateway_id` int(11) PRIMARY KEY AUTO_INCREMENT,
				  `sms_gateway_name` varchar(50) NOT NULL,
				  `is_default` enum('Yes','No') NOT NULL DEFAULT 'No',
				  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
				) ENGINE=MyISAM DEFAULT CHARSET=utf8;";
		$this->db->query($query);
		


		$query="INSERT INTO `vbs_sms_gate_ways` (`sms_gateway_id`, `sms_gateway_name`, `is_default`, `status`) VALUES
			(1, 'Cliakatell', 'No', 'Active'),
			(2, 'Nexmo', 'No', 'Active'),
			(3, 'Plivo', 'No', 'Active'),
			(4, 'Solutionsinfini', 'No', 'Active'),
			(5, 'Twilio', 'Yes', 'Active'),
			(7, 'MSG91', 'No', 'Inactive');";
		$this->db->query($query);
		
		/*
		================================================================================================
		*/
	

		//create table vbs_sms_templates and records	

		$query="CREATE TABLE IF NOT EXISTS `vbs_sms_templates` (
				  `sms_template_id` int(11) PRIMARY KEY AUTO_INCREMENT,
				  `subject` varchar(50) NOT NULL,
				  `sms_template` varchar(1000) NOT NULL,
				  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
				) ENGINE=MyISAM DEFAULT CHARSET=utf8;";

		$this->db->query($query);
		

		$query = "INSERT INTO `vbs_sms_templates` (`sms_template_id`, `subject`, `sms_template`, `status`) VALUES
		(6, 'send_coupon', '<p>Use Coupon <strong>__COUPON_CODE__</strong> , Get <strong>__DISCOUNT_AMOUNT__</strong> on booking.</p>\r\n', 'Active'),
		(3, 'booking_successful', '<p>Thanks for using <strong>__SITE__TITLE__</strong></p>\r\n\r\n<p>Booking Reference No <strong>__BOOKING_REF__NO__</strong></p>\r\n\r\n<p>Total Cost <strong>__TOTAL__COST__</strong></p>\r\n', 'Active'),
		(4, 'booking_status_changed', '<p>Dear <strong>__USER__</strong> ,</p>\r\n\r\n<p>Your Booking has been&nbsp; <strong>__BOOKING_STATUS__</strong></p>\r\n\r\n<p>Booking Reference No&nbsp;&nbsp; <strong>__BOOKING_REF_NO__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Active'),
		(5, 'booking_deleted', '<p>Dear <strong>__USER__</strong></p>\r\n\r\n<p>Your booking has been Deleted.</p>\r\n\r\n<p>Booking Reference No&nbsp; <strong>__BOOKING_REF_NO__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Active')";	

		$this->db->query($query);

		/*
		==================================================================================================
		*/
	

		//vbs_email_templates  create & records

		$query="CREATE TABLE IF NOT EXISTS `vbs_email_templates` (
			  `id` int(11) PRIMARY KEY AUTO_INCREMENT,
			  `subject` varchar(512) NOT NULL,
			  `email_template` varchar(10000) DEFAULT NULL,
			  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;";	

		$this->db->query($query);


		$query="INSERT INTO `vbs_email_templates` (`id`, `subject`, `email_template`, `status`) VALUES
				(7, 'user_registration', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<strong>__SITE_LOGO__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Welcome to __SITE_TITLE__ </strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Dear <strong>__USER__NAME__</strong>,&nbsp;</p>\r\n\r\n<p>You have successfully Registered in&nbsp;<strong>__SITE_TITLE__</strong></p>\r\n\r\n<p><strong>Your credentials</strong></p>\r\n\r\n<p>Email<strong>&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;__EMAIL__</strong></p>\r\n\r\n<p>Password<strong>&nbsp; __PASSWORD__</strong></p>\r\n\r\n<p>We are really excited that you decide to try our services,welcome and thank you for the trust!!</p>\r\n\r\n<p>Please click this link for <strong>__ACCOUNT_ACTIVATOIN_LINK__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Regards,</strong>&nbsp;<br />\r\n<br />\r\n<strong>__SITE_TITLE__</strong> | Cab Booking System</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Active'),
				(8, 'fb_google_registration_template', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>__SITE_LOGO__</strong> &nbsp; &nbsp;</p>\r\n\r\n<h2><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;Welcome&nbsp;to&nbsp;__SITE_TITLE__</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Dear __USER_NAME__&nbsp;,</strong></p>\r\n\r\n<p>You have Successfully Registered in <strong>__SITE_TITLE__</strong></p>\r\n\r\n<p>Email &nbsp; &nbsp; &nbsp;: &nbsp;<strong>__EMAIL__</strong></p>\r\n\r\n<p>Password : <strong>__PASSWORD__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;</p>\r\n\r\n<p><strong>Regards,</strong></p>\r\n\r\n<p><strong>__SITE_TITLE__</strong>&nbsp;| Cab Booking System</p>\r\n', 'Active'),
				(57, 'when_user_done_booking_template_mail_to_user', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<strong>__SITE_LOGO__</strong></p>\r\n\r\n<h2><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Welcome&nbsp;to&nbsp;__SITE_TITLE__ </strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Dear <strong>__USER_NAME__</strong>,&nbsp;</p>\r\n\r\n<p>You have successfully Booked vehicle in&nbsp;<strong>__SITE_TITLE__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>DETAILS</strong></p>\r\n\r\n<p>Booking Reference Number&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__BOOKING_REF_NO__</strong></p>\r\n\r\n<p>Pick-Point&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__PICK_POINT__</strong></p>\r\n\r\n<p>Drop-Point&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__DROP_POINT__</strong></p>\r\n\r\n<p>Pick Date &amp; Time&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__DATE_TIME__</strong></p>\r\n\r\n<p>Return Journey Required&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__RETURN_JOURNEY__</strong></p>\r\n\r\n<p>Waiting Time &amp; Cost &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__WAITING_TIME__</strong></p>\r\n\r\n<p>Journey K.m./ Miles &amp; Time&nbsp;&nbsp; <strong>__MILES_TIME__</strong></p>\r\n\r\n<p>Car Type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__CAR_TYPE__</strong></p>\r\n\r\n<p>Payment Type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__PAYMENT_TYPE__</strong></p>\r\n\r\n<p>Amount&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__AMOUNT__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Message to Driver&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__DRIVER_MSG__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We are really excited that you decide to try our services,welcome and thank you for the trust!!</p>\r\n\r\n<p>For any assistance or questions&nbsp;feel free to contact us at <strong>__CONTACT_US__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp;</p>\r\n\r\n<p><strong>Regards,</strong><br />\r\n<strong>__SITE_TITLE__</strong> | Cab Booking System</p>\r\n', 'Active'),
				(58, 'when_user_done_booking_template_mail_to_admin', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<strong>__SITE_LOGO__</strong></p>\r\n\r\n<h2><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Welcome&nbsp;to __SITE_TITLE__ </strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Hello Dear Admin,&nbsp;</p>\r\n\r\n<p><strong>__USER_NAME__&nbsp;</strong>has&nbsp;successfully Booked vehicle</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>USER DETAILS</strong></p>\r\n\r\n<p>Name &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<strong>__USER_NAME__</strong></p>\r\n\r\n<p>Email &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<strong>__EMAIL__</strong></p>\r\n\r\n<p>Phone &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<strong>__PHONE__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>BOOKING DETAILS</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Booking Reference Number&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__BOOKING_REF_NO__</strong></p>\r\n\r\n<p>Pick-Point&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__PICK_POINT__</strong></p>\r\n\r\n<p>Drop-Point&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__DROP_POINT__</strong></p>\r\n\r\n<p>Pick Date &amp; Time&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__DATE_TIME__</strong></p>\r\n\r\n<p>Return Journey Required&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__RETURN_JOURNEY__</strong></p>\r\n\r\n<p>Waiting Time &amp; Cost &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__WAITING_TIME__</strong></p>\r\n\r\n<p>Journey Miles &amp; Time&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__MILES_TIME__</strong></p>\r\n\r\n<p>Car Type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__CAR_TYPE__</strong></p>\r\n\r\n<p>Payment Type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__PAYMENT_TYPE__</strong></p>\r\n\r\n<p>Amount&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__AMOUNT__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Message to Driver&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__DRIVER_MSG__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We are really excited that you decide to try our services,welcome and thank you for the trust!!</p>\r\n\r\n<p>For any assistance or questions&nbsp;feel free to contact us at <strong>__CONTACT_US__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Regards,</strong><br />\r\n<strong>__SITE_TITLE__</strong> | Cab Booking System</p>\r\n', 'Active'),
				(61, 'forgot_password', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<strong>__SITE_LOGO__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>Welcome to __SITE_TITLE__</strong></h2>\r\n\r\n<p>A new password was requested for the user <strong>__EMAIL__</strong>,&nbsp;</p>\r\n\r\n<p>Please click on the link to set your&nbsp;password&nbsp;___RESET_YOUR_PASSWORD___</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Regards,</strong>&nbsp;<br />\r\n<br />\r\n<strong>__SITE_TITLE__</strong> | Cab Booking System</p>\r\n', 'Active'),
				(62, 'contact_query', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<strong>__SITE_LOGO__</strong></p>\r\n\r\n<p><strong>&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong></p>\r\n\r\n<h2><strong>&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Welcome to __SITE_TITLE__</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Hello Admin,</p>\r\n\r\n<p><strong>__USER__</strong>&nbsp;would like to contact you.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>USER DETAILS</strong></p>\r\n\r\n<p><strong>Name &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong><strong>__USER_NAME__</strong></p>\r\n\r\n<p><strong>Email</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>__EMAIL__</strong></p>\r\n\r\n<p><strong>Phone</strong>&nbsp; &nbsp; &nbsp; <strong>__PHONE__</strong></p>\r\n\r\n<p><strong>Booking Ref No&nbsp;&nbsp;&nbsp;&nbsp; __BOOKING_NO__</strong></p>\r\n\r\n<p><strong>Message</strong>&nbsp;&nbsp; &nbsp;&nbsp;<strong>__MESSAGE__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Regards,</strong>&nbsp;<br />\r\n<br />\r\n<strong>__SITE_TITLE__</strong> | Cab Booking System</p>\r\n', 'Active'),
				(64, 'executive_registration', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<strong>__SITE_LOGO__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Welcome to __SITE_TITLE__ </strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Dear <strong>__USER__NAME__</strong>,&nbsp;</p>\r\n\r\n<p>You have successfully Registered in&nbsp;<strong>__SITE_TITLE__</strong> as Executive.</p>\r\n\r\n<p><strong>Your credentials</strong></p>\r\n\r\n<p>Email<strong>&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;__EMAIL__</strong></p>\r\n\r\n<p>Password<strong>&nbsp; __PASSWORD__</strong></p>\r\n\r\n<p>We are really excited that you decide to try our services,welcome and thank you for the trust!!</p>\r\n\r\n<p>Please click this link for <strong>__ACCOUNT_ACTIVATOIN_LINK__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Regards,</strong>&nbsp;<br />\r\n<br />\r\n<strong>__SITE_TITLE__</strong> | Cab Booking System</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Active'),
				(65, 'when_admin_executive_confirm_cancel_delete_booking_template_mail_to_user', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<strong>__SITE_LOGO__</strong></p>\r\n\r\n<h2><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Welcome&nbsp;to&nbsp;__SITE_TITLE__ </strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Dear <strong>__USER_NAME__</strong>,&nbsp;</p>\r\n\r\n<p><strong>__SITE_TITLE__</strong> Admin has <strong>__BOOKING_STATUS__</strong> your booking.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>DETAILS</strong></p>\r\n\r\n<p>Booking Reference Number&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__BOOKING_REF_NO__</strong></p>\r\n\r\n<p>Pick-Point&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__PICK_POINT__</strong></p>\r\n\r\n<p>Drop-Point&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__DROP_POINT__</strong></p>\r\n\r\n<p>Pick Date &amp; Time&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__DATE_TIME__</strong></p>\r\n\r\n<p>Return Journey Required&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__RETURN_JOURNEY__</strong></p>\r\n\r\n<p>Waiting Time &amp; Cost &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__WAITING_TIME__</strong></p>\r\n\r\n<p>Journey K.m./ Miles &amp; Time&nbsp;&nbsp; <strong>__MILES_TIME__</strong></p>\r\n\r\n<p>Car Type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__CAR_TYPE__</strong></p>\r\n\r\n<p>Payment Type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__PAYMENT_TYPE__</strong></p>\r\n\r\n<p>Amount&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__AMOUNT__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Message to Driver&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__DRIVER_MSG__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We are really excited that you decide to try our services,welcome and thank you for the trust!!</p>\r\n\r\n<p>For any assistance or questions&nbsp;feel free to contact us at <strong>__CONTACT_US__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp;</p>\r\n\r\n<p><strong>Regards,</strong><br />\r\n<strong>__SITE_TITLE__</strong> | Cab Booking System</p>\r\n', 'Active'),
				(66, 'when_user_cancel_booking_template_mail_to_admin', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<strong>__SITE_LOGO__</strong></p>\r\n\r\n<h2><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Welcome&nbsp;to&nbsp;__SITE_TITLE__ </strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Dear Admin,&nbsp;</p>\r\n\r\n<p><strong>__USER_NAME__</strong> has <strong>Cancelled</strong> his booking.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>DETAILS</strong></p>\r\n\r\n<p>Booking Reference Number&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__BOOKING_REF_NO__</strong></p>\r\n\r\n<p>Pick-Point&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__PICK_POINT__</strong></p>\r\n\r\n<p>Drop-Point&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__DROP_POINT__</strong></p>\r\n\r\n<p>Pick Date &amp; Time&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__DATE_TIME__</strong></p>\r\n\r\n<p>Return Journey Required&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__RETURN_JOURNEY__</strong></p>\r\n\r\n<p>Waiting Time &amp; Cost &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__WAITING_TIME__</strong></p>\r\n\r\n<p>Journey K.m./ Miles &amp; Time&nbsp;&nbsp; <strong>__MILES_TIME__</strong></p>\r\n\r\n<p>Car Type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__CAR_TYPE__</strong></p>\r\n\r\n<p>Payment Type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__PAYMENT_TYPE__</strong></p>\r\n\r\n<p>Amount&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__AMOUNT__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Regards,</strong><br />\r\n<strong>__SITE_TITLE__</strong> | Cab Booking System</p>\r\n', 'Active')";


		$this->db->query($query);

		/*
		==================================================================================================
		*/
	
		//vbs_stripe_settings table & record

		$query = "CREATE TABLE IF NOT EXISTS `vbs_stripe_settings` (
		  `id` int(11) PRIMARY KEY AUTO_INCREMENT,
		  `stripe_key_test_public` varchar(50) NOT NULL,
		  `stripe_key_test_secret` varchar(50) NOT NULL,
		  `stripe_key_live_public` varchar(50) NOT NULL,
		  `stripe_key_live_secret` varchar(50) NOT NULL,
		  `stripe_test_mode` enum('TRUE','FALSE') NOT NULL DEFAULT 'TRUE',
		  `currency` varchar(20) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1";


		$this->db->query($query);


		$query="INSERT INTO `vbs_stripe_settings` (`id`, `stripe_key_test_public`, `stripe_key_test_secret`, `stripe_key_live_public`, `stripe_key_live_secret`, `stripe_test_mode`, `currency`) VALUES
				(1, 'stripe_key_test_public', 'stripe_key_test_secret', 'stripe_key_live_public', 'stripe_key_live_secret', 'TRUE', 'INR')";
		$this->db->query($query);


		/*
		=================================================================================================
		*/
	

		//create table vbs_system_settings_fields & records

		$query="CREATE TABLE IF NOT EXISTS `vbs_system_settings_fields` (
				  `field_id` int(11) PRIMARY KEY AUTO_INCREMENT,
				  `sms_gateway_id` int(11) DEFAULT NULL,
				  `field_name` varchar(256) NOT NULL,
				  `field_key` varchar(50) NOT NULL,
				  `is_required` char(5) DEFAULT 'No',
				  `field_output_value` text,
				  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
				  `updated` datetime DEFAULT NULL
				) ENGINE=InnoDB DEFAULT CHARSET=utf8";

		$this->db->query($query);


		$query = "INSERT INTO `vbs_system_settings_fields` (`field_id`, `sms_gateway_id`, `field_name`, `field_key`, `is_required`, `field_output_value`, `created`, `updated`) VALUES
				(125, 1, 'User Name', 'User_Name', 'Yes', 'Username', '2016-07-25 11:20:38', '2017-11-18 01:28:51'),
				(126, 1, 'Password', 'Password', 'Yes', 'password', '2016-07-25 12:29:11', '2017-11-18 01:28:51'),
				(127, 1, 'From No', 'From_No', 'Yes', '12121212', '2016-07-25 12:29:47', '2017-11-18 01:28:51'),
				(128, 1, 'API Id', 'API_Id', 'Yes', '121212', '2016-07-25 12:30:10', '2017-11-18 01:28:51'),
				(129, 2, 'API KEY', 'API_KEY', 'Yes', 'PAIDLFJL', '2016-07-26 05:51:28', '2017-05-19 12:46:38'),
				(130, 2, 'API SECRET', 'API_SECRET', 'Yes', '39873498sdjdkfdf', '2016-07-26 06:00:50', '2017-05-19 12:46:38'),
				(131, 3, 'AUTH ID', 'AUTH_ID', 'Yes', 'WOERIHFNKDSF098', '2016-07-26 09:26:52', '2017-03-22 07:25:38'),
				(132, 3, 'AUTH TOKEN', 'AUTH_TOKEN', 'Yes', 'OEIROFJKLSDJFOIEUROEI38947329', '2016-07-26 09:27:16', '2017-03-22 07:25:38'),
				(133, 3, 'API VERSION', 'API_VERSION', 'Yes', 'v1', '2016-07-26 09:27:49', '2017-03-22 07:25:38'),
				(134, 3, 'END POINT', 'END_POINT', 'Yes', 'https://api.plivo.com', '2016-07-26 09:28:14', '2017-03-22 07:25:38'),
				(135, 4, 'Working Key', 'working_key', 'Yes', 'OWEIRUWE987D9S8F0SUD', '2016-07-26 09:29:30', NULL),
				(136, 4, 'Sender Id', 'sender_id', 'Yes', 'SIDEMO', '2016-07-26 09:29:53', NULL),
				(137, 4, 'API URL', 'api', 'Yes', 'http://alerts.solutionsinfini.com/', '2016-07-26 09:30:15', NULL),
				(138, 5, 'Account SID', 'account_sid', 'Yes', 'ASDKFJNcdkfjdof893743', '2016-07-26 09:31:21', '2017-10-18 14:45:43'),
				(139, 5, 'Auth Token', 'auth_token', 'Yes', '390783udsfsd0f798d9fds', '2016-07-26 09:31:54', '2017-10-18 14:45:43'),
				(140, 5, 'API Version', 'api_version', 'Yes', '2010-04-01', '2016-07-26 09:32:20', '2017-10-18 14:45:43'),
				(141, 5, 'Twilio Phone Number', 'Twilio_Phone_Number', 'Yes', '+39468343243243', '2016-07-26 09:32:57', '2017-10-18 14:45:43'),
				(142, 7, 'AUTH', 'AUTH', 'Yes', '324973498374934', '2016-11-17 08:03:11', '2017-11-18 00:45:57'),
				(143, 7, 'SENDER_ID', 'SENDER_ID', 'Yes', '102234', '2016-11-17 08:03:11', '2017-11-18 00:45:57')";

			$this->db->query($query);

		/*
		===================================================================================================
		*/
		


		//Delete vbs_sessions table
		/*$query = "DROP TABLE IF EXISTS `vbs_sessions`";
		$this->db->query($query);


		//Create vbs_sessions table
		$query = "CREATE TABLE IF NOT EXISTS `vbs_sessions` (
				  `id` varchar(128) CHARACTER SET utf8 PRIMARY KEY,
				  `ip_address` varchar(45) CHARACTER SET utf8 NOT NULL,
				  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
				  `data` blob NOT NULL
				) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
		$this->db->query($query);*/
		
		
		
	}
	
 }



/* End of file updates.php */

/* Location: ./application/controllers/updates.php */