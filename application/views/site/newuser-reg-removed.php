<link href="<?php echo base_url(); ?>assets/system_design/css/login.css" rel="stylesheet">
<script src="<?= base_url('assets/js/customV3.2.js') ?>" ></script>
<link href="<?= base_url('assets/css/custom.css') ?>" rel="stylesheet">
</header>
<div id="notification" class="d-none"></div>

<div class="container-fluid body-bg">
    <div class="container body-border">
        <div class="breadcrumb">
            <div class="row">
                <aside class="nav-links">
                    <ul>
                        <li> <a href="<?php echo site_url(); ?>/"> <?php echo $this->lang->line('home_page'); ?>  </a> </li>
                        <li class="active"><a href="javascript:void(0)">&nbsp;<?php if (isset($sub_heading)) echo $sub_heading; ?> </a></li>
                    </ul>
                </aside>
            </div>
        </div>
        <?php if ($journey_details != "") : ?>
            <div class="bcp" style="margin-top:0px;">
                <ul class='nav nav-wizard'>
                    <li><span class="steps">1</span><a style="color:#fff !important"><?php echo $this->lang->line('journey_details'); ?></a></li>
                    <li class='active'><span class="steps">2</span><a style="color:#fff !important"><?php echo $this->lang->line('identification'); ?></a></li>
                    <li><span class="steps">3</span><a><?php echo $this->lang->line('quote'); ?></a></li>
                    <li><span class="steps">4</span><a><?php echo $this->lang->line('payment_details'); ?></a></li>
                </ul>
            </div>
        <?php endif; ?>


                <div class="row">
            <div class="col-md-6 login-page-divider"><!--col-md-offset-3-->
                <div id="total-login">
                    <?= form_open('auth/SubmitUserLogin', array('class'=>'n-form')) ?>
                   
                    <div class="col-md-12 col-xs-12">
                        <div class="input-group fe input-group-lg in-ty">
                            <?php echo $this->session->flashdata('message'); ?>
                            <input type="email" required name="username" value="" id="identity" class="user valid" placeholder="Email">
                            
                        </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="input-group fe input-group-lg in-ty">  
                          <input required  type="password" name="password" value="" id="password" placeholder="Mot de passe" class="password error">
                          <div style="margin-top:70px !important; "><input style="margin: 0px; position:relative; top:5px; margin-right:5px;" type="checkbox" name="remember" value="1"> Remeber me</div>

                        </div>
                    </div>
                    <div class="col-md-4 col-xs-4" style="padding:10px 0px 0px 10px;">
                        <button type="submit" class="button green_button"><?= $this->lang->line('login') ?></button>  
                       <!-- <div class="login-btn a-rig"> <a href="<?php echo site_url(); ?>/auth/create_user"> <?php echo $this->lang->line('register'); ?> </a></div>-->
                    </div>
                    <div class="col-md-8 col-xs-8" style="float:left;top:28px;">
                        <a href="<?php echo site_url(); ?>/auth/forgot_password"> <?php echo $this->lang->line('login_forgot_password'); ?></a> 
                    </div>    
                    <!--<div class="forget-pass"> 
                        <a href="<?php // echo site_url();  ?>/auth/forgot_password"> <?php // echo $this->lang->line('login_forgot_password');  ?></a> 
                    </div>-->
                    <?php echo form_close(); ?>
                </div>
                <div class="shadow"></div>
                <div class="col-md-10">
                    <div id="fp" > 
                        <input type="text" class="forget" placeholder="Forgot Password" > 
                    </div>
                </div>
            </div>
            <div class="col-md-6 benefits">
                <div class="titleBox">
                    <h4><?php echo $this->lang->line('benefits'); ?></h4>
                    <h6><?php echo $this->lang->line('benefits_txt'); ?></h6>
                </div>
                <div class="infoBox">
                    <div class="col-md-2 wallet"><i class="fa fa-money"></i></div>
                    <div class="col-md-10">
                        <div class="wallet">
                            <h5><?php echo $this->lang->line('value_for_money'); ?></h5>
                            <h6><?php echo $this->lang->line('value_for_money_txt'); ?></h6>
                        </div>
                    </div>
                </div>
                <div class="infoBox">
                    <div class="col-md-2 customer-service"><i class="fa fa-headphones"></i></div>
                    <div class="col-md-10">
                        <div class="wallet">
                            <h5><?php echo $this->lang->line('customer_service'); ?></h5>
                            <h6><?php echo $this->lang->line('customer_service_txt'); ?></h6>
                        </div>
                    </div>
                </div>
                <div class="infoBox">
                    <div class="col-md-2 easy-use"><i class="fa fa-leaf"></i></div>
                    <div class="col-md-10">
                        <div class="wallet">
                            <h5><?php echo $this->lang->line('easy_of_use'); ?></h5>
                            <h6><?php echo $this->lang->line('easy_of_use_txt'); ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- Row -->



    </div>
</div>


<script type="text/javascript">$(document).ready(function () {
        $.colorbox({inline: true, href: ".ajax"});

    });
</script> 
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url(); ?>assets/system_design/scripts/bootstrap.min.js"></script>
</body>
</html>