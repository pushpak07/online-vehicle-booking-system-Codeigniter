<div class="col-md-10 padding white right-p">
   <div class="content">
      <div class="main-hed">
         <a href="<?php echo site_url();?>auth"><?php echo $this->lang->line('home');?></a> 
         <?php if(isset($title)) echo " >> ".$title;?>
      </div>
      
      <?php echo $this->session->flashdata('message');?>
      
      <div class="col-md-12 padding-p-r">
         <div class="module">
            <div class="module-head">
               <h3><?php if(isset($title)) echo $title;?></h3>
               
               
               <a class="btn btn-primary add-btn" href="<?php echo site_url();?>drivers/add_driver">
               <i class="fa fa-plus"></i></a>
               
              
            <!--Multi Operation-->
            <div class="form-group filerSear clearfix">        

              <div class="col-lg-3 col-sm-3 col-xs-12 padding-l">

               <select name="multioperation" id="multioperation" onchange="javascript:multioperationfunction(this.value, '<?php echo site_url().'drivers/delete_record';?>', '<?php echo site_url().'drivers/statustoggle';?>')">

                <option selected="" disabled="" value=""><?php echo $this->lang->line('select')?></option>

				<option value="delete"><?php echo $this->lang->line('delete')?></option>

				<option value="Active"><?php echo $this->lang->line('activate')?></option>

				<option value="Inactive"><?php echo $this->lang->line('deactivate')?></option>                

              </select>

              </div>              

            </div>
			<!--Multi Operation-->
            
             
              
               
               
            </div>
            
            <div class="module-body">
            
            <div class="table-responsive">
							
			
            <table id="example" class="display responsive nowrap" width="100%" cellspacing="0">
              
                  <thead>
                     <tr>
                        <th><input id="checkbox-1" class="checkbox-custom selectall" name="checkbox-1" type="checkbox" onclick="selectall(this,'checkbox_class')"></th>
                        <th><?php echo $this->lang->line('user_name');?></th>
                        <th><?php echo $this->lang->line('email');?></th>
                        <th><?php echo $this->lang->line('phone');?></th>
                        <th><?php echo $this->lang->line('license');?></th>
                        <th><?php echo $this->lang->line('status');?></th>
                        <th><?php echo $this->lang->line('action');?></th>
                     </tr>
                  </thead>
                  <tfoot>
                     <tr>
                        <th><input id="checkbox-1" class="checkbox-custom selectall" name="checkbox-1" type="checkbox" onclick="selectall(this,'checkbox_class')"></th>
                        <th><?php echo $this->lang->line('user_name');?></th>
                        <th><?php echo $this->lang->line('email');?></th>
                        <th><?php echo $this->lang->line('phone');?></th>
                        <th><?php echo $this->lang->line('license');?></th>
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
</div>

<div class="modal" tabindex="-1" role="dialog" id="license_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?php echo $this->lang->line('license');?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
       
        <p id="modal_license"></p>
        
      </div>
      
      <div class="modal-footer">
        
        <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo $this->lang->line('close');?></button>
      </div>
    </div>
  </div>
</div>

<script>
function license(value) {
    
    if (value!='') {
        var image = '<img src="'+value+'" class="img-responsive">';
        $("#modal_license").html(image);
        
        $("#license_modal").modal('show');
    } else {
        $("#license_modal").modal('hide');
    }
}
</script>