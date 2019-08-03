  <!--content-->
        <div class="main-container nine-bmc bmc-remove">
          
           <div class="content">


<script type="text/javascript" src="<?php echo JS_CHARTS;?>"></script>

<script type="text/javascript">
   google.load("visualization", "1", {packages:["corechart"]});
   google.setOnLoadCallback(drawChart);
   function drawChart() {
   
     /****** Data of Pie Chart for Users & Status ******/
   /*var data = google.visualization.arrayToDataTable([
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
       <?php if(isset($result)) echo $result;?>
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
   
     <?php if($n!=0 || $e!=0 || $im!=0 || $ie!=0) { ?>
	 chart.draw(data, options);
	 <?php } ?>
   
   /****** Object of Bar Chart for Recent Bookings ******/
   var recentBookingsChart = new google.visualization.BarChart(document.getElementById('chart_div'));
   
      <?php if(isset($result)) { ?>
	 recentBookingsChart.draw(recentBookingsData, recentBookingsoptions);
	 <?php } ?>
   
   }
</script>
<style>
.no_chart {
	color: #000;
    font-size: 14px;
    line-height: 200px;
}

</style>




<div class="row">
<div class="col-md-12">



      <div class="btn-controls">
         <div class="btn-box-row row-fluid">
         
         
            
            <div class="first-box">
               <a href="<?php echo site_url();?>bookings/add_booking" class="btn-box big"><i class="fa fa-plus fa-3x"></i><b><?php echo $b;?></b>
               </a>
               <p><?php echo $this->lang->line('add_booking');?></p>
            </div>
            
            
            
            <div class="first-box">
               <a href="<?php echo site_url();?>bookings/search_bookings" class="btn-box big">
               <i class="fa fa-calendar fa-3x"></i><b>Y/M/D</b>
               </a> 
               <p> <?php echo $this->lang->line('search_bookings');?></p>
            </div>
            
            
            
            <div class="first-box">
               <a href="<?php echo site_url();?>customers" class="btn-box big"><i class="fa  fa-group fa-3x"></i><b><?php echo $n;?></b>
               </a>  
               <p><?php echo $this->lang->line('customers');?></p>
            </div>
            
            
            
            <div class="first-box">
               <a href="<?php echo site_url();?>executives" class="btn-box big"><i class="fa  fa-group fa-3x"></i><b><?php echo $e;?></b>
               </a>  
               <p><?php echo $this->lang->line('executives');?></p>
            </div>
            
            
            
            <div class="first-box">
               <a href="<?php echo site_url();?>vehicles" class="btn-box big"><i class="fa fa-cab fa-3x"></i><b><?php echo $v;?></b>
               </a>      
               <p><?php echo $this->lang->line('vehicles');?></p>
            </div>
            
            
            
            <div class="first-box">
               <a href="<?php echo site_url();?>locations" class="btn-box big"><i class="fa fa-plane fa-3x"></i><b><?php echo $a;?></b>
               </a> 
               <p><?php echo $this->lang->line('locations');?></p>
            </div>
            
            
            
            <div class="first-box">
               <a href="<?php echo site_url();?>settings/packages" class="btn-box big"><i class="fa fa-th fa-3x"></i><b><?php echo $p;?></b>
               </a>    
               <p><?php echo $this->lang->line('packages');?></p>
            </div>
            
            
            
            <div class="first-box">
               <a href="<?php echo site_url();?>settings/site_settings" class="btn-box big"><i class="fa fa-anchor fa-3x"></i><b>Site</b>
               </a> 
               <p><?php echo $this->lang->line('settings');?></p>
            </div>
            
            
            
         </div>
      </div>
      <!--/#btn-controls--> 
      
      
       <a href="<?php echo SITEURL;?>document" target="_blank" class="documentation-btn">Documentation</a>
		 <style type="text/css">
		 	.documentation-btn{
		 		position: fixed;
    display: inline-block;
    top: 45%;
    right: -62px;
    z-index: 9999;
    background: rgb(0, 214, 100);
    text-shadow: 1px 1px #07964a;
    color: #fff;
    padding: 8px 20px;
    font-size: 14px;
    font-weight: 700;
    border-radius: 0 0 2px 2px;
    box-shadow: 0 17px 17px 0 rgba(0,0,0,.06);
    -ms-transform: rotate(90deg);
    -webkit-transform: rotate(90deg);
    transform: rotate(90deg);
    letter-spacing: 1.5px;
		 	}.documentation-btn:hover{color: #fff}
		 </style>
      
      
      <!--/.module-->
      <div class="col-md-12 padding">
      
      
        <!--Chart of Users-->
         <div class="col-md-6 padding-p-l">
            <div class="module">
               <div class="module-head">
                  <h3><i class="fa fa-pie-chart"></i> <?php echo $this->lang->line('chart_of_users');?></h3>
               </div>
               <div class="module-body">
                  <div id="piechart_3d" class="threed" style="width:515px;height:200px;"><?php if($n==0 && $e==0 && $im==0 && $ie==0) { echo "<p align='middle' class='no_chart'>".$this->lang->line('no_users')."</p>"; }?></div>
               </div>
            </div>
         </div>
         
         
         
         <!--Chart of Recent Bookings-->
         <div class="col-md-6 padding-p-r">
            <div class="module">
               <div class="module-head">
                  <h3><i class="fa fa-bar-chart-o fa-fw"></i> <?php echo $this->lang->line('chart_of_recent_bookings');?></h3>
               </div>
               <div class="module-body">
                  <div id="chart_div" class="threed" style="width:515px;height:200px;"> <?php if(!isset($result)) { echo "<p align='middle' class='no_chart'>".$this->lang->line('no_recent_bookings')."</p>"; }?></div>
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
                     <?php if (!empty($customers)) {?>
                     <tbody>
                        <?php 
                           $i=1;
                           foreach($customers as $row):?>
                        <tr>
                           <td><?php echo $i++; ?> </td>
                           <td><?php echo $row->first_name;?></td>
                           <td><?php echo $row->phone;?></td>
                           <td><?php echo $row->date_of_registration;?></td>
                           
                        </tr>
                        <?php endforeach;?>  
                     </tbody>
                     <?php } ?>
                     
                  </table>
                  <a href="<?php echo site_url();?>customers" style="text-decoration:none;"><input type="button" value="<?php echo $this->lang->line('view_all');?>"></a>
               </div>
            </div>
         </div>

      </div>
      <!--/.module--> 



  
   <!--/.content--> 
</div>
<!--/.span9--> 

</div>






</div>
  
          

        </div>
        <!--content-->