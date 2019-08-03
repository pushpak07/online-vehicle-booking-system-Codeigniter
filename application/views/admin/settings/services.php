<div class="col-md-10 padding white right-p">
          <div class="content">
        <?php echo $this->session->flashdata('message'); ?>
          <div class="col-md-12 padding-p-r">
            <div class="module">
			<div class="main-hed"> 
			 <?php echo $this->lang->line('services');?>
			
			</div>
			
			
			
		
					
                  <div class="module-head">
                <h3><?php echo $this->lang->line('services');?></h3>
				 
			<a class="btn btn-primary add-btn" href="<?php echo site_url(); ?>/settings/services/Add">
					<i class="fa fa-plus">&nbsp;<?php echo $this->lang->line('add');?></i></a>
					
		 
              </div>
			  
			 
                  <div class="module-body">
				  
				  
				    
					
                <table id="example" class="cell-border example" cellspacing="0" width="100%">
                      <thead>
                    <tr>
                          <th>#</th>
						  <th><?php echo $this->lang->line('service');?></th>
                          <th><?php echo $this->lang->line('status');?></th>
                           <th><?php echo $this->lang->line('action');?></th>
                        </tr>
                  </thead>
                      <tfoot>
                    <tr>
                        <th>#</th>
						<th><?php echo $this->lang->line('service');?></th>
                        <th><?php echo $this->lang->line('status');?></th>
						<th><?php echo $this->lang->line('action');?></th>
                        </tr>
                  </tfoot>
                     

					 <tbody>
					 
					 <?php 
					 $i=1;
					 foreach($services as $row):?>
                    <tr>
						  <td><?php echo $i; $i++;?></td>
                          <td><?php echo $row->service;?></td>
                          <td><?php echo $row->status;?></td>
						  <td>
						  
						  <a class="btn btn-warning" type="button" href="<?php echo site_url(); ?>/settings/services/Edit/<?php echo $row->id?>" ><i class="fa fa-edit"></i></a>
						 
						<button class="btn btn-danger" data-toggle="modal" data-target="#myModal" onclick="changeDeleteId(<?php echo $row->id;?>)" ><i class="fa fa-trash"></i></button>

						  </td>
						  
                    </tr>
					<?php endforeach; ?>
             
                   
                  </tbody>
                    </table>
              </div>
                </div>
          </div>
           
        
        <!--/.module--> 
      </div>
          <!--/.content--> 
        </div>
		
		
		
		
		

		<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Warning</h4>
      </div>
      <div class="modal-body">
        Are you sure to delete ?
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-default" id="delete_no" href="<?php echo site_url(); ?>/settings/services/Delete/<? echo $row->id; ?>">Yes</a>
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<script>
function changeDeleteId(x) {
   
	var str = "<?php echo site_url(); ?>/settings/services/Delete/" + x;
	
    $("#delete_no").attr("href",str);
 
}
</script>