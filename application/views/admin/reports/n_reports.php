
 <div class="main-container nine-bmc bmc-remove">

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
            
             <div class="table-responsive">
            
               <table id="example" class="display responsive nowrap" width="100%" cellspacing="0">
              
                  <thead>
                     <tr>
                        <th>#</th>
                        <th><?php echo $this->lang->line('user_name');?></th>
                        <th><?php echo $this->lang->line('booking_reference');?></th>
                        
                        
                        <th><?php echo $this->lang->line('cost_of_journey');?></th>
                        
                        <th><?php echo $this->lang->line('payment_type');?></th>
                        
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
                        
                        
                        <th><?php echo $this->lang->line('cost_of_journey');?></th>
                        
                        <th><?php echo $this->lang->line('payment_type');?></th>
                        
                        <th><?php echo $this->lang->line('transaction_id');?></th>
                        <th><?php echo $this->lang->line('booking_date');?></th>
                        <th><?php echo $this->lang->line('booking_status');?></th>
                     </tr>
                  </tfoot>
                  
                  
                  <tbody>
                    
                  </tbody>
                 
               </table>
               
                </div> 
            </div>
            
            
         </div>
      </div>
      <!--/.module--> 
   </div>
   <!--/.content--> 
