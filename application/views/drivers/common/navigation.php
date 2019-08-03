<div class="wrapper">
<div class="container-fluid padding">
<div class="col-md-2 padding si-wi">
   <div class="sidebar">
      <div id='cssmenu'>
         <ul>
            <!--Dashboard-->
            <li <?php if(isset($active_class)){ if($active_class=="dashboard") echo 'class="active"'; }?>><a href="<?php echo site_url();?>executive"><span><?php echo $this->lang->line('dashboard');?></span></a></li>
            
            
            
            <!--Search Bookings-->
            <li <?php if(isset($active_class)){ if($active_class=="search_bookings") echo 'class="active"'; }?>><a href="<?php echo site_url();?>settings/searchBookings"><span><?php echo $this->lang->line('search_bookings');?></span></a>
            </li>
            
            <!--All Bookings-->
            <li <?php if(isset($active_class)){ if($active_class=="bookings") echo 'class="active"'; }?>><a href="<?php echo site_url();?>settings/bookings"><span><?php echo $this->lang->line('bookings');?></span></a>
            </li>
            
            
         </ul>
      </div>
   </div>
</div>