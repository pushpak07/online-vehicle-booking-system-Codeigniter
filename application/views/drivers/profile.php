<div class="col-md-10 padding white right-p">
   <div class="content">
      <div class="col-md-12 padding-p-l">
         <div class="module">
            <div class="module-head">
               <h3><?php if(isset($title)) echo $title;?></h3>
            </div>
            
            <?php echo $this->session->flashdata('message'); ?>
            
           
            <div class="module-body">
            
                <?php 
               $attributes = array("name" => 'profile_form',"id" => 'profile_form');
               echo form_open_multipart('driver/profile',$attributes);?>
               
                <div class="col-md-6">
                
               <div class="form-group">                     
                  <label class="control-label"><?php echo $this->lang->line('user_name');?></label>											
                  <input type="text" name="user_name" value="<?php 
                     if(isset($admin_details->username)) echo $admin_details->username;echo set_value('user_name');
                     ?>" class="form-control"/> 
                    <?php echo form_error('user_name');?>                     
               </div>
               
               
               
               <div class="form-group">                     
                  <label class="control-label"><?php echo $this->lang->line('email');?></label>											
                  <input type="text" name="email" value="<?php 
                     if(isset($admin_details->email)) echo $admin_details->email;echo set_value('email');
                     ?>" readonly class="form-control"/> 
                    <?php echo form_error('email');?>                     
               </div>
               
               
               
               
               <div class="form-group">                     
                  <label class="control-label"><?php echo $this->lang->line('first_name');?></label>											
                  <input type="text" name="first_name" value="<?php 
                     if(isset($admin_details->first_name)) echo $admin_details->first_name;echo set_value('first_name');?>" class="form-control"/> 
                    <?php echo form_error('first_name');?>                     
               </div>
               
               
               
               <div class="form-group">                     
                  <label class="control-label"><?php echo $this->lang->line('last_name');?></label>											
                  <input type="text" name="last_name" value="<?php 
                     if(isset($admin_details->last_name)) echo $admin_details->last_name;?>" class="form-control"/> 
                     
                    <?php echo form_error('last_name');?>          
               </div>
               
               
               
               <div class="form-group">                     
                  <label class="control-label"><?php echo $this->lang->line('phone');?></label>											
                  <input type="text" name="phone" maxlength="30" value="<?php 
                     if(isset($admin_details->phone)) echo $admin_details->phone;echo set_value('phone');
                     ?>" class="form-control"/>  
                   <?php echo form_error('phone');?>                     
               </div>
              
              
            </div>
              
              
            <div class="col-md-6">
                
                
                
                <div class="form-group">
                
                    <label class="control-label"><?php echo $this->lang->line('image');?>(<small><strong><?php echo ALLOWED_TYPES;?></strong></small>)</label>
                    
                    
                    <input type="file" name="image" title="Profile Image" onchange="photo(this,'user_image')">
                    
                    <?php 
                    $src = "";
                    $style="display:none;";
                    if(isset($admin_details->image) && $admin_details->image != "" && file_exists(USER_IMG_UPLOAD_PATH_URL.$admin_details->image)) 
                    {
                        $src = USER_IMG_PATH.$admin_details->image;
                        $style="";
                    }
                    ?>
                    
                <img id="user_image" src="<?php echo $src;?>" style="<?php echo $style;?>"> 
                
                </div>
            
            
                    
                <div class="form-group">
                
                    <label class="control-label"><?php echo $this->lang->line('license');?>(<small><strong><?php echo ALLOWED_TYPES;?></strong></small>)</label>
                    
                    
                    <input type="file" name="license" title="Driving License" onchange="photo(this,'driver_license')">
                    
                    <?php 
                    $src = "";
                    $style="display:none;";
                    if(isset($admin_details->license) && $admin_details->license != "" && file_exists(DRIVER_LICENSE_UPLOAD_PATH_URL.$admin_details->license)) 
                    {
                        $src = DRIVER_LICENSE_IMG_PATH.$admin_details->license;
                        $style="";
                    }
                    ?>
                    
                <img id="driver_license" src="<?php echo $src;?>" style="<?php echo $style;?>"> 
                
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
                  ignore:"",
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