<div class="main-container nine-bmc bmc-remove">

   <div class="content">
      <?php echo $this->session->flashdata('message'); ?>
      <div class="main-hed"> 
         <a href="<?php echo site_url();?>auth"><?php echo $this->lang->line('home');?></a>
         <?php if(isset($title)) echo " >> Master Settings >> ".$title;?>
      </div>

      <div class="col-md-6">
         <div class="module">
            <div class="module-head">
               <h3><?php if(isset($title)) echo $title;?></h3>
            </div>
            
            
            <div class="module-body">
            
               <!---->
               
               
               <?php 
                  $attributes = array('name' => 'paypal_settings_form', 'id' => 'paypal_settings_form');
                  echo form_open_multipart(site_url().'settings/paypal_settings',$attributes);?>  

                  
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('paypal_email');?><?php echo required_symbol();?></label>    
                  
                  <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->paypal_email;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('paypalemail');
                    }
                    
                    $element = array('name'=>'paypalemail',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('paypalemail');
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
                     "sandbox"=>"sandbox",
                     "live"=>"live"		
                     );						
                     
                     $select = array();
                     if(isset($record->account_type)) {
                     	$select = array($record->account_type);
                     
                     }	
                     echo form_dropdown('account_type',$options,$select,'class = "form-control chzn-select"');				?>                 
               </div>
               
            
               
              
			   
			   
               
			   <div class="form-group">
                <label> <?php echo $this->lang->line('logo_image'); ?> 
                (<small><strong><?php echo ALLOWED_TYPES;?></strong></small>) 
                </label>
                <input name="userfile" type="file" id="image" title="<?php echo $this->lang->line('logo_image');?>" onchange="photo(this,'logo_image')">
					<br/>
                <?php 
                $src = "";
                $style="display:none;";
                    
                if(isset($record->logo_image) && $record->logo_image != ""&& file_exists(PAYPAL_LOGO_IMG_UPLOAD_PATH_URL.$record->logo_image) ) {
                    
                $src = PAYPAL_LOGO_IMG_PATH.$record->logo_image;
                $style="";
                            
                }
                ?>
                <img class="img-responsive vehicle-img" id="logo_image" src="<?php echo $src;?>" height="120" style="<?php echo $style;?>" />     
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
                     paypalemail: {
                         required: true,
                         email: true
                     }
                 },
                 messages: {
                     paypalemail: {
                         required: "<?php echo $this->lang->line('paypal_email_valid');?>"
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