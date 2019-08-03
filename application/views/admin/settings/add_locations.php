<div class="col-md-10 padding white right-p">
   <div class="content">
      <div class="main-hed">
         <a href="<?php echo site_url();?>/auth"><?php echo $this->lang->line('home');?></a> 
         <?php if(isset($title)) echo " >> Locations >> ".$title;?>
      </div>
      <div class="col-md-6 padding-p-l">
         <div class="module">
            <div class="module-head">
               <h3><?php echo $title;?></h3>
            </div>
            <?php 
               $attributes = array('name' => 'add_locations_form', 'id' => 'add_airports_form');
               echo form_open("settings/locations/".$operation,$attributes) ?>
            <div class="module-body">
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('location_name');?></label>    
                  <input type="text" class="lction_name" name="location_name" placeholder="<?php echo $this->lang->line('enter_location_name');?>" value="<?php 
                     if(isset($location_rec->location_name))
                     echo $location_rec->location_name;echo set_value('location_name');
                     ?>" />    
					 <?php echo form_error('location_name');?>
               </div>
               
               <div class="form-group">                     
                  <label class="control-label"><?php echo $this->lang->line('status');?></label>											
                  <?php 					 
                     $options = array(						
                     "Active" => "Active",
                     "Inactive" => "Inactive"								
                     						
                     );	
                     
                     $select = array();
                     if(isset($location_rec->status)) {
                     $select = array(								
                     			$location_rec->status		
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
               <input type="hidden" value="<?php if(isset($location_rec->id)) echo $location_rec->id?>" name="update_rec_id">
               <input type="submit" value="<?php echo $this->lang->line('update');?>" name="submit" />
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
            }, "Please enter valid location name.");
            //form validation rules
            $("#add_locations_form").validate({
                rules: {
                    location_name: {
                        required: true,
                    },
                },
                messages: {
                    location_name: {
                        required: "<?php echo "Enter valid location name";?>"
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
 <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
<script src="<?php echo base_url();?>assets/system_design/scripts/jquery.geocomplete.js"></script>
<script>
$(".lction_name").geocomplete({	 
		country: '<?php echo $site_settings->site_country;?>'	 
	 });
</script>