<div class="main-container nine-bmc bmc-remove">

   <div class="content">

      <div class="main-hed">
         <a href="<?php echo site_url();?>auth"><?php echo $this->lang->line('home');?></a> >> 
         <a href="<?php echo site_url();?>coupons"><?php echo $this->lang->line('coupons');?></a> 
         <?php if(isset($title)) echo " >> ".$title;?>
      </div>

      <div class="col-md-6">

         <div class="module">
            <div class="module-head">
               <h3><?php if(isset($title)) echo $title;?></h3>
            </div>
            <?php 
               $attributes = array('name' => 'add_coupon_form', 'id' => 'add_coupon_form');
               echo form_open(site_url()."coupons/addedit",$attributes);?>
               
            <div class="module-body">
            
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('coupon_title');?><?php echo required_symbol();?></label>    
                  
                  <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->coupon_title;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('coupon_title');
                    }
                    
                    $element = array('name'=>'coupon_title',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('coupon_title');
                    ?>
                     
               </div> 
               
               
               
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('coupon_code');?><?php echo required_symbol();?></label>    
                  
                  <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->coupon_code;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('coupon_code');
                    }
                    
                    $element = array('name'=>'coupon_code',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('coupon_code');
                    ?>
                     
               </div> 
               
              
				<div class="form-group">                    
                  <label><?php echo $this->lang->line('discount_amount');?><?php echo required_symbol();?></label>    
                  
                  <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->discount_amount;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('discount_amount');
                    }
                    
                    $element = array('name'=>'discount_amount',
                    'value'=>$val,
                    'class'=>'form-control',
                    'placeholder'=>'Eg: 10.00');
                    echo form_input($element).form_error('discount_amount');
                    ?>
                     
               </div> 
               
				
                <div class="form-group">                    
                  <label><?php echo $this->lang->line('from');?><?php echo required_symbol();?></label>    
                  
                  <?php

                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->from_date;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('from_date');
                    }
                    
                    $element = array('name'=>'from_date',
                    'value'=>$val,
                    'class'=>'form-control',
                    'data-beatpicker'=>true

                   );
                    echo form_input($element).form_error('from_date');
                    
                    
                    ?>
                   
                     
               </div> 

               
                
				
                <div class="form-group">                    
                  <label><?php echo $this->lang->line('to');?><?php echo required_symbol();?></label>    
                  
                  <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->to_date;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('to_date');
                    }
                    
                    $element = array('name'=>'to_date',
                    'value'=>$val,
                    'class'=>'form-control',
                    'data-beatpicker'=>true);
                    echo form_input($element).form_error('to_date');
                    ?>
                     
               </div>
               
               
               <div class="form-group">                     
                  <label><?php echo $this->lang->line('status');?></label>											
                  <?php 					 
                    

                     $select = array();
                      if(isset($record->status)) {
                        	$select = array($record->status);
                        }	
                     echo form_dropdown('status',activeinactive(),$select,'class = "chzn-select"').form_error('status'); 	

                    ?>
               </div>
               
               
               
               <?php if ($this->config->item('site_settings')->sms_notification=='Yes') {?>
               <div class="form-group"> 
               
                <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" name="send_sms" value="Yes" class="form-check-input">
                      <?php echo $this->lang->line('send_sms_to_users');?>
                    </label>
                  </div>
  
                </div>
               <?php } ?>
                
                
               
               <div class="form-group"> 
               
               <?php 
                $value='';
                if(isset($record))
                {
                    $value = $record->coupon_id;
                }
                echo form_hidden('coupon_id',$value);?>
                        
               
               <button type="submit" name="addedit_coupon" value="addedit_coupon" class="btn btn-primary"><?php echo $this->lang->line('save');?></button>
               
               </div>
               
            </div>
            <?php echo form_close();?>                      
         </div>
      </div>
   </div>
</div>


<!--Validations-->
<script type="text/javascript"> 
   (function($, W, D) {
     var JQUERY4U = {};
     JQUERY4U.UTIL = {
         setupFormValidation: function() {
             //Additional Methods	

        $.validator.addMethod("amount", function(uid, element) {
		return (this.optional(element) || uid.match(/^\d{0,9}(\.\d{0,2})?$/));
		},"Please enter valid value.");
    
    
        $.validator.addMethod("proper_value", function(uid, element) {
                return (this.optional(element) || uid.match(/^((([0-9]*)[\.]([0-9]{2}))|([0-9]*))$/));
            }, "<?php echo $this->lang->line('valid_proper');?>");
        
             //form validation rules
             $("#add_coupon_form").validate({
                 ignore:"",
                 rules: {
                     coupon_title: {
                           required: true,
                           maxlength:100
                       },
					   coupon_code: {
                           required: true,
                           maxlength:20
                       },
                       discount_amount: {
                           required: true,
                           proper_value: true
					   },
					   from_date: {
						   required:true
					   },
					   to_date: {
						   required:true
					   }
                 },
                 messages: {
                     coupon_title: {
                           required: "<?php echo $this->lang->line('coupon_title_valid');?>"
							},
                     coupon_code: {
                       required: "<?php echo $this->lang->line('coupon_code_valid');?>"
                        },
                     discount_amount: {
                          required: "<?php echo $this->lang->line('discount_amount_valid');?>"
                      },
                     from_date: {
                          required: "<?php echo $this->lang->line('from_date_valid');?>"
                      },
                      to_date: {
                          required: "<?php echo $this->lang->line('to_date_valid');?>"
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