<div class="col-md-10 padding white right-p">
   <div class="content">
      <div class="main-hed">
      
          <a href="<?php echo site_url();?>auth"><?php echo $this->lang->line('home');?></a> >> <?php echo $this->lang->line('users');?> >> <a href="<?php echo site_url();?>drivers"><?php echo $this->lang->line('drivers');?></a> >> <?php if(isset($title)) echo $title;?>
          
      </div>
      <div class="col-md-12 padding-p-l">
         <div class="module">
            <div class="module-head">
               <h3><?php echo $title;?></h3>
            </div>
            
            <div class="module-body">
               <?php 
                  $attributes = array('name' => 'edit_driver_form', 'id' => 'edit_driver_form');
                   echo form_open_multipart(site_url()."drivers/edit_driver",$attributes);?>
                   
                   
              <div class="col-md-6">
              
              <div class="form-group">                    
                  <label><?php echo $this->lang->line('first_name');?></label>    
                  
                  <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->first_name;
                    }
                    else if(isset($_POST))
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
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->last_name;
                    }
                    else if(isset($_POST))
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
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->email;
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
                  <label><?php echo $this->lang->line('phone');?></label>    
                  
                  <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->phone;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('phone');
                    }
                    
                    $element = array('name'=>'phone',
                    'value'=>$val,
                    'class'=>'form-control',
                    'maxlength'=>30);
                    echo form_input($element).form_error('phone');
                    ?>
                     
               </div>
               
               
               
               <div class="form-group">                     
                  <label class="control-label"><?php echo $this->lang->line('status');?></label>											
                  <?php 					 
                     $options = array(						
                     "1" => "Active",
                     "0" => "Inactive"								
                     );	
                     
                     $select = array();
                     if(isset($record->active)) {
                     $select = array(								
                     			$record->active		
                     			);					  			
                     }
                     echo form_dropdown('status',$options,$select,'class = "chzn-select"');					 
                     
                     ?>   
               </div>
               
               
             </div>
               
               
              <div class="col-md-6">
              
              
                  
                <div class="form-group">
                
                    <label class="control-label"><?php echo $this->lang->line('image');?>(<small><strong><?php echo ALLOWED_TYPES;?></strong></small>)</label>
                    
                    
                    <input type="file" name="image" title="Profile Image" onchange="photo(this,'user_image')">
                    
                    <?php 
                    $src = "";
                    $style="display:none;";
                    if(isset($record->image) && $record->image != "" && file_exists(USER_IMG_UPLOAD_PATH_URL.$record->image)) 
                    {
                        $src = USER_IMG_PATH.$record->image;
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
                    if(isset($record->license) && $record->license != "" && file_exists(DRIVER_LICENSE_UPLOAD_PATH_URL.$record->license)) 
                    {
                        $src = DRIVER_LICENSE_IMG_PATH.$record->license;
                        $style="";
                    }
                    ?>
                    
                <img id="driver_license" src="<?php echo $src;?>" style="<?php echo $style;?>"> 
                
                </div>
                
              
              
              
               <div class="form-group pull-right">
               
               <?php 
                $value='';
                if(isset($record))
                {
                    $value = $record->id;
                }
                echo form_hidden('id',$value);?>
                        
               
               <button type="submit" name="edit_driver" value="edit_driver" class="btn btn-primary"><?php echo $this->lang->line('save');?></button>
               
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
            $("#edit_driver_form").validate({
                rules: {
                    first_name: {
                        required: true,
                        lettersonly: true,
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    phone: {
                        required: true,
                        phoneNumber: true,
                        rangelength: [9, 30]
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