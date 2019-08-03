</header>
<?php 
   $attributes = array("name" => 'online_package_booking_form', "id" => 'online_package_booking_form');
   echo form_open('welcome/passengerDetails'); ?>
<div class="container-fluid">
   <div class="container padding-p-0">
      <div class="row">
         <div class="col-md-9">
            <div class="left-side-cont">
               <div class="col-md-12 padding-p-0">
                  <div class="bcp">
                     <div class="business-us">
                        <div class="busi-cercle active"> 
                        </div>
                        <center> <?php echo $this->lang->line('journey_details');?></center>
                     </div>
                     <div class="business-us">
                        <div class="busi-cercle"> 
                        </div>
                        <center> <?php echo $this->lang->line('passengers_details');?> </center>
                     </div>
                     <div class="business-us">
                        <div class="busi-cercle"> 
                        </div>
                        <center>  <?php echo $this->lang->line('booking_confirmation');?></center>
                     </div>
                  </div>
                  <div class="online-cars" id="cars_data_list">
                     <ul class="nav nav-tabs on-bo-he">
                        <li>
                           <div class="on-bo-heddings"><i class="fa fa-automobile"></i> </div>
                           <?php echo $this->lang->line('select_your_car');?>   
                        </li>
                        <small class="on-smhed"> ( <?php echo $this->lang->line('select_the_car_that_suits_to_your_requirement');?> ) </small>
                     </ul>
                     <div class="col-md-12">
                        <div class="overley"></div>
                        <ul class="bxslider" >
                           <?php foreach($cabs as $r) { ?>
                           <div class="col-md-4">
                              <div class="car-sel-bx">
                                 <h3><?php echo $r->name;?></h3>
                                 <ul class="peoples">
                                    <li class="people-icon">(<?php echo $r->passengers_capacity;?>)</li>
                                    <li class="suitcase-icon">(<?php echo $r->large_luggage_capacity;?>)</li>
                                    <li class="bag-icon last">(<?php echo $r->small_luggage_capacity;?>)</li>
                                 </ul>
                                 <div class="select-radio">
                                    <input type="radio" name="radiog_dark" value="<?php echo $r->id;?>" id="cab_<?php echo $r->id;?>" onclick="setActiveOnlinePackage('cab_<?php echo $r->id;?>');" class="css-checkbox carse-label" >  
                                    <label for="cab_<?php echo $r->id;?>" class="carse-label"><?php echo $this->lang->line('select');?></label>
                                 </div>
                              </div>
                           </div>
                           <?php } ?>
                        </ul>
                     </div>
                  </div>
                  <div class="date-time">
                     <ul class="nav nav-tabs on-bo-he">
                        <li>
                           <div class="on-bo-heddings"><i class="fa fa-calendar"></i> </div>
                           <?php echo $this->lang->line('date_time');?> 
                        </li>
                        <small class="on-smhed"> (<?php echo $this->lang->line('click_and_select_the_date_and_time_you_would_like_to_be_picked_up');?>  ) </small>
                     </ul>
                     <div class="online-con">
                        <div class="col-md-6">
                           <label> <?php echo $this->lang->line('select_date');?> : * </label>
                           <input type="text" data-beatpicker="true" data-beatpicker-position="['*','*']" data-beatpicker-disable="{from:[1,1,1],to:[<?php echo date('Y,m,d');?>]}"  name="pick_date" class="date" value="<?php echo date('Y-m-d');?>" >
                        </div>
                        <div class="col-md-6">
                           <label><?php echo $this->lang->line('select_time');?> :* </label>
                           <input type="text" id="timepicker1" name="pick_time" class="time" value="<?php echo date("h : i : A");?>" />
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
                           <input type="hidden" value="" name="pick_up" >
                        </div>
                        <div class="col-md-6">
                           <input type="hidden"  value="" name="drop_of" >
                        </div>
                     </div>
                  </div>
                  <div class="wait-time">
                     <div class="online-con">
                        <div class="col-md-6">
                           <div class="total-journey"> <i class="fa fa-clock-o"></i> <?php echo $this->lang->line('packge_details');?><br>
                              <?php echo $this->lang->line('type');?>: &nbsp;<strong> <?php echo $package_details->name; ?></strong>  <br/><?php echo $this->lang->line('total_time');?>(<?php echo $this->lang->line('hours');?>): &nbsp;<strong><?php echo $package_details->hours; ?></strong><br> &nbsp;&nbsp;
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="total-cost"><i class="fa fa-money"></i> <?php echo $this->lang->line('cost_details');?><br/>
                              <?php echo $this->lang->line('package_cost');?>: &nbsp;<strong><?php echo $package_details->min_cost; ?></strong> <br />
                              <?php echo $this->lang->line('extra_distance');?>(<?php echo $this->lang->line('per_km');?>): &nbsp;<strong><?php echo $package_details->charge_distance; ?></strong> <br />
                              <?php echo $this->lang->line('extra_time');?>(<?php echo $this->lang->line('in_hours');?>): &nbsp;<strong><?php echo $package_details->charge_hour; ?></strong> <br />
                           </div>
                        </div>
                        <button type="submit" class="naxt"><?php echo $this->lang->line('personal_details');?><i class="fa fa-arrow-circle-o-right"></i> </button> 
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-3">
            <?php $this->load->view('site/common/instructions'); ?>
         </div>
      </div>
   </div>
</div>
<?php echo form_close();?>
<script type="text/javascript">
  (function($, W, D) {
    var JQUERY4U = {};
    JQUERY4U.UTIL = {
        setupFormValidation: function() {
          //Additional Methods			
          //form validation rules
          $("#online_package_booking_form").validate({
            rules: {
              radiog_dark: {
                required: true
              }
            },
            messages: {
              radiog_dark: {
                required: "Please select car."
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