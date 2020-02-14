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
         <div class="col-md-8">
            <div class="left-side-cont">
               <div class="col-md-12 padding-p-0">
                  <div class="bcp">
                        <ul class='nav nav-wizard'>
                            <li class='active'><span class="steps">1</span><a><?php echo $this->lang->line('journey_details'); ?></a></li>
                            <li class='active'><span class="steps">2</span><a><?php echo $this->lang->line('passenger_details'); ?></a></li>
                            <li><span class="steps">3</span><a><?php echo $this->lang->line('payment_details'); ?></a></li>
                        </ul>
                    <!-- <div class="business-us">
                        <div class="busi-cercle active">
                           <center> <?php echo $this->lang->line('journey_details');?></center>
                        </div>
                     </div>
                     <div class="arrow"> </div>
                     <div class="business-us">
                        <div class="busi-cercle">
                           <center> <?php echo $this->lang->line('passengers_details');?> </center>
                        </div>
                     </div>
                     <div class="arrow arrow1"> </div>
                     <div class="business-us">
                        <div class="busi-cercle">
                           <center> <?php echo $this->lang->line('booking_confirmation');?> </center>
                        </div>
                     </div>-->
                  </div>
                  <div class="online">
                     <ul class="nav nav-tabs on-bo-he te-co" role="tablist">
                        <li role="presentation">
                           <a href="#home" aria-controls="home" role="tab" data-toggle="tab">
                              <div class="on-bo-he-j"><i class="fa fa-send"></i> </div>
                              <?php echo $this->lang->line('online_booking');?>   
                           </a>
                        </li>
                        <li role="presentation">
                           <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
                              <div class="on-bo-he-j"><i class="fa fa-plane"></i> </div>
                              <?php echo $this->lang->line('plane');?>  
                           </a>
                        </li>
                        <small class="on-smhed"> ( <?php echo $this->lang->line('enter_your_pickup_and_destination_details');?> ) </small>
                     </ul>
                     <!-- Tab panes -->
                     <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                           <div class="online-con">
                              <div class="col-md-6">
                                 <label> <?php echo $this->lang->line('pick_up_location');?> </label>
                                 <input type="text"  placeholder="Warangal, Hyderabad, Telangana" class="location">
                              </div>
                              <div class="col-md-6">
                                 <label> <?php echo $this->lang->line('drop_of_location');?></label>
                                 <input type="text"  placeholder="Warangal, Hyderabad, Telangana" class="location">
                              </div>
                           </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="profile">
                           <div class="online-con">
                              <div class="col-md-6">
                                 <input type="radio" name="radiog_dark" id="radio3" class="css-checkbox css-label" />
                                 <label for="radio3" class="css-label">Some of Text</label>
                              </div>
                              <div class="col-md-6">
                                 <input type="radio" name="radiog_dark" id="radio5" class="css-checkbox css-label" />
                                 <label for="radio5" class="css-label">Some of Text</label>
                              </div>
                              <div class="col-md-6">
                                 <label> <?php echo $this->lang->line('pick_up_location');?> </label>
                                 <input type="text"  placeholder="Warangal, Hyderabad, Telangana" class="location">
                              </div>
                              <div class="col-md-6">  
                                 <label> <?php echo $this->lang->line('drop_of_location');?> </label>
                                 <input type="text"  placeholder="Warangal, Hyderabad, Telangana" class="location">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="online-cars">
                     <ul class="nav nav-tabs on-bo-he">
                        <li>
                           <div class="on-bo-heddings"><i class="fa fa-automobile"></i> </div>
                           <?php echo $this->lang->line('select_your_car');?>    
                        </li>
                        <small class="on-smhed"> ( <?php echo $this->lang->line('select_the_car_that_suits_to_your_requirement');?>  ) </small>
                     </ul>
                     <div class="col-md-4">
                        <div class="car-sel-bx active">
                           <h3><?php echo $this->lang->line('saloon');?></h3>
                           <ul class="peoples">
                              <li class="people-icon active">(4)</li>
                              <li class="suitcase-icon active">(1)</li>
                              <li class="bag-icon last active">(1)</li>
                           </ul>
                           <div class="select-radio">
                              <input type="radio" name="radiog_dark" id="radio6" class="css-checkbox carse-label" >  
                              <label for="radio6" class="carse-label">Some of Text</label>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="car-sel-bx">
                           <h3><?php echo $this->lang->line('estate');?></h3>
                           <ul class="peoples clearfix">
                              <li class="people-icon">(4)</li>
                              <li class="suitcase-icon">(1)</li>
                              <li class="bag-icon last">(1)</li>
                           </ul>
                           <div class="select-radio">
                              <input type="radio" name="radiog_dark" id="radio7" class="css-checkbox carse-label" >  
                              <label for="radio7" class="carse-label">Some of Text</label>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="car-sel-bx">
                           <h3><?php echo $this->lang->line('estate');?></h3>
                           <ul class="peoples clearfix">
                              <li class="people-icon">(4)</li>
                              <li class="suitcase-icon">(1)</li>
                              <li class="bag-icon last">(1)</li>
                           </ul>
                           <div class="select-radio">
                              <input type="radio" name="radiog_dark" id="radio8" class="css-checkbox carse-label" >  
                              <label for="radio8" class="carse-label">Some of Text</label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="date-time">
                     <ul class="nav nav-tabs on-bo-he">
                        <li>
                           <div class="on-bo-heddings"><i class="fa fa-calendar"></i> </div>
                           <?php echo $this->lang->line('date_time');?>    
                        </li>
                        <small class="on-smhed"> (<?php echo $this->lang->line('click_and_select_the_date_and_time_you_would_like_to_be_picked_up');?>  ) </small>
                     </ul>
                     <div class="online-con">
                        <div class="col-md-6">
                           <label> <?php echo $this->lang->line('select_date');?> : * </label>
                           <input type="text"  placeholder="Warangal, Hyderabad, Telangana" class="date">
                        </div>
                        <div class="col-md-6">
                           <label><?php echo $this->lang->line('select_time');?>  :* </label>
                           <input type="text"  placeholder="Warangal, Hyderabad, Telangana" class="time">
                        </div>
                     </div>
                  </div>
                  <div class="wait-time">
                     <ul class="nav nav-tabs on-bo-he">
                        <li class="wait-top"> 
                           <input name="waitnReturn" id="waitnReturn" value="no" type="checkbox" class="css-checkbox css-label-chcss-label-ch" >  
                           <label for="waitnReturn" class="css-label-ch"><?php echo $this->lang->line('wait_and_return_journey_required');?></label>
                        </li>
                        <small class="wt-text" id="waitingTimeDiv" style="display: none;">
                           <?php echo $this->lang->line('waiting_time');?>
                           <select id="waitingTime" name="waitingTime" class="wt-text">
                              <option selected="selected" value="15 Min_0.00">15 Min (+ �0.00)</option>
                              <option value="30 Min_10.00">30 Min (+ �10.00)</option>
                              <option value="45 Min_15.00">45 Min (+ �15.00)</option>
                              <option value="01 Hr_20.00">01 Hr (+ �20.00)</option>
                           </select>
                        </small>
                     </ul>
                     <div class="online-con">
                        <div class="col-md-12">
                           <label> <?php echo $this->lang->line('instruction_to_driver');?>: </label>
                           <input type="text"  placeholder="Warangal, Hyderabad, Telangana" >
                        </div>
                        <div class="col-md-6">
                           <div class="total-journey"> <i class="fa fa-clock-o"></i> <?php echo $this->lang->line('total_journey_time');?>
                              0 Miles | 0.0 Mins 
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="total-cost"><i class="fa fa-money"></i> <?php echo $this->lang->line('total_cost');?>
                              �0.00
                           </div>
                        </div>
                        <button type="button" class="naxt"><?php echo $this->lang->line('next_your_details');?> <i class="fa fa-arrow-circle-o-right"></i> </button> 
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-4">
            <div class="right-side-cont"> <?php echo $this->lang->line('left_side_elements');?> </div>
         </div>
      </div>
   </div>
</div>