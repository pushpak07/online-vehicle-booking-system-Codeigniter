<div class="main-container nine-bmc bmc-remove">

 <div class="content">

   <div class="main-hed"> 
      <a href="<?php echo site_url();?>auth"><?php echo $this->lang->line('home');?></a> >> <?php echo $this->lang->line('master_settings');?> >> 
      <?php if(isset($title)) echo $title;?>
   </div>

     <?php echo $this->session->flashdata('message'); ?>

 <div class="col-md-6">

   
      
         <div class="module">
            <div class="module-head">
               <h3><?php if(isset($title)) echo $title;?></h3>
            </div>
            
            
            <?php 
             $attributes = array('name' => 'add_reasons_to_book_form', 'id' => 'add_reasons_to_book_form');
             echo form_open(site_url()."settings/reasonsToBook/reasons",$attributes);?>
             
            <div class="module-body">
            
           


               <div class="form-group">                    
                  <label><?php echo $this->lang->line('reasons_to_book');?><?php echo required_symbol();?></label> 
                 
                  <?php
                    $val='';
                    if(isset($reasons_rec) && !empty($reasons_rec))
                    {
                        $val = $reasons_rec->title;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('title');
                    }
                    
                    $element = array('name'=>'title',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('title');
                    ?>    
               </div>
               
               
               
              
               <div class="form-group"> 
                <label><?php echo $this->lang->line('content');?><?php echo required_symbol();?></label>
 
                  <?php
                    $val='';
                    if(isset($reasons_rec) && !empty($reasons_rec))
                    {
                        $val = $reasons_rec->content;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('content');
                    }
                    
                    $element = array('name'=>'content',
                    'value'=>$val,
                    'class'=>'form-control ckeditor');
                    echo form_textarea($element).form_error('content');
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
                     if(isset($reasons_rec->status)) {
                     $select = array(								
                     			$reasons_rec->status		
                     			);					  			
                     }
                     echo form_dropdown('status',$options,$select,'class = "form-control chzn-select"');					 
                     
                     ?> 
               </div>
               
               
               <div class="form-group">  
               
               <input type="hidden" value="<?php if(isset($reasons_rec->id)) echo $reasons_rec->id;?>" name="update_rec_id">
               <input type="submit"  value="Update" name="submit" />
               
               </div>
               
            </div>
            
            <?php echo form_close();?>  
         </div>
      </div>
   </div>
   

   <div class="col-md-6">
   
     
         <div class="module">
            <div class="module-head">
            
               <h3><?php echo $this->lang->line('instructions');?></h3>
            </div>
            
            
            <?php 
               $attributes = array('name' => 'add_instructions_form', 'id' => 'add_instructions_form');
               echo form_open(site_url()."settings/reasonsToBook/instructions",$attributes);?>
                      
            <div class="module-body">
            
            
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('instructions');?><?php echo required_symbol();?></label>    
                 
                  <?php
                    $val='';
                    if(isset($instructions_rec) && !empty($instructions_rec))
                    {
                        $val = $instructions_rec->title;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('instructions_title');
                    }
                    
                    $element = array('name'=>'instructions_title',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('instructions_title');
                    ?>			  
               </div>
               
               
               
               
               <div class="form-group">   
                <label><?php echo $this->lang->line('content');?><?php echo required_symbol();?></label>
               
                    <?php
                    $val='';
                    if(isset($instructions_rec) && !empty($instructions_rec))
                    {
                        $val = $instructions_rec->content;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('instructions_content');
                    }
                    
                    $element = array('name'=>'instructions_content',
                    'value'=>$val,
                    'class'=>'form-control ckeditor');
                    echo form_textarea($element).form_error('instructions_content');
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
                     if(isset($instructions_rec->status)) {
                     $select = array(								
                     			$instructions_rec->status		
                     			);					  			
                     }
                     echo form_dropdown('status',$options,$select,'class = "form-control chzn-select"');					 
                     
                     ?> 
               </div>
               
               
               <div class="form-group">
                
               <input type="hidden" value="<?php if(isset($instructions_rec->id)) echo $instructions_rec->id?>"  name="update_rec_id">
               <input type="submit" value="Update" name="submit" />
                 
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
             }, "Please enter valid name.");
             //form validation rules
             $("#add_instructions_form").validate({
                 rules: {
                     title: {
                         required: true,
                         lettersonly: true
                     }
                 },
                 messages: {
                     title: {
                         required: "<?php echo $this->lang->line('title_valid');?>"
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
            //form validation rules
            $("#add_reasons_to_book_form").validate({
                rules: {
                    title: {
                        required: true,
                        lettersonly: true
                    }
                },
                messages: {
                    title: {
                        required: "<?php echo $this->lang->line('title_valid');?>"
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