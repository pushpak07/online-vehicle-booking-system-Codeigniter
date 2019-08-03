<div class="col-md-10 padding white right-p">
   <div class="content">
      <?php echo $this->session->flashdata('message'); ?>
      <div class="col-md-6 padding-p-l">
         <div class="module">
            <div class="module-head">
               <h3><?php echo $title;?></h3>
            </div>
            <?php 
               $attributes = array('name' => 'today_booking_settings_form', 'id' => 'today_booking_settings_form');
               echo form_open("settings/todayBookings/".$operation,$attributes) ?>
            <div class="module-body">
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('pick_date');?></label>    
                  <input type="text" name="pick_date" data-beatpicker="true" placeholder="Pickup Date"/>    
               </div>
               <div class="form-group">
                  <label> <?php echo $this->lang->line('pick_time');?> </label>
                  <input type="text"  id="timepicker1" name="time_picker"/>
               </div>
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('source');?></label>    
                  <input class="location" type="text" name="local_pick" id="local_pick" />    
               </div>
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('destination');?></label>    
                  <input class="location" type="text" name="local_drop" id="local_drop" />    
               </div>
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('distance');?></label>    
                  <input type="text" name="distance" id="distance"  readonly  placeholder="Distance"/>    
               </div>
               <div class="form-group" id="cars_data_list">
               </div>
               <?php if($waiting_time_status->waiting_time == "enable") { ?>
               <div class="form-group">
                  <label> <?php echo $this->lang->line('waiting')." ".$this->lang->line('time');?> </label>
                  <?php echo form_dropdown('waiting_time',$waiting_options,'','class = "chzn-select"');?>
               </div>
               <?php } ?>
               <div class="form-group">
                  <label> <?php echo $this->lang->line('payment');?> </label>
                  <?php 
                     $payment_opts = array(
                     					"cash" => "Cash" 
                     				  );
                     
                     
                     echo form_dropdown('payment_mode',$payment_opts,'','class = "chzn-select"');?>
               </div>
               <div class="form-group">
                  <label><?php echo $this->lang->line('status');?> </label>
                  <?php 
                     $payment_opts = array(
                     					"confirm" => "Confirm",
                     					"pending" => "Pending"
                     				  );
                     
                     
                     echo form_dropdown('status',$payment_opts,'','class = "chzn-select"');?>
               </div>
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('name');?></label>    
                  <input type="text" name="customer_name" placeholder="Customer Name" />    
               </div>
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('phone');?></label>    
                  <input type="text" name="customer_phone" maxlength="30" placeholder="Customer Phone" />    
               </div>
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('email');?></label>    
                  <input type="text" name="customer_email" placeholder="Customer Email" />    
               </div>
               <input type="submit" value="<?php echo $this->lang->line('book');?>" name="submit" />
            </div>
            <?php echo form_close();?>                      
         </div>
      </div>
   </div>
</div>
<!--	Validations	-->
<script type="text/javascript"> 
   (function($, W, D) {
      var JQUERY4U = {};
      JQUERY4U.UTIL = {
          setupFormValidation: function() {
              //Additional Methods			
              $.validator.addMethod("phoneNumber", function(uid, element) {
                  return (this.optional(element) || uid.match(/^[- +()]*[0-9][- +()0-9]*$/));
              }, "Please enter a valid number.");
              $.validator.addMethod("lettersonly", function(a, b) {
                  return this.optional(b) || /^[a-z ]+$/i.test(a)
              }, "Please enter valid name.");
              $.validator.addMethod("numbersonly", function(a, b) {
                  return this.optional(b) || /^[0-9 ]+$/i.test(a)
              }, "Please enter numbers only.");
              //form validation rules
              $("#today_booking_settings_form").validate({
                  rules: {
                      pick_date: {
                          required: true
                      },
                      time_picker: {
                          required: true
                      },
                      local_pick: {
                          required: true
                      },
                      local_drop: {
                          required: true
                      },
                      customer_name: {
                          required: true,
                          lettersonly: true
                      },
                      customer_phone: {
                          phoneNumber: true,
                          rangelength: [9, 30]
                      },
                      customer_email: {
                          email: true
                      },
                  },
                  messages: {
                      pick_date: {
                          required: "Pick date required."
                      },
                      time_picker: {
                          required: "Pick up time required."
                      },
                      local_pick: {
                          required: "Source required."
                      },
                      local_drop: {
                          required: "Destination required."
                      },
                      customer_name: {
                          required: "Customer name  required."
                      },
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