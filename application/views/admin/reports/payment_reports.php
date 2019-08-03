<?php $locale_info = localeconv(); ?>
 <div class="col-lg-9 nine-bmc bmc-remove">

   <div class="content">
      <div class="main-hed"> 
         <a href="<?php echo site_url();?>auth"><?php echo $this->lang->line('home');?></a>
         <?php if(isset($title)) { echo " >> ".$sub_title." >>  ".$title; }?>
      </div>
    
         <div class="module">
            <?php echo $this->session->flashdata('message'); ?>
            <div class="module-head">
               <h3> <?php if(isset($title)) echo $title;?></h3>
            </div>
            <div class="module-body">
              <table id="example" class="cell-border example" cellspacing="0" width="100%">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th><?php echo $this->lang->line('user_name');?></th>
                        <th><?php echo $this->lang->line('booking_reference');?></th>
                        <th><?php echo $this->lang->line('vehicle');?></th>
                        <th><?php echo $this->lang->line('distance');?></th>
                        <th><?php echo $this->lang->line('cost_of_journey');?></th>
                        <th><?php echo $this->lang->line('payment_type');?></th>
                        <th><?php echo $this->lang->line('payer_name');?></th>
                        <th><?php echo $this->lang->line('payer_email');?></th>
                        <th><?php echo $this->lang->line('transaction_id');?></th>
                        <th><?php echo $this->lang->line('booking_date');?></th>
                        <th><?php echo $this->lang->line('booking_status');?></th>
                     </tr>
                  </thead>
                  <tfoot>
                     <tr>
                        <th>#</th>
                        <th><?php echo $this->lang->line('user_name');?></th>
                        <th><?php echo $this->lang->line('booking_reference');?></th>
                        <th><?php echo $this->lang->line('vehicle');?></th>
                        <th><?php echo $this->lang->line('distance');?></th>
                        <th><?php echo $this->lang->line('cost_of_journey');?></th>
                        <th><?php echo $this->lang->line('payment_type');?></th>
                        <th><?php echo $this->lang->line('payer_name');?></th>
                        <th><?php echo $this->lang->line('payer_email');?></th>
                        <th><?php echo $this->lang->line('transaction_id');?></th>
                        <th><?php echo $this->lang->line('booking_date');?></th>
                        <th><?php echo $this->lang->line('booking_status');?></th>
                     </tr>
                  </tfoot>
                  
                  <?php if(!empty($records)) { ?>
                  <tbody>
                     <?php 
                        $i = 1;
                        
                        foreach($records as $r) {
                        
                        ?>
                     <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $r->registered_name;?></td>
                        <td><?php echo $r->booking_ref;?></td>
                        <td><?php echo $r->vehicle_name."<br/><small>".$r->model."</small>";?></td>
                        <td><?php echo $r->distance;?></td>
                        <td><?php echo $this->config->item('site_settings')->currency_symbol." ".$r->cost_of_journey;?></td>
                        <td><?php echo $r->payment_type;?></td>
                        <?php if($r->payment_type == "cash") { ?>
                        <td><?php echo $r->registered_name;?></td>
                        <td><?php echo $r->email;?></td>
                        <td><?php echo "N/A";?></td>
                        <?php } else { ?>
                        <td><?php echo $r->payer_name;?></td>
                        <td><?php echo $r->payer_email;?></td>
                        <td><?php echo $r->transaction_id;?></td>
                        <?php } ?>
                        <td><?php echo date('d M Y',strtotime($r->bookdate));?></td>
                        <td><?php echo ucwords($r->is_conformed);?></td>
                     </tr>
                     <?php }  ?>
                  </tbody>
                  <?php } ?>
               </table>
            </div>
         </div>
      </div>
      <!--/.module--> 
   </div>
   <!--/.content--> 
