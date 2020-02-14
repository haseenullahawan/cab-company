</header>
<link href="http://navetteo.fr/assets/system_design/css/login.css" rel="stylesheet"/>
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
         <div class="col-md-12" style="padding:0px 20px 0px 30px;">
            <!--<div class="left-side-cont">-->
               <?php 
                  $attributes = array('name' => 'passenger_details_form', 'id' => 'passenger_details_form');
                  echo form_open("welcome/payment",$attributes) ;
                  $locale_info = localeconv();
                          ?>
                <!--<div class="col-md-12 padding-p-0">-->
                    <div class="bcp" style="margin-top:0px;">
                        <ul class='nav nav-wizard'>
                            <li><span class="steps">1</span><a style="color:#fff !important"><?php echo $this->lang->line('journey_details'); ?></a></li> <!--class='active'-->
                            <li><span class="steps">2</span><a style="color:#fff !important"><?php echo $this->lang->line('identification'); ?></a></li>
                            <li class='active'><span class="steps">3</span><a><?php echo $this->lang->line('quote'); ?></a></li>
                            <li><span class="steps">4</span><a><?php echo $this->lang->line('payment_details'); ?></a></li>
                        </ul>
                     <!--<div class="business-us">
                        <div class="busi-cercle active"> 
                        </div>
                        <center> <?php // echo $this->lang->line('journey_details');?></center>
                     </div>
                     <div class="business-us">
                        <div class="busi-cercle active"> 
                        </div>
                        <center> <?php // echo $this->lang->line('passenger_details');?> </center>
                     </div>
                     <div class="business-us">
                        <div class="busi-cercle"> 
                        </div>
                        <center><?php // echo $this->lang->line('payment_details');?></center>
                     </div>-->
                  </div>
                  <div class="online">
                         <div class="booking_head">
                            <?php 
// echo "<pre>";
// var_dump($journey_details);
                            echo $this->lang->line('booking_summary') . " " . $this->lang->line('number');?> : <?php if(isset($journey_details['booking_ref']))  echo $journey_details['booking_ref']; ?>
                         </div>
                         <!--<div class="bre"> <strong><?php echo $this->lang->line('booking_reference');?>:</strong>   </div>-->
                         
                         <div class="services">
                            <!--<h3 class="right-side-hed">
                               <?php echo $this->lang->line('journey_details');?>: 
                               <aside class="side"><a href="#"> <i class="fa fa-edit"></i> </a></aside>
                            </h3>-->
                            <div class="col-md-6" style="margin-top:15px;">
                                <div class="row-fluid">
                                    <div class="col-md-12">
                                    <strong><?php echo $this->lang->line('pick_up');?>:</strong><br><?php if(isset($journey_details['pick_up']))  echo $journey_details['pick_up']; ?> 
                                        <?php   if(isset($journey_details['drop_of_waypoint']) && $journey_details['drop_of_waypoint'] != "")  {
                                                echo '<br/><strong>Via</strong><br>';
                                                echo $journey_details['drop_of_waypoint'];
                                            }  
                                        ?>
                                    </div>
                                    <div class="col-md-12">
                                        <strong><?php echo $this->lang->line('drop_of');?>:</strong><br><?php if(isset($journey_details['drop_of']))  echo $journey_details['drop_of']; ?>
                                    </div>
                                    <div class="col-md-6">
                                        <strong><?php echo $this->lang->line('pick_up_date');?>:</strong><br><?php if(isset($journey_details['pick_date']))  echo $journey_details['pick_date']; ?>
                                    </div>
                                    <div class="col-md-6">
                                        <strong><?php echo $this->lang->line('pick_up_time');?>:</strong><br><?php if(isset($journey_details['pick_time']))  echo $journey_details['pick_time']; ?>
                                    </div>
                                    <div class="col-md-6">
                                        <strong><?php echo $this->lang->line('journey_miles_and_time');?>:</strong><br><?php if(isset($journey_details['total_distance']))  echo $journey_details['total_distance']; ?> & <?php if(isset($journey_details['total_time']))  echo $journey_details['total_time']; ?>
                                    </div>
                                    <div class="col-md-6">
                                        <strong><?php echo $this->lang->line('car');?>:</strong><br><?php if(isset($journey_details['car_name']))  echo $journey_details['car_name']; ?>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-6">
                                        <?php if(isset($journey_details['waitnReturn']) && $journey_details['waitnReturn']=="on")  { ?>
                                        <strong><?php echo $this->lang->line('journey_type');?>:</strong></br><?php echo $this->lang->line('two_way');?>
                                        <aside class="ri-con" >
                                        <strong><?php echo $this->lang->line('two_way_fare');?></strong> </br>
                                        <?php } else {?>
                                        <strong><?php echo $this->lang->line('journey_type');?></strong></br><?php echo $this->lang->line('one_way');?>
                                        
                                           <?php } ?>
                                        </aside>
                                    </div>
                                    <div class="col-md-6">&nbsp;<br/>
                                        <?php if(isset($journey_details['waitnReturn']) && $journey_details['waitnReturn']=="on")  { ?> 
                                            <div class="col-md-12" style="margin-top:15px;">
                                                <strong><?php echo $this->lang->line('waiting_time');?>:</strong><br><?php if(isset($journey_details['waitingTime']))  echo $journey_details['waitingTime']; ?>
                                                  - <?php if(isset($journey_details['waitingCost']))  {
                                                        //  echo money_format('%.2n',$journey_details['waitingCost']); 
                                                      echo $journey_details['waitingCost'] . " " .  $this->lang->line($locale_info['currency_symbol']);
                                                  }
                                                    ?><!--<aside class="side"></aside>-->
                                            </div>
                                         <?php } ?> 
                                    </div>
                                    <div class="col-md-6 offset6">
                                        <aside class="ri-con tariff-box"><strong><?php echo $this->lang->line('one_way_fare');?></strong> </br> <?php if(isset($journey_details['total_cost']))  echo $journey_details['total_cost'] . " " .  $this->lang->line($locale_info['currency_symbol']); // money_format('%.2n',$journey_details['total_cost']); ?></aside>
                                    </div>
                                    
                                </div>
                            </div>
                             <div class="col-md-6" style="margin-top:15px;">
                                <div class="row">
                                    <div class="map-wrapper">
                                        <div id="map" style="border-radius:10px;"></div>
                                    </div>
                                </div>
                             </div>
                         </div>
                        
                         <!--<div class="right-side-hed" style="margin: 10px 0px;background:none !important;">
                            <?php // echo $this->lang->line('guest_check_out');?>
                         </div>-->
                     <!-- Tab panes -->
                     <!--<ul role="tablist" class="nav nav-tabs on-bo-he  on-bo-login">
                        <li>
                           <?php // echo $this->lang->line('passengers_details');?>
                        </li>
                     </ul>-->
                    <!--<div class="row">
                        <div class="col-md-6 login-page-divider">
                            <div class="pass-login-dv">
                               <div class="fg"><label><?php echo $this->lang->line('name');?> </label>
                                  <input type="text" value="<?php if(isset($user['username']))  echo $user['username']; ?>" name="username" placeholder="">
                               </div>
                               <div class="fg">
                                  <label> <?php echo $this->lang->line('email');?> </label>
                                  <input type="text"  value="<?php if(isset($user['email']))  echo $user['email']; ?>" name="email">
                               </div>
                               <div class="fg">
                                  <label> <?php echo $this->lang->line('phone_number');?> </label>
                                  <input type="text"  maxlength="11" value="<?php if(isset($user['phone']))  echo $user['phone']; ?>" name="phone">
                               </div>
                                <div class="fg">
                                  <label> <?php echo $this->lang->line('address');?> </label>
                                  <input type="text" class=""  maxlength="250" value="<?php if(isset($user['address1']))  echo $user['address1']; ?>" name="address1" id="address1" placeholder="<?php echo $this->lang->line('name_address') ?>">
                                </div>
                                <div class="fg">
                                  <input type="text" class="location"  maxlength="250" value="<?php if(isset($user['address2']))  echo $user['address2']; ?>" name="address2" id="address2" placeholder="<?php echo $this->lang->line('address_postcode_city') ?>">
                               </div>
                               <div class="fg">
                                  <label> <?php echo $this->lang->line('information_to_driver');?> </label>
                                  <textarea name="information"><?php if(isset($user['information']))  echo $user['information']; ?></textarea>            
                               </div>
                            </div>
                        </div>
                        <div class="col-md-6 benefits">
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
                    </div>-->
                  </div>
               <!--</div>-->
               <div class="online">
                    <div class="col-md-12 padding-p-0">
                        <div class="col-md-6">
                            <!--<div class="">btn btn-default prev-->
                                <a href="<?php echo site_url(); ?>/welcome/onlineBooking" class="button blue_button"> <i class="fa fa-arrow-circle-o-left"></i> <?php echo $this->lang->line('back_to_journey_details');?>  </a>
                            <!--</div>-->
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="button green_button right"><?php echo $this->lang->line('next_payment_details');?> <i class="fa fa-arrow-circle-o-right"></i> </button> 
                        </div>
                   </div>
               </div>
               <?php echo form_close(); ?>
            <!--</div>-->
         </div>
         <div class="col-md-3">
            <div class="right-side-cont">
            </div>
         </div>
      </div>
   </div>
</div>
<style>
    #map {
        height: 100%;
    }
    .map-wrapper {
        display:block;
        z-index:111111;
        width:96%;
        height:300px;
        border:solid 1px #cccccc;
        float:left;
        margin-left:20px;
        border-radius:10px;
    }
</style>
</style>
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
   
   		
   		//form validation rules
              $("#passenger_details_form").validate({
                  rules: {
                      username: {
                          required: true,
   			  lettersonly: true
                          
                      },
   				phone: {
                          required: true,
   			  phoneNumber:true,
   			  rangelength: [10,11]
                          
                      },
				email : {
					required: true,
					email: true
					}
                  },
   			
   			messages: {
   				username: {
                          required: "<?php echo $this->lang->line('name_valid');?>"
                      },
   				phone: {
                          required: "<?php echo $this->lang->line('phone_valid');?>"
                      },
				email: {
                          required: "<?php echo $this->lang->line('email_valid');?>"
                      },
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
   /*   $("ul.nav-wizard li").attr('style','width:30% !important');
   $("ul.nav-wizard li.active").attr('style','width:35% !important');*/

    function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 7,
          center: {lat: 48.8589507, lng: 2.2775175}
        });
        directionsDisplay.setMap(map);
        var waypts = [];
        waypts.push({
            location: "<?php echo $journey_details['drop_of_waypoint']?>",
            stopover: true
          });
        console.log(waypts);
        directionsService.route({
          origin: "<?php echo $journey_details['pick_up'];?>",
          destination: "<?php echo $journey_details['drop_of']?>",
          <?php if ($journey_details['drop_of_waypoint'] != "") : ?>
          waypoints:waypts,
          <?php endif;?>        
          optimizeWaypoints: true,
          travelMode: google.maps.TravelMode.DRIVING
        }, function(response, status) {
          if (status === google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
          } else { 
              console.log('Directions request failed due to ' + status);
           //   window.alert('Directions request failed due to ' + status);
          }
        });

    }
</script>