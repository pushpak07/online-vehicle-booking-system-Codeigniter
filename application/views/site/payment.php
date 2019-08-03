</header>
<div class="container">
   <div class="section-margin">
      <div class="row">
         <div class="col-md-9">
            <div class="left-side-cont">
               <div class="col-md-12 padding-p-0">
                  <div class="bcp">
                     <div class="business-us journey-details">
                        <div class="busi-cercle active"> 
                        </div>
                        <center><?php echo $this->lang->line('journey_details');?></center>
                     </div>
                     <div class="business-us passenger-details">
                        <div class="busi-cercle active"> 
                        </div>
                        <center> <?php echo $this->lang->line('passengers_details');?> </center>
                     </div>
                     <div class="business-us payment-details">
                        <div class="busi-cercle active current"> 
                        </div>
                        <center> <?php echo $this->lang->line('booking_confirmation');?> </center>
                     </div>
                  </div>
                  <div class="online">
                     <!-- Tab panes -->
                     <?php 
                        echo form_open(site_url().'welcome/paymentConfirmation'); ?>
                        
                     <ul role="tablist" class="nav nav-tabs on-bo-he  payement">
                        <li class="pay"> <?php echo $this->lang->line('payment');?></li>
                        <li>
                           <?php if ($this->config->item('site_settings')->credit=="1") {?>
                           <input type="radio"  value="cc" name="radiog_dark" id="radio3" class="css-checkbox css-label" />
                           <label for="radio3" class="css-label"><?php echo $this->lang->line('credit_card');?></label><?php }
                              else{
                              	
                              }?>
                        </li>
                        <li>
                           <?php if ($this->config->item('site_settings')->paypal=="1") {?>
                           <input type="radio" name="radiog_dark" value="paypal" id="radio4" class="css-checkbox css-label" />
                           <label for="radio4" class="css-label"><?php echo $this->lang->line('paypal');?></label><?php }
                              else{
                              	
                              }?>
                        </li>
                        <li>
                           <?php if ($this->config->item('site_settings')->stripe=="1") {?>
                           <input type="radio"  name="radiog_dark" checked="" value="stripe" id="radio7" class="css-checkbox css-label" />
                           <label for="radio7" class="css-label"><?php echo $this->lang->line('stripe');?></label>
                           <?php } ?>
                        </li>
                        <li>
                           <?php if ($this->config->item('site_settings')->payu=="1") {?>
                           <input type="radio"  name="radiog_dark" checked="" value="payu" id="radio9" class="css-checkbox css-label" />
                           <label for="radio9" class="css-label"><?php echo $this->lang->line('payu');?></label>
                           <?php } ?>
                        </li>

                        <li>
                           <?php if ($this->config->item('site_settings')->cash=="1") {?>
                           <input type="radio"  name="radiog_dark" checked="" value="cash" id="radio5" class="css-checkbox css-label" />
                           <label for="radio5" class="css-label"><?php echo $this->lang->line('cash');?></label><?php }
                              else {
                              	
                              }?>
                        </li>

                     </ul>
                     
                   
                     
                       <!--COUPON-->
                     <div class="col-md-5">
                     <div class="pad30">
                      <p> <?php echo $this->lang->line('apply_coupon');?> </p>
                     
                     <div class="coupon-box">
                      <div class="row">
                        <div class="col-sm-9"><input type="text" name="cpn_code" id="cpn_code" class="form-control"></div>
                        <div class="col-sm-3"><button type="button" id="cpn_btn" class="coupon-btn">Apply</button></div>
                      </div>
                     </div>
                     </div>
                     
                     </div>
                    <!--COUPON-->
                    
                     
                     
                     <div class="col-md-12">


                        <div class="payments" id="credit_card" style="display: none;">
                           <p> <?php echo $this->lang->line('pay_with_credit_card');?> </p>
                           <img src="<?php echo IMGS_SYSTEM_DSN;?>mastercard.png"/>
                        </div>
                        <div class="payments" id="paypal" style="display: none;">
                           <p><?php echo $this->lang->line('pay_with_paypal');?> </p>
                           <img src="<?php echo IMGS_SYSTEM_DSN;?>paypal.jpg"/>
                        </div>
                        <div class="payments" id="cash" >
                           <p> <?php echo $this->lang->line('pay_with_cash');?> </p>
                           <img src="<?php echo IMGS_SYSTEM_DSN;?>mastercard.png"/>
                        </div>
                        <div class="payments" id="payu" style="display: none;">
                           <p> <?php echo $this->lang->line('pay_with_payu');?> </p>
                           <img src="<?php echo IMGS_SYSTEM_DSN;?>payumoney_logo.png"/>
                        </div>
                        

                        <div class="payments" id="stripe" style="display: none;">
                          <div class="pad30 text-left" style="padding-bottom: 0">
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="fg"><label><?php echo $this->lang->line('card_number');?> </label>
                            <input class="form-control" type="text"  id="card_number" maxlength="16" name="card_number">
                              <!-- <input type="text" value="" name="username" placeholder="" class="form-control"> -->
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
                              <label> <?php echo $this->lang->line('exp_month');?> </label>
                              <input class="form-control" type="text"   id="exp_month" maxlength="2" name="exp_month" />
                              
                           </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="fg">
                              <label> <?php echo $this->lang->line('exp_year');?> </label>
                             <input class="form-control" type="text"   id="exp_year" maxlength="4" name="exp_year" />       
                           </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="fg">
                              <label> <?php echo $this->lang->line('cvv');?> </label>
                             <input class="form-control" type="text"   id="cvv" maxlength="3" name="cvv" />       
                           </div>
                            </div>
                          </div>
                          </div>

                          <div class="col-md-12">
                        <div class="pass-login-dv">
                           
                           
                           
                           
                           
                        </div>
                     </div>
                           
                        </div>
                        
                       
                      <!--   <div class="down-btn">
                           <div class="btn btn-default prev">
                              <a href="<?php echo site_url();?>welcome/passengerDetails"> <i class="fa fa-arrow-circle-o-left"></i><?php echo $this->lang->line('back_to_your_details');?> </a>
                           </div>
                           <button type="submit" class="naxt"><?php echo $this->lang->line('continue');?><i class="fa fa-arrow-circle-o-right"></i> </button>
                        </div> -->
            <div class="clearfix float-btns" >
                  <a class="btn btn-info btn-left" href="<?php echo site_url();?>welcome/passengerDetails"> &nbsp; <i class="fa fa-angle-left"></i> <?php echo $this->lang->line('back_to_your_details');?> </a>
              <button type="submit" class="btn btn-danger btn-right"><?php echo $this->lang->line('continue');?> &nbsp; <i class="fa fa-angle-right"></i> </button>
            </div>

                     </div>


                     


                     <?php echo form_close(); ?>
                  </div>
               </div>
            </div>
         </div>
         
         
          <!---SUMMARY CONTENT-->
         <div id="summary_content">
         </div>
         
         
         
      </div>
   </div>
</div>    



<script src="<?php echo JS_BOOTSTRAP_MIN;?>"></script>

<!--script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script-->

<script src='<?php echo SYSTEM_DSN;?>jquery-1.11.1.min'></script>


<script>
   $(document).ready(function(){
     $("#radio3").click(function(){
   			document.getElementById("paypal").style.display ='none';
   			document.getElementById("cash").style.display = 'none';
   			document.getElementById("credit_card").style.display = 'block';
        document.getElementById("stripe").style.display = 'none';
        document.getElementById("payu").style.display = 'none';
     });
     
      $("#radio4").click(function(){
   			document.getElementById("paypal").style.display ='block';
   			document.getElementById("cash").style.display = 'none';
   			document.getElementById("credit_card").style.display = 'none';
        document.getElementById("stripe").style.display = 'none';
        document.getElementById("payu").style.display = 'none';
     });
     
      $("#radio5").click(function(){
   			document.getElementById("paypal").style.display ='none';
   			document.getElementById("cash").style.display = 'block';
   			document.getElementById("credit_card").style.display = 'none';
        document.getElementById("stripe").style.display = 'none';
        document.getElementById("payu").style.display = 'none';
     });
      $("#radio7").click(function(){
        document.getElementById("paypal").style.display ='none';
        document.getElementById("cash").style.display = 'none';
        document.getElementById("stripe").style.display = 'block';
        document.getElementById("credit_card").style.display = 'none';
        document.getElementById("payu").style.display = 'none';
     });
      $("#radio9").click(function(){
        document.getElementById("paypal").style.display ='none';
        document.getElementById("cash").style.display = 'none';
        document.getElementById("stripe").style.display = 'none';
        document.getElementById("credit_card").style.display = 'none';
        document.getElementById("payu").style.display = 'block';
     });
   });
</script>





<script>
$("#cpn_btn").button().click(function(){
    
    var cpn_code = $("#cpn_code").val();
    if (cpn_code!='') {
        
        $.ajax({			 
			 type: 'POST',			  
			 async: false,
			 cache: false,	
			 url: "<?php echo site_url();?>welcome/apply_coupon",
			 data: '<?php echo $this->security->get_csrf_token_name();?>=<?php echo $this->security->get_csrf_hash();?>&cpn_code='+cpn_code,
			 success: function(data) 
			 {
				if (data==1) {
                    
					summary_content();
                    
                    checkNotify('','Coupon Applied','success');
                    
				} else if (data==0) {
                    
                    checkNotify('','Coupon not valid','error');
                    
                } else if (data==99) {
                    
                    checkNotify('','Coupon already applied','error');
                }
                else if (data==999) {
                    
					window.location = '<?php echo SITEURL;?>';
				} 
				
                
			 }		  		
		});
    }
        
});  

$( document ).ready(function() {
    
   summary_content();
    
});

function summary_content() {
    
    $("#summary_content").html('<img src="<?php echo IMGS_SYSTEM_DSN;?>bx_loader.gif" alt="Loader" align="middle">');
    
    $.ajax({			 
			 type: 'POST',			  
			 async: false,
			 cache: false,	
			 url: "<?php echo site_url();?>welcome/payment_summary_content",
			 data: '<?php echo $this->security->get_csrf_token_name();?>=<?php echo $this->security->get_csrf_hash();?>',
			 success: function(data) 
			 {
				$("#summary_content").html(data);
			 }		  		
    });
}
</script>