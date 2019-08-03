<?php $locale_info = localeconv(); ?>
<div class="col-md-10 padding white right-p">
   <div class="content">
      <div class="col-md-12 padding-p-l">
         <?php echo $this->session->flashdata('message');?>              
         <div class="module">
            <div class="main-hed">
               <a href="<?php echo site_url();?>auth"><?php echo $this->lang->line('home');?></a> >> <a href="<?php echo site_url();?>settings/bookings"><?php echo $this->lang->line('bookings');?></a>
               <?php if(isset($title)) echo $title;?>
            </div>
            <div class="module-head">
               <h3> <?php if(isset($title)) echo $title;?></h3>
            </div>
            <div class="module-body">
               <div class="col-md-6 padding-p-l">
                  <div class="panel panel-default">
                     <div class="panel-heading"><?php echo $this->lang->line('personal_details');?></div>
                     <div class="panel-body padding-p-l padding-p-r">
                        <table class="table table-striped">
                        
                           <?php 
                           if (!empty($bookings)) {
                               
                           foreach($bookings as $row):?>
                           <tr>
                              <td> <strong><?php echo $this->lang->line('name');?> : </strong> </td>
                              <td><?php if(isset($row->registered_name)) echo $row->registered_name;?></td>
                              <td> </td>
                              <td></td>
                           </tr>
                           <tr>
                              <td> <strong><?php echo $this->lang->line('phone');?> : </strong></td>
                              <td><?php if(isset($row->phone)) echo $row->phone;?></td>
                              <td></td>
                              <td></td>
                           </tr>
                           <tr>
                              <td> <strong><?php echo $this->lang->line('email');?>: </strong> </td>
                              <td><?php if(isset($row->email)) echo $row->email;?></td>
                              <td></td>
                              <td></td>
                           </tr>
                        </table>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 padding">
                  <div class="panel panel-default">
                     <div class="panel-heading"> <?php echo $this->lang->line('vehicle_cost_details');?> </div>
                     <div class="panel-body padding-p-l padding-p-r">
                        <table class="table table-striped">
                           <tr>
                              <td><strong> <?php echo $this->lang->line('vehicle_name');?>: </strong></td>
                              <td> <?php if(isset($row->name)) echo $row->name;?> </td>
                              <td> <strong> <?php echo $this->lang->line('book_date');?> :</strong> </td>
                              <td>  <?php if(isset($row->bookdate)) echo $row->bookdate;?> </td>
                           </tr>
                           <tr>
                              <td> <strong> <?php echo $this->lang->line('cost_of_journey');?>   : </strong></td>
                              <td><?php if(isset($row->cost_of_journey)) 
							  
							  echo $this->config->item('site_settings')->currency_symbol." ".
							  $row->cost_of_journey; ?></td>
                              <td>  </td>
                              <td> </td>
                           </tr>
                           <tr>
                              <td><strong><?php echo $this->lang->line('payment_type');?>:</strong></td>
                              <td> <?php if(isset($row->payment_type))    echo $row->payment_type;?> </td>
                              <td></td>
                              <td> </td>
                           </tr>
                        </table>
                     </div>
                  </div>
               </div>
               <div class="col-md-12 padding">
                  <div class="panel panel-default">
                     <div class="panel-heading"><?php echo $this->lang->line('location_address');?></div>
                     <div class="panel-body padding-p-l padding-p-r">
                        <table class="table table-striped">
                           <tr>
                              <td><strong><?php echo $this->lang->line('booking_reference_no');?> : </strong></td>
                              <td> <?php if(isset($row->booking_ref)) echo $row->booking_ref;?> </td>
                              <td><strong><?php echo $this->lang->line('pick_point');?>:</strong></td>
                              <td> <?php if(isset($row->pick_point)) echo $row->pick_point;?> </td>
                              <td></td>
                           </tr>
                           <tr>
                              <td><strong><?php echo $this->lang->line('pick_date_vehicles');?> : </strong></td>
                              <td> <?php if(isset($row->pick_date)) echo $row->pick_date;?> </td>
                              <td> <strong><?php echo $this->lang->line('drop_point');?> :</strong> </td>
                              <td>  <?php if(isset($row->drop_point)) echo $row->drop_point;?></td>
                              <td> </td>
                           </tr>
                           <tr>
                              <td> <strong> <?php echo $this->lang->line('pick_time_vehicles');?>: </strong></td>
                              <td><?php if(isset($row->pick_time)) echo $row->pick_time;?></td>
                              <td> <strong> <?php echo $this->lang->line('distance');?>: </strong></td>
                              <td><?php if(isset($row->distance)) echo $row->distance." ".$row->distance_type;?> </td>
                           </tr>
                        </table>
                     </div>
                  </div>
               </div>
			  
               <div class="form-group"> 
                 <?php if($row->is_conformed == 'confirm' || $row->is_conformed == 'cancelled') {?>
					 <p style="background:lightgreen;padding:10px;width:15%;text-align:center"><strong><?php echo $this->lang->line('status');?>:</strong> <?php if($row->is_conformed=="confirm") echo "Confirmed";elseif($row->is_conformed == "cancelled") echo "Cancelled"; ?></p>
               <?php } else {?>
                  <a href="<?php echo site_url();?>settings/bookings/confirm/<?php echo $row->id;?>" style="text-decoration:none;"><input type="button" value="Confirm"></a>
                  <a href="<?php echo site_url();?>settings/bookings/cancel/<?php echo $row->id;?>" style="text-decoration:none;"><input type="button" value="Cancel"></a>
                  <?php } ?>
				  <a href="<?php echo site_url();?>settings/bookings" id="close" class="buttonn" ><i class="fa fa-arrow-left"></i> <?php echo "Back";?></a>
               </div>
               
               <?php endforeach;
               
               }?> 
               
            </div>
         </div>
         <?php echo form_close();?>  
      </div>
   </div>
</div>
