 <div class="main-container nine-bmc bmc-remove">

   <div class="content">
      <div class="main-hed"> 
         <a href="<?php echo site_url();?>auth"><?php echo $this->lang->line('home');?></a>
         <?php if(isset($title)) echo " >> Master Settings >> ".$title;?>
      </div>

      <?php echo $this->session->flashdata('message'); ?>

      
         <div class="module">
            <div class="module-head">
               <h3><?php if(isset($title)) echo $title;?></h3>
              
            </div>
            <div class="module-body">
               <table id="example" class="cell-border example" cellspacing="0" width="100%">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th><?php echo $this->lang->line('subject');?></th>
                        <th><?php echo $this->lang->line('sms_template');?></th>
                        <th><?php echo $this->lang->line('action');?></th>
                     </tr>
                  </thead>
                  <tfoot>
                     <tr>
                        <th>#</th>
                        <th><?php echo $this->lang->line('subject');?></th>
                        <th><?php echo $this->lang->line('sms_template');?></th>
                        <th><?php echo $this->lang->line('action');?></th>
                     </tr>
                  </tfoot>
                  
                  <?php if(isset($records) && !empty($records)) {?>
                  <tbody>
                     <?php 
                        $i=1;
                        foreach($records as $r):?>
                     <tr>
                        <td><?php echo $i; $i++;?></td>
                        <td><?php echo $r->subject;?></td>
                        <td><?php echo $r->sms_template;?></td>
                        
                        <td>
                          <?php 
						 echo form_open(site_url().'settings/sms_templates');
						
						 echo form_hidden('sms_template_id',$r->sms_template_id);
						 
						 echo '<button type="submit" name="edit_template" class="btn btn-warning"><i class="fa fa-edit"></i></button>';
						 
						 echo form_close();
						?>
                        </td>
                     </tr>
                     <?php endforeach; ?>
                  </tbody>
                  <?php } ?>
                  
               </table>
            </div>
         </div>
      </div>
      <!--/.module--> 
   </div>
   <!--/.content--> 

