</header>
<div class="container">
   <div class="section-margin">
      <div class="row">
         <div class="col-md-12">
            <div class="left-side-cont">
               <article class="content">
                  <ul class="nav nav-tabs cont-tabs" role="tablist">
                     <li role="presentation" class="active"> <a href="#one" role="tab" data-toggle="tab" aria-controls="one"><?php if(isset($title)) echo $title;?><i class="fa fa-arrow-circle-o-down"></i> </a></li>
                  </ul>
                  <div class="tab-content white">
                     <div role="tabpanel" class="tab-pane active" id="one">
                        <?php if(isset($description)) echo $description;?>
                     </div>
                  </div>
               </article>
            </div>
         </div>
        
      </div>
   </div>
</div>
</div>