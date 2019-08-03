</header>
<div class="container">
   <div class="section-margin">
      <div class="row">
         <div class="col-md-9">
            <div class="left-side-cont">
            
               <?php 
                $attributes = array('name' => 'passenger_details_form', 'id' => 'passenger_details_form');
                echo form_open(site_url()."welcome/payment",$attributes); ?>
                  
               <div class="col-md-12 padding-p-0">
                  <div class="bcp">
                     <div class="business-us journey-details">
                        <div class="busi-cercle active"> 
                        </div>
                        <center> <?php echo $this->lang->line('journey_details');?></center>
                     </div>
                     <div class="business-us passenger-details">
                        <div class="busi-cercle active current"> 
                        </div>
                        <center> <?php echo $this->lang->line('passenger_details');?> </center>
                     </div>
                     <div class="business-us payment-details">
                        <div class="busi-cercle"> 
                        </div>
                        <center><?php echo $this->lang->line('payment_details');?></center>
                     </div>
                  </div>
                  <div class="online">
                     <!-- Tab panes -->
                     <ul role="tablist" class="nav nav-tabs on-bo-he  on-bo-login">
                        <li>
                           <?php echo $this->lang->line('passengers_details');?>
                        </li>
                     </ul>
<div class="pad30">
                     <div class="row">
                        <div class="col-sm-6">
<div class="fg"><label><?php echo $this->lang->line('name');?> </label>
                              <input type="text" value="<?php if(isset($user['username'])) echo $user['username']; ?>" name="username" placeholder="" class="form-control">
                           </div>
                        </div>
                        <div class="col-sm-6">
<div class="fg">
                              <label> <?php echo $this->lang->line('email');?> </label>
                              <input type="text"  value="<?php if(isset($user['email'])) echo $user['email']; ?>" name="email" class="form-control">
                           </div>
                        </div>
                        <div class="col-sm-6">
<div class="fg">
                              <label> <?php echo $this->lang->line('phone_number');?> </label>
                              <input type="text"  maxlength="30" value="<?php if(isset($user['phone'])) echo $user['phone']; ?>" name="phone" class="form-control">
                           </div>
                        </div>
                        <div class="col-sm-6">
<div class="fg">
                              <label> <?php echo $this->lang->line('information_to_driver');?> </label>
                              <textarea name="information" class="form-control"><?php if(isset($user['information'])) echo $user['information']; ?></textarea>            
                           </div>
                        </div>
                     </div>

                     </div>
                  </div>
               </div>
               <div class="clearfix float-btns" >
                  <a class="btn btn-info btn-left" href="<?php echo site_url();?>welcome/onlineBooking"> &nbsp; <i class="fa fa-angle-left"></i> <?php echo $this->lang->line('back_to_journey_details');?>  </a>
              <button type="submit" class="btn btn-danger btn-right"><?php echo $this->lang->line('next_payment_details');?> &nbsp; <i class="fa fa-angle-right"></i> </button>
            </div>
               <?php echo form_close(); ?>



            </div>
         </div>
         
         
         
         
         <!---SUMMARY CONTENT-->
         <div id="passenger_summary_content">
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
   		},"<?php echo $this->lang->line('valid_phone_number');?>");
   
   		
   		//form validation rules
              $("#passenger_details_form").validate({
                  rules: {
                      username: {
                          required: true,
   			  lettersonly: true
                          
                      },
   				phone: {
                          required: true,
   			  phoneNumber:true,
   			  rangelength: [9,30]
                          
                      },
                      		email: {
                      	  required: true,
                      	  email: true	
                      }
                  },
   			
   			messages: {
   				username: {
                          required: "<?php echo $this->lang->line('name_valid');?>"
                      },
   				phone: {
                          required: "<?php echo $this->lang->line('phone_valid');?>"
                      },
                      		email: {
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
   
   
$( document ).ready(function() {
    
   summary_content();
    
});

function summary_content() {
    
    $("#passenger_summary_content").html('<img src="<?php echo IMGS_SYSTEM_DSN;?>bx_loader.gif" alt="Loader" align="middle">');
    
    $.ajax({			 
			 type: 'POST',			  
			 async: false,
			 cache: false,	
			 url: "<?php echo site_url();?>welcome/passenger_summary_content",
			 data: '<?php echo $this->security->get_csrf_token_name();?>=<?php echo $this->security->get_csrf_hash();?>',
			 success: function(data) 
			 {
				$("#passenger_summary_content").html(data);
			 }		  		
    });
}   
</script>