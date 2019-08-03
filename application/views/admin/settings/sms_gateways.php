 <div class="main-container nine-bmc bmc-remove">

   <div class="content">
      <div class="main-hed"> 

         <a href="<?php echo site_url();?>auth"><?php echo $this->lang->line('home');?></a>
         <?php if(isset($title)) echo " >> Master Settings >> ".$title;?>
      </div>

      <?php echo $this->session->flashdata('message'); ?>

     
         <div class="module">
            <div class="module-head">
               <h3><?php if(isset($title)) echo $title;?></h3>
              
            </div>
            <div class="module-body">
               <table id="example" class="cell-border example" cellspacing="0" width="100%">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th><?php echo $this->lang->line('sms_gateway_name');?></th>
                        <th><?php echo $this->lang->line('is_default');?></th>
                        <th><?php echo $this->lang->line('action');?></th>
                     </tr>
                  </thead>
                  <tfoot>
                     <tr>
                        <th>#</th>
                        <th><?php echo $this->lang->line('sms_gateway_name');?></th>
                        <th><?php echo $this->lang->line('is_default');?></th>
                        <th><?php echo $this->lang->line('action');?></th>
                     </tr>
                  </tfoot>
                  
                  <?php if(isset($records) && !empty($records)) {?>
                  <tbody>
                     <?php 
                        $i=1;
                        foreach($records as $r):?>
                     <tr>
                        <td><?php echo $i; $i++;?></td>
                        <td><?php echo $r->sms_gateway_name;?></td>
                        <td><?php echo $r->is_default;?></td>
                        
                        <td>
                           
						<?php 
						 echo form_open(site_url().'settings/update_sms_field_values');
						
						 echo form_hidden('sms_gateway_id',$r->sms_gateway_id);
						 
						 echo '<button type="submit" name="edit_sms_gateway" class="btn btn-warning"><i class="fa fa-edit"></i></button>';
						 
						 echo form_close();
						?>
					 
                         <?php 
                          
						   
						   echo form_open(site_url().'settings/makedefault');
				
						   echo form_hidden('sms_gateway_id',$r->sms_gateway_id);
						   
						   echo '<button type="submit" name="sms_gateway" class="btn btn-primary" title="Make Default Gateway"><i class="fa fa-hand-o-right"></i></button>';
						   echo form_close();
                           ?> 
					
                        </td>
                     </tr>
                     <?php endforeach; ?>
                  </tbody>
                  <?php } ?>
                  
               </table>
            </div>
         </div>
      </div>
      <!--/.module--> 
   </div>
   <!--/.content--> 

