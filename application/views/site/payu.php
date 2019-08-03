<section class="home_page">

    <div class="container">

        <div class="row">
            <div class="col-md-6">
                <!-- <form  action="<?php echo $action_url ?>" method="post" id="frm_registration" name="frm_registration" class=""> -->
                <form  action="<?php echo site_url('payumoney/payment'); ?>" method="post" id="frm_registration" name="frm_registration" class="">
                    
                    <input type="hidden" name="key" value="<?php echo $key ?>" />
            
                    <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
                    
                    <input type="hidden" name="txnid" value="<?php echo $transaction_id ?>" />

                    <input type="hidden" name="surl" value="<?php echo site_url('/payumoney/payment_success'); ?>" />
                    <input type="hidden" name="furl" value="<?php echo site_url('/payumoney/payment_failed'); ?>" />

                    <input type="hidden" name="productinfo" value="Dove Soap" />


                    <div class="form-group">
                        <label for="first_name"> First Name</label>
                        <input type="text" class="form-control" id="first_name" name="firstname" value="" placeholder="First Name">
                        <p class="help-block"></p>
                    </div>

                    <div class="form-group">
                        <label for="amount"> Amount</label>
                        <input type="text" class="form-control" id="amount" name="amount" value="" placeholder="Amount">
                        <p class="help-block"></p>
                    </div>

                    <div class="form-group">
                        <label for="email"> Email </label>
                        <input type="text" class="form-control" id="email" name="email" value="" placeholder="Email">
                        <p class="help-block"></p>
                    </div>

                    <div class="form-group">
                        <label for="phone"> Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="" placeholder="Phone">
                        <p class="help-block"></p>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-primary" value="Submit" />
                    </div>

                </form>
            </div>
        </div>
    </div><!--container -->
    
</section>