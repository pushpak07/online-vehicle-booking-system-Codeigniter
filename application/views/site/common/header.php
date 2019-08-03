<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      
      <meta name="keywords" content="<?php if(isset($this->config->item('seo_settings')->site_keywords)) echo $this->config->item('seo_settings')->site_keywords; ?>"/>

      <meta name="description" content="<?php if(isset($this->config->item('seo_settings')->meta_description)) echo $this->config->item('seo_settings')->meta_description; ?>" />
       
      <link rel="shortcut icon" href="<?php echo get_fevicon();?>"/>
      
      
      <title><?php echo isset($title) ? $title : '';?> :: <?php if(isset($site_settings->site_title) && $site_settings->site_title != "") echo $site_settings->site_title;else echo "Cab Booking System";?></title>

	  <?php if(isset($this->config->item('seo_settings')->google_analytics)) echo "<script>".$this->config->item('seo_settings')->google_analytics."</script>"; ?>

      <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700" rel="stylesheet">
      
      <!-- Bootstrap -->
      <link href="<?php echo CSS_STYLE;?>" rel="stylesheet">
       
      <?php if($this->config->item('site_settings')->site_theme == "Red") {  ?>
      <link href="<?php echo CSS_CAB2;?>" rel="stylesheet">
      <?php } else { ?>
      <link href="<?php echo CSS_CAB;?>" rel="stylesheet">
      <?php } ?>
      
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      
       <!-- PNOTIFY CSS-->
    <link href="<?php echo PNOTIFY_MIN_CSS;?>" rel="stylesheet">
    <link href="<?php echo PNOTIFY_BRIGHTTHEME_CSS;?>" rel="stylesheet">
    <link href="<?php echo PNOTIFY_BUTTONS_CSS;?>" rel="stylesheet">
      
      
       <!-- Data Tables CSS /Start -->
	<?php if(!empty($css_type) && in_array('datatable', $css_type)) { ?>
    
	<link href='<?php echo URL_ADMIN_DATATABLES;?>css/jquery.dataTables.min.css' rel='stylesheet' media='screen'>
    
	<link href='<?php echo URL_ADMIN_DATATABLES;?>css/responsive.dataTables.min.css' rel='stylesheet' media='screen'>
    
	<?php } ?>
	<!-- /End -->
    
      <script src="<?php echo JS_JQUERY_MIN;?>"></script>
	   
   </head>
   <body>
   
   
   
   
   
   
   
   
<!-- Booking Status Modal-->
<div class="modal fade" id="bkng_status_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
            <span class="sr-only"><?php echo $this->lang->line('close');?></span></button>            
            <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('cancel');?></h4>
         </div>
         <div class="modal-body">  
            <?php echo $this->lang->line('sure_cancel');?>  
            
             <input type="hidden" name="bkng_record_id" id="bkng_record_id" value="">
             
            <input type="hidden" name="bkng_status_url" id="bkng_status_url" value="">
            
         </div>
         
         <div class="modal-footer">            
            <button type="submit" class="btn btn-success bmc-btn-success" onclick="bkng_status_final()" id="delete_no"><?php echo $this->lang->line('yes');?></button>  <button type="button" class="btn btn-danger bmc-btn-danger" data-dismiss="modal"><?php echo $this->lang->line('no');?></button>         
         </div>
      </div>
      
   </div>
</div>
<!-- Booking Status Modal-->



      <header class="bg">
      <div class="container-fluid top-hedd hidden-xs">
         <div class="container padding-p-0">
            <div class="row">
               <div class="col-md-12 padding-p-0">
                  <div class="top-section">
                     <div class="col-md-7">
                        <div class="col-md-4 padding-p-r">

                           <?php if ($this->config->item('site_settings')->land_line !='') {?>  
                           <div class="tot-top">
                              <div class="phone"> <i class="fa fa-phone"></i> </div>
                              <aside><?php echo $this->config->item('site_settings')->land_line;?></aside>
                           </div>
                           <?php } ?>

                        </div>
                        <?php if(!$this->ion_auth->logged_in()) { ?>
                        <div class="col-md-4 padding-p-r">
                           <div class="tot-top">
                              <div class="phone"> <i class="fa fa-user"></i> </div>
                              <aside class="col"> <a href="<?php echo site_url();?>auth/create_user" title="Register"><?php echo $this->lang->line('create_account');?> </a> </aside>
                           </div>
                        </div>
                        <div class="col-md-4 padding-p-r">
                           <div class="tot-top">
                              <div class="phone"> <i class="fa fa-lock"></i> </div>
                              <aside class="col"> <a href="<?php echo site_url();?>auth/login" title="Login"><?php echo $this->lang->line('login'); ?> </a> </aside>
                           </div>
                        </div>
                        <?php } else { ?>
                        <a href="<?php echo site_url();?>auth" >
                           <div class="col-md-4 padding-p-r">
                              <div class="tot-top">
                                 <div class="phone"> <i class="fa fa-user"></i> </div>
                                 <aside> <?php echo $this->session->userdata('username'); ?> </aside>
                              </div>
                           </div>
                        </a>
                        <?php } ?>
                     </div>
                     <div class="col-md-5 padding-p-r">
                        <div class="social-icons">
                           <ul>
                           
                              <?php 
                                 
                              if ($this->config->item('social_networks')->facebook!='') {?>
                              <li> <a href="<?php echo $this->config->item('social_networks')->facebook;?>" target="_blank"> <i class="fa fa-facebook"></i> </a> </li>
                              <?php }
                              
                               if ($this->config->item('social_networks')->twitter!='') {?>
                              <li> <a href="<?php echo $this->config->item('social_networks')->twitter;?>"  target="_blank"> <i class="fa fa-twitter"></i> </a> 
                              </li>
                              <?php }
                              
                              if ($this->config->item('social_networks')->linkedin) { ?>
                              <li> <a href="<?php echo $this->config->item('social_networks')->linkedin;?>" target="_blank"> <i class="fa fa-linkedin"></i> </a> 
                              </li>
                              <?php }
                              
                              if ($this->config->item('social_networks')->google_plus) { ?>
                              <li> <a href="<?php echo $this->config->item('social_networks')->google_plus;?>" target="_blank"> <i class="fa fa-google-plus"></i> </a> 
                              </li>
                              <?php } ?>

                           </ul>
                        </div>

                        
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>