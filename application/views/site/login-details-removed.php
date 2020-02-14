<?php $locale_info = localeconv(); ?>
    <style>
        #loginDiv, #registerDiv {
            display:none;
        }
        .online {
            margin:0px !important;
        }
    </style>
    
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
                                    identity: {
                                        required: true
                                    },
                                    password: {
                                        required: true
                                    }
                                },
                                messages: {
                                    identity: {
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
    
    <link href="<?php echo base_url(); ?>assets/system_design/css/register.css" rel="stylesheet">
    <script type="text/javascript"> 
         (function($,W,D)
         {
            var JQUERY4U = {};
         
            JQUERY4U.UTIL =
            {
                setupFormValidation: function()
                {
                    //Additional Methods			
         		$.validator.addMethod("lettersonly",function(a,b){return this.optional(b)||/^[a-z ]+$/i.test(a)},"<?php echo $this->lang->line('valid_name');?>");
         
         		$.validator.addMethod("phoneNumber", function(uid, element) {
         			return (this.optional(element) || uid.match(/^([0-9]*)$/));
         		},"<?php echo $this->lang->line('valid_phone_number');?>");
         		
         
         $.validator.addMethod("pwdmatch", function(repwd, element) {
         			var pwd= $('#password').val();
         			return (this.optional(element) || repwd==pwd);
         		},"<?php echo $this->lang->line('valid_passwords');?>");
         		
         		//form validation rules
                    $("#register_form").validate({
                        rules: {
                            first_name: {
                                required: true,
         			  lettersonly: true
                            },
         				email: {
                                required: true,
         			  email: true
                            },
         	phone:{
         			required: true,
         			phoneNumber: true,
         			rangelength: [10, 11]
         	},
         	password:{
         			required: true,
         			rangelength: [8, 30]
         	},
         	password_confirm:{
         			required: true,
         			 pwdmatch: true
         	}
                        },
         			
         			messages: {
         				first_name: {
                                required: "<?php echo $this->lang->line('first_name_valid');?>"
                            },
         	email:{
         			required: "<?php echo $this->lang->line('email_valid');?>"
         	},
         	phone:{
         			required: "<?php echo $this->lang->line('phone_valid');?>"
         	},
         				password: {
                                required: "<?php echo $this->lang->line('password_valid');?>"
                            },
         	password_confirm:{
         			required: "<?php echo $this->lang->line('confirm_password_valid');?>"
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
      <script>
          function callForm(page) {
              $.ajax({			 
                        type: 'POST',			  
                        url: "<?php echo site_url();?>/bookingform/getForm",
                        data: '<?php echo $this->security->get_csrf_token_name();?>=<?php echo $this->security->get_csrf_hash();?>&page='+page,
                        cache: false,			 
                        success: function(data) {			
                            $('#identificationForm').html(data);
                        }		  		
                    });
                    /*if (page == 'login') {
                        $("#registerDiv").hide();
                        $("#loginDiv").show();
                    }
                    else if (page == 'register') {
                        $("#loginDiv").hide();
                        $("#registerDiv").show();
                    }*/
          }
    </script>
</header>

<div class="container-fluid body-bg">
   <div class="container body-border"><!--padding-p-0-->
        <div class="breadcrumb">
            <div class="row">
               <aside class="nav-links">
                  <ul>
                     <li> <a href="<?php echo site_url(); ?>/"> <?php echo $this->lang->line('home_page');?>  </a> </li>
                     <li class="active"><a href="javascript:void(0)">&nbsp;<?php if(isset($sub_heading)) echo $sub_heading; ?> </a></li>
                  </ul>
               </aside>
            </div>
        </div>
      <div class="row">
         <div class="col-md-12" style="padding:0px 20px 0px 30px;margin-top:-35px;">
            <div class="left-side-cont">
               <!--<div class="col-md-12 padding-p-0">-->
                    <div class="bcp">
                        <ul class='nav nav-wizard'>
                            <li><span class="steps">1</span><a style="color:#fff !important"><?php echo $this->lang->line('journey_details'); ?></a></li>
                            <li class='active'><span class="steps">2</span><a style="color:#fff !important"><?php echo $this->lang->line('identification'); ?></a></li>
                            <li><span class="steps">3</span><a><?php echo $this->lang->line('quote'); ?></a></li>
                            <li><span class="steps">4</span><a><?php echo $this->lang->line('payment_details'); ?></a></li>
                        </ul>
                    </div>
                  <div class="online">
                     <div class="col-md-6 login-page-divider" style="padding:0px 0px 0px 25px;">
                        <h2 style="font-size:20px;float:left;color:#000;margin-top:27px;"><?php echo $this->lang->line("new_client");?></h2>
                       <!-- col-md-offset-3-->
            <div id="total-login">
                <?php
                $attributes = array("name" => 'register_form', "id" => 'register_form');
                echo form_open('auth/create_user', $attributes);
                ?>
                <!--<div class="first-row">
                    <div class="login-head"><?php echo $title; ?></div>
                </div>-->
                <div class="col-md-12 col-xs-12">
                    <div class="input-group input-group-lg in-ty"> 
                        <?php echo form_input($first_name); ?>
                        <?php echo form_error('first_name'); ?>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12">
                    <div class="input-group input-group-lg in-ty"> 
                        <?php echo form_input($last_name); ?>
                        <?php echo form_error('last_name'); ?>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12">
                    <div class="input-group input-group-lg in-ty"> 
                        <?php echo form_input($phone); ?>
                        <?php echo form_error('phone'); ?>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12">
                    <div class="input-group input-group-lg in-ty"> 
                        <?php echo form_input($fax); ?>
                        <?php echo form_error('fax'); ?>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12">
                    <div class="input-group input-group-lg in-ty">  
                        <?php echo form_input($email); ?>
                        <?php echo form_error('email'); ?>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12">
                    <div class="input-group input-group-lg in-ty"> 
                        <?php echo form_input($company); ?>
                        <?php echo form_error('company'); ?>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12">
                    <div class="input-group input-group-lg in-ty"> 
                        <?php echo form_input($address1); ?>
                        <?php echo form_error('address1'); ?>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12">
                    <div class="input-group input-group-lg in-ty"> 
                        <?php echo form_input($address2); ?>
                        <?php echo form_error('address2'); ?>
                    </div>
                </div>

                <div class="col-md-12 col-xs-12">
                    <div class="input-group input-group-lg in-ty">  
                        <?php echo form_input($password); ?>
                        <?php echo form_error('password'); ?>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12">
                    <div class="input-group input-group-lg in-ty">  
                        <?php echo form_input($password_confirm); ?>
                        <?php echo form_error('password_confirm'); ?>
                    </div>
                </div>
                
                
                <div class="col-md-12 col-xs-12" style="padding:10px 0px 0px 10px;">
                     <input type="hidden" name="temp_booking_id" value="<?php echo (!empty($temp_booking_id)) ? $temp_booking_id : 0;  ?>">

                    <input type="submit" class="button green_button" value="<?php echo $this->lang->line('register'); ?>"/>
                  <!--  <div class="login-btn a-rig"> <a href="<?php echo site_url(); ?>/auth/login"> <?php echo $this->lang->line('login'); ?> </a></div>-->
                </div>
                <?php echo form_close(); ?>
            </div>
                        <!-- <div class="btn btn-default re-gu" style="margin-left:150px;"><a href="<?php echo site_url(); ?>/auth/create_user"> <i class="fa fa-list-ul"></i> <?php echo $this->lang->line('register');?> </a></div> -->
                        <!--<div class="btn btn-default re-gu"><a href="#" id="register" onclick="Javascript:callForm(this.id)"> <i class="fa fa-list-ul"></i> <?php echo $this->lang->line('register');?> </a></div>-->
                    </div>
                    <div class="col-md-6" style="padding:0px 0px 0px 25px;">
                        <h2 style="font-size:20px;float: left;color:#000;margin-top:27px;"><?php echo $this->lang->line("already_client");?></h2>
                        <!--col-md-offset-3-->
                <div id="total-login">
                    <?php
                    $attributes = array("name" => 'login_form', "id" => 'login_form');
                    echo form_open('auth/login', $attributes);
                    ?>
                    <!--<div class="first-row">
                    <!--<div class="login-head">
                    <?php //echo $this->lang->line('login'); ?>
                        If you are existing user
                    </div>
                </div>-->
                    <div class="col-md-12 col-xs-12">
                                            <input type="hidden" name="temp_booking_id" value="<?php echo (!empty($temp_booking_id)) ? $temp_booking_id : 0;  ?>">

                        <div class="input-group input-group-lg in-ty">
                            <?php echo $this->session->flashdata('message'); ?>
                            <?php echo form_input($email); ?>
                            <?php echo form_error('email'); ?>
                        </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="input-group input-group-lg in-ty">  
                            <?php echo form_input($password); ?>
                            <?php echo form_error('password'); ?>
                            <input type="hidden" name="remember" value="1"/>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-4" style="padding:10px 0px 0px 10px;">
                        <input type="submit" class="button green_button" value="<?php echo $this->lang->line('login'); ?>"/>  
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
           
                        <!-- <div class="btn btn-default re-gu" style="margin-left:150px;"><a href="<?php echo site_url(); ?>/auth/login"> <i class="fa fa-list-ul"></i> <?php echo $this->lang->line('login');?> </a></div> -->
                        <!--<div class="btn btn-default re-gu"> <a href="#" id="login" onclick="Javascript:callForm(this.id)"><i class="fa fa-sign-in"></i>  <?php echo $this->lang->line('login');?></a> </div>-->
                    </div>
                     
                     </div>
                     <?php echo form_close(); ?>  
                  </div>
                    <!--<div id="identificationForm">
                    </div>-->
            </div>
         </div>
      </div>
   </div>
</div>