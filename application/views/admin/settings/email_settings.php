<div class="main-container nine-bmc bmc-remove">

   <div class="content">

      
      <div class="main-hed"> 
         <a href="<?php echo site_url();?>auth"><?php echo $this->lang->line('home');?></a>
         <?php if(isset($title)) echo " >> Master Settings >> ".$title;?>
      </div>
	  
    <?php echo $this->session->flashdata('message'); ?>

	    <!---->
        
       <?php 
        $attributes = array('name' => 'email_settings_form', 'id' => 'email_settings_form');
        echo form_open(site_url().'settings/email_settings',$attributes);?> 
	  
        <div class="col-md-12">


 
			<div class="col-md-6">
            
            <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" name="mail_config" value="webmail" class="form-check-input" <?php if (isset($email_settings->mail_config) && $email_settings->mail_config == 'webmail') echo 'checked="checked" '; ?>>
                  <?php echo $this->lang->line('web_mail');?>
                </label>
              </div>
  
            
			</div>
            
            
            
            
			&nbsp  &nbsp  &nbsp 
			<div class="col-md-6">
            
             <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" name="mail_config" value="mandrill" class="form-check-input" <?php if (isset($email_settings->mail_config) && $email_settings->mail_config == 'mandrill') echo 'checked="checked" '; ?>>
                  <?php echo $this->lang->line('mandrill');?>
                </label>
              </div>
            
			</div>
            
            
			</div>
            
      <div class="col-md-6">
         <div class="module">
            <div class="module-head">
               <h3><?php if(isset($title)) echo $title;?></h3>
            </div>
            
            
            <div class="module-body">
                
				
			
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('host');?><?php echo required_symbol();?></label> 
                  <?php
                    $val='';
                    if(isset($email_settings) && !empty($email_settings))
                    {
                        $val = $email_settings->smtp_host;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('smtp_host');
                    }
                    
                    $element = array('name'=>'smtp_host',
                    'value'=>$val,
                    'placeholder'=>$this->lang->line('host_name'),
                    'class'=>'form-control');
                    echo form_input($element).form_error('smtp_host');
                    ?>
               </div>
               
               
               
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('email');?><?php echo required_symbol();?></label>
                  <?php
                    $val='';
                    if(isset($email_settings) && !empty($email_settings))
                    {
                        $val = $email_settings->smtp_user;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('smtp_user');
                    }
                    
                    $element = array('name'=>'smtp_user',
                    'value'=>$val,
                    'placeholder'=>$this->lang->line('email'),
                    'class'=>'form-control');
                    echo form_input($element).form_error('smtp_user');
                    ?>
                    
               </div>
               
               
               
               
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('password');?><?php echo required_symbol();?></label>    
                 
                   <?php
                    $val='';
                    if(isset($email_settings) && !empty($email_settings))
                    {
                        $val = $email_settings->smtp_password;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('smtp_password');
                    }
                    
                    $element = array('type'=>'password',
                    'name'=>'smtp_password',
                    'value'=>$val,
                    'placeholder'=>$this->lang->line('password'),
                    'class'=>'form-control');
                    echo form_input($element).form_error('smtp_password');
                    ?>                 
               </div>
               
               
               
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('port');?><?php echo required_symbol();?></label>
                  <?php
                    $val='';
                    if(isset($email_settings) && !empty($email_settings))
                    {
                        $val = $email_settings->smtp_port;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('smtp_port');
                    }
                    
                    $element = array(
                    'name'=>'smtp_port',
                    'value'=>$val,
                    'placeholder'=>$this->lang->line('port'),
                    'class'=>'form-control');
                    echo form_input($element).form_error('smtp_port');
                    ?>  
                    
               </div>
               
               
               <div class="form-group">  
               
               <input type="hidden" value="<?php  if(isset($email_settings->id)) echo $email_settings->id;?>"  name="update_record_id" />
               
               <input type="submit" value="<?php echo $this->lang->line('update');?>" name="submit" />
               
               </div>
               
            </div>
         </div> 
      </div>
	  
	  
	  
	  <div class="col-md-6">
         <div class="module">
            <div class="module-head">
               <h3><?php echo $this->lang->line('mandrill_key');?></h3>
            </div>
            <div class="module-body">
                
			
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('api_key');?></label>      
                 
                  
                  <?php
                    $val='';
                    if(isset($email_settings) && !empty($email_settings))
                    {
                        $val = $email_settings->api_key;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('api_key');
                    }
                    
                    $element = array(
                    'name'=>'api_key',
                    'value'=>$val,
                    'placeholder'=>$this->lang->line('api_key'),
                    'class'=>'form-control');
                    echo form_input($element).form_error('api_key');
                    ?> 
                    
               </div>
              
              
              
               <div class="form-group"> 
               
               <input type="hidden" value="<?php  if(isset($email_settings->id)) echo $email_settings->id;?>"  name="update_record_id" />
               
               <input type="submit" value="Update" name="submit" />
               
                </div>
               
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
             $.validator.addMethod("numbersonly", function(a, b) {
                 return this.optional(b) || /^[0-9 ]+$/i.test(a)
             }, "<?php echo $this->lang->line('valid_number');?>");
             //form validation rules
             $("#email_settings_form").validate({
                 rules: {
					 
                     smtp_host: {
                         required: true
                     },
                     smtp_user: {
                         required: true,
                         email: true
                     },
                     smtp_password: {
                         required: true
                         
                     },
                     smtp_port: {
                         required: true,
                         numbersonly: true,
                         rangelength: [2, 4]
                     }
                 },
                 messages: {
					 
                     smtp_host: {
                         required: "<?php echo $this->lang->line('host_valid');?>"
                     },
                     smtp_user: {
                         required: "<?php echo $this->lang->line('email_valid');?>"
                     },
                     smtp_password: {
                         required: "<?php echo $this->lang->line('password_valid');?>"
                     },
                     smtp_port: {
                         required: "<?php echo $this->lang->line('port_valid');?>"
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