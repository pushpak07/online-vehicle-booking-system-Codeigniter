<div class="col-md-10 padding white right-p">
   <div class="content">
      <div class="col-md-12 padding-p-l">
         <?php echo $this->session->flashdata('message');?>              
         <div class="module">
            <div class="main-hed">
               <a href="<?php echo site_url();?>auth"><?php echo $this->lang->line('home');?></a> 
               <?php if(isset($title)) echo " >> Dashboard >> ".$title;?>
            </div>
            <div class="module-head">
               <h3><?php echo $title;?></h3>
            </div>
            <div class="module-body">
               <div class="col-md-8 padding-p-l">
                  <div class="panel panel-default">
                     <div class="panel-body padding-p-l padding-p-r">
                        <table class="table table-striped">
                        
                           <?php 
                           if (!empty($user)) { ?>
                          
                           <tr>
                              <td><strong><?php echo $this->lang->line('first_name');?> : </strong></td>
                              <td><?php if(isset($user->first_name)) echo $user->first_name;?> </td>
                              <td> <strong><?php echo $this->lang->line('phone');?> :</strong> </td>
                              <td> <?php if(isset($user->phone)) echo $user->phone;?></td>
                           </tr>
                           <tr>
                              <td> <strong><?php echo $this->lang->line('last_name');?> : </strong></td>
                              <td> <?php if(isset($user->last_name)) echo $user->last_name;?> </td>
                              <td> <strong> <?php echo $this->lang->line('email');?>: </strong></td>
                              <td><?php if(isset($user->email)) echo $user->email;?></td>
                           </tr>
                           <tr>
                              <td> <strong><?php echo $this->lang->line('user_name');?>:</strong> </td>
                              <td> <?php if(isset($user->username)) echo $user->username;?> </td>
                              <td> <strong><?php echo $this->lang->line('date_of_registration');?>  :</strong> </td>
                              <td> <?php if(isset($user->date_of_registration)) echo $user->date_of_registration;?> </td>
                           </tr>
                        </table>
                     </div>
                  </div>
				  
                  <div class="form-group">
				  <?php if($this->ion_auth->is_admin()) {?>
                     <?php echo ($user->active) ? anchor("admin/deactivate/".$row->id."/users", lang('index_active'),'class="btn btn-primary"') : anchor("admin/activate/".$user->id."/users", lang('index_inactive'),'class="btn btn-warning"');?>
				  <?php } echo '<a class="btn btn-primary" href="javascript:history.back(-1);"><i class="fa fa-arrow-back"></i> Back</a>';
				  ?>
                  </div>
               </div>
                           <?php } ;?> 
            </div>
         </div>
         <?php echo form_close();?>  
      </div>
   </div>
</div>
</div>