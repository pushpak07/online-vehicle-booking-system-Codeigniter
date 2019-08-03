<div class="container-fluid">
   <div class="container">
      <div class="row">
         <div class="col-md-5 col-xs-12 padding-p-l">
         </div>
         <div class="col-md-12">
            <div class="col-md-5 col-xs-12 padding-p-l">
            </div>
         </div>
         <div id="total-login">
            <?php echo form_open('auth/login'); ?>
            <div class="first-row">
               <div class="login-head"><?php echo $this->lang->line('login_heading');?></div>
               <?php echo validation_errors();
                  echo $this->session->flashdata('message');
                  ?>
            </div>
            <div class="col-md-12 col-xs-12">
               <div class="input-group input-group-lg in-ty"> <span class="input-group-addon icon-user"> <i class="fa fa-user"></i></span>
                  <input type="email" name="identity" placeholder="Username" class="us" required>
               </div>
            </div>
            <div class="col-md-12 col-xs-12">
               <div class="input-group input-group-lg in-ty"> <span class="input-group-addon icon-user"> <i class="fa fa-lock"></i> </span>
                  <input type="password" class="us" name="password"  placeholder="Password">
               </div>
            </div>
            <div class="col-md-12 col-xs-12">
               <div class="login-btn"> <input class="login-btn" type="submit" value="Login"/> </div>
            </div>
            <?php echo form_close(); ?>
            <div class="forget-pass"><?php echo $this->lang->line('forgot_pwd_msg');?></div>
         </div>
      </div>
   </div>
</div>