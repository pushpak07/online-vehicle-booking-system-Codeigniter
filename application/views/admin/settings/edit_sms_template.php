<div class="main-container nine-bmc bmc-remove">

   <div class="content">
      <div class="main-hed"> 
         <a href="<?php echo site_url();?>auth"><?php echo $this->lang->line('home');?></a> >> Master Settings >> <a href="<?php echo site_url();?>settings/sms_templates"><?php echo $this->lang->line('sms_templates');?></a>  >> <?php if(isset($title)) echo $title;?>
      </div>


      <div class="col-md-6">

         <div class="module">
            <div class="module-head">
               <h3><?php if(isset($title)) echo $title;?></h3>
            </div>
            
            <?php 
               $attributes = array('name' => 'sms_templates_form', 'id' => 'sms_templates_form');
               echo form_open(site_url()."settings/sms_templates",$attributes);?>
               
            <div class="module-body">
            
                
					<div class="form-group">
                      <label><?php echo $this->lang->line('subject');?><?php echo required_symbol();?></label>
                    
                     <?php

						$val='';

						if(isset($record) && !empty($record))

						{

							$val = $record->subject;

						}

						else if(isset($_POST))

						{

							$val = set_value('subject');

						}

						

						$element = array('name'=>'subject',

						'value'=>$val,

						'class'=>'form-control',

						'readonly'=>true);

						echo form_input($element).form_error('subject');

						
						?>
                  </div>
                 
                 
                 
              
              <label><?php echo $this->lang->line('sms_template');?><?php echo required_symbol();?></label>
                    <div class="form-group">

                        <textarea class="ckeditor" id="editor1" name="sms_template" cols="100" rows="10"><?php if(isset($record->sms_template))
                     echo $record->sms_template;echo set_value('sms_template'); ?></textarea>

					  </div>
                      
                      
              
              <div class="form-group">
              
              <?php echo form_hidden('sms_template_id',$record->sms_template_id);?>
              
               <input type="submit" value="Update" name="update_sms_template" />
               
               </div>
                
            </div>
            
            <?php echo form_close();?>                      
         </div>
      </div>
   </div>
</div>