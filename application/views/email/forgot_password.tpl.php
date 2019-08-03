<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <title><?php if(isset($this->config->item('site_settings')->site_title) && $this->config->item('site_settings')->site_title != "") 
		  echo $this->config->item('site_settings')->site_title;
		else echo "Vehicle Booking System";?></title>
      <style>
         body , html { margin:0;  font-size:14px; padding:0; height:100%; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; font-size:13px; }
         .mailer{ 
         border: 1px solid #9f2525;
         float: left;
         height: auto;
         max-width: 800px;  background:url(<?php echo base_url();?>/assets/system_design/email_format_images/bg.png) #000; color:#fff;
         }
         .hedder{ width:100%; float:left; }
         .content { float:left; width:80%; line-height:25px; padding:0px 0px 0px 135px; }
         .new-tb{  
         margin: 0 auto;
         max-width: 700px;}
         .new-tb td, th {
         border: 0px solid #c2c2c2 !important;
         text-align: left;   padding:0px 7px}
         .new-tb table, tr {
         border: 0px solid #c2c2c2 !important;
         }
         .thed{
         background-color:#fff; color: #000;
         }
         .thed1{
         border-bottom:1px solid #a60000; border-top:1px solid #a60000;
         }
         .bm{
         border-bottom:1px solid #dc0101 !important
         }
         .bm1{
         border:1px solid #dc0101 !important
         }
         .tb-ri{
         text-align: right !important;
         }
         .idtd{max-width:250px; background-color:#a60000; padding:6px; margin:6px; border-radius:5px; color:#fff;  }
         .inv{ color:#a60000; border-bottom:1px solid #a60000;}
         .idtd2 {
         background-color: #a60000;
         color: #fff;
         padding: 6px;
         }
         .idtd1{max-width:250px;  padding:0px 6px; margin:6px; 	border-bottom:1px solid #a60000; border-top:1px solid #a60000; }
         .padd-tb{ padding:1px !important }
         .ve1{   float: left;
         margin: 0 5px;
         width: 76px; }
         .ve12{  float: left;
         margin: 0 5px;
         width: 94.5%;}
         .ve13{float: left;
         margin: 0 5px;
         width: 46.2%;}
         .pmf{float: left;
         margin: 0 5px;
         width:30%;} 
      </style>
   </head>
   <body>
      <?php //echo "<pre>"; print_r($journey_details); die();?>
      <div class="mailer">
         <div class="hedder"> <img src="<?php echo base_url();?>/assets/system_design/email_format_images/mailer.png" width="100%"  /></div>
         <div class="content">
            <div class="new-tb">
               <!-- Middle Content-->
               <div class="container-fluid content-bg">
                  <div class="spacer"></div>
                  <div class="container emailer-wi">
                     <h3><?php if(isset($this->config->item('site_settings')->site_title) && $this->config->item('site_settings')->site_title != "") 
		  echo "Welcome To ". $this->config->item('site_settings')->site_title;
		else echo "Welcome To Vehicle Booking System";?></h3>
                     <h5><?php echo sprintf(lang('email_forgot_password_heading'), $identity);?></h5>
                     <p></p>
                     <p><?php echo sprintf(lang('email_forgot_password_subheading'), anchor('auth/reset_password/'. $forgotten_password_code, lang('email_forgot_password_link')));?></p>
                  </div>
                  <div class="spacer"></div>
               </div>
               <!-- Middle Content-->
               <!-- Footer-->
               <div class="panel-footer padding">
                  <div class="container-fluid copy">
                     <div class="container padding">
                        <div class="col-md-5">
						<div class="col-md-5">
			   <?php if(isset($this->config->item('site_settings')->rights_reserved_content) && $this->config->item('site_settings')->rights_reserved_content != "") 
		  echo $this->config->item('site_settings')->rights_reserved_content;
		else echo $this->lang->line('bottom_message');?>
						</div>
                     </div>
                  </div>
               </div>
               <!-- Footer--> 
            </div>
         </div>
      </div>
      <script src="<?php echo base_url();?>assets/designs/js/bootstrap.min.js"></script>
   </body>
</html>