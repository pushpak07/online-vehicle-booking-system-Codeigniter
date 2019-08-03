<div class="main-container nine-bmc bmc-remove">

   <div class="content">
      <div class="main-hed">
         <a href="<?php echo site_url();?>auth"><?php echo $this->lang->line('home');?></a> >> 
         <a href="<?php echo site_url();?>faqs"><?php echo $this->lang->line('faqs');?></a> 
         <?php if(isset($title)) echo " >> ".$title;?>
      </div>

      <div class="col-md-6">
         <div class="module">
            <div class="module-head">
               <h3><?php if(isset($title)) echo $title;?></h3>
            </div>
            <?php 
               $attributes = array('name' => 'add_faqs_form', 'id' => 'add_faqs_form');
               echo form_open(site_url()."faqs/addedit",$attributes);?>
               
            <div class="module-body">
            
            
            
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('question');?><?php echo required_symbol();?></label>    
                  
                  <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->question;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('question');
                    }
                    
                    $element = array('name'=>'question',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('question');
                    ?>
                     
               </div>
               
               
               <div class="form-group">  
               
                  <label><?php echo $this->lang->line('answer');?><?php echo required_symbol();?></label>
                  
                  <?php
                    $val='';
                    if(isset($record) && !empty($record))
                    {
                        $val = $record->answer;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('answer');
                    }
                    
                    $element = array('name'=>'answer',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_textarea($element).form_error('answer');
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
                        
               
               <button type="submit" name="addedit_faq" value="addedit_faq" class="pull-right"><?php echo $this->lang->line('save');?></button>
               
               </div>
               
                
            </div>
            <?php echo form_close();?>                      
         </div>
      </div>
   </div>
</div>
<!--	Validations	-->
<script type="text/javascript"> 
   (function($, W, D) {
     var JQUERY4U = {};
     JQUERY4U.UTIL = {
         setupFormValidation: function() {
             //Additional Methods			
             //form validation rules
             $("#add_faqs_form").validate({
                 rules: {
                     question: {
                         required: true
                     },
                     answer: {
                         required: true
                     }
                 },
                 messages: {
                     question: {
                         required: "<?php echo $this->lang->line('question_valid');?>"
                     },
                     answer: {
                         required: "<?php echo $this->lang->line('answer_valid');?>"
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