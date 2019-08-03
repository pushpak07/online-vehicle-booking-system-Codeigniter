<section class="footer">
    <div class="container">
      <div class="col-lg-12 col-md-12 col-sm-12 padding-lr">
        <div class="row">
		
		<?php 
		$testimonials = $this->dvbs_model->get_testimonials('Active');
		
		if (!empty($testimonials)) { ?>
          <div class="col-lg-3 col-md-3 col-sm-4">
            <div class="footer_div">
              <div class="footer_heading">
                <h5><?php echo $this->lang->line('testimonials');?> </h5>
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
                          <?php $i=0; 
						 
						           foreach($testimonials as $row):?>

						           <div class="item <?php if($i++==0) echo ' active';?>">
                            <div class="testimonials col-md-10 padding-p-0">
                              <h3> <?php echo isset($row->content) ? $row->content : ''; ?><br>
                                <small class="name"> <?php echo isset($row->user_name) ? $row->user_name : ''; ?></small> </h3>
                            </div>
                            <div class="clearfix"></div>
                          </div>
                          <?php endforeach; ?>
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
		<?php } ?>
          <!--./col-lg-3-->
          
		  
		  
		  <div class="col-lg-2 col-md-2 col-sm-4">
            <div class="footer_div">
              <div class="footer_heading">
                <h5><?php echo $this->lang->line('our_company');?></h5>
              </div>
              <!--./footer_heading-->
              <div class="recent_tweet">
                <ul>
                  <!-- <li> <a href="#">Our Fleet </a></li> -->
                  <li> <a href="<?php echo site_url();?>welcome/contactUs"><?php echo $this->lang->line('contact_us');?></a></li>
                  <li><a href="<?php echo site_url();?>welcome/faqs"><?php echo $this->lang->line('FAQs');?></a></li>
                 <li><a href="<?php echo site_url();?>welcome/testimonials"> <?php echo $this->lang->line('testimonials');?></a></li>
                </ul>
              </div>
            </div>
            <!--./footer_div--> 
          </div>
		  
		  

      <!--Pages-->
      <?php $sub_categories = $this->dvbs_model->get_footer_pages('Active');

        if (!empty($sub_categories)) { ?>

          <!--./col-lg-3-->
          <div class="col-lg-2 col-md-2 col-sm-4">
            <div class="footer_div">
			
              <div class="footer_heading"> 
			  <h5><?php echo $this->lang->line('pages');?></h5>
			  </div>
              <!--./footer_heading-->
              <div class="recent_tweet">
                <ul>
                
                <?php 
				  foreach($sub_categories as $sub_row) {
				  
				  ?>
				  <li><a href="<?php echo site_url();?>page/index/<?php echo $sub_row->id;?>/<?php echo clean_string($sub_row->name);?>"><?php echo $sub_row->name;?></a></li>
				  
				  <?php } ?>
               
                </ul>
              </div>
            </div>
            <!--./footer_div--> 
          </div>
    <!--Pages-->

          <?php } ?>
		  
		  
          <div class="col-md-2">
		  
            <p class="credit-cards"><label><?php echo $this->lang->line('cards_we_accept');?></label><img alt="Cards we accept" src="<?php echo IMGS_SYSTEM_DSN;?>cards1.gif"></p>
          </div>
		  
		  
        </div>
      </div>
    </div>
    <!--./container--> 
  </section>

  <section class="bottom_footer">
    <div class="container">
      <div class="col-md-8 padding-lr">
        <div class="copyright-left">
         <?php if(isset($this->config->item('site_settings')->rights_reserved_content)) { ?>
          <p><?php echo $this->config->item('site_settings')->rights_reserved_content;?></p>
        <?php } ?>
        </div>
      </div>
      <div class="col-md-4 padding-lr">
        <div class="copyright-left right-foo">
         
		  <?php if(isset($this->config->item('site_settings')->design_by)) { ?>
          <p><?php echo $this->lang->line('design_by');?><a href="<?php if(isset($this->config->item('site_settings')->url_for_design_by)) echo $this->config->item('site_settings')->url_for_design_by;?>" target="_blank"> <?php echo  $this->config->item('site_settings')->design_by;?></a></p>
        <?php } ?>
        </div>
      </div>
    </div>
  </section>    
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 

<script src="<?php echo JS_BOOTSTRAP_MIN;?>"></script> 

<!-- Include all compiled plugins (below), or include individual files as needed --> 


<script src="<?php echo JS_JQUERY_VALIDATE_MIN;?>" type="text/javascript"></script>
<script src="<?php echo JS_ADDITIONAL_METHODS_MIN;?>" type="text/javascript"></script>


<script src="<?php echo JS_CHOSEN_MIN;?>"></script>

<script>
$(function() {
$(".chzn-select").chosen();});
</script>
 

<script src="<?php echo JS_BEATPICKER_MIN;?>"></script>

    <script src="<?php echo JS_TIMEPICKER;?>"></script>
    <script>
    	$('#timepicker1').timepicki({increase_direction:'up'});
		$('#timepicker2').timepicki({increase_direction:'up'});
 	 
    </script>

<?php if (in_array("homebooking",$css_type)) { 

  $this->load->view('site/common/script'); 

 }  if (in_array("onlinebooking",$css_type)) { 

   $this->load->view('site/common/online_script'); 

 } ?>


<!--Date Table--> 
<?php if(in_array("datatable",$css_type)) { ?>

<script src='<?php echo URL_ADMIN_DATATABLES;?>js/jquery.dataTables.min.js'></script>

<script src='<?php echo URL_ADMIN_DATATABLES;?>js/dataTables.responsive.min.js'></script>


<script src='<?php echo SYSTEM_DSN;?>functions.js'></script>

<script type="text/javascript" language="javascript" class="init">

var datatablevar;
$(document).ready(function() {
	
	<?php
	
	if(isset($ajaxrequest)) { ?>
	
	datatablevar = $('#example').dataTable(	
	{
        <?php if(isset($ajaxrequest['disablesorting'])) {?>
		"aoColumnDefs": [
          { 'bSortable': false, 'aTargets': [ <?php echo $ajaxrequest['disablesorting'];?> ] }
		],
		<?php } ?>
		/*<?php if(isset($ajaxrequest['language'])) {?>
			"language": {				
				<?php if(isset($ajaxrequest['language']['infoEmpty'])) {?>
				"infoEmpty": "No records available test",
				<?php } ?>
			},
		<?php } ?>*/
		<?php if(isset($ajaxrequest['url'])) {?>
		
		"processing": true,
		"serverSide": true,
		"ajax": {
			"url": "<?php echo $ajaxrequest['url'];?>",
			"type": "POST",
			"data": function ( d ) {
				d.<?php echo $this->security->get_csrf_token_name(); ?>="<?php echo $this->security->get_csrf_hash(); ?>";
				
				<?php if(isset($ajaxrequest['type']) && $ajaxrequest['type'] != '') {?>
					d.type = "<?php echo $ajaxrequest['type'];?>";
				<?php } else {?>
					d.type = "Category";
				<?php } ?>
				<?php if(isset($ajaxrequest['params']) && count($ajaxrequest['params']) > 0) 
				{
					foreach($ajaxrequest['params'] as $pakey => $paval)
					{ ?>
						d.<?php echo $pakey;?> = "<?php echo $paval;?>";
					<?php } ?>								
				<?php } ?>
			}
		},
		<?php } ?>
    }
	
	);
	<?php }else{ ?>
	$('.example').dataTable();
	<?php } ?>
	
} );
</script>

<?php } ?>


<!--Date Table--> 
	


<script type="text/javascript" language="javascript" class="init"></script>
<script>
 function setActiveOnlinePackage(id) {
	numid = id.split('_')[1];
	$('#cars_data_list div').removeClass('active');
	$('li').removeClass('active');
	$('#'+id).parent().closest('ul').addClass('active');
	$('#'+id).parent().parent().addClass('car-sel-bx active');
	
}
</script>


<!--PNOTIFY JS-->
<script type="text/javascript" src="<?php echo PNOTIFY_MIN_JS;?>"></script>
<script type="text/javascript" src="<?php echo PNOTIFY_ANIMATE_JS;?>"></script>
<script type="text/javascript" src="<?php echo PNOTIFY_BUTTON_JS;?>"></script>
<script type="text/javascript" src="<?php echo PNOTIFY_CALLBACK_JS;?>"></script>
<script type="text/javascript" src="<?php echo PNOTIFY_CONFIRM_JS;?>"></script>
<script type="text/javascript" src="<?php echo PNOTIFY_DESKTOP_JS;?>"></script>
<!--PNOTIFY JS-->  



	<!--Slider--> 
<?php if(in_array("slider",$css_type)) { 
 } ?>
	<!--Slider--> 
	
    
<script>
function checkNotify(title,text,type)
{
    var notification = new PNotify({
        title: title,
        text: text,
        type: type
    });

    notification.open();
}
</script>      
    
    
    
</body>
</html>