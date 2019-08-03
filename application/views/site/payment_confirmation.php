</header>
<div class="container">
   <div class="section-margin">
      <div class="row">
         <div class="col-md-12">
            <div class="left-side-cont">
			<div class="text-right">
            <button type="button" class="btn btn-danger" onclick="printDiv('booking_detailz');"><i class="fa fa-print"></i> <?php echo "Print";?></button>
         </div>
               <center>
                  <h1 class="succ"><i class="fa fa-check-circle"></i> <?php echo $this->lang->line('successful');?> </h1>
               </center>
               <div class="col-md-10 padding-p-0 col-md-offset-1">
                  <div class="panel panel-default" id="booking_detailz">

                     <div class="panel-heading" style="float:left; margin:0 0 28px; padding: 10px 25px; width:100%;">		 
						<img width="180" height="50" src="<?php echo get_site_logo();?>" alt="Site Logo">
						<aside style="float: right;  font-size: 20px; margin-top: 10px; text-align: right; color:#000;">    
						<?php echo $this->lang->line('booking_details');?>   </aside>
					</div>

                     <div class="panel-body">
                        <div class="col-md-12">
                           <div class="bbt">
                              <h4 class="booking-success"> <i class="fa fa-check-circle"></i> <?php echo $this->lang->line('booking_successful');?> </h4>
                              <?php if(isset($journey_details['booking_ref'])) { ?>
                              <h6 class="booking-success1"><?php echo $this->lang->line('booking_reference_no');?>:<span id="oneway_confirmation_reference_no"> <?php echo $journey_details['booking_ref'];?></span></h6>
                              <h5 class="booking-success2"><?php echo $this->lang->line('booking_thanx');?></h5>
                              <p><?php echo $this->lang->line('cancel_booking'); if(isset($this->config->item('site_settings')->land_line)) echo " ".$this->config->item('site_settings')->land_line; ?><?php if(isset($this->config->item('site_settings')->portal_email)) echo " ".$this->lang->line('or_email_us')." ".$this->config->item('site_settings')->portal_email;?></p>
                              <?php } ?>
                           </div>
						</div>
						<div class="col-md-12">
                           <h2 class="succ-hed"> <?php echo $this->lang->line('journey_details');?> </h2>
                           <div class="payments-confar">
                              <ul>
                                 <li> <strong><?php echo $this->lang->line('pick_point');?> : </strong> <?php if(isset($journey_details['pick_up']))  echo $journey_details['pick_up']; ?></li>
                                 <li> <strong><?php echo $this->lang->line('drop_point');?>  : </strong> <?php if(isset($journey_details['pick_up']))  echo $journey_details['drop_of']; ?>  </li>
                                 <li> <strong><?php echo $this->lang->line('date_time');?> : </strong> <?php if(isset($journey_details['pick_date']))  echo $journey_details['pick_date'];
                                    if(isset($journey_details['pick_time']))  echo ", ".$this->lang->line('at')." ".$journey_details['pick_time'];
                                    		?></li>
                                 <li> <strong><?php echo $this->lang->line('waiting_time');?>  : </strong><?php if(isset($journey_details['waitingTime']))  echo $journey_details['waitingTime']; ?></li>

                                 <li><strong><?php echo $this->lang->line('journey_miles_and_time');?> : </strong><?php if(isset($journey_details['total_distance']))  echo $journey_details['total_distance']." &"; ?> <?php if(isset($journey_details['total_time']))  echo $journey_details['total_time']; ?></li>


                                  <li><strong><?php echo $this->lang->line('cost_of_journey');?> : </strong> <?php if(isset($total_cst))  echo $this->config->item('site_settings')->currency_symbol.$total_cst;?></li>

                                 <li><strong><?php echo $this->lang->line('car_type');?> : </strong> <?php if(isset($journey_details['car_name']))  echo $journey_details['car_name']; ?></li>

                              </ul>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <h2 class="succ-hed"> 
                              <?php echo $this->lang->line('passengers_details');?>
                           </h2>
                           <div class="payments-confar">
                              <ul>
                                 <li><strong><?php echo $this->lang->line('name');?> : </strong> <?php if(isset($user['username']))  echo $user['username']; ?></li>
                                 <li><strong><?php echo $this->lang->line('email');?> : </strong> <?php if(isset($user['email']))  echo $user['email']; ?></li>
                                 <li><strong><?php echo $this->lang->line('phone');?> : </strong> <?php if(isset($user['phone']))  echo $user['phone']; ?></li>
                              </ul>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <h2 class="succ-hed">  <?php echo $this->lang->line('payment_details');?></h2>
                           <div class="payments-confar">
                              <ul>
                                 <li> <strong> <?php echo $this->lang->line('payment_type');?> : </strong> <?php if(isset($payment_mode))  echo $payment_mode; ?></li>
                              </ul>
                           </div>
                        </div>
                     </div>
					 <p class="notez"><b>Note:</b> Confirmation email will be sent on approval.</p>
                  </div>
                  <div class="online">
                     <!-- Tab panes -->
                  </div>
               </div>
			   <div class="text-right">
                <button type="button" class="btn btn-danger" onclick="printDiv('booking_detailz');"> &nbsp <i class="fa fa-print"></i> <?php echo "Print";?></button>
            </div>
            </div>
         </div>
         <!-- <div class="col-md-3">
            <?php $this->load->view('site/common/reasons_to_book'); ?>
         </div> -->
      </div>
   </div>
</div>

<script language="javascript" type="text/javascript">

$(document).ready(function() {
	//alert('working Mann...');
});

	/* Prints Particular Div */
	function printDiv(divID) {
		//Get the HTML of div
		var divElements = document.getElementById(divID).innerHTML;
		//Get the HTML of whole page
		var oldPage = document.body.innerHTML;

		//Reset the page's HTML with div's HTML only
		document.body.innerHTML = 
		  "<html><head><title></title></head><body>" + 
		  divElements + "</body>";

		//Print Page
		window.print();

		//Restore orignal HTML
		document.body.innerHTML = oldPage;
	}
</script>