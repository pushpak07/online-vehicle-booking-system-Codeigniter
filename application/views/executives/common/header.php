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
      <link href="<?php echo CSS_RESPONSIVE_CALENDAR;?>" rel="stylesheet">
      
      <link href="<?php echo CSS_BEATPICKER_MIN;?>" rel="stylesheet">
      
      <link href="<?php echo CSS_TIMEPICKI;?>" rel="stylesheet">
      
      <link href="<?php echo CSS_VALIDATION_ERROR;?>" rel="stylesheet">
	  
	  <link href="<?php echo CSS_ADMIN_STYLE;?>" rel="stylesheet">
      
      
      
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
      
      
      
      
      <script src="<?php echo JS_JQUERY;?>"></script>
     
     
 <!-- CK Editor Scripts /Start -->
<?php if(!empty($css_type) && in_array('ckeditor', $css_type)) { ?>
<script type='text/javascript' src='<?php echo SYSTEM_DSN;?>ckeditor/ckeditor.js'></script>
<script>
CKEDITOR.on('instanceReady', function () {
    $.each(CKEDITOR.instances, function (instance) {
        CKEDITOR.instances[instance].document.on("keyup", CK_jQ);
        CKEDITOR.instances[instance].document.on("paste", CK_jQ);
        CKEDITOR.instances[instance].document.on("keypress", CK_jQ);
        CKEDITOR.instances[instance].document.on("blur", CK_jQ);
        CKEDITOR.instances[instance].document.on("change", CK_jQ);
    });
});

function CK_jQ() {
    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }
}
</script>
<?php } ?>
<!-- CK Editor Scripts /End -->


   </head>
   <body>

  <div class="container-fluid">
  <div class="row">
     <div class="col-lg-12">
       <div class="row">
      <div class="col-lg-12 bmc-remove">

   
   <!-- New Delete Modal-->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
            <span class="sr-only"><?php echo $this->lang->line('close');?></span></button>            
            <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('delete');?></h4>
         </div>
         <div class="modal-body">  
            <?php echo $this->lang->line('sure_delete');?>  
            
             <input type="hidden" name="deleting_record_id" id="deleting_record_id" value="">
             
            <input type="hidden" name="deleting_record_id_url" id="deleting_record_id_url" value="">
            
         </div>
         
         <div class="modal-footer">            
            <button type="submit" class="btn btn-success" onclick="delete_record_final()" id="delete_no"><?php echo $this->lang->line('yes');?></button>  <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $this->lang->line('no');?></button>         
         </div>
      </div>
      
   </div>
</div>
<!-- New Delete Modal-->






     <!-- navbar -->
      <nav role="navigation" class="navbar navbar-inverse navbar-fixed-top top">
         <!-- Brand and toggle get grouped for better mobile display -->
         <div class="navbar-header">

           <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            
             <a href="<?php echo base_url();?>executive">
               <div class="logo">
                  <img src="<?php echo get_site_logo();?>" width="100" height="50" alt="Site Logo"> 
               </div>
            </a>
            
            
         </div>


         <div id="navbar" class="navbar-collapse collapse">

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
         
         <?php 	
           $unread_bookings = $this->dvbs_model->admin_header_unread_bookings();
            ?> 
            <li class="dropdown">
               <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false"><i class="fa fa-bell"></i> <b class="caret"></b></a>
               <div class="alert-num">
                <?php echo count($unread_bookings);?>
               </div>

               <?php if (!empty($unread_bookings)) {?>
               
               <ul class="dropdown-menu message-dropdown">
                  <?php 
                     $i=0; 
                  foreach ($unread_bookings as $row):
                  $i++;
                  if ($i==6)
                      break;
                  ?>
                  <li class="message-preview">
                     <a href="<?php echo site_url();?>bookings/view_details/<?php echo $row->id;?>">
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
                  <?php endforeach;  ?>
                  
                  <li class="message-footer"> <a href="<?php echo site_url();?>bookings"><?php echo $this->lang->line('view_bookings');?></a> </li>
               </ul>
               
               <?php } ?>
            </li>
            
            
            
            
            <li class="dropdown">
               <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false"><i class="fa fa-user"></i>  <?php echo $this->session->userdata('username');?><b class="caret"></b></a>
               <ul class="dropdown-menu">
                  <li> <a href="<?php echo site_url();?>executive/profile" class="media-heading"><i class="fa fa-fw fa-user"></i> <?php echo $this->lang->line('profile');?></a> </li>
                  <li> <a href="<?php echo site_url();?>auth/change_password/executive"><i class="fa fa-fw fa-gear"></i> <?php echo $this->lang->line('change_password');?></a> </li>
                  <li class="divider"></li>
                  <li> <a href="<?php echo site_url();?>auth/logout"><i class="fa fa-fw fa-power-off"></i><?php echo $this->lang->line('log_out');?> </a> </li>
               </ul>
            </li>
         </ul>
       
       </div><!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->  <!-- /.navbar-collapse --> 
      
      </nav>
      <!-- /navbar -->

       <div class="row-fluid bmc-remove">