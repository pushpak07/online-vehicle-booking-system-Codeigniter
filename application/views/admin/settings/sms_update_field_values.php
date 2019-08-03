<div class="main-container nine-bmc bmc-remove">

   <div class="content">
      <div class="main-hed"> 
         <a href="<?php echo site_url();?>auth"><?php echo $this->lang->line('home');?></a> >> Master Settings >> <a href="<?php echo site_url();?>settings/sms_gateways"><?php echo $this->lang->line('sms_gateways');?></a>  >> <?php if(isset($title)) echo $title;?>
      </div>


      <div class="col-md-6">
         <div class="module">
            <div class="module-head">
               <h3><?php if(isset($title)) echo $title;?></h3>
            </div>
            
            <?php 
               $attributes = array('name' => 'testimony_settings_form', 'id' => 'testimony_settings_form');
               echo form_open(site_url()."settings/update_sms_field_values",$attributes);?>
               
            <div class="module-body">
            
                <?php 
                    foreach($sms_gateway_details as $row):?>
						
					<div class="form-group">
                     <label><?php echo $row->field_name; ?><span style="color:red;">*</span></label>
                     <?php
                     if($row->is_required == 'No') {
							$element = array(
								'type' => 'text',
								'name'	=>	'setting_'.$row->field_id,
								'id'	=>	'setting_'.$row->field_id,
								'value'	=>	(isset($row->field_output_value)) ? $row->field_output_value : '',
								'class'=>'form-control'
							);
						} else {
							$element = array(
								'type' => 'text',
								'name'	=>	'setting_'.$row->field_id,
								'id'	=>	'setting_'.$row->field_id,
								'value'	=>	(isset($row->field_output_value)) ? $row->field_output_value : '',
								'required' => 'required',
								'class'=>'form-control'
							);
						}
						echo form_input($element);
						?>
                  </div>
                  <?php endforeach; ?>
                
              
              
              
               <input type="submit" value="Save" name="update_sms_gateway" />
                
            </div>
            
            <?php echo form_close();?>                      
         </div>
      </div>
   </div>
</div>