</header>
<div class="container-fluid">
   <div class="container padding-p-0">
      <div class="row">

		<?php if (!empty($testimonials)) { ?>

         <div class="col-md-9">
            <div class="left-side-cont">
               <article class="content scroll">
                  <?php foreach($testimonials as $row):?>
                  <div class="item">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-2"><img height="60" width="60" src="<?php echo get_test_user_image($row->user_photo);?>" class="img-responsive"></div>
                           <div class="col-md-10">
                             
							     <strong><p><?php echo $row->title;?></p></strong>
                              <p>"<?php echo $row->content;?>"</p>
                              <div class="test-name">" <?php echo $row->user_name;?>"</div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php endforeach; ?>
					  
               </article>
            </div>
         </div>

		 <?php } else {?>
		 <div class="col-md-9">
		  <div class="left-side-cont">
			 <p align="center">Coming Soon...</p>
		 </div>
		 </div>
		 <?php } ?>


<?php $record = $this->dvbs_model->get_reasons_to_book();
if (!empty($record)) {
?>

         <div class="col-md-3">
            <?php $this->load->view('site/common/reasons_to_book', array('record'=>$record)); ?>
         </div>

         <?php } ?>

      </div>
   </div>
</div>
</div>