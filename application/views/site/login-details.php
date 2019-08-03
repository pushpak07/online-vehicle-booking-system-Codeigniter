</header>
<div class="container">
   <div class="section-margin">
      <div class="row">
         <div class="col-md-9">
            <div class="left-side-cont">
               <div class="col-md-12 padding-p-0">
                  <div class="bcp">
                     <div class="business-us journey-details">
                        <div class="busi-cercle active"> 
                        </div>
                        <center> <?php echo $this->lang->line('journey_details');?></center>
                     </div>
                     <div class="business-us passenger-details">
                        <div class="busi-cercle "> 
                        </div>
                        <center><?php echo $this->lang->line('passenger_details');?></center>
                     </div>
                     <div class="business-us payment-details">
                        <div class="busi-cercle"> 
                        </div>
                        <center><?php echo $this->lang->line('payment_details');?></center>
                     </div>
                  </div>
                  <div class="online">
                     <div class="col-md-4">
                        <div class="btn btn-default re-gu"> <a href="<?php echo site_url();?>auth/login"><i class="fa fa-sign-in"></i>  <?php echo $this->lang->line('login');?></a> </div>
                     </div>
                     <div class="col-md-4">
                        <div class="btn btn-default re-gu"><a href="<?php echo site_url();?>auth/create_user"> <i class="fa fa-list-ul"></i> <?php echo $this->lang->line('register');?> </a></div>
                     </div>
                     <div class="col-md-4">
                        <div class="btn btn-default re-gu">
                           <a href="<?php echo site_url();?>welcome/passengerDetails"> <i class="fa fa-check-square"></i> <?php echo $this->lang->line('guest_check_out');?></a>
                        </div>
                     </div>
                     <?php echo form_close(); ?>  
                  </div>
               </div>
            </div>
         </div>
         
         
         
         
         <div class="col-md-3">
            <div class="right-side-cont">
               <div class="right-side-hed ">
                  <?php echo $this->lang->line('booking_summary');?> 
               </div>
               <div class="bre"> <strong><?php echo $this->lang->line('booking_reference');?>:</strong> <?php if(isset($journey_details['booking_ref']))  echo $journey_details['booking_ref']; ?>  </div>
               <div class="bre">
                  <?php if(isset($journey_details['waitnReturn']) && $journey_details['waitnReturn']=="on")  { ?>
                  <aside class="le-con"><strong><?php echo $this->lang->line('journey_type');?></strong></br><?php echo $this->lang->line('two_way');?></aside>
                  <aside class="ri-con">
                  <strong><?php echo $this->lang->line('two_way_fare');?></strong> </br>
                  <?php } else {?>
                  <aside class="le-con"><strong><?php echo $this->lang->line('journey_type');?></strong></br><?php echo $this->lang->line('one_way');?></aside>
                  <aside class="ri-con"> <strong><?php echo $this->lang->line('one_way_fare');?></strong> </br>
                     <?php } ?>
                     
                <?php 
                $total_cst=0;
                
                if ($this->config->item('site_settings')->apply_tax=='Yes' && $this->config->item('site_settings')->tax_amount>0) 
                {
                    $total_cst += $this->config->item('site_settings')->tax_amount;
                }
                if (isset($journey_details['total_cost']))
                {
                    $total_cst += $journey_details['total_cost'];
                }                    
                
                
                    
                echo $this->config->item('site_settings')->currency_symbol.$total_cst;
                    
                    ?>
                     
                     
                  </aside>
               </div>
               <div class="services">
                  <h3>
                     <?php echo $this->lang->line('journey_details');?>: 
                     <aside class="side"><a href="<?php echo site_url(); ?>welcome/onlineBooking"> <i class="fa fa-edit"></i> </a></aside>
                  </h3>
                  <ul>
                     <li><strong><?php echo $this->lang->line('pick_up');?>:</strong><br><?php if(isset($journey_details['pick_up']))  echo $journey_details['pick_up']; ?> </li>
                     <li><strong><?php echo $this->lang->line('drop_of');?>:</strong><br><?php if(isset($journey_details['drop_of']))  echo $journey_details['drop_of']; ?></li>
                     <li><strong><?php echo $this->lang->line('pick_up_date');?>:</strong><br><?php if(isset($journey_details['pick_date']))  echo $journey_details['pick_date']; ?></li>
                     <li><strong><?php echo $this->lang->line('pick_up_time');?>:</strong><br><?php if(isset($journey_details['pick_time']))  echo $journey_details['pick_time']; ?></li>
                     
                     
                    <?php 
                    if (isset($journey_details['total_cost'])) 
                    { 
                
                    $label = $this->lang->line('cost_of_journey');
                    
                    if (isset($journey_details['waitnReturn']) && $journey_details['waitnReturn']=="on")  
                    {
                        $label = $this->lang->line('cost_of_journey').'<br>'.'<small>includes waiting cost</small>';
                    }
                     
                    ?>
                               
                    <li>
                        <strong><?php echo $label;?>:</strong>
                        <aside class="side"><?php echo $this->config->item('site_settings')->currency_symbol.$journey_details['total_cost'];?></aside>
                    </li>
                     
                  <?php }
                    ?>
                     
                     <?php if(isset($journey_details['waitnReturn']) && $journey_details['waitnReturn']=="on")  { ?>
                     <li>
                        <strong><?php echo $this->lang->line('waiting_time');?>:</strong><br><?php if(isset($journey_details['waitingTime']))  echo $journey_details['waitingTime']; ?>
                        <aside class="side"><?php if(isset($journey_details['waitingCost']))  echo $this->config->item('site_settings')->currency_symbol." ". 
						$journey_details['waitingCost']; ?></aside>
                     </li>
                     <?php } ?>
                     
                     
                     <?php if ($this->config->item('site_settings')->apply_tax=='Yes' && $this->config->item('site_settings')->tax_amount>0) { ?>
                
                    <li>
                        <strong><?php echo $this->lang->line('tax_amount');?>:</strong>
                        <aside class="side"><?php echo $this->config->item('site_settings')->currency_symbol.$this->config->item('site_settings')->tax_amount;?></aside>
                     </li>
                      <?php } ?>
            
                     
                     
                     <li><strong><?php echo $this->lang->line('journey_miles_and_time');?>:</strong><br><?php if(isset($journey_details['total_distance']))  echo $journey_details['total_distance']; ?> & <?php if(isset($journey_details['total_time']))  echo $journey_details['total_time']; ?></li>
                     <li>
                        <strong><?php echo $this->lang->line('car');?>:</strong><br><?php if(isset($journey_details['car_name']))  echo $journey_details['car_name']; ?>
                        <aside class="side"><?php //if(isset($journey_details['car_cost']))  echo number_format($journey_details['car_cost'], 2); ?></aside>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         
         
         
      </div>
   </div>
</div>