<div class="main-container nine-bmc bmc-remove">

   <div class="content">
      <div class="main-hed"> 
         <a href="<?php echo site_url();?>auth"><?php echo $this->lang->line('home');?></a> >> Master Settings >> <a href="<?php echo site_url();?>settings/email_templates"><?php echo $this->lang->line('email_templates');?></a>  >> <?php if(isset($title)) echo $title;?>
      </div>


      <div class="col-md-6">

         <div class="module">
            <div class="module-head">
               <h3><?php if(isset($title)) echo $title;?></h3>
            </div>
            
            <?php 
               $attributes = array('name' => 'email_templates_form', 'id' => 'email_templates_form');
               echo form_open(site_url()."settings/email_templates",$attributes);?>
               
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
                 
                 
                 
              
              <label><?php echo $this->lang->line('email_template');?><?php echo required_symbol();?></label>
                    <div class="form-group">

                        <textarea class="ckeditor" id="editor1" name="email_template" cols="100" rows="10"><?php if(isset($record->email_template))
                     echo $record->email_template;echo set_value('email_template'); ?></textarea>

					  </div>
                      
                      
              
              <div class="form-group">
              
              <?php echo form_hidden('id',$record->id);?>

               <input type="submit" value="Update" name="update_email_template" />
               
               </div>
                
            </div>
            
            <?php echo form_close();?>                      
         </div>
      </div>
   </div>
</div>