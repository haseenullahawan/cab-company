<?php $locale_info = localeconv(); ?>
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
             <div class="bcp">
                <ul class='nav nav-wizard'>
                    <li><span class="steps">1</span><a style="color:#fff !important"><?php echo $this->lang->line('journey_details'); ?></a></li> <!-- class='active'-->
                    <li><span class="steps">2</span><a style="color:#fff !important"><?php echo $this->lang->line('identification'); ?></a></li> <!-- class='active'-->
                    <li><span class="steps">3</span><a style="color:#fff !important"><?php echo $this->lang->line('quote'); ?></a></li>
                    <li class='active'><span class="steps">4</span><a><?php echo $this->lang->line('payment_details'); ?></a></li>
                </ul>
            </div>
         </div>   
            <div class="col-md-12" style="padding:0px 20px 0px 30px;">
                <div class="booking_head">
                  <?php echo $this->lang->line('passengers_details');?>
                </div>
            </div>
            <div class="col-md-6" style="padding:0px 0px 0px 30px;">
                <div class="left-side-cont">
                    <div class="services">
                        <div class="col-md-3">
                            <strong><?php echo $this->lang->line('name');?>:</strong><br><?php if(isset($user['username']))  echo $user['username']; ?>   
                        </div>
                        <div class="col-md-3">
                            <strong><?php echo $this->lang->line('email');?>:</strong><br><?php if(isset($user['email']))  echo $user['email']; ?>    
                        </div>                        
                        <div class="col-md-3">
                            <strong><?php echo $this->lang->line('phone');?>:</strong><br><?php if(isset($user['phone']))  echo $user['phone']; ?>
                        </div> 
                   </div>
                    <div class="services" style="margin-top: 20px;">
                        <div class="col-md-12">
                            <label><strong> <?php echo $this->lang->line('billing_address');?></strong> </label><br/>
                            <?php if(isset($user['address1']))  echo $user['company_name']; ?><br/>
                            <?php if(isset($user['address1']))  echo $user['address1']; ?><br/>
                            <?php if(isset($user['address2']))  echo $user['address2']; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">&nbsp;</div>
                        <div class="col-md-6">
                            <div class="bre">
                                <?php if(isset($journey_details['waitnReturn']) && $journey_details['waitnReturn']=="on")  { ?>
                                <aside class="ri-con" style="background:#b4db92 !important;"><strong><?php echo $this->lang->line('journey_type');?></strong></br><?php echo $this->lang->line('two_way');?></aside>
                                <aside class="ri-con" style="background:#b4db92 !important;">
                                <strong><?php echo $this->lang->line('two_way_fare');?></strong> </br>
                                <?php } else {?>
                                <!--<aside class="le-con" style="background:#b4db92 !important;"><strong><?php echo $this->lang->line('journey_type');?></strong></br><?php echo $this->lang->line('one_way');?></aside>-->
                                <!-- Move to right side box top
                                <div class="le-con" style="background:#b4db92 !important;" ><strong><?php // echo $this->lang->line('booking_no');?>:<br/> <?php // if(isset($journey_details['booking_ref']))  echo $journey_details['booking_ref']; ?></strong> </div>
                                <aside class="ri-con" style="background:#b4db92 !important;">
                                   <?php } ?>
                                   <?php // if(isset($journey_details['total_cost']))   echo $journey_details['total_cost'] . " " . $this->lang->line($locale_info['currency_symbol']); //    money_format('%.2n',$journey_details['total_cost']); ?>
                                </aside>-->
                             </div>
                        </div>
                    </div>
                   <!--
                   <div class="services">
                      <h3 class="right-side-hed">
                         <?php // echo $this->lang->line('journey_details');?>: 
                         !-- <aside class="side"><a href="#"> <i class="fa fa-edit"></i> </a></aside> --
                      </h3>
                      <ul>
                         <li><strong><?php echo $this->lang->line('pick_up');?>:</strong><br><?php if(isset($journey_details['pick_up']))  echo $journey_details['pick_up']; ?> </li>
                         <li><strong><?php echo $this->lang->line('drop_of');?>:</strong><br><?php if(isset($journey_details['drop_of']))  echo $journey_details['drop_of']; ?></li>
                         <li><strong><?php echo $this->lang->line('pick_up_date');?>:</strong><br><?php if(isset($journey_details['pick_date']))  echo $journey_details['pick_date']; ?></li>
                         <li><strong><?php echo $this->lang->line('pick_up_time');?>:</strong><br><?php if(isset($journey_details['pick_time']))  echo $journey_details['pick_time']; ?></li>
                         <?php if(isset($journey_details['waitnReturn']) && $journey_details['waitnReturn']=="on")  { ?>
                         <li>
                            <strong><?php echo $this->lang->line('waiting_time');?>:</strong><br><?php if(isset($journey_details['waitingTime']))  echo $journey_details['waitingTime']; ?>
                            <aside class="side"><?php if(isset($journey_details['waitingCost']))  echo money_format('%.2n',$journey_details['waitingCost']); ?></aside>
                         </li>
                         <?php } ?>
                         <li><strong><?php echo $this->lang->line('journey_miles_and_time');?>:</strong><br><?php if(isset($journey_details['total_distance']))  echo $journey_details['total_distance']; ?> & <?php if(isset($journey_details['total_time']))  echo $journey_details['total_time']; ?></li>
                         <li>
                            <strong><?php echo $this->lang->line('car');?>:</strong><br><?php if(isset($journey_details['car_name']))  echo $journey_details['car_name']; ?>
                            -- <aside class="side"><?php //if(isset($journey_details['car_cost']))  echo money_format('%.2n',$journey_details['car_cost']); ?></aside> --
                         </li>
                      </ul>
                   </div>-->
                   
                </div>
            </div>
            <div class="col-md-6">
                <div class="right-side-cont" style="border:solid 1px #ddd;border-radius: 15px !important;padding:0px 0px 20px;">
                    <div class="online">
                        <div class="row-fluid" style ="background: #B4DB92;border-top-left-radius: 15px;border-top-right-radius: 15px;padding:5px 0px 5px 10px;margin-top:-12px;font-weight: bold;">
                            <div class="col-md-6">
                                <?php echo $this->lang->line('booking_no');?>: <?php if(isset($journey_details['booking_ref']))  echo $journey_details['booking_ref']; ?>
                            </div>
                            <div class="col-md-6 align-right">
                                <?php echo $this->lang->line('total_price_to_pay_now');?>: <?php if(isset($journey_details['total_cost']))   echo $journey_details['total_cost'] . " " . $this->lang->line($locale_info['currency_symbol']);?>
                            </div>
                        </div>
                     <!-- Tab panes -->
                     <?php 
                        echo form_open('welcome/paymentConfirmation'); ?>
                     <ul role="tablist" class="nav nav-tabs on-bo-he  payement">
                        <li class="pay"> <?php echo $this->lang->line('payment');?></li>
                        <li>
                           <?php if($site_settings->credit=="1"){?>
                           <input type="radio"  value="cc" name="radiog_dark" id="radio3" class="css-checkbox css-label" />
                           <label for="radio3" class="css-label"><?php echo $this->lang->line('credit_card');?></label><?php }
                              else{
                              	
                              }?>
                        </li>
                        <li>
                           <?php if($site_settings->paypal=="1"){?>
                           <input type="radio" name="radiog_dark" value="paypal" id="radio4" class="css-checkbox css-label" />
                           <label for="radio4" class="css-label"><?php echo $this->lang->line('paypal');?></label><?php }
                              else{
                              	
                              }?>
                        </li>
                        <li>
                           <?php if($site_settings->cash=="1"){?>
                           <input type="radio"  name="radiog_dark" checked="" value="cash" id="radio5" class="css-checkbox css-label" />
                           <label for="radio5" class="css-label"><?php echo $this->lang->line('cash');?></label><?php }
                              else{
                              	
                              }?>
                        </li>
                        <li>
                           <input type="radio" name="radiog_dark" value="cash_to_driver" id="radio6" class="css-checkbox css-label" />
                           <label for="radio6" class="css-label"><?php echo $this->lang->line('cash_to_driver');?></label>
                        </li>
                     </ul>
                     <div class="col-md-12">
                        <div class="payments" id="credit_card" style="display: none;">
                           <p> <?php echo $this->lang->line('pay_with_credit_card');?> </p>
                           <img src="<?php echo base_url(); ?>assets/system_design/images/mastercard.png"/>
                        </div>
                        <div class="payments" id="paypal" style="display: none;">
                           <p> <?php echo $this->lang->line('pay_with_paypal');?> </p>
                           <img src="<?php echo base_url(); ?>assets/system_design/images/paypal.jpg"/>
                        </div>
                        <div class="payments" id="cash" >
                           <p> <?php echo $this->lang->line('pay_with_cash');?> </p>
                           <img src="<?php echo base_url(); ?>assets/system_design/images/mastercard.png"/>
                        </div>
                         <div class="payments" id="cash_to_driver" style="display: none;">
                           <p> <?php echo $this->lang->line('cash_to_driver');?> </p>
                           <img src="<?php echo base_url(); ?>assets/system_design/images/driver.png"/>
                        </div>
                       </div>
                        <!--<div class="down-btn">-->
                        <div class="col-md-12" style="margin:0 auto;text-align: center;">
                                <!--<div class="btn btn-default prev">-->
                                    <a href="<?php echo site_url(); ?>/welcome/passengerDetails" class="button blue_button"> <i class="fa fa-arrow-circle-o-left"></i><?php echo $this->lang->line('back_to_your_details');?> </a>
                                <!--</div>-->&nbsp;&nbsp;&nbsp;
                                <button type="submit" class="button green_button"><?php echo $this->lang->line('payment');?>&nbsp;<i class="fa fa-arrow-circle-o-right"></i> </button>
                        </div>
                     
                     <?php echo form_close(); ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>    
<!--<script src="<?php echo base_url(); ?>assets/system_design/scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>-->
<script>
   $(document).ready(function(){
     $("#radio3").click(function(){
        document.getElementById("cash_to_driver").style.display ='none';
        document.getElementById("paypal").style.display ='none';
        document.getElementById("cash").style.display = 'none';
        document.getElementById("credit_card").style.display = 'block';
     });
     
      $("#radio4").click(function(){
        document.getElementById("cash_to_driver").style.display ='none';
        document.getElementById("paypal").style.display ='block';
        document.getElementById("cash").style.display = 'none';
        document.getElementById("credit_card").style.display = 'none';
     });
     
    $("#radio5").click(function(){
        document.getElementById("cash_to_driver").style.display ='none';
   	document.getElementById("paypal").style.display ='none';
   	document.getElementById("cash").style.display = 'block';
   	document.getElementById("credit_card").style.display = 'none';
    });
    
    $("#radio6").click(function(){
        document.getElementById("paypal").style.display ='none';
        document.getElementById("cash").style.display = 'none';
        document.getElementById("credit_card").style.display = 'none';
        document.getElementById("cash_to_driver").style.display = 'block';
    });
        /*  $("ul.nav-wizard li.active").attr('style','width:35.2% !important');*/
   });
</script>