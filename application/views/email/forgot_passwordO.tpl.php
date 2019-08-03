<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title><?php if(isset($site_settings->site_title) && $site_settings->site_title != "") 
		  echo $site_settings->site_title;
		else echo "Vehicle Booking System";?></title>
      <!-- Bootstrap -->
      <link href="<?php echo base_url();?>assets/designs/css/bootstrap.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/designs/css/style.css" rel="stylesheet" type="text/css">
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <style>
         .emailr{ width:50%; margin:0 auto; }
         .emailer-logo{ text-align:   }
      </style>
   </head>
   <body class="emailr">
      <!---Hedder--->
      <div class="container-fluid fluid-hedder padding">
         <div class="col-md-12 col-xs-12 logo emailer-logo"><img src="<?php echo base_url();?>assets/system_design/email_format_images/mailer.png" align="center" width="65%"></div>
         <div class="total-hed"> 
         </div>
      </div>
      <!---Hedder--->
      <!-- Slider-->
      <!-- Slider-->
      <!-- Middle Content-->
      <div class="container-fluid content-bg">
         <div class="spacer"></div>
         <div class="container emailer-wi">
          <h3><?php if(isset($site_settings->site_title) && $site_settings->site_title != "") 
		  echo "Welcome To ". $site_settings->site_title;
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
			     <?php if(isset($site_settings->rights_reserved_content) && $site_settings->rights_reserved_content != "") 
		  echo $site_settings->rights_reserved_content;
		else echo $this->lang->line('bottom_message');?>
			   </div>
            </div>
         </div>
      </div>
      <!-- Footer-->     
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="<?php echo base_url();?>assets/designs/js/bootstrap.min.js"></script>
   </body>
</html>