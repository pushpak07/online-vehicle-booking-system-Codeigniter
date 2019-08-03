<?php $this->load->view('site/common/auth/header.php');?>




          <div class="container">
            <div class="row">
               <div class="col-md-6 col-md-offset-3">
                  <div id="total-login" class="login-box">
                     <?php 
                        $attributes = array("name" => 'forgot_password_form',"id" => 'forgot_password_form');
                        echo form_open(site_url().'auth/forgot_password',$attributes); ?>
                        
                     <div class="first-row">
                        <div class="login-head"><?php echo lang('forgot_password_heading');?></div>
                     </div>


                     <div class="error"><?php echo $this->session->flashdata('message');?></div>

                      <div  class="login-box-body">

                     <div class="col-md-12 col-xs-12">
                        <div class="input-group input-group-lg in-ty">
                           <?php echo form_input($email);?>
                           <?php echo form_error('email');?>
                        </div>
                     </div>


                     <div class="col-md-12 col-xs-12">
                       <div class="mt-2">
                        <input type="submit" name="forgot_pwd" class="btn btn-danger btn-block" value="<?php echo $this->lang->line('submit'); ?>"/>  
                         </div>
                     </div>

                     <div class="forget-pass"> 
                         <a href="<?php echo site_url();?>auth/login"> <?php echo $this->lang->line('login');?></a> 
                     </div>

                     </div>

                     <?php echo form_close(); ?>
                  </div>
                  <div class="shadow"></div>
                  <div class="col-md-10">
                     <div id="fp" > 
                        <input type="text" class="forget" placeholder="Forgot Password" > 
                     </div>
                  </div>
               </div>
            </div>
         </div>



      </div>

      <script src="<?php echo JS_BOOTSTRAP_MIN;?>"></script>
      <script src="<?php echo JS_JQUERY_VALIDATE_MIN;?>" type="text/javascript"></script>
      <script src="<?php echo JS_ADDITIONAL_METHODS_MIN;?>" type="text/javascript"></script>

      <script type="text/javascript"> 
         (function($,W,D)
         {
            var JQUERY4U = {};
         
            JQUERY4U.UTIL =
            {
                setupFormValidation: function()
                {
                    //Additional Methods        
               
         
               
               //form validation rules
                    $("#forgot_password_form").validate({
                        rules: {
                            
            email:{
               required: true,
               email: true
            }
                        },
                  
                  messages: {
                     
            email:{
               required: "<?php echo $this->lang->line('email_valid');?>"
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


   </body>
</html>