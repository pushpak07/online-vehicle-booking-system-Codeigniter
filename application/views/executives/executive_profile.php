<div class="main-container nine-bmc bmc-remove">

   <div class="content">

     <div class="main-hed">
         <a href="<?php echo site_url();?>auth"><?php echo $this->lang->line('home');?></a>  
         <?php if(isset($title)) echo " >> ".$title;?>
      </div>


 <?php echo $this->session->flashdata('message'); ?>

 <div class="col-md-6">

         <div class="module">
            <div class="module-head">
               <h3><?php if(isset($title)) echo $title;?></h3>
            </div>
            
            
            <?php 
               $attributes = array("name" => 'profile_form',"id" => 'profile_form');
               echo form_open(site_url().'executive/profile',$attributes); ?>
               
            <div class="module-body">
            
              
               
               
               
               <div class="form-group">                     
                  <label><?php echo $this->lang->line('user_name');?><?php echo required_symbol();?></label>											
                 
                    <?php
                    $val='';
                    if(isset($admin_details) && !empty($admin_details))
                    {
                        $val = $admin_details->username;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('user_name');
                    }
                    
                    $element = array('name'=>'user_name',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('user_name');
                    ?>
                    
               </div>
               
              
               
               
               
               <div class="form-group">                     
                  <label><?php echo $this->lang->line('email');?><?php echo required_symbol();?></label>							
                  
                    <?php
                    $val='';
                    if(isset($admin_details) && !empty($admin_details))
                    {
                        $val = $admin_details->email;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('email');
                    }
                    
                    $element = array('name'=>'email',
                    'value'=>$val,
                    'class'=>'form-control',
                    'readonly'=>true);
                    echo form_input($element).form_error('email');
                    ?>
                    
               </div>
               
               
               
               
               <div class="form-group">                     
                  <label class="control-label"><?php echo $this->lang->line('first_name');?><?php echo required_symbol();?></label>
                    <?php
                    $val='';
                    if(isset($admin_details) && !empty($admin_details))
                    {
                        $val = $admin_details->first_name;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('first_name');
                    }
                    
                    $element = array('name'=>'first_name',
                    'value'=>$val,
                    'class'=>'form-control'
                    );
                    echo form_input($element).form_error('first_name');
                    ?>
                    
               </div>
               
               
               
               
               <div class="form-group">                     
                  <label class="control-label"><?php echo $this->lang->line('last_name');?></label>       
                   <?php
                    $val='';
                    if(isset($admin_details) && !empty($admin_details))
                    {
                        $val = $admin_details->last_name;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('last_name');
                    }
                    
                    $element = array('name'=>'last_name',
                    'value'=>$val,
                    'class'=>'form-control'
                   );
                    echo form_input($element).form_error('last_name');
                    ?>   
                     
               </div>
               
               
               
               
               <div class="form-group">                     
                  <label class="control-label"><?php echo $this->lang->line('phone');?><?php echo required_symbol();?></label>
                    <?php
                    $val='';
                    if(isset($admin_details) && !empty($admin_details))
                    {
                        $val = $admin_details->phone;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('phone');
                    }
                    
                    $element = array('name'=>'phone',
                    'value'=>$val,
                    'class'=>'form-control'
                    );
                    echo form_input($element).form_error('phone');
                    ?> 
                    
               </div>
              
              
              
               <div class="form-group"> 
               
               <input type="hidden" name="update_rec_id" value="<?php if(isset($admin_details->id)) echo $admin_details->id;?>" />                 		
               <input type="submit" value="Update" name="submit" />
               </div>
               
            </div>
            <?php echo form_close();?>                      
         </div>
      </div>
   </div>
</div>

<script type="text/javascript"> 
   (function($,W,D)
   {
      var JQUERY4U = {};
   
      JQUERY4U.UTIL =
      {
          setupFormValidation: function()
          {
              //Additional Methods			
   		
   $.validator.addMethod("lettersonly",function(a,b){return this.optional(b)||/^[a-z ]+$/i.test(a)},"<?php echo $this->lang->line('valid_name');?>");
   		
   		$.validator.addMethod("phoneNumber", function(uid, element) {
   			return (this.optional(element) || uid.match(/^[- +()]*[0-9][- +()0-9]*$/));
   		},"<?php echo $this->lang->line('valid_number');?>");
   
   
   
   		
   		
   		//form validation rules
              $("#profile_form").validate({
                  rules: {
                      user_name: {
                          required: true,
   			  lettersonly: true
                      },
   				
   	email:{
   		required: true,
   		email: true
   	},
   	phone: {
                          required: true,
   			  phoneNumber: true,
   			rangelength: [9, 30]
                      },
   	first_name:{
   		required: true,
   		lettersonly: true
   		
   	}
   	
                  },
   			
   			messages: {
   				user_name:{
   		required: "<?php echo $this->lang->line('user_name_valid');?>"
   	},
   	email:{
   		required: "<?php echo $this->lang->line('email_valid');?>"
   	},
   	phone:{
   		required: "<?php echo $this->lang->line('phone_valid');?>"
   	},
   	first_name:{
   		required: "<?php echo $this->lang->line('first_name_valid');?>"
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