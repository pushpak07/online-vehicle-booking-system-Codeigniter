<!DOCTYPE html>
<html>
   <head>
     <title><?php if(isset($site_settings->site_title) && $site_settings->site_title != "") 
		  echo $site_settings->site_title;
		else echo "Vehicle Booking System";?></title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="apple-mobile-web-app-capable" content="yes" />
      <meta name="description" content="">
      <meta name="keywords" content="admin, bootstrap,admin template, bootstrap admin, simple, awesome">
      <meta name="author" content="">
      <link href="<?php echo base_url();?>assets/system_design/css/styles.css" rel="stylesheet">
      <script type="text/javascript" src="<?php echo base_url();?>assets/system_design/scripts/jquery.min.js"></script>
      <script src="<?php echo base_url();?>/assets/system_design/form_validation/js/jquery.validate.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>/assets/system_design/form_validation/js/additional-methods.min.js" type="text/javascript"></script>
      <script type="text/javascript"> 
         (function($,W,D)
         {
            var JQUERY4U = {};
         
            JQUERY4U.UTIL =
            {
                setupFormValidation: function()
                {	
         		
         //form validation rules
                    $("#login_form").validate({
                        rules: {
                            identity: {
                                required: true
                            },
         				password: {
                                required: true
                            }
                        },
         			
         			messages: {
         				identity: {
                                required: "<?php echo $this->lang->line('user_name_valid');?>"
                            },
         				password: {
                                required: "<?php echo $this->lang->line('password_valid');?>"
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
   </head>
   <style> 
      html, body{
      background: #121e31;
      background-size:cover;
      width: 100%;
      height: 100%; background-repeat:no-repeat; background-attachment:local;
      }
      .yellow-the{   
      float: left;
      font-size: 90px;
      padding-top: 35px;
      text-align: center;
      margin:100px 0 0 150px; transition: all ease 1s;}
      .yellow-the:hover{ opacity:0.5; transition: all ease 1s; }
      .red-theme { float:left;     font-size: 90px;
      height: 175px;
      transition: all ease 1s;     padding-top: 35px;
      text-align: center;  margin:100px 0 0 0px}
      .red-theme:hover{opacity:0.5; transition: all ease 1s; }
      .yellow-the i{ color:#fcc000;}
      .red-theme i{color:#9f2525;}
      .hed {
      color: yellow;
      float: left;
      font-size: 18px;
      font-weight: bold;
      padding: 10px;
      text-align: center;
      width: 100%;
      }
      .sh {
      background: none repeat scroll 0 0 rgba(0, 0, 0, 0.2);
      color: #ffffff;
      font-size: 22px;
      font-weight: bold;
      margin: 0 auto !important;
      max-width: 350px;
      padding: 10px; 
      position: relative;
      text-align: center;
      width: 100%;
      }
   </style>
   <body>
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="sh"> <i class="fa fa-check-square"></i> <?php echo $this->lang->line('select_your_theme');?></div>
            </div>
            <div class="col-md-6">
               <a href="#">
                  <div class="yellow-the">
                     <img src="<?php echo base_url();?>/assets/system_design/images/yellow-theme.jpg"/> 
                     <div class="hed"> <?php echo $this->lang->line('yellow_theme');?> </div>
                  </div>
               </a>
            </div>
            <div class="col-md-6">
               <a href="#">
                  <div class="red-theme">
                     <img src="<?php echo base_url();?>/assets/system_design/images/red-theme.jpg"/> 
                     <div class="hed" style="color:#a12726;"> <?php echo $this->lang->line('red_theme');?> </div>
                  </div>
               </a>
            </div>
         </div>
      </div>
      <script type="text/javascript">$(document).ready(function(){
         $.colorbox({inline:true, href:".ajax"});
         
         });
      </script> 
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="<?php echo base_url(); ?>assets/system_design/scripts/bootstrap.min.js"></script>
   </body>
</html>