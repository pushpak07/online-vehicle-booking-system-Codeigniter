<!DOCTYPE html>
<html>
   <head>

      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      
      <meta name="keywords" content="<?php if(isset($this->config->item('seo_settings')->site_keywords)) echo $this->config->item('seo_settings')->site_keywords; ?>"/>

      <meta name="description" content="<?php if(isset($this->config->item('seo_settings')->meta_description)) echo $this->config->item('seo_settings')->meta_description; ?>" />

      <link rel="shortcut icon" href="<?php echo get_fevicon();?>"/>
      

      <title><?php echo isset($title) ? $title : '';?> :: <?php if(isset($site_settings->site_title) && $site_settings->site_title != "") echo $site_settings->site_title;else echo "Cab Booking System";?></title>

     <?php if(isset($this->config->item('seo_settings')->google_analytics)) echo "<script>".$this->config->item('seo_settings')->google_analytics."</script>"; ?>

      
      
      <!-- Bootstrap -->
      <link href="<?php echo CSS_STYLE;?>" rel="stylesheet">
       
      <?php if($this->config->item('site_settings')->site_theme == "Red") {  ?>
      <link href="<?php echo CSS_CAB2;?>" rel="stylesheet">
      <?php } else { ?>
      <link href="<?php echo CSS_CAB;?>" rel="stylesheet">
      <?php } ?>



      <script src="<?php echo JS_JQUERY_MIN;?>"></script>

      
   </head>

   <style>
      html, body{
       /*background: url(<?php echo IMGS_SYSTEM_DSN;?>login-bg.jpg);*/
      background: #fafcff;
      background-size:cover;
      width: 100%;
      height: 100%; background-repeat:no-repeat; background-attachment:local;
      }
      .see {
      color: #e74c3c;
      }
      #total-login {
      background:#fff;
      border-radius: 10px;
      clear: both;
      display: flex;
      margin:4em auto 0;
      position: relative;
      width: 440px;  
      }
      .login-head {
      color: #fff;
      float: left;
      font-size: 20px;
      height:40px;
      line-height: 40px;
      text-align: center;
      width: 100%;
      z-index: 99999; border-radius:10px 10px 0px 0px; 
      }
      .logo-home {
      font-size: 39px;
      line-height: 70px;
      }
      .select-type {
      width: 59px;
      height: 58px;
      margin: 14px auto 0;
      }
      select {
      background: #f4f4f4;
      box-shadow: 2px 2px 5px #c6c6c6;
      -moz-box-shadow: 2px 2px 5px #c6c6c6;
      -ms-box-shadow: 2px 2px 5px #c6c6c6;
      -o-box-shadow: 2px 2px 5px #c6c6c6;
      -webkit-box-shadow: 2px 2px 5px #c6c6c6;
      border: none;
      margin-top: 10px;
      }
      #fp{ float:left;     display: none ; width:100%;   }
      .forget{
      margin: 11px -43px;
      width: 100% !important;
      } 
      .forget:focus{ box-shadow:0px 0px 5px #FFF}
      .us{ border-radius:0px 5px 5px 0px !important;}
      .in-ty {
      width: 100%;
      margin-top: 15px;
      }
      .login-btn {
      float: left;
      background: #41484b;
      padding:4px 16px;
      color: #fff;
      margin: 15px 0px;
      }
      .login-btn a{ color:#fff !important;}
      .login-btn:hover{ background:#ffa801;
      cursor:pointer;
      }
      .a-rig {
      float: right
      }
      .or {
      background: none repeat scroll 0 0 silver;
      float: left;
      margin: 19px 63px;
      text-align: center;
      width: 30%;
      }
      .forget-pass {
      margin-top: 20px;text-align: right;
      float: left;
      padding: 10px;
      width: 100%;
      text-align: center;
      color: #000; font-weight: bold; cursor:pointer;
      }
      .forget-pass  a{ color:#000 !important
      }
      .shadow {
      width: 350px;
      height: 25px;
      float: left;
      background: url(<?php echo IMGS_SYSTEM_DSN;?>shadow.png) center no-repeat;
      margin:0 47px;
      }
      .flip_in{
      opacity:0; 
      -moz-transform:scale(1.5,1.5);
      -webkit-transform:scale(1.5,1.5);
      transform:scale(1.5,1.5);
      transition:.2s;
      }
      .flip_out{ opacity:1;
      -moz-transform:scale(1.5,1.5);
      -webkit-transform:scale(1.5,1.5);
      transform:scale(1.5,1.5);
      transition:.2s
      }
      .btt{  background: none repeat scroll 0 0 transparent;
      color: #fff;
      margin: 21px; }
      .btt a{ color:#fff}
      .first-row {
      float: left;
      height: auto; width:100%;
      }
      .in-ty {
      margin-top: 15px;
      width: 100%;
      }
      @media only screen and (max-width:414px) {
      #total-login {
      margin-top: 50px;
      width: 320px;
      }
      }
      label.error {
      color: red;
      float: left;
      font-weight: 600;
      padding: 0 15px;
      }@media only screen and (max-width:320px){
      #total-login {
      width: 280px;
      } 
      }
	  .tl{ margin-top:10px !important; }
	  .tl ul{ margin:0; padding:0; }
	  .tl ul li{ float: left;
    list-style: outside none none;
    margin: 10px 20px;
    text-align: left; }
   </style>
   <!-- BODY -->
   <body>


      <div class="container-fluid padding-p-0 rlt">


         <header class="bg">
            <div class="container-fluid top-hedd">
               <div class="container padding-p-0">
                  <div class="row">
                     <div class="col-md-12 padding-p-0">
                        <div class="top-section">
                           <div class="col-md-8">
                              <div class="col-md-4 padding-p-r">

                                 <?php if ($this->config->item('site_settings')->land_line !='') {?>
                                 <div class="tot-top">
                                    <div class="phone"> <i class="fa fa-phone"></i> </div>
                                    <aside><?php echo $this->config->item('site_settings')->land_line;?></aside>
                                 </div>
                              <?php } ?>

                              </div>

                              <a href="<?php echo site_url();?>auth/create_user" >
                                 <div class="col-md-4 padding-p-r">
                                    <div class="tot-top">
                                       <div class="phone"> <i class="fa fa-user"></i> </div>
                                       <aside> <?php echo $this->lang->line('create_account');?> </aside>
                                    </div>
                                 </div>
                              </a>

                              <a href="<?php echo site_url();?>auth/login" >
                                 <div class="col-md-4 padding-p-r">
                                    <div class="tot-top">
                                       <div class="phone"> <i class="fa fa-lock"></i> </div>
                                       <aside> <?php echo $this->lang->line('login');?> </aside>
                                    </div>
                                 </div>
                              </a>

                           </div>


                           <div class="col-md-4 padding-p-r">


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
            <?php $this->load->view('site/common/navigation'); ?>
         </header>