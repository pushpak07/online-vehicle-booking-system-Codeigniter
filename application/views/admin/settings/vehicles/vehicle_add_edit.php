<style>

#wt_enabled_table thead, #ct_incr_table thead {

	 background: none repeat scroll 0 0 #fafafa;
    font-size: 12px;

}

</style>
<?php $locale_info = localeconv(); ?>


   <div class="main-container nine-bmc bmc-remove">
          

      <div class="content">
       
        <div class="main-hed"> 

			<a href="<?php echo site_url();?>auth"><?php echo $this->lang->line('home');?></a> >>
			<?php echo $this->lang->line('vehicle_settings');?> >> 
			<a href="<?php echo site_url();?>vehicles"> <?php echo $this->lang->line('vehicles_list');?></a> >> 
			<?php echo $title;?>
			 
			</div>


          <div class="module">           
			
          
			
			
					
		   <div class="module-head">
		   
				 <h3> <?php if(isset($title)) echo $title;?></h3>
                 
				<a class="btn btn-primary add-btn" href="<?php echo site_url();?>vehicles">
				<i class="fa fa-list">&nbsp;<?php echo $this->lang->line('vehicles');?></i></a>					
	 
		  </div>
		   
            <div class="module-body">
              <!---->			  
			  	<form method="POST" name="add_vehicle_form" id="add_vehicle_form" action="<?php echo site_url();?>vehicle_settings/vehicles/<?php if(isset($edit_data->id)) echo "Update"; else echo "Add"; ?>" enctype="multipart/form-data">
                
                
               

					<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">

              <div class="col-md-6">


                <div class="form-group">
                  <label>
                    <?php echo $this->lang->line('category'); ?><?php echo required_symbol();?>
                    </label>
						 <?php
							$sel = set_value('category_id',(isset($edit_data->category_id)) ? $edit_data->category_id : '');

							echo form_dropdown('category_id', $vehicleCatOptions, $sel, 'id="category_id" class="chzn-select"');
						?>
						<?php echo form_error('category_id');?>
                  </div>

                   <div class="form-group">
                     <label>
                       <?php echo $this->lang->line('name'); ?><?php echo required_symbol();?>
                      </label>
                       <input type="text" name="name" placeholder="<?php echo $this->lang->line('car_name');?>" value="<?php echo set_value('name', (isset($edit_data->name)) ? $edit_data->name : '');?>"/>
					    <?php echo form_error('name');?>
                   </div>

				   <div class="form-group">
                     <label>
                       <?php echo $this->lang->line('model'); ?><?php echo required_symbol();?>
                     </label>
                     <input type="text" name="model" placeholder="<?php echo $this->lang->line('model');?>" value="<?php echo set_value('model', (isset($edit_data->model)) ? $edit_data->model : '');?>"/>
					 <?php echo form_error('model');?>
                   </div>

                   <div class="form-group">
                     <label>
                       <?php echo $this->lang->line('vehicle_no');?>
                     </label>
                     <input type="text" name="vehicle_no" placeholder="<?php echo $this->lang->line('vehicle_no');?>"  value="<?php echo set_value('vehicle_no', (isset($edit_data->car_number_plate)) ? $edit_data->car_number_plate : '');?>" />
					 <?php echo form_error('vehicle_no');?>
                   </div>

                   <div class="form-group">
                     <label>
                       <?php echo $this->lang->line('fuel_type'); ?>
                     </label>
                      <?php
							$sel1 = '';
							$fuel_type_opts = array('petrol'=>$this->lang->line('petrol'),'diesel'=>$this->lang->line('diesel'),'gas'=>$this->lang->line('gas'));
							if (isset($edit_data->fuel_type))
								$sel1 = $edit_data->fuel_type;

							echo form_dropdown('fuel_type', $fuel_type_opts, $sel1, 'id="fuel_type" class="chzn-select"');
						?>
                   </div>

                   <div class="form-group">
                     <label>
                       <?php echo $this->lang->line('passenger_capacity');?><?php echo required_symbol();?>
                     </label>
                     <input type="text" name="passengers_capacity" placeholder="<?php echo $this->lang->line('no_of_passengers');?>" value="<?php echo set_value('passenger_capacity', (isset($edit_data->passengers_capacity)) ? $edit_data->passengers_capacity : ''); ?>"/>
					 <?php echo form_error('passenger_capacity');?>
                   </div>

                   <div class="form-group">
                     <label>
                       <?php echo $this->lang->line('large_luggage_capacity'); ?><?php echo required_symbol();?>
                     </label>
                     <input type="text" name="large_luggage_capacity" placeholder="<?php echo $this->lang->line('in_kgs');?>" value="<?php echo set_value('large_luggage_capacity', (isset($edit_data->large_luggage_capacity)) ? $edit_data->large_luggage_capacity : '');?>"/>
					 <?php echo form_error('large_luggage_capacity');?>
                   </div>

                   <div class="form-group">
                     <label>
						 <?php echo $this->lang->line('small_luggage_capacity'); ?><?php echo required_symbol();?>
                     </label>
                     <input type="text" name="small_luggage_capacity" placeholder="<?php echo $this->lang->line('in_kgs');?>" value="<?php echo set_value('small_luggage_capacity', (isset($edit_data->small_luggage_capacity)) ? $edit_data->small_luggage_capacity : '');?>"/>
					  <?php echo form_error('small_luggage_capacity');?>
                   </div>

				    <div class="form-group">
                     <label>
						 <?php echo $this->lang->line('image'); ?>
                     </label>

					 <input name="userfile" id="image" type="file" title="<?php echo $this->lang->line('vehicle')." ".$this->lang->line('image');?>" onchange="readURL(this)" style="width:80px;">
					<br/>
					<?php 

						$src = "";
						$style="display:none;";

						if(isset($edit_data->image) && $edit_data->image != "") {

							$src = base_url()."uploads/vehicle_images/".$edit_data->image;
							$style="";

						}
					?>
				 <img class="img-responsive vehicle-img" id="vehicle_image" src="<?php echo $src;?>" style="<?php echo $style;?>" />

                   </div>

				   <div class="form-group">
                     <label>
						 <?php echo $this->lang->line('description'); ?>
                     </label>
                     <input type="text" name="description" placeholder="<?php echo $this->lang->line('eg_car_conditions_etc');?>" value="<?php echo set_value('description', (isset($edit_data->description)) ? $edit_data->description : ''); ?>"/>
                   </div>
                 </div>
                 <!-- another div -->
                 <div class="col-md-6">

                   <div class="form-group">
                     <label>
                        <?php echo $this->lang->line('total_vehicles'); ?><?php echo required_symbol();?>
                     </label>
                     <input type="text" name="total_vehicles" placeholder="<?php echo $this->lang->line('total_number_of_vehicles_available');?>" value="<?php echo set_value('total_vehicles', (isset($edit_data->total_vehicles)) ? $edit_data->total_vehicles : '');?>"/>
                    </div>

					<div class="form-group">
                     <label>
                        <?php echo $this->lang->line('cost')." ".$this->lang->line('starting')." ".$this->lang->line('from')." (".$this->config->item('site_settings')->currency_symbol.")";  ?><?php echo required_symbol();?>

                     </label>
                     <input type="text" name="starting_cost" value="<?php echo set_value('starting_cost', (isset($edit_data->cost_starting_from)) ? $edit_data->cost_starting_from : ''); ?>"/>
					 <?php echo form_error('starting_cost');?>
                    </div>

					<div class="cost-type">
                   <div class="form-group">

                      <label>
                        <?php echo $this->lang->line('cost_type'); ?>
                      </label>
                      <input type="radio" name="cost_type" id="cost_type_flat" value="flat" <?php if (isset($edit_data->cost_type)) { if($edit_data->cost_type == "flat") echo "checked"; } else echo "checked"; ?> class="css-radio css-label" onclick="action_cost_type_div();">
					  <label class="css-label" for="cost_type_flat"> <?php echo $this->lang->line('flat');?></label>&nbsp;&nbsp;&nbsp;

                      <input type="radio" name="cost_type" id="cost_type_incremental" value="incremental" <?php if (isset($edit_data->cost_type)) { if($edit_data->cost_type == "incremental") echo "checked"; } ?> class="css-radio css-label" onclick="action_cost_type_div();">
						<label class="css-label" for="cost_type_incremental"> <?php echo $this->lang->line('incremental');?></label>

                    </div>					

					<div id="ct_flat_div" <?php if (isset($edit_data->cost_type)) { if($edit_data->cost_type == "incremental") echo "style='display:none;'"; } ?>>
					<p id="ct_flat_text">* Set flat costs per <?php echo $this->config->item('site_settings')->distance_type;?>.</p>
					<table width="100%">

					 <tr>
					<td></td>
					<td>Min. Distance (in <?php echo $this->config->item('site_settings')->distance_type;?>)</td>
					<td>Min. Cost (<?php echo $this->config->item('site_settings')->currency_symbol;?>)</td>
					</tr>
					<tr>
						<td> <?php echo $this->lang->line('day');?></td>
						<td><input type="text" placeholder="<?php echo $this->lang->line('minimum_day_distance');?> " name="ct_flat_min_dist_day" id="ct_flat_min_dist_day" value="<?php if(isset($edit_data->ct_flat_min_dist_day)) echo $edit_data->ct_flat_min_dist_day; ?>"></td>
						<td><input type="text" placeholder="<?php echo $this->lang->line('minimum_day_cost');?>" name="ct_flat_min_cost_day" id="ct_flat_min_cost_day" value="<?php if(isset($edit_data->ct_flat_min_cost_day)) echo $edit_data->ct_flat_min_cost_day; ?>"></td>
					</tr>

					<tr>
						<td> <?php echo $this->lang->line('night');?></td>
						<td><input type="text" placeholder="<?php echo $this->lang->line('minimum_night_distance');?> " name="ct_flat_min_dist_night" id="ct_flat_min_dist_night" value="<?php if(isset($edit_data->ct_flat_min_dist_night)) echo $edit_data->ct_flat_min_dist_night; ?>"></td>
						<td><input type="text" placeholder="<?php echo $this->lang->line('minimum_night_cost');?>" name="ct_flat_min_cost_night" id="ct_flat_min_cost_night" value="<?php if(isset($edit_data->ct_flat_min_cost_night)) echo $edit_data->ct_flat_min_cost_night; ?>"></td>
					</tr>            
					<tr><td></td></tr>
					 <tr><td></td></tr>
					 <tr><td></td></tr>
					<tr><td></td></tr>
					  <tr><td></td></tr>
					 <tr><td></td></tr>
					  <tr><td></td></tr>
					  <tr><td></td></tr>
					  <tr><td></td></tr>					
					<tr>
					<td></td>
					<td><?php echo $this->lang->line('day')." ".$this->lang->line('time');?></td>
					<td><?php echo $this->lang->line('night')." ".$this->lang->line('time');?></td>
					</tr>
					<tr>
						<td> <?php echo $this->lang->line('flat')." ".$this->lang->line('cost')." (per ".$this->config->item('site_settings')->distance_type.")";?> </td>
						<td><input type="text" placeholder="<?php echo $this->lang->line('day_flat_cost');?>" name="day_flat_rate" id="day_flat_rate" value="<?php if(isset($ctFlatValues->day_flat_rate)) echo $ctFlatValues->day_flat_rate; ?>"/></td>
						<td><input type="text" placeholder="<?php echo $this->lang->line('night_flat_cost');?>" name="night_flat_rate" id="night_flat_rate" value="<?php if(isset($ctFlatValues->night_flat_rate)) echo $ctFlatValues->night_flat_rate; ?>"/></td>
					</tr>
					</table>
					</div>
					
					<div id="ct_incr_div" <?php if (isset($edit_data->cost_type)) { if($edit_data->cost_type == "flat") echo "style='display:none;'"; } else echo 'style="display:none;"';?> >
					<p id="ct_incr_text">* Set incremental costs for first m-n <?php echo $this->config->item('site_settings')->distance_type;?>, second m-n <?php echo $this->config->item('site_settings')->distance_type;?> etc.</p>
					<table width="100%" id="ct_incr_table" >
					  <thead>
							<tr>
								<th>#</th>
								<th><?php echo $this->lang->line('from')." (".$this->lang->line('in')." ".$this->config->item('site_settings')->distance_type.")";?></th>
								<th><?php echo $this->lang->line('to')." (".$this->lang->line('in')." ".$this->config->item('site_settings')->distance_type.")";?></th>					
								<th><?php echo $this->lang->line('day')." ".$this->lang->line('cost')." (".$this->lang->line('per')." ".$this->config->item('site_settings')->distance_type.")";?></th>
								<th><?php echo $this->lang->line('night')." ".$this->lang->line('cost')." (".$this->lang->line('per')." ".$this->config->item('site_settings')->distance_type.")";?></th>
								<th> <i class="fa fa-trash"></i></th>
							</tr>
						</thead>

						<tbody>

							<?php if(isset($ctIncrValues) && count($ctIncrValues)>0) {

								$k = 1;

								foreach($ctIncrValues as $ci) {

							?>

							<tr id="r_<?php echo $k;?>">
								<td></td>
								<td>	 
									 <input type="text" id="fromKm_<?php echo $k;?>" placeholder="<?php echo $this->lang->line('from_in_kms');?>" value="<?php echo $ci->from_distance_value;?>" onblur="if(isNaN(parseInt(this.value)) || this.value == 0) { window.alert('Value must be greater than 0.'); this.value = 1;}">
								</td>
								<td>	 
									 <input type="text" id="toKm_<?php echo $k;?>" placeholder="<?php echo $this->lang->line('to_in_kms');?>" value="<?php echo $ci->to_distance_value;?>" onblur="setFromKm(<?php echo $k;?>, this.value);">
								</td>
								<td>	 
									<input type="text" id="dayCost_<?php echo $k;?>" placeholder="<?php echo $this->lang->line('day_cost');?>" value="<?php echo $ci->day_cost;?>" onblur="if(isNaN(parseFloat(this.value)) || this.value == 0 || this.value == 0.00) { window.alert('Value must be greater than 0.'); this.value = '0.00';}">
								</td>
								<td>	 
									<input type="text" id="nightCost_<?php echo $k;?>" placeholder="<?php echo $this->lang->line('night_cost');?>" value="<?php echo $ci->night_cost;?>" onblur="if(isNaN(parseFloat(this.value)) || this.value == 0 || this.value == 0.00) { window.alert('Value must be greater than 0.'); this.value = '0.00';}">
								</td>
								
								<td><?php if($k != 1) { ?><a onclick="deleteRow(<?php echo $k;?>,'ct_incr_table')" style="cursor:pointer;" title="Delete Row"> <i class="fa fa-trash"></i></a><?php } $k++;?></td>
							</tr>
							
							<?php } } else { ?>
							
								<tr id="r_1">
								<td></td>
								<td>	 
									 <input type="text" name="fromKm" id="fromKm_1" placeholder="<?php echo $this->lang->line('from');?>" style="display:none;" onblur="if(isNaN(parseInt(this.value)) || this.value == 0) { window.alert('Value must be greater than 0.'); this.value = 1;}">
								</td>
								<td>	 
									 <input type="text" name="toKm" id="toKm_1" placeholder="<?php echo $this->lang->line('to');?>" style="display:none;" onblur="setFromKm(1, this.value);">
								</td>
								<td>	 
									<input type="text" name="dayCost" id="dayCost_1" placeholder="<?php echo $this->lang->line('day_cost');?>" value="0.00" style="display:none;" onblur="if(isNaN(parseFloat(this.value)) || this.value == 0 || this.value == 0.00) { window.alert('Value must be greater than 0.'); this.value = '0.00';}">
								</td>
								<td>	 
									<input type="text" name="nightCost" id="nightCost_1" placeholder="<?php echo $this->lang->line('night_cost');?>" value="0.00" style="display:none;" onblur="if(isNaN(parseFloat(this.value)) || this.value == 0 || this.value == 0.00) { window.alert('Value must be greater than 0.'); this.value = '0.00';}">
								</td>
								
								<td> </td>
							</tr>
							
							<?php } ?>
						
						</tbody>
		
						<input type="hidden" name="ct_data" id="ct_data" >

					</table>
					</div>
					
					
					</div>
					
					<?php if(isset($vehicleFeatures) && count($vehicleFeatures)>0) { ?>
					<label><?php echo $this->lang->line('vehicle_features');?></label>				
					<div class="form-group">
						<?php $x=1; foreach($vehicleFeatures as $f) { ?>
						<input type="checkbox" name="feature_id[]" id="feature_id_<?php echo $x;?>" value="<?php echo $f->id;?>" <?php if(isset($vfData) && in_array($f->id,$vfData)) echo "checked";?> class="css-checkbox" />
						<label for="feature_id_<?php echo $x++;?>" class="css-label-ch"><?php echo $f->features;?></label>
						 <?php } ?>
					</div>
					<?php } ?>

					<div>
					<label><?php echo $this->lang->line('status');?></label>
					<?php 
					$options = array(
									'Active' => 'Active',
									'Inactive' => 'Inactive',
									);
					$select = '';
					if(isset($edit_data->status)) 
						$select = $edit_data->status;
						
					echo form_dropdown('status',$options,$select,'class="chzn-select"');
					?>

					</div>


 				 <input name="current_img" id="current_img" type="hidden" value="<?php if(isset($edit_data->image)) echo $edit_data->image; ?>">	  
				<input name="Id_to_update" id="Id_to_update" type="hidden" value="<?php if(isset($edit_data->id)) echo $edit_data->id; ?>">
				 <br/>


                 </div>

				
                 <div class="col-md-6">
                   <input type="submit" value="<?php if(isset($edit_data->id)) echo $this->lang->line('update'); else echo $this->lang->line('add');?>" id="submitbtn" name="btnSubmit" class="right-p">
                 </div>
				 
				 </form>
				 
            </div>
            
          </div>
        </div>
      </div>
  

<script type="text/javascript">
	$(document).ready(function() {
	
		reset_sno('wt_enabled_table');
		reset_sno('ct_incr_table');
		
		$('#wt_enabled_table tbody').on("click","tr",function() {
		
			var row_no = $(this).index()+1;

			if($('#wt_enabled_table >tbody >tr').length == row_no) {
				
				$('#toTime_'+(row_no-1)).blur();
				/* Append new Row to the Table of Waiting Time */
				append_rows(1);
			
			}
		
		});
		
		$('#ct_incr_table tbody').on("click","tr",function() {
		
			var row_no = $(this).index()+1;

			if($('#ct_incr_table >tbody >tr').length == row_no) {
				
				$('#toKm_'+(row_no-1)).blur();
				/* Append new Row Cost Type Table */
				appendRows(1);
			
			}
		
		});
		
		
		
	  //On clicking submit button, get the appended Table data first by preventing the submission and then submit the form.
	   $('#submitbtn').on("click",function(e) {
	   
			var valid = false;
			
			if(valid == false) {

				var wt_costs=" ";
				
				var ct_costs=" ";
				
				if($('input[name="waiting_time"]:checked').val() == "enable") {

					$('#wt_enabled_table >tbody >tr').each(function() {
					
						var rowId = $(this).attr('id').split("_")[1];
						
						wt_costs +=$('#fromTime_'+rowId).val()+","+$('#toTime_'+rowId).val()+","+$('#wCost_'+rowId).val()+"^";
						
					});

					$('#wt_data').val(wt_costs);
					
					valid = true;
				
				}
				
				if($('input[name="cost_type"]:checked').val() == "incremental") {

					$('#ct_incr_table >tbody >tr').each(function() {
					
						var rowId = $(this).attr('id').split("_")[1];
						
						ct_costs +=$('#fromKm_'+rowId).val()+","+$('#toKm_'+rowId).val()+","+$('#dayCost_'+rowId).val()+","+$('#nightCost_'+rowId).val()+"^";
						
					});

					$('#ct_data').val(ct_costs);
					
					valid = true;
				
				} else if($('input[name="cost_type"]:checked').val() == "flat") {
				
					$('#ct_data').val($('#day_flat_rate').val()+"^"+$('#night_flat_rate').val());
					
					valid = true;
				
				}
			
				return valid;
			
			}
		
	   });
		
	
	});	
		
	
	//Append Rows For Waiting Time
	function append_rows(no_of_rows_to_append)
	{
	
		var rowNo = $('#wt_enabled_table >tbody >tr:last').attr('id').split('_')[1];//$('#wt_enabled_table >tbody >tr:last').index()+1;

		for(r=0; r<no_of_rows_to_append; r++) {
			
			$('#fromTime_'+rowNo).show();
			$('#toTime_'+rowNo).show();
			$('#wCost_'+rowNo).show();
			
			rowNo++;
			
			$('#wt_enabled_table tbody').append('<tr id="tr_'+rowNo+'"><td></td><td><input type="text" id="fromTime_'+rowNo+'" placeholder="From Time (in Mins)" style="display:none;"></td><td><input type="text" id="toTime_'+rowNo+'" placeholder="To Time (in Mins)" style="display:none;" onblur="setFromTime('+rowNo+', this.value);"></td><td><input type="text" id="wCost_'+rowNo+'" placeholder="Waiting Cost" style="display:none;" value="0.00" onblur="if(isNaN(parseFloat(this.value)) || this.value == 0) { window.alert(\'Value must be greater than 0.\'); this.value = \'0.00\';}"></td><td><a onclick="deleteRow('+rowNo+',\'wt_enabled_table\')" style="cursor:pointer;" title="Delete Row"><i class="fa fa-trash"></i></a></td></tr>');
			
			reset_sno('wt_enabled_table');
		
		}
	
	}
	
	//Append Rows For Cost Type Table (Incremental)
	function appendRows(no_of_rows_to_append)
	{
	
		var rowNo = $('#ct_incr_table >tbody >tr:last').attr('id').split('_')[1];//$('#ct_incr_table >tbody >tr:last').index()+1;

		for(r=0; r<no_of_rows_to_append; r++) {
			
			$('#fromKm_'+rowNo).show();
			$('#toKm_'+rowNo).show();
			$('#dayCost_'+rowNo).show();
			$('#nightCost_'+rowNo).show();
			
			rowNo++;
			
			$('#ct_incr_table tbody').append('<tr id="r_'+rowNo+'"><td></td><td><input type="text" id="fromKm_'+rowNo+'" placeholder="From" style="display:none;"></td><td><input type="text" id="toKm_'+rowNo+'" placeholder="To" style="display:none;" onblur="setFromKm('+rowNo+', this.value);"></td><td><input type="text" id="dayCost_'+rowNo+'" placeholder="Day Cost" style="display:none;" value="0.00" onblur="if(isNaN(parseFloat(this.value)) || this.value == 0) { window.alert(\'Value must be greater than 0.\'); this.value = \'0.00\';}"></td><td><input type="text" id="nightCost_'+rowNo+'" placeholder="Night Cost" style="display:none;" value="0.00" onblur="if(isNaN(parseFloat(this.value)) || this.value == 0) { window.alert(\'Value must be greater than 0.\'); this.value = \'0.00\';}"></td><td><a onclick="deleteRow('+rowNo+',\'ct_incr_table\')" style="cursor:pointer;" title="Delete Row"><i class="fa fa-trash"></i></a></td></tr>');
			
			reset_sno('ct_incr_table');
		
		}
	
	}
	
	
	//For Deleting Table Row based on rowNo.
   function deleteRow(rowNo, tab_id)
   {
	   if(tab_id == "wt_enabled_table")
		$('#tr_'+parseInt(rowNo)).remove();
	  if(tab_id == "ct_incr_table")
		$('#r_'+parseInt(rowNo)).remove();
	   
	   reset_sno(tab_id);
   	
   }
   
    //Clear All Appended Rows
   function clear_all_appended_rows(tab_id)
   {
   
		$('#'+tab_id+' tbody tr:not(:first)').remove();
		
		reset_sno(tab_id);
   
   }

	
	//On click of waiting time (if enable show table to set costs)
	function action_waiting_cost_div()
	{
		var wt = $('input[name="waiting_time"]:checked').val();
		
		if(wt == "disable") {
		
			$('#wt_div').fadeOut();
			
			clear_all_appended_rows('wt_enabled_table');
			
			$('#fromTime_1').val('');
			$('#toTime_1').val('');
			$('#wCost_1').val('0.00');
		
		} else if(wt == "enable") {
		
			$('#wt_div').fadeIn();
		
		}
		
	}
	
	//On click of cost type
	function action_cost_type_div()
	{
	
		var ct = $('input[name="cost_type"]:checked').val();
		
		if(ct == "incremental") {
		
			$('#ct_flat_div').fadeOut();
			$('#ct_incr_div').fadeIn();
			
			clear_all_appended_rows('ct_incr_table');
			
			$('#day_flat_rate').val('0.00');
			$('#night_flat_rate').val('0.00');
			$('#ct_flat_min_dist_day').val('');
			$('#ct_flat_min_dist_night').val('');
			$('#ct_flat_min_cost_day').val('0.00');
			$('#ct_flat_min_cost_night').val('0.00');
		
		} else if(ct == "flat") {
		
			$('#ct_incr_div').fadeOut();
			$('#ct_flat_div').fadeIn();
			
			$('#fromKm_1').val('');
			$('#toKm_1').val('');
			$('#dayCost_1').val('0.00');
			$('#nightCost_1').val('0.00');
		
		}
	
	}
	

	//Set From Time Value
	function setFromTime(rowNo, prev_to_val)
	{
		var nextFromVal = parseInt(prev_to_val)+1;
		var nextRowNo = rowNo + 1;
		
		$('#fromTime_'+nextRowNo).attr('readonly','true');
		
		if(isNaN(nextFromVal) || nextFromVal == 0) {
		
			alert("Value must be greater than 0.");
			
			var initialFromVal = parseInt($('#fromTime_'+rowNo).val());
			
			if(isNaN(initialFromVal)) {
				$('#fromTime_'+rowNo).val(11);
				initialFromVal = 11;
			}
			
			var addSome = 10;			
			
			if(initialFromVal == 11)
				addSome = 9;
			
			$('#toTime_'+rowNo).val(initialFromVal + addSome);
			
			nextFromVal = parseInt($('#toTime_'+rowNo).val()) + 1;
		
		}
		
		$('#fromTime_'+nextRowNo).val(nextFromVal);		
	
	}
	
	
	//Set From KM Value
	function setFromKm(rowNo, prev_to_val)
	{
		var nextFromVal = parseInt(prev_to_val)+1;
		var nextRowNo = rowNo + 1;
		
		$('#fromKm_'+nextRowNo).attr('readonly','true');
		
		if(isNaN(nextFromVal) || nextFromVal == 0) {
		
			alert("Value must be greater than 0.");
			
			var initialFromVal = parseInt($('#fromKm_'+rowNo).val());
			
			if(isNaN(initialFromVal)) {
				$('#fromKm_'+rowNo).val(1);
				initialFromVal = 1;
			}
			
			var addSome = 10;			
			
			if(initialFromVal == 1)
				addSome = 9;
			
			$('#toKm_'+rowNo).val(initialFromVal + addSome);
			
			nextFromVal = parseInt($('#toKm_'+rowNo).val()) + 1;
		
		}
		
		$('#fromKm_'+nextRowNo).val(nextFromVal);
	
	}
	
	
	//Reset Serial Number of Table
   function reset_sno(tab_id)
   {
	   if(tab_id != "") {
	   
		   $('#'+tab_id+' tr').each(function(index) {
			$(this).find('td:nth-child(1)').html(index);
		   });
		   
	   }
   }
     
  
	function readURL(input) {
	
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {

                input.style.width = '100%';
				$('#vehicle_image')
                    .attr('src', e.target.result);
				$('#vehicle_image').fadeIn();
            };

            reader.readAsDataURL(input.files[0]);
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
              //Additional Methods			
   		$.validator.addMethod("pwdmatch", function(repwd, element) {
   			var pwd=$('#password').val();
   			return (this.optional(element) || repwd==pwd);
   		},"<?php echo $this->lang->line('valid_passwords');?>");
   		
   		$.validator.addMethod("capitalsonly",function(a,b){return this.optional(b)||/^[A-Z][a-z][A-Za-z]*$/i.test(a)},"<?php echo $this->lang->line('valid_number');?>");
		
		$.validator.addMethod("numbersonly",function(a,b){return this.optional(b)||/^[0-9 ]+$/i.test(a)},"<?php echo $this->lang->line('valid_numbers');?>");
        
        
   		
   		$.validator.addMethod("alphanumericonly",function(a,b){return this.optional(b)||/^[a-z0-9 ]+$/i.test(a)},"<?php echo $this->lang->line('valid_alpha_numerics');?>");
   		
        
        
		$.validator.addMethod("proper_value", function(uid, element) {
		return (this.optional(element) || uid.match(/^((([0-9]*)[\.]([0-9]{2}))|([0-9]*))$/));
		},"<?php echo $this->lang->line('valid_proper');?>");
		
		
        
        
   		$.validator.addMethod("phoneNumber", function(uid, element) {
   			return (this.optional(element) || uid.match(/^([0-9]*)$/));
   		},"<?php echo $this->lang->line('valid_phone_number');?>");
   		
        
        
        
   		$.validator.addMethod("alphanumerichyphen", function(uid, element) {
   			return (this.optional(element) || uid.match(/^([a-zA-Z0-9 -]*)$/));
   		},"<?php echo $this->lang->line('valid_alpha_hyphens');?>");
   
   
   
   		$.validator.addMethod('check_duplicate_email', function (value, element) {
   			var is_valid=false;
   				$.ajax({
   						url: "<?php echo base_url();?>welcome/check_duplicate_email",
   						type: "post",
   						dataType: "html",
   						data:{ emailid:$('#email').val(), <?php echo $this->security->get_csrf_token_name();?>: "<?php echo $this->security->get_csrf_hash();?>"},
   						async:false,
   						success: function(data) {
   						//alert(data);
   						is_valid = data == 'true';
   				}
   		   });
   		   return is_valid;
   		}, "<?php echo $this->lang->line('valid_exist_email');?>");
   		
   		
   		//form validation rules
              $("#add_vehicle_form").validate({
              	
              	// ignore:[],
                  rules: {
						category_id: {
                          required: true
                      },
                      name: {
                          required: true,
                          alphanumericonly: true,
                          maxlength: 50
                      },
   				model: {
                          required: true,
                          alphanumericonly: true
                          
                      }, 
                   vehicle_no: {
						// required: true,
                       alphanumericonly: true,
                       maxlength: 10
                       
						         
				},
   				passengers_capacity: {
                          required: true,
						  numbersonly:true
							
                      },
   				large_luggage_capacity: {
                          required: true,
						  numbersonly:true
                      },
   				small_luggage_capacity: {
                          required: true,
						  numbersonly:true
                      },
   				starting_cost:{
   					required:true,
   					proper_value:true
   				},
				ct_flat_min_dist_day:{
   					required:true,
					numbersonly:true
   					
   				},
				ct_flat_min_cost_day:{
   					required:true,
					proper_value:true
   					
   				},
				ct_flat_min_dist_night:{
   					required:true,
					numbersonly:true
   					
   				},
				ct_flat_min_cost_night:{
   					required:true,
					proper_value:true
   					
   				},
				day_flat_rate:{
   					required:true,
					proper_value:true
   					
   				},
				night_flat_rate:{
   					required:true,
					proper_value:true	
   				},
				fromKm:{
   					required:true,
					numbersonly:true	
   				},
				toKm:{
   					required:true,
					numbersonly:true	
   				},
				dayCost:{
   					required:true,
					proper_value:true	
   				},
				nightCost:{
   					required:true,
					proper_value:true	
   				},
                description: {
                    maxlength: 60
                },
                total_vehicles: {
                   required:true,
                   numbersonly: true
                }
                
                
                  },
   			
   			messages: {
				category_id: {
							required: "<?php echo $this->lang->line('category_valid');?>"
					},
   				name: {
                          required: "<?php echo $this->lang->line('name_valid');?>"
                      },
   				model: {
                          required: "<?php echo $this->lang->line('model_valid');?>"
                      }, 
               
   				passengers_capacity: {
                          required: "<?php echo $this->lang->line('passengers_valid');?>"
                      },
   				large_luggage_capacity: {
                          required: "<?php echo $this->lang->line('large_luggage_valid');?>"
                      },
   				small_luggage_capacity: {
                          required: "<?php echo $this->lang->line('small_luggage_valid');?>"
						  
                      },
   				starting_cost:{
   					required: "<?php echo $this->lang->line('start_cost');?>"
   				},
				ct_flat_min_dist_day:{
   					required: "<?php echo $this->lang->line('min_day_distance_valid');?>"
   				},
				ct_flat_min_cost_day:{
   					required: "<?php echo $this->lang->line('min_day_cost_valid');?>"
   				},
				ct_flat_min_dist_night:{
   					required: "<?php echo $this->lang->line('min_night_distance_valid');?>"
   				},
				ct_flat_min_cost_night:{
   					required: "<?php echo $this->lang->line('min_night_cost_valid');?>"
   				},
				day_flat_rate:{
   					required: "<?php echo $this->lang->line('day_flat_cost_valid');?>"
   				},
				night_flat_rate:{
   					required: "<?php echo $this->lang->line('night_flat_cost_valid');?>"
   				},
				fromKm:{
   					required: "<?php echo $this->lang->line('from_km_valid');?>"
   				},
				toKm:{
   					required: "<?php echo $this->lang->line('to_km_valid');?>"
   				},
				dayCost:{
   					required: "<?php echo $this->lang->line('day_cost_valid');?>"
   				},
				nightCost:{
   					required: "<?php echo $this->lang->line('night_cost_valid');?>"
   				},
   				total_vehicles: {
   					required: "<?php echo $this->lang->line('total_vehicles_valid');?>"
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
