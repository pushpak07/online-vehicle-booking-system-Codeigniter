<div class="main-container nine-bmc bmc-remove">
          

   <div class="content">

      <div class="main-hed">
         <a href="<?php echo site_url();?>auth"><?php echo $this->lang->line('home');?></a> >> 
         <a href="<?php echo site_url();?>locations"><?php echo $this->lang->line('locations');?></a> 
         <?php if(isset($title)) echo " >> ".$title;?>
      </div>

      <div class="col-md-6">

         <div class="module">
            <div class="module-head">
               <h3><?php if(isset($title)) echo $title;?></h3>
            </div>
            
           
               
            <div class="module-body">
            
             <?php 
               $attributes = array('name' => 'add_airport_form', 'id' => 'add_airport_form');
               echo form_open(site_url()."locations/addedit",$attributes);?>
               
               
            
            
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('location');?><?php echo required_symbol();?></label>    
                  
                  <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->airport_name;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('airport_name');
                    }
                    
                    $element = array('name'=>'airport_name',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('airport_name');
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
                        
               
               <button type="submit" name="addedit_airport" value="addedit_airport" class="pull-right"><?php echo $this->lang->line('save');?></button>
               
            </div>   
               
            </div>
            
            <?php echo form_close();?>                      
         </div>
         
         
      </div>
   </div>
   
</div>




<!--Validations-->
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
            $("#add_airport_form").validate({
                rules: {
                    airport_name: {
                        required: true,
                        maxlength: 500
                       
                    },
                },
                messages: {
                    airport_name: {
                        required: "Location name required"
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