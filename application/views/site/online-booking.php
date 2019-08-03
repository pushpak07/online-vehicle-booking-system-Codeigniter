</header>
<?php $locale_info = localeconv(); ?>
<div class="g-bg">
<div class="container">
	
   <div class="section-margin">
   <?php echo $this->session->flashdata('message'); ?>
      <div class="row">
         <div class="col-md-12">
         
            <?php 
               $attributes = array("name" => 'online_booking_form', "id" => 'online_booking_form');
               echo form_open(site_url()."welcome/passengerDetails",$attributes);?>
               
            <div class="left-side-cont">
               <div class="col-md-12 padding-p-0">
               </div>
               <div class="bcp">
                  <div class="business-us journey-details">
                     <div class="busi-cercle active"> 
                     </div>
                     <center> <?php echo $this->lang->line('journey_details');?></center>
                  </div>
                  <div class="business-us passenger-details">
                     <div class="busi-cercle"> 
                     </div>
                     <center><?php echo $this->lang->line('passenger_details');?> </center>
                  </div>
                  <div class="business-us payment-details">
                     <div class="busi-cercle"> 
                     </div>
                     <center><?php echo $this->lang->line('payment_details');?></center>
                  </div>
               </div>



               <div class="online">
                  <ul class="nav nav-tabs on-bo-he te-co" role="tablist">
                     <li role="presentation">
                        <a href="#home" aria-controls="home" role="tab" data-toggle="tab">
                           <div class="on-bo-he-j"><i class="fa fa-send"></i> </div>
                           <?php echo $this->lang->line('online_booking');?>   
                        </a>
                     </li>
                     <small class="on-smhed"> (<?php echo $this->lang->line('enter_your_pickup_and_destination_details');?> ) </small>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content" >
                     <div role="tabpanel" class="tab-pane active" id="home">
                        <div class="online-con pad-03">

                           <div class="col-md-6 bmc-fields">
                              <label> <?php echo $this->lang->line('pick_up_location');?> </label>


                              <input type="text"   name="pick_up" id="local_pick" value="<?php echo set_value('pick_up');?>" class="location" placeholder="<?php if(isset($this->config->item('site_settings')->pick_point_placeholder)) echo $this->config->item('site_settings')->pick_point_placeholder;?>">


                              <?php echo form_error('pick_up');?>

                              <!-- For Airports -->
                              <select name="pick_up" class="airlocation" id="airport_pick" disabled="true"  style="display: none;">
                                 <?php if(isset($airports) && count($airports)>0) {
									               echo "<option value=''>".$this->lang->line('select')." ".$this->lang->line('airport')."</option>";
                                    foreach($airports as $airport):
                                    ?>
                                 <option value="<?php echo $airport->airport_name; ?>"><?php echo $airport->airport_name; ?></option>
                                 <?php endforeach; } ?>
                              </select>



                              <input type="hidden" id="pick_type" name="pick_type" value="L"/>
                              <br><br>

                              <?php 
							             if(count($airports)>0) {
							              if(isset($this->config->item('site_settings')->airports_status) && $this->config->item('site_settings')->airports_status=='Enable') { ?>
                              <div>
                                 <a href="javascript:void(0)" class="ilike" id="pick_airport_link" data-value="pick_airport">
                                    <div class="air-car"><i class="fa fa-plane"></i> </div>
                                    <?php echo $this->lang->line('airport');?> 
                                 </a>
                                 <a href="javascript:void(0)" class="ilike" style="display: none;" id="pick_local_link"  data-value="pick_local">
                                    <div class="air-car"><i class="fa fa-map-marker"></i> </div>
                                    <?php echo $this->lang->line('local_address');?>
                                 </a>
                              </div>
                              <?php } } ?>
                           </div>





                           <div class="col-md-6 bmc-fields">
                              <label> <?php echo $this->lang->line('drop_of_location');?> </label>

                              <input type="text" id="local_drop"  placeholder="<?php if(isset($this->config->item('site_settings')->drop_point_placeholder)) echo $this->config->item('site_settings')->drop_point_placeholder;?>" name="drop_of" class="location" alt="booking_page" value="<?php echo set_value('drop_of');?>" >
                              <?php echo form_error('drop_of');?>


                              <select name="drop_of" class="airlocation" id="airport_drop" style="display: none;" disabled="true">
                                 <?php if(isset($airports) && count($airports)>0) {
                                    echo "<option value=''>".$this->lang->line('select')." ".$this->lang->line('airport')."</option>";
                                    foreach($airports as $airport):
                                    ?>
                                 <option value="<?php echo $airport->airport_name; ?>"><?php echo $airport->airport_name; ?></option>
                                 <?php endforeach; } ?>
                              </select>


                              <input type="hidden" id="drop_type" name="drop_type" value="L"/>
                              <br><br>


                              <?php 
							             if(count($airports)>0) {
							             if(isset($this->config->item('site_settings')->airports_status) && $this->config->item('site_settings')->airports_status=='Enable') { ?>
                              <div>
                                 <a href="javascript:void(0)" id="drop_airport_link" class="ilike"  data-value="drop_airport">
                                    <div class="air-car"><i class="fa fa-plane"></i> </div>
                                    <?php echo $this->lang->line('airport');?> 
                                 </a>
                                 <a href="javascript:void(0)" class="ilike" style="display: none;" id="drop_local_link" data-value="drop_local">
                                    <div class="air-car"><i class="fa fa-map-marker"></i> </div>
                                    <?php echo $this->lang->line('local_address');?>
                                 </a>
                              </div>
                              <?php } } ?>
                           </div>



                        </div>
                     </div>
                  </div>

               </div>


               <div class="online-cars">
                  <div id="cars_data_list"></div>
				  <input type="hidden" name="check_cars" value="0" id="check_cars"  />
               </div>
               <!-- new code-->
               <!-- new code end-->
               <div class="date-time">
                  <ul class="nav nav-tabs on-bo-he">
                     <li>
                        <a data-toggle="tab" role="tab" aria-controls="home" href="#home">
                           <div class="on-bo-heddings"><i class="fa fa-calendar"></i> </div>
                           <?php echo $this->lang->line('date_time');?> 
                        </a>
                     </li>
                     <small class="on-smhed"> ( <?php echo $this->lang->line('click_and_select_the_date_and_time_you_would_like_to_be_picked_up');?> ) </small>
                  </ul>

                  <div class="online-con pad-03">
                     <div class="col-md-6">
                        <label> <?php echo $this->lang->line('select_date');?>* : </label>
                        <input data-beatpicker="true" class="dte" type="text" value="<?php echo date($date_format,time()+86400);?>" name="pick_date" data-beatpicker-disable="{from:[<?php echo date('Y,n,j'); ?>],to:'<'}"  data-beatpicker-format="['<?php echo $date_elem1;?>','<?php echo $date_elem2;?>','<?php echo $date_elem3;?>'],separator:'<?php echo $seperator;?>'" />
                        <?php echo form_error('pick_date');?>
                     </div>
                     <div class="col-md-6">
                        <label><?php echo $this->lang->line('select_time');?>* : </label>
                        <input type="text" id="timepicker1" name="pick_time" value="<?php echo date("h : i : A"); ?>">
                     </div>
                  </div>

               </div>

               <div class="wait-time">
                  <ul class="nav nav-tabs on-bo-he">
                     <li class="wait-top"> 
                        <input name="waitnReturn"  id="waitnReturn" onclick="waiting(this.data-value);" type="checkbox" class="css-checkbox css-label-chcss-label-ch" >  
                        <label for="waitnReturn" class="css-label-ch"><?php echo $this->lang->line('wait_and_return_journey_required');?></label>
                     </li>
                     <small class="wt-text" id="waitingTimeDiv" style="display: none;"> 
                     <?php if($this->config->item('site_settings')->waiting_time == "Enable") { 
                      echo $this->lang->line('waiting_time'); 
                    
                        $js = 'id="waiting_time" class="wt" onChange="waiting();"';
                        
                        echo form_dropdown('waiting_time',$waiting_options,'',$js);?>
                     <?php } ?>


                     <input type="hidden" value="No" name="return_journey" id="return_journey"/>
                     <input type="hidden" name="waitingTime" id="waitingTime" value="No Waiting"/>
                     <input type="hidden" name="waitingCost" id="waitingCost" value="0"/>
                     <input type="hidden" name="package_type" id="package_type" value="-"/>
                     <input type="hidden" name="booking_ref" value="<?php echo date('ymdHis'); ?>"/>
                     </small>
                  </ul>

                  <div class="online-con pad-03" >
                     <div class="col-md-4">
                        <div class="total-journey"> <i class="fa fa-clock-o"></i> <?php echo $this->lang->line('total_journey_time');?><br>
                           <strong id="distance_id"> 0.0 <?php echo $this->config->item('site_settings')->distance_type; ?> 00 mins (Approx)</strong>  <strong id="time_id"> </strong><br> 
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="total-cost"><i class="fa fa-money"></i> <?php echo $this->lang->line('total_cost');?><br>
					       <input type="hidden" name="currency_symbol" id="currency_symbol" value="<?php echo $this->config->item('site_settings')->currency_symbol;?>"/>
                           <strong id="total_cost1"><?php echo $this->config->item('site_settings')->currency_symbol;?>0.00</strong><br>
                           <input type="hidden" name="no_repeat" id="no_repeat" value="1"/>
                           <input type="hidden" name="car_cost" id="car_cost" value="0"/>
                           <input type="hidden" name="total_cost" id="total_cost" value="0"/>
                           <input type="hidden" name="total_time" id="total_time" value="0"/>
                           <input type="hidden" name="total_distance" id="total_distance" value="0"/>
                           <input type="hidden" name="car_name" id="car_name" />
                        </div>
                     </div>
                     <div class="col-md-4">
                    <div class="text-center mt-2">
                       <button type="submit" class="btn btn-danger"><?php echo $this->lang->line('personal_details');?> &nbsp; <i class="fa fa fa-angle-right"></i> </button>
                    </div>
                   </div>
                     <!--<input type="submit" name="Next" value="Next"/>-->
                  </div>
                  
               </div>


            </div>
            <?php echo form_close(); ?>
         </div>
         <!-- <div class="col-md-3">
            <?php $this->load->view('site/common/reasons_to_book'); ?>
         </div> -->
      </div>
   </div>
</div>
</div>
</div>
<script>
   function waiting()
   
   {
   
    if(document.getElementById("waitnReturn").checked)
   
    {
   	
   	
   	ins = $('#waiting_time').val().split('_');
   	
    	$('#waitingTimeDiv').show();
   
    	$('#return_journey').val("Yes");
    	$('#waitingTime').val(ins[1]);
    	$('#waitingCost').val(ins[0]);
    	calCost();
   
    }
   
     	else
   
     	{
   
   	$('#waitingTimeDiv').hide();
   
   	$('#return_journey').val("No");
   	$('#waitingTime').val("No Waiting");
   	calCost();
   
   }
   
   }
   
   
     $(function(){
         $('.ilike').click(function(){
             var $this = $(this);
             var p1 = $this.data('value');
             
             changeField(p1);
         });
		 
		 $('.location, .airlocation').click(function () {
			$('#no_repeat').val('1');
		 });
     });
   function changeField(ss)
   {
   if(ss=="pick_airport")
   {
   	$('#local_pick').hide();
   	$('#airport_pick').show();
   	$('#airport_pick').attr('disabled',false);
   	$('#local_pick').attr('disabled',true);
   	$('#pick_airport_link').hide();
   	$('#pick_type').val('A');
   	$('#pick_local_link').show();
   }
   else if(ss=="drop_airport")
   {
   	$('#local_drop').hide();
   	$('#airport_drop').show();
   	$('#airport_drop').attr('disabled',false);
   	$('#local_drop').attr('disabled',true);
   	$('#drop_type').val('A');
   	$('#drop_airport_link').hide();
   	$('#drop_local_link').show();
   	
   }
   else if(ss=="pick_local")
   {
   	$('#local_pick').show();
   	$('#airport_pick').hide();
   	$('#airport_pick').attr('disabled',true);
   	$('#local_pick').attr('disabled',false);
   	$('#pick_type').val('L');
   	$('#pick_airport_link').show();
   	$('#pick_local_link').hide();
   }
   else if(ss=="drop_local")
   {
   	
   	$('#local_drop').show();
   	$('#airport_drop').hide();
   	$('#airport_drop').attr('disabled',true);
   	$('#local_drop').attr('disabled',false);
   	$('#drop_type').val('L');
   	$('#drop_airport_link').show();
   	$('#drop_local_link').hide();
   	
   	
   }
   
   }
   
</script>
<script type="text/javascript"> 
   (function($,W,D)
   {
      var JQUERY4U = {};
   
      JQUERY4U.UTIL =
      {
          setupFormValidation: function()
          {
                
			//form validation rules
              $("#online_booking_form").validate({
                  rules: {
                      pick_up: {
                          required: true
                          
                      },
   				drop_of: {
                          required: true
                          
                      },
   	radiog_dark: {
   				required: true
   		  },	
   	pick_time: {
                          required: true 
                      }
                  },
   			
   			messages: {
   				pick_up: {
                          required: "<?php echo $this->lang->line('pick_location_valid');?>"
                      },
   				drop_of: {
                          required: "<?php echo $this->lang->line('drop_location_valid');?>"
                      },
   	radiog_dark: {
   			  required:  "<?php echo $this->lang->line('select_your_car')?>"
   		  },
   	pick_time: {
                          required: "<?php echo $this->lang->line('pick_time_valid');?>"
                      }
   		  
   			},
                  
                  submitHandler: function(form) {
                      form.submit();
                  }
              });
          }
      }
   
      //when the dom has loaded setup form validation rules
      $(D).ready(function($) {
          JQUERY4U.UTIL.setupFormValidation();
      });
   
   })(jQuery, window, document);
</script>