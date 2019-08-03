<div class="col-md-10 padding white right-p">
   <div class="content">
   <?php echo $this->session->flashdata('message'); ?>
      <div class="main-hed">
         <a href="<?php echo site_url();?>auth"><?php echo $this->lang->line('home');?></a> 
         <?php if(isset($title)) echo " >> Bookings >> ".$title;?>
      </div>
      <div class="col-md-12 padding-p-l">
         <div class="module">
            <div class="module-head">
               <h3><?php if(isset($title)) echo $title;?> dfsfdsf</h3>
            </div>
            
            <div class="module-body">
            
               <?php $attributes = array('name' => 'search_bookings_form', 'id' => 'search_bookings_form');
                  echo form_open('settings/searchBookings',$attributes);?>            
               <div class="col-md-6">
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('from_date');?> asdfsdfds</label>      
                     <input type="text" name="from_date" placeholder="<?php echo $this->lang->line('enter_from_date');?>" value="<?php echo set_value('from_date');?>" data-beatpicker="true" /> 

                  </div>
                  <?php echo form_error('from_date'); ?>
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('to_date');?></label>    
                     <input type="text" name="to_date" placeholder="<?php echo $this->lang->line('enter_to_date');?>" data-beatpicker="true" 
                        value="<?php echo set_value('to_date');?>" />    
                  </div>
                  <?php echo form_error('to_date'); ?>
                  <input type="submit" value="Submit" name="submit" />
               </div>
                <?php echo form_close();?>  
            </div>
            
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
            $("#search_bookings_form").validate({
                rules: {
                    from_date: {
                        required: true
                    },
                    to_date: {
                        required: true
                    },

                },

                messages: {
                    from_date: {
                        required: "<?php echo $this->lang->line('from_date_valid');?>"
                    },
                    to_date: {
                        required: "<?php echo $this->lang->line('to_date_valid');?>"
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