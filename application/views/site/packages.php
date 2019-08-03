<style>
   #myList { margin:0; padding:0; }
   #myList li{ display: none;
   float: left;
   list-style: outside none none;
   margin: 0px 6px;
   padding: 0;
 width: 48.5%;
   }
   #loadMore {
   background: none repeat scroll 0 0 #121e31;
   color: #fff;
   cursor: pointer;
   float: left;
   margin: 40px 16px;
   padding: 6px 11px;
   }
   #loadMore:hover {
   color:#ffda31
   }
   #showLess {
   background: none repeat scroll 0 0 #121e31;
   color: #fff;
   cursor: pointer;
   float: left;
   margin:20px 16px;
   padding: 6px 11px;
   }
   #showLess:hover {
   color:#ffda31
   } 
</style>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"> <?php echo $this->lang->line('terms_conditions');?> </h4>
         </div>
         <div class="modal-body" id="tnc">	   
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('close');?> </button>
         </div>
      </div>
   </div>
</div>
<div class="container padding-p-0 banner">
   <div class="row">
      <div class="col-md-8 padding-p-l">
         <aside class="hedding"> <?php echo $this->lang->line('packages');?>  </aside>
      </div>
      <div class="col-md-4 padding-p-r">
         <aside class="bradecom">
            <ul>
               <li> <a href="<?php echo SITEURL;?>"> <?php echo $this->lang->line('home');?> </a> </li>
               <li>>></li>
               <li class="active"> <a href="#"> <?php if(isset($sub_heading)) echo $sub_heading;?> </a> </li>
            </ul>
         </aside>
      </div>
   </div>
</div>
</header>
<div class="g-bg">
<div class="container">
   <div class="section-margin">

      <div class="row">


<?php if (!empty($records)) { 
 $sno = 1; 
                        foreach ($records as $r) {
   ?>
         <div class="col-md-4">
             <div class="first-car white padding cs-card-card">
                              <div class="first-car-hed"><?php echo $r->name;?></div>

                        <div class="first-car-img"> <img width="100%" src="<?php echo get_vehicle_image($r->image);?>"title="<?php echo $r->vehicle_name." - ".$r->model;?>"> </div>

                              <div class="rl">
                                 <div class="col-md-12 padding-p-r">
                                    <div class="de">
                                       <ul>
                                          <div class="de-hed table-responsive"><?php echo $this->lang->line('package_details_caps');?></div>

											<table class="table">
											  <tbody>
											    <tr>
												 <td><?php echo $this->lang->line('vehicle');?> </td>
												 <td><?php echo $r->vehicle_name;?></td>
												</tr>
												
												<tr>
												 <td><?php echo $this->lang->line('model');?> </td>
												 <td><?php echo $r->model;?></td>
												</tr>
												
												<tr>
												 <td><?php echo $this->lang->line('hours');?> </td>
												 <td><?php echo $r->hours;?></td>
												</tr>
												
												<tr>
												 <td><?php echo $this->lang->line('distance');?></td>
												 <td><?php echo $r->distance." (".$site_settings->distance_type.")";?> </td>
												</tr>
												
												<tr>
												 <td><?php echo $this->lang->line('fare');?> </td>
												 <td><?php echo 
                                         $this->config->item('site_settings')->currency_symbol.$r->min_cost;?></td>
												</tr>
											  <tbody>
											</table>

                                           <!--<li><strong><?php echo $this->lang->line('vehicle');?> :</strong> <?php echo $r->vehicle_name;?> </li>

                                          <li><strong><?php echo $this->lang->line('model');?> :</strong> <?php echo $r->model;?> </li>


                                          <li><strong><?php echo $this->lang->line('hours');?> :</strong> <?php echo $r->hours;?> </li>

                                          <li><strong><?php echo $this->lang->line('distance');?>:</strong><?php echo $r->distance." (".$site_settings->distance_type.")";?> </li>

                                          <li><strong><?php echo $this->lang->line('fare');?>: </strong> <?php echo 
                                         $this->config->item('site_settings')->currency_symbol.$r->min_cost;?></li>-->

                                       </ul>
                                    </div>
                                 </div>
                              </div>
                              <div class="list-pass">
                                 <div class="col-md-12 padding-p-r">
                                    <div class="de-extra">
                                       <ul>
                                          <div class="de-hed"><?php echo $this->lang->line('package_extras');?></div>



                              <table class="table">
                                   <tbody>


                                    <tr>
                                       <td><?php echo $this->lang->line('after_distance');?>(<?php echo $this->lang->line('per_km');?>) </td>
                                       <td><?php echo $this->config->item('site_settings')->currency_symbol.$r->charge_distance; ?></td>
                                    </tr>


                                     <tr>
                                     <td><?php echo $this->lang->line('after_time');?>(<?php echo $this->lang->line('per_hr');?>) </td>
                                    <td><?php echo  $this->config->item('site_settings')->currency_symbol.$r->charge_hour;?></td>
                                    </tr>

                                  
                                   <tbody>
                                 </table> 


                                          <!--li><strong> <?php echo $this->lang->line('after_distance');?>(<?php echo $this->lang->line('per_km');?>) :</strong> <?php echo 
                                $this->config->item('site_settings')->currency_symbol.$r->charge_distance; ?></li>

                                          <li><strong> <?php echo $this->lang->line('after_time');?>(<?php echo $this->lang->line('per_hr');?>) : </strong><?php echo 
                                $this->config->item('site_settings')->currency_symbol.$r->charge_hour;?> </li-->



                                       </ul>
                                    </div>
                                 </div>
                              </div>


                              <div class="col-md-12">
                                 <div aria-multiselectable="true" role="tablist" id="accordion" class="panel-group margin-p-b">
                                    <div class="panel panel-default bb">
                                       <div id="headingOne" role="tab" class="panel-heading ters-hed">
                                          <h4 class="panel-title pp">
                                             <a aria-controls="CollapseOne" aria-expanded="false" data-toggle="modal" data-target="#myModal" href="#<?php echo $sno;?>" class="collapsed" id="<?php echo htmlentities($r->terms_conditions);?>" onclick="append_tnc(this.id)">
                                             <?php echo $this->lang->line('terms_conditions');?>   </a>   
                                          </h4>
                                       </div>
                                      
                                    </div>
                                 </div>
                              </div>

                      
                              <div class="book">
                                 <a href="<?php echo site_url();?>packages/booking/<?php echo $r->id;?>" class="pa-cbook"><?php echo $this->lang->line('book_now');?></a>
                              </div>
                      
                           </div>
         </div>

<?php } } else { echo "<h4 align='middle'>Coming Soon.</h4>"; }?>

      </div>











     
   </div>
</div>
</div>
</div>

<script>
   function append_tnc(terms_conditions)
   {
      $("#tnc").html('');
      var terms_conditions = terms_conditions;
      if (terms_conditions!=null && terms_conditions!='')
         $("#tnc").html(terms_conditions);
      else
         $("#tnc").html('<p> No Terms and Conditions </p>');
   }
</script>
