<script type="text/javascript">
   window.onload = function() {
       $('a').tooltip();
   };
</script> 
<?php $locale_info = localeconv(); ?>
<div class="col-md-10 padding white right-p">
   <div class="content">
      <div class="main-hed"> 
         <a href="<?php echo site_url();?>auth"><?php echo $this->lang->line('home');?></a>
         <?php if(isset($title)) { echo " >> ".$sub_title." >>  ".$title; } if(isset($request_from_reports_controller)) echo " (".$overallVehicles.")";?>
      </div>
      <div class="col-md-12 padding-p-r">
         <div class="module">
            <?php echo $this->session->flashdata('message'); ?>
            <div class="module-head">
               <h3> <?php if(isset($title)) echo $title;if(isset($request_from_reports_controller)) echo " (".$overallVehicles.")";?></h3>
               <?php if(!isset($request_from_reports_controller)) { ?>
               <a class="btn btn-primary add-btn" href="<?php echo site_url();?>vehicle_settings/vehicles/Add">
               <i class="fa fa-plus">&nbsp;<?php echo $this->lang->line('add');?></i></a>
               <?php } ?>
            </div>
            
            <div class="module-body">
            
             <div class="table-responsive">
             
               <table id="example" class="cell-border example" cellspacing="0" width="100%">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th><?php echo $this->lang->line('image');?></th>
                        <th><?php echo $this->lang->line('name');?></th>
                        <th><?php echo $this->lang->line('category');?></th>
                        <?php if(isset($request_from_reports_controller)){ ?>
                        <th><?php echo $this->lang->line('fuel_type');?></th>
                        <th><?php echo $this->lang->line('cost_type');?></th>
                        <th><?php echo $this->lang->line('total_vehicles');?></th>
                        <th><?php echo $this->lang->line('confirmed_bookings');?></th>
                        <th><?php echo $this->lang->line('cancelled_bookings');?></th>
                        <th><?php echo $this->lang->line('pending_bookings');?></th>
                        <th><?php echo $this->lang->line('total_bookings');?></th>
                        <?php } else {?>
                        <th><?php echo $this->lang->line('passenger_capacity');?></th>
                        <th><?php echo $this->lang->line('large_luggage_capacity');?></th>
                        <th><?php echo $this->lang->line('small_luggage_capacity');?></th>
                        <th><?php echo $this->lang->line('fuel_type');?></th>
                        <th><?php echo $this->lang->line('cost_type');?></th>
                        <th><?php echo $this->lang->line('status');?></th>
                        <?php } ?>
                        <th><?php echo $this->lang->line('operations');?></th>
                     </tr>
                  </thead>
                  <tfoot>
                     <tr>
                        <th>#</th>
                        <th><?php echo $this->lang->line('image');?></th>
                        <th><?php echo $this->lang->line('name');?></th>
                        <th><?php echo $this->lang->line('category');?></th>
                        <?php if(isset($request_from_reports_controller)){ ?>
                        <th><?php echo $this->lang->line('fuel_type');?></th>
                        <th><?php echo $this->lang->line('cost_type');?></th>
                        <th><?php echo $this->lang->line('total_vehicles');?></th>
                        <th><?php echo $this->lang->line('confirmed_bookings');?></th>
                        <th><?php echo $this->lang->line('cancelled_bookings');?></th>
                        <th><?php echo $this->lang->line('pending_bookings');?></th>
                        <th><?php echo $this->lang->line('total_bookings');?></th>
                        <?php } else {?>
                        <th><?php echo $this->lang->line('passenger_capacity');?></th>
                        <th><?php echo $this->lang->line('large_luggage_capacity');?></th>
                        <th><?php echo $this->lang->line('small_luggage_capacity');?></th>
                        <th><?php echo $this->lang->line('fuel_type');?></th>
                        <th><?php echo $this->lang->line('cost_type');?></th>
                        <th><?php echo $this->lang->line('status');?></th>
                        <?php } ?>
                        <th><?php echo $this->lang->line('operations');?></th>
                     </tr>
                  </tfoot>
                  
                  <?php if (!empty($records)) {?>
                  <tbody>
                     <?php  
                        $i = 1;
                        
                        foreach($records as $r) {
                        
                        ?>
                     <tr>
                        <td><?php echo $i++; ?></td>
                        <td><img src="<?php echo get_vehicle_image($r->image);?>" width="60"></td>
                        <td><?php echo $r->name."<br/><small>".$r->model."</small>";?></td>
                        <td><?php echo $r->category;?></td>
                        <?php if(isset($request_from_reports_controller)) { ?>
                        <td><?php echo ucwords($r->fuel_type);?></td>
                        <td><?php echo ucwords($r->cost_type);?></td>
                        <td><?php echo $r->total_vehicles;?></td>
                        <td><?php echo $r->confirmed_bookings;?></td>
                        <td><?php echo $r->cancelled_bookings;?></td>
                        <td><?php echo $r->pending_bookings;?></td>
                        <td><?php echo $r->total_bookings;?></td>
                        <td align="center">						  
                           <a class="btn btn-primary" href="<?php echo site_url();?>vehicle_settings/vehicles/Edit/<?php echo $r->id;?>" data-toggle="tooltip" data-original-title="<?php echo $this->lang->line('edit');?>" > <i class="fa fa-edit"></i></a>
                        </td>
                        <?php } else { ?>
                        <td><?php echo $r->passengers_capacity;?></td>
                        <td><?php echo $r->large_luggage_capacity;?></td>
                        <td><?php echo $r->small_luggage_capacity;?></td>
                        <td><?php echo ucwords($r->fuel_type);?></td>
                        <td><?php echo ucwords($r->cost_type);?></td>
                        <td><?php echo $r->status;?></td>
                        <td>
                           <a class="btn btn-primary" href="<?php echo site_url();?>vehicle_settings/vehicles/Edit/<?php echo $r->id;?>" data-toggle="tooltip" data-original-title="<?php echo $this->lang->line('edit');?>" > <i class="fa fa-edit"></i></a>
                           <?php if($r->status == "active") { ?>
                           <a class="btn btn-danger" href="<?php echo site_url();?>vehicle_settings/vehicles/change_status/<?php echo $r->id;?>/inactive" onclick="return confirm('<?php echo $this->lang->line("confirm");?>')" data-toggle="tooltip" data-original-title="<?php echo $this->lang->line('make_inactive');?>" > <i class="fa fa-pencil-square-o"></i></a>
                           <?php } elseif($r->status == "inactive") { ?>
                           <a class="btn btn-danger" href="<?php echo site_url();?>vehicle_settings/vehicles/change_status/<?php echo $r->id;?>/active" onclick="return confirm('<?php echo $this->lang->line("confirm");?>')" data-toggle="tooltip" data-original-title="<?php echo $this->lang->line('make_active');?>" > <i class="fa fa-pencil-square-o"></i></a>
                           <?php } ?>
                           <a class="btn btn-danger" data-toggle="modal" data-target="#myModal" onclick="changeDeleteId(<?php echo $r->id;?>)" data-toggle="tooltip" data-original-title="<?php echo $this->lang->line('delete');?>" > <i class="fa fa-trash"></i></a>
                        </td>
                        <?php } ?>
                     </tr>
                     <?php }  ?>
                  </tbody>
                  <?php } ?>
                  
               </table>
               
               </div>
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
            <a type="button" class="btn btn-default" id="delete_no" href=""> <?php echo $this->lang->line('yes');?></a>
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('close');?></button>
         </div>
      </div>
   </div>
</div>
<script>
   function changeDeleteId(x) {
   	var str = "<?php echo site_url();?>vehicle_settings/vehicles/Delete/" + x;
       $("#delete_no").attr("href",str);
   }
</script>