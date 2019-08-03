 <!--navigation-->
         <div class="left-side-bar bmc-remove">

         <div class="wrapper">
   <div class="sidebarr">
      <div id="cssmenu">

         <ul>
            <!--Dashboard-->
            <li <?php if(isset($active_class)){ if($active_class=="dashboard") echo 'class="active"'; }?>><a href="<?php echo site_url();?>executive"><span><?php echo $this->lang->line('dashboard');?></span></a></li>
            
            
            <!--Add Booking-->
            <li <?php if(isset($active_ex_class)){ if($active_ex_class=="add_booking") echo 'class="active"'; }?>><a href="<?php echo site_url();?>bookings/add_booking"><?php echo $this->lang->line('add_booking');?></a></li>
            
             <!--Today Bookings-->
            <li <?php if(isset($active_ex_class)){ if($active_ex_class=="today_bookings") echo 'class="active"'; }?>><a href="<?php echo site_url();?>bookings/today_bookings"><span><?php echo $this->lang->line('today_bookings');?></span></a>
            </li>
            
             <!--Search Bookings-->
            <li <?php if(isset($active_ex_class)){ if($active_ex_class=="search_bookings") echo 'class="active"'; }?>><a href="<?php echo site_url();?>bookings/search_bookings"><span><?php echo $this->lang->line('search_bookings');?></span></a>
            </li>
            
             <!--All Bookings-->
            <li <?php if(isset($active_ex_class)){ if($active_ex_class=="all_bookings") echo 'class="active"'; }?>><a href="<?php echo site_url();?>bookings"><span><?php echo $this->lang->line('all_bookings');?></span></a>
            </li>
            
            
         </ul>
      </div>
   </div>
</div>

  </div>
         <!--navigation-->