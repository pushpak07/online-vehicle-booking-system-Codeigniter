<?php $this->load->view('site/common/auth/header.php');?>



        <div class="container">
            <div class="row">
               <div class="col-md-6 col-md-offset-3">
                  <div id="total-login" class="login-box">

                     <?php 
                         $attributes = array("name" => 'reset_password_form',"id" => 'reset_password_form');
                     echo form_open(site_url().'auth/reset_password/' . $code,$attributes);?>

                     <div class="first-row">
                        <div class="login-head"><?php echo lang('reset_password_heading');?></div>
                     </div>

                     <?php echo $this->session->flashdata('message'); ?>

                     <div  class="login-box-body">


                      <div class="col-md-12 col-xs-12">
                        <div class="input-group input-group-lg in-ty">
                           <label for="new_password"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length);?></label> <br />
                           <?php echo form_input($new_password);?>
                           <?php echo form_error('new');?>
                        </div>
                     </div>

                     <div class="col-md-12 col-xs-12">
                        <div class="input-group input-group-lg in-ty">
                           <?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm');?> <br />
                           <?php echo form_input($new_password_confirm);?>
                           <?php echo form_error('new_confirm');?>
                        </div>
                     </div>

                     <?php echo form_input($user_id);?>
                     <?php echo form_hidden($csrf); ?>
                      <div class="col-md-12 col-xs-12">
                       <div class="mt-2">

                        <?php echo form_submit('submit', lang('reset_password_submit_btn'),'class="btn btn-danger btn-block"');?>
                         </div>
                     </div>

                      <div class="forget-pass"> 
                        
                     </div>
                     

                     </div>

                     <?php echo form_close(); ?>
                  </div>
                  <div class="shadow"></div>
                  <div class="col-md-10">
                     <div id="fp" > 
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>



   </body>
</html>