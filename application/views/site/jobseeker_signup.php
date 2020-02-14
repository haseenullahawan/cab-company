<link href="<?php echo base_url(); ?>assets/system_design/css/login.css" rel="stylesheet">
</header>
<style>
    .slider_wrapper {
        height:530px !important;
    }
    .slider_wrapper img {
        height: 545px !important;
    }
    select { margin-top:0px !important; }
    select.form-control { height:40px !important;}
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
            <?php echo form_open('jobseeker/signup', array("id"=>"loginform"));?>
            <div class="row">
                <div class="col-md-6">
                     <div class="form-group">
                <span>Statut</span>
                <select name="statut" class="form-control statut">
                    <option value="0">Independant</option>
                    <option value="1">Company</option>
                </select> 
            </div>

            <div class=" form-group">
                <span>Civility</span>
                <select name="civility" class="form-control civility">
                    <option value="Mr">Mr</option>
                    <option value="Miss">Miss</option>
                    <option value="Mrs">Mrs</option>
                </select>                                    </div>

            <div class=" form-group">
                <span>First Name</span>
                <input name="firstname" value="" class="form-control firstname" type="text">      
                <?php echo form_error('firstname'); ?>

                </div>
            <div class=" form-group">
                <span>Last Name</span>
                <input name="lastname" value="" class="form-control last_name" type="text"> 
                 <?php echo form_error('lastname'); ?>
                </div>
          
            <div class="form-group">
                <span>Email</span>
                <input name="email" value="" class="form-control" type="text"> 
                 <?php echo form_error('email'); ?>
                </div>
         
            <div class="form-group">
                <label>Password</label>
                <input name="password" value="" class="form-control" type="text">  
                 <?php echo form_error('password'); ?>
                </div>
            <div class="form-group">
                <label>Password Confirm</label>
                <input name="confirm_password" value="" class="form-control" type="text">   
                 <?php echo form_error('confirm_password'); ?>
                </div>
                </div> 
                <div class="col-md-6">
                   <div class=" form-group">
                <span>Company</span>
                <input name="comp_name" value="" class="form-control" type="text">  
                 <?php echo form_error('comp_name'); ?>
                </div>
                      <div class=" form-group">
                <span>Address</span>
                <textarea name="address" value="" rows="1"></textarea>   
                 <?php echo form_error('address'); ?>
                </div> 
                     <div class="form-group">
                <label>City</label>
                <input name="city" value="" class="form-control" type="text"> 
                 <?php echo form_error('city'); ?>
                </div>
            <div class="form-group ">
                <label>Zip Code</label>
                <input name="zipcode" value="" class="form-control" type="text">   
                 <?php echo form_error('zipcode'); ?>
                </div>
                  
            <div class=" form-group">
                <span>Phone</span>
                <input name="mobile" value="" class="form-control" type="text"> 
                 <?php echo form_error('mobile'); ?>
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