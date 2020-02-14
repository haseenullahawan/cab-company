<!DOCTYPE html>
<html>
   <head>
      <title>:: <?php echo $this->lang->line('welcome_to_DVBS');?> ::</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="apple-mobile-web-app-capable" content="yes" />
      <meta name="description" content="">
      <meta name="keywords" content="admin, bootstrap,admin template, bootstrap admin, simple, awesome">
      <meta name="author" content="">
      <link href="<?php echo base_url();?>assets/system_design/css/styles.css" rel="stylesheet">
      <?php if(isset($site_settings->site_theme) && $site_settings->site_theme == "Red") {  ?>
      <link href="<?php echo base_url();?>assets/system_design/css/cab-2ntheame.css" rel="stylesheet">
      <?php } else { ?>
      <link href="<?php echo base_url();?>assets/system_design/css/cab.css" rel="stylesheet">
      <?php } ?>
      <script type="text/javascript" src="<?php echo base_url();?>assets/system_design/scripts/jquery.min.js"></script>
      <script src="<?php echo base_url();?>/assets/system_design/form_validation/js/jquery.validate.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>/assets/system_design/form_validation/js/additional-methods.min.js" type="text/javascript"></script>
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
      <!--data Tables-->
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->
      <!-- 	<link rel="shortcut icon" href="assets/img/favicon.ico">FAVICON -->
   </head>
   <style>
      html, body{
      background: url(<?php echo base_url(); ?>assets/system_design/images/login-bg.jpg);
      background-attachment: scroll;
      background-size: cover;
      width: 100%;
      height: 100%;
      margin: 0;
      padding: 0;
      position: fixed; 
      overflow:hidden;  
      }
      .see {
      color: #e74c3c;
      } 
      #total-login {
      border-radius: 10px;
      clear: both;
      display: flex;
      margin:2em auto 0;
      position: relative;
      width: 440px; 	background: #fff;	  
      }
      .login-head {
      color: #fff;
      float: left;
      font-size: 20px;
      height:40px;
      line-height: 40px;
      text-align: center;
      width: 100%;
      z-index: 99999; border-radius:10px 10px 0px 0px; background:#121e31;
      }
      .logo-home {
      font-size: 39px;
      line-height: 70px;
      }
      .select-type {
      width: 59px;
      height: 58px;
      margin: 14px auto 0;
      }
      select {
      background: #f4f4f4;
      box-shadow: 2px 2px 5px #c6c6c6;
      -moz-box-shadow: 2px 2px 5px #c6c6c6;
      -ms-box-shadow: 2px 2px 5px #c6c6c6;
      -o-box-shadow: 2px 2px 5px #c6c6c6;
      -webkit-box-shadow: 2px 2px 5px #c6c6c6;
      border: none;
      margin-top: 10px;
      }
      #fp{ float:left;     display: none ; width:100%;   }
      .forget{
      margin: 11px -43px;
      width: 100% !important;
      } 
      .forget:focus{ box-shadow:0px 0px 5px #FFF}
      .us{ border-radius:0px 5px 5px 0px !important;}
      .in-ty {
      width: 100%;
      margin-top: 15px;
      }
      .login-btn {
      float: left;
      background: #41484b;
      padding:4px 16px;
      color: #fff;
      margin: 15px 0px; 
      }
      .login-btn a{ color:#fff !important;}
      .login-btn:hover{ background:#ffa801; cursor:pointer;
      }
      .a-rig {
      float: right
      }
      .or {
      background: none repeat scroll 0 0 silver;
      float: left;
      margin: 19px 63px;
      text-align: center;
      width: 30%;
      }
      .forget-pass {
      background: none repeat scroll 0 0 #9f2525;
      border-radius: 0 0 10px 10px;
      bottom: 0;
      float: left;
      padding: 10px;
      width: 100%;
      text-align: center;
      color: #fff; font-weight: bold; cursor:pointer;
      }
      .forget-pass  a{ color:#000 !important
      }
      .shadow {
      width: 350px;
      height: 25px;
      float: left;
      background: url(<?php echo base_url(); ?>assets/system_design/images/shadow.png) center no-repeat;
      margin:0 47px;
      }
      .flip_in{
      opacity:0; 
      -moz-transform:scale(1.5,1.5);
      -webkit-transform:scale(1.5,1.5);
      transform:scale(1.5,1.5);
      transition:.2s;
      }
      .flip_out{ opacity:1;
      -moz-transform:scale(1.5,1.5);
      -webkit-transform:scale(1.5,1.5);
      transform:scale(1.5,1.5);
      transition:.2s
      }
      .btt{  background: none repeat scroll 0 0 transparent;
      color: #fff;
      margin: 21px; }
      .btt a{ color:#fff}
      .first-row {
      float: left;
      height: auto; width:100%;
      }
      .in-ty {
      margin-top: 15px;
      width: 100%;
      }
      @media only screen and (max-width:414px) {
      #total-login {
      margin: 25px 0;
      width: 320px;
      }
      }
      @media only screen and (max-width:320px){
      #total-login {
      width: 280px;
      } 
      }
   </style>
   <!-- BODY -->
   <body>
      <div class="container-fluid padding-p-0 rlt">
         <header class="bg">
            <div class="container-fluid top-hedd">
               <div class="container padding-p-0">
                  <div class="row">
                     <div class="col-md-12 padding-p-0">
                        <div class="top-section">
                           <div class="col-md-8">
                              <div class="col-md-4 padding-p-r">
                                 <div class="tot-top">
                                    <div class="phone"> <i class="fa fa-phone"></i> </div>
                                    <aside><?php echo $site_settings->land_line;?></aside>
                                 </div>
                              </div> 
                              <a href="<?php echo site_url();?>/auth/create_user" >
                                 <div class="col-md-4 padding-p-r">
                                    <div class="tot-top">
                                       <div class="phone"> <i class="fa fa-user"></i> </div>
                                       <aside><?php echo $this->lang->line('create_account');?></aside>
                                    </div>
                                 </div>
                              </a>
                              <a href="<?php echo site_url();?>/auth/login" >
                                 <div class="col-md-4 padding-p-r">
                                    <div class="tot-top">
                                       <div class="phone"> <i class="fa fa-lock"></i> </div>
                                       <aside class="col"> <?php echo $this->lang->line('login'); ?> </aside>
                                    </div>
                                 </div>
                              </a>
                           </div>
                           <div class="col-md-4 padding-p-r">
                              <div class="social-icons">
                                 <ul>
                                    <?php 
                                       $social_networks = $this->base_model->run_query("SELECT * FROM vbs_social_networks");
                                       
                                       
                                       // echo "<pre>";print_r($social_networks);die();
                                       		
                                       //social_networks
                                       
                                       	 if($social_networks[0]->facebook){?>
                                    <li> <a href="<?php echo $social_networks[0]->facebook; ?>"   target="_blank">
                                       <i class="fa fa-facebook"></i> </a> 
                                    </li>
                                    <?php }
                                       if($social_networks[0]->twitter){?>
                                    <li> <a href="<?php echo $social_networks[0]->twitter; ?>"   target="_blank">
                                       <i class="fa fa-twitter"></i> </a> 
                                    </li>
                                    <?php }
                                       if($social_networks[0]->linkedin){?>
                                    <li> <a href="<?php  echo $social_networks[0]->linkedin; ?>"  target="_blank"> 
                                       <i class="fa fa-linkedin"></i> </a> 
                                    </li>
                                    <?php }
                                       if($social_networks[0]->google_plus){?>
                                    <li> <a href="<?php echo $social_networks[0]->google_plus; ?>" target="_blank"> 
                                       <i class="fa fa-google-plus"></i> </a> 
                                    </li>
									<li> <a href="<?php echo site_url();?>/welcome/download_app/android"> <i class="fa fa-android"></i> </a> </li>
									<li> <a href="<?php echo site_url();?>/welcome/download_app/ios"> <i class="fa fa-apple"></i> </a> </li>
                                    <?php }?>
									
									 <?php if($site_settings->app_settings == "Enable") { ?>
							  <li> <a href="<?php echo site_url();?>/welcome/download_app/android"> <i class="fa fa-android"></i> </a> </li>
							    <li> <a href="<?php echo site_url();?>/welcome/download_app/ios"> <i class="fa fa-apple"></i> </a> </li>
							  <?php } ?>
							  
                                 </ul>
                              </div>
                              <div class="selec" id="uli">
                                 <a href="#"><?php echo $this->lang->line('lang');?></a>
                                 <div id="ld">
                                   <ul>
                                 <li> <?php echo anchor($this->lang->switch_uri('en'),'English');?> </li>
                                 <li><?php echo anchor($this->lang->switch_uri('fr'),'French');?> </li>
                                 <li><?php echo anchor($this->lang->switch_uri('pt'),'Português');?> </li>
                                 <li><?php echo anchor($this->lang->switch_uri('de'),'Deutsch');?> </li>
								</ul>
                                 </div>
                              </div> 
                           </div>
                        </div>
                     </div> 
                  </div> 
               </div> 
            </div>  
            <?php $this->load->view('site/common/navigation'); ?>
         </header>
         <div class="container">
            <div class="row">
               <div class="col-md-6 col-md-offset-3">
                  <div id="total-login">
                     <?php 
                        $attributes = array("name" => 'register_form',"id" => 'register_form');
                        echo form_open('auth/create_user',$attributes); ?>
                     <div class="first-row">
                        <div class="login-head"><?php echo $title; ?></div>
                     </div>
                     <div class="col-md-12 col-xs-12">
                        <div class="input-group input-group-lg in-ty"> 
                           <?php echo form_input($first_name);?>
                           <?php echo form_error('first_name'); ?>
                        </div>
                     </div>
                     <div class="col-md-12 col-xs-12">
                        <div class="input-group input-group-lg in-ty"> 
                           <?php echo form_input($last_name);?>
                           <?php echo form_error('last_name'); ?>
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
                           <?php echo form_input($phone); ?>
                           <?php echo form_error('phone'); ?>
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
                     <div class="col-md-12 col-xs-12">
                        <input type="submit" class="login-btn" value="<?php echo $this->lang->line('register'); ?>"/>
                      <!--  <div class="login-btn a-rig"> <a href="<?php echo site_url(); ?>/auth/login"> <?php echo $this->lang->line('login'); ?> </a></div>-->
                     </div>
                     <?php echo form_close(); ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script type="text/javascript">$(document).ready(function(){
         $.colorbox({inline:true, href:".ajax"});
         
         });
      </script> 
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="<?php echo base_url(); ?>assets/system_design/scripts/bootstrap.min.js"></script>
   </body>
</html>