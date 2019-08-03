<div class="container padding-p-0 banner" style="position: relative;">
  <img src="https://4.bp.blogspot.com/-WasxwVSbP9o/U2iH8PGuHMI/AAAAAAAADlw/igcKXRFaZ1k/s1600/clio_car-vector.png" class="fixed-head-img">
  <div class="row">
    <div class="col-sm-12">
      <div class="hero-head">
        <h1>Book a <span>Taxi</span> to your Destination</h1>
        <h4>Ride Anywhere, Anytime</h4>
      </div>
    </div>
  </div>
   <div class="row">
     


      <div class="col-md-10 col-md-offset-1 col-sm-12">
        <div class="booking-box">
         <?php 
            $attributes = array("name" => 'online_booking_form', "id" => 'online_booking_form');
            echo form_open('welcome/passengerDetails',$attributes);?>  
         <div class="trip-form">
            <div class="tab">
               <div role="tabpanel">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs hed-bg" role="tablist">
                     <li role="presentation" class="active">
                        <a href="#home" aria-controls="home" role="tab" data-toggle="tab">
                           <?php echo $this->lang->line('find_your_perfect_trip'); ?>
                        </a>
                     </li>
                  </ul>



                  <!-- Tab panes -->
                  <div class="tab-content">
                     <div role="tabpanel" class="tab-pane active" id="home">
                        <div class="trip-form-con">
                           <div class="col-md-6 bmc-fields">
                              <label> <?php echo $this->lang->line('pick_up_location');?> </label>

                              <input type="text"  placeholder="<?php echo $this->config->item('site_settings')->pick_point_placeholder;?>" class="location" id="local_pick" name="pick_up">

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
							               if (count($airports)>0) {
							               if (isset($this->config->item('site_settings')->airports_status) && $this->config->item('site_settings')->airports_status=='Enable') { ?>  
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
                              <?php } }?>

							          <div class="clearfix"></div>

                           </div>






                           <div class="col-md-6 bmc-fields">
                              <label> <?php echo $this->lang->line('drop_of_location');?> </label>
                              <input type="text"  placeholder="<?php echo $this->config->item('site_settings')->drop_point_placeholder;?>" class="location" id="local_drop" alt="general_booking" name="drop_of" >


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
							               if (count($airports)>0) {
							               if (isset($this->config->item('site_settings')->airports_status) && $this->config->item('site_settings')->airports_status=='Enable') { ?>
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
                              <?php } }?>
                           </div>



                           <div class="col-md-3">
                             
                              <label> <?php echo $this->lang->line('pick_up_date');?> </label>
                              <input data-beatpicker="true" class="dte" type="text" value="<?php echo date($date_format,time()+86400);?>" name="pick_date" data-beatpicker-disable="{from:[<?php echo date('Y,n,j'); ?>],to:'<'}" data-beatpicker-format="['<?php echo $date_elem1;?>','<?php echo $date_elem2;?>','<?php echo $date_elem3;?>'],separator:'<?php echo $seperator;?>'"  />
                           </div>



                           <div class="col-md-3">
                              <label><?php echo $this->lang->line('pick_up_time');?></label>
                              <input id="timepicker1" name="pick_time" type="text" value="<?php echo date("h : i : A"); ?>"/>
                           </div>

                           <div class="col-md-3"><input name="waitnReturn" id="waitnReturn" 
                              type="checkbox" class="css-checkbox css-label-chcss-label-ch waitnReturn" >  
                              <label for="waitnReturn" class="css-label-ch waitnReturn" id="mt"><?php echo $this->lang->line('return_journey');?></label>
                           </div>



                           <?php if ($this->config->item('site_settings')->waiting_time == "Enable") {?>
                           <div class="col-md-3">
                              <div class="control"></div>
                              <label class="waiting_time"> <?php echo $this->lang->line('waiting_time');?> </label>
                              <?php 
                                 echo form_dropdown('waiting_time',$waiting_options,'','id="waiting_time" class="waiting_time"'); ?>
                           </div>
                           <?php } ?>



                           <input type="hidden" name="waitingTime" id="waitingTime" value="No Waiting"/>
                           <input type="hidden" name="waitingCost" id="waitingCost" value="0"/>
                           <div class="col-md-3">
                              <input type="hidden" name="package_type" value="-" >
                              <input type="hidden" name="booking_ref" value="<?php echo date('ymdHis'); ?>"/>
							                <input type="hidden" name="no_repeat" id="no_repeat" value="1"/>
                              <input type="hidden" name="car_cost" id="car_cost" value="0.00"/>
                              <input type="hidden" name="total_cost" id="total_cost" value="0.00"/>
                              <input type="hidden" name="total_time" id="total_time" value="0"/>
                              <input type="hidden" name="total_distance" id="total_distance" value="0"/>
                              <input type="hidden" name="car_name" id="car_name" />
							                <input type="hidden" name="check_cars" value="0" id="check_cars"  />
                           </div>
                        </div>
                     </div>
                  </div>



               </div>
            </div> 
            <div class="hed-line"></div>

            <div class="down-form" id="journey_details" style="display: none;">
               <div  class="col-md-9">
                  <div class="scrooll" id="cars_data_list">
				  
                  </div>
               </div>

               <div class="col-md-3">
		 
                  <div class="location-map">
                     <a href="#" id="button" > <img src="<?php echo IMGS_SYSTEM_DSN;?>location-map.png"/></a>	
                     <?php echo $this->lang->line('one_way_journey_details');?>: 
                     <strong id="distance_id"><?php echo $this->lang->line('distance');?>: 1ft</strong>	<br>
                     <strong id="time_id"><?php echo $this->lang->line('time');?>:  1 min (Approx)</strong>
                  </div>
                  

				        <div class="book">
				        <input type="hidden" name="currency_symbol" id="currency_symbol" value="<?php echo $this->config->item('site_settings')->currency_symbol;?>"/>
                     <input type="button" id="journey_cost" value="" style="display:none;" class="geta-outline">
                     <input type="submit" style="display:none;" id="btnbooknow" value="<?php echo $this->lang->line('book_now');?>" class="geta" >
                </div>

               </div>

            </div>

         </div>
         <?php echo form_close();?>


      </div>
      </div>
   </div>
</div>
</header>



<!--Vehicles-->
<?php if (!empty($vehicles)) {?>
<div class="scroll-up">
   <div class="container">
      <div class="section-margin mb-3">
         <div class="row">
            <div class="col-md-12 text-center">
              <h1 class="section-head"> <?php echo $this->lang->line('cars');?></h1>
             
            </div>
         </div>
		 
		 
         <div class="row">
            <ul class="bxslider" >
               <?php foreach ($vehicles as $row):?>
               <div class="col-md-3 wi-re">
                  <div class="first-car">
                     <div class="first-car-hed"><?php echo strtoupper($row->name);?></div>

                     <div class="first-car-img"> <img src="<?php echo get_vehicle_image($row->image);?>" width="100%"/> </div>
                        <div class="col-md-8 padding-p-r">
                           <aside class="rate"><?php echo $this->lang->line('starts_from');?>: <?php 
						              echo $this->config->item('site_settings')->currency_symbol." ".$row->cost_starting_from ?></aside>
                          
                        </div>

                  </div>
                  <div class="clearfix"></div>
               </div>
               <?php endforeach; ?>
            </ul>
         </div>
      </div>
   </div>
</div>
<?php } ?>
<!--Vehicles-->







<script src="<?php echo JS_JQUERY_REVEAL;?>"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#button').click(function(e) { // Button which will activate our modal
		   	$('#modal').reveal({ // The item which will be opened with reveal
			  	animation: 'fade',                   // fade, fadeAndPop, none
				animationspeed: 600,                       // how fast animtions are
				closeonbackgroundclick: true,              // if you click background will modal close?
				dismissmodalclass: 'close'    // the class of a button or element that will close an open modal
			});
		return false;
		});
	});
</script>



<div id="modal">
 <div id="content">
		  <div id="map_canvas" style="height:500px;"> </div>
 <a href="#" class="button cl close"><img src="<?php echo IMGS_SYSTEM_DSN;?>cross.png"> </a>
	</div>
</div>



<style> 
.close{ background:#fff;} 
#modal {
	visibility:hidden;
	width:50%;
	height:auto;
	padding:8px;
	background:rgba(0,0,0,.3);
	-webkit-border-radius:8px;
	-moz-border-radius:8px;
	border-radius:8px;
	position:absolute !important; 
	top:20% !important;
	left:26% !important;
 margin:0 auto;
	z-index:101;
}
.reveal-modal-bg { 
	position: fixed; 
	height: 100%;
	width: 100%;
	background: #000;
	background: rgba(0,0,0,.4);
	z-index: 100;
	display: none;
	top: 0;
	left: 0; 
}
.button.cl {
    float: left;
    position: absolute;
    right: -14px;
    top: -11px; border:0;
}
</style>



<script type="text/javascript"> 
   (function($,W,D)
   {
      var JQUERY4U = {};
   
      JQUERY4U.UTIL =
      {
          setupFormValidation: function()
          {
              //Additional Methods			
   
   
   
   		
   		//form validation rules
              $("#online_booking_form").validate({
                  rules: {
                      pick_up: {
                          required: true
                          
                      },
   				drop_of: {
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