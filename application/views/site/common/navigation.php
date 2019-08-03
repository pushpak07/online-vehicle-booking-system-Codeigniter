<div class="container-fluid main-menu">
   <div class="container padding-p-0">


      
      <div class="row">
         <div class="col-md-2 padding-p-l">

            <a href="<?php echo site_url();?>auth/index/home">
               <div class="logo">
                  <img src="<?php echo get_site_logo();?>" alt="Site Logo" class="bmc-logo"> 
               </div>
            </a>


         </div>
         <div class="col-md-10 padding-p-r">
            <nav role="navigation" class="navbar navbar-default menu-total">
               <div class="navbar-header">
                  <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed nav-bar-btn" type="button"> <span class="sr-only"><?php echo $this->lang->line('toggle_navigation');?></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
               </div>
               <div class="collapse navbar-collapse res-menu" id="navbar">
                  <ul class="nav navbar-nav menu">


                     <!-- <li <?php if(isset($active_class)){ if($active_class=="home") echo 'class="active"'; }?> ><a href="<?php echo site_url(); ?>auth/index/home"> <i class="fa fa-home"></i> </a></li> -->

                     

                     <li <?php if(isset($active_class)){ if($active_class=="packages") echo 'class="active"'; }?> ><a href="<?php echo site_url();?>packages"><?php echo $this->lang->line('packages');?></a></li>

                    
                     <!--Features-->
                     <?php                         
                       $features = $this->dvbs_model->get_navigation_features();
                        
                     if(!empty($features)) {

                     foreach($features as $row):
                     ?>
                     <li class="drop-menu menu-drop<?php if(isset($active_class) && $active_class==$row->name) echo " active";?>">

                        <a href="#" aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle"><?php echo $row->name;?><span class="caret"></span> </a>
                        <ul role="menu" class="dropdown-menu drop-menu">


                        <?php 
                             
							     $sub_categories = $this->dvbs_model->get_sub_features($row->id);
							  
                           if (!empty($sub_categories)) {
                           foreach($sub_categories as $sub_row):
                           ?>
                           <li><a href="<?php echo site_url();?>page/index/<?php echo $sub_row->id;?>/<?php echo $row->name;?>"><?php echo $sub_row->name;?></a></li>
                           <?php endforeach; } ?>

                        </ul>
                     </li>

                     <?php  endforeach; } ?>
                     <!--Features-->




                     <li <?php if(isset($active_class) && $active_class=="faqs") echo 'class="active"';?> > <a href="<?php echo site_url();?>welcome/faqs"><?php echo $this->lang->line('FAQs');?></a></li>



                     <li <?php if(isset($active_class) && $active_class=="contactus") echo 'class="active"';?> > <a href="<?php echo site_url();?>welcome/contactUs"><?php echo $this->lang->line('contact');?></a></li>


                     <li class="bmc-last" <?php if(isset($active_class) && $active_class=="onlinebooking") echo 'class="active"';?> > <a class="btn btn-primary nav-btn" href="<?php echo site_url();?>welcome/onlineBooking"><?php echo $this->lang->line('booking');?>Booking</a></li>



                     <?php if($this->ion_auth->logged_in()) {?>

                     <li <?php if(isset($active_class) && $active_class=="my_account") echo 'class="active"';?> class="dropdown menu-drop">
                        <a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo $this->lang->line('my_account');?><span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu drop-menu">
                           <li><a href="<?php echo site_url();?>users/profile"><?php echo $this->lang->line('my_profile');?></a></li>
                           <li><a href="<?php echo site_url();?>users/change_password"><?php echo $this->lang->line('change_password');?></a></li>
                           <li><a href="<?php echo site_url();?>users/my_bookings"><?php echo $this->lang->line('my_bookings');?></a></li>
                           <li><a href="<?php echo site_url();?>auth/logout"><?php echo $this->lang->line('logout');?></a></li>
                        </ul>
                     </li>
                     <?php } ?>


                  </ul>
               </div>
               <!--/.nav-collapse --> 
            </nav>
         </div>
      </div>
   </div>
</div>

<?php if (isset($bread_crumb) && $bread_crumb==true) {?>
<div class="container padding-p-0 banner">
   <div class="row">
      <div class="col-md-8 padding-p-l">
         <aside class="hedding"> <?php if(isset($heading)) echo $heading; ?></aside>
      </div>
      <div class="col-md-4 padding-p-r">
         <aside class="bradecom">
            <ul>
               <li> <a href="<?php echo site_url();?>"> <?php echo $this->lang->line('home');?>  </a> </li>
               <li><a href="javascript:void(0)">>></a></li>
               <li class="active"><a href="javascript:void(0)">&nbsp;<?php if(isset($sub_heading)) echo $sub_heading; ?> </a></li>
            </ul>
         </aside>
      </div>
   </div>
</div>
<?php } ?>