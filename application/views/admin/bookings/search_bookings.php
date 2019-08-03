<div class="main-container nine-bmc bmc-remove">
          
           <div class="content">

      <div class="main-hed">
         <a href="<?php echo site_url();?>auth"><?php echo $this->lang->line('home');?></a> >>  <a href="<?php echo site_url();?>bookings"><?php echo $this->lang->line('bookings');?></a> >>
         <?php if(isset($title)) echo $title;?>
      </div>

  <div class="col-md-6">
    
         <div class="module">
           
            <div class="module-head">
               <h3><?php if(isset($title)) echo $title;?></h3>
            </div>

            <?php echo $this->session->flashdata('message');?>

    

            
            <div class="module-body">

             
            
               <?php $attributes = array('name' => 'search_bookings_form', 'id' => 'search_bookings_form');
                  echo form_open(site_url().'bookings/get_search_bookings',$attributes);?>            
               
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('from_date');?><?php echo required_symbol();?></label>      
                     <input type="text" name="from_date" placeholder="<?php echo $this->lang->line('enter_from_date');?>" data-beatpicker="true" 
                        value="<?php echo set_value('from_date');?>" data-beatpicker-format="['<?php echo $date_elem1;?>','<?php echo $date_elem2;?>','<?php echo $date_elem3;?>'],separator:'<?php echo $seperator;?>'"/> 
                      <?php echo form_error('from_date');?>
                  </div>

                 
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('to_date');?><?php echo required_symbol();?></label>    
                     <input type="text" name="to_date" placeholder="<?php echo $this->lang->line('enter_to_date');?>" data-beatpicker="true"  
                        value="<?php echo set_value('to_date');?>"  data-beatpicker-format="['<?php echo $date_elem1;?>','<?php echo $date_elem2;?>','<?php echo $date_elem3;?>'],separator:'<?php echo $seperator;?>'"/> 
                        <?php echo form_error('to_date'); ?>   
                  </div>
                  
                  <input type="submit" value="Submit" name="search_bookings" />
               
                <?php echo form_close();?>  
            </div>

           


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
             $("#search_bookings_form").validate({
                 rules: {
                     from_date: {
                         required: true
                     },
                     to_date: {
                         required: true
                     }
                 },
                 messages: {
                    from_date: {
                        required: "<?php echo $this->lang->line('from_date_valid');?>"
                    },
                    to_date: {
                        required: "<?php echo $this->lang->line('to_date_valid');?>"
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