  <!--content-->
        <div class="main-container nine-bmc bmc-remove">
          
           <div class="content">


<script type="text/javascript" src="<?php echo JS_CHARTS;?>"></script>

<script type="text/javascript">
   google.load("visualization", "1", {packages:["corechart"]});
   google.setOnLoadCallback(drawChart);
   function drawChart() {
   
     /****** Data of Pie Chart for Users & Status ******/
  /* var data = google.visualization.arrayToDataTable([
       ['<?php echo $this->lang->line('users');?>', '<?php echo $this->lang->line('no_of_users');?>'],
       ['<?php echo $this->lang->line('active')." ".$this->lang->line('customers');?>', <?php echo $n;?>],
       ['<?php echo $this->lang->line('active_executives');?>', <?php echo $e;?>],
       ['<?php echo $this->lang->line('inactive')." ".$this->lang->line('customers');?>', <?php echo $im;?>],
       ['<?php echo $this->lang->line('inactive_executives');?>', <?php echo $ie;?>]
     ]);*/
  
   var data = google.visualization.arrayToDataTable([
       ['<?php echo $this->lang->line('users');?>', '<?php echo $this->lang->line('no_of_users');?>'],
       ['<?php echo $this->lang->line('active')." ".$this->lang->line('customers');?>', <?php echo $n;?>],
       ['<?php echo $this->lang->line('active_executives');?>', <?php echo $e;?>],
       
     ]);


   /****** Data of Bar Chart for Recent Bookings ******/
   var recentBookingsData = google.visualization.arrayToDataTable([
       <?php echo $result;?>
     ]);
   
     /****** Options of Pie Chart for Users & Status ******/
   var options = {
   title: '<?php echo $this->lang->line('users')." & ".$this->lang->line('status');?>',
       is3D: true
     };
   
   /****** Options of Bar Chart for Recent Bookings ******/
   var recentBookingsoptions = {
       title: '<?php echo $this->lang->line('recent_bookings');?>',
   is3D: true,
       vAxis: {title: '<?php echo $this->lang->line('date_of_booking');?>',  titleTextStyle: {color: 'red'}}
     };
   
     /****** Object of Pie Chart for Users & Status ******/
   var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
   
     chart.draw(data, options);
   
   /****** Object of Bar Chart for Recent Bookings ******/
   var recentBookingsChart = new google.visualization.BarChart(document.getElementById('chart_div'));
   
     recentBookingsChart.draw(recentBookingsData, recentBookingsoptions);
   
   }
</script>


<div class="row">
<div class="col-md-12">
   
     
     
      <!--/#btn-controls--> 

     <!--/.module-->
      <div class="col-md-12 padding">

         <div class="col-md-6 padding-p-l">
            <div class="module">
               <div class="module-head">
                  <h3><i class="fa fa-pie-chart"></i> <?php echo $this->lang->line('chart_of_users');?></h3>
               </div>
               <div class="module-body">
                  <div id="piechart_3d" class="threed" style="width:515px"></div>
               </div>
            </div>
         </div>
         <div class="col-md-6 padding-p-r">
            <div class="module">
               <div class="module-head">
                  <h3><i class="fa fa-bar-chart-o fa-fw"></i> <?php echo $this->lang->line('chart_of_recent_bookings');?></h3>
               </div>
               <div class="module-body">
                  <div id="chart_div" class="threed" style="width:515px"></div>
               </div>
            </div>
         </div>
      </div>


      <div class="col-md-12 padding">
         <div class="col-md-6 padding-p-l">
            <div class="module">
               <div class="module-head">
                  <h3><?php echo $this->lang->line('today_bookings');?></h3>
               </div>
               <div class="module-body">
                  <table class="table table-striped">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th><?php echo $this->lang->line('user_name');?></th>
                           <th><?php echo $this->lang->line('pick_date');?></th>
                           <th><?php echo $this->lang->line('pick_time');?></th>
                           <th><?php echo $this->lang->line('action');?></th>
                        </tr>
                     </thead>
                     <?php if (!empty($todaybookings)) {?>
                     <tbody>
                        <?php 
                           $i=1;
                           foreach($todaybookings as $row):?>
                        <tr>
                           <td><?php echo $i++; ?> </td>
                           <td><?php echo $row->registered_name?></td>
                           <td><?php echo $row->pick_date?></td>
                           <td><?php echo $row->pick_time?></td>
                           <td><a href="<?php echo site_url();?>bookings/view_details/<?php echo $row->id; ?>" style="text-decoration:none;"><?php echo $this->lang->line('view_details');?></a></td>
                        </tr>
                        <?php endforeach;?>      
                     </tbody>
                     <?php } ?>
                  </table>
                  <a href="<?php echo site_url();?>bookings" style="text-decoration:none;"><input type="button" value="<?php echo $this->lang->line('view_all');?>"></a>
               </div>
            </div>
         </div>
         
         
         <div class="col-md-6 padding-p-r">
            <div class="module">
               <div class="module-head">
                  <h3><?php echo $this->lang->line('latest_users');?></h3>
               </div>
               <div class="module-body">
                  <table class="table table-striped">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th><?php echo $this->lang->line('user_name');?></th>
                           <th><?php echo $this->lang->line('phone');?></th>
                           <th><?php echo $this->lang->line('reg_date');?></th>
                           
                        </tr>
                     </thead>
                     <tbody>
                        <?php 
                           $i=1;
                           foreach ($customers as $row):?>
                        <tr>
                           <td><?php echo $i++; ?> </td>
                           <td><?php echo $row->first_name;?></td>
                           <td><?php echo $row->phone;?></td>
                           <td><?php echo $row->date_of_registration;?></td>
                         
                        </tr>
                        <?php endforeach;?>  
                     </tbody>
                  </table>
                  
               </div>
            </div>
         </div>
         
         
      </div>
      <!--/.module--> 
  
   <!--/.content--> 
</div>
<!--/.span9--> 
</div>
<!--/.container--> 


</div>
<!--/.wrapper-->

</div>

