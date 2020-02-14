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
</header>

<div class="container-fluid body-bg">
<div class="container body-border">
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
    <?php if ($journey_details != "") : ?>
    <!--<div class="bcp" style="margin-top:0px">
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
            <aside class="ri-con"> <strong><?php echo $this->lang->line('one_way_fare');?></strong> </br>
               <?php } ?>
               <?php if(isset($journey_details['total_cost']))  echo $journey_details['total_cost'] . " " .  $this->lang->line($locale_info['currency_symbol']); // money_format('%.2n',$journey_details['total_cost']); ?>
            </aside>
         </div>
     </div>
     <div class="right-side-hed" style="margin: 10px 0px;">
        <?php echo $this->lang->line('login');?>
     </div>-->
    <?php endif; ?>
     
    <div class="service" style="padding: 0px !important;">
        <iframe style="width:99.9%;height:575px;border:none;overflow:hidden;" src="https://navetteo.limovtc.fr/login/" id="" target="_parent"></iframe>
    </div>
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