<div class="container padding-p-0 banner">
   <div class="row">
      <div class="col-md-4 padding-p-0">  </div>
      <div class="col-md-8 padding-p-r">
         <div class="trip-form">
            <div class="tab">
               <div role="tabpanel">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs hed-bg" role="tablist">
                     <li role="presentation" class="active">
                        <a href="#home" aria-controls="home" role="tab" data-toggle="tab">
                           <div class="cabs-j"><i class="fa fa-automobile"></i> </div>
                           <?php echo $this->lang->line('register_here');?>
                        </a>
                     </li>
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                     <div class="trip-form-con">
                        <?php echo $this->session->flashdata('message'); ?>
                        <?php echo form_open('auth/create_user');?>
                        <div class="col-md-6">
                           <label> <?php echo $this->lang->line('first_name');?></label>
                           <?php echo form_input($first_name);?>
                           <?php echo form_error('first_name'); ?>
                        </div>
                        <div class="col-md-6">
                           <label> <?php echo $this->lang->line('last_name');?> </label>
                           <?php echo form_input($last_name);?> 
                        </div>
                        <div class="col-md-6">
                           <label><?php echo $this->lang->line('email');?></label>
                           <?php echo form_input($email);?>
                        </div>
                        <div class="col-md-6">
                           <label> <?php echo $this->lang->line('mobile_number');?></label>
                           <?php echo form_input($phone);?>
                        </div>
                        <div class="col-md-6">
                           <label> <?php echo $this->lang->line('password');?></label>
                           <?php echo form_input($password);?>
                        </div>
                        <div class="col-md-6">
                           <label> <?php echo $this->lang->line('confirm_password');?></label>
                           <?php echo form_input($password_confirm);?>
                        </div>
                        <div class="col-md-3">
                           <?php echo form_submit('submit', $this->lang->line('create')." ".$this->lang->line('user'),'class="geta"');?>
                        </div>
                        <?php echo form_close(); ?>
                     </div>
                  </div>
               </div>
            </div>
            <div class="hed-line"></div>
            <div class="down-form" id="journey_details" style="display: none;">
               <div class="col-md-9">
                  <div class="scrooll">
                     <div class="scrool-cab">
                        <input type="radio" name="radiog_dark" id="radio1" class="css-checkbox css-label" />
                        <label for="radio1" class="css-label"></label>
                        <div class="che-car"> <i class="fa fa-automobile"></i> </div>
                        <aside><?php echo $this->lang->line('find_your_perfect_trip');?></aside>
                        <input type="text" class="members"/>
                        <input type="text" class="luggage"/>
                        <input type="text" class="bags"/>
                        <input type="text" class="money"/>
                     </div>
                     <div class="scrool-cab">
                        <input type="radio" name="radiog_dark" id="radio2" class="css-checkbox css-label" />
                        <label for="radio2" class="css-label"></label>
                        <div class="che-car"> <i class="fa fa-automobile"></i> </div>
                        <aside><?php echo $this->lang->line('find_your_perfect_trip');?></aside>
                        <input type="text" class="members"/>
                        <input type="text" class="luggage"/>
                        <input type="text" class="bags"/>
                        <input type="text" class="money"/>
                     </div>
                     <div class="scrool-cab">
                        <input type="radio" name="radiog_dark" id="radio3" class="css-checkbox css-label" />
                        <label for="radio3" class="css-label"></label>
                        <div class="che-car"> <i class="fa fa-automobile"></i> </div>
                        <aside><?php echo $this->lang->line('find_your_perfect_trip');?></aside>
                        <input type="text" class="members"/>
                        <input type="text" class="luggage"/>
                        <input type="text" class="bags"/>
                        <input type="text" class="money"/>
                     </div>
                     <div class="scrool-cab">
                        <input type="radio" name="radiog_dark" id="radio4" class="css-checkbox css-label" />
                        <label for="radio4" class="css-label"></label>
                        <div class="che-car"> <i class="fa fa-automobile"></i> </div>
                        <aside><?php echo $this->lang->line('find_your_perfect_trip');?></aside>
                        <input type="text" class="members"/>
                        <input type="text" class="luggage"/>
                        <input type="text" class="bags"/>
                        <input type="text" class="money"/>
                     </div>
                     <div class="scrool-cab">
                        <input type="radio" name="radiog_dark" id="radio5" class="css-checkbox css-label" />
                        <label for="radio5" class="css-label"></label>
                        <div class="che-car"> <i class="fa fa-automobile"></i> </div>
                        <aside><?php echo $this->lang->line('find_your_perfect_trip');?></aside>
                        <input type="text" class="members"/>
                        <input type="text" class="luggage"/>
                        <input type="text" class="bags"/>
                        <input type="text" class="money"/>
                     </div>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="location-map"> 
                     <a href="#" data-toggle="modal" data-target="#myModal" > <img src="<?php echo base_url();?>assets/system_design/images/location-map.png"/></a>	
                     <?php echo $this->lang->line('one_way_journey_details');?>: 
                     <strong id="distance_id"> <?php echo $this->lang->line('distance');?>: 1ft</strong>	<br>
                     <strong id="time_id"><?php echo $this->lang->line('time');?>:  1 min (Approx)</strong>
                  </div>
                  <div class="book">
                     <input type="button" value="BOOK NOW11" class="booknow">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</header>
<div class="scroll-up">
   <div class="container-fluid">
      <div class="container padding-p-0">
         <div class="row">
            <div class="col-md-12 padding-p-0">
               <div class="hedding-style">  </div>
               <aside class="main-hedd"> <?php echo $this->lang->line('cars');?></aside>
               <div class="hedding-style1"> </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-3">
               <div class="first-car">
                  <div class="first-car-hed"><?php echo $this->lang->line('saloon_cars');?></div>
                  <div class="first-car-img"> <img src="<?php echo base_url();?>assets/system_design/images/car-img.jpg" width="100%"/> </div>
                  <div class="rl">
                     <div class="col-md-6 padding-p-r">
                        <aside class="rate"> <?php echo $this->lang->line('from');?>: 100$   </aside>
                        <aside class="city-sm-img">   </aside>
                     </div>
                     <div class="col-md-6">
                        <aside class="rate"> <?php echo $this->lang->line('to');?> : 100$  </aside>
                        <aside class="loca-sm-img">    </aside>
                     </div>
                  </div>
                  <div class="list-pass">
                     <input type="text" class="members1"/>
                     <input type="text" class="luggage1"/>
                     <input type="text" class="bags1"/>
                  </div>
                  <div class="book">
                     <input type="button" value="BOOK NOW" class="booknow-small">
                  </div>
               </div>
               <div class="clearfix"></div>
            </div>
            <div class="col-md-3">
               <div class="first-car">
                  <div class="first-car-hed"><?php echo $this->lang->line('saloon_cars');?></div>
                  <div class="first-car-img"> <img src="<?php echo base_url();?>assets/system_design/images/car-img.jpg" width="100%"/> </div>
                  <div class="rl">
                     <div class="col-md-6 padding-p-r">
                        <aside class="rate"> <?php echo $this->lang->line('from');?>: 100$   </aside>
                        <aside class="city-sm-img">   </aside>
                     </div>
                     <div class="col-md-6">
                        <aside class="rate"> <?php echo $this->lang->line('to');?> : 100$  </aside>
                        <aside class="loca-sm-img">    </aside>
                     </div>
                  </div>
                  <div class="list-pass">
                     <input type="text" class="members1"/>
                     <input type="text" class="luggage1"/>
                     <input type="text" class="bags1"/>
                  </div>
                  <div class="book">
                     <input type="button" value="BOOK NOW" class="booknow-small">
                  </div>
               </div>
               <div class="clearfix"></div>
            </div>
            <div class="col-md-3">
               <div class="first-car">
                  <div class="first-car-hed"><?php echo $this->lang->line('saloon_cars');?></div>
                  <div class="first-car-img"> <img src="<?php echo base_url();?>assets/system_design/images/car-img.jpg" width="100%"/> </div>
                  <div class="rl">
                     <div class="col-md-6 padding-p-r">
                        <aside class="rate"> <?php echo $this->lang->line('from');?> : 100$   </aside>
                        <aside class="city-sm-img">   </aside>
                     </div>
                     <div class="col-md-6">
                        <aside class="rate"> <?php echo $this->lang->line('to');?> : 100$  </aside>
                        <aside class="loca-sm-img">    </aside>
                     </div>
                  </div>
                  <div class="list-pass">
                     <input type="text" class="members1"/>
                     <input type="text" class="luggage1"/>
                     <input type="text" class="bags1"/>
                  </div>
                  <div class="book">
                     <input type="button" value="BOOK NOW" class="booknow-small">
                  </div>
               </div>
               <div class="clearfix"></div>
            </div>
            <div class="col-md-3">
               <div class="first-car">
                  <div class="first-car-hed"><?php echo $this->lang->line('saloon_cars');?></div>
                  <div class="first-car-img"> <img src="<?php echo base_url();?>assets/system_design/images/car-img.jpg" width="100%"/> </div>
                  <div class="rl">
                     <div class="col-md-6 padding-p-r">
                        <aside class="rate"> <?php echo $this->lang->line('from');?> : 100$   </aside>
                        <aside class="city-sm-img">   </aside>
                     </div>
                     <div class="col-md-6">
                        <aside class="rate"> <?php echo $this->lang->line('to');?> : 100$  </aside>
                        <aside class="loca-sm-img">    </aside>
                     </div>
                  </div>
                  <div class="list-pass">
                     <input type="text" class="members1"/>
                     <input type="text" class="luggage1"/>
                     <input type="text" class="bags1"/>
                  </div>
                  <div class="book">
                     <input type="button" value="BOOK NOW" class="booknow-small">
                  </div>
               </div>
               <div class="clearfix"></div>
            </div>
         </div>
      </div>
   </div>
   <div class="container-fluid bg-con">
      <div class="container padding-p-0">
         <div class="row">
            <div class="col-md-12 padding-p-0">
               <div class="hedding-style">  </div>
               <aside class="main-hedd cw"> <?php echo $this->lang->line('cities');?> </aside>
               <div class="hedding-style1"> </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-3">
               <div class="first-car">
                  <div class="first-car-img"> <img src="<?php echo base_url();?>assets/system_design/images/city1.jpg" width="100%"/> </div>
                  <div class="rl">
                     <div class="col-md-12">
                        <aside class="city-hed">  <?php echo $this->lang->line('hyderabad');?>  </aside>
                     </div>
                  </div>
                  <div class="ci">
                     <div class="col-md-6 padding-p-r">
                        <aside class="rate"> <?php echo $this->lang->line('from');?> : 100$   </aside>
                        <aside class="city-sm-img">   </aside>
                     </div>
                     <div class="col-md-6">
                        <aside class="rate"> <?php echo $this->lang->line('to');?> : 100$  </aside>
                        <aside class="loca-sm-img">    </aside>
                     </div>
                  </div>
                  <div class="book">
                     <input type="button" value="VIEW ALL" class="view-small">
                  </div>
               </div>
               <div class="clearfix"></div>
            </div>
            <div class="col-md-3">
               <div class="first-car">
                  <div class="first-car-img"> <img src="<?php echo base_url();?>assets/system_design/images/city2.jpg" width="100%"/> </div>
                  <div class="rl">
                     <div class="col-md-12">
                        <aside class="city-hed"> <?php echo $this->lang->line('hyderabad');?> </aside>
                     </div>
                  </div>
                  <div class="ci">
                     <div class="col-md-6 padding-p-r">
                        <aside class="rate"> <?php echo $this->lang->line('from');?> : 100$   </aside>
                        <aside class="city-sm-img">   </aside>
                     </div>
                     <div class="col-md-6">
                        <aside class="rate"> <?php echo $this->lang->line('to');?> : 100$  </aside>
                        <aside class="loca-sm-img">    </aside>
                     </div>
                  </div>
                  <div class="book">
                     <input type="button" value="VIEW ALL" class="view-small">
                  </div>
               </div>
               <div class="clearfix"></div>
            </div>
            <div class="col-md-3">
               <div class="first-car">
                  <div class="first-car-img"> <img src="<?php echo base_url();?>assets/system_design/images/city3.jpg" width="100%"/> </div>
                  <div class="rl">
                     <div class="col-md-12">
                        <aside class="city-hed"> <?php echo $this->lang->line('hyderabad');?></aside>
                     </div>
                  </div>
                  <div class="ci">
                     <div class="col-md-6 padding-p-r">
                        <aside class="rate"> <?php echo $this->lang->line('from');?>: 100$   </aside>
                        <aside class="city-sm-img">   </aside>
                     </div>
                     <div class="col-md-6">
                        <aside class="rate"> <?php echo $this->lang->line('to');?> : 100$  </aside>
                        <aside class="loca-sm-img">    </aside>
                     </div>
                  </div>
                  <div class="book">
                     <input type="button" value="VIEW ALL" class="view-small">
                  </div>
               </div>
               <div class="clearfix"></div>
            </div>
            <div class="col-md-3">
               <div class="first-car">
                  <div class="first-car-img"> <img src="<?php echo base_url();?>assets/system_design/images/city4.jpg" width="100%"/> </div>
                  <div class="rl">
                     <div class="col-md-12">
                        <aside class="city-hed"> <?php echo $this->lang->line('hyderabad');?> </aside>
                     </div>
                  </div>
                  <div class="ci">
                     <div class="col-md-6 padding-p-r">
                        <aside class="rate"> <?php echo $this->lang->line('from');?> : 100$   </aside>
                        <aside class="city-sm-img">   </aside>
                     </div>
                     <div class="col-md-6">
                        <aside class="rate"> <?php echo $this->lang->line('to');?> : 100$  </aside>
                        <aside class="loca-sm-img">    </aside>
                     </div>
                  </div>
                  <div class="book">
                     <input type="button" value="VIEW ALL" class="view-small">
                  </div>
               </div>
               <div class="clearfix"></div>
            </div>
         </div>
      </div>
   </div>
   <section class="footer">
      <div class="container">
         <div class="col-lg-12 col-md-12 col-sm-12 padding-lr">
            <div class="row">
               <div class="col-lg-3 col-md-3 col-sm-12">
                  <div class="footer_div">
                     <div class="footer_heading">
                        <h5> <?php echo $this->lang->line('testimonials');?> </h5>
                     </div>
                     <!--./footer_heading-->
                     <div class="footer_social_links">
                        <div  id="testimonials-row">
                           <div class="row">
                              <div class="col-md-12 column">
                                 <div class="carousel slide" id="testimonials-rotate">
                                    <ol class="carousel-indicators">
                                       <li class="active" data-slide-to="0" data-target="#testimonials-rotate">
                                       </li>
                                       <li data-slide-to="1" data-target="#testimonials-rotate">
                                       </li>
                                       <li data-slide-to="2" data-target="#testimonials-rotate">
                                       </li>
                                    </ol>
                                    <div class="carousel-inner">
                                       <div class="item active">
                                          <div class="testimonials col-md-10 padding-p-0">
                                             <h3>
                                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit. - <br>
                                                <small class="name">Yayo Dudemous</small>
                                             </h3>
                                          </div>
                                          <div class="clearfix"></div>
                                       </div>
                                       <div class="item">
                                          <div class="testimonials col-md-10 padding-p-0">
                                             <h3>
                                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit. - <br>
                                                <small class="name">Yayo Dudemous</small>
                                             </h3>
                                          </div>
                                          <div class="clearfix"></div>
                                       </div>
                                       <div class="item">
                                          <div class="testimonials col-md-10 padding-p-0">
                                             <h3>
                                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit. - <br>
                                                <small class="name">Yayo Dudemous</small>
                                             </h3>
                                          </div>
                                          <div class="clearfix"></div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="pull-right">
                                    <a class="left" href="#testimonials-rotate" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                                    <a class="right" href="#testimonials-rotate" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                                    <div class="clearfix"></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!--end of container-->
                        <div class="clearfix"></div>
                     </div>
                  </div>
                  <!--./footer_div-->
               </div>
               <!--./col-lg-3-->
               <div class="col-lg-2 col-md-2 col-sm-12">
                  <div class="footer_div">
                     <div class="footer_heading">
                        <h5><?php echo $this->lang->line('our_company');?></h5>
                     </div>
                     <!--./footer_heading-->
                     <div class="recent_tweet">
                        <ul>
                           <li> <a href="#"><?php echo $this->lang->line('our_fleet');?> </a></li>
                           <li> <a href="#"><?php echo $this->lang->line('about_us');?> </a></li>
                           <li><a href="#"><?php echo $this->lang->line('FAQs');?> </a></li>
                           <li><a href="#"> <?php echo $this->lang->line('testimonials');?> </a></li>
                        </ul>
                     </div>
                  </div>
                  <!--./footer_div-->
               </div>
               <!--./col-lg-3-->
               <div class="col-lg-2 col-md-2 col-sm-12">
                  <div class="footer_div">
                     <div class="footer_heading">
                     </div>
                     <!--./footer_heading-->
                     <div class="recent_tweet rt-mp">
                        <ul>
                           <li><a href="#">  <?php echo $this->lang->line('careers');?></a></li>
                           <li><a href="#">   <?php echo $this->lang->line('privacy_policy');?></a></li>
                           <li><a href="#">  <?php echo $this->lang->line('terms_conditions');?></a></li>
                        </ul>
                     </div>
                  </div>
                  <!--./footer_div-->
               </div>
               <!--./col-lg-3-->
               <div class="col-lg-3 col-md-3 col-sm-12">
                  <div class="footer_div">
                     <div class="footer_heading">
                        <h5><?php echo $this->lang->line('news_letter');?></h5>
                     </div>
                     <!--./footer_heading-->
                     <div class="news_letter">
                        <input type="email" placeholder="Email" class="footer_input">
                        <button class="footer_btn"></button>
                        <small>*<?php echo $this->lang->line('we_never_send_spam');?></small>
                        <input type="button" class="sub" value="Subscribe">
                     </div>
                  </div>
                  <!--./footer_div-->
               </div>
               <!--./col-lg-3-->
               <div class="col-md-2">
                  <p class="credit-cards"><img alt="Cards we accept" src="<?php echo base_url();?>assets/system_design/images/cards1.gif"></p>
               </div>
            </div>
         </div>
      </div>
      <!--./container-->
   </section>
   <section class="bottom_footer">
      <div class="container">
         <div class="col-lg-9 col-md-9 col-sm-12 padding-lr">
            <div class="copyright-left">
               <p>&copy; <?php echo $this->lang->line('digi_advanced_cab_booking_system_2015')." ".echo $this->lang->line('all_rights_reserved');?></p>
            </div>
         </div>
         <div class="col-lg-3 col-md-3 col-sm-12 padding-lr">
            <div class="copyright-left right">
               <p><?php echo $this->lang->line('design_by_conquerors_technologies');?></p>
            </div>
         </div>
      </div>
   </section>
</div>