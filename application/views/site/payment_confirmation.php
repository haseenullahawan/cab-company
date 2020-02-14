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
         <div class="col-md-9">
            <div class="left-side-cont">
               <center>
                  <h1 class="succ"><i class="fa fa-check-circle"></i> <?php echo $this->lang->line('successful');?> </h1>
               </center>
               <div class="col-md-10 padding-p-0 col-md-offset-1">
                  <div class="panel panel-default">
                     <div class="panel-heading">
                        <h3 class="panel-title"><?php echo $this->lang->line('booking_details');?> </h3>
                     </div>
                     <div class="panel-body">
                        <div class="col-md-12">
                           <div class="bbt">
                              <h4 class="booking-success"> <i class="fa fa-check-circle"></i> <?php echo $this->lang->line('booking_successful');?> </h4>
                              <?php if(isset($journey_details['booking_ref'])) { ?>
                              <h6 class="booking-success1"><?php echo $this->lang->line('booking_reference_no');?>:<span id="oneway_confirmation_reference_no"> <?php echo $journey_details['booking_ref'];?></span></h6>
                              <h5 class="booking-success2"><?php echo $this->lang->line('booking_thanx');?></h5>
                              <p><?php echo $this->lang->line('cancel_booking');?><?php if(isset($site_settings->portal_email)) echo " ".$site_settings->portal_email;?></p>
                              <?php } ?>
                           </div>
                           <h2 class="succ-hed"> <?php echo $this->lang->line('journey_details');?> </h2>
                           <div class="payments-confar">
                              <ul>
                                 <li> <strong><?php echo $this->lang->line('pick_point');?> : </strong> <?php if(isset($journey_details['pick_up']))  echo $journey_details['pick_up']; ?></li>
                                 <li> <strong><?php echo $this->lang->line('drop_point');?>  : </strong> <?php if(isset($journey_details['pick_up']))  echo $journey_details['drop_of']; ?>  </li>
                                 <li> <strong><?php echo $this->lang->line('date_time');?> : </strong> <?php if(isset($journey_details['pick_date']))  echo $journey_details['pick_date'];
                                    if(isset($journey_details['pick_time']))  echo " ".$this->lang->line('at')." ".$journey_details['pick_time'];
                                    		?></li>
                                 <li> <strong><?php echo $this->lang->line('waiting_time');?> & <?php echo $this->lang->line('waiting_cost');?>  : </strong><?php if(isset($journey_details['waitingTime']))  echo $journey_details['waitingTime']; ?></li>
                                 <li><strong><?php echo $this->lang->line('journey_miles_and_time');?> : </strong><?php if(isset($journey_details['total_distance']))  echo $journey_details['total_distance']; ?> <?php if(isset($journey_details['total_time']))  echo $journey_details['total_time']; ?></li>
                                 <li><strong><?php echo $this->lang->line('car_type');?> : </strong> <?php if(isset($journey_details['car_name']))  echo $journey_details['car_name']; ?></li>
                              </ul>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <h2 class="succ-hed"> 
                              <?php echo $this->lang->line('passengers_details');?>
                           </h2>
                           <div class="payments-confar">
                              <ul>
                                 <li><strong><?php echo $this->lang->line('name');?> : </strong> <?php if(isset($user['username']))  echo $user['username']; ?></li>
                                 <li><strong><?php echo $this->lang->line('email');?> : </strong> <?php if(isset($user['email']))  echo $user['email']; ?></li>
                                 <li><strong><?php echo $this->lang->line('phone');?> : </strong> <?php if(isset($user['phone']))  echo $user['phone']; ?></li>
                              </ul>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <h2 class="succ-hed">  <?php echo $this->lang->line('payment_details');?></h2>
                           <div class="payments-confar">
                              <ul>
                                 <li> <strong> <?php echo $this->lang->line('payment_type');?> : </strong> <?php if(isset($payment_mode))  echo $payment_mode; ?></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="online">
                     <!-- Tab panes -->
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-3">
            <?php $this->load->view('site/common/reasons_to_book'); ?>
         </div>
      </div>
   </div>
</div>