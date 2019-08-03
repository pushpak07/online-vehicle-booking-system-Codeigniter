
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
                        <th><?php echo $this->lang->line('vehicle_total');?></th>
                        <th><?php echo $this->lang->line('category');?></th>
                        
                        
                        <th><?php echo $this->lang->line('fuel');?></th>
                        
                        <th><?php echo $this->lang->line('cost_type');?></th>
                        
                        
                        <th><?php echo $this->lang->line('total_bookings');?></th>
                         
                        <th><?php echo $this->lang->line('confirmed');?></th>
                        <th><?php echo $this->lang->line('cancelled');?></th>
                        
                        <th><?php echo $this->lang->line('pending');?></th>
                     </tr>
                  </thead>
                  <tfoot>
                     <tr>
                        <th>#</th>
                       <th><?php echo $this->lang->line('vehicle_total');?></th>
                        <th><?php echo $this->lang->line('category');?></th>
                        
                        
                        <th><?php echo $this->lang->line('fuel');?></th>
                        
                        <th><?php echo $this->lang->line('cost_type');?></th>
                        
                        <th><?php echo $this->lang->line('total_bookings');?></th>
                         
                        <th><?php echo $this->lang->line('confirmed');?></th>
                        <th><?php echo $this->lang->line('cancelled');?></th>
                        
                        <th><?php echo $this->lang->line('pending');?></th>
                        
                       
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
