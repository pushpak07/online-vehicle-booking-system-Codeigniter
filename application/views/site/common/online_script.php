<?php if ($this->config->item('site_settings')->google_api_key!='') {?>

<script src="http://maps.googleapis.com/maps/api/js?key=<?php echo $this->config->item('site_settings')->google_api_key;?>&amp;libraries=places"></script>

<?php } ?>


<script src="<?php echo JS_JQUERY_GEOCOMPLETE;?>"></script>
<script src="<?php echo JS_LOGGER;?>"></script>

<script src="<?php echo JS_GMAP3;?>"></script>

<script src="<?php echo JS_BX_SLIDER;?>"></script>


<script>  
   $(document).ready(function(){

   	/* On Change Event of Time */
	   $('.action-next, .action-prev').click(function() {

			$('#no_repeat').val('1');
			setTimeout(
			  function() 
			  {

					if($('#pick_type').val()=='A')
					{
						Pickpoint = $('#airport_pick').val();
					}
					else if($('#pick_type').val()=='L')
					{
						Pickpoint = $('#local_pick').val();	
					}
					if($('#drop_type').val()=='A')
					{
						Droppoint = $('#airport_drop').val();
					}
					else if($('#drop_type').val()=='L')
					{
						
						Droppoint = $('#local_drop').val();
					}

					page = "booking_page";

					Pickup_time = $('#timepicker1').val();

					if(Pickpoint!='' && Droppoint!='')
					get_map(Pickpoint,Droppoint,Pickup_time,page);
					$('#journey_details').fadeIn();		

			  }, 500);

		});
   	
   	
   	//SLIDER
   	$('.bxslider').bxSlider({
     minSlides: 1,
     maxSlides: 4,
     slideWidth:250,
     slideMargin: 10,
      infiniteLoop: false
   });

   // SLIDER

   			Pickpoint = '';
   			Droppoint = '';
   			Pickup_time = '';
   			//Waiting_time = '';
   	   $(".location").geocomplete({
             country: '<?php echo $this->config->item('site_settings')->site_country;?>'
           }).bind("geocode:result", function(event, result){
		   if($('#no_repeat').val() == 1)
           	$(this).trigger("geocode");
   		$(this).val(JSON.stringify(result.formatted_address));

   			if($('#pick_type').val()=='A')
   			{
   				Pickpoint = $('#airport_pick').val();
   			}
   			else if($('#pick_type').val()=='L')
   			{
   				Pickpoint = $('#local_pick').val();	
   			}
   			if($('#drop_type').val()=='A')
   			{
   				Droppoint = $('#airport_drop').val();
   			}
   			else if($('#drop_type').val()=='L')
   			{

   				Droppoint = $('#local_drop').val();
   			}

   			page = "booking_page";
			Pickup_time = $('#timepicker1').val();

   			if(Pickpoint!='' && Droppoint!='') {

   				if($('#no_repeat').val() == 1) {
					get_map(Pickpoint,Droppoint,Pickup_time,page);		
					$('#journey_details').fadeIn(1500);
				}
   			}
     });
   		
   		//AIRPORTS DISTANCE CALCULATION
   		$('.airlocation').change(function(){
   			
   			Pickpoint = '';
   			Droppoint = '';
   			Pickup_time = '';
   			Waiting_time = '';
   			
   			if($('#pick_type').val()=='A')
   			{
   				Pickpoint = $('#airport_pick').val();
   			}
   			else if($('#pick_type').val()=='L')
   			{
   				Pickpoint = $('#local_pick').val();	
   			}
   			if($('#drop_type').val()=='A')
   			{
   				Droppoint = $('#airport_drop').val();
   			}
   			else if($('#drop_type').val()=='L')
   			{
   				Droppoint = $('#local_drop').val();
   			}
   			
   				
   				page = "booking_page";
  		
   			
   			Pickup_time = $('#timepicker1').val();
   			if(Pickpoint!='' && Droppoint!='') {
   				//alert(Pickpoint+" -->  "+Droppoint); 
   				get_map(Pickpoint,Droppoint,Pickup_time,page);		
   				$('#journey_details').fadeIn(1500);		
   			}
   			
   		});
   		//AIRPORTS COST CALCULATION END
   		
   		
   
   
   
   
   		
   });
   
   
   
   function setActiveOnline(id) {
   
   	numid = id.split('_')[1];
   	$('#cars_data_list div').removeClass('active');
   	$('li').removeClass('active');
   	$('#'+id).parent().closest('ul').addClass('active');
   	$('#'+id).parent().parent().addClass('car-sel-bx active');
   	$('#check_cars').val(1);
	$("#car_cost").val($('#'+id).val().split('_')[1]);
   	$("#car_name").val($('#cname_'+numid).val());
   	
   	calCost();
   	
   		
   }
   function calCost()
   {
   	
   	total = 0;
   	txt = "";
   	//Cost Calculation  For Two way 
   	if($('#waitnReturn').is(':checked'))
   	{
   		total = parseFloat($("#car_cost").val())*2+parseFloat($('#waiting_time').val());
   		txt = "<br>(Incl Waiting Time & Return Journey)";
   		
   	}
   	else
   	{
   		//Cost Calculation  For One Way Cost
   		total = $("#car_cost").val();
   		txt = "";
   	}
   	
   	$("#total_cost").val(parseFloat(total).toFixed(2));
	currency_symbol = $("#currency_symbol").val();
   	$("#total_cost1").html(currency_symbol+parseFloat(total).toFixed(2)+txt);
   	
   	
   }
   
   function numberWithCommas(x) {
		var parts = x.toString().split(".");
		parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		return parts.join(".");
	}
   
   function get_map(PickLocation,DropLocation,Pickup_time,page) {

   
   	
   if($('#no_repeat').val() == 1) {
   $("#map_canvas").gmap3({ 
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

	/* var dist = numberWithCommas(Math.round(parseFloat(results.routes[0].legs[0].distance.value)/1000));

   	var dist0 = dist+" "+(results.routes[0].legs[0].distance.text).split(" ")[1];

   	var time = results.routes[0].legs[0].duration.text+" (Approx)"; */
   	
   	var distance = (results.routes[0].legs[0].distance.text);

   	var dist0 = distance;

   	var dist  = distance.split(" ")[0];

   	var time  = results.routes[0].legs[0].duration.text+" (Approx)"; 

   	$('#time_id').text(time);
   	$("#total_time").val(time);
   	$('#distance_id').text(dist0);
   	$('#total_distance').val(dist0);
	var j_time = $('#time_id').text();

   	 $.ajax({
   			 type: 'POST',
   			 url: "<?php echo site_url();?>bookingsystem/getVechicles",
			 async: false,
   			 data: '<?php echo $this->security->get_csrf_token_name();?>=<?php echo $this->security->get_csrf_hash();?>&distance='+dist+','+'&Pickup_time='+Pickup_time+'&page='+page+'&journey_time='+j_time,
   			 cache: false,
   			 success: function(data) {

				$('#cars_data_list').html(data);
				$('.bxslider').bxSlider({
					  minSlides: 1,
					  maxSlides: 4,
					  slideWidth:250,
					  slideMargin: 10,
					   infiniteLoop: false
					});
				$('#no_repeat').val('0');
				if($('.bxslider').text() == 0) {

					$('.bxslider').html('<p class="no-vehiclez">Sorry, No Vehicles Available.</p>');

				}
   			 }

   			});

         if (!results) return;
         $(this).gmap3({
   	    map:{
             options:{
   					center: [17.4689533,78.3891002], //42.032974, -105.482483
                       zoom: 13,
                       animation: google.maps.Animation.DROP
             }
           },
          /*  directionsrenderer:{
             container: $(document.createElement("div")).addClass("googlemap").insertAfter($("#map_canvas")),
             options:{
               directions:results
             }
           } */
   
         });
       }
     }
   });
   }
  }
   
</script> 
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?php echo $this->lang->line('close');?></span></button>
            <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('route_map');?></h4>
         </div>
         <div class="modal-body">
            <div id="map_canvas" style="height:500px;"> </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('close');?></button>
         </div>
      </div>
   </div>
</div>
<!-- Modal -->
