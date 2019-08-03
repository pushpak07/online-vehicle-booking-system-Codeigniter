<?php $this->load->view('site/common/auth/header.php');?>


         <div class="container">
            <div class="row">
               <div class="col-md-6 col-md-offset-3">
                  <div id="total-login" class="login-box">
                     <?php 
                        $attributes = array("name" => 'register_form',"id" => 'register_form');
                        echo form_open(site_url().'auth/create_user',$attributes); ?>
                     <div class="first-row">
                        <div class="login-head"><?php echo $title; ?></div>
                     </div>
                     <div  class="login-box-body">
					 
                     <div class="col-md-12 col-xs-12">
						<?php echo $this->session->flashdata('message');?>
                        <div class="input-group input-group-lg in-ty"> 
                           <?php echo form_input($first_name);?>
                           <?php echo form_error('first_name'); ?>
                        </div>
                     </div>
                     <div class="col-md-12 col-xs-12">
                        <div class="input-group input-group-lg in-ty"> 
                           <?php echo form_input($last_name);?>
                           <?php echo form_error('last_name'); ?>
                        </div>
                     </div>
                     <div class="col-md-12 col-xs-12">
                        <div class="input-group input-group-lg in-ty">  
                           <?php echo form_input($email); ?>
                           <?php echo form_error('email'); ?>
                        </div>
                     </div>
                     <div class="col-md-12 col-xs-12">
                        <div class="input-group input-group-lg in-ty"> 
                           <?php echo form_input($phone); ?>
                           <?php echo form_error('phone'); ?>
                        </div>
                     </div>
                     <div class="col-md-12 col-xs-12">
                        <div class="input-group input-group-lg in-ty">  
                           <?php echo form_input($password); ?>
                           <?php echo form_error('password'); ?>
                        </div>
                     </div>
                     <div class="col-md-12 col-xs-12">
                        <div class="input-group input-group-lg in-ty">  
                           <?php echo form_input($password_confirm); ?>
                           <?php echo form_error('password_confirm'); ?>
                        </div>
                     </div>
                     <div class="col-md-12 col-xs-12">
                        <div class="form-group mt-2">
                           <input type="submit" name="register" class="btn btn-danger btn-block" value="<?php echo $this->lang->line('register'); ?>"/>
                        </div>
                     </div>
                     
                     
                               <?php 
                     //google login
	/*include_once APPPATH."libraries/google-api-php-client/Google_Client.php";
    include_once APPPATH."libraries/google-api-php-client/contrib/Google_Oauth2Service.php";
	// Google Project API Credentials
    $clientId = '529623234561-g94als02e0nngshfcbhqn4a78dvr72kn.apps.googleusercontent.com';
    $clientSecret = 'KUnfLk_T_ZfiP5rEEChmJd59';
    $redirectUrl = base_url() . 'user_authentication/';

	// Google Client Configuration
	$gClient = new Google_Client();
	$gClient->setApplicationName('Login');
	$gClient->setClientId($clientId);
	$gClient->setClientSecret($clientSecret);
	$gClient->setRedirectUri($redirectUrl);
	$gClient->setScopes('email');
	$google_oauthV2 = new Google_Oauth2Service($gClient);
	$aauthUrl = $gClient->createAuthUrl();*/

	
	//fb login
	$authUrl =  $this->facebook->login_url();
                     ?>
                      <div class="login-with-social mt-2">
				
                   <span><?php echo $this->lang->line('or_login_through');?></span> 
				   
				 
				   <a href="<?php echo $google_login_url;?>"><img src="<?php echo IMGS_SYSTEM_DSN;?>sign-g.svg" alt="Login through Google" class="sc-icn" height="50"></a>
				   
				   <a href="<?php echo $authUrl;?>"><img src="<?php echo IMGS_SYSTEM_DSN;?>sign-f.svg" alt="Login through Facebook" class="sc-icn" height="50"></a>
				   
                </div>
                
                
                     <?php echo form_close(); ?>
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
               $.validator.addMethod("lettersonly",function(a,b){return this.optional(b)||/^[a-z ]+$/i.test(a)},"<?php echo $this->lang->line('valid_name');?>");

               $.validator.addMethod("phoneNumber", function(uid, element) {
                  return (this.optional(element) || uid.match(/^[- +()]*[0-9][- +()0-9]*$/));
               },"<?php echo $this->lang->line('valid_phone_number');?>");


               $.validator.addMethod("pwdmatch", function(repwd, element) {
                  var pwd= $('#password').val();
                  return (this.optional(element) || repwd==pwd);
               },"<?php echo $this->lang->line('valid_passwords');?>");
               
               //form validation rules
                    $("#register_form").validate({
                        rules: {
                            first_name: {
                                required: true,
                    lettersonly: true
                            },
                     email: {
                                required: true,
                    email: true
                            },
            phone:{
                  required: true,
                  phoneNumber: true,
                  rangelength: [9, 30]
            },
            password:{
                  required: true,
                  rangelength: [8, 30]
            },
            password_confirm:{
                  required: true,
                   pwdmatch: true
            }
                        },
                  
                  messages: {
                     first_name: {
                                required: "<?php echo $this->lang->line('first_name_valid');?>"
                            },
            email:{
                  required: "<?php echo $this->lang->line('email_valid');?>"
            },
            phone:{
                  required: "<?php echo $this->lang->line('phone_valid');?>"
            },
                     password: {
                                required: "<?php echo $this->lang->line('password_valid');?>"
                            },
            password_confirm:{
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


      <script type="text/javascript">
      $(document).ready(function() {
         $.colorbox({inline:true, href:".ajax"});
         
         });
      </script> 

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      

   </body>
</html>