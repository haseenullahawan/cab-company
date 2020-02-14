<link href="<?php echo base_url(); ?>assets/system_design/css/login.css" rel="stylesheet">
<script type="text/javascript">
    (function ($, W, D)
    {
        var JQUERY4U = {};

        JQUERY4U.UTIL =
                {
                    setupFormValidation: function ()
                    {

                        //form validation rules
                        $("#login_form").validate({
                            rules: {
                                username: {
                                    required: true
                                },
                                password: {
                                    required: true
                                }
                            },
                            messages: {
                                username: {
                                    required: "<?php echo $this->lang->line('user_name_valid'); ?>"
                                },
                                password: {
                                    required: "<?php echo $this->lang->line('password_valid'); ?>"
                                }
                            },
                            submitHandler: function (form) {
                                form.submit();
                            }
                        });
                    }
                }

        //when the dom has loaded setup form validation rules
        $(D).ready(function ($) {
            JQUERY4U.UTIL.setupFormValidation();
        });

    })(jQuery, window, document);
</script>
</header>
 
<div class="container body-border">
    <div class="breadcrumb">
        <div class="row">
            <aside class="nav-links">
                <ul>
                    <li> <a href="<?php echo site_url(); ?>/"><i class="fa fa-home"></i> <?php echo $this->lang->line('home_page'); ?>  </a> </li>
                    <li class="active"><a href="javascript:void(0)">&nbsp;<?php if (isset($sub_heading)) echo $sub_heading; ?> </a></li>
                </ul>
            </aside>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6"> 
            <div id="total-login">
                <?php
                    $attributes = array("name" => 'login_form', "id" => 'login_form');
                    echo form_open('admin', $attributes);
                ?>
                <div class="row">
                    <div class="col-md-10 col-xs-10 col-md-offset-1" <?php if($forgot_form){ echo 'style="display:none;"'; } ?>>
                        <?php include "alert.php"; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-xs-10 col-md-offset-1">
                        <div class="input-group input-group-lg in-ty">
                            <label for="username">Username</label>
                            <?php echo form_input($username); ?>
                            <?php echo form_error('username'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-xs-10 col-md-offset-1">
                        <div class="input-group input-group-lg in-ty">
                            <label for="password">Password <a href="#">lost password?</a></label>
                            <?php echo form_input($password); ?>
                            <?php echo form_error('password'); ?>
                            <input type="hidden" name="remember" value="1"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-xs-10 col-md-offset-1">
                        <div class="col-md-6 col-xs-6">
    						<div class="form-group">
    							<div class="checkbox">
    								<label> <input type="checkbox" style="margin-right: 0; margin-top: 4px; margin-left: -20px; float: none;" value="1" name="remember_me"> Remember me </label>
    							</div>
    						</div>
                        </div>
    					<div class="col-md-6 col-xs-6" style="text-align: right;top: 10px;">
    						<a href="javascript:ForgotPassword()"> <?php echo $this->lang->line('login_forgot_password'); ?></a>
    					</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-xs-10 col-md-offset-1">
                        <input type="submit" class="button green_button" value="<?php echo $this->lang->line('login'); ?>"/>
                     </div>
                </div>
                <?php echo form_close(); ?>
            </div>
			<div class="row">
    			 <div class="col-md-10 col-md-offset-1 forgot-password" <?php if($forgot_form){ echo 'style="display:block;"'; } ?>><!--col-md-offset-3-->
    				<div id="forgot-password">
    				   <?php
    				   $attributes = array("name" => 'forgot_form', "id" => 'forgot_form');
    				   echo form_open('forgot_password', $attributes);
    				   ?>
    				   <div class="col-md-12 col-xs-12">
    					  <?php include "alert.php"; ?>
    				   </div>
    				   <div class="col-md-8 col-xs-8">
    					  <div class="input-group input-group-lg in-ty" style="margin-top: 10px;">
    						 <?php echo form_input($username); ?>
    						 <?php echo form_error('username'); ?>
    					  </div>
    				   </div>
    				   <div class="col-md-4 col-xs-4" style="padding:10px 0px 0px 10px;">
    					  <input type="submit" class="button green_button" value="<?php echo $this->lang->line('login'); ?>"/>
    				   </div>
    				   
    				   <?php echo form_close(); ?>
    				</div>
    			 </div>
    	    </div>
        </div>
        <div class="col-md-1 login-page-divider">&nbsp;</div> 
        <div class="col-md-5 benefits" style="padding-left: 60px;">
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
    </div>
</div> 

<script type="text/javascript">$(document).ready(function () {
        $.colorbox({inline: true, href: ".ajax"});

    });
	
	function ForgotPassword(){
		$('.forgot-password').toggle();
	}
</script> 
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url(); ?>assets/system_design/scripts/bootstrap.min.js"></script>
</body>
</html>