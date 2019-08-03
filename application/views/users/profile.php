<div class="container padding-p-0 banner">
   <div class="row ">
      <div class="col-md-8 padding-p-l">
         <aside class="hedding"><?php if(isset($title)) echo $title;?></aside>
      </div>
      <div class="col-md-4 padding-p-r">
         <aside class="bradecom">
            <ul>
               <li> <a href="<?php echo SITEURL;?>"> <?php echo $this->lang->line('home');?> </a> </li> <li> >> </li> <li class="active"> <?php if(isset($title)) echo $title;?> </li>
            </ul>
         </aside>
      </div>
   </div>
</div>
</header>
<div class="container">
   <div class="row section-margin">
      <div class="col-md-12">
         <div id="total-login">
            <div class="online">
               <!-- Tab panes -->
               <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active" id="home">
                     <div class="online-con padding-p-0">
                     
					 <?php echo $this->session->flashdata('message');?>
                     
                     <div class="row">
                     
                        <?php 
                           $attributes = array("name" => 'profile_form',"id" => 'profile_form');
                           echo form_open(site_url().'users/profile',$attributes); ?>
                           
                        <div class="col-md-6">
                        
                           <div class="form-group">
                           
                              <label> <?php echo $this->lang->line('user_name');?><?php echo required_symbol();?></label>
                              
                              
                                <?php
                                
                    $val='';
                    if(isset($profile_info) && !empty($profile_info))
                    {
                        $val = $profile_info->username;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('user_name');
                    }
                    
                    $element = array('name'=>'user_name',
                    'value'=>$val,
                    'class'=>'form-control');
                    echo form_input($element).form_error('user_name');
                    ?>
                              
                           </div>
                           
                           
                          
                           <div class="form-group">
                              <label> <?php echo $this->lang->line('email');?><?php echo required_symbol();?> </label>
                              
                                <?php
                                
                    $val='';
                    if(isset($profile_info) && !empty($profile_info))
                    {
                        $val = $profile_info->email;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('email');
                    }
                    
                    $element = array('name'=>'email',
                    'value'=>$val,
                    'class'=>'form-control',
                    'readonly'=>true);
                    echo form_input($element).form_error('email');
                    ?>
                    
                           </div>
                           
                           
                           
                          
                           <div class="form-group">
                              <label> <?php echo $this->lang->line('mobile_number');?> <?php echo required_symbol();?></label>
                            
                                <?php
                                
                    $val='';
                    if(isset($profile_info) && !empty($profile_info))
                    {
                        $val = $profile_info->phone;
                    }
                    else if(isset($_POST))
                    {
                        $val = set_value('phone');
                    }
                    
                    $element = array('name'=>'phone',
                    'value'=>$val,
                    'class'=>'form-control',
                    'maxlength'=>30);
                    echo form_input($element).form_error('phone');
                    ?>
                    
                           </div>
                           
                           
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        <div class="col-md-6">
                        
                           <div class="form-group">
                              <label><?php echo $this->lang->line('first_name');?><?php echo required_symbol();?></label>
                            
                            <?php
                                
                            $val='';
                            if(isset($profile_info) && !empty($profile_info))
                            {
                                $val = $profile_info->first_name;
                            }
                            else if(isset($_POST))
                            {
                                $val = set_value('first_name');
                            }
                            
                            $element = array('name'=>'first_name',
                            'value'=>$val,
                            'class'=>'form-control');
                            echo form_input($element).form_error('first_name');
                            ?>
                    
                           </div>
                           
                           
                           
                           <div class="form-group">
                              <label><?php echo $this->lang->line('last_name');?></label>
                             
                              <?php
                                
                            $val='';
                            if(isset($profile_info) && !empty($profile_info))
                            {
                                $val = $profile_info->last_name;
                            }
                            else if(isset($_POST))
                            {
                                $val = set_value('last_name');
                            }
                            
                            $element = array('name'=>'last_name',
                            'value'=>$val,
                            'class'=>'form-control');
                            echo form_input($element).form_error('last_name');
                            ?>
                            
                           </div>
                           
                           
                           <div class="form-group">
                           <div>
                            <input type="submit" class="btn btn-danger mt-3" name="submit" value="Update" >
                           </div>
                           </div>
                           
                        </div>
                        <?php echo form_close();?>
                        
                        
                        </div>
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript"> 
   (function($,W,D)
   {
      var JQUERY4U = {};
   
      JQUERY4U.UTIL =
      {
          setupFormValidation: function()
          {
              //Additional Methods			
   		
   $.validator.addMethod("lettersonly",function(a,b){return this.optional(b)||/^[a-z ]+$/i.test(a)},"<?php echo $this->lang->line('valid_name');?>");
   		
   		$.validator.addMethod("phoneNumber", function(uid, element) {
   			return (this.optional(element) || uid.match(/^[- +()]*[0-9][- +()0-9]*$/));
   		},"<?php echo $this->lang->line('valid_number');?>");
   
   	
   		//form validation rules
              $("#profile_form").validate({
                  rules: {
                      user_name: {
                          required: true,
   			                  lettersonly: true,
                          maxlength:30
                      },
                   	email:{
                   		required: true,
                   		email: true
                   	},
                   	phone: {
                       required: true,
                   		 phoneNumber: true,
                   		rangelength: [9, 30]
                    },
                   	first_name:{
                   		required: true,
                   		lettersonly: true,
                      maxlength:30
                   	},
                    last_name: {
                      maxlength:30
                    }
   	          },
   			
   			  messages: {
   				     user_name:{
               		required: "<?php echo $this->lang->line('user_name_valid');?>"
               	},
               	email:{
               		required: "<?php echo $this->lang->line('email_valid');?>"
               	},
               	phone:{
               		required: "<?php echo $this->lang->line('phone_valid');?>"
               	},
               	first_name:{
               		required: "<?php echo $this->lang->line('first_name_valid');?>"
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