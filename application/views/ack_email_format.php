<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title><?php if(isset($site_settings->site_title) && $site_settings->site_title != "") 
		  echo $site_settings->site_title;
		else echo "Vehicle Booking System";?></title>
      <style>
         body , html { margin:0; padding:0; height:100%; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; font-size:13px; }
         .mailer{ 
         border: 1px solid #9f2525;
         float: left;
         height: auto;
         max-width: 800px;  background:url(<?php echo base_url();?>/assets/system_design/email_format_images/bg.png) #000; color:#fff;
         }
         .hedder{ width:100%; float:left; }
         .content { float:left; width:auto; line-height:45px; padding:15px 135px; }
      </style>
   </head>
   <body>
      <div class="mailer">
         <div class="hedder"> <img src="<?php echo base_url();?>/assets/system_design/email_format_images/mailer.png" width="100%"  /></div>
         <div class="content">
            <table width="100%" border="0">
               <tr>
                  <td>
 	<?php echo $this->lang->line('hello')?> <?php echo $ack_info['name'];?>, <br />
		
       <?php echo $ack_info['msgBody'];?>
	   
</td>
               </tr>
               <tr>
                  <td>&nbsp;</td>
               </tr>
               <tr align="right">
                  <td><strong><?php echo $this->lang->line('regards');?></strong><br />
			 <?php if(isset($site_settings->design_by) && $site_settings->design_by != "") 
		  echo $site_settings->design_by;
		else echo "Digital Vehicle Booking System";?>
		</td>
               </tr>
            </table>
         </div>
      </div>
   </body>
</html>