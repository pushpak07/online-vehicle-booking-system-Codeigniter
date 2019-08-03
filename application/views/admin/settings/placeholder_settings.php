<div class="main-container nine-bmc bmc-remove">

   <div class="content">

      <?php echo $this->session->flashdata('message'); ?>

      <div class="main-hed"> 
         <a href="<?php echo site_url();?>auth"><?php echo $this->lang->line('home');?></a> >> <?php echo $this->lang->line('master_settings');?> >>
         <?php if(isset($title)) echo $title;?>
      </div>

      <div class="col-md-6">
         <div class="module">
            <div class="module-head">
               <h3><?php if(isset($title)) echo $title;?></h3>
            </div>
            

            <div class="module-body">
            
               <?php 
                  $attributes = array('name' => 'placeholder_settings_form', 'id' => 'placeholder_settings_form');
                  echo form_open(site_url().'settings/placeholder_settings',$attributes);?>

                  
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('pick_point_placeholder');?></label>   
                
                <?php
                    $val='';
                    if(isset($site_settings) && !empty($site_settings))
                    {
                        $val = $site_settings->pick_point_placeholder;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('pick_point_placeholder');
                    }
                    
                    $element = array('name'=>'pick_point_placeholder',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('pick_point_placeholder');
                ?>
                
                  
               </div>
               
               

               
			   <div class="form-group">                    
                  <label><?php echo $this->lang->line('drop_point_placeholder');?></label>    
                  
                <?php
                    $val='';
                    if(isset($site_settings) && !empty($site_settings))
                    {
                        $val = $site_settings->drop_point_placeholder;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('drop_point_placeholder');
                    }
                    
                    $element = array('name'=>'drop_point_placeholder',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('drop_point_placeholder');
                ?>
               </div>
               
               
               
               <div class="form-group"> 
               
               <input type="hidden" value="<?php  if(isset($site_settings->id)) echo $site_settings->id;?>"  name="update_record_id" />

               <input type="submit" value="Update" name="submit" />
               
               </div>
               
               
               <?php echo form_close();?>
               
            </div>

         </div>
      </div>
   </div>
</div>
