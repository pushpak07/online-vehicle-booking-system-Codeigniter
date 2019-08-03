<div class="col-md-10 padding white right-p">
   <div class="content">
      <?php echo $this->session->flashdata('message'); ?>
      <div class="col-md-6 padding-p-l">
         <div class="module">
            <div class="module-head">
               <h3><?php echo $title;?></h3>
            </div>
            <?php 
               $attributes = array('name' => 'add_airport_locations_form', 'id' => 'add_airport_locations_form');
               echo form_open("settings/airportLocations/".$operation,$attributes) ?>
            <div class="module-body">
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('airport')." ".$this->lang->line('location_name');?></label>    
                  <input type="text" name="location_name" placeholder="Enter Airport Location Name" value="<?php 
                     if(isset($airport_loc_rec->location_name))
                     echo $airport_loc_rec->location_name;
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
                     if(isset($airport_loc_rec->status)) {
                     $select = array(								
                     			$airport_loc_rec->status		
                     			);					  			
                     }
                     echo form_dropdown('status',$options,$select,'class = "chzn-select"');					 
                     
                     ?>   
               </div>
               <?php 
                  if($operation == "Add" ) {?>
               <input type="submit" value="Add" name="submit" />
               <? } else { ?>
               <input type="hidden" value="<?php echo $airport_loc_rec->id?>" name="update_rec_id">
               <input type="submit" value="Update" name="submit" />
               <?php } ?>     
            </div>
            <?php echo form_close();?>                      
         </div>
      </div>
   </div>
</div>
<!--	Validations	-->
<script type="text/javascript"> 
   (function($, W, D) {
    var JQUERY4U = {};
    JQUERY4U.UTIL = {
        setupFormValidation: function() {
            //Additional Methods			
            $.validator.addMethod("lettersonly", function(a, b) {
                return this.optional(b) || /^[a-z ]+$/i.test(a)
            }, "Please enter valid airport location name.");
            //form validation rules
            $("#add_airport_locations_form").validate({
                rules: {
                    location_name: {
                        required: true,
                        lettersonly: true
                    },
                },
                messages: {
                    location_name: {
                        required: "Airport Location name required."
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