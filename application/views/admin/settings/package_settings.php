 <div class="main-container nine-bmc bmc-remove">

   <div class="content">
      <div class="main-hed">
         <a href="<?php echo site_url();?>auth"><?php echo $this->lang->line('home');?></a> >> <?php echo $this->lang->line('master_settings');?> >>
         <?php if(isset($title)) echo $title;?>
      </div>
      <?php echo $this->session->flashdata('message'); ?>
      
         <div class="module">
          
             <div class="module-head">
      
      <div class="row bmc-row">
       <div class="col-lg-8 col-md-8 col-sm-12">
          <h3><?php if(isset($title)) echo $title;?></h3>
       </div>
       <div class="col-lg-3 col-md-3 col-sm-12">
          <!--Multi Operation-->
            <div class="form-group filerSear clearfix"> 
       
              <select name="multioperation" id="multioperation" onchange="javascript:multioperationfunction(this.value, '<?php echo site_url().'settings/delete_package';?>', '<?php echo site_url().'settings/package_statustoggle';?>')">

                <option selected="" disabled="" value=""><?php echo $this->lang->line('select')?></option>

        <option value="delete"><?php echo $this->lang->line('delete')?></option>

        <option value="Active"><?php echo $this->lang->line('activate')?></option>

        <option value="Inactive"><?php echo $this->lang->line('deactivate')?></option>                

              </select>

            </div>
      <!--Multi Operation-->
       </div>
       <div class="col-lg-1 col-md-1 col-sm-12">
         <a class="btn btn-primary add-btn" href="<?php echo site_url();?>settings/addedit_package">
               <i class="fa fa-plus"></i></a>
       </div>
      </div>
            </div>
            
            
            
            <div class="module-body">
            
             <div class="table-responsive">
             
               <table id="example" class="cell-border example" cellspacing="0" width="100%">
                  <thead>
                     <tr>
                      <th><input id="checkbox-1" class="checkbox-custom selectall" name="checkbox-1" type="checkbox" onclick="selectall(this,'checkbox_class')"></th>
                        
                      <th><?php echo $this->lang->line('name');?></th>
                      <th><?php echo $this->lang->line('hours');?></th>
                      <th><?php echo $this->lang->line('distance');?></th>
                      <th><?php echo $this->lang->line('min_cost');?></th>
                      <th><?php echo $this->lang->line('charge_distance');?></th>
                      <th><?php echo $this->lang->line('charge_hour');?></th>
                      <th><?php echo $this->lang->line('status');?></th>
                      <th><?php echo $this->lang->line('action');?></th>
                     </tr>
                  </thead>
                  <tfoot>
                     <tr>
                     
                      <th><input id="checkbox-1" class="checkbox-custom selectall" name="checkbox-1" type="checkbox" onclick="selectall(this,'checkbox_class')"></th>
                        
                      <th><?php echo $this->lang->line('name');?></th>
                      <th><?php echo $this->lang->line('hours');?></th>
                      <th><?php echo $this->lang->line('distance');?></th>
                      <th><?php echo $this->lang->line('min_cost');?></th>
                      <th><?php echo $this->lang->line('charge_distance');?></th>
                      <th><?php echo $this->lang->line('charge_hour');?></th>
                      <th><?php echo $this->lang->line('status');?></th>
                      <th><?php echo $this->lang->line('action');?></th>
                     </tr>
                  </tfoot>
                 
                 
                  <tbody>

                  </tbody>
                  
                 
               </table>
               
            </div>
            
            </div>
            
            
         </div>
      </div>
      <!--/.module--> 
   </div>
   <!--/.content--> 
