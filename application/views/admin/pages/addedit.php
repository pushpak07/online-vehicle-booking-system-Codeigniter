<div class="main-container nine-bmc bmc-remove">

   <div class="content">

      <div class="main-hed">
         <a href="<?php echo site_url();?>auth"><?php echo $this->lang->line('home');?></a> >> 
         <a href="<?php echo site_url();?>pages"><?php echo $this->lang->line('pages');?></a> 
         <?php if(isset($title)) echo " >> ".$title;?>
      </div>

      <div class="col-md-12">

         <div class="module">
            <div class="module-head">
               <h3><?php if(isset($title)) echo $title;?></h3>
            </div>
            
           
               
            <div class="module-body">
            
             <?php 
               $attributes = array('name' => 'add_aboutus_form', 'id' => 'add_aboutus_form');
               echo form_open(site_url()."pages/addedit",$attributes);?>
               
               
             <div class="col-md-6">
            
            
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('title');?><?php echo required_symbol();?></label>    
                  
                  <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->name;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('title');
                    }
                    
                    $element = array('name'=>'title',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('title');
                    ?>
               </div>
               
               
               <div class="form-group">  
               
                  <label><?php echo $this->lang->line('description');?><?php echo required_symbol();?></label>
                  
                  <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->description;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('description');
                    }
                    
                    $element = array('name'=>'description',
                    'value'=>$val,
                    'class'=>'ckeditor');
                    echo form_textarea($element).form_error('description');
                    ?>
                        
               </div>
               
               
               <div class="form-group">  
               
                  <label><?php echo $this->lang->line('meta_tag');?></label>
                  
                  <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->meta_tag;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('meta_tag');
                    }
                    
                    $element = array('name'=>'meta_tag',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_textarea($element).form_error('meta_tag');
                    ?>
                        
               </div>
               
               
               
            </div>
            
            
            <div class="col-md-6">
            
            
            <div class="form-group">  
               
                  <label><?php echo $this->lang->line('meta_tag_keywords');?></label>
                  
                  <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->meta_description;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('meta_tag_keywords');
                    }
                    
                    $element = array('name'=>'meta_tag_keywords',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_textarea($element).form_error('meta_tag_keywords');
                    ?>
                        
            </div>
            
            
            <div class="form-group">  
               
                  <label><?php echo $this->lang->line('seo_keywords');?></label>
                  
                  <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->seo_keywords;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('seo_keywords');
                    }
                    
                    $element = array('name'=>'seo_keywords',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_textarea($element).form_error('seo_keywords');
                    ?>
                        
            </div>
            
            
            <div class="form-group">  
               
                  <div class="form-check">
                    <label class="form-check-label">
                    
                      <input type="checkbox" class="form-check-input" name="bottom"  value="1" <?php if(isset($record->is_bottom) && ($record->is_bottom) == "1") echo 'checked="checked"';?> >
                      <?php echo $this->lang->line('bottom');?>
                    </label>
                  </div>
                        
            </div>
            
            
            <div class="form-group">                    
                  <label><?php echo $this->lang->line('sort_order');?></label>    
                  
                  <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->sort_order;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('sort_order');
                    }
                    
                    $element = array('name'=>'sort_order',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('sort_order');
                    ?>
            </div>

            
            <div class="form-group">                    
                  <label><?php echo $this->lang->line('under_category');?></label>    
                  
                  <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->parent_id;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('under_category');
                    }
                    
                    echo form_dropdown('under_category',$category_options,$val,'class="chzn-select form-control"').form_error('under_category');
                   
                    ?>
            </div>

            
            <div class="form-group">                     
                  <label class="control-label"><?php echo $this->lang->line('status');?></label>	
                   <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->status;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('status');
                    }
                    
                    echo form_dropdown('status',activeinactive(),$val,'class="chzn-select form-control"').form_error('status');
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
                        
               
               <button type="submit" name="addedit_page" value="addedit_page" class="pull-right"><?php echo $this->lang->line('save');?></button>
               
            </div>
            
               
            </div>
             
             
            <?php echo form_close();?>                      
         </div>
         
         
      </div>
   </div>
   
</div>

</div>

<!--validations-->
<script type="text/javascript"> 
   (function($,W,D)
   {
      var JQUERY4U = {};
   
      JQUERY4U.UTIL =
      {
          setupFormValidation: function()
          {
              //Additional Methods			
   		
   		
   		$.validator.addMethod("lettersonly",function(a,b){return this.optional(b)||/^[a-z ]+$/i.test(a)},"Please enter valid name.");
   		
   		
   		
   	
   		//form validation rules
              $("#add_aboutus_form").validate({
                  ignore:"",
                  rules: {
                      title: {
                          required: true,
                          lettersonly: true,
   					rangelength: [1, 30]
                      },
   		description: {
                          required: true,
                      },  
                  },
   			
   			messages: {
   				title: {
                          required: "<?php echo $this->lang->line('title_valid');?>"
                      },
   				description: {
                          required: "<?php echo $this->lang->line('description_valid');?>"
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