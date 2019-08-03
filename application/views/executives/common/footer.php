   </div>
<!--row end - navigation&content-->

<!--footer-->

		

				<div class="footer">

					<div class="row">
			
			<div class="col-lg-12">


      <div class="container"> 
	   <div class="copyright-left">
        
          <?php echo $this->config->item('site_settings')->rights_reserved_content;?>
       
		<p style="float:right">Page rendered in {elapsed_time} seconds. </p>
        </div>
	  </div>

    </div>

<script src='<?php echo SYSTEM_DSN;?>jquery-1.11.1.min'></script>


<script src="<?php echo JS_SCRIPT_JQUERY_VALIDATE_MIN;?>" type="text/javascript"></script>
      
<script src="<?php echo JS_ADDITIONAL_METHODS_MIN;?>" type="text/javascript"></script>

<script src="<?php echo JS_TIMEPICKER;?>"></script>


<script>
    $('#timepicker1').timepicki({increase_direction:'up'});
    $('#timepicker2').timepicki({increase_direction:'up'});
 
</script>

<!--Date Table--> 
<?php if(!empty($css_type) && in_array('datatable', $css_type)) { ?>

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

	<script src="<?php echo JS_BEATPICKER_MIN;?>"></script> 

    <script src="<?php echo JS_SIDEMENU_SCRIPT;?>"></script>

	<script src="<?php echo JS_BOOTSTRAP_MIN;?>" type="text/javascript"></script> 

	<!--Calendar--> 

	<?php if(in_array("calendar",$css_type)) { ?>

	<script src="<?php echo JS_RESPONSIVE_CALENDAR;?>"></script> 

	<script type="text/javascript">

      $(document).ready(function () {

        $(".responsive-calendar").responsiveCalendar({

          time: '2013-05',

          events: {

            "2013-04-30": {"number": 5, "url": "http://w3widgets.com/responsive-slider"},

            "2013-04-26": {"number": 1, "url": "http://w3widgets.com"}, 

            "2013-05-03":{"number": 1}, 

            "2013-06-12": {}}

        });

      });

    </script>

	<?php } ?>

	<!--Form elements-->

	<?php if(in_array("form",$css_type)) { ?>

	

	<link href="<?php echo CSS_UNIFORM_DEFAULT;?>" rel="stylesheet" media="screen">

    <link href="<?php echo CSS_CHOSEN_MIN;?>" rel="stylesheet" media="screen">

    <script src="<?php echo JS_JQUERY_UNIFORM_MIN;?>"></script>

    <script src="<?php echo JS_CHOSEN_MIN;?>"></script>



    <script type="text/javascript" src="<?php echo JS_SCRIPT_JQUERY_VALIDATE_MIN;?>"></script>

	<script src="<?php echo JS_FORM_VALIDATION;?>"></script>
 
 
 <?php if(isset($gmaps) && $gmaps == "true") { ?>
 <script src="http://maps.googleapis.com/maps/api/js?key=<?php echo $this->config->item('site_settings')->google_api_key;?>&amp;libraries=places"></script>

<script src="<?php echo JS_JQUERY_GEOCOMPLETE;?>"></script>
<script src="<?php echo JS_LOGGER;?>"></script>
<script src="<?php echo JS_GMAP3;?>"></script>
 
<?php } ?>

<script>

 jQuery(document).ready(function() {  

 FormValidation.init();
	 <?php if(isset($gmaps) && $gmaps == "true") { ?> 
	 
	Pickpoint = '';
	Droppoint = '';
	Pickup_time = '';
	$(".location").geocomplete({
          country: '<?php echo $this->config->item('site_settings')->site_country;?>' 
	}).bind("geocode:result", function(event, result){
	
	$(this).trigger("geocode");
   		$(this).val(JSON.stringify(result.formatted_address));		
   			
   			if(($('#local_pick').val()!='' && $('#local_drop').val()!='')) {
				Pickpoint = $('#local_pick').val();	
				Droppoint = $('#local_drop').val();
				Pickup_time = $('#timepicker1').val();
				page = $('#local_drop').attr("alt");
			}	
			
			
			if(Pickpoint!='' && Droppoint!='') {
				//alert(Pickpoint+" -->  "+Droppoint); 
				get_map(Pickpoint,Droppoint,Pickup_time,page);		
				$('#journey_details').fadeIn(1500);		
			}
     });
	<?php } ?>
			
		
	});
			
	function get_map(PickLocation,DropLocation,Pickup_time,page) {
		//alert('getmap.... boy....');
$("#dummy").gmap3({ 
 clear: {},

  getroute:{
    options:{
        origin:PickLocation,
        destination:DropLocation,
        travelMode: google.maps.DirectionsTravelMode.DRIVING,
		/*ENABLE IT IF MILES*/
		<?php if($this->config->item('site_settings')->distance_type=='Mi') {?>
		unitSystem: google.maps.UnitSystem.IMPERIAL,
		<?php } ?>		
    },
    callback: function(results){
	//alert('in results');  
	var dist0 = results.routes[0].legs[0].distance.text;
//	 var dist=Math.round(dist0.split(" ")[0])+dist0.split(" ")[1];
	 var dist=dist0.split(" ")[0];
	var time = results.routes[0].legs[0].duration.text+" (Approx)";
	// alert(time);
	//alert('dist:'+dist);
	//$('#time_id').text(time);
	//$("#total_time").val(time);
	//$('#distance_id').text(dist0);
	$('#distance').val(dist0+"  "+time);		
					
			$.ajax({			 

			 type: 'POST',			  

			 url: "<?php echo site_url();?>bookingsystem/getVechicles",
			 data: '<?php echo $this->security->get_csrf_token_name();?>=<?php echo $this->security->get_csrf_hash();?>&distance='+dist+','+'&Pickup_time='+Pickup_time+'&page='+page+'&journey_time='+time,
			 cache: false,			 
			 success: function(data) {			
			 //alert(data);
			 $('#cars_data_list').show();
			 $('#cars_data_list').html(data);
			 }		  		
			
			});
	}
  }
});
} 
			
			
			
			
	 		$(function() {

			 

				$(".uniform_on").uniform();

				$(".chzn-select").chosen();

			 

	 

			});

			
		
        
  $("#return_journey").click(function(){
          
		   
	
	if($('#return_journey').is(":checked")) {
		
		$("#waiting_time_div").fadeIn(500);
		total = parseInt($("#car_cost").val())*2;
		$("#total_cost").val(total);
	
	} else {
      
		$("#waiting_time_div").fadeOut(500);
		value = parseInt($("#car_cost").val());
		$("#total_cost").val(value);
		
	}
        
   });
 

 $("#waiting_time").change(function(){
	
	ins = $('#waiting_time').val().split(' ');
	
	total = parseInt($("#car_cost").val()*2)+parseInt(ins[1]);
	
	$("#total_cost").val(total);
	
  });
 
 function setActive(id) {
		
		numid = id.split('_')[1];
		$('#waitnreturn').fadeIn(500);
		carCost = $('#cab_'+numid).val();	
		cost = (carCost.split("_")[1]);
		$('#car_cost').val(cost);
		$("#total_cost").val(cost); 
		
}

        </script>

		<?php } ?>
        
        
        
<script>
function photo(input,name)
{
	if (input.files && input.files[0]) 
	{
		var reader = new FileReader();
		reader.onload = function (e) 
		{
			input.style.width = '50%';
			$('#'+name+'').attr('src', e.target.result);
			$('#'+name+'').fadeIn();
		};
		reader.readAsDataURL(input.files[0]);
	}
}

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

	</div>
		</div>
      	<!--footer-->
       


		  </div>
	   </div> 
	   </div>
	</div>
</div>





</body>

 </html>