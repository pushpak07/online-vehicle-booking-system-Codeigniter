
<div class="col-md-10 padding white right-p">
          <div class="content">
  <?php echo $this->session->flashdata('message'); ?>
              <div class="col-md-6 padding-p-l">
            <div class="module">
                 
				 <div class="module-head">
                <h3><?php echo $title;?></h3>
              </div>
                  
				   <?php 
				   $attributes = array('name' => 'add_airport_cars_form', 'id' => 'add_airport_cars_form');
				  echo form_open("settings/airportCars/".$operation,$attributes) ?>
				  
				     
				 
				  <div class="module-body">
                
				
				<div class="form-group">                     
				  <label class="control-label"><?php echo $this->lang->line('airport_cars');?></label>											
				  
				  <?php 					 
				 
				
				$select = array();
				if(isset($airport_car->airport_id)) {
					$select = array(								
									$airport_car->airport_id		
									);					  			
					}
				  echo form_dropdown('airport',$airport_options,$select,'class = "chzn-select"');					 
				  
				  ?>   
				  </div>
				  
				  	
				<div class="form-group">                     
				  <label class="control-label"><?php echo $this->lang->line('location');?></label>											
				  
				  <?php 					 
				
				
				$select = array();
				if(isset($airport_car->location_id)) {
					$select = array(								
									$airport_car->location_id		
									);					  			
					}
				  echo form_dropdown('location',$location_options,$select,'class = "chzn-select"');					 
				  
				  ?>   
				  </div>
				  
				  
				  <div class="form-group">                     
				  <label class="control-label"><?php echo $this->lang->line('vehicle');?></label>											
				  
				  <?php 					 
				 	
				
				$select = array();
				if(isset($airport_car->vehicle_id)) {
					$select = array(								
									$airport_car->vehicle_id		
									);					  			
					}
				  echo form_dropdown('vehicle',$vehicle_options,$select,'class = "chzn-select"');					 
				  
				  ?>   
				  </div>
				
				
				
				
				   <div class="form-group">                    
				  <label><?php echo $this->lang->line('cost');?></label>    
                  <input type="text" name="cost" placeholder="Enter Cost" value="<?php 
				  if(isset($airport_car->cost))
					echo $airport_car->cost;
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
				if(isset($airport_car->status)) {
					$select = array(								
									$airport_car->status		
									);					  			
					}
				  echo form_dropdown('status',$options,$select,'class = "chzn-select"');					 
				  
				  ?>   
				  </div>
                                 
                             <?php 
							 if($operation == "Add" ) {?>
							  <input type="submit" value="Add" name="submit" />
							 <? } else { ?>
								<input type="hidden" value="<?php echo $airport_car->id?>" name="update_rec_id">
								<input type="submit" value="Update" name="submit" />
							 <?php } ?>     
                                                
                                           
                                        
                                 
                   </div>
                                          
                        <?php echo form_close();?>                      
                
              </div>
                </div>
          </div>
              
      </div>
	  
	  
	  
	  
	  
	  
	  <!-- validations-->
	  <script type="text/javascript"> 
   (function($,W,D)
   {
      var JQUERY4U = {};
   
      JQUERY4U.UTIL =
      {
          setupFormValidation: function()
          {
              //Additional Methods			
   		
		
		
		$.validator.addMethod("proper_value", function(uid, element) {
return (this.optional(element) || uid.match(/^((([0-9]*)[\.]([0-9]{2}))|([0-9]*))$/));
},"Please enter proper value.");
		
		
   		//form validation rules
              $("#add_airport_cars_form").validate({
                  rules: {
                cost: {
                          required: true,
						  proper_value: true
                      },
				
					  
                  },
   			
   			messages: {
   				cost: {
                          required: "Cost required."
                      },
				
   			},
                  
                  submitHandler: function(form) {
                      form.submit();
                  }
              });
          }
      }
   
      //when the dom has loaded setup form validation rules
      $(D).ready(function($) {
          JQUERY4U.UTIL.setupFormValidation();
      });
   
   })(jQuery, window, document);
</script>
	  