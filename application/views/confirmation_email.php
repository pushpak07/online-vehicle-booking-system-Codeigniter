<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <title><?php if(isset($site_settings->site_title) && $site_settings->site_title != "") 
		  echo $site_settings->site_title;
		else echo "Vehicle Booking System";?></title>
      <style>
         body , html { margin:0;  font-size:14px; padding:0; height:100%; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; font-size:13px; }
         .mailer{ 
         border: 1px solid #9f2525;
         float: left;
         height: auto;
         max-width: 800px;  background:url(<?php echo base_url();?>/assets/system_design/email_format_images/bg.png) #000; color:#fff;
         }
         .hedder{ width:100%; float:left; }
         .content { float:left; width:80%; line-height:25px; padding:0px 0px 0px 135px; }
         .new-tb{  
         margin: 0 auto;
         max-width: 700px;}
         .new-tb td, th {
         border: 0px solid #c2c2c2 !important;
         text-align: left;   padding:0px 7px}
         .new-tb table, tr {
         border: 0px solid #c2c2c2 !important;
         }
         .thed{
         background-color:#fff; color: #000;
         }
         .thed1{
         border-bottom:1px solid #a60000; border-top:1px solid #a60000;
         }
         .bm{
         border-bottom:1px solid #dc0101 !important
         }
         .bm1{
         border:1px solid #dc0101 !important
         }
         .tb-ri{
         text-align: right !important;
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
      <div class="mailer">
         <div class="hedder"> <img src="<?php echo base_url();?>/assets/system_design/email_format_images/mailer.png" width="100%"  /></div>
         <div class="content">
            <div class="new-tb">
               <table width="100%" border="1">
                  <h1><?php 
                     if($journey_details->is_conformed == "cancelled") 
                     	echo $this->lang->line('booking_cancelled');
                     else
                     	echo $this->lang->line('booking_confirmed');
                     	?>
                  </h1>
                  <thead>
                     <tr>
                        <th colspan="5">
                           <h2> <?php echo $this->lang->line('passenger_details');?></h2>
                        </th>
                     </tr>
                     <tr>
                        <th><?php echo $journey_details->registered_name;?></th>
                        <th><?php echo $journey_details->email;?></th>
                        <th><?php echo $journey_details->phone;?></th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td colspan="2">
                           <h2> <?php echo $this->lang->line('booking_details');?></h2>
                        </td>
                     </tr>
                     <tr class="bm">
                        <td colspan="2"><strong> <?php echo $this->lang->line('pick_point');?></strong></br>
                           <?php echo $journey_details->pick_point;?></br>
                        </td>
                        <td colspan="2"><strong> <?php echo $this->lang->line('drop_point');?></strong>
                           </br><?php echo $journey_details->drop_point;?><br/> 
                        </td>
                        <td>
                           <strong> <?php echo $this->lang->line('booking_reference_no');?> : <?php echo $journey_details->booking_ref;?></strong><br />
                           <strong> <?php echo $this->lang->line('pick_date_vehicles');?> : <?php echo $journey_details->pick_date;?></strong><br /> 
                           <strong> <?php echo $this->lang->line('distance');?> : <?php echo $journey_details->distance." ".$journey_details->distance_type;?></strong>
                        </td>
                     </tr>
                  </tbody>
               </table>
               <table width="100%" border="0">
                  <thead class="thed">
                     <tr>
                        <th>Cab</th>
                        <th class="tb-ri"> <?php echo $this->lang->line('amount');?></th>
						<th> <?php echo $this->lang->line('total_cost');?></th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td><?php echo $journey_details->name;?></td>
                         <td class="tb-ri"><?php echo $this->config->item('site_settings')->currency_symbol." ".$journey_details->cost_of_journey;?></td>
						<td class="tb-ri" >
						<?php echo $this->config->item('site_settings')->currency_symbol." ".$journey_details->cost_of_journey;?></td>
                     </tr>
                  </tbody>
                 <!-- <tfoot>
                     <tr>
                        <th> </th>
                        <th></th>
                        <th class="tb-ri">Tax</th>
                        <th class="tb-ri">3.50</th>
                     </tr>
                     <tr>
                        <th> </th>
                        <th></th>
                        <th class="tb-ri">Total</th>
                        <th class="tb-ri"> 665.00 </th>
                     </tr>
                  </tfoot>-->
               </table>
            </div>
         </div>
      </div>
   </body>
</html>