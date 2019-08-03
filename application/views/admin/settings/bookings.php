<?php $locale_info = localeconv(); ?>
<div class="col-md-10 padding white right-p">
   <div class="content">
      <div class="main-hed"> 
         <a href="<?php echo site_url();?>auth"><?php echo $this->lang->line('home');?></a>
         <?php if(isset($title)) echo " >> Bookings >> ".$title;?>
      </div>
      <?php echo $this->session->flashdata('message'); ?>
      <div class="col-md-12 padding-p-r">
         <div class="module">
            <div class="module-head">
               <h3><?php if(isset($title)) echo $title;?></h3>
               
               <a class="btn btn-primary add-btn" href="<?php echo site_url();?>settings/bookings/Add">
               
               <i class="fa fa-plus">&nbsp;<?php echo $this->lang->line('add');?></i></a>
            </div>
            <div class="module-body">
               <table id="example" class="cell-border example" cellspacing="0" width="100%">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th><?php echo $this->lang->line('booking_ref');?></th>
                        <th><?php echo $this->lang->line('name');?></th>
                        <th><?php echo $this->lang->line('book_date');?></th>
                        <th><?php echo $this->lang->line('pick_date');?></th>
                        <th><?php echo $this->lang->line('pick_time');?></th>
                        <th><?php echo $this->lang->line('pick_point');?></th>
                        <th><?php echo $this->lang->line('drop_point');?></th>
                        <th><?php echo $this->lang->line('distance');?></th>
                        <th><?php echo $this->lang->line('vehicle_selected');?></th>
                        <th><?php echo $this->lang->line('cost_of_journey');?></th>
                        <th><?php echo $this->lang->line('actions');?></th>
                        <th><?php echo $this->lang->line('status');?></th>
                     </tr>
                  </thead>
                  <tfoot>
                     <tr>
                        <th>#</th>
                        <th><?php echo $this->lang->line('booking_ref');?></th>
                        <th><?php echo $this->lang->line('name');?></th>
                        <th><?php echo $this->lang->line('book_date');?></th>
                        <th><?php echo $this->lang->line('pick_date');?></th>
                        <th><?php echo $this->lang->line('pick_time');?></th>
                        <th><?php echo $this->lang->line('pick_point');?></th>
                        <th><?php echo $this->lang->line('drop_point');?></th>
                        <th><?php echo $this->lang->line('distance');?></th>
                        <th><?php echo $this->lang->line('vehicle_selected');?></th>
                        <th><?php echo $this->lang->line('cost_of_journey');?></th>
                        <th><?php echo $this->lang->line('actions');?></th>
                        <th><?php echo $this->lang->line('status');?></th>
                     </tr>
                  </tfoot>
                  
                  <?php if (!empty($bookings)) {?>
                  <tbody>
                     <?php 
                        $i=1;
                        foreach($bookings as $row):
                        
                         $color = "";
                                      switch($row->is_new) {
                                      
                                      case 0: $color = "#FFFFFF"; break;
                                      case 1: $color = "#EFEFEF" ; break;

                        }   
                        ?>
                     <tr style="background-color:<?php echo $color;?>">
                        <td><?php echo $i; $i++;?></td>
                        <td><?php echo $row->booking_ref;?></td>
                        <td><?php echo $row->registered_name;?></td>
                        <td><?php echo $row->bookdate;?></td>
                        <td><?php echo $row->pick_date;?></td>
                        <td><?php echo $row->pick_time;?></td>
                        <td><?php echo $row->pick_point;?></td>
                        <td><?php echo $row->drop_point;?></td>
                        <td><?php echo $row->distance." ".$row->distance_type;?></td>
                        <td><?php echo strToUpper($row->name);?></td>
                        <td><b><?php echo $this->config->item('site_settings')->currency_symbol." ".$row->cost_of_journey; 
						?></b></td>
                        <td>
                           <div class="btn-group">
                              <button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button">
                              <span class="caret"></span></button>
                              <ul class="dropdown-menu menu-drop" role="menu" aria-labelledby="dLabel">
                                 <?php if($row->is_conformed=="pending" || $row->is_conformed=="cancel") { ?>
                                 <li>
                                    <a href="<?php echo site_url();?>settings/bookings/confirm/<?php echo $row->id;?>"><?php echo $this->lang->line('confirm');?></a>
                                 </li>
                                 <?php } ?>
                                 <?php if($row->is_conformed=="pending" || $row->is_conformed=="confirm") { ?>
                                 <li>
                                    <a href="<?php echo site_url();?>settings/bookings/cancel/<?php echo $row->id;?>"><?php echo $this->lang->line('cancel');?></a>
                                 </li>
                                 <?php } ?>

                                 <li>
                                    <a onclick="return confirm('Are you sure to delete?');" href="<?php echo site_url();?>settings/bookings/delete/<?php echo $row->id;?>"><?php echo $this->lang->line('delete');?></a>
                                 </li>

                                 <li><a href="<?php echo site_url();?>admin/bookingDetails/<?php echo $row->id; ?>" target="_blank"><?php echo $this->lang->line('view_details');?></a></li>
                              </ul>
                           </div>
                        </td>
                        <td>
                           <?php if($row->is_conformed=="pending") { ?>
                           <span class="label label-warning"><?php echo $row->is_conformed;?></span>
                           <?php } elseif($row->is_conformed=="confirm") { ?>
                           <span class="label label-success"><?php echo $row->is_conformed;?></span>
                           <?php } elseif($row->is_conformed=="cancelled") { ?>
                           <span class="label label-danger"><?php echo $row->is_conformed;?></span>
                           <?php } ?>
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
            <a type="button" class="btn btn-default" id="delete_no" href="<?php echo site_url();?>settings/bookings/Delete/<? echo $row->id; ?>"><?php echo $this->lang->line('yes');?></a>
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('close');?></button>
         </div>
      </div>
   </div>
</div>
<script>
   function changeDeleteId(x) {
   	var str = "<?php echo site_url();?>settings/bookings/Delete/" + x;
       $("#delete_no").attr("href",str);
   }
</script>