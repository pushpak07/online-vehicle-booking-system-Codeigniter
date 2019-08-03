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
                          <li class="active" data-slide-to="0" data-target="#testimonials-rotate"> </li>
                          <li data-slide-to="1" data-target="#testimonials-rotate"> </li>
                          <li data-slide-to="2" data-target="#testimonials-rotate"> </li>
                        </ol>
                        <div class="carousel-inner">
                          <div class="item active">
                            <div class="testimonials col-md-10 padding-p-0">
                              <h3> Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit. - <br>
                                <small class="name">Yayo Dudemouszz</small> </h3>
                            </div>
                            <div class="clearfix"></div>
                          </div>
                          <div class="item">
                            <div class="testimonials col-md-10 padding-p-0">
                              <h3> Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit. - <br>
                                <small class="name">Yayo Dudemous</small> </h3>
                            </div>
                            <div class="clearfix"></div>
                          </div>
                          <div class="item">
                            <div class="testimonials col-md-10 padding-p-0">
                              <h3> Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit. - <br>
                                <small class="name">Yayo Dudemous</small> </h3>
                            </div>
                            <div class="clearfix"></div>
                          </div>
                        </div>
                      </div>
                      <div class="pull-right"> <a class="left" href="#testimonials-rotate" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right" href="#testimonials-rotate" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
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
                  <li><a href="#"> <?php echo $this->lang->line('FAQs');?></a></li>
                  <li><a href="#"> <?php echo $this->lang->line('testimonials');?> </a></li>
                </ul>
              </div>
            </div>
            <!--./footer_div--> 
          </div>
          <!--./col-lg-3-->
          <div class="col-lg-2 col-md-2 col-sm-12">
            <div class="footer_div">
              <div class="footer_heading"> </div>
              <!--./footer_heading-->
              <div class="recent_tweet rt-mp">
                <ul>
                  <li><a href="#"> <?php echo $this->lang->line('careers');?></a></li>
                  <li><a href="#"> <?php echo $this->lang->line('privacy_policy');?></a></li>
                  <li><a href="#"> <?php echo $this->lang->line('terms_conditions');?></a></li>
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
                <input type="email" placeholder="<?php echo $this->lang->line('email');?>" class="footer_input">
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
          <p>©<?php echo $this->lang->line('digi_advanced_cab_booking_system_2015')." ".<?php echo $this->lang->line('all_rights_reserved');?> </p>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 padding-lr">
        <div class="copyright-left right">
          <p><?php echo $this->lang->line('design_by_conquerors_technologies');?></p>
        </div>
      </div>
    </div>
  </section>
 
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="<?php echo base_url();?>/assets/scripts/jquery.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="<?php echo base_url();?>/assets/scripts/bootstrap.min.js"></script> 
<script src="<?php echo base_url();?>/assets/scripts/BeatPicker.min.js"></script> 
<script src="<?php echo base_url();?>/assets/scripts/bootstrap-timepicker.js"></script> 
<script type="text/javascript">
    $('.timepicker-default').timepicker();
</script>
   <script>
	$(document).ready(function(){
		
		$('#waitnReturn').click(function() {
		if($('#waitnReturn').is(':checked'))
		{
			$('#waitnReturn').val('yes');
			$('#waitingTimeDiv').fadeIn();
			distance();
		}
		else
		{
			$('#waitnReturn').val('no');			
			$('#waitingTimeDiv').fadeOut();
			$('#waitingTime').val('15 Min_0.00');
			distance();
		}
	});
	
	$('#waitingTime').change(function() {
		distance();	
	});

});
</script>
</body>
</html>