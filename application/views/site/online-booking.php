</header>
<?php $locale_info = localeconv(); 
$amount = 0;?>
<style>
    .bcp {
        margin:-22px 0 11px !important;
    }
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
<div class="container-fluid body-bg">
   <div class="container body-border"> <!-- padding-p-0 -->
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
      <div class=""><!--row-->
         <div class=""><!--col-md-12-->
            <?php 
               $attributes = array("name" => 'online_booking_form', "id" => 'online_booking_form');
               echo form_open("welcome/passengerDetails",$attributes); ?> 
            <div class="left-side-cont">
               <div class="col-md-12 padding-p-0">
               </div>
               <div class="bcp">
                   <ul class='nav nav-wizard'>
                       <li class='active'><span class="steps">1</span><a><?php echo $this->lang->line('journey_details'); ?></a></li>
                        <li><span class="steps">2</span><a><?php echo $this->lang->line('identification'); ?></a></li>
                        <li><span class="steps">3</span><a><?php echo $this->lang->line('quote'); ?></a></li>
                        <li><span class="steps">4</span><a><?php echo $this->lang->line('payment_details'); ?></a></li>
                  </ul>
                  <!--<div class="business-us">
                     <div class="busi-cercle active"> 
                     </div>
                     <center> <?php echo $this->lang->line('journey_details');?></center>
                  </div>
                  <div class="business-us">
                     <div class="busi-cercle"> 
                     </div>
                     <center><?php echo $this->lang->line('passenger_details');?> </center>
                  </div>
                  <div class="business-us">
                     <div class="busi-cercle"> 
                     </div>
                     <center><?php echo $this->lang->line('payment_details');?></center>
                  </div>-->
               </div>
                <!-- new code end-->
                <div class="book_journey">
                    <div class="col-md-3 width-15p">
                        <select name="category" id="category" class="grad-bg select-width-130pc">
                            <option value=""><?php echo $this->lang->line('category');?></option>
                            <option value="airports">Transfert Aeroport</option>
                            <option value="stations">Transfert Gares</option>
                            <option value="parks">Transfert Parcs</option>
                        </select>
                    </div>
                    <div class="col-md-3 width-15p">
                        <select name="services" id="services" class="grad-bg select-width-130pc" style="margin-left:10px;">
                            <option value=""><?php echo $this->lang->line('services');?></option>
                        </select>
                    </div>
                     <div class="col-md-3 width-15p">
                        <select name="journey" id="journey" class="grad-bg select-width-100pc" style="margin-left:20px;">
                            <option value="one-time"><?php echo $this->lang->line('one_time');?></option>
                            <option value="regular"><?php echo $this->lang->line('regular');?></option>
                        </select>
                    </div>
                    <div class="col-md-3 width-15p">
                        <select name="journey_type" id="journey_type" class="grad-bg" style="margin-left:30px;">
                            <option value="one-way"><?php echo $this->lang->line('one_way');?></option>
                            <option value="go-back"><?php echo $this->lang->line('go_back');?></option>
                        </select>
                    </div>
                </div>
               <div class="date-time">
                  <ul class="nav nav-tabs on-bo-he">
                     <li>
                        <a data-toggle="tab" role="tab" aria-controls="home" href="#home">
                           <div class="on-bo-heddings"><i class="fa fa-calendar"></i> </div>
                           <?php echo $this->lang->line('date_time');?> 
                        </a>
                     </li>
                     <!--<small class="on-smhed"> ( <?php // echo $this->lang->line('click_and_select_the_date_and_time_you_would_like_to_be_picked_up');?> ) </small>-->
                  </ul>
                  <div class="online-con">
                      <div>
                        <div class="col-md-2">
                           <label> <?php echo $this->lang->line('start_date');?>* : </label>
                           <!--<input data-beatpicker="true" class="dte"  type="text" value="<?php echo date($date_format,time()+86400);echo set_value('pick_date');?>" name="pick_date" placeholder="<?php echo $this->lang->line('pick_up_date');?>" data-beatpicker-disable="{from:[100,1,1],to:[<?php echo date('Y, n, d');?>]}" data-beatpicker-format="['<?php echo $date_elem1;?>','<?php echo $date_elem2;?>','<?php echo $date_elem3;?>'],separator:'<?php echo $seperator;?>'" style="width:76% !important;" />-->
                           <input id="dtpicker" class="dte"  type="text" value="<?php echo date($date_format,time()+86400);echo set_value('pick_date');?>" name="pick_date" placeholder="<?php echo $this->lang->line('pick_up_date');?>" style="width:55% !important;margin-left:1px;" />
                           <?php echo form_error('pick_date');?>
                        </div>
                          <div class="col-md-2" style="margin-left:-30px">
                           <label><?php echo $this->lang->line('start_time');?>* : </label>
                           <input type="text" id="timepicker1" name="pick_time" value="<?php echo date("h : i"); ?>" style="height:36px;width:40%;background:linear-gradient(to bottom, rgb(222, 215, 215) 0%,rgba(255,255,255,1) 49%,rgb(224, 222, 222) 100%);">
                        </div>
                        <div id="dropOfWrapper" style="display:none">
                            <div class="col-md-2">
                                <?php //echo "Yo Boy..:".$settings->date_formats;// $dt="[".date('Y, m, d')."]"; echo "Yo boy: ".$dt;  ?>
                                <label style="font-size:13px;"> <?php echo $this->lang->line('end_date'); ?> </label>
                                <!--<input data-beatpicker="true" class="dte"  type="text" value="<?php echo date($date_format, time() + 86400); ?>" name="pick_date" data-beatpicker-disable="{from:[100,1,1],to:[<?php echo date('Y, n, d'); ?>]}" data-beatpicker-format="['<?php echo $date_elem1; ?>','<?php echo $date_elem2; ?>','<?php echo $date_elem3; ?>'],separator:'<?php echo $seperator; ?>'"  style="width:75%" />-->
                                <input id="dtpicker1" class="dte"  type="text" value="<?php echo date($date_format,time()+86400);echo set_value('drop_date');?>" name="drop_date" placeholder="<?php echo $this->lang->line('pick_up_date');?>" style="width:55% !important;margin-left:-1px" />
                            </div>
                            <div class="col-md-2" style="margin-left:-30px;">
                                <label style="font-size:13px;"><?php echo $this->lang->line('end_time'); ?></label>
                                <input  id="timepicker2" name="drop_time" type="text" value="<?php echo date("h : i"); ?>" style="height:36px;width: 40%;background:linear-gradient(to bottom, rgb(222, 215, 215) 0%,rgba(255,255,255,1) 49%,rgb(224, 222, 222) 100%);" />
                            </div>  
                        </div>
                    </div>
                  </div>
               </div>
                
                <!--<div id="booking_options">
                    <div class="col-md-2" >
                        <label><?php // echo $this->lang->line('passengers') ?></label>
                        <select name="no_passenger" id="no_passenger" class="valid select-width-30">
                            <option valu="1">1</option>
                            <option valu="2">2</option>
                            <option valu="3">3</option>
                            <option valu="4">4</option>
                            <option valu="5">5</option>
                            <option valu="6">6</option>
                            <option valu="7">7</option>
                            <option valu="8">8</option>
                            <option valu="9">9</option>
                            <option valu="10">10</option>
                        </select>
                    </div>
                    <div class="col-md-2" style="margin-left:-100px">
                        <label><?php // echo $this->lang->line('luggages') ?></label>
                        <select name="no_luggage" id="no_luggage" class="valid select-width-30">
                            <option valu="1">1</option>
                            <option valu="2">2</option>
                            <option valu="3">3</option>
                            <option valu="4">4</option>
                            <option valu="5">5</option>
                            <option valu="6">6</option>
                            <option valu="7">7</option>
                            <option valu="8">8</option>
                            <option valu="9">9</option>
                            <option valu="10">10</option>
                        </select>
                    </div>
                    <div class="col-md-2" style="margin-left:-100px">
                        <label><?php // echo $this->lang->line('baby_seat') ?></label>
                        <select name="baby_seat" id="baby_seat" class="valid select-width-30">
                            <option valu="0">0</option>
                            <option valu="1">1</option>
                            <option valu="2">2</option>
                            <option valu="3">3</option>
                        </select>
                    </div>
                    <div class="col-md-2" style="margin-left:-100px">
                        <label><?php // echo $this->lang->line('wheelchair') ?></label>
                        <select name="wheel_chair" id="wheel_chair" class="valid select-width-30">
                            <option valu="0">0</option>
                            <option valu="1">1</option>
                            <option valu="2">2</option>
                            <option valu="3">3</option>
                            <option valu="4">4</option>
                            <option valu="5">5</option>
                            <option valu="6">6</option>
                            <option valu="7">7</option>
                            <option valu="8">8</option>
                            <option valu="9">9</option>
                            <option valu="10">10</option>
                        </select>
                    </div>
                </div>-->
                <div class="" id="waitingTimeDiv" style="display: none;">
                     <input type="hidden" value="No" name="return_journey" id="return_journey"/>
                     <input type="hidden" name="waitingTime" id="waitingTime" value="No Waiting"/>
                     <input type="hidden" name="waitingCost" id="waitingCost" value="0"/>
                     <input type="hidden" name="package_type" id="package_type" value="-"/>
                     <input type="hidden" name="booking_ref" value="<?php echo date('ymdHis'); ?>"/>
                </div>                
                <div class="col-md-12 regular_options">
                    <table cellpadding="0" cellspacing="0" style="width:100%;color:#000;" align="center">
                        <tr>
                            <td style="width:10%;">&nbsp;</td>
                            <td style="width:12.857%;text-align: left;"><?php echo $this->lang->line('monday');?></td>
                            <td style="width:12.857%;text-align: left;"><?php echo $this->lang->line('tuesday');?></td>
                            <td style="width:12.857%;text-align: left;"><?php echo $this->lang->line('wednesday');?></td>
                            <td style="width:12.857%;text-align: left;"><?php echo $this->lang->line('thursday');?></td>
                            <td style="width:12.857%;text-align: left;"><?php echo $this->lang->line('friday');?></td>
                            <td style="width:12.857%;text-align: left;"><?php echo $this->lang->line('saturday');?></td>
                            <td style="width:12.857%;text-align: left;"><?php echo $this->lang->line('sunday');?></td>
                    </table>
                    <table cellpadding="0" cellspacing="0" style="width:100%;color:#000;" align="left">
                        <tr class="go-table">
                            <td style="width:10%;text-align: left;"><?php echo $this->lang->line('go');?></td>
                            <td style="width:12.857%;text-align: left;">
                                <input name="weekdays_go" class="weekdays_go" type="checkbox" value="1">
                                <input  class="wkdays_time_pick grad-bg" id="go_time_1" name="go_time_1" type="text" value="<?php echo date("h : i"); ?>" />
                            </td>
                            <td style="width:12.857%;text-align: left;"><input name="weekdays_go" class="weekdays_go" type="checkbox" value="2">
                                <input  class="wkdays_time_pick grad-bg" id="go_time_2" name="go_time_2" type="text" value="<?php echo date("h : i"); ?>" />
                            </td>
                            <td style="width:12.857%;text-align: left;"><input name="weekdays_go" class="weekdays_go" type="checkbox" value="3">
                                <input  class="wkdays_time_pick grad-bg" id="go_time_3" name="go_time_3" type="text" value="<?php echo date("h : i"); ?>"  />
                            </td>
                            <td style="width:12.857%;text-align: left;"><input name="weekdays_go" class="weekdays_go" type="checkbox" value="4">
                                <input  class="wkdays_time_pick grad-bg" id="go_time_4" name="go_time_4" type="text" value="<?php echo date("h : i"); ?>" />
                            </td>
                            <td style="width:12.857%;text-align: left;"><input name="weekdays_go" class="weekdays_go" type="checkbox" value="5">
                                <input  class="wkdays_time_pick grad-bg" id="go_time_5" name="go_time_5" type="text" value="<?php echo date("h : i"); ?>"  />
                            </td>
                            <td style="width:12.857%;text-align: left;"><input name="weekdays_go" class="weekdays_go" type="checkbox" value="6">
                                <input  class="wkdays_time_pick grad-bg" id="go_time_6" name="go_time_6" type="text" value="<?php echo date("h : i"); ?>" />
                            </td>
                            <td style="width:12.857%;text-align: left;"><input name="weekdays_go" class="weekdays_go" type="checkbox" value="7">
                                <input  class="wkdays_time_pick grad-bg" id="go_time_7" name="go_time_7" type="text" value="<?php echo date("h : i"); ?>" />
                            </td>
                        </tr>
                        <tr class="back-table" style="background:transparent;">
                            <td style="width:10%;text-align: left;"><?php echo $this->lang->line('back');?></td>
                            <td style="width:12.857%;">
                                <input name="weekdays_back" class="weekdays_back" type="checkbox" value="1">
                                <input  class="wkdays_time_pick grad-bg" id="back_time_1" name="back_time_1" type="text" value="<?php echo date("h : i"); ?>" />
                            </td>
                            <td style="width:12.857%;text-align: left;">
                                <input name="weekdays_back" class="weekdays_back" type="checkbox" value="2">
                                <input  class="wkdays_time_pick grad-bg" id="back_time_2" name="back_time_2" type="text" value="<?php echo date("h : i"); ?>" />
                            </td>
                            <td style="width:12.857%;text-align: left;">
                                <input name="weekdays_back" class="weekdays_back" type="checkbox" value="3">
                                <input  class="wkdays_time_pick grad-bg" id="back_time_3" name="back_time_3" type="text" value="<?php echo date("h : i"); ?>" />
                            </td>
                            <td style="width:12.857%;text-align: left;">
                                <input name="weekdays_back" class="weekdays_back" type="checkbox" value="4">
                                <input  class="wkdays_time_pick grad-bg" id="back_time_4" name="back_time_4" type="text" value="<?php echo date("h : i"); ?>" />
                            </td>
                            <td style="width:12.857%;text-align: left;">
                                <input name="weekdays_back" class="weekdays_back" type="checkbox" value="5">
                                <input  class="wkdays_time_pick grad-bg" id="back_time_5" name="back_time_5" type="text" value="<?php echo date("h : i"); ?>" />
                            </td>
                            <td style="width:12.857%;text-align: left;">
                                <input name="weekdays_back" class="weekdays_back" type="checkbox" value="6">
                                <input  class="wkdays_time_pick grad-bg" id="back_time_6" name="back_time_6" type="text" value="<?php echo date("h : i"); ?>" />
                            </td>
                            <td style="width:12.857%;text-align: left;">
                                <input name="weekdays_back" class="weekdays_back" type="checkbox" value="7">
                                <input  class="wkdays_time_pick grad-bg" id="back_time_7" name="back_time_7" type="text" value="<?php echo date("h : i"); ?>" />
                            </td>
                        </tr>
                    </table>
                </div>
               <div class="wait-time">
                  <!-- USED JOURNEY_TYPE instead of this field
                    <ul class="nav nav-tabs on-bo-he">
                     <li class="wait-top"> 
                        <input name="waitnReturn"  id="waitnReturn" onclick="waiting(this.data-value);" type="checkbox" class="css-checkbox css-label-chcss-label-ch" >  
                        <label for="waitnReturn" class="css-label-ch"><?php //echo $this->lang->line('wait_and_return_journey_required');?></label>
                     </li>
                     <small > 
                     </small>
                  </ul>-->
               <div class="online">
                  <ul class="nav nav-tabs on-bo-he te-co" role="tablist">
                     <li role="presentation">
                        <a href="#home" aria-controls="home" role="tab" data-toggle="tab">
                           <div class="on-bo-he-j"><i class="fa fa-send"></i> </div>
                           <?php echo $this->lang->line('online_booking');?>   
                        </a>
                     </li>
                     <!--<small class="on-smhed"> (<?php // echo $this->lang->line('enter_your_pickup_and_destination_details');?> ) </small>-->
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                     <div role="tabpanel" class="tab-pane active" id="home">
                        <div class="online-con">
                           <div class="col-md-6">
                               <div class="hand_box">
                                <label> <?php echo $this->lang->line('pick_up_location');?> </label>
                                
                                <i class="fa fa-hand-o-right" style="font-size:25px;color:#000;float:left;margin:8px 0px 0px -5px;"></i>
                                <input type="text"   name="pick_up" id="local_pick" value="<?php echo set_value('pick_up');?>" class="location" placeholder="<?php echo $this->lang->line('type_your_address_here');?>" <?php echo ($this->lang->lang() == 'en') ? 'style="width:78% !important;;margin-left:10px;"' : 'style="width:80% !important;margin-left:10px;"'; ?>>
                                <div id="add_extra_stop" class="<?php echo ($this->lang->lang() == 'fr') ? 'extra-stop-fr':'extra-stop-en'?>"><a class="plus add-location"><img src="<?php echo base_url(); ?>assets/system_design/images/add.png"/></a><?php echo $this->lang->line('add_extra_stop');?></div>
                                <?php echo form_error('pick_up');?>
                                <!-- For Airports -->
                                <select name="pick_up" class="airlocation grad-bg" id="airport_pick" disabled="true"  style="display: none;width:94%;margin-left:10px;">
                                    <option value=""><?php echo $this->lang->line('drop2_airport_label');?></option>
                                    <?php if(isset($airports) && count($airports)>0)
                                       foreach($airports as $airport):
                                       ?>
                                    <option value="<?php echo $airport->id; ?>"><?php echo $airport->airport_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <select name="pick_up" class="trainlocation grad-bg" id="train_pick" disabled="true"  style="display: none;float:right;width:95%;margin-right:-10px;">
                                    <option value=""><?php echo $this->lang->line('drop2_train_label');?></option>
                                    <?php
                                            if (isset($stations) && count($stations) > 0)
                                                foreach ($stations as $station):
                                                    ?>
                                                    <option value="<?php echo $station->id; ?>"><?php echo $station->station_name; ?></option>
                                                <?php endforeach; ?>
                                </select>
                                <select name="pick_up" class="hotellocation grad-bg" id="hotel_pick" disabled="true"  style="display: none;float:right;width:95%;margin-right:-10px;">
                                    <option value=""><?php echo $this->lang->line('drop2_hotel_label');?></option>
                                    <?php
                                            if (isset($hotels) && count($hotels) > 0)
                                                foreach ($hotels as $hotel):
                                                    ?>
                                                    <option value="<?php echo $hotel->id; ?>"><?php echo $hotel->hotel_name; ?></option>
                                                <?php endforeach; ?>
                                </select>
                                <select name="pick_up" class="parklocation grad-bg" id="park_pick" disabled="true"  style="display: none;float:right;width:95%;margin-right:-10px;">
                                    <option value=""><?php echo $this->lang->line('drop2_park_label');?></option>
                                    <?php
                                            if (isset($parks) && count($parks) > 0)
                                                foreach ($parks as $park):
                                                    ?>
                                                    <option value="<?php echo $park->id; ?>"><?php echo $park->park_name; ?></option>
                                                <?php endforeach; ?>
                                </select>
                                <input type="hidden" id="pick_type" name="pick_type" value="L"/>
                                <br><br>
                                <?php 
                                                            if(count($airports)>0)
                                                            if(isset($site_settings->airports_status) && $site_settings->airports_status=='Enable') { ?>
                                <div class="other-services">
                                   <a href="javascript:void(0)" class="ilike" id="pick_airport_link" data-value="pick_airport">
                                      <div class="air-car"><i class="fa fa-plane"></i> </div>
                                      <?php echo $this->lang->line('airport');?> 
                                   </a>
                                   <a href="javascript:void(0)" class="ilike" style="margin-left:6px; display: none;" id="pick_local_link"  data-value="pick_local">
                                      <div class="air-car"><i class="fa fa-map-marker"></i> </div>
                                      <?php echo $this->lang->line('local_address');?>
                                   </a>
                                    <a href="javascript:void(0)" class="ilike" id="pick_train_link" data-value="pick_train">
                                        <div class="train-car"><i class="fa fa-train"></i> </div>
                                        <?php echo $this->lang->line('train'); ?> 
                                    </a>
                                    <a href="javascript:void(0)" class="ilike" id="pick_hotel_link" data-value="pick_hotel">
                                        <div class="hotel-car" ><i class="fa fa-hotel"></i> </div>
                                        <?php echo $this->lang->line('hotel'); ?>
                                    </a>
                                    <a href="javascript:void(0)" class="ilike" id="pick_park_link" data-value="pick_park">
                                        <div class="park-car" ><i class="fa fa-tree"></i> </div>
                                        <?php echo $this->lang->line('park'); ?> 
                                    </a>
                                </div>
                                <?php } ?>
                               </div>
                           </div>
                        </div>
                        <div class="online-con drop_of_location_div_2"> 
                            <div class="col-md-6">
                                <div class="hand_box">
                                    <label> <?php echo $this->lang->line('extra_stop_label');?> </label>
                                    <!--<label class="drop2_address_label"> <?php echo $this->lang->line('drop2_address_label');?> </label>
                                    <label class="drop2_airport_label"> <?php echo $this->lang->line('drop2_airport_label');?> </label>
                                    <label class="drop2_train_label"> <?php echo $this->lang->line('drop2_train_label');?> </label>
                                    <label class="drop2_hotel_label"> <?php echo $this->lang->line('drop2_hotel_label');?> </label>
                                    <label class="drop2_park_label"> <?php echo $this->lang->line('drop2_park_label');?> </label>-->
                                    <i class="fa fa-hand-o-right" style="font-size:25px;color:#000;float:left;margin:8px 0px 0px -5px;"></i>
                                    <input type="text"  placeholder="<?php echo $this->lang->line('type_ur_address'); ?>" class="location drop_of_txtbox" id="local_drop_2" alt="general_booking" name="drop_of_waypoint" <?php echo ($this->lang->lang() == 'en') ? 'style="width:78% !important;;margin-left:10px;"' : 'style="width:80% !important;margin-left:10px;"'; ?>>
                                    <!--<img src="<?php echo base_url(); ?>assets/system_design/images/remove.png" class="remove-location" id="drop_of_location_div_2" />-->
                                    <div id="remove_extra_stop" class="<?php echo ($this->lang->lang() == 'fr') ? 'remove-extra-stop-fr':'remove-extra-stop-en'?>" <?php echo ($this->lang->lang() == 'fr') ? 'style="top:43px;right:-30px;color:#000;"': 'style="top:43px;right:-30px;color:#000;"';?>><a class="minus remove-location" id="drop_of_location_div_2"><img src="<?php echo base_url(); ?>assets/system_design/images/remove.png"/></a><?php echo $this->lang->line('remove_extra_stop');?></div><div class="clear"></div>

                                    <select name="drop_of_waypoint" class="airlocation grad-bg" id="airport_drop_2"  style="display: none;float:right;width:95%;margin-right:-10px;" disabled="true">
                                        <option value=""><?php echo $this->lang->line('drop2_airport_label');?></option>
                                        <?php

                                        if (isset($airports) && count($airports) > 0)
                                            foreach ($airports as $airport):
                                                ?>
                                                <option value="<?php echo $airport->address; ?>"><?php echo $airport->airport_name; ?></option>
                                            <?php endforeach; ?>
                                    </select> 
                                    <div id="airport_drop_flight_2">
                                        <input id="dropof_flight_no_2" class="dropof_flight_no grad-bg" type="text" value="" name="dropof_flight_no" placeholder="Flight No" />
                                        <input  class="grad-bg dropof_flight_time" id="timepicker_drop_fly_2" name="dropof_flight_time" type="text" value="<?php echo date("h : i"); ?>" />
                                    </div>
                                    <select name="drop_of_waypoint" class="trainlocation grad-bg" id="train_drop_2" disabled="true"  style="display: none;float:right;width:95%;margin-right:-10px;">
                                        <option value=""><?php echo $this->lang->line('drop2_train_label');?></option>
                                        <?php
                                        if (isset($stations) && count($stations) > 0)
                                            foreach ($stations as $station):
                                                ?>
                                                <option value="<?php echo $station->address; ?>"><?php echo $station->station_name; ?></option>
                                            <?php endforeach; ?>
                                    </select>
                                    <div id="station_drop_train_2">
                                        <input id="dropof_train_no" class="dropof_train_no grad-bg" type="text" value="" name="dropof_train_no" placeholder="Train No" />
                                        <input  class="grad-bg dropof_train_time" id="timepicker_drop_stn" name="dropof_train_time" type="text" value="<?php echo date("h : i"); ?>" />
                                    </div>
                                    <select name="drop_of_waypoint" class="hotellocation grad-bg" id="hotel_drop_2" disabled="true"  style="display: none;float:right;width:95%;margin-right:-10px;">
                                        <option value=""><?php echo $this->lang->line('drop2_hotel_label');?></option>
                                        <?php
                                        if (isset($hotels) && count($hotels) > 0)
                                            foreach ($hotels as $hotel):
                                                ?>
                                                <option value="<?php echo $hotel->address; ?>"><?php echo $hotel->hotel_name; ?></option>
                                            <?php endforeach; ?>
                                    </select>
                                    <select name="drop_of_waypoint" class="parklocation grad-bg" id="park_drop_2" disabled="true"  style="display: none;float:right;width:95%;margin-right:-10px;">
                                        <option value=""><?php echo $this->lang->line('drop2_park_label');?></option>
                                        <?php
                                        if (isset($parks) && count($parks) > 0)
                                            foreach ($parks as $park):
                                                ?>
                                                <option value="<?php echo $park->address; ?>"><?php echo $park->park_name; ?></option>
                                            <?php endforeach; ?>
                                    </select>
                                    <input type="hidden" id="drop_type_2" name="drop_type" value="L"/>
                                  
                                    <div class="clearfix"></div>
                                    <?php
                                    if (count($airports) > 0)
                                        if (isset($site_settings->airports_status) && $site_settings->airports_status == 'Enable') {
                                            ?>
                                            <div class="other-services">
                                                <a href="javascript:void(0)" id="drop_airport_link_2" class="ilike" data-arry="2"  data-value="drop_airport" > <!--style="line-height:25px;"-->
                                                    <div class="air-car" ><i class="fa fa-plane"></i> </div> <!--style="margin-top:-5px;"-->
                                                    <span><?php echo $this->lang->line('airport'); ?> </span>
                                                </a>
                                                <a href="javascript:void(0)" class="ilike" style="display: none;margin-left:8px;" id="drop_local_link_2" data-arry="2" data-value="drop_local" ><!--style="line-height:25px;"-->
                                                    <div class="air-car" ><i class="fa fa-map-marker"></i> </div> <!--style="margin-top:10px;"-->
                                                    <span><?php echo $this->lang->line('local_address'); ?></span>
                                                </a>
                                                <a href="javascript:void(0)" class="ilike" id="drop_train_link_2" data-arry="2" data-value="drop_train" > <!--style="line-height:25px;"-->
                                                    <div class="train-car" ><i class="fa fa-train"></i> </div> <!--style="margin-top:-5px;"-->
                                                    <span><?php echo $this->lang->line('train'); ?></span> 
                                                </a>
                                                <a href="javascript:void(0)" class="ilike" id="drop_hotel_link_2" data-arry="2" data-value="drop_hotel" > <!--style="line-height:25px;"-->
                                                    <div class="hotel-car" ><i class="fa fa-hotel"></i> </div> <!--style="margin-top:-5px;"-->
                                                    <span><?php echo $this->lang->line('hotel'); ?></span> 
                                                </a>
                                                <a href="javascript:void(0)" class="ilike" id="drop_park_link_2" data-arry="2" data-value="drop_park" > <!--style="line-height:25px;"-->
                                                    <div class="park-car" ><i class="fa fa-tree"></i> </div> <!--style="margin-top:-5px;"-->
                                                    <span><?php echo $this->lang->line('park'); ?></span> 
                                                </a>
                                                <?php if ($site_settings->waiting_time == "Enable") { ?>
                                                    <div class="col-md-3 <?php echo ($this->lang->lang() == 'en') ? 'waiting_time_div_en' : 'waiting_time_div_fr'; ?>" style="width: 45%;top: 10px;right: -154px;" >
                                                        <div class="control"></div>
                                                        <!--<label class="waiting_time" style="font-size:11px;"> <?php echo $this->lang->line('waiting_time'); ?> </label>-->
                                                        <?php echo form_dropdown('waiting_time', $waiting_options, '', 'id="waiting_time_2" class="waiting_time grad-bg"  '); ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                </div>      
                            </div>
                            </div>
                             <div class="online-con"> 
                           <div class="col-md-6 drop_of_location_div_1">
                               <div class="hand_box">
                                    <label> <?php echo $this->lang->line('drop_of_location');?> </label>
                                    <i class="fa fa-hand-o-right" style="font-size:25px;color:#000;float:left;margin:8px 0px 0px -5px;"></i>
                                    <input type="text" id="local_drop_1"  placeholder="<?php echo $this->lang->line('type_your_address_here');?>" name="drop_of" class="location" alt="booking_page" value="<?php echo set_value('drop_of');?>"  <?php echo ($this->lang->lang() == 'en') ? 'style="width:78%;margin-left:10px;"' : 'style="width:80%;margin-left:10px;"'; ?>>
                                    <?php echo form_error('drop_of');?>
                                    <select name="drop_of" class="airlocation grad-bg" id="airport_drop_1" style="display: none; width:94%;margin-left:10px;" disabled="true">
                                         <option value=""><?php echo $this->lang->line('drop2_airport_label');?></option>
                                       <?php if(isset($airports) && count($airports)>0)
                                          foreach($airports as $airport):
                                          ?>
                                       <option value="<?php echo $airport->id; ?>"><?php echo $airport->airport_name; ?></option>
                                       <?php endforeach; ?>
                                    </select>
                                      <select name="drop_of" class="trainlocation grad-bg" id="train_drop_1" disabled="true"  style="display: none;float:right;width:95%;margin-right:-10px;">
                                          <option value=""><?php echo $this->lang->line('drop2_train_label');?></option>
                                          <?php
                                                  if (isset($stations) && count($stations) > 0)
                                                      foreach ($stations as $station):
                                                          ?>
                                                          <option value="<?php echo $station->id; ?>"><?php echo $station->station_name; ?></option>
                                                      <?php endforeach; ?>
                                      </select>
                                      <select name="drop_of" class="hotellocation grad-bg" id="hotel_drop_1" disabled="true"  style="display: none;float:right;width:95%;margin-right:-10px;">
                                          <option value=""><?php echo $this->lang->line('drop2_hotel_label');?></option>
                                          <?php
                                                  if (isset($hotels) && count($hotels) > 0)
                                                      foreach ($hotels as $hotel):
                                                          ?>
                                                          <option value="<?php echo $hotel->id; ?>"><?php echo $hotel->hotel_name; ?></option>
                                                      <?php endforeach; ?>
                                      </select>
                                      <select name="drop_of" class="parklocation grad-bg" id="park_drop_1" disabled="true"  style="display: none;float:right;width:95%;margin-right:-10px;">
                                          <option value=""><?php echo $this->lang->line('drop2_park_label');?></option>
                                          <?php
                                                  if (isset($parks) && count($parks) > 0)
                                                      foreach ($parks as $park):
                                                          ?>
                                                          <option value="<?php echo $park->id; ?>"><?php echo $park->park_name; ?></option>
                                                      <?php endforeach; ?>
                                      </select>
                                    <input type="hidden" id="drop_type_1" name="drop_type" value="L"/>
                                    <br><br>
                                    <?php 
                                          if(count($airports)>0)
                                          if(isset($site_settings->airports_status) && $site_settings->airports_status=='Enable') { ?>
                                    <div class="other-services">
                                       <a href="javascript:void(0)" id="drop_airport_link_1" class="ilike" data-arry="1" data-value="drop_airport">
                                          <div class="air-car"><i class="fa fa-plane"></i> </div>
                                          <?php echo $this->lang->line('airport');?> 
                                       </a>
                                       <a href="javascript:void(0)" class="ilike" style="margin-left:6px; display: none;" id="drop_local_link_1" data-arry="1" data-value="drop_local">
                                          <div class="air-car"><i class="fa fa-map-marker"></i> </div>
                                          <?php echo $this->lang->line('local_address');?>
                                       </a>
                                      <a href="javascript:void(0)" class="ilike" id="drop_train_link_1" data-arry="1" data-value="drop_train">
                                          <div class="train-car" ><i class="fa fa-train"></i> </div>
                                          <?php echo $this->lang->line('train'); ?>
                                      </a>
                                      <a href="javascript:void(0)" class="ilike" id="drop_hotel_link_1" data-arry="1" data-value="drop_hotel">
                                          <div class="hotel-car" ><i class="fa fa-hotel"></i> </div>
                                          <?php echo $this->lang->line('hotel'); ?>
                                      </a>
                                      <a href="javascript:void(0)" class="ilike" id="drop_park_link_1" data-arry="1" data-value="drop_park">
                                          <div class="park-car" ><i class="fa fa-tree"></i> </div>
                                          <?php echo $this->lang->line('park'); ?>
                                      </a>  
                                        
                                        <?php if ($site_settings->waiting_time == "Enable") { ?>
                                            <div class="col-md-3 <?php echo ($this->lang->lang() == 'en') ? 'waiting_time_div_en' : 'waiting_time_div_fr'; ?>" style="width: 45%;top: 10px;right: -154px;" >
                                                <div class="control"></div>
                                                <!--<label class="waiting_time" style="font-size:11px;"> <?php echo $this->lang->line('waiting_time'); ?> </label>-->
                                                 <?php 
                                                    $js = 'id="waiting_time_1" class="waiting_time grad-bg valid" onChange="doWaiting();"';
                                               ?>
                                                <?php echo form_dropdown('waiting_time', $waiting_options, '', $js); ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            
                        </div>
                     </div>
                  </div>
               </div>
                <!-- NOT REQUIRED IN ONLINE BOOKING PAGE Move to QUOTE PAGE -->
                <!--<div class="map-wrapper">
                   <div id="map" style="border-radius:10px;"></div>
               </div>-->
                
               <div class="online-cars">
                  <!--<div id="cars_data_list"></div>-->
                    <div class="scrooll" id="cars_data_list">
                        <?php   $html_data1 = "";
                                $html_data2 = "";
                                if ($page == "booking_page") {
                                        $html_data1 = "<ul class='nav nav-tabs on-bo-he'>
                                                            <li>
                                                                <a data-toggle='tab' role='tab' aria-controls='home' href='#home'><div class='on-bo-heddings'><i class='fa fa-automobile'></i> </div> " . $this->lang->line('select_your_car') . "   </a>
                                                            </li>
                                                            <small class='on-smhed'> ( " . $this->lang->line('select_the_car_that_suits_to_your_requirement') . " ) </small>
                                                        </ul> 
                                                        <div class='col-md-12'>
                                                            <div class='overley'></div>
                                                                <ul class='bxslider'>";
                                        $html_data2 = "</ul> </div>";
                                }
                                $c = 1;
                                foreach($vehicles as $r) {
                                  $html_data = "";
                                    if ($html_data == "0") 

                                        $classval = "scrool-cab";
                                        $radiocheck = "";

                                        // Calculate the cost according to vehicle

                                        $other_data = array();
                                        if ($r->cost_type == 'flat') {
                                            $other_data = array(
                                                    'min_dist_day' => $r->ct_flat_min_dist_day,
                                                    'min_dist_night' => $r->ct_flat_min_dist_night,
                                                    'min_cost_day' => $r->ct_flat_min_cost_day,
                                                    'min_cost_night' => $r->ct_flat_min_cost_night
                                            );
                                        }

                                        $locale_info = localeconv();
                                        $symbol = $locale_info['int_curr_symbol'];

                                        if ($symbol == 'EUR') {
                                            $currency = html_entity_decode('&euro;', ENT_QUOTES, 'utf-8');
                                        }
                                        else if ($symbol == 'USD') {
                                            $currency = html_entity_decode('&dollar;', ENT_QUOTES, 'utf-8');
                                        }
                                        //$amount = $this->calculate_cost($r->cost_type, $distance, $r->id, $other_data, $pickup_hours, $pickup_mins);
                                        $funname = "onClick='setActive(\"cab_" . $r->id . "\");'";
                                        /*$fquery = "SELECT f.features as feature_name 
                                                            FROM vbs_vehicle_features vf
                                                                INNER JOIN vbs_features f ON f.id = vf.feature_id
                                                            WHERE vf.vehicle_id = " . $r->id;
                                        $records = $this->base_model->run_query($fquery);
                                        $show_wheelchair = "";
                                        $show_wheelchair_li = "";

                                        foreach($records as $frow) {
                                            if (strpos($frow->feature_name,'TPMR') !== false) {
                                                $show_wheelchair = '<div class="wheelchair-icon">&nbsp;</div>';
                                                $show_wheelchair_li = '<li class="wheelchair-li-icon">&nbsp;</li>';
                                            }
                                        }
                                        */
                                        //if ($amount > 0) {
                                            if ($page == "general_booking" || $page == "admin_booking") {
                                                if ($page == "general_booking") {
                                                        $stl = "checkbox";
                                                        $style = "";
                                                }
                                                elseif ($page == "admin_booking") {
                                                        $stl = "radio";
                                                        $style = "style='margin:15px 5px;'";
                                                }

                                                if (strpos($r->name,'bus') !== false) {
                                                    $vehicle_icone = "<i class='fa fa-bus'></i>";
                                                }
                                                else if ( strpos($r->name,'Van') !== false ) {
                                                    $vehicle_icone = '<div class="van-icon"><img src="' . base_url(). 'assets/system_design/images/van-white.png" style="width:30px;"  /></div>';
                                                }
                                                else {
                                                    $vehicle_icone = "<i class='fa fa-car'></i>";
                                                }
                                                if ($c != 2) {
                                                    $style = 'style=width:30%';
                                                }

                                                if ($c == 2) {
                                                    $classval .= " active";
                                                    $checked = 'checked=checked';
                                                }
                                                else {
                                                    $checked = '';
                                                }

                                                $html_data = $html_data . " <div class='" . $classval . "' $style>
                                                                        <input type='radio' name='radiog_dark'  id='cab_" . $r->id . "' class='css-" . $stl . " css-label' " . $radiocheck . "  " . $funname . " value= " . $r->id . "_" . $amount . " $checked><label for='cab_" . $r->id . "' class='css-label' " . $style . "></label>
                                                                        <div class='che-car'> " . $vehicle_icone . " </div>
                                                                         <aside>" . $r->name . "</aside>

                                                                        <div class='text-to'> 
                                                                            <div class='members' >  " . $r->passengers_capacity . " </div>
                                                                            <div class='wheelchairs'> " . $r->small_luggage_capacity . " </div>
                                                                            <div class='luggage'> " . $r->large_luggage_capacity . " </div>
                                                                            <input type='hidden' for='cab_" . $r->id . "' name='cname_" . $r->id . "' id='cname_" . $r->id . "' value='" . $r->name . "' data-model='" . $r->model . "'>
                                                                            <input type='hidden' name='total_distance' readonly value='" . $distance . "' />
                                                                        </div>
                                                                    </div> ";
                                            }

                                            if ($page == "booking_page") {
                                                    $funname = "onClick='setActiveOnline(\"cab_" . $r->id . "\");'";

                                                    $html_data = $html_data . "
                                                            <div class='col-md-4' style='float: left; list-style: outside none none; position: relative; width: 280px; margin-right: 10px;'>

                                                                    <div class='car-sel-bx'>
                                                                    <div class='fleets_head'><h3>" . $r->name . "</h3></div>
                                                                    <img src='http://navetteo.fr/uploads/vehicle_images/". $r->image . "' style='width:150px'/>

                                                                    <ul class='peoples'>
                                                                            <li class='people-icon'>" . $r->passengers_capacity . "</li>	
                                                                            <li class='wheelchair-li-icon'>" . $r->small_luggage_capacity . "</li>
                                                                            <li class='suitcase-icon'>" . $r->large_luggage_capacity . "</li>
                                                                    </ul>

                                                                    <div class='select-radio'>

                                                                    <input type='radio' name='radiog_dark' id='cab_" . $r->id . "' class='css-checkbox carse-label' " . $funname . " value= " . $r->id . "_" . $amount . "  >  
                                                                    <label for='cab_" . $r->id . "' class='carse-label'>&nbsp;</label>
                                                                    </div>
                                                            <input type='hidden' for='cab_" . $r->id . "' name='cname_" . $r->id . "' id='cname_" . $r->id . "' value='" . $r->name . "' data-model='" . $r->model . "'>
                                                            </div>
                                                        </div> ";
                                            }
                                        //}
                                            $c++;
                                }

                                echo $html_data1 . $html_data . $html_data2;
                        ?>
                    </div>
               </div>
               <!-- new code-->
               
               <!-- NOT REQUIRED IN ONLINE BOOKING PAGE Move to QUOTE PAGE 
                  <div class="online-con" >
                     <div class="col-md-6">
                        <div class="total-journey"> 
                            <div class="row">
                                <div class="col-md-6"><i class="fa fa-clock-o"></i> <?php echo $this->lang->line('total_journey_time');?></div>
                                <div class="col-md-6"><strong id="time_id"> 00 mins </strong>&nbsp;<strong id="">(Approx)</strong></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6"><i class="fa fa-clock-o"></i> <?php echo $this->lang->line('total_journey_distance');?></div>
                                <div class="col-md-6"><strong id="distance_id"> 0.0 km </strong>&nbsp;<strong id="">(Approx)</strong></div>
                            </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="total-cost">
                            <div class="row">
                                <div class="col-md-4"><i class="fa fa-money"></i> <?php echo $this->lang->line('total_cost');?></div>
                                <div class="col-md-8"><strong id="total_cost1">0.00 <?php echo $this->lang->line($locale_info['currency_symbol']);?></strong></div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="total_cost_msg">&nbsp;</div>
                                </div>
                            </div>
                        </div>     
                     </div>
                     < ! - - <input type="submit" name="Next" value="Next"/> - - >
                  </div>
                  -->
                    <input type="hidden" name="car_cost" id="car_cost" value="0"/>
                    <input type="hidden" name="total_cost" id="total_cost" value="0"/>
                    <input type="hidden" name="total_time" id="total_time" value="0"/>
                    <input type="hidden" name="total_distance" id="total_distance" value="0"/>
                    <input type="hidden" name="car_name" id="car_name" />
                    <input type="hidden" name="car_model" id="car_model" />
                    <button type="submit" class="button green_button right"><?php echo $this->lang->line('next');?> <i class="fa fa-arrow-circle-o-right"></i> </button>
               </div>
            </div>
            <?php echo form_close(); ?>
         </div>
         <!--<div class="col-md-3">
            <?php //    $this->load->view('site/common/reasons_to_book'); ?>
         </div>-->
      </div>
   </div>
</div>
</div>

<script>
    $(document).ready(function() {
       $("#local_pick").change(function() {
          var orgin = document.getElementById('local_pick').value.replace("\"","");
          $("#local_pick").val(orgin);
       });
       $("#local_drop").change(function() {
       var destination = document.getElementById('local_drop').value.replace("\"","");
          $("#local_drop").val(destination);
      });
      $( "#dtpicker" ).datepicker({dateFormat:"<?php echo strtolower($date_elem1); ?>-<?php echo strtolower($date_elem2); ?>-yy"});
      $( "#dtpicker1" ).datepicker({dateFormat:"<?php echo strtolower($date_elem1); ?>-<?php echo strtolower($date_elem2); ?>-yy"});
    });
    function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 7,
          center: {lat: 48.8589507, lng: 2.2775175}
        });
        directionsDisplay.setMap(map);

        var onChangeHandler = function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        };
        
        var onChangeAirportHandler = function() {
          airportCalculateAndDisplayRoute(directionsService, directionsDisplay);
        };
        
        var onChangeTrainHandler = function() {
          trainCalculateAndDisplayRoute(directionsService, directionsDisplay);
        };
        
        var onChangeHotelHandler = function() {
          hotelCalculateAndDisplayRoute(directionsService, directionsDisplay);
        };
        
        var onChangeParkHandler = function() {
          parkCalculateAndDisplayRoute(directionsService, directionsDisplay);
        };
        
        document.getElementById('local_pick').addEventListener('change', onChangeHandler);
        document.getElementById('local_drop_1').addEventListener('change', onChangeHandler);
        document.getElementById('local_pick').addEventListener('blur', onChangeHandler);
        document.getElementById('local_drop_1').addEventListener('blur', onChangeHandler);
        document.getElementById('local_pick').addEventListener('focus', onChangeHandler);
        document.getElementById('local_drop_1').addEventListener('focus', onChangeHandler);
        
        document.getElementById('airport_pick').addEventListener('change', onChangeAirportHandler);
        document.getElementById('airport_drop').addEventListener('change', onChangeAirportHandler);
        
        document.getElementById('train_pick').addEventListener('change', onChangeTrainHandler);
        document.getElementById('train_drop').addEventListener('change', onChangeTrainHandler);
        
        document.getElementById('hotel_pick').addEventListener('change', onChangeHotelHandler);
        document.getElementById('hotel_drop').addEventListener('change', onChangeHotelHandler);
        
        document.getElementById('park_pick').addEventListener('change', onChangeParkHandler);
        document.getElementById('park_drop').addEventListener('change', onChangeParkHandler);
    }

    function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        $(".map-wrapper").show();
        var orgin;
        var destination;
        // var orgin = document.getElementById('local_pick').value;
        // var destination = document.getElementById('local_drop').value;
        
        if($('#pick_type').val()=='A') {
            orgin = $('#airport_pick').val();
        }
        else if($('#pick_type').val()=='L') {
            orgin = $('#local_pick').val();	
        }
        else if($('#pick_type').val()=='T') {
            orgin = $('#train_pick').val();	
        }
        else if($('#pick_type').val()=='H') {
            orgin = $('#hotel_pick').val();	
        }
        else if($('#pick_type').val()=='P') {
            orgin = $('#park_pick').val();	
        }

        if($('#drop_type_1').val()=='A') {
            destination = $('#airport_drop').val();
        }
        else if($('#drop_type_1').val()=='L') {
            destination = $('#local_drop_1').val();
        }
        else if($('#drop_type_1').val()=='T') {
            destination = $('#train_drop_1').val();
        }
        else if($('#drop_type_1').val()=='H') {
            destination = $('#hotel_drop_1').val();
        }
        else if($('#drop_type_1').val()=='P') {
            destination = $('#park_drop_1').val();
        }
        
        console.log("Local Pick : "+orgin);
        console.log("Local Drop : "+destination);
        var waypts = [];
        waypts.push({
            location: "56250 Sulniac, France",
            stopover: true
          });
        console.log(waypts);
        directionsService.route({
          origin: orgin,
          destination: destination,
          waypoints:waypts,
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
    
    function airportCalculateAndDisplayRoute(directionsService, directionsDisplay) {
        $(".map-wrapper").show();
        var orgin;
        var destination;
        //  var orgin = document.getElementById('airport_pick').value;
        //  var destination = document.getElementById('airport_drop').value;
        
        if($('#pick_type').val()=='A') {
            orgin = $('#airport_pick').val();
        }
        else if($('#pick_type').val()=='L') {
            orgin = $('#local_pick').val();	
        }
        else if($('#pick_type').val()=='T') {
            orgin = $('#train_pick').val();	
        }
        else if($('#pick_type').val()=='H') {
            orgin = $('#hotel_pick').val();	
        }
        else if($('#pick_type').val()=='P') {
            orgin = $('#park_pick').val();	
        }

        if($('#drop_type').val()=='A') {
            destination = $('#airport_drop').val();
        }
        else if($('#drop_type').val()=='L') {
            destination = $('#local_drop').val();
        }
        else if($('#drop_type').val()=='T') {
            destination = $('#train_drop').val();
        }
        else if($('#drop_type').val()=='H') {
            destination = $('#hotel_drop').val();
        }
        else if($('#drop_type').val()=='P') {
            destination = $('#park_drop').val();
        }
        
        console.log("Airport Pick : "+orgin);
        console.log("Airport Drop : "+destination);
        
        directionsService.route({
          origin: orgin,
          destination: destination,
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
    
    function trainCalculateAndDisplayRoute(directionsService, directionsDisplay) {
        $(".map-wrapper").show();
        var orgin;
        var destination;
        // var orgin = document.getElementById('train_pick').value;
        // var destination = document.getElementById('train_drop').value;
        
        if($('#pick_type').val()=='A') {
            orgin = $('#airport_pick').val();
        }
        else if($('#pick_type').val()=='L') {
            orgin = $('#local_pick').val();	
        }
        else if($('#pick_type').val()=='T') {
            orgin = $('#train_pick').val();	
        }
        else if($('#pick_type').val()=='H') {
            orgin = $('#hotel_pick').val();	
        }
        else if($('#pick_type').val()=='P') {
            orgin = $('#park_pick').val();	
        }

        if($('#drop_type').val()=='A') {
            destination = $('#airport_drop').val();
        }
        else if($('#drop_type').val()=='L') {
            destination = $('#local_drop').val();
        }
        else if($('#drop_type').val()=='T') {
            destination = $('#train_drop').val();
        }
        else if($('#drop_type').val()=='H') {
            destination = $('#hotel_drop').val();
        }
        else if($('#drop_type').val()=='P') {
            destination = $('#park_drop').val();
        }
        
        console.log("Train Pick : "+orgin);
        console.log("Train Drop : "+destination);
        
        directionsService.route({
          origin: orgin,
          destination: destination,
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
    
    function hotelCalculateAndDisplayRoute(directionsService, directionsDisplay) {
        $(".map-wrapper").show();
        var orgin;
        var destination;
        //  var orgin = document.getElementById('hotel_pick').value;
        //  var destination = document.getElementById('hotel_drop').value;
        
        if($('#pick_type').val()=='A') {
            orgin = $('#airport_pick').val();
        }
        else if($('#pick_type').val()=='L') {
            orgin = $('#local_pick').val();	
        }
        else if($('#pick_type').val()=='T') {
            orgin = $('#train_pick').val();	
        }
        else if($('#pick_type').val()=='H') {
            orgin = $('#hotel_pick').val();	
        }
        else if($('#pick_type').val()=='P') {
            orgin = $('#park_pick').val();	
        }

        if($('#drop_type').val()=='A') {
            destination = $('#airport_drop').val();
        }
        else if($('#drop_type').val()=='L') {
            destination = $('#local_drop').val();
        }
        else if($('#drop_type').val()=='T') {
            destination = $('#train_drop').val();
        }
        else if($('#drop_type').val()=='H') {
            destination = $('#hotel_drop').val();
        }
        else if($('#drop_type').val()=='P') {
            destination = $('#park_drop').val();
        }
        
        console.log("Hotel Pick : "+orgin);
        console.log("Hotel Drop : "+destination);
        
        directionsService.route({
          origin: orgin,
          destination: destination,
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
    
    function parkCalculateAndDisplayRoute(directionsService, directionsDisplay) {
        $(".map-wrapper").show();
        var orgin;
        var destination;
        //  var orgin = document.getElementById('park_pick').value;
        //  var destination = document.getElementById('park_drop').value;
        
        if($('#pick_type').val()=='A') {
            orgin = $('#airport_pick').val();
        }
        else if($('#pick_type').val()=='L') {
            orgin = $('#local_pick').val();	
        }
        else if($('#pick_type').val()=='T') {
            orgin = $('#train_pick').val();	
        }
        else if($('#pick_type').val()=='H') {
            orgin = $('#hotel_pick').val();	
        }
        else if($('#pick_type').val()=='P') {
            orgin = $('#park_pick').val();	
        }

        if($('#drop_type').val()=='A') {
            destination = $('#airport_drop').val();
        }
        else if($('#drop_type').val()=='L') {
            destination = $('#local_drop').val();
        }
        else if($('#drop_type').val()=='T') {
            destination = $('#train_drop').val();
        }
        else if($('#drop_type').val()=='H') {
            destination = $('#hotel_drop').val();
        }
        else if($('#drop_type').val()=='P') {
            destination = $('#park_drop').val();
        }
        
        console.log("Park Pick : "+orgin);
        console.log("Park Drop : "+destination);
        
        directionsService.route({
          origin: orgin,
          destination: destination,
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

<script src="<?php echo base_url(); ?>assets/system_design/scripts/bookings.js"></script>
<script>
   function waiting()
   
   {
   
    if(document.getElementById("waitnReturn").checked)
   
    {
   	
   	
   	ins = $('#waiting_time').val().split('_');
   	
    	$('#waitingTimeDiv').show();
   
    	$('#return_journey').val("Yes");
    	$('#waitingTime').val(ins[1]);
    	$('#waitingCost').val(ins[0]);
    	calCost();
   
    }
   
     	else
   
     	{
   
   	$('#waitingTimeDiv').hide();
   
   	$('#return_journey').val("No");
   	$('#waitingTime').val("No Waiting");
   	calCost();
   
   }
   
   }
   
   
   function doWaiting() {
       alert("Yes");
       if($("#journey_type").val == "go-back") {
            ins = $('#waiting_time').val().split('_');
            $('#waitingTimeDiv').show();
            $('#return_journey').val("Yes");
            $('#waitingTime').val(ins[1]);
            $('#waitingCost').val(ins[0]);
            calCost();
       }
       else {
           $('#waitingTimeDiv').hide();
            $('#return_journey').val("No");
            $('#waitingTime').val("No Waiting");
            calCost();
       }
       
   }
   
   
     $(function(){
         $('.ilike').click(function(){
            var $this = $(this);
            var p1 = $this.data('value');
            var arry = $this.data('arry');
            changeField(p1,arry);
             
         });
     });
     
   function changeField(ss, divID) {
        if (ss == "pick_airport") {
            /*$('#local_pick').hide();
            $('#airport_pick').show();
            $('#airport_pick').attr('disabled', false);
            $('#local_pick').attr('disabled', true);
            $('#pick_airport_link').hide();
            $('#pick_type').val('A');
            $('#pick_local_link').show();*/
            showAirportPick();
        }
        else if (ss == "drop_airport") {
            /*$('#local_drop').hide();
            $('#airport_drop').show();
            $('#airport_drop').attr('disabled', false);
            $('#local_drop').attr('disabled', true);
            $('#drop_type').val('A');
            $('#drop_airport_link').hide();
            $('#drop_local_link').show();*/
            showAirportDrop(divID);

        }
        else if (ss == "pick_local") {
            /*$('#local_pick').show();
            $('#airport_pick').hide();
            $('#airport_pick').attr('disabled', true);
            $('#local_pick').attr('disabled', false);
            $('#pick_type').val('L');
            $('#pick_airport_link').show();
            $('#pick_local_link').hide();*/
            showLocalPick();
        }
        else if ( ss == 'pick_train') {
            showTrainPick();
        }
        else if ( ss == 'pick_hotel' ) {
            showHotelPick();
        }
        else if ( ss == 'pick_park' ) {
            showParkPick();
        }
        else if (ss == "drop_local") {
            showLocalDrop(divID);
        }
        else if ( ss == 'drop_train') {
            showTrainDrop(divID);
        }
        else if ( ss == 'drop_hotel' ) {
            showHotelDrop(divID);
        }
        else if ( ss == 'drop_park' ) {
            showParkDrop(divID);
        }
   
   }
   /*$('#timepicker1').timepicki({
		show_meridian:false,
		min_hour_value:0,
		max_hour_value:23,
		overflow_minutes:true,
		increase_direction:'up',
		disable_keyboard_mobile: true});*/
</script>
<script type="text/javascript"> 
   (function($,W,D)
   {
      var JQUERY4U = {};
   
      JQUERY4U.UTIL =
      {
          setupFormValidation: function()
          {
                
			//form validation rules
              $("#online_booking_form").validate({
                  rules: {
                      pick_up: {
                          required: true
                          
                      },
   				drop_of: {
                          required: true
                          
                      },
   	radiog_dark: {
   				required: true
   		  },	
   	pick_time: {
                          required: true 
                      }
                  },
   			
   			messages: {
   				pick_up: {
                          required: "<?php echo $this->lang->line('pick_location_valid');?>"
                      },
   				drop_of: {
                          required: "<?php echo $this->lang->line('drop_location_valid');?>"
                      },
   	radiog_dark: {
   			  required:  "<?php echo $this->lang->line('select_your_car')?>"
   		  },
   	pick_time: {
                          required: "<?php echo $this->lang->line('pick_time_valid');?>"
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

