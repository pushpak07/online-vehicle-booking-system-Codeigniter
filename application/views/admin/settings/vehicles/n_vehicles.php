
    <div class="main-container nine-bmc bmc-remove">
   <div class="content">
      <div class="main-hed">
         <a href="<?php echo site_url();?>auth"><?php echo $this->lang->line('home');?></a>
         <?php if(isset($title)) echo " >> Vehicle Settings >>  ".$title; ;?>
      </div>


       
<?php echo $this->session->flashdata('message');?>

      
         <div class="module">
         
           

            <div class="module-head">

               
      
      <div class="row bmc-row">
       <div class="col-lg-8 col-md-8 col-sm-12">
          <h3><?php if(isset($title)) echo $title;?></h3>
       </div>
       <div class="col-lg-3 col-md-3 col-sm-12">
          <!--Multi Operation-->
            <div class="form-group filerSear clearfix"> 
       
                <select name="multioperation" id="multioperation" onchange="javascript:multioperationfunction(this.value, '<?php echo site_url().'vehicles/delete_record';?>', '<?php echo site_url().'vehicles/statustoggle';?>')">

                <option selected="" disabled="" value=""><?php echo $this->lang->line('select')?></option>

        <option value="delete"><?php echo $this->lang->line('delete')?></option>

        <option value="Active"><?php echo $this->lang->line('activate')?></option>

        <option value="Inactive"><?php echo $this->lang->line('deactivate')?></option>                

              </select>

            </div>
      <!--Multi Operation-->
       </div>
       <div class="col-lg-1 col-md-1 col-sm-12">
        
         <a class="btn btn-primary add-btn" href="<?php echo site_url();?>vehicle_settings/vehicles/Add" title="Add Vehicle">
               <i class="fa fa-plus"></i></a>

       </div>
      </div>
            </div>

            
            <div class="module-body">
            
            <div class="table-responsive">
            
               <table id="example" class="display responsive nowrap" width="100%" cellspacing="0">
                  <thead>
                     <tr>
                     
                         <th><input id="checkbox-1" class="checkbox-custom selectall" name="checkbox-1" type="checkbox" onclick="selectall(this,'checkbox_class')"></th>
                        
                        <th><?php echo $this->lang->line('image');?></th>
                        <th><?php echo $this->lang->line('name');?></th>
                        <th><?php echo $this->lang->line('category');?></th>
                        
                        <th><?php echo $this->lang->line('fuel_type');?></th>
                        <th><?php echo $this->lang->line('cost_type');?></th>
                        
                        <th><?php echo $this->lang->line('status');?></th>
                      
                        <th><?php echo $this->lang->line('operations');?></th>
                     </tr>
                  </thead>
                  <tfoot>
                     <tr>
                         <th><input id="checkbox-1" class="checkbox-custom selectall" name="checkbox-1" type="checkbox" onclick="selectall(this,'checkbox_class')"></th>
                         
                        <th><?php echo $this->lang->line('image');?></th>
                        <th><?php echo $this->lang->line('name');?></th>
                        <th><?php echo $this->lang->line('category');?></th>
                        
                        <th><?php echo $this->lang->line('fuel_type');?></th>
                        <th><?php echo $this->lang->line('cost_type');?></th>
                        
                        <th><?php echo $this->lang->line('status');?></th>
                      
                        <th><?php echo $this->lang->line('operations');?></th>
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
