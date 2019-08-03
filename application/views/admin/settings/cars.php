<div class="col-md-10 padding white right-p">
   <div class="content">
      <div class="main-hed">
         <a href="<?php echo site_url();?>/auth"><?php echo $this->lang->line('home');?></a> 
         <?php if(isset($title)) echo " >> Drivers >> ".$title;?>
      </div>
      <?php echo $this->session->flashdata('message'); ?>
      <div class="col-md-12 padding-p-r">
         <div class="module">
            <div class="module-head">
               <h3><?php echo $title;?></h3>
              <a class="btn btn-primary add-btn" href="<?php echo site_url(); ?>/settings/drivers">
               <i class="fa fa">&nbsp;<?php echo $this->lang->line('drivers');?></i></a>
            <div class="module-body">
               <table id="example" class="cell-border example" cellspacing="0" width="100%">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th><?php echo $this->lang->line('car_image');?></th>
                       <!-- <th><?php echo $this->lang->line('car_name');?></th>-->
						<th><?php echo $this->lang->line('assigned_drivers');?></th>
                    <!--    <th><?php echo $this->lang->line('phone');?></th>
                        <th><?php echo $this->lang->line('status');?></th>
                        <th><?php echo $this->lang->line('action');?></th>-->
                     </tr>
                  </thead>
                  <tfoot>
                     <tr>
                        <th>#</th>
                      	 <th><?php echo $this->lang->line('car_image');?></th>
                       <!--	 <th><?php echo $this->lang->line('car_name');?></th>-->
						<th><?php echo $this->lang->line('assigned_drivers');?></th>
                     </tr>
                  </tfoot>
                  <tbody>
                     <?php 
                        $i=1;
                        foreach($vehicles as $row):?>
                     <tr>
                        <td><?php echo $i; $i++;?></td>
                        <td><img src="<?php echo base_url();?>uploads/vehicle_images/<?php if($row->image != "") echo $row->image; else echo "noimageavailable.jpg";?>" width="10%">
                       <?php  echo "<br />\n";echo $this->lang->line('car_name');echo ":\n";echo $row->name;echo "\n";echo $row->car_number_plate;?></td>
						 
						 
						 <td>
						<?php 
$vehicle_ids = "select * from vbs_assign_cars_driver where vehicle_id= ".$row->id;
$vehicle_ids= $this->db->query($vehicle_ids)->result();


if(isset($vehicle_ids) && count($vehicle_ids)>0 ){
	
	foreach($vehicle_ids as $v){
		$name = "select * from vbs_drivers where id=". $v->driver_id;
		$name = $this->db->query($name)->result();
		//echo "<pre>";print_r($name);die();
		if(isset($name) && count($name)>0 ){
			foreach($name as $n){
				if(isset($n->photo )) {?>
					<img src="<?php echo base_url();?>uploads/driver_images/<?php if($n->photo != "") echo $n->image; else echo "noimage.jpg";?>" width="10%">

			<?php echo "\n";echo $n->name;echo "<br />\n";	}
					
				
			}
		}
		
	}
	
	
}else{
	echo $this->lang->line('not_yet_assigned');						 
}?>



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
