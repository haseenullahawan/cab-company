<link href="<?php echo base_url(); ?>assets/system_design/css/login.css" rel="stylesheet">
</header>

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
            
    <div class="row">
        <div class="col-md-6">
            <?php echo form_open('drivers/registration', array("id"=>"loginform"));?>
            <div class="row">
                <div class="col-md-6">
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
                        <label>Mobile</label>
                        <?php echo form_input($mobile); ?>
                        <?php echo form_error('mobile'); ?>
                    </div> 
                    <div class="form-group">
                        <label>Fax</label>
                        <?php echo form_input($fax); ?>
                        <?php echo form_error('fax'); ?>
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
                        <?php echo form_input($address); ?>
                        <?php echo form_error('address'); ?>
                    </div> 
                    <div class="form-group">
                        <label>City</label>
                        <?php echo form_input($city); ?>
                        <?php echo form_error('city'); ?>
                    </div> 
                    <div class="form-group">
                        <label>Address</label>
                        <?php echo form_input($zipcode); ?>
                        <?php echo form_error('zipcode'); ?>
                    </div> 
                       
                    <div class="form-group">
                        <input type="checkbox" id="remember" name="remember" style="float:left;margin-right: 10px;">
                        <label for="remember" class="checkbox" style="float:left;top:-8px;position:relative;">remember me</label>
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
        <div class="col-md-6 benefits" style="padding-left: 60px;">
            <div class="titleBox">
                <h4>Benefits</h4>
                <h6>Why Choose Handi Express for your transfers ?</h6>
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
    <div class="clearfix"></div> 
</div>