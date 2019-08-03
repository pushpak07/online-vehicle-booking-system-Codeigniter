<div class="main-container nine-bmc bmc-remove">
          

   <div class="content">

      <div class="main-hed">
         <a href="<?php echo site_url();?>auth"><?php echo $this->lang->line('home');?></a> >> Users >>
         <a href="<?php echo site_url();?>customers"><?php echo $this->lang->line('customers');?></a> 
         <?php if(isset($title)) echo " >> ".$title;?>
      </div>

      <div class="col-md-12">

         <div class="module">
            <div class="module-head">
               <h3><?php if(isset($title)) echo $title;?></h3>
            </div>
            
               
            <div class="module-body">
            
            <?php 
               $attributes = array('name' => 'add_customers_form', 'id' => 'add_customers_form');
               echo form_open(site_url()."customers/add_customer",$attributes);?>
               
            <div class="col-md-6">
            
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('first_name');?><?php echo required_symbol();?></label>    
                  
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
               
                  <label><?php echo $this->lang->line('email');?><?php echo required_symbol();?></label>
                  
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
               
                  <label><?php echo $this->lang->line('phone');?><?php echo required_symbol();?></label>
                  
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
               
                  <label><?php echo $this->lang->line('password');?><?php echo required_symbol();?></label>
                  
                  <?php
                    $val='';
                   
                    if(isset($_POST))
                    {
                        $val = set_value('password');
                    }
                    
                    $element = array('type'=>'password',
                    'name'=>'password',
                    'id'=>'password',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('password');
                    ?>
                        
               </div>
               
               <div class="form-group">  
               
                  <label><?php echo $this->lang->line('confirm_password');?><?php echo required_symbol();?></label>
                  
                  <?php
                    $val='';
                   
                    if(isset($_POST))
                    {
                        $val = set_value('confirm_password');
                    }
                    
                    $element = array('type'=>'password',
                    'name'=>'confirm_password',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('confirm_password');
                    ?>
                        
               </div>
               
               <div class="form-group">                     
                  <label class="control-label"><?php echo $this->lang->line('status');?></label>	
                   <?php
                    $val='';
                    
                    $options = array(						
                        "1" => "Active",
                        "0" => "Inactive"								
                    );	
                        
                        
                    if(isset($_POST))
                    {
                        $val = set_value('status');
                    }
                    
                    echo form_dropdown('status',$options,$val,'class="chzn-select form-control"').form_error('status');
                    ?>
                        
               </div>
               
               <div class="form-group">
               
               <button type="submit" name="add_customer" value="add_customer" class="pull-right"><?php echo $this->lang->line('save');?></button>
               
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
             }, "<?php echo $this->lang->line('valid_phone_number');?>");
             //form validation rules
             $("#add_customers_form").validate({
                 rules: {
                     first_name: {
                         required: true,
                         lettersonly: true,
                         rangelength: [3, 30]
                     },
                     last_name: {
                         lettersonly: true,
                          maxlength:30
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