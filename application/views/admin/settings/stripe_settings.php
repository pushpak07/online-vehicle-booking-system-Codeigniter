<div class="main-container nine-bmc bmc-remove">

   <div class="content">
    

      <div class="main-hed"> 
         <a href="<?php echo site_url();?>auth"><?php echo $this->lang->line('home');?></a>
         <?php if(isset($title)) echo " >> Master Settings >> ".$title;?>
      </div>

  <?php echo $this->session->flashdata('message'); ?>
  
      <div class="col-md-6">
         <div class="module">
            <div class="module-head">
               <h3><?php if(isset($title)) echo $title;?></h3>
            </div>
            
            
            <div class="module-body">
            
               <!---->
               
               
               <?php 
                  $attributes = array('name' => 'paypal_settings_form', 'id' => 'paypal_settings_form');
                  echo form_open_multipart(site_url().'settings/stripe_settings',$attributes);?>  

                  
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('stripe_key_test_public');?><?php echo required_symbol();?></label>    
                  
                  <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->stripe_key_test_public;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('stripe_key_test_public');
                    }
                    
                    $element = array('name'=>'stripe_key_test_public',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('stripe_key_test_public');
                    ?>
                 
               </div>
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('stripe_key_test_secret');?><?php echo required_symbol();?></label>    
                  
                  <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->stripe_key_test_secret;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('stripe_key_test_secret');
                    }
                    
                    $element = array('name'=>'stripe_key_test_secret',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('stripe_key_test_secret');
                    ?>
                 
               </div>
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('stripe_key_live_public');?><?php echo required_symbol();?></label>    
                  
                  <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->stripe_key_live_public;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('stripe_key_live_public');
                    }
                    
                    $element = array('name'=>'stripe_key_live_public',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('stripe_key_live_public');
                    ?>
                 
               </div>
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('stripe_key_live_secret');?><?php echo required_symbol();?></label>    
                  
                  <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->stripe_key_live_secret;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('stripe_key_live_secret');
                    }
                    
                    $element = array('name'=>'stripe_key_live_secret',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('stripe_key_live_secret');
                    ?>
                 
               </div>
               
               
               <div class="form-group">           
                  <label class="control-label"><?php echo $this->lang->line('currency');?><?php echo required_symbol();?></label>	
                  <?php 					 
                    $select = array();
                    if (isset($record->currency)) {
                     		$select = array($record->currency);
                     
                    }	
                    echo form_dropdown('currency',$currency_opts,$select,'class = "form-control chzn-select"');					?>   
               </div>
               
               
               <div class="form-group">           
                  <label class="control-label"><?php echo $this->lang->line('account_type');?><?php echo required_symbol();?></label>	
                  <?php 					 
                     $options = array(								
                     "TRUE"=>"sandbox",
                     "FALSE"=>"live"		
                     );						
                     
                     $select = array();
                     if(isset($record->stripe_test_mode)) {
                     	$select = array($record->stripe_test_mode);
                     
                     }	
                     echo form_dropdown('stripe_test_mode',$options,$select,'class = "form-control chzn-select"');				?>                 
               </div>
               
           
            <div class="form-group">
            
            <input type="hidden" value="<?php if(isset($record->id)) echo $record->id;?>"  name="update_record_id" />
            
            <input type="submit" value="Update" name="submit" />
            
            </div>
            
            <?php echo form_close();?>
               
               
            </div>
            
            
         </div>
      </div>
   </div>
</div>
<script type="text/javascript"> 
   (function($, W, D) {
     var JQUERY4U = {};
     JQUERY4U.UTIL = {
         setupFormValidation: function() {
             //form validation rules
             $("#paypal_settings_form").validate({
                 rules: {
                     stripe_key_test_public: {
                         required: true
                     },
                     stripe_key_test_secret: {
                         required: true
                     },
                     stripe_key_live_public: {
                         required: true
                     },
                     stripe_key_live_secret: {
                         required: true
                     },
                 },
                 messages: {
                     stripe_key_test_public: {
                         required: "<?php echo $this->lang->line('stripe_key_test_public');?>"
                     },
                     stripe_key_test_secret: {
                         required: "<?php echo $this->lang->line('stripe_key_test_secret');?>"
                     },
                     stripe_key_live_public: {
                         required: "<?php echo $this->lang->line('stripe_key_live_public');?>"
                     },
                     stripe_key_live_secret: {
                         required: "<?php echo $this->lang->line('stripe_key_live_secret');?>"
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