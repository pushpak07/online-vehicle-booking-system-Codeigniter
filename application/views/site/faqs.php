</header>
<div class="g-bg">
<div class="container">
   <div class="section-margin">
      <div class="row">
         <div class="col-s-12">


<?php if (!empty($faqs)) { ?>
                <!-- Faq - Accordation -->
    <section>
        <div class="container">
            <div class="row row-margin">
                <div class="col-lg-12">

                    <div class="panel-group cust-panel" id="accordion">

                        <?php            
                        $i=0;          
                            foreach($faqs as $faq):             
                        $i++;           
                        ?>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i;?>">
                                        <?php echo $faq->question;?>
                                    </a>
                                </h4>
                            </div>
                            <!--/.panel-heading -->
                            <div id="collapse<?php echo $i;?>" class="panel-collapse collapse">
                                <div class="panel-body">
                                   <?php echo $faq->answer;?>
                                </div>
                                <!--/.panel-body -->
                            </div>
                            <!--/.panel-collapse -->
                        </div>
                        <!-- /.panel -->

                    <?php endforeach;?>

                      


                    </div>
                    <!-- /.panel-group -->
                </div>
            </div>
        </div>
    </section>
    <!-- /Faq - Accordation -->
<?php } ?>


         </div>
      </div>

   </div>
</div>
</div>
