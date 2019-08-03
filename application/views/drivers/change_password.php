<div class="col-md-10 padding white right-p">
   <div class="content">
      <div class="col-md-6 padding-p-l">
         <div class="module">
            <div class="module-head">
               <h3><?php if(isset($title)) echo $title;?></h3>
            </div>
            <?php 
               $attributes = array("name"=>'change_password_form',"id"=>'change_password_form');
               echo form_open("auth/change_Password/driver",$attributes); ?>
            <div class="module-body">
               <?php echo $this->session->flashdata('message'); ?>
               <div class="form-group">                     
                  <?php echo form_input($old_password); ?>
                  <?php echo form_error('old_password'); ?>       
               </div>
               <div class="form-group">                     
                  <?php echo form_input($new_password); ?>
                  <?php echo form_error('new_password'); ?>       
               </div>
               <div class="form-group">                     
                  <?php echo form_input($new_password_confirm); ?>
                  <?php echo form_error('new_password_confirm'); ?>
               </div>
               <div class="form-group">                     
                  <?php echo form_input($user_id); ?>
                  <?php echo form_error('user_id'); ?>    
               </div>
               <div class="col-md-12 col-xs-12">
                  <input type="submit" class="login-btn" value="<?php echo $this->lang->line('change_password'); ?>"/>  
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
   		$.validator.addMethod("pwdmatch", function(repwd, element) {
   			var pwd= $('#new').val();
   			return (this.optional(element) || repwd==pwd);
   		},"<?php echo $this->lang->line('valid_passwords');?>");

   		//form validation rules
              $("#change_password_form").validate({
                  rules: {
                old: {
                          required: true      
                      },
			new_password: {
					  required: true,
					  rangelength: [8, 30]
				},
   			new_confirm: {
					required: true,
					pwdmatch: true
				  }
             },
   			
   			messages: {
   				old: {
                          required: "<?php echo $this->lang->line('old_password_valid');?>"
                      },
   	new_password: {
                          required: "<?php echo $this->lang->line('new_password_valid');?>"
                      },
   				new_confirm: {
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