<div class="main-container nine-bmc bmc-remove">

   <div class="content">
      

        <div class="main-hed"> 
         <a href="<?php echo site_url();?>auth"><?php echo $this->lang->line('home');?></a>
         <?php if(isset($title)) echo " >> Master Settings >> ".$title;?>
      </div>

    <?php echo $this->session->flashdata('message'); ?>

      <div class="col-md-12">



         <div class="module">
            <div class="module-head">
               <h3> <?php if(isset($title)) echo $title;?></h3>
            </div>
            
            
            <?php 
                  $attributes = array('name' => 'site_settings_form', 'id' => 'site_settings_form');
                  echo form_open_multipart(site_url().'settings/site_settings',$attributes);?>   
            <div class="module-body">
            
               

                  
               <div class="col-md-6">
               
               
			    <div class="form-group">                    
                     <label><?php echo $this->lang->line('site_title');?><?php echo required_symbol();?></label>    
                     
                     <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->site_title;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('site_title');
                    }
                    
                    $element = array('name'=>'site_title',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('site_title');
                    ?>
                    
                  </div>
                  
                  
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('site_url');?><?php echo required_symbol();?></label>    
                    
                    <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->site_name;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('sitename');
                    }
                    
                    $element = array('name'=>'sitename',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('sitename');
                    ?>
                    
                  </div>
                  
                  
                  <div class="form-group">       
                     <label><?php echo $this->lang->line('address');?><?php echo required_symbol();?></label>				
                     
                      <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->address;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('address');
                    }
                    
                    $element = array('name'=>'address',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('address');
                    ?>
                  </div>
                  
                  
                  
                  
                  <div class="form-group">      
                     <label><?php echo $this->lang->line('city');?><?php echo required_symbol();?></label>					  
                     
                     <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->city;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('city');
                    }
                    
                    $element = array('name'=>'city',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('city');
                    ?>
                  </div>
                  
                  
                  <div class="form-group">     
                     <label><?php echo $this->lang->line('state');?><?php echo required_symbol();?></label>		
                    
                    <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->state;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('state');
                    }
                    
                    $element = array('name'=>'state',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('state');
                    ?>                     
                  </div>
                  
                  
                  
                  <div class="form-group">        
                     <label><?php echo $this->lang->line('country');?><?php echo required_symbol();?></label>					
                     
                    <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->country;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('country');
                    }
                    
                    $element = array('name'=>'country',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('country');
                    ?>   
                  </div>
                  
                  
                  <div class="form-group">             
                     <label><?php echo $this->lang->line('zip_code');?><?php echo required_symbol();?></label>			
                    
                     <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->zip;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('zip');
                    }
                    
                    $element = array('name'=>'zip',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('zip');
                    ?> 
                  </div>
                  
                  
                  
                  <div class="form-group">   
                     <label><?php echo $this->lang->line('phone');?><?php echo required_symbol();?></label>				
                    
                      <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->phone;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('phone');
                    }
                    
                    $element = array('name'=>'phone',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('phone');
                    ?> 
                  </div>
                  
                  
                  
                  <div class="form-group">   
                     <label><?php echo $this->lang->line('land_line');?><?php echo required_symbol();?></label>				
                     
                      <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->land_line;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('land_line');
                    }
                    
                    $element = array('name'=>'land_line',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('land_line');
                    ?> 
                  </div>
                  
                  
                  
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('fax');?></label>
                     <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->fax;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('fax');
                    }
                    
                    $element = array('name'=>'fax',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('fax');
                    ?> 
                  </div>
                  
                  
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('contact_email');?><?php echo required_symbol();?></label>					 
                     
                     <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->portal_email;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('portal_email');
                    }
                    
                    $element = array('name'=>'portal_email',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('portal_email');
                    ?> 
                     
                  </div>


                   <div class="form-group">                    
                     <label><?php echo $this->lang->line('country_code');?><?php echo required_symbol();?></label>          
                     
                     <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->country_code;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('country_code');
                    }
                    
                    $element = array('name'=>'country_code',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('country_code');
                    ?> 
                     
                  </div>
                  
                  

                  <div class="form-group">           
                     <label><?php echo $this->lang->line('site_country');?><?php echo required_symbol();?></label>			
                     <?php 					 
                        $country_select = array();
                        if(isset($record->site_country)) {
                            
                        		$country_select = array(								
                        						$record->site_country		
                        						);

                           }	
                         echo form_dropdown('site_country',$country_options,$country_select,'class = "form-control chzn-select"');?>
                  </div>
                  
                  

				  <div class="form-group">                    
                     <label><?php echo $this->lang->line('currency_symbol');?><?php echo required_symbol();?></label>

                       <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->currency_symbol;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('currency_symbol');
                    }
                    
                    $element = array('name'=>'currency_symbol',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('currency_symbol');
                    ?> 
                  </div> 
                  

                  <div class="form-group">           
                     <label><?php echo $this->lang->line('time_zone');?><?php echo required_symbol();?></label>			
                     <?php 					 
                        $time_zone_options_select = array();
                        if(isset($record->time_zone)) {
                        		$time_zone_options_select = array(								
                        						$record->time_zone		
                        						);
                        
                        }	
                         echo form_dropdown('site_timezone',$time_zone_options,$time_zone_options_select,'class = "form-control chzn-select"');?>
                  </div>
                  
                  

				  <div class="form-group">           
                     <label class="control-label0000"><?php echo $this->lang->line('default_language');?><?php echo required_symbol();?></label>	
                     <?php
                        $options = array(
                        "en" 	=> "English",
                        "fr" 	=> "French",
                        "pt"	=> "Português",
                        "de" 	=> "German",
                        "ru" 	=> "Russian",
                        "tr" 	=> "Turkish",
                        );

                        $select = array();
                        if(isset($record->default_language)) {
                        	$select = array(
                        					$record->default_language		
                        					);

                        }	
                        echo form_dropdown('default_language',$options,$select,'class = "form-control chzn-select"');?>
                  </div>
				  
                  
				  <div class="form-group">           
                     <label class="control-label0000"><?php echo $this->lang->line('language_dropdown');?><?php echo required_symbol();?></label>	
                     <?php
                        $options = array(
                        "Enable" => "Enable",
                        "Disable" => "Disable"
                        );

                        $select = array();
                        if(isset($record->language_dropdown)) {
                        	$select = array(
                        					$record->language_dropdown		
                        					);

                        }	
                        echo form_dropdown('language_dropdown',$options,$select,'class = "form-control chzn-select"');?>
                  </div>
                  
                  
                  <div class="form-group">               
                     <label><?php echo $this->lang->line('payment_method');?><?php echo required_symbol();?></label>	<br/>
                     
                        <div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="paypal" id="c1" <?php if ($site_settings->paypal==1) echo 'checked="checked"';?>>
                              <?php echo $this->lang->line('paypal');?>
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="stripe" id="c2" <?php if ($site_settings->stripe==1) echo 'checked="checked"';?>>
                              <?php echo $this->lang->line('stripe');?>
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="payu" id="c2" <?php if ($site_settings->payu==1) echo 'checked="checked"';?>>
                              <?php echo $this->lang->line('payu');?>
                            </label>
                        </div>
                        
                        <div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="cash" id="c2" <?php if ($site_settings->cash==1) echo 'checked="checked"';?>>
                              <?php echo $this->lang->line('cash');?>
                            </label>
                        </div>
  
                  </div>
                  
                  
                  
                  
                  
                  
                  
                  <div class="form-group">               
                     <label><?php echo $this->lang->line('facebook_app_id');?><?php echo required_symbol();?></label>		
                     
                    <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->facebook_app_id;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('facebook_app_id');
                    }
                    
                    $element = array('name'=>'facebook_app_id',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('facebook_app_id');
                    ?> 
                  </div>
                  
                  
                  <div class="form-group">               
                     <label><?php echo $this->lang->line('facebook_app_secret');?><?php echo required_symbol();?></label>		
                   
                     <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->facebook_app_secret;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('facebook_app_secret');
                    }
                    
                    $element = array('name'=>'facebook_app_secret',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('facebook_app_secret');
                    ?> 
                  </div>
                  
                  
                  
                 <div class="form-group">               
                     <label><?php echo $this->lang->line('google_client_id');?><?php echo required_symbol();?></label>		
                   
                     <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->google_client_id;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('google_client_id');
                    }
                    
                    $element = array('name'=>'google_client_id',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('google_client_id');
                    ?> 
                  </div>
                  
                  
                  
                  <div class="form-group">               
                     <label><?php echo $this->lang->line('google_client_secret');?><?php echo required_symbol();?></label>		
                   
                     <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->google_client_secret;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('google_client_secret');
                    }
                    
                    $element = array('name'=>'google_client_secret',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('google_client_secret');
                    ?> 
                  </div>
                  
                   <div class="form-group">               
                     <label><?php echo $this->lang->line('distance_type');?></label>		
                     <?php 					 
                        $distance_type_options = array(						
                        "Km" => "Km",								
                        "Mi" => "Mile"						
                        );													
                        
                        $distance_type_select = array();
                        if(isset($record->distance_type)) {
                        	$distance_type_select = array(								
                        					$record->distance_type		
                        					);
                        
                        }	
                        echo form_dropdown('distance_type',$distance_type_options,$distance_type_select,'class = "form-control chzn-select"');					 ?>      
                  </div>
                  
                  
               </div>
               
               
               
               <!-- another div -->  
               
               <div class="col-md-6">
               
               
              
                  
                   
                   <div class="form-group">               
                     <label><?php echo $this->lang->line('airports');?><?php echo required_symbol();?></label>		
                     <?php 					 
                        $airports_options = array(						
                        "Enable" => "Enable",								
                        "Disable" => "Disable"						
                        );													
                        
                        $airports_status = array();
                        if(isset($record->airports_status)) {
                        	$airports_status = array(								
                        					$record->airports_status		
                        					);
                        
                        }	  
                        echo form_dropdown('airports',$airports_options,$airports_status,'class = "form-control chzn-select"');					 ?>    
                  </div>
                 
                 
                 
                  <div class="form-group">               
                     <label><?php echo $this->lang->line('day_start_time'); ?><?php echo required_symbol();?></label>		
                     
                     <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->day_start_time;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('day_start_time');
                    }
                    
                    $element = array('name'=>'day_start_time',
                    'value'=>$val,
                    'placeholder'=>$this->lang->line('value_should_be_in_24hrs_format'),
                    'class'=>'form-control');
                    echo form_input($element).form_error('day_start_time');
                    ?> 
                  </div>
                  
                  
                  
                  <div class="form-group">               
                     <label><?php echo $this->lang->line('day_end_time');?><?php echo required_symbol();?></label>		
                     
                      <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->day_end_time;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('day_end_time');
                    }
                    
                    $element = array('name'=>'day_end_time',
                    'value'=>$val,
                    'placeholder'=>$this->lang->line('value_should_be_in_24hrs_format'),
                    'class'=>'form-control');
                    echo form_input($element).form_error('day_end_time');
                    ?> 
                  </div>
                  
                  
                  <div class="form-group">               
                     <label><?php echo $this->lang->line('night_start_time');?><?php echo required_symbol();?></label>		
                    
                     <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->night_start_time;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('night_start_time');
                    }
                    
                    $element = array('name'=>'night_start_time',
                    'value'=>$val,
                    'placeholder'=>$this->lang->line('value_should_be_in_24hrs_format'),
                    'class'=>'form-control');
                    echo form_input($element).form_error('night_start_time');
                    ?> 
                  </div>
                  
                  
                  
				  <div class="form-group">               
                     <label><?php echo $this->lang->line('night_end_time');?><?php echo required_symbol();?></label>		
                   
                      <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->night_end_time;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('night_end_time');
                    }
                    
                    $element = array('name'=>'night_end_time',
                    'value'=>$val,
                    'placeholder'=>$this->lang->line('value_should_be_in_24hrs_format'),
                    'class'=>'form-control');
                    echo form_input($element).form_error('night_end_time');
                    ?> 
                  </div>
                  
                  
				  
				  <div class="form-group">               
                     <label><?php echo $this->lang->line('driver_charge_for_night')." (".$this->config->item('site_settings')->currency_symbol.")";?><?php echo required_symbol();?></label>
                      <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->driver_charge_night;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('driver_charge_night');
                    }
                    
                    $element = array('name'=>'driver_charge_night',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('driver_charge_night');
                    ?> 
                  </div>
                  
				  
                  
				  <div class="form-group">               
                     <label><?php echo $this->lang->line('apply_tax_for_booking');?></label>
                     
                       <?php 					 
                        $options = array(
                        "" => "Select",						
                        "Yes" => "Yes",								
                        "No" => "No"						
                        );													
                        
                        $tax = array();
                        
                        if(isset($record->apply_tax)) {
                        	$tax = array($record->apply_tax);
                        
                        }	  
                        echo form_dropdown('apply_tax',$options,$tax,'class = "form-control chzn-select"');					 
                        echo form_error('apply_tax');?> 
                  </div>
                  
                  
                  
                  <div class="form-group">               
                     <label><?php echo $this->lang->line('tax_amount')." (".$this->config->item('site_settings')->currency_symbol.")";?></label>		
                    
                        <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->tax_amount;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('tax_amount');
                    }
                    
                    $element = array('name'=>'tax_amount',
                    'value'=>$val,
                    'placeholder'=>'Ex: 30 or 30.00',
                    'class'=>'form-control');
                    echo form_input($element).form_error('tax_amount');
                    ?> 
                  </div>
                  
                  
				  
                  <div class="form-group" style="display:none;">           
                     <label class="control-label"><?php echo $this->lang->line('email_type');?></label>	
                     <?php 					 
                        $options = array(								
                        "PHP mail" => "PHP mail",					
                        "Sendmail" => "Sendmail",							
                        "Gmail SMTP" => "Gmail SMTP"			
                        );						
                        
                        $select = array();
                        if(isset($record->email_type)) {
                        	$select = array(								
                        					$record->email_type		
                        					);
                        
                        }	
                        echo form_dropdown('email_type',$options,$select,'class = "form-control chzn-select"');					?>                 
                  </div>
                  
                  
                  
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('design_by');?><?php echo required_symbol();?></label>					 
                    
                         <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->design_by;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('design_by');
                    }
                    
                    $element = array('name'=>'design_by',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('design_by');
                    ?> 
                  </div>
                  
                  
                  
				  <div class="form-group">                    
                     <label><?php echo "URL"." ".$this->lang->line('for')." ".$this->lang->line('design_by');?></label>
                     <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->url_for_design_by;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('url_for_design_by');
                    }
                    
                    $element = array('name'=>'url_for_design_by',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('url_for_design_by');
                    ?> 
                  </div>
                  
                  
                  
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('rights_reserved');?><?php echo required_symbol();?></label>					 
                   
                      <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->rights_reserved_content;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('rights_reserved_content');
                    }
                    
                    $element = array('name'=>'rights_reserved_content',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('rights_reserved_content');
                    ?> 
                  </div>
                  
                  
                  
                  <div class="form-group">           
                     <label class="control-label0000"><?php echo $this->lang->line('date_format');?><?php echo required_symbol();?></label>	
                     <?php 					 
                       
                        
                       $options = get_date_format_options();
                       
                        $select = array();
                        if(isset($record->date_formats)) {
                        	$select = array(								
                        					$record->date_formats		
                        					);
                        
                        }	
                        echo form_dropdown('date_formats',$options,$select,'class = "form-control chzn-select"');					?>                 
                  </div>


			
				   
				  
				  <div class="form-group">                    
                     <label><?php echo $this->lang->line('contact_map');?><?php echo required_symbol();?></label>					 
                    
                    
                     <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->contact_map;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('contact_map');
                    }
                    
                    $element = array('name'=>'contact_map',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_textarea($element).form_error('contact_map');
                    ?> 
                    
                  </div>
                  

                    <div class="form-group">               
                     <label><?php echo "Google API Key";?><?php echo required_symbol();?></label>     
                    
                      <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->google_api_key;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('google_api_key');
                    }
                    
                    $element = array('name'=>'google_api_key',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('google_api_key');
                    ?> 
                    
                  </div>
                  
                  
                  
                  <div class="form-group"> 
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" name="sms_notification" value="Yes" class="form-check-input" <?php if($site_settings->sms_notification=='Yes') echo 'checked="checked"';?>>
                          <?php echo $this->lang->line('sms_notification');?>
                        </label>
                      </div>
                  </div>
                  
                  
                  
                <div class="form-group">
                    <label> <?php echo $this->lang->line('site_logo'); ?><?php echo required_symbol();?> 
                    (<small><strong><?php echo ALLOWED_TYPES;?></strong></small>) </label>
                    
                    <input name="userfile" type="file" id="image" title="<?php echo $this->lang->line('site_logo');?>" onchange="photo(this,'site_logo')" style="width:80px;">
					<br/>
					<?php 
						$src = "";
						$style="display:none;";
						
                    if ($site_settings->site_logo != "" && file_exists(LOGO_IMG_UPLOAD_PATH_URL.$site_settings->site_logo)) {
                        
                    $src = LOGO_IMG_PATH.$site_settings->site_logo;
                    $style="";
                                
                    }
                        ?>
				<img class="img-responsive vehicle-img" id="site_logo" src="<?php echo $src;?>" height="60" style="<?php echo $style;?>" />     
                </div>
                
                
                <div class="form-group">
                    <label> <?php echo $this->lang->line('fevicon'); ?><?php echo required_symbol();?> (<small><strong><?php echo ALLOWED_FEVICON_TYPES;?></strong></small>) </label>
                    <input name="fevicon" type="file" title="<?php echo $this->lang->line('fevicon');?>" onchange="photo(this,'fevicon_img')" style="width:80px;">
					<br/>
					<?php 
						$src = "";
						$style="display:none;";
						
                    if ($site_settings->fevicon != "" && file_exists(FEVICON_IMG_UPLOAD_PATH_URL.$site_settings->fevicon)) {
                        
                    $src = FEVICON_IMG_PATH.$site_settings->fevicon;
                    $style="";
                                
                    }
                        ?>
				<img id="fevicon_img" src="<?php echo $src;?>" height="50" style="<?php echo $style;?>" />     
                </div>
                
                


              
               
               <div class="form-group">
               
                <input type="hidden" value="<?php  if(isset($record->id)) echo $record->id;?>"  name="update_record_id" />
                
             
               <input type="submit" value="Update" name="submit" class="right-p"/>
              
               
               
                </div>
                
            </div>
            
                     
         </div>
         <?php echo form_close();?> 
         
      </div>
   </div>
</div>
</div>



<script type="text/javascript"> 
   (function($, W, D) {
     var JQUERY4U = {};
     JQUERY4U.UTIL = {
             setupFormValidation: function() {
                 
                 
                 //Additional Methods			
                 $.validator.addMethod("phoneNumber", function(uid, element) {
                     return (this.optional(element) || uid.match(/^[- +()]*[0-9][- +()0-9]*$/));
                 }, "Please enter valid number.");
                 
				 
				        $.validator.addMethod("numbersonly",function(a,b){return this.optional(b)||/^[0-9 ]+$/i.test(a)},"<?php echo $this->lang->line('valid_numbers');?>");
				 
                 
                 
                 $.validator.addMethod("Fax", function(uid, element) {
                     return (this.optional(element) || uid.match(/^\+?[0-9]{6,}$/));
                 }, "Please enter valid fax.");
                 
                 
                 
                $.validator.addMethod("amount", function(uid, element) {
                return (this.optional(element) || uid.match(/^\d{0,9}(\.\d{0,2})?$/));
                },"Please enter valid value.");
        
        
                 //form validation rules
                 $("#site_settings_form").validate({
                     rules: {
          						   site_title: {
          							    required: true,
                            maxlength:100
          						  },
                         sitename: {
                             required: true,
                             maxlength:100
                         },
                         address: {
                             required: true,
                             maxlength:100
                         },
                         city: {
                             required: true,
                             maxlength:50
                         },
                         state: {
                             required: true,
                              maxlength:50
                         },
                         country: {
                             required: true,
                              maxlength:50
                         },
                         zip: {
                             required: true,
                              maxlength:20
                         },
                         phone: {
                             required: true,
                             phoneNumber: true,
                             rangelength: [9, 30]
                         },
            						 land_line: {
            							 required: true,
                            maxlength:20
            						 },
                         fax: {
                             Fax: true,
                             maxlength:20
                         },
                         portal_email: {
                             required: true,
                             email:true,
                             maxlength:50
                         },
                         country_code: {
                             required: true,
                             maxlength:10
                         },
                         currency_symbol: {
                             required: true,
                             maxlength:10
                         },
                         day_start_time: {
                             required: true
                         },
                         day_end_time: {
                             required: true
                         },
                         night_start_time: {
                             required: true
                         },
                         night_end_time: {
                             required: true
                         },
          						  driver_charge_night: {
          							  required: true,
          							  numbersonly: true
          						  },
                                   tax_amount: {
          							  amount: true
          						  },
                         design_by: {
                             required: true
                        },
          						   url_for_design_by: {
          							 url: true
                         },
                         rights_reserved_content: {
                             required: true
                         },
                         google_api_key: {
                             required: true
                         },
                         facebook_app_id: {
                             required: true
                         },
                         facebook_app_secret: {
                             required: true
                         },
                         google_client_id: {
                             required: true
                         },
                         google_client_secret: {
                             required: true
                         }
                     },
                     messages: {
            						 site_title: {
            							 required: "<?php echo $this->lang->line('site_title_valid');?>"
            						 },
                         sitename: {
                             required: "<?php echo $this->lang->line('site_name_valid');?>"
                         },
                         address: {
                             required: "<?php echo $this->lang->line('address_valid');?>"
                         },
                         city: {
                             required: "<?php echo $this->lang->line('city_valid');?>"
                         },
                         state: {
                             required: "<?php echo $this->lang->line('state_valid');?>"
                         },
                         country: {
                             required: "<?php echo $this->lang->line('country_valid');?>"
                         },
                         zip: {
                             required: "<?php echo $this->lang->line('zip_code_valid');?>"
                         },
                         phone: {
                             required: "<?php echo $this->lang->line('phone_valid');?>"
                         },
            						 land_line: {
            							 required: "<?php echo $this->lang->line('land_line_valid');?>"
            						 },
                         portal_email: {
                             required: "<?php echo $this->lang->line('portal_email_valid');?>"
                         },
                         country_code: {
                             required: "<?php echo $this->lang->line('country_code_valid');?>"
                         },
                         
                         currency_symbol: {
                             required: "<?php echo $this->lang->line('currency_symbol_valid');?>"
                         },
                         day_start_time: {
                             required: "<?php echo $this->lang->line('day_start_time_valid');?>"
                         },
                         day_end_time: {
                             required: "<?php echo $this->lang->line('day_end_time_valid');?>"
                         },
                         night_start_time: {
                             required: "<?php echo $this->lang->line('night_start_time_valid');?>"
                         },
                         night_end_time: {
                             required: "<?php echo $this->lang->line('night_end_time_valid');?>"
                         },
						 driver_charge_night: {
							required: "<?php echo $this->lang->line('driver_charge_for_night');?>"
						 },
                         design_by: {
                             required: "<?php echo $this->lang->line('design_by_valid');?>"
                         },
                         rights_reserved_content: {
                             required: "<?php echo $this->lang->line('rights_valid');?>"
                         },
                         google_api_key: {
                             required: "<?php echo "Please enter Google API Key";?>"
                         },
                         facebook_app_id: {
                             required: "<?php echo "Please enter Facebook app Id";?>"
                         },
                         facebook_app_secret: {
                             required: "<?php echo "Please enter Facebook app secret";?>"
                         },
                         google_client_id: {
                             required: "<?php echo "Please enter Google client ID";?>"
                         },
                         google_client_secret: {
                             required: "<?php echo "Please enter Google client secret";?>"
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
	
	
	
	
	
	
	function readURL(input) {
	
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {

                input.style.width = '100%';
				$('#site_logo')
                    .attr('src', e.target.result);
				$('#site_logo').fadeIn();
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>