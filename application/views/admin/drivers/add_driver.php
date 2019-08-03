<div class="col-md-10 padding white right-p">
   <div class="content">
      <div class="main-hed">
      
         <a href="<?php echo site_url();?>auth"><?php echo $this->lang->line('home');?></a> >> Users >> <a href="<?php echo site_url();?>drivers"><?php echo $this->lang->line('drivers');?></a> >> <?php if(isset($title)) echo $title;?>
         
      </div>
      <div class="col-md-12 padding-p-l">
         <div class="module">
            <div class="module-head">
               <h3><?php echo $title;?></h3>
            </div>
            <div class="module-body">
               <?php 
                  $attributes = array('name' => 'add_driver_form', 'id' => 'add_driver_form');
                   echo form_open("drivers/add_driver",$attributes) ?>
               <div class="col-md-6">
               
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('first_name');?></label> 
                     
                    <?php
                    $val='';
                   
                    if(isset($_POST))
                    {
                        $val = set_value('first_name');
                    }
                    
                    $element = array('name'=>'first_name',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('first_name');
                    ?>
                    
                  </div>
                  
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('last_name');?></label> 
                     
                      <?php
                    $val='';
                   
                    if(isset($_POST))
                    {
                        $val = set_value('last_name');
                    }
                    
                    $element = array('name'=>'last_name',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('last_name');
                    ?>
                    
                     
                  </div>
                  
                  
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('email');?></label>    
                     
                    <?php
                    $val='';
                   
                    if(isset($_POST))
                    {
                        $val = set_value('email');
                    }
                    
                    $element = array('name'=>'email',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('email');
                    ?>
                    
                  </div>
                  
                  
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('phone');?></label> 

                    <?php
                    $val='';
                   
                    if(isset($_POST))
                    {
                        $val = set_value('phone');
                    }
                    
                    $element = array('name'=>'phone',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('phone');
                    ?>
                    
                  </div>
                  
               </div>
               
               
               <div class="col-md-6">
               
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('password');?></label>    
                     
                     <?php
                    $val='';
                   
                    if(isset($_POST))
                    {
                        $val = set_value('password');
                    }
                    
                    $element = array('name'=>'password',
                    'id'=>'password',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('password');
                    ?>
                   
                  </div>
                  
                  
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('confirm_password');?></label>  

                    <?php
                    $val='';
                   
                    if(isset($_POST))
                    {
                        $val = set_value('confirm_password');
                    }
                    
                    $element = array('name'=>'confirm_password',
                    'id'=>'confirm_password',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('confirm_password');
                    ?>
                    
                  </div>
                  
                  
                  <div class="form-group">                     
                     <label class="control-label"><?php echo $this->lang->line('status');?></label>  <?php 	
                     
                        $options = array(						
                        "1" => "Active",
                        "0" => "Inactive"								
                        );	
                        
                        $select = array();
                       
                        echo form_dropdown('status',$options,$select,'class = "chzn-select"');					 
                        
                        ?>   
                  </div>
                  
                  
                <div class="form-group pull-right">
               
               <button type="submit" name="add_driver" value="add_driver" class="btn btn-primary"><?php echo $this->lang->line('save');?></button>
               
               </div>
               
               </div>
               
               <?php echo form_close();?>     
            </div>
                             
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
             $.validator.addMethod("pwdmatch", function(repwd, element) {
                 var pwd = $('#password').val();
                 return (this.optional(element) || repwd == pwd);
             }, "<?php echo $this->lang->line('valid_passwords');?>");
             
             
             $.validator.addMethod("lettersonly", function(a, b) {
                 return this.optional(b) || /^[a-z ]+$/i.test(a)
             }, "<?php echo $this->lang->line('valid_name');?>");
             
             
             $.validator.addMethod("phoneNumber", function(uid, element) {
                 return (this.optional(element) || uid.match(/^[- +()]*[0-9][- +()0-9]*$/));
             }, "<?php echo $this->lang->line('valid_number');?>");
             //form validation rules
             
             
             $("#add_driver_form").validate({
                 rules: {
                     first_name: {
                         required: true,
                         lettersonly: true
                     },
                     email: {
                         required: true,
                         email: true
                     },
                     phone: {
                         required: true,
                         phoneNumber: true,
                         rangelength: [9, 30]
                     },
                     password: {
                         required: true,
                         rangelength: [8, 30]
                     },
                     confirm_password: {
                         required: true,
                         pwdmatch: true
                     }
                 },
                 messages: {
                     first_name: {
                         required: "<?php echo $this->lang->line('first_name_valid');?>"
                     },
                     email: {
                         required: "<?php echo $this->lang->line('email_valid');?>"
                     },
                     phone: {
                         required: "<?php echo $this->lang->line('phone_valid');?>"
                     },
                     password: {
                         required: "<?php echo $this->lang->line('password_valid');?>"
                     },
                     confirm_password: {
                         required: "<?php echo $this->lang->line('confirm_password_valid');?>"
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