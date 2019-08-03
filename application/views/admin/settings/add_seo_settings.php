<div class="main-container nine-bmc bmc-remove">

   <div class="content">
   
    <?php echo $this->session->flashdata('message'); ?>
    
      <div class="main-hed"> 
         <a href="<?php echo site_url();?>auth"><?php echo $this->lang->line('home');?></a> >> <?php echo $this->lang->line('master_settings');?> >> 
         <?php if(isset($title)) echo $title;?>
      </div>

      <div class="col-md-12">
         <div class="module">
            <div class="module-head">
               <h3><?php if(isset($title)) echo $title;?></h3>
            </div>
            
            
           
               
            <div class="module-body">

             <?php 
               $attributes = array('name' => 'seo_settings_form', 'id' => 'seo_settings_form');
               echo form_open(site_url()."settings/seo_settings",$attributes);?>
               
             <div class="col-md-6">
               
               <div class="form-group">   
                <label><?php echo $this->lang->line('site_description');?><?php echo required_symbol();?></label>               
                 
                   <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->site_description;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('site_description');
                    }
                    
                    $element = array('name'=>'site_description',
                    'value'=>$val,
                    'class'=>'form-control ckeditor');
                    echo form_textarea($element).form_error('site_description');
                    ?>
                    
               </div>
               
             </div>
             
               
               
                <div class="col-md-6">
                
                 
			   <div class="form-group">
			    <label><?php echo $this->lang->line('meta_description');?></label>
                  
                 <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->meta_description;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('meta_description');
                    }
                    
                    $element = array('name'=>'meta_description',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_textarea($element).form_error('meta_description');
                    ?>
                    
               </div>
               
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('site_keywords');?><?php echo required_symbol();?></label>  
                  
                 
                      <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->site_keywords;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('site_keywords');
                    }
                    
                    $element = array('name'=>'site_keywords',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('site_keywords');
                    ?>
                    
                    
               </div>
               
               
               
               
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('google_analytics');?></label>    
                 
                   <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->google_analytics;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('google_analytics');
                    }
                    
                    $element = array('name'=>'google_analytics',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('google_analytics');
                    ?>
                    
               </div>
               
               
               
               <div class="form-group"> 
              
               <input type="hidden" value="<?php if(isset($record->id)) echo $record->id;?>" name="update_rec_id">
               
               <input type="submit" value="Update" name="update_seo"/>
                
                </div>
                
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
            //Additional Methods			
            //form validation rules
            $("#seo_settings_form").validate({
                rules: {
                    site_description: {
                        required: true
                    },
                    site_keywords: {
                        required: true
                    }
                },
                messages: {
                    site_description: {
                        required: "<?php echo $this->lang->line('site_description_valid');?>"
                    },
                    site_keywords: {
                        required: "<?php echo $this->lang->line('site_keywords_valid');?>"
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