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
                  $attributes = array('name' => 'paypal_settings_form', 'id' => 'payu_settings_form');
                  echo form_open_multipart(site_url().'settings/payu_settings',$attributes);?>  

                  
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('test_merchant_key');?><?php echo required_symbol();?></label>    
                  
                  <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->test_merchant_key;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('test_merchant_key');
                    }
                    
                    $element = array('name'=>'test_merchant_key',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('test_merchant_key');
                    ?>
                 
               </div>
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('test_salt');?><?php echo required_symbol();?></label>    
                  
                  <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->test_salt;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('test_salt');
                    }
                    
                    $element = array('name'=>'test_salt',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('test_salt');
                    ?>
                 
               </div>
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('live_merchant_key');?><?php echo required_symbol();?></label>    
                  
                  <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->live_merchant_key;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('live_merchant_key');
                    }
                    
                    $element = array('name'=>'live_merchant_key',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('live_merchant_key');
                    ?>
                 
               </div>
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('live_salt');?><?php echo required_symbol();?></label>    
                  
                  <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->live_salt;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('live_salt');
                    }
                    
                    $element = array('name'=>'live_salt',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('live_salt');
                    ?>
                 
               </div>
               <div class="form-group">           
                  <label class="control-label"><?php echo $this->lang->line('mode');?><?php echo required_symbol();?></label>	
                  <?php 					 
                     $options = array(								
                     "test"=>"Test",
                     "live"=>"live"		
                     );						
                     
                     $select = array();
                     if(isset($record->mode)) {
                     	$select = array($record->mode);
                     
                     }	
                     echo form_dropdown('mode',$options,$select,'class = "form-control chzn-select"');				?>                 
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
             $("#payu_settings_form").validate({
                 rules: {
                     test_merchant_key: {
                         required: true
                     },
                     test_salt: {
                         required: true
                     },
                     live_merchant_key: {
                         required: true
                     },
                     live_salt: {
                         required: true
                     },
                 },
                 messages: {
                     test_merchant_key: {
                         required: "<?php echo $this->lang->line('test_merchant_key');?>"
                     },
                     test_salt: {
                         required: "<?php echo $this->lang->line('test_salt');?>"
                     },
                     live_merchant_key: {
                         required: "<?php echo $this->lang->line('live_merchant_key');?>"
                     },
                     live_salt: {
                         required: "<?php echo $this->lang->line('live_salt');?>"
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