</header>
<?php 
   $attributes = array("name" => 'online_package_booking_form', "id" => 'online_package_booking_form');
   echo form_open(site_url().'welcome/passengerDetails',$attributes); ?>
<div class="container">
   <div class="section-margin">
      <div class="row">
         <div class="col-md-12">
            <div class="left-side-cont">
               <div class="col-md-12 padding-p-0">
                  <div class="bcp ">
                     <div class="business-us journey-details">
                        <div class="busi-cercle active"> 
                        </div>
                        <center> <?php echo $this->lang->line('journey_details');?></center>
                     </div>
                     <div class="business-us passenger-details">
                        <div class="busi-cercle"> 
                        </div>
                        <center> <?php echo $this->lang->line('passengers_details');?> </center>
                     </div>
                     <div class="business-us payment-details">
                        <div class="busi-cercle"> 
                        </div>
                        <center>  <?php echo $this->lang->line('booking_confirmation');?></center>
                     </div>
                  </div>
                     <div class="online-con">
                  <div class="col-md-6">
                     <label> <?php echo $this->lang->line('pick_up_location');?> </label>
                     <input type="text" placeholder="<?php echo $this->config->item('site_settings')->pick_point_placeholder;?>" class="location" id="local_pick" name="pick_up">
                  </div>
               </div>



                  <div class="online-cars" id="cars_data_list">
                     <div class="online-cars" id="cars_data_list">
                        <ul class="nav nav-tabs on-bo-he">
                           <li>
      						   <a data-toggle='tab' role='tab' aria-controls='home' href='#home'>
                                 <div class="on-bo-heddings"><i class="fa fa-automobile"></i> </div>
                                 <?php echo $this->lang->line('car_selected');?>
      							</a>							  
                           </li>
                        </ul>


                        <div class="col-md-12">
                        
                              <?php foreach($cabs as $r) { ?>
                              <div class="col-md-4">
                                 <div class="car-sel-bx">
                                    <h3><?php echo $r->name;?></h3>
                                    <ul class="peoples">
                                       <li class="people-icon">(<?php echo $r->passengers_capacity;?>)</li>
                                       <li class="suitcase-icon">(<?php echo $r->large_luggage_capacity;?>)</li>
                                       <li class="bag-icon last">(<?php echo $r->small_luggage_capacity;?>)</li>
                                    </ul>
                                    <input type="hidden" name="radiog_dark" value="<?php echo $r->id;?>" id="cab_<?php echo $r->id;?>"> 
									         <input type="hidden" name="check_cars" value="1" id="check_cars"  />									
                                 </div>
                              </div>
                              <?php } ?>
                         
                        </div>


                     </div>


                     <div class="date-time">
                        <ul class="nav nav-tabs on-bo-he">
                           <li>
      						   <a data-toggle='tab' role='tab' aria-controls='home' href='#home'>
                                 <div class="on-bo-heddings"><i class="fa fa-calendar"></i> </div>
                                 <?php echo $this->lang->line('date_time');?>
      							</a>
                           </li>


                           <small class="on-smhed"> (<?php echo $this->lang->line('click_and_select_the_date_and_time_you_would_like_to_be_picked_up');?>  ) </small>


                        </ul>


                        <div class="online-con">

                           <div class="col-md-6">
                              <label> <?php echo $this->lang->line('select_date');?> : * </label>
                              <input data-beatpicker="true" class="dte" type="text" value="<?php echo date($date_format,time()+86400);?>" name="pick_date" data-beatpicker-disable="{from:[<?php echo date('Y,n,j'); ?>],to:'<'}" data-beatpicker-format="['<?php echo $date_elem1;?>','<?php echo $date_elem2;?>','<?php echo $date_elem3;?>'],separator:'<?php echo $seperator;?>'" />
                           </div>

                           <div class="col-md-6">
                              <label><?php echo $this->lang->line('select_time');?> :* </label>
                              <input type="text" id="timepicker1" name="pick_time" value="<?php echo date("h : i : A");?>" />
                           </div>

                           <div class="col-md-6">
                              <input type="hidden" value="<?php echo date('ymdhis'); ?>" name="booking_ref" >
                           </div>

                           <div class="col-md-6">
                              <input type="hidden" value="<?php echo $package_details->min_cost; ?>" name="total_cost" >
                           </div>

                           <div class="col-md-6">
                              <input type="hidden"  value="<?php echo $package_details->id; ?>" name="package_type" >
                           </div>

                           <div class="col-md-6">
                              <input type="hidden"  value="<?php echo $package_details->distance; ?>" name="total_distance" >
                           </div>

                         
                           <div class="col-md-6">
                              <input type="hidden"  value="-" name="drop_of" >
                           </div>

                           <div class="col-md-6">
                              <input type="hidden"  value="<?php echo $cabs[0]->name;?>" name="car_name" >
                           </div>

                           <div class="col-md-6">
                              <input type="hidden"  value="<?php echo $package_details->hours;?>   Hours"  name="total_time" >
                           </div>

                        </div>


                     </div>



                     <div class="wait-time">
                        <div class="online-con p-03">
                           <div class="col-md-4">
                              <div class="total-journey"> <i class="fa fa-clock-o"></i> <?php echo $this->lang->line('packge_details');?><br>
                                 <?php echo $this->lang->line('type');?>: &nbsp;<strong> <?php echo $package_details->name; ?></strong>  <br/><?php echo $this->lang->line('total_time');?>(<?php echo $this->lang->line('hours');?>): &nbsp;<strong><?php echo $package_details->hours; ?></strong><br> &nbsp;&nbsp;
                              </div>
                           </div>


                           <div class="col-md-4">
                              <div class="total-cost"><i class="fa fa-money"></i> <?php echo $this->lang->line('package_details');?><br/>
                                 <?php echo $this->lang->line('package_cost');?>: &nbsp;<strong><?php echo $this->config->item('site_settings')->currency_symbol.$package_details->min_cost;?></strong> <br />
                                 <?php echo $this->lang->line('extra_distance');?>(<?php echo $this->lang->line('per_km');?>): &nbsp;<strong><?php echo 
								 $this->config->item('site_settings')->currency_symbol.$package_details->charge_distance;?></strong> <br />
                                 <?php echo $this->lang->line('extra_time');?>(<?php echo $this->lang->line('in_hours');?>): &nbsp;<strong><?php echo 
								  $this->config->item('site_settings')->currency_symbol." ".
								  $package_details->charge_hour;
								  ?></strong> <br />
                              </div>
                           </div>

                           <div class="col-md-4"><div class="mt-2">

                           <button type="submit" class="btn btn-danger btn-right"><?php echo $this->lang->line('personal_details');?> &nbsp; <i class="fa fa-angle-right"></i> </button> </div>
                        </div>

                        </div>
                     </div>

                  </div>


               </div>
            </div>
         </div>
        <!--  <div class="col-md-3">
            <?php $this->load->view('site/common/instructions'); ?>
         </div> -->
      </div>
   </div>
</div>
</div>
<?php echo form_close();?>
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
              $("#online_package_booking_form").validate({
                  rules: {
   			pick_up: {
   				required: true
   			}
                  },
   			
   			messages: {
   		pick_up: {
   				required: "pick up location required."
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

<?php if ($this->config->item('site_settings')->google_api_key!='') {?>

<script src="http://maps.googleapis.com/maps/api/js?key=<?php echo $this->config->item('site_settings')->google_api_key;?>&amp;libraries=places"></script>

<script src="<?php echo JS_JQUERY_GEOCOMPLETE;?>"></script>
<script>
   $(document).ready(function(){
   	
   	  $(".location").geocomplete({
             country: '<?php echo $this->config->item('site_settings')->site_country;?>'
           });
   });
</script>
<?php } ?>
