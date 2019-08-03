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
      <link href="<?php echo base_url();?>assets/system_design/css/styles.css" rel="stylesheet">
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body>
      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?php echo $this->lang->line('close');?></span></button>
                  <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('modal_title');?></h4>
               </div>
               <div class="modal-body">
                 
                  
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('close');?></button>
               </div>
            </div>
         </div>
      </div>
      <header class="bg">
         <div class="container-fluid top-hedd">
            <div class="container padding-p-0">
               <div class="row">
                  <div class="col-md-12 padding-p-0">
                     <div class="top-section">
                        <div class="col-md-8 col-xs-12 padding-p-l">
                           <div class="col-md-4 padding-p-r">
                              <div class="phone"> <i class="fa fa-phone"></i> </div>
                              <aside> +040 - 00 222 000 </aside>
                           </div>
                           <div class="col-md-4 padding-p-r">
                              <div class="phone"> <i class="fa fa-user"></i> </div>
                              <aside> <?php echo $this->lang->line('create_account');?></aside>
                           </div>
                           <div class="col-md-4 padding-p-r">
                              <div class="phone"> <i class="fa fa-lock"></i> </div>
                              <aside> <?php echo $this->lang->line('login');?> </aside>
                           </div>
                        </div>
                        <div class="col-md-4 col-xs-12 padding-p-r">
                           <div class="social-icons">
                               <ul>
                              <?php 
                                 $social_networks = $this->base_model->run_query("SELECT * FROM vbs_social_networks");
                                 
                                 		
                                 //social_networks
                                 
                                 	 if($social_networks[0]->facebook){?>
                              <li> <a href="<?php echo $social_networks[0]->facebook; ?>"   target="_blank">
                                 <i class="fa fa-facebook"></i> </a> 
                              </li>
                              <?php }
                                 if($social_networks[0]->twitter){?>
                              <li> <a href="<?php echo $social_networks[0]->twitter; ?>"   target="_blank">
                                 <i class="fa fa-twitter"></i> </a> 
                              </li>
                              <?php }
                                 if($social_networks[0]->linkedin){?>
                              <li> <a href="<?php  echo $social_networks[0]->linkedin; ?>"  target="_blank"> 
                                 <i class="fa fa-linkedin"></i> </a> 
                              </li>
                              <?php }
                                 if($social_networks[0]->google_plus){?>
                              <li> <a href="<?php echo $social_networks[0]->google_plus; ?>" target="_blank"> 
                                 <i class="fa fa-google-plus"></i> </a> 
                              </li>
                              <?php }?>
							  <li> <a href="<?php echo $this->config->item('site_settings')->android_filename;?>"> <i class="fa fa-android"></i> </a> </li>
							    <li> <a href="<?php echo $this->config->item('site_settings')->ios_filename;?>"> <i class="fa fa-apple"></i> </a> </li>
                           </ul>
                           </div>
                           <div class="selec"  id="uli">
                              <a href="#"><?php echo $this->lang->line('lang');?></a>
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
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <?php $this->load->view('site/common/navigation');?>
         <div class="container padding-p-0 banner">
            <div class="row">
               <div class="col-md-8 padding-p-l">
                  <aside class="hedding"> <?php echo $this->lang->line('online_booking');?></aside>
               </div>
               <div class="col-md-4 padding-p-r">
                  <aside class="bradecom">
                     <ul>
                        <li> <a href="#">  <?php echo $this->lang->line('home');?> </a> </li>
                        <li>>></li>
                        <li class="active"> <a href="#"><?php echo $this->lang->line('online_booking')?></a> </li>
                     </ul>
                  </aside>
               </div>
            </div>
         </div>
      </header>