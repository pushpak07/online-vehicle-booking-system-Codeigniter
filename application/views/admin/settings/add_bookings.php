<div class="col-md-10 padding white right-p">
   <div class="content">
      <div class="main-hed">
         <a href="<?php echo site_url();?>auth"><?php echo $this->lang->line('home');?></a> 
         <?php if(isset($title)) echo " >> Bookings >> ".$title;?>
      </div>
      <div class="col-md-12 padding-p-l">
         <div class="module">
            <div class="module-head">
               <h3><?php if(isset($title)) echo $title;?></h3>
            </div>
            <?php 
               $attributes = array('name' => 'booking_settings_form', 'id' => 'booking_settings_form');
               echo form_open("settings/bookings/".$operation,$attributes) ?>
            <div class="module-body">
               <div class="col-md-6">
               
               
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('source');?></label>    
                     <input class="location" type="text" name="local_pick" id="local_pick" value="<?php echo set_value('local_pick');?>" placeholder="<?php echo $this->config->item('site_settings')->pick_point_placeholder;?>" class="form-control"/>
                    <?php echo form_error('local_pick');?>

                  </div>
                  
                  
                  
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('destination');?></label>    
                     <input class="location" type="text" name="local_drop" id="local_drop" alt="admin_booking" value="<?php echo set_value('local_drop');?>" placeholder="<?php  echo $this->config->item('site_settings')->drop_point_placeholder;?>" class="form-control"/> 
                    <?php echo form_error('local_drop');?>               </div>
                  
                  				  
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('distance');?></label>    
                     <input type="text" name="distance" id="distance" readonly  placeholder="<?php echo $this->lang->line('distance');?>" value="<?php echo set_value('distance');?>" class="form-control"/>
                    <?php echo form_error('distance');?> 

                    
                  </div>
                  
                  
                  <div class="form-group">
                     <div id="cars_data_list" class="scrooll" style="display:none;"> 
                     </div>
                  </div>
                  
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('pick_date');?></label>    
                     <input data-beatpicker="true" class="dte" type="text" value="<?php echo date($date_format,time()+86400);?>" name="pick_date" data-beatpicker-disable="{from:[<?php echo date('Y,n,j'); ?>],to:'<'}" data-beatpicker-format="['<?php echo $date_elem1;?>','<?php echo $date_elem2;?>','<?php echo $date_elem3;?>'],separator:'<?php echo $seperator;?>'" />
                     <?php echo form_error('pick_date');?>
                     
                  </div>
                  
                  
                  
                  
                  <div class="form-group">
                     <label> <?php echo $this->lang->line('pick_time');?> </label>
                     <input type="text"  id="timepicker1" value="<?php echo date('h : i : A');echo set_value('time_picker');?>" name="time_picker" />
                      <?php echo form_error('time_picker');?>
                  </div>
                  
                 
               </div>
               <div class="col-md-6">
                  <input type="hidden" name="payment_mode" value="cash">
                  <div class="form-group">
                     <label><?php echo $this->lang->line('status');?></label>
                     <?php 
                        $payment_opts = array(	
                        					"pending" => "Pending"
                        					
                        				  );
                        
                        
                        echo form_dropdown('status',$payment_opts,'','class = "chzn-select"');?>
                  </div>
                  
                  
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('name');?></label>    
                     <input type="text" name="customer_name" placeholder="<?php echo $this->lang->line('customer_name');?>" value="<?php echo set_value('customer_name');?>" class="form-control"/>    
                  </div>
                  <?php echo form_error('customer_name');?>

				  
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('phone');?></label>    
                     <input type="text" name="customer_phone" maxlength="30" placeholder="<?php echo $this->lang->line('customer_phone');?>" value="<?php echo set_value('customer_phone');?>" class="form-control"/>    
                  </div>
                  <?php echo form_error('customer_phone');?>

                  
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('email');?></label>    
                     <input type="text" name="customer_email" placeholder="<?php echo $this->lang->line('customer_email');?>" value="<?php echo set_value('customer_email');?>" class="form-control" />    
                  </div>
                  <?php echo form_error('customer_email');?>
                  
                  
                  <div class="form-group" style="display:none;" id="waitnreturn">
                     <input type="checkbox" name="return_journey" id="return_journey"/> <?php echo $this->lang->line('return_journey');?>
                  </div>
                  
                  <div class="form-group" style="display:none;" id="waiting_time_div" >
                     <label> <?php echo $this->lang->line('waiting_time');?> </label>
                     <?php echo form_dropdown('waiting_time',$waiting_options,'','class = "chzn-select" id="waiting_time" ');?>
                     
                     
                     <input type="hidden" name="waitingTime" id="waitingTime">
                     <input type="hidden" name="waitingCost" id="waitingCost">
                  </div>
                  
                  <input type="hidden" name="car_cost" id="car_cost" value="0.00"/>
                  <input type="hidden" name="booking_ref" value="<?php echo date('ymdHis'); ?>"/>
                  
                  
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('cost')." (".$this->config->item('site_settings')->currency_symbol.")";?></label>    
                     <input type="text" name="total_cost" id="total_cost" readonly placeholder="<?php echo $this->lang->line('cost');?>" value="<?php echo set_value('total_cost');?>" class="form-control"/>    
                  </div>
                  <?php echo form_error('total_cost');?>	
                  
                  
                  <div id="dummy" >
                  </div>
                  <div class="form-group">         <?php 
                     if($operation == "Add" ) {?>
                     <input type="submit" value="Book" name="submit" />
                     <?php } else { ?>
                     <input type="hidden" value="<?php echo $airport_rec->id?>" name="update_rec_id">
                     <input type="submit" value="<?php echo $this->lang->line('update');?>" name="submit" />
                     <?php } ?>     
                  </div>
				   <input type="hidden" name="no_repeat" id="no_repeat" value="1"/>
               </div>
            </div>
            <?php echo form_close();?>                      
         </div>
      </div>
   </div>
</div>
<!--	Validations	-->
<script type="text/javascript"> 

$(document).ready(function() {

	$('.location').click(function () {
			$('#no_repeat').val('1');
		 });

});


   (function($, W, D) {
    var JQUERY4U = {};
    JQUERY4U.UTIL = {
        setupFormValidation: function() {
            //Additional Methods			
            $.validator.addMethod("phoneNumber", function(uid, element) {
                return (this.optional(element) || uid.match(/^[- +()]*[0-9][- +()0-9]*$/));
            }, "<?php echo $this->lang->line('valid_phone_number');?>");
            $.validator.addMethod("lettersonly", function(a, b) {
                return this.optional(b) || /^[a-z ]+$/i.test(a)
            }, "<?php echo $this->lang->line('valid_name');?>");
            $.validator.addMethod("numbersonly", function(a, b) {
                return this.optional(b) || /^[0-9 ]+$/i.test(a)
            }, "<?php echo $this->lang->line('valid_number');?>");
            //form validation rules
            $("#booking_settings_form").validate({
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
                    radiog_dark: {
                        required: true
                    },
                    customer_name: {
                        required: true,
                        lettersonly: true
                    },
                    customer_phone: {
                        required: true,
                        phoneNumber: true,
                        rangelength: [9, 30]
                    },
                    customer_email: {
                        email: true
                    },
                    total_cost: {
                        required: true
                    }
                },
                messages: {
                    pick_date: {
                        required: "<?php echo $this->lang->line('pick_date_valid');?>"
                    },
                    time_picker: {
                        required: "<?php echo $this->lang->line('pick_time_valid');?>"
                    },
                    local_pick: {
                        required: "<?php echo $this->lang->line('source_valid');?>"
                    },
                    local_drop: {
                        required: "<?php echo $this->lang->line('destination_valid');?>"
                    },
                    radiog_dark: {
                        required: "<?php echo $this->lang->line('car_valid');?>"
                    },
                    customer_name: {
                        required: "<?php echo $this->lang->line('name_valid');?>"
                    },
                    customer_phone: {
                        required: "<?php echo $this->lang->line('phone_valid');?>"
                    },
                    total_cost: {
                        required: "<?php echo $this->lang->line('cost_valid');?>"
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