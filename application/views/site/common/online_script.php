<?php if ($this->router->method == 'onlineBooking' || $this->router->method == 'passengerDetails') { ?>
            <!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbmWRmfT4IopfjJMjww8os5-vf66H7weI&signed_in=true&callback=initMap&libraries=geometry,places" async defer></script>
            <script src="http://maps.googleapis.com/maps/api/js?libraries=places" ></script>-->
            <script src="http://maps.googleapis.com/maps/api/js?callback=initMap&libraries=geometry,places"></script>
            <?php echo "<!--online script included-->";?>
<?php   }
        else { ?>
            <script src="http://maps.googleapis.com/maps/api/js?libraries=places"></script>
<?php   }   ?>
<script src="<?php echo base_url(); ?>assets/system_design/scripts/jquery.geocomplete.js"></script>
<script src="<?php echo base_url(); ?>assets/system_design/scripts/logger.js"></script>
<script src="<?php echo base_url(); ?>assets/system_design/scripts/gmap3.js"></script>
<script src="<?php echo base_url(); ?>assets/system_design/scripts/bx-slider.js"></script>   
<script>  
   $(document).ready(function(){
   	
   	//SLIDER
   	$('.bxslider').bxSlider({
     minSlides: 1,
     maxSlides: 4,
     slideWidth:250,
     slideMargin: 10,
      infiniteLoop: false
   });
   
   // SLIDER
   	
   			Pickpoint = '';
   			Droppoint = '';
   			Pickup_time = '';
   			//Waiting_time = '';
        $(".location").geocomplete({
                country: '<?php echo $site_settings->site_country;?>'
           }).bind("geocode:result", function(event, result) {
                /*  $(this).val(JSON.stringify(result.formatted_address));*/ 
            $fieldName = $(this).attr('id');
            console.log("Field Name: "+$fieldName);
            $formatted_address = result.formatted_address;
            console.log("form address : "+$formatted_address);
            $("#"+$fieldName).val($formatted_address);
            console.log($fieldName +" : "+$("#"+$fieldName).val());
            

            if($('#pick_type').val()=='A') {
                Pickpoint = $('#airport_pick').val();
            }
            else if($('#pick_type').val()=='L') {
                Pickpoint = $('#local_pick').val();	
            }
            else if($('#pick_type').val()=='T') {
                Pickpoint = $('#train_pick').val();	
            }
            else if($('#pick_type').val()=='H') {
                Pickpoint = $('#hotel_pick').val();	
            }
            else if($('#pick_type').val()=='P') {
                Pickpoint = $('#park_pick').val();	
            }
            
            // Waypoint Point
            if($('#drop_type_2').val()=='A') {
                Waypoint = $('#airport_drop_2').val();
            }
            else if($('#drop_type_2').val()=='L') {
                Waypoint = $('#local_drop_2').val();
            }
            else if($('#drop_type_2').val()=='T') {
                Waypoint = $('#train_drop_2').val();
            }
            else if($('#drop_type_2').val()=='H') {
                Waypoint = $('#hotel_drop_2').val();
            }
            else if($('#drop_type_2').val()=='P') {
                Waypoint = $('#park_drop_2').val();
            }

            // Dropof Point
            if($('#drop_type_1').val()=='A') {
                Droppoint = $('#airport_drop_1').val();
            }
            else if($('#drop_type_1').val()=='L') {
                Droppoint = $('#local_drop_1').val();
            }
            else if($('#drop_type_1').val()=='T') {
                Droppoint = $('#train_drop_1').val();
            }
            else if($('#drop_type_1').val()=='H') {
                Droppoint = $('#hotel_drop_1').val();
            }
            else if($('#drop_type_1').val()=='P') {
                Droppoint = $('#park_drop_1').val();
            }

            page = "booking_page";

            Pickup_time = $('#timepicker1').val();
            var waypts = [];
            if(Waypoint != "") {
                waypts.push({
                    location: Waypoint,
                    stopover: true
                  });
                  console.log("Waypoints");
                  console.log(waypts);
            }
            console.log("Location Pickpoint:"+Pickpoint);
            console.log("Location Pickpoint:"+Droppoint);
            if(Pickpoint!='' && Droppoint!='') {
                
                get_map(Pickpoint,Droppoint, Pickup_time,page,waypts);
                $("#sliderWrapper").removeClass("slider_wrapper_1");
                $("#sliderWrapper").removeClass("slider_wrapper_1");
                $('#journey_details').fadeIn(1500);
                $(".slider_wrapper").attr("style","height:650px");
                $("#sliderWrapper .bx-pager").attr("style","top:640px");
            }
        });
   		
    //  AIRPORTS DISTANCE CALCULATION
    $('.airlocation').change(function() {
        Pickpoint = '';
        Droppoint = '';
        Pickup_time = '';
        Waiting_time = '';

        if($('#pick_type').val()=='A') {
            Pickpoint = $('#airport_pick').val();
        }
        else if($('#pick_type').val()=='L') {
            Pickpoint = $('#local_pick').val();	
        }
        else if($('#pick_type').val()=='T') {
            Pickpoint = $('#train_pick').val();	
        }
        else if($('#pick_type').val()=='H') {
            Pickpoint = $('#hotel_pick').val();	
        }
        else if($('#pick_type').val()=='P') {
            Pickpoint = $('#park_pick').val();	
        }
        
         // Waypoint Point
        if($('#drop_type_2').val()=='A') {
            Waypoint = $('#airport_drop_2').val();
        }
        else if($('#drop_type_2').val()=='L') {
            Waypoint = $('#local_drop_2').val();
        }
        else if($('#drop_type_2').val()=='T') {
            Waypoint = $('#train_drop_2').val();
        }
        else if($('#drop_type_2').val()=='H') {
            Waypoint = $('#hotel_drop_2').val();
        }
        else if($('#drop_type_2').val()=='P') {
            Waypoint = $('#park_drop_2').val();
        }

        // Dropof Point
        if($('#drop_type_1').val()=='A') {
            Droppoint = $('#airport_drop_1').val();
        }
        else if($('#drop_type_1').val()=='L') {
            Droppoint = $('#local_drop_1').val();
        }
        else if($('#drop_type_1').val()=='T') {
            Droppoint = $('#train_drop_1').val();
        }
        else if($('#drop_type_1').val()=='H') {
            Droppoint = $('#hotel_drop_1').val();
        }
        else if($('#drop_type_1').val()=='P') {
            Droppoint = $('#park_drop_1').val();
        }

        page = "booking_page";
        // alert(Waiting_time);

        <?php if ($waiting_time_status->waiting_time == "enable") { ?>
                 Waiting_time = $('#waiting_time').val();
        <?php } ?>

        Pickup_time = $('#timepicker1').val();
        var waypts = [];
        if(Waypoint != "") {
            waypts.push({
                location: Waypoint,
                stopover: true
              });
              console.log("Waypoints");
              console.log(waypts);
        }
        if (Pickpoint != '' && Droppoint != '') {
            console.log("Air Location Pickpoint:"+Pickpoint);
            console.log("Air Location Pickpoint:"+Droppoint);
            //alert(Pickpoint+" -->  "+Droppoint); 
            //  get_map(Pickpoint, Droppoint, Pickup_time, page);
            get_map(Pickpoint,Droppoint, Pickup_time,page,waypts);
            $('#journey_details').fadeIn(1500);
        }
    });
    //  AIRPORTS COST CALCULATION END
    
    //  HOTELS DISTANCE CALCULATION
    $('.hotellocation').change(function() {
        Pickpoint = '';
        Droppoint = '';
        Pickup_time = '';
        Waiting_time = '';

        if($('#pick_type').val()=='A') {
            Pickpoint = $('#airport_pick').val();
        }
        else if($('#pick_type').val()=='L') {
            Pickpoint = $('#local_pick').val();	
        }
        else if($('#pick_type').val()=='T') {
            Pickpoint = $('#train_pick').val();	
        }
        else if($('#pick_type').val()=='H') {
            Pickpoint = $('#hotel_pick').val();	
        }
        else if($('#pick_type').val()=='P') {
            Pickpoint = $('#park_pick').val();	
        }
            
        // Waypoint Point
        if($('#drop_type_2').val()=='A') {
            Waypoint = $('#airport_drop_2').val();
        }
        else if($('#drop_type_2').val()=='L') {
            Waypoint = $('#local_drop_2').val();
        }
        else if($('#drop_type_2').val()=='T') {
            Waypoint = $('#train_drop_2').val();
        }
        else if($('#drop_type_2').val()=='H') {
            Waypoint = $('#hotel_drop_2').val();
        }
        else if($('#drop_type_2').val()=='P') {
            Waypoint = $('#park_drop_2').val();
        }

        // Dropof Point    
        if($('#drop_type_1').val()=='A') {
            Droppoint = $('#airport_drop_1').val();
        }
        else if($('#drop_type_1').val()=='L') {
            Droppoint = $('#local_drop_1').val();
        }
        else if($('#drop_type_1').val()=='T') {
            Droppoint = $('#train_drop_1').val();
        }
        else if($('#drop_type_1').val()=='H') {
            Droppoint = $('#hotel_drop_1').val();
        }
        else if($('#drop_type_1').val()=='P') {
            Droppoint = $('#park_drop_1').val();
        }

        page = "booking_page";
        // alert(Waiting_time);

        <?php if ($waiting_time_status->waiting_time == "enable") { ?>
                 Waiting_time = $('#waiting_time').val();
        <?php } ?>

        Pickup_time = $('#timepicker1').val();
        var waypts = [];
        if(Waypoint != "") {
            waypts.push({
                location: Waypoint,
                stopover: true
              });
              console.log("Waypoints");
              console.log(waypts);
        }
        if (Pickpoint != '' && Droppoint != '') {
            console.log("Hotel Location Pickpoint:"+Pickpoint);
            console.log("Hotel Location Pickpoint:"+Droppoint);
            //alert(Pickpoint+" -->  "+Droppoint); 
            //  get_map(Pickpoint, Droppoint, Pickup_time, page);
            get_map(Pickpoint,Droppoint, Pickup_time,page,waypts);
            $('#journey_details').fadeIn(1500);
        }
    });
    //  HOTELS COST CALCULATION END
    
    //  TRAINS DISTANCE CALCULATION
    $('.trainlocation').change(function() {
        Pickpoint = '';
        Droppoint = '';
        Pickup_time = '';
        Waiting_time = '';

        if($('#pick_type').val()=='A') {
            Pickpoint = $('#airport_pick').val();
        }
        else if($('#pick_type').val()=='L') {
            Pickpoint = $('#local_pick').val();	
        }
        else if($('#pick_type').val()=='T') {
            Pickpoint = $('#train_pick').val();	
        }
        else if($('#pick_type').val()=='H') {
            Pickpoint = $('#hotel_pick').val();	
        }
        else if($('#pick_type').val()=='P') {
            Pickpoint = $('#park_pick').val();	
        }
            
        // Waypoint Point
        if($('#drop_type_2').val()=='A') {
            Waypoint = $('#airport_drop_2').val();
        }
        else if($('#drop_type_2').val()=='L') {
            Waypoint = $('#local_drop_2').val();
        }
        else if($('#drop_type_2').val()=='T') {
            Waypoint = $('#train_drop_2').val();
        }
        else if($('#drop_type_2').val()=='H') {
            Waypoint = $('#hotel_drop_2').val();
        }
        else if($('#drop_type_2').val()=='P') {
            Waypoint = $('#park_drop_2').val();
        }

        // Dropof Point    
        if($('#drop_type_1').val()=='A') {
            Droppoint = $('#airport_drop_1').val();
        }
        else if($('#drop_type_1').val()=='L') {
            Droppoint = $('#local_drop_1').val();
        }
        else if($('#drop_type_1').val()=='T') {
            Droppoint = $('#train_drop_1').val();
        }
        else if($('#drop_type_1').val()=='H') {
            Droppoint = $('#hotel_drop_1').val();
        }
        else if($('#drop_type_1').val()=='P') {
            Droppoint = $('#park_drop_1').val();
        }

        page = "booking_page";
        // alert(Waiting_time);

        <?php if ($waiting_time_status->waiting_time == "enable") { ?>
                 Waiting_time = $('#waiting_time').val();
        <?php } ?>

        Pickup_time = $('#timepicker1').val();
        var waypts = [];
        if(Waypoint != "") {
            waypts.push({
                location: Waypoint,
                stopover: true
              });
              console.log("Waypoints");
              console.log(waypts);
        }
        if (Pickpoint != '' && Droppoint != '') {
            console.log("Train Location Pickpoint:"+Pickpoint);
            console.log("Train Location Pickpoint:"+Droppoint);
            //alert(Pickpoint+" -->  "+Droppoint); 
            //  get_map(Pickpoint, Droppoint, Pickup_time, page);
            get_map(Pickpoint,Droppoint, Pickup_time,page,waypts);
            $('#journey_details').fadeIn(1500);
        }
    });
    //  TRAINS COST CALCULATION END
    
    //  PARKS DISTANCE CALCULATION
    $('.parklocation').change(function() {
        Pickpoint = '';
        Droppoint = '';
        Pickup_time = '';
        Waiting_time = '';

        if($('#pick_type').val()=='A') {
            Pickpoint = $('#airport_pick').val();
        }
        else if($('#pick_type').val()=='L') {
            Pickpoint = $('#local_pick').val();	
        }
        else if($('#pick_type').val()=='T') {
            Pickpoint = $('#train_pick').val();	
        }
        else if($('#pick_type').val()=='H') {
            Pickpoint = $('#hotel_pick').val();	
        }
        else if($('#pick_type').val()=='P') {
            Pickpoint = $('#park_pick').val();	
        }
            
        // Waypoint Point
        if($('#drop_type_2').val()=='A') {
            Waypoint = $('#airport_drop_2').val();
        }
        else if($('#drop_type_2').val()=='L') {
            Waypoint = $('#local_drop_2').val();
        }
        else if($('#drop_type_2').val()=='T') {
            Waypoint = $('#train_drop_2').val();
        }
        else if($('#drop_type_2').val()=='H') {
            Waypoint = $('#hotel_drop_2').val();
        }
        else if($('#drop_type_2').val()=='P') {
            Waypoint = $('#park_drop_2').val();
        }

        // Dropof Point    
        if($('#drop_type_1').val()=='A') {
            Droppoint = $('#airport_drop_1').val();
        }
        else if($('#drop_type_1').val()=='L') {
            Droppoint = $('#local_drop_1').val();
        }
        else if($('#drop_type_1').val()=='T') {
            Droppoint = $('#train_drop_1').val();
        }
        else if($('#drop_type_1').val()=='H') {
            Droppoint = $('#hotel_drop_1').val();
        }
        else if($('#drop_type_1').val()=='P') {
            Droppoint = $('#park_drop_1').val();
        }

        page = "booking_page";
        // alert(Waiting_time);

        <?php if ($waiting_time_status->waiting_time == "enable") { ?>
                 Waiting_time = $('#waiting_time').val();
        <?php } ?>

        Pickup_time = $('#timepicker1').val();
        var waypts = [];
        if(Waypoint != "") {
            waypts.push({
                location: Waypoint,
                stopover: true
              });
              console.log("Waypoints");
              console.log(waypts);
        }
        if (Pickpoint != '' && Droppoint != '') {
            console.log("Park Location Pickpoint:"+Pickpoint);
            console.log("Park Location Pickpoint:"+Droppoint);
            //  alert(Pickpoint+" -->  "+Droppoint); 
            //  get_map(Pickpoint, Droppoint, Pickup_time, page);
            get_map(Pickpoint,Droppoint, Pickup_time,page,waypts);
            $('#journey_details').fadeIn(1500);
        }
    });
    //  PARKS COST CALCULATION END
    
    $("#category").change(function(){
        var cagy = $(this).val();
        $.ajax({			 
            type: 'POST',			  
            url: "<?php echo site_url();?>/welcome/getServices",
            data: '<?php echo $this->security->get_csrf_token_name();?>=<?php echo $this->security->get_csrf_hash();?>&cagy='+cagy,
            cache: false,			 
            success: function(data) {			
                $('#services').html(data);
            }		  		
        });
    });

    $(".weekdays_go").click(function(){
        var day = $(this).val();
        var weekdays = $(this);
        console.log(day);
        console.log($(weekdays).is(":checked"));
        if ($(weekdays).is(":checked")) {
            $("#go_time_"+day).show();
        }
        else {
            $("#go_time_"+day).hide();
        }
    });

    $(".weekdays_back").click(function(){
        var day = $(this).val();
        var weekdays = $(this);
        console.log(day);
        console.log($(weekdays).is(":checked"));
        if ($(weekdays).is(":checked")) {
            $("#back_time_"+day).show();
        }
        else {
            $("#back_time_"+day).hide();
        }
    });
    
    $("#journey").change(function() {
        var jtype = $(this).val();
        if (jtype == 'regular') {
            $('.regular_options').show();
            $(".slider_wrapper_1").css("height","668px");
            $("#dropOfWrapper").show();
        }
        else if (jtype == 'one-time') {
            $('.regular_options').hide();
            $(".slider_wrapper_1").css("height","562px");
            $("#dropOfWrapper").hide();
        }
    });
    
     $("#journey_type").change(function() {
        var jtype = $(this).val();
        if (jtype == 'go-back') {
            $("#dropOfWrapper").show();
            $("#waiting_time").show();
            total = parseInt($("#car_cost").val())*2;
            money = $(".money").text();
            moneyLength = money.length;
            symbol = money.charAt(moneyLength - 1); //  money.charAt(1);
            $("#journey_cost").val(total.toFixed(2)+ " "+symbol );
            $("#total_cost").val(total);
            $(".abreak").css("display","none");
            $(".back-table").show();
        }
        else {
            $("#dropOfWrapper").hide();
            value = parseInt($("#car_cost").val());
            money = $(".money").text();
            moneyLength = money.length;
            symbol = money.charAt(moneyLength - 1); //  money.charAt(1);
            $(".waiting_time").val('0 0');
            ins = $('#waiting_time_1').val().split(' ');
            $('#waitingTime').val(ins[0]);
            $('#waitingCost').val(ins[1]);
            $("#journey_cost").val(value.toFixed(2)+" "+symbol);
            $("#total_cost").val(value);
            $(".abreak").css("display","block");
            $(".back-table").hide();
        }
    });
    
     $(".add-location").click(function() {
            if($(".drop_of_location_div_2").is(':hidden')) {
                $(".drop_of_location_div_2").show();
                if($(".drop_of_location_div_2").is(':visible')) {
                     $("#add_extra_stop").hide();
                 }
            }
            
        });
        $(document).on("click",".remove-location",function() {
            var rid = $(this).attr("id");
            $("#local_drop_2").val("");
            $(".location").trigger("change");
            $("#airport_drop_2").val("");
            $(".airlocation").trigger("change");
            $("#train_drop_2").val("");
            $(".trainlocation").trigger("change");
            $("#hotel_drop_2").val("");
            $(".hotellocation").trigger("change");
            $("#park_drop_2").val("");
            $(".parklocation").trigger("change");
            $("."+rid).hide();
            $("#add_extra_stop").show();
            
        });
   		
});
   
   
   
   function setActiveOnline(id) {
   	numid = id.split('_')[1];
   	$('#cars_data_list div').removeClass('active');
   	// $('li').removeClass('active');
   	$('#'+id).parent().closest('ul').addClass('active');
   	$('#'+id).parent().parent().addClass('car-sel-bx active');
   	
   	$("#car_cost").val($('#'+id).val().split('_')[1]);
   	$("#car_name").val($('#cname_'+numid).val());
   	$("#car_model").val($('#cname_'+numid).data('model'));
        console.log($('#cname_'+numid).data('model'));
   	
   	calCost();
   	
   		
   }
   function calCost()
   {
   	
   	total = 0;
   	txt = "";
   	//Cost Calculation  For Two way 
   	if($('#waitnReturn').is(':checked'))
   	{
   		total = parseFloat($("#car_cost").val())*2+parseFloat($('#waiting_time').val());
   		txt = "<strong>( " + "<?php echo $this->lang->line("incl_waiting_time_return_journey") ?>" + " )</strong>";
   		
   	}
   	else
   	{
   		//Cost Calculation  For One Way Cost
   		total = $("#car_cost").val();
   		txt = "&nbsp;";
   	}
   	
   	$("#total_cost").val(parseFloat(total).toFixed(2));
   	$("#total_cost1").html("<?php $locale_info = localeconv();?>"+parseFloat(total).toFixed(2)+" <?php echo $this->lang->line($locale_info['currency_symbol']);?> "); // +txt
        $("#total_cost_msg").html(txt);
   	
   	
   }
   function get_map(PickLocation,DropLocation,Pickup_time,page,Waypoints) {
   	
   	
   	console.log(Waypoints);
   $("#map_canvas").gmap3({ 
    clear: {},
   
     getroute:{
       options:{
           origin:PickLocation,
           destination:DropLocation,
           waypoints:Waypoints,
           travelMode: google.maps.DirectionsTravelMode.DRIVING,
   		/*ENABLE IT IF MILES*/
   		<?php if($site_settings->distance_type=='Mile') {?>
   		unitSystem: google.maps.UnitSystem.IMPERIAL,
   		<?php } ?>		
       },
       callback: function(results){
   	var dist0 = results.routes[0].legs[0].distance.text;
   
   	 var dist=dist0.split(" ")[0];
   	var time = results.routes[0].legs[0].duration.text; // +" (Approx)"; 
   	
   	$('#time_id').text(time);
   	$("#total_time").val(time);
   	$('#distance_id').text(dist0);
   	$('#total_distance').val(dist0);
   	var selected_car = $('input[name=radiog_dark]:checked', '#online_booking_form').val();
        console.log("Selected Car: "+selected_car);
        if (selected_car === undefined) {
            var selected_car_id = 1;
        }
        else {
            var selected_car_id = selected_car.replace("_","");
            
        }

        $.ajax({			 
   
   			 type: 'POST',			  
   
   			 url: "<?php echo site_url();?>/bookingsystem/getVechicles",
   			 data: '<?php echo $this->security->get_csrf_token_name();?>=<?php echo $this->security->get_csrf_hash();?>&distance='+dist+','+'&Pickup_time='+Pickup_time+'&page='+page+'&selected_car_id='+selected_car_id,
   			 cache: false,			 
   			 success: function(data) {			
   			 // console.log("Response:"+data);
   			 $('#cars_data_list').html(data);
                         if(selected_car != "") {
                            setActiveOnline('cab_'+selected_car_id);
                        }
   			 $('.bxslider').bxSlider({
   				  minSlides: 1,
   				  maxSlides: 4,
   				  slideWidth:250,
   				  slideMargin: 10,
   				   infiniteLoop: false
   				});
   			 }		  		
   			
   			});
   	
   	
         if (!results) return;
         $(this).gmap3({ 
   	    map:{
             options:{
                center: [48.8589507,2.2775175], //42.032974, -105.482483
                zoom: 13,
                animation: google.maps.Animation.DROP
   
             }
           },
          /*  directionsrenderer:{
             container: $(document.createElement("div")).addClass("googlemap").insertAfter($("#map_canvas")),
             options:{
               directions:results
             }
           } */
   
         });
       }
     }
   });
   }
   
</script> 
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?php echo $this->lang->line('close');?></span></button>
            <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('route_map');?></h4>
         </div>
         <div class="modal-body">
            <div id="map_canvas" style="height:500px;"> </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('close');?></button>
         </div>
      </div>
   </div>
</div>
<!-- Modal -->