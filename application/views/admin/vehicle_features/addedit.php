<div class="main-container nine-bmc bmc-remove">
          

   <div class="content">

      <div class="main-hed">
         <a href="<?php echo site_url();?>auth"><?php echo $this->lang->line('home');?></a> >> Vehicle Settings >>
         <a href="<?php echo site_url();?>vehicle_features"><?php echo $this->lang->line('vehicle_features');?></a> 
         <?php if(isset($title)) echo " >> ".$title;?>
      </div>


      <div class="col-md-6">
         <div class="module">
            <div class="module-head">
               <h3><?php if(isset($title)) echo $title;?></h3>
            </div>
            <?php 
               $attributes = array('name' => 'add_vf_form', 'id' => 'add_vf_form');
               echo form_open(site_url()."vehicle_features/addedit",$attributes);?>
               
            <div class="module-body">
            
            
            
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('feature');?><?php echo required_symbol();?></label>    
                  
                  <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->features;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('feature');
                    }
                    
                    $element = array('name'=>'feature',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('feature');
                    ?>
                     
               </div>
               
               
               
               <div class="form-group">                     
                  <label class="control-label"><?php echo $this->lang->line('status');?></label>	
                   <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->status;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('status');
                    }
                    
                    echo form_dropdown('status',activeinactive(),$val,'class="chzn-select form-control"').form_error('status');
                    ?>
                        
               </div>
               
               
               <div class="form-group">
               
               <?php 
                $value='';
                if(isset($record))
                {
                    $value = $record->id;
                }
                echo form_hidden('id',$value);?>
                        
               
               <button class="pull-right" type="submit" name="addedit_vf" value="addedit_vf"><?php echo $this->lang->line('save');?></button>
               
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
             //form validation rules
             $("#add_vf_form").validate({
                 rules: {
                     feature: {
                         required: true,
                         maxlength:50
                     }
                     
                 },
                 messages: {
                     feature: {
                         required: "<?php echo $this->lang->line('vehicle_feature_valid');?>"
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