<!DOCTYPE html>
<html lang="en">
   <head>
       <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
	  
      <link rel="shortcut icon" href="<?php echo get_fevicon();?>"/>
      
      
      <title><?php echo isset($title) ? $title : '';?> :: <?php if(isset($site_settings->site_title) && $site_settings->site_title != "") echo $site_settings->site_title;else echo "Cab Booking System";?></title>
      
      
      <!-- Bootstrap -->
      <link href="<?php echo CSS_BOOTSTRAP_MIN;?>" rel="stylesheet">
	  
      <link type="text/css" href="<?php echo CSS_BOOTSTRAP_RESPONSIVE_MIN;?>" rel="stylesheet">
	  
	  
      <?php if(isset($site_settings->site_theme) && $site_settings->site_theme == "Red") {  ?>
	  
      <link type="text/css" href="<?php echo CSS_THEME_2ND;?>" rel="stylesheet">
      <link href="<?php echo CSS_SIDE_MENU_2ND_THEME;?>" rel="stylesheet">
	  
      <?php } else {?>
	  
      <link type="text/css" href="<?php echo CSS_THEME;?>" rel="stylesheet">
      <link href="<?php echo CSS_SIDE_MENU;?>" rel="stylesheet">
	  
      <?php } ?>
	  
	  
      <link type="text/css" href="<?php echo CSS_FONT_AWESOME_MIN;?>" rel="stylesheet">
      <link href="<?php echo CSS_JQUERY_DATATABLES;?>" rel="stylesheet">
      <link href="<?php echo CSS_RESPONSIVE_CALENDAR;?>" rel="stylesheet">
      <link href="<?php echo CSS_BEATPICKER_MIN;?>" rel="stylesheet">
      <link href="<?php echo CSS_TIMEPICKI;?>" rel="stylesheet">
      <link href="<?php echo CSS_VALIDATION_ERROR;?>" rel="stylesheet">
	  
	  
      
      
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->	
      
      <script src="<?php echo JS_JQUERY;?>"></script>
      <script src="<?php echo JS_JQUERY_VALIDATE_MIN;?>" type="text/javascript"></script>
      <script src="<?php echo JS_ADDITIONAL_METHODS_MIN;?>" type="text/javascript"></script>
      <script src="<?php echo JS_CKEDITOR;?>" type="text/javascript"></script>
      
      
      <script>
         var editor;
         
         // The instanceReady event is fired, when an instance of CKEditor has finished
         // its initialization.
         CKEDITOR.on( 'instanceReady', function( ev ) {
         	editor = ev.editor;
         
         	// Show this "on" button.
         	document.getElementById( 'readOnlyOn' ).style.display = '';
         
         	// Event fired when the readOnly property changes.
         	editor.on( 'readOnly', function() {
         		document.getElementById( 'readOnlyOn' ).style.display = this.readOnly ? 'none' : '';
         		document.getElementById( 'readOnlyOff' ).style.display = this.readOnly ? '' : 'none';
         	});
         });
         
         function toggleReadOnly( isReadOnly ) {
         	// Change the read-only state of the editor.
         	// http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-setReadOnly
         	editor.setReadOnly( isReadOnly );
         }
         
      </script>
   </head>
   <body>
      <!-- navbar -->
      <nav role="navigation" class="navbar navbar-inverse navbar-fixed-top top">
         <!-- Brand and toggle get grouped for better mobile display -->
         <div class="navbar-header">
            <button data-target=".navbar-ex1-collapse" data-toggle="collapse" class="navbar-toggle" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            
            <a href="<?php echo base_url();?>driver">
               <div class="logo">
                  <img src="<?php echo get_site_logo();?>" width="100" height="50" alt="Site Logo"> 
               </div>
            </a>
            
           
            
         </div>
         <div class="selec" id="uli">
            <a href="#" style="text-decoration:none;"><?php echo $this->lang->line('lang');?> <b class="caret"></b></a>
            <div id="ld">
               <ul>
                  <li> <?php echo anchor($this->lang->switch_uri('en'),'English');?> </li>
                  <li><?php echo anchor($this->lang->switch_uri('fr'),'French');?> </li>
                  <li><?php echo anchor($this->lang->switch_uri('pt'),'Português');?> </li>
                  <li><?php echo anchor($this->lang->switch_uri('de'),'Deutsch');?> </li>
                  <li><?php echo anchor($this->lang->switch_uri('ru'),'Russian');?> </li>
                  <li><?php echo anchor($this->lang->switch_uri('tr'),'Turkish');?> </li>
               </ul>
            </div>
         </div>
         
         
         <!-- Top Menu Items -->
         <ul class="nav navbar-right top-nav">
         
         
            <li class="dropdown">
               <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false"><i class="fa fa-bell"></i> <b class="caret"></b></a>
               <div class="alert-num">
                  <?php 	
                     $this->db->where('is_new',0);
                     $unread_bookings = $this->db->count_all_results('vbs_bookings');
                     echo $unread_bookings;?> 
               </div>

               <ul class="dropdown-menu message-dropdown">
                  <?php 
                    
                     $todaybookings1 = $this->dvbs_model->get_exe_home_today_bookings();
                     
                    
                  if (!empty($todaybookings1)) {
                  foreach($todaybookings1 as $row):?>
                  <li class="message-preview">
                     <a href="<?php echo site_url();?>admin/bookingDetails/<?php echo $row->id;?>">
                        <div class="media">
                           <div class="media-body">
                              <h5 class="media-heading"><strong><?php echo $row->registered_name;?></strong> </h5>
                              <p class="small text-muted"><i class="fa fa-clock-o"></i><?php echo $this->lang->line('pick_up');?>:<?php echo $row->pick_date;?></p>
                              <p><strong><?php echo $this->lang->line('pick_point');?>:</strong> <?php echo $row->pick_point;?></p>
                              <p><strong><?php echo $this->lang->line('drop_point');?>:</strong> <?php echo $row->drop_point;?></p>
                           </div>
                        </div>
                     </a>
                  </li>
                  <?php endforeach; }?>
                  
                  <li> <a href="<?php echo site_url();?>settings/bookings/unReadBookings"><?php echo $this->lang->line('view_unread_bookings');?></a> </li>
                  <li class="message-footer"> <a href="<?php echo site_url();?>settings/todayBookings"><?php echo $this->lang->line('view_today_bookings');?></a> </li>
               </ul>
            </li>
            
            
            
            
            <li class="dropdown">
               <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false"><i class="fa fa-user"></i>  <?php echo $this->session->userdata('username');?><b class="caret"></b></a>
               <ul class="dropdown-menu">
                  <li> <a href="<?php echo site_url();?>driver/profile" class="media-heading"><i class="fa fa-fw fa-user"></i> <?php echo $this->lang->line('profile');?></a> </li>
                  <li> <a href="<?php echo site_url();?>auth/change_password/driver"><i class="fa fa-fw fa-gear"></i> <?php echo $this->lang->line('change_password');?></a> </li>
                  <li class="divider"></li>
                  <li> <a href="<?php echo site_url();?>auth/logout"><i class="fa fa-fw fa-power-off"></i><?php echo $this->lang->line('log_out');?> </a> </li>
               </ul>
            </li>
            
            
         </ul>
         <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens --> 
         <!-- /.navbar-collapse --> 
      </nav>
      <!-- /navbar -->