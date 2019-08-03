
<div class="main-container nine-bmc bmc-remove">

   <div class="content">

      <div class="main-hed"> 
         <a href="<?php echo site_url();?>auth"><?php echo $this->lang->line('home');?></a> >> <?php echo $this->lang->line('master_settings');?>  >> <a href="<?php echo site_url();?>settings/waitings"><?php echo $this->lang->line('waiting_time_settings');?></a> >> 
         <?php if(isset($title)) echo $title;?>
      </div>

      <div class="col-md-6">
         <div class="module">
            <div class="module-head">
               <h3><?php if(isset($title)) echo $title;?></h3>
            </div>
            <?php 
               $attributes = array('name' => 'waiting_settings_form', 'id' => 'waiting_settings_form');
               echo form_open(site_url()."settings/addedit_waiting/" ,$attributes) ?>
               
            <div class="module-body">
            
            
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('waiting_time');?><?php echo required_symbol();?></label> 
                  
                   <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->waiting_time;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('waiting_time');
                    }
                    
                    $element = array('name'=>'waiting_time',
                    'value'=>$val,
                    'placeholder'=>$this->lang->line('in_mins'),
                    'class'=>'form-control');
                    echo form_input($element).form_error('waiting_time');
                    ?> 
                  
               </div>
               
               
               <div class="form-group">
               
                  <label><?php echo $this->lang->line('cost')." (".$this->config->item('site_settings')->currency_symbol.")";?><?php echo required_symbol();?></label>
                  
                   <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->cost;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('cost');
                    }
                    
                    $element = array('name'=>'cost',
                    'value'=>$val,
                    'placeholder'=>$this->lang->line('cost'),
                    'class'=>'form-control');
                    echo form_input($element).form_error('cost');
                    ?> 
                  
                  
               </div>
               
               
               
               <div class="form-group">                     
                  <label class="control-label"><?php echo $this->lang->line('status');?></label>
                  <?php
                     $options=array("Active"=>"Active",
                     "Inactive"=>"Inactive");
                     
                     $select=array();
                     if(isset($record->status))
                     {
                     	$select=array($record->status);
                     }
                      
                     echo form_dropdown('status',$options,$select,'class = "form-control chzn-select"');
                     
                      ?>
               </div>
               
               
               <div class="form-group"> 
              
               <input type="hidden" value="<?php if(isset($record->id)) echo $record->id;?>" name="update_rec_id">
               <input type="submit" value="Submit" name="addedit_waiting" />
              
               </div>
               
               
            </div>
            
            <?php echo form_close();?>                      
         </div>
      </div>
   </div>
</div>
<script type="text/javascript"> 
   (function($, W, D) {
    var JQUERY4U = {};
    JQUERY4U.UTIL = {
        setupFormValidation: function() {
            //Additional Methods			
            $.validator.addMethod("proper_value", function(uid, element) {
                return (this.optional(element) || uid.match(/^((([0-9]*)[\.]([0-9]{2}))|([0-9]*))$/));
            }, "<?php echo $this->lang->line('valid_proper');?>");
            $.validator.addMethod("numbersonly", function(a, b) {
                return this.optional(b) || /^[0-9 ]+$/i.test(a)
            }, "<?php echo $this->lang->line('valid_numbers');?>");
            //form validation rules
            $("#waiting_settings_form").validate({
                rules: {
                    waiting_time: {
                        required: true,
                        numbersonly: true
                    },
                    cost: {
                        required: true,
                        proper_value: true
                    }
                },
                messages: {
                    waiting_time: {
                        required: "<?php echo $this->lang->line('waiting_time_valid');?>"
                    },
                    cost: {
                        required: "<?php echo $this->lang->line('cost_valid');?>"
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
</script>