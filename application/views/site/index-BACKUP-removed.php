

 <div class="container padding-p-0 banner">
    <div class="row">
      <div class="col-md-4 padding-p-0">  </div>
      <div class="col-md-8 padding-p-r">
        <div class="trip-form">
        
        <div class="tab">
        
        <div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs hed-bg" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">
       
    <div class="cabs-j"><i class="fa fa-automobile"></i> </div> Find Your Perfect Trip
           
    
    </a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><div class="cabs-j"><i class="fa fa-plane"></i> </div> Plane</a></li>
     
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home"><div class="trip-form-con">
            <div class="col-md-6">
              <label> Pick-Up Location </label>
              <input type="text"  placeholder="Warangal, Hyderabad, Telangana" class="location" id="local_pick">
            </div>
            <div class="col-md-6">
              <label> Drop-Up Location </label>
              <input type="text"  placeholder="Warangal, Hyderabad, Telangana" class="location" id="local_drop" alt="general_booking" >
            </div>
            <div class="col-md-3">
              <label> Pick-Up Date </label>
              <input data-beatpicker="true" class="date"  type="text"/>
            </div>
            <div class="col-md-3">
				 <label> Pick-Up Time </label>
              <?php 
			  $hours_options = array(
									"1"=>"01","2"=>"02","3"=>"03","4"=>"04","5"=>"05","6"=>"06","7"=>"07","8"=>"08","9"=>"09","10"=>"10","11"=>"11","12"=>"12","13"=>"13","14"=>"14","15"=>"15","16"=>"16","17"=>"17","18"=>"18","19"=>"19","20"=>"20","21"=>"21","22"=>"22","23"=>"23","24"=>"24"
									);
			  
			   $min_options = array(
								  "00" => "00",
								  "0.1" => "10",
								  "0.2" => "20",
								  "0.3" => "30",
								  "0.4" => "40",
								  "0.5" => "50"
								  );
			  
			  echo form_dropdown('hours',$hours_options,'','id="hours"');
			   echo form_dropdown('minutes',$min_options,'','id="minutes"');
			  
			  ?>
              
            </div>
			
			
			<?php if($waiting_time_status->waiting_time == "enable") { ?>
           <div class="col-md-3">
              <div class="control"></div>
              <label> Wating Time </label>
             <?php echo form_dropdown('waiting_time',$waiting_options);?>
            </div>
			<?php } ?>
			
			
            <div class="col-md-3">
           <input type="button" value="BOOK NOW" class="booknow" onclick="$('#journey_details').fadeIn(1500);">
            </div>
          </div></div>
    <div role="tabpanel" class="tab-pane" id="profile"><div class="trip-form-con">
            
			
		
			
			
			
			<div class="col-md-6">
              <label> Pick-Up Location </label>
              <input type="text"  placeholder="Warangal, Hyderabad, Telangana" class="location" id="air_pick">
            </div>
            
			<div class="col-md-6">
              <label> Drop-Up Location </label>
              <input type="text"  placeholder="Warangal, Hyderabad, Telangana" class="location" id="air_pick">
            </div>
            
			<div class="col-md-3">
              <label> Pick-Up Date </label>
              <input data-beatpicker="true" class="date" value="<?php echo date('d-m-Y'); ?>" type="date"/>
            </div>
            <div class="col-md-3">
              <label> Pick-Up Time</label>
              <input type="text"  placeholder=" " class="time">
            </div>
            <div class="col-md-3">
              <div class="control"></div>
              <label> Wating Time </label>
            <select>
			<option>10 min</option>
			<option>10 min</option>
			<option>10 min</option>
			<option>10 min</option>
			<option>10 min</option>
			<option>10 min</option>
			<option>10 min</option>
			<option>10 min</option>
			
			</select>
            </div>
            <div class="col-md-3">
           <input type="button" value="BOOK NOW11" class="geta">
            </div>
          </div></div>
    
  </div>

</div>
       
           
          </div>
          
          <div class="hed-line"></div>
          
          <div class="down-form" id="journey_details" style="display: none;"> 
          
          <div  class="col-md-9"> 
       
          
          <div class="scrooll" id="cars_data_list">
         
          </div>
          
      
          
          </div>
        <div class="col-md-3"> 
          
        <div class="location-map"> 
        <a href="#" data-toggle="modal" data-target="#myModal" > <img src="<?php echo base_url();?>assets/system_design/images/location-map.png"/></a>	
          One Way Journey Details: 
		<strong id="distance_id">Distance: 1ft</strong>	<br>
		<strong id="time_id">Time:  1 min (Approx)</strong>
         </div>
           
           <div class="book">
           
           <input type="button" id="journey_cost" value="" style="display:none;" class="geta">
           </div>
                     
           </div>
          
          </div>
        </div>
      </div>
    </div>
  </div>
  </header>
  
  <div class="scroll-up">

<div class="container-fluid">
<div class="container padding-p-0">
<div class="row">
<div class="col-md-12 padding-p-0"> 
<div class="hedding-style">  </div> <aside class="main-hedd"> CARS</aside> <div class="hedding-style1"> </div>
</div>
</div>

<div class="row">

<?php foreach($vehicles as $row):?>

<div class="col-md-3">
<div class="first-car">
<div class="first-car-hed"><?php echo $row->name;?></div>
<div class="first-car-img"> <img src="<?php echo base_url();?>uploads/vehicle_images/<?php echo $row->image; ?>" width="100%"/> </div>

<div class="rl">
<div class="col-md-8 padding-p-r">

<aside class="rate">Starts From: <?php echo $row->cost_starting_from;?>$</aside>
<!-- <aside class="city-sm-img">   </aside> -->

</div>

</div>

<!-- <div class="list-pass">
            <input type="text" class="members1"/>
            <input type="text" class="luggage1"/>
            <input type="text" class="bags1"/>
           
</div> -->
  <!-- <div class="book">
           
           <input type="button" value="BOOK NOW" class="booknow-small">
           </div> -->

</div>
<div class="clearfix"></div>
</div>
<?php endforeach;?>

<!-- <div class="col-md-3">
<div class="first-car">
<div class="first-car-hed">Saloon Cars</div>
<div class="first-car-img"> <img src="<?php echo base_url();?>assets/system_design/images/car-img.jpg" width="100%"/> </div>

<div class="rl">
<div class="col-md-6 padding-p-r">

<aside class="rate"> From : 100$   </aside>
<aside class="city-sm-img">   </aside>

</div>
<div class="col-md-6">
<aside class="rate"> To : 100$  </aside>
<aside class="loca-sm-img">    </aside>

</div>
</div>

<div class="list-pass">
         <input type="text" class="members1"/>
            <input type="text" class="luggage1"/>
            <input type="text" class="bags1"/>
          
</div>
  <div class="book">
           
           <input type="button" value="BOOK NOW" class="booknow-small">
           </div>

</div>

<div class="clearfix"></div>
</div> -->



<!-- <div class="col-md-3">
<div class="first-car">
<div class="first-car-hed">Saloon Cars</div>
<div class="first-car-img"> <img src="<?php echo base_url();?>assets/system_design/images/car-img.jpg" width="100%"/> </div>

<div class="rl">
<div class="col-md-6 padding-p-r">

<aside class="rate"> From : 100$   </aside>
<aside class="city-sm-img">   </aside>

</div>
<div class="col-md-6">
<aside class="rate"> To : 100$  </aside>
<aside class="loca-sm-img">    </aside>

</div>
</div>

<div class="list-pass">
         <input type="text" class="members1"/>
            <input type="text" class="luggage1"/>
            <input type="text" class="bags1"/>
         
</div>
  <div class="book">
           
           <input type="button" value="BOOK NOW" class="booknow-small">
           </div>

</div>

<div class="clearfix"></div>
</div> -->

<!-- <div class="col-md-3">
<div class="first-car">
<div class="first-car-hed">Saloon Cars</div>
<div class="first-car-img"> <img src="<?php echo base_url();?>assets/system_design/images/car-img.jpg" width="100%"/> </div>

<div class="rl">
<div class="col-md-6 padding-p-r">

<aside class="rate"> From : 100$   </aside>
<aside class="city-sm-img">   </aside>

</div>
<div class="col-md-6">
<aside class="rate"> To : 100$  </aside>
<aside class="loca-sm-img">    </aside>

</div>
</div>

<div class="list-pass">
         <input type="text" class="members1"/>
            <input type="text" class="luggage1"/>
            <input type="text" class="bags1"/>
            
</div>
  <div class="book">
           
           <input type="button" value="BOOK NOW" class="booknow-small">
           </div>

</div>

<div class="clearfix"></div>
</div> -->


</div>

</div>
</div>




<div class="container-fluid bg-con">

<div class="container padding-p-0">
<div class="row">
<div class="col-md-12 padding-p-0"> 
<div class="hedding-style">  </div> <aside class="main-hedd cw"> CITIES </aside> <div class="hedding-style1"> </div>
</div>
</div>

<div class="row">
<div class="col-md-3">
<div class="first-car">
 
<div class="first-car-img"> <img src="<?php echo base_url();?>assets/system_design/images/city1.jpg" width="100%"/> </div>
<div class="rl">
<div class="col-md-12">
<aside class="city-hed"> Hyderabad </aside>
</div>
</div>

<!-- <div class="ci">
<div class="col-md-6 padding-p-r">

<aside class="rate"> From : 100$   </aside>
<aside class="city-sm-img">   </aside>

</div>
<div class="col-md-6">
<aside class="rate"> To : 100$  </aside>
<aside class="loca-sm-img">    </aside>

</div>
</div>
 
  <div class="book">
           <input type="button" value="VIEW ALL" class="view-small">
           </div> --> 

</div>

<div class="clearfix"></div>
</div>


<div class="col-md-3">
<div class="first-car">
 
<div class="first-car-img"> <img src="<?php echo base_url();?>assets/system_design/images/city2.jpg" width="100%"/> </div>
<div class="rl">
<div class="col-md-12">
<aside class="city-hed"> Hyderabad </aside>
</div>
</div>

<div class="ci">
<div class="col-md-6 padding-p-r">

<aside class="rate"> From : 100$   </aside>
<aside class="city-sm-img">   </aside>

</div>
<div class="col-md-6">
<aside class="rate"> To : 100$  </aside>
<aside class="loca-sm-img">    </aside>

</div>
</div>
 
  <div class="book">
           <input type="button" value="VIEW ALL" class="view-small">
           </div>

</div>

<div class="clearfix"></div>
</div>
<div class="col-md-3">
<div class="first-car">
 
<div class="first-car-img"> <img src="<?php echo base_url();?>assets/system_design/images/city3.jpg" width="100%"/> </div>
<div class="rl">
<div class="col-md-12">
<aside class="city-hed"> Hyderabad </aside>
</div>
</div>

<div class="ci">
<div class="col-md-6 padding-p-r">

<aside class="rate"> From : 100$   </aside>
<aside class="city-sm-img">   </aside>

</div>
<div class="col-md-6">
<aside class="rate"> To : 100$  </aside>
<aside class="loca-sm-img">    </aside>

</div>
</div>
 
  <div class="book">
           <input type="button" value="VIEW ALL" class="view-small">
           </div>

</div>

<div class="clearfix"></div>
</div>
<div class="col-md-3">
<div class="first-car">
 
<div class="first-car-img"> <img src="<?php echo base_url();?>assets/system_design/images/city4.jpg" width="100%"/> </div>
<div class="rl">
<div class="col-md-12">
<aside class="city-hed"> Hyderabad </aside>
</div>
</div>

<div class="ci">
<div class="col-md-6 padding-p-r">

<aside class="rate"> From : 100$   </aside>
<aside class="city-sm-img">   </aside>

</div>
<div class="col-md-6">
<aside class="rate"> To : 100$  </aside>
<aside class="loca-sm-img">    </aside>

</div>
</div>
 
  <div class="book">
           <input type="button" value="VIEW ALL" class="view-small">
           </div>

</div>

<div class="clearfix"></div>
</div>
</div>

</div>
</div>
 

</div>

