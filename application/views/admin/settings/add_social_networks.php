<div class="main-container nine-bmc bmc-remove">

   <div class="content">

      <div class="main-hed"> 
         <a href="<?php echo site_url();?>auth"><?php echo $this->lang->line('home');?></a> >> <?php echo $this->lang->line('master_settings');?> >> 
         <?php if(isset($title)) echo $title;?>
      </div>

      <div class="col-md-6">
         <?php echo $this->session->flashdata('message');?>              
         <div class="module">
            <div class="module-head">
               <h3> <?php if(isset($title)) echo $title;?></h3>
            </div>
            
            
            <div class="module-body">
            
               <?php 
                  $attributes = array('name' => 'social_networks_form', 'id' => 'social_networks_form');
                  echo form_open(site_url()."settings/social_networks",$attributes);?>
                  
                  
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('facebook');?></label>    
                 
                 <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->facebook;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('facebook');
                    }
                    
                    $element = array('name'=>'facebook',
                    'value'=>$val,
                    'class'=>'form-control',
                    'placeholder'=>$this->lang->line('url_order'));
                    echo form_input($element).form_error('facebook');
                    ?> 
                 
               </div>
               
               
               
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('twitter');?></label>    
                 
                 <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->twitter;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('twitter');
                    }
                    
                    $element = array('name'=>'twitter',
                    'value'=>$val,
                    'class'=>'form-control',
                    'placeholder'=>$this->lang->line('url_order'));
                    echo form_input($element).form_error('twitter');
                    ?> 
                    
               </div>
               
               
               
               
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('linked_in');?></label>    
                 
                <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->linkedin;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('linkedin');
                    }
                    
                    $element = array('name'=>'linkedin',
                    'value'=>$val,
                    'class'=>'form-control',
                    'placeholder'=>$this->lang->line('url_order'));
                    echo form_input($element).form_error('linkedin');
                    ?> 
                    
               </div>
               
               
               
               
               
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('google_plus');?></label>    
                
                <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->google_plus;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('google_plus');
                    }
                    
                    $element = array('name'=>'google_plus',
                    'value'=>$val,
                    'class'=>'form-control',
                    'placeholder'=>$this->lang->line('url_order'));
                    echo form_input($element).form_error('google_plus');
                    ?> 
                    
               </div>
               
               
               <div class="form-group">
                
                <input type="hidden" value="<?php  if(isset($record->id)) echo $record->id;?>"  name="update_rec_id" />
               
                <input type="submit" value="Update" name="submit" /> 
              
                </div>
               
               
               <?php echo form_close();?>  
            </div>
            
                    
         </div>
      </div>
   </div>
</div>