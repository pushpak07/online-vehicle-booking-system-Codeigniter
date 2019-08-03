</header>
<div class="container">
  <div class="section-margin">
    <div class="row">
      <div class="col-md-6">
	   <?php echo $this->session->flashdata('message'); ?>
        <div class="left-side-cont">
		
          <article class="content">
          
          
          
            <?php 
			  $attributes = array("name" => 'contact_form', 'id' => "contact_form");
			  echo form_open(site_url()."welcome/contactUs",$attributes); ?>
              
              
        <div class="col-md-6">
        
        
            <div class="fg form-group">
            
            <label> <?php echo $this->lang->line('name');?> <?php echo required_symbol();?> </label>
			
              <input type="text" name="name" placeholder="Name" value="<?php echo set_value('name'); ?>" class="form-control"><?php echo form_error('name'); ?>
              
              </div>
              
			  
              <div class="fg form-group">
              <label> <?php echo $this->lang->line('phone');?> / <?php echo $this->lang->line('mobile');?>: <?php echo required_symbol();?> </label>
              
              <input type="text" name="contact_no" maxlength="30" placeholder="Phone" value="<?php echo set_value('contact_no');?>" class="form-control"><?php echo form_error('contact_no');?>
              
              </div>
			  
          </div>
          
          
          <div class="col-md-6">   
          
          <div class="fg form-group">
          <label><?php echo $this->lang->line('email');?>: <?php echo required_symbol();?> </label>
              <input type="text"  name="email" placeholder="Email" value="<?php echo set_value('email');?>" class="form-control"><?php echo form_error('email');?>
              
          </div>
              
			  
              
             <div class="fg form-group">
             <label><?php echo $this->lang->line('booking_reference');?> : </label>
              <input type="text" class="form-control" name="booking_no" placeholder="Booking Reference No" value="<?php echo set_value('booking_no');?>">
              
              </div>
              
            </div>
			
		   
          <div class="col-md-12">    
          
          <div class="fg form-group">
          
          <label> <?php echo $this->lang->line('message');?> <?php echo required_symbol();?> </label>
          
            <textarea cols="5" rows="5" class="form-control" name="message" value="<?php echo set_value('booking_no');?>">
            </textarea><?php echo form_error('message');?> 
            
            </div>
            
            </div>
            
            

			
			<div class="col-md-12 padding">
				<input type="submit" name="submit" value="<?php echo $this->lang->line('submit');?>" class="cabs-btn btn btn-danger">
			</div>

		<?php echo form_close();?>	
          </article>
        </div>
      </div>
      
      
      <div class="col-md-6">
	  
		
        <div class="right-side-cont">
      <?php if($this->config->item('site_settings')->google_api_key!='' && $this->config->item('site_settings')->contact_map !='') {?>
          <div class="services con">
           <div class="right-side-hed ">
		   
  <?php echo $this->lang->line('map');?>
   </div>
    <script src="http://maps.googleapis.com/maps/api/js?key=<?php echo $this->config->item('site_settings')->google_api_key;?>&amp;libraries=places"></script>

    <div style="overflow:hidden;height:400px;width:600px;"><div id="gmap_canvas" style="height:500px;width:600px;"></div>
    <style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
    <a class="google-map-code" href="http://wordpress-themes.org" id="get-map-data">templates wordpress</a></div>

			<?php echo $site_settings->contact_map;?>
             
      </div>
      <?php } ?>
      
          <div class="services con">
           <div class="right-side-hed ">
  <?php echo $this->lang->line('address');?>
   </div>

    <strong><?php echo $this->config->item('site_settings')->design_by;?></strong><br>
	 <?php echo $this->config->item('site_settings')->address.", ".$this->config->item('site_settings')->city.", ".$this->config->item('site_settings')->state.", ".$this->config->item('site_settings')->country.", ".$this->config->item('site_settings')->zip;?>

          </div>
        </div>
		
	
		
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
		
		
		$.validator.addMethod("bookingrefno", function(uid, element) {
   			return (this.optional(element) || uid.match(/^\d{12}$/));
   		},"<?php echo $this->lang->line('valid_booking_no');?>");
   		
   		
   		//form validation rules
              $("#contact_form").validate({
                  rules: {
                      name: {
                          required: true,
						  lettersonly: true
                      },
   				contact_no: {
                          required: true,
						  phoneNumber: true,
						rangelength: [9, 30]
                      },
				email:{
					required: true,
					email: true
				},
				message:{
					required:true
				}
                  },
   			
   			messages: {
   				name: {
                          required: "<?php echo $this->lang->line('name_valid');?>"
                      },
   				contact_no: {
                          required: "<?php echo $this->lang->line('phone_valid');?>"
                      },
				email:{
					required: "<?php echo $this->lang->line('email_valid');?>"
				},
				message:{
					required: "<?php echo $this->lang->line('message_valid');?>"
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

<style>#gmap_canvas {
    width: 91.5% !important;
}</style>
