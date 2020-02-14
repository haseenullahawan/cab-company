<?php $locale_info = localeconv(); ?>
<div class="col-md-12 padding white right-p">
   <div class="content">
      <div class="main-hed"> 
         <a href="<?php echo site_url();?>/auth"><?php echo $this->lang->line('home');?></a>
         <?php if(isset($title)) echo " >> Master Settings >> ".$title;?>
      </div>
      <?php echo $this->session->flashdata('message'); ?>
      <div class="col-md-6 padding-p-l">
         <div class="module">
            <div class="module-head">
               <!--<h3><?php // echo $title;?></h3>-->
            </div>
            <?php 
               $attributes = array('name' => 'package_settings_form', 'id' => 'package_settings_form');
               echo form_open_multipart("settings/packageSettings/".$operation,$attributes) ?>
            <div class="module-body">
               <div class="form-group">                     
                  <label class="control-label"><?php echo $this->lang->line('select')." ".$this->lang->line('vehicle');?></label>			
                  <?php
                     $select = array();
                     if(isset($package_setting_rec->vehicle_id)) {
                     	$select = $package_setting_rec->vehicle_id;					  			
                     }
                     echo form_dropdown('vehicle_id',$vehicleOptions,$select,'class = "chzn-select" required');				 
                      
                      ?> 				 
               </div>
               <?php echo form_error('vehicle_id');?>
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('package')." ".$this->lang->line('name');?></label>    
                  <input type="text" name="name" placeholder="<?php echo $this->lang->line('package')." ".$this->lang->line('name');?>" value="<?php 
                     if(isset($package_setting_rec->name))
                     echo $package_setting_rec->name;echo set_value('name');
                     ?>" />    
               </div>
               <?php echo form_error('name');?>
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('hours');?></label>    
                  <input type="text" name="hours" placeholder="<?php echo $this->lang->line('in_hours');?>" value="<?php 
                     if(isset($package_setting_rec->hours))
                     echo $package_setting_rec->hours;echo set_value('hours');
                     ?>" />    
               </div>
               <?php echo form_error('hours');?>
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('distance');?></label>    
                  <input type="text" name="distance" placeholder="<?php echo $this->lang->line('distance_in_km');?>" value="<?php 
                     if(isset($package_setting_rec->distance))
                     echo $package_setting_rec->distance;echo set_value('distance');
                     ?>" />    
               </div>
               <?php echo form_error('distance');?>
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('min_cost')." (".$locale_info['currency_symbol'].")";?></label>    
                  <input type="text" name="min_cost" placeholder="<?php echo $this->lang->line('min_cost');?>"value="<?php 
                     if(isset($package_setting_rec->min_cost))
                     echo $package_setting_rec->min_cost;echo set_value('min_cost');
                     ?>" />    
               </div>
               <?php echo form_error('min_cost');?>
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('charge_distance')." (".$locale_info['currency_symbol'].")";?></label>    
                  <input type="text" name="charge_distance" placeholder="<?php echo $this->lang->line('charge_per_km');?>" value="<?php 
                     if(isset($package_setting_rec->charge_distance))
                     echo $package_setting_rec->charge_distance;echo set_value('charge_distance');
                     ?>" />    
               </div>
               <?php echo form_error('charge_distance');?>
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('charge_hour')." (".$locale_info['currency_symbol'].")";?></label>    
                  <input type="text" name="charge_hour" placeholder="<?php echo $this->lang->line('charge_per_hour');?>" value="<?php 
                     if(isset($package_setting_rec->charge_hour))
                     echo $package_setting_rec->charge_hour;echo set_value('charge_hour');
                     ?>" />    
               </div>
               <?php echo form_error('charge_hour');?>
               <label><?php echo $this->lang->line('terms_conditions');?></label>    
               <div class="form-group">			  
                  <textarea class="ckeditor" id="editor1" name="terms_conditions" cols="100" rows="10"><?php if(isset($package_setting_rec->terms_conditions))
                     echo $package_setting_rec->terms_conditions; ?></textarea>				  
               </div>
               <div class="form-group">                     
                  <label class="control-label"><?php echo $this->lang->line('status');?></label>											
                  <?php 					 
                     $options = array(						
                     "Active" => "Active",
                     "Inactive" => "Inactive"								
                     						
                     );	
                     
                     $select = array();
                     if(isset($package_setting_rec->status)) {
                     $select = array(								
                     			$package_setting_rec->status		
                     			);					  			
                     }
                     echo form_dropdown('status',$options,$select,'class = "chzn-select"');					 
                     
                     ?>   
               </div>
               <?php 
                  if($operation == "Add" ) {?>
               <input type="submit" value="<?php echo $this->lang->line('add');?>" name="submit" />
               <?php   } 
                  else { 
                  ?>
               <input type="hidden" value="<?php if(isset($package_setting_rec->id)) echo $package_setting_rec->id?>" name="update_rec_id">
               <input type="submit" value="<?php echo $this->lang->line('update');?>" name="submit" />
               <?php } ?>  
            </div>
            <?php echo form_close();?>                      
         </div>
      </div>
   </div>
</div>
<!--	Validations	-->
<script type="text/javascript"> 
   (function($, W, D) {
    var JQUERY4U = {};
    JQUERY4U.UTIL = {
        setupFormValidation: function() {
            //Additional Methods			
            $.validator.addMethod("lettersonly", function(a, b) {
                return this.optional(b) || /^[a-z' ]+$/i.test(a)
            }, "<?php echo $this->lang->line('valid_name');?>");
            $.validator.addMethod("numbersonly", function(a, b) {
                return this.optional(b) || /^[0-9 ]+$/i.test(a)
            }, "<?php echo $this->lang->line('valid_numbers');?>");
            $.validator.addMethod("proper_value", function(uid, element) {
                return (this.optional(element) || uid.match(/^((([0-9]*)[\.]([0-9]{2}))|([0-9]*))$/));
            }, "<?php echo $this->lang->line('valid_proper');?>");
            //form validation rules
            $("#package_settings_form").validate({
                rules: {
                    vehicle_id: {
                        required: true
                    },
                    name: {
                        required: true,
                        lettersonly: true
                    },
                    hours: {
                        required: true,
                        numbersonly: true
                    },
                    distance: {
                        required: true,
                        numbersonly: true
                    },
                    min_cost: {
                        required: true,
                        proper_value: true
                    },
                    charge_distance: {
                        required: true,
                        proper_value: true
                    },
                    charge_hour: {
                        required: true,
                        proper_value: true
                    }
                },
                messages: {
                    vehicle_id: {
                        required: "<?php echo $this->lang->line('select_vehicle_valid');?>"
                    },
                    name: {
                        required: "<?php echo $this->lang->line('name_valid');?>"
                    },
                    hours: {
                        required: "<?php echo $this->lang->line('hours_valid');?>"
                    },
                    distance: {
                        required: "<?php echo $this->lang->line('distance_valid');?>"
                    },
                    min_cost: {
                        required: "<?php echo $this->lang->line('minimum_cost_valid');?>"
                    },
                    charge_distance: {
                        required: "<?php echo $this->lang->line('charge_distance_valid');?>"
                    },
                    charge_hour: {
                        required: "<?php echo $this->lang->line('charge_hour_valid');?>"
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

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            input.style.width = '100%';
            $('#package_image')
                .attr('src', e.target.result);
            $('#package_image').fadeIn();
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>