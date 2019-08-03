
<div class="col-md-10 padding white right-p">
          <div class="content">
  <?php echo $this->session->flashdata('message'); ?>
              <div class="col-md-6 padding-p-l">
            <div class="module">
                 
				 <div class="module-head">
                <h3><?php echo $title;?></h3>
              </div>
                  
				  
				     
				  <?php echo form_open("settings/services/".$operation) ?>
				  <div class="module-body">
                
				
				
				
				   <div class="form-group">                    
				  <label><?php echo $this->lang->line('service');?></label>    
                  <input type="text" name="service" placeholder="Add Service" 
				  value="<?php 
				  if(isset($service_rec->service))
					echo $service_rec->service;
				  ?>" />    
				  </div>
				
				
				<div class="form-group">                     
				  <label class="control-label"><?php echo $this->lang->line('status');?></label>											
				  
				  <?php 					 
				  $options = array(						
				  "Active" => "Active",
				  "Inactive" => "Inactive"								
				  						
				  );	
				
				$select = array();
				if(isset($service_rec->status)) {
					$select = array(								
									$service_rec->status		
									);					  			
					}
				  echo form_dropdown('status',$options,$select,'class = "chzn-select"');					 
				  
				  ?>   

					 
				  
				  </div>
                                 
                         <?php 
                  if($operation == "Add" ) {?>
               <input type="submit" value="<?php echo $this->lang->line('add');?>" name="submit" />
               <?php   } 
                  else { 
                  ?>
               <input type="hidden" value="<?php if(isset($service_rec->id)) echo $service_rec->id?>" name="update_rec_id">
               <input type="submit" value="<?php echo $this->lang->line('update');?>" name="submit" />
               <?php } ?>         
                                                
                                           
                                        
                                 
                   </div>
                                          
                        <?php echo form_close();?>                      
                
              </div>
                </div>
          </div>
              
      </div>