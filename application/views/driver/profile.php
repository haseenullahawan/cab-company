<!--<div class="container padding-p-0 banner">
   <div class="row">
      <div class="col-md-8 padding-p-l">
         <aside class="hedding"><?php echo $title;?></aside>
      </div>
      <div class="col-md-4 padding-p-r">
         <aside class="bradecom">
            <ul>
               <li> <a href="#"> <?php echo $this->lang->line('home_page');?> </a> </li>
               <li>>></li>
               <li class="active"> <a href="#"><?php echo $title;?></a> </li>
            </ul>
         </aside>
      </div>
   </div>
</div>-->
</header>
<div class="container-fluid body-bg">
    <div class="container body-border">
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
        <div class="row" style="margin-bottom:40px;">
           <div class="col-md-9 col-md-offset-1">
              <div id="total-login">
                 <div class="online">
                    <!-- Tab panes -->
                    <div class="tab-content">
                       <div role="tabpanel" class="tab-pane active" id="home">
                          <div class="online-con padding-p-0">
                             <?php 
                                $attributes = array("name" => 'profile_form',"id" => 'profile_form');
                                echo form_open_multipart('users/profile',$attributes); 
                                
                                ?>
                             <div class="col-md-6">
                                <div class="form-group">
                                   <label> <?php echo $this->lang->line('user_name');?> </label>
                                   <input type="text" name="user_name" value="<?php if(isset($profile_info)) echo $profile_info->username;echo set_value('user_name');?>" > 
                                </div>
                                <?php echo form_error('user_name');?>
                                <div class="form-group">
                                   <label> <?php echo $this->lang->line('email');?> </label>
                                   <input type="text" name="email" readonly value="<?php if(isset($profile_info)) echo $profile_info->email;echo set_value('email');?>"  >
                                   <?php echo form_error('email');?>
                                </div>
                                 <div class="form-group">
                                   <label> <?php echo $this->lang->line('company');?> </label>
                                   <input type="text" name="company" value="<?php if(isset($profile_info)) echo $profile_info->company_name;echo set_value('company_name');?>" class="user" placeholder="Company Name" id="company">
                                   <?php echo form_error('company');?>
                                </div>
                                <div class="form-group">
                                   <label> <?php echo $this->lang->line('address');?> </label>
                                   <input type="text" name="address1" value="<?php if(isset($profile_info)) echo $profile_info->address1;echo set_value('address1');?>" class="user" placeholder="Address" id="address1">
                                   <?php echo form_error('phone');?>
                                </div>
                                 <div class="form-group">
                                   <label><?php echo $this->lang->line('address');?></label>
                                   <input type="text" name="address2" value="<?php if(isset($profile_info)) echo $profile_info->address2;?>" class="location" placeholder="Billing Address" id="address2" autocomplete="off">
                                </div>
                                
                             </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                   <label><?php echo $this->lang->line('first_name');?></label>
                                   <input type="text" name="first_name" value="<?php if(isset($profile_info)) echo $profile_info->first_name;echo set_value('first_name');?>" >
                                   <?php echo form_error('first_name');?>
                                </div>
                                <div class="form-group">
                                   <label><?php echo $this->lang->line('last_name');?></label>
                                   <input type="text" name="last_name" value="<?php if(isset($profile_info)) echo $profile_info->last_name;?>" >
                                </div>
                                 <div class="form-group">
                                   <label> <?php echo $this->lang->line('mobile_number');?> </label>
                                   <input type="text" name="phone" value="<?php if(isset($profile_info)) echo $profile_info->phone;echo set_value('phone');?>" >
                                   <?php echo form_error('phone');?>
                                </div>
                                 
                                <div class="form-group">
                                   <label> <?php echo $this->lang->line('fax');?> </label>
                                   <input type="text" name="fax" value="<?php if(isset($profile_info)) echo $profile_info->fax;echo set_value('fax_no');?>" >
                                   <?php echo form_error('fax');?>
                                </div>
                                 <div class="form-group">
                                     <label>&nbsp;</label>
                                    <input type="submit" class="button green_button right" name="submit" value="Update" style="margin-top:10px;" >
                                 </div>
                             </div>
                              <div class="col-md-12">
                                <div id="map" style="margin: 10px 0px;border-radius:6px;border:solid 1px #aaa;width:100%;height:300px;">
                                    <p>Veuillez patienter pendant le chargement de la carte...</p>
                                    </div>
                                </div>
                             <?php echo form_close();?>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
    </div>
</div>    
<script>
    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: {lat: 50.6371834, lng: 3.063017400000035}
      });
      var geocoder = new google.maps.Geocoder();

        geocodeAddress(geocoder, map);
    }

    function geocodeAddress(geocoder, resultsMap) {
      var address = "<?php echo $profile_info->address1 . "" . $profile_info->address2; ?>";
      geocoder.geocode({'address': address}, function(results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
          resultsMap.setCenter(results[0].geometry.location);
           var contentString = '<h3><strong><?php echo $profile_info->first_name . " " . $profile_info->last_name?></strong></h3><p><?php echo $profile_info->address1 . "<br/>" . $profile_info->address2; ?></p>'
          var infowindow = new google.maps.InfoWindow({
            content: contentString
          });
  
          var marker = new google.maps.Marker({
            map: resultsMap,
            position: results[0].geometry.location
          });
          marker.addListener('click', function() {
            infowindow.open(resultsMap, marker);
          });
        } else {
          alert('Geocode was not successful for the following reason: ' + status);
        }
      });
    }
  </script>
  <script src="http://maps.googleapis.com/maps/api/js?libraries=places,geometry&callback=initMap"></script>
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
   		},"<?php echo $this->lang->line('valid_number');?>");
   
   	
   		//form validation rules
              $("#profile_form").validate({
                  rules: {
                      user_name: {
                          required: true,
   			  lettersonly: true
                      },
   				
   	email:{
   		required: true,
   		email: true
   	},
   	phone: {
                          required: true,
   			  phoneNumber: true,
   			rangelength: [10, 11]
                      },
   	first_name:{
   		required: true,
   		lettersonly: true
   		
   	}
   	         },
   			
   			messages: {
   				user_name:{
   		required: "<?php echo $this->lang->line('user_name_valid');?>"
   	},
   	email:{
   		required: "<?php echo $this->lang->line('email_valid');?>"
   	},
   	phone:{
   		required: "<?php echo $this->lang->line('phone_valid');?>"
   	},
   	first_name:{
   		required: "<?php echo $this->lang->line('first_name_valid');?>"
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