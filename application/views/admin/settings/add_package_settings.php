<?php $locale_info = localeconv(); ?>

<div class="main-container nine-bmc bmc-remove">

   <div class="content">
      <div class="main-hed"> 
      
         <a href="<?php echo site_url();?>auth"><?php echo $this->lang->line('home');?></a> >> <?php echo $this->lang->line('master_settings');?> >> <a href="<?php echo site_url();?>settings/packages"><?php echo $this->lang->line('package_settings');?></a> >> <?php if(isset($title)) echo $title;?>
      </div>

      <?php echo $this->session->flashdata('message'); ?>

      <div class="col-md-12">
         <div class="module">
            <div class="module-head">
               <h3><?php if(isset($title)) echo $title;?></h3>  
            </div>
            
            
            <?php 
               $attributes = array('name' => 'package_settings_form', 'id' => 'package_settings_form');
               echo form_open_multipart(site_url()."settings/addedit_package/",$attributes);?>
               
            <div class="module-body">
            
            
			
			<div class="col-md-6">         
            
            <div class="form-group"> 
            
               <label><?php echo $this->lang->line('select_vehicle');?><?php echo required_symbol();?></label>
              
                  <?php 					 
                    
                     $select = array();
                     if(isset($record->vehicle_id)) {
                     $select = array(								
                     			$record->vehicle_id		
                     			);					  			
                     }
                     echo form_dropdown('vehicle_id',$vehicle_options,$select,'class = "chzn-select form-control"').form_error('vehicle_id');					 
                     
                     ?>  
               </div>
               
               

               <div class="form-group">                    
                  <label><?php echo $this->lang->line('package_name');?><?php echo required_symbol();?></label>    
                  
                <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->name;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('name');
                    }
                    
                    $element = array('name'=>'name',
                    'value'=>$val,
                    'placeholder'=>$this->lang->line('package_name'),
                    'class'=>'form-control');
                    echo form_input($element).form_error('name');
                ?>
                    
               </div>

               
               
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('hours');?><?php echo required_symbol();?></label>
                <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->hours;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('hours');
                    }
                    
                    $element = array('name'=>'hours',
                    'value'=>$val,
                    'placeholder'=>$this->lang->line('in_hours'),
                    'class'=>'form-control');
                    echo form_input($element).form_error('hours');
                ?>      
               </div>
               
               
              
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('distance');?><?php echo required_symbol();?></label>    
                 
                  <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->distance;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('distance');
                    }
                    
                    $element = array('name'=>'distance',
                    'value'=>$val,
                    'placeholder'=>$this->lang->line('distance_in_km'),
                    'class'=>'form-control');
                    echo form_input($element).form_error('distance');
                ?>  
                
               </div>
              
              
              
              
               <div class="form-group"> 
               
                  <label><?php echo $this->lang->line('min_cost')." (".$this->config->item('site_settings')->currency_symbol.")";?><?php echo required_symbol();?></label>   
                  
                 <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->min_cost;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('min_cost');
                    }
                    
                    $element = array('name'=>'min_cost',
                    'value'=>$val,
                    'placeholder'=>$this->lang->line('min_cost'),
                    'class'=>'form-control');
                    echo form_input($element).form_error('min_cost');
                ?>      
               </div>
               
			   
			     <div class="form-group"> 
                 
                  <label><?php echo $this->lang->line('charge_distance')." (".$this->config->item('site_settings')->currency_symbol.")";?><?php echo required_symbol();?></label>    
                  
                       
                <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->charge_distance;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('charge_distance');
                    }
                    
                    $element = array('name'=>'charge_distance',
                    'value'=>$val,
                    'placeholder'=>$this->lang->line('charge_per_km'),
                    'class'=>'form-control');
                    echo form_input($element).form_error('charge_distance');
                ?>         

                       
               </div>

               <div class="form-group">                    
                  <label><?php echo $this->lang->line('charge_hour')." (".$this->config->item('site_settings')->currency_symbol.")";?><?php echo required_symbol();?></label>    
                 
                       <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->charge_hour;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('charge_hour');
                    }
                    
                    $element = array('name'=>'charge_hour',
                    'value'=>$val,
                    'placeholder'=>$this->lang->line('charge_per_hour'),
                    'class'=>'form-control');
                    echo form_input($element).form_error('charge_hour');
                ?>   
               </div>

			   </div>
               

			<div class="col-md-6"> 

            
                 
               
               <div class="form-group">	

                <label><?php echo $this->lang->line('terms_conditions');?></label>
               
                  
                    <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->terms_conditions;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('terms_conditions');
                    }
                    
                    $element = array('name'=>'terms_conditions',
                    'value'=>$val,
                    'class'=>'ckeditor');
                    echo form_textarea($element).form_error('terms_conditions');
                ?>                    
               </div>

               
               <div class="form-group">                     
                  <label class="control-label"><?php echo $this->lang->line('status');?></label>											
                  <?php 					 
                     $options = array(						
                     "Active" => "Active",
                     "Inactive" => "Inactive"								
                     );	
                     
                     $select = array();
                     if (isset($record->status)) {
                         
                        $select = array($record->status);					  			
                     }
                     
                     echo form_dropdown('status',$options,$select,'class = "form-control chzn-select"');?>   
               </div>
               
               
               <div class="form-group"> 
               
               <input type="hidden" value="<?php if(isset($record->id)) echo $record->id;?>" name="update_rec_id">
               <input type="submit" value="Save" name="addedit_package" />
            
               </div>
               
               </div>
			
               
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
            }, "<?php echo $this->lang->line('valid_name');?>");
            $.validator.addMethod("numbersonly", function(a, b) {
                return this.optional(b) || /^[0-9 ]+$/i.test(a)
            }, "<?php echo $this->lang->line('valid_numbers');?>");
            $.validator.addMethod("proper_value", function(uid, element) {
                return (this.optional(element) || uid.match(/^((([0-9]*)[\.]([0-9]{2}))|([0-9]*))$/));
            }, "<?php echo $this->lang->line('valid_proper');?>");
            //form validation rules
            $("#package_settings_form").validate({
                ignore:"",
                rules: {
                    vehicle_id: {
                        required: true
                    },
                    name: {
                        required: true,
                        lettersonly: true,
                        maxlength:30
                    },
                    hours: {
                        required: true,
                        numbersonly: true
                    },
                    distance: {
                        required: true,
                        numbersonly: true
                    },
                    min_cost: {
                        required: true,
                        proper_value: true
                    },
                    charge_distance: {
                        required: true,
                        proper_value: true
                    },
                    charge_hour: {
                        required: true,
                        proper_value: true
                    }
                },
                messages: {
                    vehicle_id: {
                        required: "<?php echo $this->lang->line('select_vehicle_valid');?>"
                    },
                    name: {
                        required: "<?php echo $this->lang->line('name_valid');?>"
                    },
                    hours: {
                        required: "<?php echo $this->lang->line('hours_valid');?>"
                    },
                    distance: {
                        required: "<?php echo $this->lang->line('distance_valid');?>"
                    },
                    min_cost: {
                        required: "<?php echo $this->lang->line('minimum_cost_valid');?>"
                    },
                    charge_distance: {
                        required: "<?php echo $this->lang->line('charge_distance_valid');?>"
                    },
                    charge_hour: {
                        required: "<?php echo $this->lang->line('charge_hour_valid');?>"
                    }
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

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            input.style.width = '100%';
            $('#package_image')
                .attr('src', e.target.result);
            $('#package_image').fadeIn();
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>