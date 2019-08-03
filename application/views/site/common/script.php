
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

					page = $('#local_drop').attr("alt");

					Pickup_time = $('#timepicker1').val();

					if(Pickpoint!='' && Droppoint!='')
					get_map(Pickpoint,Droppoint,Pickup_time,page);

			  }, 500);

		});
   	
   		$('.bxslider').bxSlider({
   				  minSlides: 1,
   				  maxSlides: 4,
   				  slideWidth:250,
   				  slideMargin: 10,
   				   infiniteLoop: false
   				});
   		
   		
   		$(".waiting_time").hide();
   		$(".waitnReturn").hide();
       
       
     $("#waitnReturn").click(function(){
   	
   	   
   	if($('#waitnReturn').is(":checked")) {
   
   		$(".waiting_time").toggle();
   		total = parseFloat($("#car_cost").val())*2;

		currency_symbol = $("#currency_symbol").val();
   		$("#journey_cost").val(currency_symbol+total.toFixed(2));
   		$("#total_cost").val(total);
   	
   	} else {
       
   		$(".waiting_time").toggle();
   		value = parseFloat($("#car_cost").val());

   		$(".waiting_time").val('0 0');
   		ins = $('#waiting_time').val().split(' ');
   		$('#waitingTime').val(ins[0]);
   		$('#waitingCost').val(ins[1]);
		currency_symbol = $("#currency_symbol").val();
   		$("#journey_cost").val(currency_symbol+value.toFixed(2));
   		$("#total_cost").val(value);
   		
   	}
   	
         
     });
                  
              
     $("#waiting_time").change(function(){
   	var car_cost = 0;
   	ins = $('#waiting_time').val().split(' ');
   	$('#waitingTime').val(ins[0]);
   	$('#waitingCost').val(ins[1]);
   	total = parseFloat($("#car_cost").val())*2+parseFloat(ins[1]);

	currency_symbol = $("#currency_symbol").val();
   	$("#journey_cost").val(currency_symbol+total.toFixed(2));
   	$("#total_cost").val(total);
     });
   			Pickpoint = '';
   			Droppoint = '';
   			Pickup_time = '';
   	   
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
   				page = $('#local_drop').attr("alt");
   		
   		Pickup_time = $('#timepicker1').val();
   			if(Pickpoint!='' && Droppoint!='') {
   				if($('#no_repeat').val() == 1) {
					get_map(Pickpoint,Droppoint,Pickup_time,page);		
					$('#journey_details').fadeIn(1500);
				}
   			}
     });
   		
   		
   		
   		//AIRPORTS DISTANCE CALCULATION
   			$(".airlocation").change(function(){
   			Pickpoint = '';
   			Droppoint = '';
   			Pickup_time = '';
   		
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
			
			Pickup_time = $('#timepicker1').val();
   			page = $('#local_drop').attr("alt");
   			if(Pickpoint!='' && Droppoint!='') { 
   				get_map(Pickpoint,Droppoint,Pickup_time,page);
   				$('#journey_details').fadeIn(1500);		
   			}
   		
   		});
   		//AIRPORTS COST CALCULATION END
   		
   });
   
   function numberWithCommas(x) {
		var parts = x.toString().split(".");
		parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		return parts.join(".");
	}
   
   function setActive(id) {
   	numid = id.split('_')[1];
   	$('#cars_data_list div').removeClass('active');
   	$('#'+id).parent().addClass('scrool-cab active');
   	$('#btnbooknow').fadeIn(300);
   	$('.waitnReturn').fadeIn(300);
   	$('#check_cars').val(1);
   	carCost = $('#cab_'+numid).val();
   	
   	$('#car_cost').val(carCost.split("_")[1]);
    var currency_symbol = $("#currency_symbol").val();

    if($('#waitnReturn').is(":checked")) {
        total = parseFloat($("#car_cost").val())*2;
        $("#journey_cost").val(currency_symbol + ' ' + total.toFixed(2)).fadeIn(300);
        $("#waiting_time").trigger('change');
    } else {
        total = parseFloat($("#car_cost").val());
        console.log(parseFloat($('#cost_'+numid).text().replace(currency_symbol, '')));
        $("#journey_cost").val($('#cost_' + numid).text()).fadeIn(300);
    }

   	$('#total_cost').val(total);
   	$("#car_name").val($('#cname_'+numid).val());

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
   		unitSystem: google.maps.UnitSystem.IMPERIAL
   		<?php } ?>		
       },
       callback: function(results){

   	var distance = (results.routes[0].legs[0].distance.text);

   	var dist0 = distance;

   	var dist  = distance.split(" ")[0];

   	var time  = results.routes[0].legs[0].duration.text+" (Approx)"; 
   	
   	  if (!results) return;
         $(this).gmap3({ 
   	    map:{
             options:{
   					center: [17.4689533,78.3891002], //42.032974, -105.482483
                       zoom: 12

             }
           },
           directionsrenderer:{
          options:{
            directions:results
          } 
        }
         
         });

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
			 $('#btnbooknow').hide();
			 $("#journey_cost").val('').hide();
				if(data != 0) {
				  $('#cars_data_list').html("<strong class='chose_car_txt' style='color:#f30;'>Choose a Car</strong>"+data);
				 $('.chose_car_txt').fadeOut().fadeIn();
				} else {
				  $('#cars_data_list').html('<p class="no-vehiclez">Sorry, No Vehicles Available.</p>');
				}
				$('#no_repeat').val('0');
   			 }		  		

   			});

       }
     }
   });
   }
   }
</script> 

