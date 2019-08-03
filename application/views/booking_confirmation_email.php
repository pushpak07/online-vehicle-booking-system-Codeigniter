<?php $locale_info = localeconv(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php if(isset($site_settings->site_title) && $site_settings->site_title != "") 
		  echo $site_settings->site_title;
		else echo "Vehicle Booking System";?></title>
      <style>
         body , html { margin:0; color:#000;  font-size:14px; padding:0; height:100%; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; font-size:13px; }
         .new-tb td, th {
         border: 0px solid #c2c2c2 !important;
         text-align: left;   padding:0px 7px}
         .new-tb table, tr {
         border: 0px solid #c2c2c2 !important;
         }
         .thed1{
         border-bottom:1px solid #a60000; border-top:1px solid #a60000;
         }
         .bm{
         }
         .bm1{
         border:1px solid #dc0101 !important
         }
         .idtd{max-width:250px; background-color:#a60000; padding:6px; margin:6px; border-radius:5px; color:#fff;  }
         .inv{ color:#a60000; border-bottom:1px solid #a60000;}
         .idtd2 {
         background-color: #a60000;
         color: #fff;
         padding: 6px;
         }
         .idtd1{max-width:250px;  padding:0px 6px; margin:6px; 	border-bottom:1px solid #a60000; border-top:1px solid #a60000; }
         .padd-tb{ padding:1px !important }
         .ve1{   float: left;
         margin: 0 5px;
         width: 76px; }
         .ve12{  float: left;
         margin: 0 5px;
         width: 94.5%;}
         .ve13{float: left;
         margin: 0 5px;
         width: 46.2%;}
         .pmf{float: left;
         margin: 0 5px;
         width:30%;} 
      </style>
   </head>
   <body>
      <?php //echo "<pre>"; print_r($journey_details); die();?>
      <div class="mailer" style="border: 1px solid #9f2525;
         float: left;
         height: auto;
         max-width: 800px;  background:url(<?php echo base_url();?>assets/system_design/email_format_images/bg.png) #000; color:#fff;
         ">
         <div class="hedder" style=" width:100%; float:left;"> <img src="<?php echo base_url();?>assets/system_design/email_format_images/mailer.png" width="100%"  /></div>
         <div class="content" style=" float: left; line-height: 25px; padding: 0 0 0 135px; width: 80%;">
            <div class="new-tb" style="margin: 0 auto; color:#fff; max-width: 700px; width: 100%;">
               <table width="100%" border="0">
                  <thead>
                     <tr>
                        <th colspan="5">
                           <h2> <?php echo $this->lang->line('passenger_details');?></h2>
                        </th>
                     </tr>
                     <tr>
                        <th><?php echo $user['username'];?></th>
                        <th><?php echo $user['email'];?></th>
                        <th><?php echo $user['phone'];?></th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td colspan="2">
                           <h2> <?php echo $this->lang->line('booking_details');?></h2>
                        </td>
                     </tr>
                     <tr class="bm" style="border-bottom:1px solid #dc0101 !important">
                        <td colspan="2">
                           <strong> <?php echo $this->lang->line('pick_point');?>: </strong> 
                           <?php echo $journey_details['pick_up'];?> 
                        </td>
                        <td colspan="2">
                           <strong> <?php echo $this->lang->line('pick_date_vehicles');?> : </strong><br/><?php echo $journey_details['pick_date'];?>
                        </td>
                        <td>
                           <strong> <?php echo $this->lang->line('booking_reference_no');?> : </strong><br/><?php echo $journey_details['booking_ref'];?>
                        </td>
                     </tr>
                     <tr class="bm" style="border-bottom:1px solid #dc0101 !important">
                        <td colspan="2"><strong> <?php echo $this->lang->line('drop_point');?>: </strong>
                           </br><?php echo $journey_details['drop_of'];?><br/> 
                        </td>
                        <td colspan="2"><strong> <?php echo $this->lang->line('pick_time_vehicles');?> : </strong><br/><?php echo $journey_details['pick_time'];?></td>
                        <td>  <strong> <?php echo $this->lang->line('distance');?> : </strong><br/><?php echo $journey_details['total_distance'];?></td>
                     </tr>
                  </tbody>
               </table>
               <table width="100%" border="0">
                  <thead class="thed" style="background-color: #fff; color: #000;">
                     <tr>
                        <th>Cab</th>
                        <th class="tb-ri" style="text-align: right !important;"> <?php echo $this->lang->line('amount');?></th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td><?php echo $journey_details['car_name'];?></td>
                        <td class="tb-ri" style="text-align: right !important;"><?php echo $locale_info['currency_symbol']." ".$journey_details['total_cost'];?></td>
                     </tr>
                  </tbody>
                <!--  <tfoot>
                     <tr>
                        <th> </th>
                        <th></th>
                        <th class="tb-ri" style="text-align: right !important;">Tax</th>
                        <th class="tb-ri" style="text-align: right !important;">3.50</th>
                     </tr>
                     <tr>
                        <th> </th>
                        <th></th>
                        <th class="tb-ri" style="text-align: right !important;" >Total</th>
                        <th class="tb-ri" style="text-align: right !important;"> 665.00 </th>
                     </tr>
                  </tfoot>	-->
               </table>
               NOTE: Confirmation email will be sent on approval.
            </div>
         </div>
      </div>
   </body>
</html>