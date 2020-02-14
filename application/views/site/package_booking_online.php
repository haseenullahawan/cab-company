</header>
<?php 
   $attributes = array("name" => 'online_package_booking_form', "id" => 'online_package_booking_form');
   echo form_open('welcome/passengerDetails',$attributes); ?>
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
      <div class=""><!--row-->
         <div class=""><!--col-md-9-->
            <div class="left-side-cont">
               <div class="col-md-12 padding-p-0">
                   <div class="bcp" style="margin-top:0px;">
                        <ul class='nav nav-wizard'>
                            <li class='active'><span class="steps">1</span><a><?php echo $this->lang->line('journey_details'); ?></a></li>
                            <li><span class="steps">2</span><a><?php echo $this->lang->line('passenger_details'); ?></a></li>
                            <li><span class="steps">3</span><a><?php echo $this->lang->line('payment_details'); ?></a></li>
                        </ul>
                       <!--<div class="business-us">
                          <div class="busi-cercle active"> 
                          </div>
                          <center> <?php echo $this->lang->line('journey_details');?></center>
                       </div>
                       <div class="business-us">
                          <div class="busi-cercle"> 
                          </div>
                          <center> <?php echo $this->lang->line('passengers_details');?> </center>
                       </div>
                       <div class="business-us">
                          <div class="busi-cercle"> 
                          </div>
                          <center>  <?php echo $this->lang->line('booking_confirmation');?></center>
                       </div>-->
                    </div>
                   <div class="date-time">
                        <ul class="nav nav-tabs on-bo-he">
                           <li>
						   <a data-toggle='tab' role='tab' aria-controls='home' href='#home'>
                              <div class="on-bo-heddings"><i class="fa fa-calendar"></i> </div>
                              <?php echo $this->lang->line('date_time');?>
							</a>
                           </li>
                           <small class="on-smhed"> (<?php echo $this->lang->line('click_and_select_the_date_and_time_you_would_like_to_be_picked_up');?>  ) </small>
                        </ul>
                        <div class="online-con">
                           <div class="col-md-6">
                              <label> <?php echo $this->lang->line('select_date');?> : * </label>
                              <!--<input data-beatpicker="true" class="dte"  type="text" value="<?php echo date($date_format,time()+86400);echo set_value('pick_date');?>" name="pick_date" placeholder="<?php echo $this->lang->line('pick_up_date');?>" data-beatpicker-disable="{from:[100,1,1],to:[<?php echo date('Y, n, d');?>]}" data-beatpicker-format="['<?php echo $date_elem1;?>','<?php echo $date_elem2;?>','<?php echo $date_elem3;?>'],separator:'<?php echo $seperator;?>'"   />-->
                              <input id="dtpicker" class="dte"  type="text" value="<?php echo date($date_format,time()+86400);echo set_value('pick_date');?>" name="pick_date" placeholder="<?php echo $this->lang->line('pick_up_date');?>" style="width:16% !important;" />
                           </div>
                           <div class="col-md-6">
                              <label><?php echo $this->lang->line('select_time');?> :* </label>
                              <input type="text" id="timepicker1" name="pick_time" value="<?php echo date("h : i : A");?>" class="grad-bg valid" style="width:12% !important;" />
                           </div>
                           <div class="col-md-6">
                              <input type="hidden" value="<?php echo date('ymdhis'); ?>" name="booking_ref" >
                           </div>
                           <div class="col-md-6">
                              <input type="hidden" value="<?php echo $package_details->min_cost; ?>" name="total_cost" >
                           </div>
                           <div class="col-md-6">
                              <input type="hidden"  value="<?php echo $package_details->id; ?>" name="package_type" >
                           </div>
                           <div class="col-md-6">
                              <input type="hidden"  value="<?php echo $package_details->distance; ?>" name="total_distance" >
                           </div>
                           <!--<div class="col-md-6">
                              <input type="hidden" value="" name="pick_up" >
                              </div> -->
                           <div class="col-md-6">
                              <input type="hidden"  value="-" name="drop_of" >
                           </div>
                           <div class="col-md-6">
                              <input type="hidden"  value="<?php echo $cabs[0]->name;?>" name="car_name" >
                           </div>
                           <div class="col-md-6">
                              <input type="hidden"  value="<?php echo $package_details->hours;?>   Hours"  name="total_time" >
                           </div>
                        </div>
                     </div>
                     
                  <div class="col-md-6">
                     <label> <?php echo $this->lang->line('pick_up_location');?> </label>
                     <input type="text"  placeholder="<?php echo $this->lang->line('type_ur_address');?>" class="location" id="local_pick" name="pick_up">
                  </div >
                  <div class="online-cars" id="cars_data_list">
                     <div class="online-cars" id="cars_data_list">
                        <ul class="nav nav-tabs on-bo-he">
                           <li>
						   <a data-toggle='tab' role='tab' aria-controls='home' href='#home'>
                              <div class="on-bo-heddings"><i class="fa fa-automobile"></i> </div>
                              <?php echo $this->lang->line('car_selected');?>
							</a>							  
                           </li>
                        </ul>
                        <div class="col-md-12">
                        
                         
                              <?php foreach($cabs as $r) { ?>
                              <div class="col-md-4">
                                 <div class="car-sel-bx" style="width:80% !important;">
                                     <div class='fleets_head'><h3><?php echo $r->name;?></h3></div>
                                    <img src="http://navetteo.fr/uploads/vehicle_images/<?php echo $r->image?>" style="width:150px"/>
                                    <ul class="peoples">
                                       <li class="people-icon">(<?php echo $r->passengers_capacity;?>)</li>
                                       <li class="suitcase-icon">(<?php echo $r->large_luggage_capacity;?>)</li>
                                       <li class="bag-icon last">(<?php echo $r->small_luggage_capacity;?>)</li>
                                    </ul>
                                    <input type="hidden" name="radiog_dark" value="<?php echo $r->id;?>" id="cab_<?php echo $r->id;?>">  
                                 </div>
                              </div>
                              <?php } ?>
                         
                        </div>
                     </div>
                  </div>
                  <div class="wait-time">
                        <div class="online-con">
                           <div class="col-md-6">
                              <div class="total-journey">
                                  <div class="row">
                                      <div class="col-md-12">
                                          <i class="fa fa-clock-o"></i> <?php echo $this->lang->line('packge_details');?><?php echo $this->lang->line('type');?>: &nbsp;<strong> <?php echo $package_details->name; ?></strong>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-12">
                                        <i class="fa fa-clock-o"></i> <?php echo $this->lang->line('total_time');?>(<?php echo $this->lang->line('hours');?>): &nbsp;<strong><?php echo $package_details->hours; ?></strong>
                                      </div>
                                  </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="total-cost">
                                  <div class="row">
                                        <div class="col-md-6" style="text-align: left;padding-left:50px;">
                                            <i class="fa fa-money"></i> <?php echo $this->lang->line('package_details');?> 
                                        </div>
                                      <div class="col-md-6" style="text-align: left;padding-left:50px;">
                                          <?php echo $this->lang->line('package_cost');?>: &nbsp;<strong><?php echo $package_details->min_cost; ?></strong>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-6">
                                          <?php echo $this->lang->line('extra_distance');?>(<?php echo $this->lang->line('per_km');?>): &nbsp;<strong><?php echo $package_details->charge_distance; ?></strong>
                                      </div>
                                      <div class="col-md-6">
                                          <?php echo $this->lang->line('extra_time');?>(<?php echo $this->lang->line('in_hours');?>): &nbsp;<strong><?php echo $package_details->charge_hour; ?></strong>
                                      </div>
                                  </div>   
                              </div>
                           </div>
                            <button type="submit" class="button green_button left" style="position:relative;display:inline-block;margin-left:325px;"><?php echo $this->lang->line('personal_details');?><i class="fa fa-arrow-circle-o-right"></i> </button> 
                        </div>
                     </div>
               </div>
            </div>
         </div>
         <div class="col-md-3">
            <?php $this->load->view('site/common/instructions'); ?>
         </div>
      </div>
   </div>
</div>
</div>
<?php echo form_close();?>
<script type="text/javascript"> 
   (function($,W,D)
   {
      var JQUERY4U = {};
   
      JQUERY4U.UTIL =
      {
          setupFormValidation: function()
          {
              //Additional Methods			
   
   
   
   		
   		//form validation rules
              $("#online_package_booking_form").validate({
                  rules: {
   			pick_up: {
   				required: true
   			}
                  },
   			
   			messages: {
   		pick_up: {
   				required: "pick up location required."
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
<script src="http://maps.googleapis.com/maps/api/js?libraries=places"></script><!-- ?sensor=true&amp;libraries=places&amp;sensor=false // Removed Sara -->
<script src="<?php echo base_url(); ?>assets/system_design/scripts/jquery.geocomplete.js"></script>
<script>
   $(document).ready(function(){
   	$( "#dtpicker" ).datepicker({dateFormat:"<?php echo strtolower($date_elem1); ?>-<?php echo strtolower($date_elem2); ?>-yy"});
   	  $(".location").geocomplete({
             country: '<?php echo $site_settings->site_country;?>'
           });
   });
</script>