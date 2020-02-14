<div class="col-md-12 right-p">
    <div class="content">
        <div class="main-hed"> 
            <a href="<?php echo site_url(); ?>support/home"><?php echo $this->lang->line('home'); ?></a>
            <?php if (isset($title)) echo " >> " . $title; ?>
        </div>
        <?php
            $attributes = array("name" => 'profile_form', "id" => 'profile_form');
            echo form_open_multipart('support/my_profile', $attributes);
        ?>
        <div class="col-md-6 padding-p-l">
            <div class="module">
                <div class="module-body">
                    <div class="form-group">                     
                        <label class="control-label"><?php echo $this->lang->line('user_name'); ?></label>											
                        <input type="text" required name="user_name" value="<?php if (isset($user_data->username)) echo $user_data->username;echo set_value('user_name');?>" />         
                    </div>
                    <?php echo form_error('user_name'); ?>
                    
                    <div class="form-group">                     
                        <label class="control-label"><?php echo $this->lang->line('first_name'); ?></label>											
                        <input type="text" required name="first_name" value="<?php if (isset($user_data->first_name)) echo $user_data->first_name;echo set_value('first_name'); ?>"/>         
                    </div>
                    <?php echo form_error('first_name'); ?>
                    
                    <div class="form-group">                     
                        <label class="control-label"><?php echo $this->lang->line('company'); ?></label>											
                        <input type="text" required name="company_name" value="<?php if (isset($user_data->company_name)) echo $user_data->company_name;echo set_value('company_name'); ?>"/>         
                    </div>
                    <?php echo form_error('company'); ?>
                    
                </div>
            </div>
        </div>
        <div class="col-md-6 padding-p-l">
            <div class="module">
                <div class="module-body">
                    <div class="form-group">                     
                        <label class="control-label"><?php echo $this->lang->line('email'); ?></label>											
                        <input type="text" required name="email" value="<?php if (isset($user_data->email)) echo $user_data->email;echo set_value('email'); ?>"/>
                    </div>
                    <?php echo form_error('email'); ?>

                    <div class="form-group">                     
                        <label class="control-label"><?php echo $this->lang->line('last_name'); ?></label>											
                        <input type="text" required name="last_name" value="<?php if (isset($user_data->last_name)) echo $user_data->last_name; ?>"/>         
                    </div>

                    <div class="form-group">                     
                        <label class="control-label"><?php echo $this->lang->line('phone'); ?></label>											
                        <input type="text" required name="phone" value="<?php if (isset($user_data->phone)) echo $user_data->phone;echo set_value('phone'); ?>"/>         
                    </div>
                    <?php echo form_error('phone'); ?>


                    <input type="hidden" name="user_id" value="<?php if (isset($user_data->id)) echo $user_data->id; ?>" />                 		
                    <input type="submit" class="bbt btn pull-right" style="margin-top:20px" value="<?php echo $this->lang->line('update'); ?>" name="submit" />
                </div>
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