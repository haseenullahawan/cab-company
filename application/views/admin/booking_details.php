<?php $locale_info = localeconv(); ?>
<div class="col-md-12 padding white right-p">
   <div class="content">
      <div class="col-md-12 padding-p-l">
         <?php echo $this->session->flashdata('message');?>              
         <div class="">
            <div class="main-hed">
               <a href="<?php echo site_url();?>/auth"><?php echo $this->lang->line('home');?></a> 
               <?php if(isset($title)) echo " >> Dashboard >> ".$title;?>
            </div>
            <div class="module-head">
               <!--<h3><?php // echo $title;?></h3>-->
            </div>
            <div class="module-body">
               <div class="col-md-6 padding-p-l">
                  <div class="panel panel-default">
                     <div class="panel-heading"><?php echo $this->lang->line('personal_details');?></div>
                     <div class="panel-body padding-p-l padding-p-r">
                        <table class="table table-striped">
                           <?php 
                              foreach($bookings as $row):?>
                           <tr>
                              <td> <strong><?php echo $this->lang->line('name');?> : </strong> </td>
                              <td><?php if(isset($row->registered_name)) echo $row->registered_name;?></td>
                              <td> </td>
                              <td></td>
                           </tr>
                           <tr>
                              <td> <strong><?php echo $this->lang->line('phone');?> : </strong></td>
                              <td><?php if(isset($row->phone)) echo $row->phone;?></td>
                              <td></td>
                              <td></td>
                           </tr>
                           <tr>
                              <td> <strong><?php echo $this->lang->line('email');?>: </strong> </td>
                              <td><?php if(isset($row->email)) echo $row->email;?></td>
                              <td></td>
                              <td></td>
                           </tr>
                        </table>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 padding">
                  <div class="panel panel-default">
                     <div class="panel-heading"> <?php echo $this->lang->line('vehicle_cost_details');?> </div>
                     <div class="panel-body padding-p-l padding-p-r">
                        <table class="table table-striped">
                           <tr>
                              <td><strong> <?php echo $this->lang->line('vehicle_name');?>: </strong></td>
                              <td> <?php if(isset($row->name)) echo $row->name;?> </td>
                              <td> <strong> <?php echo $this->lang->line('book_date');?> :</strong> </td>
                              <td>  <?php if(isset($row->bookdate)) echo $row->bookdate;?> </td>
                           </tr>
                           <tr>
                              <td> <strong> <?php echo $this->lang->line('cost_of_journey');?>   : </strong></td>
                              <td><?php if(isset($row->cost_of_journey)) echo $row->cost_of_journey." (".$locale_info['currency_symbol'].")";?></td>
                              <td>  </td>
                              <td> </td>
                           </tr>
                           <tr>
                              <td><strong><?php echo $this->lang->line('payment_type');?>:</strong></td>
                              <td> <?php if(isset($row->payment_type))    echo $row->payment_type;?> </td>
                              <td></td>
                              <td> </td>
                           </tr>
                        </table>
                     </div>
                  </div>
               </div>
               <div class="col-md-12 padding">
                  <div class="panel panel-default">
                     <div class="panel-heading"><?php echo $this->lang->line('location_address');?></div>
                     <div class="panel-body padding-p-l padding-p-r">
                        <table class="table table-striped">
                           <tr>
                              <td><strong><?php echo $this->lang->line('booking_reference_no');?> : </strong></td>
                              <td> <?php if(isset($row->booking_ref)) echo $row->booking_ref;?> </td>
                              <td><strong><?php echo $this->lang->line('pickup_location');?>:</strong></td>
                              <td> <?php if(isset($row->pick_point)) echo $row->pick_point;?> </td>
                              <td></td>
                           </tr>
                           <tr>
                              <td><strong><?php echo $this->lang->line('pick_date_vehicles');?> : </strong></td>
                              <td> <?php if(isset($row->pick_date)) echo $row->pick_date;?> </td>
                              <td> <strong><?php echo $this->lang->line('drop_location');?> :</strong> </td>
                              <td>  <?php if(isset($row->drop_point)) echo $row->drop_point;?></td>
                              <td> </td>
                           </tr>
                           <tr>
                              <td> <strong> <?php echo $this->lang->line('pick_time_vehicles');?>: </strong></td>
                              <td><?php if(isset($row->pick_time)) echo $row->pick_time;?></td>
                              <td> <strong> <?php echo $this->lang->line('distance');?>: </strong></td>
                              <td><?php if(isset($row->distance)) echo $row->distance;?> </td>
                           </tr>
                           <tr>
                                <td colspan="5">
                                    <div id="map" style="border-radius:10px;width:100%;height:300px"></div>
                                </td>
                            </tr>   
                        </table>
                     </div>
                  </div>
               </div>
               <div class="form-group"> 
                  <a href="<?php echo site_url(); ?>/settings/todayBookings/confirm/<?php echo $row->id;?>" style="text-decoration:none;"><input type="button" value="Confirm"></a>
                  <a href="<?php echo site_url(); ?>/settings/todayBookings/cancel/<?php echo $row->id;?>" style="text-decoration:none;"><input type="button" value="Cancel"></a>
               </div>
               <?php endforeach;?> 
            </div>
         </div>
         <?php echo form_close();?>  
      </div>
   </div>
</div>
<script>
    function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 7,
          center: {lat: 48.8589507, lng: 2.2775175}
        });
        directionsDisplay.setMap(map);
        console.log("page loaded");
       calculateAndDisplayRoute(directionsService, directionsDisplay);
       console.log("map loaded");
    }

    function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        $(".map-wrapper").show();
        var orgin = "<?php echo $row->pick_point;?>"; // '227 Boulevard Voltaire, Paris, France'; // 
        console.log("Local Pick : "+orgin);
        var destination = "<?php echo $row->drop_point;?>"; //  '30 Boulevard Voltaire, Paris, France';// 
        console.log("Local Drop : "+destination);
        directionsService.route({
          origin: orgin,
          destination: destination,
          travelMode: google.maps.TravelMode.DRIVING
        }, function(response, status) {
            console.log("Reponse:"+response);
            console.log("Status:"+status);
            console.log("Google Status:"+google.maps.DirectionsStatus.OK);
          if (status === google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
          } else { 
           window.alert('Directions request failed due to ' + status);
          }
        });
    }
</script>
<script src="http://maps.googleapis.com/maps/api/js?libraries=places,geometry&callback=initMap"></script>