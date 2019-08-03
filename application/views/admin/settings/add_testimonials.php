<div class="main-container nine-bmc bmc-remove">

   <div class="content">

      <div class="main-hed"> 
         <a href="<?php echo site_url();?>auth"><?php echo $this->lang->line('home');?></a> >> Master Settings >> <a href="<?php echo site_url();?>settings/testimonials"><?php echo $this->lang->line('testimonials');?></a> >>
         <?php if(isset($title)) echo $title;?>
      </div>


      <div class="col-md-6">

         <div class="module">
            <div class="module-head">
               <h3><?php if(isset($title)) echo $title;?></h3>
            </div>
            
            <?php 
               $attributes = array('name' => 'testimony_settings_form', 'id' => 'testimony_settings_form');
               echo form_open_multipart(site_url()."settings/addedit_testimonial/",$attributes);?>
               
            <div class="module-body">
            
            
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('title');?></label> 
                    <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->title;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('title');
                    }
                    
                    $element = array('name'=>'title',
                    'value'=>$val,
                    'placeholder'=>$this->lang->line('title'),
                    'class'=>'form-control');
                    echo form_input($element).form_error('title');
                    ?>                   
               </div>
               
               
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('author');?><?php echo required_symbol();?></label>
                  <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->user_name;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('author');
                    }
                    
                    $element = array('name'=>'author',
                    'value'=>$val,
                    'placeholder'=>$this->lang->line('author'),
                    'class'=>'form-control');
                    echo form_input($element).form_error('author');
                    ?> 
               </div>
               
               
               
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('description');?><?php echo required_symbol();?></label>    
                  
                    <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->content;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('description');
                    }
                    
                    $element = array('name'=>'description',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_textarea($element).form_error('description');
                    ?>                   
               </div>
               
               
               
               
               <div class="form-group">                    
                
                    <label class="control-label"><?php echo $this->lang->line('photo');?>(<small><strong><?php echo ALLOWED_TYPES;?></strong></small>)</label>
                    
                    
                    <input type="file" name="userfile" title="Image" onchange="photo(this,'user_image')">
                    
                    <?php 
                    $src = "";
                    $style="display:none;";
                    if(isset($record->user_photo) && $record->user_photo != "" && file_exists(TESTI_USER_IMG_UPLOAD_PATH_URL.$record->user_photo)) 
                    {
                        $src = TEST_USER_IMG_PATH.$record->user_photo;
                        $style="";
                    }
                    ?>
                    
                <img class="img-responsive vehicle-img" id="user_image" src="<?php echo $src;?>" style="<?php echo $style;?>" > 
                
               </div>
               
               
               
               <div class="form-group">                     
                  <label class="control-label"><?php echo $this->lang->line('status');?></label>											
                  <?php 					 
                     $options = array(						
                     "Active" => "Active",
                     "Inactive" => "Inactive"								
                     );	
                     
                     $select = array();
                     if(isset($record->status)) {
                     $select = array(								
                     			$record->status		
                     			);					  			
                     }
                     echo form_dropdown('status',$options,$select,'class = "chzn-select form-control"');					 
                     
                     ?>   
               </div>
               
               
               
              <div class="form-group"> 
               
               <?php 
                $value='';
                if(isset($record))
                {
                    $value = $record->id;
                }
                echo form_hidden('id',$value);?>
                        
               
               <button type="submit" name="addedit_testimonial" value="addedit_coupon" class="pull-right"><?php echo $this->lang->line('save');?></button>
               
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
             $.validator.addMethod("lettersonly", function(a, b) {
                 return this.optional(b) || /^[a-z ]+$/i.test(a)
             }, "<?php echo $this->lang->line('valid_name');?>");
             $.validator.addMethod("letters", function(a, b) {
                 return this.optional(b) || /^[a-z ]+$/i.test(a)
             }, "<?php echo $this->lang->line('valid_description');?>");
             //form validation rules
             $("#testimony_settings_form").validate({
                 rules: {
                     author: {
                         required: true,
                         lettersonly: true
                     },
                     description: {
                         required: true
                     }
                 },
                 messages: {
                     author: {
                         required: "<?php echo $this->lang->line('author_valid');?>"
                     },
                     description: {
                         required: "<?php echo $this->lang->line('description_valid');?>"
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