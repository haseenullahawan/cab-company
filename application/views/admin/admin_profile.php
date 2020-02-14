<div class="col-md-12 right-p">
    <div class="content">
        <div class="main-hed"> 
            <a href="<?php echo site_url(); ?>/auth"><?php echo $this->lang->line('home'); ?></a>
            <?php if (isset($title)) echo " >> " . $title; ?>
        </div>
        <?php
            $attributes = array("name" => 'profile_form', "id" => 'profile_form');
            echo form_open_multipart('admin/profile', $attributes);
        ?>
        <div class="col-md-6 padding-p-l">
            <div class="module">
                <div class="module-body">
                    <div class="form-group">                     
                        <label class="control-label"><?php echo $this->lang->line('user_name'); ?></label>											
                        <input type="text" name="user_name" value="<?php if (isset($admin_details->username)) echo $admin_details->username;echo set_value('user_name');?>" />         
                    </div>
                    <?php echo form_error('user_name'); ?>
                    
                    <div class="form-group">                     
                        <label class="control-label"><?php echo $this->lang->line('first_name'); ?></label>											
                        <input type="text" name="first_name" value="<?php if (isset($admin_details->first_name)) echo $admin_details->first_name;echo set_value('first_name'); ?>"/>         
                    </div>
                    <?php echo form_error('first_name'); ?>
                    
                    <div class="form-group">                     
                        <label class="control-label"><?php echo $this->lang->line('address'); ?></label>											
                        <input type="text" name="address1" value="<?php if (isset($admin_details->address1)) echo $admin_details->address1;echo set_value('address1'); ?>"/>         
                    </div>
                    <?php echo form_error('address1'); ?>
                    
                    <div class="form-group">                     
                        <label class="control-label"><?php echo $this->lang->line('phone'); ?></label>											
                        <input type="text" name="phone" value="<?php if (isset($admin_details->phone)) echo $admin_details->phone;echo set_value('phone'); ?>"/>         
                    </div>
                    <?php echo form_error('phone'); ?>
                    <!-- <div class="form-group">                    
                       <label><?php //echo $this->lang->line('photo');?></label>    
                                   <input type="file" name="userfile" />    
                       </div> -->
                </div>
            </div>
        </div>
        <div class="col-md-6 padding-p-l">
            <div class="module">
                <div class="module-body">
                    <div class="form-group">                     
                        <label class="control-label"><?php echo $this->lang->line('email'); ?></label>											
                        <input type="text" name="email" value="<?php if (isset($admin_details->email)) echo $admin_details->email;echo set_value('email'); ?>"/>
                    </div>
                    <?php echo form_error('email'); ?>

                    <div class="form-group">                     
                        <label class="control-label"><?php echo $this->lang->line('last_name'); ?></label>											
                        <input type="text" name="last_name" value="<?php if (isset($admin_details->last_name)) echo $admin_details->last_name; ?>"/>         
                    </div>

                    <div class="form-group">                     
                        <label class="control-label"><?php echo $this->lang->line('address'); ?> 1</label>											
                        <input type="text" name="address2" class="location" value="<?php if (isset($admin_details->address2)) echo $admin_details->address2;echo set_value('address2'); ?>"/>         
                    </div>
                    <?php echo form_error('address2'); ?>


                    <input type="hidden" name="update_rec_id" value="<?php if (isset($admin_details->id)) echo $admin_details->id; ?>" />                 		
                    <input type="submit" value="<?php echo $this->lang->line('update'); ?>" name="submit" />
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div id="map" style="margin: 10px 0px;border-radius:6px;border:solid 1px #aaa;width:100%;height:300px;">
            <p>Veuillez patienter pendant le chargement de la carte...</p>
            </div>
        </div>
        <?php echo form_close(); ?>   
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
      var address = "<?php echo $admin_details->address1 . "" . $admin_details->address2; ?>";
      geocoder.geocode({'address': address}, function(results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
          resultsMap.setCenter(results[0].geometry.location);
           var contentString = '<h3><strong><?php echo $admin_details->first_name . " " . $admin_details->last_name?></strong></h3><p><?php echo $admin_details->address1 . "<br/>" . $admin_details->address2; ?></p>';
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
                $.validator.addMethod("lettersonly",function(a,b){return this.optional(b)||/^[a-z ]+$/i.test(a)},"<?php echo $this->lang->line('valid_name'); ?>");
                $.validator.addMethod("phoneNumber", function(uid, element) {
                           return (this.optional(element) || ui D.match(/^([0-9]*)$/));
                },"<?php echo $this->lang->line('valid_number'); ?>");
   
                                            //form validation rules 
               $("#pro
                                        fi le_form").validate({
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
                                                
                                                messages: {user_name:{ 
                                                    required: "<?php echo $this->lang->line('user_name_valid'); ?>"
        },
        email:{
                                                                                        required: "<?php echo $this->lang->line('email_valid'); ?>"
                                                                                                                        },
        phone:{
                                                                                                                        required: "<?php echo $this->lang->line('phone_valid'); ?>"
        },
                                                                                                                                                        first_name:{
                                                                                                                                                    required: "<?php echo $this->lang->line('first_name_valid'); ?>"
        }
                 },
                  
                                                                                                                                                                                    submitHandler: function(form)  {
                                                                                                                                                                                        form.submit();
                  }
                                                                                                                                                                                    });
                                                                                                                                                                                        }
      }
   
                                                                                                                                                                                    //when the dom has loaded setup form validation rules
                                                                                                                                                                                        $(D) .ready(function($) {
          JQUERY4U.UTIL.setupFormValidation();
                                                                                                                                                                                });
   
                                                                                                                                                                                })(jQuery, window, document);
</script>