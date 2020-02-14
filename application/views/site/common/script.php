<script src="http://maps.googleapis.com/maps/api/js?libraries=places"></script>
<!--<script src="http://maps.googleapis.com/maps/api/js?libraries=geometry,places"></script>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=geometry,places&callback=initMap"></script>  ?libraries=places&amp;sensor=false// Removed Sara -->
<!--script src="<?php echo base_url();?>assets/system_design/scripts/jquery.min.js"></script--> 
<script src="<?php echo base_url();?>assets/system_design/scripts/jquery.geocomplete.js"></script>
<script src="<?php echo base_url();?>assets/system_design/scripts/logger.js"></script>
<script src="<?php echo base_url();?>assets/system_design/scripts/gmap3.js"></script>
<script src="<?php echo base_url();?>assets/system_design/scripts/bx-slider.js"></script>
<script>
   $(document).ready(function(){
        $('.bxslider').bxSlider({
                          minSlides: 1,
                          maxSlides: 4,
                          slideWidth:250,
                          slideMargin: 10,
                           infiniteLoop: false
                        });
        //  $(".waiting_time").hide();
        $(".waitnReturn").show();
        
        $("#journey_type").change(function() {
            var jtype = $(this).val();
            console.log("Journey Type:"+jtype);
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
                $(".journey_type_label").html("<?php echo $this->lang->line('go_back_journey_details'); ?>");
            }
            else {
                $("#dropOfWrapper").hide();
                $("#waiting_time").hide();
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
                $(".journey_type_label").html("<?php echo $this->lang->line('one_way_journey_details'); ?>");
            }
        });
        
        $("#journey").change(function() {
            var jtype = $(this).val();
            if (jtype == 'regular') {
                $('.pickup_date').hide();
                $('.start_date').show();
                $('.pickup_time').hide();
                $('.start_time').show();
                
                $('.dropof_date').hide();
                $('.end_date').show();
                $('.dropof_time').hide();
                $('.end_time').show();
                $('.regular_options').show();
                $(".slider_wrapper_1").css("height","668px");
                $("#dropOfWrapper").show();
            }
            else if (jtype == 'one-time') {
                $('.pickup_date').show();
                $('.start_date').hide();
                $('.pickup_time').show();
                $('.start_time').hide();
                
                $('.dropof_date').show();
                $('.end_date').hide();
                $('.dropof_time').show();
                $('.end_time').hide();
                $('.regular_options').hide();
                $(".slider_wrapper_1").css("height","562px");
                $("#dropOfWrapper").hide();
            }
        });
        
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
        
        $("#waitnReturn").click(function() {
            if($('#waitnReturn').is(":checked")) {
                    // $(".waiting_time").toggle();
                    $("#dropOfWrapper").toggle();
                    total = parseInt($("#car_cost").val())*2;
                    money = $(".money").text();
                    moneyLength = money.length;
                    symbol = money.charAt(moneyLength - 1); //  money.charAt(1);
                    $("#journey_cost").val(total.toFixed(2)+ " "+symbol );
                    $("#total_cost").val(total);
                    $(".abreak").css("display","none");
                    //  $(".slider_wrapper_1").css("height","619px");
            } 
            else {
   		// $(".waiting_time").toggle();
                $("#dropOfWrapper").toggle();
   		value = parseInt($("#car_cost").val());
   		money = $(".money").text();
   		moneyLength = money.length;
                symbol = money.charAt(moneyLength - 1); //  money.charAt(1);
   		$(".waiting_time").val('0 0');
   		ins = $('#waiting_time').val().split(' ');
   		$('#waitingTime').val(ins[0]);
   		$('#waitingCost').val(ins[1]);
   		$("#journey_cost").val(value.toFixed(2)+" "+symbol);
   		$("#total_cost").val(value);
   		$(".abreak").css("display","block");
                //  $(".slider_wrapper_1").css("height","540px");
            }
        });
                  
        $("#waiting_time").change(function() {
            var car_cost = 0;
            ins = $('#waiting_time').val().split(' ');
            $('#waitingTime').val(ins[0]);
            $('#waitingCost').val(ins[1]);
            total = parseInt($("#car_cost").val())*2+parseInt(ins[1]);
            money = $(".money").text();
            symbol = money.charAt(1);
            $("#journey_cost").val(symbol+total.toFixed(2));
            $("#total_cost").val(total);
        });
        
        Pickpoint = '';
        Droppoint = '';
        Waypoint = '';
        Pickup_time = '';
   	   
        $(".location").geocomplete({country: '<?php echo $site_settings->site_country;?>'}).bind("geocode:result", function(event, result) {
        //  $.fn.addGeoLocation = function () { //  this.geocomplete({country: '<?php echo $site_settings->site_country;?>'}).bind("geocode:result", function(event, result) {
                             /*$(this).val(JSON.stringify(result.formatted_address));	*/	
                          $fieldName = $(this).attr('id');
                           console.log("Field Name: "+$fieldName);
                            $formatted_address = result.formatted_address;
                            console.log("form address : "+$formatted_address);
                            $("#"+$fieldName).val($formatted_address);
                            console.log($fieldName +" : "+$("#"+$fieldName).val());
                            
                            // Pickup Point
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

                            page = $('#local_drop_1').attr("alt");

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
                            if(Pickpoint!='' && Droppoint!='') {
                                get_map(Pickpoint,Droppoint, Pickup_time,page,waypts);
                                $("#sliderWrapper").removeClass("slider_wrapper_1");
                                $("#sliderWrapper").removeClass("slider_wrapper_1");
                                $('#journey_details').fadeIn(1500);	
                                $(".slider_wrapper").attr("style","height:650px");
                            }
                        });
                    //  }
                    
        /*$(document).on("keydown",".location",function(){
            console.log($(this).attr("id"));
            $(this).addGeoLocation(); 
        });*/
        
        //AIRPORTS DISTANCE CALCULATION
        $(".airlocation").change(function(){
            Pickpoint = '';
            Droppoint = '';
            Waypoint = '';
            Pickup_time = '';

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

            Pickup_time = $('#timepicker1').val();
            page = $('#local_drop_1').attr("alt");
            var waypts = [];
            if(Waypoint != "") {
                waypts.push({
                    location: Waypoint,
                    stopover: true
                  });
                  console.log("Waypoints");
                  console.log(waypts);
            }
            if(Pickpoint!='' && Droppoint!='') { 
                get_map(Pickpoint,Droppoint, Pickup_time,page,waypts);
                $("#sliderWrapper").removeClass("slider_wrapper_1");
                $("#sliderWrapper").removeClass("slider_wrapper_1");
                $('#journey_details').fadeIn(1500);
                $(".slider_wrapper").attr("style","height:650px");
                $("#sliderWrapper .bx-pager").attr("style","top:640px");
            }
        });
        //AIRPORTS COST CALCULATION END
        
        // TRAINS DISTANCE CALCULATION
        $(".trainlocation").change(function(){
            Pickpoint = '';
            Droppoint = '';
            Waypoint = '';
            Pickup_time = '';

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

            Pickup_time = $('#timepicker1').val();
            page = $('#local_drop_1').attr("alt");
            var waypts = [];
            if(Waypoint != "") {
                waypts.push({
                    location: Waypoint,
                    stopover: true
                  });
                  console.log("Waypoints");
                  console.log(waypts);
            }
            if(Pickpoint!='' && Droppoint!='') { 
                    get_map(Pickpoint,Droppoint, Pickup_time,page,waypts);
                    $("#sliderWrapper").removeClass("slider_wrapper_1");
                    $("#sliderWrapper").removeClass("slider_wrapper_1");
                    $('#journey_details').fadeIn(1500);
                    $(".slider_wrapper").attr("style","height:650px");
                    $("#sliderWrapper .bx-pager").attr("style","top:640px");
            }
        });
        // TRAINS COST CALCULATION END
        
        // HOTELS DISTANCE CALCULATION
        $(".hotellocation").change(function(){
            Pickpoint = '';
            Droppoint = '';
            Waypoint = '';
            Pickup_time = '';

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

            Pickup_time = $('#timepicker1').val();
            page = $('#local_drop_1').attr("alt");
            var waypts = [];
            if(Waypoint != "") {
                waypts.push({
                    location: Waypoint,
                    stopover: true
                  });
                  console.log("Waypoints");
                  console.log(waypts);
            }
            if(Pickpoint!='' && Droppoint!='') { 
                    get_map(Pickpoint,Droppoint, Pickup_time,page,waypts);
                    $("#sliderWrapper").removeClass("slider_wrapper_1");
                    $("#sliderWrapper").removeClass("slider_wrapper_1");
                    $('#journey_details').fadeIn(1500);
                    $(".slider_wrapper").attr("style","height:650px");
                    $("#sliderWrapper .bx-pager").attr("style","top:640px");
            }
        });
        // HOTELS COST CALCULATION END.
        
        // PARKS DISTANCE CALCULATION
        $(".parklocation").change(function(){
            Pickpoint = '';
            Droppoint = '';
            Waypoint = '';
            Pickup_time = '';

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

            Pickup_time = $('#timepicker1').val();
            page = $('#local_drop_1').attr("alt");
            var waypts = [];
            if(Waypoint != "") {
                waypts.push({
                    location: Waypoint,
                    stopover: true
                  });
                  console.log("Waypoints");
                  console.log(waypts);
            }
            if(Pickpoint!='' && Droppoint!='') { 
                    get_map(Pickpoint,Droppoint, Pickup_time,page,waypts);
                    $("#sliderWrapper").removeClass("slider_wrapper_1");
                    $("#sliderWrapper").removeClass("slider_wrapper_1");
                    $('#journey_details').fadeIn(1500);
                    $(".slider_wrapper").attr("style","height:650px");
                    $("#sliderWrapper .bx-pager").attr("style","top:640px");
            }
        });
        // PARKS COST CALCULATION END
        
        $(".add-location").click(function() {
            /*fid = ++($(".addtional_location_div input").length);
            if (fid <= 8) {
                field = '<div class="addCntDiv"> <input type="text"  placeholder="<?php // echo $this->lang->line('type_ur_address');?>" class="location drop_of_txtbox addtnl_loc" id="additional_drop_of_' + fid + '" alt="general_booking" name="additional_drop_of[]"> ' + '<img src="<?php // echo base_url(); ?>assets/system_design/images/remove.png" class="remove-location" id="' + fid + '" /> </div>' ;
                $(".addtional_location_div").append(field);
            }
            else {
                alert("Sorry! You have reached the maximum no of drop-of location.");
            }*/
    
            if($(".drop_of_location_div_2").is(':hidden')) {
                $(".drop_of_location_div_2").show();
                if($(".drop_of_location_div_2").is(':visible')) {
                     $("#add_extra_stop").hide();
                 }
            }
            
        });
        $(document).on("click",".remove-location",function() {
            /*var rid = $(this).attr("id");
            $(this).remove();
            $(this).closest('.location').remove();
            $(this).parent('.addCntDiv').remove();
            $("#additional_drop_of_"+rid).remove();
            //  $("addtionalDropofDiv_"+rid).remove();
            //  $(this).parent('div').remove();*/
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
   
   function setActive(id) {
   	
   	numid = id.split('_')[1];
   	$('#cars_data_list div').removeClass('active');
   	$('#'+id).parent().addClass('scrool-cab active');
   	$('#btnbooknow').fadeIn(300);
   	$('.waitnReturn').fadeIn(300);
   	
   	carCost = $('#cab_'+numid).val();
   	
   	$('#car_cost').val(carCost.split("_")[1]);
   	$('#total_cost').val($('#car_cost').val());
   	$("#car_name").val($('#cname_'+numid).val());
   	$("#journey_cost").val($('#cost_'+numid).text()).fadeIn(300);
   }
   
    function getHoursMins(total_time) {
       var hours_mins = "";
        var mins = "";
        var $hours = "";
        var $mins = "";
        var $hoursMins = [];
        console.log(total_time.search(/hours/i));

        console.log(total_time.search(/hour/i));
        if (total_time.search(/hours/i) > 0) {
            //  console.log("hours");
            hours_mins = total_time.split("hours");
        }
        else if (total_time.search(/hour/i) > 0) {
            //  console.log("hour");
            hours_mins = total_time.split("hour");
        }

        if(hours_mins == "") {
            mins = total_time.split("mins");
        }
        else {
            mins = hours_mins[1].split("mins");
        }	

        if (hours_mins != "") {
            // console.log("Hours: "+hours_mins[0] );
            $hours = hours_mins[0];
        }
        if(mins != "") {
            // console.log("Minutes : "+mins[0]);
            $mins = mins[0];
        }
        //  console.log($hours + "" + $mins);
        $hoursMins[0] = $hours;
        $hoursMins[1] = $mins;
        return $hoursMins;
    }
    
    function leftPad(number) {    
        return ((number < 10 && number >= 0) ? '0' : '') + number;  
    } 

    function minutesToStr(minutes) {  
        var sign ='';  
        var $hoursMins = [];
        if(minutes < 0){  
            sign = '-';  
        }  

        var hours = leftPad(Math.floor(Math.abs(minutes) / 60));  
        var minutes = leftPad(Math.abs(minutes) % 60);  
        
        $hoursMins[0] = hours;
        $hoursMins[1] = minutes;
        //  return sign + hours +'hrs '+minutes + 'min';  
        return $hoursMins;
    }  

   function get_map(PickLocation,DropLocation, Pickup_time,page,Waypoints) {
   
   $("#map_canvas").gmap3({ 
    clear: {},
     getroute:{
       options:{
            origin:PickLocation,
            destination:DropLocation,
            waypoints:Waypoints,
            optimizeWaypoints: true,
            travelMode: google.maps.DirectionsTravelMode.DRIVING,
   		/*ENABLE IT IF MILES*/
   		<?php if($site_settings->distance_type=='Mile') {?>
   		unitSystem: google.maps.UnitSystem.IMPERIAL,
   		<?php } ?>		
       },
       callback: function(results){
           console.log(results);
        var legs = results.routes[0].legs;
        var time =0;
        var distance=0;
        var $hours = 0;
        var $mins = 0;
        $.each(legs,function(key,value) {
            console.log(legs[key].distance.text);
            console.log(legs[key].duration.text);
            distTxt = legs[key].distance.text;
            distVal = distTxt.split(" ")[0];
            distance += parseFloat(distVal);
            
            timeTxt = legs[key].duration.text;
            //  timeVal = timeTxt.split(" ")[0];
            $hoursMins = getHoursMins(timeTxt);
            if ($hoursMins[0] != "") {
                $hours += parseInt($hoursMins[0]);
            }
            $mins += parseInt($hoursMins[1]);
            //  time += parseFloat(timeVal);
            
            //  var dist0 = results.routes[0].legs[0].distance.text;
            //  var dist=dist0.split(" ")[0];
            //  var time = results.routes[0].legs[0].duration.text+" (Approx)"; 
        });
        
        $minHoursMins = minutesToStr($mins);
        var $total_hours = parseInt($hours) + parseInt($minHoursMins[0]);
        var $total_mins = parseInt($minHoursMins[1]);
        
   	time = $total_hours + " hour(s) " + $total_mins + " mins";
   	
   	$('#time_id').text(time);
   	$("#total_time").val(time);
   	$('#distance_id').text(distance);
   	$('#total_distance').val(distance);
   	
   	 /*
          //  Not to load the car lists while selected the pick-up and drop-of location
          $.ajax({			 
                type: 'POST',			  

                url: "<?php // echo site_url();?>/bookingsystem/getVechicles",
                data: '<?php // echo $this->security->get_csrf_token_name();?>=<?php // echo $this->security->get_csrf_hash();?>&distance='+distance+','+'&Pickup_time='+Pickup_time+'&page='+page,
                async: false,
                cache: false,			 
                success: function(data) {			
                $('#cars_data_list').html(data);			 
                }		  		
            });
   	*/
   	
         if (!results) return;
         $(this).gmap3({ 
   	    map:{
             options:{
                center: [48.8589507,2.2775175], //42.032974, -105.482483
                zoom: 13,
                animation: google.maps.Animation.DROP
   
             }
           },
         
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