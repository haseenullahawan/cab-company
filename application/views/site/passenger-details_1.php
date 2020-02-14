</header>
<div class="container-fluid body-bg">
   <div class="container body-border"><!--padding-p-0-->
        <div class="breadcrumb">
            <div class="row">
               <aside class="nav-links">
                  <ul>
                     <li> <a href="<?php echo site_url(); ?>/"> <?php echo $this->lang->line('home');?>  </a> </li>
                     <li class="active"><a href="javascript:void(0)">&nbsp;<?php if(isset($sub_heading)) echo $sub_heading; ?> </a></li>
                  </ul>
               </aside>
            </div>
        </div>
      <div class="row">
         <div class="col-md-9">
            <div class="left-side-cont">
               <?php 
                  $attributes = array('name' => 'passenger_details_form', 'id' => 'passenger_details_form');
                  echo form_open("welcome/payment",$attributes) ;
                  $locale_info = localeconv();
                          ?>
                <div class="col-md-12 padding-p-0">
                    <div class="bcp">
                        <ul class='nav nav-wizard'>
                            <li class='active'><span class="steps">1</span><a><?php echo $this->lang->line('journey_details'); ?></a></li>
                            <li class='active'><span class="steps">2</span><a><?php echo $this->lang->line('passenger_details'); ?></a></li>
                            <li><span class="steps">3</span><a><?php echo $this->lang->line('payment_details'); ?></a></li>
                        </ul>
                     <!--<div class="business-us">
                        <div class="busi-cercle active"> 
                        </div>
                        <center> <?php echo $this->lang->line('journey_details');?></center>
                     </div>
                     <div class="business-us">
                        <div class="busi-cercle active"> 
                        </div>
                        <center> <?php echo $this->lang->line('passenger_details');?> </center>
                     </div>
                     <div class="business-us">
                        <div class="busi-cercle"> 
                        </div>
                        <center><?php echo $this->lang->line('payment_details');?></center>
                     </div>-->
                  </div>
                  <div class="online">
                     <!-- Tab panes -->
                     <ul role="tablist" class="nav nav-tabs on-bo-he  on-bo-login">
                        <li>
                           <?php echo $this->lang->line('passengers_details');?>
                        </li>
                     </ul>
                     <div class="col-md-12">
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
                              <label> <?php echo $this->lang->line('information_to_driver');?> </label>
                              <textarea name="information"><?php if(isset($user['information']))  echo $user['information']; ?></textarea>            
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
                <div class="col-md-12 padding-p-0">
                    <div class="col-md-6">
                        <div class=""><!--btn btn-default prev-->
                            <a href="<?php echo site_url(); ?>/welcome/onlineBooking" class="button blue_button"> <i class="fa fa-arrow-circle-o-left"></i> <?php echo $this->lang->line('back_to_journey_details');?>  </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="button green_button right"><?php echo $this->lang->line('next_payment_details');?> <i class="fa fa-arrow-circle-o-right"></i> </button> 
                    </div>
               </div>
               <?php echo form_close(); ?>
            </div>
         </div>
         <div class="col-md-3">
            <div class="right-side-cont">
               <div class="right-side-hed ">
                  <?php echo $this->lang->line('booking_summary');?>
               </div>
               <div class="bre"> <strong><?php echo $this->lang->line('booking_reference');?>:</strong> <?php if(isset($journey_details['booking_ref']))  echo $journey_details['booking_ref']; ?>  </div>
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
               <div class="services">
                  <h3>
                     <?php echo $this->lang->line('journey_details');?>: 
                     <aside class="side"><a href="#"> <i class="fa fa-edit"></i> </a></aside>
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
                        <!-- <aside class="side"><?php //if(isset($journey_details['car_cost']))  echo money_format('$.2n'$journey_details['car_cost']); ?></aside> -->
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
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
   $("ul.nav-wizard li").attr('style','width:30% !important');
   $("ul.nav-wizard li.active").attr('style','width:35% !important');
</script>