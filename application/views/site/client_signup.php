    <link href="<?php echo base_url(); ?>assets/system_design/css/register.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/system_design/css/login.css" rel="stylesheet">
    <style> select {margin-top:0px;}</style>
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
                    $("#client_signupform").validate({
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
    <?php // if ($journey_details != "") : ?>
    <!--<div class="bcp" style="margin-top:0px;">
        <ul class='nav nav-wizard'>
            <li><span class="steps">1</span><a style="color:#fff !important"><?php echo $this->lang->line('journey_details'); ?></a></li> 
            <li class='active'><span class="steps">2</span><a><?php echo $this->lang->line('passenger_details'); ?></a></li>
            <li><span class="steps">3</span><a><?php echo $this->lang->line('payment_details'); ?></a></li>
        </ul>
    </div>
    <div class="bre"> <strong><?php echo $this->lang->line('booking_reference');?>:</strong> <?php if(isset($journey_details['booking_ref']))  echo $journey_details['booking_ref']; ?>  </div>
     
    <div class="services">
        <h3 style="background:#FFDB52 !important;">
           <?php echo $this->lang->line('journey_details');?>: 
           <aside class="side"><a href="#"> <i class="fa fa-edit"></i> </a></aside>
        </h3>
        <div class="col-md-6" style="margin-top:15px;">
            <strong><?php echo $this->lang->line('pick_up');?>:</strong><br><?php if(isset($journey_details['pick_up']))  echo $journey_details['pick_up']; ?> 
        </div>
         <div class="col-md-6" style="margin-top:15px;">
             <strong><?php echo $this->lang->line('drop_of');?>:</strong><br><?php if(isset($journey_details['drop_of']))  echo $journey_details['drop_of']; ?>
         </div>
        <div class="col-md-6" style="margin-top:15px;">
            <strong><?php echo $this->lang->line('pick_up_date');?>:</strong><br><?php if(isset($journey_details['pick_date']))  echo $journey_details['pick_date']; ?>
        </div>
        <div class="col-md-6" style="margin-top:15px;">
            <strong><?php echo $this->lang->line('pick_up_time');?>:</strong><br><?php if(isset($journey_details['pick_time']))  echo $journey_details['pick_time']; ?>
        </div>
        <?php if(isset($journey_details['waitnReturn']) && $journey_details['waitnReturn']=="on")  { ?> 
        <div class="col-md-12" style="margin-top:15px;">
            <strong><?php echo $this->lang->line('waiting_time');?>:</strong><br><?php if(isset($journey_details['waitingTime']))  echo $journey_details['waitingTime']; ?>
              <aside class="side"><?php if(isset($journey_details['waitingCost']))  echo money_format('%.2n',$journey_details['waitingCost']); ?></aside>
        </div>
         <?php } ?> 
        <div class="col-md-6" style="margin-top:15px;">
            <strong><?php echo $this->lang->line('journey_miles_and_time');?>:</strong><br><?php if(isset($journey_details['total_distance']))  echo $journey_details['total_distance']; ?> & <?php if(isset($journey_details['total_time']))  echo $journey_details['total_time']; ?>
        </div>
        <div class="col-md-6" style="margin-top:15px;">
            <strong><?php echo $this->lang->line('car');?>:</strong><br><?php if(isset($journey_details['car_name']))  echo $journey_details['car_name']; ?>
        </div>
        <div class="bre">
            <?php if(isset($journey_details['waitnReturn']) && $journey_details['waitnReturn']=="on")  { ?>
            <aside class="le-con"><strong><?php echo $this->lang->line('journey_type');?></strong></br><?php echo $this->lang->line('two_way');?></aside>
            <aside class="ri-con">
            <strong><?php echo $this->lang->line('two_way_fare');?></strong> </br>
            <?php } else {?>
            <aside class="le-con"><strong><?php echo $this->lang->line('journey_type');?></strong></br><?php echo $this->lang->line('one_way');?></aside>
            <aside class="ri-con"> 
                <strong><?php echo $this->lang->line('one_way_fare');?> <br/>
               <?php } ?>
               <?php if(isset($journey_details['total_cost']))  echo $journey_details['total_cost'] . " " .  $this->lang->line($locale_info['currency_symbol']); // money_format('%.2n',$journey_details['total_cost']); ?>
                </strong>
            </aside>
         </div>
     </div>
    <div class="right-side-hed" style="margin: 10px 0px;">
        <?php echo $this->lang->line('register');?>
     </div> -->
    <?php // endif; ?>
    <?php if ($this->session->flashdata('messages')): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('messages'); ?>
        </div>
    <?php elseif ($this->session->flashdata('error')): ?>
        <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>
    
    <div class="row">
        <div class="col-md-6">
            <?php echo form_open('client/signup', array("id"=>"client_signupform"));?>
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
                <h4><?php echo $this->lang->line('benefits');?></h4>
                <h6><?php echo $this->lang->line('benefits_txt');?></h6>
            </div>
            <div class="infoBox">
                <div class="col-md-2 wallet"><i class="fa fa-money"></i></div>
                <div class="col-md-10">
                    <div class="wallet">
                        <h5><?php echo $this->lang->line('value_for_money');?></h5>
                        <h6><?php echo $this->lang->line('value_for_money_txt');?></h6>
                    </div>
                </div>
            </div>
            <div class="infoBox">
                <div class="col-md-2 customer-service"><i class="fa fa-headphones"></i></div>
                <div class="col-md-10">
                    <div class="wallet">
                        <h5><?php echo $this->lang->line('customer_service');?></h5>
                        <h6><?php echo $this->lang->line('customer_service_txt');?></h6>
                    </div>
                </div>
            </div>
            <div class="infoBox">
                <div class="col-md-2 easy-use"><i class="fa fa-leaf"></i></div>
                <div class="col-md-10">
                    <div class="wallet">
                        <h5><?php echo $this->lang->line('easy_of_use');?></h5>
                        <h6><?php echo $this->lang->line('easy_of_use_txt');?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url(); ?>assets/system_design/scripts/bootstrap.min.js"></script>
 <script src="http://maps.googleapis.com/maps/api/js?libraries=places,geometry"></script>
<script src="<?php echo base_url();?>assets/system_design/scripts/jquery.geocomplete.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() { 
        $(".location").geocomplete({
                country: '<?php echo $site_settings->site_country;?>' 
              }).bind("geocode:result", function(event, result){
                // $(this).val(JSON.stringify(result.formatted_address));       
                //$form_address = JSON.stringify(result.formatted_address);
                //$address = $form_address.replace('\"','');
                //$(this).val($address);        
                $fieldName = $(this).attr('id');
                console.log("Field Name: "+$fieldName);
                $formatted_address = result.formatted_address;
                console.log("form address : "+$formatted_address);
                $("#"+$fieldName).val($formatted_address);
                console.log($fieldName +" : "+$("#"+$fieldName).val());
        });
        
        //  $.colorbox({inline:true, href:".ajax"});
         
    });
</script> 
</body>
</html>