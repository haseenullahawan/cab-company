<link href="<?php echo base_url(); ?>assets/system_design/css/login.css" rel="stylesheet">
</header>
<style>
    .slider_wrapper {
        height:530px !important;
    }
    .slider_wrapper img {
        height: 545px !important;
    }
    .slider_wrapper .bx-wrapper .bx-pager {top:inherit;bottom: 0px;}
    .booking-process {height:100px;}
    .process-box {height:100px;padding: 10px 0px;}
    .process-box .form-group {width:14.66667% !important;}
     input.light_orange_button {margin-top: 25px;margin-right: 25px;}
    select {margin-top:0px;}
    select.cust_width1 {width:177px !important;margin-left:-17px !important;}
    select.cust_width2 {width:162px !important;margin-left:-5px !important;}
    select.statut {padding: 6px 10px;width: 127px;}
    select.civility {width: 74px;padding: 6px 10px;margin-left: -8px;}
    input.first_name {width:100px;}
    input.last_name {width:80px;}
    .register-box textarea {height:auto !important;}
    input.green_button {top:25px;position:relative;}
</style>
<div class="slider_wrapper " id="sliderWrapper"> <!--slider_wrapper_1-->
    <div class="container">
        <div class="row"> 
            <ul class="homepageSlider">
    			<li>
                    <img src="<?php echo base_url(); ?>assets/system_design/images/job-slider-1.jpg" title="Visite Guidee Paris" alt="Visite Guidee Paris" style="height:360px" />
                </li>
    			<li>
                    <img src="<?php echo base_url(); ?>assets/system_design/images/job-slider-2.jpg" title="Gare De Lyon" alt="Gare De Lyon" style="height:360px" />
                </li>
    			<li>
                    <img src="<?php echo base_url(); ?>assets/system_design/images/job-slider-3.jpg" title="Gare Saint Lazare" alt="Gare Saint Lazare" style="height:360px" />
                </li>
                <li>
                    <img src="<?php echo base_url(); ?>assets/system_design/images/job-slider-4.jpg" title="Aeroport D'Orly" alt="Aeroport D'Orly" style="height:360px" />
                </li>
                <li>
                    <img src="<?php echo base_url(); ?>assets/system_design/images/job-slider-5.jpg" title="Aeroport De Roissy CDG" alt="Aeroport De Roissy CDG" style="height:360px" />
                </li>
                <li>
                    <img src="<?php echo base_url(); ?>assets/system_design/images/job-slider-6.jpg" title="Aeroport Beauvais" alt="Aeroport Beauvais" style="height:360px" />
                </li>
               
            </ul> 
        </div> 
    </div>
</div>
<div class="container" style="position: relative;">
    <div class="register-box">
        <div class="booking-title booking-title-bg-red">Signup Today and Apply for a Job</div>
         									<input type="hidden" value="<?php echo $this->security->get_csrf_hash();?>" name="<?php echo $this->security->get_csrf_token_name();?>">

            <?php echo form_open('jobseeker/signup', array("id"=>"loginform"));?>
            <div class="col-md-4 form-group">
                <span>Statut</span>
                <select name="statut" class="form-control statut">
                    <option value="0">Independant</option>
                    <option value="1">Company</option>
                </select> 
            </div>

            <div class="col-md-2 form-group">
                <span>Civility</span>
                <select name="civility" class="form-control civility">
                    <option value="Mr">Mr</option>
                    <option value="Miss">Miss</option>
                    <option value="Mrs">Mrs</option>
                </select>                                    </div>

            <div class="col-md-3 form-group">
                <span>First Name</span>
                <input name="firstname" value="" class="form-control firstname" type="text">      
                <?php echo form_error('firstname'); ?>

                </div>
            <div class="col-md-3 form-group">
                <span>Last Name</span>
                <input name="lastname" value="" class="form-control last_name" type="text"> 
                 <?php echo form_error('lastname'); ?>
                </div>
                <div class="clearfix"></div>
            <div class="col-md-4 form-group">
                <span>Company</span>
                <input name="comp_name" value="" class="form-control" type="text">  
                 <?php echo form_error('comp_name'); ?>
                </div>
            <div class="col-md-4 form-group">
                <span>Phone</span>
                <input name="mobile" value="" class="form-control" type="text"> 
                 <?php echo form_error('mobile'); ?>
                </div>
            <div class="col-md-4 form-group">
                <span>Email</span>
                <input name="email" value="" class="form-control" type="text"> 
                 <?php echo form_error('email'); ?>
                </div>
            <div class="col-md-12 form-group">
                <span>Address</span>
                <textarea name="address" value="" rows="1"></textarea>   
                 <?php echo form_error('address'); ?>
                </div>
            <div class="col-md-6 ">
                <label>City</label>
                <input name="city" value="" class="form-control" type="text"> 
                 <?php echo form_error('city'); ?>
                </div>
            <div class="col-md-6 ">
                <label>Zip Code</label>
                <input name="zipcode" value="" class="form-control" type="text">   
                 <?php echo form_error('zipcode'); ?>
                </div>
                <div class="clearfix"></div>

            <div class="col-md-6 form-group">
                <label>Password</label>
                <input name="password" value="" class="form-control" type="text">  
                 <?php echo form_error('password'); ?>
                </div>
            <div class="col-md-6 form-group">
                <label>Password Confirm</label>
                <input name="confirm_password" value="" class="form-control" type="text">   
                 <?php echo form_error('confirm_password'); ?>
                </div>
          
            <div class="col-md-12">
                <div class="form-group" style="text-align:left;">
                    <span class="tos_conditions"><input type="checkbox" name="tos_conditions">Accept <a href="http://www.cab-booking-script.com/demo/termsServices" target="_blank"> Terms and Conditions</a></span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group" style="text-align: right;">
                    <input type="submit" class="button green_button" value="Registe Now">
                </div>
            </div> 

        <?php echo form_close();?>
    </div>
</div>
<style>
   .mycclls .form-group{
        margin-left: 17px;
    float: left;
    width: 12.66667% !important;
    }
</style>
<div class="booking-process">
    <div class="container"> 
        <div class="row">
            <div class="process-box" style="height: auto !important;">
                <div class="search-filter">
                    <form name="search_filter"  id="search_filter" method="post" class="search_filter">
                        <!--<div class="booking-title text-center">Find a job</div>-->
                        <div class="text-center mycclls">
                            
                            <div class="form-group">
                                <label>Function</label>
                                <select name="Function" class="form-control flt-select">
                                    <option value="0" selected="selected">Select Function</option>
                                    <?php
												foreach ($job_job as $job)
												{ ?>
												<option value="<?=$job->id?>"><?=$job->job?></option>
												    <?php } ?> 
                                  
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category" class="form-control flt-select">
                                    <option value="0" selected="selected">Select</option>
                                    <?php
												foreach ($job_jobcategory as $jobcategory)
												{ ?>
												<option value="<?=$jobcategory->id?>"><?=$jobcategory->jobcategory?></option>
												    <?php } ?> 
                                  
                                </select>
                            </div>
                            <div class="form-group">
                                <label>contract Type</label>
                                <select name="typeofcontract" class="form-control flt-select ">
                                    <option value="0">Select</option>
                                     <?php
												foreach ($job_typeofcontract as $typeofcontract)
												{ ?>
												<option value="<?=$typeofcontract->id?>"><?=$typeofcontract->typeofcontract?></option>
												    <?php } ?> 
                                   
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Contract Nature</label>
                                <select name="natureofcontract" class="form-control flt-select">
                                    <option value="0" selected="selected">Select</option>
                                    <?php
												foreach ($job_natureofcontract as $natureofcontract)
												{ ?>
												<option value="<?=$natureofcontract->id?>"><?=$natureofcontract->natureofcontract?></option>
												    <?php } ?> 
                                  
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Monthly Hours</label>
                                <select name="hourspermonth" class="form-control flt-select">
                                    <option value="0" selected="selected">Select</option>
                                    <?php
												foreach ($job_hourspermonth as $hourspermonth)
												{ ?>
												<option value="<?=$hourspermonth->id?>"><?=$hourspermonth->hourspermonth?></option>
												    <?php } ?> 
                                  
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Experience</label>
                                <select id="experience" name="experience" class="form-control flt-select cust_width2">
                                    <option value="">Select </option>
                                    <?php
												foreach ($job_requiredexperiance as $requiredexperiance)
												{ ?>
												<option value="<?=$requiredexperiance->id?>"><?=$requiredexperiance->requiredexperiance?></option>
												    <?php } ?> 
                                  
                                </select>
                            </div>
                        	<input type="hidden" value="<?php echo $this->security->get_csrf_hash();?>" name="<?php echo $this->security->get_csrf_token_name();?>">
                            <input type="hidden" name="job_search" value='job_search'>
                            <div class="form-group">
                                <label>Workplace</label>
                                <select id="level" name="Workplace" class="form-control flt-select">
                                    <option value="">Select</option>
                                    <?php
												foreach ($job_workingplace as $workingplace)
												{ ?>
												<option value="<?=$workingplace->id?>"><?=$workingplace->workingplace?></option>
												    <?php } ?> 
                                    
                                </select>
                            </div>
                            <div class="col-md-2">
                            <input class="btn light_orange_button" type="submit" name="search_by" value="Search" />
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="container body-border"> 
    <div class="breadcrumb">
        <div class="row">
            <aside class="nav-links">
                <ul>
                    <li><a href="<?php echo site_url(); ?>/"><i class="fa fa-home"></i>  <?php echo $this->lang->line('home_page');?> </a></li>
                </ul>
            </aside>
        </div> 
    </div>
    <div class="clearfix"></div> 
    <div class="job-lists">
       <?php foreach($get_alls_category as $cat ){  ?>
       
       
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th><?=$cat->jobcategory?></th>
                    <th>Contract Type</th>
                    <th>Contract Nature</th>
                    <th>Monthly Hours</th>
                    <th>Experience</th>
                    <th>Brut Salary</th>
                    <th>Living Place</th>
                    <th>Workplace</th>
                </tr>
                </thead>
                <tbody>
                     <?php if(count($jobs_listing=get_jobs_category($cat->id))>0){
                   foreach($jobs_listing as $job){?>
                        <tr>
                    <td><a href="<?=base_url('job/job_detail').'/'.$job->id?>"><?=$job->job?></a></td>
                    <td><?=$job->typeofcontract?></td>
                    <td><?=$job->natureofcontract?></td>
                    <td><?=$job->hourspermonth?></td>
                    <td><?=$job->requiredexperiance?></td>
                    <td><?=$job->brut_salary?></td>
                    <td><?=$job->job?></td>
                    <td><?=$job->workingplace?></td>
                </tr>
                       
                   <?php }        
        } ?>
               
                </tbody>
            </table>
            <?php } ?>
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