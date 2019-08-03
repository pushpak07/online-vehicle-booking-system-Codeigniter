<div class="container padding-p-0 banner">
   <div class="row">
      <div class="col-md-8 padding-p-l">
         <aside class="hedding"><?php if(isset($title)) echo $title;?></aside>
      </div>
      <div class="col-md-4 padding-p-r">
         <aside class="bradecom">
            <ul>
               <li> <a href="<?php echo SITEURL;?>"> <?php echo $this->lang->line('home');?> </a> </li>
               <li>>></li>
               <li class="active"> <?php if(isset($title)) echo $title;?> </li>
            </ul>
         </aside>
      </div>
   </div>
</div>
</header>
<div class="scroll-up">
   <div class="container">
      <div class="section-margin">
         <div class="row">
            <div class="col-md-12">
               <div class="left-side-cont">
                  <div class="col-md-12 padding-p-0">
                     <div class="data-table">
                     
                     
           <div class="module-body">
            
             <div class="table-responsive">
             
               <table id="example" class="cell-border example" cellspacing="0" width="100%">
                     
                       
                           <thead>
                              <tr>
                                 <th>#</th>
                                  <th><?php echo $this->lang->line('reference_no');?></th>
                                 <th><?php echo $this->lang->line('book_date');?></th>
                                 <th><?php echo $this->lang->line('pick_date');?></th>
                                 
                                 <th><?php echo $this->lang->line('source');?></th>
                                 <th><?php echo $this->lang->line('destination');?></th>
                                 <th><?php echo $this->lang->line('cost_of_journey');?></th>
                                 <th><?php echo $this->lang->line('status');?></th>
                                 <th><?php echo $this->lang->line('action');?></th>
                              </tr>
                           </thead>
                           <tfoot>
                              <tr>
                                 <th>#</th>
                                  <th><?php echo $this->lang->line('reference_no');?></th>
                                 <th><?php echo $this->lang->line('book_date');?></th>
                                 <th><?php echo $this->lang->line('pick_date');?></th>
                                
                                 <th><?php echo $this->lang->line('source');?></th>
                                 <th><?php echo $this->lang->line('destination');?></th>
                                 <th><?php echo $this->lang->line('cost_of_journey');?></th>
                                 <th><?php echo $this->lang->line('status');?></th>
                                 <th><?php echo $this->lang->line('action');?></th>
                              </tr>
                           </tfoot>
                          
                           <tbody>
                             
                             
                           </tbody>
                        
                        </table>
                        
                    </div>

                    </div>                    
                        
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>












<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?php echo $this->lang->line('close');?></span></button>
            <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('warning');?></h4>
         </div>
         <div class="modal-body">
            <?php echo $this->lang->line('sure_cancel');?>
         </div>
         <div class="modal-footer">
            <a type="button" class="btn btn-default" id="change_status" href=""><?php echo $this->lang->line('yes');?></a>
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('close');?></button>
         </div>
      </div>
   </div>
</div>
<script>
   function changeStatus(x) {
      
   	var str = "<?php echo site_url();?>users/my_bookings/Cancel/" + x;
   	
       $("#change_status").attr("href",str);
    
   }
</script>