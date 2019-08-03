<div class="container padding-p-0 banner">
   <div class="row">
      <div class="col-md-8 padding-p-l">
         <aside class="hedding"><?php if(isset($title)) echo $title;?></aside>
      </div>
      <div class="col-md-4 padding-p-r">
         <aside class="bradecom">
            <ul>
               <li> <a href="<?php echo SITEURL;?>"> <?php echo $this->lang->line('home');?> </a> </li>
               <li>>></li>
               <li class="active"> <?php if(isset($title)) echo $title;?> </li>
            </ul>
         </aside>
      </div>
   </div>
</div>
</header>
<div class="scroll-up">
   <div class="container">
      <div class="section-margin">
         <div class="row">
            <div class="col-md-12">
               <div class="left-side-cont">
                  <div class="col-md-12 padding-p-0">
                     <div class="data-table">
                     
                     
                <div class="module-body">
            
          
          <?php if (isset($record) && !empty($record)) {?>

           
               <div class="col-md-12 padding">
                  <div class="panel panel-default">
                  
                     <div class="panel-heading"><?php echo $this->lang->line('booking_details');?></div>
                     
                     <div class="panel-body padding-p-l padding-p-r">
                        <table class="table table-striped">
                        
                        
                           <tr>
                              <td><strong><?php echo $this->lang->line('booking_reference_no');?> : </strong></td>
                              <td> <?php if (isset($record->booking_ref)) echo $record->booking_ref;?> </td>
                              
                              <td><strong><?php echo $this->lang->line('pick_point');?>:</strong></td>
                              <td> <?php if(isset($record->pick_point)) echo $record->pick_point;?> </td>
                              
                              <td></td>
                           </tr>
                           
                           <tr>
                              <td><strong><?php echo $this->lang->line('pick_date_vehicles');?> : </strong></td>
                              
                              <td> <?php if(isset($record->pick_date)) echo get_date($record->pick_date);?> </td>
                              <td> <strong><?php echo $this->lang->line('drop_point');?> :</strong> </td>
                              <td>  <?php if(isset($record->drop_point)) echo $record->drop_point;?></td>
                              <td> </td>
                           </tr>
                           
                           
                           <tr>
                              <td> <strong> <?php echo $this->lang->line('pick_time_vehicles');?>: </strong></td>
                              <td><?php if(isset($record->pick_time)) echo $record->pick_time;?></td>
                              <td> <strong> <?php echo $this->lang->line('distance');?>: </strong></td>
                              <td><?php if(isset($record->distance)) echo $record->distance." ".$record->distance_type;?> </td>
                           </tr>
                           
                           
                           
                           
                            
                           <tr>
                              <td><strong><?php echo $this->lang->line('return_journey');?> : </strong></td>
                              
                              <td> <?php if(isset($record->return_journey)) echo $record->return_journey;?> </td>
                              
                              <td></td>
                              <td></td>
                           </tr>
                           
                           
                           <tr>
                           
                               <td> <strong><?php echo $this->lang->line('waiting_time');?> :</strong> </td>
                              <td>  <?php if(isset($record->waiting_time)) echo $record->waiting_time;?></td>
                              
                              <td> <strong> <?php echo $this->lang->line('waiting_cost');?>: </strong></td>
                              <td><?php if(isset($record->waiting_cost)) echo $this->config->item('site_settings')->currency_symbol.$record->waiting_cost;?></td>
                              
                           </tr>
                           
                           
                           <tr>
                              <td> <strong> <?php echo $this->lang->line('tax_applied');?>: </strong></td>
                              <td><?php if(isset($record->tax_applied)) echo $record->tax_applied;?></td>


                              <?php if ($record->tax_applied=='Yes') {?>
                              <td> <strong> <?php echo $this->lang->line('tax_amount');?>: </strong></td>
                              <td><?php if(isset($record->tax_amount)) echo $this->config->item('site_settings')->currency_symbol.$record->tax_amount;?></td>

                              <?php } else {?>
                              <td></td>
                              <td></td>
                              <?php } ?>


                           </tr>


                           
                           
                           <tr>
                              <td> <strong> <?php echo $this->lang->line('coupon_applied');?>: </strong></td>
                              <td><?php if(isset($record->coupon_applied)) echo $record->coupon_applied;?></td>

                               <td></td>
                              <td></td>
                              
                           </tr>
                           
                           
                           
                           <?php if ($record->coupon_applied=='Yes') {?>
                            <tr>

                              <td> <strong> <?php echo $this->lang->line('coupon_code');?>: </strong></td>
                              <td><?php if(isset($record->coupon_code)) echo $record->coupon_code;?></td>

                              <td> <strong> <?php echo $this->lang->line('coupon_discount_amount');?>: </strong></td>
                              <td><?php if(isset($record->coupon_amount)) echo $this->config->item('site_settings')->currency_symbol.$record->coupon_amount;?></td>
                              <td></td>
                              <td></td>
                           </tr>
                           <?php } ?>


                            <tr>
                              <td><strong> <?php echo $this->lang->line('vehicle_name');?>: </strong></td>
                              <td> <?php if (isset($record->name)) echo $record->name;?> </td>
                              
                              <td> <strong> <?php echo $this->lang->line('book_date');?> :</strong> </td>
                              <td>  <?php if (isset($record->bookdate)) echo get_date($record->bookdate);?> </td>
                           </tr>
                           
                           <tr>

                              <td> <strong> <?php echo $this->lang->line('booking_cost');?>   : </strong> </td>
                              <td> <?php if (isset($record->only_booking_cost)) echo $this->config->item('site_settings')->currency_symbol.$record->only_booking_cost; ?> </td>

                              <td> <strong> <?php echo $this->lang->line('cost_of_journey');?>   : </strong></td>
                              <td><?php if (isset($record->cost_of_journey)) echo $this->config->item('site_settings')->currency_symbol.$record->cost_of_journey; ?></td>
                             
                           </tr>
                           
                           <tr>
                              <td><strong><?php echo $this->lang->line('payment_type');?>:</strong></td>
                              <td> <?php if (isset($row->payment_type))    echo $row->payment_type;?> </td>
                              <td></td>
                              <td> </td>
                           </tr>
                           
                           
                           
                        </table>
                     </div>
                  </div>
               </div>
               
               
          
                  
               
               <?php } ?> 
               

                    </div>                    
                        
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>