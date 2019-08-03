<div class="col-md-10 padding white right-p">
          <div class="content">
        <?php echo $this->session->flashdata('message'); ?>
          <div class="col-md-12 padding-p-r">
            <div class="module">
			<div class="main-hed"> 
			 <?php echo $this->lang->line('airport_cars');?>
			
			</div>
			
					
                  <div class="module-head">
                <h3><?php echo $this->lang->line('airport_cars');?></h3>
				 
			<a class="btn btn-primary add-btn" href="<?php echo site_url();?>settings/airportCars/Add">
					<i class="fa fa-plus">&nbsp;<?php echo $this->lang->line('add');?></i></a>
					
		 
              </div>
			  
			 
                  <div class="module-body">
				  
				  
				    
					
                <table id="example" class="cell-border example" cellspacing="0" width="100%">
                      <thead>
                    <tr>
                          <th>#</th>
						  <th><?php echo $this->lang->line('airport');?></th>
                          <th><?php echo $this->lang->line('location');?></th>
                           <th><?php echo $this->lang->line('vehicle');?></th>
						   <th><?php echo $this->lang->line('cost');?></th>
						   <th><?php echo $this->lang->line('status');?></th>
						   <th><?php echo $this->lang->line('action');?></th>
                        </tr>
                  </thead>
                      <tfoot>
                    <tr>
                        <th>#</th>
						<th><?php echo $this->lang->line('airport');?></th>
                          <th><?php echo $this->lang->line('location');?></th>
                           <th><?php echo $this->lang->line('vehicle');?></th>
						   <th><?php echo $this->lang->line('cost');?></th>
						   <th><?php echo $this->lang->line('status');?></th>
						   <th><?php echo $this->lang->line('action');?></th>
                        </tr>
                  </tfoot>
						
                        
					<?php if (!empty($airport_cars)) {?>	
					 <tbody>
					 
					 <?php 
					 $i=1;
					 foreach($airport_cars as $row):?>
                    <tr>
						  <td><?php echo $i; $i++;?></td>
                          <td><?php echo $row->airport_name;?></td>
                          <td><?php echo $row->location_name;?></td>
						  <td><?php echo $row->name;?></td>
						  <td><?php echo $row->cost;?></td>
						  <td><?php echo $row->status;?></td>
						  <td>
						  
						  <a class="btn btn-warning" type="button" href="<?php echo site_url();?>settings/airportCars/Edit/<?php echo $row->id?>" ><i class="fa fa-edit"></i></a>
						 
						<button class="btn btn-danger" data-toggle="modal" data-target="#myModal" onclick="changeDeleteId(<?php echo $row->id;?>)" ><i class="fa fa-trash"></i></button>

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
        </div>
		
		
		
		
		

		<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?php echo $this->lang->line('close');?></span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('warning');?></h4>
      </div>
      <div class="modal-body">
      <?php echo $this->lang->line('sure_delete');?>
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-default" id="delete_no" href="<?php echo site_url(); ?>/settings/airportCars/Delete/<? echo $row->id; ?>"> <?php echo $this->lang->line('yes');?></a>
		<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('close');?></button>
        
      </div>
    </div>
  </div>
</div>
<script>
function changeDeleteId(x) {
   
	var str = "<?php echo site_url(); ?>/settings/airportCars/Delete/" + x;
	
    $("#delete_no").attr("href",str);
 
}
</script>