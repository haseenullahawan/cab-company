<link href="<?php echo base_url(); ?>assets/system_design/css/login.css" rel="stylesheet">
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
        $("#affiliate_signupform").validate({
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
</header>
<style>
    .slider_wrapper {
        height:530px !important;
    }
    .slider_wrapper img {
        height: 545px !important;
    }
    select { margin-top:0px !important; }
    select.form-control { height:34px !important;}
</style>
  
 
<div class="container body-border"> 
    <div class="breadcrumb">
        <div class="row">
            <aside class="nav-links">
                <ul>
                    <li><a href="<?php echo site_url(); ?>/"><i class="fa fa-home"></i>  <?php echo $this->lang->line('home_page');?> </a></li>
                    <li class="active"><a href="javascript:void(0)"><?php echo $title ?> </a></li>
                </ul>
            </aside>
        </div> 
    </div>
    <div class="clearfix"></div>  
    <div class="row">
        <div class="col-md-6">
            <?php echo form_open('affiliate/signup', array("id"=>"affiliate_signupform"));?>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label> Statut </label>                                
                        <select class="form-control" name="statut">
                            <option value="1">Independent</option>
                            <option value="2">Company</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label> Civility </label>                                
                        <select class="form-control" name="civility">
                            <option value="Mr">Mr</option>
                            <option value="Mrs">Mrs</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>First Name</label>
                        <?php echo form_input($first_name); ?>
                        <?php echo form_error('first_name'); ?>
                    </div>    
                    <div class="form-group">
                        <label>Last Name</label>
                        <?php echo form_input($last_name); ?>
                        <?php echo form_error('last_name'); ?>
                    </div>    
                    <div class="form-group">
                        <label>Email</label>
                        <?php echo form_input($email); ?>
                        <?php echo form_error('email'); ?>
                    </div>    

                    <div class="form-group">
                        <label>Phone</label>
                        <?php echo form_input($phone); ?>
                        <?php echo form_error('phone'); ?>
                    </div> 
                    
                    <div class="form-group">
                        <label>Password</label>
                        <?php echo form_input($password); ?>
                        <?php echo form_error('password'); ?>
                    </div> 
                </div> 
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Company</label>
                        <?php echo form_input($company); ?>
                        <?php echo form_error('company'); ?>
                    </div> 
                    <div class="form-group">
                        <label>Address</label>
                        <?php echo form_textarea($address); ?>
                        <?php echo form_error('address'); ?>
                    </div> 
                    <div class="form-group">
                        <label>&nbsp;</label>
                        <?php echo form_textarea($address1); ?>
                        <?php echo form_error('address1'); ?>
                    </div> 
                    <div class="form-group">
                        <label>City</label>
                        <?php echo form_input($city); ?>
                        <?php echo form_error('city'); ?>
                    </div>  
                    <div class="form-group">
                        <label>Zipcode</label>
                        <?php echo form_input($zipcode); ?>
                        <?php echo form_error('zipcode'); ?>
                    </div>
                    <div class="form-group">
                        <label>Mobile</label>
                        <?php echo form_input($mobile); ?>
                        <?php echo form_error('mobile'); ?>
                    </div> 
                    <div class="form-group">
                        <label>Fax</label>
                        <?php echo form_input($fax); ?>
                        <?php echo form_error('fax'); ?>
                    </div>    
                </div>
            </div>
            <div class="row">
                <div class="col-md-12"> 
                    <input type="submit" class="button green_button" value="Register" style="margin-top: 30px;" />  
                </div>
            </div>
            <?php echo form_close();?>
        </div>
        <div class="col-md-1 login-page-divider">&nbsp;</div>
        <div class="col-md-5 benefits" style="padding-left: 60px;">
            <div class="titleBox">
                <h4>Benefits</h4>
                <h6>Why Choose HandiExpress for your transfers ?</h6>
            </div>
            <div class="infoBox">
                <div class="col-md-2 wallet"><i class="fa fa-money"></i></div>
                <div class="col-md-10">
                    <div class="wallet">
                        <h5>Value for Money</h5>
                        <h6>Quality Journeys at discount prices</h6>
                    </div>
                </div>
            </div>
            <div class="infoBox">
                <div class="col-md-2 customer-service"><i class="fa fa-headphones"></i></div>
                <div class="col-md-10">
                    <div class="wallet">
                        <h5>Customer Service</h5>
                        <h6>Quality Client Service to assist you by phone, by email or by live chat support.</h6>
                    </div>
                </div>
            </div>
            <div class="infoBox">
                <div class="col-md-2 easy-use"><i class="fa fa-leaf"></i></div>
                <div class="col-md-10">
                    <div class="wallet">
                        <h5>Ease of Use</h5>
                        <h6>4 steps only easy booking, client area to follow your bookings online</h6>
                    </div>
                </div>
            </div>
        </div>  
    </div>
    
</div>
<script type="text/javascript">
    $(function () {
		$('.homepageSlider').bxSlider({ 
            mode: 'fade',
            auto: true,
            pager: true,
            autoControl: false,
            adaptiveHeight: true,
            easing: 'swing',
            responsive: true,
            preloadImages: 'all'
        });
        $(".slider_wrapper .bx-viewport").css("height", '530px');
	});
</script>